@include('dashboard.admin.header')

  @include('dashboard.admin.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Upload </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Upload  </li>
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
                <h3 class="card-title">Add Testimony</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('admin.createtestimony') }}" method="post" enctype="multipart/form-data">
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
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label> Student Firstname</label>
                        <input type="text" class="form-control" @error('fname')
                        @enderror value="{{ old('fname') }}" name="fname" placeholder="Student First Name">
                      </div>
                    </div>
                    @error('fname')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror 
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label> Student Lastname</label>
                        <input type="text" class="form-control" @error('surname')
                        @enderror value="{{ old('surname') }}" name="surname" placeholder="Stusent Last Name">
                      </div>
                    </div>
                    @error('surname')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror 

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label> Designation</label>
                        <input type="text" class="form-control" @error('designation')
                        @enderror value="{{ old('designation') }}" name="designation" placeholder="Designation">
                      </div>
                    </div>
                    @error('designation')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror 
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label> Student Image</label>
                        <input type="file" @error('images')
                        @enderror value="{{ old('images') }}" class="form-control" name="images">
                      </div>
                  
                    </div>
                    @error('images')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror 
                     
                    <!-- <div class="col-sm-6">
                       <textarea class="textarea" name="message" class="form-control" @error('message') is-invalid @enderror" placeholder="Place some text here"
                      value="{{ old('message') }}     style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                     </div>
                      @error('message')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div> -->

                    <div class="col-sm-6">
                        <div class="form-group">
                            <textarea id="compose-textarea" name="message" placeholder="Message ....." class="form-control" style="height: 300px">
                          
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