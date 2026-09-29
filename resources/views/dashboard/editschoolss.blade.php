@include('dashboard.header')

  @include('dashboard.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
l            <ol class="breadcrumb float-sm-right">
              {{-- <li cass="breadcrumb-item"><a href="{{ route('admin.addnidnetsem2leve200l') }}" class="btn btn-success">Add Semester Courses</a></li> --}}
              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Edit  </li>
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
                <h3 class="card-fname">Edit</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ url('web/updatesch/'.$edit_schools->ref_no1) }}" method="post" enctype="multipart/form-data">
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
                      
                      
                      <div class="form-group">
                        <label> School Name</label>
                        <input class="form-control" type="text" name="schoolname" value="{{ $edit_schools->schoolname }}" id="">
                        
                      </div>

                      <div class="form-group">
                        <label> Address </label>
                        <input class="form-control" class="form-control" type="text" name="address" value="{{ $edit_schools->address }}" id="">
                      </div>

                      <div class="form-group">
                        <label> School Motor </label>
                        <input class="form-control" class="form-control" type="text" name="motor" value="{{ $edit_schools->motor }}" id="">
                      </div>

                      <div class="form-group">
                            <label> Section </label>
                            <select name="section" class="form-control">
                            <option value="{{ $edit_schools->section }}">{{ $edit_schools->section }}</option>
                            <option value="Primary">Primary</option>
                                <option value="Secondary">Secondary</option>
                            </select>    
                        </div>

                       

                      
                    </div>
                   
                  
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Image </label>
                          <td><img style="width: 30%; height: 60px;" src="{{ URL::asset("/public/../$edit_schools->logo")}}" alt=""></td>

                        <input type="file" name="logo" @error('logo')
                        @enderror  value="" class="form-control" >
                         
                        </div>
                        @error('logo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                        <label> LGA </label>
                            <select name="lga" class="form-control">
                            <option value="{{ $edit_schools->lga }}">{{ $edit_schools->lga }}</option>

                                @foreach ($view_lgas as $view_lga)
                                    <option value="{{ $view_lga->lga }}">{{ $view_lga->lga }}</option>
                                @endforeach
                            </select>    
                      </div>
                      <div class="form-group">
                            <label> School Type </label>
                            <select name="schooltype" class="form-control">
                            <option value="{{ $edit_schools->schooltype }}">{{ $edit_schools->schooltype }}</option>
                            <option value="SUBEB">SUBEB</option>
                                <option value="SSEB">SSEB</option>
                            </select>    
                        </div>

                      
                        
                      </div>

                      
                     
                      <div class="col-sm-6">
                        <div class="form-group">
                            {{-- <a href="{{ url('admin/viewEdit') }}" class="btn btn-primary">Back</a> --}}
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
  @include('dashboard.footer')