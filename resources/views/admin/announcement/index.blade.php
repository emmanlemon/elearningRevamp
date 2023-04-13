<!DOCTYPE html>
<head>
    <link rel="shortcut icon" type="image/x-icon" href="{{ url("../images/sca_logo.png") }}" />
    <title>Admin Announcement</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
@extends('admin.index')
@extends('components.molecule.sideBarNavigation')
@section('sideBarNavigation')
<section class="home-section" style="background-image:url('https://images.hdqwalls.com/wallpapers/white-cube-pattern-4k-bu.jpg'); background-size: cover;">
  <div class="text">Admin Announcement Dashboard
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">+ Add Announcement</button>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    @elseif(Session::has('delete'))
    <div class="alert alert-danger">{{ Session::get('delete') }}</div>
    @endif

    <div class="container" style="width: 90%;">
        @if (count($announcements) == 0)
        <h2><i class='bx bx-book-open'></i>No Announcement Posted.</h2>
        @else
        @foreach ($announcements as $announcement)
        {{-- <img src="{{ URL::asset($announcement->thumbnailImage) }}" class="img-thumbnail" alt="" download>
        <p><i class='bx bx-file'></i>File : {{ $announcement->file }}</p><a href="{{ URL::asset($announcement->file) }}" download><button class="btn btn-primary">Click Me to Download the File</button></a>
        <p>Link: <a href="{{ $announcement->link }}">{{ $announcement->link }}</a></p>
        <p>Full Description: {{ $announcement->description }}</p> --}}
  
        <div class="card flex-md-row mb-4 shadow bg-white rounded h-md-250">
            <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="{{ URL::asset('images/teacher/thumbnailImage/'.$announcement->thumbnailImage) }}" data-holder-rendered="true">
  
            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-0">
                <a class="text-dark" href="#">{{ $announcement->title }}</a>
              </h3>
              <div class="mb-1 text-muted">Created At: {{ date('F j, Y, g:i a', strtotime($announcement->created_at)) }} , {{ \Carbon\Carbon::parse($announcement->created_at)->diffForHumans() }}  </div>
              @if(empty($announcement->link))
              @else
              <p class="card-text ">Link: <a href="{{ $announcement->link }}">{{ $announcement->link }}</a></p>
              @endif              
              <p class="card-text ">Description: {{ $announcement->description }}</p>
              <div class="deleteButton">
                <form action='{{ url("admin/announcement/$announcement->id")}}' method="post">
                <input class="btn btn-danger" type="submit" value="Delete" />
                @method('delete')
                @csrf
              </form>
              </div>
            </div>
          </div>
        @endforeach
        @endif
          <div style="float:right;">
              {{ $announcements->links() }}
          </div>
        </div>



        <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Annoucement</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('admin/announcement')}}" enctype="multipart/form-data" method="POST">
                <div class="alert alert-danger print-error-msg" style="display:none">
                </div>
                @csrf
                <input type="hidden" name="created_at" value="{{ date("Y/m/d H:i:s");  }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="csrf">

                    <div class="form-group">
                    <label>Title:</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
                  </div>
                  <div class="form-group">
                    <label>Select Thumbnail Image:</label>
                    <input type="file" accept="image/*" name="thumbnailImage" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Link(Optional):</label>
                    <input type="text" class="form-control" name="link" placeholder="Enter A Link(Optional)">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description:</label>
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
    {{-- <div class="py-3 text-left footer-copyright" style=" 
    position: fixed; 
    left: 0;
    bottom: 0;
    width: 100%;
    border-top: 1px outset;
	background-color: #fff;
	font-size: 1.25em;
	text-shadow: 1px 1px 1px white;
    padding: 0;
    magin:0;"><h3 style="text-align: right;">© COPYRIGHT 2023. ALL RIGHTS RESERVED.</h3>
    </div> --}}
</section>
@endsection