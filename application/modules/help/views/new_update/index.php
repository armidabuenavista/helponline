    <section class="ftco-section ftco-no-pt ftco-no-pb" id="department-section">
    	<div class="container-fluid px-0">
    		<div class="row no-gutters">
    			<div class="col-md-4 d-flex">
    				<div class="img img-dept align-self-stretch" style="background-image: url(<?=base_url();?>assets/resources/images/image_6.png);"></div>
    			</div>

    			<div class="col-md-8">
    				<div class="row no-gutters">
                        
    					<div class="col-md-4">
    						<div class="department-wrap p-6 ftco-animate">
    							<div class="text p-2 text-center">
    								<div class="icon">
    									<img src="<?=base_url();?>assets/images/icon/tracker.png" width="20%" height="auto" class="img-circle" alt="User Image">
    								</div>
    								<h3><a href="#">HELP Tracker</a></h3>
    								<p>Personal monitoring tool<br>for weight management</p>
    							</div>
    						</div>
                            
    						<div class="department-wrap p-6 ftco-animate">
    							<div class="text p-2 text-center">
    								<div class="icon">
    									<img src="<?=base_url();?>assets/images/icon/counceling.png" width="20%" height="auto" class="img-circle" alt="User Image">
    								</div>
    								<h3><a href="#">Nutrition Counseling</a></h3>
    								<p>Free nutrition consultation<br>service by DOST-FNRI</p>
    							</div>
    						</div>
    					</div>
                        
                        <div class="col-md-4">
    						<div class="department-wrap p-6 ftco-animate">
    							<div class="text p-2 text-center">
    								<div class="icon">
    									<img src="<?=base_url();?>assets/images/icon/fel.png" width="20%" height="auto" class="img-circle" alt="User Image">
    								</div>
    								<h3><a href="#">Food Exchange Lists</a></h3>
    								<p>Basic nutrition tool<br>for meal planning</p>
    							</div>
    						</div>
                            
    						<div class="department-wrap p-6 ftco-animate">
    							<div class="text p-2 text-center">
    								<div class="icon">
    									<img src="<?=base_url();?>assets/images/icon/calc.png" width="20%" height="auto" class="img-circle" alt="User Image">
    								</div>
    								<h3><a href="#">Nutrition Calculators</a></h3>
    								<p>Assess nutritional risks<br>and status of individual</p>
    							</div>
    						</div>
    					</div>

    					<div class="col-md-4">
    						<div class="department-wrap p-6 ftco-animate">
    							<div class="text p-2 text-center">
    								<div class="icon">
    									<img src="<?=base_url();?>assets/images/icon/download.png" width="20%" height="auto" class="img-circle" alt="User Image">
    								</div>
    								<h3><a href="#">Downloadable Files</a></h3>
    								<p>Free nutrition counseling<br>posters and brochures</p>
    							</div>
    						</div>
                            
    						<div class="department-wrap p-6 ftco-animate">
    							<div class="text p-2 text-center">
    								<div class="icon">
    									<img src="<?=base_url();?>assets/images/icon/pingan.png" width="20%" height="auto" class="img-circle" alt="User Image">
    								</div>
    								<h3><a href="#">Pinggang Pinoy</a></h3>
    								<p>A healthy plate for a<br>well-nourished nation</p>
    							</div>
    						</div>
    					</div>

                        
    				</div>
    			</div>
    		</div>
    	</div>
    </section>	


        <section class="ftco-facts img ftco-counter" style="background-image: url(<?=base_url();?>assets/resources/images/bg_3.jpg);">
			<div class="overlay"></div>
			<div class="containery" style="padding-left: 5%; padding-right: 5%;">
				<div class="row d-flex align-items-center">   
                    <div class="col-md-12 heading-section heading-section-white">
                        <h2 style="color: white;" class="mb-4">Nutrition Counseling Service</h2>
                        <h3 style="color: white;">Talk with our Registered Nutritionist Dietitians for free and get personalized nutrition advices</h3>
                    </div>
                    <div class="col-md-8">
                        <form id="add_data_pro" method="post" class="form-horizontal" role="form" action="<?=base_url(); ?>help/counseling_record">
                            <div class="row">
                                <div class="col-md-6">
                                        <label for="title" class="control-label">First Name: </label>
                                        <input type="text" name="fname" required id="fname" class="form-control" placeholder="Enter First Name">

                                        <label for="title" class="control-label">Last Name: </label>
                                        <input type="text" name="lname" required id="lname" class="form-control" placeholder="Enter Last Name">
                                    
                                        <label for="title" class="control-label">Type of Counseling:</label>
                                        <select name="type_counceling" class="form-control">
                                            <option value="0">Select type of request</option>
                                            <option value="1">Individual nutrition counseling</option>
                                            <option value="2">Group nutrition conseling</option>
                                            <option value="3">Other nutrition counseling-related inquiries</option>
                                        </select>
                                    
                                        <label for="title" class="control-label">Phone Number: </label>
                                        <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" min="0" type='text' maxlength="11" name="phone_no" required class="form-control" id="phone_no" placeholder="Enter Phone Number">
                                </div>
                                <div class="col-md-6">
                                        <label for="title" class="control-label">Email Address: </label>
                                        <input type="text" name="email" required id="email" class="form-control" placeholder="Enter Email Address">
                                    
                                        <label for="title" class="control-label">Date of Counsel: </label>
                                        <input type="date" name="date_counsel" required id="date_counsel" class="form-control" placeholder="Enter Date of Counsel">
                                    
                                        <label for="title" class="control-label">Time Start: </label>
                                        <input type="time" name="time_in" required id="time_in" class="form-control" placeholder="Enter Time Start:">
                                    
                                        <label for="title" class="control-label">Time End: </label>
                                        <input type="time" name="time_out" required id="time_out" class="form-control" placeholder="Enter Time End:">
                                    
                                </div>
                            </div>
                            <center><br>
                                    <textarea name="message" id="message" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
                            <br></center>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="submit" value="Book an Appointment" class="btn btn-secondary py-3 px-5">
                                        </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </form>
                    </div>
            <?php
                $this->load->model('mdl_help', '', TRUE);
                $table_sub_data="tbl_data_counseling";
                $no_of_user = 0;
                foreach ($this->load->mdl_help->get_data($table_sub_data) as $value){ $no_of_user = $no_of_user+($value->hits); }
            ?>
					<div class="col-md-4">
						<div class="row pt-3">
                                <div class="block-18">
                                  <div class="text">
                                    <img src="<?=base_url();?>assets/images/ncs.png" width="40%" height="auto" class="img-circle" alt="User Image">
                                    <strong style="font-size: 1000%;" class="number" data-number="<?=$no_of_user;?>">0</strong>
                                    <span style="font-size: 100%;">The total number of clients we have encouraged to eat a healthy diet and live an active lifestyle</span>
                                  </div>
                                </div>
                          </div>
					</div>
				</div>
			</div>
		</section>
		</section>


    <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
    	<div class="containery" style="padding: 3%;">
            <div class="row">
<!--
                <div class="col-sm-3">
                    <center><img class="center-block" style="width: 80%; height: auto;" src="<?php echo base_url('assets/images/fast/bmi_female-1.svg'); ?>" alt="Fitness Img" /></center>
                </div>
                <div class="col-sm-3">
                    <center><img class="center-block" style="width: 80%; height: auto;" src="<?php echo base_url('assets/images/fast/bmi_male-2.svg'); ?>" alt="Fitness Img" /></center>
                </div>
-->
                <div class="col-sm-7">
                    <center><img class="center-block" style="width: 80%; height: auto;" src="<?php echo base_url('assets/resources/images/HELP Tracker Image.jpg'); ?>" alt="Fitness Img" /></center>
                </div>
                <div class="col-sm-5">
                    <div class="col-md-12 heading-section ftco-animate p-4 p-lg-5">
                        <h2 class="mb-4">HELP <span>Tracker</span></h2>
                        <p>
                            A personal monitoring tool that will help you in achieving your personal weight goals.<br><br>
                            Using the different features of the HELP Tracker, you can easily record your...<br><br>
                            <b><span style="font-size: 150%;">&#10003;</span></b>Body measurements like weight, waist and hip circumtance<br>
                            <b><span style="font-size: 150%;">&#10003;</span></b> Daily food intake with calorie and macronutrient reports<br>
                            <b><span style="font-size: 150%;">&#10003;</span></b> Calories burned from reported physical activities<br>
                            <b><span style="font-size: 150%;">&#10003;</span></b> And a lot more...!<br>
                        </p><br>
<!--
                        by using the HELP Tracker tool.<br><br>
                        Too learn more, click here...<br><br>
-->
                        <p><a href="#" class="btn btn-primary py-3 px-4">Start Monitoring Today</a></p>
                    </div>
                </div>
            </div>
            
            
            
<!--
    		<div class="row d-flex">
    			<div class="col-md-6 col-lg-6 d-flex">
    				<div class="img d-flex align-self-stretch align-items-center" style="background-image:url(<?=base_url();?>assets/resources/images/about.png);"></div>
                </div>
            </div>
    			<div class="col-md-6 col-lg-6 pl-lg-5 py-md-5">
    				<div class="py-md-5">
	    				<div class="row justify-content-start pb-3">
			          <div class="col-md-12 heading-section ftco-animate p-4 p-lg-5">
                        <h2 class="mb-4">HELP <span>Tracker</span></h2>
			            <p>
                            Stay fcused in achieving your nutrition and health goals!<br><br>
                            Record and monitor your <br><br>
                            <b>1.</b> Login to the site.<br>
                            <b>2.</b> Click the set an appointment button under the calendar in the home page of the website or go to the Events page and choose the date.<br>
                            <b>3.</b> Fill up the required details in the request form.<br>
                            <b>4.</b> Click Submit button.<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A notification message will appear if you have successfully submitted your request for a nutrition counseling appointment. All requests will be processed within 7 working days. You will then receive a confirmation email containing the status (confirmed or not confirmed) of your request and the name of the RND who will assess and counsel you.
                            In special arrangements like big group or company nutrition assessments and counseling, please include the details of the event or request in the message box.
                        </p>
			            <p><a href="#" class="btn btn-primary py-3 px-4">Make an appointment</a> <a href="#" class="btn btn-secondary py-3 px-4">Contact us</a></p>
			            <h2 class="mb-4">Set an <span>Appointment</span> with an in-house <span>RND</span></h2>
			            <p>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You need to be a registered member in the Nutrition Counseling website before you can schedule an appointment with us.
                            The following steps are needed in order for your request to be processed:<br>
                            <b>1.</b> Login to the site.<br>
                            <b>2.</b> Click the set an appointment button under the calendar in the home page of the website or go to the Events page and choose the date.<br>
                            <b>3.</b> Fill up the required details in the request form.<br>
                            <b>4.</b> Click Submit button.<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A notification message will appear if you have successfully submitted your request for a nutrition counseling appointment. All requests will be processed within 7 working days. You will then receive a confirmation email containing the status (confirmed or not confirmed) of your request and the name of the RND who will assess and counsel you.
                            In special arrangements like big group or company nutrition assessments and counseling, please include the details of the event or request in the message box.
                        </p>
			            <p><a href="#" class="btn btn-primary py-3 px-4">Make an appointment</a> <a href="#" class="btn btn-secondary py-3 px-4">Contact us</a></p>
			          </div>
			        </div>
		        </div>
	        </div>
-->
    	</div>
    </section>


<!--
        <section class="ftco-intro img" style="background-image: url(<?=base_url();?>assets/resources/images/bg_2.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-9 text-center">
						<h2>HELP TRACKER</h2>
						<p>Trying to keep up with your resolution to lose weight and stay physically active? Use the HELP Tracker to take note of the foods you ate and activities you have done on a daily basis. Stay on the right track with the use of your daily progress charts on your weight, BMI, food intake and physical activity to keep you focused in reaching your goals. Essential tips and advices on nutrition and physical activity will also be available to assist you in attaining and maintaining your desirable body weight and balanced diet.<br>The Nutrition Counseling Services (NCS) of the Food and Nutrition Research Institute (FNRI) is a frontline assistance program on nutrition assessment and management of Non-Communicable Diseases (NCDs) to the public. Self-assisted online applications, downloadable publications and hands-on service through personal counseling sessions are offered here to encourage everyone to learn and practice a healthy lifestyle.</p>
						<p class="mb-0"><a href="#" class="btn btn-white px-4 py-3">Start your way</a></p>
					</div>
				</div>
			</div>
		</section>
-->

<!--
		<section class="ftco-section" id="doctor-section">
			<div class="container-fluid px-5">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4">Nutrition Counseling Service Team</h2>
            <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
          </div>
        </div>	
				<div class="row">
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="width: 100%; height: auto; background-image: url(<?=base_url();?>assets/images/avatar1.png);"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3 class="mb-2">Dr. Lloyd Wilson</h3>
								<span class="position mb-2">Neurologist</span>
								<div class="faded">
									<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
									<ul class="ftco-social text-center">
                                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                        <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                                    </ul>
                                  <p><a href="#" class="btn btn-primary">Book now</a></p>
                                </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="width: 100%; height: auto; background-image: url(<?=base_url();?>assets/images/avatar2.png);"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3 class="mb-2">Dr. Rachel Parker</h3>
								<span class="position mb-2">Ophthalmologist</span>
								<div class="faded">
									<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
									<ul class="ftco-social text-center">
                                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                                  </ul>
                                  <p><a href="#" class="btn btn-primary">Book now</a></p>
                                </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="width: 100%; height: auto; background-image: url(<?=base_url();?>assets/images/avatar1.png);"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3 class="mb-2">Dr. Ian Smith</h3>
								<span class="position mb-2">Dentist</span>
								<div class="faded">
									<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
									<ul class="ftco-social text-center">
                                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                                  </ul>
                                  <p><a href="#" class="btn btn-primary">Book now</a></p>
                                </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="width: 100%; height: auto; background-image: url(<?=base_url();?>assets/images/avatar2.png);"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3 class="mb-2">Dr. Alicia Henderson</h3>
								<span class="position mb-2">Pediatrician</span>
								<div class="faded">
									<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
									<ul class="ftco-social text-center">
                                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                                  </ul>
                                  <p><a href="#" class="btn btn-primary">Book now</a></p>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
-->

<!--
    <section class="ftco-section bg-light" id="blog-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-10 heading-section text-center ftco-animate">
            <h2 class="mb-4">Nutrition Counseling Services</h2>
            <p>You can change everything and gain control of your health and lifestyle now. Start by knowing what your body measures mean with the Fast Assessment and Screening Tools. Track your food intake and physical activity with our HELP Tracker.</p>
          </div>
        </div>
        <div class="row d-flex">
            
            
            
            <?php
                $table="tbl_data_counseling";
                foreach ($this->load->mdl_help->get_data($table) as $value) {
                   $gender="avatar1.png";
                   if($value->gender==2){
                       $gender="avatar2.png";
                   }
                
            ?>
        
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('<?=base_url();?>assets/images/counseling/<?=$value->images;?>');">
              </a>
              <div class="text d-block">
                <h3 class="heading"><a href="#"><?=$value->title;?></a></h3>
                <p><?=$value->description;?></p>
                <center><p><a href="blog-single.html" class="btn btn-primary py-2 px-3"><b style="font-size: 140%;"><?=$value->hits;?></b> Participants</a></p></center>
              </div>
            </div>
          </div>
            
            <?php } ?>

            
        </div>
      </div>
    </section>
-->

    <section class="ftco-section testimony-section img" style="background-image: url(<?=base_url();?>assets/resources/images/bg_3.jpg);">
    	<div class="overlay"></div>
      <div class="container-fluid" style="padding-left: 5%; padding-right: 5%;">
        <div class="row justify-content-center pb-3">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
          	<span class="subheading">Read testimonials</span>
            <h2 class="mb-4">Because your words inspire us, we hope that it will also motivate others as well.</h2>
          </div>
        </div>
        <div class="row ftco-animate justify-content-center">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
                
                
            <?php
                $table="tbl_feedback_data";
                foreach ($this->load->mdl_help->get_data($table) as $value) {
                   $gender="avatar1.png";
                   if($value->gender==2){
                       $gender="avatar2.png";
                   }
                
            ?>
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
<!--
                  <div class="user-img" style="background-image: url(<?=base_url();?>assets/images/<?=$gender;?>)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
-->
                  <div class="text px-4">
                    <p style="font-size: 150%;" class="name"><?=$value->message;?></p>
                    <p class="mb-4"><?=$value->date;?></p>
                      
<!--
                    <p style="font-size: 150%;" class="name"><?=$value->name;?></p>
                    <p class="mb-4"><?=$value->message;?></p>
                    <p class="position"><?=$value->date;?></p>
-->
                  </div>
                </div>
              </div>
            <?php } ?>
                
                
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light" id="blog-section">
      <div class="container-fluid" style="padding-left: 10%; padding-right: 10%;">
        <div class="row justify-content-center pb-3">
          <div class="col-md-10 text-center heading-section heading-section-white ftco-animate">
              <!-- <span class="subheading">Read testimonials</span>-->
            <h2 class="mb-6" style="color: black;">See who availed our services</h2>
            <h3>Partner with us in promoting good nutrition and healthy lifestyle in your workplace and community.</h3>
          </div>
        </div>
        <div class="row ftco-animate justify-content-center">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
                
                
            <?php
                $this->load->model('mdl_help', '', TRUE);
                $table="tbl_data_counseling";
                foreach ($this->load->mdl_help->get_data($table) as $value) {
                   $gender="avatar1.png";
                   if($value->gender==2){
                       $gender="avatar2.png";
                   }
                
            ?>
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  
                      <img src="<?=base_url();?>assets/images/counseling/<?=$value->images;?>" width="70px" height="300px" class="img-circle" alt="User Image">
                    
                  <div class="text px-4">
                    <p class="mb-4" style="color: black;"><?=$value->description;?></p>
                    <p class="name" style="color: black;"><?=$value->title;?></p>
                    <span class="position" style="font-size: 140%; color: black;"><b><?=$value->hits;?></b> Participants</span>
                    <p class="name" style="color: black;"><?=$value->event_date;?></p>
                  </div>
                </div>
              </div>
            <?php } ?>
                
                
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section" id="contact-section">
      <div class="containery" style="padding-left: 10%; padding-right: 10%;">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Contact Us</h2>
            <p>Nutrition Counseling Clinic (Room 208) 2nd Floor, FNRI Building</p>
          </div>
        </div>
          <div class="row">
<!--
              <div class="col-sm-6"><center><img src="<?=base_url();?>assets/images/team.jpeg" width="100%" height="auto" class="img-circle" alt="User Image"><h2 class="mb-4"><br><b>Meet our Team</b></h2></center></div>
              <div class="col-sm-6">
-->
                <div class="row d-flex contact-info mb-5">
                  <div class="col-md-3 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center bg-light">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-map-signs"></span>
                        </div>
                        <h3 class="mb-4">Address</h3>
                        <p>Nutrition Counseling Clinic Room 208 (2nd Floor), FNRI Building., DOST Compound, General Santos Avenue, Bicutan, Taguig City 1633</p>
                      </div>
                  </div>
                  <div class="col-md-3 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center bg-light">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-phone2"></span>
                        </div>
                        <h3 class="mb-4">Contact Number</h3>
                        <p><a href="tel://8837-2071 local 2299">8837-2071 local 2299</a></p>
                      </div>
                  </div>
                  <div class="col-md-3 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center bg-light">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-paper-plane"></span>
                        </div>
                        <h3 class="mb-4">Email Address</h3>
                        <p><a href="mailto:ncsfnri@gmail.com">ncsfnri@gmail.com</a></p>
                      </div>
                  </div>
                  <div class="col-md-3 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center bg-light">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-globe"></span>
                        </div>
                        <h3 class="mb-4">Website</h3>
                        <p><a href="http://helponline.fnri.doft.gov.ph/helponline/">http://helponline.fnri.dost.gov.<br>ph/helponline/</a></p>
                      </div>
                  </div>
                </div>
<!--              </div>-->
          </div>
        
<!--
        <div class="row no-gutters block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="#" class="bg-light p-5 contact-form">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-secondary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-6 d-flex">
          	<style>
            #map {
                width: 100%;
                height: 550px;
            }
            </style>

            <div id="map"></div>

            <script>
              function initMap() {

                var chicago = new google.maps.LatLng(14.282073484507272, 121.01895391595292);

                var map = new google.maps.Map(document.getElementById('map'), {
                  center: chicago,
                  zoom: 13

                });

                var coordInfoWindow = new google.maps.InfoWindow();
                coordInfoWindow.setContent(createInfoWindowContent(chicago, map.getZoom()));
                coordInfoWindow.setPosition(chicago);
                coordInfoWindow.open(map);

                map.addListener('zoom_changed', function() {
                  coordInfoWindow.setContent(createInfoWindowContent(chicago, map.getZoom()));
                  coordInfoWindow.open(map);
                });
              }

              var TILE_SIZE = 150;

              function createInfoWindowContent(latLng, zoom) {
                var scale = 1 << zoom;

                var worldCoordinate = project(latLng);

                var pixelCoordinate = new google.maps.Point(
                    Math.floor(worldCoordinate.x * scale),
                    Math.floor(worldCoordinate.y * scale));

                var tileCoordinate = new google.maps.Point(
                    Math.floor(worldCoordinate.x * scale / TILE_SIZE),
                    Math.floor(worldCoordinate.y * scale / TILE_SIZE));

                return [
                  'Details: DOST FNRI',
                  'Latitude: 14.282073484507272',
                  'Longitude: 121.01895391595292'
                ].join('<br>');
              }

              // The mapping between latitude, longitude and pixels is defined by the web
              // mercator projection.
              function project(latLng) {
                var siny = Math.sin(latLng.lat() * Math.PI / 180);

                // Truncating to 0.9999 effectively limits latitude to 89.189. This is
                // about a third of a tile past the edge of the world tile.
                siny = Math.min(Math.max(siny, -0.9999), 0.9999);

                return new google.maps.Point(
                    TILE_SIZE * (0.5 + latLng.lng() / 360),
                    TILE_SIZE * (0.5 - Math.log((1 + siny) / (1 - siny)) / (4 * Math.PI)));
              }
            </script>

            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBD5TONxgsx86_zK3A5uRhe8YL4USivhfA&callback=initMap"
            async defer></script>
          </div>
        </div>
-->
      </div>
    </section>