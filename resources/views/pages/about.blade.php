@include('layouts.header')
	<!--Page Title-->
    <section class="page-title" style="background-image:url({{ asset('images/background/bri2.jpg') }})">
    	<div class="auto-container">
			<div class="content">
				<h1>About <span>Us</span></h1>
				<ul class="page-breadcrumb">
					<li><a href="{{ url('home') }}">Home</a></li>
					<li>Pages</li>
					<li>About Us</li>
				</ul>
			</div>
        </div>
    </section>
    <!--End Page Title-->

	<!-- Services Section Three-->
	<section class="services-section-three">
		<div class="auto-container">
			<div class="row clearfix">

				<!-- Services Block -->
				<div class="services-block-three style-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeIn" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="icon-box">
							<span class="icon flaticon-bar-chart"></span>
						</div>
						<h6><a href="#">Our Mission Statement</a></h6>
						<div class="text">To be the best leading community of leaders where everyone is committed and responsible for the development of the child academically, socially and morally while preparing them towards becoming dynamic future leaders.</div>
					</div>
				</div>

				<!-- Services Block -->
				<div class="services-block-three style-two col-lg-4 col-md-12 col-sm-12">
					<div class="inner-box wow fadeIn" data-wow-delay="600ms" data-wow-duration="1500ms">
						<div class="icon-box">
							<span class="icon flaticon-student"></span>
						</div>
						<h6><a href="#">Our Objectives</a></h6>
						<div class="text">The argument in favor of using filler text goes some labore et dolore magna aliqua consectetur.</div>
					</div>
				</div>

				<!-- Services Block -->
				<div class="services-block-three style-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeIn" data-wow-delay="300ms" data-wow-duration="1500ms">
						<div class="icon-box">
							<span class="icon flaticon-creativity"></span>
							<!-- <span class="icon flaticon-board"></span> -->
						</div>
						<h6><a href="#">Our Vission</a></h6>
						<div class="text">To produce very responsible, inquisitive, professional and socially aware children with super brains who would possess strong competence essential for academic success, professionalism and leadership in the leading creative world.</div>
					</div>
				</div>

				

			</div>
		</div>
	</section>
<!-- About Section Four -->
<section class="about-section-four">
	<div class="auto-container">

		<div class="sec-title centered">
			<div class="title" style="color: red;">About us</div>
			{{-- <h2 style="color: purple;">For us at BRIXTONN, passion is our sole <br> driving force towards molding our pupils into their excellent states</h2> --}}
		</div>

		<div class="row clearfix">

			<!-- Content Column -->
			<div class="image-column col-lg-5 col-md-12 col-sm-12">
				<div class="inner-column">
					<div class="image-1"><img src="{{ asset('images/background/bri2.jpg') }}" alt=""></div>
					<div class="image-2"><img src="{{ asset('images/background/bri2.jpg') }}" alt=""></div>
				</div>
			</div>

			<!-- Skills Column -->
			<div class="skills-column col-lg-7 col-md-12 col-sm-12">
				<div class="inner-column">

					<!--Skills-->
					<div class="skills style-two">

						

					<div class="text">
						<p>Schools Up-date, is an information/examination management website. It enanle schools to send informations/Adverts directly to their pupls/students parent and word. It is also a system that help schools set-up their school examination records and results.</p>
					</div>
					<div class="text">
						<p>To meat-up with the new technology age in Education, Schools Update is a most for every School. Students/Pupils can now check their results/school information straight from the comfort of their home.</p>
					</div>
					<div class="text">
						<p>Schools Up-date comes with little and highly affordable cost. Registration is N5,000 for a period of six months, and 10,000 for a period of one year renewal system.</p>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<!-- End About Section Four -->
	
<!-- Video Section -->
	<section class="video-section" style="background-image:url(images/logo.jpg); margin-top: 40px;">
		<div class="auto-container">
			<img src="">
			<div class="title">Video</div>
			<h2>See how we work with <br>experience and   <span>creativity</span></h2>
			<a href="#" class="play-now" data-fancybox="gallery" data-caption=""><i class="icon flaticon-play-button" aria-hidden="true"></i><span class="ripple"></span></a>
		</div>
	</section>
	<!-- End Video Section -->

	


	<!-- About Section Four -->
	

	<!--Main Footer-->
@include('layouts.footer');