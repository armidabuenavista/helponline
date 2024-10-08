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
				<a href="<?= base_url();?>pages/home" class="btn btn-success">Add Employee</a> 
				
			</fieldset>
        </div>
		</div>
	
		<div class="container">
			<?php if($this->session->flashdata('msg')){ ?>
			<div class="row">
				<div class="col-lg-12">  <?php echo  $this->session->flashdata('msg');  ?></div>
			</div>
			<?php }else{
				echo "";
			}?>
			<div class="row">
			<fieldset>
    		<legend>Employee List</legend>
			<!--	<div class="col-lg-12">
			  		<table class="table table-hover table-bordered">
					<tr>
						<td class="text-center"><strong>#</strong></td>
			        	<td><strong>First Name</strong></td>
			        	<td><strong>Last Name</strong></td>
			        	<td><strong>Email</strong></td>
			        </tr>
					<?php if(is_array($EMPLOYEES) && count($EMPLOYEES) ) {
						foreach($EMPLOYEES as $loop){
					?>
			        <tr>
			        	<td><?=$loop->EMPLOYEE_ID;?></td>
			        	<td><?=$loop->FIRST_NAME;?></td>
			        	<td><?=$loop->LAST_NAME;?></td>
			        	<td><?=$loop->EMAIL;?></td>
			        </tr>
					<?php } 
					}?>
					</table>
				</div>-->
				
				
				<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <!--<th>#</th>-->
                        <th>Employee ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($list); ++$i) { ?>
                    <tr>
                       <!-- <td><?php echo ($page+$i+1); ?></td>-->
                        <td><?php echo $list[$i]->EMPLOYEE_ID; ?></td>
                        <td><?php echo $list[$i]->FIRST_NAME; ?></td>
                        <td><?php echo $list[$i]->LAST_NAME; ?></td>
                        <td><?php echo $list[$i]->EMAIL; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <?php echo $pagination; ?>
        </div>
    </div>
</div>
				
				
				
				
			</fieldset>
        </div>
		</div>
	</body>
</html>