<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyMedicalHistory extends Model
{
    protected $table = 'family_medical_history';

    protected $fillable = [
        'patient_id',
        'physician_name',
        'alzheimer',
        'cystic',
        'heart_attack',
        'kidney_disease',
        'arthritis',
        'dementhia',
        'heart_disease',
        'liver_disease',
        'asthma',
        'depression',
        'high_blood_pressure',
        'migraines',
        'blood_disorders',
        'diabetes',
        'high_cholesterol',
        'seizures',
        'other',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id');
    }

}
