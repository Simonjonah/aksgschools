@include('dashboard.admin.header')
@include('dashboard.admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1>Subjects </h1> --}}
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

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        {{-- <small class="float-right">{{ $view_student->created_at->format('D d, M Y, H:i')}}</small> --}}
                    </h2>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-2 invoice-col">
                    <img style="width: 50; height: 50px" src="{{ URL::asset("/public/../$viewsingle_results->logo")}}" alt="webLTE Logo" class="brand-image ">

                 
                </div> 
                <!-- /.col -->
               <div class="col-sm-8 invoice-col">
                   <h2 style="text-transform: uppercase">{{ $viewsingle_results->schoolname }}</h2>
                   <address>
                   {{ $viewsingle_results->address}} <br>
                   {{ $viewsingle_results->motor}} <br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-2 invoice-col">
                    <img style="width: 70%; height: 150px;" src="{{ URL::asset("/public/../$viewsingle_results->images")}}" alt="">
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
              
                  <table class="table table-striped">
                      <thead>
                      <tr>
                        {{-- <th>S/N</th> --}}
                        <th>Firstname</th>
                        <th>Middlename</th>
                        <th>Surname</th>
                        <th>Subjects</th>
                        <th>Ca 1</th>
                        <th>Ca 2</th>
                        {{-- <th>Ca 3</th> --}}
                        <th>Exams</th>
                        <th>Total</th>
                        <th>Grade</th>
                        <th>Subject Average</th>
                        
                      </tr>
                      </thead>
                      <tbody>
                        @php
                            $total_score = 0;
                            // $totalsubject_score = 0;
                        @endphp
                          {{-- @foreach ($viewsingle_resultss as $viewsingle_results) --}}
                          @php
                          $total_score +=$viewsingle_results->test_1 + $viewsingle_results->test_2 + $viewsingle_results->test_3 + $viewsingle_results->exams;
                          // $totalsubject_score +=$viewsingle_results->test_1  + $viewsingle_results->test_2  + $viewsingle_results->test_3  + $viewsingle_results->exams                            
                          @endphp
                          <tr>
                              <td>{{ $viewsingle_results->student['fname'] }}</td>
                              <td>{{ $viewsingle_results->student['middlename'] }}</td>
                              <td>{{ $viewsingle_results->student['surname'] }}</td>
                              <td>{{ $viewsingle_results->subjectname }}</td>
                              <td>{{ $viewsingle_results->test_1 }}</td>
                              <td>{{ $viewsingle_results->test_2 }}</td>
                              {{-- <td>{{ $viewsingle_results->test_3 }}</td> --}}
                              <td>{{ $viewsingle_results->exams }}</td>
                              <td>{{ $viewsingle_results->test_1  + $viewsingle_results->test_2  + $viewsingle_results->test_3  + $viewsingle_results->exams }}</td>
                              <td>@if ($viewsingle_results->test_1 + $viewsingle_results->test_2 + $viewsingle_results->test_3 + $viewsingle_results->exams > 69)
                                <p>A</p>
                               
                                @elseif ($viewsingle_results->test_1 + $viewsingle_results->test_2 + $viewsingle_results->test_3 + $viewsingle_results->exams > 59)
                                <p>B</p>
                                @elseif ($viewsingle_results->test_1 + $viewsingle_results->test_2 + $viewsingle_results->test_3 + $viewsingle_results->exams > 49)
                                <p>C</p>
                                @elseif ($viewsingle_results->test_1 + $viewsingle_results->test_2 + $viewsingle_results->test_3 + $viewsingle_results->exams > 44)
                                <p>D</p>
                                @elseif ($viewsingle_results->test_1 + $viewsingle_results->test_2 + $viewsingle_results->test_3 + $viewsingle_results->exams > 40)
                                <p>E</p>
                                @elseif ($viewsingle_results->test_1 + $viewsingle_results->test_2 + $viewsingle_results->test_3 + $viewsingle_results->exams > 39)
                                <p>F</p>
                                @else
                                <p>F</p>
                              @endif</td>
                              <td>{{ $viewsingle_results->test_1  + $viewsingle_results->test_2  + $viewsingle_results->test_3  + $viewsingle_results->exams / 2}}</td>
                                
                              {{-- <td>{{ $total_score / 2 }}</td> --}}
                            </td>

                            </tr>
                          {{-- @endforeach --}}
                      
                            {{-- <td>{{ $total_score }}</td> --}}
                      </tbody>
                    </table>
                
                  {{-- @else
                      
                @endif --}}
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          
        
          {{-- @endif --}}
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  {{-- <button type="submit" class="btn btn-success"><i class="far fa-bell"></i> Submit
                    Submit 
                  </button>
                 --}}
                  {{-- <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button> --}}

                </form>
                  {{-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button> --}}
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>






            <!-- /.row -->
          </div>
          
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
  </div>
  </div>
  <!-- /.content-wrapper -->

  
 @include('dashboard.admin.footer')