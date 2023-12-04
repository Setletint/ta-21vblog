@extends('partials.layout')

@section('content')
    <div class="container mx-auto">
        <div class="card bg-base-200 shadow-xl">
            <div class="card-body">
                    <div class="form-control w-full">
                        <label class="label">
                          <span class="label-text text-lg font-bold">Title</span>
                        </label>
                        <span class="w-full h-fit" name="title">{{old('title') ?? $post->title}}</span>
                      </div>
                      <div class="form-control w-full">
                        <label class="label">
                          <span class="label-text text-lg font-bold">Content</span>
                        </label>
                        <span class="h-fit w-full"name="body">{{old('body') ?? $post->body}}</span>
                      </div>
            </div>
          </div>
    </div>
@endsection
