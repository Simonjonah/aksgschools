@include('layouts.header')

	
	<!--Page Title-->
    <section class="page-title" style="background-image:url({{ URL::asset("/public/../$event_register->logo")}}); padding-top: 120px;">
    	<div class="auto-container">
			<div class="content">
				<h1>Register <span> this Competition</span></h1>
				<ul class="page-breadcrumb">
					<li><a href="{{ url('home') }}">Home</a></li>
					<li>{{ $event_register->title }}</li>
				</ul>
			</div>
        </div>
    </section>
    <!--End Page Title-->
	

	<section class="contact-page-section">
            <div class="auto-container">
              <div class="inner-container">
                <div class="row clearfix">

                  <!-- Info Column -->
                    <div class="info-column col-lg-6  col-md-6 col-md-12 col-sm-12">
                      <div class="contactform">
                        <form method="post" action="{{ url('eventregisters') }}" enctype="multipart/form-data">
                          @csrf
                          @if (Session::get('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                            @endif

                            @if (Session::get('fail'))
                            <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                            @endif
                          <div class="form-group">
                            <label>First Name</label>
                            <input type="hidden" name="title" value="{{ $event_register->title }}" id="">
                            <input type="hidden" name="event_id" value="{{ $event_register->id }}" id="">
                            <input type="text" name="fname" class="form-control" @error('fname')
                            @enderror placeholder="First Name" value="">
                          </div>
                            @error('fname')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror

                          <div class="form-group">
                            <label>Middlename</label>
                            <input type="text" name="middlename" class="form-control" @error('middlename')
                            @enderror placeholder="Middlename" value="">
                          </div>
                            @error('middlename')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror

                          <div class="form-group">
                            <label>Surname</label>
                            <input type="text" name="surname" class="form-control" @error('surname')
                            @enderror placeholder="Surname" value="">
                          </div>
                            @error('surname')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror

                          <div class="form-group">
                            <label>Phone</label>
                            <input type="number" name="phone" class="form-control" @error('phone')
                            @enderror placeholder="Phone Number" value="">
                          </div>
                            @error('phone')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror

                        </div>
                      </div>

                            <!-- Form Column -->
                      <div class="info-column col-lg-6  col-md-6 col-md-12 col-sm-12">
                        <div class="innercolumn">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" @error('email')
                          @enderror placeholder="Email" value="">
                        </div>
                          @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                          <div class="form-group">
                            <label>School Name</label>
                            <input type="text" name="schoolname" class="form-control" @error('schoolname')
                            @enderror placeholder="School Name" value="">
                          </div>
                            @error('schoolname')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                           
                          <div class="form-group">
                            <label>Class</label>
                            <input type="text" name="classname" class="form-control" @error('classname')
                            @enderror placeholder="Class" value="">
                          </div>
                            @error('classname')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        
                          <div class="form-group">
                            <label>Passpot</label>
                            <input required type="file" name="images" class="form-control" @error('images')
                            @enderror placeholder="Passpot" value="">
                          </div>
                            @error('images')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary">Register</button>
                          </div>
                          

                        </form>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </section>

	
          @include('layouts.footer')
