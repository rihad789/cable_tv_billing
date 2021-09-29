<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billings extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
    
        'client_id',
        'client_name',
        'bill_month',
        'bill_year',
        'bill_amount',
        'billing_date',
        'billing_status',
        'updated_by'
    ];
}
