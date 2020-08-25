<?php

namespace App\Http\Controllers;

use App\Patient;
use App\User;
use App\Payment;

use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function patient() {
        $userCount = User::count();

        return view('patient.users', compact('userCount'));
    }

    public function index()
    {

        return view('patients.index', ['patients' => Patient::all()->where('user_id', Auth::user()->id)->where('Deleted', 'like', '0')->all(),]);
    }

    public function create() {
        $payments = DB::table('payment_types')
            ->select('description')
            ->get()
            ->pluck('description');

        return view('patients.create', compact('payments'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'FirstName' => 'required|string',
            'LastName' => 'required|string',
            'Gender' => 'required|string',
            'IdNumber' => 'required|unique:patients,IdNumber',
            'PhoneNumber' => '',
            'Email' => 'email',
            'Deleted' => '',
        ]);

        //Create Patient

        $patient = new Patient;
            $patient->user_id = Auth::id();
            $patient->FirstName = $request->input('FirstName');
            $patient->LastName = $request->input('LastName');
            $patient->Gender = $request->input('Gender');
            $patient->IdNumber = $request->input('IdNumber');
            $patient->PhoneNumber = $request->input('PhoneNumber');
            $patient->Email = $request->input('Email');
            $patient->Deleted = '0';
        $patient->save();

        return redirect('/patients')->with('success', 'Patient Added.');
    }

    public function edit($id) {
        $patient = Patient::find($id);

        $payments = DB::table('payment_types')
            ->select('description')
            ->get()
            ->pluck('description');

        return view('patients.edit', compact('patient', 'id', 'payments'));
    }
    public function editReport($id) {
        $patient = Patient::find($id);

        return view('reports.edit', compact('patient', 'id'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'FirstName' => 'required|string',
            'LastName' => 'required|string',
            'PhoneNumber' => '',
            'Email' => '',
            'Deleted' => '',
        ]);

        //Edit Patient
        $patient = Patient::findOrFail($id);
            $patient->FirstName = $request->get('FirstName');
            $patient->LastName = $request->get('LastName');
            $patient->PhoneNumber = $request->get('PhoneNumber');
            $patient->Email = $request->get('Email');
            $patient->Deleted = '0';
        $patient->save();

        return redirect('/patients/edit/'.$id);
    }

    public function softDelete($id) {
        $patient = Patient::find($id);
            $patient->Deleted = '1';
        $patient->save();

        return redirect('/patients/')->with('success', 'Patient Deleted.');
    }

    public function deleted() {
        return view('patients.deleted', ['patients' => Patient::all()->where('user_id', Auth::user()->id)->where('Deleted', 'like', '1')->all(),]);
    }

    public function restore($id) {
        $patient = Patient::find($id);
            $patient->Deleted = '0';
        $patient->save();

        return redirect('/patients/deleted/')->with('success', 'Patient Restored.');
    }
}
