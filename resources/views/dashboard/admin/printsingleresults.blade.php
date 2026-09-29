
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Invoice Print</title>
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
  <section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
          <h4>
            <img style="width: 100px; height: 100px;" src="{{ asset('assets/dist/img/AdminLTELogo.jpg') }}" alt=""> IMFI ICT ACADEMY
            <small class="float-right"> <img style="width: 100px; height: 100px;" src="{{ asset('/public/../'.$viewsingle_results->passpot)}}" class="" alt="User Image"></small>
          </h4>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
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
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Details </b><br>
        <br>
        <b> ID:</b> {{ $viewsingle_results->student['ref_no'] }}<br>
        <b>Reg Number</b> {{ $viewsingle_results->regnumber }}<br>
        <b>Program:</b> {{ $viewsingle_results->course_title }}<br>
        <b>Reg Number</b> {{ $viewsingle_results->student['course_period'] }}<br>
        <b>Gender</b> {{ $viewsingle_results->student['gender'] }}<br>
        


      </div>
      <!-- /.col -->
      {{-- <div class="col-sm-4 invoice-col">
        <b>Invoice #007612</b><br>
        <br>
        <b>Order ID:</b> 4F3S8J<br>
        <b>Payment Due:</b> 2/22/2014<br>
        <b>Account:</b> 968-34567
      </div> --}}
      <!-- /.col -->
    </div>
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
                @php
               
                $total_credit_unit = 0;
                $getyour_resultscale = 5;
                $getyour_resultscale2 = 4;
                $getyour_resultscale3 = 3;
                $getyour_resultscale4 = 2;
                $getyour_resultscale5 = 0;
               

              @endphp
                @php
                 // $total_score +=$getyour_result->test + $getyour_result->exams;
                
                  if ($viewsingle_results->test + $viewsingle_results->exams > 70) {
                    $total_credit_unit +=$getyour_resultscale * $viewsingle_results->credit_unit;
                  }
                  if($viewsingle_results->test + $viewsingle_results->exams > 60) {
                    $total_credit_unit +=$getyour_resultscale2 * $viewsingle_results->credit_unit;

                  }
                  if($viewsingle_results->test + $viewsingle_results->exams > 50) {
                    $total_credit_unit +=$getyour_resultscale3 * $viewsingle_results->credit_unit;

                  }
                  if($viewsingle_results->test + $viewsingle_results->exams > 40) {
                    $total_credit_unit +=$getyour_resultscale4 * $viewsingle_results->credit_unit;
                  }
                  if($viewsingle_results->test + $viewsingle_results->exams > 30) {
                    $total_credit_unit +=$getyour_resultscale5 * $viewsingle_results->credit_unit;

                  }
                @endphp
            <tr>
              <td>{{ $viewsingle_results->course_code }}</td>
              <td>{{ $viewsingle_results->course_title }}</td>
              <td>{{ $viewsingle_results->credit_unit }}</td>
              <td>{{ $viewsingle_results->test }}</td>
              <td>{{ $viewsingle_results->exams }}</td>
              <td>{{ $viewsingle_results->test + $viewsingle_results->exams }}</td>
                <td>@if ($viewsingle_results->test + $viewsingle_results->exams > 70 )
                    <p>A</p>
                    @elseif ($viewsingle_results->test + $viewsingle_results->exams > 60)
                    <p>B</p>
                    @elseif ($viewsingle_results->test + $viewsingle_results->exams > 50)
                    <p>c</p>
                    @elseif ($viewsingle_results->test + $viewsingle_results->exams > 40)
                    <p>D</p>
                    @else
                    <p>F</p>
                @endif</td>
                <td>@if ($viewsingle_results->test + $viewsingle_results->exams > 70)
                    <p>{{ $getyour_resultscale }} </p>
                   
                    @elseif ($viewsingle_results->test + $viewsingle_results->exams > 60)
                    <p>{{ $getyour_resultscale2 }}</p>
                    @elseif ($viewsingle_results->test + $viewsingle_results->exams > 50)
                    <p>{{ $getyour_resultscale3 }}</p>
                    @elseif ($viewsingle_results->test + $viewsingle_results->exams > 40)
                    <p>{{ $getyour_resultscale4 }}</p>
                    @else
                    <p>{{ $getyour_resultscale5 }}</p>
                  @endif</td>
                
            </tr>
            <td><b>Semester</b> {{ $viewsingle_results->registercourse['semester'] }}<br></td>
            {{-- <td> <b>CGP {{ round($viewsingle_results->credit_unit/$total_credit_unit, PHP_ROUND_HALF_UP)}}</b></td> --}}
            <td><b>CGP: {{ $viewsingle_results->credit_unit/$total_credit_unit }}</b></td>
           <td>{{ $total_credit_unit }}</td>
           
            </tbody>
          </table>
        <img src="{{ asset('assets/dist/img/signature.png') }}" alt="">
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <div id="watermark">IMFI ICT ACADEMY</div>

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
       
        {{-- <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
          This online Receipt does not reguire signature
        </p> --}}
      </div>
      <!-- /.col -->
      <div class="col-6">
        {{-- <p class="lead">Amount Due 2/22/2014</p> --}}

        {{-- <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Course Period:</th>
              <td>	{{ $print_payments->course_period}}</td>
            </tr>
            <tr>
              <th>Program</th>
              <td>{{ $print_payments->course_programs}}</td>
            </tr>
            
    
          </table>
        </div> --}}
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
