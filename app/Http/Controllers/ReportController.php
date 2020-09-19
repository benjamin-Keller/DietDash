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

    public function index($id)
    {
        $patient = Patient::find($id);
        $patient_info = Calculator::find($id);

        return view('reports.index', compact('patient', 'id', 'patient_info'));
    }

    public function display($id) {
        $patient = Patient::find($id);
        $patient_info = Calculator::all()
            ->where('patient_name', 'like', $id)
            ->sortByDesc('created_at')
            ->first();

        $Calculator_latest = Calculator::all()
            ->where('patient_name', 'like', $id)
            ->last();

        $history = Calculator::orderby('created_at', 'desc')
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
            case 'moderate':
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

        { //Carbs
            $TEE_Carb_60 = (0.60 * $TEE_Total) / 4;
            $TEE_Carb_55 = (0.55 * $TEE_Total) / 4;
            $TEE_Carb_45 = (0.45 * $TEE_Total) / 4;

        }
        { //Fat
            $TEE_Fat_30 = (0.30 * $TEE_Total) / 9;
            $TEE_Fat_25 = (0.25 * $TEE_Total) / 9;
        }
        { //Protein
            $TEE_Prot_25 = (0.25 * $TEE_Total) / 4;
            $TEE_Prot_20 = (0.20 * $TEE_Total) / 4;
            $TEE_Prot_15 = (0.15 * $TEE_Total) / 4;
        }
        /*{ //60/25/15
            $TEE_Carb = (0.60 * $TEE_Total) / 4;
            $TEE_Fat = (0.25 * $TEE_Total) / 9;
            $TEE_Prot = (0.15 * $TEE_Total) / 4;
        }*/



        return view('reports.display', compact('patient','history', 'patient_info', 'TEE_text',
            'TEE_Carb_60', 'TEE_Carb_55', 'TEE_Carb_45',
            'TEE_Fat_30', 'TEE_Fat_25',
            'TEE_Prot_25', 'TEE_Prot_20', 'TEE_Prot_15', 'TEE_Total'));
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
