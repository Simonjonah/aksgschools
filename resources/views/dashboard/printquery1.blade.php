
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
    font-size: 60px;
    opacity: 0.5;
    transform: rotate(-50deg);
    text-align: center;
    padding-top: 400px;
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
                  {{-- <small class="float-right"> <img style="width: 200px; height: 200px;" src="{{ asset('/public/../'.Auth::guard('web')->user()->images)}}" class="" alt="User Image"></small> --}}
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                <img style="width: 100px; height: 100px;" src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt=""> 

                <address>
                 
                </address>
              </div>

            

              
              <div class="col-lg-8 invoice-col">
                {{-- <b>Details </b><br> --}}
                <br>

                <h1>GOLDERNDAY SCHOOLS</h1><br>
                Golden Destiny Academy Road.
                OffSenator Akon Eyakenyi Street,
                Off General Edet Akpan Ave, 520101, Uyo <br>
                
                Email: info@golderndayschools.com
             
                {{-- <b> ID:</b> {{ Auth::guard('web')->user()->ref_no1 }}<br>
                <b>Class:</b> {{ Auth::guard('web')->user()->classname }}<br>
                <b>Section</b> {{ Auth::guard('web')->user()->section }}<br> --}}

              </div>

                  
              <div class="col-sm-4 invoice-col">
                <small class="float-right"> <img style="width: 200px; height: 200px;" src="{{ asset('/public/../'.Auth::guard('web')->user()->images)}}" class="" alt="User Image"></small>
              </div>
              <!-- /.col -->
            </div>
          </div>
           
            <h2 style="text-align: center; text-transform: uppercase">{{ $prints_queries->querytitle }}</h2>
            <p style="text-align: justify">{!! $prints_queries->messages !!}</p>
            <div id="watermark">{{ Auth::guard('web')->user()->fname }}, You have been given query</div>
            {{-- <div class="row">
              <div class="col-12 table-responsive">
               
                
                <p>Registrar</p>
                <img src="{{ asset('assets/dist/img/signature.png') }}" alt="">

              </div>
            </div> --}}
           
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
