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

                    @foreach ($viewsecondaries as $viewsecondarie)
                      {{-- @if ($viewsecondarie->status == null) --}}
                      <tr>
                        <td>{{ $viewsecondarie->schoolname }}
                          
                        </td>

                        <td>{{ $viewsecondarie->address }}</td>
                        <td>{{ $viewsecondarie->lga }}
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                            Search For Schools  
                          </button>
                        </td>
                        <td>{{ $viewsecondarie->ref_no1 }}/{{ $viewsecondarie->schooltype }}/{{ $viewsecondarie->section }}</td>
                        <td>@if ($viewsecondarie->status == null)
                            <span class="badge badge-secondary"> In progress</span>
                           @elseif($viewsecondarie->status == 'suspend')
                           <span class="badge badge-warning"> Suspended</span>
                           @elseif($viewsecondarie->status == 'reject')
                           <span class="badge badge-danger"> Rejected</span>
                           @elseif($viewsecondarie->status == 'approved')
                           <span class="badge badge-info"> Approved</span>
                           @elseif($viewsecondarie->status == 'admitted')
                           
                           <span class="badge badge-success">Approved</span>
                           @endif</td>
                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$viewsecondarie->logo")}}" alt=""></td>
                        <td><a href="{{ url('admin/viewschools/'.$viewsecondarie->ref_no1) }}"
                            class='btn btn-default'>
                             <i class="far fa-eye"></i>
                         </a></td>
                         <td><a href="{{ url('admin/editschooladmin/'.$viewsecondarie->ref_no1) }}"
                          class='btn btn-info'>
                           <i class="far fa-edit"></i>
                       </a></td>

                       <td><a href="{{ url('admin/schoolsaddmit/'.$viewsecondarie->ref_no1) }}"
                        class='btn btn-info'>
                        Approved
                     </a></td>
                     <td><a href="{{ url('admin/rejectschool/'.$viewsecondarie->ref_no1) }}"
                        class='btn btn-danger'>
                        Reject                         
                     </a></td>

                     <td><a href="{{ url('admin/suspendschool/'.$viewsecondarie->ref_no1) }}"
                        class='btn btn-warning'>
                        Suspend                         
                     </a></td>

                     <td><a href="{{ url('admin/schooldelete/'.$viewsecondarie->ref_no1) }}"
                        class='btn btn-danger'>
                        <i class="far fa-trash-alt"></i>
                       
                     </a></td>
                   
                       
                        
                     <td>{{ $viewsecondarie->created_at->format('D d, M Y, H:i')}}</td>

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
  
<div class="modal fade" id="modal-success">
    <div class="modal-dialog">
      <div class="modal-content bg-default">
        <div class="modal-header">
          <h4 class="modal-title">Search for Students</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('admin/reachresultbystudentbyadmin') }}" method="post">
            @csrf
            <div class="form-group">
                <select name="slug" class="form-control" id="">
                  
                    @foreach ($viewsecondaries as $viewsecondarie)
                        <option value="{{ $viewsecondarie->slug }}">{{ $viewsecondarie->schoolname }}</option>
                    @endforeach

                </select>
            </div>

            

            <div class="form-group">
                <select name="lga" class="form-control" id="">
                  <option value="{{ $lgaModel->lga }}">{{ $lgaModel->lga }}</option>
                </select>
            </div>

           

            <div class="form-group">
                <select name="schooltype" class="form-control" id="">
                  <option value="SSEB">SSEB</option>
                </select>
            </div>
          
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
      </form>
        </div>

      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->