<?php

namespace App\Models;

use Laratrust\Models\LaratrustPermission;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends LaratrustPermission
{
    public $guarded = [];

    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'name',
        'display_name',
        'description'
    ];

}
