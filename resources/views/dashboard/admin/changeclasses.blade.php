@include('dashboard.admin.header')

  @include('dashboard.admin.sidebar')
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
              <h3 class="card-title">Teacher {{ $assign_classestoTeacher->fname }} {{ $assign_classestoTeacher->surname }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ url('admin/changgeteacherclass/'.$assign_classestoTeacher->id) }}" method="post" enctype="multipart/form-data">
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
                        <label>{{ $assign_classestoTeacher->subjectname }}</label>
                        <input type="hidden" class="form-control" @error('subjectname')
                        @enderror value="{{ $assign_classestoTeacher->id }}" name="subject_id" placeholder="Subject name">
                      </div>
                 
                      <div class="form-group">
                        <h5>Select Class  </h5>
                        <select required class="form-control" type="text" name="classname">
                          @foreach ($classnames as $classname)
                            <option value="{{ $classname->classname }}">{{ $classname->classname }}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <h5>Section </h5>
                        <select required class="form-control" type="text" name="section">
                          <option value="{{ $assign_classestoTeacher->section }}">{{ $assign_classestoTeacher->section }}</option>
                          <option value="Creche">Creche</option>
                          <option value="Pre-School">Pre-School</option>
                          <option value="Preparatory">Preparatory</option>
                          <option value="Nursery">Nursery</option>
                          <option value="Primary">Primary</option>
                          <option value="High School">High School</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <h5>Study Center </h5>
                        <select required class="form-control" type="text" name="centername">
                         @foreach ($view_centernames as $view_centername)
                          <option value="{{ $view_centername->centername }}">{{ $view_centername->centername }}</option>
                         @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <h5>Term</h5>
                        <select name="entrylevel" class="form-control"  id="">
                          <option value="{{ $assign_classestoTeacher->entrylevel }}">{{ $assign_classestoTeacher->entrylevel }}</option>

                          <option value="Pioneer Term">Pioneer Term</option>
                          <option value="Penultimate Term">Penultimate Term</option>
                          <option value="Premium Term">Premium Term</option>
                        </select>
                      </div>

                   
                      

                
              
              

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add Subject</button>
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