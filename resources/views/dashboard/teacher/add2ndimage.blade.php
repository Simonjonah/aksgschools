@include('dashboard.header')

  @include('dashboard.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Advertisement </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
l            <ol class="breadcrumb float-sm-right">
              {{-- <li cass="breadcrumb-item"><a href="{{ route('admin.addnidnetsem2leve200l') }}" class="btn btn-success">Add Semester Courses</a></li> --}}
              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Advertisement  </li>
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
                <h3 class="card-title">Register Adverts</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ url('update2ndeadverts/'.$edit_myblogs->ref_no) }}" method="post" enctype="multipart/form-data">
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
                        <div class="form-group">
                          <label>Image </label>
                          <td><img style="width: 30%; height: 60px;" src="{{ URL::asset("/public/../$edit_myblogs->images2")}}" alt=""></td>

                        <input type="file" name="images2" @error('images2')
                        @enderror  value="" class="form-control" >
                         
                        </div>
                        @error('images2')
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
  @include('dashboard.footer')
