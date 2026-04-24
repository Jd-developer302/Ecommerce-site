<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpand extends Model
{
    use HasFactory;
    protected $table = 'product_spands';

    protected $fillable = [
        'product_id',
        'reason',
        'total_spand',
        'date_spend',
        'bundle_id',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function bundle()
    {
        return $this->belongsTo(Bundle::class, 'bundle_id');
    }
}
