<?php

namespace App\Http\Controllers\Step;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StepController;
use Session;
use App\Contact;

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

        $links = $this->getLinks($user);

        return view('step.contact.add', [
            'contact' => $contact,
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
        $user = Auth::user();

        $contact = Contact::firstOrNew(['user_id' => $user->id]);

        $links = $this->getLinks($user);

        return view('step.contact.edit', [
            'contact' => $contact,
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
        $contact = Contact::firstOrNew(['user_id' => $user->id]);
        return $this->save($contact, $request);
    }

    private function save($contact, $request) {

        $fields = [
            'email' => 'required|email|max:255',
            'mobile' => 'required|max:255',
            'telephone' => 'required|max:255'
        ];

        $this->validate($request, $fields);
        $input = $request->all();

        $contact->fill($input)->save();

        Session::flash('flash_message', 'Contact successfully saved!');

        $user = Auth::user();

        return redirect(url("/local/profile/" . $user->username));
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
