<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Experience;
use Session;

class ExperienceController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request) {

        $userId = $request->input('user_id');

        $request->session()->put('user_id', $userId);
        $experiences = Experience::orderBy('updated_at', 'desc')
                        ->where("user_id", "=", $userId)->paginate(10);
        return view('experience.index', ['experiences' => $experiences]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request) {
        $user_id = $request->session()->get('user_id');

        $experience = new Experience();
        $experience->user_id = $user_id;
        $users = User::orderBy('name', 'asc')
                ->lists('name', 'id');

        $return = "experiences?user_id={$user_id}";

        return view('experience.add', ['users' => $users, 'experience' => $experience, 'return' => $return]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {

        $experience = new Experience();
        $this->save($experience, $request);
        return $this->index($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $experience = User::findOrFail($id);

        return view('experience.show')->withUser($experience);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, Request $request) {

        $experience = Experience::findOrFail($id);

        $users = User::orderBy('name', 'asc')
                ->lists('name', 'id');

        $user_id = $request->session()->get('user_id');

        $return = "experiences?user_id={$user_id}";

        return view('experience.edit', ['experience' => $experience, 'users' => $users, 'return' => $return]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request) {
        $experience = Experience::findOrFail
                        ($id);

        $this->save($experience, $request);
        return $this->index($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */ public function destroy($id, Request $request) {
        $experience = Experience::findOrFail($id);

        $experience->delete();

        Session::flash('flash_message', 'Experience successfully deleted!');

        return redirect('/users')->withInput();
    }

    private function save($experience, $request) {

        $fields = [
            'media' => 'required|max:2048',
            'caption' => 'required|max:255',
            'user_id' => 'required|max:255'
        ];

        if ($experience->media && empty($input["media"])) {
            unset($fields["media"]);
        }

        $this->validate($request, $fields);
        $input = $request->all();

        Storage::disk('uploads')->put('filename', $file_content);

        $experience->fill($input)->save();

        Session::flash('flash_message', 'Experience successfully saved!');
    }

}
