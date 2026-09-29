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
                      <th>First Name</th>
                      <th>Surname</th>
                      <th>Section</th>
                      <th>Roles</th>
                      <td>Images</td>
                      <th>Give Role</th>
                      <th>Delete</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($view_roles as $view_role)
                    <tr>
                        <td>{{ $view_role->fname }}</td>
                        <td>{{ $view_role->surname }}</td>
                        <td>{{ $view_role->section }}</td>
                        <td>{{ $view_role->role }} <br>
                         <small>{{ $view_role->promotion }}</small>
                        </td>
                       
                        
                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_role->images")}}" alt=""></td>
                        
                       
                    
                         <td><a href="{{ url('admin/addrole/'.$view_role->ref_no) }}"
                          class='btn btn-info'>
                           <i class="far fa-edit"></i>
                       </a></td>
                       
                      
                        
                      
                         
                       <td><a href="{{ url('admin/eventedelete/'.$view_role->id) }}"
                        class='btn btn-danger'>
                         <i class="far fa-trash-alt"></i>
                     </a></td>
                     <td>{{ $view_role->created_at->format('D d, M Y, H:i')}}</td>

                      </tr>
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>First Name</th>
                      <th>Surname</th>
                      <th>Section</th>
                      <th>Roles</th>
                      <td>Images</td>
                      <th>Give Role</th>
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
