<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variations extends Model
{
   protected $table = 'variations';

   protected $fillable = [
        'name'
   ];

   protected $dates = ['created_at', 'updated_at'];

   public function variant()
   {
       return $this->hasMany(ProductVariants::class, 'variation_id');
   }

   public function variationValue()
   {
       return $this->hasMany(VariationValues::class, 'variation_id');
   }
}
