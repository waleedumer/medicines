<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'name',
        'purchase_price',
        'sale_price',
        'purchase_vat',
        'sale_vat',
        'brand_id',
        'category_id',
        'gallery_image_one',
        'gallery_image_two',
        'gallery_image_three',
        'image_url',
        'description',
        'product_code',
        'on_hand_quantity'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function brand()
    {
        return $this->belongsTo(Brands::class, 'brand_id');
    }

    public function category()
    {
        return $this->belongsTo(ProductCategories::class, 'category_id');
    }

    public function discount()
    {
        return $this->hasMany(SpecialDiscount::class, 'product_id');
    }

    public function variant()
    {
        return $this->hasMany(ProductVariants::class, 'product_id');
    }
}

