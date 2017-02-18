<?php

namespace App\Http\Controllers\Step;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StepController;
use Session;

class ContactController extends StepController {

    protected $next_step = null;
    protected $cur_step = "contact";
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
        $contact = new Contact();
        $user = Auth::user();

        $contact = Contact::where('user_id', '=', $user->id)->get();

        return view('step.contact.add', ['contact' => $contact, 'contact' => $contact, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {

        $user = Auth::user();
        $contact = new Contact();
        $contact->user_id = $user->id;

        return $this->save($contact, $request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit($id, Request $request) {

        $contact = Contact::where('id', '=', $id)->first();
        $user = Auth::user();

        $contact = Contact::where('user_id', '=', $user->id)
                        ->where('id', '!=', $id)->get();

        return view('step.contact.edit', ['contact' => $contact, 'contact' => $contact, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function update($id, Request $request) {
        $contact = Contact::where('id', '=', $id)->first();
        return $this->save($contact, $request);
    }

    private function save($contact, $request) {

        $fields = [
            'name' => 'required|max:255',
            'qualification' => 'required|max:255',
            'start_year' => 'required|max:6',
            'start_month' => 'required|max:6',
        ];

        $user = Auth::user();
        $isMore = $request->input('is_more');
        if (empty($isMore)) {
            $contactCount = Contact::where('user_id', '=', $user->id)->count();

            if (!empty($contactCount)) {
                return redirect(route("{$this->next_step}.create"));
            }
        }

        $isCurrent = $request->input('is_current');
        if (empty($isCurrent)) {
            $fields['end_year'] = 'required|max:6';
            $fields['end_month'] = 'required|max:6';
        }

        $this->validate($request, $fields);
        $input = $request->all();

        $contact->fill($input)->save();

        Session::flash('flash_message', 'Contact successfully saved!');

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
        $contact = Contact::findOrFail($id);
        $contact->delete();

        Session::flash('flash_message', 'Contact successfully deleted!');
        return redirect(route("{$this->cur_step}.create"));
    }

}