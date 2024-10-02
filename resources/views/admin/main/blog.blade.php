@extends('admin.dashboard')
@section('content')
<div class="content-body">
    <div class="container-fluid mt-2">
        <h2 class="text-uppercase mb-3">Blogs Tabs</h2>

        <!-- Tabs Navigation -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link text-uppercase active" id="add-blog-tab" data-bs-toggle="tab" href="#add-blog" role="tab" aria-controls="add-blog" aria-selected="true">Add new blog</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link text-uppercase" id="show-blog-tab" data-bs-toggle="tab" href="#show-blog" role="tab" aria-controls="show-blog" aria-selected="false">Show blog</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content mt-3" id="myTabContent">
            <!-- Add Blog Tab -->
            <div class="tab-pane fade show active" id="add-blog" role="tabpanel" aria-labelledby="add-blog-tab">
                <h3>Add New Blog</h3>
                <p>Here you can add new blog entries.</p>

                <form action="{{ route('blog.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="blogImage" class="form-label">Blog Image</label>
                        <input type="file" class="form-control" id="blogImage" name="image" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label for="blogTitle" class="form-label">Blog Title</label>
                        <input type="text" class="form-control" id="blogTitle" name="title" placeholder="Enter blog title" required>
                    </div>
                    <div class="mb-3">
                        <label for="blogContent" class="form-label">Blog Content</label>
                        <textarea class="form-control" id="blogContent" name="content" rows="5" placeholder="Enter blog content" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit Blog</button>
                    <button id="switchToShowBlog" class="btn btn-secondary mt-3" type="button">Go to Show Blog</button>
                </form>
            </div>

            <!-- Show Blog Tab -->
            <div class="tab-pane fade" id="show-blog" role="tabpanel" aria-labelledby="show-blog-tab">
                <h3>Show Blog</h3>

                @foreach ($blogs as $blog)
                <div class="card">
                    <div class="d-flex">
                        <div class="my-3 mx-3">
                            <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="Blog Image" style="width: 250px; height:150px;">
                        </div>
                        <div class="my-3 mx-3">
                            <h5 class="card-title text-uppercase">{{ $blog->title }}</h5>
                            <p class="card-text">{!! Str::limit(strip_tags($blog->content), 150) !!} <a href="{{ route('blog.show', $blog->id) }}">read more</a></p>
                            <div class="d-flex">
                                <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#editBlogModal{{ $blog->id }}">
                                    Edit Blog
                                </button>
                                <form action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Blog Modal -->
                <div class="modal fade" id="editBlogModal{{ $blog->id }}" tabindex="-1" role="dialog" aria-labelledby="editBlogModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document"> <!-- Added modal-lg class for larger size -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editBlogModalLabel">Edit Blog</h5>
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
                
                                <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                
                                    <!-- Blog Title -->
                                    <div class="mb-3">
                                        <label for="blogTitle{{ $blog->id }}" class="form-label">Blog Title</label>
                                        <input type="text" class="form-control" id="blogTitle{{ $blog->id }}" name="title" value="{{ $blog->title }}" required>
                                    </div>
                
                                    <!-- Blog Image -->
                                    <div class="mb-3">
                                        <label for="blogImage{{ $blog->id }}" class="form-label">Blog Image</label>
                                        <input type="file" class="form-control" id="blogImage{{ $blog->id }}" name="image" accept="image/*" onchange="previewImage{{ $blog->id }}(event)">
                                        <small>Current image: <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" width="100"></small>
                                        <br>
                                        <!-- Image Preview -->
                                        <img id="imagePreview{{ $blog->id }}" src="" style="display: none; width: 100px;" alt="New Image Preview">
                                    </div>
                
                                    <!-- Blog Content (with Summernote) -->
                                    <div class="mb-3">
                                        <label for="blogContent{{ $blog->id }}" class="form-label">Blog Content</label>
                                        <textarea class="form-control summernote" id="blogContent{{ $blog->id }}" name="content" rows="5" required>{!! $blog->content !!}</textarea>
                                    </div>
                
                                    <button type="submit" class="btn btn-primary">Update Blog</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <script>
                // Preview selected image
                function previewImage{{ $blog->id }}(event) {
                    var imagePreview = document.getElementById('imagePreview{{ $blog->id }}');
                    var reader = new FileReader();
                    reader.onload = function(){
                        imagePreview.src = reader.result;
                        imagePreview.style.display = 'block';
                    }
                    reader.readAsDataURL(event.target.files[0]);
                }
                
                // Initialize Summernote for this modal
                $(document).ready(function() {
                    $('#blogContent{{ $blog->id }}').summernote({
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
    document.getElementById('switchToShowBlog').addEventListener('click', function (e) {
        e.preventDefault();  // Prevent default form submission
        var showBlogTab = new bootstrap.Tab(document.querySelector('#show-blog-tab'));
        showBlogTab.show();
    });

    $(document).ready(function() {
        $('#blogContent').summernote({
            height: 300, // Set editor height
        });
    });
</script>
@endsection
