<!DOCTYPE html>
<head>
    <link rel="shortcut icon" type="image/x-icon" href="{{ url("../images/sca_logo.png") }}" />
    <title>Teacher Announcement</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
@extends('admin.index')
@extends('components.molecule.sideBarNavigationTeacher')
@section('sideBarNavigation')
<section class="home-section" style="background-image: url('https://wallpaperaccess.com/full/1426869.jpg'); background-size: cover;">
  <div class="text">Teacher Announcement Dashboard</div>
    <div class="container" style="width: 90%;">
        @if (count($announcements) == 0)
        <h2><i class='bx bx-book-open'></i>No Announcement Posted.</h2>
        @else
        @foreach ($announcements as $announcement)
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
            </div>
          </div>
        @endforeach
        @endif
          <div style="float:right;">
              {{ $announcements->links() }}
          </div>
        </div>
</section>
@endsection