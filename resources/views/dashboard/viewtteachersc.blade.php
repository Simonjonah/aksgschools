@include('dashboard.header')

  @include('dashboard.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">View Teacher </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
l            <ol class="breadcrumb float-sm-right">
              {{-- <li cass="breadcrumb-item"><a href="{{ route('admin.addnidnetsem2leve200l') }}" class="btn btn-success">Add Semester Courses</a></li> --}}
              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">View Teacher  </li>
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
                <h3 class="card-title">Edit {{ $edit_teacher->schoolname }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ url('web/updatesteacher/'.$edit_teacher->ref_no) }}" method="post" enctype="multipart/form-data">
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
                  @method('PUT')
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label> First name</label>
                        {{-- <input type="text" name="academic_session" value="{{ Auth::guard('web')->user()-> }}" id=""> --}}
                        <input type="hidden" name="user_id" value="{{ Auth::guard('web')->user()->id }}" id="">
                        {{-- <input type="hidden" name="schoolname" value="{{ Auth::guard('web')->user()->schoolname }}" id=""> --}}
                        {{-- <input type="hidden" name="ref_no" value="{{ Auth::guard('web')->user()->ref_no1 }}" id=""> --}}
                        {{-- <input type="hidden" name="address" value="{{ Auth::guard('web')->user()->address }}" id=""> --}}
                        {{-- <input type="text" name="logo" value="{{ Auth::guard('web')->user()->logo }}" id=""> --}}
                        {{-- <input type="text" name="email" value="{{ Auth::guard('web')->user()->email }}" id=""> --}}
                        <input type="text" value="{{ $edit_teacher->fname }}" class="form-control" name="fname" placeholder="fname">

                      </div>

                      
                    </div>
                   
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Surname</label>
                        <input type="text" value="{{ $edit_teacher->surname }}" required name="surname" class="form-control" placeholder="Surname">

                      </div>
                    </div>
                   
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="text" value="{{ $edit_teacher->phone }}" required name="phone" class="form-control" placeholder="Phone">

                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" value="{{ $edit_teacher->email }}" required name="phone" class="form-control" placeholder="Phone">

                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>School Name</label>
                        <input type="text" value="{{ $edit_teacher->schoolname }}" required name="phone" class="form-control" placeholder="Phone">

                      </div>
                    </div>
                    
                   
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Alms</label>
                        <select name="alms" class="form-control" id="">
                          @foreach ($view_alms as $view_alm)
                            <option value="{{ $view_alm->alms }}">{{ $view_alm->alms }}</option>
                            
                          @endforeach
                        </select>
                    
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Term</label>
                        <select name="term" class="form-control" id="">
                          @foreach ($view_terms as $view_term)
                            <option value="{{ $view_term->term }}">{{ $view_term->term }}</option>
                          @endforeach
                          
                        </select>
                    
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Section</label>
                        <select name="section" class="form-control" id="">
                          @foreach ($view_sesions as $view_sesion)
                          <option value="{{ $view_sesion->section }}">{{ $view_sesion->section }}</option>
                          @endforeach
                          
                        </select>
                    
                      </div>
                    </div>

                      
                    
                     
                      
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Academic Session </label>
                          <select name="academic_session" class="form-control" id="">
                            @foreach ($view_sessions as $view_sesion)
                            <option value="{{ $view_sesion->academic_session }}">{{ $view_sesion->academic_session }}</option>
                            @endforeach
                          </select>
                        
                        </div>
                        @error('academic_session')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Class </label>
                          <select name="classname" class="form-control" id="">
                            @foreach ($view_classes as $view_classe)
                            <option value="{{ $view_classe->classname }}">{{ $view_classe->classname }}</option>
                            @endforeach
                          </select>
                        
                        </div>
                        @error('classname')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                    {{-- <div class="col-sm-6">
                        <div class="form-group">
                          <label>Passports </label>
                        <td><img style="width: 10%; height: 60px;" src="{{ URL::asset("/public/../$edit_teacher->images")}}" alt=""></td>

                        <input type="file" name="images" @error('images')
                        @enderror  value="" class="form-control" >
                         
                        </div>
                        @error('images')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div> --}}


                      


                      

                     
                      <div class="col-sm-6">
                        <div class="form-group">
                            <a href="{{ url('web/home') }}" class="btn btn-primary">Back</a>
                        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
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

