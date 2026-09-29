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
                    <th>Surname</th>
                    <th>Middlename</th>
                    <th>Lastname</th>
                    {{-- <th>Images</th> --}}
                    <th>View</th>
                    <th>Edit</th>
                    <th>Status</th>
                    <th>Reject</th>
                 
                    <th>Suspend</th>
                    <th>Approved</th>
                    {{-- <th>Print</th> --}}
                    <th>Delete</th>
                    <th>Date</th>

                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($view_lessonnotes as $view_lessonnote)
                      {{-- @if ($view_lessonnote->status = 'suspend') --}}
                      <tr>
                        <td>{{ $view_lessonnote->user['surname'] }}</td>
                        <td>{{ $view_lessonnote->user['middlename'] }}</td>
                        <td>{{ $view_lessonnote->user['fname'] }}</td>
                        {{-- <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_lessonnote->user['images']")}}" alt=""></td> --}}
                        <td><a href="{{ url('admin/viewsinglelesson/'.$view_lessonnote->slug) }}"
                            class='btn btn-default'>
                             <i class="far fa-eye"></i>
                         </a></td>
                         <td><a href="{{ url('admin/editsinglenotesad/'.$view_lessonnote->id) }}"
                          class='btn btn-info'>
                           <i class="far fa-edit"></i>
                       </a></td>
                       <td>@if ($view_lessonnote->status == null)
                        <span class="badge badge-secondary"> In progress</span>
                       @elseif($view_lessonnote->status == 'suspend')
                       <span class="badge badge-warning"> Suspended</span>
                       @elseif($view_lessonnote->status == 'reject')
                       <span class="badge badge-danger"> Rejected</span>
                       @elseif($view_lessonnote->status == 'approved')
                       <span class="badge badge-success">Approved</span>

                     
                       
                       @endif</td>
                  

                       <th><a href="{{ url('admin/rejectlessonnote/'.$view_lessonnote->slug) }}" class="btn btn-sm bg-teal">
                        <i class="fas fa-user"></i>
                      </a></th>
                      
                      </a></th><th><a href="{{ url('admin/suspendlessonnotes/'.$view_lessonnote->slug) }}" class="btn btn-sm bg-teal">
                        <i class="fas fa-comments"></i>
                      </a></th>

                      <th> <a href="{{ url('admin/lesonapprove/'.$view_lessonnote->slug) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-user"></i> 
                      </a></th>
                       <td><a href="{{ url('admin/deleteslessonnote/'.$view_lessonnote->slug) }}"
                        class='btn btn-danger'>
                         <i class="far fa-trash-alt"></i>
                     </a></td>
                        
                     <td>{{ $view_lessonnote->created_at->format('D d, M Y, H:i')}}</td>

                      </tr>
                      {{-- @else
                        
                      @endif --}}
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                    <th>Surname</th>
                    <th>Middlename</th>
                    <th>Lastname</th>
                    {{-- <th>Images</th> --}}
                    <th>View</th>
                    <th>Edit</th>
                    <th>Status</th>
                    <th>Reject</th>
                 
                    <th>Suspend</th>
                    <th>Approved</th>
                    {{-- <th>Print</th> --}}
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