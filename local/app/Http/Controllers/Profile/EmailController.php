<?php namespace App\Http\Controllers\Profile;

use App\Email;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Session;

class EmailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $email = $this->findOrCreate($id);

        return view('profile.email', ['email' => $email, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);

        $email = $this->findOrCreate($id);

        $input = $request->all();
        $email->fill($input)->save();

        Session::flash('flash_message', 'Notifications successfully updated!');
        return redirect()->to("/" . $user->username);
    }

    private function findOrCreate($userId)
    {
        $email = Email::where('user_id', '=', $userId)->first();
        if (!$email) {
            $email = Email::create([
                'user_id' => $userId
            ]);
        }

        return $email;
    }

}
