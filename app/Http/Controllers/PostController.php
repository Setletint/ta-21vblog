<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post($request->validated());
        // $post->title = $request->validated('title');
        // $post->body = $request->validated('body');
        //$post->image = $request->file('image')->store('public');
        $post->user()->associate(auth()->user());
        $post->save();
        //dd($request->files);
        foreach ($request->file('images') as $file) {
            $image = new Image();
            $image->path = $file;
            $image->post()->associate($post);
            $image->save();
        }
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->fill($request->validated());
        // $post->title = $request->validated('title');
        // $post->body = $request->validated('body');
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back();
    }
}
