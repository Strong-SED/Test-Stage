<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = [
        'titre',
        'slug',
        'description',
        'context',
        'instruction',
        'image',
        'user_id',
    ];

    use HasFactory;
}
