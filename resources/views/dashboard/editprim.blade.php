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
                <form action="{{ url('admin/updatehm/'.$edit_principal->ref_no) }}" method="post" enctype="multipart/form-data">
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
                        <label> First Name</label>
                        <input type="text" name="fname" class="form-control" value="{{ $edit_principal->fname }}" id="">
                        
                      </div>

                      <div class="form-group">
                        <label> Last Name</label>
                        <input type="text" class="form-control" name="surname" value="{{ $edit_principal->surname }}" id="">
                        <input type="hidden" name="address" value="{{ Auth::guard('web')->user()->address }}" id="">
                        <input type="hidden" name="email" value="{{ Auth::guard('web')->user()->email }}" id="">
                        <input type="hidden" name="phone" value="{{ Auth::guard('web')->user()->phone }}" id="">
                        <input type="hidden" name="images" value="{{ Auth::guard('web')->user()->images }}" id="">
                      </div>

                      <div class="form-group">
                        <label> School Name</label>
                        <input class="form-control" type="text" name="schoolname" value="{{ $edit_principal->school['schoolname'] }}" id="">
                        
                      </div>

                      <div class="form-group">
                        <label> Address </label>
                        <input class="form-control" class="form-control" type="text" name="address" value="{{ $edit_principal->school['address'] }}" id="">
                      </div>

                      <div class="form-group">
                        <label> School Motor </label>
                        <input class="form-control" class="form-control" type="text" name="motor" value="{{ $edit_principal->school['motor'] }}" id="">
                      </div>

                      <div class="form-group">
                        <label> Phone </label>
                        <input class="form-control" class="form-control" type="text" name="phone" value="{{ $edit_principal->phone }}" id="">
                        
                      </div>

                      
                    </div>
                   
                  
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Image </label>
                          <td><img style="width: 30%; height: 60px;" src="{{ URL::asset("/public/../$edit_principal->images")}}" alt=""></td>

                        <input type="file" name="images" @error('images')
                        @enderror  value="" class="form-control" >
                         
                        </div>
                        @error('images')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                        <label> LGA </label>
                            <select name="lga" class="form-control">
                            <option value="{{ $edit_principal->school['lga'] }}">{{ $edit_principal->school['lga'] }}</option>

                                @foreach ($view_lgas as $view_lga)
                                    <option value="{{ $view_lga->lga }}">{{ $view_lga->lga }}</option>
                                @endforeach
                            </select>    
                      </div>
                      <div class="form-group">
                        <label> Email </label>
                        <input class="form-control" class="form-control" type="text" name="email" value="{{ $edit_principal->email }}" id="">
                        
                      </div>

                      
                         <div class="form-group">
                            <label> Section </label>
                            <select name="section" class="form-control">
                            <option value="{{ $edit_principal->school['section'] }}">{{ $edit_principal->school['section'] }}</option>
                            <option value="Primary">Primary</option>
                                <option value="Secondary">Secondary</option>
                            </select>    
                        </div>

                        <div class="form-group">
                            <label> School Type </label>
                            <select name="schooltype" class="form-control">
                            <option value="{{ $edit_principal->school['schooltype'] }}">{{ $edit_principal->school['schooltype'] }}</option>
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