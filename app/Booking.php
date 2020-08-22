<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'event_name',
        'description',
        'patient_name',
        'date',
        'time',
        'active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function patient() {
        return $this->hasOne(Patient::class);
    }

}
