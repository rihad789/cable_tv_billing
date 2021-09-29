<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
    
        'memo_no',
        'buyer_name',
        'products_total',
        'grand_amount',
        'creation_date',
        
    ];

}




