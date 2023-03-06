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
                    <th>Action</th>
                </tr>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        @foreach ($post->categories as $category)
                            <td><span class="badge bg-secondary">{{ $category->name }}</span></td>
                        @endforeach
                        <td>
                            <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-primary" href="{{ route('post.edit', $post->id) }}">Edit</a>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            {{-- <table class="table">
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Posts</th>
                </tr>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        @foreach ($category->posts as $post)
                            <td><span class="badge bg-secondary">{{ $post->title }}</span></td>
                        @endforeach
                    </tr>
                @endforeach
            </table> --}}
        </div>
    </div>
@endsection