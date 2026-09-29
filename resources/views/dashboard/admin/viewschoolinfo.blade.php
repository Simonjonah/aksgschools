@include('dashboard.admin.header')

  @include('dashboard.admin.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">schoolnews </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              {{-- <li cass="breadcrumb-item"><a href="{{ route('admin.addnidnetsem2leve200l') }}" class="btn btn-success">Add Semester Courses</a></li> --}}
              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">schoolnews  </li>
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
                <form action="{{ url('web/createschoolnews') }}" method="post" enctype="multipart/form-data">
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
                  @endif
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label> Title</label>
                        {{-- <input type="text" name="academic_session" value="{{ Auth::guard('web')->user()-> }}" id=""> --}}
                        {{-- <input type="hidden" name="user_id" value="{{ Auth::guard('web')->user()->id }}" id="">
                        <input type="hidden" name="schoolname" value="{{ Auth::guard('web')->user()->schoolname }}" id="">
                        <input type="hidden" name="address" value="{{ Auth::guard('web')->user()->address }}" id="">
                        <input type="hidden" name="email" value="{{ Auth::guard('web')->user()->email }}" id="">
                        <input type="hidden" name="phone" value="{{ Auth::guard('web')->user()->phone }}" id="">
                        <input type="hidden" name="logo" value="{{ Auth::guard('web')->user()->logo }}" id="">
                        <input type="hidden" name="slug" value="{{ Auth::guard('web')->user()->slug }}" id=""> --}}
                       
                        <input type="text" class="form-control" value="{{ $school_info->title }}" name="title" placeholder="title">

                      </div>

                      
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                          <label> Email</label>
                          <input type="text" class="form-control" value="{{ $school_info->email }}" name="title" placeholder="title">
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label> Address</label>
                          <input type="text" class="form-control" value="{{ $school_info->address }}" name="title" placeholder="title">
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label> Schools</label>
                          <input type="text" class="form-control" value="{{ $school_info->schoolname }}" name="title" placeholder="title">
                        </div>
                      </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                          <label> Phone</label>
                          <input type="text" class="form-control" value="{{ $school_info->phone }}" name="title" placeholder="title">
                        </div>
                      </div>
                   
                  
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            <img style="width: 10%; height: 60px;" src="{{ URL::asset("/public/../$school_info->logo")}}" alt="">
                          <label>Image </label>
                        <input type="file" name="images" @error('images')
                        @enderror  value="" class="form-control" >
                         
                        </div>
                        @error('images')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <textarea id="compose-textarea"  name="messages" placeholder="Message ....." class="form-control" style="height: 300px">
                                {!! $school_info->messages !!}
                            </textarea>
                        </div>
                      </div>
                      
                     
                      <div class="col-sm-6">
                        <div class="form-group">
                            <a href="{{ url('admin/home') }}" class="btn btn-primary">Back</a>
                        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
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
