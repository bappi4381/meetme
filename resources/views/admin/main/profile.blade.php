@extends('admin.dashboard')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Profile Section</h4>
        
                    <!-- Display success message -->
                    @if(session('success'))
                      <div class="alert alert-success">
                        {{ session('success') }}
                      </div>
                    @endif
        
                    <!-- Form -->
                    <form action="{{ route('profile.update', $header->id ?? 1) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <!-- Name ,position -->
                        <div class="d-flex form-inline">
                          <div class="form-group me-2">
                              <label for="name">Name</label>
                              <input type="text" class="form-control" name="name" value="{{ old('name', $profile->name ?? '') }}" placeholder="Name" required>
                              @error('name')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                        
                          <div class="form-group me-2">
                              <label for="position">Position</label>
                              <input type="text" class="form-control" name="position" value="{{ old('position', $profile->position ?? '') }}" placeholder="Position" required>
                              @error('position')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
        
                          <div class="form-group ms-2">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ old('phone', $profile->phone ?? '') }}" placeholder="Phone" required>
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
        
                          <div class="form-group ms-2">
                              <label for="email">Email</label>
                              <input type="text" class="form-control" name="email" value="{{ old('email', $profile->email ?? '') }}" placeholder="Email" required>
                              @error('position')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                        </div>
                      <div class="form-group">
                          <label for="location">Location</label>
                          <input type="text" class="form-control" name="location" value="{{ old('location', $profile->location ?? '') }}" placeholder="Location" required>
                          @error('location')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label for="objective">Objective</label>
                        <textarea class="form-control" name="obj" id="objective" placeholder="Objective" required rows="3">{{ old('obj', $profile->obj ?? '') }}</textarea>
                        @error('obj')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <!-- File Upload -->
                      <div class="form-group">
                        <label for="img">File Upload</label>
                        <input type="file" id="img" name="image" class="form-control">
                        @error('img')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
        
                      @if($profile && $profile->image)
                            <div class="form-group">
                                <label class="col-form-label">Preview Image</label>
                                <div class="col-sm-12 col-md-7">
                                    <img class="w-25" src="{{ asset('storage/'. $profile->image) }}" alt="Preview Image">
                                </div>
                            </div>
                      @endif
                      <!-- Button One Link -->
                      <div class="form-group">
                        <label for="fa_link">Facebook Link</label>
                        <input type="url" class="form-control" name="fa_link" value="{{ old('fa_link', $profile->fa_link ?? '') }}" placeholder="Button link">
                        @error('fa_link')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="x_link">X Link</label>
                        <input type="url" class="form-control" name="x_link" value="{{ old('x_link', $profile->x_link ?? '') }}" placeholder="X link">
                        @error('x_link')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="git_link">Github Link</label>
                        <input type="url" class="form-control" name="git_link" value="{{ old('git_link', $profile->git_link ?? '') }}" placeholder="Github link">
                        @error('git_link')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="be_link">Behance Link</label>
                        <input type="url" class="form-control" name="be_link" value="{{ old('be_link', $profile->be_link ?? '') }}" placeholder="Behance link">
                        @error('button_one_link')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="dr_link">Dribbble</label>
                        <input type="url" class="form-control" name="dr_link" value="{{ old('dr_link', $profile->dr_link ?? '') }}" placeholder="Dribbble link">
                        @error('dr_link')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="li_link">Linkdin Link</label>
                        <input type="url" class="form-control" name="li_link" value="{{ old('li_link', $profile->li_link ?? '') }}" placeholder="Linkdin link">
                        @error('li_link')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="cv_link">Cv download Link</label>
                        <input type="url" class="form-control" name="cv_link" value="{{ old('cv_link', $profile->cv_link ?? '') }}" placeholder="Cv Download link">
                        @error('cv_link')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <!-- Submit and Cancel buttons -->
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit Profile</button>
                      <button type="button" class="btn btn-light" onclick="window.history.back();">Cancel</button>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection