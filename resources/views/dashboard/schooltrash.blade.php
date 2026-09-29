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
                    <th>School Name</th>
                    <th>Lga</th>
                    <th>Adress</th>
                    <th>Schooltype</th>
                    
                    <th>Logo</th>
                    <th>Restore</th>
                    
                    <th>Delete</th>

                    
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
                    @foreach ($trash_schools as $trash_school)
                        <tr>
                          <td>{{ $trash_school->schoolname }}</td>
                          <td>{{ $trash_school->lga }}</td>
                          <td>{{ $trash_school->address }} </td>
                          <td> {{ $trash_school->schooltype }}</td>
                          
                         
                          <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$trash_school->logo")}}" alt=""></td>
                         
                      
                      <td><a href="{{ url('admin/restoreschool/'.$trash_school->id) }}"
                        class='btn btn-success'>
                         Restore 
                     </a></td>


                       <td><a href="{{ url('admin/deleteschoolforcefully/'.$trash_school->ref_no1) }}"
                        class='btn btn-danger'>
                         Delete Permanently
                     </a></td>
                    </tr>
                    
                  @endforeach
                      
                
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>School Name</th>
                    <th>Lga</th>
                    <th>Adress</th>
                    <th>Schooltype</th>
                    
                    <th>Logo</th>
                    <th>Restore</th>
                    
                    <th>Delete</th>
                     
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
