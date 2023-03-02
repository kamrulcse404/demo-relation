@extends('welcome')

@section('content')

    <div class="card mt-4">
        <div class="card-header">
            <a class="btn btn-primary" href="{{ route('post.create') }}">Add Post</a>
            <a class="btn btn-primary" href="{{ route('category.index') }}">Category</a>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>SL</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                </tr>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->category->name }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection