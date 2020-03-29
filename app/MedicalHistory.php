<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    protected $table = 'medical_history';

    protected $fillable = [
        'patient_id',
        'physician_name',
        'phone',
        'fax',
        'address',
        'address2',
        'city',
        'state',
        'zip',
        'last_visit',
        'next_visit',
        'current_physician',
        'medical_records',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id');
    }
}
