@extends('welcome')

@section('content')

    <div class="card mt-4">
        <div class="card-header">
            <a class="btn btn-primary" href="{{ route('category.create') }}">Add Category</a>
            <a class="btn btn-primary" href="{{ route('post.index') }}">Posts</a>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>SL</th>
                    <th>name</th>
                </tr>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection