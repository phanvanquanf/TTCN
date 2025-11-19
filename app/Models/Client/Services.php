<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $primaryKey = 'serviceId';
    public $timestamps = false;

    protected $fillable = [
        'serviceId',
        'serviceName',
        'serviceDescription',
        'servicePrice',
        'serviceImage',
        'createdAt',
    ];

    public function patient()
    {
        return $this->hasMany(\App\Models\Client\Patients::class, 'patientId', 'patientId');
    }
}
