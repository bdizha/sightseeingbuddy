<?php

namespace App\Http\Controllers\Auth;

use App\Events\GuestVerify;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\User;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Session;

class RegisterController extends AuthController
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
    public function showRegistrationForm()
    {
        $types = [
            'guest' => 'Guest',
            'local' => 'Local'
        ];

        $links = $this->getLinks();

        return view('auth.register', [
            'links' => $links,
            'types' => $types,
            'currentType' => empty($_GET["type"]) ? "guest" : $_GET["type"]
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'mobile' => 'required|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'country_id' => 'required',
            'type' => 'required',
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        if ($data['type'] == 'local') {
            $this->redirectTo = '/local/introduction/create';
        }

        Session::flash('flash_message', 'Welcome to Sightseeing Buddy!');

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'country_id' => $data['country_id'],
            'password' => bcrypt($data['password']),
            'type' => $data['type'],
        ]);

        $user->verify_token = md5($user->email);
        $user->save();

        event(new GuestVerify($user));
        return $user;
    }

}
