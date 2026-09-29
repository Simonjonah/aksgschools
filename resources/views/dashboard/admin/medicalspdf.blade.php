
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Brixtonn Schools</title>
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
          <img style="width: 300px; height: 50px;" src="{{ asset('images/sch14.jpg') }}" alt=""> <br>
          <small class="float-right">{{ $printmedi_students->created_at->format('D d, M Y, H:i')}}</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
       
        <address>
          <strong>BRIXTONN SCHOOLS</strong><br>
          @if ($printmedi_students->centername = 'Uyo')
          30 Ewet Housing, Uyo <br>
          Akwa Ibom State, Nigeria
          @else
          30 Asokoro, Abuja <br>
          Nigeria 
          @endif
          <br>
          {{-- San Francisco, CA 94107<br>
          Phone: (804) 123-5432<br>
          Email: info@almasaeedstudio.com --}}
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          Name: <strong>{{ $printmedi_students->surname }}, {{ $printmedi_students->fname }} {{ $printmedi_students->middlename }}</strong><br>
          Gender: {{ $printmedi_students->gender }}<br>
          Dob: {{ $printmedi_students->dob }}<br>
          Phone: {{ $printmedi_students->phone }}<br>
          Email: {{ $printmedi_students->email }}<br>
          Form No: {{ $printmedi_students->ref_no }}<br>
          Student ID: {{ $printmedi_students->ref_no }}<br>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <img style="width: 70%; height: 200px;" src="{{ URL::asset("/public/../$printmedi_students->images")}}" alt="">
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <div class="col-6">
            <div class="table-responsive">
                <label for="inputName">Does your child has SS genotype?</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <h5>Does your child have SS genotype?</h5>
                    <label for="vehicle1"> {{ $printmedi_students->genotype1 }}</label><br>
                    <label for="vehicle1"> {{ $printmedi_students->genotype2 }}</label><br>
                </div>

                <div class="form-group">
                  <h5>Has your Child any of the following conditions?</h5>
                  <label for="vehicle1"> {{ $printmedi_students->symtoms1 }}</label><br>
                  <label for="vehicle1"> {{ $printmedi_students->symtoms2 }}</label><br>
                  <label for="vehicle1"> {{ $printmedi_students->symtoms3 }}</label><br>
              </div>



                </div>
              </div>
              <div class="form-group row">
                <div class="form-group">
                  <h5>Is your Child asthmatic?</h5>
                  <label for="vehicle1"> {{ $printmedi_students->asthmatic1 }}</label><br>
                  <label for="vehicle1"> {{ $printmedi_students->asthmatic2 }}</label><br>
              </div>
              </div>
              
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group row">
                <div class="form-group">
                  <h5>Has your child any medical condition or form of allergy that the school should know about?</h5>
                  <label for="vehicle1"> {{ $printmedi_students->medicalcondition1 }}</label><br>
                  <label for="vehicle1"> {{ $printmedi_students->medicalcondition2 }}</label><br>
              </div>
              </div>

              <div class="form-group row">
                <div class="form-group">
                  <h5>Has your child been diagnosed with having specific learning difficilties such as Dyslyxia, ADHD or any other?</h5>
                  <label for="vehicle1"> {{ $printmedi_students->diagnose1 }}</label><br>
                  <label for="vehicle1"> {{ $printmedi_students->diagnose2 }}</label><br>
                  <label for="vehicle1"> {{ $printmedi_students->diagnose3 }}</label><br>
              </div>

              <div class="form-group">
                <h5>Has your child been Immunized with the following?</h5>
                <label for="vehicle1"> {{ $printmedi_students->diagnose1 }}</label><br>
                <label for="vehicle1"> {{ $printmedi_students->diagnose2 }}</label><br>
                <label for="vehicle1"> {{ $printmedi_students->diagnose3 }}</label><br>
            </div>
            </div>
            </div>

            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>Particulars</th>
                      <th>Yes</th>
                      <th>No</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>Small Pox</td>
                      <td>{{ $printmedi_students->smallpox1 }}</td>
                      <td>{{ $printmedi_students->smallpox2 }}</td>
                  </tr>

                  <tr>
                      <td>Chicken Pox</td>
                      <td>{{ $printmedi_students->chickenpox1 }}</td>
                      <td>{{ $printmedi_students->chickenpox2 }}</td>
                      
                  </tr>

                  <tr>
                      <td>Polio </td>
                      <td>{{ $printmedi_students->polio1 }}</td>
                      <td>{{ $printmedi_students->polio2 }}</td>
                      
                  </tr>

                  <tr>
                      <td>Tetanus </td>
                      <td>{{ $printmedi_students->tetanus1 }}</td>
                      <td>{{ $printmedi_students->tetanus2 }}</td>
                      
                  </tr>

                  <tr>
                      <td>Tuberculosis </td>
                      <td>{{ $printmedi_students->tuber1 }}</td>
                      <td>{{ $printmedi_students->tuber2 }}</td>
                      
                  </tr>

                  <tr>
                      <td>Mumps </td>
                      <td>{{ $printmedi_students->mumps1 }}</td>
                      <td>{{ $printmedi_students->mumps2 }}</td>
                      
                  </tr>

                  <tr>
                      <td>Rebelia </td>
                      <td>{{ $printmedi_students->rebelia1 }}</td>
                      <td>{{ $printmedi_students->rebelia2 }}</td>
                      
                  </tr>

                  <tr>
                      <td>Hepatitis </td>
                      <td>{{ $printmedi_students->hepatitis1 }}</td>
                      <td>{{ $printmedi_students->hepatitis2 }}</td>
                      
                  </tr>

                  <tr>
                      <td>Meningitis </td>
                      <td>{{ $printmedi_students->meningitis1 }}</td>
                      <td>{{ $printmedi_students->meningitis2 }}</td>
                      
                  </tr>

                  <tr>
                      <td>Whoopingcough </td>
                      <td>{{ $printmedi_students->whoopingcough1 }}</td>
                      <td>{{ $printmedi_students->whoopingcough2 }}</td>
                      
                  </tr>

                  <tr>
                      <td>Diphtheria </td>
                      <td>{{ $printmedi_students->diphtheria1 }}</td>
                      <td>{{ $printmedi_students->diphtheria2 }}</td>
                      
                     
                  </tr>
              </tbody>
          </table>
            </div>
        </div>
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
