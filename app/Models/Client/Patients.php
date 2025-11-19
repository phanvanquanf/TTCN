<?php

namespace App\Models\Client;

use App\Models\Accounts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;

    protected $table = 'tblpatients';
    protected $primaryKey = 'patientId';
    public $timestamps = false;

    protected $fillable = [
        'fullName',
        'gender',
        'birthDate',
        'address',
        'phone',
        'idCard',
        'checkinDate',
        'status',
        'accountId',
        'image'
    ];

    // Khóa ngoại tài khoản
    public function account()
    {
        return $this->belongsTo(Accounts::class, 'accountId', 'accountId');
    }

    // Quan hệ với bảng Appointments
    public function appointments()
    {
        return $this->hasMany(\App\Models\Client\Appointments::class, 'patientId', 'patientId');
    }
}
