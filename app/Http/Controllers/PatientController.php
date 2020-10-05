<?php

namespace App\Http\Controllers;

use App\Diseases;
use App\Patient;
use App\Patient_Disease;
use App\User;
use App\Payment;

use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;

class PatientController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    public function patient() {
        $userCount = User::count();

        return view('patient.users', compact('userCount'));
    }

    public function index() {
        return view('patients.index', ['patients' => Patient::all()->where('user_id', Auth::user()->id)->where('Deleted', 'like', '0')->all(),]);
    }

    public function create() {
        $NonC = DB::table('diseases')
            ->select('id', 'name')
            ->where('group', 'like', 'Non-Communicable')
            ->get()
            ->sortBy('name')
            ->pluck('name', 'id');
        $Con = DB::table('diseases')
            ->select('id', 'name')
            ->where('group', 'like', 'Communicable')
            ->get()
            ->sortBy('name')
            ->pluck('name', 'id');
        $Paed = DB::table('diseases')
            ->select('id', 'name')
            ->where('group', 'like', 'Paediatrics')
            ->get()
            ->sortBy('name')
            ->pluck('name', 'id');

        $diseases = Diseases::all('name');
        return view('patients.create', compact('NonC','Con', 'Paed'));
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

        $disease = new Patient_Disease;
            $disease->patient_id = $patient->id;
            $this->PatientDisease($disease, $request);
            $disease->save();

        return redirect('/patients')->with('success', 'Patient Added.');
    }

    public function edit($id) {
        $patient = Patient::find($id);
        $disease = Patient_Disease::where('patient_id', 'like', $id)->get();

        return view('patients.edit', compact('patient', 'id', 'disease'));
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

        $disease = Patient_Disease::where('patient_id', 'like', $id)->first();
            $this->PatientDisease($disease, $request);
            $disease->save();

        return redirect('/patients/edit/'.$id);
    }

    public function softDelete($id) {
        $patient = Patient::find($id);
            $patient->Deleted = '1';
        $patient->save();

        return redirect()->back()->with('success', 'Patient Deleted.');
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
    public function PatientRequest($patient, Request $request): void {
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


    public function PatientDisease($disease, Request $request) {
        if(in_array('Arthritis', $request->get('disease'))) {
            $disease->arthritis = 1;
        } else {
            $disease->arthritis = 0;
        }
        if(in_array('Renal_Failure', $request->get('disease'))) {
            $disease->renal_failure = 1;
        } else {
            $disease->renal_failure = 0;
        }
        if(in_array('Dehydration', $request->get('disease'))) {
            $disease->dehydration = 1;
        } else {
            $disease->dehydration = 0;
        }
        if(in_array('Underweight', $request->get('disease'))) {
            $disease->underweight = 1;
        } else {
            $disease->underweight = 0;
        }
        if(in_array('Diabetes', $request->get('disease'))) {
            $disease->diabetes = 1;
        } else {
            $disease->diabetes = 0;
        }
        if(in_array('HIV', $request->get('disease'))) {
            $disease->hiv = 1;
        } else {
            $disease->hiv = 0;
        }
        if(in_array('MAM', $request->get('disease'))) {
            $disease->mam = 1;
        } else {
            $disease->mam = 0;
        }
        if(in_array('Wasted', $request->get('disease'))) {
            $disease->wasted = 1;
        } else {
            $disease->wasted = 0;
        }
        if(in_array('Epilepsy', $request->get('disease'))) {
            $disease->epilepsy = 1;
        } else {
            $disease->epilepsy = 0;
        }
        if(in_array('Pneumonia', $request->get('disease'))) {
            $disease->pneumonia = 1;
        } else {
            $disease->pneumonia = 0;
        }
        if(in_array('SAM', $request->get('disease'))) {
            $disease->sam = 1;
        } else {
            $disease->sam = 0;
        }
        if(in_array('Hypertension', $request->get('disease'))) {
            $disease->hypertension = 1;
        } else {
            $disease->hypertension = 0;
        }
        if(in_array('TB', $request->get('disease'))) {
            $disease->tb = 1;
        } else {
            $disease->tb = 0;
        }
        if(in_array('Stunted', $request->get('disease'))) {
            $disease->stunted = 1;
        } else {
            $disease->stunted = 0;
        }

    }
}
