<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'keywords',
        'description',
        'pixels',
        'banner1',
        'banner2',
        'banner3',
        'banner4',
        'banner5',
    ];
}
