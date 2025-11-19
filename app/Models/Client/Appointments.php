<?php

namespace App\Models\Client;

use App\Models\Accounts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointments extends Model
{
    use HasFactory;

    protected $table = 'tblappointments';
    protected $primaryKey = 'appointmentId';
    public $timestamps = false;

    protected $fillable = [
        'appointmentId',
        'patientId',
        'staffId',
        'appointmentDate',
        'notes',
        'status',
    ];

    // Quan hệ với nhân viên
    public function staff(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Admin\Staff::class, 'staffId', 'staffId');
    }

    // Quan hệ với bệnh nhân
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patients::class, 'patientId', 'patientId');
    }
}
