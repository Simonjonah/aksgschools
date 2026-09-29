@include('dashboard.admin.header')

  <!-- Main Sidebar Container -->
  @include('dashboard.admin.sidebar')

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
                    <th>Lastname</th>
                    <th>First Name</th>

                    <th>Schhol </th>
                    <th>Images</th>

                    <th>View Student</th>
                    {{-- <th>Centername</th> --}}
                    <th>Classname</th>
                    <th>Section</th>
                    <th>Term</th>

                    {{-- <th>Email</th> --}}

                   
                    <th>Status</th>
                    <th>Action</th>
                   
                  
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                    @csrf
                    @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif
  
                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                    @endif
                    @foreach ($view_schoolnametudents as $view_schoolnametudent)
                      @if ($view_schoolnametudent->status = 'teacher' OR $view_schoolnametudent->status = 'approved' OR $view_schoolnametudent->status = 'suspend' OR $view_schoolnametudent->status = 'sacked' OR $view_schoolnametudent->status = 'queried')
                      <tr>
                        <td>{{ $view_schoolnametudent->surname }}</td>
                        <td>{{ $view_schoolnametudent->fname }}</td>
                        <td><a href="{{ url('admin/viewschoolstudent/'.$view_schoolnametudent->schoolname) }}">{{ $view_schoolnametudent->schoolname }}</a></td>

                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_schoolnametudent->images")}}" alt=""></td>
                        <td> <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                            View Students of this {{ $view_schoolnametudent->classname }} Class
                          </button></td>
                        {{-- <td>{{ $view_schoolnametudent->centername }}</td> --}}
                        <td>{{ $view_schoolnametudent->classname }}</td>
                        <td>{{ $view_schoolnametudent->section }}</td>
                        <td>{{ $view_schoolnametudent->term }}</td>
                        {{-- <td>{{ $view_schoolnametudent->email }}</td> --}}

                       
                       <td>@if ($view_schoolnametudent->role == 'teacher')
                        <span class="badge badge-secondary">In Progress</span>
                        @elseif ($view_schoolnametudent->role == 'sacked')
                        <span class="badge badge-danger">Sacked</span>
                        @elseif ($view_schoolnametudent->role == 'suspend')
                        <span class="badge badge-warning">Suspended</span>
                          @else
                          <span class="badge badge-success">Employed</span>
                        @endif</td>

                       <td> <div class="input-group-prepend">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                          Action
                        </button>
                        <ul class="dropdown-menu">
                         
                          <li class="dropdown-item"><a href="{{ url('admin/editstudent/'.$view_schoolnametudent->ref_no) }}">Edit</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/viewstudent/'.$view_schoolnametudent->ref_no) }}">View</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/studentpdf/'.$view_schoolnametudent->ref_no) }}">Print</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/teacherdelete/'.$view_schoolnametudent->ref_no) }}">Delete</a></li>
                        </ul>
                      </div></td>
                       
                        
                     <td>{{ $view_schoolnametudent->created_at->format('D d, M Y, H:i')}}</td>

                      </tr>
                      @else
                        
                      @endif
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Lastname</th>
                      <th>First Name</th>
  
                      <th>Schhol </th>
                      <th>Images</th>
  
                      <th>View Student</th>
                      {{-- <th>Centername</th> --}}
                      <th>Classname</th>
                      <th>Section</th>
                      <th>Term</th>
  
                      {{-- <th>Email</th> --}}
  
                     
                      <th>Status</th>
                      <th>Action</th>
                     
                    
                      <th>Date</th>
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
    <strong>Copyright &copy; 2023 <a href="httpS://myschool">myschool.africa</a>.</strong> All rights
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
          <h4 class="modal-title">View Students/Pupils</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- <p>One fine body&hellip;</p> --}}
          <form action="{{ url('admin/searchclass') }}" method="post">
            @csrf
            <div class="form-group">
                <select name="classname" class="form-control" id="">
                    @foreach ($view_schoolnametudents as $view_schoolnametudent)
                        <option value="{{ $view_schoolnametudent->classname }}">{{ $view_schoolnametudent->classname }}</option>
                        
                    @endforeach
                </select>
            </div>

           <div class="form-group">
            <select name="schoolname" class="form-control" id="">
                @foreach ($view_schoolnametudents as $view_schoolnametudent)
                    <option value="{{ $view_schoolnametudent->schoolname }}">{{ $view_schoolnametudent->schoolname }}</option>
                    
                @endforeach
            </select>
           </div>
          
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">View</button>
        </div>

    </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->