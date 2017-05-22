<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Subscriber;

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

    public function newsletter(Request $request)
    {
        $fields = [
            'email' => 'required|max:255|unique:subscribers'
        ];

        $this->validate($request, $fields);
        $input = $request->all();

        $notice = new Subscriber();
        $notice->fill($input)->save();

        echo "true";
        exit();
    }

    protected function getImage($path)
    {
        dd(url("/") . $path);

        try {
            return file_get_contents(url("/") . $path);
        } catch (\Exception $e) {
            return "";
        }
    }
}
