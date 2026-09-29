@include('dashboard.teacher.header')

  @include('dashboard.teacher.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Teacher </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li cass="breadcrumb-item"><a href="{{ route('admin.addnidnetsem2leve200l') }}" class="btn btn-success">Add Semester Courses</a></li> --}}
              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Add Teacher  </li>
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
                <h3 class="card-title">Register Activities</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ url('admin/createteacher') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  {{-- @method('PUT') --}}
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
                      <div class="form-group">

                        <input type="hidden" name="address" value="{{ auth()->user()->address }}" name="" id="">
                        <input type="hidden" name="motor" value="{{ auth()->user()->motor }}" name="" id="">
                        <input type="hidden" name="ref_no1" value="{{ auth()->user()->ref_no1 }}" name="" id="">
                        <input type="hidden" name="logo" value="{{ auth()->user()->logo }}" name="" id="">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->user_id }}" name="" id="">
                        <input type="hidden" name="school_id" value="{{ auth()->user()->school_id }}" name="" id="">
                        <input type="hidden" name="connect" value="{{ auth()->user()->connect }}" name="" id="">
                        <input type="hidden" name="signature" value="{{ auth()->user()->signature }}" name="" id="">

                        <input type="hidden" name="slug" value="{{ auth()->user()->slug }}" name="" id="">
                        <input type="hidden" name="schooltype" value="{{ auth()->user()->schooltype }}" name="" id="">
                        <input type="hidden" name="section" value="{{ auth()->user()->section }}" name="" id="">
                        <input type="hidden" name="centernumber" value="{{ auth()->user()->centernumber }}" name="" id="">
                        <input type="hidden" name="schoolname" value="{{ auth()->user()->schoolname }}" name="" id="">
                      </div>
                      <div class="form-group">

                      <label for="">First name</label>
                      <input name="fname" type="text" class="form-control" @error('fname') is-invalid @enderror"
                      value="{{ old('fname') }}" placeholder="First Name">
                      </div>
                      @error('fname')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror

                      <div class="form-group">
                       <label for="">Middlename</label>
                      <input name="middlename" type="text" class="form-control" @error('middlename') is-invalid @enderror"
                      value="{{ old('fname') }}" placeholder="Middlename Name">
                      </div>
                      @error('middlename')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror


                      <div class="form-group">
                      <label for="">Surname</label>
                        <input name="surname" type="text" class="form-control" @error('surname') is-invalid @enderror"
                        value="{{ old('surname') }}" placeholder="SurName">
                      @error('surname')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror

                      <div class="form-group">
                      <label for="">Email</label>
                        <input name="email" type="email" class="form-control" @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" placeholder="Email">
                      </div>
                      @error('email')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror

                      <div class="form-group">
                      <label for="">Phone</label>
                        <input name="phone" type="number" class="form-control" @error('phone') is-invalid @enderror"
                        value="{{ old('phone') }}" placeholder="Phone">
                      </div>
                      @error('phone')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    

                      <label for="">Academic Session</label>

                      <div class="form-group">
                        <select name="academic_session" class="form-control">
                          @foreach ($addacademics as $addacademic)
                          <option value="{{ $addacademic->academic_session }}">{{ $addacademic->academic_session }}</option>
                          @endforeach
                        </select>
                      </div>
                      @error('academic_session')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror

                      

                      


                        <label for="">LGA</label>
                        <div class="form-group">
                          <select name="lga" required class="form-control" id="">
                              @foreach ($lgas as $lga)
                                  <option value="{{ $lga->lga }}">{{ $lga->lga }}</option>
                              @endforeach
                              
                          </select>
                          
                        </div>
                        @error('lga')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror



                        <label for="">Select Alm</label>
                        <div class="form-group">
                          <select name="alms" required class="form-control" id="">
                              <option value="">Select Alm</option>
                              @foreach ($alms as $alm)
                                  <option value="{{ $alm->alms }}">{{ $alm->alms }}</option>
                              @endforeach
                              
                          </select>
                          
                        </div>
                        @error('alms')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                      
                         <label for="">Select Class</label>
                        <div class="form-group">
                          <select name="classname" required class="form-control" id="">
                              <option value="">Select Class</option>
                            
                              @foreach ($view_classnames as $view_classname)
                                  <option value="{{ $view_classname->classname }}">{{ $view_classname->classname }}</option>
                              @endforeach
                          </select>
                        </div>
                        @error('classname')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <label for="">Term</label>
                        <div class="form-group">
                          <select name="term" required class="form-control" id="">
                                  <option value="First Term">First Term</option>
                                  <option value="Second Term">Second Term</option>
                                  <option value="Third Term">Third Term</option>
                              
                          </select>
                          
                        </div>
                        @error('lga')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <label for=""> Take/Upload Photo</label>
                      <div class="input-group">
                        <input name="images" type="file" class="form-control" @error('images') is-invalid @enderror"
                        value="{{ old('images') }}" placeholder="images">
                      </div>
                      @error('images')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                       
                      
                    </div>
                   
                  
                  
                      
                     
                      <div class="col-sm-6">
                        <div class="form-group">
                            {{-- <a href="{{ url('admin/viewAdvertisement') }}" class="btn btn-primary">Back</a> --}}
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
  @include('dashboard.teacher.footer')