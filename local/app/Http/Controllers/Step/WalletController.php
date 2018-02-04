<?php

namespace App\Http\Controllers\Step;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StepController;
use Session;
use App\Wallet;

class WalletController extends StepController {

    protected $next_step = "contact";
    protected $cur_step = "wallet";
    protected $prev_step = "wallet";

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request) {
        $wallet = new Wallet();
        $user = Auth::user();

        $links = $this->getLinks($user);

        return view('step.wallet.add', [
            'wallet' => $wallet,
            'links' => $links,
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {

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
    public function edit($id, Request $request) {
        $user = Auth::user();

        $wallet = Wallet::firstOrNew(['user_id' => $user->id]);

        $links = $this->getLinks($user);

        return view('step.wallet.edit', [
            'wallet' => $wallet,
            'links' => $links,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function update($id, Request $request) {
        $user = Auth::user();
        $wallet = Wallet::firstOrNew(['user_id' => $user->id]);
        return $this->save($wallet, $request);
    }

    private function save($wallet, $request) {

        $fields = [
            'bank' => 'required|max:255',
            'branch' => 'required|max:255',
            'account_number' => 'required|max:255'
        ];

        $this->validate($request, $fields);
        $input = $request->all();

        $wallet->fill($input)->save();

        Session::flash('flash_message', 'Your profile has been successfully saved!');

        $user = Auth::user();

        return redirect(url("/local/profile/" . $user->username));
    }

}
