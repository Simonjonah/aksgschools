
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
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <!-- Main content -->
    <div class="invoice p-3 mb-3">
      <!-- title row -->
      <div class="row">
        <div class="col-12">
          <h4>
            <td>{{ $print_single_payment->ref_no }}</td>

            <small class="float-right">Date: {{ Auth::guard('guardian')->user()->created_at->format('D d, M Y, H:i') }}</small>
          </h4>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-2 invoice-col">
       
            <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="guardianLTE Logo">
        </div>
        <!-- /.col -->
        <div class="col-sm-8 invoice-col">
        <h1 style="text-align: center">GOLDEN DESTINY ACADEMY</h1>
          <address style="text-align: center">
            Golden Destiny Academy Road.
            Off Senator Akon Eyakenyi Street,
            Off General Edet Akpan Ave, 520101, Uyo
            <br>
            (+234) 0916 684 3045, (+234) 07026191619
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-2 invoice-col">
          {{-- <b>Invoice #007612</b><br>
          <br>
          <b>Order ID:</b> 4F3S8J<br>
          <b>Payment Due:</b> 2/22/2014<br>
          <b>Account:</b> 968-34567 --}}
        </div>
        <!-- /.col -->
      </div>
    <!-- Table row -->
  
    <h2 style="text-align: center">E-receipt</h2>

    <div class="row" style="padding-top: 60px;">
      <!-- accepted payments column -->
      <div class="col-6">
       
            <table class="table">
                <tr>
                  <th style="width:50%">First Name:</th>
                  <td>	{{ $print_single_payment->fname}}</td>
                </tr>
                <tr>
                  <th style="width:50%">Middle Name:</th>
                  <td>	{{ $print_single_payment->middlename}}</td>
                </tr>

                <tr>
                  <th style="width:50%">SurName:</th>
                  <td>	{{ $print_single_payment->surname}}</td>
                </tr>
                <tr>

                  <tr>
                    <th style="width:50%">Classname:</th>
                    <td>	{{ $print_single_payment->classname}}</td>
                  </tr>
                  <tr>

                    <tr>
                      <th style="width:50%">Term:</th>
                      <td>	{{ $print_single_payment->term}}</td>
                    </tr>
                    <tr>
                  <th style="width:50%">Form Amount:</th>
                  <td>	₦{{ $print_single_payment->form_amount}}</td>
                </tr>
                <tr>
                  <th>Tuition</th>
                  <td>	₦{{ $print_single_payment->tuition}}</td>
                </tr>

                <tr>
                  <th>Amount </th>
                  <td>	₦{{ $print_single_payment->amount}}</td>
                </tr>

                </table>
            </div>
<!-- /.col -->
      <div class="col-6">
        {{-- <p class="lead">Amount Due 2/22/2014</p> --}}

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th>Book Amount</th>
              <td>₦{{ $print_single_payment->bookamount }}</td>
            </tr>
            <tr>
              <th>Form Amount</th>
              <td>₦{{ $print_single_payment->form_amount }}</td>
            </tr>


            <tr>
              <th>Uniform Amount</th>
              <td>₦{{ $print_single_payment->uniforms_amount }}</td>
            </tr>
            <tr>
              <th>Extra Curriculum Activities</th>
              <td>₦{{ $print_single_payment->extracuri_fee }}</td>
            </tr>

            <tr>
              <th>Medicals</th>
              <td>₦{{ $print_single_payment->medicals }}</td>
            </tr>
            <tr>
              <th>Development Amount</th>
              <td>	₦{{ $print_single_payment->dev_amount}}</td>
            </tr>
            <tr>
              <th>PTA</th>
              <td>₦{{ $print_single_payment->pta_amount }}</td>
            </tr>

            
            <tr>
              <th>Address </th>
              <td>{{ $print_single_payment->address}}</td>
            </tr>
    
          </table>
        </div>
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
