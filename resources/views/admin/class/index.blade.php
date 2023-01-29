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
<section class="home-section">
    <div class="text">Admin Class Dashboard</div>
    <div class="row gap-5 ms-3 justify-content-center" >
        <div class="card" style="width: 25rem;">
            <img class="card-img-top " src="{{ URL::asset('images/1st grade.png') }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Grade 1</h5>
              <p class="card-text">Teachers: {{ $grade1Teachers->count() }} </p>
              <p class="card-text">Students: {{ $grade1Teachers->count() }} </p>
              {{-- <a href="#" class="btn btn-danger">Click Me!! <i class='bx bxs-down-arrow-circle'></i></a> --}}
            </div>
          </div>
          <div class="card" style="width: 25rem;">
            <img class="card-img-top" src="{{ URL::asset('images/2nd grade.png') }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Grade 2</h5>
              <p class="card-text">Teachers: {{ $grade2Teachers->count() }}</p>
              <p class="card-text">Students: {{ $grade1Teachers->count() }} </p>
              {{-- <a href="#" class="btn btn-danger">Click Me!! <i class='bx bxs-down-arrow-circle'></i></a> --}}
            </div>
          </div>
          <div class="card" style="width: 25rem;">
            <img class="card-img-top" src="{{ URL::asset('images/3rd grade.png') }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Grade 3</h5>
              <p class="card-text">Teachers: {{ $grade3Teachers->count() }}</p>
              <p class="card-text">Students: {{ $grade1Teachers->count() }} </p>
              {{-- <a href="#" class="btn btn-danger">Click Me!! <i class='bx bxs-down-arrow-circle'></i></a> --}}
            </div>
          </div> 
    </div>

    <div class="card-body-table" style="margin-top: 30px; margin-bottom: 0px;">
        <h2><i class='bx bx-user' ></i> Grade 1 Teachers and Students</h2>
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Faculty ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Subjects</th>
                <th scope="col">No. of Students</th>
                <th scope="col">Data</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($grade1Teachers as $grade1Teacher)
                    <tr>
                        <th>{{ $grade1Teacher->facultyId }}</th>
                        <td>{{ $grade1Teacher->firstname }} {{ $grade1Teacher->middlename }} {{ $grade1Teacher->lastname}}</td>
                        <td>{{ $grade1Teacher->subject }}</td>
                        <td>1</td>
                        <td><a href="" class="btn btn-danger"> See Data</a></td>
                     </tr>
                @endforeach
            </tbody>
            {{-- <span style="float: right;">{{ $grade1Teachers->links() }}</span> --}}
        </table>
    </div>

    <div class="card-body-table" style="margin-top: 30px;">
        <h2><i class='bx bx-user' ></i> Grade 2 Teachers and Students</h2>
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Faculty ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Subjects</th>
                <th scope="col">No. of Students</th>
                <th scope="col">Data</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($grade2Teachers as $grade2Teacher)
                    <tr>
                        <th>{{ $grade2Teacher->facultyId }}</th>
                        <td>{{ $grade2Teacher->firstname }} {{ $grade1Teacher->middlename }} {{ $grade1Teacher->lastname}}</td>
                        <td>{{ $grade2Teacher->subject }}</td>
                        <td>1</td>
                        <td><a href="" class="btn btn-danger"> See Data</a></td>
                     </tr>
                @endforeach
                {{-- <span style="float: right;">{{ $grade2Teachers->links() }}</span> --}}
            </tbody>
        </table>
    </div>

    <div class="card-body-table" style="margin-top: 30px;">
        <h2><i class='bx bx-user' ></i> Grade 3 Teachers and Students</h2>
        <table class="table">
           
                @if (empty($grade3Teachers->id))
                    <tr>
                        <h3>No Data Result.</h3> 
                    </tr>
                @else
                <thead class="thead-dark">
                    <tr>
                      <th scope="col">Faculty ID</th>
                      <th scope="col">Full Name</th>
                      <th scope="col">Subjects</th>
                      <th scope="col">No. of Students</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($grade3Teachers as $grade3Teacher)
                        <tr>
                            <th>{{ $grade3Teacher->facultyId }}</th>
                            <td>{{ $grade3Teacher->firstname }} {{ $grade1Teacher->middlename }} {{ $grade1Teacher->lastname}}</td>
                            <td>{{ $grade3Teacher->subject }}</td>
                            <td>1</td>
                        </tr>
                    @endforeach
                </tbody>
                                {{-- <span style="float: right;">{{ $grade3Teachers->links() }}</span> --}}
                @endif
        </table>
    </div>

    
    
</section>
@endsection