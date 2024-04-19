<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Student extends Model implements Authenticatable
{  
    use AuthenticatableTrait;
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'number',
        'password',
        'address',
        'course',
        'pic',
    ];
     /**
 * The attributes that should be hidden for serialization.
 *
 * @var array<int, string>
 */
protected $hidden = [
    'password',
    'remember_token',
];

/**
 * The attributes that should be cast.
 *
 * @var array<string, string>
 */
protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
];
 
}
