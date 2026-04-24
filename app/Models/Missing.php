<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Missing extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'city',
        'whatsapp',
        'product_id',
        'order_id',
    ];


    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
