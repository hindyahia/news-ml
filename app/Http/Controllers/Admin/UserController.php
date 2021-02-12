<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class UserController extends Controller
{

    public function __construct()
    {
        $this->route = "users";
        $this->path = "admin.users";
    }

    public function index(Request $request)
    {
        $users = User::latest()->where('is_admin', false);

        if (\request()->filled('email'))
            $users->where('email', 'like', "%$request->email%");

        if (\request()->filled('mobile'))
            $users->where('mobile', 'like', "%$request->mobile%");

        if (\request()->filled('statusUser'))
            $users->where('status', $request->statusUser);

        $users = $users->get();

        return view("{$this->path}.home", ['items' => $users]);
    }


    public function create()
    {
        return view("{$this->path}.create");
    }


    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data = Arr::except($data, ['confirm_password']);
        $data['password'] = bcrypt($data['password']);
        $data['allow'] = $request->boolean('allow');
        User::create($data);
        return redirect()->back()->with('status', __('cp.create'));
    }

    public function show($id)
    {
        //
    }


    public function edit(User $user)
    {
        return view("{$this->path}.edit")->with([
            'item' => $user
        ]);
    }


    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();
        $data['allow'] = $request->boolean('allow');
        $user->update($data);
        return redirect()->back()->with('status', __('cp.update'));
    }


    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['status' => true, 'message' => 'success']);
    }

    function editUserPassword(User $user)
    {
        if (auth()->user()->is_admin == 1 || $user->id == auth()->id())
            return view("{$this->path}.edit_password", ['item' => $user]);

        abort(403);
    }

    public function updateUserPassword(Request $request, User $user)
    {

        if (!(auth()->user()->is_admin == 1 || $user->id == auth()->id()))
            abort(403);

        $users_rules = array(
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password|min:6',
        );

        $this->validate($request, $users_rules);

        $user->update(['password' => bcrypt($request->password)]);


        return redirect()->back()->with('status', __('cp.update'));
    }


    public function editProfile()
    {
        return view("{$this->path}.editProfile");
    }


    public function updateProfile(UserRequest $request)
    {
        $data = $request->validated();
        $user = auth()->user();
        $user->update($data);
        return redirect()->back()->with('status', __('cp.update'));
    }
}
