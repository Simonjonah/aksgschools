@include('dashboard.header')

  @include('dashboard.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">School </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
l            <ol class="breadcrumb float-sm-right">
              {{-- <li cass="breadcrumb-item"><a href="{{ route('admin.addnidnetsem2leve200l') }}" class="btn btn-success">Add Semester Courses</a></li> --}}
              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">School  </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
       
          <!-- right column -->
          <div class="col-md-12">
            
            <div class="card card-secondary">
              <div class="card-header">
                <!-- <h3 class="card-title">Register Child</h3> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ url('admin/updatescstudent/'.$view_schools->ref_no1) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
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
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label> School Name</label>
                        {{-- <input type="text" name="academic_session" value="{{ Auth::guard('web')->user()-> }}" id=""> --}}
                        <input type="hidden" name="user_id" value="{{ Auth::guard('web')->user()->id }}" id="">
                        <input type="hidden" name="schoolname" value="{{ Auth::guard('web')->user()->schoolname }}" id="">
                        <input type="hidden" name="ref_no" value="{{ Auth::guard('web')->user()->ref_no1 }}" id="">
                        <input type="hidden" name="address" value="{{ Auth::guard('web')->user()->address }}" id="">
                        {{-- <input type="text" name="logo" value="{{ Auth::guard('web')->user()->logo }}" id=""> --}}
                        {{-- <input type="text" name="email" value="{{ Auth::guard('web')->user()->email }}" id=""> --}}
                        <input type="text" value="{{ $view_schools->schoolname }}" class="form-control" name="schoolname" placeholder="fname">

                      </div>

                      
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>LGA</label>
                       <input type="text" value="{{ $view_schools->lga }}" required name="lga" class="form-control" placeholder="Middle Name">
                      </div>
                     
                    </div>
                 <div class="col-sm-6">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" value="{{ $view_schools->address }}" required name="address" class="form-control" placeholder="Surname">

                      </div>
                    </div>
                   <div class="col-sm-6">
                      <div class="form-group">
                        <label>Motto</label>
                        <input type="text" name="motor" value="{{ $view_schools->motor }}" required class="form-control" placeholder="Age">

                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Section</label>
                        <input type="text" name="schooltype" value="{{ $view_schools->schooltype }}" required class="form-control" placeholder="Date of Birth">

                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Ref no</label>
                        <select name="ref_no1" class="form-control" id="">
                          <option value="{{ $view_schools->ref_no1 }}">{{ $view_schools->ref_no1 }}</option>
                        </select>
                    
                      </div>
                    </div>

                   

                  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Section</label>
                        <select name="section" class="form-control" id="">
                          <option value="{{ $view_schools->section }}">{{ $view_schools->section }}</option>

                            @if (Auth::user()->schooltype == 'SUBEB')
                          <option value="Primary">Primary</option>
                                
                            @else
                          <option value="Secondary">Secondary</option>
                                
                            @endif
                        </select>
                    
                      </div>
                    </div>


                      

                      
                     
                      
                     
                      
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Logo </label>
                        <td><img style="width: 10%; height: 60px;" src="{{ URL::asset("/public/../$view_schools->logo")}}" alt=""></td>

                        <input type="file" name="images" @error('images')
                        @enderror  value="" class="form-control" >
                         
                        </div>
                        @error('images')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      

                      <div class="col-sm-6">
                        <div class="form-group">
                        <a href="{{ url('admin/viewschoolsinlgas/'.$view_schools->lga) }}" class="btn btn-primary">Back</a> 
                        <a href="{{ url('admin/schoolsteachers/'.$view_schools->slug) }}" class="btn btn-secondary">View Teachers</a> 
                        <a href="{{ url('admin/schoolsstudentsclassbyboard/'.$view_schools->slug) }}" class="btn btn-default">View Students/Pupils</a> 
                        <a href="{{ url('admin/schoolsprinteachers/'.$view_schools->slug) }}" class="btn btn-success">View HM/HS/Principals</a> 
                        <!-- <a href="{{ url('admin/schoolsresults/'.$view_schools->slug) }}" class="btn btn-info">View Results</a>  -->
                            <a href="{{ url('admin/schoolsresultsclassbyboard/'.$view_schools->slug) }}" class="btn btn-primary">View  School Results</a> 

                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                            Search For Students In School 
                        </button>
                        </div>
                      </div>
                     

                  </div>
                </form>
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
  </div>


    @include('dashboard.footer')


    <div class="modal fade" id="modal-success">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Search For Positions</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ url('admin/reachresultbyposition') }}" method="post">
            @csrf

            <div class="form-group">
                <select name="school_id" class="form-control" id="">
                    <option value="{{ $view_schools->id }}">{{ $view_schools->schoolname }}</option>
                </select>
            </div>

            {{-- <div class="form-group">
                <select name="classname" class="form-control" id="">
                  @if (Auth::guard('web')->user()->schooltype == 'SUBEB')
                  @foreach ($view_classes as $view_classe)
                    @if ($view_classe->section == 'Primary')
                    <option value="{{ $view_classe->classname }}">{{ $view_classe->classname }}</option>
                    @else
                      
                    @endif
                    @endforeach
                  @else

                  @foreach ($view_classes as $view_classe)
                    @if ($view_classe->section == 'Secondary' || $view_classe->section == 'Senior Secondary' || $view_classe->section == 'Junior Secondary')
                    <option value="{{ $view_classe->classname }}">{{ $view_classe->classname }}</option>
                      
                    @else
                      
                    @endif
                    @endforeach
                    
                  @endif
                    

                </select>
            </div> --}}
            

            <div class="form-group">
                <select name="academic_session" class="form-control" id="">
                    @foreach ($view_sessions as $view_session)
                        <option value="{{ $view_session->academic_session }}">{{ $view_session->academic_session }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <select name="term" class="form-control" id="">
                    <option value="First Term">First Term</option>
                    <option value="Second Term">Second Term</option>
                    <option value="Third Term">Third Term</option>
                </select>
            </div>

            <div class="form-group">
              <label for="">Section</label>
                <select name="section" class="form-control" id="">
                  @if (Auth::guard()->user('web')->schooltype == 'SUBEB')
                  <option value="Primary">Primary</option>
                  @else
]                  <option value="Secondary">Secondary</option>
                  <!-- <option value="Senior Secondary">Senior Secondary</option> -->
                  @endif
                </select>
            </div>

            @if (Auth::guard()->user('web')->schooltype == 'SSEB')
            <div class="form-group">
              <label for="">SubSection</label>
                <select name="subsection" class="form-control" id="">
                  <option value="Junior Secondary">Junior Secondary</option>
                  <option value="Senior Secondary">Senior Secondary</option>
                </select>
            </div>
              @else
            @endif
          
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

