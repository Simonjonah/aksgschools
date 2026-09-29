@include('dashboard.admin.header')

  @include('dashboard.admin.sidebar')
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
                <form action="{{ url('admin/updatescstudent/'.$viewsingleschool->ref_no1) }}" method="post" enctype="multipart/form-data">
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
                  @endif
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label> School Name</label>
                        {{-- <input type="text" name="academic_session" value="{{ $viewsingleschool-> }}" id=""> --}}
                        <input type="hidden" name="user_id" value="{{ $viewsingleschool->id }}" id="">
                        <input type="hidden" name="schoolname" value="{{ $viewsingleschool->schoolname }}" id="">
                        <input type="hidden" name="ref_no" value="{{ $viewsingleschool->ref_no1 }}" id="">
                        <input type="hidden" name="address" value="{{ $viewsingleschool->address }}" id="">
                        
                        <input type="text" value="{{ $viewsingleschool->schoolname }}" class="form-control" name="schoolname" placeholder="fname">

                      </div>

                      
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>LGA</label>
                       <input type="text" value="{{ $viewsingleschool->lga }}" required name="lga" class="form-control" placeholder="Middle Name">
                      </div>
                     
                    </div>
                 <div class="col-sm-6">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" value="{{ $viewsingleschool->address }}" required name="address" class="form-control" placeholder="Surname">

                      </div>
                    </div>
                   <div class="col-sm-6">
                      <div class="form-group">
                        <label>Motto</label>
                        <input type="text" name="motor" value="{{ $viewsingleschool->motor }}" required class="form-control" placeholder="Age">

                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Section</label>
                        <input type="text" name="schooltype" value="{{ $viewsingleschool->schooltype }}" required class="form-control" placeholder="Date of Birth">

                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Ref no</label>
                        <select name="ref_no1" class="form-control" id="">
                          <option value="{{ $viewsingleschool->ref_no1 }}">{{ $viewsingleschool->ref_no1 }}</option>
                        </select>
                    
                      </div>
                    </div>

                   

                  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Section</label>
                        <select name="section" class="form-control" id="">
                          <option value="{{ $viewsingleschool->section }}">{{ $viewsingleschool->section }}</option>

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
                        <td><img style="width: 10%; height: 60px;" src="{{ URL::asset("/public/../$viewsingleschool->logo")}}" alt=""></td>

                        <input type="file" name="images" @error('images')
                        @enderror  value="" class="form-control" >
                         
                        </div>
                        @error('images')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      

                      <div class="col-sm-6">
                        <div class="form-group">
                        <a href="{{ url('admin/viewprimariesschools/'.$viewsingleschool->lga) }}" class="btn btn-primary">Back</a> 
                        <a href="{{ url('admin/viewsheadsgas/'.$viewsingleschool->slug) }}" class="btn btn-success">View Heads</a> 
                        <a href="{{ url('admin/viewschoolsteacheradlgas/'.$viewsingleschool->slug) }}" class="btn btn-dark">View teachers</a> 
                            <a href="{{ url('admin/viewschoolsclassesbyadmin/'.$viewsingleschool->ref_no1) }}" class="btn btn-warning">View Result</a> 
                            <a href="{{ url('admin/viewschoolsactivilgas/'.$viewsingleschool->slug) }}" class="btn btn-secondary">View Activities</a> 
                            <a href="{{ url('admin/deleteschools/'.$viewsingleschool->slug) }}" class="btn btn-danger">Delete</a> 
                        </div>
                      </div>


                      <div class="col-sm-3">
                        <div class="form-group">
                          <style>
                                .hop li{
                                  margin-bottom: 10px;
                                  list-style: none;
                                }
                          </style>
                          <ul class="hop">
                          <li><a href="{{ url('admin/viewschoolsclassesbyadminstudent/'.$viewsingleschool->ref_no1) }}" class="btn btn-primary">View All Students</a> 
                            </li>
                            <li><a href="{{ url('admin/viewsrejectedstudentsad/'.$viewsingleschool->slug) }}" class="btn btn-success">View Rejected Students</a> </li>
                            <li><a href="{{ url('admin/viewsuspendedstudentsad/'.$viewsingleschool->slug) }}" class="btn btn-dark">View Suspended Student</a> </li>
                            <li><a href="{{ url('admin/viewschoolsadmittedstudentad/'.$viewsingleschool->slug) }}" class="btn btn-warning">Admitted Student</a> </li>
                           
                          </ul>
                        
                          
                        </div>
                      </div>
                      

                      <div class="col-sm-3">
                        <div class="form-group">
                          <style>
                                .hop li{
                                  margin-bottom: 10px;
                                  list-style: none;
                                }
                          </style>
                          <ul class="hop">
                          
                            {{-- <li><a href="{{ url('admin/viewsapproveresultsad/'.$viewsingleschool->slug) }}" class="btn btn-secondary">Approved Results</a> </li> --}}
                            {{-- <li><a href="{{ url('admin/viewunapproveresultsbyadmin/'.$viewsingleschool->slug) }}" class="btn btn-danger">Unapproved Results</a> </li> --}}
                            <li><a href="{{ url('admin/analyseresult/'.$viewsingleschool->slug) }}" class="btn btn-primary">View Result Analysis</a> 
                            </li>
                          </ul>
                        
                          
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


    @include('dashboard.admin.footer')

