@include('dashboard.header')
@include('dashboard.sidebar')
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 <!-- Main content -->
 @if (Auth::guard('web')->user()->schooltype == 'SUBEB')
 <section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">My Assigned Subject</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                    <th>Subject</th>
                    <th>Topic</th>
                   
                    <th>Edit</th>
                    <th>Delete</th>
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
                  @endif

                @foreach ($view_classesbysc as $view_classesbys)
                  @if ($view_classesbys->section == 'Primary')
                  <tr>
                    <td>{{ $view_classesbys->classname }}</td>
                    <td>{{ $view_classesbys->section }}</td>
                   
                       
                 
                        <td><a href="{{ url('admin/editclas1/'.$view_classesbys->connect) }}"
                                class='btn btn-info'>
                                 <i class="far fa-edit"></i>
                                 <td><a href="{{ url('admin/deleteclass/'.$view_classesbys->connect) }}"
                                class='btn btn-danger'>
                                 <i class="far fa-trash-alt"></i></td>
                          
                      <td>{{ $view_classesbys->created_at->format('D d, M Y, H:i')}}</td>

                  </tr>
                  @else
                    
                  @endif
                 
                 
                @endforeach
             
             
               
              </tbody>
              <tfoot>
                <tr>
                    <th>Subject</th>
                    <th>Topic</th>
                   
                    <th>Edit</th>
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
 
 @else
 <section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">My Assigned Subject</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                    <th>Subject</th>
                    <th>Topic</th>
                   
                    <th>Edit</th>
                    <th>Delete</th>

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
                  @endif

                @foreach ($view_classesbysc as $view_classesbys)
                  @if ($view_classesbys->section == 'Secondary')
                  <tr>
                    <td>{{ $view_classesbys->classname }}</td>
                    <td>{{ $view_classesbys->section }}</td>
                   
                       
                 
                        <td><a href="{{ url('admin/editclas1/'.$view_classesbys->connect) }}"
                                class='btn btn-info'>
                                 <i class="far fa-edit"></i>

                                 <td><a href="{{ url('admin/deleteclass/'.$view_classesbys->connect) }}"
                                class='btn btn-danger'>
                                 <i class="far fa-trash-alt"></i></td>
                          
                      <td>{{ $view_classesbys->created_at->format('D d, M Y, H:i')}}</td>

                  </tr>
                  @else
                    
                  @endif
                 
                 
                @endforeach
             
             
               
              </tbody>
              <tfoot>
                <tr>
                    <th>Subject</th>
                    <th>Topic</th>
                   
                    <th>Edit</th>
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
 
 @endif
  
  
    
    
 </div>

    @include('dashboard.footer') 