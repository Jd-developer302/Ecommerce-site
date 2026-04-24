<?php

namespace App\Models;

use App\Traits\ReviewTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    use ReviewTrait;
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image',
        'description',
        'sku',
        'delivery_charge',
        'is_vat'
    ];
}
