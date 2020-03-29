<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalInfo extends Model
{
    protected $table = 'additional_info';

    protected $fillable = [
        'patient_id',
        'past_evaluation',
        'denied_recommendation',
        'arrested',
        'probation',
        'attending_school',
        'rehabilitation',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id');
    }
}
