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
                <h3 class="card-title">View Children of Parents</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>First Name</th>
                    <th>Middlename</th>
                    <th>Surname</th>
                    <th>DOB</th>
                    <th>Gender </th>
                    <th>Blood Group</th>
                    <th>Images</th>
                    <th>Genotype </th>
                    <th>Last School Address</th>
                    <th>Previous Class Name</th>
                    <th>Age</th>
                    <th>Classname</th>
                    <th>Disability</th>
                    <th>Section</th>
                   
                    <th>View</th>
                    <th>Status</th>

                    <th>Ref. No</th>
                    <th>Edit</th>
                    {{-- <th>Suspend</th> --}}
                    {{-- <th>Admit</th> --}}
                    
                    {{-- <th>Delete</th> --}}

                    <th>Date</th>

                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($view_childtoparents as $view_childtoparent)
       
                      <tr>
                        {{-- <td>{{ $view_childtoparent->guardian['fathername']}}</td> --}}
                        <td>{{ $view_childtoparent->fname}}</td>
                        <td>{{ $view_childtoparent->middlename }}</td>
                        <td>{{ $view_childtoparent->surname }}</td>
                        <td>{{ $view_childtoparent->dob }}</td>
                        <td>{{ $view_childtoparent->gender }}</td>
                        <td>{{ $view_childtoparent->bloodgroup }}</td>
                        <td><img style="width: 100%; height: 100px;" class="profile-user-img img-fluid"
                            src="{{ URL::asset("/public/../$view_childtoparent->images")}}"
                            alt="User profile picture"></td>
                        <td>{{ $view_childtoparent->genotype }}</td>

                        <td>{{ $view_childtoparent->lastschooladdress }}</td>
                        <td>{{ $view_childtoparent->preschoolname }}</td>
                        <td>{{ $view_childtoparent->age }}</td>
                        <td>{{ $view_childtoparent->classname }}</td>
                        <td>{{ $view_childtoparent->disability }}</td>
                        <td>{{ $view_childtoparent->section }}</td>


                        {{-- <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_childtoparent->images")}}" alt=""></td> --}}
                        <td><a href="{{ url('admin/viewstudent/'.$view_childtoparent->ref_no1) }}"
                            class='btn btn-default'>
                             <i class="far fa-eye"></i>
                         </a></td>
                         <td>@if ($view_childtoparent->status == null)
                          <span class="badge badge-secondary"> In progress</span>
                         @elseif($view_childtoparent->status == 'suspend')
                         <span class="badge badge-warning"> Suspended</span>
                         @elseif($view_childtoparent->status == 'reject')
                         <span class="badge badge-danger"> Rejected</span>
                         @elseif($view_childtoparent->status == 'approved')
                         <span class="badge badge-info"> Approved</span>
                         @elseif($view_childtoparent->status == 'admitted')
                         
                         <span class="badge badge-success">Admitted</span>
                         @endif</td>
                        
                     

                      <td>{{ $view_childtoparent->ref_no1 }}</td>
                         <td><a href="{{ url('admin/editstudent/'.$view_childtoparent->ref_no1) }}"
                          class='btn btn-info'>
                           <i class="far fa-edit"></i>
                       </a></td>  
                       
                      
                     <td>{{ $view_childtoparent->created_at->format('D d, M Y, H:i')}}</td>

                      </tr>
                     
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>First Name</th>
                      <th>Middlename</th>
                      <th>Surname</th>
                      <th>DOB</th>
                      <th>Gender </th>
                      <th>Blood Group</th>
                      <th>Images</th>
                      <th>Genotype </th>
                      <th>Last School Address</th>
                      <th>Previous Class Name</th>
                      <th>Age</th>
                      <th>Classname</th>
                      <th>Disability</th>
                      <th>Section</th>
                     
                      <th>View</th>
                      <th>Status</th>
                      {{-- <th>Actions</th> --}}
  
                      <th>Ref. No</th>
                      <th>Edit</th>
                      {{-- <th>Suspend</th> --}}
                      {{-- <th>Admit</th> --}}
                      
                      {{-- <th>Delete</th> --}}
  
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
