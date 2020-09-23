<?php

namespace App\Http\Controllers;

use App\Patient;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Event;
use Carbon\Carbon;

class EventController extends Controller
{
    //Misc query lookups
    public function booking() {

        $now = Carbon::today();
        $userCount = User::count();

        $todays = Booking::WhereDate('start', '=', $now)
            ->where('user_id', '=', Auth::id())
            ->get();

        $today = $todays->count();

        $upcomings = Event::WhereDate('start', '>=', $now)
            ->where('user_id', '=', Auth::id())
            ->get();

        $upcoming = $upcomings->count();

        $bookings = Event::all()
            ->where('user_id', '=', Auth::id())
            ->toArray();

        return view('home', ['userCount' => $userCount, 'today' => $today, 'upcoming' => $upcoming, 'bookings' => $bookings, 'patients' => Patient::all()->where('user_id', Auth::user()->id)->where('Deleted', 'like', '0')->all(),]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('events.index');
    }
    public function list()
    {
        $event=Event::latest()->get();
        return response()->json($event, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Event was Not Added.');
        } else {
            //Create Event
            if($request->input('allDay') == 1) {
                $event = new Event;
                    $event->user_id = Auth::id();
                    $event->title = $request->input('title');
                    $event->start = $request->get('start');
                    $event->end = $request->input('end');
                    $event->allDay = 1;
                $event->save();
            } else {
                $event = new Event;
                    $event->user_id = Auth::id();
                    $event->title = $request->input('title');
                    $event->start = $request->get('start');
                    $event->end = $request->input('end');
                $event->save();
            }

            return redirect()->back()->with('success', 'Event was Added.');
        }
    }

    public function history() {

        $all = Event::all()
            ->where('user_id', '=', Auth::id())
            ->toArray();

        return view('events.history', compact('all'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

