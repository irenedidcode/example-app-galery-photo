<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        'slug'
    ];

    //membuat function untuk relasi antara post dan contents
    public function contents(){
        return $this->hasMany(Content::class);
    }

public function image() {
        return $this->hasMany(Image::class);
    }

    //membuat setting atribute title
    public function setTitleAtribute($value)
    {
        $this->attributes['title'] = $value;

        if (!isset($this->attributes['slug']) || $this->attributes['title'] !== $value) {
            $this->attributes['slug'] = Str::slug($value);
        }
    }

    // 1 postingan memiliki banyak likes
    public function likes() {
        return $this->hasMany(Like::class);
    }
}
