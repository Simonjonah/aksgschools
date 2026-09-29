@include('dashboard.admin.header')

  @include('dashboard.admin.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Teachers to Subjects Assigned</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Teachers to Subjects Uyo Center</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>School Name</th>

                  <th>First Name</th>
                  <th>Lastname</th>
                 
                  <th>Section</th>
                  <th>Class</th>
                  <th>View Subjects</th>
                  <th>View More</th>

                </tr>
                </thead>
                <tbody>
               
                    @foreach ($view_teachersubjects as $view_teachersubject)
                      @if ($view_teachersubject->teacher['section'] === 'Primary' || $view_teachersubject->teacher['section'] === 'Nursery' || $view_teachersubject->teacher['section'] === 'Pre-School' || $view_teachersubject->teacher['section'] === 'Elementary' || $view_teachersubject->teacher['section'] === 'Creche')
                        <tr>
                          <td>{{ $view_teachersubject->user['schoolname'] }}</td>
                          <td>{{ $view_teachersubject->teacher['fname'] }}</td>
                          <td>{{ $view_teachersubject->teacher['surname'] }}</td>
                          <td style="color: red">{{ $view_teachersubject->teacher['section'] }}</td>
                          <td>{{ $view_teachersubject->teacher['section'] }}</td>
                          <td>{{ $view_teachersubject->subject['subjectname'] }}</td> 
                        <td><a href="{{ url('admin/viewteachersubjects/'.$view_teachersubject->teacher_id) }}"
                              class='btn btn-info'>
                              <i class="far fa-eye"></i>
                          </a></td>
                      </tr>
                      @else
                        
                      @endif
                    @endforeach
                    
                
                </tbody>
                <tfoot>
                    <tr>
                    <th>School Name</th>

                        <th>First Name</th>
                        <th>Lastname</th>
                       
                        <th>Section</th>
                        <th>Class</th>
                        <th> Subjects</th>
                        <th>View More</th>
                      </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title" style="color: red">Secondary</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>School Name</th>
                    <th>First Name</th>
                    <th>Lastname</th>
                    
                    <th>Section</th>
                    <th>Class</th>
                    <th> Subjects</th>
                    <th>View More</th>
                  </tr>
                </thead>
                <tbody>
               
                  @foreach ($view_teachersubjects as $view_teachersubject)
                  @if ($view_teachersubject->teacher['section'] === 'High School' || $view_teachersubject->teacher['section'] === 'Secondary' || $view_teachersubject->teacher['section'] === 'High Schools' || $view_teachersubject->teacher['section'] === 'Secondary Schools')
                      <tr>
                        <td>{{ $view_teachersubject->user['schoolname'] }}</td>

                        <td>{{ $view_teachersubject->teacher['fname'] }}</td>
                        <td>{{ $view_teachersubject->teacher['surname'] }}</td>
                        <td style="color: red">{{ $view_teachersubject->teacher['section'] }}</td>
                        <td>{{ $view_teachersubject->teacher['section'] }}</td>
                        <td>{{ $view_teachersubject->subject['subjectname'] }}</td> 
                      <td><a href="{{ url('admin/viewteachersubjects/'.$view_teachersubject->teacher_id) }}"
                            class='btn btn-info'>
                            <i class="far fa-eye"></i>
                        </a></td>
                    </tr>
                    @else
                      
                    @endif
                  @endforeach
                  
              
              </tbody>
                <tfoot>
                  <tr>
                    <th>School Name</th>

                    <th>First Name</th>
                    <th>Lastname</th>
                    
                    <th>Section</th>
                    <th>Class</th>
                    <th> Subjects</th>
                    <th>View More</th>
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
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2023 <a href="https://goldenacademyschools.com">goldenacademyschools.com</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script src="{{ asset('assets/dist/js/adminlte.min.js?v=3.2.0')}}"></script>

<script src="{{ asset('assets/dist/js/demo.js') }}"></script>

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