<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_id',
        'name',
        'quantity',
        'price',
        'sub_price',
        'combination_id',
        'vat',
        'payment_status',
        'trans_id',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'trans_id');
    }
}
