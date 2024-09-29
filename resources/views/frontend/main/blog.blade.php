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
            <div class="blog-item">
                <div class="blog-thumb">
                    <a href="blog-details.html">
                        <img src="{{ asset('/') }}assets/images/Browser-Cache.jpg"
                             alt="">
                    </a>
                </div>
                <!-- blog-thumb-->
                <div class="blog-info">
                    <h3><a href="blog-details.html">How to clear browser cache</a></h3>
                    <p>If you are looking for how to clear browser cache without fear that you might
                        mess with your other settings, you’ve come to the right place. Cache doesn’t
                        deserve the bad reputation, because cache are using for speed things up and
                        there are benefits to clearing it on occasion
                        <a href="blog-details.html" target="_blank">Read more</a> </p>
                </div>
                <!-- blog-thumb-->
            </div>
            <!--blog-item-->
            <div class="blog-item">
                <div class="blog-thumb">
                    <a href="blog-details.html">
                        <img src="{{ asset('/') }}assets/images/create-mobile-friendly-website.jpg"
                             alt="">
                    </a>
                </div>
                <!-- blog-thumb-->
                <div class="blog-info">
                    <h3><a href="blog-details.html">How to make existing website mobile friendly</a></h3>
                    <p>Now a days mobile friendly website is not only a good practice for website
                        but its also an impotent feature for any website. Mobile user is increasing
                        day by day and they are using internet from their mobile devices. Most of
                        the time peoples are using mobile devices out of the home of while they are
                        taking rest. So nowadays mobile friendly website playing an impotent role in
                        different fields and sectors <a
                                href="blog-details.html">Read more</a> </p>
                </div>
                <!-- blog-thumb-->
            </div>
            <!--blog-item-->

        </div>
        <!--blog-wrapper-->
    </div>
</section>
@endsection