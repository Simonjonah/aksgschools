
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
</head>
<body>
<div class="wrapper">
  <!-- Main content -->





  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> Note:</h5>
            This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
          </div>

          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <img style="width: 100px; height: 100px;" src="{{ asset('assets/dist/img/AdminLTELogo.jpg') }}" alt=""> IMFI ICT ACADEMY
                  <small class="float-right"> <img style="width: 100px; height: 100px;" src="{{ asset('/public/../'.Auth::guard('web')->user()->passpot)}}" class="" alt="User Image"></small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                <address>
                  <strong>IMFI ICT ACADEMY</strong><br>
                  54 Nsikak Eduok Avenue,<br>
                  Uyo, Akwa Ibom State<br>
                  Phone: 08167930965<br>
                  Email: info@imfiacademy.edu.ng
                </address>
              </div>

              
              <div class="col-sm-4 invoice-col">
                <b>Details </b><br>
                <br>
                <b> ID:</b> {{ Auth::guard('web')->user()->ref_no }}<br>
                <b>Reg Number</b> {{ Auth::guard('web')->user()->regnumber }}<br>
                <b>Program:</b> {{ Auth::guard('web')->user()->programname }}<br>
                <b>Period</b> {{ Auth::guard('web')->user()->course_period }}<br>
                <b>Gender</b> {{ Auth::guard('web')->user()->gender }}<br>


              </div>
              <!-- /.col -->
            </div>
            {{-- <div id="watermark">IMFI ICT ACADEMY</div> --}}

            <!-- /.row -->
            
            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
               
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Credit Unit</th>
                    <th>Test</th>
                    <th>Exams</th>
                    <th>Total</th>
                    <th>Grade</th>
                    <th>Scale</th>
                    

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
                  @foreach ($print_results as $print_result)
                      {{-- @if ($print_result->status == 'gen' && $print_result->programname == 'Certificate in Data Processing') --}}
                      {{-- @php
                        $total_score +=$print_result->test + $print_result->exams;
                      
                        if ($print_result->test + $print_result->exams > 69) {
                          $total_credit_hour +=$getyour_resultscale * $print_result->credit_unit;
                        }else if($print_result->test + $print_result->exams > 59) {
                          $total_credit_hour +=$getyour_resultscale2 * $print_result->credit_unit;

                        }else if($print_result->test + $print_result->exams > 49) {
                          $total_credit_hour +=$getyour_resultscale3 * $print_result->credit_unit;

                        }else if($print_result->test + $print_result->exams > 44) {
                          $total_credit_hour +=$getyour_resultscale4 * $print_result->credit_unit;
                        }else if($print_result->test + $print_result->exams > 40) {
                          $total_credit_hour +=$getyour_resultscale4 * $print_result->credit_unit;
                        }else if($print_result->test + $print_result->exams > 39) {
                          $total_credit_hour +=$getyour_resultscale5 * $print_result->credit_unit;
                        }
                      @endphp --}}
                      <tr>
                          <td>{{ $print_result->course_code }}</td>
                          <td>{{ $print_result->course_title }}</td>
                          <td>{{ $print_result->credit_unit }}</td>
                          <td>{{ $print_result->test }}</td>
                          <td>{{ $print_result->exams }}</td>
                          {{-- <td>{{ $print_result->semester }}</td> --}}
                          <td>{{ $print_result->test + $print_result->exams }}</td>
                        
                          
                          <td>@if ($print_result->test + $print_result->exams > 69)
                            <p>A</p>
                           
                            @elseif ($print_result->test + $print_result->exams > 59)
                            <p>B</p>
                            @elseif ($print_result->test + $print_result->exams > 49)
                            <p>c</p>
                            @elseif ($print_result->test + $print_result->exams > 44)
                            <p>D</p>
                            @elseif ($print_result->test + $print_result->exams > 40)
                            <p>E</p>
                            @elseif ($print_result->test + $print_result->exams > 39)
                            <p>F</p>
                            @else
                            <p>F</p>
                          @endif</td>

                          {{-- <td>@if ($print_result->test + $print_result->exams > 69)
                            <p>{{ $getyour_resultscale }} </p>
                           
                            @elseif ($print_result->test + $print_result->exams > 59)
                            <p>{{ $getyour_resultscale2 }}</p>
                            @elseif ($print_result->test + $print_result->exams > 49)
                            <p>{{ $getyour_resultscale3 }}</p>
                            @elseif ($print_result->test + $print_result->exams > 44)
                            <p>{{ $getyour_resultscale4 }}</p>
                            @elseif ($print_result->test + $print_result->exams > 40)
                            <p>{{ $getyour_resultscale4 }}</p>
                            @elseif ($print_result->test + $print_result->exams > 39) --}}
                            {{-- <p>{{ $getyour_resultscale4 }}</p> --}}
                            {{-- @else --}}
                            {{-- <p>{{ $getyour_resultscale5 }}</p> --}}
                          {{-- @endif</td> --}}

                        
                  
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
