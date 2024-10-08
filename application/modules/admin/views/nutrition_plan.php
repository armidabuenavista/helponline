<?php $this->load->view('admin_header'); ?>	

<style>

	.list-group{
		font-size: 18px;
	}
	
.badge{
	background-color: #d3592c;
	height: 30px;
	font-size:18px;
}
</style>



<?php $this->load->view('admin_navbar'); ?>	
<div class="container" >
	<div class="col-md-12" >
		 <h3 class="page-header"> <img  height="75" width="75" src="<?php echo base_url("assets/images/ncs.png"); ?>">Nutrition Plan</h3>
		<div class="container" style="margin-bottom:20px;">
	
    <?php $tb=count($crumb); for($c=0;$c<count($crumb);$c++){ if(($tb-$c)>1){?>
    <a href="<?php echo $crumb[$c]['link']?>"> <?php echo ucfirst($crumb[$c]['label']);?></a> /    <?php }else{ ?>

        <?php echo ucfirst($crumb[$c]['label']);?>

    <?php } }?>


			</div>
  
 <div class="col-md-6" >
		<p class="lead">Name of Client: <?php  echo $name; ?></p>
		<p class="lead" id="age" data-age="<?php  echo $age_year; ?>">Age: <?php  echo $age_year; ?></p>
		<p class="lead" id="gender" data-gender="<?php  echo $gender; ?>">Gender: <?php  echo $gender."<br>"; ?></p>
		</div>
	 <div class="col-md-6" >
	<p class="lead">Date of Counseling: <?php  echo date("F d, Y",strtotime($approved_date)); ?></p>
	<p class="lead">Assigned RND: <?php  echo $assigned_rnd; ?></p>
		</div>	

			   <div   id="nutrition_plan_result" class="col-md-12"  >
			<!--<div id="alert1" align="center" tabindex="1"></div>-->
		<div class="panel panel-default">
                        <div class="panel-heading">
                       <h3> <i class="fa fa-bar-chart-o fa-fw"></i> Nutrition Plan</h3>
							</div>			
		<div class="panel-body">
			<?php


		$datetime= date("Y-m-d");
		$a= strtotime($approved_date);
		$b= strtotime($datetime);
	echo "<div class=\"form-group form-inline\">";
	if($numRows8 == 0){
		echo "";
	}else if($numRows8>0 && $numRows3 == 0  &&  $b <= $a ){
		echo "<button id=\"add_nutrition_plan\" class=\"btn btn-success btn-lg\"> New Record</button></div>";
	} else if($numRows3 > 0 ){
	$z=base_url('admin/help/fel/'.$appointment_id.'');	

		echo "&nbsp;<a href=\"$z\" class=\"btn btn-success btn-lg\" style=\"color: #ffffff;\"><span class=\"glyphicon glyphicon-plus\" ></span> Food Exchange List</a></div>";
	}
	else {
		echo "";
	}

	


	echo "<hr class=\"colorgraph\"></hr>";

foreach ($results2 as $row) {
	$wt_id = $row->wt_id;
	$wt_type = $row->weight_type;
	$wt = $row->weight;
	$wt_unit = $row->weight_unit;
	$dbw= $row->dbw;
	$dbw_unit= $row->dbw_unit;
	$pa_lvl = $row->pa_lvl;
	$select_cal_plan= $row->select_cal_plan;
	$cal_plan= $row->cal_plan;
	$cal = $row->cal;
	$method_id = $row->method_id;
	$method = $row->method;
	$pmethod = $row->pmethod;
	$pmethod_id = $row->pmethod_id;
	$st_value = $row->st_value;
	$cho = $row->cho;
	$protein = $row->protein;
	$fat = $row->fat;
	$cho_custom = $row->cho_custom;
	$pro_custom = $row->pro_custom;
	$fat_custom = $row->fat_custom;
	$select_plan = $row->select_plan;
	$select_plan_id = $row->select_plan_id;
}

	if($numRows2 >0){
		?>
	
		
	<ul class="list-group">
	
	
 
 <li class="list-group-item ">
 <span class="badge"><?php  echo $wt_type; ?></span>
  <label ><strong>Weight Used:</strong></label> 
  </li>
  
 <li class="list-group-item ">
 <span class="badge"><?php 
		
		if($wt_id == 1){
			echo $wt." ".$wt_unit;
		} else {
			echo $dbw." ".$dbw_unit;
		}

		?></span>
 <label ><strong>Weight:</strong></label>
  </li>

	 <li class="list-group-item ">
<span class="badge"><?php  echo $pa_lvl; ?></span>
<label ><strong>Physical Activity Level:</strong></label>
  </li>
	
		 <li class="list-group-item ">
<span class="badge"><?php  echo $select_cal_plan." ".$cal_plan." cal"; ?></span>
<label ><strong>Selected Cal Plan:</strong></label>
  </li>
	
	
	 <li class="list-group-item ">
<span class="badge"><?php  echo $cal." kcal" ; ?></span>
<label ><strong>Total Energy Requirement:</strong></label>
  </li>
  
   
<?php
		
		if( $select_plan_id == 2){
			echo " <li class=\"list-group-item \">";
			echo "<span class=\"badge\">". $select_plan."</span><label ><strong>Selected Plan: </strong></label></li>";
			
			if($method_id == 1){
				
				echo " <li class=\"list-group-item \">";
				echo "<span class=\"badge\">".$method."</span></td><label ><strong>Method of Macronutrient Distribution: </strong></label></li>";
				echo " <li class=\"list-group-item \">";
				echo "<span class=\"badge\">".  $pmethod."</span><label ><strong>Percentage Method Used: </strong></label>";
				
				
				if($pmethod_id == 2){
					echo " <li class=\"list-group-item \">";
					echo " <span class=\"badge\">".$cho_custom."%"."</span><label ><strong>CHO: </strong></label></li>";	
					$pcho= $cho_custom."%";
					
					echo " <li class=\"list-group-item \">";
					echo "<span class=\"badge\">".$pro_custom."%"."</span><label class=\"lead\"><strong>Protein: </strong></label></li>";
					$ppro= $pro_custom."%";
					
					echo " <li class=\"list-group-item \">";
					echo "<span class=\"lead\">".$fat_custom."%"."</span><label class=\"lead\"><strong>Fat: </strong></label>";
					$pfat= $fat_custom."%";
				} else {
					
					echo " <li class=\"list-group-item \">";
					echo "<span class=\"badge\">"."65"."%"."</span><label ><strong>CHO: </strong></label></li>";
				
					$pcho= "65%";
					
					echo " <li class=\"list-group-item \">";
					echo "<span class=\"badge\">"."15"."%"."</span><label><strong>Protein: </strong></label>";
					
					$ppro= "15%";
					
					echo " <li class=\"list-group-item \">";
					echo "<span class=\"badge\">"."20"."%"."</span><label><strong>Fat: </strong></label>";
				
					$pfat= "20%";
				}

				echo " <li class=\"list-group-item \">";
				echo "<span class=\"badge\">".$cho." grams"."</span><label ><strong>Computed CHO: </strong></label></li>";
				echo " <li class=\"list-group-item \">";
				echo "<div class=\"progress progress-striped\"><div class=\"progress-bar progress-bar-success active \"  role=\"progressbar\" style=\"width:$pcho;\"><span id=\"cho_bar_label\">$pcho</span></div></div></li>";
				
				echo " <li class=\"list-group-item \">";	
				echo "<span class=\"badge\">".$protein." grams"."</span><label ><strong>Computed Protein: </strong></label></li>";
				echo " <li class=\"list-group-item \">";	
				echo "<div class=\"progress progress-striped\">
   <div class=\"progress-bar progress-bar-warning active \"  role=\"progressbar\" style=\"width:$ppro;\">
      <span >$ppro</span>
   </div>
</div></li>";
				echo " <li class=\"list-group-item \">";	
				echo "<span class=\"badge\">".$fat." grams"."</span><label ><strong>Computed Fat: </strong></label></li>";
				
				echo " <li class=\"list-group-item \">";	
				echo "<div class=\"progress progress-striped\">
   <div class=\"progress-bar progress-bar-danger active\"  role=\"progressbar\" style=\"width:$pfat;\">
      <span >$pfat</span>
   </div>
</div></li>";
				
			} else {
				
				echo " <li class=\"list-group-item \">";	
				echo "<span class=\"badge\">".$method."</span><label ><strong>Method of Macronutrient Distribution: </strong></label></li>";
				
				echo " <li class=\"list-group-item \">";
				echo "<span class=\"badge\">".$st_value."</span><label ><strong>Standard Value: </strong></label></li>";
				
				echo " <li class=\"list-group-item \">";
				echo "<span class=\"badge\">".$cho." grams"."</span><label ><strong>Computed CHO: </strong></label></li>";
				
				echo " <li class=\"list-group-item \">";
				echo "<div class=\"progress progress-striped\"><div class=\"progress-bar progress-bar-success active \"  role=\"progressbar\" style=\"width:65%;\"><span >65%</span></div></div></li>";
				
				echo " <li class=\"list-group-item \">";
				echo "<span class=\"badge\">".$protein." grams"."</span><label class=\"lead\"><strong>Computed Protein: </strong></label> ";
				echo " <li class=\"list-group-item \">";
				echo "<div class=\"progress progress-striped\">
   <div class=\"progress-bar progress-bar-warning active \"  role=\"progressbar\" style=\"width:15%;\">
      <span >15%</span>
   </div>
</div></li>";
				echo " <li class=\"list-group-item \">";
				echo "<span class=\"badge\"> ".$fat." grams"."</span><label ><strong>Computed Fat: </strong></label></li>";
				
				echo "<li class=\"list-group-item \">";
				echo "<div class=\"progress progress-striped\">
   <div class=\"progress-bar progress-bar-danger active\"  role=\"progressbar\" style=\"width:20%;\">
      <span >20%</span>
   </div>
</div></li>";
				
			}

		} else {
			
	
			echo " <li class=\"list-group-item \">";
			echo "<span class=\"badge\">". $select_plan."</span><label ><strong>Selected Plan: </strong></label></li>";
			
			echo " <li class=\"list-group-item \">";
			echo "<span class=\"badge\">"."65"."%"."</span><label ><strong>CHO: </strong></label></li>";
			
			echo " <li class=\"list-group-item \">";
			echo "<span class=\"badge\">"."15"."%"."</span><label><strong>Protein: </strong></label>";
			
			echo "<li class=\"list-group-item \">";
			echo "<span class=\"badge\">"."20"."%"."</span><label ><strong>Fat: </strong></label></td>";
			
			echo " <li class=\"list-group-item \">";
			echo "<span class=\"badge\">".$cho." grams"."</span><label ><strong>Computed CHO: </strong></label></li>";
			echo " <li class=\"list-group-item \">";
			echo "<div class=\"progress progress-striped\"><div class=\"progress-bar progress-bar-success active \"  role=\"progressbar\" style=\"width:65%;\"><span id=\"cho_bar_label\">65%</span></div></div></li>";
				
			echo " <li class=\"list-group-item \">";	
			echo "<span class=\"badge\">".$protein." grams"."</span><label ><strong>Computed Protein: </strong></label></li>";
			echo " <li class=\"list-group-item \">";	
			echo "<div class=\"progress progress-striped\">
   <div class=\"progress-bar progress-bar-warning active \"  role=\"progressbar\" style=\"width:15%;\">
      <span >15%</span>
   </div>
</div></li>";
			echo " <li class=\"list-group-item \">";	
			echo "<span class=\"badge\">".$fat." grams"."</span><label ><strong>Computed Fat: </strong></label></li>";
				
			echo " <li class=\"list-group-item \">";	
			echo "<div class=\"progress progress-striped\">
   <div class=\"progress-bar progress-bar-danger active\"  role=\"progressbar\" style=\"width:20%;\">
      <span >20%</span>
   </div>
</div></li>";
		}

		?>	
</ul>	
<?php 
		
		
		if($numRows3 > 0 && $b<=$a){
			$x=base_url('admin/help/edit_nutrition_plan/'.$appointment_id.'');	
			echo"<div class=\"form-group form-inline\">
<a style=\"color:#ffffff; \" href=\"$x\" id=\"update\" class=\"btn btn-success btn-lg\"> Update </a>&nbsp;<a href=\"#\" id=\"$appointment_id\" style=\"color: #ffffff;\" class=\"btn btn-danger btn-lg delete_nutrition_plan\"  ><span class=\"glyphicon glyphicon-remove-sign \"></span> Delete</a></div>";
		}




}else{
		echo "<div  class=\"alert alert-danger\" >No records found.</div>";

}
	/*} else {
		
		echo "<div  class=\"alert alert-danger\" >No records found.</div>";
	
	}*/

	?>

				</div>

	
				</div>
						</div>
							</div>
        <div class="col-md-12 " id="nutrition_plan_form" style="display: none;" >
	<div id="alert" align="center" tabindex="1"></div>
<hr class="colorgraph"></hr>

<div <?php  
		if($gender_id == 1){
			$display="style=\"display: none;\"";
		}else{
	
			
			$display="style=\"display: block;\"";
				
		}
		
		echo $display;
		?>> 
		<div class="form-group">
		<label>Status:</label>

		<?php
		if($numRows8 >0){

		foreach($results8 as $row8){
			$pregnant= $row8->pregnant;
			$lactation = $row8->lactation;

			if($pregnant == 1){
				$status = "Pregnant";
				$z= 1;
			}else if($lactation == 1){
				$status= "Lactating";
				$z= 2;
			}else{
				$status= "Not Pregnant/ Lactating";
				$z= 0;
			}

		
			echo $status;
		}

	}else{

		$z = 0;
	}

		?>

		<input type="hidden" id="pregnant_lactating" name="pregnant_lactating" class="form-control" value="<?php echo $z; ?>" />
		</div>



<!-- <div class="form-group form-inline" style="font-size: 18px;" >Are you 
<input type="radio" id="pregnant_lactating" name="pregnant_lactating" value="1" /> <strong>Pregnant</strong> 
<input type="radio" id="pregnant_lactating" name="pregnant_lactating" value="2" /><strong>Lactating</strong> 
<input type="radio" id="pregnant_lactating" name="pregnant_lactating" value="0"  /><strong>Not Pregnant/ Lactating</strong> ? 	
			</div> -->

		</div>
<div class="form-group " >
<label> Select weight to be used:</label></div>
<div class="form-group ">
<select name="select_wt" id="select_wt" class="form-control input-lg" data-client_id="<?php  echo $client_id; ?>" data-appointment_id="<?php  echo $appointment_id; ?>">
	<option value="0" >--Select Weight--</option>
            <?php
	

	foreach($results4 as $row4){
		$wt_id= $row4->id;
		$wt_type= $row4->weight_type;

		echo "<option value=\"$wt_id\" >".$wt_type."</option>";


	}

	?>
</select>
</div>




<div class="form-group">
	<label>Weight:</label> <span id="label_wt">0</span> <span id="label_wt_unit"></span>
<input type="hidden" id="weight" name="weight" class="form-control" />
</div>


<div class="form-group "  >
            <label  title="Physical Level 
represents the degree of a person's daily physical activity as a number, and is applied to estimate a person's total energy expenditure. Together with the basal metabolic rate, it can be used to compute the energy a person needs in order to maintain a particular lifestyle. " for="PA level" >Physical Activity Level:</label>  </div>  
<div class="form-group "  >
	<select name="pa_lvl" id="pa_lvl" class="form-control input-lg" >
           <option value="0" selected="" >--Select Physical Activity Level--</option> 
            <?php
	foreach($results5 as $row5){
		$pa_lvl_id= $row5->id;
		$pa_lvl = $row5->pa_lvl;
		$pa_lvl_desc= $row5->pa_lvl_desc;
		echo "<option value=\"$pa_lvl_id\" title=\"$pa_lvl_desc\" >".$pa_lvl."</option>";

	}
	?>
			  </select>
		<input type="hidden" id="pa_lvl_val" name="pa_lvl_val" readonly="" class="form-control input-lg" />
          </div>
<div class="form-group ">
<label>Calories:</label></div>
<div class="form-group " >
	<select name="select_cal_plan" id="select_cal_plan" class="form-control input-lg" >
<?php

foreach($results6 as $row6){
	$select_plan_id = $row6->id;
	$select_cal_plan= $row6->select_cal_plan;
	echo "<option value=\"$select_plan_id\" >".$select_cal_plan."</option>";
}
	

	?>  
	</select></div>
<div class="form-group " id="cal_plan_div" style="display: none;" >	
		<input type="text" id="cal_plan" name="cal_plan" readonly="" class="form-control input-lg"/>
</div>
<div id="cal_div" class="form-group form-inline" style="display: none;" tabindex="1">
<label>Total Energy Requirement:</label>
<span id="cal_label" ></span>
	<input type="hidden" id="cal" name="cal" class="form-control input-lg"  />
</div>
<div class="form-group">
<label>Select plan to be used:</label>	</div>
<div class="form-group " >
<select id="select_plan" name="select_plan" class="form-control input-lg">
 <option value="0" selected="" >--Select Plan--</option> 
      <?php

      foreach($results7 as $row7){
      	$select_plan_id= $row7->id;
		$select_plan= $row7->select_plan;
		echo "<option value=\"$select_plan_id\" >".$select_plan."</option>";
      }
	

	?>
	</select>
</div>
<div id="custom_plan_div" style="display: none;">
<div class="form-group " >
<label>Select Method of Macronutrient Distribution:</label></div>
<div class="form-group " >
		<select name="select_method" id="select_method" class="form-control input-lg" >
		<option value="0" >--Select Method of Macronutrient Distribution--</option> 

			  </select>
</div>
<div  id="pmethod_div" style="display: none;">
<div class="form-group ">
<label>Select percentage method:</label></div>
<div class="form-group ">
	<select name="select_pmethod" id="select_pmethod" class="form-control input-lg" >
          <option value="0" >--Select Percentage Method--</option> 

	  </select>
</div>
</div>
<div id="custom_div"  style="display: none;">
<div id="total_alert" class="alert alert-danger"  style="display: none;" ></div>
	<div class="form-group form-inline">
	<label>Custom:</label>
		<input type="text" id="cho_plan" class="form-control input-lg" placeholder="Enter Carbohydrates " style="width:20%;" maxlength="5" />
		<input type="text" id="pro_plan" class="form-control input-lg" placeholder="Enter Protein " style="width:20%;" maxlength="5" />
		<input type="text" id="fat_plan" class="form-control input-lg" placeholder="Enter fat " style="width:20%;" maxlength="5" />
		<input type="hidden" id="tot_plan" class="form-control input-lg"  style="width:20%;"   />
	</div>
</div>
<div id="npc_div" class="form-group"  style="display: none;">
	<label class="tip" id="standard_values"  for="Standard Values">Standard Values: </label> <span id="st_value_label" ></span>
<input type="hidden" id="st_value" name="st_value" class="form-control input-lg"  />
</div></div>
<div class="form-group" id="nut_div"  style="display: none;" >
<label class="tip" id="cho_tip"  for="Carbohyrates">Carbohydrates: </label> <span id="cho_label" ></span>
<input type="hidden" id="cho" name="cho" class="form-control input-lg" />
<div class="progress progress-striped">
   <div class="progress-bar progress-bar-success active" id="cho_meter" role="progressbar" >
      <span id="cho_bar"></span>
   </div>
</div>
 <label class="tip" id="pro_tip" for="Protein">Protein: </label>
 <span id="pro_label" ></span>
<input type="hidden" id="pro" name="pro" class="form-control" />
<div class="progress progress-striped">
   <div class="progress-bar progress-bar-warning active"  id="pro_meter" role="progressbar" >
      <span id="pro_bar"></span>
   </div>
</div>
<label class="tip" id="fat_tip" for="fat"  >Fat: </label> 
 <span id="fat_label" ></span>
<input type="hidden" id="fat" name="fat" class="form-control input-lg" />
 <div class="form-group form-inline ">
 <div class="progress progress-striped">
   <div class="progress-bar progress-bar-danger active" id="fat_meter" role="progressbar">
      <span id="fat_bar"></span>
   </div>
</div>
</div>
</div>
<div id="nut_alert" ></div>
<div  id="default_data" align="center" style="display: none;"  tabindex="1" >
	<!--<div id="default_fel" style="margin-bottom: 10px;"  >
	</div>-->
<div id="default_fel_data" >
</div>
<div id="default_meal" style="margin-bottom: 10px;" >
	</div>
<div id="default_meal_data"  >
</div>
</div>
<div class="form-group " align="center">
 <button id="save_nutrition_plan" class="btn btn-success btn-lg" style="width: 150px;"  data-client_id="<?php  echo $client_id; ?>" data-appointment_id="<?php  echo $appointment_id; ?>" > Save </button>
</div>
		</div>
			</div>
				
<?php $this->load->view('admin_footer'); ?>	

