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
              <li class="breadcrumb-item active">DataTables </li>
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

                    <th>Schhol </th>
                    <th>Images</th>

                    <th>Phone</th>
                    {{-- <th>Centername</th> --}}
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
                    @foreach ($view_teachers as $view_teacher)
                      @if ($view_teacher->status = 'teacher' OR $view_teacher->status = 'approved' OR $view_teacher->status = 'suspend' OR $view_teacher->status = 'sacked' OR $view_teacher->status = 'queried')
                      <tr>
                        <td>{{ $view_teacher->surname }}</td>
                        <td>{{ $view_teacher->fname }}</td>
                        <td><a href="{{ url('admin/viewschoolstudent/'.$view_teacher->school['slug']) }}">{{ $view_teacher->school['schoolname'] }}</a></td>

                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_teacher->logo")}}" alt=""></td>
                        <td>{{ $view_teacher->phone }}</td>
                        {{-- <td>{{ $view_teacher->centername }}</td> --}}
                        <td>{{ $view_teacher->classname }}</td>
                        <td>{{ $view_teacher->section }}</td>
                        <td>{{ $view_teacher->term }}</td>
                        <td>{{ $view_teacher->email }}</td>

                       
                       <td>@if ($view_teacher->role == 'teacher')
                        <span class="badge badge-secondary">In Progress</span>
                        @elseif ($view_teacher->role == 'sacked')
                        <span class="badge badge-danger">Sacked</span>
                        @elseif ($view_teacher->role == 'suspend')
                        <span class="badge badge-warning">Suspended</span>
                          @else
                          <span class="badge badge-success">Employed</span>
                        @endif</td>

                       <td> <div class="input-group-prepend">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                          Action
                        </button>
                        <ul class="dropdown-menu">
                          <li class="dropdown-item"><a href="{{ url('admin/viewsingleteacher/'.$view_teacher->ref_no) }}">View</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/editteacher/'.$view_teacher->ref_no) }}">Edit</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/teacherapprove/'.$view_teacher->ref_no) }}">Approved</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/teachersuspend/'.$view_teacher->ref_no) }}">Suspend</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/teachersacked/'.$view_teacher->ref_no) }}">Sacked</a></li>
                          <!-- <li class="dropdown-item"><a href="{{ url('admin/teacherquery/'.$view_teacher->ref_no) }}">Query</a></li> -->
                          <li class="dropdown-item"><a href="{{ url('admin/teacherresults/'.$view_teacher->classname) }}">Results</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/teachertranster/'.$view_teacher->ref_no) }}">Transfer</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/teacheretired/'.$view_teacher->ref_no) }}">Retired</a></li>
                          {{-- <li class="dropdown-item"><a href="{{ url('admin/teacherstudents/'.$view_teacher->classname) }}">Students</a></li> --}}
                        </ul>
                      </div></td>
                       
                     
                      <th><a href="{{ url('admin/teachersprint') }}" class="btn btn-success"><i class="fas fa-print"></i></a></th>
                       <td><a href="{{ url('admin/teacherdelete/'.$view_teacher->ref_no) }}"
                        class='btn btn-danger'>
                         <i class="far fa-trash-alt"></i>
                     </a></td>
                        
                     <td>{{ $view_teacher->created_at->format('D d, M Y, H:i')}}</td>

                      </tr>
                      @else
                        
                      @endif
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Lastname</th>
                      <th>Middlename</th>
                      <th>First Name</th>
                      <th>Images</th>
  
                      <th>Phone</th>
                      {{-- <th>Centername</th> --}}
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
