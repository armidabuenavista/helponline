<!-- MAIN CONTENT -->
	
<?php 

$id = $body_stats_id[0]->id;
$wt= $body_stats_id[0]->weight;
$wt_unit= $body_stats_id[0]->weight_unit;
$ht= $body_stats_id[0]->height;
$ht_unit= $body_stats_id[0]->height_unit;
$bmi= $body_stats_id[0]->bmi;
$bmr= 	$body_stats_id[0]->bmr;
$bmi_class= $body_stats_id[0]->bmi_classification;
$waist_c= $body_stats_id[0]->waist_c;
$waist_unit= $body_stats_id[0]->waist_unit;
$hip_c= $body_stats_id[0]->hip_c;
$hip_unit = $body_stats_id[0]->hip_unit;
$risk_indicator= $body_stats_id[0]->risk_indicator;
$dbw= $body_stats_id[0]->dbw;
$lwr_lmt= $body_stats_id[0]->lwr_lmt;
$uppr_lmt= $body_stats_id[0]->uppr_lmt;
$whipr= $body_stats_id[0]->whipr;
$whipr_class= $body_stats_id[0]->whipr_classification;
$whtr= $body_stats_id[0]->whtr;
$whtr_class= $body_stats_id[0]->whtr_classification;
$pa_lvl_id= $body_stats_id[0]->pa_lvl_id;
$cho= $body_stats_id[0]->cho;
$protein= $body_stats_id[0]->protein;
$fat= $body_stats_id[0]->fat;
$cal= $body_stats_id[0]->cal;
$ask_pregnant= $body_stats_id[0]->pregnant;
if($ask_pregnant == 1){
						$pregnant= "Yes";
					}else{
						$pregnant = "No";
					}
$ask_gestation= $body_stats_id[0]->gestation;
$mens_date= $body_stats_id[0]->last_mens_date;
$gestational_wks= $body_stats_id[0]->gestational_weeks;	
$lactation= $body_stats_id[0]->lactation;


if($numRows > 0 ){


?>



<!-- Begin Body -->
<div  class="container" style="margin-top: 20px;">
	<div class="row">
  			
      		<div class="col-md-9">
            
			
           <!--   <h2>Nutrition Assessment</h2>-->
              
              <div  class="row">
			  	
				
				    	<div class="col-md-6">
				<div id="bmi_img" tabindex="1" style=" text-align: center; vertical-align: middle;">
					
				<?php 

				if($age_year >=0 && $age_year <= 2){
	if($gender == 1){
	
		if($bmi_class == 'SEVERE THINNESS'){
				$a= base_url("assets/images/fast/02-2-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
		
			
		}else if($bmi_class == 'UNDERWEIGHT'){
				$a= base_url("assets/images/fast/02-2-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
				
		}else if($bmi_class == 'NORMAL'){
				$a= base_url("assets/images/fast/02-3-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";		
			
		}
		else if($bmi_class == 'OVERWEIGHT'){
				$a= base_url("assets/images/fast/02-4-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
					

			
		}else if($bmi_class == 'OBESE'){
				$a= base_url("assets/images/fast/02-4-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
				
			
		}
		
		
}else{
	
	
	if($bmi_class == 'SEVERE THINNESS'){
			$a= base_url("assets/images/fast/02-4-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
		
			
		}else if($bmi_class == 'UNDERWEIGHT'){
				$a= base_url("assets/images/fast/02-2-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
				
		}else if($bmi_class == 'NORMAL'){
				$a= base_url("assets/images/fast/02-3-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";		
			
		}
		else if($bmi_class == 'OVERWEIGHT'){
				$a= base_url("assets/images/fast/02-4-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
					

			
		}else if($bmi_class == 'OBESE'){
			$a= base_url("assets/images/fast/02-4-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
				
			
		}
	
	
	
}




}else if($age_year >=3 && $age_year <= 12){
		if($gender == 1){
	
	if($bmi_class == 'SEVERE THINNESS'){
		$a= base_url("assets/images/fast/312-2-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
		
			
		}else if($bmi_class == 'UNDERWEIGHT'){
			$a= base_url("assets/images/fast/312-2-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
				
		}else if($bmi_class == 'NORMAL'){
			$a= base_url("assets/images/fast/312-3-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";		
			
		}
		else if($bmi_class == 'OVERWEIGHT'){
			$a= base_url("assets/images/fast/312-4-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
					

			
		}else if($bmi_class == 'OBESE'){
			$a= base_url("assets/images/fast/312-4-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
				
			
		}

}else{
	
	
	if($bmi_class == 'SEVERE THINNESS'){
		$a= base_url("assets/images/fast/312-2-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
		
			
		}else if($bmi_class == 'UNDERWEIGHT'){
			$a= base_url("assets/images/fast/312-2-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
				
		}else if($bmi_class == 'NORMAL'){
			$a= base_url("assets/images/fast/312-3-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";		
			
		}
		else if($bmi_class == 'OVERWEIGHT'){
			$a= base_url("assets/images/fast/312-4-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
					

			
		}else if($bmi_class == 'OBESE'){
				$a= base_url("assets/images/fast/312-4-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
				
			
		}
	
	
}
	
	
	
	
}else if($age_year >=13 && $age_year <= 18){
	
	if($gender == 1){
	
	if($bmi_class == 'SEVERE THINNESS'){
			$a= base_url("assets/images/fast/1318-2-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
		
			
		}else if($bmi_class == 'UNDERWEIGHT'){
				$a= base_url("assets/images/fast/1318-2-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
				
		}else if($bmi_class == 'NORMAL'){
				$a= base_url("assets/images/fast/1318-3-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";		
			
		}
		else if($bmi_class == 'OVERWEIGHT'){
				$a= base_url("assets/images/fast/1318-4-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
					

			
		}else if($bmi_class == 'OBESE'){
			$a= base_url("assets/images/fast/1318-4-1.png");
			
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
				
			
		}

}else{
	
	
	if($bmi_class == 'SEVERE THINNESS'){
		$a= base_url("assets/images/fast/1318-2-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
		
			
		}else if($bmi_class == 'UNDERWEIGHT'){
			$a= base_url("assets/images/fast/1318-2-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
				
		}else if($bmi_class == 'NORMAL'){
			$a= base_url("assets/images/fast/1318-3-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";		
			
		}
		else if($bmi_class == 'OVERWEIGHT'){
			$a= base_url("assets/images/fast/1318-4-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
					

			
		}else if($bmi_class == 'OBESE'){
			$a= base_url("assets/images/fast/1318-4-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
				
			
		}
	
	
	
}
	
	

	
}else{
	if($gender == 1){


		if($bmi_class == 'SEVERE THINNESS'){
			$a= base_url("assets/images/fast/bmi_male-1.svg");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"600\"  />";
		
			
		}else if($bmi_class == 'UNDERWEIGHT'){
			$a= base_url("assets/images/fast/bmi_male-1.svg");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"600\"  />";
				
		}else if($bmi_class == 'NORMAL'){
			$a= base_url("assets/images/fast/bmi_male-3.svg");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"600\"  />";		
			
		}
		else if($bmi_class == 'OVERWEIGHT'){
			$a= base_url("assets/images/fast/bmi_male-5.svg");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"600\"  />";
					

			
		}else if($bmi_class == 'OBESE'){
			$a= base_url("assets/images/fast/bmi_male-7.svg");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"600\"  />";
				
			
		}
		
		
		
		
		
		
	}else{
		
		
		if($bmi_class == 'SEVERE THINNESS'){
			$a= base_url("assets/images/fast/bmi_female-1.svg");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
		
			
		}else if($bmi_class == 'UNDERWEIGHT'){
			$a= base_url("assets/images/fast/bmi_female-1.svg");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
				
		}else if($bmi_class == 'NORMAL'){
			$a= base_url("assets/images/fast/bmi_female-3.svg");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";		
			
		}
		else if($bmi_class == 'OVERWEIGHT'){
			$a= base_url("assets/images/fast/bmi_female-5.svg");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
					

			
		}else if($bmi_class == 'OBESE'){
			$a= base_url("assets/images/fast/bmi_female-7.svg");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";
				
			
		}
		
		
	}
	
	
	
	
	
	
	
}
			


				
					

				?>
					
				</div>
               
				 
				 
                </div> 
        		<div class="col-md-6">
				
				<div id="weight_stats_div" >
			<h1>Body Statistics</h1>
					<hr class="colorgraph"></hr>
				  <li class="list-group-item list-group-item ">
    <span id="weight" class="stats-label badge" ><?php echo $pregnant; ?> </span>
    <label for="Pregnant"  class="stats-label">Pregnant:</label>
  </li>

    <li class="list-group-item list-group-item ">
    <span id="gestational_weeks" class="stats-label badge" ><?php echo $gestational_wks; ?> </span>
    <label for="Gestational_weeks"  class="stats-label">Gestational Weeks:</label>
  </li>
		<ul class="list-group">
  <li class="list-group-item list-group-item list-group-item-success">
    <span id="bmi" class="stats-label badge" data-bmi="<?php echo $bmi; ?>"> <?php echo $bmi; ?> kg/ m<sup>2</sup> </span>
    <label for="Body Mass Index"  class="stats-label">BMI:</label>
  </li>
  
  <li class="list-group-item list-group-item list-group-item-warning">
    <span id="bmr" class="stats-label badge" data-bmr="<?php echo $bmr; ?>"> <?php echo $bmr; ?> </span>
    <label for="Basal Metabollic Rate" class="stats-label">Basal Metabollic Rate:</label>
  </li>
  
  
  <li class="list-group-item">
   <span id="bmi_class" class="stats-label badge" data-bmi_class="<?php echo $bmi_class; ?>"><?php echo $bmi_class; ?> </span>
   <label for="BMI Classification"  class="stats-label">BMI Classification:</label>
  </li>
  
  
  
  <li class="list-group-item">
   <span id="dbw" class="stats-label badge" data-dbw="<?php echo $dbw; ?>"><?php echo $dbw; ?> kgs </span>
  <label for="DBW" class="stats-label">Desirable Body Weight:</label>
  </li> 
  
  
  
 
  <li class="list-group-item">
  		 <span id="dbw_hwr" class="stats-label" > Keep weight within this range <strong> <?php  echo $lwr_lmt."-".$uppr_lmt; ?></strong> </span>
				
  </li>
  
  
  
</ul>		
					
				

				 
	
				 	</div>
					
					
					<div id="waist_stats_div" >
				 
				 
				 <ul class="list-group">
  <li class="list-group-item list-group-item list-group-item-success">
     <span id="risk_indicator" class="stats-label badge" data-risk_indicator=" <?php echo $risk_indicator; ?>"> <?php echo $risk_indicator; ?> </span>
   <label for="Risk indicator"  class="stats-label">Risk Indicator:</label>
  </li>
  
   <li class="list-group-item ">
     <span id="whipr" class="stats-label badge" data-whipr="<?php echo $whipr; ?>"> <?php echo $whipr; ?></span>
    <label for="Waist hip ratio"  class="stats-label">Waist Hip Ratio:</label>
  </li>
  
  
  <li class="list-group-item ">
      <span id="whipr_class" class="stats-label badge" data-whipr_class="<?php echo $whipr_class; ?>"><?php echo $whipr_class; ?> </span>
   
	
	 <label for="Waist hip ratio classification"  class="stats-label">Waist-hip ratio Classification:</label>
				
  </li>
  
  
    <li class="list-group-item ">
      <span id="whtr" class="stats-label badge" data-whtr="<?php echo $whtr; ?>"><?php echo $whtr; ?>  </span>
	
	<label for="Waist height ratio"  class="stats-label">Waist Height Ratio:</label>
				
  </li>
  
  
  
     <li class="list-group-item ">
       <span id="whtr_class" class="stats-label badge" data-whtr_class="<?php echo $whtr_class; ?>"><?php echo $whtr_class; ?> </span>
	
	 <label for="Waist height ratio classification"  class="stats-label">Waist-height ratio Classification:</label>
				
  </li>
  
  
  </ul>

				  
				  </div>
              	</div> 
				
				<div class="col-md-12">
					
					
					<div  id="nutrition_div" tabindex="1"  >

<label class="tip" id="cho_tip"  for="Carbohyrates">Carbohydrates </label> 
 <span id="cho_label" data-cho="<?php echo $cho; ?>" ><?php echo $cho; ?> grams</span>


<div class="progress progress-striped">
   <div class="progress-bar progress-bar-success active" id="cho_meter" role="progressbar" >
      <span id="cho_bar">65%</span>
   </div>
</div>





 <label class="tip" id="pro_tip" for="Protein">Protein</label>
 <span id="pro_label" data-pro="<?php echo $protein; ?>"><?php echo $protein; ?> grams</span>





<div class="progress progress-striped">
   <div class="progress-bar progress-bar-warning active"  id="pro_meter" role="progressbar" >
      <span id="pro_bar" >15%</span>
   </div>
</div>




<label class="tip" id="fat_tip" for="fat"  > Fat </label> 
 <span id="fat_label"  data-fat="<?php echo $fat; ?>" ><?php echo $fat; ?> grams</span>

 <div class="form-group form-inline ">


 
 <div class="progress progress-striped">
   <div class="progress-bar progress-bar-danger active" id="fat_meter" role="progressbar">
      <span id="fat_bar">20%</span>
   </div>
</div>
 
 
 <label class="tip" id="cal_tip" for="cal"  > Calorie </label> 
 <span id="cal_label" data-cal="<?php echo $cal; ?>" ><?php echo $cal; ?> grams</span>
 
 
 

</div>


</div>
					
				</div>
				
				  
              </div>
        
            	<h2 >Nutrition Assessment</h2>
				<hr></hr>
				
				<div id="alert" tabindex="1"></div>
				<form name="form" id="form" method="POST">
				
				
			  <div class="form-group ">
       <input type="hidden" id="gender" name="gender" class="form-control" value="<?php echo $gender;?>" />
           
             
          </div>	
		    <div class="form-group ">
      <input type="hidden" id="dob" name="dob" class="form-control" value="<?php echo date("m-d-Y", strtotime($birthday)); ?>" />
	  </div>
	    <div class="form-group ">
           
            <input type="hidden" class="form-control " id="yrs" name="yrs" value="<?php echo $age_year; ?>" />
			
			</div>
			 <div class="form-group ">
    <input type="hidden" class="form-control" id="mos" name="mos" value="<?php echo $age_month; ?>" />   
          </div>	
				
          

             	
               <div class=" form-group form-inline">
<label for="Weight" >Weight:</label></div>
<div class=" form-group slider margin ">
		   <input type="range" id="wtRange" name="wtRange"   oninput="this.form.wt.value=this.value"  step="0.1" <?php if($wt_unit == "kgs"){echo "min=\"30\"";echo "max=\"500\""; }
			else{
			echo "min=\"66\"";echo "max=\"1100\"";
				} ?>  value="<?php   echo $wt; ?>" />
		</div>


                  <div class="form-group form-inline">
      
               <input type="number" name="wt" id="wt"  class="form-control input-lg"  maxlength="5" required=""   oninput="this.form.wtRange.value=this.value" step="0.1" min="30" max="500" value="<?php echo $wt;?>">
      <select  name="wt_opt" id="wt_opt"  class="form-control input-lg"  >
	  <option value="kgs" <?php if($wt_unit == "kgs"){
	echo "selected= \"selected\"";
			   }
			   else{
			   	echo "";
			   }

			   ?> >kilograms</option>
     <option value="lbs" <?php if($wt_unit == "lbs"){
		echo "selected= \"selected\"";   	
			   }
			   else{
			   	echo "";
			   }
			   ?>>pounds</option>
	
        
        </select>
              </div>
        
		  
		  
          <div class=" form-group ">
		      <label  for="Height">Height:</label>  </div>
			  
			  
			 <div class=" form-group "> 
	   <input type="range" id="htRange" name="htRange" min="140" max="243.8" oninput="this.form.ht.value=this.value"   step="0.1"  onchange="ht_conv(3);" value="<?php if($ht){
		   echo $ht;	   	
			   }
			   else{
			   	echo "140";
			   }
			?>" />
	   </div>
	



		  <div class="form-group form-inline ">
		
       
              <input type="number" name="ht" id="ht" oninput="this.form.htRange.value=this.value"   class="form-control input-lg" required="" maxlength="5"  style=" width: 140px;"   step="0.1" onchange="ht_conv(3);" value="<?php if($ht){
		   echo $ht;	   	
			   }
			   else{
			   	echo "140";
			   }

			   ?>" />cm
         
			<input type="number" name="ht_ft" id="ht_ft"  class="form-control input-lg" size="5" style=" width: 80px"  step="0.1"   onchange="ht_conv(1);"   />ft
			
			<input type="number" name="ht_in" id="ht_in" class="form-control input-lg" size="5"  style=" width: 80px" step="0.1"   onchange="ht_conv(2);"   />in
			  
			      </div>
				
				
			<div id="female_div" <?php  
		if($gender == 1){
			$display="style=\"display: none;\"";
		}else{
	
			
			$display="style=\"display: block;\"";
				
		}
		
		echo $display;
		?>  >
		
			<?php if($ask_pregnant == 1){
				$checked= "checked=\"\"";
			}else{
				$checked= "";
			} 

			?>
		
		  	<div class="form-group form-inline" style="font-size: 18px;" >Are you <input type="radio" id="ask_pregnant" name="ask_pregnant" value="1" <?php if($ask_pregnant == 1){
				$checked= "checked=\"\"";
			}else{
				$checked= "";
			} 
echo $checked;
			?>/> <strong>Pregnant</strong> <input type="radio" id="ask_pregnant" name="ask_pregnant" value="0"  <?php if($ask_pregnant == 0){
				$checked= "checked=\"\"";
			}else{
				$checked= "";
			} 
echo $checked;
			?> /><strong>Not</strong> ? </div> 
			</div>
			
			
			<div id="ask_lactation_div" <?php  
		if($gender == 1){
			$display="style=\"display: none;\"";
		}else{
	
			
			$display="style=\"display: block;\"";
				
		}
		
		echo $display;
		?>>
		  	<div class="form-group form-inline" style="font-size: 18px;">
			Are you lactating? <input type="radio" id="ask_lactation" name="ask_lactation" value="1" <?php if($lactation == 1){
				$checked= "checked=\"\"";
			}else{
				$checked= "";
			} 
echo $checked;
			?>/> <strong>Yes</strong> <input type="radio" id="ask_lactation" name="ask_lactation" value="0" <?php if($lactation == 0){
				$checked= "checked=\"\"";
			}else{
				$checked= "";
			} 
echo $checked;
			?> /><strong>No</strong> 
			</div>
			
			
			
			
		  </div>
			
			
		
			<div id="ask_gestation_div" <?php  
		if($gender == 1){
			$display="style=\"display: none;\"";
		}else{
	
			
			$display="style=\"display: block;\"";
				
		}
		
		echo $display;
		?>>
		  	<div class="form-group">
				<div style="font-size: 18px;" class="form-group form-inline" >Do you know your gestational weeks? <input type="radio" id="ask_gestation" name="ask_gestation" value="1" <?php if($ask_gestation == 1 ){
				$checked= "checked=\"\"";
			}else{
				$checked= "";
			} 
echo $checked;
			?> /> <strong>Yes</strong> <input type="radio" id="ask_gestation" name="ask_gestation" value="0" <?php if($ask_gestation == 0){
				$checked= "checked=\"\"";
			}else{
				$checked= "";
			} 
echo $checked;
			?> /><strong>No</strong> </div> 
			</div>
			
			
			
			
		  </div>
		  
		  	
				
		<div id="mens_div" <?php  
		if($gender==2 && $ask_gestation == 0){
			$display="style=\"display: block;\"";
			
		}else{
	
			
			$display="style=\"display: none;\"";
				
		}
		
		echo $display;
		?>>
			<div class="form-group">
				<label>Last Menstrual Period:</label>
			</div>
			
			
		
			<div  class="form-group">
				
				<input type="text" id="mens_date" name="mens_date" class="form-control input-lg" placeholder="Menstrual Period"  value="<?php echo $mens_date; ?>" />
			</div>
			</div>
			
			<div id="gestation_div" <?php  
		if($ask_gestation == 1){
			$display="style=\"display: block;\"";
		}else{
	
			
			$display="style=\"display: none;\"";
				
		}
		
		echo $display;
		?>>
			<div class="form-group" >
				<label>Weeks of Gestation:</label>
			</div>
			
			<div class="form-group">
				
				<input type="text" id="gestation_wks" name="gestation_wks" class="form-control input-lg"  placeholder="Gestation" value="<?php echo $gestational_wks; ?>" />
			</div>
			</div>	
				  
			<div class="form-group "  >
            <label  title="Physical Level 
represents the degree of a person's daily physical activity as a number, and is applied to estimate a person's total energy expenditure. Together with the basal metabolic rate, it can be used to compute the energy a person needs in order to maintain a particular lifestyle. " for="PA level" >Physical Activity Level:</label>  </div>  

<div class="form-group "  >
	<select name="pa_lvl" id="pa_lvl" class="form-control input-lg" >
              
           <option value="0" >--Select Physical Activity Level--</option> 
          <?php 

            foreach($groups as $row)
            { 	
            	$pa_lvl_val= $row->pa_lvl_value;

            	if($row->id==$pa_lvl_id){
	
		
        $selectCurrent='selected';
    }else{
		
        $selectCurrent='';
    }



              echo '<option value="'.$row->id.'" '.$selectCurrent.'>'.$row->pa_lvl.'</option>';
            }
            ?>
			  </select>
  		  
		
		<input type="hidden" id="pa_lvl_val" name="pa_lvl_val" readonly="" class="form-control input-lg" value="<?php echo 
		$pa_lvl_val; ?>" />
          </div>	
		  
		  <div class="col-md-12">
		  	<div class="col-md-6">
				<div id="pa_lvl_img" ></div>	
			</div>
		  	<div class="col-md-6">
				<div id="pa_lvl_desc"></div>	
				
			</div>
			
			
			
		  </div>  
		  
				  
				  
			   <div class=" form-group    ">
			<label for="Waist Circumference"  title="Waist circumference measurementshould be made at the approximate midpoint between the lower   of the last palpable rib and the top of the iliac crest. Waist circumference is a reliable indicator of obesity and increased risk of lifestyle diseases. Waist-to-hip ratio is also being used for the same purpose, but research has shown that using only the waist measurement gives you the same level of information. ">Waist Circumference:</label>
		 </div> 
		
		<div id="waistRange_div"  class=" form-group    ">
	  		 <input type="range" id="waistRange" name="waistRange" <?php if($waist_unit == "in"){echo "min=\"20\"";echo "max=\"70.9\""; }
			else{
			echo "min=\"50.8\"";echo "max=\"180\"";
				} ?> value="<?php  echo $waist_c;	?>" oninput="this.form.wc.value=this.value"   step="0.1"  />
	   </div>
	
	 	<div class="form-group form-inline  ">
			<input type="number" name="wc" id="wc"  class="form-control input-lg" required=""  oninput="this.form.waistRange.value=this.value" step="0.1"  <?php if($waist_unit == "in"){echo "min=\"20\"";echo "max=\"70.9\""; }
			else{
			echo "min=\"50.8\"";echo "max=\"180\"";
				} ?> value="<?php  echo $waist_c;	?>"  />
				<select name="wc_opt" id="wc_opt"   class="form-control input-lg">
<option value="in" <?php if($waist_unit == "in"){
	echo "selected= \"selected\"";
	
			   }
			   else{
			   	echo "";
			   }
			   
			   
			   ?> >inches</option>
<option value="cm" <?php if($waist_unit == "cm"){
	echo "selected= \"selected\"";
			   }
			   else{
			   	echo "";
			   }
			   
			   
			   ?>>centimeters</option>
			</select>
          
          </div>	
	
	
		<div class=" form-group    ">
			<label for="Hip Circumference" title="Hip circumference measurement should be taken around the widest portion of the buttocks. In addition to waist measurement, hip is measured to derive a Waist-Hip Ratio which is a useful tool in assessing risk of having Non-communicable diseases. "> Hip Circumference:</label> </div>

		<div id="hipRange_div" class=" form-group    ">
	   		<input type="range" id="hipRange" name="hipRange" <?php if($hip_unit == "in"){echo "min=\"20\"";echo "max=\"70.9\""; }
			else{
			echo "min=\"50.8\"";echo "max=\"180\"";
				} ?> value="<?php  echo $hip_c;?>" oninput="this.form.hc.value=this.value"   step="0.1" />
	   </div>
	   
		 <div class="form-group form-inline  ">
       			<input type="number" name="hc" id="hc" class="form-control input-lg"  required="" step="0.1" value="<?php echo $hip_c; ?>" <?php if($hip_unit == "in"){echo "min=\"20\"";echo "max=\"70.9\""; }
			else{
			echo "min=\"50.8\"";echo "max=\"180\"";
				} ?> >
					<select name="hc_opt" id="hc_opt" class="form-control input-lg"   >
<option value="in"  <?php if($hip_unit == "in"){
	echo "selected= \"selected\"";
	
			   }
			   else{
			   	echo "";
			   }
			   ?>>inches</option>
<option value="cm" <?php if($hip_unit == "cm"){
	echo "selected= \"selected\"";
	
			   }
			   else{
			   	echo "";
			   }
			   ?>>centimeters</option>
				</select>
           
 			</div>		  
				  	  
				  
				
			 <div class="form-group" align="center">
			
			   <input type="hidden" id="id" name="id" class="form-control" value="<?php echo $id; ?>" />
			 	<button id="update_stat" name="update_stat" class="btn btn-danger btn-lg"> <span class="glyphicon glyphicon-apple"></span> Update Your Statistics </button>
				
			 </div>
              
			  
			  </form>
                	
			
            	</div> 
  	</div>
</div>

<?php 
}else{

echo "<div class=\"alert alert-danger\"> No available body statistics. </div>";
}
?>

                
				
				
           
          