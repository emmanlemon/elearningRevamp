<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url("../images/sca_logo.png") }}" />
    <link rel="stylesheet" style="text/css" href="{{ url('css/adminExtension.css') }}">
    <title>Pupil Lecture</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
@extends('student.index')
@extends('components.molecule.sideBarNavigationStudent')
@section('sideBarNavigation')
<section class="home-section" style="background-image: url('../images/background_student.jpg');  background-size: cover;">
  <button type="button" class="open-button" data-toggle="modal" data-target="#exampleModalCenter">
            Text <br>To<br> Speech
    </button>
    @extends('components.organism.textToSpeech')
    @section('textToSpeech')
    @endsection

    <div class="container">
        @foreach ($lecture as $lecture)
        <h2 class="text-capitalize">{{ $lecture->title }}</h2>
        <p>Created At: {{ date('F j, Y, g:i a', strtotime($lecture->created_at)) }} , {{ \Carbon\Carbon::parse($lecture->created_at)->diffForHumans() }}  </p>
        <video width="100%" height="600" controls>
            <source src="{{ URL::asset($lecture->path) }}" type="video/mp4">
        </video>
        {{-- <img src="{{ URL::asset($lecture->thumbnailImage) }}" class="img-thumbnail" alt="" download>
        <p><i class='bx bx-file'></i>File : {{ $lecture->file }}</p><a href="{{ URL::asset($lecture->file) }}" download><button class="btn btn-primary">Click Me to Download the File</button></a>
        <p>Link: <a href="{{ $lecture->link }}">{{ $lecture->link }}</a></p>
        <p>Full Description: {{ $lecture->description }}</p> --}}

        <div class="card flex-md-row mb-4 shadow bg-white rounded h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary">Lecture</strong>
              <h3 class="mb-0">
                <a class="text-dark" href="#">{{ $lecture->title }}</a>
              </h3>
              <div class="mb-1 text-muted">Created At: {{ date('F j, Y, g:i a', strtotime($lecture->created_at)) }} , {{ \Carbon\Carbon::parse($lecture->created_at)->diffForHumans() }}  </div>
              @if(empty($lecture->link))
              @else
              <p class="card-text ">Link: <a href="{{ $lecture->link }}">{{ $lecture->link }}</a></p>
              @endif              
              <p class="card-text ">Full Description: {{ $lecture->description }}</p>
              <p class="card-text "><i class='bx bx-file'></i>File : {{ $lecture->file }}<a href="{{ URL::asset($lecture->file) }}" target="blank" download><br><button class="btn btn-primary">Click Me to Download the File</button></a>               
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalCenter">Please Answer The Questions ...</button>
              </p>
              @if(Session::has('success'))
              <div class="alert alert-success">{{ Session::get('success') }}</div>
              @elseif(Session::has('error'))
              <div class="alert alert-danger">{{ Session::get('error') }}</div>
              @elseif(Session::has('update'))
              <div class="alert alert-danger">{{ Session::get('update') }}</div>
              @endif
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="{{ URL::asset($lecture->thumbnailImage) }}" data-holder-rendered="true">
        </div>
        @endforeach
    </div>

    <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Answer The Questions</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('question') }}" method="post" enctype="multipart/form">
                  @csrf
                  <input type="hidden" name="student_id" value="{{ $user->id }} ">
                  <input type="hidden" name="lecture_id" value="{{ $lecture->id }} ">

                  <div class="question">
                      <label for="">1.Walay atalusan mod abantayan mod video?</label>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio1" name="question1" value="1" required>Wala
                        <label class="form-check-label" for="radio1"></label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio2" name="question1" value="2">Anggapo
                        <label class="form-check-label" for="radio2"></label>
                      </div>
                  </div>
                  <div class="question">
                    <label for="">2. Malinew may Video ya abantayan mo?</label>
                    <div class="form-check">
                      <input type="radio" class="form-check-input" id="radio1" name="question2" value="1" required>Malinew
                      <label class="form-check-label" for="radio1"></label>
                    </div>
                    <div class="form-check">
                      <input type="radio" class="form-check-input" id="radio2" name="question2" value="2">Andi
                      <label class="form-check-label" for="radio2"></label>
                    </div>
                </div>
                <div class="question">
                  <label for="">3. Maayos may pag kakatalos mod abantayan mod video?</label>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio1" name="question3" value="1" required>On
                    <label class="form-check-label" for="radio1"></label>
                  </div>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio2" name="question3" value="2">Andi
                    <label class="form-check-label" for="radio2"></label>
                  </div>
                </div>
                <div class="question">
                  <label for="">4. Marakep so bangat to may manbabangat ed abantayan mod video?</label>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio1" name="question4" value="1" required>On
                    <label class="form-check-label" for="radio1"></label>
                  </div>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio2" name="question4" value="2">Andi
                    <label class="form-check-label" for="radio2"></label>
                  </div>
                </div>
                <div class="question">
                  <label for="">5. Mainumay may ibabangat tod video may abantayan mo?</label>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio1" name="question5" value="1" required>On
                    <label class="form-check-label" for="radio1"></label>
                  </div>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio2" name="question5" value="2">Andi
                    <label class="form-check-label" for="radio2"></label>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger">Save</button>
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


</section>
@endsection
<body>
</html>
