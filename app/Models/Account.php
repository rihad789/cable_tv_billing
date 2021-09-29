<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    public $timestamps = true;
    
    protected $fillable = [
        'title',
        'quantity',
        'single_unit_price',
        'total_amount',
        'memo_no'
    ];
}


