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
                      <th> First name</th>
                      <th> Last name</th>
                      <th> Designation</th>
                      <th>Images</th>
                      <th>Messsages</th>
                      <th>View</th>
                      <th>Status</th>
                      <th>Edit</th>
                      <th>Approved</th>
                      <th>Suspend</th>
                      <th>Delete</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($view_testimonies as $view_testimonie)
                    <tr>
                        <td>{{ $view_testimonie->fname }}</td>
                        <td>{{ $view_testimonie->surname }}</td>
                        <td>{{ $view_testimonie->designation }}</td>
                       
                        <td><img style="width: 100%; height: 100px;" class="profile-user-img img-fluid"
                          src="{{ URL::asset("/public/../$view_testimonie->images")}}"
                          alt="User profile picture"></td>
                          {{-- <td>{!!  {{ Illuminate\Support\Str::limit($article->title, 20) }}!!}</td> --}}
                          <td>{{ Illuminate\Support\Str::limit($view_testimonie->message, 20) }}</td>

                        
                          <td><a href="{{ url('admin/testimonyview/'.$view_testimonie->id) }}"
                            class='btn btn-default'>
                             <i class="far fa-eye"></i>
                         </a></td>
                        
                        
                        <td>@if ($view_testimonie->status == null)
                          <span class="badge badge-secondary"> In progress</span>
                         @elseif($view_testimonie->status == 'suspend')
                         <span class="badge badge-warning"> Suspended</span>
                         @else
                         <span class="badge badge-success">Approved</span>
                         @endif</td>

                         <td><a href="{{ url('admin/testimonyedit/'.$view_testimonie->id) }}"
                          class='btn btn-info'>
                           <i class="far fa-edit"></i>
                       </a></td>
                       
                        <th> <a href="{{ url('admin/testimonyeapproved/'.$view_testimonie->id) }}" class="btn btn-sm btn-primary">
                          <i class="fas fa-user"></i> 
                        </a></th>

                        <th><a href="{{ url('admin/testimonyesuspend/'.$view_testimonie->id) }}" class="btn btn-sm bg-teal">
                          <i class="fas fa-comments"></i>
                        </a></th>
                        
                      
                         
                       <td><a href="{{ url('admin/testimonyedelete/'.$view_testimonie->id) }}"
                        class='btn btn-danger'>
                         <i class="far fa-trash-alt"></i>
                     </a></td>
                     <td>{{ $view_testimonie->created_at->format('D d, M Y, H:i')}}</td>
                     {{-- <td><a href="{{ url('admin/downloadcourse/'.$view_testimonie->id) }}" class="btn btn-success"><i class="fas fa-print"></i></a></td> --}}

                      </tr>
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                        <th> First name</th>
                        <th> Last name</th>
                        <th> Designation</th>
                        <th>Images</th>
                        <th>Messsages</th>
                        <th>View</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Approved</th>
                        <th>Suspend</th>
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
 @in_arrayclude('dashboard.admin.footer')