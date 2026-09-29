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
                <h3 class="card-title" style="color: red">Students/Pupils</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Classes</th>
                      <th>Subjects</th>
                      <th>Lastname</th>
                      <th>Term</th>
                      <th>Images</th>
                      <th>View</th>
                      <th>Status</th>
  
                      <th>Admit No</th>
                      <th>Section</th>
                      <th>Add result</th>
                     
  
                      <th>Date</th>
  
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
                    @foreach ($view_addresults as $view_addresult)

                      @if ($view_addresult->section = 'Secondary')
                      <tr>
                        <td>{{ $view_addresult->classname }}</td>
                        <td>{{ $view_addresult->middlename }}</td>
                        <td>{{ $view_addresult->fname }}</td>
                        <td>{{ $view_addresult->term }}</td>
  
                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_addresult->images")}}" alt=""></td>
                        <td><a href="{{ url('admin/addresultsad1/'.$view_addresult->ref_no1) }}"
                            class='btn btn-default'>
                            <i class="far fa-eye"></i>
                        </a></td>
                        <td>@if ($view_addresult->status == null)
                          <span class="badge badge-secondary"> In progress</span>
                        @elseif($view_addresult->status == 'suspend')
                        <span class="badge badge-warning"> Suspended</span>
                        @elseif($view_addresult->status == 'reject')
                        <span class="badge badge-danger"> Rejected</span>
                        @elseif($view_addresult->status == 'approved')
                        <span class="badge badge-info"> Approved</span>
                        @elseif($view_addresult->status == 'admitted')
                        
                        <span class="badge badge-success">Admitted</span>
                        @endif</td>
                 
  
                      <td>{{ $view_addresult->regnumber }}</td>
                      <td>{{ $view_addresult->section }}</td>
                        <td><a href="{{ url('admin/addresultsad1/'.$view_addresult->ref_no1) }}"
                          class='btn btn-info'>
                          <i class="far fa-user">Add Results</i>
                      </a></td>  
                      
                        
                   
                    
                    <td>{{ $view_addresult->created_at->format('D d, M Y, H:i')}}</td>
  
                      </tr>
                
                      @else
                        
                      @endif
                      
                    
                    @endforeach
               
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Classes</th>
                      <th>Subjects</th>
                      <th>Lastname</th>
                      <th>Term</th>
                      <th>Images</th>
                      <th>View</th>
                      <th>Status</th>
  
                      <th>Admit No</th>
                      <th>Section</th>
                      <th>Add result</th>
                     
  
                      <th>Date</th>
  
                    </tr>
  
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="color: red">Students/Pupils</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Classes</th>
                      <th>Subjects</th>
                      <th>Lastname</th>
                      <th>Term</th>
                      <th>Images</th>
                      <th>View</th>
                      <th>Status</th>
  
                      <th>Admit No</th>
                      <th>Section</th>
                      <th>Add result</th>
                     
  
                      <th>Date</th>
  
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($view_addresults as $view_addresult)

                      @if ($view_addresult->section = 'Secondary')
                      <tr>
                        <td>{{ $view_addresult->classname }}</td>
                        <td>{{ $view_addresult->middlename }}</td>
                        <td>{{ $view_addresult->fname }}</td>
                        <td>{{ $view_addresult->term }}</td>
  
                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_addresult->images")}}" alt=""></td>
                        <td><a href="{{ url('admin/addresultsad1/'.$view_addresult->ref_no1) }}"
                            class='btn btn-default'>
                            <i class="far fa-eye"></i>
                        </a></td>
                        <td>@if ($view_addresult->status == null)
                          <span class="badge badge-secondary"> In progress</span>
                        @elseif($view_addresult->status == 'suspend')
                        <span class="badge badge-warning"> Suspended</span>
                        @elseif($view_addresult->status == 'reject')
                        <span class="badge badge-danger"> Rejected</span>
                        @elseif($view_addresult->status == 'approved')
                        <span class="badge badge-info"> Approved</span>
                        @elseif($view_addresult->status == 'admitted')
                        
                        <span class="badge badge-success">Admitted</span>
                        @endif</td>
                 
  
                      <td>{{ $view_addresult->regnumber }}</td>
                      <td>{{ $view_addresult->section }}</td>
                        <td><a href="{{ url('admin/addresultsad1/'.$view_addresult->ref_no1) }}"
                          class='btn btn-info'>
                          <i class="far fa-user">Add Results</i>
                      </a></td>  
                      
                        
                   
                    
                    <td>{{ $view_addresult->created_at->format('D d, M Y, H:i')}}</td>
  
                      </tr>
                
                      @else
                        
                      @endif
                      
                    
                    @endforeach
                
                
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Classes</th>
                      <th>Subjects</th>
                      <th>Lastname</th>
                      <th>Term</th>
                      <th>Images</th>
                      <th>View</th>
                      <th>Status</th>
  
                      <th>Admit No</th>
                      <th>Section</th>
                      <th>Add result</th>
                     
  
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
    <strong>Copyright &copy; 2023 <a href="https://goldendestinyschools.com">goldendestinyschools.com</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script src="{{  asset('assets/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{  asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{  asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{  asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{  asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{  asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script src="{{  asset('assets/dist/js/adminlte.min.js?v=3.2.0')}}"></script>

<script src="{{  asset('assets/dist/js/demo.js')}}"></script>

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
