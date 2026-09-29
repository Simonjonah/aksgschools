@include('dashboard.teacher.header')
  @include('dashboard.teacher.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <!-- Main content -->
   <section class="content">
    <div class="container-fluid">
      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Add Subjects</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              {{-- <div class="form-group">
                <input class="form-control" placeholder="To:">
              </div> --}}

                <form action="{{ url('teacher/updatesubjectscbyhead/'.$edit_subject->id) }}" method="post" enctype="multipart/form-data">

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
                
                  @method('PUT')
                <div class="form-group">
                  <!-- <input type="hidden" class="form-control" name="user_id" value="{{ Auth::guard('teacher')->user()->id }}" placeholder=":"> -->
                  {{-- <input class="form-control" name="images" value="{{ Auth::guard('teacher')->user()->images }}" placeholder=":"> --}}
                  <input type="text" class="form-control" name="subjectname" value="{{ $edit_subject->subjectname }}" placeholder="Subject">
                </div>

                <div class="form-group">
                    <select name="section" class="form-control" id="">
                    <option value="{{ $edit_subject->section }}">{{ $edit_subject->section }}</option>

                      @if (Auth::guard('teacher')->user()->schooltype == 'SUBEB')
                      <option value="Primary">Primary</option>
                        
                      @else
                      <option value="Senior Secondary">Senior Secondary</option>
                      <option value="Junior Secondary">Junior Secondary</option>
                        
                      @endif
                    </select>
                  </div>

                  {{-- <div class="form-group">
                    <input type="url" class="form-control" name="youtube" value="" placeholder="You Tube Link">
                  </div>
                --}}

                <div class="card-footer">
                  <div class="float-right">
                    {{-- <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button> --}}
                    <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                  </div>
                  {{-- <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button> --}}
                </div>
              </form>
              
              {{-- <div class="form-group">
                <div class="btn btn-default btn-file">
                  <i class="fas fa-paperclip"></i> Attachment
                  <input type="file" name="attachment">
                </div>
                <p class="help-block">Max. 32MB</p>
              </div> --}}
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <div class="float-right">
                {{-- <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button> --}}
                {{-- <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button> --}}
              </div>
              {{-- <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button> --}}
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
    <!-- /.content -->
  </div>
 @include('dashboard.teacher.footer')