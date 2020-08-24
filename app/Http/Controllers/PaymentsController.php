<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Payment;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
use PDF;

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
                    ->orWhere('patient_name', 'like', '%'.$query.'%')
                    ->orWhere('date', 'like', '%'.$query.'%')
                    ->orderBy('patient_name', 'desc')
                    ->get();

            }
            else
            {
                $data = DB::table('payments')
                    ->where('user_id', '=', Auth::id())
                    ->orderBy('patient_name', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                        <tr>
                         <td>'.$row->patient_name.'</td>
                         <td>'.$row->amount.'</td>
                         <td>'.$row->sub_total.'</td>
                         <td>'.$row->total.'</td>
                         <td>'.$row->date.'</td>
                         <td><a alt="Report" href="'.url('/payments/'.$row->id.'/export').'" style="color: #00b248;"><i class="fas fa-file-pdf"></i></a>
                            </td>
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

        $patient = DB::table('patients')
            ->select('id', DB::raw("CONCAT(FirstName, ' ', LastName) AS full_name"))
            ->where('user_id', '=', Auth::id())
            ->get()
            ->sortBy('full_name')
            ->pluck('full_name', 'id');

        $user = DB::table('user')
            ->where('id', 'like', Auth::id());

        return view('payments.create', compact('payments', 'patient', 'user'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'patient_name' => '',
            'amount' => 'required|string',
            'sub_total' => '',
            'total' => '',
            'date' => '',
            'payment_info' => 'required',

        ]);

        //Create Payment
        $payment = new Payment();
            $payment->user_id = Auth::id();
            $payment->patient_name = $request->get('patient_name');
            $payment->amount = $request->input('amount');
            $payment->sub_total = $request->input('amount');
            $payment->total = $request->input('amount') + $request->input('sub_total');
            $payment->date = Carbon::now()->toFormattedDateString();
            $payment->payment_info = $request->input('payment_info');

        $payment->save();

        return redirect('/payments')->with('success', 'Payment Added.');
    }

    public function exportPDF($id) {
        $patientInfo = Patient::find($id);

        $payments = DB::table('payments')
            ->where('patient_name', 'like', $id)
            ->first();

        $pdf = PDF::loadView('payments.export', compact('patientInfo','payments'));

        return $pdf->download($patientInfo->LastName.'_'.$patientInfo->FirstName.'-invoice.pdf');
    }
}
