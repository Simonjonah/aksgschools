@include('dashboard.admin.header')

  @include('dashboard.admin.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Transfer Teacher</h1>
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
              <h3 class="card-title">Update Class and term {{ $assign_teachers->fname }} in {{ $assign_teachers->section }} </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ url('admin/assignteachertoclass/'.$assign_teachers->ref_no1) }}" method="post" enctype="multipart/form-data">
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
            <div class="card-body">
                
                
               
              

              <div class="form-group">
                <h5>Assigned Teacher to Class</h5>
                <select name="classname" class="form-control"  id="">
                  @foreach ($view_teachers as $view_teacher)
                    <option value="{{ $view_teacher->classname }}">{{ $view_teacher->fname }}  {{ $view_teacher->surname }} {{ $view_teacher->section }}</option>
                  @endforeach
                  
                  
                </select>
              </div>
                  <div class="form-group">
                    <h5>Term</h5>
                    <select name="term" class="form-control"  id="">
                      
                      
                      <option value="{{ $assign_teachers->term }}">{{ $assign_teachers->term }}</option>
                      <option value="First Term">First Term</option>
                      <option value="Second Term">Second Term</option>
                      <option value="Third Term">Third Term</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <h5>Section</h5>
                    <select name="section" class="form-control"  id="">
                      
                      
                      <option value="{{ $assign_teachers->section }}">{{ $assign_teachers->section }}</option>
                      <option value="Primary">Primary</option>
                      <option value="Secondary">Secondary</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <h5>Class Name</h5>
                    <select name="classname" class="form-control"  id="">
                      @foreach ($view_classes as $view_classe)
                        <option value="{{ $view_classe->classname }}">{{ $view_classe->classname }}</option>
                      @endforeach
                    </select>
                  </div>
                 

                
                    
                    {{-- <input type="hidden" value="{{ $assign_teachers->fname }}" name="fname" class="form-control" placeholder="First Name">
                    <input type="hidden" value="{{ $assign_teachers->middlename }}" name="middlename" class="form-control" placeholder="First Name">
                    <input type="hidden" value="{{ $assign_teachers->surname }}" name="surname" class="form-control" placeholder="First Name">
                    <input type="hidden" value="{{ $assign_teachers->gender }}" name="gender" class="form-control" placeholder="First Name">
                    <input type="hidden" value="{{ $assign_teachers->images }}" name="images" class="form-control">
                   <input type="hidden" value="{{ $assign_teachers->ref_no }}" name="ref_no" class="form-control" placeholder="First Name">
                    <input type="hidden" value="{{ $assign_teachers->id }}" name="student_id" class="form-control" placeholder="First Name">
                    
                    <input type="hidden" value="{{ $assign_teachers->section }}" name="centername" class="form-control" placeholder="First Name"> 
                    <input type="hidden" value="{{ $assign_teachers->entrylevel }}" name="entrylevel" class="form-control" placeholder="entrylevel">  --}}
               
              </div>
       
              
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Assigned</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  </div>
    
  <!-- jQuery -->
<script src="{{  asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{  asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{  asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{  asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{  asset('assets/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{  asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{  asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{  asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{  asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{  asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{  asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{  asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{  asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{  asset('assets/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{  asset('assets/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{  asset('assets/dist/js/demo.js') }}"></script>
</body>
</html>
