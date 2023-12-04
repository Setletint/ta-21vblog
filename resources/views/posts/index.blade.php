@extends('partials.layout')

@section('content')
    <div class="container mx-auto">
        <a class="btn join-item btn-success" href="{{route('posts.create')}}">New Post</a>
        <div>{{$posts->links()}}</div>
        <table class="table table-zebra">
            <thead>
                <th>Id</th>
                <th>Title</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->updated_at}}</td>
                        <td>
                            <div class="join">
                                <a class="btn join-item btn-info" href="{{route('posts.show', ['post' =>$post])}}">View</a>
                                <a class="btn join-item btn-warning" href="{{route('posts.edit', ['post' => $post])}}">Edit</a>
                                <button form="delete-form-{{$post->id}}" class="btn join-item btn-error">Delete</button>
                            </div>
                            <form id="delete-form-{{$post->id}}" action="{{route('posts.destroy', ['post' => $post])}}" method="POST">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
