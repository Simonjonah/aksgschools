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

                    @foreach ($view_primarypupils as $view_primarypupil)
                      @if ($view_primarypupil->school_id ==  Auth::guard('teacher')->user()->school_id  && $view_primarypupil->school['lga'] ==  Auth::guard('teacher')->user()->school['lga'] ) 
                        <tr>
                          <td>{{ $view_primarypupil->fname }}</td>
                          <td>{{ $view_primarypupil->middlename }}</td>
                          <td>{{ $view_primarypupil->surname }}
                            <small><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                          Search Term and year
                        </button></small>
                          </td>
                          <td> {{ $view_primarypupil->section }}
                            <small>{{ $view_primarypupil->school['schoolname'] }}</small>
                          </td>
                          <td> {{ $view_primarypupil->classname }}
                            @if ($view_primarypupil->regnumber == null)
                            <h2>Please Add Reg number</h2>
                            <a href="{{ url('teacher/addrenumbyteacher/'.$view_primarypupil->ref_no) }}"
                            class='btn btn-default'>Add Reg. Number
                            <i class="far fa-eye"></i>
                            @else
                            <b style="color: red">{{ $view_primarypupil->regnumber }}</b>
                            @endif
                          </td>
                          <td> {{ $view_primarypupil->term }}
                          <small>{{ $view_primarypupil->school['lga'] }}</small>

                          </td>
                          <td> {{ $view_primarypupil->gender }}</td>
                          <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_primarypupil->images")}}" alt=""></td>
                          {{-- <td> <span class="badge badge-success">{{ $view_primarypupil->status }}</span></td> --}}
                          

                            <td><button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                            Action
                          </button>
                          <ul class="dropdown-menu">
                            <li class="dropdown-item"><a href="{{ url('teacher/editstudentsm/'.$view_primarypupil->ref_no) }}">Edit </a></li>
                            <li class="dropdown-item"><a href="{{ url('teacher/viewsudentscm/'.$view_primarypupil->ref_no) }}">View</a></li>
                            <li class="dropdown-item"><a href="{{ url('teacher/suspendedtudent/'.$view_primarypupil->ref_no) }}">Suspend</a></li>
                            <li class="dropdown-item"><a href="{{ url('teacher/transferstudent/'.$view_primarypupil->ref_no) }}">Transfer</a></li>
                            <li class="dropdown-item"><a href="{{ url('teacher/deletestudentscm/'.$view_primarypupil->ref_no) }}">Delete</a></li>
                          
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
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2024 <a href="#">ARISE Schools</a>.</strong> All rights
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
        <form action="{{ url('teacher/searchforstudentinclass') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="">School </label>
            <select class="form-control" name="school_id">
                <option value="{{ Auth::guard('teacher')->user()->school_id }}">{{ Auth::guard('teacher')->user()->schoolname }}</option>
            </select>
          </div>

          <div class="form-group">
            <label for="">Classes</label>
            <select class="form-control" name="classname">
            @if (Auth::guard('teacher')->user()->section == 'Primary')
                @foreach ($view_classes as $view_classe)
                    @if ($view_classe->section == 'Primary')
                        <option value="{{ $view_classe->classname }}">{{ $view_classe->classname }}</option>
                    @else
                    @endif
                @endforeach
            @else
            @foreach ($view_classes as $view_classe)
                    @if ($view_classe->section == 'Secondary' || $view_classe->section == 'Junior Secondary')
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
              @foreach ($view_terms as $view_term)
                <option value="{{ $view_term->term }}">{{ $view_term->term }}</option>
                
              @endforeach
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
            @if (Auth::guard('teacher')->user()->schooltype == 'SUBEB')
                <option value="Primary">Primary</option>
                  
                @else
                <option value="Junior Secondary">Junior Secondary</option>
                <option value="Senior Secondary">Senior Secondary</option>
                  
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