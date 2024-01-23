<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    public function path(): Attribute
    {
        return Attribute::make(
            get: function ($image) {
                if (!$image || parse_url($image, PHP_URL_SCHEME)) {
                    return $image;
                }
                return Storage::url($image);
            },
            set: function ($image) {
                if (!$image || !is_a($image, UploadedFile::class)) {
                    return $image;
                }
                return $image->store('public');
            }
        );
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
