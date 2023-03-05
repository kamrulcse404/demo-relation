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
                        <td>
                            <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
