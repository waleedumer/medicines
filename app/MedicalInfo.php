<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalInfo extends Model
{
    protected $table = 'medical_info';

    protected $fillable = [
        'patient_id',
        'smoke',
        'alcohol',
        'marijuana',
        'hospitalized',
        'pregnant',
        'planning_pregnancy',
        'currently_medication',
        'allergies',
        'surgeries',
        'depression_treatment',
        'name_of_physician',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id');
    }
}
