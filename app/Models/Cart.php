<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;


    protected $fillable = [
        'cutomer_username',
        'no_of_products',
        'total_price',
        'delivery_charge',
    ];
}
