<?php $this->load->view('admin_header'); ?>	


<!-- create_default_meal controller -->



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

<div class="container">
	
    <?php $tb=count($crumb); for($c=0;$c<count($crumb);$c++){ if(($tb-$c)>1){?>
    <a href="<?php echo $crumb[$c]['link']?>"> <?php echo ucfirst($crumb[$c]['label']);?></a> /    <?php }else{ ?>

        <?php echo ucfirst($crumb[$c]['label']);?>

    <?php } }?>


		
</div>			

<div id="edit_default_menu"   style="display: none;" class="col-md-12">
</div>
<div id="edit_default_meal"   style="display: none;" class="col-md-12">
</div>

<input type="hidden" class="form-control" id="data_id" name="data_id" value="<?php echo $data_id; ?>" />
<div id="default_meal_plan"></div>

<?php $this->load->view('admin_footer'); ?> 