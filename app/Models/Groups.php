<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    protected $fillable = [
        'name',
        'discount_rate'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->hasMany(User::class, 'group_id');
    }
}
