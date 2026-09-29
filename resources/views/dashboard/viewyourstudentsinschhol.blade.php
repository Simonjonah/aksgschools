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
                    @foreach ($view_secondarystudents as $view_secondarystudent)
                      {{-- @if ($view_secondarystudent->section == Auth::guard('web')->user()->section &&  $view_secondarystudent->school_id == Auth::guard('web')->user()->school_id) --}}
                        <tr>
                          <td>{{ $view_secondarystudent->fname }}</td>
                          <td>{{ $view_secondarystudent->middlename }}</td>
                          <td>{{ $view_secondarystudent->surname }}</td>
                          <td> {{ $view_secondarystudent->section }}
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                            Search For Students In School 
                          </button>
                          </td>
                          <td> {{ $view_secondarystudent->classname }}
                            <small> @if ($view_secondarystudent->status == null)
                            <span class="badge badge-secondary">In Review</span>
                            @elseif ($view_secondarystudent->status == 'reject')
                            <span class="badge badge-danger">Reject</span>
                            @elseif ($view_secondarystudent->status == 'suspend')
                            <span class="badge badge-warning">Suspended</span>
                            @elseif ($view_secondarystudent->status == 'approved')
                            <span class="badge badge-success">Admitted</span>
    
                            @endif</small>
                          </td>
                          <td> {{ $view_secondarystudent->term }}</td>
                          <td> {{ $view_secondarystudent->gender }}</td>
                          <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_secondarystudent->images")}}" alt=""></td>
                         
                      
                      <td><button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                        Action
                      </button>
                      <ul class="dropdown-menu">
                      <li class="dropdown-item"><a href="{{ url('web/editstudentsc/'.$view_secondarystudent->ref_no) }}">Edit</a></li>
                      <li class="dropdown-item"><a href="{{ url('web/viewstu/'.$view_secondarystudent->ref_no) }}">View</a></li>
                      <li class="dropdown-item"><a href="{{ url('web/suspendedstu/'.$view_secondarystudent->ref_no) }}">Suspend</a></li>
                        <li class="dropdown-item"><a href="{{ url('web/addmitstu/'.$view_secondarystudent->ref_no) }}">Admit</a></li>
                        <li class="dropdown-item"><a href="{{ url('web/rejectedstudents/'.$view_secondarystudent->ref_no) }}">Reject</a></li>
                        <li class="dropdown-item"><a href="{{ url('web/transferstudentbyhead/'.$view_secondarystudent->ref_no) }}">Transfer</a></li>
                      </ul>
                    </div></td>


                       <td><a href="{{ url('web/deletestudentsc/'.$view_secondarystudent->ref_no) }}"
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
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2024 <a href="#">AriseSchools</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script src="../../assets/plugins/jquery/jquery.min.js"></script>

<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../assets/plugins/jszip/jszip.min.js"></script>
<script src="../../assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="../../assets/dist/js/adminlte.min.js?v=3.2.0"></script>

<script src="../../assets/dist/js/demo.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>



<div class="modal fade" id="modal-success">
    <div class="modal-dialog">
      <div class="modal-content bg-success">
        <div class="modal-header">
          <h4 class="modal-title">Search for Students</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('web/reachresultbystudentschead') }}" method="post">
            @csrf
            <div class="form-group">
                <select name="schoolname" class="form-control" id="">
                    @foreach ($view_secondarystudents as $view_secondarystudent)
                        <option value="{{ $view_secondarystudent->school['schoolname'] }}">{{ $view_secondarystudent->school['schoolname'] }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
              <select name="classname" class="form-control" id="">
              @if (Auth::user()->schooltype == 'SUBEB')
                @foreach ($view_classes as $view_classe)
                      @if ($view_classe->section == 'Primary')
                        <option value="{{ $view_classe->classname }}">{{ $view_classe->classname }}</option>
                      @else
                        
                      @endif
                @endforeach
              @else
              
                @foreach ($view_classes as $view_classe)
                      @if ($view_classe->section == 'Secondary')
                        <option value="{{ $view_classe->classname }}">{{ $view_classe->classname }}</option>
                      @else
                        
                      @endif
                @endforeach
              @endif
             

              </select>
          </div>

            <div class="form-group">
                <select name="academic_session" class="form-control" id="">
                    @foreach ($view_sessions as $view_session)
                        <option value="{{ $view_session->academic_session }}">{{ $view_session->academic_session }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <select name="lga" class="form-control" id="">
                    @foreach ($lgas as $lga)
                        <option value="{{ $lga->lga }}">{{ $lga->lga }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <select name="term" class="form-control" id="">
                    @foreach ($view_secondarystudents as $view_secondarystudent)
                        <option value="{{ $view_secondarystudent->term }}">{{ $view_secondarystudent->term }}</option>
                    @endforeach

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