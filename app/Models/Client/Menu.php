<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';
    protected $primaryKey = 'menuId';
    public $timestamps = false;

    protected $fillable = [
        'menuName',
        'isActive',
        'levels',
        'parentID',
        'link',
        'menuOrder',
        'position',
    ];
}