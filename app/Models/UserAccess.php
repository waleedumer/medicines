<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAccess extends Model
{
    protected $fillable = [
        'user_id',
        'category_id'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Product_categories::class, 'category_id');
    }
}
