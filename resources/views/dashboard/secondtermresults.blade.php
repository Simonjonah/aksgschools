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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Surname</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Admission No</th>
                    <th>Psycomotor</th>
                    <th>Ref. No</th>
                    <th>CA 1</th>
                    <th>CA 2</th>
                    <th>CA 3</th>
                    <th>Exams</th>
                    <th>Total</th>
                    <th>Grade</th>
                    <th>Remarks</th>
                    <th>Edit</th>
                    <th>View</th>

                    <th>Delete</th>
              
                    {{-- <th>Date</th> --}}
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($view_myresult_penultimates as $view_myresult_penultimate)
       
                      <tr>
                        <td>{{ $view_myresult_penultimate->user['surname'] }}</td>
                        <td>{{ $view_myresult_penultimate->user['fname'] }}</td>
                        <td>{{ $view_myresult_penultimate->user['middlename'] }}</td>
                        <td>{{ $view_myresult_penultimate->user['regnumber'] }}</td>
                        <td><a href="{{ url('web/addpsychomotor/'.$view_myresult_penultimate->id) }}"
                          class='btn btn-default'>
                          Add Psycomotor
                           <i class="far fa-eye"></i>

                       

                      <td>{{ $view_myresult_penultimate->user['ref_no'] }}</td>
                      <td>{{ $view_myresult_penultimate->test_1 }}</td>
                      <td>{{ $view_myresult_penultimate->test_2 }}</td>
                      <td>{{ $view_myresult_penultimate->test_3 }}</td>
                      <td>{{ $view_myresult_penultimate->exams }}</td>
                      <td>{{ $view_myresult_penultimate->test_1 + $view_myresult_penultimate->test_2 + $view_myresult_penultimate->test_3 + $view_myresult_penultimate->exams }}</td>
                      <td>@if ($view_myresult_penultimate->test_1 + $view_myresult_penultimate->test_2 + $view_myresult_penultimate->test_3 + $view_myresult_penultimate->exams > 69)
                        <p>A</p>
                       
                        @elseif ($view_myresult_penultimate->test_1 + $view_myresult_penultimate->test_2 + $view_myresult_penultimate->test_3 + $view_myresult_penultimate->exams > 59)
                        <p>B</p>
                        @elseif ($view_myresult_penultimate->test_1 + $view_myresult_penultimate->test_2 + $view_myresult_penultimate->test_3 + $view_myresult_penultimate->exams > 49)
                        <p>C</p>
                        @elseif ($view_myresult_penultimate->test_1 + $view_myresult_penultimate->test_2 + $view_myresult_penultimate->test_3 + $view_myresult_penultimate->exams > 44)
                        <p>D</p>
                        @elseif ($view_myresult_penultimate->test_1 + $view_myresult_penultimate->test_2 + $view_myresult_penultimate->test_3 + $view_myresult_penultimate->exams > 40)
                        <p>E</p>
                        @elseif ($view_myresult_penultimate->test_1 + $view_myresult_penultimate->test_2 + $view_myresult_penultimate->test_3 + $view_myresult_penultimate->exams > 39)
                        <p>F</p>
                        @else
                        <p>F</p>
                      @endif</td>

                      <td>@if ($view_myresult_penultimate->test + $view_myresult_penultimate->exams > 69)
                        <p>An Excellent Performance </p>
                       
                        @elseif ($view_myresult_penultimate->test_1 + $view_myresult_penultimate->test_2 + $view_myresult_penultimate->test_3 + $view_myresult_penultimate->exams > 59)
                        <p>A good Performance</p>
                        @elseif ($view_myresult_penultimate->test_1 + $view_myresult_penultimate->test_2 + $view_myresult_penultimate->test_3 + $view_myresult_penultimate->exams > 49)
                        <p>A fair performance</p>
                        @elseif ($view_myresult_penultimate->test_1 + $view_myresult_penultimate->test_2 + $view_myresult_penultimate->test_3 + $view_myresult_penultimate->exams > 44)
                        <p>A Poor performance.</p>
                        @elseif ($view_myresult_penultimate->test_1 + $view_myresult_penultimate->test_2 + $view_myresult_penultimate->test_3 + $view_myresult_penultimate->exams > 40)
                        <p>A Poor performance.</p>
                        @elseif ($view_myresult_penultimate->test_1 + $view_myresult_penultimate->test_2 + $view_myresult_penultimate->test_3 + $view_myresult_penultimate->exams > 39)
                        <p>A Poor performance.</p>
                        @else
                        <p>A Poor performance.</p>
                      @endif</td>
                         
                      
                     <td><a href="{{ url('web/editresult/'.$view_myresult_penultimate->id) }}"
                            class='btn btn-info'>
                             <i class="far fa-edit"></i>
                         </a></td>
                         <td><a href="{{ url('web/teacherviewresults/'.$view_myresult_penultimate->user_id)}}"
                          class='btn btn-default'>
                           <i class="far fa-eye"></i>
                       </a></td>
                       
                      {{-- <th><a href="{{ url('web/studentit/'.$view_myresult_penultimate->ref_no) }}" class="btn btn-info"><i class="fas fa-user"></i> IT</a></th> --}}
                       <td><a href="{{ url('web/deletreslt/'.$view_myresult_penultimate->id) }}"
                        class='btn btn-danger'>
                         <i class="far fa-trash-alt"></i>
                     </a></td>
                    
                     {{-- <td>{{ $view_myresult_penultimate->created_at->format('D d, M Y, H:i')}}</td> --}}

                      </tr>
                     
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Surname</th>
                      <th>Firstname</th>
                      <th>Middlename</th>
                      <th>Admission No</th>
                      <th>Psycomotor</th>

                      <th>Ref. No</th>
                      <th>CA 1</th>
                      <th>CA 2</th>
                      <th>CA 3</th>
                      <th>Exams</th>
                      <th>Total</th>
                      <th>Grade</th>
                      <th>Remarks</th>
                      <th>Edit</th>
                      <th>View</th>
                      <th>Delete</th>
                
                      {{-- <th>Date</th> --}}
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
    <strong>Copyright &copy; 2023 <a href="https://goldernschools.com">Golderndays</a>.</strong> All rights
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
