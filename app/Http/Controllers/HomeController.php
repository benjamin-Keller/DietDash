<?php

namespace App\Http\Controllers;

use App\Event;
use App\Patient;
use App\User;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $now = Carbon::today();

        $todays = Event::WhereDate('start', '=', $now)->where('Deleted', '=', '0')->where('user_id', '=', Auth::id())->get();

        $upcomings = Event::WhereDate('start', '>=', $now)->where('user_id', '=', Auth::id())->where('Deleted', '=', '0')->get();

        return view('home', [
            'userCount' => User::count(),
            'today' => $todays->count(),
            'upcoming' => $upcomings->count(),
            'bookings' => Event::all()->where('user_id', '=', Auth::id())->toArray(),
            'patient_event' => DB::table('patients')->select('id', DB::raw("CONCAT(FirstName, ' ', LastName) AS full_name"))->where('user_id', 'like', Auth::id())->where('Deleted', 'like', '0')->get()->sortBy('full_name')->pluck('full_name', 'id'),
            'patients' => Patient::all()->where('user_id', Auth::user()->id)->where('Deleted', 'like', '0')->all()]);
    }

    function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('patients')
                    ->where('user_id', '=', Auth::user()->id)
                    ->where('Deleted', 'like', '0')
                    ->where('FirstName', 'like', '%'.$query.'%')
                    ->orWhere('LastName', 'like', '%'.$query.'%')
                    ->orWhere('Gender', 'like', '%'.$query.'%')
                    ->orWhere('IdNumber', 'like', '%'.$query.'%')
                    ->orWhere('PhoneNumber', 'like', '%'.$query.'%')
                    ->orWhere('Email', 'like', '%'.$query.'%')
                    ->orderBy('FirstName', 'desc')
                    ->orderBy('LastName', 'desc')
                    ->get();

            }
            else
            {
                $data = DB::table('patients')
                    ->where('user_id', '=', Auth::user()->id)
                    ->where('Deleted', 'like', '0')
                    ->orderBy('FirstName', 'desc')
                    ->orderBy('LastName', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                        <tr>
                         <td>'.$row->FirstName.'</td>
                         <td>'.$row->LastName.'</td>
                         <td>'.$row->Gender.'</td>
                         <td>'.$row->IdNumber.'</td>
                         <td>'.$row->PhoneNumber.'</td>
                         <td>'.$row->Email.'</td>
                         <td><a alt="Edit" href="'.url('/patients/edit/'.$row->id).'"><i class="far fa-edit"></i></a>
                            <a alt="Report" href="'.url('/reports/'.$row->id).'" style="color: #00b248;"><i class="fas fa-book"></i></a>
                            <a alt="Delete" href="'.url('/patients/delete/'.$row->id).'" style="color: #ff1744;"><i class="far fa-trash-alt"></i></a></td>
                        </tr>';
                }
            }


            else
            {
                $output = '<tr>
        <td align="center" colspan="7">No Data Found</td>
       </tr>
       ';
            }
            $data = array(
                'table_data'  => $output,
            );

            echo json_encode($data);
        }
    }
}
