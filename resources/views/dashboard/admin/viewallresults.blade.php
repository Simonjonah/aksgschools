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
                <h3 class="card-title">Your Students Result</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Schoolname</th>
                    <th>Teacher</th>
                    <th>Surname</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Admission No</th>
                    <th>Search Sch.</th>
                    {{-- <th>Ref. No</th> --}}
                    <th>CA 1</th>
                    <th>CA 2</th>
                    <th>CA 3</th>
                    <th>Exams</th>
                    <th>Total</th>
                    <th>Grade</th>
                    <th>Status</th>
                    <th>View Single</th>

                    <th>View</th>
                    <th>Approved</th>
                    <th>Edit</th>

              
                    {{-- <th>Date</th> --}}
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
                  
                    @php
                        
                      //  $total_score = 0;
                    @endphp
                    @foreach ($viewals_results as $viewals_result)
                        {{-- @if ($viewals_result->status == null) --}}
                            
                    {{-- @if ($viewals_result->status = null) --}}
                    @php
                    // $total_score +=$viewals_result->test_1 + $viewals_result->test_2 + $viewals_result->test_3 + $viewals_result->exams;
                     
                 @endphp
                 <tr>
                   <td>{{ $viewals_result->user['schoolname'] }}</td>
                   <td>Teacher: {{ $viewals_result->teacher['fname'] }} <br>
                    {{ $viewals_result->teacher['classname'] }} 
                  </td>
                   <td>{{ $viewals_result->student['surname'] }}</td>
                   <td>{{ $viewals_result->student['fname'] }}</td>
                   <td>{{ $viewals_result->student['middlename'] }}</td>
                   <td>{{ $viewals_result->student['regnumber'] }} <small>{{ $viewals_result->classname }} </small></td>
                   {{-- <td><a href="{{ url('admin/addpsychomotorad/'.$viewals_result->id) }}"
                     class='btn btn-default'>
                     Add Search Sch.
                      <i class="far fa-eye"></i> --}}
                      <td> <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                        Search Results of Sch.
                      </button></td>

                  

                 {{-- <td>{{ $viewals_result->user['ref_no'] }}</td> --}}
                 <td>{{ $viewals_result->test_1 }}</td>
                 <td>{{ $viewals_result->test_2 }}</td>
                 <td>{{ $viewals_result->test_3 }}</td>
                 <td>{{ $viewals_result->exams }}</td>
                 <td>{{ $viewals_result->test_1 + $viewals_result->test_2 + $viewals_result->test_3 + $viewals_result->exams }}</td>
                 <td>@if ($viewals_result->test_1 + $viewals_result->test_2 + $viewals_result->test_3 + $viewals_result->exams > 79)
                   <p>A</p>
                  
                   @elseif ($viewals_result->test_1 + $viewals_result->test_2 + $viewals_result->test_3 + $viewals_result->exams > 69)
                   <p>B</p>
                   @elseif ($viewals_result->test_1 + $viewals_result->test_2 + $viewals_result->test_3 + $viewals_result->exams > 59)
                   <p>C</p>
                   @elseif ($viewals_result->test_1 + $viewals_result->test_2 + $viewals_result->test_3 + $viewals_result->exams > 49)
                   <p>D</p>
                   @elseif ($viewals_result->test_1 + $viewals_result->test_2 + $viewals_result->test_3 + $viewals_result->exams > 40)
                   <p>E</p>
                   @elseif ($viewals_result->test_1 + $viewals_result->test_2 + $viewals_result->test_3 + $viewals_result->exams > 39)
                   <p>F</p>
                   @else
                   <p>F</p>
                 @endif</td>

                
                    
                 <td>@if ($viewals_result->status == null)
                    <span class="badge badge-secondary"> In progress</span>
                   @elseif($viewals_result->status == 'suspend')
                   <span class="badge badge-warning"> Suspended</span>
                   @elseif($viewals_result->status == 'sacked')
                   <span class="badge badge-danger"> Sacked</span>
                   @else
                   <span class="badge badge-success">Approved</span>
                   @endif</td>

                   <td><a href="{{ url('admin/viewresult/'.$viewals_result->id)}}"
                    class='btn btn-default'>
                     View Single
                 </a></td>
                 <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                  View All Sujects
                </button></td>
                 
                    {{-- <td><a href="{{ url('admin/viewresults/'.$viewals_result->user_id)}}"
                     class='btn btn-default'>
                      View All Sujects
                  </a></td> --}}

                 
                  
             
                  <td><a href="{{ url('admin/approveresults/'.$viewals_result->id)}}"
                    class='btn btn-warning'>
                    Approved
                 </a></td>



                 <td><a href="{{ url('admin/editviewresultsad/'.$viewals_result->id)}}"
                    class='btn btn-primary'>
                     <i class="far fa-edit"></i>
                 </a></td>
                 </tr>
               



                        {{-- @else
                            
                        @endif --}}
                    @endforeach
            
                    
                     
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>School Name</th>
                        <th>Teacher</th>
                        <th>Surname</th>
                        <th>Firstname</th>
                        <th>Middlename</th>
                        <th>Admission No</th>
                        <th>Search Sch.</th>
                        {{-- <th>Ref. No</th> --}}
                        <th>CA 1</th>
                        <th>CA 2</th>
                        <th>CA 3</th>
                        <th>Exams</th>
                        <th>Total</th>
                        <th>Grade</th>
                        <th>Status</th>
                        <th>View Single</th>
                        <th>View</th>
                        <th>Approved</th>
                        <th>Edit</th>
    
                  
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
    <strong>Copyright &copy; 2023 <a href="#">School</a>.</strong> All rights
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
        <h4 class="modal-title">Search Sch. Results</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="{{ url('admin/searchresultsforclasses') }}" method="post">
        @csrf
          <div class="form-group">
            <label for="">Sch. Name</label>
              <select name="schoolname" class="form-control" id="">
                @foreach ($viewals_results as $viewals_result)
                  <option value="{{ $viewals_result->schoolname }}">{{ $viewals_result->schoolname }}</option>
                @endforeach
              </select>
          </div>

          <div class="form-group">
            <label for="">Classname</label>
              <select name="classname" class="form-control" id="">
                @foreach ($viewals_results as $viewals_result)
                  <option value="{{ $viewals_result->classname }}">{{ $viewals_result->classname }}</option>
                @endforeach
              </select>
          </div>

         <div class="form-group">
            <label for="">Academic Session</label>
              <select name="academic_session" class="form-control" id="">
                @foreach ($viewals_results as $viewals_result)
                  <option value="{{ $viewals_result->academic_session }}">{{ $viewals_result->academic_session }}</option>
                @endforeach
              </select>
          </div>


          
         <div class="form-group">
            <label for="">Term</label>
              <select name="term" class="form-control" id="">
                @foreach ($viewals_results as $viewals_result)
                  <option value="{{ $viewals_result->term }}">{{ $viewals_result->term }}</option>
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



<div class="modal fade" id="modal-info">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">View all Results</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="{{ url('admin/searchstudentresults') }}" method="post">
        @csrf
          <div class="form-group">
            <label for="">Reg. Number</label>
              <select name="schoolname" class="form-control" id="">
                @foreach ($viewals_results as $viewals_result)
                  <option value="{{ $viewals_result->regnumber }}">{{ $viewals_result->regnumber }}</option>
                @endforeach
              </select>
          </div>

          <div class="form-group">
            <label for="">Classname</label>
              <select name="classname" class="form-control" id="">
                @foreach ($viewals_results as $viewals_result)
                  <option value="{{ $viewals_result->classname }}">{{ $viewals_result->classname }}</option>
                @endforeach
              </select>
          </div>

         <div class="form-group">
            <label for="">Academic Session</label>
              <select name="academic_session" class="form-control" id="">
                @foreach ($viewals_results as $viewals_result)
                  <option value="{{ $viewals_result->academic_session }}">{{ $viewals_result->academic_session }}</option>
                @endforeach
              </select>
          </div>


          
         <div class="form-group">
            <label for="">Term</label>
              <select name="term" class="form-control" id="">
                @foreach ($viewals_results as $viewals_result)
                  <option value="{{ $viewals_result->term }}">{{ $viewals_result->term }}</option>
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