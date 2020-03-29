<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariationValues extends Model
{
    protected $table = 'variation_values';

    protected $fillable = [
        'variation_id',
        'value'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function variation()
    {
        return $this->belongsTo(Variations::class, 'variation_id');
    }

    public function variant()
    {
        return $this->hasMany(ProductVariants::class, 'value_id');
    }
}
