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
                <form action="{{ url('admin/updateschooladmin/'.$view_schools->ref_no1) }}" method="post" enctype="multipart/form-data">
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
                       <select name="lga" class="form-control">
                        <option value="{{ $view_schools->lga }}">{{ $view_schools->lga }}</option>
                        @foreach ($lgas as $lga)
                            <option value="{{ $lga->lga }}">{{ $lga->lga }}</option>
                            <option value="{{ $lga->lga }}">{{ $lga->lga }}</option>
                        @endforeach
                        
                      </select>
                       
                    
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
                        <label>Section type</label>
                        <select name="schooltype" class="form-control">
                          <option value="SUBEB">SUBEB</option>
                          <option value="SSEB">SSEB</option>
                        </select>

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
                          <option value="Primary">Primary</option>
                          <option value="Secondary">Secondary</option>
                        </select>
                    
                      </div>
                    </div>


                      

                      
                     
                      
                     
                      
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Logo </label>
                        <td><img style="width: 10%; height: 60px;" src="{{ URL::asset("/public/../$view_schools->logo")}}" alt=""></td>

                        <input type="file" name="logo" @error('logo')
                        @enderror  value="" class="form-control" >
                         
                        </div>
                        @error('logo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      

                      <div class="col-sm-6">
                        <div class="form-group">
                            <!-- <a href="{{ url('web/viewschoolsinlgas/'.$view_schools->lga) }}" class="btn btn-primary">Back</a>  -->
                        <button type="submit" class="btn btn-primary">Submit</button>
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

