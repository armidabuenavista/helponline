<?php $this->load->view('admin_header'); ?>	

<?php $this->load->view('admin_navbar'); ?>	
<style>

.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 5px;
    line-height: 1;
    vertical-align: middle;
    border-top: 1px solid #ddd;
	font-size:14px;
}


input[type=text] {
width: 50px;
}
input[type="text"]:focus{
background-color: #f7f9ac;
}
</style>





<div id="previous_meal_plan"   style="display: none;">
</div>


<div class="container" >  
<div class="col-md-12" >
	 <h3 class="page-header"> <img  height="75" width="75" src="<?php echo base_url("assets/images/ncs.png"); ?>">Food Exchange List</h3>
		<div class="container" style="margin-bottom:20px;">
	
    <?php $tb=count($crumb); for($c=0;$c<count($crumb);$c++){ if(($tb-$c)>1){?>
    <a href="<?php echo $crumb[$c]['link']?>"> <?php echo ucfirst($crumb[$c]['label']);?></a> /    <?php }else{ ?>

        <?php echo ucfirst($crumb[$c]['label']);?>

    <?php } }?>


			</div>

 <div class="col-md-6" >
		<p class="lead">Name of Client: <?php  echo $name; ?></p>
		<p class="lead" id="age" data-age_year="<?php echo $age_year; ?>" data-age_month="<?php echo $age_month; ?>" >Age: <?php  echo $age_year;?></p>
		<p class="lead" data-gender="<?php  echo $gender; ?>">Gender: <?php  echo $gender."<br>"; ?></p>
		</div>
	 <div class="col-md-6" >
	<p class="lead">Date of Counseling: <?php  echo date("F d, Y",strtotime($approved_date)); ?></p>
	<p class="lead">Assigned RND: <?php  echo $assigned_rnd; ?></p>
		</div>	

			</div>



				</div>

<input type="hidden" id="appointment_id" name="appointment_id" class="form-control" value="<?php echo $appointment_id; ?>"/>
<input type="hidden" id="client_id" name="client_id" class="form-control" value="<?php echo $client_id; ?>"/>
<div id="fel" class="container">


</div>

<?php $this->load->view('admin_footer'); ?>	