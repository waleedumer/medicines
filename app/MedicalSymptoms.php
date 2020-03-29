<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalSymptoms extends Model
{
    protected $table = 'medical_symptoms';

    protected $fillable = [
        'patient_id',
        'anorexia',
        'arthritis',
        'cachexia',
        'cancer',
        'chronic_pain',
        'glaucoma',
        'hiv_aids',
        'migraine',
        'persistent_muscle_spasms',
        'seizures',
        'severe_nausea',
        'other',    
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id');
    }
}
