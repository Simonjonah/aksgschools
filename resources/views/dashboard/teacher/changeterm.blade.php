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
            <form action="{{ url('admin/updtatetermteacher/'.$change_term->ref_no) }}" method="post" enctype="multipart/form-data">
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
                    <label for="">Select Term</label>
                    <select  name="term" class="form-control" value="{{ $change_term->term }}">
                        <option value="{{ $change_term->term }}">{{ $change_term->term }}</option>
                        <option value="First Term">First Term</option>
                        <option value="Second Term">Second Term</option>
                        <option value="Third Term">Third Term</option>
                    </select>
                  </div>
                  @error('term')
                <span class="text-danger">{{ $message }}</span>
              @enderror
              

              


               <div class="form-group">
                <label for="">Select Classname</label>
                    <select  name="classname" class="form-control" value="">
                        <option value="{{ $change_term->classname }}">{{ $change_term->classname }}</option>
                        @foreach ($view_classnames as $view_classname)
                        <option value="{{ $view_classname->classname }}">{{ $view_classname->classname }}</option>
                        @endforeach
                    </select>
                  </div>
                  @error('classname')
                <span class="text-danger">{{ $message }}</span>
              @enderror



              <div class="form-group">
                    <label for="">Select Academic Session</label>

                    <select  name="academic_session" class="form-control" value="">
                        <option value="{{ $change_term->academic_session }}">{{ $change_term->academic_session }}</option>
                        @foreach ($view_acas as $view_aca)
                        <option value="{{ $view_aca->academic_session }}">{{ $view_aca->academic_session }}</option>
                          
                        @endforeach
                    </select>
                  </div>
                  @error('academic_session')
                <span class="text-danger">{{ $message }}</span>
              @enderror

              </div>
              
              <!-- /.card-body -->
       
              

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add</button>
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