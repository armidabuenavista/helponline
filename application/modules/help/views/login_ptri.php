
<?php $this->load->view('main_header'); ?>
<style type="text/css">
      /* Override some defaults */
      html, body {
        background-color: #FFFFFF;
      }
      
      .container {
       width: 600px;
      }
	  .panel-title{
	  	font-size:20px;
	  }
</style>
<?php $this->load->view('navbar'); ?>
    <hr></hr>
    <div class="container">
    <div class="col-md-12">


		<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title"><a href=""><img src="<?php echo base_url("assets/images/ncs.png"); ?>" alt="NCS" height="50" width="50"/></a> User Login</h2>
    </div>
    <div class="panel-body">
	
	<?php echo validation_errors(); ?>
		   <form name="form1" id="form1" method="POST"  action="<?php echo site_url('help/verifylogin_ptri');?>" >
            <fieldset>
			  <div  id="alert" align="center"></div> 
              <div class="input-group form-group" align="center" style="margin-bottom: 25px">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input type="text" name="username" id="username" placeholder="Username"  class="form-control"  > 
              </div>
             <div class="input-group form-group" align="center">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span><input type="password" name="password" id="password" placeholder="Password"  class="form-control" >
              </div>
              <a href="<?php echo base_url("help/forgot_password"); ?>">Forgot Password?</a>
	<div class="form-group form-inline" align="center" >     
	         <button  class="btn btn-default" id="login" type="submit" > LOGIN</button>
		</div>
            </fieldset>
          </form>
	</div>
</div>	
	</div>		
	</div>		
    <?php $this->load->view('main_footer'); ?>