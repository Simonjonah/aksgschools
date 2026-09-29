@include('dashboard.admin.header')

  @include('dashboard.admin.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- Main content -->
    <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Analysis of {{ $viewanalisis->school['schoolname'] }} {{ $viewanalisis->school['address'] }} in {{ $viewanalisis->lga }} Akwa ibom State</h3>
            </div>
          
            <div class="row">
                <div class="col-md-12">
                  <div class="card card-success card-outline">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        Analysis of {{ $viewanalisis->school['schoolname'] }} {{ $viewanalisis->school['address'] }} in <span style="color: green; font-weight: bold">{{ $viewanalisis->lga }} </span>Akwa ibom State
                      </h3>
                    </div>
                    <div class="card-body pad table-responsive">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card card-success">
                                  <div class="card-header">
                                    <h3 class="card-title"><a href=""></a></h3>
                    
                                    <div class="card-tools">
                                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                      </button>
                                    </div>
                                    <!-- /.card-tools -->
                                  </div>
                                  <!-- /.card-header -->
                                  <div class="card-body">
                                    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-primary">
                                        View Each Class
                                      </button>
                                    </td>
                                  </div>
                                </div>
                              </div>



                              <div class="col-md-3">
                                <div class="card card-success">
                                  <div class="card-header">
                                    <h3 class="card-title"><a href=""></a></h3>
                    
                                    <div class="card-tools">
                                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                      </button>
                                    </div>
                                    <!-- /.card-tools -->
                                  </div>
                                  <!-- /.card-header -->
                                  <div class="card-body">
                                    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                                        View Entire School
                                      </button>
                                    </td>
                                    
                                  </div>
                                </div>
                              </div>


                              <div class="col-md-3">
                                <div class="card card-success">
                                  <div class="card-header">
                                    <h3 class="card-title"><a href=""></a></h3>
                    
                                    <div class="card-tools">
                                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                      </button>
                                    </div>
                                    <!-- /.card-tools -->
                                  </div>
                                  <!-- /.card-header -->
                                  <div class="card-body">
                                    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                                       Total Number of Students <b>{{ $studentcount }}</b>
                                      </button>
                                    </td>
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="card card-success">
                                  <div class="card-header">
                                    <h3 class="card-title"><a href=""></a></h3>
                    
                                    <div class="card-tools">
                                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                      </button>
                                    </div>
                                    <!-- /.card-tools -->
                                  </div>
                                  <!-- /.card-header -->
                                  <div class="card-body">
                                    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                                        Total Number of Teachers <b>{{ $teachercount }}</b>
                                      </button>
                                    </td>
                                    
                                  </div>
                                </div>
                              </div>
                        </div>
                    <!-- /.card -->
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- ./row -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  </div>
  @include('dashboard.admin.footer')








  

<div class="modal fade" id="modal-success">
    <div class="modal-dialog">
      <div class="modal-content bg-success">
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
                        <option value="{{ $viewanalisis->slug }}">{{ $viewanalisis->school['schoolname'] }}</option>
                </select>
            </div>

            

            <div class="form-group">
                <select name="lga" class="form-control" id="">
                    <option value="{{ $viewanalisis->lga }}">{{ $viewanalisis->lga }}</option>
                </select>
            </div>

           

            <div class="form-group">
                <select name="section" class="form-control" id="">
                  @if($viewanalisis->section == 'Primary')
                  <option value="Primary">Primary</option>
                  @else
                  <option value="Secondary">Secondary</option>
                  @endif
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


  


  
<div class="modal fade" id="modal-primary">
    <div class="modal-dialog">
      <div class="modal-content bg-primary">
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
                        <option value="{{ $viewanalisis->slug }}">{{ $viewanalisis->school['schoolname'] }}</option>
                </select>
            </div>

            

            <div class="form-group">
                <select name="lga" class="form-control" id="">
                    <option value="{{ $viewanalisis->lga }}">{{ $viewanalisis->lga }}</option>
                </select>
            </div>

           

            <div class="form-group">
                <select name="section" class="form-control" id="">
                  @if($viewanalisis->section == 'Primary')
                  <option value="Primary">Primary</option>
                  @else
                  <option value="Secondary">Secondary</option>
                  @endif
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


  