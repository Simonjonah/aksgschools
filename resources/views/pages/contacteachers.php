<?php require_once 'common/header.php'; ?>

    <!--End Main Header -->
		<!--Page Title-->
    <section class="page-title" style="background-image:url(<?php echo HOME; ?>images/background/bri2.jpg)">
    	<div class="auto-container">
			<div class="content">
				<h1>BOOK <span>TEACHERS</span></h1>
				<ul class="page-breadcrumb">
					<li><a href="<?php echo HOME; ?>home">Home</a></li>
					<li>Order Teachers</li>
				</ul>
			</div>
        </div>
    </section>
	<!--Page Title-->
    
	
	<!-- Contact Page Section -->
	<section class="contact-page-section">
		<div class="auto-container">
			<div class="inner-container">
				<div class="sec-title centered">
				<h2>Contact <span> our Teachers</span></h2>
				
			</div>
				
				<div class="row clearfix">
					<!-- Info Column -->
					<div class="info-column col-lg-6 col-md-12 col-sm-12">
						<div class="contactform">
							<form method="post" action="" enctype="multipart/form-data">
								<div class="form-group">
									<h5>Full name</h5>
									<input class="form-control" type="text" name="fulname" value="" placeholder="Fullname">
								</div>
								
								<div class="form-group">
									<h5>Phone Number</h5>
									<input class="form-control" type="text" name="phone" value="" placeholder="Phone Number">
								</div>
								
								
								<div class="form-group">
									<h5>Address</h5>
									<input class="form-control" type="text" name="address" value="" placeholder="Address">
								</div>

								<div class="form-group">
									<h5>Passport</h5>
									<input class="form-control" type="file" name="fileToUpload">
								</div>
								<div class="form-group">
									<h5>Course</h5>
									<input class="form-control" type="text" name="course" value="" placeholder="Course">
								</div>
						</div>
					</div>
					
					<!-- Form Column -->
					<div class="form-column col-lg-6 col-md-12 col-sm-12">
						<div class="innercolumn">
							<div class="form-group">
								<h5>Qualifications</h5>
								<input class="form-control" type="text" name="qualification" value="" placeholder="Qualifications">
							</div>
							<div class="form-group">
								<h5>Gender</h5>
								<select class="form-control" name="gender">
									<option>Gender</option>
									<option>Male</option>
									<option>Female</option>
								</select>
							</div>
							<div class="form-group">
									<h5>Email</h5>
									<input class="form-control" type="email" name="email" value="" placeholder="Email">
								</div>
								
								
								<div class="form-group">
									<h5>Password</h5>
									<input class="form-control" type="password" name="password" value="" placeholder="Password">
								</div>
                              <div class="form-group">
								<button type="submit" class="btn btn-success">Submit</button>	
							</div> 
							                                      
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

	
	
	
	<!--Main Footer-->
<?php require_once 'common/footer.php'; ?>