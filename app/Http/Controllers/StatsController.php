<?php

namespace App\Http\Controllers;

use App\Event;
use App\Patient;
use App\Patient_Disease;
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

        $arthritis = Patient_Disease::where('arthritis', '=', '1')->count();
        $renal_failure = Patient_Disease::where('renal_failure', '=', '1')->count();
        $dehydration = Patient_Disease::where('dehydration', '=', '1')->count();
        $underweight = Patient_Disease::where('underweight', '=', '1')->count();
        $diabetes = Patient_Disease::where('diabetes', '=', '1')->count();
        $hiv = Patient_Disease::where('hiv', '=', '1')->count();
        $mam = Patient_Disease::where('mam', '=', '1')->count();
        $wasted = Patient_Disease::where('wasted', '=', '1')->count();
        $epilepsy = Patient_Disease::where('epilepsy', '=', '1')->count();
        $pneumonia = Patient_Disease::where('pneumonia', '=', '1')->count();
        $sam = Patient_Disease::where('sam', '=', '1')->count();
        $hypertension = Patient_Disease::where('hypertension', '=', '1')->count();
        $tb = Patient_Disease::where('tb', '=', '1')->count();
        $stunted = Patient_Disease::where('stunted', '=', '1')->count();

        return view('stats.index', [
            'userCount' => User::count(),
            'today' => $todays->count(),
            'upcoming' => $upcomings->count(),
            'bookings' => Event::all()->where('user_id', '=', Auth::id())->toArray(),
            'patient_event' => DB::table('patients')->select('id', DB::raw("CONCAT(FirstName, ' ', LastName) AS full_name"))->where('user_id', 'like', Auth::id())->where('Deleted', 'like', '0')->get()->sortBy('full_name')->pluck('full_name', 'id'),
            'patients' => Patient::all()->where('user_id', Auth::user()->id)->where('Deleted', 'like', '0')->all(),
            'arthritis' => $arthritis,
            'renal_failure' => $renal_failure,
            'dehydration' => $dehydration,
            'underweight' => $underweight,
            'diabetes' => $diabetes,
            'hiv' => $hiv,
            'mam' => $mam,
            'wasted' => $wasted,
            'epilepsy' => $epilepsy,
            'pneumonia' => $pneumonia,
            'sam' => $sam,
            'hypertension' => $hypertension,
            'tb' => $tb,
            'stunted' => $stunted,
            ]);
    }

}
