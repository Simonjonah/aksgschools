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
            <h1>View Classes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Classes</li>
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
                <h3 class="card-title">DataTable with default features</h3>
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
                    <th>Section</th>
                    <th>Sub Section</th>
                    <th>Classes</th>
                    <th>Teacher's Name</th>
                    <th>Term</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($view_teachers as $view_teacher)
                  <tr>
                    <td>{{ $view_teacher->ref_no1 }}</td>
                    <td>{{ $view_teacher->subject['subjectname'] }}</td>
                    <td>{{ $view_teacher->subject['section'] }}</td>
                    <td>{{ $view_teacher->subject['subsection'] }}</td>
                    <td>{{ $view_teacher->classname }}</td>
                    <td>{{ $view_teacher->user['fname'] }} {{ $view_teacher->user['surname'] }}</td>
                    <td>{{ $view_teacher->term }}</td>
                    
                    <td>
                      <a href="{{ url('admin/editassignesubjects', $view_teacher->ref_no1) }}" class="btn btn-primary">Edit</a>
                    </td>

                    <td>
                      <a href="{{ url('admin/deleteassignsubjects', $view_teacher->ref_no1) }}" class="btn btn-danger">Delete</a>
                    </td>
                    <td>{{ $view_teacher->created_at->format('D M, Y, h:a') }}</td>
                  </tr>
                  @endforeach
                  
                  </tbody>
                  <tfoot>
                   <tr>
                    <th>Ref No</th>
                    <th>Subject Name</th>
                    <th>Section</th>
                    <th>Sub Section</th>
                    <th>Classes</th>
                    <th>Teacher's Name</th>
                    <th>Term</th>
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
    <!-- /.content -->
  </div>
  @include('dashboard.footer')