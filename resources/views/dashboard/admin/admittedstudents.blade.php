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
                    <th>Section</th>

                    <th>Surname</th>
                    <th>Middlename</th>
                    <th>Lastname</th>
                    <th>Ref NO</th>
                    <th>Admited Class</th>
                    <th>Images</th>
                    <th>View</th>
                    <th>Edit</th>
                   
                    <th>Date</th>

                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($admit_students as $admit_student)
                      {{-- @if ($admit_student->status == null) --}}
                      <tr>
                        <td>{{ $admit_student->section }}</td>
                        <td>{{ $admit_student->surname }}</td>
                        <td>{{ $admit_student->middlename }}</td>
                        <td>{{ $admit_student->fname }}</td>
                        <td>{{ $admit_student->ref_no1 }}</td>
                        <td>{{ $admit_student->classname }}</td>
                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$admit_student->images")}}" alt=""></td>
                        <td><a href="{{ url('admin/viewstudent/'.$admit_student->ref_no1) }}"
                            class='btn btn-default'>
                             <i class="far fa-eye"></i>
                         </a></td>
                         <td><a href="{{ url('admin/editstudent/'.$admit_student->ref_no1) }}"
                          class='btn btn-info'>
                           <i class="far fa-edit"></i>
                       </a></td>
                       <td><a href="{{ url('admin/addregno/'.$admit_student->ref_no1) }}"
                        class='btn btn-info'>
                         Add Reg No
                     </a></td>
                       

                        
                     <td>{{ $admit_student->created_at->format('D d, M Y, H:i')}}</td>

                      </tr>
                      {{-- @else
                        
                      @endif --}}
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Section</th>
                      <th>Surname</th>
                      <th>Middlename</th>
                      <th>Lastname</th>
                      <th>Ref NO</th>
                      <th>Admitted Class</th>
                      <th>Images</th>
                      <th>View</th>
                      <th>Edit</th>
                     
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
  
@include('dashboard.admin.footer')
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