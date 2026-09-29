
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Registration </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="/"><b>Schools </b>Registration</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">

      
      <form action="{{ url('creatschools') }}" method="post" enctype="multipart/form-data">
          @csrf

    @if (Session::get('success'))
      <div class="alert alert-success">
        {{ Session::get('success') }}
      </div>
    @endif

    @if (Session::get('fail'))
    <div class="alert alert-danger">
      {{ Session::get('fail') }}
    </div>
  @endif
        <div class="input-group mb-3">
          <!-- <input type="text" name="address" value="{{ $getyours->address }}" name="" id="">
          <input type="text" name="motor" value="{{ $getyours->motor }}" name="" id="">
          <input type="text" name="code" value="{{ $getyours->code }}" name="" id="">
          <input type="text" name="schoolname" value="{{ $getyours->schoolname }}" name="" id=""> -->
          <input type="hidden" name="ref_no1" value="{{ $getyours->ref_no1 }}" name="" id="">
          <!-- <input type="hidden" name="logo" value="{{ $getyours->logo }}" name="" id=""> -->
          <input type="hidden" name="user_id" value="{{ $getyours->id }}" name="" id="">
          <input type="hidden" name="connect" value="{{ $getyours->connect }}" name="" id="">
          <!-- <input type="text" name="school_id" value="{{ $getyours->school_id }}" name="" id=""> -->

          <input type="hidden" name="schooltype" value="{{ $getyours->schooltype }}" name="" id="">

         
      

        <label for="">School Name</label>
        <div class="input-group mb-3">
          <input name="schoolname" type="text" class="form-control" @error('schoolname') is-invalid @enderror"
          value="{{ old('schoolname') }}" placeholder="School Name">
           
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('schoolname')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      

        <label for="">Academic Session</label>

        <div class="input-group mb-3">
          <select name="academic_session" class="form-control">
            @foreach ($addacademics as $addacademic)
            <option value="{{ $addacademic->academic_session }}">{{ $addacademic->academic_session }}</option>
            @endforeach
          </select>
        </div>
        @error('academic_session')
        <span class="text-danger">{{ $message }}</span>
        @enderror

        

         


          <label for="">LGA</label>
          <div class="input-group mb-3">
            <select name="lga" required class="form-control" id="">
                @foreach ($lgas as $lga)
                    <option value="{{ $lga->lga }}">{{ $lga->lga }}</option>
                @endforeach
                
            </select>
            
          </div>
          @error('lga')
          <span class="text-danger">{{ $message }}</span>
          @enderror

          <label for="">Term</label>
          <div class="input-group mb-3">
            <select name="term" required class="form-control" id="">
              <option value="First Term">First Term</option>
              <option value="Second Term">Second Term</option>
              <option value="Third Term">Third Term</option>
            </select>
            
          </div>
          @error('lga')
          <span class="text-danger">{{ $message }}</span>
          @enderror

          <label for="">Address</label>
        <div class="input-group mb-3">
          <input name="address" type="text" class="form-control" @error('address') is-invalid @enderror"
          value="{{ old('address') }}" placeholder="Address">
           
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('address')
        <span class="text-danger">{{ $message }}</span>
        @enderror

        <label for="">Motor</label>
        <div class="input-group mb-3">
          <input name="motor" type="text" class="form-control" @error('motor') is-invalid @enderror"
          value="{{ old('motor') }}" placeholder="Motor">
           
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('motor')
        <span class="text-danger">{{ $message }}</span>
        @enderror


        <label for="">Upload Logo</label>
        <div class="input-group mb-3">
          <input name="logo" type="file" class="form-control" @error('logo') is-invalid @enderror"
          value="{{ old('logo') }}" placeholder="Logo">
           
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('logo')
        <span class="text-danger">{{ $message }}</span>
        @enderror

          <label for="">Select Section</label>
        <div class="input-group mb-3">
            <select required name="section" required class="form-control" id="">
                @if ($getyours->schooltype === 'SSEB')
                <option value="Secondary">Secondary</option>
                  
                @else
                <option value="Primary">Primary</option>
                  
                @endif
            </select>
            
          </div>
          @error('section')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <script>
        function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
      </script>
      

      <a href="{{ url('login') }}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
