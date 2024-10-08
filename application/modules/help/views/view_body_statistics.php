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
$lactation= $body_stats_id[0]->lactation





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
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"600\"  />";
		
			
		}else if($bmi_class == 'UNDERWEIGHT'){
			$a= base_url("assets/images/fast/bmi_female-1.svg");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"600\"  />";
				
		}else if($bmi_class == 'NORMAL'){
			$a= base_url("assets/images/fast/bmi_female-3.svg");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"600\"  />";		
			
		}
		else if($bmi_class == 'OVERWEIGHT'){
			$a= base_url("assets/images/fast/bmi_female-5.svg");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"600\"  />";
					

			
		}else if($bmi_class == 'OBESE'){
			$a= base_url("assets/images/fast/bmi_female-7.svg");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"600\"  />";
				
			
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
   <div class="progress-bar progress-bar-success active" id="cho_meter" role="progressbar" style="width:65%" >
      <span id="cho_bar">65%</span>
   </div>
</div>





 <label class="tip" id="pro_tip" for="Protein">Protein</label>
 <span id="pro_label" data-pro="<?php echo $protein; ?>"><?php echo $protein; ?> grams</span>





<div class="progress progress-striped">
   <div class="progress-bar progress-bar-warning active"  id="pro_meter" role="progressbar" style="width:15%">
      <span id="pro_bar" >15%</span>
   </div>
</div>




<label class="tip" id="fat_tip" for="fat"  > Fat </label> 
 <span id="fat_label"  data-fat="<?php echo $fat; ?>" ><?php echo $fat; ?> grams</span>

 <div class="form-group form-inline ">


 
 <div class="progress progress-striped">
   <div class="progress-bar progress-bar-danger active" id="fat_meter" role="progressbar" style="width:20%">
      <span id="fat_bar">20%</span>
   </div>
</div>
 
 
 
 <label class="tip"  for="cal"  >Calorie: </label> 
 <span  ><?php echo $cal; ?> grams</span>
 

 
 
 <div class="progress progress-striped">
  <div class="progress-bar progress-bar-info active" id="cal_meter1" role="progressbar" style="width:40%">
    <span  ><?php echo $cal; ?> kcal</span>
  </div>

</div>


</div>


</div>
					
				</div>
				
				  
              </div>
        
            	

                
				
				
           
          