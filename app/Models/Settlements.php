<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settlements extends Model
{
    use HasFactory;

    
    public $timestamps = true;
    
    protected $fillable = [
        'settled_month',
        'settled_year',
        'sallery_paid',
        'locked_fund',
        'collected_bills',
        'cost_in_service',
        'balance_paid'
    ];
}
