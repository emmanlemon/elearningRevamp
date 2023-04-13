<!DOCTYPE html>
<head>
    <link rel="shortcut icon" type="image/x-icon" href="{{ url("../images/sca_logo.png") }}" />
    <link rel="stylesheet" style="text/css" href="{{ url('css/adminExtension.css') }}">
    <title>Admin Class</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
{{-- @extends('components.organism.textToSpeech')
@section('speech')
@endsection --}}
@extends('admin.index')
@extends('components.molecule.sideBarNavigation')
@section('sideBarNavigation')
<section class="home-section" style="background-image:url('https://images.hdqwalls.com/wallpapers/white-cube-pattern-4k-bu.jpg'); background-size: cover;">
  <div class="text">Admin Class Dashboard</div>

    <div class="data p-5 text-capitalize" style="font-size: 1.1em; background-color:white; margin: 30px; border-radius: 10px; box-shadow: 1px 1px 1px black;">
        <p class="m-1 p-0">Name: {{ $teacher->firstname }} {{ $teacher->middlename }} {{ $teacher->lastname}}</p>
        <p class="m-1 p-0">Faculty ID: {{ $teacher->faculty_id }}</p>
        <p class="m-1 p-0">Grade Level: {{ $teacher->grade }}</p>
        <p class="m-1 p-0">Subject: {{ $teacher->subject }}</p>
        <p class="m-1 p-0">Address: {{ $teacher->address }}</p>
        <p class="m-1 p-0">Email: {{ $teacher->email }}</p>
    </div>
    {{-- @if(Session::has('delete'))
    <div class="container alert alert-danger text-center">p{{ Session::get('delete') }}</div>
    @endif --}}
    {{-- Lecture --}}
    <div class="album">
        <div class="p-5">
            <h3>Lectures</h3>
          <div class="row row-cols-1 row-cols-sm-1 row-cols-md-4 g-3">
            @if(count($lectures) != 0)
            @foreach ($lectures as $lecture)
              <div class="col" style="height:auto;">
                <div class="card shadow-sm">
                  <img class="bd-placeholder-img card-img-top" style="width:100%; height: 400px;" src="{{ URL::asset($lecture->thumbnailImage) }}" alt="">
    
                  <div class="card-body">
                    <h3 class="text-capitalize">Title: {{ ($lecture->title) }}</h3>
                    <p class="card-text text-capitalize">Description: {{ ($lecture->shortDescription) }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                      {{-- <div class="btn-group">
                        <a href="{{ url('teacher/faculty/lecture/'.$lecture->id)}}"class="btn btn-sm btn-danger btn-outline-secondary"></a>                  </div> --}}
                        {{-- <div class="deleteButton">
                            <form action='{{ url("teacher/faculty/lecture/$lecture->id")}}' method="post">
                            <input class="btn btn-danger" type="submit" value="Delete" />
                            @method('delete')
                            @csrf
                          </form>
                        </div> --}}
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
          @else
            <h3><i class='bx bx-book-open'></i>No Lecture Posted.</h3>
            @endif
        </div>
      </div>

      {{-- Lecture --}}
    <div class="album">
        <div class="p-5">
            <h3>Lessons</h3>
          <div class="row row-cols-1 row-cols-sm-1 row-cols-md-4 g-3">
            @if(count($lectures) != 0)
            @foreach ($lessons as $lesson)
              <div class="col" style="height:auto;">
                <div class="card shadow-sm">
                  <img class="bd-placeholder-img card-img-top" style="width:100%; height: 400px;" src="{{ URL::asset($lesson->thumbnailImage) }}" alt="">
    
                  <div class="card-body">
                    <h3 class="text-capitalize">Title: {{ ($lesson->title) }}</h3>
                    <p class="card-text text-capitalize">Description: {{ ($lesson->description) }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                      {{-- <div class="btn-group">
                        <a href="{{ url('teacher/faculty/lecture/'.$lesson->id)}}"class="btn btn-sm btn-danger btn-outline-secondary">See More</a>                  </div> --}}
                        {{-- <div class="deleteButton">
                            <form action='{{ url("teacher/faculty/lecture/$lecture->id")}}' method="post">
                            <input class="btn btn-danger" type="submit" value="Delete" />
                            @method('delete')
                            @csrf
                          </form>
                        </div> --}}
                        <small class="text-muted">{{ \Carbon\Carbon::parse($lesson->created_at)->diffForHumans() }}</small>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach    
          </div>
          <div style="float: right;">
            {{ $lectures->links() }}
          </div>
          @else
          <h3><i class='bx bx-book-open'></i>No Lessons Posted.</h3>
          @endif
        </div>
      </div>

    {{-- Students --}}
      {{-- <div class="card-body-table">
        <table id="tblUsers" class="table table-striped  table-hover table-responsive" style="font-size:12px" cellspacing="0">
          <h2>Student List</h2>
          @if(count($students) != 0) 
        <thead>
          <tr>
              <th>Student ID</th>
              <th>First Name</th>
              <th>Middle Name</th>
              <th>Last Name</th> 
              <th>Age</th> 
              <th>Email</th>
              <th>Contact</th>
              <th>Gender</th>
              <th>Address</th>
          </tr>	
      </thead>
      <tbody>
          @foreach($students as $student)
          <tr>
              <td>{{ $student->student_id }}</td>
              <td>{{ $student->firstname }}</td>
              <td>{{ $student->middlename }}</td>
              <td>{{ $student->lastname }}</td>
              <td>{{ $student->age }}</td>
              <td>{{ $student->email }}</td>
              <td>{{ $student->contact }}</td>
              <td>{{ $student->gender }}</td>
              <td>{{ $student->address }}</td>
            </tr>
                @endforeach
                {{ $students->links() }}
            </tbody>
            @else
            <h3><i class='bx bxs-user-circle'></i>No Student.</h3>
            @endif
        </table> --}}
      
</section>
@endsection