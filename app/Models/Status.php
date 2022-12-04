<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'owner_id',
        'name',
        'color'
    ];

    protected $hidden = [
        'owner_id',
    ];
}
