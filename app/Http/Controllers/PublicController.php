<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        $posts = Post::latest()->paginate(16);
        //dd($posts->toArray());
        return view('welcome', compact('posts'));
    }
}
