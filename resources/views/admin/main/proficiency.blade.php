@extends('admin.dashboard')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="">
            <h1 class="text-primary">Skill Section</h1>
        </div>
        <div class="row mx-2">
            <div class="">
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addServiceModal">
                    Add New Skill
                </button>
            </div>
            <!-- Add New Service Modal -->
            <div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="addServiceModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addServiceModalLabel">Add New Service</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <form action="{{ route('proficiency.skill_store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="skill">Skill</label>
                                    <input type="text" name="skill" id="skill" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Skill</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
            
            
        </div>
        <div class="row">
            @foreach($skills as $skill)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4 d-flex justify-content-center">
                <div class="card bg-white shadow-lg rounded w-100">
                    <div class="card-body text-center d-flex align-items-center justify-content-between">
                        <h5 class="card-title mb-0">{{ $skill->skill }}</h5>
                        <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this skill?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger p-0" title="Delete">
                                <i class="ti-archive"></i> <!-- Font Awesome trash icon -->
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        </div>

        <!--Exprience-->

        <div class="mx-4">
            <h1 class="text-primary">Experience Section</h1>
        </div>
        
        <div class="row mx-4">
            <div class="">
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addExperienceModal">
                    Add New Experience
                </button>
            </div>
            
            <!-- Add New Experience Modal -->
            <div class="modal fade" id="addExperienceModal" tabindex="-1" role="dialog" aria-labelledby="addExperienceModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addExperienceModalLabel">Add New Experience</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <form action="{{ route('proficiency.exprience_store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="job_title">Job Title</label>
                                    <input type="text" name="job_title" id="job_title" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="year">Year</label>
                                    <input type="text" name="year" id="year" class="form-control" required>
                                    <small class="form-text text-muted">Please enter the year (e.g., 2024).</small>
                                </div>
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input type="file" name="logo" id="logo" class="form-control" accept="image/*">
                                    <small class="form-text text-muted">Upload a logo image</small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Experience</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
        
        <div class="row mt-3 mx-3">
            @foreach($expriences as $exprience)
                <div class="col-6 justify-content-center">
                    <div class="card bg-white shadow-lg rounded w-100">
                        <div class="card-body text-center align-items-center justify-content-between">
                            @if($exprience->logo)
                                <img src="{{ asset('storage/' . $exprience->logo) }}" alt="Logo" class="img-fluid" style="width: 100px; height:50px;">
                            @endif
                            <div>
                                <h5 class="card-title mb-0">{{ $exprience->job_title }}</h5>
                                <p class="card-text">{{ $exprience->year }}</p>
                            </div>
                            
                            <form action="{{ route('experiences.destroy', $exprience->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this experience?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger p-0" title="Delete">
                                    <i class="ti-archive"></i> <!-- Font Awesome trash icon -->
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection