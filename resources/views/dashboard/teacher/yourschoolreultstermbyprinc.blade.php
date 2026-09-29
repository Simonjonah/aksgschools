@include('dashboard.teacher.header')

  <!-- Main Sidebar Container -->
  @include('dashboard.teacher.sidebar')

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
                    <!-- <th>CA 3</th> -->
                    <th>Exams</th>
                    <th>Total</th>
                    <th>Grade</th>
                   

                  </tr>
                  </thead>
                  <tbody>
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
                          
                         
                      
                      </td>
                        <td>{{ $view_myresult->middlename }} <br> <small> Class: {{ $view_myresult->classname }}</small></td>
                        <td>{{ $view_myresult->regnumber }} <br> 
                        
                        <small> Term: {{ $view_myresult->term }}</small>
                        
                      </td>
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
                        <td><a href="{{ url('admin/addpsychomotor/'.$view_myresult->id) }}"
                          class='btn btn-default'>
                          Add Psycomotor
                           <i class="far fa-eye"></i>

                       

                      {{-- <td>{{ $view_myresult->user['ref_no'] }}</td> --}}
                      <td>{{ $view_myresult->test_1 }}</td>
                      <td>{{ $view_myresult->test_2 }}</td>
                      <!-- <td>{{ $view_myresult->test_3 }}</td> -->
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
  @include('dashboard.teacher.footer')

