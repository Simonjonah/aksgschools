@include('dashboard.header')
@include('dashboard.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subjects </h1>
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
                    <img style="width: 80px; height: 80px;" src="{{ asset('/public/../'.Auth::guard('web')->user()->logo)}}" alt=""> <br>

                
                </div> 
                <!-- /.col -->
               <div class="col-lg-8 col-md-6 col-sm-4 invoice-col" style="text-align: center">
                 
                  <h2 style="text-transform: uppercase;"><strong style="text-transform: uppercase;">{{ Auth::guard('web')->user()->schoolname }}</strong></h2>
                  
                  {{ Auth::guard('web')->user()->address }} <br>
                  {{ Auth::guard('web')->user()->motor }}
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
                      {{-- @if ($view_studentsubject->section === 'Primary') --}}
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
                              <th>Continus Assessment Test 1</th>
                              <th>Continus Assessment Test 2</th>
                              <th>Continus Assessment Test 3</th>
                              <th>Exams</th>
                              
                            </tr>
                            </thead>
                            <tbody>
      
                                @foreach ($view_teachersubjects as $view_teachersubject)
                                  @if ($view_teachersubject->section == 'Primary' || $view_teachersubject->section == 'Elementary' || $view_teachersubject->section == 'Pre-School' || $view_teachersubject->section == 'Creche' ||$view_teachersubject->section == 'Nursery')
                                  <tr>
                                    <td>{{ $view_teachersubject->subjectname }}<input type="hidden" value="{{ $view_teachersubject->subjectname }}" name="subjectname[]" id=""></td>
                                    <td><input type="number" class="form-control" name="test_1[]" placeholder="Test 1"></td>
                                    <td><input type="number" class="form-control" name="test_2[]" placeholder="Test 2"></td>
                                    <td><input type="number" class="form-control" name="test_3[]" placeholder="Test 3"></td>
                                    <td><input type="number" class="form-control" name="exams[]" placeholder="Exams"></td>
                                    
                                    <input type="hidden" name="user_id[]" value="{{ Auth::guard('web')->user()->id }}" placeholder="Teacher ID">
                                    <input type="hidden" name="student_id[]" value="{{ $view_studentsubject->id }}" placeholder="ID">
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
                                    <input type="hidden" name="logo[]" value="{{ Auth::guard('web')->user()->logo }}" placeholder="Parent ID">
                                    <input type="hidden" name="schoolname[]" value="{{ Auth::guard('web')->user()->schoolname }}" placeholder="Parent ID">
                                       
                                  </tr>

                                  @elseif ($view_teachersubject->section == 'Secondary' || $view_teachersubject->section == 'High Schools' || $view_teachersubject->section == 'High School' || $view_teachersubject->section == 'Secondary School' ||$view_teachersubject->section == 'Secondary Schools')
                                  <tr>
                                    <td>{{ $view_teachersubject->subjectname }}<input type="hidden" value="{{ $view_teachersubject->subjectname }}" name="subjectname[]" id=""></td>
                                    <td><input type="number" class="form-control" name="test_1[]" placeholder="Test 1"></td>
                                    <td><input type="number" class="form-control" name="test_2[]" placeholder="Test 2"></td>
                                    <td><input type="number" class="form-control" name="test_3[]" placeholder="Test 3"></td>
                                    <td><input type="number" class="form-control" name="exams[]" placeholder="Exams"></td>
                                   
                                    <input type="hidden" name="user_id[]" value="{{ Auth::guard('web')->user()->id }}" placeholder="Teacher ID">
                                    <input type="hidden" name="student_id[]" value="{{ $view_studentsubject->id }}" placeholder="ID">
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
                                    <input type="hidden" name="logo[]" value="{{ Auth::guard('web')->user()->logo }}" placeholder="Parent ID">
                                    <input type="hidden" name="schoolname[]" value="{{ Auth::guard('web')->user()->schoolname }}" placeholder="Parent ID">
                                       
                                  </tr>
                                  
                                  @else
                                  <tr>
                                    <td>{{ $view_teachersubject->subjectname }}<input type="hidden" value="{{ $view_teachersubject->subjectname }}" name="subjectname[]" id=""></td>
                                    <td><input type="number" class="form-control" name="test_1[]" placeholder="Test 1"></td>
                                    <td><input type="number" class="form-control" name="test_2[]" placeholder="Test 2"></td>
                                    <td><input type="number" class="form-control" name="test_3[]" placeholder="Test 3"></td>
                                    <td><input type="number" class="form-control" name="exams[]" placeholder="Exams"></td>
                                    
                                    <input type="hidden" name="user_id[]" value="{{ Auth::guard('web')->user()->id }}" placeholder="Teacher ID">
                                    <input type="hidden" name="student_id[]" value="{{ $view_studentsubject->id }}" placeholder="ID">
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
                                    <input type="hidden" name="logo[]" value="{{ Auth::guard('web')->user()->logo }}" placeholder="Parent ID">
                                    <input type="hidden" name="schoolname[]" value="{{ Auth::guard('web')->user()->schoolname }}" placeholder="Parent ID">
                                       
                                  </tr>
                                          
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
               
          </div>
          <!-- /.col -->
        </div>
  
        <div class="row">
          
        
          {{-- @endif --}}
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

  
 @include('dashboard.footer')