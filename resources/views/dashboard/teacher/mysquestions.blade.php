@include('dashboard.header')
@include('dashboard.sidebar')
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
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
            <h3 class="card-title">My Assigned Subject</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>

                <th>First Name</th>
                <th>Surname</th>
                <th>Class</th>
                <th>Subjects</th>

                <th>Questions</th>
                <th>Options</th>
                <th>Answer</th>
                <th>term</th>
                <th>Status</th>
                <th>Action</th>
                
                <th>Date</th>
              </tr>
              </thead>
              <tbody>

                @foreach ($view_questions as $view_question)
   
                  <tr>
                    <td>{{ Auth::guard('web')->user()->fname }}</td>
                    <td>{{ Auth::guard('web')->user()->surname }}</td>
                    <td>{{ $view_question->classname }}</td>
                    <td>{{ $view_question->subjectname }}</td>
                    <td>{{ $view_question->question }}</td>
                    <td><select class="form-control" id="">
                        <option value="">{{ $view_question->option1 }}</option>    
                        <option value="">{{ $view_question->option2 }}</option>    
                        <option value="">{{ $view_question->option3 }}</option>  
                          
                    </select></td>
                    <td>{{ $view_question->is_correct }}</td>
                    <td>{{ $view_question->term }}</td>

                    <td>@if ($view_question->status == null)
                      <span class="badge badge-secondary">In Review</span>
                      @elseif ($view_question->status == 'unapproved')
                      <span class="badge badge-danger">Unapproved</span>
                      
                        @else
                        <span class="badge badge-success">Approved</span>
                      @endif</td>
                 
                    <td> <div class="input-group-prepend">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                          Action
                        </button>
                        <ul class="dropdown-menu">
                          <li class="dropdown-item"><a href="{{ url('web/viewquestion/'.$view_question->id) }}">View Question</a></li>
                          <li class="dropdown-item"><a href="{{ url('web/editquestion/'.$view_question->id) }}">Edit Question</a></li>
                        </ul>
                      </div></td>
                
                 <td>{{ $view_question->created_at->format('D d, M Y, H:i')}}</td>

                  </tr>
                 
                @endforeach
             
             
               
              </tbody>
              <tfoot>
                <tr>
                    <th>First Name</th>
                    <th>Surname</th>
                    <th>Class</th>
                    <th>Subjects</th>
    
                    <th>Questions</th>
                    <th>Options</th>
                    <th>Answer</th>
                    <th>term</th>
                    <th>Status</th>
                    <th>Action</th>
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
  
  
    
    
 </div>

 <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

 <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 
 <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
 
 <script src="{{ asset('assets/dist/js/adminlte.min.js?v=3.2.0') }}"></script>
 
 <script src="{{ asset('assets/dist/js/demo.js') }}"></script>
 {{-- @include('dashboard.admin.header') --}}
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
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    {{-- @include('dashboard.footer') --}}