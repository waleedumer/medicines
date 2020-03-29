<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariants extends Model
{
    protected $table = 'product_variants';

    protected $fillable = [
        'product_id',
        'variation_id',
        'value_id',
        'on_hand_quantity',
        'purcase_price',
        'sale_price',
        'cover_image'
    ];

    protected $dates =['created_at', 'updated_at'];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function value()
    {
        return $this->belongsTo(VariationValues::class, 'value_id');
    }

    public function variation()
    {
        return $this->belongsTo(Variations::class, 'variation_id');
    }
}
