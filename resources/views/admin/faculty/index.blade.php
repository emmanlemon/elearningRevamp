<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" type="image/x-icon" href="{{ url("../images/sca_logo.png") }}" />
    <title>Admin Teacher</title>
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
@extends('admin.index')
@extends('components.molecule.sideBarNavigation')
@section('sideBarNavigation')
<section class="home-section" style="background-image:url('https://images.hdqwalls.com/wallpapers/white-cube-pattern-4k-bu.jpg'); background-size: cover;">
  <div class="text">Admin Teacher Dashboard
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">+ Add Teacher</button>
    </div>
    <div class="card-body-table">
        <table id="tblUsers" class="table table-striped  table-hover table-responsive" style="font-size:12px" cellspacing="0">
          <h2>Teacher List<i class='bx bxs-user-circle'></i></h2>
          @if(Session::has('success'))
          <div class="alert alert-success">{{ Session::get('success') }}</div>
          @elseif(Session::has('fail'))
          <div class="alert alert-danger">{{ Session::get('fail') }}</div>
          @elseif(Session::has('update'))
          <div class="alert alert-success">{{ Session::get('update') }}</div>
          @elseif(Session::has('delete'))
          <div class="alert alert-danger">{{ Session::get('delete') }}</div>
          @endif
          <div align="center" style="margin-bottom: 20px;" >  
            </i><input type="text" name="search" id="search" class="form-control" placeholder="Search For Teacher Input Here ...." />  
          </div>
            <thead>
                <tr>
                    <th>Teacher ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th> 
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Subject</th>
                    <th>Grade</th>
                    <th >Action</th> 
                </tr>	
            </thead> 
            <tbody>
                @foreach($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->faculty_id }}</td>
                    <td>{{ $teacher->firstname }}</td>
                    <td>{{ $teacher->middlename }}</td>
                    <td>{{ $teacher->lastname }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->contact }}</td>
                    <td>{{ $teacher->gender }}</td>
                    <td>{{ $teacher->address }}</td>
                    <td>{{ $teacher->subject }}</td>
                    <td>{{ $teacher->grade }}</td>

                    <td>
                      <div style="display:flex; gap:.5em;">
                          <button data-id="{{ $teacher->id }}" id="editbtn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateFaculty">Edit</button>
                          <div class="deleteButton">
                            <form action='{{ url("teacher/page/$teacher->id") }}' method="post">
                            <input class="btn btn-danger" type="submit" value="Delete" />
                            @method('delete')
                            @csrf
                          </form>
                          </div>
                      </div>
		                </div>
					            </td>
                  </tr>
                @endforeach
            </tbody>
        </table>
        <p id="result"></p>
         <div>
                    {{ $teachers->links() }}
           </div>
       
  
  <!-- Update Modal -->
  <div class="modal fade" id="updateFaculty" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Update Teacher</h5>
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
                <div class="form-group">
                    <label>Teacher ID:</label>
                    <input type="text" name="faculty_id" class="form-control" placeholder="Enter Teacher ID" required>
                  @error('faculty_id')
                  <p class="error">{{ $message }}</p>
                  @enderror
                  </div>
            
                  <div class="form-group">
                    <label>First Name:</label>
                    <input type="text" name="firstname" class="form-control" placeholder="Enter First Name" required>
                  </div>

                  <div class="form-group">
                    <label>Middle Name:</label>
                    <input type="text" name="middlename" class="form-control" placeholder="Enter Middle Name" required>
                  </div>
                  
                  <div class="form-group">
                    <label>Last Name:</label>
                    <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name" required>
                  </div>

                  <div class="form-group">
                    <label for="sel1">Gender:</label>
                    <select class="form-control" name="gender">
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Address:</label>
                    <input type="text" class="form-control" name="address" required placeholder="Enter Address">
                  </div>
                  <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email">
                    @error('email')
                    <p class="error">{{ $message }}</p>
                   @enderror
                  </div>
                  <div class="form-group">
                    <label for="date">Contact:</label>
                    <input type="number" class="form-control" name="contact" required placeholder="Enter Contact Number(+63XXXXXXXXX)">
                </div>

                  <input type="hidden" name="password" value="password" >
                  
                  <div class="form-group">
                    <label for="sel1">Grade Level:</label>
                    <select class="form-control" name="grade">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="sel1">Subject:</label>
                    <select class="form-control" name="subject">
                      <option value="Mother Tongue">Mother Tongue</option>
                      <option value="Math">Math</option>
                      <option value="Science">Science</option>
                      <option value="History">History</option>
                      <option value="English">English</option>
                    </select>
                  </div>
                  
            
                <div class="form-group">
                  <button class="btn btn-danger upload-image" id="save" type="submit">Save</button>
                  <button class="btn btn-danger upload-image" type="submit">Reset</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    {{-- Create Modal --}}
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Teacher</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('teacher/page')}}" enctype="multipart/form-data" method="POST">
                <div class="alert alert-danger print-error-msg" style="display:none">
                </div>
            
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="csrf">
                <div class="form-group">
                    <label>Teacher ID:</label>
                    <input type="text" name="faculty_id" class="form-control" placeholder="Enter Teacher ID" required>
                    @error('faculty_id')
                    <p class="error">{{ $message }}</p>
                  @enderror
                  </div>
            
                  <div class="form-group">
                    <label>First Name:</label>
                    <input type="text" name="firstname" class="form-control" placeholder="Enter First Name" required>
                  </div>

                  <div class="form-group">
                    <label>Middle Name:</label>
                    <input type="text" name="middlename" class="form-control" placeholder="Enter Middle Name" required>
                  </div>
                  
                  <div class="form-group">
                    <label>Last Name:</label>
                    <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name" required>
                  </div>

                  <div class="form-group">
                    <label for="sel1">Gender:</label>
                    <select class="form-control" name="gender">
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Address:</label>
                    <input type="text" class="form-control" name="address" required placeholder="Enter Address">
                  </div>
                  <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email">
                    @error('email')
                    <p class="error">{{ $message }}</p>
                   @enderror
                  </div>
                  <div class="form-group">
                    <label for="date">Contact:</label>
                    <input type="number" class="form-control" name="contact" required placeholder="Enter Contact Number(+63XXXXXXXXX)">
                </div>

                  <input type="hidden" name="password" value="password" >
                  
                  <div class="form-group">
                    <label for="sel1">Grade Level:</label>
                    <select class="form-control" name="grade">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="sel1">Subject:</label>
                    <select class="form-control" name="subject">
                      <option value="Mother Tongue">Mother Tongue</option>
                      <option value="Math">Math</option>
                      <option value="Science">Science</option>
                      <option value="History">History</option>
                      <option value="English">English</option>
                    </select>
                  </div>
                  
            
                <div class="form-group">
                  <button class="btn btn-danger upload-image" id="save" type="submit">Save</button>
                  <button class="btn btn-danger upload-image" type="submit">Reset</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
    </div>
</section>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKOU_JfykYBj4kDS8ryXPSd0kxsygDcGU&libraries=places"></script>
<script>
jQuery(document).ready(function($) {
  $('#search').keyup(function(){  
            search_table($(this).val());  
       });  
       function search_table(value){  
            $('#tblUsers tbody tr').each(function(){  
                 var found = 'false';  
                 $(this).each(function(){  
                      if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                      {  
                           found = 'true';  
                      }
                 });  
                 if(found == 'true')  
                 {  

                      $("#result").html("No Result Found!").hide();
                      $(this).show();  
                 }  
                 else  
                 {  
                      $("#result").html("No Result Found!").show();
                      $(this).hide();  
                 }  
            });  
       }  

   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.home-section').on('click', '#editbtn', function () {

      var post_id = $(this).data('id');

      let updateroute = "/teacher/page/"+post_id;
      $("#formid").attr("action", updateroute);


      $.get('/teacher/page/'+post_id+'/edit', function (data) {
                  $('#editmodal').modal('show');
      });

    });
} );
</script>
@endsection


