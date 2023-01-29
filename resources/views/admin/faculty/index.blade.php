<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Teacher</title>
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
@extends('admin.index')
@extends('components.molecule.sideBarNavigation')
@section('sideBarNavigation')
<section class="home-section">
    <div class="text">Admin Teacher Dashboard
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">+ Add Teacher</button>
    </div>
    <div class="card-body-table">
        <table id="tblUser" class="table table-striped  table-hover table-responsive" style="font-size:12px" cellspacing="0">
          <h2>Teacher List</h2>
          @if(Session::has('success'))
          <div class="alert alert-success">{{ Session::get('success') }}</div>
          @elseif(Session::has('delete'))
          <div class="alert alert-danger">{{ Session::get('delete') }}</div>
          @endif
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
						<div class="btn-group">
		                    <button type="button" class="btn btn-default btn-block btn-flat dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown" aria-expanded="false">
		                    	Action
		                      <span class="sr-only">Toggle Dropdown</span>
		                    </button>
		                    <div class="dropdown-menu" role="menu" style="">
		                      <a class="dropdown-item action_edit " href="javascript:void(0)" data-id="">Edit</a>
		                      <div class="dropdown-divider"></div>
                          <form action="" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn" style="background: none;
                                color: inherit;
                                border: none;
                                font: inherit;
                                cursor: pointer;
                                outline: inherit;
                                margin-top:-6px;
                                "> <i class="fas fa-edit fa-lg"></i>Delete
                             </button>
                          </form>
		                      {{-- <a class="dropdown-item" href="{{ url('student/{{$student ->id}}') }}">Delete</a> --}}
		                    </div>
		                </div>
					</td>
                  </tr>
                @endforeach
            </tbody>
        </table>
       
  
  <!-- Modal -->
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
            <form action="{{ url('teacher')}}" enctype="multipart/form-data" method="POST">
                <div class="alert alert-danger print-error-msg" style="display:none">
                </div>
            
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="csrf">
                <div class="form-group">
                    <label>Teacher ID:</label>
                    <input type="text" name="faculty_id" class="form-control" placeholder="Enter Teacher ID" required>
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
                      <p>{{ $error }}</p>
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
                    <label>Avatar:</label>
                    <input type="file" accept="image/*" name="avatar" class="form-control">
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
  
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script>
jQuery(document).ready(function($) {
    $('#tblUser').DataTable();
    $(".modal-backdrop").hide();
} );
</script>
@endsection


