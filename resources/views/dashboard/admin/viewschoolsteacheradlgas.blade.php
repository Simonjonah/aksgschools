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
                    <th>Schoolname</th>
                    <th>Phone</th>
                    <th>Surname</th>
                    <th>First Name</th>
                    <th>Ref NO</th>
                    <th>Plan</th>
                    <th>Logo</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Action</th>
                   
                    <th>Delete</th>

                    <th>Date</th>

                  </tr>
                  </thead> 
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
                  <tbody>

                    @foreach ($view_principals as $view_principal)
                      <tr>
                        @if ($view_principal->school_id == null)
                          
                        @else
                      <td><a href="{{ url('admin/schoolstudent/'.$view_principal->slug) }}" target="_blank" rel="noopener noreferrer">{{ $view_principal->school['schoolname'] }}</a></td>
                          
                        @endif

                        <td>{{ $view_principal->phone }}</td>

                        <td>{{ $view_principal->surname }} {{ $view_principal->email }}
                        @if ($view_principal->status == null)
                          <span class="badge badge-secondary"> In progress</span>
                         @elseif($view_principal->status == 'suspend')
                         <span class="badge badge-warning"> Suspended</span>
                         @elseif($view_principal->status == 'transfer')
                         <span class="badge badge-info"> Transfered</span>
                         @elseif($view_principal->status == 'retired')
                         <span class="badge badge-danger"> Retired</span>
                         @elseif($view_principal->status == 'reject')
                         <span class="badge badge-warning"> Rejected</span>
                         @else
                         <span class="badge badge-success">Approved</span>
                         @endif
                        </td>
                        <td>{{ $view_principal->fname }}</td>
                        <td>{{ $view_principal->ref_no }}</td>
                        <td>{{ $view_principal->schooltype }}</td>
                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_principal->logo")}}" alt=""></td>
                        <td><a href="{{ url('admin/viewprinci/'.$view_principal->ref_no) }}"
                          class='btn btn-default'>
                           <i class="far fa-eye"></i>
                       </a></td>
                       <td><a href="{{ url('admin/editprinci/'.$view_principal->ref_no) }}"
                        class='btn btn-info'>
                         <i class="far fa-edit"></i>
                     </a></td>
                     <td> <div class="input-group-prepend">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                          Action
                        </button>
                        <ul class="dropdown-menu">
                          <li class="dropdown-item"><a href="{{ url('admin/princisaddmit/'.$view_principal->ref_no) }}">Approved</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/rejectprinci/'.$view_principal->ref_no) }}">Reject</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/suspendprinci/'.$view_principal->ref_no) }}">Suspend</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/tranfer/'.$view_principal->ref_no) }}">Transfer</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/retired/'.$view_principal->ref_no) }}">Retired</a></li>
                        </ul>
                      </div></td>
                

                   <td><a href="{{ url('admin/princidelete/'.$view_principal->ref_no) }}"
                      class='btn btn-danger'>
                      <i class="far fa-trash-alt"></i>
                     
                   </a></td>
                       
                        
                     <td>{{ $view_principal->created_at->format('D d, M Y, H:i')}}</td>

                      </tr>
                    
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                    <th>Schoolname</th>

                        <th>Phone</th>
                        <th>Surname</th>
                        <th>First Name</th>
                        <th>Ref NO</th>
                        <th>Plan</th>
                        <th>Logo</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Action</th>
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
  <!-- /.content-wrapper -->
  
   @include('dashboard.admin.footer')
