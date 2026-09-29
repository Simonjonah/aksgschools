@include('layouts.header')
	
	<!--Page Title-->
    <section class="page-title" style="background-image:url({{ URL::asset("/public/../$view_events->images")}})">
    	<div class="auto-container">
			<div class="content">
				<h1>{{ $view_events->schoolname }}</span></h1>
				<ul class="page-breadcrumb">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li>{{ $view_events->title }}</li>
				</ul>
			</div>
        </div>
    </section>
    <!--End Page Title-->
	
	<!--Sidebar Page Container-->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
				
				<!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                	<div class="blog-single">
						<div class="inner-box">
							<div class="image">
								<img src="{{ URL::asset("/public/../$view_events->images")}}" alt="" />
							</div>
							<div class="lower-content">
								<ul class="post-meta">
									<li><span class="fa fa-calendar"></span>{{ $view_events->created_at->format('D d, M Y, H:i')}}</li>
									<li><span class="fa fa-user"></span>By Admin</li>
									
								</ul>
								<h4>{{ $view_events->title }}.</h4>
								<div class="text">
									<p>{!! $view_events->message !!}</p>
									<div class="news-gallery">
										<div class="row clearfix">
											<div class="column col-lg-6 col-md-6 col-sm-12">
												<div class="image">
													<img style="width: 100%; height: 170px;" src="{{ URL::asset("/public/../$view_events->images")}}" alt="" />
												</div>
											</div>
											<div class="column col-lg-6 col-md-6 col-sm-12">
												<div class="image">
													<img style="width: 100%; height: 170px;" src="{{ URL::asset("/public/../$view_events->images2")}}" alt="" />
												</div>
											</div>

											<div class="column col-lg-6 col-md-6 col-sm-12">
												<div class="image">
													<img style="width: 100%; height: 170px;" src="{{ URL::asset("/public/../$view_events->images2")}}" alt="" />
												</div>
											</div>

											<div class="column col-lg-6 col-md-6 col-sm-12">
												<div class="image">
													<img style="width: 100%; height: 170px;" src="{{ URL::asset("/public/../$view_events->images3")}}" alt="" />
												</div>
											</div>

											<div class="column col-lg-6 col-md-6 col-sm-12">
												<div class="image">
													<img style="width: 100%; height: 170px;" src="{{ URL::asset("/public/../$view_events->images2")}}" alt="" />
												</div>
											</div>
										</div>
									</div>
									
								</div>
								
							</div>
						</div>
						
						<!--post-share-options-->
						<div class="post-share-options">
							<div class="post-share-inner clearfix">
								{{-- <div class="pull-left post-tags"><span>Tags: </span><a href="#">Business</a> <a href="#">Life</a> <a href="#">Applin</a> <a href="#">Techniq</a></div> --}}
								<ul class="pull-right social-links clearfix">
									<li class="facebook"><a href="{{ $view_events->facebook }}" class="fa fa-facebook"></a></li>
									<li class="twitter"><a href="{{ $view_events->twitter }}" class="fa fa-twitter"></a></li>
									<li class="linkedin"><a href="{{ $view_events->linkin }}" class="fa fa-linkedin"></a></li>
									<li class="dribble"><a href="{{ $view_events->instagram }}" class="fa fa-instagram"></a></li>
									<li class="whatsapp"><a href="{{ $view_events->whatsapp }}" class="fa fa-whatsapp"></a></li>
								</ul>
							</div>
						</div>
						
						
						
						
						
						<!-- Comment Form -->
						<div class="comment-form">
							
								
						</div>
						<!--End Comment Form -->
						
					</div>
				</div>
				
				<!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                	<aside class="sidebar default-sidebar">
						
						<!-- Search -->
                        <div class="sidebar-widget search-box">
                        	<form method="post" action="http://themexriver.com/tfhtml/finano/contact.html">
                                <div class="form-group">
                                    <input type="search" name="search-field" value="" placeholder="Enter Your Keyword..." required>
                                    <button type="submit"><span class="icon fa fa-search"></span></button>
                                </div>
                            </form>
						</div>
						
						<!--Blog Category Widget-->
                        <div class="sidebar-widget sidebar-blog-category">
                            <div class="sidebar-title-two">
                                <h4>Categories</h4>
                            </div>
                            <ul class="blog-cat-two">
								@foreach ($view_titles as $view_title)
									@if ($view_title->status == 'approved')
										
										<li><a href="{{ url('event_view/'.$view_title->slug) }} ">{{ $view_title->title }}  <span></span></a></li>
									@else
										
									@endif
								@endforeach
                               
                                
                               
                            </ul>
                        </div>
						
                        <div class="sidebar-widget sidebar-blog-category archive-widget">
                            <div class="sidebar-title-two">
                                <h4>School Info</h4>
                            </div>
                            <ul class="blog-cat-two">
								
								<li>Phone<a href="#">{{ $view_events->phone }} <span></span></a></li>
								<li>Email<a href="#">{{ $view_events->email }} <span></span></a></li>
								<li>Address<a href="#">{{ $view_events->address }} <span></span></a></li>
								<li>Schoolname<a href="#">{{ $view_events->schoolname }} <span></span></a></li>
										
								
                               
                            </ul>
                        </div>
						
						<!--Gallery Widget-->
                        <div class="sidebar-widget instagram-widget">
                            <div class="sidebar-title-two">
                                <h4>Gallery</h4>
                            </div>
							<div class="images-outer clearfix">
                                <!--Image Box-->
                                <figure class="image-box"><a href="{{ URL::asset("/public/../$view_events->images")}}" class="lightbox-image" data-caption="" data-fancybox="images" title="Image Title Here" data-fancybox-group="footer-gallery"><span class="overlay-box flaticon-plus-symbol"></span></a>
                                <img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_events->images")}}" alt=""></figure>
                                <!--Image Box-->
                                <figure class="image-box"><a href="{{ URL::asset("/public/../$view_events->images1")}}" class="lightbox-image" data-caption="" data-fancybox="images" title="Image Title Here" data-fancybox-group="footer-gallery"><span class="overlay-box flaticon-plus-symbol"></span></a>
                                <img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_events->images1")}}" alt=""></figure>
                                <!--Image Box-->
                                <figure class="image-box"><a href="{{ URL::asset("/public/../$view_events->images2")}}" class="lightbox-image" data-caption="" data-fancybox="images" title="Image Title Here" data-fancybox-group="footer-gallery"><span class="overlay-box flaticon-plus-symbol"></span></a>
                                <img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_events->images2")}}" alt=""></figure>
                                <!--Image Box-->

								<figure class="image-box"><a href="{{ URL::asset("/public/../$view_events->images3")}}" class="lightbox-image" data-caption="" data-fancybox="images" title="Image Title Here" data-fancybox-group="footer-gallery"><span class="overlay-box flaticon-plus-symbol"></span></a>
									<img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_events->images3")}}" alt=""></figure>
									<!--Image Box-->
								<figure class="image-box"><a href="{{ URL::asset("/public/../$view_events->images5")}}" class="lightbox-image" data-caption="" data-fancybox="images" title="Image Title Here" data-fancybox-group="footer-gallery"><span class="overlay-box flaticon-plus-symbol"></span></a>
									<img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_events->images5")}}" alt=""></figure>

									<figure class="image-box"><a href="{{ URL::asset("/public/../$view_events->logo")}}" class="lightbox-image" data-caption="" data-fancybox="images" title="Image Title Here" data-fancybox-group="footer-gallery"><span class="overlay-box flaticon-plus-symbol"></span></a>
										<img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_events->logo")}}" alt=""></figure>
                            </div>
						</div>
						
						
						<!-- Banner Widget-->
                        <div class="sidebar-widget banner-widget">
							<div class="widget-content" style="background-image:url({{ URL::asset("/public/../$view_events->images")}})">
								<div class="logo">
									<img src="{{ URL::asset("/public/../$view_events->logo")}}" alt="" />
								</div>
								<div class="title">{{ $view_events->address }}</div>
								<h2>{{ $view_events->schoolname }}</h2>
								<a href="{{ url('registerevents/'.$view_events->slug) }}" class="theme-btn btn-style-seventen">Register now <span class="icon flaticon-link"></span></a>
							</div>
						</div>
						
					</aside>
				</div>
				
			</div>
		</div>
	</div>
	<!--End Sidebar Page Container-->
	
	@include('layouts.footer')