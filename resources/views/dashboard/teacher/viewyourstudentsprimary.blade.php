@include('dashboard.teacher.header')

  <!-- Main Sidebar Container -->
  @include('dashboard.teacher.sidebar')

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

                    @foreach ($view_primarypupils as $view_primarypupil)
                      @if ($view_primarypupil->school['section'] ==  Auth::guard('web')->user()->school['section']  && $view_primarypupil->school['address'] ==  Auth::guard('web')->user()->school['address'] && $view_primarypupil->school['lga'] ==  Auth::guard('web')->user()->school['lga'] && $view_primarypupil->school['connect'] ==  Auth::guard('web')->user()->school['connect']) 
                        <tr>
                          <td>{{ $view_primarypupil->fname }}</td>
                          <td>{{ $view_primarypupil->middlename }}

                          <small>{{ $view_primarypupil->section }}</small>
                          </td>
                          <td>{{ $view_primarypupil->surname }}
                            <small><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                          Search Term and year
                        </button></small>
                          </td>
                          <td> {{ $view_primarypupil->section }}
                            <small>{{ $view_primarypupil->school['schoolname'] }}</small>
                          </td>
                          <td> {{ $view_primarypupil->classname }}/{{ $view_primarypupil->alms }}
                            @if ($view_primarypupil->regnumber == null)
                            <h2>Please Add Reg number</h2>
                            <a href="{{ url('admin/addrenumbyteacher/'.$view_primarypupil->ref_no) }}"
                            class='btn btn-default'>Add Reg. Number
                            <i class="far fa-eye"></i>
                            @else
                            <b style="color: red">{{ $view_primarypupil->regnumber }}</b>
                            @endif
                          </td>
                          <td> {{ $view_primarypupil->term }}
                          <small>{{ $view_primarypupil->school['lga'] }}</small>

                          </td>
                          <td> {{ $view_primarypupil->gender }}
                            @if ($view_primarypupil->status == null)
                            <span class="badge badge-secondary"> In progress</span>
                          @elseif($view_primarypupil->status == 'suspend')
                          <span class="badge badge-warning"> Suspended</span>
                          @elseif($view_primarypupil->status == 'reject')
                          <span class="badge badge-danger"> Rejected</span>
                          @elseif($view_primarypupil->status == 'approved')
                          <span class="badge badge-info"> Approved</span>
                          @elseif($view_primarypupil->status == 'admitted')
                          
                          <span class="badge badge-success">Admitted</span>
                          @endif
                          </td>
                          <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_primarypupil->images")}}" alt=""></td>
                          {{-- <td> <span class="badge badge-success">{{ $view_primarypupil->status }}</span></td> --}}
                          

                            <td><button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                            Action
                          </button>
                          <ul class="dropdown-menu">
                            <li class="dropdown-item"><a href="{{ url('admin/studentsaddmit/'.$view_primarypupil->ref_no) }}">Approve </a></li>
                            <li class="dropdown-item"><a href="{{ url('admin/editstudentsm/'.$view_primarypupil->ref_no) }}">Edit </a></li>
                            <li class="dropdown-item"><a href="{{ url('admin/viewsudentscm/'.$view_primarypupil->ref_no) }}">View</a></li>
                            <li class="dropdown-item"><a href="{{ url('admin/suspendedtudent/'.$view_primarypupil->ref_no) }}">Suspend</a></li>
                            <li class="dropdown-item"><a href="{{ url('admin/transferstudent/'.$view_primarypupil->ref_no) }}">Transfer</a></li>
                            <li class="dropdown-item"><a href="{{ url('admin/deletestudentsc/'.$view_primarypupil->ref_no) }}">Delete</a></li>
                          
                          </ul>
                        </div></td>
    
                          
                        </tr>

                       
                      @else
                    @endif
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
    @include('dashboard.teacher.footer')



<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Seach Term</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('admin/searchforstudentinclass') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="">School </label>
            <select class="form-control" name="school_id">
                <option value="{{ Auth::guard('web')->user()->school['id'] }}">{{ Auth::guard('web')->user()->school['schoolname'] }}</option>
            </select>
          </div>

          <div class="form-group">
            <label for="">Classes</label>
            <select class="form-control" name="classname">
            @if (Auth::guard('web')->user()->section == 'Primary')
                @foreach ($view_classes as $view_classe)
                    @if ($view_classe->section == 'Primary')
                      <option value="{{ $view_classe->classname }}">{{ $view_classe->classname }}</option>
                    @else
                      
                    @endif
                @endforeach
              @else
              @foreach ($view_classes as $view_classe)
                  @if ($view_classe->section == 'Senior Secondary' || $view_classe->section == 'Secondary' || $view_classe->section == 'Junior Secondary')
                    <option value="{{ $view_classe->classname }}">{{ $view_classe->classname }}</option>
                  @else
                    
                  @endif
              @endforeach
              @endif
                            
            </select>
          </div>


          <div class="form-group">
            <label for="">Alms Optional</label>
            <select class="form-control" name="alms">
                <option value="">Select Alms optional</option>

              @foreach ($view_alms as $view_alm)
                <option value="{{ $view_alm->alms }}">{{ $view_alm->alms }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="">Terms</label>
            <select class="form-control" name="term">
                <option value="First Term">First Term</option>
                <option value="Second Term">Second Term</option>
                <option value="Third Term">Third Term</option>
            </select>
          </div>

          <div class="form-group">
            <label for="">Academic Session</label>
            <select class="form-control" name="academic_session">
              @foreach ($view_sessions as $view_session)
                <option value="{{ $view_session->academic_session }}">{{ $view_session->academic_session }}</option>
                
              @endforeach
            </select>
          </div>

          
          <div class="form-group">
            <label for=""> Sections</label>
            <select class="form-control" name="section">
            @if (Auth::guard('web')->user()->schooltype == 'SUBEB')
                <option value="Primary">Primary</option>
                @else
                <option value="Secondary">Secondary</option>
                @endif
            </select>
          </div>

          <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Search</button>
          </div>
        </form>
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->