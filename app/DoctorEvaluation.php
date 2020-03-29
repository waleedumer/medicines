<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorEvaluation extends Model
{
    protected $table = 'doctor_evaluation';

    protected $fillable = [
        'patient_id',
'doctor_diagnosis',
'medicine_recommendation',
'etiology',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id');
    }
}
