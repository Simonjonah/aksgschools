@include('dashboard.teacher.header')

  @include('dashboard.teacher.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Quick Example</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ url('teacher/updateheresult/'.$edit_results->id) }}" method="post" enctype="multipart/form-data">
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
                @method('PUT')

                <div class="card-body">
                  <div class="form-group">
                    <label for="">Test One</label>

                    <input type="text" name="test_1" class="form-control" @error('test_1')
                    @enderror placeholder="Test 3" value="{{ $edit_results->test_1 }}">
                  </div>
                  @error('test_1')
                <span class="text-danger">{{ $message }}</span>
              @enderror
              </div>
           
            <div class="card-body">
                  <div class="form-group">
                    <label for="">Test Two</label>

                    <input type="text" name="test_2" class="form-control" @error('test_2')
                    @enderror placeholder="Test 2" value="{{ $edit_results->test_2 }}">
                  </div>
                  @error('test_2')
                <span class="text-danger">{{ $message }}</span>
              @enderror
              </div>

              {{-- <div class="card-body">
                  <div class="form-group">
                    <input type="text" name="test_3" class="form-control" @error('test_3')
                    @enderror placeholder="Test 1" value="{{ $edit_results->test_3 }}">
                  </div>
                  @error('test_3')
                <span class="text-danger">{{ $message }}</span>
              @enderror
              </div> --}}

              

              <div class="card-body">
                  <div class="form-group">
                    <label for="">Exams</label>
                    <input type="text" name="exams" class="form-control" @error('exams')
                    @enderror placeholder="Exams" value="{{ $edit_results->exams }}">
                  </div>
                  @error('exams')
                <span class="text-danger">{{ $message }}</span>
              @enderror
              </div>
              <!-- /.card-body -->
       
              

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  </div>
  @include('dashboard.teacher.footer')