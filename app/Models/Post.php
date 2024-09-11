<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    //registrasi field table post

    protected $fillable = [
        'id',
        'title',
        'desc',
        'category',
        'user_id',
    ];
}
