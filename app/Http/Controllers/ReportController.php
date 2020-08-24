<?php

namespace App\Http\Controllers;

use App\Calculator;
use App\Patient;

use PDF;
use DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $patient = Patient::all();

        return view('reports.index', compact('patient'));
    }

    public function show($id) {
        $patient = Patient::find($id);
        $patient_info = Calculator::find($id);

        return view('reports.show', compact('patient', 'id', 'patient_info'));
    }

    public function display($id) {
        $patient = Patient::find($id);

        $history = Calculator::orderby('date', 'desc')
            ->where('patient_name', 'like', $id)
            ->get()
            ->take(3)
            ->toArray();
        return view('reports.display', compact('patient','history'));
    }

    public function exportPDF($id) {
        $patientInfo = Patient::find($id);
        $calc = DB::table('calculators')
            ->where('patient_name', 'like', $id)
            ->latest('date')
            ->first();

        $pdf = PDF::loadView('reports.export', compact('patientInfo','calc'));

        return $pdf->download($patientInfo->LastName.'_'.$patientInfo->FirstName.'-latest_report.pdf');
    }

    public function exportFullPDF($id) {
        $patientInfo = Patient::find($id);
        $calc = DB::table('calculators')
            ->where('patient_name', 'like', $id)
            ->latest('date')
            ->first();

        $history = Calculator::orderby('date', 'desc')
            ->where('patient_name', 'like', $id)
            ->get()
            ->take(3)
            ->toArray();

        $pdf = PDF::loadView('reports.exportFull', compact('patientInfo','history', 'calc'));

        return $pdf->download($patientInfo->LastName.'_'.$patientInfo->FirstName.'-full_report.pdf');
    }

}
