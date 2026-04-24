<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'order',
        'featured',
        'listing',
        'banner',
        'ad_banner'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
