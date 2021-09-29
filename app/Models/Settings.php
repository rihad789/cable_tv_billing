<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'sett_id',
        'website_name',
        'logo_url',
        'dish_bill',
    ];
}

