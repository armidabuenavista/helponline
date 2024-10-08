    <!-- SIDEBAR -->
        <div class="sidebar-menu hidden-xs hidden-sm">
            <div class="top-section">
                <div class="profile-image">
       	<?php 
							if(isset($_SESSION['logged_in'])){
							
							//$a=base_url('assets/images/client_photos/'.$photo.'');
							
								//echo $photo;
							/*if($photo == 0){
								$a= base_url("assets/images/client_photos/no_photo.png");
								echo "<img src=\"$a\" alt=\"Profile\" class=\"img-circle\" width=\"100%\" height=\"100%\">";

						
							}
							else{
								$a= base_url("assets/images/client_photos/$photo");
								echo "<img src=\"$a\" alt=\"Profile\" class=\"img-circle\" width=\"100%\" height=\"100%\">";

					
							}*/
							$a= base_url("assets/images/client_photos/$photo");
							echo "<img src=\"$a\" alt=\"Profile\" class=\"img-circle\" width=\"100%\" height=\"100%\">";

					
							}
							
							?>
						
                </div>
                <h3 class="profile-title"> 	<?php
						if(isset($_SESSION['logged_in'])){
							
							echo "Welcome back, " . $this->session->username;
							}
							
						
						
						?></h3>
				
                <p class="profile-description"></p>
            </div> <!-- top-section -->
            <div class="main-navigation">
                <ul >
				<li><a href="<?php echo base_url() ?>help/help_tracker"><i class="glyphicon glyphicon-home"></i> Home </a></li>
				<li><a href="<?php echo base_url() ?>help/events"><i class="glyphicon glyphicon-calendar"></i> Set appointment </a></li>
                <li><a href="<?php echo base_url() ?>help/profile"><i class="glyphicon glyphicon-user"></i> Profile </a></li>
					
				<li><a href="<?php echo base_url() ?>help/body_statistics"><i class="glyphicon glyphicon-scale"></i> Body Statistics </a></li>
				<li><a href="<?php echo base_url() ?>help/pa_tracker"><i class="glyphicon glyphicon-dashboard "></i> PA Tracker </a></li>
					
				<li><a href="<?php echo base_url() ?>help/foodtracker"><i class="glyphicon glyphicon-cutlery"></i> Food Tracker </a></li>
				<li><a href="<?php echo base_url() ?>help/summary"><i class="glyphicon glyphicon-file"></i> Summary (UNDER CONSTRUCTION) </a></li>
				
				<li><a href="<?php echo base_url() ?>help/logout"><i class="fa fa-sign-out fa-fw"></i>Logout</a></li>
                </ul>
            </div> <!-- .main-navigation -->
        <!-- <div class="social-icons">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
          
                </ul>
            </div>--> <!-- .social-icons -->
        </div> <!-- .sidebar-menu -->
<div class="responsive-header visible-xs visible-sm " >
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="top-section">
                            <div class="profile-image">
							<?php 
							if(isset($_SESSION['logged_in'])){
						
							
							
							//$a=base_url('assets/images/client_photos/'.$photo.'');
							
						$a= base_url("assets/images/client_photos/$photo");
							echo "<img src=\"$a\" alt=\"Profile\" class=\"img-circle\" width=\"100%\" height=\"100%\">";

					
							}
							
							?>
						
                              
                            </div>
                            <div class="profile-content">
                      <h3 class="profile-title">
					  	<?php
						if(isset($_SESSION['logged_in'])){
							
							echo "Welcome back, " . $this->session->username;
							}
							
						
						
						?>
						
						
					  </h3>
					   <p class="profile-description"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="toggle-menu"><i class="fa fa-bars"></i></a>
                <div class="main-navigation responsive-menu">
                    <ul >
				<li><a href="<?php echo base_url() ?>help/help_tracker"><i class="glyphicon glyphicon-home"></i> Home </a></li>
				<li><a href="<?php echo base_url() ?>help/events"><i class="glyphicon glyphicon-calendar"></i> Set appointment </a></li>
                <li><a href="<?php echo base_url() ?>help/profile"><i class="glyphicon glyphicon-user"></i> Profile </a></li>
					
				<li><a href="<?php echo base_url() ?>help/body_statistics"><i class="glyphicon glyphicon-scale"></i> Body Statistics </a></li>
				<li><a href="<?php echo base_url() ?>help/pa_tracker"><i class="glyphicon glyphicon-dashboard "></i> PA Tracker </a></li>
					
				<li><a href="<?php echo base_url() ?>help/foodtracker"><i class="glyphicon glyphicon-cutlery"></i> Food Tracker </a></li>
				<li><a href="<?php echo base_url() ?>help/summary"><i class="glyphicon glyphicon-file"></i> Summary </a></li>
				
				<li><a href="<?php echo base_url() ?>help/logout"><i class="fa fa-sign-out fa-fw"></i>Logout</a></li>
                </ul>
                </div>
            </div>
        </div>

    
        