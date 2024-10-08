    <section class="hero-wrap js-fullheight" style="background-image: url('<?=base_url();?>assets/resources/images/bg_3.jpg');"  data-section="home" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <center>
              <div class="col-md-12 pt-12 ftco-animate">
                <div class="mt-5 jumbotron" style="opacity: .9; text-align: center;">
                    
                    
                    <span class="subheading" style="font-size: 100%; color: black;">Registration Form:</span>
<!--                    <img id="image_upload_preview1" src="<?=base_url();?>assets/resources/images/logo.png"  alt="Place your Photo Item here" style="width:90%;height:auto"/>-->
                   
                        <div class="row">
                            <div class="col-sm-6">
                                    <div class="form-group ">
                                        <input type="text" name="lname" id="lname"   placeholder="*Last Name" class="form-control  " autofocus="autofocus" value="<?php echo $this->input->post('lname'); ?>"/>
                                    </div>
                                    <div class="form-group ">
                                        <input type="text" name="fname" id="fname" class="form-control  "  placeholder="*First Name" value="<?php echo $this->input->post('fname'); ?>"  />  
                                    </div>
                                    <div class="form-group ">
                                        <input type="text" name="mname" id="mname" class="form-control  "  placeholder="*Middle Name" value="<?php echo $this->input->post('mname'); ?>" />  
                                    </div>
                                    <div class="form-group " >  
                                        <input type="text" name="extn" id="extn" class="form-control  " placeholder="Extension" />  
                                    </div>
                                    <div class="form-group ">
                                        <select  name="gender" id="gender" class="form-control " >
                                            <option value="0">--Select Gender--</option>
                                            <option value="1">Male</option>
                                            <option value="2">Femail</option>
                                        </select>
                                    </div>
                                    <div class="form-group ">
                                        <input type ="date" name="birthday" id ="birthday"  placeholder="*Birthday: (YYYY-MM-DD)"  class="form-control" value="<?php echo $this->input->post('birthday'); ?>"  >
                                    </div>
                            </div>
                            <div class="col-sm-6">
                                    <div class="form-group ">
                                        <input type="text" id="address" name="address" id="address" class="form-control  "  placeholder="*Address" value="<?php echo $this->input->post('address'); ?>" />
                                    </div>
                                    <div class="form-group ">
                                        <input type="tel" id="contact_no" name="contact_no" class="form-control  "  placeholder="*Contact Number" value="<?php echo $this->input->post('contact_no'); ?>" /> 
                                    </div>
                                    <div class="form-group">
                                        <input type="email" id="email_address" name="email_address" class="form-control  "  placeholder="*Email Address" size="30" value="<?php echo $this->input->post('email_address'); ?>" /> 
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Repeat Password">
                                    </div>
                            </div>
                        </div>
                    
                    <p><a href="#" class="btn btn-primary py-3 px-4">Register</a></p>
                    
                    
                </div>
              </div>
            </center>
        </div>  
      </div>
    </section>
      
  	<div class="py-1 navbar-dark top">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"></div>
						    <span class="text"> </span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"></div>
						    <span class="text"> </span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
						    <p class="mb-0 register-link"><a href="#" class="mr-3"> </a><a href="#"> </a></p>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>