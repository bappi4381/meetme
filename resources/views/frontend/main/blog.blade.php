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
            @foreach ($blogs as $blog)
            <div class="blog-item">
                <div class="blog-thumb">
                    <a href="{{ route('blog.details',$blog->id) }}">
                        <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('assets/images/Browser-Cache.jpg') }}"
                             alt="" style="width:100%; height:300px;">
                    </a>
                </div>
                <!-- blog-thumb-->
                <div class="blog-info">
                    <h3><a href="{{ route('blog.details',$blog->id) }}">{{$blog->title}}</a></h3>
                    <p>{!! Str::limit(strip_tags($blog->content), 150) !!}<a href="{{ route('blog.details',$blog->id) }}" target="_blank">Read more</a> </p>
                </div>
                <!-- blog-thumb-->
            </div>
            @endforeach
        </div>
            
       
        <!--blog-wrapper-->
    </div>
</section>
@endsection