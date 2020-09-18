<?php

namespace App\Http\Controllers;

use App\Calculator;
use App\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CalculatorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $patient = DB::table('patients')
            ->select('id', DB::raw("CONCAT(FirstName, ' ', LastName) AS full_name"))
            ->where('user_id', '=', Auth::id())
            ->where('Deleted', 'like', '0')
            ->get()
            ->sortBy('full_name')
            ->pluck('full_name', 'id');

        return view('calculator.index', compact('patient'));
    }


    public function store(Request $request) {

        $this -> validate($request, [
            'patient_name' => 'required',
            'activeness' => 'required',

            'weight' => 'required|numeric|between:0,999.99',
            'height' => 'required|numeric|between:0,999.99',
            'waist' => 'required|numeric|between:0,900',
            'hip' => 'required|numeric|between:0,999.99',

            'muac' => 'required',
            'tricept_skinfold' => 'required',

        ]);

        $Patient = Patient::find($request->get('patient_name'));

        //Calculate BMI
        $Height = $request->input('height');
        $Weight = $request->input('weight');
        $bmi = $Weight / ($Height * $Height);

            //BMI Classification
            if($bmi < 18.5) {
                $Classification = 'Underweight';
            } else if($bmi >= 18.5 && $bmi < 25) {
                $Classification = 'Normal';
            } else if($bmi >= 25 && $bmi < 30) {
                $Classification = 'Overweight';
            } else if($bmi >= 30 && $bmi < 35) {
                $Classification = 'Obese I';
            } else if($bmi >= 35 && $bmi < 40) {
                $Classification = 'Obese II';
            } else if($bmi >= 40) {
                $Classification = 'Obese III';
            }

        //Calculate W/H Ratio
        $WH_ratio = $request->input('waist') / $request->input('hip');

            if($Patient->Gender == "Male") {
                if($WH_ratio < 0.85) {
                    $WH_Class = "Underweight";
                } else if($WH_ratio >= 0.85 && $WH_ratio < 0.89) {
                    $WH_Class = "Ideal";
                } else if($WH_ratio >= 0.90 && $WH_ratio < 0.95) {
                    $WH_Class = "Overweight";
                } else if($WH_ratio >= 0.95) {
                    $WH_Class = "Obese";
                }
            }
            if($Patient->Gender == "Female") {
                if($WH_ratio < 0.75) {
                    $WH_Class = "Underweight";
                } else if($WH_ratio >= 0.75 && $WH_ratio < 0.79) {
                    $WH_Class = "Ideal";
                } else if($WH_ratio >= 0.80 && $WH_ratio < 0.86) {
                    $WH_Class = "Overweight";
                } else if($WH_ratio >= 0.86) {
                    $WH_Class = "Obese";
                }
            }


        //Bio Chemestry
        if($request->input('sodium') == null) {
            $sodium = 'n/a';
        } else if($request->input('sodium') >= 135) {
            $sodium = 'Normal';
        } else if($request->input('sodium') < 135) {
            $sodium = 'Low';
        } else if($request->input('sodium') >= 147) {
            $sodium = 'High';
        }
        if($request->input('potassium') == null) {
            $potassium = 'n/a';
        } else if($request->input('potassium') >= 3.3) {
            $potassium = 'Normal';
        } else if($request->input('potassium') < 3.3) {
            $potassium = 'Low';
        } else if($request->input('potassium') >= 5.0) {
            $potassium = 'High';
        }
        if($request->input('chloride') == null) {
            $chloride = 'n/a';
        } else if($request->input('chloride') >= 99) {
            $chloride = 'Normal';
        } else if($request->input('chloride') < 99) {
            $chloride = 'Low';
        } else if($request->input('chloride') >= 111) {
            $chloride = 'High';
        }
        if($request->input('urea') == null) {
            $urea = 'n/a';
        } else if($request->input('urea') >= 2.6) {
            $urea = 'Normal';
        } else if($request->input('urea') < 2.6) {
            $urea = 'Low';
        } else if($request->input('urea') >= 7) {
            $urea = 'High';
        }
        if($request->input('creatinine') == null) {
            $creatinine = 'n/a';
        } else if($request->input('creatinine') >= 60) {
            $creatinine = 'Normal';
        } else if($request->input('creatinine') < 60) {
            $creatinine = 'Low';
        } else if($request->input('creatinine') >= 120) {
            $creatinine = 'High';
        }
        if($request->input('egfr') == null) {
            $egfr = 'n/a';
        } else if($request->input('egfr') >= 90) {
            $egfr = 'Normal';
        } else if($request->input('egfr') < 90) {
            $egfr = 'Low';
        } else if($request->input('egfr') >= 120) {
            $egfr = 'High';
        }
        if($request->input('hba1c') == null) {
            $hba1c = 'n/a';
        } else if($request->input('hba1c') >= 4) {
            $hba1c = 'Normal';
        } else if($request->input('hba1c') < 4) {
            $hba1c = 'Low';
        } else if($request->input('hba1c') >= 5.6) {
            $hba1c = 'High';
        }
        if($request->input('uric_acid') == null) {
            $uric_acid = 'n/a';
        } else if($request->input('uric_acid') >= 0.2) {
            $uric_acid = 'Normal';
        } else if($request->input('uric_acid') < 0.2) {
            $uric_acid = 'Low';
        } else if($request->input('uric_acid') >= 0.59) {
            $uric_acid = 'High';
        }
        if($request->input('cholesterol') == null) {
            $cholesterol = 'n/a';
        } else if($request->input('cholesterol') >= 3.8) {
            $cholesterol = 'Normal';
        } else if($request->input('cholesterol') < 3.8) {
            $cholesterol = 'Low';
        } else if($request->input('cholesterol') >= 5.7) {
            $cholesterol = 'High';
        }
        if($request->input('triglycerides') == null) {
            $triglycerides = 'n/a';
        } else if($request->input('triglycerides') >= 0.5) {
            $triglycerides = 'Normal';
        } else if($request->input('triglycerides') < 0.5) {
            $triglycerides = 'Low';
        } else if($request->input('triglycerides') >= 2.5) {
            $triglycerides = 'High';
        }
        if($request->input('hdl') == null) {
            $hdl = 'n/a';
        } else if($request->input('hdl') >= 0.5) {
            $hdl = 'Normal';
        } else if($request->input('hdl') < 0.5) {
            $hdl = 'Low';
        } else if($request->input('hdl') > 0.5) {
            $hdl = 'High';
        }
        if($request->input('ldl') == null) {
            $ldl = 'n/a';
        } else if($request->input('ldl') >= 4.4) {
            $ldl = 'Normal';
        } else if($request->input('ldl') < 4.4) {
            $ldl = 'Low';
        } else if($request->input('ldl') > 4.4) {
            $ldl = 'High';
        }
        if($request->input('vldl') == null) {
            $vldl = 'n/a';
        } else if($request->input('vldl') >= 0.1) {
            $vldl = 'Normal';
        } else if($request->input('vldl') < 0.1) {
            $vldl = 'Low';
        } else if($request->input('vldl') >= 2.32) {
            $vldl = 'High';
        }
        if($request->input('total_protein') == null) {
            $total_protein = 'n/a';
        } else if($request->input('total_protein') >= 60) {
            $total_protein = 'Normal';
        } else if($request->input('total_protein') < 60) {
            $total_protein = 'Low';
        } else if($request->input('total_protein') >= 80) {
            $total_protein = 'High';
        }
        if($request->input('albumin') == null) {
            $albumin = 'n/a';
        } else if($request->input('albumin') >= 30) {
            $albumin = 'Normal';
        } else if($request->input('albumin') < 30) {
            $albumin = 'Low';
        } else if($request->input('albumin') >= 80) {
            $albumin = 'High';
        }
        if($request->input('calcium') == null) {
            $calcium = 'n/a';
        } else if($request->input('calcium') >= 2.1) {
            $calcium = 'Normal';
        } else if($request->input('calcium') < 2.1) {
            $calcium = 'Low';
        } else if($request->input('calcium') >= 2.5) {
            $calcium = 'High';
        }
        if($request->input('phosphorus') == null) {
            $phosphorus = 'n/a';
        } else if($request->input('phosphorus') >= 0.8) {
            $phosphorus = 'Normal';
        } else if($request->input('phosphorus') < 0.8) {
            $phosphorus = 'Low';
        } else if($request->input('phosphorus') >= 1.4) {
            $phosphorus = 'High';
        }
        if($request->input('magnesium') == null) {
            $magnesium = 'n/a';
        } else if($request->input('magnesium') >= 0.74) {
            $magnesium = 'Normal';
        } else if($request->input('magnesium') < 0.74) {
            $magnesium = 'Low';
        } else if($request->input('magnesium') >= 0.99) {
            $magnesium = 'High';
        }
        if($Patient->Gender == "Male") {
            if($request->input('copper') == null) {
                $copper = 'n/a';
            } else if ($request->input('copper') >= 10.5) {
                $copper = 'Normal';
            } else if ($request->input('copper') < 10.5) {
                $copper = 'Low';
            } else if ($request->input('copper') >= 21) {
                $copper = 'High';
            }
        }
        if($Patient->Gender == "Female") {
            if($request->input('copper') == null) {
                $copper = 'n/a';
            } else if($request->input('copper') >= 13.2) {
                $copper = 'Normal';
            } else if($request->input('copper') < 13.2) {
                $copper = 'Low';
            } else if($request->input('copper') >= 22.5) {
                $copper = 'High';
            }
        }

        if($request->input('zinc') == null) {
            $zinc = 'n/a';
        } else if($request->input('zinc') >= 11.6) {
            $zinc = 'Normal';
        } else if($request->input('zinc') < 11.6) {
            $zinc = 'Low';
        } else if($request->input('zinc') >= 22.5) {
            $zinc = 'High';
        }
        if($request->input('bilirubin_total') == null) {
            $bilirubin_total = 'n/a';
        } else if($request->input('bilirubin_total') >= 2) {
            $bilirubin_total = 'Normal';
        } else if($request->input('bilirubin_total') < 2) {
            $bilirubin_total = 'Low';
        } else if($request->input('bilirubin_total') >= 21) {
            $bilirubin_total = 'High';
        }
        if($request->input('bilirubin_conj') == null) {
            $bilirubin_conj = 'n/a';
        } else if($request->input('bilirubin_conj') >= 0) {
            $bilirubin_conj = 'Normal';
        } else if($request->input('bilirubin_conj') < 0) {
            $bilirubin_conj = 'Low';
        } else if($request->input('bilirubin_conj') >= 8) {
            $bilirubin_conj = 'High';
        }
        if($request->input('bilirubin_unconj') == null) {
            $bilirubin_unconj = 'n/a';
        } else if($request->input('bilirubin_unconj') >= 1) {
            $bilirubin_unconj = 'Normal';
        } else if($request->input('bilirubin_unconj') < 1) {
            $bilirubin_unconj = 'Low';
        } else if($request->input('bilirubin_unconj') >= 17) {
            $bilirubin_unconj = 'High';
        }
        if($request->input('ast') == null) {
            $ast = 'n/a';
        } else if($request->input('ast') >= 0) {
            $ast = 'Normal';
        } else if($request->input('ast') < 0) {
            $ast = 'Low';
        } else if($request->input('ast') >= 31) {
            $ast = 'High';
        }
        if($request->input('alt') == null) {
            $alt = 'n/a';
        } else if($request->input('alt') >= 0) {
            $alt = 'Normal';
        } else if($request->input('alt') < 0) {
            $alt = 'Low';
        } else if($request->input('alt') >= 31) {
            $alt = 'High';
        }
        if($request->input('ldh') == null) {
            $ldh = 'n/a';
        } else if($request->input('ldh') >= 230) {
            $ldh = 'Normal';
        } else if($request->input('ldh') < 230) {
            $ldh = 'Low';
        } else if($request->input('ldh') >= 462) {
            $ldh = 'High';
        }
        if($request->input('ggt') == null) {
            $ggt = 'n/a';
        } else if($request->input('ggt') >= 0) {
            $ggt = 'Normal';
        } else if($request->input('ggt') < 0) {
            $ggt = 'Low';
        } else if($request->input('ggt') >= 35) {
            $ggt = 'High';
        }
        if($request->input('alp') == null) {
            $alp = 'n/a';
        } else if($request->input('alp') >= 40) {
            $alp = 'Normal';
        } else if($request->input('alp') < 40) {
            $alp = 'Low';
        } else if($request->input('alp') >= 120) {
            $alp = 'High';
        }
        if($request->input('wbc') == null) {
            $wbc = 'n/a';
        } else if($request->input('wbc') >= 4) {
            $wbc = 'Normal';
        } else if($request->input('wbc') < 4) {
            $wbc = 'Low';
        } else if($request->input('wbc') >= 11000000000) {
            $wbc = 'High';
        }
        if($request->input('rbc') == null) {
            $rbc = 'n/a';
        } else if($request->input('rbc') >= 4) {
            $rbc = 'Normal';
        } else if($request->input('rbc') < 4) {
            $rbc = 'Low';
        } else if($request->input('rbc') >= 5700000000000) {
            $rbc = 'High';
        }
        if($request->input('haemoglobin') == null) {
            $haemoglobin = 'n/a';
        } else if($request->input('haemoglobin') >= 11.5) {
            $haemoglobin = 'Normal';
        } else if($request->input('haemoglobin') < 11.5) {
            $haemoglobin = 'Low';
        } else if($request->input('haemoglobin') >= 16.5) {
            $haemoglobin = 'High';
        }
        if($request->input('haematocrit') == null) {
            $haematocrit = 'n/a';
        } else if($request->input('haematocrit') >= 36) {
            $haematocrit = 'Normal';
        } else if($request->input('haematocrit') < 36) {
            $haematocrit = 'Low';
        } else if($request->input('haematocrit') >= 50) {
            $haematocrit = 'High';
        }
        if($request->input('mcv') == null) {
            $mcv = 'n/a';
        } else if($request->input('mcv') >= 80) {
            $mcv = 'Normal';
        } else if($request->input('mcv') < 80) {
            $mcv = 'Low';
        } else if($request->input('mcv') >= 100) {
            $mcv = 'High';
        }
        if($request->input('mch') == null) {
            $mch = 'n/a';
        } else if($request->input('mch') >= 26) {
            $mch = 'Normal';
        } else if($request->input('mch') < 26) {
            $mch = 'Low';
        } else if($request->input('mch') >= 34) {
            $mch = 'High';
        }
        if($request->input('mchc') == null) {
            $mchc = 'n/a';
        } else if($request->input('mchc') >= 31) {
            $mchc = 'Normal';
        } else if($request->input('mchc') < 31) {
            $mchc = 'Low';
        } else if($request->input('mchc') >= 37) {
            $mchc = 'High';
        }
        if($request->input('platelet_count') == null) {
            $platelet_count = 'n/a';
        } else if($request->input('platelet_count') >= 150) {
            $platelet_count = 'Normal';
        } else if($request->input('platelet_count') < 150) {
            $platelet_count = 'Low';
        } else if($request->input('platelet_count') >= 3400000000000) {
            $platelet_count = 'High';
        }
        if($request->input('crp') == null) {
            $crp = 'n/a';
        } else if($request->input('crp') <= 10) {
            $crp = 'Normal';
        } else if($request->input('crp') > 10) {
            $crp = 'Low';
        }


        //Create Calculation
            $calculation = new Calculator();
                $calculation->patient_name = $request->get('patient_name');
                $calculation->activeness = $request->get('activeness');
                $calculation->comment = $request->get('comment');

            //Anthropology
                $calculation->weight = $request->input('weight');
                $calculation->height = $request->input('height');
                $calculation->bmi = $bmi;
                $calculation->bmi_class = $Classification;

                $calculation->waist = $request->input('waist');
                $calculation->hip = $request->input('hip');
                $calculation->wh_ratio = $WH_ratio;
                $calculation->wh_class = $WH_Class;

                $calculation->muac = $request->input('muac');
                $calculation->tricept_skinfold = $request->input('tricept_skinfold');

                $calculation->sodium = $request->input('sodium');
                $calculation->potassium = $request->input('potassium');
                $calculation->chloride = $request->input('chloride');
                $calculation->urea = $request->input('urea');
                $calculation->creatinine = $request->input('creatinine');
                $calculation->egfr = $request->input('egfr');
                $calculation->hba1c = $request->input('hba1c');
                $calculation->uric_acid = $request->input('uric_acid');
                $calculation->cholesterol = $request->input('cholesterol');
                $calculation->triglycerides = $request->input('triglycerides');
                $calculation->hdl = $request->input('hdl');
                $calculation->ldl = $request->input('ldl');
                $calculation->vldl = $request->input('vldl');
                $calculation->total_protein = $request->input('total_protein');
                $calculation->albumin = $request->input('albumin');
                $calculation->calcium = $request->input('calcium');
                $calculation->phosphorus = $request->input('phosphorus');
                $calculation->magnesium = $request->input('magnesium');
                $calculation->copper = $request->input('copper');
                $calculation->zinc = $request->input('zinc');
                $calculation->bilirubin_total = $request->input('bilirubin_total');
                $calculation->bilirubin_conj = $request->input('bilirubin_conj');
                $calculation->bilirubin_unconj = $request->input('bilirubin_unconj');
                $calculation->ast = $request->input('ast');
                $calculation->alt = $request->input('alt');
                $calculation->ldh = $request->input('ldh');
                $calculation->ggt = $request->input('ggt');
                $calculation->alp = $request->input('alp');
                $calculation->wbc = $request->input('wbc');
                $calculation->rbc = $request->input('rbc');
                $calculation->haemoglobin = $request->input('haemoglobin');
                $calculation->haematocrit = $request->input('haematocrit');
                $calculation->mcv = $request->input('mcv');
                $calculation->mch = $request->input('mch');
                $calculation->mchc = $request->input('mchc');
                $calculation->platelet_count = $request->input('platelet_count');
                $calculation->crp = $request->input('crp');

                $calculation->sodium_class = $sodium;
                $calculation->potassium_class = $potassium;
                $calculation->chloride_class = $chloride;
                $calculation->urea_class = $urea;
                $calculation->creatinine_class = $creatinine;
                $calculation->egfr_class = $egfr;
                $calculation->hba1c_class = $hba1c;
                $calculation->uric_acid_class = $uric_acid;
                $calculation->cholesterol_class = $cholesterol;
                $calculation->triglycerides_class = $triglycerides;
                $calculation->hdl_class = $hdl;
                $calculation->ldl_class = $ldl;
                $calculation->vldl_class = $vldl;
                $calculation->total_protein_class = $total_protein;
                $calculation->albumin_class = $albumin;
                $calculation->calcium_class = $calcium;
                $calculation->phosphorus_class = $phosphorus;
                $calculation->magnesium_class = $magnesium;
                $calculation->copper_class = $copper;
                $calculation->zinc_class = $zinc;
                $calculation->bilirubin_total_class = $bilirubin_total;
                $calculation->bilirubin_conj_class = $bilirubin_conj;
                $calculation->bilirubin_unconj_class = $bilirubin_unconj;
                $calculation->ast_class = $ast;
                $calculation->alt_class = $alt;
                $calculation->ldh_class = $ldh;
                $calculation->ggt_class = $ggt;
                $calculation->alp_class = $alp;
                $calculation->wbc_class = $wbc;
                $calculation->rbc_class = $rbc;
                $calculation->haemoglobin_class = $haemoglobin;
                $calculation->haematocrit_class = $haematocrit;
                $calculation->mcv_class = $mcv;
                $calculation->mch_class = $mch;
                $calculation->mchc_class = $mchc;
                $calculation->platelet_count_class = $platelet_count;
                $calculation->crp_class = $crp;

                $calculation->date = Carbon::now()->toFormattedDateString();

            $calculation->save();

        return redirect('/reports/'.$calculation->patient_name.'/display');
    }
}
