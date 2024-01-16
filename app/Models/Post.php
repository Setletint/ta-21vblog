<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body'];

    public function snippet():Attribute  {
        return Attribute::get(function (){
            return substr($this->body, 0, 200);
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
