<?php

namespace App\Http\Controllers;

use App\Patient;
use App\User;
use App\Payment;

use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;

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

        return view('patients.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'FirstName' => 'required|string',
            'LastName' => 'required|string',
            'Age' => 'required|numeric|between:0,999.99',
            'Gender' => 'required|string',
            'IdNumber' => 'required|unique:patients,IdNumber',
            'Email' => 'email',
        ]);

        //Create Patient
        $patient = new Patient;
            $patient->IdNumber = $request->get('IdNumber');
            $patient->Gender = $request->get('Gender');
        $this->PatientRequest($patient, $request);

        return redirect('/patients')->with('success', 'Patient Added.');
    }

    public function edit($id) {
        $patient = Patient::find($id);

        return view('patients.edit', compact('patient', 'id'));
    }
    public function editReport($id) {
        $patient = Patient::find($id);

        return view('reports.edit', compact('patient', 'id'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'FirstName' => 'required|string',
            'LastName' => 'required|string',
        ]);

        $patient = Patient::findOrFail($id);

            $this->PatientRequest($patient, $request);

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

    /**
     * @param $patient
     * @param Request $request
     */
    public function PatientRequest($patient, Request $request): void
    {
        //Edit Patient
        $patient->user_id = Auth::id();
        $patient->FirstName = $request->get('FirstName');
        $patient->LastName = $request->get('LastName');
        $patient->Age = $request->get('Age');
        $patient->PhoneNumber = $request->get('PhoneNumber');
        $patient->Email = $request->get('Email');

        $patient->home_language = $request->get('home_language');
        $patient->household_size = $request->get('household_size');
        $patient->approx_Income = $request->get('approx_Income');

        $patient->address_ln1 = $request->get('address_ln1');
        $patient->address_ln2 = $request->get('address_ln2');
        $patient->city = $request->get('city');
        $patient->province = $request->get('province');
        $patient->country = $request->get('country');
        $patient->zip = $request->get('zip');

        $patient->Deleted = '0';
        $patient->save();
    }
}
