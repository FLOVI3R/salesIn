<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all()->where("deleted", "!=", 1);
        return view('admin.admin_dashboard', compact('users'));
    }

    public function activateUser($id)
    {
        $user = User::select($id);
        $user->actived = 1;
        $user->update();
        return back();
    }

    public function deactivateUser($id)
    {
        $user = User::find($id);
        $user->actived = 0;
        $user->update();
        return back();
    }

    public function updateUser($id)
    {
        $user = User::find($id);
        return view('admin.admin_updateUser')->with('user', $user);
    }

    public function editUser($id, Request $request)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->update();
        return redirect('admin');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->deleted = 1;
        $user->update();
        return back();
    }
}
