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
                    @if (Session::get('success'))
                      <div class="alert alert-success">
                        {{ Session::get('success') }}
                      </div>
                    @endif

                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                      {{ Session::get('fail') }}
                    </div>
                  @endif
                  <tr>
                    <th>Surname</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Admission No</th>
                    <th>Status</th>
                    <th>Psycomotor</th>
                    <th>CA 1</th>
                    <th>CA 2</th>
                    <th>CA 3</th>
                    <th>Exams</th>
                    <th>Total</th>
                    <th>Grade</th>
                    <th>Approved</th>
                    <th>View</th>

                  </tr>
                  </thead>
                  <tbody>
                    @php
                        
                      //  $total_score = 0;
                    @endphp
                    @foreach ($view_myresults as $view_myresult)
                      @php
                         // $total_score +=$view_myresult->test_1 + $view_myresult->test_2 + $view_myresult->test_3 + $view_myresult->exams;
                          
                      @endphp
                      <tr>
                        <td>{{ $view_myresult->surname }}</td>
                        <td>{{ $view_myresult->fname }} 
                        
                        <br> 
                           <small> {{ $view_myresult->subjectname }} <br>

                           <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                            Seach Results
                          </button>
                          
                        </small>
                        
                       <b> {{ $view_myresult->schoolname }}  </b> 
                      
                      </td>
                        <td>{{ $view_myresult->middlename }} <br> <small> Class: {{ $view_myresult->classname }}</small></td>
                        <td>{{ $view_myresult->regnumber }} <br> <small> Term: {{ $view_myresult->term }}</small></td>
                        <td> @if ( $view_myresult->status == null)
                          <span class="badge badge-warning">In review</span>
                          
                        @elseif ( $view_myresult->status == 'approved')
                        <span class="badge badge-success">Approved</span>
                          @elseif ( $view_myresult->status == 'suspend')
                          <a href="#" class="btn btn-warning btn-block"><b>Suspended</b></a>
      
                          @elseif ( $view_myresult->status == 'admitted')
                          <a href="#" class="btn btn-danger btn-block"><b>Reject</b></a>
                          @else
                          
                        @endif</td>
                        <td><a href="{{ url('web/addpsychomotor/'.$view_myresult->id) }}"
                          class='btn btn-default'>
                          Add Psycomotor
                           <i class="far fa-eye"></i>

                       

                      {{-- <td>{{ $view_myresult->user['ref_no'] }}</td> --}}
                      <td>{{ $view_myresult->test_1 }}</td>
                      <td>{{ $view_myresult->test_2 }}</td>
                      <td>{{ $view_myresult->test_3 }}</td>
                      <td>{{ $view_myresult->exams }}</td>
                      <td>{{ $view_myresult->test_1 + $view_myresult->test_2 + $view_myresult->test_3 + $view_myresult->exams }}</td>
                      <td>@if ($view_myresult->test_1 + $view_myresult->test_2 + $view_myresult->test_3 + $view_myresult->exams > 79)
                       <p>A</p>
                        @elseif ($view_myresult->test_1 + $view_myresult->test_2 + $view_myresult->test_3 + $view_myresult->exams > 69)
                        <p>B</p>


                        @elseif ($view_myresult->test_1 + $view_myresult->test_2 + $view_myresult->test_3 + $view_myresult->exams > 59)
                        <p>C</p>

                        @elseif ($view_myresult->test_1 + $view_myresult->test_2 + $view_myresult->test_3 + $view_myresult->exams > 49)
                        <p>D</p>

                        @elseif ($view_myresult->test_1 + $view_myresult->test_2 + $view_myresult->test_3 + $view_myresult->exams > 40)
                        <p>E</p>

                        @elseif ($view_myresult->test_1 + $view_myresult->test_2 + $view_myresult->test_3 + $view_myresult->exams > 39)
                        <p>F</p>

                        @else
                        <p>F</p>
                      @endif</td>

                     
                         
                      
                      <td><a href="{{ url('web/approvedresultsc/'.$view_myresult->id)}}"
                        class='btn btn-info'>
                         Approved
                     </a></td>
                         <td><a href="{{ url('web/teacherviewresults/'.$view_myresult->student_id)}}"
                          class='btn btn-default'>
                           <i class="far fa-eye"></i>
                       </a></td>
                       
                  

                      </tr>
                     
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Surname</th>
                      <th>Firstname</th>
                      <th>Middlename</th>
                      <th>Admission No</th>
                      <th>Status</th>
                      <th>Psycomotor</th>

                      {{-- <th>Ref. No</th> --}}
                      <th>CA 1</th>
                      <th>CA 2</th>
                      <th>CA 3</th>
                      <th>Exams</th>
                      <th>Total</th>
                      {{-- <th></th> --}}
                      <th>Grade</th>
                      <th>Approved</th>
                      <th>View</th>
                
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
    <strong>Copyright &copy; 2023 <a href="#">Arise</a>.</strong> All rights
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
          <form action="{{ url('web/reachresultbystudentsc') }}" method="post">
            @csrf
            <div class="form-group">
                <select name="regnumber" class="form-control" id="">
                    @foreach ($view_myresults as $view_myresult)
                        <option value="{{ $view_myresult->regnumber }}">{{ $view_myresult->regnumber }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
              <select name="classname" class="form-control" id="">
              @if (Auth::user()->schooltype == 'SUBEB')
                @foreach ($view_myresults as $view_myresult)
                      @if ($view_myresult->section == 'Primary')
                        <option value="{{ $view_myresult->classname }}">{{ $view_myresult->classname }}</option>
                      @else
                        
                      @endif
                @endforeach
              @else
              
                @foreach ($view_myresults as $view_myresult)
                      @if ($view_myresult->section == 'Secondary')
                        <option value="{{ $view_myresult->classname }}">{{ $view_myresult->classname }}</option>
                      @else
                        
                      @endif
                @endforeach
              @endif
             

              </select>
          </div>

            <div class="form-group">
                <select name="academic_session" class="form-control" id="">
                    @foreach ($view_myresults as $view_myresult)
                        <option value="{{ $view_myresult->academic_session }}">{{ $view_myresult->academic_session }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <select name="term" class="form-control" id="">
                    @foreach ($view_myresults as $view_myresult)
                        <option value="{{ $view_myresult->term }}">{{ $view_myresult->term }}</option>
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