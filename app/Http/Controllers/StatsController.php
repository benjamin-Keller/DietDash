<?php

namespace App\Http\Controllers;

use App\Event;
use App\Patient;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function index() {
        $now = Carbon::today();

        $todays = Event::WhereDate('start', '=', $now)->where('Deleted', '=', '0')->where('user_id', '=', Auth::id())->get();

        $upcomings = Event::WhereDate('start', '>=', $now)->where('user_id', '=', Auth::id())->where('Deleted', '=', '0')->get();

        return view('stats.index', [
            'userCount' => User::count(),
            'today' => $todays->count(),
            'upcoming' => $upcomings->count(),
            'bookings' => Event::all()->where('user_id', '=', Auth::id())->toArray(),
            'patient_event' => DB::table('patients')->select('id', DB::raw("CONCAT(FirstName, ' ', LastName) AS full_name"))->where('user_id', 'like', Auth::id())->where('Deleted', 'like', '0')->get()->sortBy('full_name')->pluck('full_name', 'id'),
            'patients' => Patient::all()->where('user_id', Auth::user()->id)->where('Deleted', 'like', '0')->all()]);
    }

}
