@include('dashboard.teacher.header')

@include('dashboard.teacher.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Domains</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Domains</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if (Auth::guard('web')->user()->section == 'Primary')
        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Cognitive Domain</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('teacher/createdomain') }}" method="post">
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
                <div class="card-body">
                    @foreach ($view_yourdomains as $view_yourdomain)
                        @if ($view_yourdomain->psycomoto == 'Cognitive Domain' && $view_yourdomain->section == 'Primary')
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ $view_yourdomain->cogname }}</label>
                            <input type="text" name="cogname[]" value="{{ $view_yourdomain->cogname }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            <input type="hidden" name="psycomoto[]"  value="{{ $view_yourdomain->psycomoto }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            <input type="hidden" name="teacher_id[]"  value="{{ Auth::guard('web')->user()->id }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            <input type="hidden" name="ref_no1[]" value="{{ Auth::guard('web')->user()->ref_no1 }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        
                          </div>
                        @else
                            
                        @endif
                    @endforeach
                  
                
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->

           
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Psychomotor Domain</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              
                  <div class="row">
                    <div class="col-sm-12">
                        @foreach ($view_yourdomains as $view_yourdomain)
                        @if ($view_yourdomain->psycomoto == 'Psychomotor Domain' && $view_yourdomain->section == 'Primary')
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ $view_yourdomain->cogname }}</label>
                            <input type="text" name="cogname[]"  value="{{ $view_yourdomain->cogname }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            <input type="hidden" name="ref_no1[]" value="{{ Auth::guard('web')->user()->ref_no1 }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            <input type="hidden" name="psycomoto[]"  value="{{ $view_yourdomain->psycomoto }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            <input type="hidden" name="teacher_id[]"  value="{{ Auth::guard('web')->user()->id }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        
                        </div>
                        @else
                            
                        @endif
                    @endforeach
                  
                  </div>
                  
                <div class="card-footer">
                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                </div>
                
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @else



    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Cognitive Domain SSEB</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('teacher/createdomain') }}" method="post">
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
                <div class="card-body">
                    @foreach ($view_yourdomains as $view_yourdomain)
                        @if ($view_yourdomain->psycomoto == 'Cognitive Domain' && $view_yourdomain->section == 'Secondary')
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ $view_yourdomain->cogname }}</label>
                            <input type="text" name="cogname[]" value="{{ $view_yourdomain->cogname }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            <input type="hidden" name="psycomoto[]"  value="{{ $view_yourdomain->psycomoto }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            <input type="hidden" name="teacher_id[]"  value="{{ Auth::guard('web')->user()->id }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            <input type="hidden" name="ref_no1[]" value="{{ Auth::guard('web')->user()->ref_no1 }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        
                          </div>
                        @else
                            
                        @endif
                    @endforeach
                  
                
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->

           
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Psychomotor Domain SSEB</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              
                  <div class="row">
                    <!-- <div class="col-sm-12"> -->
                        @foreach ($view_yourdomains as $view_yourdomain)
                        @if ($view_yourdomain->psycomoto == 'Psychomotor Domain' && $view_yourdomain->section == 'Secondary')
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ $view_yourdomain->cogname }}</label>
                            <input type="text" name="cogname[]"  value="{{ $view_yourdomain->cogname }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            <input type="hidden" name="ref_no1[]" value="{{ Auth::guard('web')->user()->ref_no1 }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            <input type="hidden" name="psycomoto[]"  value="{{ $view_yourdomain->psycomoto }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            <input type="hidden" name="teacher_id[]"  value="{{ Auth::guard('web')->user()->id }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        
                        <!-- </div> -->
                        @else
                            
                        @endif
                    @endforeach
                  
                  </div>
                  
                <div class="card-footer">
                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                </div>
                
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>


    
    {{--<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Cognitive Domain For Junior SSEB</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('teacher/createdomain') }}" method="post">
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
                <div class="card-body">
                  
                    @foreach ($view_yourdomains as $view_yourdomain)
                        @if ($view_yourdomain->psycomoto == 'Cognitive Domain' && $view_yourdomain->section == 'Junior Secondary')
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ $view_yourdomain->cogname }}</label>
                            <input type="text" name="cogname[]" value="{{ $view_yourdomain->cogname }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            <input type="hidden" name="psycomoto[]"  value="{{ $view_yourdomain->psycomoto }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            <input type="hidden" name="teacher_id[]"  value="{{ Auth::guard('web')->user()->id }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            <input type="hidden" name="ref_no1[]" value="{{ Auth::guard('web')->user()->ref_no1 }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        
                          </div>
                        @else
                            
                        @endif
                    @endforeach
                  
                
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->

           
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Psychomotor Domain For Junior SSEB</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              
                  <div class="row">
                    <div class="col-sm-12">
                        @foreach ($view_yourdomains as $view_yourdomain)
                        @if ($view_yourdomain->psycomoto == 'Psychomotor Domain' && $view_yourdomain->section == 'Junior Secondary')
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ $view_yourdomain->cogname }}</label>
                            <input type="text" name="cogname[]"  value="{{ $view_yourdomain->cogname }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            <input type="hidden" name="ref_no1[]" value="{{ Auth::guard('web')->user()->ref_no1 }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            <input type="hidden" name="psycomoto[]"  value="{{ $view_yourdomain->psycomoto }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            <input type="hidden" name="teacher_id[]"  value="{{ Auth::guard('web')->user()->id }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        
                        </div>
                        @else
                            
                        @endif
                    @endforeach
                  
                  </div>
                  
                <div class="card-footer">
                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                </div>
                
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>--}}


    


    
    <!-- /.content -->      
    @endif
    
  </div>
  <!-- /.content-wrapper -->
  
  @include('dashboard.teacher.footer')