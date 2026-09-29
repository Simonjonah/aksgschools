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
            <h1>Advertisements </h1>
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
                    <th>School Name</th>
                    <th>Title</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Images</th>
                    <th>Status</th>

                    <th>View</th>
                    <th>Status</th>
                    <th>Date</th>

                    
                  </tr>
                  </thead>
                  <tbody>
                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                    @endif
                  {{-- @method('PUT') --}}
                  @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif
  
                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                    @endif
                    @foreach ($view_myblogs as $view_myblog)
                    @if ($view_myblog->school_id == Auth::guard('web')->user()->school_id)

                        <tr>
                          <td>{{ $view_myblog->schoolname }}</td>
                          <td> {{ $view_myblog->title }}</td>

                          <td>{{ $view_myblog->email }}</td>
                          <td>{{ $view_myblog->phone }}</td>
                          <td> {{ $view_myblog->address }}</td>
                          <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_myblog->images")}}" alt=""></td>
                          <td>@if ($view_myblog->status == null)
                            <span class="badge badge-secondary">In Review</span>
                            @elseif ($view_myblog->status == 'reject')
                            <span class="badge badge-danger">Reject</span>
                            @elseif ($view_myblog->status == 'suspend')
                            <span class="badge badge-warning">Suspended</span>
                            @elseif ($view_myblog->status == 'approved')
                            <span class="badge badge-success">Approved</span>
    
                            @endif</td>
                          <td><a href="{{ url('admin/viewadverts/'.$view_myblog->slug1) }}"
                            class='btn btn-default'>
                             <i class="far fa-eye"></i>

                             <td> <div class="input-group-prepend">
                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                  Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item"><a href="{{ url('admin/editadvert/'.$view_myblog->ref_no1) }}">Edit</a></li>
                                    <li class="dropdown-item"><a href="{{ url('admin/approveadvert/'.$view_myblog->slug1) }}">Approved</a></li>
                                  <li class="dropdown-item"><a href="{{ url('admin/suspendadvert/'.$view_myblog->slug1) }}">Suspend</a></li>
                                  <li class="dropdown-item"><a href="{{ url('admin/rejectadvert/'.$view_myblog->slug1) }}">Reject</a></li>
                                  <li class="dropdown-item"><a href="{{ url('admin/deletesadvert/'.$view_myblog->ref_no1) }}">Delete</a></li>
                                 
                                </ul>
                              </div></td>
                              <td>{{ $view_myblog->created_at->format('D d, M Y, H:i')}}</td>
                      
                        </tr>

                      @else 
                   @endif
                  @endforeach
                      
                
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>School Name</th>
                        <th>Title</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Images</th>
                        <th>Status</th>
    
                        <th>View</th>
                        <th>Status</th>
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
