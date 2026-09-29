@include('dashboard.header')

  @include('dashboard.sidebar')
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
            <form action="{{ url('web/assignsubjectstoteacherbysc') }}" method="post" enctype="multipart/form-data">
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
                {{-- @method('PUT') --}}

                
           
            <div class="card-body">
                <input type="hidden" name="user_id" value="{{ Auth::guard('web')->user()->id }}" id="">
                <input type="hidden" name="ref_no1" value="{{ Auth::guard('web')->user()->ref_no1 }}" id="">
                
                    <div class="form-group">
                        <label>SUBJECT: {{ $assigned_subject->subjectname }}</label>
                        <input type="hidden" class="form-control" @error('subjectname')
                        @enderror value="{{ $assigned_subject->id }}" name="subject_id" placeholder="Subject name">
                      </div>
                 
                      <div class="form-group">
                        <h5>Select Class  </h5>
                        <select required class="form-control" type="text" name="classname">
                          {{-- <option value="{{ $assigned_subject->classname }}">{{ $assigned_subject->classname }}</option> --}}
                          @foreach ($classnames as $classname)
                            <option value="{{ $classname->classname }}">{{ $classname->classname }}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <h5>Section </h5>
                        <select required class="form-control" type="text" name="section">
                            @foreach ($sections as $section)
                                <option value="{{ $section->section }}">{{ $section->section }}</option>
                            @endforeach
                        </select>
                      </div>


                    <div class="form-group">
                      <h5>Select Teacher </h5>
                      <select required class="form-control" type="text" name="teacher_id">
                        {{-- @if ($assigned_subject->section == 'Primary') --}}
                          @foreach ($assigned_teacherto_subjects as $assigned_teacherto_subject)
                            <option value="{{ $assigned_teacherto_subject->id }}">{{ $assigned_teacherto_subject->fname }} {{ $assigned_teacherto_subject->surname }} {{ $assigned_teacherto_subject->schoolname }} {{ $assigned_teacherto_subject->section }} {{ $assigned_teacherto_subject->classname }}</option>

                          @endforeach
                        {{-- @else
                        
                        
                        @endif --}}
                      </select>
                  </div>
                      

                
              
              

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Assigned Subject</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  </div>
    
   @include('dashboard.footer')