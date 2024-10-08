<!DOCTYPE html>
<html lang="en">
	<head>	
		 <!-- Bootstrap CSS -->
	   <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.10.2.js"); ?>"></script> 
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
   
     <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>   
	</head>	
	<body>
		<div class="container">
			<div class="col-lg-10">
			<fieldset>
    		<legend>Select Your Option</legend>
				<a href="<?= base_url();?>pages/save" class="btn btn-success">Add Employee</a> 
				<a href="<?= base_url();?>pages/result" class="btn btn-success">Employee List</a> 
			</fieldset>
        </div>
		</div>
	</body>
</html>