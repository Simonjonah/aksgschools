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
                    <th>Lastname</th>
                    <th>First Name</th>
                    <th>Images</th>

                    <th>Phone</th>
                    <th>Schoolname</th>
                    <th>Classname</th>
                    <th>Section</th>
                    <th>Term</th>

                    <th>Email</th>

                   
                    <th>Status</th>
                    <th>Action</th>
                   
                    <th>Print</th>
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
                    @foreach ($mmy_teachers as $mmy_teacher)
                      <tr>
                        <td>{{ $mmy_teacher->surname }}</td>
                        <td>{{ $mmy_teacher->fname }}</td>
                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$mmy_teacher->images")}}" alt=""></td>
                        <td>{{ $mmy_teacher->phone }}</td>
                        <td>{{ $mmy_teacher->school['schoolname'] }}</td>
                        <td>{{ $mmy_teacher->classname }}</td>
                        <td>{{ $mmy_teacher->section }}</td>
                        <td>{{ $mmy_teacher->term }}</td>
                        <td>{{ $mmy_teacher->email }}</td>

                        <td>@if ($mmy_teacher->status == 'teacher')
                          <span class="badge badge-secondary">In Progress</span>
                          @elseif ($mmy_teacher->status == 'sacked')
                          <span class="badge badge-danger">Sacked</span>
                          @elseif ($mmy_teacher->status == 'suspend')
                          <span class="badge badge-warning">Suspended</span>
                            @else
                            <span class="badge badge-success">Employed</span>
                          @endif</td>

                       <td> <div class="input-group-prepend">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                          Action
                        </button>
                        <ul class="dropdown-menu">
                          <li class="dropdown-item"><a href="{{ url('admin/viewtteachertr/'.$mmy_teacher->ref_no) }}">View</a></li>
                          <!--  -->
                        </ul>
                      </div></td>
                       
                     
                      <th><a href="{{ url('admin/teachersprint') }}" class="btn btn-success"><i class="fas fa-print"></i></a></th>
                       <td><a href="{{ url('admin/teacherdelete/'.$mmy_teacher->ref_no) }}"
                        class='btn btn-danger'>
                         <i class="far fa-trash-alt"></i>
                     </a></td>
                        
                     <td>{{ $mmy_teacher->created_at->format('D d, M Y, H:i')}}</td>

                      </tr>
                     
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Lastname</th>
                      <th>First Name</th>
                      <th>Images</th>
  
                      <th>Phone</th>
                      <th>Schoolname</th>
                      <th>Classname</th>
                      <th>Section</th>
                      <th>Term</th>
  
                      <th>Email</th>
  
                     
                      <th>Status</th>
                      <th>Action</th>
                     
                      <th>Print</th>
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
 @include('dashboard.teacher.footer')