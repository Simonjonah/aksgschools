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
            <form action="{{ url('teacher/assignsubjectstoteacherbysc') }}" method="post" enctype="multipart/form-data">
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
                <input type="hidden" name="user_id" value="{{ Auth::guard('teacher')->user()->user_id }}" id="">
                <input type="hidden" name="ref_no1" value="{{ Auth::guard('teacher')->user()->ref_no1 }}" id="">
                <input type="hidden" name="slug" value="{{ Auth::guard('teacher')->user()->slug }}" id="">
                <input type="hidden" name="school_id" value="{{ Auth::guard('teacher')->user()->school_id }}" id="">
                
                    <div class="form-group">
                        <label>SUBJECT: {{ $assigned_subject->subjectname }}</label>
                        <input required type="hidden" class="form-control" @error('subjectname')
                        @enderror value="{{ $assigned_subject->id }}" name="subject_id" placeholder="Subject name">
                      </div>
                 
                     <div class="form-group">
                        <h5>Select Class  </h5>
                        <select required class="form-control" type="text" name="classname">
                          <option value="{{ $assigned_subject->classname }}">{{ $assigned_subject->classname }}</option> 
                         @if (Auth::guard('teacher')->user()->section == 'Primary')
                         @foreach ($classnames as $classname)
                            @if ($classname->section == 'Primary')
                            <option value="{{ $classname->classname }}">{{ $classname->classname }}</option>
                            @else
                            @endif
                          @endforeach
                         @else
                         @foreach ($classnames as $classname)
                            @if ($classname->section == 'Junior Secondary' || $classname->section == 'Secondary' || $classname->section == 'Senior Secondary')
                            <option value="{{ $classname->classname }}">{{ $classname->classname }}</option>
                            @else
                            @endif
                          @endforeach
                         @endif
                         
                          
                        </select>
                      </div> 

                      <div class="col-sm-6">
                      <label for="">Section</label>
                    <div class="form-group">
                    <select name="section" class="form-control" id="">

                      @if (Auth::guard('teacher')->user()->schooltype == 'SUBEB')
                      <option value="Primary">Primary</option>
                        
                      @else
                      
                      <option value="{{ $assigned_subject->section }}">{{ $assigned_subject->section }}</option>
                      <option value="Junior Secondary">Junior Secondary</option>
                      <option value="Senior Secondary">Senior Secondary</option>
                        
                      @endif
                    </select>
                  </div>
                    </div>

                    <div class="form-group">
                      <h5>Select Teacher </h5>
                      <select required class="form-control" type="text" name="teacher_id">
                        {{-- @if (Auth::guard('teacher')->user()->school_id ==  Auth::guard('teacher')->user()->school_id) --}}
                          {{-- @if ($assigned_subject->section == 'Secondary' || $assigned_subject->section == 'Junior Secondary' )  --}}
                            @foreach ($assigned_teacherto_subjects as $assigned_teacherto_subject)
                              <option value="{{ $assigned_teacherto_subject->id }}">{{ $assigned_teacherto_subject->fname }} {{ $assigned_teacherto_subject->surname }} {{ $assigned_teacherto_subject->schoolname }} {{ $assigned_teacherto_subject->section }} {{ $assigned_teacherto_subject->classname }}</option>
                            @endforeach
                          {{-- @else
                          @endif  --}}
                        {{-- @else --}}
                          
                        {{-- @endif --}}
                      
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
    
   @include('dashboard.teacher.footer')