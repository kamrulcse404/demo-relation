@extends('welcome')

@section('content')
    <div class="card mt-4">
        <div class="card-body">
            <form action="{{ route('post.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group">
                        <label for="title" class="mb-3">Post Title</label>
                        <input type="text" class="form-control mb-3" id="title" placeholder="Enter Post Title" name="title">                        
                    </div>
                    <div class="form-group">
                        <label for="description" class="mb-3">Post Description</label>
                        <input type="text" class="form-control mb-3" id="description" placeholder="Enter Post Description" name="description">                        
                    </div>  
                    <div class="form-group mb-3">
                        <select class="form-select" name="category_id">
                            <option selected>--Select--</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>                        
                    </div>                   
                </div>
                <button type="submit" class="btn btn-primary mt-3">Add</button>
            </form>
        </div>
    </div>
@endsection