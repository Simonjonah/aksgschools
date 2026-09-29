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
                <h3 class="card-title">Add </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('admin.createteevent') }}" method="post" enctype="multipart/form-data">
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
                        <label> Title</label>
                        <input type="text" class="form-control" @error('title')
                        @enderror value="{{ $viewsingle_blogs->title }}" name="title" placeholder="Title">
                      </div>
                    </div>
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror 
                   
                    <div class="col-sm-6">
                      <div class="form-group">
                        {{-- <label> Image</label> --}}
                        <img style="width: 50%; height: 50%;" class="profile-user-img img-fluid"
                            src="{{ URL::asset("/public/../$viewsingle_blogs->images")}}"
                            alt="User profile picture">
                        {{-- <input type="file" @error('images')
                        @enderror value="{{ old('images') }}" class="form-control" name="images"> --}}
                      </div>
                  
                    </div>
                    @error('images')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror 
                     
                    <div class="col-sm-6">
                        <div class="form-group">
                            <textarea value="{{ $viewsingle_blogs->messages }}" id="compose-textarea" name="messages" placeholder="Message ....." class="form-control" style="height: 300px">
                          {{ $viewsingle_blogs->messages }}
                            </textarea>
                        </div>
                      </div>

                  </div>
                  <a class="btn btn-primary" href="{{ route('admin.viewblog') }}">Back</a>
                  {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
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