<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RmaStatus extends Model
{
    use HasFactory;
    protected $table = 'rma_statuses';

    // Define the fillable attributes (columns) for mass assignment
    protected $fillable = [
        'rma_id',
        'status',
        'changed_by',
        'user_id',
        'comment'
    ];

    // Define the dates for auto-casting to Carbon instances (timestamps)
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
