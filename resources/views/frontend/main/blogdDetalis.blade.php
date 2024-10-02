@extends('frontend.frontend')

@section('content')
<section id="blog" class="page-section">
    <div class="container-lg">
        <div class="row my-4">
            <div class="col">
                <h2 class="mb-3">Blogs</h2>
            </div>
        </div>
        <div class="blog-wrapper">
            <div class="blog-content">
                <div class="blog-thumb">
                    
                       <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('assets/images/Browser-Cache.jpg') }}"
                       alt="" style="width:100%; height:350px;">
                    
                </div>
                <div class="mb-3">
                    <small class="text-muted">Posted on {{ $blog->created_at->format('F j, Y') }} </small> <!-- Author and Date -->
                </div>
                <!-- blog-thumb-->
                <div class="blog-info">
                    <h3>{{ $blog->title }}</h3>
                    <p>{!! $blog->content !!}</p>
                </div>
                <!-- blog-thumb-->
            </div>
            <!--blog-item-->


        </div>
        <!--blog-wrapper-->
    </div>
</section>
@endsection