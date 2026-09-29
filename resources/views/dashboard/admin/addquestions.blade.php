@include('dashboard.admin.header')


  @include('dashboard.admin.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Courses</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Courses </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none">Set Questions</h3>
                <div class="col-12">
                  <form action="{{ url('admin/addbyadminquestion') }}" method="post">
                    @csrf
                  <div class="form-group">
                    <p>Teacher Name:  {{ Auth::guard('admin')->user()->name }}</p>
                    <input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->id }}" name="user_id" id="" placeholder="Teacher Name">
                </div>

                <div class="form-group">
                  <p>Question</p>
                  <input type="text" class="form-control" value="" name="question"  placeholder="Question">
              </div>

                <div class="form-group">
                  <p>Subject</p>
                  <input type="text" name="subjectname" class="form-control" value="{{ $add_questionbyadmin->subjectname }}" name="subjectname" id="" placeholder="Subject">
                </div>

                <div class="form-group">
                  <p>Option1</p>
                  <input type="text" class="form-control" value="" name="option1" id="" placeholder="Option1">
                </div>

                <div class="form-group">
                  <p>Classname</p>
                  <input type="text" class="form-control" value="{{ Auth::guard('web')->user()->classname }}" name="classname" id="" placeholder="Classname">
                </div>

                {{-- <div class="form-group">
                  <p>Duration</p>
                  <input type="date" class="form-control" value="" name="duration" id="" placeholder="Duration">
                </div> --}}



                </div>
              </div>
             <div class="col-12 col-sm-6">
                <div class="form-group">
                  <p>Option2</p>
                  <input type="text" class="form-control" value="" name="option2" id="" placeholder="Option2">
                </div>

                <div class="form-group">
                  <p>Option3</p>
                  <input type="text" class="form-control" value="" name="option3" id="" placeholder="Option3">
                </div>


              <div class="form-group">
                  <p>Answer</p>
                  <input type="text" class="form-control" value="" name="is_correct" id="" placeholder="Answer">
                </div>

                <div class="form-group">
									<h5>Term</h5>
									<select name="term" class="form-control"  id="">
										<option value="{{ Auth::guard('web')->user()->entrylevel }}">{{ Auth::guard('web')->user()->entrylevel }}</option>
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
  
  <script>
    $(document).ready(function() {
        toastr.options.timeOut = 10000;
        @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
    });
    
    </script>

  <script type="text/javascript">
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
  
      $('.swalDefaultSuccess').click(function() {
        Toast.fire({
          icon: 'success',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.swalDefaultInfo').click(function() {
        Toast.fire({
          icon: 'info',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.swalDefaultError').click(function() {
        Toast.fire({
          icon: 'error',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.swalDefaultWarning').click(function() {
        Toast.fire({
          icon: 'warning',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.swalDefaultQuestion').click(function() {
        Toast.fire({
          icon: 'question',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
  
      $('.toastrDefaultSuccess').click(function() {
        toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
      });
      $('.toastrDefaultInfo').click(function() {
        toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
      });
      $('.toastrDefaultError').click(function() {
        toastr.error('Dear {{ Auth::guard('admin')->user()->name }} you do not have upto N5000 to withraw')
      });
      $('.toastrDefaultWarning').click(function() {
        toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
      });
  
      $('.toastsDefaultDefault').click(function() {
        $(document).Toasts('create', {
          title: 'Toast Title',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultTopLeft').click(function() {
        $(document).Toasts('create', {
          title: 'Toast Title',
          position: 'topLeft',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultBottomRight').click(function() {
        $(document).Toasts('create', {
          title: 'Toast Title',
          position: 'bottomRight',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultBottomLeft').click(function() {
        $(document).Toasts('create', {
          title: 'Toast Title',
          position: 'bottomLeft',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultAutohide').click(function() {
        $(document).Toasts('create', {
          title: 'Toast Title',
          autohide: true,
          delay: 750,
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultNotFixed').click(function() {
        $(document).Toasts('create', {
          title: 'Toast Title',
          fixed: false,
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultFull').click(function() {
        $(document).Toasts('create', {
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
          title: 'Toast Title',
          subtitle: 'Subtitle',
          icon: 'fas fa-envelope fa-lg',
        })
      });
      $('.toastsDefaultFullImage').click(function() {
        $(document).Toasts('create', {
          body: 'Dear {{ Auth::guard('admin')->user()->name }} your account has been suspended, please contact Whatsapp',
          title: 'Suspended',
          class: 'bg-danger', 
          subtitle: 'Subtitle',
          image: '{{ asset('/public/../'.Auth::guard('admin')->user()->images)}}',
          imageAlt: 'User Picture',
        })
      });
      $('.toastsDefaultSuccess').click(function() {
        $(document).Toasts('create', {
          class: 'bg-success', 
          title: 'Toast Title',
          subtitle: 'Subtitle',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultInfo').click(function() {
        $(document).Toasts('create', {
          class: 'bg-info', 
          title: 'Toast Title',
          subtitle: 'Subtitle',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultWarning').click(function() {
        $(document).Toasts('create', {
          class: 'bg-warning', 
          title: 'Toast Title',
          subtitle: 'Subtitle',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultDanger').click(function() {
        $(document).Toasts('create', {
          class: 'bg-danger', 
          title: 'Toast Title',
          subtitle: 'Subtitle',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultMaroon').click(function() {
        $(document).Toasts('create', {
          class: 'bg-maroon', 
          title: 'Toast Title',
          subtitle: 'Subtitle',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
    });
  
  </script>
  <script>
    window.addEventListener('showtoastr', function(event){
      toastr.remove();
      if (event.detail.type == 'info') {
        toastr.info(event.detail.message);
      }eleif(event.detail.type == 'success'){
        toastr.success(event.detail.message);
      }eleif(event.detail.type == 'error'){
        toastr.error(event.detail.message);
      }eleif(event.detail.type == 'warning'){
        toastr.warning(event.detail.message);
      }else{
        return false;
      }

    });
  </script>
    @include('dashboard.admin.footer')