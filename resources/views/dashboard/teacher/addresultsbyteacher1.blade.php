@include('dashboard.teacher.header')
@include('dashboard.teacher.sidebar')

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
                    <img style="width: 80px; height: 80px;" src="{{ asset('/public/../'.Auth::guard('teacher')->user()->logo)}}" alt=""> <br>

                
                </div> 
                <!-- /.col -->
               <div class="col-lg-8 col-md-6 col-sm-4 invoice-col" style="text-align: center">
                 
                  <h2 style="text-transform: uppercase;"><strong>{{ $view_studentsubject->schoolname }}</strong></h2>
                  
                  {{ $view_studentsubject->address }} <br>
                  {{ $view_studentsubject->motor }}
                  <b style="color: red">The Result of {{ $view_studentsubject->surname }} {{ $view_studentsubject->fname }} {{ $view_studentsubject->middlename }} of {{ $view_studentsubject->schoolname }} with {{ $view_studentsubject->regnumber }} 
                for {{ $view_studentsubject->section }}
                </b>
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
                      @if ($view_studentsubject->section == 'Primary')
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
                              <th>Continus Assessment Test 3</th>
                              <th>Exams</th>
                              
                            </tr>
                            </thead>
                            <tbody>
      
                                @foreach ($view_teachersubjects as $view_teachersubject)
                                  <tr>
                                    <td>{{ $view_teachersubject->subjectname }} <input type="hidden" value="{{ $view_teachersubject->subjectname }}" name="subjectname[]" id=""></td>
                                    <td><input type="text" class="form-control" name="test_1[]" placeholder="Test 1"></td>
                                    <td><input type="text" class="form-control" name="test_2[]" placeholder="Test 2"></td>
                                    <td><input type="text" class="form-control" name="test_3[]" placeholder="Test 3"></td>
                                    <td><input type="text" class="form-control" name="exams[]" placeholder="Exams"></td>
                                    
                                    <input type="text" name="signature[]" value="{{ Auth::guard('teacher')->user()->signature }}" placeholder="Teacher ID">
                                    <input type="text" name="lga[]" value="{{ Auth::guard('teacher')->user()->school['lga'] }}" placeholder="Teacher ID">
                                    <input type="hidden" name="teacher_id[]" value="{{ Auth::guard('teacher')->user()->id }}" placeholder="Teacher ID">
                                    <input type="hidden" name="user_id[]" value="{{ $view_studentsubject->user_id }}" placeholder="Teacher ID">
                                    <input type="hidden" name="address[]" value="{{ $view_studentsubject->address }}" placeholder="Teacher ID">
                                    <input type="hidden" name="section[]" value="{{ $view_studentsubject->section }}" placeholder="Teacher ID">
                                    <input type="hidden" name="motor[]" value="{{ $view_studentsubject->motor }}" placeholder="Teacher ID">
                                    <input type="hidden" name="school_id[]" value="{{ $view_studentsubject->school_id }}" placeholder="Teacher ID">
                                    <input type="hidden" name="student_id[]" value="{{ $view_studentsubject->id }}" placeholder="ID">
                                    <input type="text" name="slug[]" value="{{ Auth::guard('teacher')->user()->school['slug'] }}" placeholder="ID">
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
                                    <td><input type="hidden" class="form-control" name="alms[]" placeholder="Exams"></td>
                                       
                                  </tr>

                                  
                                   
      
                                @endforeach
                            
      
                            </tbody>
                          </table>
                          <button type="submit" class="btn btn-success"><i class="far fa-bell"></i> 
                          Submit 
                          </button>
                         @else


                            </tbody>
                          </table>
                          <button type="submit" class="btn btn-success"><i class="far fa-bell"></i> 
                          Submit 
                          </button>

                        @endif
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
             
               
          </div>
          <!-- /.col -->
        </div>
  
        <div class="row">
          
        
       
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