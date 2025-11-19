<?php

namespace App\Models\Admin;

use App\Models\Accounts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'tblstaff';
    protected $primaryKey = 'staffId';
    public $timestamps = false;

    protected $fillable = [
        'staffId',
        'fullName',
        'gender',
        'birthDate',
        'position',
        'department',
        'phone',
        'accountId',
        'image',
        'status',
        'serviceId',
    ];
    public function account()
    {
        return $this->belongsTo(Accounts::class, 'accountId', 'accountId');
    }

    public function services()
    {
        return $this->belongsTo(\App\Models\Client\Services::class, 'serviceId', 'serviceId');
    }
}
