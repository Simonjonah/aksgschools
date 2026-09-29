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
                    <th>First name</th>
                    <th>Surname</th>
                    <th>section</th>
                    <th>Classname</th>
                    <th>schooltype</th>
                    <th>Alms</th>

                    <th>Images</th>
                    <th>Status</th>
                    <th>Action</th>
                   
                    <th>Delete</th>

                    
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
                    @foreach ($view_myteachers as $view_myteacher)
                      @if ($view_myteacher->school['id'] == Auth::guard('web')->user()->school_id)
                        <tr>
                          <td>{{ $view_myteacher->fname }}</td>
                          <td>{{ $view_myteacher->surname }}</td>
                          <td> {{ $view_myteacher->school['section'] }}</td>
                          <td> {{ $view_myteacher->classname }}</td>
                          <td> {{ $view_myteacher->school['schooltype'] }}
                            <small>{{ $view_myteacher->school['schoolname'] }}</small>
                          </td>
                          <td> {{ $view_myteacher->alms }}</td>

                          <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_myteacher->logo")}}" alt=""></td>
                          {{-- <td> <span class="badge badge-success">{{ $view_myteacher->status }}</span></td> --}}
                          <td>@if ($view_myteacher->status == null)
                            <span class="badge badge-secondary"> In progress</span>
                          @elseif($view_myteacher->status == 'suspend')
                          <span class="badge badge-warning"> Suspended</span>
                          @elseif($view_myteacher->status == 'reject')
                          <span class="badge badge-danger"> Rejected</span>
                          @elseif($view_myteacher->status == 'approved')
                          <span class="badge badge-info"> Approved</span>
                          @elseif($view_myteacher->status == 'admitted')
                          
                          <span class="badge badge-success">Admitted</span>
                          @endif</td>
                          <td><button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                            Action
                          </button>
                          <ul class="dropdown-menu">
                            <!-- <li class="dropdown-item"><a href="{{ url('admin/edittteachertr/'.$view_myteacher->ref_no) }}">Edit</a></li> -->
                            <li class="dropdown-item"><a href="{{ url('admin/approveteacherbytr/'.$view_myteacher->ref_no) }}">Approved</a></li>
                            <li class="dropdown-item"><a href="{{ url('admin/viewtteachertr/'.$view_myteacher->ref_no) }}">View</a></li>
                          </ul>
                        </div></td>
                    <td>{{ $view_myteacher->created_at->format('D d, M Y, H:i')}}</td>
                      
                        </tr>
                      @else
                    @endif 
                  @endforeach
                      
                
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>First name</th>
                        <th>Surname</th>
                        <th>section</th>
                        <th>Classname</th>
                        <th>schooltype</th>
                        <th>Alms</th>
    
                        <th>Images</th>
                        <th>Status</th>
                        <th>Action</th>
                      
                        <th>Delete</th>
    
                        
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