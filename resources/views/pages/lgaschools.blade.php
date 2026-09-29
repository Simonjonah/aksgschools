@include('layouts.header')
	<!--Page Title-->
    <section class="page-title" style="background-image:url({{ asset('images/background/bri2.jpg') }})">
    	<div class="auto-container">
			<div class="content">
				<h1> <span>Schools</span></h1>
				<ul class="page-breadcrumb">
					<li><a href="home">Home</a></li>
					<li> Schools</li>
				</ul>
			</div>
        </div>
    </section>


	<div class="input-group">
		
	</div>
										
	<!-- Blog Press Section -->
	<section class="blog-Press-section" style="margin-top: 50px;">
		<div class="auto-container">
					
			<div class="row clearfix">
				@foreach ($view_lgas as $view_lga)
                    <!-- News Block Three -->
				<div class="news-block-three col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						
						<div class="lower-content">
							
							<h4><a href="{{ url('viewschoolsinlga/'.$view_lga->lga) }}">{{ $view_lga->lga }}</a></h4>

							{{-- <a class="btn btn-success" href="{{ url('viewschoolsinlga/'.$view_lga->slug) }}">Continue Reading <span class="fa fa-angle-double-right"></span></a> --}}
						</div>
					</div>
				</div>
             
				
			@endforeach
			
			</div>
		</div>
	</section>
	<!-- End Blog Press Section -->
	
	
	<!--Main Footer-->
	@include('layouts.footer');