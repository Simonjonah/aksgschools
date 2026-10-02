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
                    <th>Subjects</th>
                    <th>Section</th>
                    <th>Sub Section</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                    @csrf
                    @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif
  
                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                    @endif
                    @foreach ($viewnursery_subjects as $viewnursery_subject)
                        <tr>
                            <td>{{ $viewnursery_subject->subjectname }}</td>
                            <td>{{ $viewnursery_subject->section }}</td>
                            <td>{{ $viewnursery_subject->subsection }}</td>
                         
                          <th><a href="{{ url('admin/editsubject/'.$viewnursery_subject->connect) }}" class="btn btn-success"><i class="fas fa-edit"></i></a></th>
                          <th><a href="{{ url('admin/deletesubject/'.$viewnursery_subject->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></th>
                            
                         <td>{{ $viewnursery_subject->created_at->format('D d, M Y, H:i')}}</td>
    
                          </tr> 
                       
                     
                     
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Subjects</th>
                      <th>Section</th>
                      <th>Sub Section</th>
                      <th>Edit</th>
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
   @include('dashboard.admin.footer')
