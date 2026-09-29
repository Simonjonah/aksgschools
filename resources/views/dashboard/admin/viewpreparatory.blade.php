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
                    <th>Surname</th>
                    <th>Middlename</th>
                    <th>Lastname</th>
                    <th>Images</th>
                    <th>View</th>
                    <th>Status</th>
                    <th>Actions</th>

                    <th>Reg No</th>
                    <th>Ref. No</th>
                    <th>Edit</th>
                    <th>Reject</th>
                    <th>Assigned </th>
                    <th>Suspend</th>
                    <th>Admit</th>
                    
                    {{-- <th>Send to IT</th> --}}
                    <th>Delete</th>
                    {{-- <th>I.T Status</th> --}}

                    <th>Date</th>

                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($display_uyopreparatorys as $display_uyopreparatory)
       
                      <tr>
                        <td>{{ $display_uyopreparatory->surname }}</td>
                        <td>{{ $display_uyopreparatory->middlename }}</td>
                        <td>{{ $display_uyopreparatory->fname }}</td>
                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$display_uyopreparatory->images")}}" alt=""></td>
                        <td><a href="{{ url('admin/viewstudents/'.$display_uyopreparatory->ref_no) }}"
                            class='btn btn-default'>
                             <i class="far fa-eye"></i>
                         </a></td>
                         <td>@if ($display_uyopreparatory->status == null)
                          <span class="badge badge-secondary"> In progress</span>
                         @elseif($display_uyopreparatory->status == 'suspend')
                         <span class="badge badge-warning"> Suspended</span>
                         @elseif($display_uyopreparatory->status == 'reject')
                         <span class="badge badge-danger"> Rejected</span>
                         @elseif($display_uyopreparatory->status == 'approved')
                         <span class="badge badge-info"> Approved</span>
                         @elseif($display_uyopreparatory->status == 'admitted')
                         
                         <span class="badge badge-success">Admitted</span>
                         @endif</td>
                        
                       <td> <div class="input-group-prepend">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                          Action
                        </button>
                        <ul class="dropdown-menu">
                          <li class="dropdown-item"><a href="{{ url('admin/alluyocrechepdf') }}">Print Uyo Creche</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/alluyopreperatorypdf') }}">Print Uyo preperatory</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/allpreschoolpdf') }}">Print Uyo pre-School</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/alluyonurserypdf') }}">Print Uyo Nursery</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/alluyoprimarypdf') }}">Print Uyo Primary</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/alluyohighschpdf') }}">Print Uyo High School</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/alluyocentpdf') }}">Print All Uyo Center</a></li>
                          
                        </ul>
                      </div></td>

                      <td>{{ $display_uyopreparatory->regnumber }}</td>
                      <td>{{ $display_uyopreparatory->ref_no }}</td>
                         <td><a href="{{ url('admin/editstudent/'.$display_uyopreparatory->ref_no) }}"
                          class='btn btn-info'>
                           <i class="far fa-edit"></i>
                       </a></td>  
                       
                        
                       <th><a href="{{ url('admin/rejectstudent/'.$display_uyopreparatory->ref_no) }}" class="btn btn-sm bg-teal">
                        <i class="fas fa-user"></i>
                      </a></th>
                      <th><a href="{{ url('admin/assignedteacher/'.$display_uyopreparatory->ref_no) }}" class="btn btn-sm bg-teal">
                        <i class="fas fa-comments"></i>
                      </a></th><th><a href="{{ url('admin/suspendstudent/'.$display_uyopreparatory->ref_no) }}" class="btn btn-sm bg-teal">
                        <i class="fas fa-comments"></i>
                      </a></th>

                      <th> <a href="{{ url('admin/studentsaddmit/'.$display_uyopreparatory->ref_no) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-user"></i> 
                      </a></th>
                      
                     
                      {{-- <th><a href="{{ url('admin/studentit/'.$display_uyopreparatory->ref_no) }}" class="btn btn-info"><i class="fas fa-user"></i> IT</a></th> --}}
                       <td><a href="{{ url('admin/deletestudent/'.$display_uyopreparatory->ref_no) }}"
                        class='btn btn-danger'>
                         <i class="far fa-trash-alt"></i>
                     </a></td>
                     {{-- <td>@if ($display_uyopreparatory->student_identity == null)
                      <span class="badge badge-danger">Not Send</span>
                     @elseif($display_uyopreparatory->student_identity == 'IT SEND')
                     <span class="badge badge-info"> Send For I.T</span>
                     
                     @endif</td> --}}
                     <td>{{ $display_uyopreparatory->created_at->format('D d, M Y, H:i')}}</td>

                      </tr>
                     
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Surname</th>
                      <th>Middlename</th>
                      <th>Lastname</th>
                      <th>Images</th>
                      <th>View</th>
                      <th>Status</th>
                      <th>Actions</th>
  
                      <th>Reg No</th>
                      <th>Ref. No</th>

                      <th>Edit</th>
                      <th>Reject</th>
                      <th>Assigned </th>
                      <th>Suspend</th>
                      <th>Admit</th>
                      
                      {{-- <th>Send to IT</th> --}}
                      <th>Delete</th>
                      {{-- <th>I.T Status</th> --}}
  
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
    <strong>Copyright &copy; 2023 <a href="https://brixtoonschool.com.ng">Brixtonn</a>.</strong> All rights
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
