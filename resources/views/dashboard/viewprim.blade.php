@include('dashboard.header')
@include('dashboard.sidebar')
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if (Session::get('success'))
      <div class="alert alert-success">
          {{ Session::get('success') }}
      </div>
      @endif

      @if (Session::get('fail'))
      <div class="alert alert-danger">
      {{ Session::get('fail') }}
    @endif
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img style="width: 100%; height: 200px;" class="profile-user-img img-fluid"
                       src="{{ URL::asset("/public/../$view_principal->logo")}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $view_principal->surname }}, {{ $view_principal->fname }} {{ $view_principal->middlename }}</h3>

                <p class="text-muted text-center"> {{ $view_principal->centername }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Phone</b> <a href="" style="text-transform: uppercase" class="float-right">{{ $view_principal->phone }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>School Name</b> <a class="float-right">{{ $view_principal->school['schoolname'] }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{ $view_principal->email }}</a>
                  </li>

                  <li class="list-group-item">
                    <b>Center Number</b> <a class="float-right">{{ $view_principal->school['centernumber'] }}</a>
                  </li>
                  

                  
                  <li class="list-group-item">
                    <b>Status</b> <a class="float-right">@if ($view_principal->status == null)
                      <span class="badge badge-secondary">Admission In progress</span>
                    @elseif ($view_principal->status == 'reject')
                    <span class="badge badge-danger">Rejected</span>
                    @elseif ($view_principal->status == 'suspend')
                    <span class="badge badge-warning">Suspended</span>
                    @elseif ($view_principal->status == 'approved')
                    <span class="badge badge-info">Approved</span>

                    @elseif ($view_principal->status == 'retired')
                    <span class="badge badge-danger">Retired</span>
                    
                    @else
                    <span class="badge badge-success">Admitted</span>
                    @endif</a>
                  </li>
                </ul>

                {{-- <a href="couse" class="btn btn-primary btn-block"><b>Register more Courses</b></a> --}}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Declaration</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                {{-- <strong><i class="fas fa-book mr-1"></i> school Education Level </strong> --}}

              

               

                <strong><i class="far fa-file-alt mr-1"></i> Note:</strong>

                <p class="text-muted">{{ $view_principal->fname }} {{ $view_principal->middlename }} {{ $view_principal->surname }} hereby declare that the information given by me in this form is correct. I understand that if any piece of informatio is false i shall automatically be disqualified</p>
              </div> 
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  {{-- <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li> --}}
                  <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Bio Data</a></li>
                 
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                 
                
                  <!-- /.tab-pane -->
                  <div class="active tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          {{ $view_principal->created_at->format('D d, M Y, H:i')}}
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{ $view_principal->created_at->diffForHumans() }}</span>
                          <h3 class="timeline-header"><a href="mailTo:{{ $view_principal->school['schoolname'] }}">School Name </a> {{ $view_principal->school['schoolname'] }}</h3>

                          <h3 class="timeline-header"><a href="mailTo:{{ $view_principal->school['address'] }}">Address  </a> {{ $view_principal->school['address'] }}</h3>
                          <h3 class="timeline-header"><a href="mailTo:{{ $view_principal->school['motor'] }}">Mottor  </a> {{ $view_principal->school['motor'] }}</h3>

                          {{-- <div class="timeline-body">
                            {{ $view_principal->motor }}
                          </div> --}}
                          
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{ $view_principal->created_at->diffForHumans()}}</span>

                          {{-- <h3 class="timeline-header border-0"><a href="#">{{ $view_principal->age }}</a>
                          </h3>

                          <h3 class="timeline-header border-0"><a href="#">{{ $view_principal->disability }}</a>
                          </h3> --}}
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                         <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{ $view_principal->created_at->diffForHumans()}}</span>

                          {{-- <h3 class="timeline-header"><a href="#">State</a> {{ $view_principal->state }}</h3> --}}

                          
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          {{ $view_principal->created_at->toFormattedDateString() }}
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="">Gender</label>
                       <input type="text" class="form-control" value="{{ $view_principal->gender }}" id="">
                    </div>

                    
                    
                    {{-- <div class="form-group">
                      <label for="">Who introduced you to G. D. A</label>
                       <input type="text" class="form-control" value="{{ $view_principal->whointro }}" id="">
                    </div> --}}
                  </div>
                  <!-- /.tab-pane -->
                  <div class="form-group">
                    <label for="">Take Action</label>
                    <a href="{{ url('admin/lecturersprint/'.$view_principal->ref_no)  }}" class="btn btn-primary">Print</a>
                    <a href="{{ url('admin/primsaddmit/'.$view_principal->ref_no)  }}" class="btn btn-warning">Approved</a>
                    
                    <th><a href="{{ url('admin/rejectprim/'.$view_principal->ref_no) }}" class="btn btn-sm bg-danger">
                      <i class="fas fa-user"></i>Reject
                    </a></th>
                   <th><a href="{{ url('admin/suspendprim/'.$view_principal->ref_no) }}" class="btn btn-sm bg-warning">
                      <i class="fas fa-comments"></i>Suspend
                    </a></th>

                    <th> <a href="{{ url('admin/tranferprim/'.$view_principal->ref_no) }}" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> Transfer
                    </a></th>
                    <th><a href="{{ url('admin/retiredprim/'.$view_principal->ref_no) }}" class="btn btn-info"><i class="fas fa-print">Retired</i></a></th> 
                  </div>
                  {{--  <li class="nav-item">
              @if (Auth::guard('web')->user()->schooltype == 'SUBEB')
                @foreach ($view_classes as $view_classe)
                 @if ($view_classe->section == 'Primary')
                 <li class="nav-item">
                    <a href="{{ url('/web/viewyourstudentsinschhol/'.$view_classe->classname) }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ $view_classe->classname }}</p>
                    </a>
                  </li>
                 @else
                 @endif
                @endforeach
                

                @else
                @foreach ($view_classes as $view_classe)
                 @if ($view_classe->section == 'Secondary')
                 <li class="nav-item">
                    <a href="{{ url('/teacher/viewyourstudentsinschhol/'.$view_classe->classname) }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ $view_classe->classname }}</p>
                    </a>
                  </li>
                 @else
                   
                 @endif
                @endforeach
                @endif --}}

              </li>

                  <div class="tab-pane" id="quali">
                    <!-- Main content -->
                    <section class="content">
                      <div class="container-fluid">
                        <div class="row">
                          
                          <div class="col-12">
                            <div class="card card-primary">
                              <div class="card-header">
                                <div class="card-title">
                                  All Qualification submitted by {{ $view_principal->surname }} {{ $view_principal->fname }}
                                </div>
                              </div>
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-sm-2">
                                    <a href="{{ URL::asset("/public/../$view_principal->logo")}}?text=1" data-toggle="lightbox" data-title="Passport  - white" data-gallery="gallery">
                                      <img style="width: 100%; height: 80%" src="{{ URL::asset("/public/../$view_principal->logo")}}" class="img-fluid mb-2" alt="white sample"/>
                                    </a>
                                  </div>

                                  <div class="col-sm-2">
                                    <a href="{{ URL::asset("/public/../$view_principal->immune")}}?text=1" data-toggle="lightbox" data-title="Immunization" data-gallery="gallery">
                                      <img style="width: 100%; height: 80%" src="{{ URL::asset("/public/../$view_principal->immune")}}" class="img-fluid mb-2" alt="white sample"/>
                                    </a>
                                  </div>

                                  <div class="col-sm-2">
                                    <a href="{{ URL::asset("/public/../$view_principal->birthcert")}}?text=1" data-toggle="lightbox" data-title="Birth Certificate" data-gallery="gallery">
                                      <img style="width: 100%; height: 80%" src="{{ URL::asset("/public/../$view_principal->birthcert")}}" class="img-fluid mb-2" alt="white sample"/>
                                    </a>
                                  </div>

                                  
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- /.container-fluid -->
                    </section>
                  </div>

                  









                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                      @csrf
                      
                      @method('PUT')

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Father SurName</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" value="{{ $view_principal->title }} {{ $view_principal->fathersurname }}" class="form-control" id="inputName" placeholder="First Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Father FirstName</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->fathername }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div>

                      {{-- <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Father MiddleName</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->middlename }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div> --}}

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Father MiddleName</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->fathername }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div><div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Father Email</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->fatheremail }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div><div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Father Phone</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->fatherphone }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div><div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Father Employer</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->fatheremployer }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>


                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nationality</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->nationality }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div>

                      
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->fatheraddress }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Relationship</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->relationship }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div>
                      
                    </form>
                  </div>





                  <div class="tab-pane" id="mother">
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                      @csrf
                      

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Father SurName</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" value="{{ $view_principal->fathername }} {{ $view_principal->mothersurname }}" class="form-control" id="inputName" placeholder="First Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> mother FirstName</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->mothername }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> mother MiddleName</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->middlename }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> mother MiddleName</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->middlename }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div><div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> mother Email</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->motheremail }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div><div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> mother Phone</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->motherphone }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div><div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> mother Employer</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->motheremployer }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>


                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nationality</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->nationality }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $view_principal->motheraddress }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div>                      
                    </form>
                  </div>




                  



                     
                  </div>
                  <!-- /.tab-pane -->





                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
            
          </div>
          <!-- /.col -->
        </div>

        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      
    </section>
 </div>
    @include('dashboard.footer')

    

<script src="{{ asset('assets/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>

<script src="{{ asset('assets/plugins/filterizr/jquery.filterizr.min.js') }}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>

