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

                    
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($view_almstudents as $view_almstudent)
                      {{-- @if ($view_almstudent->section == Auth::guard('web')->user()->section &&  $view_almstudent->term == Auth::guard('web')->user()->term && $view_almstudent->classname == Auth::guard('web')->user()->classname && $view_almstudent->role == Auth::guard('web')->user()->role = null) --}}
                        <tr>
                          <td>{{ $view_almstudent->fname }}</td>
                          <td>{{ $view_almstudent->middlename }}</td>
                          <td>{{ $view_almstudent->surname }}</td>
                          <td> {{ $view_almstudent->section }}</td>
                          <td> {{ $view_almstudent->classname }}</td>
                          <td> {{ $view_almstudent->term }}</td>
                          <td> {{ $view_almstudent->gender }}</td>
                          <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_almstudent->images")}}" alt=""></td>
                          <td> <span class="badge badge-success">{{ $view_almstudent->status }}</span></td>
                          
                          {{-- <td><a href="{{ url('web/assignedstudent/'.$view_almstudent->ref_no1) }}"
                            class='btn btn-default'>
                             <i class="far fa-eye"></i>
                       --}}

                             <td><a href="{{ url('web/addresults/'.$view_almstudent->ref_no1) }}"
                                class='btn btn-info'>
                                 Add Results
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
  
                      @foreach ($view_student_secondaries as $view_student_secondarie)
                        {{-- @if ($view_student_secondarie->section == Auth::guard('web')->user()->section &&  $view_student_secondarie->term == Auth::guard('web')->user()->term && $view_student_secondarie->classname == Auth::guard('web')->user()->classname && $view_student_secondarie->role == Auth::guard('web')->user()->role = null) --}}
                          <tr>
                            <td>{{ $view_student_secondarie->fname }}</td>
                            <td>{{ $view_student_secondarie->middlename }}</td>
                            <td>{{ $view_student_secondarie->surname }}</td>
                            <td> {{ $view_student_secondarie->section }}</td>
                            <td> {{ $view_student_secondarie->classname }}</td>
                            <td> {{ $view_student_secondarie->term }}</td>
                            <td> {{ $view_student_secondarie->gender }}</td>
                            <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_student_secondarie->images")}}" alt=""></td>
                            <td> <span class="badge badge-success">{{ $view_student_secondarie->status }}</span></td>
                            
                            {{-- <td><a href="{{ url('web/assignedstudent/'.$view_student_secondarie->ref_no1) }}"
                              class='btn btn-default'>
                               <i class="far fa-eye"></i>
                         --}}
  
                               <td><a href="{{ url('web/addresults/'.$view_student_secondarie->ref_no1) }}"
                                  class='btn btn-info'>
                                   Add Results
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
    <strong>Copyright &copy; 2024 <a href="#">Golden Destiny Schools</a>.</strong> All rights
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
