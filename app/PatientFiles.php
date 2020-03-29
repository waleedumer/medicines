<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientFiles extends Model
{
    protected $table = 'patient_files';

    protected $fillable = [
        'patient_id',
        'filename'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id');
    }
}
