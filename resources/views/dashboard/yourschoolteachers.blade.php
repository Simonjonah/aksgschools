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
                    <th>Schoolname</th>
                    <th>Phone</th>
                    <th>Surname</th>
                    <th>First Name</th>
                    <th>Ref NO</th>
                    <th>Plan</th>
                    <th>Logo</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Action</th>
                   
                    <th>Delete</th>

                    <th>Date</th>

                  </tr>
                  </thead> 
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
                  <tbody>

                    @foreach ($view_teachers as $view_teacher)
                      <tr>
                        @if ($view_teacher->slug == null)
                          <td>No HM/HS/PRINCIPAL</td>
                        @else
                        <td><a href="{{ url('web/schoolsteachers/'.$view_teacher->slug) }}" target="_blank" rel="noopener noreferrer">{{ $view_teacher->school['schoolname'] }}</a></td>
                          
                        @endif
                        <td>{{ $view_teacher->phone }}
                          <small>{{ $view_teacher->lga }}</small>
                        </td>

                        <td>{{ $view_teacher->surname }}
                        @if ($view_teacher->status == null)
                          <span class="badge badge-secondary"> In progress</span>
                         @elseif($view_teacher->status == 'suspend')
                         <span class="badge badge-warning"> Suspended</span>
                         @elseif($view_teacher->status == 'transfer')
                         <span class="badge badge-info"> Transfered</span>
                         @elseif($view_teacher->status == 'retired')
                         <span class="badge badge-danger"> Retired</span>
                         @elseif($view_teacher->status == 'reject')
                         <span class="badge badge-warning"> Rejected</span>
                         @else
                         <span class="badge badge-success">Approved</span>
                         @endif
                        </td>
                        <td>{{ $view_teacher->fname }}
                          <small>
                          <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                            Search For Teachers In School
                          </button></small> -->
                        </td>
                        <td>{{ $view_teacher->ref_no }}</td>
                        <td>{{ $view_teacher->schooltype }}
                          <small>{{ $view_teacher->classname }}</small>
                        </td>
                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_teacher->logo")}}" alt=""></td>
                        <td><a href="{{ url('web/viewprim/'.$view_teacher->ref_no1) }}"
                          class='btn btn-default'>
                           <i class="far fa-eye"></i>
                       </a></td>
                       <td><a href="{{ url('web/editprim/'.$view_teacher->ref_no1) }}"
                        class='btn btn-info'>
                         <i class="far fa-edit"></i>
                     </a></td>
                     <td> <div class="input-group-prepend">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                          Action
                        </button>
                        <ul class="dropdown-menu">
                          <li class="dropdown-item"><a href="{{ url('web/primsaddmit/'.$view_teacher->ref_no1) }}">Approved</a></li>
                          <li class="dropdown-item"><a href="{{ url('web/rejectprim/'.$view_teacher->ref_no1) }}">Reject</a></li>
                          <li class="dropdown-item"><a href="{{ url('web/suspendprim/'.$view_teacher->ref_no1) }}">Suspend</a></li>
                          <li class="dropdown-item"><a href="{{ url('web/tranferprim/'.$view_teacher->ref_no1) }}">Transfer</a></li>
                          <li class="dropdown-item"><a href="{{ url('web/retiredprim/'.$view_teacher->ref_no1) }}">Retired</a></li>
                        </ul>
                      </div></td>
                

                   <td><a href="{{ url('web/primdelete/'.$view_teacher->ref_no1) }}"
                      class='btn btn-danger'>
                      <i class="far fa-trash-alt"></i>
                     
                   </a></td>
                       
                        
                     <td>{{ $view_teacher->created_at->format('D d, M Y, H:i')}}</td>

                      </tr>
                    
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                    <th>Schoolname</th>

                        <th>Phone</th>
                        <th>Surname</th>
                        <th>First Name</th>
                        <th>Ref NO</th>
                        <th>Plan</th>
                        <th>Logo</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Action</th>
                        <th>Delete</th>
    
                        <th>Date</th>
    
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
    <strong>Copyright &copy; 2023 <a href="#">Arise Schools</a>.</strong> All rights
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
      <div class="modal-content bg-defualt">
        <div class="modal-header">
          <h4 class="modal-title">Search for Students</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('web/searchteachersby') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="">School Name</label>
                <select name="schoolname" class="form-control" id="">
                @if (Auth::user()->schooltype == 'SUBEB')
                  @foreach ($view_teachers as $view_teacher)
                        @if ($view_teacher->schooltype == 'SUBEB')
                          <option value="{{ $view_teacher->schoolname }}">{{ $view_teacher->schoolname }}</option>
                        @else
                          
                        @endif
                  @endforeach
                @else
                
                  @foreach ($view_teachers as $view_teacher)
                        @if ($view_teacher->schooltype == 'SSEB')
                          <option value="{{ $view_teacher->schoolname }}">{{ $view_teacher->schoolname }}</option>
                        @else
                          
                        @endif
                  @endforeach
              @endif
                   

                </select>
            </div>

            {{-- <div class="form-group">
              <select name="classname" class="form-control" id="">
              @if (Auth::user()->schooltype == 'SUBEB')
                @foreach ($view_teachers as $view_teacher)
                      @if ($view_teacher->section == 'Primary')
                        <option value="{{ $view_teacher->classname }}">{{ $view_teacher->classname }}</option>
                      @else
                        
                      @endif
                @endforeach
              @else
              
                @foreach ($view_teachers as $view_teacher)
                      @if ($view_teacher->section == 'Secondary')
                        <option value="{{ $view_teacher->classname }}">{{ $view_teacher->classname }}</option>
                      @else
                        
                      @endif
                @endforeach
              @endif
             

              </select>
          </div> --}}

            {{-- <div class="form-group">
                <select name="academic_session" class="form-control" id="">
                    @foreach ($view_teachers as $view_teacher)
                        <option value="{{ $view_teacher->academic_session }}">{{ $view_teacher->academic_session }}</option>
                    @endforeach

                </select>
            </div> --}}
            <div class="form-group">
              <label for="">LGA</label>
                <select name="lga" class="form-control" id="">
                    @foreach ($view_teachers as $view_teacher)
                        <option value="{{ $view_teacher->lga }}">{{ $view_teacher->lga }}</option>
                    @endforeach

                </select>
            </div>
            {{-- <div class="form-group">
                <select name="term" class="form-control" id="">
                    @foreach ($view_resultalls as $view_resultall)
                        <option value="{{ $view_resultall->term }}">{{ $view_resultall->term }}</option>
                    @endforeach

                </select>
            </div> --}}

            <div class="form-group">
              <label for="">Section</label>
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