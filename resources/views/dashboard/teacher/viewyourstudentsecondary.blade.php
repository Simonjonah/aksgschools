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
                    <th>First name</th>
                    <th>Middlename</th>
                    <th>Surname</th>
                    <th>section</th>
                    <th>Classname</th>
                    <th>Term</th>
                    <th>Gender</th>

                    <th>Images</th>
                    {{-- <th>Status</th> --}}
                    <th>Action</th>
                    <th>Add Results</th>
                    <th>Delete</th>

                    
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($view_secondarystudents as $view_secondarystudent)
                      {{-- @if ($view_secondarystudent->section == Auth::guard('web')->user()->section &&  $view_secondarystudent->term == Auth::guard('web')->user()->term && $view_secondarystudent->classname == Auth::guard('web')->user()->classname && $view_secondarystudent->role == Auth::guard('web')->user()->role = null) --}}
                        <tr>
                          <td>{{ $view_secondarystudent->fname }}</td>
                          <td>{{ $view_secondarystudent->middlename }}</td>
                          <td>{{ $view_secondarystudent->surname }}</td>
                          <td> {{ $view_secondarystudent->section }}</td>
                          <td> {{ $view_secondarystudent->classname }}</td>
                          <td> {{ $view_secondarystudent->term }}</td>
                          <td> {{ $view_secondarystudent->gender }}</td>
                          <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_secondarystudent->images")}}" alt=""></td>
                          {{-- <td> <span class="badge badge-success">{{ $view_secondarystudent->status }}</span></td> --}}
                          
                          <td><a href="{{ url('web/editstudentsc/'.$view_secondarystudent->ref_no1) }}"
                            class='btn btn-default'>
                             <i class="far fa-edit"></i>
                      
                        

                        <td><a href="{{ url('web/addresults/'.$view_secondarystudent->ref_no1) }}"
                          class='btn btn-info'>
                           Add Results
                       </a></td>

                       <td><a href="{{ url('web/deletestudentsc/'.$view_secondarystudent->ref_no1) }}"
                        class='btn btn-danger'>
                         Delete
                     </a></td>
                    </tr>
                    {{-- @else
                    @endif --}}
                  @endforeach
                      
                
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>First name</th>
                        <th>Middlename</th>
                        <th>Surname</th>
                        <th>section</th>
                        <th>Classname</th>
                        <th>Term</th>
                        <th>Gender</th>
    
                        <th>Images</th>
                        {{-- <th>Status</th> --}}
                        <th>Action</th>
                        <th>Add Results</th>
                        <th>Delete</th>
    
                        
                      </tr>
                      
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
  @include('dashboard.footer')