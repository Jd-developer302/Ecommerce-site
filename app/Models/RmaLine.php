<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RmaLine extends Model
{
    use HasFactory;
    protected $table = 'rma_lines';

    protected $fillable = [
        'rma_id',
        'product_id',
        'combination_id',
        'name',
        'quantity',
        'price',
        'sub_price',
        'vat',
        'bundle_id',
        'delivery_charge',
        'trans_id',
        'payment_status',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function bundle()
    {
        return $this->belongsTo(Bundle::class, 'bundle_id');
    }
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'trans_id');
    }


    public function rma(): BelongsTo
    {
        return $this->belongsTo(Rma::class, 'rma_id', 'id');
    }
}
