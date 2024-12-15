<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiBlog extends Model
{
    /** @use HasFactory<\Database\Factories\ApiBlogFactory> */
    use HasFactory;

    protected $fillable = [
        'Title',
        'MainPost',
    ];
}
