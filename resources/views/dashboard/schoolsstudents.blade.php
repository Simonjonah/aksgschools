@include('dashboard.header')

  <!-- Main Sidebar Container -->
  @include('dashboard.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>First name</th>
                    <th>Middlename</th>
                    <th>Surname</th>
                    <th>section</th>
                    <th>Classname</th>
                    <th>Term</th>
                    <th>Gender</th>

                    <th>Images</th>
                    {{-- <th>Status</th> --}}
                    <th>Action</th>
                    
                    <th>Delete</th>

                    
                  </tr>
                  </thead>
                  <tbody>
                  @if (Session::get('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success') }}
                  </div>
                  @endif

                  @if (Session::get('fail'))
                  <div class="alert alert-danger">
                  {{ Session::get('fail') }}
                  @endif
                    @foreach ($viewschool_students as $viewschool_student)
                      {{-- @if ($viewschool_student->section == Auth::guard('web')->user()->section &&  $viewschool_student->school_id == Auth::guard('web')->user()->school_id) --}}
                        <tr>
                          <td>{{ $viewschool_student->fname }}</td>
                          <td>{{ $viewschool_student->middlename }}</td>
                          <td>{{ $viewschool_student->surname }}

                          <small>School Name: {{ $viewschool_student->schoolname }}</small>
                          </td>
                          <td> {{ $viewschool_student->section }}
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                            Search For Students In School 
                          </button>
                          </td>
                          <td> {{ $viewschool_student->classname }}
                            <small> @if ($viewschool_student->status == null)
                            <span class="badge badge-secondary">In Review</span>
                            @elseif ($viewschool_student->status == 'reject')
                            <span class="badge badge-danger">Reject</span>
                            @elseif ($viewschool_student->status == 'suspend')
                            <span class="badge badge-warning">Suspended</span>
                            @elseif ($viewschool_student->status == 'approved')
                            <span class="badge badge-success">Admitted</span>
    
                            @endif</small>
                          </td>
                          <td> {{ $viewschool_student->term }}</td>
                          <td> {{ $viewschool_student->gender }}</td>
                          <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$viewschool_student->images")}}" alt=""></td>
                         
                      
                      <td><button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                        Action
                      </button>
                      <ul class="dropdown-menu">
                      <li class="dropdown-item"><a href="{{ url('admin/editstudentsc/'.$viewschool_student->ref_no) }}">Edit</a></li>
                      <li class="dropdown-item"><a href="{{ url('admin/viewstu/'.$viewschool_student->ref_no) }}">View</a></li>
                      <li class="dropdown-item"><a href="{{ url('admin/suspendedstu/'.$viewschool_student->ref_no) }}">Suspend</a></li>
                        <li class="dropdown-item"><a href="{{ url('admin/addmitstu/'.$viewschool_student->ref_no) }}">Admit</a></li>
                        <li class="dropdown-item"><a href="{{ url('admin/rejectedstudents/'.$viewschool_student->ref_no) }}">Reject</a></li>
                        <li class="dropdown-item"><a href="{{ url('admin/transferstudentbyhead/'.$viewschool_student->ref_no) }}">Transfer</a></li>
                      </ul>
                    </div></td>


                       <td><a href="{{ url('admin/deletestudentsc/'.$viewschool_student->ref_no) }}"
                        class='btn btn-danger'>
                         Delete
                     </a></td>
                    </tr>
                    {{-- @else
                    @endif --}}
                  @endforeach
                      
                
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>First name</th>
                        <th>Middlename</th>
                        <th>Surname</th>
                        <th>section</th>
                        <th>Classname</th>
                        <th>Term</th>
                        <th>Gender</th>
    
                        <th>Images</th>
                        {{-- <th>Status</th> --}}
                        <th>Action</th>
                        
                        <th>Delete</th>
    
                        
                      </tr>
                      
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 @include('dashboard.footer')


<div class="modal fade" id="modal-success">
    <div class="modal-dialog">
      <div class="modal-content bg-success">
        <div class="modal-header">
          <h4 class="modal-title">Search for Students</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('admin/reachresultbystudentschead') }}" method="post">
            @csrf
            <div class="form-group">
                <select name="school_id" class="form-control" id="">
                  
                    @foreach ($viewschool_students as $viewschool_student)
                        <option value="{{ $viewschool_student->school_id }}">{{ $viewschool_student->school['schoolname'] }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <select name="alms" class="form-control" id="">
                <option value="">Select Alms (Optional)</option>

                    @foreach ($viewschool_students as $viewschool_student)
                        <option value="{{ $viewschool_student->alms }}">{{ $viewschool_student->alms }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
              <select name="classname" class="form-control" id="">
              {{-- <option value="">Select Classname (Optional)</option> --}}

              {{-- @if (Auth::user()->schooltype == 'SUBEB') --}}
                  <option value="{{ $view_classes->classname }}">{{ $view_classes->classname }}</option>
              {{-- @endif
              <option value="{{ $view_classes->classname }}">{{ $view_classes->classname }}</option>
              --}}

              </select>
          </div>

            <div class="form-group">
                <select name="academic_session" class="form-control" id="">
                    @foreach ($view_sessions as $view_session)
                        <option value="{{ $view_session->academic_session }}">{{ $view_session->academic_session }}</option>
                    @endforeach

                </select>
            </div>

            {{-- <div class="form-group">
                <select name="lga" class="form-control" id="">
                    @foreach ($lgas as $lga)
                        <option value="{{ $lga->lga }}">{{ $lga->lga }}</option>
                    @endforeach

                </select>
            </div> --}}

            <div class="form-group">
                <select name="term" class="form-control" id="">

                <option value="First term">First term</option>
                <option value="Second Term">Second Term</option>
                <option value="Third Term">Third Term</option>

                </select>
            </div>

            <div class="form-group">
                <select name="section" class="form-control" id="">
                  @if (Auth::guard('web')->user()->schooltype == 'SUBEB')
                  <option value="Primary">Primary</option>
                    
                  @else
                  <option value="Senior Secondary">Senior Secondary</option>
                  <option value="Junior Secondary">Junior Secondary</option>
                    
                  @endif

                </select>
            </div>
          
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
      </form>
        </div>

      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->