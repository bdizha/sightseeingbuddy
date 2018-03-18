<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Events\PaymentCancel;
use App\Events\PaymentFailure;
use App\Events\PaymentSuccess;
use App\Experience;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ["times", "success", "cancel", "verify", "forex"]]);

        /**
         * Notes:
         * - All lines with the suffix "// DEBUG" are for debugging purposes and
         *   can safely be removed from live code.
         * - Remember to set PAYFAST_SERVER to LIVE for production/live site
         */
//        // General defines
        define('PAYFAST_SERVER', 'TEST');
        // Whether to use "sandbox" test server or live server
        define('USER_AGENT', 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        // User Agent for cURL

        // Messages
        // Error
        define('PF_ERR_AMOUNT_MISMATCH', 'Amount mismatch');
        define('PF_ERR_BAD_SOURCE_IP', 'Bad source IP address');
        define('PF_ERR_CONNECT_FAILED', 'Failed to connect to PayFast');
        define('PF_ERR_BAD_ACCESS', 'Bad access of page');
        define('PF_ERR_INVALID_SIGNATURE', 'Security signature mismatch');
        define('PF_ERR_CURL_ERROR', 'An error occurred executing cURL');
        define('PF_ERR_INVALID_DATA', 'The data received is invalid');
        define('PF_ERR_UKNOWN', 'Unkown error occurred');

        // General
        define('PF_MSG_OK', 'Payment was successful');
        define('PF_MSG_FAILED', 'Payment has failed');
    }

    public function times(Request $request)
    {
        $input = $request->all();
        $experienceId = $input["experience_id"];
        $date = $input["date"];

        $experience = Experience::where('id', '=', $experienceId)->first();

        $bookings = Booking::where("experience_id", "=", $experienceId)
            ->where("date", "=", $date)->get();

        $bookedTimes = [];
        foreach ($bookings as $booking) {
            $bookedTimes[] = $booking->times;
        }

        $html = view('booking.partials.times', [
            'bookedTimes' => $bookedTimes,
            'experience' => $experience,
            'timestamp' => strtotime($date)
        ])->render();

        echo $html;
        exit();
    }

    public function index(Request $request)
    {
        $this->middleware('auth');

        $user = Auth::user();
        $bookingsQuery = Booking::orderBy("date", "DESC");

        $values = $request->all();

        if (strpos($request->headers->get('referer'), 'manage') !== false
            && $request->has('reference')
            && $request->has('surname')
        ) {
            $bookingsQuery->with('user');
            $bookingsQuery->where('reference', str_replace("#", "", $values['reference']));

            $bookingsQuery->whereHas('user', function ($query) use ($values) {
                $query->where('users.last_name', '=', $values['surname']);
            });

        } else {
            if ($user->type == "guest") {
                $bookingsQuery->where("user_id", "=", $user->id);
            } else {
                $bookingsQuery->where("local_id", "=", $user->id);
            }

            $bookingsQuery->where("status", "!=", "pending");

            try {
                $user->image = file_get_contents(url("/") . '/pages/imager?w=200&h=200&url=' . $user->image);
            } catch (\Exception $e) {
            }
        }

        return view('booking.index', [
            'bookings' => $bookingsQuery->get(),
            'user' => $user
        ]);
    }

    public function create($id, $time, $timestamp, $guests, Request $request)
    {
        $user = Auth::user();
        $experience = Experience::where('id', '=', $id)->first();
        $pricing = $experience->pricing;
        $reference = "SSB" . time();

        $date = date("Y-m-d", $timestamp);

        $total = number_format($guests * str_replace("R", "", $pricing->per_person), 2, '.', '');

        $booking = new Booking();
        $booking->user_id = $user->id;
        $booking->local_id = $experience->user->id;
        $booking->experience_id = $id;
        $booking->amount = $total;
        $booking->pricing_id = $pricing->id;
        $booking->reference = $reference;
        $booking->special_requests = serialize([]);
        $booking->time = $time;
        $booking->guests = $guests;
        $booking->date = $date;
        $booking->save();

        $data = array(
            // Merchant details
            'merchant_id' => '10000100',
            'merchant_key' => '46f0cd694581a',
            'return_url' => route('payment_success') . "?reference=" . $booking->reference,
            'cancel_url' => route('payment_cancel') . "?reference=" . $booking->reference,
            'notify_url' => route('payment_verify'),
            // Buyer details
            'name_first' => $user->first_name,
            'name_last' => $user->last_name,
            'email_address' => $user->email,
            // Transaction details
            'm_payment_id' => $reference, // Unique payment ID to pass through to notify_url
            'amount' => number_format(sprintf("%.2f", $total), 2, '.', ''),  // Amount needs to be in ZAR,if you have a multicurrency system, the conversion needs to place before building this array
            'item_name' => $experience->teaser,
            'item_description' => $experience->teaser
        );

        $pfOutput = "";

        // Create GET string
        foreach ($data as $key => $val) {
            if (!empty($val)) {
                $pfOutput .= $key . '=' . urlencode(trim($val)) . '&';
            }
        }

        // Remove last ampersand
        $getString = substr($pfOutput, 0, -1);
        if (isset($passPhrase)) {
            $getString .= '&passphrase=' . urlencode(trim($passPhrase));
        }
        $data['signature'] = md5($getString);

        $pfHost = (PAYFAST_SERVER == 'LIVE') ? 'www.payfast.co.za' : 'sandbox.payfast.co.za';

        $date = Carbon::createFromTimestamp($timestamp)->format("d M Y");


        $request->session()->set('reference', $booking->reference);

        return view('booking.add', [
            'experience' => $experience,
            'user' => Auth::user(),
            'time' => $time,
            'total' => $total,
            'guests' => $guests,
            'date' => $date,
            'data' => $data,
            'pfHost' => $pfHost,
            'reference' => $reference
        ]);
    }

    public function verify(Request $request)
    {
        file_put_contents(public_path() . "/" . "verify.txt", "verify: " . time() . " : " . PAYFAST_SERVER);

        // Variable initialization
        $pfError = false;
        $pfErrMsg = '';
        $filename = 'notify.txt';
        $output = '';
        $pfParamString = '';
        $pfHost = (PAYFAST_SERVER == 'LIVE') ? 'www.payfast.co.za' : 'sandbox.payfast.co.za';

        $pfData = $_POST;

        //// Dump the submitted variables and calculate security signature
        if (!$pfError) {
            $output = "Posted Variables:\n\n";

            // Strip any slashes in data
            foreach ($pfData as $key => $val)
                $pfData[$key] = stripslashes($val);

            // Dump the submitted variables and calculate security signature
            foreach ($pfData as $key => $val) {
                if ($key != 'signature')
                    $pfParamString .= $key . '=' . urlencode($val) . '&';
            }

            // Remove the last '&' from the parameter string
            $pfParamString = substr($pfParamString, 0, -1);
            $pfTempParamString = $pfParamString;

            // If a passphrase has been set in the PayFast Settings, then it needs to be included in the signature string.
            $passPhrase = ''; //You need to get this from a constant or stored in you website
            if (!empty($passPhrase)) {
                $pfTempParamString .= '&passphrase=' . urlencode($passPhrase);
            }
            //dd($pfTempParamString);

            $signature = md5($pfTempParamString);

            $result = ($pfData['signature'] == $signature);

            $output .= "Security Signature:\n\n";
            $output .= "- posted     = " . $pfData['signature'] . "\n";
            $output .= "- calculated = " . $signature . "\n";
            $output .= "- result     = " . ($result ? 'SUCCESS' : 'FAILURE') . "\n";
        }

        //// Verify source IP
        if (!$pfError) {
            $validHosts = array(
                'www.payfast.co.za',
                'sandbox.payfast.co.za',
                'w1w.payfast.co.za',
                'w2w.payfast.co.za'
            );

            $validIps = array();

            foreach ($validHosts as $pfHostname) {
                $ips = gethostbynamel($pfHostname);

                if ($ips !== false)
                    $validIps = array_merge($validIps, $ips);
            }

            // Remove duplicates
            $validIps = array_unique($validIps);

            if ($_SERVER["SERVER_NAME"] != 'project.interseed.co.za') {
                $pfError = true;
                $pfErrMsg = PF_ERR_BAD_SOURCE_IP;
            }
        }

        //// Connect to server to validate data received
        if (!$pfError) {
            // Use cURL (If it's available)
            if (function_exists('curl_init')) {
                $output .= "\n\nUsing cURL\n\n";

                // Create default cURL object
                $ch = curl_init();

                // Base settings
                $curlOpts = array(
                    // Base options
                    CURLOPT_USERAGENT => USER_AGENT, // Set user agent
                    CURLOPT_RETURNTRANSFER => true,  // Return output as string rather than outputting it
                    CURLOPT_HEADER => false,         // Don't include header in output
                    CURLOPT_SSL_VERIFYHOST => 2,
                    CURLOPT_SSL_VERIFYPEER => false,

                    // Standard settings
                    CURLOPT_URL => 'https://' . $pfHost . '/eng/query/validate',
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $pfParamString,
                );
                curl_setopt_array($ch, $curlOpts);

                // Execute CURL
                $res = curl_exec($ch);
                curl_close($ch);

                if ($res === false) {
                    $pfError = true;
                    $pfErrMsg = PF_ERR_CURL_ERROR;
                }
            } // Use fsockopen
            else {
                $output .= "\n\nUsing fsockopen\n\n";

                // Construct Header
                $header = "POST /eng/query/validate HTTP/1.0\r\n";
                $header .= "Host: " . $pfHost . "\r\n";
                $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
                $header .= "Content-Length: " . strlen($pfParamString) . "\r\n\r\n";

                // Connect to server
                $socket = fsockopen('ssl://' . $pfHost, 443, $errno, $errstr, 10);

                // Send command to server
                fputs($socket, $header . $pfParamString);

                // Read the response from the server
                $res = '';
                $headerDone = false;

                while (!feof($socket)) {
                    $line = fgets($socket, 1024);

                    // Check if we are finished reading the header yet
                    if (strcmp($line, "\r\n") == 0) {
                        // read the header
                        $headerDone = true;
                    } // If header has been processed
                    else if ($headerDone) {
                        // Read the main response
                        $res .= $line;
                    }
                }
            }
        }

        //// Get data from server
        if (!$pfError) {
            // Parse the returned data
            $lines = explode("\n", $res);

            $output .= "\n\nValidate response from server:\n\n";

            foreach ($lines as $line) // DEBUG
                $output .= $line . "\n";
        }

        //// Interpret the response from server
        if (!$pfError) {
            // Get the response from PayFast (VALID or INVALID)
            $result = trim($lines[0]);

            $output .= "\nResult = " . $result;

            // If the transaction was valid
            if (strcmp($result, 'VALID') == 0) {
                // Process as required
            } // If the transaction was NOT valid
            else {
                // Log for investigation
                $pfError = true;
                $pfErrMsg = PF_ERR_INVALID_DATA;
            }
        }

        // If an error occurred
        if ($pfError) {
            $output .= "\n\nAn error occurred!";
            $output .= "\nError = " . $pfErrMsg;
        } else {

            $booking = Booking::where("reference", "=", $pfData[])->first();
            switch ($pfData['payment_status']) {
                case 'COMPLETE':
                    // If complete, update your application, email the buyer and process the transaction as paid
                    $booking->status = 'processed';

                    event(new PaymentSuccess($booking));

                    // send email here
                    break;
                case 'FAILED':
                    // There was an error, update your application and contact a member of PayFast's support team for further assistance
                    $booking->status = 'cancelled';

                    event(new PaymentFailure($booking));

                    // send email here
                    break;
                case 'PENDING':
                    // The transaction is pending, please contact a member of PayFast's support team for further assistance
                    $booking->status = 'pending';
                    break;
                default:
                    // If unknown status, do nothing (safest course of action)
                    break;
            }
            $booking->save();
        }

        //// Write output to file // DEBUG
        file_put_contents(public_path() . "/" . $filename, $output);

        // Notify PayFast that information has been received
        header('HTTP/1.0 200 OK');
        flush();
    }

    public function cancel(Request $request)
    {
        $reference = $request->get('reference');
        $reason = $request->get('reason', null);
        $reason = trim($reason);

        $user = Auth::user();
        $booking = Booking::where('reference', '=', $reference)->first();

        if ($request->exists("reason") && empty($reason)) {
            return redirect("/local/bookings?error=reason&booking_id=" . $booking->id);
        }

        if (empty($reference)) {
            file_put_contents(public_path() . "/" . "error.txt", "Error: " . date("Y-m-d", time()));
        }

        $booking->status = "cancelled";
        $booking->reason = $reason;
        $booking->save();

        event(new PaymentCancel($booking));

        file_put_contents(public_path() . "/" . "cancel.txt", "cancel: " . date("Y-m-d", time()));

        return view('booking.cancel', [
            'user' => $user,
            'experience' => Experience::where("id", "=", $booking->experience_id)->first()
        ]);

    }

    public function failure(Request $request)
    {
        $reference = $request->get('reference');

        if (empty($reference)) {
            file_put_contents(public_path() . "/" . "error.txt", "Error: " . date("Y-m-d", time()));
        }

        $user = Auth::user();
        $booking = Booking::where('reference', '=', $reference)->first();

        $booking->status = "cancelled";
        $booking->save();

        event(new PaymentCancel($booking));

        file_put_contents(public_path() . "/" . "failure.txt", "cancel: " . date("Y-m-d", time()));

        return view('booking.failure', [
            'user' => $user,
            'experience' => Experience::where("id", "=", $booking->experience_id)->first()
        ]);

    }

    public function manage(Request $request)
    {
        $user = Auth::user();
        return view('booking.manage', [
            'user' => $user
        ]);

    }

    public function success(Request $request)
    {
        $reference = $request->get('reference');

        if (empty($reference)) {
            file_put_contents(public_path() . "/" . "success.txt", "Error: " . date("Y-m-d", time()));
        }

        $user = Auth::user();
        $booking = Booking::where("reference", "=", $reference)->first();
        $booking->status = "success";
        $booking->save();

        event(new PaymentSuccess($booking));

        file_put_contents(public_path() . "/" . "success.txt", "success: " . date("Y-m-d", time()));

        return view('booking.success', [
            'user' => $user,
            'experience' => Experience::where("id", "=", $booking->experience_id)->first()
        ]);
    }

    public function forex()
    {
        $currency = file_get_contents("https://www.citysightseeing.co.za/api/forex-rates");
        die($currency);
    }

}
