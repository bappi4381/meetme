@extends('admin.dashboard')
@section('content')
<div class="content-body">
    <div class="container-fluid mt-2">
        <h2 class="text-uppercase mb-3">Portfolio Tabs</h2>


        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link text-uppercase active" id="add-portfolio-tab" data-bs-toggle="tab" href="#add-portfolio" role="tab" aria-controls="add-portfolio" aria-selected="true">Add new project</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link text-uppercase" id="show-portfolio-tab" data-bs-toggle="tab" href="#show-portfolio" role="tab" aria-controls="show-portfolio" aria-selected="false">Show projects</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content mt-3" id="myTabContent">
            <!-- Add Portfolio Tab -->
            <div class="tab-pane fade show active" id="add-portfolio" role="tabpanel" aria-labelledby="add-portfolio-tab">
                <h3>Add New Project</h3>
                <p>Here you can add new portfolio projects.</p>

                <form action="{{ route('protfolio.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="portfolioImage" class="form-label">Project Image</label>
                        <input type="file" class="form-control" id="portfolioImage" name="image" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label for="portfolioTitle" class="form-label">Project Title</label>
                        <input type="text" class="form-control" id="portfolioTitle" name="title" placeholder="Enter project title" required>
                    </div>
                    <div class="mb-3">
                        <label for="portfolioTitle" class="form-label">Project Subtitle</label>
                        <textarea class="form-control" id="portfolioSubtitle" name="subtitle" rows="5" placeholder="Enter project description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="portfolioDescription" class="form-label">Project Description</label>
                        <textarea class="form-control" id="portfolioDescription" name="description" rows="5" placeholder="Enter project description" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit Project</button>
                    <button id="switchToShowPortfolio" class="btn btn-secondary mt-3" type="button">Go to Show Projects</button>
                </form>
            </div>

            <!-- Show Portfolio Tab -->
            <div class="tab-pane fade" id="show-portfolio" role="tabpanel" aria-labelledby="show-portfolio-tab">
                <h3>Show Projects</h3>

                @foreach ($projects as $project)
                <div class="card">
                    <div class="d-flex">
                        <div class="my-3 mx-3">
                            <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top" alt="Blog Image" style="width: 250px; height:150px;">
                        </div>
                        <div class="my-3 mx-3">
                            <h5 class="card-title text-uppercase">{{ $project->title }}</h5>
                            <p class="card-text">{{ $project->subtitle }}</p>
                            <div class="d-flex">
                                <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#editProjectModal{{ $project->id }}">
                                    Edit Project
                                </button>
                                <button type="button" class="btn btn-warning text-white me-3" data-bs-toggle="modal" data-bs-target="#projectModal{{ $project->id }}">
                                    Project Details
                                </button>
                                <form action="{{ route('protfolio.destroy', $project->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="projectModal{{ $project->id }}" tabindex="-1" aria-labelledby="projectModalLabel{{ $project->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="d-flex">
                                <div class=" mt-3 ms-2">
                                    <img src="{{ asset('storage/' . $project->image) }}" alt="Project Image" style="width: 100%;">
                                </div>
                                <div>
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="projectModalLabel{{ $project->id }}">Project Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Project details here -->
                                        <h3>{{ $project->title }}</h3>
                                        <p>{{ $project->subtitle }}</p>
                                        <p>{!! $project->description !!}</p>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="editProjectModal{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="editProjectModalLabel{{ $project->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document"> <!-- Added modal-lg class for larger size -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editProjectModalLabel{{ $project->id }}">Edit Project</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                
                                <!-- Success Message -->
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                
                                <form action="{{ route('protfolio.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                
                                    <!-- Project Title -->
                                    <div class="mb-3">
                                        <label for="projectTitle{{ $project->id }}" class="form-label">Project Title</label>
                                        <input type="text" class="form-control" id="projectTitle{{ $project->id }}" name="title" value="{{ $project->title }}" required>
                                    </div>
                
                                    <!-- Project Image -->
                                    <div class="mb-3">
                                        <label for="projectImage{{ $project->id }}" class="form-label">Project Image</label>
                                        <input type="file" class="form-control" id="projectImage{{ $project->id }}" name="image" accept="image/*" onchange="previewProjectImage{{ $project->id }}(event)">
                                        <small>Current image: <img src="{{ asset('storage/' . $project->image) }}" alt="Project Image" width="100"></small>
                                        <br>
                                        <!-- Image Preview -->
                                        <img id="imagePreview{{ $project->id }}" src="" style="display: none; width: 100px;" alt="New Image Preview">
                                    </div>
                
                                    <!-- Project Subtitle -->
                                    <div class="mb-3">
                                        <label for="projectSubtitle{{ $project->id }}" class="form-label">Project Subtitle</label>
                                        <textarea class="form-control" id="projectSubtitle{{ $project->id }}" name="subtitle" rows="3" required>{{ $project->subtitle }}</textarea>
                                    </div>
                
                                    <!-- Project Description (with Summernote) -->
                                    <div class="mb-3">
                                        <label for="projectDescription{{ $project->id }}" class="form-label">Project Description</label>
                                        <textarea class="form-control summernote" id="projectDescription{{ $project->id }}" name="description" rows="5" required>{!! $project->description !!}</textarea>
                                    </div>
                
                                    <button type="submit" class="btn btn-primary">Update Project</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <script>
                // Preview selected image
                function previewProjectImage{{ $project->id }}(event) {
                    var imagePreview = document.getElementById('imagePreview{{ $project->id }}');
                    var reader = new FileReader();
                    reader.onload = function(){
                        imagePreview.src = reader.result;
                        imagePreview.style.display = 'block';
                    }
                    reader.readAsDataURL(event.target.files[0]);
                }
                
                // Initialize Summernote for this modal
                $(document).ready(function() {
                    $('#projectDescription{{ $project->id }}').summernote({
                        height: 300, // Height of Summernote editor
                        toolbar: [
                            ['style', ['bold', 'italic', 'underline', 'clear']],
                            ['font', ['strikethrough', 'superscript', 'subscript']],
                            ['fontsize', ['fontsize']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['height', ['height']],
                            ['insert', ['link', 'picture', 'video']],
                        ]
                    });
                });
                </script>                
                
                @endforeach
            </div>
        </div>

    </div>
</div>
<script>
    // Switch to "Show Projects" tab when "Go to Show Projects" button is clicked
    document.getElementById('switchToShowPortfolio').addEventListener('click', function (e) {
        e.preventDefault();  // Prevent default form submission
        var showPortfolioTab = new bootstrap.Tab(document.querySelector('#show-portfolio-tab'));
        showPortfolioTab.show();
    });

    // Initialize Summernote WYSIWYG editor for project description
    $(document).ready(function() {
        $('#portfolioDescription').summernote({
            height: 300, // Set editor height for project description
        });
    });
</script>

@endsection
