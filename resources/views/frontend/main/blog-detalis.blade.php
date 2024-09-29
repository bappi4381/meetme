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
                    <a href="https://dreamdesignpark.com/how-to-clear-browser-cache/"
                       target="_blank">
                        <img src="https://dreamdesignpark.com/wp-content/uploads/2020/01/Browser-Cache.jpg"
                             alt="">
                    </a>
                </div>
                <!-- blog-thumb-->
                <div class="blog-info">
                    <h3>How to clear browser cache</h3>
                    <p>If you are looking for how to clear browser cache without fear that you might
                        mess with your other settings, you’ve come to the right place. Cache doesn’t
                        deserve the bad reputation, because cache are using for speed things up and
                        there are benefits to clearing it on occasion   </p>
                </div>
                <!-- blog-thumb-->
            </div>
            <!--blog-item-->


        </div>
        <!--blog-wrapper-->
    </div>
</section>
@endsection