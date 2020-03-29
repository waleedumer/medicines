<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecialDiscount extends Model
{

    protected $table = 'special_discounts';

    protected $fillable = [
        'user_id',
        'product_id',
        'amount'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
