@include('dashboard.header')

  <!-- Main Sidebar Container -->
  @include('dashboard.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Your Students Result</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
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
                  <tr>
                    <th>Surname</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Admission No</th>
                    <th>Status</th>
                    <th>Psycomotor</th>
                    <th>CA 1</th>
                    <th>CA 2</th>
                    <th>Exams</th>
                    <th>Total</th>
                    <th>Grade</th>
                
                  </tr>
                  </thead>
                  <tbody>

                  @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                        @endif
      
                        @if (Session::get('fail'))
                        <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                        @endif
                    @php
                        
                      //  $total_score = 0;
                    @endphp
                    @foreach ($view_myresults as $view_myresult)
                      
                      @php
                         // $total_score +=$view_myresult->test_1 + $view_myresult->test_2 + $view_myresult->test_3 + $view_myresult->exams;
                          
                      @endphp
                      <tr>
                        <td>{{ $view_myresult->surname }}</td>
                        <td>{{ $view_myresult->fname }} <br> 
                           <small> {{ $view_myresult->subjectname }}
                          
                        </small>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                          Search Term
                        </button>
                          
                      </td>
                        <td>{{ $view_myresult->middlename }} <br> 
                        
                        <small> Class: {{ $view_myresult->classname }}</small>
                        <a href="{{ url('admin/approveresultbyteacher/'.$view_myresult->id) }}"
                          class='btn btn-success'>
                          Approved
                           <i class="far fa-user"></i>
                    </td>
                        <td>{{ $view_myresult->regnumber }} <br> <small> Term: {{ $view_myresult->term }}</small></td>
                        <td> @if ( $view_myresult->status == null)
                          <span class="badge badge-warning">In review</span>
                          
                        @elseif ( $view_myresult->status == 'approved')
                        <span class="badge badge-success">Approved</span>
                          @elseif ( $view_myresult->status == 'suspend')
                          <a href="#" class="btn btn-warning btn-block"><b>Suspended</b></a>
      
                          @elseif ( $view_myresult->status == 'admitted')
                          <a href="#" class="btn btn-danger btn-block"><b>Reject</b></a>
                          @else
                          
                        @endif</td>
                        <td><a href="{{ url('admin/addpsychomotor/'.$view_myresult->ref_no2) }}"
                          class='btn btn-default'>
                          Add Psycomotor
                           <i class="far fa-eye"></i>

                       

                      {{-- <td>{{ $view_myresult->user['ref_no'] }}</td> --}}
                      <td>{{ $view_myresult->test_1 }}
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-success">
                          Search Result
                        </button>
                      </td>
                      <td>{{ $view_myresult->test_2 }}</td>
                      <td>{{ $view_myresult->exams }}</td>
                      <td>{{ $view_myresult->test_1 + $view_myresult->test_2 + $view_myresult->test_3 + $view_myresult->exams }}</td>
                      <td>@if ($view_myresult->test_1 + $view_myresult->test_2 + $view_myresult->test_3 + $view_myresult->exams > 79)
                       <p>A</p>
                        @elseif ($view_myresult->test_1 + $view_myresult->test_2 + $view_myresult->test_3 + $view_myresult->exams > 69)
                        <p>B</p>


                        @elseif ($view_myresult->test_1 + $view_myresult->test_2 + $view_myresult->test_3 + $view_myresult->exams > 59)
                        <p>C</p>

                        @elseif ($view_myresult->test_1 + $view_myresult->test_2 + $view_myresult->test_3 + $view_myresult->exams > 49)
                        <p>D</p>

                        @elseif ($view_myresult->test_1 + $view_myresult->test_2 + $view_myresult->test_3 + $view_myresult->exams > 40)
                        <p>E</p>

                        @elseif ($view_myresult->test_1 + $view_myresult->test_2 + $view_myresult->test_3 + $view_myresult->exams > 39)
                        <p>F</p>

                        @else
                        <p>F</p>
                      @endif</td>

                      {{-- <td></td> --}}
                         
                      
                  
                       
                  

                      </tr>
                     
                     @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Surname</th>
                      <th>Firstname</th>
                      <th>Middlename</th>
                      <th>Admission No</th>
                      <th>Status</th>
                      <th>Psycomotor</th>

                      {{-- <th>Ref. No</th> --}}
                      <th>CA 1</th>
                      <th>CA 2</th>
                      <!-- <th>CA 3</th> -->
                      <th>Exams</th>
                      <th>Total</th>
                      {{-- <th></th> --}}
                      <th>Grade</th>
                    
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 

</div>
<!-- ./wrapper -->


<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Seach Term</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('admin/searchfortermbyschresult') }}" method="post">
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
          <div class="form-group">
    <label for="">School</label>
    <select class="form-control" name="school_id">
        @if(isset($view_myresult))
            <option value="{{ $view_myresult->school_id ?? '' }}">
                {{ $view_myresult->school['schoolname'] ?? 'School not available' }}
            </option>
        @else
            <option value="">
                No school record available
            </option>
        @endif
    </select>
</div>

          <div class="form-group">
            <label for="">Classes</label>
            <select class="form-control" name="classname">
          
                  <option value="{{ $class->classname }}">{{ $class->classname }}</option>
                
            </select>
          </div>


          <div class="form-group">
            <label for="">Alms Optional</label>
            <select class="form-control" name="alms">
                <option value="">Select Alms optional</option>

              @foreach ($view_alms as $view_alm)
                <option value="{{ $view_alm->alms }}">{{ $view_alm->alms }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="">Terms</label>
            <select class="form-control" name="term">
                <option value="First Term">First Term</option>
                <option value="Second Term">Second Term</option>
                <option value="Third Term">Third Term</option>
            </select>
          </div>

          <div class="form-group">
            <label for="">Academic Session</label>
            <select class="form-control" name="academic_session">
              @foreach ($view_sessions as $view_session)
                <option value="{{ $view_session->academic_session }}">{{ $view_session->academic_session }}</option>
                
              @endforeach
            </select>
          </div>

          
          <div class="form-group">
            <label for=""> Sections</label>
            <select class="form-control" name="section">
              @if (Auth::guard('web')->user()->schooltype == 'SUBEB')
                <option value="Primary">Primary</option>
                
              @else
              <option value="Secondary">Secondary</option>
                <!-- <option value="Senior Secondary">Senior Secondary</option> -->
              @endif
                
            </select>
          </div>

          <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Search</button>
          </div>
        </form>
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->










<div class="modal fade" id="modal-success">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Search Student Result</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('admin/searchforstudentresult') }}" method="post">
          @csrf
         <div class="form-group">
    <label for="">School</label>
    <select class="form-control" name="school_id">
        @if(isset($view_myresult))
            <option value="{{ $view_myresult->school_id ?? '' }}">
                {{ $view_myresult->school['schoolname'] ?? 'School not available' }}
            </option>
        @else
            <option value="">
                No school record available
            </option>
        @endif
    </select>
</div>

          <div class="form-group">
            <label for="">Classes</label>
            <select class="form-control" name="classname">
              @foreach ($myclasses as $myclasse)
                <option value="{{ $myclasse->classname }}">{{ $myclasse->classname }}</option>
              @endforeach
            </select>
          </div>

          
          <div class="form-group">
            <label for="">Reg. number</label>
            <select class="form-control" name="regnumber">
              @foreach ($view_students as $view_student)
                <option value="{{ $view_student->regnumber }}">{{ $view_student->section }} {{ $view_student->surname }} {{ $view_myresult->fname }} {{ $view_myresult->classname }} {{ $view_myresult->regnumber }}</option>
                
              @endforeach
            </select>
          </div>


          <div class="form-group">
            <label for="">Alms Optional</label>
            <select class="form-control" name="alms">
                <!-- <option value="">Select Alms optional</option> -->

              @foreach ($view_alms as $view_alm)
                <option value="{{ $view_alm->alms }}">{{ $view_alm->alms }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="">Terms</label>
            <select class="form-control" name="term">
              @foreach ($view_myresults as $view_myresult)
                <option value="{{ $view_myresult->term }}">{{ $view_myresult->term }}</option>
                
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="">Academic Session</label>
            <select class="form-control" name="academic_session">
              @foreach ($view_sessions as $view_session)
                <option value="{{ $view_session->academic_session }}">{{ $view_session->academic_session }}</option>
                
              @endforeach
            </select>
          </div>

          
          <div class="form-group">
            <label for=""> Sections</label>
            <select class="form-control" name="section">
              @If (Auth::guard('web')->user()->schooltype == 'SUBEB')
                <option value="Primary">Primary</option>
              @else
                <option value="Secondary">Secondary</option>
              @endif
                <!-- <option value="Senior Secondary">Senior Secondary</option> -->
            </select>
          </div>

          <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Search</button>
          </div>
        </form>
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->






@include('dashboard.footer')