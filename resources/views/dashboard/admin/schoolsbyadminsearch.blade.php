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
                    <th>Address</th>
                    <th>LGA</th>
                    <th>Center Number</th>
                    <th>Status</th>
                    <th>Logo</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Approved</th>
                    <th>Reject</th>
                    <th>Suspend</th>
                    <th>Delete</th>

                    <th>Date</th>

                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($viewprimaries as $viewprimarie)
                      {{-- @if ($viewprimarie->status == null) --}}
                      <tr>
                        <td>{{ $viewprimarie->schoolname }}
                          
                        </td>

                        <td>{{ $viewprimarie->address }}</td>
                        <td>{{ $viewprimarie->lga }}</td>
                        <td>{{ $viewprimarie->ref_no1 }}/{{ $viewprimarie->schooltype }}/{{ $viewprimarie->section }}</td>
                        <td>@if ($viewprimarie->status == null)
                            <span class="badge badge-secondary"> In progress</span>
                           @elseif($viewprimarie->status == 'suspend')
                           <span class="badge badge-warning"> Suspended</span>
                           @elseif($viewprimarie->status == 'reject')
                           <span class="badge badge-danger"> Rejected</span>
                           @elseif($viewprimarie->status == 'approved')
                           <span class="badge badge-info"> Approved</span>
                           @elseif($viewprimarie->status == 'admitted')
                           
                           <span class="badge badge-success">Approved</span>
                           @endif</td>
                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$viewprimarie->logo")}}" alt=""></td>
                        <td><a href="{{ url('admin/viewschools/'.$viewprimarie->ref_no1) }}"
                            class='btn btn-default'>
                             <i class="far fa-eye"></i>
                         </a></td>
                         <td><a href="{{ url('admin/editschooladmin/'.$viewprimarie->ref_no1) }}"
                          class='btn btn-info'>
                           <i class="far fa-edit"></i>
                       </a></td>

                       <td><a href="#"
                        class='btn btn-info'>
                        Approved
                     </a></td>
                     <td><a href="#"
                        class='btn btn-danger'>
                        Reject                         
                     </a></td>

                     <td><a href="#"
                        class='btn btn-warning'>
                        Suspend                         
                     </a></td>

                     <td><a href="#"
                        class='btn btn-danger'>
                        <i class="far fa-trash-alt"></i>
                       
                     </a></td>
                   
                       
                        
                     <td>{{ $viewprimarie->created_at->format('D d, M Y, H:i')}}</td>

                      </tr>
                      {{-- @else
                        
                      @endif --}}
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Schoolname</th>
                        <th>Address</th>
                        <th>LGA</th>
                        <th>Center Number</th>
                        <th>Status</th>
                        <th>Logo</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Approved</th>
                        <th>Reject</th>
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
  <!-- /.content-wrapper -->
  @include('dashboard.admin.footer')
  