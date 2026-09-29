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
                    <th>Images</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Status</th>
                    <th>Reject</th>
                 
                    <th>Suspend</th>
                    <th>Admit</th>
                    <th>Print</th>
                    <th>Delete</th>
                    <th>Date</th>

                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($suspend_students as $suspend_student)
                      @if ($suspend_student->status = 'suspend')
                      <tr>
                        <td>{{ $suspend_student->surname }}</td>
                        <td>{{ $suspend_student->middlename }}</td>
                        <td>{{ $suspend_student->fname }}</td>
                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$suspend_student->images")}}" alt=""></td>
                        <td><a href="{{ url('admin/viewstudents/'.$suspend_student->ref_no) }}"
                            class='btn btn-default'>
                             <i class="far fa-eye"></i>
                         </a></td>
                         <td><a href="{{ url('admin/editstudent/'.$suspend_student->ref_no) }}"
                          class='btn btn-info'>
                           <i class="far fa-edit"></i>
                       </a></td>
                       <td>@if ($suspend_student->status == null)
                        <span class="badge badge-secondary"> In progress</span>
                       @elseif($suspend_student->status = 'suspend')
                       <span class="badge badge-warning"> Suspended</span>
                       @elseif($suspend_student->status = 'reject')
                       <span class="badge badge-danger"> Rejected</span>
                       @elseif($suspend_student->status = 'approved')
                       <span class="badge badge-info"> Suspended</span>
                       @elseif($suspend_student->status = 'admitted')
                       
                       <span class="badge badge-success">Approved</span>
                       @endif</td>
                  

                       <th><a href="{{ url('admin/rejectstudent/'.$suspend_student->ref_no) }}" class="btn btn-sm bg-teal">
                        <i class="fas fa-user"></i>
                      </a></th>
                      
                      </a></th><th><a href="{{ url('admin/suspendstudent/'.$suspend_student->ref_no) }}" class="btn btn-sm bg-teal">
                        <i class="fas fa-comments"></i>
                      </a></th>

                      <th> <a href="{{ url('admin/studentsaddmit/'.$suspend_student->ref_no) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-user"></i> 
                      </a></th>
                      <th><a href="{{ url('admin/studentpdf/'.$suspend_student->ref_no) }}" class="btn btn-success"><i class="fas fa-print"></i></a></th>
                       <td><a href="{{ url('admin/deletestudent/'.$suspend_student->ref_no) }}"
                        class='btn btn-danger'>
                         <i class="far fa-trash-alt"></i>
                     </a></td>
                        
                     <td>{{ $suspend_student->created_at->format('D d, M Y, H:i')}}</td>

                      </tr>
                      @else
                        
                      @endif
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                    <th>Surname</th>
                    <th>Middlename</th>
                    <th>Lastname</th>
                    <th>Images</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Status</th>
                    <th>Reject</th>
                 
                    <th>Suspend</th>
                    <th>Admit</th>
                    <th>Print</th>
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