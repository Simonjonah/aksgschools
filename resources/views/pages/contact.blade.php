@include('layouts.header')
    <!--End Main Header -->

	<!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/bri2.jpg)">
    	<div class="auto-container">
			<div class="content">
				<h1>Contact <span>us</span></h1>
				<ul class="page-breadcrumb">
					<li><a href="home">Home</a></li>
					<li>Contact</li>
				</ul>
			</div>
        </div>
    </section>
    <!--End Page Title-->

	<!-- Contact Page Section -->
	<section class="contact-page-section">

		<div class="auto-container">
			<div class="inner-container">
				{{-- <h2 style="color: red;">Contact  <br>SCHOOLSUPDATES.NG</span></h2> --}}
				<div class="row clearfix">

					<!-- Info Column -->
					<div class="info-column col-lg-7 col-md-12 col-sm-12">
						<div class="inner-column">
							<div class="text">For additioan information on MYSCHOOL.AFRICA services. Please contact using the information below</div>
							<ul class="list-style-five">
								<li><span class="icon fa fa-building"></span>NASU Secretariat, University of uyo Town Campus
									   , Uyo <br>
									Akwa Ibom State <br> Nigeria.</li>
								<li><span class="icon fa fa-fax"></span> +234 806 262 6853, +234 816 7930 965</li>
								<li><span class="icon fa fa-envelope-o"></span>info@myschoolafrica.com</li>
							</ul>
						</div>
					</div>
					
					<!-- Form Column -->
					<div class="form-column col-lg-5 col-md-12 col-sm-12">
						<div class="innercolumn">

							<!--Contact Form-->
							<div class="contactform">
								<form method="post" action="{{ url('createcontact') }}">
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
										<input class="form-control" type="text" name="firstname" value="" placeholder="Full name">
									</div>

									<div class="form-group">
										<input class="form-control" type="text" name="email" value="" placeholder="Email">
									</div>

									<div class="form-group">
										<input class="form-control" type="text" name="phone" value="" placeholder="Phone">
									</div>

									<div class="form-group">
										<textarea class="form-control" name="message" placeholder="write.."></textarea>
									</div>

									<div class="form-group">
										<button type="submit" class="btn btn-success">Submit</button>
									</div>

								</form>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- End Team Page Section -->



	@include('layouts.footer')