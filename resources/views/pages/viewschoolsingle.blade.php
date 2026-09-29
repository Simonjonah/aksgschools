@include('layouts.header')
	<!--Page Title-->
    <section class="page-title" style="background-image:url({{ URL::asset("/public/../$view_allnews->logo")}})">
    	<div class="auto-container">
			<div class="content">
				<h1> <span>Welcome to {{ $view_allnews->schoolname }} page</span></h1>
				<ul class="page-breadcrumb">
					<li><a href="home">Home</a></li>
					<li>{{ $view_allnews->schoolname }}</li>
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
			<div class="sec-title centered" style="margin-top: 50px;">
				<div class="title">{{ $view_allnews->schoolname }}</div>
				{{-- <h2>Our latest   <span>Schools</span></h2> --}}
			</div>

				<div class="col-lg-6 col-md-6 col-sm-12">
					<aside class="sidebar default-sidebar">
						<!-- Search -->
                        <div class="sidebar-widget search-box">
                        	<form method="get" action="{{ url('search1') }}">
                                <div class="form-group">
                                    <input type="search" name="query" value="" placeholder="Search for News" >
                                    <button type="submit"><span class="icon fa fa-search"></span></button>
                                </div>
                            </form>
						</div>
					
					</article>
				</div>
					
			<div class="row clearfix">
				@foreach ($view_allschoolnews as $view_allschoolnew)
                @if ($view_allschoolnew->status == 'approved')
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
								<li><span class="fa fa-calendar"></span>{{ $view_allschoolnew->created_at->format('D d, M Y, H:i')}}</li>
								<li><b>Location:</b> {{ $view_allschoolnew->address }} <span class="fa fa-user"></span></li>
							</ul>
							 <a href="{{ url('view_singleschool/'.$view_allschoolnew->slug1) }}">

                    		<img style="height: 60px; border-radius: 50%;" src="{{ URL::asset("/public/../$view_allschoolnew->logo")}}" alt=""></a></h2></span>
						    <h4><a href="{{ url('view_singleschool/'.$view_allschoolnew->slug1) }}">{{ $view_allschoolnew->title }}</a></h4>
							<p><a href="{{ url('view_singleschool/'.$view_allschoolnew->slug1) }}">{{ $view_allschoolnew->schoolname }}</a></p>
							{{-- <span><a href="{{ url('view_singleschool/'.$view_allschoolnew->slug1) }}">messages</a></span> --}}

							<a class="btn btn-success" href="{{ url('view_singleschool/'.$view_allschoolnew->slug1) }}">Continue Reading <span class="fa fa-angle-double-right"></span></a>
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