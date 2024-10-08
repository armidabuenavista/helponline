<!DOCTYPE html>
<html lang="en">
  <head>
    <title>HELP Online</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url("assets/images/ncs.png"); ?>"/> 
    <link rel="stylesheet" href="<?=base_url();?>assets/resources/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/resources/css/animate.css">
    
    <link rel="stylesheet" href="<?=base_url();?>assets/resources/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/resources/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/resources/css/magnific-popup.css">

    <link rel="stylesheet" href="<?=base_url();?>assets/resources/css/aos.css">

    <link rel="stylesheet" href="<?=base_url();?>assets/resources/css/ionicons.min.css">
    
    <link rel="stylesheet" href="<?=base_url();?>assets/resources/css/flaticon.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/resources/css/icomoon.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/resources/css/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-MH62WL60C7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-MH62WL60C7');
</script>

  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
	    <div class="container-fluid">
	      <a class="navbar-brand" href="https://i.fnri.dost.gov.ph/">iFNRI</a>
	      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav nav ml-auto">
<!--
	          <li class="nav-item"><a href="<?=base_url();?>help/user_index" class="nav-link"><span>Home</span></a></li>
	          <li class="nav-item"><a href="#about-section" class="nav-link"><span>HelpTracker</span></a></li>
	          <li class="nav-item"><a href="#department-section" class="nav-link"><span>Tools</span></a></li>
	          <li class="nav-item"><a href="#doctor-section" class="nav-link"><span>FAQ's</span></a></li>
	          <li class="nav-item"><a href="#blog-section" class="nav-link"><span>Counseling</span></a></li>
              <li class="nav-item cta mr-md-2"><a href="<?=base_url();?>help/login_user" class="nav-link">Log In</a></li>
	          <li class="nav-item cta mr-md-2"><a href="appointment.html" class="nav-link">Register</a></li>
-->
                
                
<!--
              <li class="nav-item"><a href="<?=base_url();?>help/user_index" class="nav-link"><span>Home</span></a></li>
	          <li class="nav-item"><a href="#about-section" class="nav-link"><span>HelpTracker</span></a></li>
	          <li class="nav-item"><a href="#department-section" class="nav-link"><span>Tools</span></a></li>
	          <li class="nav-item"><a href="#doctor-section" class="nav-link"><span>Team</span></a></li>
	          <li class="nav-item"><a href="#blog-section" class="nav-link"><span>Counseling</span></a></li>
	          <li class="nav-item"><a href="<?=base_url();?>help/fel_page" class="nav-link"><span>Food Exchange List (FEL)</span></a></li>
              <li class="nav-item"><a href="<?=base_url();?>help/pingang_pinoy_page" class="nav-link"><span>Pinggang Pinoy</span></a></li>
              <li class="nav-item"><a href="#" class="nav-link"><span>Downloadable Files</span></a></li>
              <li class="nav-item"><a href="<?=base_url();?>help/faq_main_page" class="nav-link"><span>FAQ's</span></a></li>
              <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact Us</span></a></li>
              <li class="nav-item cta mr-md-2"><a href="<?=base_url();?>help/login_user" class="nav-link">Log In</a></li>
	          <li class="nav-item cta mr-md-2"><a href="<?=base_url();?>help/register_user" class="nav-link">Register</a></li>
-->
                
              <li class="nav-item"><a href="<?=base_url();?>help/user_index" class="nav-link"><span>Home</span></a></li>
            <?php $id = $this->session->all_userdata(); if($id['id']!=""){ ?>
	          <li class="nav-item"><a href="<?=base_url();?>help/body_statistics" class="nav-link"><span>HELP Tracker</span></a></li>
              <li class="nav-item"><a href="<?=base_url();?>help/fast_tools_enchance" class="nav-link"><span>Nutrition Calculator</span></a></li>
              <li class="nav-item"><a href="<?=base_url();?>help/nutrition_label_update" class="nav-link"><span>Nutrition Facts</span></a></li>
              <li class="nav-item"><a href="<?=base_url();?>help/fel_page" class="nav-link"><span>Food Exchange Lists</span></a></li>
              <li class="nav-item"><a href="<?=base_url();?>help/pingang_pinoy_page" class="nav-link"><span>Pinggang Pinoy</span></a></li>
              <li class="nav-item"><a href="<?=base_url();?>help/infographics_files" class="nav-link"><span>Downloadable File</span></a></li>
            <?php }else{ ?> 
              <li class="nav-item"><a href="https://i.fnri.dost.gov.ph" class="nav-link"><span>HELP Tracker</span></a></li>
              <li class="nav-item"><a href="https://i.fnri.dost.gov.ph" class="nav-link"><span>Nutrition Calculator</span></a></li>
              <li class="nav-item"><a href="https://i.fnri.dost.gov.ph" class="nav-link"><span>Nutrition Facts</span></a></li>
              <li class="nav-item"><a href="https://i.fnri.dost.gov.ph" class="nav-link"><span>Food Exchange Lists</span></a></li>
              <li class="nav-item"><a href="https://i.fnri.dost.gov.ph" class="nav-link"><span>Pinggang Pinoy</span></a></li>
              <li class="nav-item"><a href="https://i.fnri.dost.gov.ph" class="nav-link"><span>Downloadable File</span></a></li>
            <?php } ?>
<!--
                
              <li class="nav-item"><a href="<?=base_url();?>help/events" class="nav-link"><span>Nutrition Cunseling</span></a></li>
-->
<!--              <li class="nav-item"><a href="<?=base_url();?>help/faq_main_page" class="nav-link"><span>About Us</span></a></li>-->
                
                <?php $id = $this->session->all_userdata(); if($id['id']!=""){ ?>
                
              <li class="nav-item"><a href="<?=base_url();?>help/user_index" class="nav-link"><span><b>Welcome <?=$id['lname'].", ".$id['fname'];?></b></span></a></li>

                <?php }else{ ?> 
                
              <li class="nav-item cta mr-md-2"><a href="https://i.fnri.dost.gov.ph/" class="nav-link">Log In</a></li>
	          <li class="nav-item cta mr-md-2"><a href="https://i.fnri.dost.gov.ph/" class="nav-link">Register</a></li>
                
                <?php } ?>
                
	        </ul>
	      </div>
	    </div>
	  </nav>
      
	  
    <section class="hero-wrap js-fullheight" style="background-image: url('<?=base_url();?>assets/resources/images/bg_3.jpg');" data-section="home" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-6 pt-5 ftco-animate">
          	<div class="mt-5 jumbotron" style="opacity: .8; text-align: center;">
                <img id="image_upload_preview1" src="<?=base_url();?>assets/resources/images/logo.png"  alt="Place your Photo Item here" style="width:90%;height:auto"/>
                <!-- <h1 class="mb-4">We are here <br>for your Health</h1>-->
	            <p class="mb-4" style="color: black; text-align: center; font-size: 120%;"><b>Healthy Eating and Lifestyle Program</b></p>
                <span class="subheading" style="font-size: 100%; color: black;">Let us help you take control of your diet and lifestyle</span>
            </div>
          </div>
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
      
      