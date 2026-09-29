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
                    <th>Lastname</th>
                    <th>First Name</th>

                    <th>School </th>
                    <th>Images</th>

                    <th>View Student</th>
                    {{-- <th>Centername</th> --}}
                    <th>Classname</th>
                    <th>Section</th>
                    <th>Term</th>

                    {{-- <th>Email</th> --}}

                   
                    <th>Status</th>
                    <th>Action</th>
                   
                  
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                    @csrf
                    @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif
  
                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                    @endif
                    @foreach ($views_students as $views_student)
                      {{-- @if ($views_student->status = 'teacher' OR $views_student->status = 'approved' OR $views_student->status = 'suspend' OR $views_student->status = 'sacked' OR $views_student->status = 'queried') --}}
                      <tr>
                        <td>{{ $views_student->surname }}</td>
                        <td>{{ $views_student->fname }}</td>
                        <td><a href="{{ url('admin/viewschoolstudent/'.$views_student->schoolname) }}">{{ $views_student->schoolname }}</a></td>

                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$views_student->images")}}" alt=""></td>
                        <td> <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                            View Students of this {{ $views_student->classname }} Class
                          </button></td>
                        {{-- <td>{{ $views_student->centername }}</td> --}}
                        <td>{{ $views_student->classname }}</td>
                        <td>{{ $views_student->section }}</td>
                        <td>{{ $views_student->term }}</td>
                        {{-- <td>{{ $views_student->email }}</td> --}}

                       
                       <td>@if ($views_student->role == 'teacher')
                        <span class="badge badge-secondary">In Progress</span>
                        @elseif ($views_student->role == 'sacked')
                        <span class="badge badge-danger">Sacked</span>
                        @elseif ($views_student->role == 'suspend')
                        <span class="badge badge-warning">Suspended</span>
                          @else
                          <span class="badge badge-success">Employed</span>
                        @endif</td>

                       <td> <div class="input-group-prepend">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                          Action
                        </button>
                        <ul class="dropdown-menu">
                         
                          <li class="dropdown-item"><a href="{{ url('admin/editstudent/'.$views_student->ref_no1) }}">Edit</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/viewstudent/'.$views_student->ref_no1) }}">View</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/studentpdf/'.$views_student->ref_no1) }}">Print</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/teacherdelete/'.$views_student->ref_no1) }}">Delete</a></li>
                        </ul>
                      </div></td>
                       

                
                        
                     <td>{{ $views_student->created_at->format('D d, M Y, H:i')}}</td>

                      </tr>
                      {{-- @else
                        
                      @endif --}}
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Lastname</th>
                        <th>First Name</th>
    
                        <th>School </th>
                        <th>Images</th>
    
                        <th>View Student</th>
                        <th>Classname</th>
                        <th>Section</th>
                        <th>Term</th>    
                       
                        <th>Status</th>
                        <th>Action</th>
                       
                      
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
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">View Students/Pupils</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- <p>One fine body&hellip;</p> --}}
          <form action="{{ url('admin/searchclass') }}" method="post">
            @csrf
            <div class="form-group">
                <select name="classname" class="form-control" id="">
                    @foreach ($views_students as $views_student)
                        <option value="{{ $views_student->classname }}">{{ $views_student->classname }}</option>
                        
                    @endforeach
                </select>
            </div>

           <div class="form-group">
            <select name="schoolname" class="form-control" id="">
                @foreach ($views_students as $views_student)
                    <option value="{{ $views_student->schoolname }}">{{ $views_student->schoolname }}</option>
                    
                @endforeach
            </select>
           </div>
          
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">View</button>
        </div>

    </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->