<!DOCTYPE html>
<html lang="en">
<head>
  <title>Teacher Lesson</title>
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
@extends('faculty.index')
@extends('components.molecule.sideBarNavigationTeacher')
@section('sideBarNavigation')
<section class="home-section" style="background-image: url('https://wallpaperaccess.com/full/1426869.jpg'); background-size: cover;">
  <div class="text">Teacher Lesson 
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">+ Add Lesson</button>
      </div>
      @if(Session::has('success'))
      <div class="alert alert-success m-5">{{ Session::get('success') }}</div>
      @elseif(Session::has('delete'))
      <div class="alert alert-danger m-5">{{ Session::get('delete') }}</div>
      @elseif(Session::has('update'))
      <div class="alert alert-success m-5">{{ Session::get('update') }}</div>
      @endif

      <div class="container" style="width: 90%;">
        @if(count($lessons) == 0)
        <h3><i class='bx bx-book-open'></i>No Lesson Posted.</h3>
        @else
        @foreach ($lessons as $lesson)
        {{-- <img src="{{ URL::asset($lesson->thumbnailImage) }}" class="img-thumbnail" alt="" download>
        <p><i class='bx bx-file'></i>File : {{ $lesson->file }}</p><a href="{{ URL::asset($lesson->file) }}" download><button class="btn btn-primary">Click Me to Download the File</button></a>
        <p>Link: <a href="{{ $lesson->link }}">{{ $lesson->link }}</a></p>
        <p>Full Description: {{ $lesson->description }}</p> --}}

        <div class="card flex-md-row mb-4 shadow bg-white rounded h-md-250 lesson">
            <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="{{ URL::asset($lesson->thumbnailImage) }}" data-holder-rendered="true">

            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-0">
                <a class="text-dark" href="#">{{ $lesson->title }}</a>
              </h3>
              <div class="mb-1 text-muted">Created At: {{ date('F j, Y, g:i a', strtotime($lesson->created_at)) }} , {{ \Carbon\Carbon::parse($lesson->created_at)->diffForHumans() }}  </div>
              @if(empty($lesson->link))
              @else
              <p class="card-text ">Link: <a href="{{ $lesson->link }}">{{ $lesson->link }}</a></p>
              @endif              
              <p class="card-text ">Full Description: {{ $lesson->description }}</p>
              <p class="card-text "><i class='bx bx-file'></i>File : {{ $lesson->file }}<a href="{{ URL::asset($lesson->file) }}" target="blank" download><br><button class="btn btn-primary">Click Me to Download the File</button></a></p>
              <div class="button" style="display: flex; gap: .5em;">
                <button data-id="{{ $lesson->id }}" class="btn btn-danger" type="button" id="editbtn" data-toggle="modal" data-target="#editModal">
                  Edit
               </button>
               <div class="deleteButton">
                 <form action='{{ url("teacher/faculty/lesson/$lesson->id")}}' method="post">
                 <input class="btn btn-danger" type="submit" value="Delete" />
                 @method('delete')
                 @csrf
               </form>
               </div>  
              </div>
            </div>
          </div>
        @endforeach
        <div style="float:right;">
            {{ $lessons->links() }}
        </div>
        @endif
      </div>

  
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Add lesson</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('teacher/faculty/lesson')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    
                    <input type="hidden" name="created_at" value="{{ date("Y/m/d H:i:s");  }}">
                    <input type="hidden" name="updated_at" value="{{ date("Y/m/d H:i:s");  }}">
                    <input type="hidden" name="faculty_id" value="{{  $id->id }}" >
    
                        <div class="form-group">
                        <label>Title:</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
                      </div>  
                      <div class="form-group">
                        <label>Select Thumbnail Image:</label>
                        <input type="file" accept="image/*" name="thumbnailImage" class="form-control" required>
                      </div>
                      
                      <div class="form-group">
                        <label>Select File(Optional):</label>
                        <input type="file" accept="file/*" name="file" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Link(Optional):</label>
                        <input type="text" class="form-control" name="link" required placeholder="Enter A Link(Optional)">
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


        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Lesson</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <form action="" method="POST" enctype="multipart/form-data" id="formid">
                    @method('PUT') 
                    @csrf
                      
                      <input type="hidden" name="created_at" value="{{ date("Y/m/d H:i:s");  }}">
                      <input type="hidden" name="updated_at" value="{{ date("Y/m/d H:i:s");  }}">
                      <input type="hidden" name="faculty_id" value="{{   $id->id }}" >
                          <div class="form-group">
                          <label>Title:</label>
                          <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
                        </div>  
                        <div class="form-group">
                          <label>Select Thumbnail Image:</label>
                          <input type="file" accept="image/*" name="thumbnailImage" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                          <label>Select File(Optional):</label>
                          <input type="file" accept="file/*" name="file" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>Link(Optional):</label>
                          <input type="text" class="form-control" name="link" required placeholder="Enter A Link(Optional)">
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

      let updateroute = "faculty/lesson/"+post_id;
      $("#formid").attr("action", updateroute);


      $.get('faculty/lesson/'+post_id+'/edit', function (data) {
                  $('#editmodal').modal('show');
      });

    });


  });
</script>
@endsection



