@include('dashboard.admin.header')
  <!-- /.navbar -->

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
                      <th>Name</th>
                      <th>Surname </th>
                      <th>Schooltype</th>
                      <th>Email</th>
                      <th>Ref_no</th>
                      <th>Status</th>
                      <th>Add Board Member</th>
                      <th>Add Schools Head</th>
                     
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
                    @foreach ($view_boards as $view_board)
                    <tr>
                        <td>{{ $view_board->fname }}</td>
                        <td>{{ $view_board->surname }}</td>
                        <td>{{ $view_board->schooltype }}</td>
                        <td>{{ $view_board->email }} {{ $view_board->phone }}</td>
                        <td>{{ $view_board->ref_no1 }}</td>
                        
                        <td>@if ($view_board->status == null)
                          <span class="badge badge-secondary"> In progress</span>
                         @elseif($view_board->status == 'suspend')
                         <span class="badge badge-warning"> Suspended</span>
                         @else
                         <span class="badge badge-success">Approved</span>
                         @endif</td>


                         <td>  @if ($view_board->schooltype == 'SUBEB')
                          <a class="btn btn-success" href="{{ url('admin/addboardmemebers/'.$view_board->ref_no1) }}" target="_blank">Add SUBEB Board Members</a>
                          @else
                          <a class="btn btn-success" href="{{ url('admin/addboardmemebers/'.$view_board->ref_no1) }}" target="_blank">Add SSEB Board Members</a>
                          @endif
                        </td>


                        <td>  @if ($view_board->schooltype == 'SUBEB')
                          <a href="{{ url('/schoolsheads/'.$view_board->ref_no1) }}" target="_blank">{{ url('/schoolsheads/'.$view_board->ref_no1) }}</a>
                          @else
                          <a href="{{ url('/schoolsprincipals/'.$view_board->ref_no1) }}" target="_blank">{{ url('/schoolsprincipals/'.$view_board->ref_no1) }}</a>
                          @endif
                        </td>
                       
                        
                          
                        

                        

                     <td>{{ $view_board->created_at->format('D d, M Y, H:i')}}</td>
                     {{-- <td><a href="{{ url('admin/downloadcourse/'.$view_board->id) }}" class="btn btn-success"><i class="fas fa-print"></i></a></td> --}}

                      </tr>
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                  <tr>
                      <th>Name</th>
                      <th>Surname </th>
                      <th>Schooltype</th>
                      <th>Email</th>
                      <th>Ref_no</th>
                      <th>Status</th>
                      <th>Add Board Member</th>
                      <th>Add Schools Head</th>
                     
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
