<?php

namespace App\Models;

use App\Traits\ReviewTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use ReviewTrait;
    use HasFactory, LogsActivity, SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'stock',
        'brand',
        'badge',
        'description',
        'price',
        'sku',
        'is_newarrival',
        'delivery_charge',
        'is_vat',
        'category_id',
        'mega_deal',
        'old_price',
        'specification',
        'is_active',
        'is_mega_offer',
        'cost_per_product',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty();
    }

    public function activity()
    {
        return $this->morphMany(Activity::class, 'subject');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function prices(): HasMany
    {
        return $this->hasMany(Price::class);
    }
}
