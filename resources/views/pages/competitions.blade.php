@include('layouts.header')

	<!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/bri2.jpg)">
    	<div class="auto-container">
			<div class="content">
				<h1>Competitions <span>page</span></h1>
				<ul class="page-breadcrumb">
					<li><a href="home">Home</a></li>
					<li>Pages</li>
					<li>Competitions</li>
				</ul>
			</div>
        </div>
    </section>

	<!-- Services Section Ten -->
	<section class="services-section-ten style-two">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<div class="title">Competitions</div>
				{{-- <h2>The proper way of <br> Diseminating schools<span> information is guaranteed </span></h2> --}}
			</div>
			<div class="row clearfix">
				@foreach ($view_events as $view_event)
					@if ($view_event->status == 'approved')
					<div class="services-block-fourteen style-two col-lg-4 col-md-6 col-sm-12">
						<img src="{{ URL::asset("/public/../$view_event->images")}}" alt=""></a></h2></span>
						<div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="icon-box">
								<p style="font-size: 12px">{{ $view_event->title }}</p>

							<h6><a href="{{ url('event_view/'.$view_event->slug) }}">view </a></h6>

							</div>
							<h6><a href="{{ url('registerevents/'.$view_event->slug ) }}">Register </a></h6>
						</div>
					</div>
	
					@else
						
					@endif
				@endforeach
				
				
				
			</div>
		</div>
	</section>
	<!-- End Services Section Ten -->

	<!--Main Footer-->
    @include('layouts.footer')

	
