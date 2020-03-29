<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    protected $table = 'signature';

    protected $fillable = [
        'patient_id',
        'signee',
        'signature',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id');
    }
}
