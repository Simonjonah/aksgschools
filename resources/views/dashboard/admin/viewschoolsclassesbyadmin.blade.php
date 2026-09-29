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

    @php
        use App\Models\Classname;
        $view_classes = Classname::all();
    @endphp

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">View {{ $view_alschool->lga }} LGA Schools {{ $view_alschool->schoolname }}</h3>
            </div>
          
            <div class="row">
                <div class="col-md-12">
                  <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        Outline Buttons
                      </h3>
                    </div>
                    <div class="card-body pad table-responsive">
                        <div class="row">
                          @if ($view_alschool->schooltype == 'SUBEB')
                          @foreach ($view_classes as $view_classe)
                          @if ($view_classe->section == 'Primary')
                          <div class="col-md-3">
                            <div class="card card-primary">
                              <div class="card-header">
                                <h3 class="card-title"><a href="{{ url('admin/viewresultbygenadmin/'.$view_alschool->slug) }}">{{ $view_classe->classname }}</a></h3>
                
                                <div class="card-tools">
                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                  </button>
                                </div>
                                <!-- /.card-tools -->
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                <a href="{{ url('admin/viewresultbygenadmin/'.$view_classe->classname .'/'.$view_alschool->slug) }}">View {{ $view_classe->classname }} </a> 
                              </div>
                            </div>
                          </div>

                          @else

                          @endif
                        

                          @endforeach
                          @else
                            

                          @foreach ($view_classes as $view_classe)
                          @if ($view_classe->section == 'Secondary' || $view_classe->section == 'Junior Secondary')
                          <div class="col-md-3">
                            <div class="card card-primary">
                              <div class="card-header">
                                <h3 class="card-title"><a href="{{ url('admin/viewresultbygenadmin/'.$view_alschool->slug) }}">{{ $view_classe->classname }}</a></h3>
                
                                <div class="card-tools">
                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                  </button>
                                </div>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                <a href="{{ url('admin/viewresultbygenadmin/'.$view_classe->classname .'/'.$view_alschool->slug) }}">View {{ $view_classe->classname }} </a> 
                              </div>
                            </div>
                          </div>

                          @else

                          @endif
                        

                          @endforeach
                          @endif

                          
                            



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