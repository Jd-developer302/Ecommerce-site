<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BundleLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'bunddle_id',
        'product_id',
        'name',
        'quantity',
        'image',
        'combination_id'
    ];
}
