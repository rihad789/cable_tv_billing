<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    
    public $timestamps = true;

    protected $fillable = [
        'client_id',
        'client_name',
        'client_father',
        'area',
        'vicinity',
        'address',
        'initialization_date',
        'mobile_no',
        'locked_fund',
        'connection_status'
    ];
}


