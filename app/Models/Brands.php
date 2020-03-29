<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $fillable = [
        'name'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function product()
    {
        return $this->belongsTo(Products::class, 'brand_id');
    }
}

