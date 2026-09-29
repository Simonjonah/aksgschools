@include('dashboard.admin.header')

  @include('dashboard.admin.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Slider </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Slider  </li>
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
                <form action="{{ url('admin/updateslider/'.$edit_slider->ref_no) }}" method="post" enctype="multipart/form-data">
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

                    @method('PUT')
                  <div class="row">
                   
                 
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label> Title</label>
                          <input type="text" class="form-control" @error('title')
                          @enderror value="{{ $edit_slider->title }}" name="title" placeholder="title">
                        </div>
                      </div>
                      @error('title')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror 

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label> Facts</label>
                          <input type="text" class="form-control" @error('facts')
                          @enderror value="{{ $edit_slider->facts }}" name="facts" placeholder="facts">
                        </div>
                      </div>
                      @error('facts')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror 
                   
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label> Image</label>
                        <img style="width: 40px; height: 40px;" src="{{ URL::asset("/public/../$edit_slider->images")}}" alt="">
                        <input type="file" @error('images')
                        @enderror value="{{ old('images') }}" class="form-control" name="images">
                      </div>
                  
                    </div>
                    @error('images')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror 
                     

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