<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sallery extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'sallery_amount',
        'sallery_month',
        'sallery_year',
        'payment_status',
        'sallery_paid_at',
        'sallery_paid_by'
    ];
}



