<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use Session;

class ContactController extends Controller {

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request) {
        
        $this->setMetaLinks();
        
        $contact = new Contact();
        return view('contact.hello', ['contact' => $contact, 'links' => $this->metaLinks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        $contact = new Contact();
        $this->save($contact, $request);
        return redirect(route("hello.create"));
    }

    private function save($contact, $request) {

        $fields = [
            'subject' => 'required|max:255',
            'mobile' => 'required|max:255',
            'email' => 'required|max:255',
            'content' => 'required|max:500'
        ];

        $this->validate($request, $fields);
        $input = $request->all();
        
        $contact->fill($input)->save();

        Session::flash('flash_message', 'Thank you for contacting us! Our team will get back to you soonest');
    }

}
