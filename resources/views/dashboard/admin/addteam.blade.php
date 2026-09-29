@include('dashboard.admin.header')

  @include('dashboard.admin.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Team Member </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Team Member  </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Add Team Member</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('admin.createam') }}" method="post" enctype="multipart/form-data">
                  @csrf
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
                        <label>First Name</label>
                        <input type="text" class="form-control" @error('fname')
                        @enderror value="{{ old('fname') }}" name="fname" placeholder="First name">
                      </div>
                    </div>
                    @error('fname')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror 


                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" @error('lname')
                        @enderror value="{{ old('lname') }}" name="lname" placeholder="Last Name">
                      </div>
                    </div>
                    @error('lname')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror 
                   

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Designation</label>
                        <input type="text" class="form-control" @error('designation')
                        @enderror value="{{ old('designation') }}" name="designation" placeholder="Designation">
                      </div>
                    </div>
                    @error('designation')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Facebook Link</label>
                        <input type="text" class="form-control" @error('facebook')
                        @enderror value="{{ old('facebook') }}" name="facebook" placeholder="facebook">
                      </div>
                    </div>
                    @error('facebook')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Twitter Link</label>
                        <input type="text" class="form-control" @error('twitter')
                        @enderror value="{{ old('twitter') }}" name="twitter" placeholder="twitter">
                      </div>
                    </div>
                    @error('twitter')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                   

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Linkedin Link</label>
                        <input type="text" class="form-control" @error('linkedin')
                        @enderror value="{{ old('linkedin') }}" name="linkedin" placeholder="linkedin">
                      </div>
                    </div>
                    @error('linkedin')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label> Image</label>
                        <input type="file" @error('images')
                        @enderror value="{{ old('images') }}" class="form-control" name="images">
                      </div>
                  
                    </div>
                    @error('images')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror 
                     
                    <div class="col-sm-6">
                        <div class="form-group">
                            <textarea value="" id="compose-textarea" name="messages" placeholder="Message ....." class="form-control" style="height: 300px">
                            </textarea>
                        </div>
                      </div>

                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
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