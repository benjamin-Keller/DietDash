<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient_Disease extends Model
{
    public $table = 'patient_disease';
    protected $fillable = [
        'patient_id',
        'arthritis',
        'renal_failure',
        'dehydration',
        'underweight',
        'diabetes',
        'hiv',
        'mam',
        'wasted',
        'epilepsy',
        'pneumonia',
        'sam',
        'hypertension',
        'tb',
        'stunted',
    ];



}
