<?php $this->load->view('admin_header'); ?>	
<?php $this->load->view('admin_navbar'); ?>	  


<?php 
$lname 			= $results1[0]->lname;
$fname			= $results1[0]->fname;
$mname			= $results1[0]->mname;
$extn 			= $results1[0]->extension;
$gender 		= $results1[0]->gender;
$birthday 		= $results1[0]->birthday;
$address 		= $results1[0]->address;
$contact_no 	= $results1[0]->contact_number;
$email_address 	= $results1[0]->email_address;





?>

<div class="container" >
<div class="col-md-12" >

<h1 class="page-header" ><span class="glyphicon glyphicon-user"></span> Edit Account</h1>
	

<div class="panel panel-default">
      <div class="panel-heading"><h3><i class="fa fa-list-alt"></i> Personal Information</h3></div>
      <div class="panel-body">
<form name="form" id="form"  action="<?php echo base_url();?>admin/help/edit_account"  method="POST">





<hr class="colorgraph"></hr>
		 <div id="alert" > <?php
if($this->session->flashdata('item')) {
  $message = $this->session->flashdata('item');
  ?>
<div class="alert alert-<?php echo $message['class'];?>"><?php echo $message['message']; ?></div>
<?php
}

?> <?php echo $message_return;?>  <?php echo validation_errors(); ?>    </div>
		 

		 
<div style="margin-bottom: 20px;"><strong>*Required Fields</strong></div>
	

                  <div class="form-group ">
         <p class="help-block">Last name can contain any letters and  spaces</p>
               <input type="text" name="lname" id="lname"   placeholder="*Last Name" class="form-control  " autofocus="autofocus" value="<?php echo $lname; ?>"/>  </div>
			   <div class="form-group ">
			   <p class="help-block">First name can contain any letters and  spaces</p>
			    <input type="text" name="fname" id="fname" class="form-control  "  placeholder="*First Name" value="<?php echo $fname; ?>"  />  
				</div>
			   <div class="form-group ">
			   <p class="help-block">Middle name can contain any letters and  spaces</p>
			    <input type="text" name="mname" id="mname" class="form-control  "  placeholder="*Middle Name" value="<?php echo $mname; ?>" />  
          </div>
		  	<div class="form-group " >  
				<p class="help-block">Extension</p>
				  <input type="text" name="extn" id="extn" class="form-control  " placeholder="Extension" />  
          </div>
               <div class="form-group ">
				<p class="help-block">Please select gender</p>

			 <select  name="gender" id="gender" class="form-control " >

	   <option value="0">--Select Gender--</option>
				<?php 

            foreach($groups as $row)
            { 
			
	
			$gender_id= $row->id;
				if($gender == $gender_id){
				  $selectCurrent=' selected=\"\"';
   			 }else{
       			 $selectCurrent='';
    			}
			
              echo '<option  value="'.$row->id.'" "'.$selectCurrent.'"  >'.$row->gender.'</option>';
			
      
            }
            ?>
			</select>
			</div>
		  
             <div class="form-group ">
			 <p class="help-block">Please enter date of birth in this format (YYYY-MM-DD) </p>
			<input type ="text" name="birthday" id ="birthday"  placeholder="*Birthday: (YYYY-MM-DD)"  class="form-control" value="<?php echo $birthday; ?>"  >
              </div>
                  <div class="form-group ">
          <p class="help-block">Please enter your address </p>
               <input type="text" id="address" name="address" id="address" class="form-control  "  placeholder="*Address" value="<?php echo $address; ?>" />
			   </div>
			   <div class="form-group ">
			    <p class="help-block">Please enter your contact number </p>
			     <input type="tel" id="contact_no" name="contact_no" class="form-control  "  placeholder="*Contact Number" value="<?php echo $contact_no; ?>" /> 
              </div>
                  <div class="form-group">
            <p class="help-block">Please enter valid email address </p>
         <input type="email" id="email_address" name="email_address" class="form-control  "  placeholder="*Email Address" size="30" value="<?php echo $email_address; ?>" /> 
              </div>



            <!--   <div class="form-group">
				<label> Photo:</label>
			</div>
			<div class="form-group"><?php 
			 $a= base_url("assets/images/client_photos/$photo");
			
			echo "<img src=\"$a\" alt=\"\" width=\"10%\"  />";
			?></div>
			<div class="form-group">
				 <input type="file" name="photo" id="photo"  />
				 <input type="text" class="form-control" name="photo_1" id="photo_1" value="<?php echo $photo; ?>"  />
			</div>
 -->

			
                  <div class="form-group ">
   
	<button id="update_info" class="btn btn-success " name="update_info" value="update_info"> Update</button>
	
        
              
              </div>


</form>
	 

    </div>


  </div>




    <div class="panel panel-default">
      <div class="panel-heading"><h3><i class="fa fa-lock"></i> Login Information</h3></div>
      <div class="panel-body">
		   <form name="form1" id="form1"  action="<?php echo base_url();?>admin/help/edit_account"  method="POST">
		   	<hr class="colorgraph"></hr>
		 <div id="alert" > <?php
if($this->session->flashdata('item1')) {
  $message = $this->session->flashdata('item1');
  ?>
<div class="alert alert-<?php echo $message['class'];?>"><?php echo $message['message1']; ?></div>
<?php
}

?> <?php echo $message_return;?>  <?php //echo validation_errors(); ?>    </div>
		 

		 
<div style="margin-bottom: 20px;"><strong>*Required Fields</strong></div>

		         <div class="form-group">
		         <p class="help-block"> Username can contain any letters or numbers, without spaces </p>
            <input type="text" id="username" name="username" class="form-control  "   placeholder="*Username" value="<?php echo $this->input->post('username'); ?>"/> 
          </div>
		       <div class="form-group">
        <p class="help-block"> Password should be at least 6 characters</p>
            <input type="password" id="old_password" name="old_password" class="form-control  "   placeholder="*Old Password" value="<?php echo $this->input->post('old_password'); ?>"  /> 
          </div>
		 
		  <div class="form-group">
        <p class="help-block"> Password should be at least 6 characters</p>
            <input type="password" id="new_password" name="new_password" class="form-control  "   placeholder="*New Password" value="<?php echo $this->input->post('new_password'); ?>"  /> 
          </div>

          <div class="form-group">
        <p class="help-block"> Password should be at least 6 characters</p>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control  "   placeholder="*Confirm Password" value="<?php echo $this->input->post('confirm_password'); ?>"  /> 
          </div>

      <div class="form-group ">
   
	<button id="update_acct" class="btn btn-success " name="update_acct" value="update_acct">Update</button>
	
          </div>

          </form>
	     </div>	   
	    	 
						 </div>
   

 </div>	   
	    	 	</div>	 



<?php $this->load->view('admin_footer'); ?>	

<script type="text/javascript">


var d = new Date();
var year = d.getFullYear()-20;
d.setFullYear(year);
$("#birthday").datepicker({
    changeYear: true,
    changeMonth: true,
	dateFormat: 'yy-mm-dd',
    yearRange: '1940:' + year + '',
    defaultDate: d
	});
	
</script>


