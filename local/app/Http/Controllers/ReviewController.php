<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use Session;

class ReviewController extends Controller
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
            'vote' => 'required',
            'is_recommended' => 'required',
            'experience_id' => 'required',
            'title' => 'required|max:255',
            'content' => 'required|max:1000',
            'nickname' => 'required|max:255'
        ];

        $this->validate($request, $fields);
        $values = $request->all();

        Review::create($values);

        die(json_encode(['status' => 'ok']));
    }

}