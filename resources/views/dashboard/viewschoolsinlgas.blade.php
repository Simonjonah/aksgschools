@include('dashboard.header')
  <!-- Main Sidebar Container -->
  @include('dashboard.sidebar')

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
                    <th>Principal/HM/HS</th>
                    <th>Teachers</th>

                    <th>Students</th>
                    <th>Results</th>
                    <th>LGA</th>
                    
                    <th>Center NO</th>
                    <th>Plan</th>
                    <th>Logo</th>
                    <th>View</th>
                    <th>Edit</th>
                    
                    <th>Approved</th>
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

                    @foreach ($view_schools as $view_school)
                      <tr>
                        <td>{{ $view_school->schoolname }}</td>
                        <td><a href="{{ url('admin/schoolsprinteachers/'.$view_school->slug) }}" target="_blank" rel="noopener noreferrer">{{ $view_school->schoolname }} @if ($view_school->schooltype == 'SSUB')
                          Principal
                        @else
                        HM/HS
                        @endif </a></td>
                        
                      <td><a href="{{ url('admin/schoolsteachers/'.$view_school->slug) }}" target="_blank" rel="noopener noreferrer">{{ $view_school->schoolname }} Teachers</a></td>
                      {{-- <td><a href="{{ url('admin/schoolsstudents/'.$view_school->slug) }}" target="_blank" rel="noopener noreferrer">{{ $view_school->schoolname }} Student</a></td>
                        <td><a href="{{ url('admin/schoolsresults/'.$view_school->slug) }}" target="_blank" rel="noopener noreferrer">{{ $view_school->schoolname }} Results</a></td>
                           --}}

                           <td><a href="{{ url('admin/schoolsstudentsclassbyboard/'.$view_school->slug) }}">{{ $view_school->schoolname }} Student</a></td>
                           <td><a href="{{ url('admin/schoolsresultsclassbyboard/'.$view_school->slug) }}">{{ $view_school->schoolname }} Results</a></td>
                        
                        
                        

                       <td>{{ $view_school->lga }}</td>
                        <td>{{ $view_school->centernumber }}
                        <a href="{{ url('admin/editcenternumber/'.$view_school->ref_no1) }}"
                          class='btn btn-info'>
                           <i class="far fa-edit"></i>
                       </a>
                        </td>
                        <td>{{ $view_school->schooltype }}</td>
                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_school->logo")}}" alt=""></td>
                        <td><a href="{{ url('admin/viewschool/'.$view_school->ref_no1) }}"
                          class='btn btn-default'>
                           <i class="far fa-eye"></i>
                       </a></td>
                       <td><a href="{{ url('admin/editschool/'.$view_school->ref_no1) }}"
                        class='btn btn-info'>
                         <i class="far fa-edit"></i>
                     </a></td>

                     <td><a href="{{ url('admin/approvedschool/'.$view_school->ref_no1) }}"
                      class='btn btn-info'>
                       <i class="far fa-user"></i>
                   </a></td>
                     {{-- <td> <div class="input-group-prepend">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                          Action
                        </button>
                        <ul class="dropdown-menu">
                          <li class="dropdown-item"><a href="{{ url('admin/'.$view_school->ref_no) }}">Edit</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/'.$view_school->ref_no) }}">View</a></li>
                          
                        </ul>
                      </div></td> --}}
                

                   <td><a href="{{ url('admin/schoolelete/'.$view_school->ref_no1) }}"
                      class='btn btn-danger'>
                      <i class="far fa-trash-alt"></i>
                     
                   </a></td>
                       
                        
                     <td>{{ $view_school->created_at->format('D d, M Y, H:i')}}</td>

                      </tr>
                    
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Schoolname</th>
                    <th>Principal/HM/HS</th>
                    <th>Teachers</th>

                    <th>Students</th>
                    <th>Results</th>
                    <th>LGA</th>
                    
                    <th>Center NO</th>
                    <th>Plan</th>
                    <th>Logo</th>
                    <th>View</th>
                    <th>Edit</th>
                    
                    <th>Approved</th>
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
 @include('dashboard.footer')