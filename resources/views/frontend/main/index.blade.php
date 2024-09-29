@extends('frontend.frontend')

@section('content')
<section id="about" class="page-section active-section">
    <div class="container-lg">

        <div class="row my-4">
            <div class="col-md-12">

                <p>
                    {{ $profile->obj ?? 'N/A' }}
                </p>
            </div> <!--col-->
        </div>
        <!--row-->
        <div class="row mb-5">
            <div class="col-md-12">
                <h3 class="mb-4">What I do?</h3>
            </div>
            <div class="col-sm-6">
                <div class="service-box">
                    <i class="fas fa-swatchbook fa-2x"></i>
                    <h4> UI/UX Design</h4>
                    <p> Creating game-changing products that evoke a sense of excitement, closeness
                        and satisfaction for the user.</p>
                </div>
            </div> <!--col-->
            <div class="col-sm-6">
                <div class="service-box">
                    <i class="fas fa-drafting-compass fa-2x"></i>
                    <h4> Frontend Development</h4>
                    <p>Develop 100% pixel perfect and mobile friendly website from any UI
                        design. Also improving existing UI/UX for any application. </p>
                </div>
            </div> <!--col-->
            <div class="col-sm-6">
                <div class="service-box">
                    <i class="fab fa-wordpress-simple fa-2x"></i>
                    <h4>WP Theme Development</h4>
                    <p> I have developed 500+ WordPress website for different clients. Also develop
                        some premium WP theme for different marketplace </p>
                </div>
            </div> <!--col-->
            <div class="col-sm-6">
                <div class="service-box">
                    <i class="fas fa-chart-line fa-2x"></i>
                    <h4>Digital Marketing & SEO</h4>
                    <p> Doing digital marketing & SEO for my personal business and for my nearest
                        client. SEO skill helps to create optimize website for all. </p>
                </div>
            </div> <!--col-->
        </div>
        <!--row-->
    </div>
</section>
@endsection