
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
   <form name="form1" id="form1" class="form-horizontal" action="<?php echo base_url();?>help/forgot_password"  method="POST">
<div class="container" >
<div class="col-md-12" >

 <h3>Forgot Password?</h3>
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
	<div class="col-md-8" style="margin-bottom: 10px;" >
  
		   <div class="form-group ">
		  <label class="control-label">Login Information:</label>
		  </div>
		         <div class="form-group">
            <p class="help-block">Please enter valid email address </p>
         <input type="email" id="email_address" name="email_address" class="form-control  " required="" placeholder="*Email Address" size="30" /> 
              </div>	<div class="form-group">
	<?php echo $cap_img; ?>
	
		
	</div>
	<div class="form-group">
		<p class="help-block"> Enter Captcha</p> <input type="text" name="captcha" id="captcha"   class="form-control" placeholder="Captcha Code" value="<?php echo $this->input->post('captcha'); ?>" /> 
	</div>
      <div class="form-group ">
   
	<button id="submit" class="btn btn-success " name="submit" value="submit"> Submit</button>
	
          </div>
	     </div>	   
	    	 </div>	   
	    	 	</div>	   
					 </form>
<?php $this->load->view('main_footer'); ?>

