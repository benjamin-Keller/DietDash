<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = [
        'user_id',
        'patient_name',
        'email',

        'amount',
        'sub_total',
        'sub_total',
        'total',
        'date',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
