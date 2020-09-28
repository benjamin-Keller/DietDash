<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Redirect;

class ProfilesController extends Controller
{
    public function index() {
        return view('User.index');
    }

    public function edit() {
        return view('User.edit', [
            'user' => User::find(Auth::user()->id)
        ]);
    }

    public function saveUser(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'profile_picture' => 'max:255',
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if($request->input('profile_picture') != null || $request->input('profile_picture') != '') {
            $user->profile_picture = $request->input('profile_picture');
        } else {
            $user->profile_picture = '';
        }
        $user->save();

        return Redirect()->back()->with('success', 'User Information has been updated');
    }
    public function update() {
        return redirect('/user/');
    }

    public function UserRequest($user, Request $request): void
    {
        //Edit User
        $user->email = $request->get('Email');

        $user->save();
    }
}
