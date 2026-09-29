@include('dashboard.admin.header')

@include('dashboard.admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard v2</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Primary Results</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Classes</th>
                      <th>Status</th>
                      <th>Term</th>
                      <th>Session</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($view_pins as $view_pin)
                        @if ($view_pin->student['section'] == 'Primary' || $view_pin->student['section'] == 'Elementary' || $view_pin->student['section'] == 'Pre-School' || $view_pin->student['section'] == 'Nursery' || $view_pin->student['section'] == 'Creche' || $view_pin->student['section'] == 'Pre-school' || $view_pin->student['section'] == 'junior secondary' || $view_pin->student['section'] == 'Junior Secondary')
                        <tr>
                            <td><a href="{{ url('admin/viewschoolpins/'.$view_pin->user_id) }}">{{ $view_pin->schoolname }}</a></td>
                            <td>{{ $view_pin->classname }} <small><a href="{{ url('admin/viewresult/'.$view_pin->id) }}">{{ $view_pin->subjectname }}</a> </small></td>
                            @if ($view_pin->status == null)
                            <td><span class="badge badge-warning">Pending</span></td>
                            @else
                            <td><span class="badge badge-success">Approved</span>
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                                    Search Pins
                                  </button>
                            </td>
                                
                            @endif
                            <td>{{ $view_pin->term }} <small style="color: red">{{ $view_pin->pins }}</small></td>
                            <td>{{ $view_pin->academic_session }} <small style="color: blue">{{ $view_pin->surname }}, {{ $view_pin->fname }}</small></td>

                          </tr>
                        @else
                            
                        @endif
                    
                    @endforeach
                    
                   
                    
                  
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-6">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Secondary Results</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Item</th>
                      <th>Status</th>
                      <th>Popularity</th>
                    </tr>
                    </thead>
                    <tbody>
                
                        @foreach ($view_pins as $view_pin)
                        @if ($view_pin->student['section'] == 'High School' || $view_pin->student['section'] == 'Senior Secondary' || $view_pin->student['section'] == 'senior secondary' || $view_pin->student['section'] == 'Secondary' || $view_pin->student['section'] == 'High Schools' || $view_pin->student['section'] == 'Secondary School' ||$view_pin->section == 'Secondary')
                        <tr>
                          <td><a href="{{ url('admin/viewschoolpins/'.$view_pin->user_id) }}">{{ $view_pin->schoolname }}</a></td>
                          <td>{{ $view_pin->classname }} <small><a href="{{ url('admin/viewresult/'.$view_pin->id) }}">{{ $view_pin->subjectname }}</a> </small></td>
                          @if ($view_pin->status == null)
                          <td><span class="badge badge-warning">Pending</span></td>
                          @else
                          <td><span class="badge badge-success">Approved</span>
                              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                                  Search Pins
                                </button>
                          </td>
                              
                          @endif
                          <td>{{ $view_pin->term }} <small style="color: red">{{ $view_pin->pins }}</small></td>
                          <td>{{ $view_pin->academic_session }} <small style="color: blue">{{ $view_pin->surname }}, {{ $view_pin->fname }}</small></td>

                        </tr>
                        @else
                            
                        @endif
                    
                    @endforeach
                   
                    
                  
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

        
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->


  @include('dashboard.admin.footer')


  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Search Pins for School</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('admin/searchpins') }}" method="post">
                @csrf
                <div class="form-group">
                    <select name="schoolname" class="form-control" id="">
                        @foreach ($view_schoolsnames as $view_schoolsname)
                            <option value="{{ $view_schoolsname->schoolname }}">{{ $view_schoolsname->schoolname }}</option>
                        @endforeach
                    </select>
                  </div>
        
                  <div class="form-group">
                    <select name="academic_session" class="form-control" id="">
                        @foreach ($view_academcsessions as $view_academcsessions)
                            <option value="{{ $view_academcsessions->academic_session }}">{{ $view_academcsessions->academic_session }}</option>
                        @endforeach
                    </select>
                  </div>
        
                  <div class="form-group">
                    <select name="term" class="form-control" id="">
                        @foreach ($view_terms as $view_terms)
                            <option value="{{ $view_terms->term }}">{{ $view_terms->term }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
           
          
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Search </button>

        </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
