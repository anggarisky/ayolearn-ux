<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'photo',
        'description',
        'id_brand'
    ];

    protected $hidden = [];

    use HasFactory;
}