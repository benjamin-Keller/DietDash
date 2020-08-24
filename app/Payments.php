<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = [
        'user_id',
        'patient_name',
        'first_name',
        'last_name',
        'amount',
        'sub_total',
        'sub_total',
        'total',
        'date',
    ];
}
