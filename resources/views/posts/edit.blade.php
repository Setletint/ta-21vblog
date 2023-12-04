@extends('partials.layout')

@section('content')
    <div class="container mx-auto">
        <div class="card bg-base-200 shadow-xl">
            <div class="card-body">
                <form action="{{route('posts.update', ['post' => $post])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-control w-full">
                        <label class="label">
                          <span class="label-text">Title</span>

                        </label>
                        <input type="text" placeholder="Title" class="input input-bordered w-full" name="title" value="{{old('title') ?? $post->title}}" />
                        @error('title')
                            <label class="label">
                                <span class="label-text-alt text-error">{{$message}}</span>
                            </label>
                        @enderror
                      </div>
                      <div class="form-control w-full">
                        <label class="label">
                          <span class="label-text">Content</span>
                        </label>
                        <textarea class="textarea textarea-bordered h-24 w-full" placeholder="Content" name="body">{{old('body') ?? $post->body}}</textarea>
                        @error('body')
                            <label class="label">
                                <span class="label-text-alt text-error">{{$message}}</span>
                            </label>
                        @enderror
                      </div>
                      <input type="submit" class="btn btn-primary my-3" value="Update">
                </form>
            </div>
          </div>
    </div>
@endsection
