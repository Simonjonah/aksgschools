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
                    <!-- <th>CA 3</th> -->
                    <th>Exams</th>
                    <th>Total</th>
                    <th>Grade</th>
                    <th>Status</th>
                    <th>View Single</th>

                    <th>View</th>
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
                    @foreach ($view_schholsresults as $view_schholsresult)
                        {{-- @if ($view_schholsresult->status == null) --}}
                            
                    {{-- @if ($view_schholsresult->status = null) --}}
                    @php
                    // $total_score +=$view_schholsresult->test_1 + $view_schholsresult->test_2 + $view_schholsresult->test_3 + $view_schholsresult->exams;
                     
                 @endphp
                 <tr>
                   <td>{{ $view_schholsresult->school['schoolname'] }}</td>
                   <td>Teacher: {{ $view_schholsresult->user['fname'] }} {{ $view_schholsresult->user['surname'] }} <br>
                    {{ $view_schholsresult->user['classname'] }} 
                  </td>
                   <td>{{ $view_schholsresult->surname }}</td>
                   <td>{{ $view_schholsresult->fname }}</td>
                   <td>{{ $view_schholsresult->middlename }}</td>
                   <td>{{ $view_schholsresult->regnumber }} <small>{{ $view_schholsresult->classname }} </small></td>
                   {{-- <td><a href="{{ url('admin/addpsychomotorad/'.$view_schholsresult->id) }}"
                     class='btn btn-default'>
                     Add Search Sch.
                      <i class="far fa-eye"></i> --}}
                      <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                        Search Results of Sch.
                      </button></td>

                  

                 {{-- <td>{{ $view_schholsresult->user['ref_no'] }}</td> --}}
                 <td>{{ $view_schholsresult->test_1 }}</td>
                 <td>{{ $view_schholsresult->test_2 }}</td>
                 <td>{{ $view_schholsresult->exams }}</td>
                 <td>{{ $view_schholsresult->test_1 + $view_schholsresult->test_2 + $view_schholsresult->test_3 + $view_schholsresult->exams }}</td>
                 <td>@if ($view_schholsresult->test_1 + $view_schholsresult->test_2 + $view_schholsresult->test_3 + $view_schholsresult->exams > 79)
                   <p>A</p>
                  
                   @elseif ($view_schholsresult->test_1 + $view_schholsresult->test_2 + $view_schholsresult->test_3 + $view_schholsresult->exams > 69)
                   <p>B</p>
                   @elseif ($view_schholsresult->test_1 + $view_schholsresult->test_2 + $view_schholsresult->test_3 + $view_schholsresult->exams > 59)
                   <p>C</p>
                   @elseif ($view_schholsresult->test_1 + $view_schholsresult->test_2 + $view_schholsresult->test_3 + $view_schholsresult->exams > 49)
                   <p>D</p>
                   @elseif ($view_schholsresult->test_1 + $view_schholsresult->test_2 + $view_schholsresult->test_3 + $view_schholsresult->exams > 40)
                   <p>E</p>
                   @elseif ($view_schholsresult->test_1 + $view_schholsresult->test_2 + $view_schholsresult->test_3 + $view_schholsresult->exams > 39)
                   <p>F</p>
                   @else
                   <p>F</p>
                 @endif</td>

                
                    
                 <td>@if ($view_schholsresult->status == null)
                    <span class="badge badge-secondary"> In progress</span>
                   @elseif($view_schholsresult->status == 'suspend')
                   <span class="badge badge-warning"> Suspended</span>
                   @elseif($view_schholsresult->status == 'sacked')
                   <span class="badge badge-danger"> Sacked</span>
                   @else
                   <span class="badge badge-success">Approved</span>
                   @endif</td>

                   <td><a href="{{ url('admin/viewresult/'.$view_schholsresult->id)}}"
                    class='btn btn-default'>
                     View Single
                 </a></td>


                    <td><a href="{{ url('admin/viewresults/'.$view_schholsresult->user_id)}}"
                     class='btn btn-default'>
                      View All Sujects
                  </a></td>

                 
                  
             
                  <td><a href="{{ url('admin/approveresults/'.$view_schholsresult->id)}}"
                    class='btn btn-warning'>
                    Approved
                 </a></td>



                 <td><a href="{{ url('admin/editviewresultsad/'.$view_schholsresult->id)}}"
                    class='btn btn-primary'>
                     <i class="far fa-edit"></i>
                 </a></td>
                 </tr>
               



                        {{-- @else
                            
                        @endif --}}
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
                        {{-- <th>Ref. No</th> --}}
                        <th>CA 1</th>
                        <th>CA 2</th>
                        <!-- <th>CA 3</th> -->
                        <th>Exams</th>
                        <th>Total</th>
                        <th>Grade</th>
                        <th>Status</th>
                        <th>View Single</th>
                        <th>View</th>
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
        <h4 class="modal-title">Search Sch. Results</h4>
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
                @foreach ($view_schholsresults as $view_schholsresult)
                  <option value="{{ $view_schholsresult->school['school_id'] }}">{{ $view_schholsresult->school['schoolname'] }}</option>
                @endforeach
              </select>
          </div>

          <div class="form-group">
            <label for="">Classname</label>
              <select name="classname" class="form-control" id="">
                @foreach ($view_schholsresults as $view_schholsresult)
                  <option value="{{ $view_schholsresult->classname }}">{{ $view_schholsresult->classname }}</option>
                @endforeach
              </select>
          </div>

         <div class="form-group">
            <label for="">Academic Session</label>
              <select name="academic_session" class="form-control" id="">
                @foreach ($view_schholsresults as $view_schholsresult)
                  <option value="{{ $view_schholsresult->academic_session }}">{{ $view_schholsresult->academic_session }}</option>
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
            <label for="">Term</label>
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