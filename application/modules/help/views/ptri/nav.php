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
          <a href="<?php echo base_url()?>help/<?php if(isset($this->session->userdata['logged_in'])){ echo "home_ptri"; }else{ echo "login_ptri"; }  ?>" >G4HD Tracker <span class="badge badge-pill badge-primary">NEW</span></a>
        
        </li>
             
	    <li>
          <a href="<?php echo base_url() ?>help/" >Nutrition Counseling </a>
        
        </li>
	  
	     <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Assessment Tools <span class="badge badge-pill badge-primary">NEW</span><i class="fa fa-caret-down"></i></a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="dropdown"> <a href="<?php echo base_url() ?>help/fast_tools"><i class="fa fa-tachometer"></i> Assessment Tools </a></li>
                        <li><a href="<?php echo base_url() ?>help/nutrition_label"><i class="fa fa-tags"></i> Nutrition Label <span class="badge badge-pill badge-primary">NEW</span></a>
                        </li>
                      
                       
                    </ul>
	    <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">HELP Tracker <span class="badge badge-pill badge-primary">NEW</span><i class="fa fa-caret-down"></i></a>
                    <ul class="dropdown-menu dropdown-user">
                       
                        <li><a href="<?php echo base_url() ?>help/login"><i class="fa fa-sign-in"></i> Try it now! </a>
                        </li>
                      
                       
                    </ul>
                  
        </li>
       <li><a href="<?php echo base_url() ?>help/events"> Events</a></li> 
             
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Educational Tools <span class="badge badge-pill badge-primary">NEW</span><i class="fa fa-caret-down"></i></a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="<?php echo base_url() ?>help/publications"> Publications</a></li>
                <li><a href="<?php echo base_url() ?>help/game"> Games (Beta Version)</a></li>
            </ul>
        </li>
                      
      <li ><a href="<?php echo base_url() ?>help/contact_us"> Contact Us</a></li>
	  <li><a href="<?=base_url()."help/logout";?>"><i class="fa fa-sign-out"></i> Logout </a>


    
      </ul>
	
	  
	 
    </div>
   

  </nav>
  
  
  
  
 