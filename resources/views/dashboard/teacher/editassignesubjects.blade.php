  @include('dashboard.teacher.header')


  <!-- Main Sidebar Container -->
    @include('dashboard.teacher.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>General Form</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-primary" href="{{ url('admin/addsecondaryclasses')}}">Add Secondary Classes</a></li> -->
              <!-- <li class="breadcrumb-item active">General Form</li> -->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

       
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Assign Subject</h3>
              </div>
              <!-- /.card-header -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('fail'))
                    <div class="alert alert-danger">
                        {{ session('fail') }}
                    </div>
                @endif
              <!-- form start -->
              <form action="{{ url('admin/updateassignsubject/'.$edit_assigsubject->ref_no1) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <h1 for="exampleInputEmail1">{{$edit_assigsubject->subject['subjectname']}}</h1>
                    <input name="subjectname"  type="hidden" value="{{$edit_assigsubject->subject['subjectname'] }}" class="form-control" id="exampleInputEmail1" placeholder="Enter class name">
                    <input name="subject_id"  type="hidden" value="{{$edit_assigsubject->subject['id'] }}" class="form-control" id="exampleInputEmail1" placeholder="Enter class name">
                    <input name="connect"  type="hidden" value="{{$edit_assigsubject->subject['connect']}}" class="form-control" id="exampleInputEmail1" placeholder="Enter class name">
                    <input name="section"  type="hidden" value="{{$edit_assigsubject->subject['section']}}" class="form-control" id="exampleInputEmail1" placeholder="Enter class name">
                    <input name="subsection"  type="hidden" value="{{$edit_assigsubject->subject['subsection'] }}" class="form-control" id="exampleInputEmail1" placeholder="Enter class name">
                  
                
                
                <input name="" disabled type="text" value="{{$edit_assigsubject->section}}" class="form-control" id="exampleInputEmail1" placeholder="Enter class name"> <br>

                    <input name="" disabled type="text" value="{{$edit_assigsubject->subsection}}" class="form-control" id="exampleInputEmail1" placeholder="Enter class name">
                
                
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Select Subject</label>
                    <select name="subject_id" class="form-control">
                        <option value="{{ $edit_assigsubject->subject['id'] }}">{{ $edit_assigsubject->subject['subjectname'] }}</option>
                        @foreach($view_subjects as $view_subject)
                        <option value="{{ $view_subject->id }}">{{ $view_subject->subjectname }}/{{ $view_subject->subsection }}</option>
                        @endforeach
                </select>
                  </div>

                
                  <div class="form-group">
                    <label for="exampleInputPassword1">Select Class</label>
                    <select name="classname" class="form-control">
                    <option value="{{ $edit_assigsubject->classname }}">{{ $edit_assigsubject->classname }}</option>
                    @foreach($view_classes as $view_classe)
                    <option value="{{ $view_classe->classname }}">{{ $view_classe->classname }}</option>
                    @endforeach
                </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Select Arm</label>
                    <select name="alms" class="form-control">
                    <option value="{{ $edit_assigsubject->alms }}">{{ $edit_assigsubject->alms }}</option>
                    @foreach($view_arms as $view_arm)
                    <option value="{{ $view_arm->alms }}">{{ $view_arm->alms }}</option>
                    @endforeach
                </select>
                  </div>


                   <div class="form-group">
                    <label for="exampleInputPassword1">Select Term</label>
                    <select name="term" class="form-control">
                    <option value="{{ $edit_assigsubject->term }}">{{ $edit_assigsubject->term }}</option>

                    <option value="First Term">First Term</option>
                    <option value="Second Term">Second Term</option>
                    <option value="Third Term">Third Term</option>
                </select>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Select Teacher</label>
                    <select name="user_id" class="form-control">
                    <option value="{{ $edit_assigsubject->user['id'] }}">{{ $edit_assigsubject->user['fname'] }} {{ $edit_assigsubject->user['surname'] }} {{ $edit_assigsubject->user->school['schoolname'] }}</option>

                    @foreach($view_teachers as $view_teacher)
                    <option value="{{ $view_teacher->id }}">{{ $view_teacher->fname }} {{ $view_teacher->surname }} {{ $view_teacher->school['schoolname'] }}</option>
                    @endforeach
                </select>
                  </div>

                  
                  <div class="form-check">
                    <button type="submit" class="btn btn-primary" id="exampleCheck1">Submit</button>
                  </div>
                </div>
                <!-- /.card-body -->

                
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @include('dashboard.teacher.footer')