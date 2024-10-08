<nav class="navbar navbar-default " role="navigation">
   
        <div class="navbar-header">
          <a href="<?=base_url('admin/help/site_stats');?>" class="navbar-brand"> HELP  </a>
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
<!--            <li><a href="<?=base_url();?>help/ptri_admin">GH4D Baseline</a></li>-->
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
             
	  
             
             
             
             
             
             
             
             
             
             
             
             
             
             
             
             
             
             
             
             
             
             
             
             
             
             
             
	   
          <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-book fa-database"></i> CMS <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li>
                <a href="<?=base_url();?>admin/help/data_entry"><i class="fa fa-briefcase fa-circle"></i> Data Entry</a>
            </li>
            <li>
                <a href="<?=base_url();?>admin/help/data_feedback"><i class="fa fa-briefcase fa-circle"></i> Feedback</a>
            </li>
        </ul>
    </li>
             
             
   <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                       <i class="fa fa-book fa-fw "></i> Appointments <i class="fa fa-caret-down"></i>
                    </a>
            <ul class="dropdown-menu dropdown-user">
             <li>
                          
                             
                                   <?php
$user_type_id = $this->session->user_type_id;
$x            = base_url('admin/help/pending_requests');
$y            = base_url('admin/help/confirmed_requests');
if ($user_type_id == 1) {
        echo "<li ><a href=\"$x\">Pending Requests</a> </li>";
        $text = "Confirmed Requests";
        echo "<li class=\"divider\"></li>";
} else {
        $text = "My Clients";
}
echo "<li ><a href=\"$y\">" . $text . "</a></li>";
?>
            
                         
                           
                          
                        </li>
            </ul>
          
         </li>
            <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                       <i class="fa fa-user fa-fw "></i> Users <i class="fa fa-caret-down"></i>
                    </a>
            <ul class="dropdown-menu dropdown-user">
             <li>
                      
                            <?php
if ($user_type_id == 1) {
        $z            = base_url('admin/help/users');
        $user_db_link = "<li>
                                    <a href=\"$z\"> Users Database</a>
                                </li><li class=\"divider\"></li>";
} else {
        $user_db_link = '';
}
echo $user_db_link;
echo " <li>
            
                                    <a href=\"add_user.php\">Add User</a>
                                </li>
                             
                       
              
              
              
                        </li>";
?>
            
                         
                           
                         
                        </li>
            </ul>
          
         </li>

          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                       <i class="fa fa-calendar fa-fw "></i> Events <i class="fa fa-caret-down"></i>
                    </a>
            <ul class="dropdown-menu dropdown-user">
             <li>
                      
                       <li>
                                    <a href="<?php
echo base_url('admin/help/event_calendar');
?>">Event Calendar</a>
                                </li>
                         
                           
                         
                        </li>
            </ul>
          
         </li>
         
         
            <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                       <i class="fa fa-database fa-fw "></i> Databases <i class="fa fa-caret-down"></i>
                    </a>
            <ul class="dropdown-menu dropdown-user">
             <li>
                      
                    <li>
                       <?php
$zz = base_url('admin/help/default_nutrition_plan');
?>
                                    <a href="<?php
echo $zz;
?>">Default Meal Plan</a>
                                </li>
                
                <li class="divider"></li>
                                <li>
                                 <?php
$xx = base_url('admin/help/fooditems');
?>
                                    <a href="<?php
echo $xx;
?>">Fooditems</a>
                                </li>
                         
                           
                         
                        </li>
            </ul>
          
         </li>
               <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i><sup><?php
echo $numRows;
?> </sup><i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                        <?php
$q = base_url('admin/help/pending_requests');
?>
                            <a href="<?php
echo $q;
?>">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i><strong>Pending Requests Found</strong> (<?php
echo $numRows;
?>)
                         
                                </div>
                            </a>
                        </li>
                     
                      </ul>
                  
                         
                        </li>


                     <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-comments-o fa-fw"></i><sup><?php
echo $numRows0;
?> </sup><i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                        <?php
$q = base_url('admin/help/comments');
?>
                            <a href="<?php
echo $q;
?>">
                                <div>
                                    <i class="fa fa-comments-o fa-fw"></i><strong>Comments</strong> (<?php
echo $numRows0;
?>)
                         
                                </div>
                            </a>
                        </li>
                     
                      </ul>
                  
                         
                        </li>  


 

       
      <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php
if (isset($_SESSION['logged_in']))
   $a= base_url("assets/images/client_photos/$photo");
                      
        echo "Welcome back, " . $this->session->username." "."<img src=\"$a\" alt=\"Profile\" class=\"img-circle\" width=\"25\" height=\"25\">";
?> <i class="fa fa-caret-down"></i></a>
                    <ul class="dropdown-menu dropdown-alerts">
                         <li><a href="<?php
echo base_url('admin/help/edit_account');
?>"><i class="fa fa-user"></i> Account Settings </a>
                        </li>
                        <li><a href="<?php
echo base_url('admin/help/logout');
?>"><i class="fa fa-sign-out"></i> Logout </a>
                        </li>
                      
                       
                    </ul>
                  
        </li>
	  
	  
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
  


  
  
  
 