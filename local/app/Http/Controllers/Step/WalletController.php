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
    protected $prev_step = "location";

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

        $links = $this->getLinks();

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
        $wallet = Wallet::where('id', '=', $id)->first();
        $user = Auth::user();

        $links = $this->getLinks();

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
        $wallet = Wallet::where('id', '=', $id)->first();
        return $this->save($wallet, $request);
    }

    private function save($wallet, $request) {

        $fields = [
            'name' => 'required|max:255'
        ];

        $user = Auth::user();
        $isMore = $request->input('is_more');

        if (empty($isMore)) {
            $walletsCount = Wallet::where('user_id', '=', $user->id)->count();

            if (!empty($walletsCount)) {
                return redirect(url("/profile/{$user->username}"));
            }
        }

        $this->validate($request, $fields);
        $input = $request->all();

        $wallet->fill($input)->save();

        Session::flash('flash_message', 'Wallet successfully saved!');

        $route = $isMore ? $this->cur_step : $this->next_step;
        return redirect(route("{$route}.create"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $wallet = Wallet::findOrFail($id);
        $wallet->delete();

        Session::flash('flash_message', 'Wallet successfully deleted!');
        return redirect(route("{$this->cur_step}.create"));
    }

}
