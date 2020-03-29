<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategories extends Model
{
    protected $fillable = [
        'name',
        'type',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function product()
    {
        return $this->hasMany(Products::class, 'category_id');
    }

   public function access()
   {
       return $this->hasMany(UserAccess, 'category_id');
   }
}
