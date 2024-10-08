<?php $this->load->view('admin_header'); ?>	

<style>
sub{
	font-size:10px;
}
	
	.col-xs-8{
		 display: table-cell;
	}
	
</style>



<?php $this->load->view('admin_navbar'); ?>	

	
<div class="container" >  
<div class="col-md-12" >


	 <h3 class="page-header"> <img  height="75" width="75" src="<?php echo base_url("assets/images/ncs.png"); ?>">Anthropometry</h3>
    	

	
			<div class="container" style="margin-bottom:20px;">
	
    <?php $tb=count($crumb); for($c=0;$c<count($crumb);$c++){ if(($tb-$c)>1){?>
    <a href="<?php echo $crumb[$c]['link']?>"> <?php echo ucfirst($crumb[$c]['label']);?></a> /    <?php }else{ ?>

        <?php echo ucfirst($crumb[$c]['label']);?>

    <?php } }?>


			</div>
		
	


 <div class="col-md-6" >
		<p class="lead">Name of Client: <?php  echo $name; ?></p>
		<p class="lead">Age: <?php  echo $age_year; ?></p>
		<p class="lead" data-gender="<?php  echo $gender; ?>">Gender: <?php  echo $gender."<br>"; ?></p>
		</div>
	 <div class="col-md-6" >
	<p class="lead">Date of Counseling: <?php  echo date("F d, Y",strtotime($approved_date)); ?></p>
	<p class="lead">Assigned RND: <?php  echo $assigned_rnd; ?></p>
		</div>	

					
		

  <div  class="col-md-12 table-responsive" >
  
  
  
  		<?php

	//foreach ($results3 as $row3) {



$weight= $results3[0]->weight;
$weight_unit= $results3[0]->weight_unit;
$height=$results3[0]->height;
$height_unit=$results3[0]->height_unit;
$bmi= $results3[0]->bmi;
$bmi_class=$results3[0]->bmi_classification;
$ask_pregnant= $results3[0]->pregnant;
$ask_gestation= $results3[0]->gestation;
$mens_date= $results3[0]->last_mens_date;
$gestation_wks= $results3[0]->gestational_weeks;	
$lactation= $results3[0]->lactation;
$dbw=$results3[0]->dbw;
$dbw_unit=$results3[0]->dbw_unit;
$lwr_lmt= $results3[0]->lwr_lmt;
$uppr_lmt=$results3[0]->uppr_lmt;
$lmt_unit=$results3[0]->lmt_unit;
$waist_c=$results3[0]->waist_c;
$waist_unit=$results3[0]->waist_unit;
$risk_indicator=$results3[0]->risk_indicator;
$hip_c=$results3[0]->hip_c;
$hip_unit=$results3[0]->hip_unit;
$whipr=$results3[0]->whipr;
$whipr_class=$results3[0]->whipr_classification;
$whtr=$results3[0]->whtr;
$whtr_class=$results3[0]->whtr_classification;
$submitted_on=$results3[0]->submitted_on;


	//	}	

		if($numRows3>0 && $b<=$a){
			//echo "<a href=\"anthropometry_db.php?appointment_id=$appointment_id\" class=\"btn btn-success btn-lg\" style=\"color: #ffffff;\"><span class=\"glyphicon glyphicon-search\" ></span> View Records</a>";
			
	
			 ?>
		
		<form name="form1" id="form1"  method="POST">	
			
				<h3 >Nutrition Assessment</h3> 
<hr class="colorgraph"></hr>
	
    <div class="row row-centered">
      
	 <div  class="col-md-12" >
				
		
<div id="alert" align="center" tabindex="1"></div>


</div>		
		

	    <div class="form-group ">
           
            <input type="hidden" class="form-control " id="yrs" name="yrs" value="<?php echo $age_year; ?>" />
			
			</div>
			 <div class="form-group ">
   			 <input type="hidden" class="form-control" id="mos" name="mos" value="<?php echo $age_month; ?>" />   
          </div>	

          <div class="form-group ">
   			 <input type="hidden" class="form-control" id="gender" name="gender" value="<?php echo $gender_id; ?>" />   
          </div>		 
        <div class="col-xs-8 " style="margin-top: 10px;">
<div class=" form-group form-inline " >
	<label for="Weight" >Weight:</label> 
	</div>
	
	<div id="wtRange_div" class=" form-group form-inline " >
		<input type="range" id="wtRange" name="wtRange"  oninput="this.form.wt.value=this.value" step="0.1" <?php if($weight_unit == "kgs"){echo "min=\"30\"";echo "max=\"500\""; }
			else{
			echo "min=\"66\"";echo "max=\"1100\"";
				} ?>  value="<?php   echo $weight; ?>"/>
	</div>

    <div class="form-group form-inline " >
		<input type="number" name="wt" id="wt"  class="form-control input-lg"  maxlength="5" required="" style=" background-color: #ffffff;" placeholder="Weight" oninput="this.form.wtRange.value=this.value" step="0.1" <?php if($weight_unit == "kgs"){echo "min=\"30\"";echo "max=\"500\""; }
			else{
			echo "min=\"66\"";echo "max=\"1100\"";
				} ?>  value="<?php echo $weight;?>"/>
    	<select  name="wt_opt" id="wt_opt"  class="form-control input-lg" style=" "   >
     <option value="kgs" <?php if($weight_unit == "kgs"){
	echo "selected= \"selected\"";
			   }
			   else{
			   	echo "";
			   }

			   ?> >kilograms</option>
	<option value="lbs" <?php if($weight_unit == "lbs"){
		echo "selected= \"selected\"";   	
			   }
			   else{
			   	echo "";
			   }
			   ?> >pounds</option>
        
        </select>
      </div>
	  
	  
     <div class=" form-group   ">
		<label  for="Height" >Height:</label>  </div>
			 <div id="htRange_div" class=" form-group "  > 
	   <input type="range" id="htRange" name="htRange"  min="121.9" max="243.8"  value="<?php if($height){
		   echo $height;	   	
			   }
			   else{
			   	echo "140";
			   }
			?>" oninput="this.form.ht.value=this.value"    onchange="ht_conv(3);"  step="0.1"  />
	   		</div>
	 <div class="form-group form-inline " >
		   <input type="number" name="ht" id="ht" oninput="this.form.htRange.value=this.value"   class="form-control input-lg" required="" maxlength="5" placeholder="cm" style="  background-color: #ffffff;" step="0.1" min="121.9" max="243.8"    onchange="ht_conv(3); "    value="<?php if($height){
		   echo $height;	   	
			   }
			   else{
			   	echo "140";
			   }

			   ?>"	/>
			<input type="number"  name="ht_ft" id="ht_ft" class="form-control input-lg" size="5" style="  background-color: #ffffff; width: 80px"  maxlength="1"  onchange="ht_conv(1); "   required="" value="4" min="4" max="8"/> ft
			
			<input type="number" name="ht_in" id="ht_in" class="form-control input-lg"size="5"  style="  background-color: #ffffff; width: 80px" step="0.1" maxlength="3"    required="" value="0" onchange="ht_conv(2); "  /> in
			  
	 </div>
	  
	  	

	  	<div id="female_div" <?php  
		if($gender_id == 1){
			$display="style=\"display: none;\"";
		}else{
	
			
			$display="style=\"display: block;\"";
				
		}
		
		echo $display;
		?>  >
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
		if($gender_id == 1){
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
		if($gender_id == 1){
			$display="style=\"display: none;\"";
		}else{
	
			
			$display="style=\"display: block;\"";
				
		}
		
		echo $display;
		?>>
		  	<div class="form-group">
				<div style="font-size: 18px;" class="form-group form-inline" >Do you know your gestational weeks? <input type="radio" id="ask_gestation" name="ask_gestation" value="1" <?php if($ask_gestation== 1 ){
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
		  
		  	
				
		<div id="mens_div"  <?php  
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
		if($ask_gestation== 1){
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
				
				<input type="text" id="gestation_wks" name="gestation_wks" class="form-control input-lg"  placeholder="Gestation" value="<?php echo $gestation_wks; ?>" />
			</div>
			</div>	

	
			
	

		<div class="form-group  " id="dbw_div1"  >
			
				<label  title="Desirable Body Weight (DBW) is a weight that is believed to be maximally healthful for a person, based chiefly on height. Maintaining a healthy body weight can significantly decrease the risks of diseases and nutritional conditions, including heart disease, diabetes and hypertension. A healthy body weight has also been shown to improve overall quality of life." for="DBW">Desirable Body Weight (Tannhauser):</label>
				<div class="form-group  form-inline">
 				<input type="text"  name="dbw" id="dbw"  style=" background-color: #ffffff;" class="form-control input-lg" maxlength="3" required="" readonly="" placeholder="Your DBW is.."  value="<?php if($dbw){
 echo $dbw;
 }
 	else{
		echo "";
	}
	 ?>"/>
    		<select  name="dbw_opt" id="dbw_opt" class="form-control input-lg"  >
	<option value="kgs"
 <?php if($dbw_unit == "kgs"){
	echo "selected= \"selected\"";
			   }
			   else{
			   	echo "";
			   }

			   ?> 
	
	>kilograms</option>
        
     		<option value="lbs"  <?php if($dbw_unit == "lbs"){
	echo "selected= \"selected\"";
			   }
			   else{
			   	echo "";
			   }
			   
			   
			   ?> >pounds</option>
	
       		 </select>
				</div>
		
		</div>		
		
		<div class="form-group form-inline  " id="limit_div" >
			<label for="Health Weight Range">Healthy Weight Range:</label>
				<input type="text" id="lower_limit" name="lower_limit" class="form-control input-lg" placeholder="Lower Limit" size="3" readonly=""  style=" border: 0px; background-color: #ffffff;" value="<?php echo $lwr_lmt;?>"  /> - 		<input type="text" id="upper_limit" name="upper_limit" class="form-control input-lg" placeholder="Upper Limit" size="3"   style=" border: 0px; background-color: #ffffff;" readonly="" value="<?php echo $uppr_lmt;?>" /> 
				<select name="limit_opt" id="limit_opt"  class="form-control input-lg"   >
				<option value="kgs"  <?php if($lmt_unit == "kgs"){
	echo "selected= \"selected\"";
			   }
			   else{
			   	echo "";
			   }
			   
			   
			   ?>>kilograms</option>
				<option value="lbs"  <?php if($lmt_unit == "lbs"){
	echo "selected= \"selected\"";
			   }
			   else{
			   	echo "";
			   }
			   
			   
			   ?>>pounds</option>
		
				</select>

			
	
	
		</div>	 

	
		
		
        <div class=" form-group    ">
			<label for="Waist Circumference"  title="Waist circumference measurementshould be made at the approximate midpoint between the lower   of the last palpable rib and the top of the iliac crest. Waist circumference is a reliable indicator of obesity and increased risk of lifestyle diseases. Waist-to-hip ratio is also being used for the same purpose, but research has shown that using only the waist measurement gives you the same level of information. ">Waist Circumference:</label> 
		 </div> 
		
		<div id="waistRange_div"   class=" form-group    ">
	  		 <input type="range" id="waistRange" name="waistRange" <?php if($waist_unit == "in"){echo "min=\"20\"";echo "max=\"70.9\""; }
			else{
			echo "min=\"50.8\"";echo "max=\"180\"";
				} ?> value="<?php  echo $waist_c;	?>" oninput="this.form.wc.value=this.value"   step="0.1"  />
	   </div>
	
	 	<div class="form-group form-inline  ">
			<input type="number" name="wc" id="wc"  class="form-control input-lg" required=""  oninput="this.form.waistRange.value=this.value" step="0.1"  <?php if($waist_unit == "in"){echo "min=\"20\"";echo "max=\"70.9\""; }
			else{
			echo "min=\"50.8\"";echo "max=\"180\"";
				} ?> value="<?php  echo $waist_c;	?>"/>
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
			<label for="Hip Circumference" title="Hip circumference measurement should be taken around the widest portion of the buttocks. In addition to waist measurement, hip is measured to derive a Waist-Hip Ratio which is a useful tool in assessing risk of having Non-communicable diseases. "> Hip Circumference:</label>  </div>

		<div id="hipRange_div"   class=" form-group    ">
	   		<input type="range" id="hipRange" name="hipRange" <?php if($hip_unit == "in"){echo "min=\"20\"";echo "max=\"70.9\""; }
			else{
			echo "min=\"50.8\"";echo "max=\"180\"";
				} ?> value="<?php  echo $hip_c;?>" oninput="this.form.hc.value=this.value"   step="0.1" />
	   </div>
	   
		 <div class="form-group form-inline  ">
       			<input type="number" name="hc" id="hc" class="form-control input-lg" required="" required="" step="0.1" oninput="this.form.hipRange.value=this.value"    value="<?php echo $hip_c; ?>" <?php if($hip_unit == "in"){echo "min=\"20\"";echo "max=\"70.9\""; }
			else{
			echo "min=\"50.8\"";echo "max=\"180\"";
				} ?>>
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






	  
		<div class="form-group form-inline ">
	

  		 <button id="edit_anthrop" class="btn btn-success btn-lg " data-client_id=<?php echo $client_id; ?> data-appointment_id="<?php echo $appointment_id; ?>" >  Update </button>
      
			
	      
	
		
		
		
	</div>
	
	

	</div>
			
        <div class="col-xs-4"  style="margin-top:50px;" >
		
		
	<div id="bmi_div" class="img-thumbnail" >

	 <label  title="Body Mass Index(BMI)-is a way of interpreting one's nutritional status based on weight and height. It is only one of several assessments used to determine health risks related to being underweight, overweight, or obese." for="BMI">BMI: </label> <br>
	
	<span id="bmi_label" data-bmi="<?php if($bmi){
 echo $bmi;
 }
 	else{
		echo "";
	}
	 ?>" data-bmi_class="<?php if($bmi_class){
 echo $bmi_class;
 }
 	else{
		echo "";
	}
	 ?>">BMI is <strong><?php echo $bmi ?></strong> classified as <strong><?php echo $bmi_class; ?></strong>.</span>


</div>

		
		</div>	
		
		 <div class="col-xs-4"  style="margin-top:10px;">
		<div id="dbw_div" class="img-thumbnail"  >
		
	<label  title="Desirable Body Weight (DBW) is a weight that is believed to be maximally healthful for a person, based chiefly on height. Maintaining a healthy body weight can significantly decrease the risks of diseases and nutritional conditions, including heart disease, diabetes and hypertension. A healthy body weight has also been shown to improve overall quality of life." for="DBW">Desirable Body Weight (Tannhauser):</label><br>
	
	<span id="dbw_label">DBW is <strong><?php echo $dbw." ".$dbw_unit; ?></strong>. Keep weight within this range <strong> <?php echo $lwr_lmt."-".$uppr_lmt; ?></strong>.</span>
		
		</div>	
		
		</div>
		
		 <div class="col-xs-4"  style="margin-top:10px;">
			<div id= "risk_indicator_div"  class="img-thumbnail">
<label class="control-label" for="Risk Indicator">Risk Indicator:</label><br>
	 <span id="risk_indicator_label" data-risk_indicator="<?php if($risk_indicator){
 echo $risk_indicator;
 }
 	else{
		echo "";
	}
	 ?>">Waist circumference may indicate <strong><?php echo $risk_indicator; ?></strong></span>
	
	
	
	
			</div> 
		</div>
		
		
		<div class="col-xs-4"  style="margin-top:10px;">
		<div id= "whipr_div" class="img-thumbnail">
					<label class="control-label" for="Waist Hip Ratio">Waist Hip Ratio:</label><br>
		<span id="whipr_label" data-whipr="<?php if($whipr){
 echo $whipr;
 }
 	else{
		echo "";
	}
	 ?>" data-whipr_class="<?php if($whipr_class){
 echo $whipr_class;
 }
 	else{
		echo "";
	}
	 ?>">Waist-hip ratio is <strong><?php echo $whipr; ?></strong> which may indicate <strong><?php echo $whipr_class;  ?></strong> risk of developing obesity-related diseases. </span>
	
				</div>   
				</div>   
		
		
		<div class="col-xs-4"  style="margin-top:10px;">
		<div id= "whtr_div" class="img-thumbnail">
		<label class="control-label" for="Waist Height Ratio">Waist Height Ratio:</label><br>
			<span id="whtr_label" data-whtr="<?php if($whtr){
 echo $whtr;
 }
 	else{
		echo "";
	}
	 ?>" data-whtr_class="<?php if($whtr_class){
 echo $whtr_class;
 }
 	else{
		echo "";
	}
	 ?>"> Waist height ratio is <strong><?php echo $whtr ?></strong> which may indicate <strong><?php echo $whtr_class; ?></strong>. </span>		
		
		
		
		
		</div>
		</div>
		

		</div>


	</form>    


 	</div>
	
	
	<?php 
	

	}
	
	else if($b>$a){
		echo "<div class=\"alert alert-danger\">No Records found.</div>";
	}
	 ?>
 		</div>
 			</div>
 

		 <?php $this->load->view('admin_footer'); ?>	