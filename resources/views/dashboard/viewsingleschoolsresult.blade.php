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
                <h3 class="card-title">Your Students Result</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
            @if (Auth::guard('web')->user()->schooltype == 'SUBEB')
                @foreach ($view_classes as $view_classe)
                 @if ($view_classe->section == 'Primary')
                    <a href="" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ $view_classe->classname }}</p>
                    </a>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                            Search For Pupils In School 
                    </button>
                 @else
                 @endif
                @endforeach
                

                @else
                @foreach ($view_classes as $view_classe)
                 @if ($view_classe->section == 'Secondary')
                    <a href="" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ $view_classe->classname }}</p>
                    </a>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                            Search For Students In School 
                    </button>
                 @else
                   
                 @endif
                @endforeach
                @endif
               
                    
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
    <strong>Copyright &copy; 2024 <a href="#">Arise Schools</a>.</strong> All rights
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
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Search Results</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ url('web/reachresultbysc') }}" method="post">
            @csrf
            <div class="form-group">
                <select name="schoolname" class="form-control" id="">
                  @if (Auth::guard('web')->user()->schooltype == 'SUBEB')
                  @foreach ($view_resultalls as $view_resultall)
                    @if ($view_resultall->section == 'Primary')
                    <option value="{{ $view_resultall->schoolname }}">{{ $view_resultall->schoolname }}</option>
                      
                    @else
                      
                    @endif
                    @endforeach
                  @else

                  @foreach ($view_resultalls as $view_resultall)
                    @if ($view_resultall->section == 'Secondary' || $view_resultall->section == 'Senior Secondary' || $view_resultall->section == 'Junior Secondary')
                    <option value="{{ $view_resultall->schoolname }}">{{ $view_resultall->schoolname }}</option>
                      
                    @else
                      
                    @endif
                    @endforeach
                    
                  @endif
                    

                </select>
            </div>
            <div class="form-group">
                <select name="classname" class="form-control" id="">
                    @foreach ($view_resultalls as $view_resultall)
                        <option value="{{ $view_resultall->classname }}">{{ $view_resultall->classname }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <select name="academic_session" class="form-control" id="">
                    @foreach ($view_resultalls as $view_resultall)
                        <option value="{{ $view_resultall->academic_session }}">{{ $view_resultall->academic_session }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <select name="term" class="form-control" id="">
                    @foreach ($view_resultalls as $view_resultall)
                        <option value="{{ $view_resultall->term }}">{{ $view_resultall->term }}</option>
                    @endforeach

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

