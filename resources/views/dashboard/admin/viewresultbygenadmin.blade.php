@include('dashboard.admin.header')

  <!-- Main Sidebar Container -->
  @include('dashboard.admin.sidebar')

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
                  <tr>
                    <th>Schoolname</th>
                    <th>Teacher</th>
                    <th>Surname</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Admission No</th>
                    <th>Search Sch.</th>
                    {{-- <th>Ref. No</th> --}}
                    <th>CA 1</th>
                    <th>CA 2</th>
                    <th>Exams</th>
                    <th>Total</th>
                    <th>Grade</th>
                    <th>Status</th>
                    <th>View Single</th>

                    {{-- <th>View</th> --}}
                    <th>Approved</th>
                    <th>Edit</th>

              
                    {{-- <th>Date</th> --}}
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
                    @foreach ($schoolresults as $schoolresult)
                        @if ($schoolresult->status == null)
                            
                    {{-- @if ($schoolresult->status = null) --}}
                    @php
                    // $total_score +=$schoolresult->test_1 + $schoolresult->test_2 + $schoolresult->test_3 + $schoolresult->exams;
                     
                 @endphp
                 <tr>
                   <td>{{ $schoolresult->school['schoolname'] }}</td>
                   <td>Teacher: {{ $schoolresult->user['fname'] }} {{ $schoolresult->user['surname'] }} <br>
                    {{ $schoolresult->user['classname'] }} 
                  </td>
                   <td>{{ $schoolresult->surname }}</td>
                   <td>{{ $schoolresult->fname }}</td>
                   <td>{{ $schoolresult->middlename }}</td>
                   <td>{{ $schoolresult->regnumber }} <small>{{ $schoolresult->classname }} </small></td>
                   {{-- <td><a href="{{ url('admin/addpsychomotorad/'.$schoolresult->id) }}"
                     class='btn btn-default'>
                     Add Search Sch.
                      <i class="far fa-eye"></i> --}}
                      <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                        Search Results 
                      </button></td>

                  

                 {{-- <td>{{ $schoolresult->user['ref_no'] }}</td> --}}
                 <td>{{ $schoolresult->test_1 }}</td>
                 <td>{{ $schoolresult->test_2 }}</td>
                 <td>{{ $schoolresult->exams }}</td>
                 <td>{{ $schoolresult->test_1 + $schoolresult->test_2 + $schoolresult->test_3 + $schoolresult->exams }}</td>
                 <td>@if ($schoolresult->test_1 + $schoolresult->test_2 + $schoolresult->test_3 + $schoolresult->exams > 79)
                   <p>A</p>
                  
                   @elseif ($schoolresult->test_1 + $schoolresult->test_2 + $schoolresult->test_3 + $schoolresult->exams > 69)
                   <p>B</p>
                   @elseif ($schoolresult->test_1 + $schoolresult->test_2 + $schoolresult->test_3 + $schoolresult->exams > 59)
                   <p>C</p>
                   @elseif ($schoolresult->test_1 + $schoolresult->test_2 + $schoolresult->test_3 + $schoolresult->exams > 49)
                   <p>D</p>
                   @elseif ($schoolresult->test_1 + $schoolresult->test_2 + $schoolresult->test_3 + $schoolresult->exams > 40)
                   <p>E</p>
                   @elseif ($schoolresult->test_1 + $schoolresult->test_2 + $schoolresult->test_3 + $schoolresult->exams > 39)
                   <p>F</p>
                   @else
                   <p>F</p>
                 @endif</td>

                
                    
                 <td>@if ($schoolresult->status == null)
                    <span class="badge badge-secondary"> In progress</span>
                   @elseif($schoolresult->status == 'suspend')
                   <span class="badge badge-warning"> Suspended</span>
                   @elseif($schoolresult->status == 'sacked')
                   <span class="badge badge-danger"> Sacked</span>
                   @else
                   <span class="badge badge-success">Approved</span>
                   @endif</td>

                   <td><a href="{{ url('admin/viewresult/'.$schoolresult->id)}}"
                    class='btn btn-default'>
                     View Single
                 </a></td>


                    {{-- <td><a href="{{ url('admin/viewresults/'.$schoolresult->user_id)}}"
                     class='btn btn-default'>
                      View All Sujects
                  </a></td> --}}

                 
                  
             
                  <td><a href="{{ url('admin/approveresults/'.$schoolresult->id)}}"
                    class='btn btn-warning'>
                    Approved
                 </a></td>



                 <td><a href="{{ url('admin/editviewresultsad/'.$schoolresult->id)}}"
                    class='btn btn-primary'>
                     <i class="far fa-edit"></i>
                 </a></td>
                 </tr>
               



                        @else
                            
                        @endif
                    @endforeach
            
                    
                     
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>School Name</th>
                        <th>Teacher</th>
                        <th>Surname</th>
                        <th>Firstname</th>
                        <th>Middlename</th>
                        <th>Admission No</th>
                        <th>Search Sch.</th>
                        <th>CA 1</th>
                        <th>CA 2</th>
                        <th>Exams</th>
                        <th>Total</th>
                        <th>Grade</th>
                        <th>Status</th>
                        <th>View Single</th>
                        {{-- <th>View</th> --}}
                        <th>Approved</th>
                        <th>Edit</th>
    
                  
                        {{-- <th>Date</th> --}}
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
  @include('dashboard.admin.footer')

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Search  Results</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="{{ url('admin/searchforstudentresult') }}" method="post">
        @csrf
          <div class="form-group">
            <label for="">Sch. Name</label>
              <select name="school_id" class="form-control" id="">
                @foreach ($schoolresults as $schoolresult)
                  <option value="{{ $schoolresult->school['id'] }}">{{ $schoolresult->school['schoolname'] }}</option>
                @endforeach
              </select>
          </div>
          
          <div class="form-group">
            <label for="">Classname</label>
              <select name="classname" class="form-control" id="">
                  <option value="{{ $view_classes->classname }}">{{ $view_classes->classname }}</option>
              </select>
          </div>
          <div class="form-group">
            <label for="">Select Alms</label>
              <select name="alms" class="form-control" id="">
                @foreach ($view_alms as $view_alm)
                  <option value="{{ $view_alm->alms }}">{{ $view_alm->alms }}</option>
                @endforeach
              </select>
          </div>


          <div class="form-group">
            <label for="">Reg Number</label>
              <select name="regnumber" class="form-control" id="">
                @foreach ($students as $student)
                  <option value="{{ $student->regnumber }}">{{ $student->regnumber }}</option>
                @endforeach
              </select>
          </div>

          <div class="form-group">
            <label for="">Academic Session</label>
              <select name="academic_session" class="form-control" id="">
                @foreach ($view_academcsessions as $view_academcsession)
                  <option value="{{ $view_academcsession->academic_session }}">{{ $view_academcsession->academic_session }}</option>
                @endforeach
              </select>
          </div>


          
          <div class="form-group">
            <label for="">Term</label>
              <select name="term" class="form-control" id="">
                  <option value="First Term">First Term</option>
                  <option value="Second Term">Second Term</option>
                  <option value="Third Term">Third Term</option>
              </select>
          </div>

           <div class="form-group">
            <label for="">Section</label>
              <select name="section" class="form-control" id="">
                  <option value="Primary">Primary</option>
                  <option value="Secondary">Secondary</option>
              </select>
          </div>
    
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">View</button>
      </div>

    </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->