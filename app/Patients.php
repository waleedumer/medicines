<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $fillable = [
            'first_name',
            'last_name',
            'physician_id',
            'state_id',
            'dob',
            'initial_visit',
            'expiration',
            'weight',
            'height',
            'phone',
            'email',
            'address1',
            'address2',
            'city',
            'country',
            'state',
            'zip',
            'caregiver',
            'internal_no',
            'social_security_no',
            'sex',
            'parent_guardian',
            'rec_type',
            'blood_pressure',
            'mmu_id'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function physician()
    {
        return $this->belongsTo(Users::class, 'physician_id');
    }

}
