<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rma extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'order_id',
        'comment',
        'status',
        'combination_id',
        'name',
        'quantity',
        'price',
        'phone',
        'email',
        'city',
        'address',
        'total_qty',
        'delivery_charge',
        'total_vat',
        'delivery_date',
        'delivery_boy_id',
        'created_by',
        'coupon_id',
        'coupon_price',
        'coupon_code',
        'areacode',
        'lat',
        'long',
        'shipped_date',
        'rto',
        'rto_date',
        'pto_date',
        'awb',
        'shipped_date1',
        'shipped_date2',
        'shipped_date3',
        'shipped_date4',
        'delivery_boy_id1',
        'delivery_boy_id2',
        'delivery_boy_id3',
        'delivery_boy_id4',
        'awb_details',
        'source',
        'whatsapp',
        'payment_method',
        'trans_id',
        'payment_status',
        'shipping_charge_collected',
        'gross_sale_amount',
        'total_price',
    ];



    protected $dates = ['delivery_date', 'shipped_date', 'rto_date', 'pto_date', 'shipped_date1', 'shipped_date2', 'shipped_date3', 'shipped_date4', 'deleted_at'];

    protected $casts = [
        'delivery_charge' => 'double',
        'shipping_charge_collected' => 'decimal:2',
        'gross_sale_amount' => 'decimal:2',
        'total_price' => 'decimal:2',
        'rto' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'trans_id');
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'delivery_boy_id');
    }
    public function rmalines()
    {
        return $this->hasMany(RmaLine::class, 'rma_id');
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class, RmaLine::class, 'rma_id', 'id', 'rma_id', 'product_id');
    }
}
