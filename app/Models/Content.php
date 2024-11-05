<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    //registrasi nama table content
    protected $table = 'content';

    //registrasi nama field
    protected  $fillable = [
        'body', 'post_id'
    ];

    // membuat relasi table content ke posts
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
