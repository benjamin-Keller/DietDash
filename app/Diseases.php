<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diseases extends Model
{
    protected $fillable = [
        'group', 'name'
    ];

    public function Patients()
    {
        return $this->belongsToMany('App\Patients');
    }
}
