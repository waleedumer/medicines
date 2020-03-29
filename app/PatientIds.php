<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientIds extends Model
{
    protected $table = 'patient_ids';

    protected $fillable = [
        'patient_id',
        'lisenceFront',
        'lisenceBack',
        'photo',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id');
    }
}
