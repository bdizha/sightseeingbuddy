<?php

namespace App\Http\Controllers;

use App\Events\Subscribe;
use App\Subscriber;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function currency(Request $request)
    {
        $flag = $request->input("flag");
        if (!empty($flag)) {
            Session("currency", $flag);
            return json_encode([]);

        } else {
            return json_encode([
                "flag" => Session("currency", "za")
            ]);
        }
    }

    public function guest(Request $request)
    {
        $authenticated = false;
        $type = "";
        if (Auth::check()) {
            $authenticated = true;
            $type = Auth::user()->type;
        }

        return json_encode([
            "authenticated" => $authenticated,
            "type" => $type
        ]);
    }

    public function newsletter(Request $request)
    {
        $fields = [
            'email' => 'required|max:255|unique:subscribers'
        ];

        $this->validate($request, $fields);
        $input = $request->all();

        $subscriber = new Subscriber();
        $subscriber->fill($input)->save();

        event(new Subscribe($subscriber));

        echo "true";
        exit();
    }

    protected function getImage($path)
    {
        try {
            return file_get_contents(url("/") . $path);
        } catch (\Exception $e) {
            return "";
        }
    }
}
