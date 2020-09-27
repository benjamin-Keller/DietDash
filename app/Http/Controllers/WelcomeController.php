<?php

namespace App\Http\Controllers;

use App\Event;
use App\Patient;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index() {

        $upcomings = Event::all();
        $upcoming = $upcomings->count();

        $user = User::all();
        $users = $user->count();

        $patient = Patient::all();
        $patients = $patient->count();

        return view('welcome', compact('upcoming', 'users', 'patients'));
    }

    public function about() {

        return view('landing.about');
    }
}
