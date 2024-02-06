@extends('partials.layout')

@section('content')
    <div class="container mx-auto">
        {{ $posts->links() }}
        <div class="flex flex-row flex-wrap">
            @foreach ($posts as $post)
                <div class="basis-1/4 mb-2">

                    <div class="card bg-base-200 shadow-xl min-h-full mx-2">
                        @if ($post->images()->count() === 1)
                            <figure>
                                <img src="{{ $post->images->first()->path }}" alt="{{ $post->title }}" />
                            </figure>
                        @elseif($post->images()->count() > 1)
                            <div class="w-full carousel rounded-box">
                                @foreach ($post->images as $image)
                                    <div class="carousel-item w-full">
                                        <img src="{{ $image->path }}" class="w-full" alt="{{ $image->title }}" />
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="card-body">
                            <h2 class="card-title">{{ $post->title }}</h2>
                            <p>{{ $post->snippet }}...</p>
                            <p class="text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                            <p class="text-gray-500"><a
                                    href="{{ route('user', ['user' => $post->user->id]) }}">{{ $post->user->name }}</a></p>
                            <p class="text-red-500">{{ $post->likes()->count() }} Likes</p>
                            <div class="flex flex-wrap">
                                @foreach ($post->tags as $tag)
                                    <a href="{{route('tag', ['tag'=>$tag])}}"><div class="badge badge-outline ml-1 mb-1">{{$tag->name}}</div></a>
                                @endforeach
                            </div>
                            <div class="card-actions justify-end">
                                <a class="btn {{ $post->authHasLiked ? 'btn-primary' : 'btn-success' }}"
                                    href={{ route('like', ['post' => $post]) }}>
                                    @if ($post->authHasLiked)
                                        Unlike
                                    @else
                                        Like
                                    @endif
                                </a>
                                <a class="btn btn-primary" href={{ route('post', ['post' => $post]) }}>Read More</a>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
@endsection
