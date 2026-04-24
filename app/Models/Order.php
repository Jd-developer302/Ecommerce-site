<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory, LogsActivity, SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'city',
        'address',
        'order_id',
        'comment',
        'total_vat',
        'delivery_boy_id',
        'delivery_date',
        'total_qty',
        'delivery_charge',
        'total_price',
        'lat',
        'long',
        'status',
        'areacode',
        'awb_details',
        'whatsapp',
        'payment_method',
        'created_by',
        'trans_id',
        'payment_status',
        'created_user_id',
        'deleted_at'
    ];

    protected $casts = [
        'awb_details' => 'array',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'trans_id');
    }
    public function orderLines()
    {
        return $this->hasMany(OrderLine::class, 'order_id', 'order_id');
    }
    public function products()
    {
        return $this->hasManyThrough(Product::class, OrderLine::class, 'order_id', 'id', 'order_id', 'product_id');
    }

    // public function updateTotalPrice()
    // {
    //     $total = OrderLine::where('order_id', $this->order_id)->sum(DB::raw('price * quantity'));
    //     $this->total_price = $total;
    //     $this->save();
    // }
    public function updateTotalPrice()
    {
        $orderLines = OrderLine::where('order_id', $this->order_id)->get();

        $subTotal = 0;
        $vatTotal = 0;

        foreach ($orderLines as $item) {
            $itemTotal = $item->price * $item->quantity;
            $vatPerItem = $item->vat ?? 0; // assuming `vat` column exists in OrderLine
            $vatAmount = $vatPerItem * $item->quantity;

            $subTotal += $itemTotal;
            $vatTotal += $vatAmount;
        }

        $this->total_price = $subTotal + $vatTotal;
        $this->total_vat = $vatTotal;
        $this->save();
    }
}
