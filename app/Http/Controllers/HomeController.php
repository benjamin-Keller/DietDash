<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Patient;
use App\User;

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


        return view('home');
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
                    ->where('user_id', 'like', Auth::user()->id)
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
