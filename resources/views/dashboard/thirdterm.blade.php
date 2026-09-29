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
            <h1>Third Term</h1>
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
                    {{-- <th>Centername</th> --}}
                    <th>Classname</th>
                    <th>Entry Level</th>
                    <th>Gender</th>

                    <th>Images</th>
                    <th>Status</th>
                    <th>Action</th>

                    
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($view_terms as $view_term)
                      @if ($view_term->section == Auth::guard('web')->user()->section &&  $view_term->term == Auth::guard('web')->user()->term && $view_term->classname == Auth::guard('web')->user()->classname && $view_term->role == Auth::guard('web')->user()->role = null)
                        <tr>
                          <td>{{ $view_term->fname }}</td>
                          <td>{{ $view_term->middlename }}</td>
                          <td>{{ $view_term->surname }}</td>
                          <td> {{ $view_term->classname }}</td>
                          <td> {{ $view_term->term }}</td>
                          <td> {{ $view_term->gender }}</td>
                          <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_term->images")}}" alt=""></td>
                          <td> <span class="badge badge-success">{{ $view_term->status }}</span></td>
                          <td><a href="{{ url('web/assignedstudent/'.$view_term->ref_no1) }}"
                            class='btn btn-default'>
                             <i class="far fa-eye"></i>
                      
                        </tr>

                        <td><a href="{{ url('web/addresults/'.$view_term->ref_no1) }}"
                          class='btn btn-info'>
                           Add Results
                       </a></td>
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
                      {{-- <th>Centername</th> --}}
                      <th>Classname</th>
                      <th>Entry Level</th>
                      <th>Gender</th>
  
                      <th>Images</th>
                      <th>Status</th>
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
    <strong>Copyright &copy; 2014-2019 <a href="#">Golden Destiny Academy Schools</a>.</strong> All rights
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
