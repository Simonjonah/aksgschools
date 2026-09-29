@include('dashboard.header')
@include('dashboard.sidebar')

@foreach ($view_myresult_results as $view_myresult_result)

@endforeach

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
    @php
       $total_score = 0;
   @endphp
    @foreach ($view_myresult_results as $view_myresult_result)
       {{ $total_score +=$view_myresult_result->test_1 + $view_myresult_result->test_2 + $view_myresult_result->test_3 + $view_myresult_result->exams; }}
    @endforeach
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
                    <img style="width: 100px; hieght: 100px;" src="{{ asset('/public/../'.$view_myresult_result->logo)}}" alt="webLTE Logo" class="brand-image ">

                 
                </div> 
                <!-- /.col -->
               <div class="col-sm-8 invoice-col">
                   <h2 style=" text-align: center; text-transform: uppercase">{{ $view_myresult_result->schoolname }}</h2>
                   <address style="text-align: center">
                   {{$view_myresult_result->school['address'] }} <br>
                   {{$view_myresult_result->school['motor']}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-2 invoice-col">
                    <img style="width: 100px; hieght: 100px;" src="{{ asset('/public/../'.$view_myresult_result->images)}}" alt="">
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <table class="table table-table-bordered">
                <tr>
                    <td>REG CODE:</td>
                    <td>{{ $view_myresult_result->regnumber }}</td>
                    <td>SEX:</td>
                    <td>{{ $view_myresult_result->gender }}</td>
                    <td>SCORE OBTAINED:</td>
                    <td>{{ $total_score }}</td>
                    
                </tr>
        
                <tr>
                    <td>CLASS:</td>
                    <td>{{ $view_myresult_result->classname }}</td>
                    <td>TERM:</td>
                    <td>{{ $view_myresult_result->term }} </td>
                    <td>PERCENTAGE:</td>
                    <td>{{ $total_score/100 }}</td>
                    {{-- <td>SCORE OBTAINED:</td>
                    <td>{{ $total_score }}</td> --}}
        
                   
                </tr>
                <tr>
                    <td>AGE:</td>
                    <td>{{ $view_myresult_result->student['dob'] }}</td>
                    <td colspan="2"></td>
                   
                    <!-- <td>NEXT TERM BEGNS:</td>
                    <td>20/10/2023</td> -->
                </tr>
                
            
        
             </table>
        

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
              
                  <table class="table table-striped">
                      <thead>
                      <tr>
                        
                        <th>Subjects</th>
                        <th>Ca 1</th>
                        <th>Ca 2</th>
                        
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
                          @foreach ($view_myresult_results as $view_myresult_result)
                          @php
                          $total_score +=$view_myresult_result->test_1 + $view_myresult_result->test_2 + $view_myresult_result->test_3 + $view_myresult_result->exams;
                          // $totalsubject_score +=$view_myresult_result->test_1  + $view_myresult_result->test_2  + $view_myresult_result->test_3  + $view_myresult_result->exams                            
                          @endphp
                          <tr>
                             
                              <td>{{ $view_myresult_result->subjectname }}</td>
                              <td>{{ $view_myresult_result->test_1 }}</td>
                              <td>{{ $view_myresult_result->test_2 }}</td>
                              {{-- <td>{{ $view_myresult_result->test_3 }}</td> --}}
                              <td>{{ $view_myresult_result->exams }}</td>
                              <td>{{ $view_myresult_result->test_1  + $view_myresult_result->test_2  + $view_myresult_result->test_3  + $view_myresult_result->exams }}</td>
                              <td>@if ($view_myresult_result->test_1 + $view_myresult_result->test_2 + $view_myresult_result->test_3 + $view_myresult_result->exams > 69)
                                <p>A</p>
                               
                                @elseif ($view_myresult_result->test_1 + $view_myresult_result->test_2 + $view_myresult_result->test_3 + $view_myresult_result->exams > 59)
                                <p>B</p>
                                @elseif ($view_myresult_result->test_1 + $view_myresult_result->test_2 + $view_myresult_result->test_3 + $view_myresult_result->exams > 49)
                                <p>C</p>
                                @elseif ($view_myresult_result->test_1 + $view_myresult_result->test_2 + $view_myresult_result->test_3 + $view_myresult_result->exams > 44)
                                <p>D</p>
                                @elseif ($view_myresult_result->test_1 + $view_myresult_result->test_2 + $view_myresult_result->test_3 + $view_myresult_result->exams > 40)
                                <p>E</p>
                                @elseif ($view_myresult_result->test_1 + $view_myresult_result->test_2 + $view_myresult_result->test_3 + $view_myresult_result->exams > 39)
                                <p>F</p>
                                @else
                                <p>F</p>
                              @endif</td>
                              <td>{{ $view_myresult_result->test_1  + $view_myresult_result->test_2  + $view_myresult_result->test_3  + $view_myresult_result->exams / 2}}</td>
                                
                              {{-- <td>{{ $total_score / 2 }}</td> --}}
                            </td>

                            </tr>
                          @endforeach
                      
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



















    <section class="content">
      <div class="container-fluid">
        
        <div class="row">
          <!-- accepted payments column -->
          <div class="col-6">
            <div class="table-responsive">
              
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:50%">BEHAVIOUR:</th>
                      <th style="width:50%">A</th>
                      <th style="width:50%">B</th>
                      <th style="width:50%">C</th>
                      <th style="width:50%">D</th>
                      <th style="width:50%">E</th>
                    </tr>
                   

                    @foreach ($view_psyos as $view_psyo)
                    @if ($view_psyo->psycomoto == 'Cognitive Domain')
                        <tr>
                        <td>{{ $view_psyo->cogname }}</td>
                         
                        @if ($view_psyo->punt1 == 'Yes')
                            <td><i class="fas fa-check"></i> </td>
                            @else
                            <td></td>
                          @endif

                          @if ($view_psyo->punt2 == 'Yes')
                            <td><i class="fas fa-check"></i> </td>
                            @else
                            <td></td>
                          @endif

                          @if ($view_psyo->punt3 == 'Yes')
                            <td><i class="fas fa-check"></i> </td>
                            @else
                            <td></td>
                          @endif
                          @if ($view_psyo->punt4 == 'Yes')
                            <td><i class="fas fa-check"></i> </td>
                            @else
                            <td></td>
                          @endif

                          @if ($view_psyo->punt5 == 'Yes')
                            <td><i class="fas fa-check"></i> </td>
                            @else
                            <td></td>
                          @endif
                    </tr>
                    @else
                        
                    @endif
                    
                @endforeach

                  </table>
                  <div class="form-group">
                      <textarea class="form-control" name="teacher_comment" id="" cols="20" rows="5" placeholder="Teacher's Comment">{{ $view_myresult_result->teacher_comment }}</textarea>
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control" name="textterm"  placeholder="Teacher's Comment">{{ $view_myresult_result->text_term }}</textarea>
                </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-6">

            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th style="width:50%">PSYCHOMOTOR SKILLS:</th>
                  <th style="width:50%">A</th>
                  <th style="width:50%">B</th>
                  <th style="width:50%">C</th>
                  <th style="width:50%">D</th>
                  <th style="width:50%">E</th>
                </tr>
               
                @foreach ($view_psyos as $view_psyo)
                    @if ($view_psyo->psycomoto == 'Psychomotor Domain')
                        <tr>
                        <td>{{ $view_psyo->cogname }}</td>
                        @if ($view_psyo->punt1 == 'Yes')
                            <td><i class="fas fa-check"></i> </td>
                            @else
                            <td></td>
                          @endif
                        @if ($view_psyo->punt2 == 'Yes')
                            <td><i class="fas fa-check"></i> </td>
                            @else
                            <td></td>
                          @endif
                        @if ($view_psyo->punt3 == 'Yes')
                            <td><i class="fas fa-check"></i> </td>
                            @else
                            <td></td>
                          @endif
                        @if ($view_psyo->punt4 == 'Yes')
                            <td><i class="fas fa-check"></i> </td>
                            @else
                            <td></td>
                          @endif
                          @if ($view_psyo->punt5 == 'Yes')
                            <td><i class="fas fa-check"></i> </td>
                            @else
                            <td></td>
                          @endif
                    </tr>
                    @else
                        
                    @endif
                @endforeach
                
            </table>


           
            </div>



            <div class="table-responsive">
              <table class="table table-bordered">
                <tr>
                  <th style="width:50%"></th>
                  <th style="width:50%">KEY</th>
                  
                </tr>
                <tr>
                  <th>A</th>
                  <td>Excellence</td>
                </tr>
                <tr>
                  <th>B</th>
                  <td>Very Good</td>
                </tr>

                <tr>
                  <th>C</th>
                  <td>Good</td>
                </tr>
                <tr>
                  <th>D</th>
                  <td>Needs Improvement</td>
                </tr>

                <tr>
                  <th>E</th>
                  <td>Unsatisfactory</td>
                </tr>
                
               
               
              </table>

             
            </div>

      
          </div>
          <!-- /.col -->         
     
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  {{-- <button type="submit" class="btn btn-success"><i class="far fa-bell"></i> Submit
                    Submit 
                  </button> --}}
                
                  {{-- <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button> --}}

                </form>
                  {{-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div> --}}
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
 @include('dashboard.footer')