
    <!-- MAKE SURE TO ADD THE STYLESHEET -->
	<?php $this->load->view('main_header'); ?>
	
	<style>
		.ui-widget-header {
    border: 0px solid #aaaaaa;
    /* background: #cccccc url(images/ui-bg_highlight-soft_75_cccccc_1x100.png) 50% 50% repeat-x; */
    background: #FFFFFF;
    color: #222222;
    font-weight: normal;
    font-size: 14px;
}
	</style>

<?php $this->load->view('navbar'); ?>
   <form name="form1" id="form1"  action="<?php echo base_url();?>help/register"  method="POST">
<div class="container" >
<div class="col-md-12" >

 <h1>Registration Form</h1>
 <hr class="colorgraph">
<div class="panel panel-default">
      <div class="panel-heading"><h3><i class="fa fa-list-alt"></i> Personal Information</h3></div>
      <div class="panel-body">
<form name="form1" id="form1"  action="<?php echo base_url();?>help/register"  method="POST">





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
        <input type="text" name="lname" id="lname"   placeholder="*Last Name" class="form-control  " autofocus="autofocus" value="<?php echo $this->input->post('lname'); ?>"/>
    </div>
    <div class="form-group ">
        <p class="help-block">First name can contain any letters and  spaces</p>
        <input type="text" name="fname" id="fname" class="form-control  "  placeholder="*First Name" value="<?php echo $this->input->post('fname'); ?>"  />  
    </div>
    <div class="form-group ">
        <p class="help-block">Middle name can contain any letters and  spaces</p>
        <input type="text" name="mname" id="mname" class="form-control  "  placeholder="*Middle Name" value="<?php echo $this->input->post('mname'); ?>" />  
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
                    foreach($groups as $row){ 
                        $a= $this->input->post('gender');
                        $b= $row->id;
                            if($a == $b){
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
        <input type ="text" name="birthday" id ="birthday"  placeholder="*Birthday: (YYYY-MM-DD)"  class="form-control" value="<?php echo $this->input->post('birthday'); ?>"  >
    </div>
    <div class="form-group ">
        <p class="help-block">Please enter your address </p>
        <input type="text" id="address" name="address" id="address" class="form-control  "  placeholder="*Address" value="<?php echo $this->input->post('address'); ?>" />
    </div>
    <div class="form-group ">
        <p class="help-block">Please enter your contact number </p>
        <input type="tel" id="contact_no" name="contact_no" class="form-control  "  placeholder="*Contact Number" value="<?php echo $this->input->post('contact_no'); ?>" /> 
    </div>
    <div class="form-group">
        <p class="help-block">Please enter valid email address </p>
        <input type="email" id="email_address" name="email_address" class="form-control  "  placeholder="*Email Address" size="30" value="<?php echo $this->input->post('email_address'); ?>" /> 
    </div>
              


</form>
	 

    </div>


  </div>




		   <div class="panel panel-default">
      <div class="panel-heading"><h3><i class="fa fa-lock"></i> Login Information</h3></div>
      <div class="panel-body">
		   
		         <div class="form-group">
		         <p class="help-block"> Username can contain any letters or numbers, without spaces </p>
            <input type="text" id="username" name="username" class="form-control  "   placeholder="*Username" value="<?php echo $this->input->post('username'); ?>"/> 
          </div>
		       <div class="form-group">
        <p class="help-block"> Password should be at least 6 characters</p>
            <input type="password" id="password" name="password" class="form-control  "   placeholder="*Password" value="<?php echo $this->input->post('password'); ?>"  /> 
          </div>
		       <div class="form-group ">
            <p class="help-block"> Please confirm password</p>
            <input type="password" id="cnf_password" name="cnf_password" class="form-control  "   placeholder="*Confirm Password" value="<?php echo $this->input->post('cnf_password'); ?>"/> 
          </div>
	<div class="form-group">
	<?php echo $cap_img; ?>
	
	
	</div>
	<div class="form-group">
		<p class="help-block"> Enter Captcha</p> <input type="text" name="captcha" id="captcha"   class="form-control" placeholder="Captcha Code" value="<?php echo $this->input->post('captcha'); ?>" /> 
	</div>
     
	     </div>	   
	    	 </div>	   
	    	  <div class="form-group ">
   
	<button id="register" class="btn btn-success " name="register" value="register"> Register</button>
	
          </div>
	    	 	</div>	
       </div>


					 </form>
<?php $this->load->view('main_footer'); ?>

<script type="text/javascript"> 
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