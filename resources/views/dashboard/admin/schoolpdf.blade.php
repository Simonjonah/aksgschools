
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
          <small class="float-right">{{ $print_students->created_at->format('D d, M Y, H:i')}}</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-2 invoice-col">
        <div class="col-sm-2 invoice-col">
       
          <img src="{{ URL::asset("/public/../$print_students->logo")}}" alt="guardianLTE Logo">
      </div>
      <!-- /.col -->

      </div>
      <!-- /.col -->
      <div class="col-sm-8 invoice-col">
       <h1 style="text-align: center">{{ $print_students->schoolname }}</h1>
        <address style="text-align: center">
         {{$print_students->address}}
         {{$print_students->motor}}
          <br>
          {{ $print_students->phone }}
   
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-2 invoice-col">
        <img style="width: 150px; height: 150px;" src="{{ URL::asset("/public/../$print_students->images")}}" alt="">
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row" style="padding-top: 60px;">
      <div class="col-6">
        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Surname:</th>
              <td>{{ $print_students->surname }}</td>
            </tr>
            <tr>
                <th style="width:50%">First Name:</th>
              <td>{{ $print_students->fname }}</td>
            </tr>
            <tr>
              <th>Midlename:</th>
              <td>{{ $print_students->middlename }}</td>
            </tr>
           
            

             <tr>
                <th>Phone</th>
                <td>{{ $print_students->phone }}</td>
              </tr>

              <tr>
                <th> School Address:</th>
                <td>{{ $print_students->address }}</td>
              </tr>
              <tr>
                <th>Email:</th>
                <td>{{ $print_students->email }}</td>
              </tr>
             
              <tr>
            </table>
        </div>
        
      </div>
      <!-- /.col -->

      <div class="col-6">
        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Academic Session:</th>
              <td>{{ $print_students->academic_session }}</td>
            </tr>
            <tr>
              <th>Gender</th>
              <td>{{ $print_students->gender }}</td>
            </tr>
           
            
            <tr>
              <th>Present Class:</th>
              <td>{{ $print_students->preclassname }}</td>
            </tr>

            <tr>
              <th>Admit Class:</th>
              <td>{{ $print_students->classname }}</td>
            </tr>
            

            <tr>
              <th>Disability:</th>
              <td>{{ $print_students->disability }}</td>
            </tr>

            
            <tr>
              <th>Term:</th>
              <td>{{ $print_students->term }}</td>
            </tr>
            

            <tr>
              <th>Blood Group:</th>
              <td>{{ $print_students->bloodgroup }}</td>
            </tr>

            

            

            

              
          </table>
        </div>
        <p>Note that this form does not require singnature</p>
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
