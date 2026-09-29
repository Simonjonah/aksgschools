@include('layouts.header')

	
	<!--Page Title-->
    <section class="page-title" style="background-image:url({{ asset('images/background/bri2.jpg') }}); padding-top: 120px;">
    	<div class="auto-container">
			<div class="content">
				<h1>Successful<span> registration </span></h1>
				<ul class="page-breadcrumb">
					<li><a href="{{ url('home') }}">Home</a></li>
					<li>Thank you</li>
				</ul>
			</div>
        </div>
    </section>
    <!--End Page Title-->
	

	<section class="contact-page-section" style="margin-bottom: 50px; text-align: center">
            <div class="auto-container">
              <div class="inner-container">
                <div class="row clearfix">

                  <!-- Info Column -->
                    <div class="info-column col-lg-12">
                      <div class="contactform">
                      
                        <h4 style="color: green">Please Copy this Ref Number Before you Closed the page <span style="color: red;">{{ $vew_regid->ref_no }}</span></h4>
              
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </section>

	
          @include('layouts.footer')
