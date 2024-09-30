@extends('admin.dashboard')

@section('content')
<div class="content-body">
   <div class="container-fluid mt-5 ">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addServiceModal">
        Add New Education
    </button>

    <!-- Add New Service Modal -->
    <div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="addServiceModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header mx-2">
                    <h5 class="modal-title" id="addServiceModalLabel">Education</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <form action="{{ route('education.store') }}" method="POST">
                    @csrf 
            
                    <div class="form-group mx-5">
                        <label for="degree">Degree</label>
                        <input type="text" name="degree" id="degree" class="form-control" value="{{ old('degree') }}" required>
                    </div>
            
                    <div class="form-group mx-5">
                        <label for="institution">Institution</label>
                        <input type="text" name="institution" id="institution" class="form-control" value="{{ old('institution') }}" required>
                    </div>
            
                    <div class="form-group mx-5">
                        <label for="year">Year of Graduation</label>
                        <input type="text" name="year" id="year" class="form-control" value="{{ old('year') }}" placeholder="Example:April 2017 - Jan 2022" required>
                    </div>
    
                    <div class="form-group mx-5">
                        <label for="cgpa">CGPA</label>
                        <input type="number" name="cgpa" id="cgpa" class="form-control" 
                               value="{{ old('cgpa') }}" step="0.01" min="0" max="4" placeholder="Enter CGPA">
                    </div>
    
            
                    <button type="submit" class="btn btn-primary mx-2 my-3">Add Education</button>
                    <a href="{{ route('education.index') }}" class="btn btn-secondary my-3">Cancel</a>
                </form>
            </div>
        </div>
       </div>
       <div class="row justify-content-center mt-5">
        <div class="col-8 bg-white shadow-lg rounded">
            <h1 class="text-primary my-5">Education</h1> 
            <div class="row mx-3">
                @foreach ($educations as $education )

                <div class="col-12 card bg-white shadow-lg rounded ">
                <div class="row my-3">
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
                <div class="card-footer">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editEducationModal{{ $education->id }}">
                        Update
                    </button>

                    <form action="{{ route('education.destroy', $education->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this service?');">
                            Delete
                        </button>
                    </form>
                </div>
                </div>
                <div class="modal fade" id="editEducationModal{{ $education->id }}" tabindex="-1" role="dialog" aria-labelledby="editEducationModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editEducationModalLabel">Edit Education</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
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
                                <form action="{{ route('education.update', $education->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                
                                    <div class="form-group">
                                        <label for="edit-degree-{{ $education->id }}">Degree</label>
                                        <input type="text" name="degree" class="form-control" id="edit-degree-{{ $education->id }}" value="{{ $education->degree }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-institution-{{ $education->id }}">Institution</label>
                                        <input type="text" name="institution" class="form-control" id="edit-institution-{{ $education->id }}" value="{{ $education->institution }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-year-{{ $education->id }}">Year of Graduation</label>
                                        <input type="text" name="year" class="form-control" id="edit-year-{{ $education->id }}" value="{{ $education->year }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-cgpa-{{ $education->id }}">CGPA</label>
                                        <input type="number" step="0.01" name="cgpa" class="form-control" id="edit-cgpa-{{ $education->id }}" value="{{ $education->cgpa }}" min="0" max="4">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update Education</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                @endforeach
                
              </div>
        </div>
       </div>
   </div>
</div>
@endsection