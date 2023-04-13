<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" type="image/x-icon" href="{{ url("../images/sca_logo.png") }}" />
  <title>Pupil Lecture</title>
      @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
@extends('faculty.index')
@extends('components.molecule.sideBarNavigationStudent')
@section('sideBarNavigation')
<section class="home-section" style="background-image: url('https://wallpaperaccess.com/full/6349102.jpg');  background-size: cover;">
  <button type="button" class="open-button" data-toggle="modal" data-target="#exampleModalCenter">
        Text <br>To<br> Speech
    </button>
    @extends('components.organism.textToSpeech')
    @section('textToSpeech')
    @endsection
    
    <div class="text">Pupil Lecture <i class='bx bxs-book-bookmark' ></i></div>
    <div class="container" style="width: 90%;">
      @if (count($lectures) == 0)
      <h2><i class='bx bx-book-open'></i>No lecture Posted.</h2>
      @else
      @foreach ($lectures as $lecture)
      {{-- <img src="{{ URL::asset($lecture->thumbnailImage) }}" class="img-thumbnail" alt="" download>
      <p><i class='bx bx-file'></i>File : {{ $lecture->file }}</p><a href="{{ URL::asset($lecture->file) }}" download><button class="btn btn-primary">Click Me to Download the File</button></a>
      <p>Link: <a href="{{ $lecture->link }}">{{ $lecture->link }}</a></p>
      <p>Full Description: {{ $lecture->description }}</p> --}}

      <div class="card flex-md-row mb-4 shadow bg-white rounded h-md-250">
          <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 300px; height: 250px;" src="{{ URL::asset($lecture->thumbnailImage) }}" data-holder-rendered="true">

          <div class="card-body d-flex flex-column align-items-start">
            <h3 class="mb-0">
              <a class="text-dark" href="#">{{ $lecture->title }}</a>
            </h3>
            <div class="mb-1 text-muted">Created At: {{ date('F j, Y, g:i a', strtotime($lecture->created_at)) }} , {{ \Carbon\Carbon::parse($lecture->created_at)->diffForHumans() }}  </div>             
            <p class="card-text ">Full Description: {{ $lecture->shortDescription }}</p>
            <a href="{{ url('student/check/lecture/'.$lecture->id)}}"class="btn btn-sm btn-danger btn-outline-secondary">See More</a>                  </div>
          </div>
      @endforeach
      @endif
        <div style="float:right;">
            {{ $lectures->links() }}
        </div>
    </div>

       
      

  {{-- <div class="album">
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
  </div> --}}

</section>
@endsection


