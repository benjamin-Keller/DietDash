<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient_Disease extends Model
{
    protected $fillable = ['patient_id', 'disease_id'];

    public function diseases() {
        return $this->belongsToMany( 'App\Diseases', 'id', 'patient_id');
    }
    public function patients() {
        return $this->belongsToMany( 'App\Patient', 'id', 'disease_id');
    }
}
