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
                    <th>Students</th>
                    <th>Center Number</th>
                    <th>Check Result</th>


                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($view_schols as $view_schol)
                      {{-- @if ($view_schol->status == null) --}}
                      <tr>
                        <td><a href="{{ url('admin/viewschools/'.$view_schol->ref_no1) }}" target="_blank" rel="noopener noreferrer">{{ $view_schol->schoolname }}</a></td>

                        <td>{{ $view_schol->address }}</td>
                       
                        <td><a href="{{ url('admin/viewschoolsclassesbyadminstudent/'.$view_schol->ref_no1) }}"
                          class='btn btn-primary'>
                           <i class="far fa-eye">Check Students</i>
                       </a> <br>
                       <small>{{ $view_schol->lga }}</small>
                      </td>
                        <td>{{ $view_schol->centernumber }}</td>
                        
                        <td><a href="{{ url('admin/viewschoolsclassesbyadmin/'.$view_schol->ref_no1) }}"
                            class='btn btn-info'>
                             <i class="far fa-eye">Check Results</i>
                         </a></td>
                         
                        

                      </tr>
                      {{-- @else
                        
                      @endif --}}
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Schoolname</th>
                        <th>Address</th>
                        <th>Students</th>
                        <th>Center Number</th>
                        <th>Check Result</th>
                       
    
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
