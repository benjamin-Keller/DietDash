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
        $patient_info = Calculator::find($id);

        $patient_latest = Patient::find($id);
        $Calculator_latest = Calculator::find($id)->first();

        $history = Calculator::orderby('date', 'desc')
            ->where('patient_name', 'like', $id)
            ->get()
            ->take(3)
            ->toArray();


        switch($Calculator_latest->activeness) {
            case 'sedentary':
                if($Calculator_latest->bmi_class == "Overweight" || $Calculator_latest->bmi_class == "Obese I" || $Calculator_latest->bmi_class == "Obese II" || $Calculator_latest->bmi_class == "Obese III") {
                    $TEE_text = '20 - 25 kcal/kg (Using 25kcal/kg) (Overweight weight)';
                    $TEE = 25;
                } else if($Calculator_latest->bmi_class == "Normal" ) {
                    $TEE_text = '30 kcal/kg (Normal weight)';
                    $TEE = 30;
                } else if($Calculator_latest->bmi_class == "Underweight") {
                    $TEE_text = '30 kcal/kg (Underweight weight)';
                    $TEE = 30;
                }
                break;
            case 'moderately':
                if($Calculator_latest->bmi_class == "Overweight" || $Calculator_latest->bmi_class == "Obese I" || $Calculator_latest->bmi_class == "Obese II" || $Calculator_latest->bmi_class == "Obese III") {
                    $TEE_text = '30 kcal/kg (Overweight weight)';
                    $TEE = 30;
                } else if($Calculator_latest->bmi_class == "Normal" ) {
                    $TEE_text = '35 kcal/kg (Normal weight)';
                    $TEE = 35;
                } else if($Calculator_latest->bmi_class == "Underweight") {
                    $TEE_text = '40 kcal/kg (Underweight weight)';
                    $TEE = 40;
                }
                break;
            case 'very':
                if($Calculator_latest->bmi_class == "Overweight" || $Calculator_latest->bmi_class == "Obese I" || $Calculator_latest->bmi_class == "Obese II" || $Calculator_latest->bmi_class == "Obese III") {
                    $TEE_text = '35 kcal/kg (Overweight weight)';
                    $TEE = 35;
                } else if($Calculator_latest->bmi_class == "Normal" ) {
                    $TEE_text = '40 kcal/kg (Normal weight)';
                    $TEE = 40;
                } else if($Calculator_latest->bmi_class == "Underweight") {
                    $TEE_text = '45 - 50 kcal/kg (Using 50kcal/kg) (Underweight weight)';
                    $TEE = 50;
                }
                break;
            default:
                $TEE_text = 'Insufficient Data';
                $TEE = 0;

                break;
        }

        $TEE_Total = $TEE * $Calculator_latest->weight;

        $TEE_Carb = 0.60 * $TEE_Total;
        $TEE_Fat = 0.25 * $TEE_Total;
        $TEE_Prot = 0.15 * $TEE_Total;


        return view('reports.display', compact('patient','history', 'patient_info', 'TEE_text', 'TEE_Carb', 'TEE_Fat', 'TEE_Prot', 'TEE_Total'));
    }

    public function exportPDF($id) {
        $patientInfo = Patient::find($id);
        $calc = DB::table('calculators')
            ->where('patient_name', 'like', $id)
            ->latest('date')
            ->first();

        $pdf = PDF::loadView('exports.export', compact('patientInfo','calc'));

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

        $pdf = PDF::loadView('exports.exportFull', compact('patientInfo','history', 'calc'));

        return $pdf->download($patientInfo->LastName.'_'.$patientInfo->FirstName.'-full_report.pdf');
    }

}
