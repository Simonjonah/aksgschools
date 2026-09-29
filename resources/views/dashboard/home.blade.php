@include('dashboard.header')

  @include('dashboard.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            @if (Auth::user()->schooltype == 'SUBEB' && Auth::user()->role == 'subadmin')
          <!-- <h1 class="m-0 text-dark"><a href="{{ url('/schoolsheads/'.Auth::guard('web')->user()->ref_no1) }}" target="_blank">{{ url('/schoolsheads/'.Auth::user()->ref_no1) }}</a></h1> -->
          <h1 class="m-0 text-dark"><a href="#" target="_blank">SUBEB ADMIN</a></h1>
              @elseif (Auth::user()->schooltype == 'SSEB' && Auth::user()->role == 'subadmin')
              <h1 class="m-0 text-dark"><a href="#" target="_blank">SSEB ADMIN</a></h1>
          <!-- <h1 class="m-0 text-dark"><a href="{{ url('/schoolsheads/'.Auth::guard('web')->user()->ref_no1) }}" target="_blank">{{ url('/schoolsheads/'.Auth::user()->ref_no1) }}</a></h1> -->
              @elseif (Auth::user()->role == 'teacher' && Auth::user()->assign1 == 'teacher')
                <!-- <h1 class="m-0 text-dark"><a href="{{ url('/schoolsheads/'.Auth::guard('web')->user()->ref_no1) }}" target="_blank">{{ url('/schoolsheads/'.Auth::user()->ref_no1) }}</a></h1> -->
                <h1 class="m-0 text-dark"><a href="#" target="_blank">TEACHER ADMIN</a></h1>

                @elseif (Auth::user()->role == 'Principal' && Auth::user()->assign1 == 'Principal')
                <!-- <h1 class="m-0 text-dark"><a href="{{ url('/schoolsheads/'.Auth::guard('web')->user()->ref_no1) }}" target="_blank">{{ url('/schoolsheads/'.Auth::user()->ref_no1) }}</a></h1> -->
                <h1 class="m-0 text-dark"><a href="#" target="_blank">@if(Auth::user()->schooltype == 'SUBEB')
                  HEADMASTER/HEADMISTRESS
                  @elseif(Auth::user()->schooltype == 'SSEB')
                  PRINCIPAL

                  @endif
                </a></h1>
                @elseif (Auth::user()->role == 'admin')
                <h1 class="m-0 text-dark"><a href="#" target="_blank">GENERAL ADMIN</a></h1>

            @else
            @endif

           
           
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            
              <li class="breadcrumb-item active">Dashboard </li>
            {{-- <li class="breadcrumb-item active">ffff </li> --}}
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

   @if (Auth::guard('web')->user()->status == null && Auth::guard('web')->user()->role == 'teacher')
     <h3>In Review, please wait for approval
      

     </h3>
   @elseif (Auth::guard('web')->user()->status == 'suspend')
    <h1>{{ Auth::guard('web')->user()->fname }}, You have been suspended</h1>
    @elseif (Auth::guard('web')->user()->status == 'reject')
    <h1>{{ Auth::guard('web')->user()->fname }}, You have been rejected</h1>
   @elseif (Auth::guard('web')->user()->status == 'sacked')
   <h1>{{ Auth::guard('web')->user()->fname }}, You have been Sacked</h1>
   @elseif (Auth::guard('web')->user()->status == 'retired')
   <h1>{{ Auth::guard('web')->user()->fname }}, You have been Retired</h1>
   @elseif (Auth::guard('web')->user()->status == 'retired')
   <h1>{{ Auth::guard('web')->user()->fname }}, You have been Admitted</h1>
   
      </div><!-- /.container-fluid -->
    </section>

@elseif (Auth::guard('web')->user()->role == 'subadmin')    
<section class="content">
  

  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $countyourresults }}</h3>

            <p>Result By Me</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ url('admin/allresults') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $countmysubjects }}<sup style="font-size: 20px"></sup></h3>

            <p>My Subjects</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{ url('admin/mysubjects') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ $countteachers }}</h3>

            <p>My Teachers</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{ url('admin/myteachers') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{ $countclasses }}</h3>

            <p>My Classes</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="{{ url('admin/viewallclasses') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3>{{ $countstudents }}</h3>

            <p>My Students</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>

          </div>
          <a href="{{ url('admin/viewyourstudentsecondary') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>{{ $countpsyco }}</h3>

            <p>My Psycomotor</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>

          </div>
          <a href="{{ url('admin/viewallpschomotors') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-3 col-6">
        <div class="small-box bg-dark">
          <div class="inner">
            <h3>{{ $countnews }}</h3>

            <p>My School News</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>

          </div>
          <a href="{{ url('admin/viewyouradverts') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>



      <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>{{ $myschools }}</h3>

            <p> {{ Auth()->guard('web')->user()->schooltype }} Schools </p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>

          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!-- ./col -->

    </div>
    <!-- /.row -->
    <!-- Main row -->
   <!-- TABLE: LATEST ORDERS -->
   <div class="card">
    <div class="card-header border-transparent">
      <h3 class="card-title">Your info</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table m-0">
          <thead>
          <tr>
            <th> ID</th>
            <th>Surname</th>
            <th>Firstname</th>
            <th>Phone</th>
            <th>Board</th>
            <th>Status</th>
          </tr>
          
          </thead>
          <tbody>
          <tr>
            <td><a href="{{ url('admin/profile/'.Auth::guard('web')->user()->ref_no1)  }}">{{ Auth::guard('web')->user()->ref_no1  }}</a></td>
            <td>{{ Auth::guard('web')->user()->surname  }}</td>
            <td>{{ Auth::guard('web')->user()->fname  }}</td>
            <td>{{ Auth::guard('web')->user()->phone  }}</td>
            <td>{{ Auth::guard('web')->user()->schooltype  }}</td>
           <td> @if (Auth::guard('web')->user()->status = null)
            <span class="badge badge-info">Admission in progress</span>
            @elseif (Auth::guard('web')->user()->status = 'admitted')
            <span class="badge badge-success">Approved</span>
            @elseif (Auth::guard('web')->user()->status = 'reject')
            <span class="badge badge-danger">Rejected</span>
            @elseif (Auth::guard('web')->user()->status = 'approved')
            <span class="badge badge-success">Approved</span>
            @elseif (Auth::guard('web')->user()->status = 'suspend')
            <span class="badge badge-warning">Suspended</span>
            @endif
           </td>
           
          </tr>
         
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <a href="{{ url('admin/profile/'.Auth::guard('web')->user()->ref_no1)  }}" class="btn btn-sm btn-info float-left">View Profile</a>
      {{-- <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a> --}}
    </div>
    <!-- /.card-footer -->
  </div>
  <!-- /.card -->
</div>
<!-- /.col -->


  </div><!-- /.container-fluid -->
</section>

@elseif(Auth::guard('web')->user()->role == 'admin')


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box)  -->
        <div class="row">
         

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$countheadmaster}}</h3>

                <p>HeadMasters</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              {{-- <a href="{{ route('admin.viewallfees') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
          </div>

          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $countstudent }}<sup style="font-size: 20px"></sup></h3>

                <p>Students</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('admin.allstudents') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $countsubjects }}</h3>

                <p>Subjects </p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('admin.allsubjects') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $countsubjecthigh }}</h3>

                <p>Secondary School Subjects</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ route('admin.viewsubject') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{ $countsubjectprim }}</h3>
                <p>Primary School Subjects</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="{{ route('admin.nurserysubjects') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $countteacher }}</h3>
                <p>Teachers</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="{{ route('admin.viewteachers') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $countsunapprveteacher }}</h3>
                <p>Unapproved Teachers</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="{{ route('admin.primaryteachers') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-default">
              <div class="inner">
                <h3>{{ $countschool }}</h3>
                <p>Schools</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="{{ route('admin.secondaryteachers') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
              {{-- <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span> --}}

              <div class="info-box-content">
                <span class="info-box-text">Suspended Students</span>
                <span class="info-box-number">
                  {{ $countstudenttsuspend }}
                 
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 chol-sm-6 col-md-3">
            <div class="info-box mb-3">
              {{-- <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span> --}}
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Approved Students</span>
                <span class="info-box-number">{{ $countstudentapprove }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>


          <div class="col-12 chol-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Principals</span>
                <span class="info-box-number">{{ $countprincipals }}</span>
              </div>
            </div>
          </div>

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
              {{-- <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span> --}}

              <div class="info-box-content">
                <span class="info-box-text">Rejected Students</span>
                <span class="info-box-number">{{ $countstudentreject }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Approved School </span>
                <span class="info-box-number">{{ $countschoolunpproved }}</span>
              </div>
            </div>
          </div>


          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Unapproved Schools</span>
                <span class="info-box-number">{{ $countschoolunpproved }}</span>
              </div>
            </div>
          </div>


          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Suspend Schools</span>
                <span class="info-box-number">{{ $countschoolsuspend }}</span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-table"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Classes</span>
                <span class="info-box-number">{{ $countsclasses}}</span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"> Rejected Schools</span>
                <span class="info-box-number">{{ $countschoolrejected }}</span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Rejected Teacher</span>
                <span class="info-box-number">{{ $countteacherrejected }}</span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Unapproved Teachers</span>
                <span class="info-box-number">{{ $countteacherunpproved }}</span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Teacher Approved</span>
                <span class="info-box-number">{{ $countteacherapproved }}</span>
              </div>
            </div>
          </div>


          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Teacher Suspend</span>
                <span class="info-box-number">{{ $countteachersuspend }}</span>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-12">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Latest Teachers</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                 
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                      @foreach ($view_lecturers as $view_lecturer)
                        @if ($view_lecturer->status = 'approved')
                          <li>
                           <a href="{{ url('admin/viewsingleteacher/'.$view_lecturer->ref_no) }}">{{ $view_lecturer->schoolname }}</a>
                            <a class="users-list-name" href="{{ url('admin/viewsingleteacher/'.$view_lecturer->ref_no) }}">{{ $view_lecturer->fname }} {{ $view_lecturer->surname }}</a>
                            <span class="users-list-date">{{ $view_lecturer->created_at->format('D d, M Y, H:i')}}</span>
                          </li>
                        @else
                        
                      @endif
                    @endforeach
                  </ul>
                  </div>
                  
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    {{-- <a href="{{ route('admin.lecturers') }}">View All Users</a> --}}
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
              <!-- /.col -->
            </div>


            

            <!-- /.row -->



              <!-- TABLE: LATEST ORDERS -->
              <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Latest Students</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                      <tr>
                        <th>Student ID</th>
                        <th>Surname</th>
                        <th>First Name</th>

                        <th>Status</th>
                        <th>Section</th>
                      </tr>
                      </thead>
                      <tbody>
                       @foreach ($view_students as $view_student)
                        <tr>
                          <td><a href="{{ url('admin/viewstudent/'.$view_student->ref_no) }}">{{ $view_student->ref_no }}</a></td>
                          <td>{{ $view_student->surname }}</td>
                          <td>{{ $view_student->fname }}</td>

                          <td>@if ($view_student->status == null)
                            <span class="badge badge-secondary">In Progress</span>
                          @elseif($view_student->status == 'approved')
                          <span class="badge badge-info">Approved</span>
                          @elseif($view_student->status == 'suspend')
                          <span class="badge badge-danger">Suspended</span>
                          @elseif($view_student->status == 'admitted')
                          <span class="badge badge-info">Admitted</span>
                          @endif
                        </td>
                        <td>{{ $view_student->section }}</td>

                        </tr>
                        @endforeach
                      </tbody>
                    </table> 
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <div class="card-footer clearfix">
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->


            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Schools</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>School Name</th>
                      <th>LGA</th>
                      <th>Board</th>
                      <th>ReF ID</th>
                      <th>Status</th>
                      <th>Logo</th>
                    </tr>
                    </thead>
                    <tbody>

                      @foreach ($view_schools as $view_school)
                      <tr>
                        <td><a href="{{ url('admin/viewschool/'.$view_school->ref_no1) }}"> {{ $view_school->schoolname }}</a></td>
                        <td><a href="{{ url('admin/viewschool/'.$view_school->ref_no1) }}">{{ $view_school->lga }}</a></td>
                        
                        <td>{{ $view_school->schooltype }}</td>
                        <!-- <td>{{ $view_school->address }}</td> -->
                        <td>{{ $view_school->ref_no1 }}</td>

                        <td>@if ($view_school->status == null)
                          <span class="badge badge-secondary">In Progress</span>
                        @elseif($view_school->status == 'successful')
                        <span class="badge badge-success">Success</span>
                        @elseif($view_school->status == 'approved')
                        <span class="badge badge-danger">Approved</span>
                        @elseif($view_school->status == 'confirm')
                        <span class="badge badge-info">Confirmed</span>
                        @endif
                      </td>
                      <td><img style="width: 70px; height: 70px;" class="profile-user-img img-fluid"
                        src="{{ URL::asset("/public/../$view_school->logo")}}"
                        alt="User profile picture"></td>

                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>

              <div class="card-footer clearfix">
                {{-- <a href="{{ route('admin.viewallpayment') }}" class="btn btn-sm btn-info float-left">View All Payment</a> --}}
                {{-- <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a> --}}
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->



             <!-- TABLE: LATEST ORDERS -->
             <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest News</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Title</th>
                      <!-- <th>Phone</th> -->
                      <th>Status</th>
                      <th>Images</th>
                    </tr>
                    </thead>
                    <tbody>

                      @foreach ($view_blogs as $view_blog)
                      <tr>

                        <td> <a href="{{ url('admin/blogview/'.$view_blog->ref_no) }}">{{ $view_blog->title }}</a></td>
                        <!-- <td>{{ $view_blog->phone }}</td> -->

                        <td>@if ($view_blog->status == null)
                          <span class="badge badge-secondary">In Progress</span>
                        @elseif($view_blog->status == 'successful')
                        <span class="badge badge-success">Success</span>
                        @elseif($view_blog->status == 'approved')
                        <span class="badge badge-success">Approved</span>
                        @elseif($view_blog->status == 'confirm')
                        <span class="badge badge-info">Confirmed</span>
                        @endif
                      </td>
                      <td><img style="width: 70%; height: 70%;" class="profile-user-img img-fluid"
                        src="{{ URL::asset("/public/../$view_blog->logo")}}"
                        alt="User profile picture"></td>

                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="card-footer clearfix">
                
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          

          
          <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Board Members</span>
                <span class="info-box-number">{{$countboards }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="far fa-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Results</span>
                <span class="info-box-number">{{ $count_results }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Psycomotor</span>
                <span class="info-box-number">{{ $countcount }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="far fa-comment"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Notification</span>
                <span class="info-box-number">{{ $countprincipals }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

           

            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recently Added Results</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  @foreach ($view_results as $view_result)
                  <li class="item">
                    <a href="{{ url('admin/viewresult/'.$view_result->id) }}" class="btn btn-info">View
                     </a>
                    <div class="product-info">
                      <a href="{{ url('admin/viewresult/'.$view_result->id) }}" class="product-title">{{ $view_result->subjectname }} {{ $view_result->classname }}
                        <span class="badge badge-warning float-right">{{ $view_result->section}}</span></a>
                      <span class="product-description">
                       By {{ $view_result->user['schoolname'] }} Tname {{ $view_result->user['surname'] }}
                      </span>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
            <!-- /.card -->



            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Latest Payments</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  {{-- @foreach ($view_payments as $view_payment)
                      <tr>
                        <td><a href="{{ url('admin/viewsinglepayment/'.$view_payment->ref_no) }}">View Payment of {{ $view_payment->middlename }}</a></td>
                        <td><a href="{{ url('admin/viewstudents/'.$view_payment->ref_no1) }}">{{ $view_payment->fname }}</a></td>
                        
                        <td>{{ $view_payment->ref_no }}</td>

                        <td>@if ($view_payment->processor_response = null)
                          <span class="badge badge-secondary">In Progress</span>
                        @elseif($view_payment->processor_response = 'successful')
                        <span class="badge badge-success">Success</span>
                        @elseif($view_payment->processor_response = 'approved')
                        <span class="badge badge-danger">Approved</span>
                        @elseif($view_payment->processor_response == 'confirm')
                        <span class="badge badge-info">Confirmed</span>
                        @endif
                      </td>
                      <td>{{ $view_payment->section }}</td>

                      </tr>
                      @endforeach --}}
                </ul>
              </div>
            </div>
            <!-- /.card -->


          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </section>

@elseif (Auth::guard('web')->user()->role == 'Principal' && Auth::guard('web')->user()->status == 'admitted')
<section class="content">

  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <h5 class="m-0 text-dark">Teacher Registration Link <a href="{{ url('/admin/teacher/registerteachers/'.Auth::guard('web')->user()->ref_no) }}" target="_blank">{{ url('/admin/teacher/registerteachers/'.Auth::user()->ref_no) }} </a></h5><br>
    @if (Auth::guard('web')->user()->signature == null)
          <div class="col-lg-12 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>Add Your Signature for Results before any other thing</h3>

                  <form action="{{ url('admin/updatesignature/'.Auth::guard('web')->user()->ref_no) }}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @if (Session::get('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success') }}
                  </div>
                  @endif
                  <input type="file" name="signature" class="form-control">

                  <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{ url('admin/allresults') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          @else
            
          @endif
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $countresults }}</h3>

            <p>Total Result</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ url('admin/allresults') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3>{{ $countunapprove }}</h3>

            <p>Total Unapprove Result</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ url('admin/allresultsprinci') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->


      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $countapprove }}</h3>

            <p>Total Approve Result</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ url('admin/allresultsprinciapproved') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            @if (Auth::guard('web')->user()->section == 'Primary')
            <h3>{{ $countsprimarysubjects }}<sup style="font-size: 20px"></sup></h3>
              
            @else
            <h6>Senior {{ $countsecondarysubjects }}<sup style="font-size: 20px"></sup></h6>
            <h6>Junior {{ $countjuniorsubjects }}<sup style="font-size: 20px"></sup></h6>
            <h6>Total {{ $countjuniorsubjects + $countsecondarysubjects}}<sup style="font-size: 20px"></sup></h6>
              
            @endif

            <p>Subjects</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{ url('admin/viewallsubjectsbyhead') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $countteachers }}</h3>

            <p>My Teachers</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{ url('admin/myteachers') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{ $countpsycomo1 }}</h3>

            <p>Psychomotor</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <!-- <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3>{{ $countstudent }}</h3>

            <p> All Students</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>

          </div>
          <a href="{{ url('admin/viewyourstudentsecondary') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>{{ $reinstate }}</h3>

            <p>Reinstated Students</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>

          </div>
          <a href="{{ url('admin/restatedstudent') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ $suspendedstu }}</h3>

            <p>Suspended Students</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>

          </div>
          <a href="{{ url('admin/suspendedstudent') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-dark">
          <div class="inner">
            <h3>{{ $viewschoolnews }}</h3>

            <p>My School News</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>

          </div>
          <a href="{{ url('admin/viewyouradverts') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

    </div>
    <!-- /.row -->
    <!-- Main row -->
   <!-- TABLE: LATEST ORDERS -->
   <div class="card">
    <div class="card-header border-transparent">
      <h3 class="card-title">Your info</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table m-0">
          <thead>
          <tr>
            <th> ID</th>
            <th>Surname</th>
            <th>Firstname</th>
            <th>Phone</th>
            <th>Board</th>
            <th>Status</th>
          </tr>
          
          </thead>
          <tbody>
          <tr>
            <td><a href="{{ url('admin/profile/'.Auth::guard('web')->user()->ref_no1)  }}">{{ Auth::guard('web')->user()->ref_no1  }}</a></td>
            <td>{{ Auth::guard('web')->user()->surname  }}</td>
            <td>{{ Auth::guard('web')->user()->fname  }}</td>
            <td>{{ Auth::guard('web')->user()->phone  }}</td>
            <td>{{ Auth::guard('web')->user()->schooltype  }}</td>
           <td> @if (Auth::guard('web')->user()->status = null)
            <span class="badge badge-info">Admission in progress</span>
            @elseif (Auth::guard('web')->user()->status = 'admitted')
            <span class="badge badge-success">Approved</span>
            @elseif (Auth::guard('web')->user()->status = 'reject')
            <span class="badge badge-danger">Rejected</span>
            @elseif (Auth::guard('web')->user()->status = 'approved')
            <span class="badge badge-success">Approved</span>
            @elseif (Auth::guard('web')->user()->status = 'suspend')
            <span class="badge badge-warning">Suspended</span>
            @endif
           </td>
           
          </tr>
         
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <a href="{{ url('admin/profile/'.Auth::guard('web')->user()->ref_no1)  }}" class="btn btn-sm btn-info float-left">View Profile</a>
    </div>
    <!-- /.card-footer -->
  </div>
  <!-- /.card -->
</div>
<!-- /.col -->


  </div><!-- /.container-fluid -->
</section>
@elseif (Auth::guard('web')->user()->role == 'teacher' && Auth::guard('web')->user()->status == 'admitted')
  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $resultscounts }}</h3>

                <p>Your Results</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ url('admin/tecacherviewresultbysub') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $countcognitive }}</h3>

                {{-- <h3><sup style="font-size: 20px"></sup></h3> --}}

                <p>Cognitive Domain</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ url('admin/teacherviewdomaiin') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $countpsycomo }}</h3>

                <p>Psycomotor Domain</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('admin/teacherviewdomaiin') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $countsubject }}</h3>

                <p>My Subjects</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              {{-- <a href="{{ url('admin/viewclassactivityparespecial') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{ $countapproveresult }}</h3>

                <p>Approve Results</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>

              </div>
              {{-- <a href="{{ url('admin/viewpersonnel') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h3>{{ $countunapproveresult }}</h3>

                <p>Unapproved Results</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>

              </div>
              {{-- <a href="{{ url('admin/viewpersonnel') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
          </div>
          <!-- ./col -->

        </div>
        <!-- /.row -->
        <!-- Main row -->
       <!-- TABLE: LATEST ORDERS -->
       <div class="card">
        <div class="card-header border-transparent">
          <h3 class="card-title text-danger">My Assigned Subjects</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table m-0">
              <thead>
              <tr>
                <th>Surname</th>
                <th>Firstname</th>
                <th>Subjects</th>
                <th>Class</th>
                <th>Section</th>
                <th>Term</th>
                <th>Session</th>
                <th>Date</th>
              </tr>
              
              </thead>
              <tbody>
                @foreach ($my_subjects as $my_subject)
              <tr>
                <td>{{ $my_subject->user['fname']  }}</td>
                <td>{{ $my_subject->user['surname']  }}</td>
                <td>{{ $my_subject->subjectname }}</td>
                <td><a href="{{ url('admin/yourclassbyteacher/'.$my_subject->classname)  }}">{{ $my_subject->classname  }}</a></td>
                <td>{{ $my_subject->section  }}</td>
                <td>{{ $my_subject->term  }}</td>
                <td>{{ $my_subject->academic_session  }}</td>
                <td>{{ $my_subject->created_at->format('D d, M Y, H:i')}} </td>
                
               </td>
              </tr>
                @endforeach 
                
             
             
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
       
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->


      </div><!-- /.container-fluid -->
    </section>

@else

@endif

    
    <!-- /.content -->
  </div>
  @include('dashboard.footer')