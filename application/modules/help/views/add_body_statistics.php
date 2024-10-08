

<!-- Begin Body -->
<div class="container" style="margin-top: 20px;">
	<div class="row">
  			
      		<div class="col-md-9">
            
			
           <!--   <h2>Nutrition Assessment</h2>-->
              
              <div  class="row">
			  	
				
				    	<div class="col-md-6">
				<div id="bmi_img" tabindex="1" style="display: none; text-align: center; vertical-align: middle;">
					
				
				</div>
               
				 
				 
                </div> 
        		<div class="col-md-6">
				
				<div id="weight_stats_div" style="display: none;">
			<h1>Body Statistics</h1>
					<hr class="colorgraph"></hr>
					<br>
		<ul class="list-group">
  <li class="list-group-item list-group-item list-group-item-success">
    <span id="bmi" class="stats-label badge" data-bmi=""> </span>
    <label for="Body Mass Index"  class="stats-label">BMI:</label>
  </li>
  
  <li class="list-group-item list-group-item list-group-item-warning">
    <span id="bmr" class="stats-label badge" data-bmr=""> </span>
    <label for="Basal Metabollic Rate" class="stats-label">Basal Metabollic Rate:</label>
  </li>
  
  
  <li class="list-group-item">
   <span id="bmi_class" class="stats-label badge" data-bmi_class=""> </span>
   <label for="BMI Classification"  class="stats-label">BMI Classification:</label>
  </li>
  
  
  
  <li class="list-group-item">
   <span id="dbw" class="stats-label badge" data-dbw=""> </span>
  <label for="DBW" class="stats-label">Desirable Body Weight:</label>
  </li> 
  
  
  
 
  <li class="list-group-item">
  		 <span id="dbw_hwr" class="stats-label" > </span>
				
  </li>
  
  
  
</ul>		
					

	
				 	</div>
					
					
					<div id="waist_stats_div" style="display: none;">
				 
				 
				 <ul class="list-group">
  <li class="list-group-item list-group-item list-group-item-success">
     <span id="risk_indicator" class="stats-label badge" data-risk_indicator=""> </span>
   <label for="Risk indicator"  class="stats-label">Risk Indicator:</label>
  </li>
  
   <li class="list-group-item ">
     <span id="whipr" class="stats-label badge" data-whipr=""> </span>
    <label for="Waist hip ratio"  class="stats-label">Waist Hip Ratio:</label>
  </li>
  
  
  <li class="list-group-item ">
      <span id="whipr_class" class="stats-label badge" data-whipr_class=""> </span>
   
	
	 <label for="Waist hip ratio classification"  class="stats-label">Waist-hip ratio Classification:</label>
				
  </li>
  
  
    <li class="list-group-item ">
      <span id="whtr" class="stats-label badge" data-whtr=""> </span>
	
	<label for="Waist height ratio"  class="stats-label">Waist Height Ratio:</label>
				
  </li>
  
  
  
     <li class="list-group-item ">
       <span id="whtr_class" class="stats-label badge" data-whtr_class=""> </span>
	
	 <label for="Waist height ration classification"  class="stats-label">Waist-height ratio Classification:</label>
				
  </li>
  
  
  </ul>

				  
				  </div>
              	</div> 
				
				<div class="col-md-12">
					
					
					<div  id="nutrition_div" tabindex="1" style="display: none;" >

<label class="tip" id="cho_tip"  for="Carbohyrates"> </label> 
 <span id="cho_label" data-cho="" ></span>


<div class="progress progress-striped">
   <div class="progress-bar progress-bar-success active" id="cho_meter" role="progressbar" >
      <span id="cho_bar"></span>
   </div>
</div>





 <label class="tip" id="pro_tip" for="Protein"></label>
 <span id="pro_label" data-pro=""></span>





<div class="progress progress-striped">
   <div class="progress-bar progress-bar-warning active"  id="pro_meter" role="progressbar" >
      <span id="pro_bar" ></span>
   </div>
</div>




<label class="tip" id="fat_tip" for="fat"  > </label> 
 <span id="fat_label"  data-fat="" ></span>

 <div class="form-group form-inline ">


 
 <div class="progress progress-striped">
   <div class="progress-bar progress-bar-danger active" id="fat_meter" role="progressbar">
      <span id="fat_bar"></span>
   </div>
</div>
 
 
 <label class="tip" id="cal_tip" for="cal"  > </label> 
 <span id="cal_label" data-cal="" ></span>
 
 
 

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
		   <input type="range" id="wtRange" name="wtRange" min="30" max="500" value="0" oninput="this.form.wt.value=this.value"  step="0.1"  />
		</div>


                  <div class="form-group form-inline">
      
               <input type="number" name="wt" id="wt"  class="form-control input-lg"  maxlength="5" required=""   oninput="this.form.wtRange.value=this.value" step="0.1" min="30" max="500">
      <select  name="wt_opt" id="wt_opt"  class="form-control input-lg"  >
     <option value="lbs">pounds</option>
	<option value="kgs" selected>kilograms</option>
        
        </select>
              </div>
        
		  
		  
          <div class=" form-group ">
		      <label  for="Height">Height:</label>  </div>
			  
			  
			 <div class=" form-group "> 
	   <input type="range" id="htRange" name="htRange" min="140" max="243.8" value="0" oninput="this.form.ht.value=this.value"   step="0.1"  onchange="ht_conv(3);" />
	   </div>
	



		  <div class="form-group form-inline ">
		
       
              <input type="number" name="ht" id="ht" oninput="this.form.htRange.value=this.value"   class="form-control input-lg" required="" maxlength="5"  style=" width: 140px;"   step="0.1" onchange="ht_conv(3);"  />cm
         
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
				  
			<div class="form-group "  >
            <label  title="Physical Level 
represents the degree of a person's daily physical activity as a number, and is applied to estimate a person's total energy expenditure. Together with the basal metabolic rate, it can be used to compute the energy a person needs in order to maintain a particular lifestyle. " for="PA level" >Physical Activity Level:</label>  </div>  

<div class="form-group "  >
	<select name="pa_lvl" id="pa_lvl" class="form-control input-lg" >
              
           <option value="0" selected="" >--Select Physical Activity Level--</option> 
          <?php 

            foreach($groups as $row)
            { 
              echo '<option value="'.$row->id.'">'.$row->pa_lvl.'</option>';
            }
            ?>
			  </select>
  		  
		
		<input type="hidden" id="pa_lvl_val" name="pa_lvl_val" readonly="" class="form-control input-lg" />
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
	  		 <input type="range" id="waistRange" name="waistRange" min="50.8" max="180"  oninput="this.form.wc.value=this.value"   step="0.1"  value="50.8" />
	   </div>
	
	 	<div class="form-group form-inline  ">
			<input type="number" name="wc" id="wc"  class="form-control input-lg" required=""  oninput="this.form.waistRange.value=this.value" step="0.1"  min="50.8" max="180"  />
			<select name="wc_opt" id="wc_opt"   class="form-control input-lg">
<option value="in" >inches</option>
<option value="cm" selected="">centimeters</option>
			</select>
          
          </div>	
	
	
		<div class=" form-group    ">
			<label for="Hip Circumference" title="Hip circumference measurement should be taken around the widest portion of the buttocks. In addition to waist measurement, hip is measured to derive a Waist-Hip Ratio which is a useful tool in assessing risk of having Non-communicable diseases. "> Hip Circumference:</label> </div>

		<div id="hipRange_div" class=" form-group    ">
	   		<input type="range" id="hipRange" name="hipRange" min="50.8" max="180" value="50.8"  oninput="this.form.hc.value=this.value"    step="0.1" />
	   </div>
	   
		 <div class="form-group form-inline  ">
       			<input type="number" name="hc" id="hc" class="form-control input-lg" required="" required="" step="0.1" oninput="this.form.hipRange.value=this.value"  min="50.8" max="180" >
				<select name="hc_opt" id="hc_opt" class="form-control input-lg"   >
<option value="in">inches</option>
<option value="cm" selected="">centimeters</option>
				</select>
           
 			</div>		  
				  
				
			 <div class="form-group" align="center">
			
			 
			 	<button id="save_stat" name="save_stat" class="btn btn-danger btn-lg"> <span class="glyphicon glyphicon-apple"></span> Save Your Statistics </button>
				
			 </div>
              
			  
			  </form>
                	
			
            	</div> 
  	</div>
</div>

                
				
		     

          