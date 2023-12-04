@extends('partials.layout')

@section('content')
    <div class="container mx-auto">


        <div>{{ $profiles->links() }} </div>
        <table class="table table-zebra">
            <thead>
                <th>Id</th>
                <th>Title</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($profiles as $profile)
                    <tr>
                        <td>{{$profile->id}}</td>
                        <td>{{$profile->email}}</td>
                        <td>{{$profile->created_at}}</td>
                        <td>{{$profile->updated_at}}</td>
                        <td>
                            <div class="join">
                                <a class="btn join-item btn-info" href="">View</a>
                                <a class="btn join-item btn-warning" href="">Edit</a>
                                <button form="delete-form-{{$profile->id}}" class="btn join-item btn-error">Delete</button>
                            </div>
                            <form id="delete-form-{{$profile->id}}" action="" method="POST">
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
