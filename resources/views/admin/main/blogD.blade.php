@extends('admin.dashboard')
@section('content')
<div class="content-body">
    <div class="container-fluid mt-2">
      
    
        @if($blog->image) <!-- Check if an image exists -->
            <div class="mb-3">
                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-fluid" style="width:600px; height:300px;"> <!-- Display the image -->
            </div>
        @endif
        <div class="mb-3">
            <small class="text-muted">Posted on {{ $blog->created_at->format('F j, Y') }} </small> <!-- Author and Date -->
        </div>
        <h1 class="mb-4">{{ $blog->title }}</h1> <!-- Blog Title -->
        
        
        <div class="mb-4">
            {!! $blog->content !!} <!-- Full Blog Content (raw HTML) -->
        </div>

        <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        <a href="{{ route('blog.index'
         ) }}" class="btn btn-secondary">Back to Blog List</a> <!-- Button to go back -->
    </div>
</div>
@endsection



