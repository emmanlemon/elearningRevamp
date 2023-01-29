<!DOCTYPE html>
<html lang="en">
<head>
    <title>Teacher Lecture</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
@extends('faculty.index')
@extends('components.molecule.sideBarNavigationTeacher')
@section('sideBarNavigation')
<section class="home-section">
    <div class="text">Teacher Lecture 
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">+ Add Lecture</button>
        @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
        @elseif(Session::has('delete'))
        <div class="alert alert-danger">{{ Session::get('delete') }}</div>
        @endif
      </div>
  
    <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Lecture</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('teacher/faculty/lecture')}}" enctype="multipart/form-data" method="POST">
                <div class="alert alert-danger print-error-msg" style="display:none">
                </div>
                
                <input type="hidden" name="created_at" value="{{ date("Y/m/d H:i:s");  }}">
                <input type="hidden" name="updated_at" value="{{ date("Y/m/d H:i:s");  }}">
                <input type="hidden" name="faculty_id" value="{{    auth()->id() }}" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="csrf">

                    <div class="form-group">
                    <label>Title:</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
                  </div>
            
                  <div class="form-group">
                    <label>Select A Video:</label>
                    <input type="file" accept="video/*" name="video" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Select Thumbnail Image:</label>
                    <input type="file" accept="image/*" name="thumbnailImage" class="form-control" required>
                  </div>
                  
                  <div class="form-group">
                    <label>Select File:</label>
                    <input type="file" accept="file/*" name="file" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Link(Optional):</label>
                    <input type="text" class="form-control" name="link" required placeholder="Enter A Link(Optional)">
                  </div>
                  <div class="form-group">
                    <label>Short Description:</label>
                    <input type="text" class="form-control" name="shortDescription" required placeholder="Enter Short Description">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Full Description:</label>
                    <textarea class="form-control" name="description" rows="3"></textarea>
                  </div>
                <div class="form-group">
                  <button class="btn btn-danger upload-image" id="save" type="submit">Save</button>
                  <button class="btn btn-danger upload-image" type="submit">Reset</button>
                </div>
            </div>
          </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>

  <div class="album">
    <div class="p-5">
      <div class="row row-cols-1 row-cols-sm-1 row-cols-md-4 g-3">
        @foreach ($lectures as $lecture)
          <div class="col" style="height:auto;">
            <div class="card shadow-sm">
              <img class="bd-placeholder-img card-img-top" style="width:100%; height: 400px;" src="{{ URL::asset($lecture->thumbnailImage) }}" alt="">

              <div class="card-body">
                <h3 class="text-capitalize">Title: {{ ($lecture->title) }}</h3>
                <p class="card-text text-capitalize">Description: {{ ($lecture->shortDescription) }}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="{{ url('teacher/faculty/lecture/'.$lecture->id)}}"class="btn btn-sm btn-danger btn-outline-secondary">See More</a>                  </div>
                  <small class="text-muted">{{ \Carbon\Carbon::parse($lecture->created_at)->diffForHumans() }}</small>
                </div>
              </div>
            </div>
          </div>
        @endforeach    
      </div>
      <div style="float: right;">
        {{ $lectures->links() }}
      </div>
    </div>
  </div>

</section>
@endsection


