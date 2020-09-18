<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'user_id',
        'FirstName',
        'LastName',
        'Age',
        'Gender',
        'IdNumber',
        'PhoneNumber',
        'Email',
        'Deleted',

        'home_language',
        'household_size',
        'approx_Income',

        'address_ln1',
        'address_ln2',
        'city',
        'province',
        'country',
        'zip',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function bookings() {
        return $this->hasMany(Booking::class);
    }
    public function calculator() {
        return $this->hasMany( Calculator::class,'patient_name');
    }



}
