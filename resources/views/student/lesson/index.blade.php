<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" type="image/x-icon" href="{{ url("../images/sca_logo.png") }}" />
  <title>Pupil Lesson</title>
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
    
    <div class="text">Pupil Lesson <i class='bx bxs-book-bookmark' ></i></div>
      <div class="container" style="width: 90%;">
      @if (count($lessons) == 0)
      <h2><i class='bx bx-book-open'></i>No Lesson Posted.</h2>
      @else
      @foreach ($lessons as $lesson)
      {{-- <img src="{{ URL::asset($lesson->thumbnailImage) }}" class="img-thumbnail" alt="" download>
      <p><i class='bx bx-file'></i>File : {{ $lesson->file }}</p><a href="{{ URL::asset($lesson->file) }}" download><button class="btn btn-primary">Click Me to Download the File</button></a>
      <p>Link: <a href="{{ $lesson->link }}">{{ $lesson->link }}</a></p>
      <p>Full Description: {{ $lesson->description }}</p> --}}

      <div class="card flex-md-row mb-4 shadow bg-white rounded h-md-250">
          <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="{{ URL::asset($lesson->thumbnailImage) }}" data-holder-rendered="true">

          <div class="card-body d-flex flex-column align-items-start">
            <h3 class="mb-0">
              <a class="text-dark" href="#">{{ $lesson->title }}</a>
            </h3>
            {{-- <div class="mb-1 text-muted">Created At: {{ date('F j, Y, g:i a', strtotime($lesson->created_at)) }} , {{ \Carbon\Carbon::parse($lesson->created_at)->diffForHumans() }}  </div> --}}
            @if(empty($lesson->link))
            @else
            <p class="card-text ">Link: <a href="{{ $lesson->link }}">{{ $lesson->link }}</a></p>
            @endif              
            <p class="card-text ">Full Description: {{ $lesson->description }}</p>
            <p class="card-text text-capitalize">Teacher: {{ $lesson->firstname }} {{ $lesson->middlename }} {{ $lesson->lastname }} </p>
            <p class="card-text ">Subject: {{ $lesson->subject }}</p>
            <p class="card-text "><i class='bx bx-file'></i>File : {{ $lesson->file }}<a href="{{ URL::asset($lesson->file) }}" target="blank" download><br><button class="btn btn-primary">Click Me to Download the File</button></a></p>
          </div>
        </div>
      @endforeach
      @endif
        <div style="float:right;">
            {{ $lessons->links() }}
        </div>
      </div>
  
     
</section>
@endsection



