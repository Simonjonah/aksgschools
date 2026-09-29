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
                    {{-- <th>Middlename</th> --}}
                    <th>First Name</th>
                    <th>Images</th>

                    <th>Phone</th>
                    <th>Centername</th>
                    <th>Classname</th>
                    <th>Section</th>
                    <th>Entry Level</th>

                    <th>Email</th>

                   
                    <th>Status</th>
                    <th>Action</th>
                   
                    <th>Print</th>
                    <th>Delete</th>
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
                    @foreach ($sacked_teachers as $sacked_teacher)
                      @if ($sacked_teacher->status = 'teacher' && $sacked_teacher->role = 'sacked')
                      <tr>
                        <td>{{ $sacked_teacher->surname }}</td>
                        <td>{{ $sacked_teacher->fname }}</td>
                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$sacked_teacher->images")}}" alt=""></td>
                        <td>{{ $sacked_teacher->phone }}</td>
                        <td>{{ $sacked_teacher->schoolname }}</td>
                        <td>{{ $sacked_teacher->classname }}</td>
                        <td>{{ $sacked_teacher->section }}</td>
                        <td>{{ $sacked_teacher->term }}</td>
                        <td>{{ $sacked_teacher->email }}</td>

                       
                        <td>@if ($sacked_teacher->status == 'teacher')
                          <span class="badge badge-secondary">In Progress</span>
                          @elseif ($sacked_teacher->status == 'sacked')
                          <span class="badge badge-danger">Sacked</span>
                          @elseif ($sacked_teacher->status == 'suspend')
                          <span class="badge badge-warning">Suspended</span>
                            @else
                            <span class="badge badge-success">Employed</span>
                          @endif</td>

                       <td> <div class="input-group-prepend">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                          Action
                        </button>
                        <ul class="dropdown-menu">
                          <li class="dropdown-item"><a href="{{ url('admin/viewsingleteacher/'.$sacked_teacher->ref_no) }}">View</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/editteacher/'.$sacked_teacher->ref_no) }}">Edit</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/teacherapprove/'.$sacked_teacher->ref_no) }}">Approved</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/teachersuspend/'.$sacked_teacher->ref_no) }}">Suspend</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/teachersacked/'.$sacked_teacher->ref_no) }}">Sacked</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/teacherquery/'.$sacked_teacher->ref_no) }}">Query</a></li>
                        </ul>
                      </div></td>
                       
                     
                      <th><a href="{{ url('admin/teachersprint') }}" class="btn btn-success"><i class="fas fa-print"></i></a></th>
                       <td><a href="{{ url('admin/teacherdelete/'.$sacked_teacher->ref_no) }}"
                        class='btn btn-danger'>
                         <i class="far fa-trash-alt"></i>
                     </a></td>
                        
                     <td>{{ $sacked_teacher->created_at->format('D d, M Y, H:i')}}</td>

                      </tr>
                      @else
                        
                      @endif
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Lastname</th>
                      {{-- <th>Middlename</th> --}}
                      <th>First Name</th>
                      <th>Images</th>
  
                      <th>Phone</th>
                      <th>Centername</th>
                      <th>Classname</th>
                      <th>Section</th>
                      <th>Entry Level</th>
  
                      <th>Email</th>
  
                     
                      <th>Status</th>
                      <th>Action</th>
                     
                      <th>Print</th>
                      <th>Delete</th>
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
    <strong>Copyright &copy; 2023 <a href="#"> SCHOOLS</a>.</strong> All rights
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
