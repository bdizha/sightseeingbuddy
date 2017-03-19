<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Experience;
use Carbon\Carbon;

class BookingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($id, $time, $timestamp, Request $request)
    {
        $experience = Experience::where('id', '=', $id)->first();
        $reference = "KIL" . time();

        return view('booking.add', [
            'experience' => $experience,
            'user' => Auth::user(),
            'time' => $time,
            'timestamp' => $timestamp,
            'reference' => $reference
        ]);
    }

    public function confirm(Request $request)
    {
        /**
         * Notes:
         * - All lines with the suffix "// DEBUG" are for debugging purposes and
         *   can safely be removed from live code.
         * - Remember to set PAYFAST_SERVER to LIVE for production/live site
         */
        // General defines
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


        // Notify PayFast that information has been received
        header('HTTP/1.0 200 OK');
        flush();

        // Variable initialization
        $pfError = false;
        $pfErrMsg = '';
        $filename = 'notify.txt'; // DEBUG
        $output = ''; // DEBUG
        $pfParamString = '';
        $pfHost = (PAYFAST_SERVER == 'LIVE') ?
            'www.payfast.co.za' : 'sandbox.payfast.co.za';

        //// Dump the submitted variables and calculate security signature
        if (!$pfError) {
            $output = "Posted Variables:\n\n"; // DEBUG

            // Strip any slashes in data
            foreach ($_POST as $key => $val)
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
            $passPhrase = 'XXXXX'; //You need to get this from a constant or stored in you website
            if (!empty($passPhrase)) {
                $pfTempParamString .= '&passphrase=' . urlencode($passPhrase);
            }
            //dd($pfTempParamString);

            $signature = md5($pfTempParamString);

            $result = ($_POST['signature'] == $signature);

            $output .= "Security Signature:\n\n"; // DEBUG
            $output .= "- posted     = " . $_POST['signature'] . "\n"; // DEBUG
            $output .= "- calculated = " . $signature . "\n"; // DEBUG
            $output .= "- result     = " . ($result ? 'SUCCESS' : 'FAILURE') . "\n"; // DEBUG
        }

        //// Verify source IP
        if (!$pfError) {
            $validHosts = array(
                'www.payfast.co.za',
                'sandbox.payfast.co.za',
                'w1w.payfast.co.za',
                'w2w.payfast.co.za',
            );

            $validIps = array();

            foreach ($validHosts as $pfHostname) {
                $ips = gethostbynamel($pfHostname);

                if ($ips !== false)
                    $validIps = array_merge($validIps, $ips);
            }

            // Remove duplicates
            $validIps = array_unique($validIps);

            if (!in_array($_SERVER['REMOTE_ADDR'], $validIps)) {
                $pfError = true;
                $pfErrMsg = PF_ERR_BAD_SOURCE_IP;
            }
        }

        //// Connect to server to validate data received
        if (!$pfError) {
            // Use cURL (If it's available)
            if (function_exists('curl_init')) {
                $output .= "\n\nUsing cURL\n\n"; // DEBUG

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
                $output .= "\n\nUsing fsockopen\n\n"; // DEBUG

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

            $output .= "\n\nValidate response from server:\n\n"; // DEBUG

            foreach ($lines as $line) // DEBUG
                $output .= $line . "\n"; // DEBUG
        }

        //// Interpret the response from server
        if (!$pfError) {
            // Get the response from PayFast (VALID or INVALID)
            $result = trim($lines[0]);

            $output .= "\nResult = " . $result; // DEBUG

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
        }

        dd($output);

        //// Write output to file // DEBUG
        file_put_contents($filename, $output); // DEBUG
    }

    public function cancel(Request $request)
    {

    }

    public function success(Request $request)
    {
        dd("success");
    }

    public function verify(Request $request)
    {
        dd("verify");
    }

    public function forex()
    {
        $currency = file_get_contents("https://www.citysightseeing.co.za/api/forex-rates");
        die($currency);
    }

    public function receipt($id, Request $request)
    {
        $experience = Experience::where('id', '=', $id)->first();

        $daysSinceEpoch = Carbon::createFromTimestamp(1489343200);
        dd(array($daysSinceEpoch->format("d/m/Y"), time()));

        return view('booking.receipt', [
            'user' => $experience->user,
            'experience' => $experience
        ]);
    }

}
