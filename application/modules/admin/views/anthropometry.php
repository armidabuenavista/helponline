<?php $this->load->view('admin_header'); ?>	

<style>
	.list-group{
		font-size: 18px;
	}
	.badge{
		font-size:18px;
		background-color: #d3592c;
	}

</style>


<div id="graph_dialog"   style="display: none;">
</div>
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
		<p class="lead" id="age" data-age_year="<?php echo $age_year; ?>" data-age_month="<?php echo $age_month; ?>" >Age: <?php  echo $age_year;?></p>
		<p class="lead" data-gender="<?php  echo $gender; ?>">Gender: <?php  echo $gender."<br>"; ?></p>
		</div>
	 <div class="col-md-6" >
	<p class="lead">Date of Counseling: <?php  echo date("F d, Y",strtotime($approved_date)); ?></p>
	<p class="lead">Assigned RND: <?php  echo $assigned_rnd; ?></p>
		</div>	

			</div>



				</div>


	<div id="anthrop_result" class="container" >

		 <div class="col-md-12"   style="margin-top:10px;">
<div id="alert1" tabindex="1"></div>
<div class="panel panel-default">
                        <div class="panel-heading">
                            <h3><i class="fa fa-bar-chart-o fa-fw"></i>  Nutrition Assessment</h3>
							</div>	

		<div class="panel-body">
		<?php
	
	$datetime= date("Y-m-d");
	$a= strtotime($approved_date);
	$b= strtotime($datetime);

	if($numRows3==0){

echo "<button id=\"new_anthrop\" class=\"btn btn-success btn-lg new_anthrop\"><span class=\"glyphicon glyphicon-plus\" ></span> New Record</button>";
	}
	echo "<hr class=\"colorgraph\"></hr>";

			foreach ($results2 as $row2) {
//if($numRows2>0){


$weight= $row2->weight;
$weight_unit= $row2->weight_unit;
$height=$row2->height;
$height_unit=$row2->height_unit;
$bmi= $row2->bmi;
$bmi_class=$row2->bmi_classification;
$dbw=$row2->dbw;
$dbw_unit=$row2->dbw_unit;
$lwr_lmt= $row2->lwr_lmt;
$uppr_lmt=$row2->uppr_lmt;
$lmt_unit=$row2->lmt_unit;
$waist_c=$row2->waist_c;
$waist_unit=$row2->waist_unit;
$risk_indicator=$row2->risk_indicator;
$hip_c=$row2->hip_c;
$hip_unit=$row2->hip_unit;
$whipr=$row2->whipr;
$whipr_class=$row2->whipr_classification;
$whtr=$row2->whtr;
$whtr_class=$row2->whtr_classification;
$submitted_on=$row2->submitted_on;

			 
		
	//	}
		}	

	if($numRows2>0){

		$aaa= base_url('admin/help/anthropometry_print/'.$last_appointment_id.'');
		echo  "<div  align=\"right\"><a href=\"#\" onclick=\"window.open('$aaa')\" class=\"btn btn-success btn-lg\" style=\"color: #ffffff;\"><span class=\"glyphicon glyphicon-print\" ></span> Print</a></div><br>";
		
		
		?>


<ul class="list-group">
	
	 <li class="list-group-item ">
    <span class="stats-label badge" ><?php echo $weight." ".$weight_unit; ?> </span>
    <label for="Weight"  class="stats-label">Weight:</label> <?php
	if($numRows2>1){echo "<a id=\"$client_id\" class=\"show_wt_graph\"  href=\"#\"  ><sub>[show graph]</sub></a>";}else{echo "";}?>
  </li>
	
	 <li class="list-group-item ">
    <span class="stats-label badge" ><?php echo $height." ".$height_unit; ?> </span>
    <label for="Height"  class="stats-label">Height:</label> 
  </li>
	
	
	
  <li class="list-group-item ">
    <span  class="stats-label badge" ><?php echo $bmi." "." kg/m<sup>2</sup>"; ?> </span>
    <label for="Body Mass Index"  class="stats-label">BMI:</label>
  </li>
  
 
  
  
  <li class="list-group-item">
   <span  class="stats-label badge" > <?php echo $bmi_class; ?> </span>
   <label for="BMI Classification"  class="stats-label">BMI Classification:</label> <?php if($numRows2>1){echo "<a id=\"$client_id\" class=\"show_bmi_graph\"  href=\"#\"  ><sub>[show graph]</sub></a>";}else{echo "";}?>
  </li>
  
  
  
  <li class="list-group-item">
   <span  class="stats-label badge" > <?php echo $dbw." ".$dbw_unit; ?> </span>
  <label for="DBW" class="stats-label">Desirable Body Weight:</label>
  </li> 
  
  
 
  <li class="list-group-item">
  		 <span  class="stats-label" >Keep weight within this range <strong> <?php  echo $lwr_lmt."-".$uppr_lmt." ".$lmt_unit; ?></strong> </span>
				
  </li>
   <li class="list-group-item">
   <span  class="stats-label badge" > <?php echo $waist_c." ".$waist_unit; ?> </span>
  <label for="Waist Circumference" class="stats-label">Waist Circumference:</label> <?php  if($numRows2>1){echo "<a id=\"$client_id\" class=\"show_wc_graph\"  href=\"#\"  ><sub>[show graph]</sub></a>";}else{echo "";} ?>
  </li> 
  
     <li class="list-group-item">
  		 <span  class="stats-label" >Waist circumference may indicate <strong><?php echo $risk_indicator; ?></strong> </span>
				
  </li>
  
  
  <li class="list-group-item">
   <span  class="stats-label badge" > <?php echo $hip_c." ".$hip_unit; ?> </span>
  <label for="Hip Circumference" class="stats-label">Hip Circumference:</label> <?php  if($numRows2>1){echo "<a id=\"$client_id\" class=\"show_hc_graph\"  href=\"#\"  ><sub>[show graph]</sub></a>";}else{echo "";}?>
  </li> 
 
 
 <li class="list-group-item">
  	  <span >Waist-hip ratio is <strong><?php echo $whipr; ?></strong> which may indicate <strong><?php echo $whipr_class;  ?></strong> risk of developing obesity-related diseases.</span>
				
  </li>
  
   <li class="list-group-item">
  	  <span > Waist height ratio is <strong><?php echo $whtr ?></strong> which may indicate <strong><?php echo $whtr_class; ?></strong>. </span>	
				
  </li>
 

  
</ul>	



		
<?php
		
		if($numRows3>0 && $b <= $a){
			$aa=base_url('admin/help/edit_anthropometry/'.$appointment_id.'');
			echo "<br><div class=\"form-group form-inline\"  >";
			echo" <a href=\"$aa\"  style=\"color:#ffffff; \"class=\"btn btn-success btn-lg\">Update</a>";
			echo " <a  href=\"#\" class=\"btn btn-danger btn-lg delete_anthrop\"  id=\"$appointment_id\" >Delete </a>";
			echo "</div>";
		}

		?>

<?php
	} else {
		

		
		echo "<div class=\"alert alert-danger\">No Records Found</div>";
	
	}

	//}
	?>
	</div>
		</div>
			</div>
			</div>
	<form name="form1" id="form1"   method="POST">	
	<div id="anthrop_form" class="container table-responsive"  style="display:none;">  
			<div  class="col-md-12" >
				<h3 >Nutrition Assessment</h3> 
<hr class="colorgraph"></hr>
    <div class="row row-centered">
	 <div  class="col-md-12" >
<div id="alert" align="center" tabindex="1" ></div>
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
        <div class="col-xs-8 " style="margin-top: 50px;">
<div class=" form-group form-inline " >
	<label for="Weight" >Weight:</label> 
	</div>
	<div id="wtRange_div" class=" form-group form-inline ">
		<input type="range" id="wtRange" name="wtRange" min="30" max="500"  oninput="this.form.wt.value=this.value" step="0.1" value="30"  />
	</div>
    <div class="form-group form-inline " >
		<input type="number" name="wt" id="wt"  class="form-control input-lg"  maxlength="5" required="" style=" background-color: #ffffff;" placeholder="Weight" oninput="this.form.wtRange.value=this.value" step="0.1" min="30" max="500" value="30" />
    	<select  name="wt_opt" id="wt_opt"  class="form-control input-lg" >
     <option value="kgs"  >kilograms</option>
	<option value="lbs" >pounds</option>
        </select>
      </div>
     <div class=" form-group   ">
		<label  for="Height" >Height:</label>  </div>
			 <div id="htRange_div" class=" form-group"> 
	   <input type="range" id="htRange" name="htRange"  min="121.9" max="243.8"  oninput="this.form.ht.value=this.value"    onchange="ht_conv(3);"  step="0.1" value="121.9"  />
	   		</div>
	 <div class="form-group form-inline " >
		   <input type="number" name="ht" id="ht" oninput="this.form.htRange.value=this.value"   class="form-control input-lg" required="" maxlength="5" placeholder="cm" style="  background-color: #ffffff;" step="0.1"    onchange="ht_conv(3); " min="121.9" max="243.8"   value="121.9"/>
			<input type="number"  name="ht_ft" id="ht_ft" class="form-control input-lg" size="5" style="  background-color: #ffffff; width: 80px"  maxlength="1" onchange="ht_conv(1); "   required="" value="4" min="4" max="8"/> ft
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
		  	<div class="form-group form-inline" style="font-size: 18px;" >Are you <input type="radio" id="ask_pregnant" name="ask_pregnant" value="1"/> <strong>Pregnant</strong> <input type="radio" id="ask_pregnant" name="ask_pregnant" value="0"  /><strong>Not</strong> ? </div> 
			</div>
			
			<div id="ask_lactation_div" style="display: none;">
		  	<div class="form-group form-inline" style="font-size: 18px;">
			Are you lactating? <input type="radio" id="ask_lactation" name="ask_lactation" value="1"/> <strong>Yes</strong> <input type="radio" id="ask_lactation" name="ask_lactation" value="0" /><strong>No</strong> 
			</div>
			
			
			
			
		  </div>
			
			
		
			<div id="ask_gestation_div" style="display: none;">
		  	<div class="form-group">
				<div style="font-size: 18px;" class="form-group form-inline" >Do you know your gestational weeks? <input type="radio" id="ask_gestation" name="ask_gestation" value="1"/> <strong>Yes</strong> <input type="radio" id="ask_gestation" name="ask_gestation" value="0" /><strong>No</strong> </div> 
			</div>
			
			
			
			
		  </div>
		  
		  	
				
		<div id="mens_div" style="display: none;" >
			<div class="form-group">
				<label>Last Menstrual Period:</label>
			</div>
			
			
		
			<div  class="form-group">
				
				<input type="text" id="mens_date" name="mens_date" class="form-control input-lg" placeholder="Menstrual Period"   />
			</div>
			</div>
			
			<div id="gestation_div" style="display: none;">
			<div class="form-group" >
				<label>Weeks of Gestation:</label>
			</div>
			
			<div class="form-group">
				
				<input type="text" id="gestation_wks" name="gestation_wks" class="form-control input-lg"  placeholder="Gestation"  />
			</div>
			</div>





		<div class="form-group  " id="dbw_div1" style="display:none;" >
				<label  title="Desirable Body Weight (DBW) is a weight that is believed to be maximally healthful for a person, based chiefly on height. Maintaining a healthy body weight can significantly decrease the risks of diseases and nutritional conditions, including heart disease, diabetes and hypertension. A healthy body weight has also been shown to improve overall quality of life." for="DBW">Desirable Body Weight (Tannhauser):</label>
				<div class="form-group  form-inline">
 				<input type="text"  name="dbw" id="dbw"  style=" background-color: #ffffff;" class="form-control input-lg"  required="" placeholder="Your DBW is.." readonly=""  />
    		<select  name="dbw_opt" id="dbw_opt" class="form-control input-lg" >
	<option value="kgs">kilograms</option>
    <option value="lbs">pounds</option>
       		 </select>
				</div>
		</div>		
		<div class="form-group form-inline  " id="limit_div" style="display:none;">
			<label for="Health Weight Range">Healthy Weight Range:</label>
				<input type="text" id="lower_limit" name="lower_limit" class="form-control input-lg" placeholder="Lower Limit" size="3" readonly=""  style=" border: 0px; background-color: #ffffff;"  /> - 		<input type="text" id="upper_limit" name="upper_limit" class="form-control input-lg" placeholder="Upper Limit" size="3"   style=" border: 0px; background-color: #ffffff;" readonly=""/> 
				<select name="limit_opt" id="limit_opt"  class="form-control input-lg" >
				<option value="kgs">kilograms</option>
				<option value="lbs">pounds</option>
				</select>
		</div>	 
        <div class=" form-group    ">
			<label for="Waist Circumference"  title="Waist circumference measurementshould be made at the approximate midpoint between the lower   of the last palpable rib and the top of the iliac crest. Waist circumference is a reliable indicator of obesity and increased risk of lifestyle diseases. Waist-to-hip ratio is also being used for the same purpose, but research has shown that using only the waist measurement gives you the same level of information. ">Waist Circumference:</label>
		 </div> 
		<div id="waistRange_div"  class=" form-group    ">
	  		 <input type="range" id="waistRange" name="waistRange" min="50.8" max="180"  oninput="this.form.wc.value=this.value"   step="0.1"   />
	   </div>
	 	<div class="form-group form-inline  ">
			<input type="number" name="wc" id="wc"  class="form-control input-lg" required=""  oninput="this.form.waistRange.value=this.value" step="0.1"  min="50.8" max="180"  />
			<select name="wc_opt" id="wc_opt"   class="form-control input-lg">
<option value="in" >inches</option>
<option value="cm" selected="">centimeters</option>
			</select>
          </div>	
		<!--<div class="form-group"  >
<div id="risk_indicator"   ></div>
			</div>   -->
		<div class=" form-group    ">
			<label for="Hip Circumference" title="Hip circumference measurement should be taken around the widest portion of the buttocks. In addition to waist measurement, hip is measured to derive a Waist-Hip Ratio which is a useful tool in assessing risk of having Non-communicable diseases. "> Hip Circumference:</label> </div>
		<div id="hipRange_div" class=" form-group    ">
	   		<input type="range" id="hipRange" name="hipRange" min="50.8" max="180"  oninput="this.form.hc.value=this.value"   step="0.1" />
	   </div>
		 <div class="form-group form-inline  ">
       			<input type="number" name="hc" id="hc" class="form-control input-lg" required="" required="" step="0.1" oninput="this.form.hipRange.value=this.value" min="50.8" max="180" >
				<select name="hc_opt" id="hc_opt" class="form-control input-lg"   >
<option value="in">inches</option>
<option value="cm" selected="">centimeters</option>
				</select>
 			</div>	
	
	<div class="form-group form-inline">
		<button type="button" id="save_anthrop" class="btn btn-success btn-lg  save_anthrop" style="width: 150px;" data-client_id="<?php  echo $client_id; ?>" data-appointment_id="<?php  echo $appointment_id; ?>" > Save</button>
		<button type="button" id="reset_anthrop" class="btn btn-success btn-lg reset"  style="width: 150px;"  > Reset	</button>	
	</div>
	</div>
        <div class="col-xs-4 "  style="margin-top:10px;" >
	<div id="bmi_div" style="display: none;" >
	 <label  title="Body Mass Index(BMI)-is a way of interpreting one's nutritional status based on weight and height. It is only one of several assessments used to determine health risks related to being underweight, overweight, or obese." for="BMI">BMI: </label><br>
	<span id="bmi_label" data-bmi="" data-bmi_class=""></span>
</div>
		</div>	
		 <div class="col-xs-4"  style="margin-top:10px;">
		<div id="dbw_div"  style="display: none;"  >
	<label  title="Desirable Body Weight (DBW) is a weight that is believed to be maximally healthful for a person, based chiefly on height. Maintaining a healthy body weight can significantly decrease the risks of diseases and nutritional conditions, including heart disease, diabetes and hypertension. A healthy body weight has also been shown to improve overall quality of life." for="DBW">Desirable Body Weight (Tannhauser):</label><br>
	<span id="dbw_label"></span>
		</div>	
		</div>
		 <div class="col-xs-4"  style="margin-top:10px;">
			<div id= "risk_indicator_div" style="display: none;"  >
<label class="control-label" for="Risk Indicator">Risk Indicator:</label><br>
	 <span id="risk_indicator_label" data-risk_indicator=""></span>
			</div> 
		</div>
		<div class="col-xs-4"  style="margin-top:10px;">
		<div id= "whipr_div" style="display: none;" >
					<label class="control-label" for="Waist Hip Ratio">Waist Hip Ratio:</label><br>
		<span id="whipr_label" data-whipr="" data-whipr_class=""> </span>
				</div>   
				</div>   
		<div class="col-xs-4"  style="margin-top:10px;">
		<div id= "whtr_div" style="display: none;" >
		<label class="control-label" for="Waist Height Ratio">Waist Height Ratio:</label><br>
			<span id="whtr_label" data-whtr="" data-whtr_class=""></span>		
		</div>
		</div>
		</div>
 </div>
 </div>
		 </form> 
<!-- <div class="container">
<div class="col-md-12">
		 <div class="panel panel-default">
 		<div class="panel-heading"> <i class="fa fa-bar-chart-o fa-fw"></i> Previous Records</div>
  			<div class="panel-body">
  			<div class="table-responsive" >
  			
  			<?php 

  			echo "<table id=\"previous_records\" class=\"table table-bordered table-hover table-striped\" border=\"1\" >";
  			echo "<thead><tr>";
  			echo "<th width=\"300\"> Your Records</th>";
  			echo "<th width=\"200\"> View</th>";
  			echo "</tr></thead><tbody>";

  			if($numRows4 >0 ){
  			foreach ($results4 as $row4) {

  				$submitted_on = date("l jS F Y",strtotime($row4->submitted_on));
  				$x = $row4->appointment_id;
  				echo "<tr>";
					echo "<td >".$submitted_on."</td>";
					echo "<td><a href=\"#\" id=\"$x\"><span class=\"glyphicon glyphicon-eye-open\"></span></a></td>";
				echo "</tr>";
  				
  			}
  		}else{
  			echo "<tr>";
				
					echo "<td>No Records Found.</td>";
				echo "</tr>";

  		}


			echo "<tbody></table>";

  			?>



				


			</div>

  			</div>



	</div>
  	</div>   
  	</div> -->



<?php $this->load->view('admin_footer'); ?>	
	