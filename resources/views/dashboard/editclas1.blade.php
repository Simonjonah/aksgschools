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
              <h3 class="card-title"> Class</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              {{-- <div class="form-group">
                <input class="form-control" placeholder="To:">
              </div> --}}

                <form action="{{ url('admin/updatecclassessc/'.$edit_cless1->connect) }}" method="post" enctype="multipart/form-data">

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
                  <input type="text" class="form-control" name="classname" value="{{ $edit_cless1->classname }}" placeholder="Class name">
                </div>

              

                  <div class="form-group">
                    <label>Select Section</label>
                    <select name="section" class="form-control" id="">
                    <option value="{{ $edit_cless1->section }}">{{ $edit_cless1->section }}</option>

                      @if (Auth::guard('web')->user()->schooltype == 'SUBEB')
                      <option value="Primary">Primary</option>
                        
                      @else
                      <option value="Secondary">Secondary</option>
                      <!-- <option value="Senior Secondary">Senior Secondary</option> -->
                      @endif
                    </select>
                  </div>
                  @if (Auth::guard('web')->user()->schooltype == 'SSEB')
                  <div class="form-group">
                    <label>Select SubSection</label>
                    <select name="subsection" class="form-control" id="">
                    <option value="{{ $edit_cless1->subsection }}">{{ $edit_cless1->subsection }}</option>
                      <option value="Junior Secondary">Junior Secondary</option>
                      <option value="Senior Secondary">Senior Secondary</option>
                    </select>
                  </div>
                  @else
                  @endif


                <div class="card-footer">
                  <div class="float-right">
                    {{-- <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button> --}}
                    <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                  </div>
                  {{-- <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button> --}}
                </div>
              </form>
             
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