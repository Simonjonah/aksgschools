@include('dashboard.admin.header')

  @include('dashboard.admin.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">schoolnews </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              {{-- <li cass="breadcrumb-item"><a href="{{ route('admin.addnidnetsem2leve200l') }}" class="btn btn-success">Add Semester Courses</a></li> --}}
              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">schoolnews  </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
       
          <!-- right column -->
          <div class="col-md-12">
            
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Register Activities</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ url('admin/editschoolnews/'.$edit_school->ref_no) }}" method="post" enctype="multipart/form-data">
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
                  @endif
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label> Title</label>
                        {{-- <input type="text" name="academic_session" value="{{ Auth::guard('web')->user()-> }}" id=""> --}} 
                        {{-- <input type="text" name="user_id" value="{{ $edit_school->id }}" id=""> --}}
                        <input type="hidden" name="schoolname" value="{{ $edit_school->schoolname }}" id="">
                        <input type="hidden" name="address" value="{{ $edit_school->address }}" id="">
                        <input type="hidden" name="email" value="{{ $edit_school->email }}" id="">
                        <input type="hidden" name="phone" value="{{ $edit_school->phone }}" id="">
                        <input type="hidden" name="logo" value="{{ $edit_school->logo }}" id="">
                        <input type="hidden" name="slug" value="{{ $edit_school->slug }}" id="">
                       
                        <input type="text" class="form-control" value="{{ $edit_school->title }}" name="title" placeholder="title">

                      </div>

                      
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                          <label> Email</label>
                          <input type="text" class="form-control" value="{{ $edit_school->email }}" name="title" placeholder="title">
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label> Address</label>
                          <input type="text" class="form-control" value="{{ $edit_school->address }}" name="title" placeholder="title">
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label> Schools</label>
                          <input type="text" class="form-control" value="{{ $edit_school->schoolname }}" name="title" placeholder="title">
                        </div>
                      </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                          <label> Phone</label>
                          <input type="text" class="form-control" value="{{ $edit_school->phone }}" name="title" placeholder="title">
                        </div>
                      </div>
                   
                  
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            <img style="width: 10%; height: 60px;" src="{{ URL::asset("/public/../$edit_school->images")}}" alt="">
                          <label>Image </label>
                        <input type="file" name="images" @error('images')
                        @enderror  value="" class="form-control" >
                         
                        </div>
                        @error('images')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <textarea id="compose-textarea"  name="messages" placeholder="Message ....." class="form-control" style="height: 300px">
                                {!! $edit_school->messages !!}
                            </textarea>
                        </div>
                      </div>
                      
                     
                      <div class="col-sm-6">
                        <div class="form-group">
                            {{-- <a href="{{ url('admin/home') }}" class="btn btn-primary">Back</a> --}}
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                      

                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2023 <a href="httpS://myschoolafrica.com">Myschoolafrica.com</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->




<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script src="{{ asset('assets/assets/dist/js/demo.js') }}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
    $(function () {
      //Add text editor
      $('#compose-textarea').summernote()
    })
  </script>
</body>
</html>


