<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'user_id',
        'FirstName',
        'LastName',
        'Gender',
        'IdNumber',
        'PhoneNumber',
        'Email',
        'Deleted'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookings() {
        return $this->hasMany(Booking::class);
    }
    public function calculator() {
        return $this->hasOne(Calculator::class);
    }
    public function payments() {
        return $this->hasMany(Booking::class);
    }

}
