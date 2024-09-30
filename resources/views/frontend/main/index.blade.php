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
            @foreach ($services as $service )
            <div class="col-sm-6">
                <div class="service-box">
                    <i class="{{ $service->icon }} fa-2x"></i>
                    <h4> {{ $service->title }}</h4>
                    <p>{{ $service->description }}</p>
                </div>
            </div>
            @endforeach
             
        </div>
        <!--row-->
    </div>
</section>
@endsection