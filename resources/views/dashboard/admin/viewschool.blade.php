@include('dashboard.admin.header')
@include('dashboard.admin.sidebar')
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
                       src="{{ URL::asset("/public/../$viewsingleschool->logo")}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $viewsingleschool->surname }}, {{ $viewsingleschool->fname }} {{ $viewsingleschool->middlename }}</h3>

                {{-- <p class="text-muted text-center"> {{ $viewsingleschool->user['email'] }}</p> --}}

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Phone</b> <a href="" style="text-transform: uppercase" class="float-right">{{ $viewsingleschool->phone }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>School Name</b> <a class="float-right">{{ $viewsingleschool->schoolname }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{ $viewsingleschool->email }}</a>
                  </li>
                 

                  
                  <li class="list-group-item">
                    <b>Status</b> <a class="float-right">@if ($viewsingleschool->status == null)
                      <span class="badge badge-secondary">Admission In progress</span>
                    @elseif ($viewsingleschool->status == 'reject')
                    <span class="badge badge-danger">Rejected</span>
                    @elseif ($viewsingleschool->status == 'suspend')
                    <span class="badge badge-warning">Suspended</span>
                    @elseif ($viewsingleschool->status == 'approved')
                    <span class="badge badge-info">Approved</span>
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

                <p class="text-muted">{{ $viewsingleschool->fname }} {{ $viewsingleschool->middlename }} {{ $viewsingleschool->surname }} hereby declare that the information given by me in this form is correct. I understand that if any piece of informatio is false i shall automatically be disqualified</p>
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
                  {{-- <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Father Details</a></li> --}}
                  {{-- <li class="nav-item"><a class="nav-link" href="#mother" data-toggle="tab">Mother Details</a></li> --}}
                  {{-- <li class="nav-item"><a class="nav-link" href="#olevels1" data-toggle="tab">Medical Reports</a></li> --}}
                  {{-- <li class="nav-item"><a class="nav-link" href="#olevels2" data-toggle="tab">Olevels 2nd sitting</a></li> --}}

                  {{-- <li class="nav-item"><a class="nav-link" href="#quali" data-toggle="tab">Qualifications</a></li> --}}


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
                          {{ $viewsingleschool->created_at->format('D d, M Y, H:i')}}
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{ $viewsingleschool->created_at->diffForHumans() }}</span>
                          <h3 class="timeline-header"><a href="mailTo:{{ $viewsingleschool->schoolname }}">School Name </a> {{ $viewsingleschool->schoolname }}</h3>

                          <h3 class="timeline-header"><a href="mailTo:{{ $viewsingleschool->address }}">Address  </a> {{ $viewsingleschool->address }}</h3>
                          <h3 class="timeline-header"><a href="mailTo:{{ $viewsingleschool->motor }}">Mottor  </a> {{ $viewsingleschool->motor }}</h3>

                          {{-- <div class="timeline-body">
                            {{ $viewsingleschool->motor }}
                          </div> --}}
                          
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{ $viewsingleschool->created_at->diffForHumans()}}</span>

                          {{-- <h3 class="timeline-header border-0"><a href="#">{{ $viewsingleschool->age }}</a>
                          </h3>

                          <h3 class="timeline-header border-0"><a href="#">{{ $viewsingleschool->disability }}</a>
                          </h3> --}}
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                         <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{ $viewsingleschool->created_at->diffForHumans()}}</span>

                          {{-- <h3 class="timeline-header"><a href="#">State</a> {{ $viewsingleschool->state }}</h3> --}}

                          
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          {{ $viewsingleschool->created_at->toFormattedDateString() }}
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
                       <input type="text" class="form-control" value="{{ $viewsingleschool->gender }}" id="">
                    </div>

                    
                    
                    {{-- <div class="form-group">
                      <label for="">Who introduced you to G. D. A</label>
                       <input type="text" class="form-control" value="{{ $viewsingleschool->whointro }}" id="">
                    </div> --}}
                  </div>
                  <!-- /.tab-pane -->
                  <div class="form-group">
                    <label for="">Take Action</label>
                    <a href="{{ url('admin/schoolpdf/'.$viewsingleschool->ref_no1)  }}" class="btn btn-primary">Print form</a>
                    {{-- <a href="{{ url('admin/medicalspdf/'.$viewsingleschool->ref_no1)  }}" class="btn btn-warning">Print Medical reports</a> --}}
                    
                    <th><a href="{{ url('admin/rejectschool/'.$viewsingleschool->ref_no1) }}" class="btn btn-sm bg-danger">
                      <i class="fas fa-user"></i>Reject
                    </a></th>
                   <th><a href="{{ url('admin/suspendschool/'.$viewsingleschool->ref_no1) }}" class="btn btn-sm bg-warning">
                      <i class="fas fa-comments"></i>Suspend
                    </a></th>

                    <th> <a href="{{ url('admin/schoolsaddmit/'.$viewsingleschool->ref_no1) }}" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> Admit
                    </a></th>
                    {{-- <th><a href="{{ url('admin/medicalspdf/'.$viewsingleschool->ref_no1) }}" class="btn btn-info"><i class="fas fa-print">Print Medicals</i></a></th> --}}
                  </div>
                  

                  <div class="tab-pane" id="quali">
                    <!-- Main content -->
                    <section class="content">
                      <div class="container-fluid">
                        <div class="row">
                          
                          <div class="col-12">
                            <div class="card card-primary">
                              <div class="card-header">
                                <div class="card-title">
                                  All Qualification submitted by {{ $viewsingleschool->surname }} {{ $viewsingleschool->fname }}
                                </div>
                              </div>
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-sm-2">
                                    <a href="{{ URL::asset("/public/../$viewsingleschool->logo")}}?text=1" data-toggle="lightbox" data-title="Passport  - white" data-gallery="gallery">
                                      <img style="width: 100%; height: 80%" src="{{ URL::asset("/public/../$viewsingleschool->logo")}}" class="img-fluid mb-2" alt="white sample"/>
                                    </a>
                                  </div>

                                  <div class="col-sm-2">
                                    <a href="{{ URL::asset("/public/../$viewsingleschool->immune")}}?text=1" data-toggle="lightbox" data-title="Immunization" data-gallery="gallery">
                                      <img style="width: 100%; height: 80%" src="{{ URL::asset("/public/../$viewsingleschool->immune")}}" class="img-fluid mb-2" alt="white sample"/>
                                    </a>
                                  </div>

                                  <div class="col-sm-2">
                                    <a href="{{ URL::asset("/public/../$viewsingleschool->birthcert")}}?text=1" data-toggle="lightbox" data-title="Birth Certificate" data-gallery="gallery">
                                      <img style="width: 100%; height: 80%" src="{{ URL::asset("/public/../$viewsingleschool->birthcert")}}" class="img-fluid mb-2" alt="white sample"/>
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
                          <input type="text" name="name" value="{{ $viewsingleschool->title }} {{ $viewsingleschool->fathersurname }}" class="form-control" id="inputName" placeholder="First Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Father FirstName</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $viewsingleschool->fathername }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div>

                      {{-- <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Father MiddleName</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $viewsingleschool->middlename }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div> --}}

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Father MiddleName</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $viewsingleschool->fathername }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div><div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Father Email</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $viewsingleschool->fatheremail }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div><div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Father Phone</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $viewsingleschool->fatherphone }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div><div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Father Employer</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $viewsingleschool->fatheremployer }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>


                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nationality</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $viewsingleschool->nationality }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div>

                      
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $viewsingleschool->fatheraddress }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Relationship</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $viewsingleschool->relationship }}" class="form-control" id="inputName" placeholder="Last Name">
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
                          <input type="text" name="name" value="{{ $viewsingleschool->fathername }} {{ $viewsingleschool->mothersurname }}" class="form-control" id="inputName" placeholder="First Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> mother FirstName</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $viewsingleschool->mothername }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> mother MiddleName</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $viewsingleschool->middlename }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> mother MiddleName</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $viewsingleschool->middlename }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div><div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> mother Email</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $viewsingleschool->motheremail }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div><div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> mother Phone</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $viewsingleschool->motherphone }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div><div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> mother Employer</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $viewsingleschool->motheremployer }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>


                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nationality</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $viewsingleschool->nationality }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ $viewsingleschool->motheraddress }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div>                      
                    </form>
                  </div>




                  <div class="tab-pane" id="olevels1">
                  
                     <div class="container">
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group row">
                            <label for="inputName">Does your child has SS genotype?</label>
                            <div class="col-sm-10">
                              <div class="form-group">
                                <h5>Does your child have SS genotype?</h5>
                                <label for="vehicle1"> {{ $viewsingleschool->genotype1 }}</label><br>
                                <label for="vehicle1"> {{ $viewsingleschool->genotype2 }}</label><br>
                            </div>

                            <div class="form-group">
                              <h5>Has your Child any of the following conditions?</h5>
                              <label for="vehicle1"> {{ $viewsingleschool->symtoms1 }}</label><br>
                              <label for="vehicle1"> {{ $viewsingleschool->symtoms2 }}</label><br>
                              <label for="vehicle1"> {{ $viewsingleschool->symtoms3 }}</label><br>
                          </div>



                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="form-group">
                              <h5>Is your Child asthmatic?</h5>
                              <label for="vehicle1"> {{ $viewsingleschool->asthmatic1 }}</label><br>
                              <label for="vehicle1"> {{ $viewsingleschool->asthmatic2 }}</label><br>
                          </div>
                          </div>
                          
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group row">
                            <div class="form-group">
                              <h5>Has your child any medical condition or form of allergy that the school should know about?</h5>
                              <label for="vehicle1"> {{ $viewsingleschool->medicalcondition1 }}</label><br>
                              <label for="vehicle1"> {{ $viewsingleschool->medicalcondition2 }}</label><br>
                          </div>
                          </div>

                          <div class="form-group row">
                            <div class="form-group">
                              <h5>Has your child been diagnosed with having specific learning difficilties such as Dyslyxia, ADHD or any other?</h5>
                              <label for="vehicle1"> {{ $viewsingleschool->diagnose1 }}</label><br>
                              <label for="vehicle1"> {{ $viewsingleschool->diagnose2 }}</label><br>
                              <label for="vehicle1"> {{ $viewsingleschool->diagnose3 }}</label><br>
                          </div>

                          <div class="form-group">
                            <h5>Has your child been Immunized with the following?</h5>
                            <label for="vehicle1"> {{ $viewsingleschool->diagnose1 }}</label><br>
                            <label for="vehicle1"> {{ $viewsingleschool->diagnose2 }}</label><br>
                            <label for="vehicle1"> {{ $viewsingleschool->diagnose3 }}</label><br>
                        </div>
                        </div>
                        </div>

                        <table class="table table-bordered">
                          <thead>
                              <tr>
                                  <th>Particulars</th>
                                  <th>Yes</th>
                                  <th>No</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>Small Pox</td>
                                  <td>{{ $viewsingleschool->smallpox1 }}</td>
                                  <td>{{ $viewsingleschool->smallpox2 }}</td>
                              </tr>

                              <tr>
                                  <td>Chicken Pox</td>
                                  <td>{{ $viewsingleschool->chickenpox1 }}</td>
                                  <td>{{ $viewsingleschool->chickenpox2 }}</td>
                                  
                              </tr>

                              <tr>
                                  <td>Polio </td>
                                  <td>{{ $viewsingleschool->polio1 }}</td>
                                  <td>{{ $viewsingleschool->polio2 }}</td>
                                  
                              </tr>

                              <tr>
                                  <td>Tetanus </td>
                                  <td>{{ $viewsingleschool->tetanus1 }}</td>
                                  <td>{{ $viewsingleschool->tetanus2 }}</td>
                                  
                              </tr>

                              <tr>
                                  <td>Tuberculosis </td>
                                  <td>{{ $viewsingleschool->tuber1 }}</td>
                                  <td>{{ $viewsingleschool->tuber2 }}</td>
                                  
                              </tr>

                              <tr>
                                  <td>Mumps </td>
                                  <td>{{ $viewsingleschool->mumps1 }}</td>
                                  <td>{{ $viewsingleschool->mumps2 }}</td>
                                  
                              </tr>

                              <tr>
                                  <td>Rebelia </td>
                                  <td>{{ $viewsingleschool->rebelia1 }}</td>
                                  <td>{{ $viewsingleschool->rebelia2 }}</td>
                                  
                              </tr>

                              <tr>
                                  <td>Hepatitis </td>
                                  <td>{{ $viewsingleschool->hepatitis1 }}</td>
                                  <td>{{ $viewsingleschool->hepatitis2 }}</td>
                                  
                              </tr>

                              <tr>
                                  <td>Meningitis </td>
                                  <td>{{ $viewsingleschool->meningitis1 }}</td>
                                  <td>{{ $viewsingleschool->meningitis2 }}</td>
                                  
                              </tr>

                              <tr>
                                  <td>Whoopingcough </td>
                                  <td>{{ $viewsingleschool->whoopingcough1 }}</td>
                                  <td>{{ $viewsingleschool->whoopingcough2 }}</td>
                                  
                              </tr>

                              <tr>
                                  <td>Diphtheria </td>
                                  <td>{{ $viewsingleschool->diphtheria1 }}</td>
                                  <td>{{ $viewsingleschool->diphtheria2 }}</td>
                                  
                                 
                              </tr>
                          </tbody>
                      </table>
                      </div>

                      
                     </div>







                     
                  </div>
                  <!-- /.tab-pane -->






                  <div class="tab-pane" id="olevels2">
                  
                    <div class="container">
                     <div class="row">
                       <div class="col-lg-6 col-md-6 col-sm-12">
                         <div class="form-group row">
                           <label for="inputName">Center Name</label>
                           <div class="col-sm-10">
                             <input type="text" name="name" value="{{ $viewsingleschool->centre_name2 }}" class="form-control" id="inputName" placeholder="First Name">
                           </div>
                         </div>
                         <div class="form-group row">
                           <label for="inputName"> Exam Number</label>
                           <div class="col-sm-10">
                             <input type="text" name="lastname" value="{{ $viewsingleschool->examnumber2 }}" class="form-control" id="inputName" placeholder="Last Name">
                           </div>
                         </div>
                         
                       </div>

                       <div class="col-lg-6 col-md-6 col-sm-12">
                         <div class="form-group row">
                           <label for="inputName"> Year Obtain</label>
                           <div class="col-sm-10">
                             <input type="text" name="name" value="{{ $viewsingleschool->yearobtain2 }}" class="form-control" id="inputName" placeholder="First Name">
                           </div>
                         </div>
                         <div class="form-group row">
                           <label for="inputName"> Qualification Obtain</label>
                           <div class="col-sm-10">
                             <input type="text" name="lastname" value="{{ $viewsingleschool->qualiobtain2 }}" class="form-control" id="inputName" placeholder="Last Name">
                           </div>
                         </div>
                       </div>

                       <table class="col-lg-12">
                                       
                        <tr>
                                               
                          <th><div class="form-group col-12">
                              <select class="form-control" class="form-control" name="subject11" id="">
                                  <option value="{{ $viewsingleschool->subject11 }}">{{ $viewsingleschool->subject11 }}</option>
                                  <option value="Mathematic">Mathematics</option>
                                  <option value="English Language">English Language</option>
                                  <option value="Biology">Biology</option>
                                  <option value="Economics">Economics</option>
                                  <option value="Literature">Literature</option>
                                  <option value="Computer Studies">Computer Studies</option>
                                  <option value="Library Studies">Library Studies</option>
                                  <option value="Physics">Physics</option>
                                  <option value=" Chemistry">Chemistry</option>
                                  <option value="Technical Drawing">Technical Drawin</option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                                  <option value="French">French</option>
                                  <option value="Food and Nutrition">Food and Nutrition</option>
                                  <option value="C. R. Studies">C. R. Studies</option>
                                  <option value="Government">Government</option>
                                  <option value="History">History</option>
                                  <option value="Geography  Music">Geography</option>
                                  <option value="Fine Arts">Fine Arts</option>
                                  <option value="Music">Music</option>
                                  <option value="Agricultural Science">Commerce</option>
                                  <option value="Financial Accounting">Financial Accounting</option>
                                  <option value="Commerce ">Commerce </option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                             </select>
                          </div></th>
                          <th><div class="form-group col-12">
                              <select class="form-control" name="grade11" id="">
                                  <option value="{{ $viewsingleschool->grade11 }}">{{ $viewsingleschool->grade11 }}</option>
                                  <option value="A1">A1</option>
                                  <option value="A2">A2</option>
                                  <option value="A3">A3</option>
                                  <option value="B2">B2</option>
                                  <option value="B3">B3</option>
                                  <option value="C4">C4</option>
                                  <option value="C5">C5</option>
                                  <option value="C6">C6</option>
                                  <option value="D7">D7</option>
                                  <option value="F9">F9</option>
                             </select>
                          </div></th>
                      </tr>
                      <tr>
                         
                          <th><div class="form-group col-12">
                              <select class="form-control" name="subject12" id="">
                                  <option value="{{ $viewsingleschool->subject12 }}">{{ $viewsingleschool->subject12 }}</option>
                                  <option value="Mathematic">Mathematics</option>
                                  <option value="English Language">English Language</option>
                                  <option value="Biology">Biology</option>
                                  <option value="Economics">Economics</option>
                                  <option value="Literature">Literature</option>
                                  <option value="Computer Studies">Computer Studies</option>
                                  <option value="Library Studies">Library Studies</option>
                                  <option value="Physics">Physics</option>
                                  <option value=" Chemistry">Chemistry</option>
                                  <option value="Technical Drawing">Technical Drawin</option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                                  <option value="French">French</option>
                                  <option value="Food and Nutrition">Food and Nutrition</option>
                                  <option value="C. R. Studies">C. R. Studies</option>
                                  <option value="Government">Government</option>
                                  <option value="History">History</option>
                                  <option value="Geography  Music">Geography</option>
                                  <option value="Fine Arts">Fine Arts</option>
                                  <option value="Music">Music</option>
                                  <option value="Agricultural Science">Commerce</option>
                                  <option value="Financial Accounting">Financial Accounting</option>
                                  <option value="Commerce ">Commerce </option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                             </select>
                          </div></th>
                          <th><div class="form-group col-12">
                              <select class="form-control" name="grade12" id="">
                               <option value="{{ $viewsingleschool->grade12 }}">{{ $viewsingleschool->grade12 }}</option>

                                  <option value="A1">A1</option>
                                  <option value="A2">A2</option>
                                  <option value="A3">A3</option>
                                  <option value="B2">B2</option>
                                  <option value="B3">B3</option>
                                  <option value="C4">C4</option>
                                  <option value="C5">C5</option>
                                  <option value="C6">C6</option>
                                  <option value="D7">D7</option>
                                  <option value="F9">F9</option>
                             </select>
                          </div></th>
                      </tr>

                      <tr>
                         
                          <th><div class="form-group col-12">
                              <select class="form-control" name="subject13" id="">
                                  <option value="{{ $viewsingleschool->subject13 }}">{{ $viewsingleschool->subject13 }}</option>
                                  <option value="Mathematic">Mathematics</option>
                                  <option value="English Language">English Language</option>
                                  <option value="Biology">Biology</option>
                                  <option value="Economics">Economics</option>
                                  <option value="Literature">Literature</option>
                                  <option value="Computer Studies">Computer Studies</option>
                                  <option value="Library Studies">Library Studies</option>
                                  <option value="Physics">Physics</option>
                                  <option value=" Chemistry">Chemistry</option>
                                  <option value="Technical Drawing">Technical Drawin</option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                                  <option value="French">French</option>
                                  <option value="Food and Nutrition">Food and Nutrition</option>
                                  <option value="C. R. Studies">C. R. Studies</option>
                                  <option value="Government">Government</option>
                                  <option value="History">History</option>
                                  <option value="Geography  Music">Geography</option>
                                  <option value="Fine Arts">Fine Arts</option>
                                  <option value="Music">Music</option>
                                  <option value="Agricultural Science">Commerce</option>
                                  <option value="Financial Accounting">Financial Accounting</option>
                                  <option value="Commerce ">Commerce </option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                             </select>
                          </div></th>
                          <th><div class="form-group col-12">
                              <select class="form-control" name="grade13" id="">
                               <option value="{{ $viewsingleschool->grade13 }}">{{ $viewsingleschool->grade13 }}</option>

                                  <option value="A1">A1</option>
                                  <option value="A2">A2</option>
                                  <option value="A3">A3</option>
                                  <option value="B2">B2</option>
                                  <option value="B3">B3</option>
                                  <option value="C4">C4</option>
                                  <option value="C5">C5</option>
                                  <option value="C6">C6</option>
                                  <option value="D7">D7</option>
                                  <option value="F9">F9</option>
                             </select>
                          </div></th>
                      </tr>
                      <tr>
                         
                          <th><div class="form-group col-12">
                              <select class="form-control" name="subject14" id="">
                                  <option value="{{ $viewsingleschool->subject14 }}">{{ $viewsingleschool->subject14 }}</option>
                                  <option value="Mathematic">Mathematics</option>
                                  <option value="English Language">English Language</option>
                                  <option value="Biology">Biology</option>
                                  <option value="Economics">Economics</option>
                                  <option value="Literature">Literature</option>
                                  <option value="Computer Studies">Computer Studies</option>
                                  <option value="Library Studies">Library Studies</option>
                                  <option value="Physics">Physics</option>
                                  <option value=" Chemistry">Chemistry</option>
                                  <option value="Technical Drawing">Technical Drawin</option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                                  <option value="French">French</option>
                                  <option value="Food and Nutrition">Food and Nutrition</option>
                                  <option value="C. R. Studies">C. R. Studies</option>
                                  <option value="Government">Government</option>
                                  <option value="History">History</option>
                                  <option value="Geography  Music">Geography</option>
                                  <option value="Fine Arts">Fine Arts</option>
                                  <option value="Music">Music</option>
                                  <option value="Agricultural Science">Commerce</option>
                                  <option value="Financial Accounting">Financial Accounting</option>
                                  <option value="Commerce ">Commerce </option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                             </select>
                          </div></th>
                          <th><div class="form-group col-12">
                              <select class="form-control" name="grade14" id="">
                                <option value="{{ $viewsingleschool->grade14 }}">{{ $viewsingleschool->grade14 }}</option>

                                  <option value="A1">A1</option>
                                  <option value="A2">A2</option>
                                  <option value="A3">A3</option>
                                  <option value="B2">B2</option>
                                  <option value="B3">B3</option>
                                  <option value="C4">C4</option>
                                  <option value="C5">C5</option>
                                  <option value="C6">C6</option>
                                  <option value="D7">D7</option>
                                  <option value="F9">F9</option>
                             </select>
                          </div></th>
                      </tr>

                      <tr>
                         
                          <th><div class="form-group col-12">
                              <select class="form-control" name="subject15" id="">
                                  <option value="{{ $viewsingleschool->subject15 }}">{{ $viewsingleschool->subject15 }}</option>
                                  <option value="Mathematic">Mathematics</option>
                                  <option value="English Language">English Language</option>
                                  <option value="Biology">Biology</option>
                                  <option value="Economics">Economics</option>
                                  <option value="Literature">Literature</option>
                                  <option value="Computer Studies">Computer Studies</option>
                                  <option value="Library Studies">Library Studies</option>
                                  <option value="Physics">Physics</option>
                                  <option value=" Chemistry">Chemistry</option>
                                  <option value="Technical Drawing">Technical Drawin</option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                                  <option value="French">French</option>
                                  <option value="Food and Nutrition">Food and Nutrition</option>
                                  <option value="C. R. Studies">C. R. Studies</option>
                                  <option value="Government">Government</option>
                                  <option value="History">History</option>
                                  <option value="Geography  Music">Geography</option>
                                  <option value="Fine Arts">Fine Arts</option>
                                  <option value="Music">Music</option>
                                  <option value="Agricultural Science">Commerce</option>
                                  <option value="Financial Accounting">Financial Accounting</option>
                                  <option value="Commerce ">Commerce </option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                             </select>
                          </div></th>
                          <th><div class="form-group col-12">
                              <select class="form-control" name="grade15" id="">
                                 <option value="{{ $viewsingleschool->grade15 }}">{{ $viewsingleschool->grade15 }}</option>

                                  <option value="A1">A1</option>
                                  <option value="A2">A2</option>
                                  <option value="A3">A3</option>
                                  <option value="B2">B2</option>
                                  <option value="B3">B3</option>
                                  <option value="C4">C4</option>
                                  <option value="C5">C5</option>
                                  <option value="C6">C6</option>
                                  <option value="D7">D7</option>
                                  <option value="F9">F9</option>
                             </select>
                          </div></th>
                      </tr>
                      <tr>
                         
                          <th><div class="form-group col-12">
                              <select class="form-control" name="subject16" id="">
                                  <option value="{{ $viewsingleschool->subject16 }}">{{ $viewsingleschool->subject16 }}</option>
                                  <option value="Mathematic">Mathematics</option>
                                  <option value="English Language">English Language</option>
                                  <option value="Biology">Biology</option>
                                  <option value="Economics">Economics</option>
                                  <option value="Literature">Literature</option>
                                  <option value="Computer Studies">Computer Studies</option>
                                  <option value="Library Studies">Library Studies</option>
                                  <option value="Physics">Physics</option>
                                  <option value=" Chemistry">Chemistry</option>
                                  <option value="Technical Drawing">Technical Drawin</option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                                  <option value="French">French</option>
                                  <option value="Food and Nutrition">Food and Nutrition</option>
                                  <option value="C. R. Studies">C. R. Studies</option>
                                  <option value="Government">Government</option>
                                  <option value="History">History</option>
                                  <option value="Geography  Music">Geography</option>
                                  <option value="Fine Arts">Fine Arts</option>
                                  <option value="Music">Music</option>
                                  <option value="Agricultural Science">Commerce</option>
                                  <option value="Financial Accounting">Financial Accounting</option>
                                  <option value="Commerce ">Commerce </option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                             </select>
                          </div></th>
                          <th><div class="form-group col-12">
                              <select class="form-control" name="grade16" id="">
                              <option value="{{ $viewsingleschool->grade16 }}">{{ $viewsingleschool->grade16 }}</option>

                                  <option value="A1">A1</option>
                                  <option value="A2">A2</option>
                                  <option value="A3">A3</option>
                                  <option value="B2">B2</option>
                                  <option value="B3">B3</option>
                                  <option value="C4">C4</option>
                                  <option value="C5">C5</option>
                                  <option value="C6">C6</option>
                                  <option value="D7">D7</option>
                                  <option value="F9">F9</option>
                             </select>
                          </div></th>
                      </tr>

                      <tr>
                         
                          <th><div class="form-group col-12">
                              <select class="form-control" name="subject17" id="">
                                  <option value="{{ $viewsingleschool->subject17 }}">{{ $viewsingleschool->subject17 }}</option>
                                  <option value="Mathematic">Mathematics</option>
                                  <option value="English Language">English Language</option>
                                  <option value="Biology">Biology</option>
                                  <option value="Economics">Economics</option>
                                  <option value="Literature">Literature</option>
                                  <option value="Computer Studies">Computer Studies</option>
                                  <option value="Library Studies">Library Studies</option>
                                  <option value="Physics">Physics</option>
                                  <option value=" Chemistry">Chemistry</option>
                                  <option value="Technical Drawing">Technical Drawin</option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                                  <option value="French">French</option>
                                  <option value="Food and Nutrition">Food and Nutrition</option>
                                  <option value="C. R. Studies">C. R. Studies</option>
                                  <option value="Government">Government</option>
                                  <option value="History">History</option>
                                  <option value="Geography  Music">Geography</option>
                                  <option value="Fine Arts">Fine Arts</option>
                                  <option value="Music">Music</option>
                                  <option value="Agricultural Science">Commerce</option>
                                  <option value="Financial Accounting">Financial Accounting</option>
                                  <option value="Commerce ">Commerce </option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                             </select>
                          </div></th>
                          <th><div class="form-group col-12">
                              <select class="form-control" name="grade17" id="">
                                <option value="{{ $viewsingleschool->grade17 }}">{{ $viewsingleschool->grade17 }}</option>

                                  <option value="A1">A1</option>
                                  <option value="A2">A2</option>
                                  <option value="A3">A3</option>
                                  <option value="B2">B2</option>
                                  <option value="B3">B3</option>
                                  <option value="C4">C4</option>
                                  <option value="C5">C5</option>
                                  <option value="C6">C6</option>
                                  <option value="D7">D7</option>
                                  <option value="F9">F9</option>
                             </select>
                          </div></th>
                      </tr>

                      <tr>
                         
                          <th><div class="form-group col-12">
                              <select class="form-control" name="subject18" id="">
                                  <option value="{{ $viewsingleschool->subject18 }}">{{ $viewsingleschool->subject18 }}</option>
                                  <option value="Mathematic">Mathematics</option>
                                  <option value="English Language">English Language</option>
                                  <option value="Biology">Biology</option>
                                  <option value="Economics">Economics</option>
                                  <option value="Literature">Literature</option>
                                  <option value="Computer Studies">Computer Studies</option>
                                  <option value="Library Studies">Library Studies</option>
                                  <option value="Physics">Physics</option>
                                  <option value=" Chemistry">Chemistry</option>
                                  <option value="Technical Drawing">Technical Drawin</option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                                  <option value="French">French</option>
                                  <option value="Food and Nutrition">Food and Nutrition</option>
                                  <option value="C. R. Studies">C. R. Studies</option>
                                  <option value="Government">Government</option>
                                  <option value="History">History</option>
                                  <option value="Geography  Music">Geography</option>
                                  <option value="Fine Arts">Fine Arts</option>
                                  <option value="Music">Music</option>
                                  <option value="Agricultural Science">Commerce</option>
                                  <option value="Financial Accounting">Financial Accounting</option>
                                  <option value="Commerce ">Commerce </option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                             </select>
                          </div></th>
                          <th><div class="form-group col-12">
                              <select class="form-control" name="grade18" id="">
                                <option value="{{ $viewsingleschool->grade18 }}">{{ $viewsingleschool->grade18 }}</option>

                                  <option value="A1">A1</option>
                                  <option value="A2">A2</option>
                                  <option value="A3">A3</option>
                                  <option value="B2">B2</option>
                                  <option value="B3">B3</option>
                                  <option value="C4">C4</option>
                                  <option value="C5">C5</option>
                                  <option value="C6">C6</option>
                                  <option value="D7">D7</option>
                                  <option value="F9">F9</option>
                             </select>
                          </div></th>
                      </tr>

                      <tr>
                         
                          <th><div class="form-group col-12">
                              <select class="form-control" name="subject19" id="">
                                  <option value="{{ $viewsingleschool->subject19 }}">{{ $viewsingleschool->subject19 }}</option>
                                  <option value="Mathematic">Mathematics</option>
                                  <option value="English Language">English Language</option>
                                  <option value="Biology">Biology</option>
                                  <option value="Economics">Economics</option>
                                  <option value="Literature">Literature</option>
                                  <option value="Computer Studies">Computer Studies</option>
                                  <option value="Library Studies">Library Studies</option>
                                  <option value="Physics">Physics</option>
                                  <option value=" Chemistry">Chemistry</option>
                                  <option value="Technical Drawing">Technical Drawin</option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                                  <option value="French">French</option>
                                  <option value="Food and Nutrition">Food and Nutrition</option>
                                  <option value="C. R. Studies">C. R. Studies</option>
                                  <option value="Government">Government</option>
                                  <option value="History">History</option>
                                  <option value="Geography  Music">Geography</option>
                                  <option value="Fine Arts">Fine Arts</option>
                                  <option value="Music">Music</option>
                                  <option value="Agricultural Science">Commerce</option>
                                  <option value="Financial Accounting">Financial Accounting</option>
                                  <option value="Commerce ">Commerce </option>
                                  <option value="Agricultural Science">Agricultural Science</option>
                             </select>
                          </div></th>
                          <th><div class="form-group col-12">
                              <select class="form-control" name="grade19" id="">
                                  <option value="{{ $viewsingleschool->grade19 }}">{{ $viewsingleschool->grade19 }}</option>


                                  <option value="A1">A1</option>
                                  <option value="A2">A2</option>
                                  <option value="A3">A3</option>
                                  <option value="B2">B2</option>
                                  <option value="B3">B3</option>
                                  <option value="C4">C4</option>
                                  <option value="C5">C5</option>
                                  <option value="C6">C6</option>
                                  <option value="D7">D7</option>
                                  <option value="F9">F9</option>
                             </select>
                          </div></th>
                      </tr>
                </table>
                     </div>
                    </div> 
                 </div>
                </div>



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
    @include('dashboard.admin.footer')

    

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

