
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin |  Print</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{  asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{  asset('assets/dist/css/adminlte.min.css') }}">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    /* .watermark{
      background-image: url('../assets/dist/img/AdminLTELogo.jpg');
      background-position: center; 
      background-repeat: no-repeat;
    } */

  .break-after {
    page-break-after: always;
  }

  #watermark {
    flow: static(watermarkflow);
    font-size: 120px;
    opacity: 0.5;
    transform: rotate(-30deg);
    text-align: center;
  }

  @page {
     @prince-overlay {
        content: flow(watermarkflow)
     }
  }
  </style>


{{-- <style type="text/css">
  .table{
      width: 600px;
      
      border: 1px solid #ccc;
  }
  .table td{
      border: 1px solid #ccc;
      height:10px;
      width: 10px;
  }
  .id, .date, .action{
      width:1px;
  }
  .date{
      white-space: nowrap;
  }
  </style> --}}
</head>
<body>
<div class="wrapper">
  <!-- Main content -->





  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="callout callout-info">
            {{-- <h5><i class="fas fa-info"></i> Note:</h5> --}}
            {{-- This page has been enhanced for printing. Click the print button at the bottom of the invoice to test. --}}
          </div>

          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                {{-- <h4>
                  <img style="width: 100px; height: 100px;" src="{{ asset('assets/dist/img/AdminLTELogo.jpg') }}" alt=""> IMFI ICT ACADEMY
                  <small class="float-right"> <img style="width: 100px; height: 100px;" src="{{ asset('/public/../'.Auth::guard('web')->user()->passpot)}}" class="" alt="User Image"></small>
                </h4> --}}
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                <img style="width: 200px; height: 100px;" src="{{ asset('assets/dist/img/AdminLTELogo.jpg') }}" alt="">
                  <address>
                    @if (Auth::guard()->user()->centername == 'Uyo')
                    <strong>BRIXTONN SCHOOLS</strong><br>
                    Unit 13 F-Line Ewet Housing Estate,<br>
                     Uyo, Akwa Ibom, Nigeria <br>
                    +234 816 7930 965 <br>
                    info@brixtonnschools.com.ng
                    
                    @else
                    <strong>BRIXTONN SCHOOLS</strong><br>
                    54 Nsikak Eduok Avenue,<br>
                    Uyo, Akwa Ibom State<br>
                    Phone: 08167930965<br>
                    Email: info@imfiacademy.edu.ng
                    @endif
                    
                  </address>
              </div>

              
              <div class="col-sm-4 invoice-col">
                  
                <b> ID:</b> {{ Auth::guard('web')->user()->ref_no }}<br>
                <b>Admission Number</b> {{ Auth::guard('web')->user()->regnumber }}<br>
                <b>Section:</b> {{ Auth::guard('web')->user()->section }}<br>
                <b>Class</b> {{ Auth::guard('web')->user()->classname }}<br>
                <b>Gender</b> {{ Auth::guard('web')->user()->gender }}<br>
                <b>Centername</b> {{ Auth::guard('web')->user()->centername }}<br>
                <b>Term</b> {{ Auth::guard('web')->user()->entrylevel }}<br>
                <b>Session</b> {{ Auth::guard('web')->user()->academic_session }}<br>
              </div>
              <!-- /.col -->

              <div class="col-sm-4 invoice-col">
               

                <small class="float-right"> <img style="width: 200px; height: 200px;" src="{{ asset('/public/../'.Auth::guard('web')->user()->images)}}" class="" alt="User Image"></small>
              </div>
            </div>
            {{-- <div id="watermark">IMFI ICT ACADEMY</div> --}}

            <!-- /.row -->
            
            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
               
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>Subjects</th>
                
                    <th>Test</th>
                    <th>Exams</th>
                    <th>Total</th>
                    <th>Grade</th>
                    {{-- <th>Remarks</th> --}}
                    

                  </tr>
                  </thead>
                  <tbody>
                    {{-- @php
                      $total_score = 0;
                      $total_credit_hour = 0;
                      


                      $getyour_resultscale = 5;
                      $getyour_resultscale2 = 4;
                      $getyour_resultscale3 = 3;
                      $getyour_resultscale4 = 2;
                      $getyour_resultscale5 = 0;
                    @endphp --}}
                  @foreach ($getyour_results as $getyour_result)
                      {{-- @if ($getyour_result->status == 'gen' && $getyour_result->programname == 'Certificate in Data Processing') --}}
                      {{-- @php
                        $total_score +=$getyour_result->test + $getyour_result->exams;
                      
                        if ($getyour_result->test + $getyour_result->exams > 69) {
                          $total_credit_hour +=$getyour_resultscale * $getyour_result->credit_unit;
                        }else if($getyour_result->test + $getyour_result->exams > 59) {
                          $total_credit_hour +=$getyour_resultscale2 * $getyour_result->credit_unit;

                        }else if($getyour_result->test + $getyour_result->exams > 49) {
                          $total_credit_hour +=$getyour_resultscale3 * $getyour_result->credit_unit;

                        }else if($getyour_result->test + $getyour_result->exams > 44) {
                          $total_credit_hour +=$getyour_resultscale4 * $getyour_result->credit_unit;
                        }else if($getyour_result->test + $getyour_result->exams > 40) {
                          $total_credit_hour +=$getyour_resultscale4 * $getyour_result->credit_unit;
                        }else if($getyour_result->test + $getyour_result->exams > 39) {
                          $total_credit_hour +=$getyour_resultscale5 * $getyour_result->credit_unit;
                        }
                      @endphp --}}
                      <tr>
                        <td style="width: 400px;height: 10px">{{ $getyour_result->subjectname }}</td>
                        <td>{{ $getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3}}</td>
                    
                        <td>{{ $getyour_result->exams }}</td>
                        <td>{{ $getyour_result->test_1 + $getyour_result->exams }}</td>
                      
                        <td>@if ($getyour_result->test + $getyour_result->exams > 69)
                          <p>A</p>
                         
                          @elseif ($getyour_result->test + $getyour_result->exams > 59)
                          <p>B</p>
                          @elseif ($getyour_result->test + $getyour_result->exams > 49)
                          <p>c</p>
                          @elseif ($getyour_result->test + $getyour_result->exams > 44)
                          <p>D</p>
                          @elseif ($getyour_result->test + $getyour_result->exams > 40)
                          <p>E</p>
                          @elseif ($getyour_result->test + $getyour_result->exams > 39)
                          <p>F</p>
                          @else
                          <p>F</p>
                        @endif</td>

                        {{-- <td>@if ($getyour_result->test + $getyour_result->exams > 69)
                          <p>An Excellent Performance </p>
                         
                          @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 59)
                          <p>A good Performance</p>
                          @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 49)
                          <p>A fair performance</p>
                          @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 44)
                          <p>A Poor performance.</p>
                          @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 40)
                          <p>A Poor performance.</p>
                          @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 39)
                          <p>A Poor performance.</p>
                          @else
                          <p>A Poor performance.</p>
                        @endif</td> --}}

                      </tr> 
                        {{-- <td> {{ $total_credit_unit/$total_credit_hour}} </td> --}}
                      {{-- @else
                      @endif --}}

                  @endforeach
                
              
                  {{-- <td> <b>CGP {{ $total_credit_hour/$total_credit_unit }}</b></td> --}}
                        {{-- <td>{{ $total_score }}</td> --}}
                        {{-- <td>{{ $total_credit_hour }}</td>
                        <td>total credit unit {{ $total_credit_unit }}</td> --}}
                        {{-- <td>{{ round($total_credit_unit/$total_credit_hour)  }}</td> --}}
                  </tbody>

                </table>
                <p>Registrar</p>
                <img src="{{ asset('assets/dist/img/signature.png') }}" alt="">

              </div>
              <!-- /.col -->
            </div>
           

            <!-- this row will not appear when printing -->
            <div class="row no-print">
              <div class="col-12">
                {{-- <a href="{{ route('web.printresult') }}" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> --}}
                {{-- <img src="{{ asset('assets/dist/img/signature.png') }}" alt=""> --}}
              </div>
            </div>
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
