<?php

namespace App\Http\Controllers;

use App\Patient;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Event;
use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patient_event = DB::table('patients')
            ->select('id', DB::raw("CONCAT(FirstName, ' ', LastName) AS full_name"))
            ->where('user_id', 'like', Auth::id())
            ->where('Deleted', 'like', '0')
            ->get()
            ->sortBy('full_name')
            ->pluck('full_name', 'id');

       return view('events.index', compact('patient_event'));
    }
    public function list()
    {
        $event=Event::latest()->get()->where('Deleted', '=', '0');
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
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'patient_name' => 'required',
                'start' => 'required',
                'end' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with('error', 'Event was Not Added.');
            } else {
                if(empty($request->event_id)) {
                    //Create Event
                    $event = new Event;
                        $event->user_id = Auth::id();
                        $event->title = $request->input('title');
                        $event->patient_name = $request->get('patient_name');
                        $event->start = $request->get('start');
                        $event->end = $request->input('end');
                        $event->Deleted = '0';
                    $event->save();

                    $type = "Added";
                } else {
                    $event = Event::findOrFail($request->event_id);
                        $event->title = $request->input('title');
                        $event->patient_name = $request->get('patient_name');
                        $event->start = $request->get('start');
                        $event->end = $request->input('end');
                        $event->Deleted = '0';
                    $event->save();

                    $type = "Updated";
                }
                return redirect()->back()->with('success', 'Event was '.$type.'!');
            }
        } catch(\Exception $e) {
            return redirect()->back()->with('warning', 'An unexpected error has occurred.');
        }
    }

    public function softDelete($id) {
        $event = Event::findOrFail($id);
            $event->Deleted = '1';
        $event->save();

        return redirect('/events/')->with('success', 'Event Deleted.');
    }

    public function history() {
        $all = Event::all()
            ->where('user_id', '=', Auth::id())
            ->where('patient_name', '=', Patient::all())
            ->toArray();

        $patient_event = DB::table('patients')
            ->select('id', DB::raw("CONCAT(FirstName, ' ', LastName) AS full_name"))
            ->where('user_id', 'like', Auth::id())
            ->where('Deleted', 'like', '0')
            ->get()
            ->sortBy('full_name')
            ->pluck('full_name', 'id');

        return view('events.history', compact('all', 'patient_event'));
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
    public function delete($id)
    {
        //
    }
}

