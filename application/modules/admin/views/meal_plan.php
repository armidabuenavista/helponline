<!-- create_meal controller -->
<?php $this->load->view('admin_header'); ?>	



<style>
.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
    padding: 5px;
    vertical-align: middle;
font-family: "Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
    border-top: 1px solid #dddddd;
	font-size:14px;
}

.form-control{
	width: 150px;
}
.meal_plan_exchange{
	width:50px;
}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
  border: 1px solid #d3d3d3;
  background: #ffffff;
}
/*.ui-widget-content {
	border: 1px solid #dad8d6;
	height:800px;
	font-family: "Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;

}*/


.ui-widget input, .ui-widget select, .ui-widget textarea, .ui-widget button {
    font-family: "Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 14px;
}
.list-group{
	font-size:18px;
}
.badge{
	background-color: #d3592c;
	
}


	</style>
<?php $this->load->view('admin_navbar'); ?> 
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

			

<div id="edit_menu"   style="display: none;" class="col-md-12">
</div>
<div id="edit_meal1"   style="display: none;" class="col-md-12">
</div>
<div id="previous_meal_plan"   style="display: none;" class="col-md-12">
</div>
<input type="hidden" id="appointment_id" name="appointment_id" class="form-control" value="<?php echo $appointment_id; ?>"/>
<input type="hidden" id="client_id" name="client_id" class="form-control" value="<?php echo $client_id; ?>"/>
<div id="meal_plan">
</div>
			

<?php $this->load->view('admin_footer'); ?> 