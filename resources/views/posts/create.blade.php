@extends('partials.layout')

@section('content')
    <div class="container mx-auto">
        <div class="card bg-base-200 shadow-xl">
            <div class="card-body">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Title</span>
                        </label>
                        <input type="text" placeholder="Title" class="input input-bordered w-full" name="title"
                            value="{{ old('title') }}" />
                        @error('title')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Content</span>
                        </label>
                        <textarea class="textarea textarea-bordered h-24 w-full" placeholder="Content" name="body">{{ old('body') }}</textarea>
                        @error('body')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Image</span>
                        </label>
                        <input type="file" multiple placeholder="Name" class="file-input input-bordered w-full"
                            name="images[]" />
                        @error('images.*')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <input type="submit" class="btn btn-primary my-3" value="Create">
                </form>
            </div>
        </div>
    </div>
@endsection
