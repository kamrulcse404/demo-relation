@extends('welcome')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <a href="{{ route('category.index') }}" class="btn btn-primary">Categories</a>
        </div>
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group">
                        <label for="name" class="mb-3">Category Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Category Name" name="name">                        
                    </div>                    
                </div>
                <button type="submit" class="btn btn-primary mt-3">Add</button>
            </form>
        </div>
    </div>
@endsection