<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsReport extends Model
{
    use HasFactory;
    protected $table = 'ads_reports';
    protected $fillable = [
        'order_id',
        'name',
        'address',
        'contact_number',
        'city',
        'delivery_note',
        'product_code',
        'sku_code',
        'product_name',
        'delivery_charge',
        'product_price',
        'quantity',
        'product_sub_price',
        'product_vat',
        'product_total_price',
        'size',
        'color',
        'daily_spend'
    ];

    // Optionally, define casts for some columns (e.g., for decimals and dates)
    protected $casts = [
        'delivery_charge' => 'decimal:2',
        'product_price' => 'decimal:2',
        'product_sub_price' => 'decimal:2',
        'product_vat' => 'decimal:2',
        'product_total_price' => 'decimal:2',
        'daily_spend' => 'decimal:2',
        'quantity' => 'integer',
    ];
}
