<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vicinity extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'area_id',
        'vicinity_name'
    ];
}
