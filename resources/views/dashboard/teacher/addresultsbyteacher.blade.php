@include('dashboard.teacher.header')
@include('dashboard.teacher.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Result of {{ $view_studentsubject->fname }} {{ $view_studentsubject->middlename }} {{ $view_studentsubject->surname }} in {{ $view_studentsubject->classname }} {{ $view_studentsubject->term }} {{ $view_studentsubject->section }}  {{ $view_studentsubject->regnumber }} Section</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Subjects</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <small class="float-right">{{ $view_studentsubject->created_at->format('D d, M Y, H:i')}}</small>
                    </h2>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-lg-2 col-md-6 col-sm-4 invoice-col">
                    <img style="width: 80px; height: 80px;" src="{{ URL::asset("/public/../$view_studentsubject->logo")}}" alt=""> <br>

                
                </div> 
                <!-- /.col -->
               <div class="col-lg-8 col-md-6 col-sm-4 invoice-col" style="text-align: center">
                 
                
                <h1><strong style="text-transform: uppercase; font-size: 27px; ">{{ $view_studentsubject->school['schoolname'] }}</strong></h1>
                {{ $view_studentsubject->school['motor'] }} <br>
                {{ $view_studentsubject->school['address'] }} <br>
                
                </div>
                <!-- /.col -->
                <div class="col-lg-2 col-md-6 col-sm-4 invoice-col">
                    <img style="width: 100px; height: 100px;" src="{{ URL::asset("/public/../$view_studentsubject->images")}}" alt="">
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                    <div class="col-12 table-responsive">
                      @if ($view_studentsubject->section === 'Primary')
                      <form action="{{ url('teacher/createresults') }}" method="post" enctype="multipart/form-data">
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
      
                        <table class="table table-striped">
                            <thead>
                            <tr>
                              {{-- <th>S/N</th> --}}
                              <th>Subjects</th>
                              <th>Continuous Assessment Test 1</th>
                              <th>Continuous Assessment Test 2</th>
                              {{-- <th>Continuous Assessment Test 3</th> --}}
                              <th>Examination Scores</th>
                              
                            </tr>
                            </thead>
                            <tbody>
      
                                @foreach ($view_teachersubjects as $view_teachersubject)
                                  @if ($view_teachersubject->section == 'Primary')
                                  <tr>
                                    <td>{{ $view_teachersubject->subjectname }} <input type="hidden" value="{{ $view_teachersubject->subjectname }}" name="subjectname[]" id=""></td>
                                    <td><input type="text" class="form-control" name="test_1[]" placeholder="Test 1"></td>
                                    <td><input type="text" class="form-control" name="test_2[]" placeholder="Test 2"></td>
                                    {{-- <td><input type="text" class="form-control" name="test_3[]" placeholder="Test 3"></td> --}}
                                    <td><input type="text" class="form-control" name="exams[]" placeholder="Examination Scores"></td>
                                    
                                    <input type="hidden" name="signature[]" value="{{ Auth::guard('teacher')->user()->signature }}" placeholder="Teacher ID">
                                    <input type="hidden" name="lga[]" value="{{ Auth::guard('teacher')->user()->school['lga'] }}" placeholder="Teacher ID">
                                    <input type="hidden" name="teacher_id[]" value="{{ Auth::guard('teacher')->user()->id }}" placeholder="Teacher ID">
                                    <input type="hidden" name="user_id[]" value="{{ $view_studentsubject->user_id }}" placeholder="Teacher ID">
                                    <input type="hidden" name="address[]" value="{{ $view_studentsubject->address }}" placeholder="Teacher ID">
                                    <input type="hidden" name="section[]" value="{{ $view_studentsubject->section }}" placeholder="Teacher ID">
                                    <input type="hidden" name="motor[]" value="{{ $view_studentsubject->motor }}" placeholder="Teacher ID">
                                    <input type="hidden" name="school_id[]" value="{{ $view_studentsubject->school_id }}" placeholder="Teacher ID">
                                    <input type="hidden" name="student_id[]" value="{{ $view_studentsubject->id }}" placeholder="ID">
                                    <input type="hidden" name="slug[]" value="{{ Auth::guard('teacher')->user()->school['slug'] }}" placeholder="ID">
                                    <input type="hidden" name="term[]" value="{{ $view_studentsubject->term }}" placeholder="Term">
                                    <input type="hidden" name="academic_session[]" value="{{ $view_studentsubject->academic_session }}" placeholder="academic_session">
                                    <input type="hidden" name="regnumber[]" value="{{ $view_studentsubject->regnumber }}" placeholder="regnumber">
                                    {{-- <input type="hidden" name="guardian_id[]" value="{{ $view_studentsubject->guardian_id }}" placeholder="Parent ID"> --}}
                                    <input type="hidden" name="classname[]" value="{{ $view_studentsubject->classname }}" placeholder="Parent ID">
                                    <input type="hidden" name="fname[]" value="{{ $view_studentsubject->fname }}" placeholder="Parent ID">
                                    <input type="hidden" name="middlename[]" value="{{ $view_studentsubject->middlename }}" placeholder="Parent ID">
                                    <input type="hidden" name="surname[]" value="{{ $view_studentsubject->surname }}" placeholder="Parent ID">
                                    <input type="hidden" name="gender[]" value="{{ $view_studentsubject->gender }}" placeholder="Parent ID">
                                    <input type="hidden" name="images[]" value="{{ $view_studentsubject->images }}" placeholder="Parent ID">
                                    <input type="hidden" name="logo[]" value="{{ Auth::guard('teacher')->user()->logo }}" placeholder="Parent ID">
                                    <input type="hidden" name="schoolname[]" value="{{ Auth::guard('teacher')->user()->schoolname }}" placeholder="Parent ID">
                                    <td><input type="hidden" class="form-control" name="alms[]" placeholder="Examination Scores"></td>
                                       
                                  </tr>

                                  @else
                                  
                                          
                                  @endif
      
                                @endforeach
                            
      
                            </tbody>
                          </table>
                      
                        {{-- @else
                            
                      @endif --}}
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <button type="submit" class="btn btn-success"><i class="far fa-bell"></i> 
                  Submit 
              </button>
                  
                  @elseif($view_studentsubject->section === 'Pre-School')
                  <form action="{{ url('teacher/createresults') }}" method="post" enctype="multipart/form-data">
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
  
                    <table class="table table-striped">
                        <thead>
                        <tr>
                          <th>Subjects</th>
                              <th>Continuous Assessment Test 1</th>
                              <th>Continuous Assessment Test 2</th>
                              {{-- <th>Continuous Assessment Test 3</th> --}}
                              <th>Examination Scores</th>
                          
                        </tr>
                        </thead>
                        <tbody>
  
                            @foreach ($view_teachersubjects as $view_teachersubject)
                              @if ($view_teachersubject->section == 'Pre-School')
                              <tr>

                                  <td>{{ $view_teachersubject->subjectname }}<input type="hidden" value="{{ $view_teachersubject->subjectname }}" name="subjectname[]" id=""></td>
                                  
                                  
                                  <td><input type="text" class="form-control" name="test_1[]" placeholder="Test 1"></td>
                                  <td><input type="text" class="form-control" name="test_2[]" placeholder="Test 2"></td>
                                  {{-- <td><input type="text" class="form-control" name="test_3[]" placeholder="Test 3"></td> --}}
                                  <td><input type="text" class="form-control" name="exams[]" placeholder="Examination Scores"></td>

                                  <input type="hidden" value="{{ Auth::guard('web')->user()->fname }}" name="tname[]" id="">
                                  <input type="hidden" value="{{ Auth::guard('web')->user()->surname }}" name="tsurname[]" id="">
                                  <input type="hidden" name="teacher_id[]" value="{{ Auth::guard('web')->user()->id }}" placeholder="Teacher ID">
                                  <input type="hidden" name="user_id[]" value="{{ $view_studentsubject->id }}" placeholder="ID">
                                  <input type="hidden" name="term[]" value="{{ $view_studentsubject->term }}" placeholder="Term">
                                  <input type="hidden" name="academic_session[]" value="{{ $view_studentsubject->academic_session }}" placeholder="academic_session">
                                  <input type="hidden" name="section[]" value="{{ $view_studentsubject->section }}" placeholder="academic_session">
                                  <input type="hidden" name="regnumber[]" value="{{ $view_studentsubject->regnumber }}" placeholder="regnumber">
                                  <input type="hidden" name="guardian_id[]" value="{{ $view_studentsubject->guardian_id }}" placeholder="Parent ID">
                                  <input type="hidden" name="classname[]" value="{{ $view_studentsubject->classname }}" placeholder="Parent ID">
                                  <input type="hidden" name="fname[]" value="{{ $view_studentsubject->fname }}" placeholder="Parent ID">
                                  <input type="hidden" name="middlename[]" value="{{ $view_studentsubject->middlename }}" placeholder="Parent ID">
                                  <input type="hidden" name="surname[]" value="{{ $view_studentsubject->surname }}" placeholder="Parent ID">
                                  <input type="hidden" name="gender[]" value="{{ $view_studentsubject->gender }}" placeholder="Parent ID">
                                  <input type="hidden" name="images[]" value="{{ $view_studentsubject->images }}" placeholder="Parent ID">

                                  <input type="hidden" name="tname[]" value="{{ Auth::guard('web')->user()->fname }}" placeholder="Teacher ID">
                                <input type="hidden" name="tsurname[]" value="{{ Auth::guard('web')->user()->surname }}" placeholder="Teacher ID">
                                {{-- <input type="hidden" name="tsurname[]" value="" placeholder="Teacher ID"> --}}
                                     
                                </tr>
                              @else
                              
                                      
                              @endif
  
                            @endforeach
                        
  
                        </tbody>
                      </table>
                      <button type="submit" class="btn btn-success"><i class="far fa-bell"></i> 
                        Submit 
                      </button>
                  @elseif($view_studentsubject->section === 'Senior Secondary' || $view_studentsubject->section === 'Secondary')

                <form action="{{ url('teacher/createresults') }}" method="post" enctype="multipart/form-data">
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

                  <table class="table table-striped">
                      <thead>
                      <tr>
                      <th>Subjects</th>
                      <th>Continus Assessment Test 1</th>
                      <th>Continus Assessment Test 2</th>
                      {{-- <th>Continus Assessment Test 3</th> --}}
                      <th>Examination Scores</th>
                        
                      </tr>
                      </thead>
                      <tbody>

                          @foreach ($view_teachersubjects as $view_teachersubject)
                            @if ($view_teachersubject->section == 'Senior Secondary' || $view_teachersubject->section == 'Junior Secondary')
                            <tr>
                                    <td>{{ $view_teachersubject->subject['subjectname'] }} <input type="hidden" value="{{ $view_teachersubject->subject['subjectname'] }}" name="subjectname[]" id=""></td>
                                    <td><input type="text" class="form-control" name="test_1[]" placeholder="Test 1"></td>
                                    <td><input type="text" class="form-control" name="test_2[]" placeholder="Test 2"></td>
                                    {{-- <td><input type="text" class="form-control" name="test_3[]" placeholder="Test 3"></td> --}}
                                    <td><input type="text" class="form-control" name="exams[]" placeholder="Examination Scores"></td>
                                    
                                    <input type="hidden" name="signature[]" value="{{ Auth::guard('teacher')->user()->signature }}" placeholder="Teacher ID">
                                    <input type="hidden" name="lga[]" value="{{ Auth::guard('teacher')->user()->school['lga'] }}" placeholder="Teacher ID">
                                    <input type="hidden" name="teacher_id[]" value="{{ Auth::guard('teacher')->user()->id }}" placeholder="Teacher ID">
                                    <input type="hidden" name="user_id[]" value="{{ $view_studentsubject->user_id }}" placeholder="Teacher ID">
                                    <input type="hidden" name="address[]" value="{{ $view_studentsubject->address }}" placeholder="Teacher ID">
                                    <input type="hidden" name="section[]" value="{{ $view_studentsubject->section }}" placeholder="Teacher ID">
                                    <input type="hidden" name="motor[]" value="{{ $view_studentsubject->motor }}" placeholder="Teacher ID">
                                    <input type="hidden" name="school_id[]" value="{{ $view_studentsubject->school_id }}" placeholder="Teacher ID">
                                    <input type="hidden" name="student_id[]" value="{{ $view_studentsubject->id }}" placeholder="ID">
                                    <input type="hidden" name="slug[]" value="{{ Auth::guard('teacher')->user()->school['slug'] }}" placeholder="ID">
                                    <input type="hidden" name="term[]" value="{{ $view_studentsubject->term }}" placeholder="Term">
                                    <input type="hidden" name="academic_session[]" value="{{ $view_studentsubject->academic_session }}" placeholder="academic_session">
                                    <input type="hidden" name="regnumber[]" value="{{ $view_studentsubject->regnumber }}" placeholder="regnumber">
                                    {{-- <input type="hidden" name="guardian_id[]" value="{{ $view_studentsubject->guardian_id }}" placeholder="Parent ID"> --}}
                                    <input type="hidden" name="classname[]" value="{{ $view_studentsubject->classname }}" placeholder="Parent ID">
                                    <input type="hidden" name="fname[]" value="{{ $view_studentsubject->fname }}" placeholder="Parent ID">
                                    <input type="hidden" name="middlename[]" value="{{ $view_studentsubject->middlename }}" placeholder="Parent ID">
                                    <input type="hidden" name="surname[]" value="{{ $view_studentsubject->surname }}" placeholder="Parent ID">
                                    <input type="hidden" name="gender[]" value="{{ $view_studentsubject->gender }}" placeholder="Parent ID">
                                    <input type="hidden" name="images[]" value="{{ $view_studentsubject->images }}" placeholder="Parent ID">
                                    <input type="hidden" name="logo[]" value="{{ Auth::guard('teacher')->user()->logo }}" placeholder="Parent ID">
                                    <input type="hidden" name="schoolname[]" value="{{ Auth::guard('teacher')->user()->schoolname }}" placeholder="Parent ID">
                                    <td><input type="hidden" class="form-control" name="alms[]" placeholder="Examination Scores"></td>
                                       
                                  </tr>

                            @else
                            
                                    
                            @endif

                          @endforeach
                      

                      </tbody>
                    </table>
                
                  {{-- @else
                      
                @endif --}}
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <button type="submit" class="btn btn-success"><i class="far fa-bell"></i> 
                    Submit 
                  </button>
        <div class="row">
          
        
          @endif
              </div>
           

                </form>
                
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>





  
    </div>
    <!-- /.row -->
















    

  </div>
  <!-- /.content-wrapper -->

  
 @include('dashboard.teacher.footer')