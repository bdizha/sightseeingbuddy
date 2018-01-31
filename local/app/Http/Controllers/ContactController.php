<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Contact;
use Session;

class ContactController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        return view('contact.hello');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->save($request);

        // send email
        return redirect(route("contact-us.create"));
    }

    private function save($request)
    {
        $fields = [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|max:500'
        ];

        $this->validate($request, $fields);
        $values = $request->all();

        $data = [
            'First name' => $values['first_name'],
            'Last name' => $values['last_name'],
            'Email' => $values['email'],
            'Message' => $values['message']
        ];

        event(new Contact($data));

        Session::flash('flash_message', 'Thank you for contacting us! Our team will get back to you soonest');
    }

}