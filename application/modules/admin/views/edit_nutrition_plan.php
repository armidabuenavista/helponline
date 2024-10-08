<?php $this->load->view('admin_header'); ?>	

  <style>
  	.badge{
	background-color: #d3592c;
	
}
  </style>



<?php $this->load->view('admin_navbar'); ?>	
<div class="container" >
	<div class="col-md-12" >
	 <h3  class="page-header"> <img  height="75" width="75" src="<?php echo base_url("assets/images/ncs.png"); ?>">Custom Plan</h3>
		<div class="container" style="margin-bottom:20px;">
	
    <?php $tb=count($crumb); for($c=0;$c<count($crumb);$c++){ if(($tb-$c)>1){?>
    <a href="<?php echo $crumb[$c]['link']?>"> <?php echo ucfirst($crumb[$c]['label']);?></a> /    <?php }else{ ?>

        <?php echo ucfirst($crumb[$c]['label']);?>

    <?php } }?>


			</div>
 
 <div class="col-md-6" >
		<p class="lead">Name of Client: <?php  echo $name; ?></p>
		<p class="lead">Age: <?php  echo $age_year; ?></p>
		<p class="lead" id="gender" data-gender="<?php  echo $gender; ?>">Gender: <?php  echo $gender."<br>"; ?></p>
		</div>
	 <div class="col-md-6" >
	<p class="lead">Date of Counseling: <?php  echo date("F d, Y",strtotime($approved_date)); ?></p>
	<p class="lead">Assigned RND: <?php  echo $assigned_rnd; ?></p>
		</div>	

<div class="col-md-12 ">
<div id="alert" tabindex="1" align="center"></div>
<div id="alert1" tabindex="1" align="center"></div>
<hr class="colorgraph"></hr>
<?php


		$wt_id =$results2[0]->wt_id ;
		$wt= $results2[0]->weight;
		$wt_unit= $results2[0]->weight_unit;
		$dbw= $results2[0]->dbw;
		$dbw_unit= $results2[0]->dbw_unit;
		$pa_lvl_id= $results2[0]->pa_lvl_id;
		$select_cal_plan_id= $results2[0]->select_cal_plan_id;
		$cal_plan= $results2[0]->cal_plan;
		$cal= $results2[0]->cal;
		$method_id= $results2[0]->method_id;
		$pmethod_id= $results2[0]->pmethod_id;
		$st_value = $results2[0]->st_value;
		$cho_custom= $results2[0]->cho_custom;
		$pro_custom= $results2[0]->pro_custom;
		$fat_custom= $results2[0]->fat_custom;
		$cho= $results2[0]->cho;
		$protein= $results2[0]->protein;
		$fat= $results2[0]->fat;
		$select_plan_id= $results2[0]->select_plan_id;
		$default_nutrition_id= $results2[0]->default_nutrition_id;
		$pregnant_lactating = $results2[0]->pregnant_lactating;


	if($numRows2>0 && $b<=$a){
		
		if($select_plan_id == 1){
			$display= "style=\"display:none;\"";
		}else{
			$display= "style=\"display:block;\"";

		}

		//$numrows = $db-> num_rows;
		
		if($cal_plan == 0){
			$readOnly= 'readonly=""';
		} else {
			$readOnly="";
		}

		?>

<div <?php  
		if($gender_id == 1){
			$display="style=\"display: none;\"";
		}else{
	
			
			$display="style=\"display: block;\"";
				
		}
		
		//echo $display;
		?>>


		

		<?php
		if($gender_id == 2){
		echo "<div class=\"form-group\">";
		echo "<label>Status:</label>";
		foreach($results9 as $row9){
			$pregnant= $row9->pregnant;
			$lactation = $row9->lactation;

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
			echo "<input type=\"hidden\" id=\"pregnant_lactating\" name=\"pregnant_lactating\" class=\"form-control\" value=\"$z\" />";
		echo "</div>";

		}else{
			echo "";
		}
		?>

	





<div class="form-group ">
<label> Select weight to be used:</label></div>
<div class="form-group ">
<select name="select_wt" id="select_wt" class="form-control input-lg" data-client_id="<?php  echo $client_id; ?>" data-appointment_id="<?php  echo $appointment_id; ?>">
            <?php
		
	foreach($results3 as $row3){
		$a= $row3->id;
		$b= $wt_id;
		$wt_type= $row3->weight_type;



		if($a==$b){
			$selectCurrent='selected';
		} else {
			$selectCurrent='';
				}

		echo "<option value=\"$a\" ".$selectCurrent.">".$wt_type."</option>";


	}

		?>
</select></div>



<div class="form-group ">
<strong>Weight:</strong><?php 
		
		if($wt_id == 1){
			
		if($wt_unit == "lbs"){
			$wt_kgs =  round(($wt / 2.2)*100)/100;
			echo " <span id=\"label_wt\">".$wt_kgs."</span>";
			echo "<span id=\"label_wt_unit\"> kgs</span>";
			}
		else{
			$wt_kgs= $wt;
			echo " <span id=\"label_wt\">".$wt_kgs."</span>";
			echo "<span id=\"label_wt_unit\"> kgs</span>";
			}
		} else {
			if($dbw_unit == "lbs"){
			$dbw_kgs = $dbw * 2.2;
			echo " <span id=\"label_wt\">".$dbw_kgs."</span>";
			echo "<span id=\"label_wt_unit\"> kgs</span>";
			}
		else{
			$dbw_kgs = $dbw;
			echo " <span id=\"label_wt\">".$dbw_kgs."</span>";
			echo "<span id=\"label_wt_unit\"> kgs</span>";
			}
			
			
		}

		?></div>
<input type="hidden" id="weight" name="weight" class="form-control input-lg" value="<?php 
		
	if($wt_id == 1){
			
		if($wt_unit == "lbs"){
			$wt_kgs =  round(($wt / 2.2)*100)/100;
			echo $wt_kgs;
			}
		else{
			$wt_kgs= $wt;
			echo $wt_kgs;
			}
		} else {
			if($dbw_unit == "lbs"){
			$dbw_kgs = $dbw * 2.2;
			echo $dbw_kgs;
			}
		else{
			$dbw_kgs = $dbw;
			echo $dbw_kgs;
			}
			
			
		}

		?>" />
<div class="form-group ">
            <label  title="Physical Level 
represents the degree of a person's daily physical activity as a number, and is applied to estimate a person's total energy expenditure. Together with the basal metabolic rate, it can be used to compute the energy a person needs in order to maintain a particular lifestyle. " for="PA level" >Physical Activity Level:</label></div>
<div class="form-group ">
   <select name="pa_lvl" id="pa_lvl" class="form-control input-lg">
           <option value="0" selected="" >--Select Physical Activity Level--</option> 
            <?php
			foreach($results4 as $row4){
		//$pa_lvl_id= $row4->id;
		$pa_lvl = $row4->pa_lvl;
		$pa_lvl_desc= $row4->pa_lvl_desc;
	
		$a=$row4->id;
		$b=$pa_lvl_id;

		if($a==$b){
				$selectCurrent='selected';
				$pa_lvl_val= $row4->pa_lvl_value;
			} else {
				$selectCurrent='';
			}

		echo "<option value=\"$a\" title=\"$pa_lvl_desc\" ".$selectCurrent."  >".$pa_lvl."</option>";

	}

			?>
      </select>  
		<input type="hidden" id="pa_lvl_val" name="pa_lvl_val" readonly="" class="form-control input-lg" value="<?php  echo $pa_lvl_val; ?>" />
          </div>
<div class="form-group ">
<label>Calories:</label></div>
<div class="form-group ">
	<select name="select_cal_plan" id="select_cal_plan" class="form-control input-lg" >
	    <?php
	foreach($results5 as $row5){
		
		$select_cal_plan= $row5->select_cal_plan;

		$a=$row5->id;
		$b=$select_plan_id;

		if($a==$b){
				$selectCurrent='selected';
				
			} else {
				$selectCurrent='';
			}
		echo "<option value=\"$select_plan_id\" ".$selectCurrent." >".$select_cal_plan."</option>";
		}
	
		?>
	</select></div>
	<div class="form-group ">	<input type="text" id="cal_plan" name="cal_plan" class="form-control input-lg" maxlength="5"  value="<?php  echo $cal_plan; ?>" <?php  echo $readOnly; ?>/> </div>
<div class="form-group ">
<label>Total Energy Requirement:</label>
<span id="cal_label" ><?php  echo $cal . " kcal"; ?></span>
	<input type="hidden" id="cal" name="cal" class="form-control input-lg" value="<?php  echo $cal; ?>" />
</div>
<div class="form-group ">
<label>Select plan to be used:</label>	</div>
<div class="form-group ">
<select id="select_plan" name="select_plan" class="form-control input-lg">
 <option value="0"  >--Select Plan--</option> 
      <?php


      foreach($results6 as $row6){
      	$a= $row6->id;
      	$b= $select_plan_id;

		$select_plan= $row6->select_plan;

		if($a==$b){
				$selectCurrent="selected=\"\"";
			} else {
				$selectCurrent='';
			}


		echo "<option value=\"$a\" ".$selectCurrent." >".$select_plan."</option>";
      }


		?>
	</select>
</div>
<div id="custom_plan_div" <?php echo $display; ?>>
<div class="form-group ">
<label>Select Method of Macronutrient Distribution:</label></div>
	<div class="form-group ">	<select name="select_method" id="select_method" class="form-control input-lg" >
		<option value="0" >--Select Method of Macronutrient Distribution--</option> 
	<?php
	 foreach($results7 as $row7){
      	$a= $row7->id;
      	$b= $method_id;

		$method= $row7->method;

		if($a==$b){
				$selectCurrent="selected=\"\"";
			} else {
				$selectCurrent='';
			}


		echo "<option value=\"$a\" ".$selectCurrent." >".$method."</option>";
      }

		?>  
			  </select>
</div>
<div  id="pmethod_div" <?php 
		
		if($method_id == "" || $method_id == 2){
			echo  "style=\"display: none;\"";
		}

		?>>
	<div class="form-group ">
<label>Select percentage method:</label></div>
<div class="form-group ">
	<select name="select_pmethod" id="select_pmethod" class="form-control input-lg " >
          <option value="0" >--Select Percentage Method--</option> 
            <?php
		 foreach($results8 as $row8){
      		$a= $row8->id;
      		$b= $pmethod_id;
			$pmethod= $row8->pmethod;

		if($a==$b){
				$selectCurrent="selected=\"\"";
			} else {
				$selectCurrent='';
			}


		echo "<option value=\"$a\" ".$selectCurrent." >".$pmethod."</option>";
      }

		?>
	  </select>
		</div>
</div>
<div id="custom_div" <?php 
		
		if($pmethod_id == 2){
			echo  "style=\"display: block;\"";
		} else {
			echo  "style=\"display: none;\"";
		}

		?>>
<div id="total_alert" class="alert alert-danger" style="display: none;"></div>
	<div class="form-group">
	<label>Custom:</label></div>
	<div class="form-group form-inline">
		<input type="text" id="cho_plan" class="form-control input-lg" placeholder="Enter Carbohydrates " style="width:20%;" maxlength="5" value="<?php  echo $cho_custom; ?>" />
		<input type="text" id="pro_plan" class="form-control input-lg" placeholder="Enter Protein " style="width:20%;" maxlength="5"  value="<?php  echo $pro_custom; ?>" />
		<input type="text" id="fat_plan" class="form-control input-lg" placeholder="Enter fat " style="width:20%;" maxlength="5"  value="<?php  echo $fat_custom; ?>" />
		<input type="hidden" id="tot_plan" class="form-control input-lg"  style="width:20%;"   />
		</div>
	</div>
</div>
<div id="npc_div" <?php 
		
		if($st_value == 0){
			echo  "style=\"display: none;\"";
		}

		?> class="form-group">
	<label class="tip" id="standard_values"  for="Standard Values">Standard Values: </label> <span id="st_value_label" >
		<?php
		
		if($st_value != 0){
			echo $st_value;
		} else {
			echo "";
		}

		?>
	</span>
<input type="hidden" id="st_value" name="st_value" class="form-control input-lg" value="<?php  echo $st_value; ?>"  />
</div>
<div class="form-group" id="nut_div"<?php 
		
		if($select_plan_id == 0){
			echo  "style=\"display: none;\"";
		}

		?> >
<label class="tip" id="cho_tip"  for="Carbohyrates" title="<?php  echo  $cho." "."grams"; ?>">Carbohydrates: </label> <span id="cho_label" ><?php  echo $cho. " grams"; ?></span>
<input type="hidden" id="cho" name="cho" class="form-control input-lg" value="<?php  echo $cho; ?>"/>
<div class="progress progress-striped">
   <div class="progress-bar progress-bar-success active " id="cho_meter" role="progressbar" 
 <?php 
		
		if($pmethod_id ==2){
			$a= $cho_custom."%";
			echo  "style=\"width: $a;\"";
		} else {
			echo  "style=\"width: 65%;\"";
		}

		?>  
  >
      <span id="cho_bar"><?php 
		
		if( $pmethod_id == 2 ){
			echo $cho_custom."%";
		} else {
			echo  "65%";
		}

		?>  </span>
   </div>
</div>
 <label class="tip" id="protein" for="Protein" title="<?php  echo  $protein." "."grams"; ?>">Protein: </label>
 <span id="pro_label" ><?php  echo $protein. " grams"; ?></span>
<input type="hidden" id="pro" name="pro" class="form-control" value="<?php  echo $protein; ?>"/>
<div class="progress progress-striped">
   <div class="progress-bar progress-bar-warning active "  id="pro_meter" role="progressbar" 
  <?php 
		
		if($pmethod_id ==2 ){
			$a= $pro_custom."%";
			echo  "style=\"width: $a;\"";
		} else {
			echo  "style=\"width: 15%;\"";
		}

		?>   >
      <span id="pro_bar"><?php 
		
		if( $pmethod_id ==2 ){
			echo $pro_custom."%";
		} else {
			echo  "15%";
		}

		?> </span>
   </div>
</div>
<label class="tip" id="fat_tip" for="fat" title="<?php  echo $fat." "."grams"; ?>"  >Fat: </label> 
 <span id="fat_label" ><?php  echo $fat. " grams"; ?></span>
<input type="hidden" id="fat" name="fat" class="form-control" value="<?php  echo $fat; ?>"/>
 <div class="form-group form-inline ">
 <div class="progress progress-striped">
   <div class="progress-bar progress-bar-danger active" id="fat_meter" role="progressbar" 
  <?php 
		
		if($pmethod_id ==2 ){
			$a= $fat_custom."%";
			echo  "style=\"width: $a;\"";
		} else {
			echo  "style=\"width: 20%;\"";
		}

		?>   >
      <span id="fat_bar"><?php 
		
		if($pmethod_id ==2 ){
			echo $fat_custom."%";
		} else {
			echo  "20%";
		}

		?></span>
   </div>
</div>
</div>
</div>

<div id="nut_alert" ></div>
<div  id="default_data" align="center" <?php 
		
		if($select_plan_id == 1){
			echo "	style=\"display: block;\"";
		} else {
			echo "style=\"display: none;\"";
		}

		?> tabindex="1" >
	
<div id="default_fel_data">
</div>
<div id="default_meal" style="margin-bottom: 10px;" >
			[<a href="#" class="data_meal" <?php  echo "data-id=\"$default_nutrition_id\""; ?> onclick="d_meal_data();">Show Meal Plan</a>]
	</div>
<div id="default_meal_data"  >
</div>
</div>

<div class="form-group form-inline">
 <button id="edit_nutrition_plan" name="edit_nutrition_plan" class="btn btn-success btn-lg" data-client_id="<?php  echo $client_id; ?>" data-appointment_id="<?php  echo $appointment_id; ?>"  > Update </button>

</div>
</div>
<?php
	
}else{
	if($b>$a){
		echo "<div class=\"col-md-12\">";
		echo "<div class=\"alert alert-danger\">No Records Found</div>";
		echo "</div>";
	}
}

	?>
</div>
</div></div>

<?php $this->load->view('admin_footer'); ?>	