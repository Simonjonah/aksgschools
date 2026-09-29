
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
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
    transform: rotate(-15deg);
    text-align: center;
  }

  @page {
     @prince-overlay {
        content: flow(watermarkflow)
     }
  }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  @include('dashboard.admin.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Results</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Result</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the Result to print.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                    <h4>
                        <img style="width: 100px; height: 100px;" src="{{ asset('assets/dist/img/AdminLTELogo.jpg') }}" alt="">
                        {{-- <small class="float-right"> <img style="width: 100px; height: 100px;" src="{{ asset('/public/../'.$viewsingle_results->student['passpot'])}}" class="" alt="User Image"></small> --}}
                      </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                      <strong>IMFI ICT ACADEMY</strong><br>
                      54 Nsikak Eduok Avenue,<br>
                      Uyo, Akwa Ibom State<br>
                      Phone: 08167930965<br>
                      Email: info@imfiacademy.edu.ng
                    </address>
                  </div>
                <!-- /.col -->
               
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  
                  <b>Details </b><br>
                  <br>
                  <b> ID:</b> {{ $view_resultsingleness->student['ref_no'] }}<br>
                  <b>Reg Number</b> {{ $view_resultsingleness->student['regnumber'] }}<br>
                  <b>Program:</b> {{ $view_resultsingleness->student['course_title'] }}<br>
                  <b>Period</b> {{ $view_resultsingleness->student['course_period'] }}<br>
                  <b>Gender</b> {{ $view_resultsingleness->student['gender'] }}<br>
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
                       
                        $total_credit_hour = 0;
                        $getyour_resultscale = 5;
                        $getyour_resultscale2 = 4;
                        $getyour_resultscale3 = 3;
                        $getyour_resultscale4 = 2;
                        $getyour_resultscale5 = 0;
                       

                      @endphp --}}
                        {{-- @php
                         $total_score +=$getyour_result->test + $getyour_result->exams;
                        
                          if ($viewsingle_results->test + $viewsingle_results->exams > 70) {
                            $total_credit_hour +=$getyour_resultscale * $viewsingle_results->credit_unit;
                          }
                          if($viewsingle_results->test + $viewsingle_results->exams > 60) {
                            $total_credit_hour +=$getyour_resultscale2 * $viewsingle_results->credit_unit;

                          }
                          if($viewsingle_results->test + $viewsingle_results->exams > 50) {
                            $total_credit_hour +=$getyour_resultscale3 * $viewsingle_results->credit_unit;

                          }
                          if($viewsingle_results->test + $viewsingle_results->exams > 40) {
                            $total_credit_hour +=$getyour_resultscale4 * $viewsingle_results->credit_unit;
                          }
                          if($viewsingle_results->test + $viewsingle_results->exams > 30) {
                            $total_credit_hour +=$getyour_resultscale5 * $viewsingle_results->credit_unit;

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
                        
                    </tr> --}}
                    {{-- <td> <b>CGP {{ round($viewsingle_results->credit_unit/$total_credit_hour, PHP_ROUND_HALF_UP)}}</b></td> --}}
                    {{-- <td><b>CGP: {{ $viewsingle_results->credit_unit/$total_credit_hour }}</b></td> --}}
                   {{-- <td>{{ $total_credit_hour }}</td> --}}
                   
                    </tbody>
                  </table>
                </div>

                <!-- /.col -->
              <div id="watermark">IMFI ICT ACADEMY</div>
            </div>

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="../printsingleresults/{{ $viewsingle_results->id }}" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  
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
  
  <!-- /.content-wrapper -->
  <footer class="main-footer no-print">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2022 <a href="http://imfiacademy.edu.ng">IMFI ICT ACADEMY</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
</body>
</html>
