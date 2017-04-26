<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

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
}
