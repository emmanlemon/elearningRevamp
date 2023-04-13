<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url("../images/sca_logo.png") }}" />
    <link rel="stylesheet" style="text/css" href="{{ url('css/adminExtension.css') }}">
    <title>Teacher Lecture</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
@extends('faculty.index')
@extends('components.molecule.sideBarNavigationTeacher')
@section('sideBarNavigation')
<section class="home-section" style="background-image: url('https://wallpaperaccess.com/full/1426869.jpg'); background-size: cover;">
  <div class="container">
        @foreach ($lecture as $lecture)
        <h2 class="text-capitalize">{{ $lecture->title }}</h2>
        <p>Created At: {{ date('F j, Y, g:i a', strtotime($lecture->created_at)) }} , {{ \Carbon\Carbon::parse($lecture->created_at)->diffForHumans() }}  </p>
        @if(Session::has('update'))
        <div class="alert alert-success m-5">{{ Session::get('update') }}</div>
        @endif
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
              <span style="display:flex; gap: .7em;">  
                <h3 class="mb-0">
                  <a class="text-dark" href="#">{{ $lecture->title }}</a>
                </h3>
                <div class="deleteButton">
                  <button type="button" class="deleteButton btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">Edit</button>
                </div>
                <div class="deleteButton">
                  <form action='{{ url("teacher/faculty/lecture/$lecture->id")}}' method="post">
                  <input class="btn btn-danger" type="submit" value="Delete" />
                  @method('delete')
                  @csrf
                </form>
                </div>
              </span>
              
              <div class="mb-1 text-muted">Created At: {{ date('F j, Y, g:i a', strtotime($lecture->created_at)) }} , {{ \Carbon\Carbon::parse($lecture->created_at)->diffForHumans() }}  </div>
              @if(empty($lecture->link))
              @else
              <p class="card-text ">Link: <a href="{{ $lecture->link }}">{{ $lecture->link }}</a></p>
              @endif              
              <p class="card-text ">Full Description: {{ $lecture->description }}</p>
              <p class="card-text "><i class='bx bx-file'></i>File : {{ $lecture->file }}<a href="{{ URL::asset($lecture->file) }}" target="blank" download><br>
              <button class="btn btn-primary">Click Me to Download the File</button></a></p> 
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="{{ URL::asset($lecture->thumbnailImage) }}" data-holder-rendered="true">
          </div>
        @endforeach
        @if($respondent == 0)
        @else
        <table class="table bg-white">
          <thead class="thead-dark">
            <tr>
              <th scope="col"></th>
              <th scope="col">On</th>
              <th scope="col">Percentage</th>
              <th scope="col">Andi</th>
              <th scope="col">Percentage</th>

            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1.Walay atalusan mod abantayan mod video?</td>
              <td>{{ $question1 }}</td>
              <td><progress value="{{ intval($question1  * 100/ $respondent) }}" max="100"></progress> {{ intval($question1  * 100/ $respondent) }} % 
</td>
              <td>{{ abs($question1 - $respondent) }}</td>
              <td><progress value="{{ intval(abs($question1 - $respondent)  * 100/ $respondent)}}" max="100"> </progress> {{ intval(abs($question1 - $respondent)  * 100/ $respondent)}}%</td>
            </tr>
            <tr>
              <td>2. Malinew may Video ya abantayan mo?</td>
              <td>{{ $question2 }}</td>
              <td><progress value="{{ intval($question2  * 100/ $respondent) }}" max="100"></progress> {{ intval($question2  * 100/ $respondent) }} % </td>              
              <td>{{ abs($question2 - $respondent) }}</td>
              <td><progress value="{{ intval(abs($question2 - $respondent)  * 100/ $respondent)}}" max="100"> </progress> {{ intval(abs($question2 - $respondent)  * 100/ $respondent)}}%</td>
            </tr>
            <tr>
              <td>3. Maayos may pag kakatalos mod abantayan mod video?</td>
              <td>{{ $question3 }}</td>
              <td><progress value="{{ intval($question3  * 100/ $respondent) }}" max="100"></progress> {{ intval($question3  * 100/ $respondent) }} % </td>              
              <td>{{ abs($question3 - $respondent) }}</td>
              <td><progress value="{{ intval(abs($question3 - $respondent)  * 100/ $respondent)}}" max="100"> </progress> {{ intval(abs($question3 - $respondent)  * 100/ $respondent)}}%</td>
            </tr>
            <tr>
              <td>4. Marakep so bangat to may manbabangat ed abantayan mod video?</td>
              <td>{{ $question4 }}</td>
              <td><progress value="{{ intval($question4  * 100/ $respondent) }}" max="100"></progress> {{ intval($question4  * 100/ $respondent) }} % </td>              
              <td>{{ abs($question4 - $respondent) }}</td>
              <td><progress value="{{ intval(abs($question4 - $respondent)  * 100/ $respondent)}}" max="100"> </progress> {{ intval(abs($question4 - $respondent)  * 100/ $respondent)}}%</td>
            </tr>
            <tr>
              <td>5. Mainumay may ibabangat tod video may abantayan mo?</td>
              <td>{{ $question5 }}</td>
              <td><progress value="{{ intval($question5  * 100/ $respondent) }}" max="100"></progress> {{ intval($question5  * 100/ $respondent) }} % </td>              
              <td>{{ abs($question5 - $respondent) }}</td>
              <td><progress value="{{ intval(abs($question5 - $respondent)  * 100/ $respondent)}}" max="100"> </progress> {{ intval(abs($question5 - $respondent)  * 100/ $respondent)}}%</td>
            </tr>
          </tbody>
        </table>
          <h3>Total Respondent: {{ $respondent }}</h3>
        @endif
        
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Edit Lecture</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" enctype="multipart/form-data" method="POST" id="formid">
                <div class="alert alert-danger print-error-msg" style="display:none">
                </div>
                @method('PUT')
                @csrf
                <input type="hidden" name="created_at" value="{{ date("Y/m/d H:i:s");  }}">
                <input type="hidden" name="updated_at" value="{{ date("Y/m/d H:i:s");  }}">
                <input type="hidden" name="faculty_id" value="{{    auth()->id() }}" >

                    <div class="form-group">
                    <label>Title:</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $lecture->title) }}" required>
                  </div>
            
                  <div class="form-group">
                    <label>Select A Video:</label>
                    <input type="file" accept="video/*" name="video" value="{{ old('video', $lecture->path) }}" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Select Thumbnail Image:</label>
                    <input type="file" accept="image/*" name="thumbnailImage" value="{{ old('thumbnailImage', $lecture->thumbnailImage) }}" class="form-control" required>
                  </div>
                  
                  <div class="form-group">
                    <label>Select File:</label>
                    <input type="file" accept="file/*" name="file" value="{{ old('file', $lecture->file) }}" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Link(Optional):</label>
                    <input type="text" class="form-control" name="link" required value="{{ old('link', $lecture->link) }}">
                  </div>
                  <div class="form-group">
                    <label>Short Description:</label>
                    <input type="text" class="form-control" name="shortDescription" required value="{{ old('shortDescription', $lecture->shortDescription) }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Full Description:</label>
                    <textarea class="form-control" name="description" value="{{ old('description', $lecture->description) }}" rows="3"></textarea>
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
</section>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKOU_JfykYBj4kDS8ryXPSd0kxsygDcGU&libraries=places"></script>
<script>

  $(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.home-section').on('click', '#editbtn', function () {

      var post_id = $(this).data('id');

      let updateroute = "teacher/faculty/lecture/"+post_id;
      $("#formid").attr("action", updateroute);


      $.get('teacher/faculty/lecture/'+post_id+'/edit', function (data) {
                  $('#editmodal').modal('show');
      });

    });
  });
</script>
@endsection
<body>
</html>
