@include('dashboard.admin.header')

  @include('dashboard.admin.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
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
              <h3 class="card-title">{{ $edit_singteachers->school['schoolname'] }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ url('admin/teacherupdated/'.$edit_singteachers->ref_no) }}" method="post" enctype="multipart/form-data">
                @csrf
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
                @method('PUT')
           
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Firstname</label>
                  <input type="text" name="fname" class="form-control" @error('fname')
                      
                  @enderror  value="{{ $edit_singteachers->fname }}" id="exampleInputEmail1" placeholder="Title">
                </div>
                @error('fname')
                <span class="text-danger">{{ $message }}</span>
                @enderror 

                  
                <div class="form-group">
                  <label for="exampleInputEmail1">Middlename</label>
                  <input type="text" name="middlename" class="form-control" @error('middlename')
                      
                  @enderror  value="{{ $edit_singteachers->middlename }}" id="exampleInputEmail1" placeholder="Title">
                </div>
                @error('middlename')
                <span class="text-danger">{{ $message }}</span>
                @enderror 

                <div class="form-group">
                  <label for="exampleInputEmail1">Last Name</label>
                  <input type="text" name="surname" class="form-control" @error('surname')
                      
                  @enderror  value="{{ $edit_singteachers->surname }}" id="exampleInputEmail1" placeholder="Title">
                </div>
                @error('surname')
                <span class="text-danger">{{ $message }}</span>
                @enderror 

                


                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" name="email" class="form-control" @error('email')
                      
                  @enderror  value="{{ $edit_singteachers->email }}" id="exampleInputEmail1" placeholder="Title">
                </div>
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="form-group">
									<h5>Term</h5>
									<select name="term" class="form-control"  id="">
                    <option value="{{ $edit_singteachers->term }}">{{ $edit_singteachers->term }}</option>
										<option value="First Term">First Term</option>
										<option value="Second Term">Second Term</option>
										<option value="Third Term">Third Term</option>
									</select>
								</div>

                <div class="form-group">
                  <h5>Section </h5>
                  <select required class="form-control" type="text" name="section">
                    <option value="{{ $edit_singteachers->section }}">{{ $edit_singteachers->section }}</option>
                    @if($edit_singteachers->section == 'Primary')
                    <option value="Primary">Primary</option>
                    @else
                    <option value="Secondary">Secondary</option>
                    @endif                    
                  </select>
                </div>  
                

                


                  <h5>Select Gender</h5>
                <div class="form-group">
                  <select class="form-control" name="gender">
                    <option value="{{ $edit_singteachers->gender }}">{{ $edit_singteachers->gender }}</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>



                
                  <h5>Select lga</h5>
                <div class="form-group">
                  <select class="form-control" name="lga">
                    <option value="{{ $edit_singteachers->lga }}">{{ $edit_singteachers->lga }}</option>
                    @foreach($view_lgas as $view_lga)
                    <option value="{{ $view_lga->lga }}">{{ $view_lga->lga }}</option>
                    @endforeach
                  </select>
                </div>

                @if($edit_singteachers->assign1 === 'teacher')
                  <div class="form-group">
                    <label for="exampleInputEmail1">Class</label>
                    <select name="classname" class="form-control" id="">
                      <option value="{{ $edit_singteachers->classname }}">{{ $edit_singteachers->classname }}</option>
                      @if($edit_singteachers->section == 'Primary')
                        @foreach ($view_classnames as $view_classname)
                          @if($view_classname->section == 'Primary')
                            <option value="{{ $view_classname->classname }}">{{ $view_classname->classname }}</option>
                          @endif
                        @endforeach
                      @else
                      @foreach ($view_classnames as $view_classname)
                      @if($view_classname->section == 'Secondary')
                        <option value="{{ $view_classname->classname }}">{{ $view_classname->classname }}</option>
                          @endif
                      @endforeach
                      @endif 
                      
                    </select>   
                  </div>
                 @endif
                  
                

                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" name="phone" class="form-control" @error('phone')
                        
                    @enderror  value="{{ $edit_singteachers->phone }}" id="exampleInputEmail1" placeholder="Title">
                  </div>
                  @error('phone')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror 
                
                
                  <div class="form-group">
                    <img style="width: 10%; height: 30px;" src="{{ URL::asset("/public/../$edit_singteachers->images")}}" alt="">
                  </div>
                  <div class="form-group">
                    <input type="file" name="images" class="form-control" value="{{ $edit_singteachers->images }}">
                  </div>
                
              </div>
              <!-- /.card-body -->
       
              

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  </div>
    @include('dashboard.admin.footer')