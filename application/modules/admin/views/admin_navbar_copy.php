<nav class="navbar navbar-default " role="navigation">
   
        <div class="navbar-header">
          <a href="<?php
echo base_url('admin/help/site_stats');
?>" class="navbar-brand"> Help Admin </a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>


        <div class="navbar-collapse collapse" id="navbar-main">
         <ul class="nav navbar-nav navbar-right">
             
             
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


  
   
   
    
      </ul>
  
    
   
    </div><!-- /.navbar-collapse -->
   
  <!-- /.container-fluid -->
  </nav>


