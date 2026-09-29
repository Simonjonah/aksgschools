
  <!-- /.navbar -->
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
                        <th>Team ID</th>

                        <th>First name</th>
                        <th>Last name</th>
                        <th>Photo</th>
                        <th>Designation</th>
                        <th>Facebook</th>
                        <th>Twitter</th>
                        <th>Linked In</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Approved</th>
                        <th>Suspend</th>
                        <th>Sacked</th>

                        <th>Delete</th>
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
                    </div>
                @endif
                    @foreach ($view_teams as $view_team)

                    <tr>
                        <td>{{ $view_team->ref_no }}</td>
                        <td>{{ $view_team->fname }}</td>
                        <td>{{ $view_team->lname }}</td>
                        <td><img style="width: 100%; height: 100px;" class="profile-user-img img-fluid"
                            src="{{ URL::asset("/public/../$view_team->images")}}"
                            alt="User profile picture"></td>
                            <td>{{ $view_team->designation }}</td>
                        <td><a href="{{ $view_team->facebook }}" target="_blank" rel="noopener noreferrer">Facebook</a></td>
                        <td><a href="{{ $view_team->twitter }}" target="_blank" rel="noopener noreferrer">Twitter</a></td>
                        <td><a href="{{ $view_team->linkedin }}" target="_blank" rel="noopener noreferrer">LinkedIn</a></td>


                        <td>{!! $view_team->messages !!}</td>
                      
                       
                        
                        
                        <td>@if ($view_team->status == null)
                          <span class="badge badge-secondary"> In progress</span>
                         @elseif($view_team->status == 'suspend')
                         <span class="badge badge-warning"> Suspended</span>
                         @elseif($view_team->status == 'sacked')
                         <span class="badge badge-danger"> Sacked</span>
                         @else
                         <span class="badge badge-success">Approved</span>
                         @endif</td>

                         
                       <td><a href="{{ url('admin/viewsingteam/'.$view_team->ref_no) }}"
                            class='btn btn-default'>
                             <i class="far fa-eye"></i>
                         </a></td>
                        <td><a href="{{ url('admin/editteam/'.$view_team->ref_no) }}"
                         class='btn btn-info'>
                          <i class="far fa-edit"></i>
                      </a></td>
                        <th> <a href="{{ url('admin/teamapproved/'.$view_team->ref_no) }}" class="btn btn-sm btn-primary">
                          <i class="fas fa-user"></i> 
                        </a></th>

                        <th><a href="{{ url('admin/teamsuspend/'.$view_team->ref_no) }}" class="btn btn-sm bg-teal">
                            <i class="fas fa-comments"></i>
                          </a></th>
                          <th><a href="{{ url('admin/teamsacked/'.$view_team->ref_no) }}" class="btn btn-sm bg-teal">Sacked
                            <i class="fas fa-comments"></i>
                          </a></th>
                      
                         
                       <td><a href="{{ url('admin/staffdelete/'.$view_team->id) }}"
                        class='btn btn-danger'>
                         <i class="far fa-trash-alt"></i>
                     </a></td>
                     <td>{{ $view_team->created_at->format('D d, M Y, H:i')}}</td>
                     {{-- <td><a href="{{ url('admin/downloadcourse/'.$view_team->id) }}" class="btn btn-success"><i class="fas fa-print"></i></a></td> --}}

                      </tr>
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Team ID</th>

                        <th>First name</th>
                        <th>Last name</th>
                        <th>Photo</th>
                        <th>Designation</th>
                        <th>Facebook</th>
                        <th>Twitter</th>
                        <th>Linked In</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Approved</th>
                        <th>Suspend</th>
                        <th>Sacked</th>
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