<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IssuesList extends Model
{
    protected $table = 'issues_list';

    protected $fillable = [
        'patient_id',
        'main_medical_issue',
        'intensity',
        'what_cause',
        'treatments',
        'how_long',
        'xray_test',
        'frequency',
        'additional_details',
        'taken_medicine',
        'additional_doc_info'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id');
    }
}
