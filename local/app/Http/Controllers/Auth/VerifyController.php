<?php

namespace App\Http\Controllers\Auth;

use App\Events\GuestWelcome;
use App\Events\LocalWelcome;
use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Auth\RegistersUsers;
use Session;

class VerifyController extends AuthController
{
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/local/search';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function email(Request $request)
    {
        $token = $request->get("verify_token");
        $user = User::where("verify_token", "=", $token)->first();

        if(empty($user->id)){
            Session::flash('flash_message', "An error has occurred! Please try and login again!");
            return redirect("/local/dashboard");
        }
        if ($user->is_verified) {
            Session::flash('flash_message', 'Oops! It appears you\'ve clicked on an expired link');
            return redirect("/local/dashboard");
        }

        $user->is_verified = true;
        $user->save();

        event(new GuestWelcome($user));

        Session::flash('flash_message', 'Thanks for verifying your email! Please login with your credentials.');
        return redirect("/local/login");
    }

}
