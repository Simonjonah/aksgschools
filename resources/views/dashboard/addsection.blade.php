@include('dashboard.header')
  @include('dashboard.sidebar')

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
              <h3 class="card-title">Add Section</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              {{-- <div class="form-group">
                <input class="form-control" placeholder="To:">
              </div> --}}

                <form action="{{ url('web/createsection') }}" method="post" enctype="multipart/form-data">

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
                <div class="form-group">
                  <input type="hidden" class="form-control" name="ref_no1" value="{{ Auth::guard('web')->user()->ref_no1 }}" placeholder=":">

                  <input type="hidden" class="form-control" name="user_id" value="{{ Auth::guard('web')->user()->id }}" placeholder=":">
                  <input type="hidden" class="form-control" name="connect" value="{{ Auth::guard('web')->user()->connect }}" placeholder=":">
                  {{-- <input class="form-control" name="images" value="{{ Auth::guard('web')->user()->images }}" placeholder=":"> --}}
                  <input type="text" class="form-control" name="section" value="" placeholder="Section">
                </div>

                {{-- <div class="form-group">
                    <input type="text" class="form-control" name="topic" value="" placeholder="Topic">
                  </div> --}}

                  {{-- <div class="form-group">
                    <input type="url" class="form-control" name="youtube" value="" placeholder="You Tube Link">
                  </div>
                --}}

                <div class="card-footer">
                  <div class="float-right">
                    {{-- <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button> --}}
                    <button type="submit" class="btn btn-primary">Save</button>
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
  @include('dashboard.footer')