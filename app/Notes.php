<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    protected $table = 'notes';

    protected $fillable = [
        'patient_id',
        'notes'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id');
    }
}
