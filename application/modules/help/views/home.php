<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Create simple website using codeigniter</title>
<!-- Bootstrap CSS -->
	   <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.10.2.js"); ?>"></script> 
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
   
     <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>  
</head>
<body>


<nav class="navbar navbar-default " role="navigation">
   
        <div class="navbar-header">
          <a href="" class="navbar-brand"> iFNRI  </a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
         <ul class="nav navbar-nav navbar-right">
	<li>
          <a href="ncs.php" >Nutrition Counseling </a>
        
        </li>
	   <li><a href="<?php echo base_url() ?>fast_tools"> Assessment Tools </a></li>
	     
	    <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Help Tracker <i class="fa fa-caret-down"></i></a>
                    <ul class="dropdown-menu dropdown-user">
                       
                        <li><a href="help_tracker_main.php"><i class="fa fa-sign-in"></i> Try it now! </a>
                        </li>
                      
                       
                    </ul>
                  
        </li>
       <li><a href="events.php"> Events</a></li> 
	   <li><a href="publications.php"> Publications</a></li>
	  
	   
      <li ><a href="contact_us.php"> Contact Us</a></li>
	  
	  
	  	<?php 
		/*
				if(!isset($_SESSION['username'])&& !isset($_SESSION['uid']) || !isset($_SESSION['user_type']) ){
				//echo "  <li ><a href=\"index.php\">Login</a></li>";
				//echo "  <li><a href=\"register.php\">Register</a></li>";
			
		
	  echo "<li class=\"dropdown\">";
			echo	"<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">Login <i class=\"fa fa-caret-down\"></i></a>";
						echo "<ul class=\"dropdown-menu\" style=\"padding: 20px 10px 5px 10px; width:300px;\">";
							
							echo "<li>";
							
							echo "	<form name=\"form1\" id=\"form1\" method=\"POST\" >";
							echo "<fieldset>";
							echo  "<div  id=\"alertlog\" align=\"center\" > </div>";
								echo "<div class=\"form-group\">
										<input type=\"text\" class=\"form-control\" id=\"username\" name=\"username\" placeholder=\"Username\">
									</div>";
								echo "	<div class=\"form-group\">
										<input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" placeholder=\"Password\" >
									</div>";
								
								echo "	<button type=\"submit\" id=\"login\" class=\"btn btn-primary\">Login</button>";
									echo "</fieldset>";
								echo "</form>";
							echo "</li>";
						echo "</ul>";
				echo "</li>";
				
			 }
				else {
					echo "<li class=\"dropdown\"><a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">". $_SESSION['username']." <b class=\"caret\"></b></a>";
  echo "<ul class=\"dropdown-menu\" >";
    		if($_SESSION['user_type']!= 1){
			echo " <li><a href=\"help_tracker/profile.php\"><i class=\"glyphicon glyphicon-user\"></i> Profile</a></li>";	
			} 
			else{
				echo  "<li><a href=\"administrator/pending_requests.php\"><i class=\"fa fa-gear fa-fw\"></i> Admin Panel</a></li> ";
			}
        
		
		echo  "<li><a href=\"logout.php\"><i class=\"fa fa-sign-out fa-fw\"></i> Logout</a></li> ";
			
			echo "</ul></li>";
				}*/
				?>

  

    
      </ul>
	
	  
	 
    </div><!-- /.navbar-collapse -->
   
  <!-- /.container-fluid -->
  </nav>
<div class="carousel slide" id="carousel-329493">
				<ol class="carousel-indicators">
					<li data-slide-to="0" data-target="#carousel-329493">
					</li>
					<li data-slide-to="1" data-target="#carousel-329493">
					</li>
					<li data-slide-to="2" data-target="#carousel-329493" class="active">
				</li>
			

				</ol>
				<div class="carousel-inner">
					<div class="item active">
					
					
						<img alt="Nutrition Counselling" src="<?php echo base_url("assets/images/slide-img-1.png"); ?>" width="100%">
						<div class="carousel-caption" >
					
						<!--<button onclick="location.href = './events.php';" class="btn btn-success "> Set an appointment today!</button>-->	
						</div>
					</div>
					<div class="item">
						<img alt="Fast Tools" src="<?php echo base_url("assets/images/slide-img-2.png"); ?>" width="100%">
						<div class="carousel-caption" >
					<!--	
						<h4 class="caption">Fast Assessment and Screening Tools</h4>
						
						<h5 class="caption">
						Know what your body measurements says about your current nutrition  status.
						</h5>-->
					<!--	<button onclick="window.open('fast/fast_tools.php')"class="btn btn-success"> Try Now!</button>	-->
						
						
						
						
					</div>
					</div>
					
						<div class="item ">
						<img alt="Help Tracker" src="<?php echo base_url("assets/images/slide-img-3.png"); ?>" width="100%">
						<div class="carousel-caption" >
						<!--<h3 class="caption">HELP Tracker</h3>
						
						<h4  class="caption">Take control of your health and nutrition.</h4>-->
						<!--<button onclick="window.open('#')"class="btn btn-success"> Get Started Today!</button>-->
						
						
					</div>
					</div>
					
						<div class="item ">
						<img alt="Publications" src="<?php echo base_url("assets/images/slide-img-4.png"); ?>" width="100%">
						<div class="carousel-caption">
					<!--	<h3  class="caption">Publications</h3>
						
						<h4  class="caption">Free downloadable nutrition tools.</h4>-->
						<!--<button onclick="window.open('#')"class="btn btn-success"> Download Now</button>-->
						
						
					</div>
					</div>
					
						<div class="item ">
						<img alt="Latest Updates" src="<?php echo base_url("assets/images/slide-img-5.png"); ?>" width="100%"><div class="carousel-caption" >
						<!--<h3 class="caption">Latest updates</h3>
						
						<h4 class="caption">Know the latest news in food and nutrition.</h4>-->
						<!--<button onclick="window.open('#')"class="btn btn-success"> Read more</button>-->
						
						
					</div>
					</div>
					
				</div>
				
				 <a class="left carousel-control" href="#carousel-329493" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-329493" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
	

</body>
</html>