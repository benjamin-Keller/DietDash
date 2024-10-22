<?php

namespace App\Http\Controllers;

use App\Patient;
use Carbon\Carbon;
use App\Booking;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{


    //Views
    public function index()
    {

        $bookings = Booking::all()
            ->where('user_id', '=', Auth::id())
            ->where('active', '=', '1')
            ->sortByDesc('date')
            ->sortBy('time')
            ->toArray();

        $patient = DB::table('patients')
            ->select('id', DB::raw("CONCAT(FirstName, ' ', LastName) AS full_name"))
            ->where('user_id', 'like', Auth::id())
            ->where('Deleted', 'like', '0')
            ->get()
            ->sortBy('full_name')
            ->pluck('full_name', 'id');


        return view('bookings.index', compact('bookings', 'patient'));
    }

    public function today() {
        $now = Carbon::today();


        $today = Booking::WhereDate('date', '=', $now)
            ->where('time', '<=', time())
            ->where('user_id', '=', Auth::id())
            ->get();


        return view('bookings.today', compact('today'));
    }

    public function history() {

        $all = Booking::all()
            ->where('user_id', '=', Auth::id())
            ->toArray();


        return view('bookings.history', compact('all'));
    }

    //Add Booking
    public function addBooking(Request $request) {
        $this -> validate($request, [
            'event_name' => 'required',
            'description' => '',
            'patient_name' => '',
            'date' => 'required',
            'time' => 'required',
        ]);

        //Create Booking
        $booking = new Booking;
            $booking->user_id = Auth::id();
            $booking->event_name = $request->input('event_name');
            $booking->patient_name = $request->get('patient_name');
            $booking->description = $request->input('description');
            $booking->date = $request->input('date');
            $booking->time = $request->input('time');
        $booking->save();

        return redirect('/bookings')->with('success', 'Booking Added.');
    }


}
