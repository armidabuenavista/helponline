<nav class="navbar navbar-default " role="navigation">
   
        <div class="navbar-header">
          <a href="<?=base_url();?>" class="navbar-brand"> HELP  </a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
         <ul class="nav navbar-nav navbar-right">
	   
             
<!--            <li><a href="<?=base_url();?>help/questionnaire">Questionnaire</a></li>-->
            <li><a href="<?=base_url();?>help/counseling_main">Nutrition Counseling</a></li>
            <li><a href="<?=base_url();?>help/fct_main">FCT Food Item</a></li>
            <li><a href="<?=base_url();?>help/ptri_admin">GH4D Baseline</a></li>
            <li><a href="<?=base_url();?>help/history_main">Crossword CMS</a></li>
                
               <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Home CMS <i class="fa fa-caret-down"></i></a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?=base_url();?>help/faq_main">FAQ's Main</a></li>
                        <li><a href="<?=base_url();?>help/fel_intro">FEL Intro</a></li>
                        <li><a href="<?=base_url();?>help/fel_cat">FEL List Category</a></li>
                        <li><a href="<?=base_url();?>help/fel_items">FEL List Content</a></li>
                        <li><a href="<?=base_url();?>help/fel_app_true">FEL Appendices True Group</a></li>
                        <li><a href="<?=base_url();?>help/fel_app_category">FEL Appendices Category</a></li>
                        <li><a href="<?=base_url();?>help/fel_app_content">FEL Appendices Content</a></li>
                        <li><a href="<?=base_url();?>help/pingang_pinoy_intro">Pingang Pinoy Intro</a></li>
                        <li><a href="<?=base_url();?>help/meal_plan">Pingang Pinoy Meal Plan</a></li>
<!--
                        <li><a href="<?=base_url();?>help/home_data">Home</a></li>
                        <li><a href="<?=base_url();?>help/tools_data">Tools</a></li>
                        <li><a href="<?=base_url();?>help/tracker_data">Tracker</a></li>
-->
                    </ul>
                </li>
             
               <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Puzzle <i class="fa fa-caret-down"></i></a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?=base_url();?>help/cat1">Carbohydrates</a></li>
                        <li><a href="<?=base_url();?>help/cat2">Protein</a></li>
                        <li><a href="<?=base_url();?>help/cat3">Lifestyle and Overall Health</a></li>
                        <li><a href="<?=base_url();?>help/cat4">Vegetables</a></li>
                    </ul>
                </li>
             
	  
	   
      <li ><a href="<?=base_url() ?>help/contact_us"> Contact Us</a></li>
	  
	  
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
	
	  
	 
    </div>
   

  </nav>
  
  
  
  
 