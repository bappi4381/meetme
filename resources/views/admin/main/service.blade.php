@extends('admin.dashboard')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addServiceModal">
            Add New Service
        </button>

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
                    
                    <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title">Service Title</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Service Description</label>
                                <textarea name="description" id="description" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="icon">Icon</label>
                                <input type="text" name="icon" class="form-control" id="icon" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Service</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
        <div class="row mt-5">
            @foreach($services as $service)
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">
                        <h4 class="mb-0">{{ $service->title }}</h4>
                    </div>
                    <div class="card-body">
                        <i class="{{ $service->icon }} fa-2x mb-3"></i>
                        <p class="card-text">{{ $service->description }}</p>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editServiceModal{{ $service->id }}">
                            Update
                        </button>

                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this service?');">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editServiceModal{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="editServiceModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('services.update', $service->id) }}" method="POST">
                                @csrf
                                @method('PUT')
            
                                <div class="form-group">
                                    <label for="edit-icon-{{ $service->id }}">Icon</label>
                                    <input type="text" name="icon" class="form-control" id="edit-icon-{{ $service->id }}" value="{{ $service->icon }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="edit-title-{{ $service->id }}">Title</label>
                                    <input type="text" name="title" class="form-control" id="edit-title-{{ $service->id }}" value="{{ $service->title }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="edit-description-{{ $service->id }}">Description</label>
                                    <textarea name="description" class="form-control" id="edit-description-{{ $service->id }}" required>{{ $service->description }}</textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update Service</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Edit Service Modal -->
        
    </div>
</div>
@endsection

