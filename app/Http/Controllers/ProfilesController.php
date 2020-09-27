<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    public function index() {
        return view('User.index');
    }

    public function edit($id) {
        return view('User.edit');
    }

    public function settings() {
        return view('');
    }
    public function update(Request $request) {
        $id = Auth::id();
        $this->validate($request, [
            'email' => 'email',
        ]);

            $user = User::findOrFail($id);
        $this->UserRequest($user, $request);

        return redirect('/User/'.$id);
    }

    public function UserRequest($user, Request $request): void
    {
        //Edit User
        $user->email = $request->get('Email');

        $user->save();
    }
}
