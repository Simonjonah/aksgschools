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
                    @foreach ($trash_results as $trash_result)
                        <tr>
                          <td>{{ $trash_result->fname }}</td>
                          <td>{{ $trash_result->middlename }}</td>
                          <td>{{ $trash_result->surname }} <br>
                          {{ $trash_result->schoolname }}
                          </td>
                          <td> {{ $trash_result->section }}</td>
                          <td> {{ $trash_result->classname }}
                            <small> @if ($trash_result->status == null)
                            <span class="badge badge-secondary">In Review</span>
                            @elseif ($trash_result->status == 'reject')
                            <span class="badge badge-danger">Reject</span>
                            @elseif ($trash_result->status == 'suspend')
                            <span class="badge badge-warning">Suspended</span>
                            @elseif ($trash_result->status == 'approved')
                            <span class="badge badge-success">Admitted</span>
    
                            @endif</small>
                          </td>
                          <td> {{ $trash_result->term }}
                            <small>{{ $trash_result->lga }}</small>
                          </td>
                          <td> {{ $trash_result->gender }}</td>
                          <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$trash_result->images")}}" alt=""></td>
                         
                      
                      <td><a href="{{ url('admin/restoreresult/'.$trash_result->id) }}"
                        class='btn btn-success'>
                         Restore 
                     </a></td>


                       <td><a href="{{ url('admin/deleteresultfully/'.$trash_result->ref_no) }}"
                        class='btn btn-danger'>
                         Delete Permanently
                     </a></td>
                    </tr>
                    
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
                        <th>Restore</th>
                        
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
  @include('dashboard.footer')
