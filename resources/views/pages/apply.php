
<?php require_once 'common/header.php'; ?>
    <!--End Main Header -->

	<!--Page Title-->
   <!--  <section class="page-title" style="background-image:url(<?php echo HOME; ?>images/background/bri2.jpg)">
    	<div class="auto-container">
			<div class="content">
				<h1>Apply<span> For Programme</span></h1>
				<ul class="page-breadcrumb">
					<li><a href="<?php echo HOME; ?>home">Home</a></li>
					<li>Apply foy Programme</li>
				</ul>
			</div>
        </div>
    </section> -->
    <!--End Page Title-->

    	 <section class="contact-page-section" style="margin-top: 50px; margin-bottom: 50px;">
            <div class="auto-container">
              <div class="inner-container">
              	<div class="sec-title centered">
				<h2>MYSCHOOL.AFRICA</h2>
				<p>41 Ikot Ekpene, Uyo Akwa Ibom State, Nigeria</p>
				<img style="width: 150px; height: 94px; margin-top: -35px;" src="images/logo.jpg">
			</div>
                <div class="row clearfix">

                  <!-- Info Column -->
                    <div class="info-column col-lg-6  col-md-6 col-md-12 col-sm-12">
                      <div class="contactform">
                        <form method="post" action="" enctype="multipart/form-data">

                          <div class="form-group">
                            <h5>First Name</h5>
                            <input class="form-control" type="text" name="firstname" value="" placeholder="First Name">
                          </div>

                          <div class="form-group">
                            <h5>Other Names</h5>
                            <input class="form-control" type="text" name="othername" value="" placeholder="Other Names">
                          </div>

                            <div class="form-group">
                              <h5>Email</h5>
                              <input class="form-control" type="email" name="email" value="" placeholder="Email">
                            </div>
                        	
                          <div class="form-group">
                              <h5>Phone Number</h5>
                              <input class="form-control" type="text" name="phone" value="" placeholder="Phone Number">
                          </div>
                           <div class="form-group">
                            <h5>Confirm Phone Number</h5>
                              <input class="form-control" type="text" name="password" value="" placeholder="Confirm Phone Number">
                          </div>

                          <div class="form-group">
                            <h5>Address </h5>
                              <input class="form-control" type="text" name="address" value="" placeholder="Address">
                          </div>               
                          
                        </div>
                      </div>

                            <!-- Form Column -->
                      <div class="info-column col-lg-6  col-md-6 col-md-12 col-sm-12">
                         <div class="innercolumn">
                          
                          <div class="form-group">
                            <h5>Select Programme</h5>
                              <select class="form-control" name="course">
                              	<option>Select Programme</option>
                              	<option>Infotech</option>
                              	<option>Computer Hardware</option>
                              	<option>Software Engineering</option>
                              	<option>Digital Marketing</option>
                              	<option>Networking Engineering</option>
                              	<option>System Security</option>
                              	<option>Mobile Technology</option>
                              	<option>Enterpreneurship</option>

                              </select>
                          </div>

                          <div class="form-group">
                            <h5>Emergency Contact Person</h5>
                              <input class="form-control" type="text" name="eme_address" value="" placeholder="Emergency Address">
                          </div>
                          
                          
                          <div class="form-group">
                            <h5>Emergency Phone </h5>
                              <input class="form-control" type="text" name="eme_phone" value="" placeholder="Emergency Phone Number" required="">
                          </div>
                           <div class="form-group">
                            <h5>Gender</h5>
                            <select class="form-control" name="gender" required="">
                              <option>Select Gender</option>
                              <option>Male</option>
                              <option>Female</option>
                            </select>
                          </div>
 
                           <div class="form-group">
                              <h5>Upload Passpot</h5>
                              <input type="file" name="fileToUpload">
                            </div>

                            <div class="form-group">
                            <h5>Terms & Condition</h5>
                           	<input type="checkbox" name="terms" required=""> <span>By ticking this box you accept our Term and Condition</span>
                          </div>


                            <button type="submit" class="btn btn-success">Submit</button>

                          </div>

                        </form>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </section>





<?php require_once 'common/footer.php'; ?>
