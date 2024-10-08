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
          <a href="http://i.fnri.dost.gov.ph/" class="navbar-brand"> iFNRI  </a>
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
	   <li><a href="fast_tools.php"> Assessment Tools </a></li>
	     
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


</body>
</html>