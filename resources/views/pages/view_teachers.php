
<?php require_once 'common/header.php'; ?>
	<!--Page Title-->
    <section class="page-title" style="background-image:url(<?php echo HOME; ?>images/background/bri2.jpg)">
    	<div class="auto-container">
			<div class="content">
				<h1>Team <span>Member</span></h1>
				<ul class="page-breadcrumb">
					<li><a href="<?php echo HOME; ?>home">Home</a></li>
					<li>Pages</li>
					<li>Team</li>
				</ul>
			</div>
        </div>
    </section>
    <!--End Page Title-->

	
		
				
	<section class="services-section-ten style-two">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<div class="title">Our Teachers</div>
					<h2>Our <br>experience<span>Teachers</span></h2>
			</div>
			<div class="row clearfix">
				<?php if (count($view_teacher) > 0): ?>
                    <?php foreach ($view_teacher as $view_teachers): ?>
				<!-- Services Block Fifteen -->
				<div class="services-block-fifteen col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow bounceIn" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="image">
							<img style="width: 100%; height: 200px;" src="<?php echo HOME. $view_teachers['images']; ?>" alt="">
							<div class="overlay-box">
								<a href="<?php echo HOME. $view_teachers['images']; ?>" data-fancybox="service-2" data-caption="" class="plus flaticon-plus-symbol"></a>
							</div>
						</div>
						<div class="lower-content">
							<div class="upper-box">
								<li>
									<ul>
										<li><h5 style="color: green;">Name: <?php echo $view_teachers['fulname']; ?></h5></li>
										<li><h5 style="color: red;"> Qualification: 
											<?php echo $view_teachers['qualification']; ?></h5></li>
										<li><h5 style="color: #000;">Course: <?php echo $view_teachers['course']; ?></h5></li>
									</ul>
								</li>
								<!-- <a href="<?php echo HOME; ?>contacteachers" class="btn btn-primary">Contact: </a> -->
							</div>

						</div>

					</div>
					<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
			  aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header text-center">
			        <h4 class="modal-title w-100 font-weight-bold">Contact</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <form method="post" action="">
			      	
			      
			      <div class="modal-body mx-3">
			        <div class="md-form mb-5">
			          <h4>Teachers Name</h4>
			          <input type="text" class="form-control validate" value="<?php echo $view_teachers['fulname']; ?>" name="teachername">
			          
			        </div>
			        <div class="md-form mb-5">
			          <h4>Your Name</h4>
			          <input type="text" class="form-control validate" name="cname" required="">
			        </div>

			        <div class="md-form mb-4">
			        	<h4>Method of Teaching</h4>
			        	<select name="teachingmethod" class="form-control" required="">
			        		<option>Choose method of Teaching</option>
			        		<option>For School</option>
			        		<option>Online</option>
			        		<option>Offline</option>
			        	</select>
			        </div>
			         <div class="md-form mb-4">
			        	<h4>Email</h4>
			          <input type="email"  class="form-control validate" name="email" required="">
			        </div>
			         <div class="md-form mb-4">
			         	<h4>Phone</h4>
			          <input type="text"  class="form-control validate" name="phone" required="">
			        </div>

			      </div>
			      <div class="modal-footer d-flex justify-content-center">
			        <button type="submit" class="btn btn-deep-orange">Order</button>
			      </div>
			    </div>
			</form>
			  </div>
			</div>

			<div class="text">
			  <a href="#" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalRegisterForm">Contact: <?php echo $view_teachers['fulname']; ?></a>
			</div>
				</div>

				<?php endforeach; ?>
			<?php endif; ?>
			</div>
		</div>
	</section>
	<!-- End Services Section Ten -->
			
	<?php require_once 'common/footer.php'; ?>
