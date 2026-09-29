
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>Goldern Days </b>Teacher Registration</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      {{-- <p class="login-box-msg">Sign in to start your session</p> --}}

      <form action="{{ route('createteacher') }}" method="post"  enctype="multipart/form-data">
        @csrf

        <div class="input-group mb-3">
          <input type="text" name="fname" class="form-control" @error('fname') is-invalid @enderror"
          value="{{ old('fname') }}" placeholder="First Name">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('fname')
                <span class="text-danger">{{ $message }}</span>
        @enderror 

        <div class="input-group mb-3">
            <input type="text" name="middlename" class="form-control" @error('middlename') is-invalid @enderror"
            value="{{ old('middlename') }}" placeholder="Middle Name">
            
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          @error('middlename')
                  <span class="text-danger">{{ $message }}</span>
          @enderror


          <div class="input-group mb-3">
            <input type="text" name="surname" class="form-control" @error('surname') is-invalid @enderror"
            value="{{ old('surname') }}" placeholder="Surname Name">
            
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          @error('surname')
                  <span class="text-danger">{{ $message }}</span>
          @enderror

          <div class="input-group mb-3">
           <select name="classname" class="form-control">
            @foreach ($view_classes as $view_classe)
                <option value="{{ $view_classe->classname }}">{{ $view_classe->classname }}</option>
            @endforeach
           </select>
          </div>
          @error('classname')
            <span class="text-danger">{{ $message }}</span>
          @enderror

          <div class="input-group mb-3">
            <select name="term" class="form-control">
                 <option value="First Term">First Term</option>
                 <option value="Second Term">Second Term</option>
                 <option value="Third Term">Third Term</option>
            </select>
           </div>
           @error('term')
             <span class="text-danger">{{ $message }}</span>
           @enderror


           <div class="input-group mb-3">
            <label for="">Section</label>
            <select name="section" class="form-control">
                 <option value="Primary">Primary</option>
                 <option value="Section">Section</option>
            </select>
           </div>
           @error('section')
             <span class="text-danger">{{ $message }}</span>
           @enderror

            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control" @error('email') is-invalid @enderror"
                value="{{ old('email') }}" placeholder="Email">
                
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              @error('email')
                      <span class="text-danger">{{ $message }}</span>
            @enderror 


            <div class="input-group mb-3">
                <input type="number" name="phone" class="form-control" @error('phone') is-invalid @enderror"
                value="{{ old('phone') }}" placeholder="Phone">
                
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                  </div>
                </div>
              </div>
              @error('phone')
                      <span class="text-danger">{{ $message }}</span>
            @enderror 

            <div class="input-group mb-3">
                <input type="file" name="images" class="form-control" @error('images') is-invalid @enderror"
                value="{{ old('images') }}" placeholder="Email">
                
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              @error('images')
                      <span class="text-danger">{{ $message }}</span>
            @enderror 
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control"  @error('password') is-invalid @enderror"
          value="{{ old('password') }}" placeholder="Retype your password">
         
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('password')
        <span class="text-danger">{{ $message }}</span>
        @enderror 
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="../password/reset">I forgot my password</a>
      </p>
     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/dist/js/adminlte.min.js"></script>

</body>
</html>
