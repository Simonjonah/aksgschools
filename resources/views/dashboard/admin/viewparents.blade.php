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
                <h3 class="card-title">View Parents</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Father's Name</th>
                    <th>Mother's Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Home Address</th>
                    <th>Office Address</th>
                    <th>Marital Status</th>
                    <th>Add Child</th>
                    <th>State of Origin</th>
                    <th>Mother's Occupation</th>
                    <th>Father's Occupation</th>
                    <th>Emergency Phone</th>
                    <th>Emergency Address</th>
                    <th>Doctor's Name</th>
                    <th>Doctor's Phone</th>
                    <th>View</th>
                    <th>Status</th>
                    <th>Actions</th>

                    <th>Ref. No</th>
                    <th>Edit</th>
                    <th>Suspend</th>
                    {{-- <th>Admit</th> --}}
                    
                    <th>Delete</th>

                    <th>Date</th>

                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($view_parents as $view_parent)
       
                      <tr>
                        <td>{{ $view_parent->fathername }}</td>
                        <td>{{ $view_parent->mothername }}</td>
                        <td>{{ $view_parent->email }}</td>
                        <td>{{ $view_parent->phone }}</td>
                        <td>{{ $view_parent->homeaddress }}</td>
                        <td>{{ $view_parent->officeaddress }}</td>
                        <td>{{ $view_parent->maritalstatus }}</td>
                        <th><a href="{{ url('admin/addchild/'.$view_parent->id) }}" class="btn btn-sm bg-teal">
                            <i class="fas fa-user"></i>
                          </a></th>
                        <td>{{ $view_parent->stateoforigin }}</td>
                        <td>{{ $view_parent->motheroccupation }}</td>
                        <td>{{ $view_parent->fatheroccupation }}</td>
                        <td>{{ $view_parent->emergencyphone }}</td>
                        <td>{{ $view_parent->emergencyaddress }}</td>
                        <td>{{ $view_parent->doctorname }}</td>
                        <td>{{ $view_parent->doctorphone }}</td>


                        {{-- <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_parent->images")}}" alt=""></td> --}}
                        <td><a href="{{ url('admin/viewparent/'.$view_parent->ref_no) }}"
                            class='btn btn-default'>
                             <i class="far fa-eye"></i>
                         </a></td>
                         <td>@if ($view_parent->status == null)
                          <span class="badge badge-secondary"> In progress</span>
                         @elseif($view_parent->status == 'suspend')
                         <span class="badge badge-warning"> Suspended</span>
                         @elseif($view_parent->status == 'reject')
                         <span class="badge badge-danger"> Rejected</span>
                         @elseif($view_parent->status == 'approved')
                         <span class="badge badge-info"> Approved</span>
                         @elseif($view_parent->status == 'admitted')
                         
                         <span class="badge badge-success">Admitted</span>
                         @endif</td>
                        
                       <td> <div class="input-group-prepend">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                          Action
                        </button>
                        <ul class="dropdown-menu">
                          <li class="dropdown-item"><a href="{{ url('admin/allparentprim') }}">Print  Parent Primary</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/allparentsec') }}">Print  Parent Secondary </a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/parentochild1/'.$view_parent->ref_no) }}">Viiew Children </a></li>
                          
                        </ul>
                      </div></td>

                      <td>{{ $view_parent->ref_no }}</td>
                         <td><a href="{{ url('admin/editparent/'.$view_parent->ref_no) }}"
                          class='btn btn-info'>
                           <i class="far fa-edit"></i>
                       </a></td>  
                       
                        
                       
                
                      </a></th><th><a href="{{ url('admin/suspendparent/'.$view_parent->ref_no) }}" class="btn btn-sm bg-teal">
                        <i class="fas fa-comments"></i>
                      </a></th>

                      {{-- <th> <a href="{{ url('admin/studentsaddmit/'.$view_parent->ref_no) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-user"></i> 
                      </a></th>
                       --}}
                     
                      {{-- <th><a href="{{ url('admin/studentit/'.$view_parent->ref_no) }}" class="btn btn-info"><i class="fas fa-user"></i> IT</a></th> --}}
                       <td><a href="{{ url('admin/deleteparent/'.$view_parent->ref_no) }}"
                        class='btn btn-danger'>
                         <i class="far fa-trash-alt"></i>
                     </a></td>
                     {{-- <td>@if ($view_parent->student_identity == null)
                      <span class="badge badge-danger">Not Send</span>
                     @elseif($view_parent->student_identity == 'IT SEND')
                     <span class="badge badge-info"> Send For I.T</span>
                     
                     @endif</td> --}}
                     <td>{{ $view_parent->created_at->format('D d, M Y, H:i')}}</td>

                      </tr>
                     
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Father's Name</th>
                        <th>Mother's Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Home Address</th>
                        <th>Office Address</th>
                        <th>Marital Status</th>
                        <th>Add Child</th>

                        <th>State of Origin</th>
                        <th>Mother's Occupation</th>
                        <th>Father's Occupation</th>
                        <th>Emergency Phone</th>
                        <th>Emergency Address</th>
                        <th>Doctor's Name</th>
                        <th>Doctor's Phone</th>
                        <th>View</th>
                        <th>Status</th>
                        <th>Actions</th>
    
                        {{-- <th>Reg No</th> --}}
                        <th>Ref. No</th>
                        <th>Edit</th>

                        <th>Suspend</th>
                        {{-- <th>Admit</th> --}}
                        
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
    <strong>Copyright &copy; 2023 <a href="https://goldendayschools.com">Golden Days</a>.</strong> All rights
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
