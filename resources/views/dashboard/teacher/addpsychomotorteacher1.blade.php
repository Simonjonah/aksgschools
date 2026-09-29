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

    @if (Auth::guard('teacher')->user()->section == 'Primary')
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">DOMAINS</h5>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <div class="btn-group">
                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                  <i class="fas fa-wrench"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" role="menu">
                  <a href="#" class="dropdown-item">Action</a>
                  <a href="#" class="dropdown-item">Another action</a>
                  <a href="#" class="dropdown-item">Something else here</a>
                  <a class="dropdown-divider"></a>
                  <a href="#" class="dropdown-item">Separated link</a>
                </div>
              </div>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                {{-- <p class="hidden-center">
                  <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                </p> --}}

                <div class="table-responsive">
                  {{-- <p class="lead">Behaviour</p> --}}
    
                  <form action="{{ url('teacher/createpsychomotorobyteacher') }}" method="post">
                    @csrf

                    {{-- @method('PUT') --}}
                    @if (Session::get('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success') }}
                  </div>
                  @endif

                  @if (Session::get('fail'))
                  <div class="alert alert-danger">
                  {{ Session::get('fail') }}
                  @endif
                      <table class="table table-bordered">
                        <tr>
                          <th style="width:50%">COGNITIVE BEHAVIOUR:</th>
                          <!-- <th style="width:50%"></th> -->
                          <th style="width:50%">A</th>

                          <th style="width:50%">B</th>
                          <th style="width:50%">C</th>
                          <th style="width:50%">D</th>
                          <th style="width:50%">E</th>
                        </tr>
                       @foreach ($view_yourdomains as $view_yourdomain)
                        @if ($view_yourdomain->psycomoto == 'Cognitive Domain' && $view_yourdomain->section == 'Primary')
                        <tr>
                            <th>{{ $view_yourdomain->cogname }} <input type="hidden" value="{{ $view_yourdomain->cogname }}" name="cogname[]" value="Yes" id=""></th>
                            <td><select name="punt1[]" class="form-control" id="">
                              <option value="">No</option>  
                              <option value="Yes">Yes</option>  
                            </select></td>
                            <td><select name="punt2[]" class="form-control" id="">
                              <option value="">No</option>  
                              <option value="Yes">Yes</option>  
                            </select></td>
                            <td><select name="punt3[]" class="form-control" id="">
                              <option value="">No</option>  
                              <option value="Yes">Yes</option>  
                            </select></td>

                            <td><select name="punt4[]" class="form-control" id="">
                              <option value="">No</option>  
                              <option value="Yes">Yes</option>  
                            </select></td>
                            <td><select name="punt5[]" class="form-control" id="">
                              <option value="">No</option>  
                              <option value="Yes">Yes</option>  
                            </select></td>
                            <input type="hidden" name="psycomoto[]" value="{{ $view_yourdomain->psycomoto }}" id="">
                            <input type="hidden" name="teacher_id[]" value="{{ Auth::guard('teacher')->user()->id }}" id="">
                            <input type="hidden" name="student_id[]" value="{{ $view_yourtudents->student_id }}" id="">
                            <input type="hidden" name="ref_no1[]" value="{{ $view_yourdomain->ref_no1 }}" id="">
                            <input type="hidden" name="term[]" value="{{ Auth::guard('teacher')->user()->term }}" id="">
                          <input type="hidden" name="regnumber[]" value="{{ $view_yourtudents->regnumber }}" id="">
                          <input type="hidden" name="section[]" value="{{ $view_yourtudents->section }}" id="">
                          <input type="hidden" name="academic_session[]" value="{{ $view_yourtudents->academic_session }}" id="">
                          <input type="hidden" name="classname[]" value="{{ $view_yourtudents->classname }}" id="">
                            
                          </tr>
                        @else
                            
                        @endif
                       
                       @endforeach
                        
    
                        
                      </table>
                      <div class="form-group">
                          {{-- <textarea class="form-control" name="teacher_comment[]" id="" cols="20" rows="5" placeholder="Teacher's Comment"></textarea> --}}
                      </div>

                      <div class="form-group">
                        {{-- <input class="form-control" name="nextterm" placeholder="Next term"> --}}
                    </div>
                </div>
               
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                {{-- <p class="text-center">
                  <strong>Goal Completion</strong>
                </p> --}}

                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th style="width:50%">PSYCHOMOTOR SKILLS:</th>
                      <th style="width:50%">A</th>
                      <th style="width:50%">B</th>
                      <th style="width:50%">C</th>
                      <th style="width:50%">D</th>
                      <th style="width:50%">E</th>
                    </tr>
                    @foreach ($view_yourdomains as $view_yourdomain)
                        @if ($view_yourdomain->psycomoto == 'Psychomotor Domain' && $view_yourdomain->section == 'Primary')
                        <tr>
                          <th>{{ $view_yourdomain->cogname }} <input type="hidden" value="{{ $view_yourdomain->cogname }}" name="cogname[]" value="Yes" id=""></th>
                          <td><select name="punt1[]" class="form-control" id="">
                            <option value="">No</option>  
                            <option value="Yes">Yes</option>  
                          </select></td>
                          <td><select name="punt2[]" class="form-control" id="">
                            <option value="">No</option>  
                            <option value="Yes">Yes</option>  
                          </select></td>
                          <td><select name="punt3[]" class="form-control" id="">
                            <option value="">No</option>  
                            <option value="Yes">Yes</option>  
                          </select></td>

                          <td><select name="punt4[]" class="form-control" id="">
                            <option value="">No</option>  
                            <option value="Yes">Yes</option>  
                          </select></td>
                          <td><select name="punt5[]" class="form-control" id="">
                            <option value="">No</option>  
                            <option value="Yes">Yes</option>  
                          </select></td>
                        
                          <input type="hidden" name="teacher_id[]" value="{{ Auth::guard('teacher')->user()->id }}" id="">
                          <input type="hidden" name="student_id[]" value="{{ $view_yourtudents->student_id }}" id="">
                          <input type="hidden" name="ref_no1[]" value="{{ $view_yourdomain->ref_no1 }}" id="">
                          <input type="hidden" name="term[]" value="{{ Auth::guard('teacher')->user()->term }}" id="">
                          <input type="hidden" name="psycomoto[]" value="{{ $view_yourdomain->psycomoto }}" id="">
                          {{-- <input type="hidden" name="regnumber[]" value="{{ $view_yourtudents->regnumber }}" id=""> --}}
                          <input type="hidden" name="regnumber[]" value="{{ $view_yourtudents->regnumber }}" id="">
                          <input type="hidden" name="section[]" value="{{ $view_yourtudents->section }}" id="">
                          <input type="hidden" name="academic_session[]" value="{{ $view_yourtudents->academic_session }}" id="">
                          <input type="hidden" name="classname[]" value="{{ $view_yourtudents->classname }}" id="">
                            
                        </tr>
                        @else
                        @endif
                       @endforeach
                  
                  </table>
    
                </div>
                <table class="table table-bordered">
                  <tr>
                    <th style="width:50%"></th>
                    <th style="width:50%">KEY</th>
                    
                  </tr>
                  <tr>
                    <th>A</th>
                    <td>Excellence</td>
                  </tr>
                  <tr>
                    <th>B</th>
                    <td>Very Good</td>
                  </tr>
  
                  <tr>
                    <th>C</th>
                    <td>Good</td>
                  </tr>
                  <tr>
                    <th>D</th>
                    <td>Needs Improvement</td>
                  </tr>
  
                  <tr>
                    <th>E</th>
                    <td>Unsatisfactory</td>
                  </tr>
                  
                </table>
              </div>
              <button type="submit" class="btn btn-success"><i class="far fa-bell"></i> 
                Submit 
              </button>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    @else

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">DOMAINS</h5>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <div class="btn-group">
                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                  <i class="fas fa-wrench"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" role="menu">
                  <a href="#" class="dropdown-item">Action</a>
                  <a href="#" class="dropdown-item">Another action</a>
                  <a href="#" class="dropdown-item">Something else here</a>
                  <a class="dropdown-divider"></a>
                  <a href="#" class="dropdown-item">Separated link</a>
                </div>
              </div>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                {{-- <p class="hidden-center">
                  <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                </p> --}}

                <div class="table-responsive">
                  {{-- <p class="lead">Behaviour</p> --}}
    
                  <form action="{{ url('teacher/createpsychomotorobyteacher') }}" method="post">
                    @csrf

                    {{-- @method('PUT') --}}
                    @if (Session::get('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success') }}
                  </div>
                  @endif

                  @if (Session::get('fail'))
                  <div class="alert alert-danger">
                  {{ Session::get('fail') }}
                  @endif
                      <table class="table table-bordered">
                        <tr>
                          <th style="width:50%">COGNITIVE BEHAVIOUR:</th>
                          <th style="width:50%"></th>
                          <th style="width:50%">A</th>

                          <th style="width:50%">B</th>
                          <th style="width:50%">C</th>
                          <th style="width:50%">D</th>
                          <th style="width:50%">E</th>
                        </tr>
                       @foreach ($view_yourdomains as $view_yourdomain)
                        @if ($view_yourdomain->psycomoto == 'Cognitive Domain' && $view_yourdomain->section == 'Senior Secondary')
                        <tr>
                            <th>{{ $view_yourdomain->cogname }} <input type="hidden" value="{{ $view_yourdomain->cogname }}" name="cogname[]" value="Yes" id=""></th>
                            <td><input type="hidden" name="psycomoto[]" value="{{ $view_yourdomain->psycomoto }}" id=""></td>
                            <td><select name="punt1[]" class="form-control" id="">
                              <option value="">No</option>  
                              <option value="Yes">Yes</option>  
                            </select></td>
                            <td><select name="punt2[]" class="form-control" id="">
                              <option value="">No</option>  
                              <option value="Yes">Yes</option>  
                            </select></td>
                            <td><select name="punt3[]" class="form-control" id="">
                              <option value="">No</option>  
                              <option value="Yes">Yes</option>  
                            </select></td>

                            <td><select name="punt4[]" class="form-control" id="">
                              <option value="">No</option>  
                              <option value="Yes">Yes</option>  
                            </select></td>
                            <td><select name="punt5[]" class="form-control" id="">
                              <option value="">No</option>  
                              <option value="Yes">Yes</option>  
                            </select></td>
                          
                            <input type="hidden" name="teacher_id[]" value="{{ Auth::guard('teacher')->user()->id }}" id="">
                            <input type="hidden" name="student_id[]" value="{{ $view_yourtudents->student_id }}" id="">
                            <input type="hidden" name="ref_no1[]" value="{{ $view_yourdomain->ref_no1 }}" id="">
                            <input type="hidden" name="term[]" value="{{ Auth::guard('teacher')->user()->term }}" id="">
                          <input type="hidden" name="regnumber[]" value="{{ $view_yourtudents->regnumber }}" id="">
                          {{-- <input type="hidden" name="regnumber[]" value="{{ $view_yourtudents->regnumber }}" id=""> --}}
                          <input type="hidden" name="section[]" value="{{ $view_yourtudents->section }}" id="">
                          <input type="hidden" name="academic_session[]" value="{{ $view_yourtudents->academic_session }}" id="">
                          <input type="hidden" name="classname[]" value="{{ $view_yourtudents->classname }}" id="">
                            
                          </tr>
                        @else
                            
                        @endif
                       
                       @endforeach
                        
    
                        
                      </table>
                      <div class="form-group">
                          <textarea class="form-control" name="teacher_comment[]" id="" cols="20" rows="5" placeholder="Teacher's Comment"></textarea>
                      </div>

                      <div class="form-group">
                        <input class="form-control" name="nextterm" placeholder="Next term">
                    </div>
                </div>
               
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                {{-- <p class="text-center">
                  <strong>Goal Completion</strong>
                </p> --}}

                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th style="width:50%">PSYCHOMOTOR SKILLS:</th>
                      <th style="width:50%"></th>

                      <th style="width:50%">A</th>
                      <th style="width:50%">B</th>
                      <th style="width:50%">C</th>
                      <th style="width:50%">D</th>
                      <th style="width:50%">E</th>
                    </tr>
                    @foreach ($view_yourdomains as $view_yourdomain)
                        @if ($view_yourdomain->psycomoto == 'Psychomotor Domain' && $view_yourdomain->section == 'Senior Secondary')
                        <tr>
                          <th>{{ $view_yourdomain->cogname }} <input type="hidden" value="{{ $view_yourdomain->cogname }}" name="cogname[]" value="Yes" id=""></th>
                          <td><input type="hidden" name="psycomoto[]" value="{{ $view_yourdomain->psycomoto }}" id=""></td>
                          <td><select name="punt1[]" class="form-control" id="">
                            <option value="">No</option>  
                            <option value="Yes">Yes</option>  
                          </select></td>
                          <td><select name="punt2[]" class="form-control" id="">
                            <option value="">No</option>  
                            <option value="Yes">Yes</option>  
                          </select></td>
                          <td><select name="punt3[]" class="form-control" id="">
                            <option value="">No</option>  
                            <option value="Yes">Yes</option>  
                          </select></td>

                          <td><select name="punt4[]" class="form-control" id="">
                            <option value="">No</option>  
                            <option value="Yes">Yes</option>  
                          </select></td>
                          <td><select name="punt5[]" class="form-control" id="">
                            <option value="">No</option>  
                            <option value="Yes">Yes</option>  
                          </select></td>
                        
                          <input type="hidden" name="teacher_id[]" value="{{ Auth::guard('teacher')->user()->id }}" id="">
                          <input type="hidden" name="student_id[]" value="{{ $view_yourtudents->student_id }}" id="">
                          <input type="hidden" name="ref_no1[]" value="{{ $view_yourdomain->ref_no1 }}" id="">
                          <input type="hidden" name="term[]" value="{{ Auth::guard('teacher')->user()->term }}" id="">
                          <input type="hidden" name="regnumber[]" value="{{ $view_yourtudents->regnumber }}" id="">
                          <input type="hidden" name="section[]" value="{{ $view_yourtudents->section }}" id="">
                          <input type="hidden" name="academic_session[]" value="{{ $view_yourtudents->academic_session }}" id="">
                          <input type="hidden" name="classname[]" value="{{ $view_yourtudents->classname }}" id="">
                            
                          {{-- <input type="hidden" name="regnumber[]" value="{{ $view_yourtudents->regnumber }}" id=""> --}}

                        </tr>
                        @else
                        @endif
                       @endforeach
                  
                  </table>
    
                </div>
                <table class="table table-bordered">
                  <tr>
                    <th style="width:50%"></th>
                    <th style="width:50%">KEY</th>
                    
                  </tr>
                  <tr>
                    <th>A</th>
                    <td>Excellence</td>
                  </tr>
                  <tr>
                    <th>B</th>
                    <td>Very Good</td>
                  </tr>
  
                  <tr>
                    <th>C</th>
                    <td>Good</td>
                  </tr>
                  <tr>
                    <th>D</th>
                    <td>Needs Improvement</td>
                  </tr>
  
                  <tr>
                    <th>E</th>
                    <td>Unsatisfactory</td>
                  </tr>
                  
                </table>
              </div>
              <button type="submit" class="btn btn-success"><i class="far fa-bell"></i> 
                Submit 
              </button>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

      
    @endif
  
    















    

  </div>
  <!-- /.content-wrapper -->

  
 @include('dashboard.teacher.footer')