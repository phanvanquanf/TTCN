<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    // User.php
    public function patient()
    {
        return $this->hasOne(\App\Models\Client\Patients::class, 'accountId', 'id');
        // 'accountId' trong bảng patients, 'id' trong bảng users
    }
    public function staff()
    {
        return $this->hasOne(\App\Models\Admin\Staff::class, 'accountId', 'id');
    }
}
