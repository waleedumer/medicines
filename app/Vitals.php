<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vitals extends Model
{
    protected $table = 'vitals';

    protected $fillable = [
        'patient_id',
        'blood_pressure',
        'pulse',
        'temprature',
        'height',
        'weight',
        'bmi',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id');
    }
}
