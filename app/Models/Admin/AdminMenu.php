<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminMenu extends Model
{
    use HasFactory;

    protected $table = 'adminMenu';
    protected $primaryKey = 'adminMenuId';
    public $timestamps = false;

    protected $fillable = [
        'itemName',
        'itemLevel',
        'parentLevel',
        'itemOrder',
        'isActive',
        'areaName',
        'controllerName',
        'actionName',
        'icon',
        'idName',
    ];
}
