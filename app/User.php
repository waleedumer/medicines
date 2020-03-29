<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    
    protected $fillable = [
        'name', 'email', 'password', 'group_id', 'business_name', 'post_code', 'address', 'phone', 'mobile', 'lat', 'lng'
    ];

    
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function group()
    {
        return $this->belongsTo(Models\Groups::class, 'group_id');
    }


    public function access()
    {
        return $this->hasMany(UserAccess::class, 'user_id');
    }

    public function discount()
    {
        return $this->hasMany(SpecialDiscount::class, 'user_id');
    }

}
