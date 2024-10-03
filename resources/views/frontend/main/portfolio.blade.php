@extends('frontend.frontend')

@section('content')
<section id="portfolio" class="page-section">
    <div class="container-lg">
        <div class="row my-4">
            <div class="col">
                <h2 class="mb-3">Portfolio</h2>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="portfolio-wrapper">
                    @foreach($projects as $project)
                        <div class="portfolio-item">
                            <div class="portfolio-item-inner">
                                <div class="portfolio-thumb">
                                    <img width="" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                                </div>
                                <div class="portfolio-info">
                                    <h4>{{ $project->title }}</h4>
                                    <div class="portfolio-summery">
                                        <p class="">{{ $project->subtitle }}</p>
                                        <button class="btn btn-brand btn-details">View Details</button>
                                    </div>
                                    <div class="portfolio-details">
                                        <p>{!! $project->description !!}</p>
                                        <a href="{{ $project->live_url }}" target="_blank" class="btn btn-brand">Live URL</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
