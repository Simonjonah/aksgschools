@include('dashboard.header')

  @include('dashboard.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Transfer </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
l            <ol class="breadcrumb float-sm-right">
              {{-- <li cass="breadcrumb-item"><a href="{{ route('admin.addnidnetsem2leve200l') }}" class="btn btn-success">Add Semester Courses</a></li> --}}
              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Transfer  </li>
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
                <h3 class="card-title">Transfer</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ url('web/updatetransferstudentby/'.$transfer_student->ref_no) }}" method="post" enctype="multipart/form-data">
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
                          <label>School </label>
                          <select class="form-control" name="school_id" id="">
                          <option value="{{ $transfer_student->id }}">{{ $transfer_student->schoolname }} LGA {{ $transfer_student->lga }}  {{ $transfer_student->address }} </option>

                           @if (Auth::user()->schooltype == 'SUBEB')
                                @foreach ($all_schools as $all_school)
                                    @if ($all_school->section == 'Primary')
                                        <option value="{{ $all_school->id }}">{{ $all_school->schoolname }} LGA {{ $all_school->lga }}  {{ $all_school->address }} </option>
                                    @else
                                    @endif
                                
                                @endforeach
                           @else

                                @foreach ($all_schools as $all_school)
                                    @if ($all_school->section == 'Secondary')
                                        <option value="{{ $all_school->id }}">{{ $all_school->schoolname }} LGA {{ $all_school->lga }}  {{ $all_school->address }} </option>
                                    @else
                                    @endif
                                @endforeach
                               
                           @endif
                          </select>
                         
                        </div>
                        @error('images2')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>


                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>LGA </label>
                          <select class="form-control" name="lga" id="">
                          <option value="{{ $transfer_student->lga }}">{{ $transfer_student->lga }}</option>

                            @foreach ($all_lgas as $all_lga)

                                @if ($all_lga->section == 'Primary')

                                    <option value="{{ $all_lga->lga }}">{{ $all_lga->lga }}</option>
                                @else
                                <option value="{{ $all_lga->lga }}">{{ $all_lga->lga }}</option>
                                    
                                @endif
                                
                            @endforeach
                          </select>
                         
                        </div>
                        @error('images2')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>


                    
                      <div class="col-sm-6">
                        <div class="form-group">
                            {{-- <a href="{{ url('admin/viewTransfer') }}" class="btn btn-primary">Back</a> --}}
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
