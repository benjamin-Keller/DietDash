<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class PaymentsController extends Controller
{
    public function index() {
        return view('payments.index');
    }
    function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('payments')
                    ->where('user_id', '=', Auth::id())
                    ->where('first_name', 'like', '%'.$query.'%')
                    ->orWhere('last_name', 'like', '%'.$query.'%')
                    ->orWhere('date', 'like', '%'.$query.'%')
                    ->orderBy('first_name', 'desc')
                    ->orderBy('last_name', 'desc')
                    ->get();

            }
            else
            {
                $data = DB::table('payments')
                    ->where('user_id', '=', Auth::id())
                    ->orderBy('first_name', 'desc')
                    ->orderBy('last_name', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                        <tr>
                         <td>'.$row->first_name.' '.$row->last_name.'</td>
                         <td>'.$row->amount.'</td>
                         <td>'.$row->sub_total.'</td>
                         <td>'.$row->total.'</td>
                         <td>'.$row->date.'</td>
';
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

    public function create() {
        $payments = DB::table('payment_types')
            ->select('description')
            ->get()
            ->pluck('description');

        return view('payments.create', compact('payments'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'amount' => 'required|string',
            'sub_total' => '',
            'total' => '',
            'date' => '',
            'payment_info' => 'required',

        ]);

        //Create Payment
        $payment = new Payment();
            $payment->user_id = Auth::id();
            $payment->first_name = $request->input('first_name');
            $payment->last_name = $request->input('last_name');
            $payment->amount = $request->input('amount');
            $payment->sub_total = $request->input('amount');
            $payment->total = $request->input('amount') + $request->input('sub_total');
            $payment->date = Carbon::now();
            $payment->payment_info = $request->input('payment_info');

        $payment->save();

        return redirect('/payments')->with('success', 'Payment Added.');
    }
}
