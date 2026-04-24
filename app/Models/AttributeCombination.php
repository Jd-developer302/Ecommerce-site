<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeCombination extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'sku',
        'stock',
        'unit_amount',
        'image',
        'attribute_ids_combinations',
        'attribute_comb_name'
    ];
}
