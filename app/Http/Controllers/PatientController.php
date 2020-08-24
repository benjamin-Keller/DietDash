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
        return view('patients.index');
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
            'MedicalAid' => '',
            'PaymentInfo' => '',
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
            $patient->MedicalAid = $request->input('MedicalAid');
            $patient->PaymentInfo = $request->input('PaymentInfo');
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
            'MedicalAid' => '',
            'PaymentInfo' => '',
            'Deleted' => '',
        ]);

        //Edit Patient
        $patient = Patient::findOrFail($id);
            $patient->FirstName = $request->get('FirstName');
            $patient->LastName = $request->get('LastName');
            $patient->PhoneNumber = $request->get('PhoneNumber');
            $patient->Email = $request->get('Email');
            $patient->MedicalAid = $request->get('MedicalAid');
            $patient->PaymentInfo = $request->get('PaymentInfo');
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
        return view('patients.deleted');
    }
    public function deletedAction(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('patients')
                    ->where('user_id', '=', Auth::id())
                    ->where('Deleted', 'like', '1')
                    ->where('FirstName', 'like', '%'.$query.'%')
                    ->orWhere('LastName', 'like', '%'.$query.'%')
                    ->orWhere('IdNumber', 'like', '%'.$query.'%')
                    ->orWhere('Gender', 'like', '%'.$query.'%')
                    ->orWhere('PhoneNumber', 'like', '%'.$query.'%')
                    ->orWhere('Email', 'like', '%'.$query.'%')
                    ->orderBy('FirstName', 'desc')
                    ->orderBy('LastName', 'desc')
                    ->get();

            }
            else
            {
                $data = DB::table('patients')
                    ->where('user_id', '=', Auth::id())
                    ->where('Deleted', 'like', '1')
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
                         <td>'.$row->IdNumber.'</td>
                         <td>'.$row->PhoneNumber.'</td>
                         <td>'.$row->Email.'</td>
                         <td>
                            <a alt="Delete" href="'.url('/patients/restore/'.$row->id).'" style="color: #ff1744;"><i class="fas fa-trash-restore"></i></a></td>
                        </tr>';
                }
            }


            else
            {
                $output = '<tr>
        <td align="center" colspan="6">No Data Found</td>
       </tr>
       ';
            }
            $data = array(
                'table_data'  => $output,
            );

            echo json_encode($data);
        }
    }

    public function restore($id) {
        $patient = Patient::find($id);
            $patient->Deleted = '0';
        $patient->save();

        return redirect('/patients/deleted/')->with('success', 'Patient Restored.');
    }
}
