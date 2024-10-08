<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
 
    <!-- MAKE SURE TO ADD THE STYLESHEET -->
	
  <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.10.2.js"); ?>"></script> 
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
   
     <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>   


  </head>
  <body>


   <form name="form" id="form" class="form-horizontal"  method="POST" action='<?= base_url();?>MyController/save'>
       
	   
<div class="container" >
<div class="col-md-12" >
<div  class="help-block"> Please sign in/ register to create an appointment.</div>
 <h3>Registration Form</h3>
<hr class="colorgraph"></hr>

		 <?php if($this->session->flashdata('msg')){ ?>
			<div class="row">
				<div class="col-lg-12">  <?php echo  $this->session->flashdata('alert'); ?></div>
			</div>
			<?php }else{
				echo "";
			}?>
<div style="margin-bottom: 20px;"><strong>*Required Fields</strong></div>
	<div class="col-md-8" style="margin-bottom: 10px;" >


  <div class="form-group ">
		  <label class="control-label">Personal Information</label>
		  </div>
                  <div class="form-group ">
				  
         <p class="help-block">Last name can contain any letters and  spaces</p>
		  <span class="text-danger"><?php echo form_error('lname'); ?></span>
               <input type="text" name="lname" id="lname"    placeholder="*Last Name" class="form-control  " autofocus="autofocus" />  </div>
			   
			   <div class="form-group ">
			   <p class="help-block">First name can contain any letters and  spaces</p>
			    <span class="text-danger"><?php echo form_error('fname'); ?></span>
			    <input type="text" name="fname" id="fname" class="form-control  "   placeholder="*First Name"  />  
				</div>
			   <div class="form-group ">
			   <p class="help-block">Middle name can contain any letters and  spaces</p>
			    <span class="text-danger"><?php echo form_error('mname'); ?></span>
			    <input type="text" name="mname" id="mname" class="form-control  "   placeholder="*Middle Name"  />  
            
          </div>
		  
		  	<div class="form-group " >  
				<p class="help-block">Extension</p>
				  <input type="text" name="extn" id="extn" class="form-control  " placeholder="Extension" />  
            
            
          </div>

		  
               <div class="form-group ">
				<p class="help-block">Please select gender</p>
     
	 
	 <select name="gender" id="gender" class="form-control">
	 	<option value="1">Male</option>
	 	<option value="2">Female</option>
		
	 </select>
		      <?php
	/*	 $gender_db= $mysqli->query("SELECT * FROM gender_db ");
		 echo "<select name=\"gender\" id=\"gender\" class=\"form-control  \">";
	
		 while($gender_row= $gender_db->fetch_object()){
		 	$gender_id= $gender_row->id;
		 	$gender= $gender_row->gender;
	
		
			echo "<option value=\"$gender_id\">".$gender."</option>";
				

		 }
		 	echo "</select>";*/
		 
		 ?>
           

		  </div>
	
             <div class="form-group ">
			 <p class="help-block">Please enter date of birth in this format (YYYY-MM-DD) </p>
			<input type = "text" name= "birthday" id = "birthday"  placeholder="*Birthday: (YYYY-MM-DD)"  class="form-control  "   >
		
			
              </div>
			   
			   
		
                  <div class="form-group ">
         
          <p class="help-block">Please enter your address </p>
               <input type="text" id="address" name="address" id="address" class="form-control  "   placeholder="*Address" />
			   </div>
			   <div class="form-group ">
			    <p class="help-block">Please enter your contact number. </p>
			     <input type="tel" id="contact_no" name="contact_no" class="form-control  "   placeholder="*Contact Number" /> 
			  
			   
              </div>
          
		  
		  
                  <div class="form-group">
            <p class="help-block">Please enter valid email address </p>
			    <span class="text-danger"><?php echo form_error('email'); ?></span>
         <input type="email" id="email_address" name="email_address" class="form-control  "   placeholder="*Email Address" size="30" /> 
			   
              </div>
		  
		  
		   <div class="form-group ">
		  <label class="control-label">Login Information:</label>
		  </div>

		
		         <div class="form-group">
          
		         <p class="help-block"> Username can contain any letters or numbers, without spaces </p>
            <input type="text" id="username" name="username" class="form-control  "    placeholder="*Username"/> 
			   
         
          </div>
		
		
		
		       <div class="form-group">
        <p class="help-block"> Password should be at least 6 characters</p>
            <input type="password" id="password" name="password" class="form-control  "    placeholder="*Password"  /> 
			   
          </div>
		
		  
		  
		       <div class="form-group ">
            <p class="help-block"> Please confirm password</p>
            <input type="password" id="cnf_password" name="cnf_password" class="form-control  "    placeholder="*Confirm Password"/> 
			   
          </div>
	
	
 
      <div class="form-group ">
         
    <input type="submit" name="submit" value="Register" id="register" class="btn btn-success btn-lg" >
          
          </div>
		   			  
 
	     </div>	   
	    	 </div>	   
	    	 	</div>	   
					 </form>

	   
<div class="container">
	<div class="col-md-12">
	  <footer class="modal-footer">
	  
	 
	<p align="left">HELP footer Copyright 2014</p>
		
	   </footer>
	   </div>
	   		</div>
  
  </body>


</html>

<!--<script type="text/javascript"> 
var d = new Date();
var year = d.getFullYear() - 20;
d.setFullYear(year);
$("#birthday").datepicker({
    changeYear: true,
    changeMonth: true,
	dateFormat: 'yy-mm-dd',
    yearRange: '1930:' + year + '',
    defaultDate: d
	});
	
</script>
-->

