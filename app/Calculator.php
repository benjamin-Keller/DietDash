<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calculator extends Model
{
    protected $fillable = [
        'patient_name',
        'comment',

        'weight',
        'height',
        'bmi',
        'bmi_class',

        'waist',
        'hip',
        'wh_ratio',
        'wh_class',

        'muac',
        'tricept_skinfold',

        'sodium',
        'potassium',
        'chloride',
        'urea',
        'creatinine',
        'egfr',
        'hba1c',
        'uric_acid',
        'cholesterol',
        'triglycerides',

        'date',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
