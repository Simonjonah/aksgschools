<?php require_once 'common/header.php'; ?>

	<!--Main Slider-->

	<!--Main Slider-->
    <section class="main-slider style-two">
        <div class="main-slider-carousel owl-carousel owl-theme">
        	<?php if (count($press_release) > 0): ?>
    		<?php foreach ($press_release as $press_releases): ?>
            
            <div class="slide" style="background-image:url(<?php echo HOME. $press_releases['images']; ?>); background-size: cover; background-repeat: no-repeat; background-position: center;">
                <div class="auto-container">
					<div class="content alternate">
						<h1 class="alternate" style="color: green;"><?php echo $press_releases['schoolname']; ?></h1>
						<div class="text alternate"><?php echo substr($press_releases['message'], 0, 70); ?></div>
						<div class="text alternate"><a class="theme-btn btn-style-twelve" href="press_single/view?id=<?php echo $press_releases['id'] ?>">Continue Reading <span class="fa fa-angle-double-right"></span></a></div>
					</div>
                </div>
            </div>

			<?php endforeach; ?>
			<?php endif; ?>
        </div>
	</section>

<!-- Testimonial Section Three #6a592f; -->
	<section class="testimonial-section-three">
		<div class="auto-container">
			<!-- Sec Title Two -->
			<div class="sec-title-two centered">
				<div class="title">Services</div>
				<h2>We Advertise your <br> Schools through  <span> our services</span></h2>
			</div>
			
			<div class="two-item-carousel owl-carousel owl-theme">
			<?php if (count($schooladverts) > 0): ?>
    		<?php foreach ($schooladverts as $schooladvert): ?>
				<!-- Testimonial Block Four -->
				<div class="testimonial-block-four">
					<div class="inner-box">
						<div class="quote-icon flaticon-double-quotes"></div>
						<div class="image-outer">
							<div class="image">
								<img src="<?php echo HOME. $schooladvert['logo']; ?>" alt="" />
							</div>
						</div>
						<h5><a style="color: #6a592f; font-size: 20px;" href="<?php echo HOME; ?>press_single/view?id=<?php echo $schooladvert['id'] ?>"><?php echo $schooladvert['schoolname']; ?></a></h5>
						<div class="text"><a style="color: #000000; font-size: 20px;" href="<?php echo HOME; ?>press_single/view?id=<?php echo $schooladvert['id'] ?>"><?php echo substr($schooladvert['topic'], 0, 70); ?></a></div>
					</div>
				</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</section>

	
	<!-- Services Section Four -->
	<section class="services-section-five">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<!-- <div class="title">Press Release</div> -->
				<h2>ICT TRAINING/<span>CERTIFICATION</span></h2>
			</div>
			<div class="row clearfix">
				
				<!-- Services Block Six -->
				<div class="services-block-six col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="icon-box">
							<!-- <span class="icon flaticon-statistics-1"></span> -->
						</div>
						<h6 style="margin-top: -80px;"><a href="infotech">Data Processing/(Infotech)</a></h6>
						<div class="text" style="margin-bottom: 10px;">This course trains students on digital office skills such as data management/automation, designs, software calculations models, electronic communication, and ICT presentation/ teaching software</div>
					        
					         <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                            Apply
                          </button>

					</div>

				</div>
				
				<!-- Services Block Six -->
				<div class="services-block-six col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
						<div class="icon-box">
							<!-- <span class="icon flaticon-research"></span> -->
						</div>
						<h6 style="margin-top: -80px;"><a href="#">Network Engineering Technology</a></h6>
						<div class="text" style="margin-bottom: 10px;">This course equips learners with the technical skills to analyse, design; configure troubleshoot, implement and secure computer networks.</div>
					        
					        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
                            Apply
                          </button>

					</div>
				</div>
				
				<!-- Services Block Six -->
				<div class="services-block-six col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="icon-box">
							<!-- <span class="icon flaticon-target-1"></span> -->
						</div>
						<h6 style="margin-top: -80px;"><a href="#">Computer Hardware Enginnering </a></h6>
						<div class="text" style="margin-bottom: 10px;">This equips students with complete skills in System Architecture, System Assembly, Software Installation, Software Configuration, Troubleshooting, Repairs, Maintenance, and Laptops Repairs/Maintenance.</div>
					        
					         <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-secondary">
                              Apply
                            </button>

					</div>
				</div>
				
				<!-- Services Block Six -->
				<div class="services-block-six col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
						<div class="icon-box">
							<!-- <span class="icon flaticon-business-and-finance-1"></span> -->
						</div>
						<h6 style="margin-top: -80px;"><a href="#">System Security</a></h6>
						<div class="text" style="margin-bottom: 10px">This training builds enterprising, innovative, and leadership skills in students which revitalise their mindset to nurture, manage, launch, and grow a start-up or organisation that impacts their immediate society and the world at large.</div>
					        
					        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">
                           Apply
                          </button>
                         
					</div>
				</div>
				
				<!-- Services Block Six -->
				<div class="services-block-six col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="icon-box">
							<!-- <span class="icon flaticon-line-chart-1"></span> -->
						</div>
						<h6 style="margin-top: -80px;"><a href="#">Software Engineering Technology</a></h6>
						<div class="text" style="margin-bottom: 10px;">The course trains student to master the skill of web design/development, SQL, Javascript, PHP, python, bootstrap Postgresql, and mobile APP.</div>
					       
					        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                          Apply
                        </button>

					</div>
				</div>
				
				<!-- Services Block Six -->
				<div class="services-block-six col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
						<div class="icon-box">
							<!-- <span class="icon flaticon-comment-1"></span> -->
						</div>
						<h6 style="margin-top: -80px;"><a href="#">Mobile Technology</a></h6>
						<div class="text" style="margin-bottom: 10px;">The argument in favor of using filler text goes some labore et dolore magna aliqua consectetur.</div>
					       
					        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
                            Apply
                          </button>

					</div>
				</div>

				<!-- Services Block Six -->
				<div class="services-block-six col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
						<div class="icon-box">
							<!-- <span class="icon flaticon-multimedia-option"></span> -->
						</div>
						<h6 style="margin-top: -80px;"><a href="#">E-commerce/Digital Marketing</a></h6>
						<div class="text" style="margin-bottom: 10px;">We groom students to understand fundamental marketing concepts, like PPC, SEO, Social Media, Web Analytics Strategy, 3D printing, and more. Students make strategic marketing concepts and tools to address new brand communication in the digital world.</div>
					       
					        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-dark">
                              Apply
                            </button>

					</div>
				</div>

				<!-- Services Block Six -->
				<div class="services-block-six col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
						<div class="icon-box">
							<!-- <span class="icon flaticon-help"></span> -->
						</div>
						<h6 style="margin-top: -80px;"><a href="#">Enterprenurship</a></h6>
						<div class="text" style="margin-bottom: 10px;">This training builds enterprising, innovative, and leadership skills in students which revitalise their mindset to nurture, manage, launch, and grow a start-up or organisation that impacts their immediate society and the world at large.</div>
					        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-defaults">
                              Apply
                            </button>
						
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- End Services Section Four -->

		<!-- RECSNTE SCHOOL UPDATE -->
    <section class="blog-Press-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<!-- <div class="title">Press Release</div> -->
				<h2>Our Rescent added  <span>Schools</span></h2>
			</div>
					
			<div class="row clearfix">
			<?php if (count($press_release) > 0): ?>
    		<?php foreach ($press_release as $press_releases): $date = date('d-m-Y');?>
				<!-- News Block Three -->
				<div class="news-block-three col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="image">
							<a href="<?php echo HOME; ?>press_single/view?id=<?php echo $press_releases['id'] ?>">
                    		</a></h2></span>
							
						</div>
						<div class="lower-content">
							<ul class="post-meta">
								<li><span class="fa fa-calendar"></span><?php echo $date; ?></li>
								<li><b>Location:</b> <span class="fa fa-user"></span><?php echo $press_releases['address']; ?></li>
							</ul>
							 <a href="<?php echo HOME; ?>press_single/view?id=<?php echo $press_releases['id'] ?>">

                    		<img style="height: 60px; border-radius: 50%;" src="<?php echo HOME.$press_releases['logo']; ?>" alt=""></a></h2></span>
							<!-- <h4><?php //echo $press_releases['topic']; ?></h4> -->
							<h4><a href="<?php echo HOME; ?>press_single/view?id=<?php echo $press_releases['id'] ?>"><?php echo $press_releases['schoolname']; ?></a></h4>
							<span><a href="<?php echo HOME; ?>press_single/view?id=<?php echo $press_releases['id'] ?>"><?php echo substr($press_releases['message'], 0, 70); ?></a></span>

							<a class="btn btn-success" href="press_single/view?id=<?php echo $press_releases['id'] ?>">Continue Reading <span class="fa fa-angle-double-right"></span></a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
    		<?php endif; ?>
			
			</div>
			<div class="text-center">
				<a href="blog" class="theme-btn btn-style-fourteen">View All Advert</a>
			</div>
		</div>
	</section>
	<!-- End Blog Press Section -->

	<!-- End Testimonial Section Two -->


	<!-- Team Section Two -->
	<section class="team-section-two" >
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title-three centered">
				<div class="title">Our Team</div>
				<h2>We have an  <br> experience team Members</h2>
			</div>

			<div class="row clearfix">

				<!--Team Block-->
				<?php if (count($members_teams) > 0): ?>
				<?php foreach ($members_teams as $member_team ): ?>
				<div class="team-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeIn" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="image">
							<a href="team"><img style="height: 300px; width: 100%;" src="<?php echo HOME. $member_team['images']; ?>" alt="" title=""></a>
							<ul class="social-box">
								<li><a href="<?php echo $member_team['face']; ?>" class="fa fa-facebook"></a></li>
								<li><a href="<?php echo $member_team['tweet']; ?>" class="fa fa-twitter"></a></li>
								<li><a href="<?php echo $member_team['email']; ?>" class="fa fa-whatsapp"></a></li>
								<li><a href="<?php echo $member_team['email']; ?>" class="fa fa-linkedin"></a></li>
							</ul>
						</div>
						<div class="lower-content">
							<h5><a href="team"><?php echo $member_team['firstname']; ?> <?php echo $member_team['othername']; ?></a></h5>
							<div class="designation"><?php echo $member_team['designation']; ?></div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
			</div>
			<div class="text-center">
				<a href="team" class="theme-btn btn-style-fourteen">View All Teams</a>
			</div>
		</div>
	</section>
	<!-- End Team Section Two -->

	<section class="testimonial-section-two" style="margin-bottom: 80px; margin-top: 80px;">
		<div class="image-layer" style="background-image:url(<?php echo HOME; ?>images/background/bri2.jpg)"></div>
		<div class="auto-container">
			<h2>Some of our latest <span>events</span></h2>
			<div class="testimonial-carousel-two owl-carousel owl-theme">
				<?php if (count($posts) > 0): ?>
                <?php foreach ($posts as $post): ?>
				<!-- Testimonial Block -->
				<div class="testimonial-block-three">
					<div class="inner-box">
						<div class="row clearfix">

							<!-- Image Column -->
							<div class="image-column col-lg-3 col-md-4 col-sm-12">
								<div class="inner-column">
									<div class="image">

										<a href="<?php echo HOME; ?>event_view/view?id=<?php echo $post['id'] ?>">
                    					<img style="width: 1000px; height: 200px;" src="<?php echo HOME. $post['images']; ?>" alt=""></a></h2></span>
									</div>
								</div>
							</div>
							<!-- Content Column -->
							<div class="content-column col-lg-9 col-md-8 col-sm-12">
								<div class="inner-column">
									<div class="text"><span class="icon flaticon-left-quote"></span><?php echo substr($post['message'], 0, 200);  ?><a href="<?php echo HOME; ?>event_view/view?id=<?php echo $post['id']; ?>"> Read More</a></div>
									
									<h4 style="color: #fff; padding-left: 70px;">School Name:<a href="<?php echo HOME; ?>event_view/view?id=<?php echo $post['id'] ?>"><?php echo $post['schoolname']; ?></a></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				
				<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<!-- End Testimonial Section Two -->


	


	<section class="sponsors-section">
		<div class="auto-container">
			<div class="carousel-outer">
                <!--Sponsors Slider-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                	<?php if (count($posts) > 0): ?>
                    <?php foreach ($posts as $post): ?>
                    <li><div class="image-box"><a href="#"><img style="width: 100%; height: 100px;" src="<?php echo HOME. $post['images']; ?>" alt=""></a></div></li>
               
					<?php endforeach; ?>
		        <?php endif; ?>
                </ul>
            </div>
		</div>
	</section>
	<!--End Sponsors Section-->

	
	<!-- Call To Action Section -->
	<section class="call-back-section" style="background-image:url(<?php echo HOME; ?>images/background/bri2.jpg)">
		<h3 style="text-align: center; color: #fff; ">For Enquiries</h3>
		<div class="auto-container">
			<div class="row clearfix">
				<!-- Form Column -->
				<div class="form-column col-lg-12 col-md-12 col-sm-12">
					<div class="inner-column">

						<!-- Request Form -->
						<div class="requestform" style="color: #fff;">
							<!--Request Form-->
							<form method="post" action="">
								<div class="row clearfix">
									
									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<label>Full Name</label>
										<input class="form-control" type="text" name="fulname" placeholder="Full Name" required="">
									</div>
									
									
									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<label>Phone Number</label>
										<input class="form-control" type="text" name="phone" placeholder="Phone Number" required="">
									</div>
									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<label>Message</label>
										<textarea class="form-control" name="message" placeholder="Message Us..." required=""></textarea>
									</div>
									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<label>Email Address</label>
										<input class="form-control" type="text" name="email" placeholder="Your Email" required="">
									</div>
									
									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<button class="btn btn-success" type="submit" name="submitform">Submit now <span class="icon fa fa-angle-right"></span></button>


									</div>
								</div>
							</form>
						</div>

					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Call To Action Section -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Data Processing/Technology(Infotech)</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h5 style="color: green;">Course Outline</h5>
               <p>This course trains students on digital office skills such as data management/automation, designs, software calculations models, electronic communication, and ICT presentation/ teaching software</p>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <a href="<?php echo HOME; ?>apply" class="btn btn-primary">Apply</a>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-primary">
        <div class="modal-dialog">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title" style="color: white;">Network Engineering Technology</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h5 style="color: #ffff;">Course Outline</h5>
              <p style="color: #ffff;">This course equips learners with the technical skills to analyse, design; configure troubleshoot, implement and secure computer networks.</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <a href="<?php echo HOME; ?>apply" class="btn btn-outline-light">Apply</a>
             
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-secondary">
        <div class="modal-dialog">
          <div class="modal-content bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title" style="color: white;">Computer Hardware Enginnering</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p style="color: white;">This equips students with complete skills in System Architecture, System Assembly, Software Installation, Software Configuration, Troubleshooting, Repairs, Maintenance, and Laptops Repairs/Maintenance.</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <a href="<?php echo HOME; ?>apply"  class="btn btn-outline-light">Apply</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


        <div class="modal fade" id="modal-overlay">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="overlay">
                <i class="fas fa-2x fa-sync fa-spin"></i>
            </div>
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



      <div class="modal fade" id="modal-warning">
        <div class="modal-dialog">
          <div class="modal-content bg-warning">
            <div class="modal-header">
              <h4 class="modal-title">System Security</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h4 style="color: #fff;">Course Outline</h4>
              <p style="color: #fff;">This training builds enterprising, innovative, and leadership skills in students which revitalise their mindset to nurture, manage, launch, and grow a start-up or organisation that impacts their immediate society and the world at large.</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
              <a href="<?php echo HOME; ?>apply" class="btn btn-outline-dark">Apply</a>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


      <div class="modal fade" id="modal-success">
        <div class="modal-dialog">
          <div class="modal-content bg-success">
            <div class="modal-header">
              <h4 class="modal-title" style="color: #fff;">Software Engineering Technology</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h4 style="color: #fff;">Course Overview</h4>
              <p style="color: #fff;">The course trains student to master the skill of web design/development, SQL, Javascript, PHP, python, bootstrap Postgresql, and mobile APP</p>

              </ul>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <a href="<?php echo HOME; ?>apply" class="btn btn-outline-light">Apply</a>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


       <div class="modal fade" id="modal-danger">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Danger Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-outline-light">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-defaults">
        <div class="modal-dialog">
          <div class="modal-content bg-default">
            <div class="modal-header">
              <h4 class="modal-title">Enterpreneurship</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Enterpreneurship</p>
              <p>This training builds enterprising, innovative, and leadership skills in students which revitalise their mindset to nurture, manage, launch, and grow a start-up or organisation that impacts their immediate society and the world at large.</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <a href="<?php echo HOME; ?>apply" class="btn btn-success">Register</a>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



       <div class="modal fade" id="modal-dark">
        <div class="modal-dialog">
          <div class="modal-content bg-dark">
            <div class="modal-header">
              <h4 class="modal-title" style="color: #fff;">E-commerce/Digital Marketing</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h4 style="color: #fff;">Course Outline</h4>
              <p style="color: #fff;">We groom students to understand fundamental marketing concepts, like PPC, SEO, Social Media, Web Analytics Strategy, 3D printing, and more. Students make strategic marketing concepts and tools to address new brand communication in the digital world.</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <a href="<?php echo HOME; ?>apply" class="btn btn-outline-light">Apply</a>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      





<?php require_once 'common/footer.php '; ?>
