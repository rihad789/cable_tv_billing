<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends LaratrustRole
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
