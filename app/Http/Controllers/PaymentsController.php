<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Payment;
use App\Payments;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
use PDF;

class PaymentsController extends Controller
{
    public function index() {

        return view('payments.index', ['payments' => Payments::all()->where('user_id', Auth::user()->id)->all(), ]);
    }

    public function create() {
        $payments = DB::table('payment_types')
            ->select('description')
            ->get()
            ->pluck('description');

        $patient = DB::table('patients')
            ->select('id', DB::raw("CONCAT(FirstName, ' ', LastName) AS full_name"))
            ->where('user_id', '=', Auth::id())
            ->where('Deleted', 'like', '0')
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
        $payments = Payment::find($id);


        $pdf = PDF::loadView('payments.export', compact( 'patientInfo','payments'));

        return $pdf->download($payments->patient_name.'-invoice.pdf');
    }
}
