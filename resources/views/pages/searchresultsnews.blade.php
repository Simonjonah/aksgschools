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
	<section class="blog-Press-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<div class="title">Schools</div>
				{{-- <h2>Our latest   <span>Schools</span></h2> --}}
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
				@foreach ($results as $result)
                @if ($result->status == 'admitted')
                    <!-- News Block Three -->
				<div class="news-block-three col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="image">
							<a href="/view?id=">
                    		</a></h2></span>
							{{-- press_single --}}
						</div>
						<div class="lower-content">
							<ul class="post-meta">
								<li><span class="fa fa-calendar"></span>{{ $result->created_at->format('D d, M Y, H:i')}}</li>
								<li><b>Location:</b> {{ $result->address }} <span class="fa fa-user"></span></li>
							</ul>
							 <a href="{{ url('viewschoolsingle/'.$result->slug) }}">

                    		<img style="height: 60px; border-radius: 50%;" src="logo" alt=""></a></h2></span>
							<!-- <h4><?php //echo $result['topic']; ?></h4> -->
							<h4><a href="{{ url('viewschoolsingle/'.$result->slug) }}">{{ $result->schoolname }}</a></h4>
							{{-- <span><a href="{{ url('viewschoolsingle/'.$result->slug) }}">messages</a></span> --}}

							<a class="btn btn-success" href="{{ url('viewschoolsingle/'.$result->slug) }}">Continue Reading <span class="fa fa-angle-double-right"></span></a>
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