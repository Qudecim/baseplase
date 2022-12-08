<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Action extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'owner_id',
        'publisher',
        'publisher_data',
        'subscriber',
        'subscriber_data',
    ];

    protected $hidden = [
        'owner_id',
        'deleted_at'
    ];
}
