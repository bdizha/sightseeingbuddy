<?php

namespace App\Http\Controllers\Step;

use App\Http\Controllers\StepController;
use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class WalletController extends StepController
{

    protected $next_step = "contact";
    protected $cur_step = "wallet";
    protected $prev_step = "wallet";

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $wallet = new Wallet();
        $user = Auth::user();

        $links = $this->getLinks($user);

        return view('step.wallet.add', [
            'wallet' => $wallet,
            'links' => $links,
            'user' => $user,
            'index' => 3
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $user = Auth::user();
        $wallet = new Wallet();
        $wallet->user_id = $user->id;

        return $this->save($wallet, $request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit($id, Request $request)
    {
        $user = Auth::user();

        $wallet = Wallet::firstOrNew(['user_id' => $user->id]);

        $links = $this->getLinks($user);

        return view('step.wallet.edit', [
            'wallet' => $wallet,
            'links' => $links,
            'user' => $user,
            'index' => 3
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $user = Auth::user();
        $wallet = Wallet::firstOrNew(['user_id' => $user->id]);
        return $this->save($wallet, $request);
    }

    private function save($wallet, $request)
    {
        $fields = [
            'bank' => 'required|max:255',
            'branch' => 'required|max:255',
            'account_number' => 'required|max:255'
        ];

        $this->validate($request, $fields);
        $input = $request->all();

        $wallet->fill($input)->save();

        $user = Auth::user();

        if ($user->is_verified) {
            Session::flash('flash_message', 'Your profile has been successfully saved!');
            return redirect(url("/local/profile/" . $user->username));

        } else {
            Session::flash('flash_message', 'Thank you for signing up to become a local. You’ll be contacted by us to verify your profile, have a certified copy of your ID/Passport ready.');
            Auth::guard()->logout();
            return redirect('/local/auth/unverified/' . $user->id);
        }
    }

}
