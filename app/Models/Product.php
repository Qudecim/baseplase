<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'owner_id',
        'name',
        'sku',
        'ean',
        'weight',
        'height',
        'width',
        'length',
        'price',
        'description',
    ];

    protected $hidden = [
        'owner_id',
    ];
}
