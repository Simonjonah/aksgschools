@include('layouts.header')
	<!--Page Title-->
    <section class="page-title" style="background-image:url({{ asset('images/background/bri2.jpg') }})">
    	<div class="auto-container">
			<div class="content">
				<h1>Primary <span>Schools</span></h1>
				<ul class="page-breadcrumb">
					<li><a href="home">Home</a></li>
					<li>Primary Schools</li>
				</ul>
			</div>
        </div>
    </section>


	<div class="input-group">
		
	</div>
										
	<!-- Blog Press Section -->
	<section class="blog-Press-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<div class="title">Schools</div>
				<h2>Our latest   <span>Schools</span></h2>
			</div>

				<div class="col-lg-6 col-md-6 col-sm-12">
					<aside class="sidebar default-sidebar">
						<!-- Search -->
                        <div class="sidebar-widget search-box">
                        	<form method="get" action="{{ url('search') }}">
                                <div class="form-group">
                                    <input type="search" name="query" value="" placeholder="Enter name of School..." >
                                    <button type="submit"><span class="icon fa fa-search"></span></button>
                                </div>
                            </form>
						</div>
					
					</article>
				</div>
					
			<div class="row clearfix">
				@foreach ($primary_schools as $primary_school)
                @if ($primary_school->status == 'admitted')
				<div class="news-block-three col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="image">
							<a href="{{ url('viewschoolsingle/'.$primary_school->slug) }}">
							<img style="width: 50px; height: 50px;" src="{{ URL::asset("/public/../$primary_school->logo")}}" alt=""></a></h2></span>
						</div>
						<div class="lower-content">
							<ul class="post-meta">
								<li><span class="fa fa-calendar"></span>{{ $primary_school->created_at->format('D d, M Y, H:i')}}</li>
								<li><b>Location:</b> {{ $primary_school->address }} <span class="fa fa-user"></span></li>
							</ul>
							 <a href="{{ url('viewschoolsingle/'.$primary_school->slug) }}">
                    		<img style="height: 60px; border-radius: 50%;" src="logo" alt=""></a></h2></span>
							<!-- <h4><?php //echo $primary_school['topic']; ?></h4> -->
							<h4><a href="{{ url('viewschoolsingle/'.$primary_school->slug) }}">{{ $primary_school->schoolname }}</a></h4>
							{{-- <span><a href="{{ url('viewschoolsingle/'.$primary_school->slug) }}">messages</a></span> --}}

							<a class="btn btn-success" href="{{ url('viewschoolsingle/'.$primary_school->slug) }}">Continue Reading <span class="fa fa-angle-double-right"></span></a>
						</div>
					</div>
				</div>
                @else
                    
                @endif
				
			@endforeach
			
			</div>
		</div>
	</section>
	<!-- End Blog Press Section -->
	
	
	<!--Main Footer-->
	@include('layouts.footer');