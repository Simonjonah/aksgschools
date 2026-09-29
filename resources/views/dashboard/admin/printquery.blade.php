
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          
        </h2>
      
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        <i class="fas fa-globe"></i>BRIXTONN SCHOOLS <br>
          <img style="width: 300px; height: 50px;" src="{{ asset('images/sch14.jpg') }}" alt=""> <br>
          {{-- <small class="float-right">{{ $print_query->created_at->format('D d, M Y, H:i')}}</small> --}}
          
        <address>
            {{-- <strong>BRIXTONN SCHOOLS</strong><br> --}}
              @if ($print_query->centername = 'Uyo')
              30 Ewet Housing, Uyo <br>
              Akwa Ibom State, Nigeria <br>
              +234 808 908 0898
              @else
              No. 4 Julius Nyerere Crescent, <br>
              Asokoro, Abuja, Nigeria <br>
              +234 912 439 8085
              @endif
            <br>
            
          </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong>{{ $print_query->user['surname'] }} {{ $print_query->user['fname'] }} {{ $print_query->user['middlename'] }}</strong><br>
          Phone: {{ $print_query->user['phone'] }}<br>
          Class: {{ $print_query->user['classname'] }}<br>
          Centername: {{ $print_query->user['centername'] }}<br>
          Email: {{ $print_query->user['email'] }}
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
          <small class="float-right">{{ $print_query->created_at->format('D d, M Y, H:i')}}</small>

          <img style="width: 60%; height: 150px;" src="{{ URL::asset("/public/../$print_query->images")}}" alt=""> <br>
        <br>
        
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <h3 style="text-align: center; text-transform: uppercase">{{ $print_query->querytitle }}</h3>
        <p style="text-align: justify">{!! $print_query->messages !!}</p>
      </div>
      <!-- /.col -->
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
