@include('dashboard.admin.header')

  @include('dashboard.admin.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Section {{ $view_teachers->section }}</h1>
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
              <h3 class="card-title">{{ $view_teachers->section }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ url('admin/createrol/'.$view_teachers->id) }}" method="post" enctype="multipart/form-data">
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
                <label for="">Role</label>

                   <select name="role" id="" class="form-control">
                        <option value="{{ $view_teachers->role }}">{{ $view_teachers->role }}</option>
                        <option value="Principal">HeadMaster/HeadMistress</option>
                        <option value="Principal">Principal</option>
                   </select>
              </div>

            
           <div class="form-group">
            <h5>Section </h5>
            <select required class="form-control" type="text" name="section">
              <option value="{{ $view_teachers->section }}">{{ $view_teachers->section }}</option>
              <option value="{{$view_teachers->section}}">{{$view_teachers->section}} </option>
            </select>
          </div> 

          <!-- <div class="form-group">
            <h5>Class </h5>
            <select required class="form-control" type="text" name="classname">
              @foreach ($view_classes as $view_classe)
                <option value="{{ $view_classe->classname }}">{{ $view_classe->classname }}</option>
              @endforeach
             
            </select>
          </div>  -->
           <div class="form-group">
            <label for="">Teachers</label>
            <select name="fname" id="" class="form-control">
              <option value="{{ $view_teachers->fname }}">{{ $view_teachers->fname }}, {{ $view_teachers->surname }} {{ $view_teachers->section }} {{ $view_teachers->surname }} /{{ $view_teachers->school['lga'] }}/ {{ $view_teachers->school['schoolname'] }}</option>
            </select>
          </div>
              
             
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add Role</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  </div>
    
   @include('dashboard.admin.footer')