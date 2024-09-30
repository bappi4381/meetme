@extends('frontend.frontend')

@section('content')
<section id="resume" class="page-section">
    <div class="container-lg">
        <div class="row mt-4 mb-5">
            <div class="col-md-12">
                <h3 class="mb-3">Skills</h3>
                <ul class="skill-list">
                    @foreach ($skills as $skill )
                    <li>{{ $skill->skill }}</li>
                    @endforeach
                </ul>
            </div> <!--col-->
        </div>
        <!--row-->
        <div class="row">
            <div class="col-md-12">
                <h3 class="mb-3">Experience</h3>
            </div> <!--col-->
        </div>
        <!--row-->
        <div class="row mb-5">
            @foreach($experiences as $experience)
            <div class="col-sm-6">
                <div class="card experience-card p-4">
                    <div class="card-body">
                        <a target="_blank" href="#"> <img width="" height=""
                                                          src="{{ asset('storage/' . $experience->logo) }}" alt=""></a>

                        <p>{{ $experience->job_title  }}</p>
                        <p>{{ $experience->year }}</p>
                    </div>
                </div>
            </div> <!--col-->
            @endforeach
        </div>
        <!--row-->
        <div class="row mb-5">
            <div class="col-md-12">
                <h3 class="mb-3">Education</h3>
                @foreach ($educations as $education )
                    <div class="row mb-4">
                      <div class="col-md-4">
                        <strong>{{$education->year}}</strong>
                      </div>
                      <div class="col-md-8">
                        <h5>{{$education->degree}}</h5>
                        <p><strong>{{$education->institution}}</strong></p>
                        @if(!is_null($education->cgpa))
                            <p>CGPA: {{ $education->cgpa }} out of 4.00</p>
                        @endif
                      </div>
                    </div>
                @endforeach

            </div> <!--col-->
        </div>
        <!--row-->
        <div class="row">
            <div class="col">
                <div class="download-cv">
                    <a class="" target="_blank" href="storage/uploads/cv/Md sajjadul islam.pdf">
                        <i class="fa fa-download"></i> Download Resume
                    </a>
                </div>
            </div>
        </div>
        <!--row-->
    </div>
</section>
@endsection