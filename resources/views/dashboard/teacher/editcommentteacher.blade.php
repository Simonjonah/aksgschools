@include('dashboard.teacher.header')
@include('dashboard.teacher.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subjects </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Subjects</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Domains</h5>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <div class="btn-group">
                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                  <i class="fas fa-wrench"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" role="menu">
                  <a href="#" class="dropdown-item">Action</a>
                  <a href="#" class="dropdown-item">Another action</a>
                  <a href="#" class="dropdown-item">Something else here</a>
                  <a class="dropdown-divider"></a>
                  <a href="#" class="dropdown-item">Separated link</a>
                </div>
              </div>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                {{-- <p class="text-center">
                  <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                </p> --}}

                <div class="table-responsive">
                  {{-- <p class="lead">Behaviour</p> --}}
    
                  <form action="{{ url('admin/updatepsychomotorom/' . $edit_psychomotor->ref_no) }}" method="post" enctype="multipart/form-data">
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
                    <table class="table table-bordered">
                      <tr>
                        <th style="width:50%">COGNITIVE DOMAIN:</th>
                        <th style="width:50%">A</th>
                        <th style="width:50%">B</th>
                        <th style="width:50%">C</th>
                        <th style="width:50%">D</th>
                        <th style="width:50%">E</th>
                      </tr>


                      @php
                          $motorIndex = 0;
                      @endphp

                        @foreach ($view_domains as $view_domain)
                            @if ($view_domain->psycomoto == 'Cognitive Domain')
                                <tr>
                                    <th>{{ $view_domain->cogname }}</th>

                                    <input type="hidden"
                                          name="motors[{{ $motorIndex }}][cogname]"
                                          value="{{ $view_domain->cogname }}">

                                    <input type="hidden"
                                          name="motors[{{ $motorIndex }}][psycomoto]"
                                          value="{{ $view_domain->psycomoto }}">

                                    @foreach (['A', 'B', 'C', 'D', 'E'] as $grade)
                                        <td>
                                            <input type="radio"
                                                  name="motors[{{ $motorIndex }}][punt1]"
                                                  value="{{ $grade }}"
                                                  {{ old("motors.$motorIndex.punt1", $view_domain->punt1) == $grade ? 'checked' : '' }}>
                                        </td>
                                    @endforeach
                                </tr>

                                @php $motorIndex++; @endphp

                            @endif

                        @endforeach


                    </table>
                     <div class="form-group">
                      <textarea required
                          class="form-control"
                          name="teacher_comment"
                          cols="20"
                          rows="5"
                          value="{!! $edit_psychomotor->teacher_comment !!}"
                          placeholder="Teacher's Comment"
                      >{!! $edit_psychomotor->teacher_comment !!}</textarea>
                  </div>


                  <div class="form-group">
                    <label for="">Next Term Begins</label>
                      <input required
                          class="form-control"
                          name="nextterm"
                          value="{{ $edit_psychomotor->nextterm }}"
                          placeholder="Next Term Begins"
                      >
                  </div>


                  <div class="form-group">
                    <label for="">Conduct</label>
                      <input required
                          class="form-control"
                          name="conduct"
                          value="{{ $edit_psychomotor->conduct }}"
                          placeholder="Conduct"
                      >
                  </div>

                  <div class="form-group">
                    <label for="">Next Term School Fees</label>
                      <input required
                          class="form-control"
                          name="nextermschoolfees"
                          value="{{ $edit_psychomotor->nextermschoolfees }}"
                          placeholder="Next Term School Fees"
                      >
                  </div>
                  <div class="form-group">
                    <label for="">Attendant</label>
                    <input required class="form-control" name="attendant" value="{{ $edit_psychomotor->attendant }}" placeholder="Attendant">
                </div>
                <div class="form-group">
                  <label for="">Out Of</label>
                  <input required class="form-control" name="outoff" value="{{ $edit_psychomotor->outoff }}" placeholder="Out Of">
              </div>

                </div>
               
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                

                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th style="width:50%">PSYCHOMOTOR DOMAIN:</th>
                      <th style="width:50%">A</th>
                      <th style="width:50%">B</th>
                      <th style="width:50%">C</th>
                      <th style="width:50%">D</th>
                      <th style="width:50%">E</th>
                    </tr>
                    
                    @foreach ($view_domains as $view_domain)

                      @if ($view_domain->psycomoto == 'Psychomotor Domain')

                          <tr>
                              <th>{{ $view_domain->cogname }}</th>

                              <input type="hidden"
                                    name="motors[{{ $motorIndex }}][cogname]"
                                    value="{{ $view_domain->cogname }}">

                              <input type="hidden"
                                    name="motors[{{ $motorIndex }}][psycomoto]"
                                    value="{{ $view_domain->psycomoto }}">

                              @foreach (['A', 'B', 'C', 'D', 'E'] as $grade)
                                  <td>
                                      <input type="radio"
                                            name="motors[{{ $motorIndex }}][punt5]"
                                            value="{{ $grade }}"
                                            {{ old("motors.$motorIndex.punt5", $view_domain->punt5) == $grade ? 'checked' : '' }}>
                                  </td>
                              @endforeach
                          </tr>

                          @php $motorIndex++; @endphp

                      @endif

                  @endforeach

                  </table>
    
                </div>
                <table class="table table-bordered">
                  <tr>
                    <th style="width:50%" colspan="5" style="text-align: center">GRADING AND KEY</th>
                    
                  </tr>
                  <tr>
                    <th>0</th>
                    <td>-</td>
                    <td>39</td>
                    <td>F</td>
                    <td>FAIL</td>
                  </tr>
                  <tr>
                    <th>40</th>
                    <td>-</td>
                    <td>49</td>
                    <td>E</td>
                    <td>FAIR</td>
                  </tr>
  
                  <tr>
                    <th>50</th>
                    <td>-</td>
                    <td>59</td>
                    <td>D</td>
                    <td>PASS</td>
                  </tr>
                  <tr>
                    <th>60</th>
                    <td>-</td>
                    <td>69</td>
                    <td>C</td>
                    <td>GOOD</td>
                  </tr>
  
                  <tr>
                    <th>70</th>
                    <td>-</td>
                    <td>79</td>
                    <td>B</td>
                    <td>VERY GOOD</td>
                  </tr>
                  <tr>
                    <th>80</th>
                    <td>-</td>
                    <td>100</td>
                    <td>A</td>
                    <td>EXCELLENCE</td>
                  </tr>
                  
                </table>
              </div>
              <button type="submit" class="btn btn-success"><i class="far fa-bell"></i> Submit
                 
              </button>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
















    

  </div>
  <!-- /.content-wrapper -->

  
 @include('dashboard.teacher.footer')