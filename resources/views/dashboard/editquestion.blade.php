@include('dashboard.header')
@include('dashboard.sidebar')
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Questions</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
         
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header p-2">
                
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                 
                  <!-- /.tab-pane -->
                  <div class="active tab-pane" id="timeline">
                    
                    
                   
                     <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none">Set Questions</h3>
                <div class="col-12">
                  <form action="{{ url('web/updatequestion/'.$edit_singlequestion->id) }}" method="post">
                    @csrf
                    @method('PUT')

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
                  <div class="form-group">
                    <p>Teacher Name: {{ Auth::guard('web')->user()->fname }} {{ Auth::guard('web')->user()->surname }}</p>
                    <input type="hidden" class="form-control" value="{{ Auth::guard('web')->user()->id }}" name="user_id" id="" placeholder="Teacher Name">
                </div>

                <div class="form-group">
                  <p>Question</p>
                  <input type="text" class="form-control" value="{{ $edit_singlequestion->question }}" name="question"  placeholder="Question">
              </div>

                <div class="form-group">
                  <p>Subject</p>
                  <input type="text" name="subjectname" class="form-control" value="{{ $edit_singlequestion->subjectname }}" name="subjectname" id="" placeholder="Subject">
                </div>

                <div class="form-group">
                  <p>Option1</p>
                  <input type="text" class="form-control" value="{{ $edit_singlequestion->option1 }}" name="option1" id="" placeholder="Option1">
                </div>

                <div class="form-group">
                  <p>Classname</p>
                  <input type="text" class="form-control" value="{{ $edit_singlequestion->classname }}" name="classname" id="" placeholder="Classname">
                </div>

              

                </div>
              </div>
             <div class="col-12 col-sm-6">
                <div class="form-group">
                  <p>Option2</p>
                  <input type="text" class="form-control" value="{{ $edit_singlequestion->option2 }}" name="option2" id="" placeholder="Option2">
                </div>

                <div class="form-group">
                  <p>Option3</p>
                  <input type="text" class="form-control" value="{{ $edit_singlequestion->option3 }}" name="option3" id="" placeholder="Option3">
                </div>


              <div class="form-group">
                  <p>Answer</p>
                  <input type="text" class="form-control" value="{{ $edit_singlequestion->is_correct }}" name="is_correct" id="" placeholder="Answer">
                </div>

                
                <div class="form-group">
                  <p>Centername</p>
                  <input type="text" class="form-control" value="{{ $edit_singlequestion->centername }}" name="centername" id="" placeholder="centername">
                </div>
                
                <div class="form-group">
									<h5>Term</h5>
									<select name="term" class="form-control"  id="">
										<option value="{{ $edit_singlequestion->term }}">{{ $edit_singlequestion->term }}</option>
										<option value="Pioneer Term">Pioneer Term</option>
										<option value="Penultimate Term">Penultimate Term</option>
										<option value="Premium Term">Premium Term</option>
									</select>
								</div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>

              </form>
              </div>
            </div>
         
        </div>
        <!-- /.card -->
  
      </section>

      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">₦ 4</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ url('student/registersingleprogram') }}" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                  <p>Program Contents</p>
                  <textarea class="form-control" value="" name="course_contents" id="" cols="30" rows="10">ttrr</textarea>
              </div>
                 <div class="form-group">
                    {{-- <p>Course Title</p> --}}
                    <input type="hidden" class="form-control" value="" name="course_title" id="" placeholder="Course Title">
                </div>
               <div class="form-group">
                  <p>Program period</p>
                  <input type="text" class="form-control" value="" name="course_period" id="" placeholder="Course Title">
              </div>
              

            <div class="form-group">
              <p>First Amount</p>
              <input type="text" class="form-control" value="" name="firstsemester_fee" id="" placeholder="Course Title">
          </div>  
          <div class="form-group">
            <p>Second Amount</p>
            <input type="text" class="form-control" value="" name="secondsemester_fee" id="" placeholder="Course Title">
        </div>  
        <div class="form-group">
          <p>Third Amount</p>
          <input type="text" class="form-control" value="" name="thirddsemester_fee" id="" placeholder="Course Title">
        </div>


            <div class="form-group">
              <p> Program</p>
              <input type="text" class="form-control" value="" name="course_programs" id="" placeholder="Course Title">
          </div>

          <div class="form-group">
            {{-- <p>Course id</p> --}}
            <input type="hidden" class="form-control" value="" name="course_id" id="" placeholder="Course Title">
        </div> 
                <div class="form-group">
                  {{-- <p>Course Code</p> --}}
                  <input type="hidden" class="form-control" value="" name="course_code" id="" placeholder="Course Title">
              </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Please Enroll this Course</button>
                </div>
              </form>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    
                      
                                            <!-- /.post -->
                  </div>
                  </div>
               
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
 </div>
    @include('dashboard.footer')