
@include('layouts.header')
	<!--Page Title-->
    <section class="page-title" style="background-image:url({{ asset('images/background/bri2.jpg') }})">
    	<div class="auto-container">
			<div class="content">
				<h1>Team <span>Member</span></h1>
				<ul class="page-breadcrumb">
					<li><a href="{{ url('home') }}">Home</a></li>
					<li>Pages</li>
					<li>Team</li>
				</ul>
			</div>
        </div>
    </section>
    <!--End Page Title-->

	<section class="team-section-two" >
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title-three centered">
				<div class="title">Our Team</div>
				<h2>We have an  <br> experience team Members</h2>
			</div>

			<div class="row clearfix">

<!--Team Block-->
@foreach ($member_teams as $member_team )
@if ($member_team->status == 'approved')
<div class="team-block-two col-lg-4 col-md-6 col-sm-12">
	<div class="inner-box wow fadeIn" data-wow-delay="0ms" data-wow-duration="1500ms">
		<div class="image">
			<a href="team"><img style="height: 300px; width: 100%;" src="{{ URL::asset("/public/../$member_team->images")}}" alt="" title=""></a>
			<ul class="social-box">
				<li><a href="{{ $member_team->facebook }}" class="fa fa-facebook"></a></li>
				<li><a href="{{ $member_team->twitter }}" class="fa fa-twitter"></a></li>
				<li><a href="{{ $member_team->email }}" class="fa fa-whatsapp"></a></li>
				<li><a href="{{ $member_team->likedin }}" class="fa fa-linkedin"></a></li>
			</ul>
		</div>
		<div class="lower-content">
			<h5><a href="team">{{ $member_team->lname }}, {{ $member_team->fname }}</a></h5>
			<div class="designation">{{ $member_team->designation }}</div>
		</div>
	</div>
</div>
@else
	
@endif
	
@endforeach 
			</div>
			<div class="text-center" style="margin-bottom: 60px;">
				<a href="{{ url('team') }}" class="theme-btn btn-style-fourteen">View All Teams</a>
			</div>
		</div>
	</section>
	<!-- End Team Section Two -->
	<!-- End Team Page Section -->

@include('layouts.footer')

