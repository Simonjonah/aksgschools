@include('dashboard.teacher.header')

  <!-- Main Sidebar Container -->
  @include('dashboard.teacher.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Subjects</h1>
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

 
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Subjects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a class="btn btn-danger" href="{{ url('admin/assinjuniorsubjectsview')}}">Assigned Teacher for Senior Secondary Subjects</a></li>
              <!-- <li class="breadcrumb-item active">View Classes</li> -->
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
              

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Assign Senior Secondary Subjects</h3>
              </div>
              <!-- /.card-header -->
               @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('fail'))
                    <div class="alert alert-danger">
                        {{ session('fail') }}
                    </div>
                @endif
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Ref No</th>
                    <th>Subject Name</th>
                    <th> Section</th>
                    <th>Sub Section</th>
                    <th>Assigned Teacher</th>
                    <th>View Assigned Teacher</th>
                    <!-- <th>Date</th> -->
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($view_allsubjects as $view_allsubject)
                       @if ($view_allsubject->subsection == 'Senior Secondary')

                  <tr>

                    <td>{{ $view_allsubject->connect }}</td>
                    <td>{{ $view_allsubject->subjectname }}</td>
                    <td>{{ $view_allsubject->section }}</td>
                    <td>{{ $view_allsubject->subsection }}</td>
                    <td>
                      <a href="{{ url('admin/assignedsubject', $view_allsubject->connect) }}" class="btn btn-primary">Assigned Teacher</a>
                    </td>

                    <td>
                      <a href="{{ url('admin/viewassignedteachersubject', $view_allsubject->connect) }}" class="btn btn-danger">View Assigned Teacher </a>
                    </td>
                    <!-- <td>{{ $view_allsubject->created_at->format('D M, Y, h:a') }}</td> -->
                  </tr>
                  @else
                            
                @endif
                  @endforeach
                  
                  </tbody>
                  <tfoot>
                   <tr>
                    <th>Ref No</th>
                    <th>Subject Name</th>
                    <th> Section</th>
                    <th>Sub Section</th>

                    <th>Assigned Teacher</th>
                    <th>View Assigned Teacher</th>
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
 
@include('dashboard.teacher.footer')
