

  <!-- Main Sidebar Container -->
  @include('dashboard.admin.header')
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
                    <th>Tuition</th>
                    <th>Form Fee</th>

                    <th>Medicals</th>
                    <th>Extracurricular</th>
                    <th>Term </th>
                    <th>Book Amount</th>
                    <th>Classname</th>
                    <th>Development</th>
                    <th>Uniform</th>
                    <th>PTA</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Status</th>
                    
                    <th>Approve</th>
                    <th>Print</th>
                    <th>Print All</th>

                    <th>Delete</th>
                    <th>Date</th>

                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($view_all_fees as $view_all_fee)
                    <tr>
                        <td>₦{{ $view_all_fee->amount }}</td>
                        <td>₦{{ $view_all_fee->form_amount }}</td>
                        <td>₦{{ $view_all_fee->medicals }}</td>
                        <td>₦{{ $view_all_fee->extracuri_fee }}</td>
                        <td>{{ $view_all_fee->term }}</td>
                        <td>₦{{ $view_all_fee->bookamount }}</td>
                        <td>{{ $view_all_fee->classname }}</td>
                        <td>₦{{ $view_all_fee->dev_amount }}</td>
                        <td>₦{{ $view_all_fee->uniforms_amount }}</td>
                        <td>₦{{ $view_all_fee->pta_amount }}</td>
                        <td><a href="{{ url('admin/viewsinglefee/'.$view_all_fee->id) }}"
                            class='btn btn-default'>
                             <i class="far fa-eye"></i>
                         </a></td>
                         <td><a href="{{ url('admin/editsinglefee/'.$view_all_fee->id) }}"
                          class='btn btn-info'>
                           <i class="far fa-edit"></i>
                       </a></td>
                       <td>@if ($view_all_fee->status == null)
                        <span class="badge badge-secondary"> In progress</span>
                       @elseif($view_all_fee->status == 'suspend')
                       <span class="badge badge-warning"> Suspended</span>
                       @else
                       <span class="badge badge-success">Approved</span>
                       @endif</td>
                  


                      <th> <a href="{{ url('admin/approvedsinglefee/'.$view_all_fee->id) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-user"></i> 
                      </a></th>
                      <th><a href="{{ url('admin/printsinglefee/'.$view_all_fee->id) }}" class="btn btn-success"><i class="fas fa-print"></i></a></th>
                      <th><a href="{{ url('admin/printsinglefeeall') }}" class="btn btn-success">Print All<i class="fas fa-print"></i></a></th>
                       <td><a href="{{ url('admin/deletesinglefee/'.$view_all_fee->id) }}"
                        class='btn btn-danger'>
                         <i class="far fa-trash-alt"></i>
                     </a></td>

                     
                        
                     <td>{{ $view_all_fee->created_at->format('D d, M Y, H:i')}}</td>

                      </tr>
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Tuition</th>
                      <th>Form Fee</th>
  
                      <th>Medicals</th>
                      <th>Extracurricular</th>
                      <th>Term </th>
                      <th>Book Amount</th>
                      <th>Classname</th>
                      <th>Development</th>
                      <th>Uniform</th>
                      <th>PTA</th>
                      <th>View</th>
                      <th>Edit</th>
                      <th>Status</th>
                      
                      <th>Approve</th>
                      <th>Print</th>
                      <th>Print All</th>
  
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
    <strong>Copyright &copy; 2023 <a href="http://goldendestinyacademyschools.com">goldendestiny schools</a>.</strong> All rights
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
