<?php

namespace App\Models;


use App\Models\Image;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body'];

    public function snippet(): Attribute
    {
        return Attribute::get(function () {
            return substr($this->body, 0, 200);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function authHasLiked(): Attribute
    {
        return Attribute::get(function () {
            if (Auth::check()) {
                return $this->likes()->where('user_id', Auth::user()->id)->exists();
            }
            return false;
        });
    }
}
