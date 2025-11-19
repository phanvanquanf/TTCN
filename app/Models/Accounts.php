<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Accounts extends Authenticatable
{
    use HasFactory;

    protected $table = 'tblaccounts';
    protected $primaryKey = 'accountId';
    public $timestamps = false;

    protected $fillable = [
        'accountId',
        'username',
        'password',
        'email',
        'role',
        'status',
    ];

    public function patient()
    {
        return $this->hasOne(\App\Models\Client\Patients::class, 'accountId',  'accountId');
    }
}
