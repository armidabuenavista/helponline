
<!-- Bootstrap CSS -->

   <?php $this->load->view('fast_header'); ?>
        

<style>

.ui-dialog .ui-dialog-title {
    float: left;
    margin: .1em 0;
    white-space: nowrap;
    width: 90%;
    overflow: hidden;
    text-overflow: ellipsis;
    font-size: 20px;
}
.footer{
font-size: 14px;

}
@media (max-width: 480px) { 
    .nav-tabs > li {
        float:none;
    }
}
#myTab{

	font-size: 18px;
}
input[type=checkbox] {
	height: 15px;
	width: 15px;
}
input[type=radio] {
	height: 15px;
	width: 15px;
}

.progress{

  height: 35px;

} 
th, td {
	white-space: nowrap;
}

.fixed {
    position: absolute;
	width: 5em;
	margin-left: -9em;
}


.aa{
    overflow-x: scroll;
	width:60%;
	margin: 0 auto;
}
small {
	font-size: 12px;
}
#a-collapse>.panel-body {background-color:#98f1df !important;}
#b-collapse>.panel-body {background-color:#a9d1ec !important;}
#c-collapse>.panel-body {background-color:#9ee9be !important;}
#d-collapse>.panel-body {background-color:#98f1df !important;}
#e-collapse>.panel-body {background-color:#fbedb8 !important;}
#f-collapse>.panel-body {background-color:#e6d5ed !important;}


</style>

<script type="text/javascript">
$(document).ready(function() {

	if (location.hash) {
        $("a[href='" + location.hash + "']").tab("show");
    }
    $(document.body).on("click", "a[data-toggle]", function(event) {
        location.hash = this.getAttribute("href");
    });
});
$(window).on("popstate", function() {
    var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
    $("a[href='" + anchor + "']").tab("show");

    $('.responsive').tabCollapse();

    // initialize tab function
    $('.nav-tabs a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });

    
	

    });

</script>



  <?php $this->load->view('navbar'); ?>
     
  
<div style="margin-left: 10%; margin-right: 10%;">

                <h1 class="page-header">Fast Assessment and Screening Tools


<!--

		<div class="col-md-12 ">
-->
	
		<p>Calculators and guides useful in the assessment of nutritional risks and status of individuals. Enter the required information to calculate and evaluate an individual’s current health and nutritional condition.</p>
		
<!--
			<div class="tabbable " id="myTab">
				<ul class="nav nav-tabs responsive ">
					<li class="bmi active">
						<a href="#a" data-toggle="tab">Body Mass Index</a>
					</li>
					<li class="dbw">
						<a href="#b" data-toggle="tab">Desirable Body Weight	</a>
					</li>
						<li class="ter">
						<a href="#c" data-toggle="tab">Energy Requirement</a>
					</li>		
					<li class="wc">
						<a href="#d" data-toggle="tab">Waist Circumference</a>
					</li>
						<li class="whipr">
						<a href="#e" data-toggle="tab">Waist-Hip Ratio</a>
					</li>
					<li class="whtr">
						<a href="#f" data-toggle="tab">Waist-Height Ratio</a>
					</li>
				</ul>
				
				<div class="tab-content responsive">
                    
                    
    <div class="tab-pane bmi_content fade in active" id="a" >
-->
        <form id="form">
            <hr class="colorgraph">
            <p>Body Mass Index (BMI) is an indicator of one's weight in relation to height. BMI below or above the normal range poses increased health risks. <a href="#" id="read_bmi" class="btn btn-success btn-xs" style="color: #ffffff;">Read More</a></p>
<!--
			<div id="bmi_dialog"  class="col-md-12" style="display: none;background: #fbedb8;"></div>
            <div id="heart_disease_dialog" Title="My Jquery UI dialog" class="col-md-12 heart_disease_dialog" style="display: none;background: #fbedb8;"></div>
			<div id="hypertension_dialog" Title="My Jquery UI dialog" class="col-md-12" style="display: none;background: #fbedb8;"></div>
			<div id="type2diabetes_dialog" Title="My Jquery UI dialog" class="col-md-12" style="display: none;background: #fbedb8;"></div>
			<div id="cancer_dialog" Title="My Jquery UI dialog" class="col-md-12" style="display: none;background: #fbedb8;"></div>
-->
            <p>Enter your <i><strong>weight</strong></i> and<i> <strong>height</strong></i> or move the sliders.	</p>
            <div class="row">
                <div class="col-md-4" >
                    <div class="form-group ">
                        <label class="control-label" for="Gender">Gender:</label>
                        <select name="fast_gender" id="fast_gender"  class="form-control input-lg gender-a"   >
                            <option value="1" >Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>

                    <div class="form-group ">
                        <label class="control-label" for="Dob">Date of Birth:</label>
                        <input type="text" class="form-control input-lg dob" id="dob" name="dob" placeholder="Date of Birth" />
                        <input type="hidden" class="form-control input-lg" id="yrs" name="yrs" />
                        <input type="hidden" class="form-control input-lg" id="mos" name="mos" />
                    </div>
			
                    <div class=" form-group form-inline">
                        <label for="Weight" >Weight:</label>
                    </div>
                    
                    <div class=" form-group form-inline   ">
                        <input type="range" id="fast_wtRange" name="fast_wtRange" min="0" max="500" oninput="this.form.fast_wt.value=this.value"   step="0.1" value="0" list="wt_rangeList" />
                        <datalist id="wt_rangeList">
                            <?php
                                for ($i=0; $i<=500; $i++) {
                                    echo "<option>$i</option>";
                                }
                            ?>
                        </datalist>
                    </div>

                    <div class="form-group form-inline  " >
                        <input type="number" name="fast_wt" id="fast_wt"  class="form-control input-lg"  maxlength="5" required="" style=" width: 100px;" placeholder="Weight" oninput="this.form.fast_wtRange.value=this.value" step="0.1" value="0"  min="0" max="500"  />
                        <select  name="fast_wt_opt" id="fast_wt_opt" class="form-control input-lg">
                            <option value="kgs" selected="">kilograms</option>
                            <option value="lbs">pounds</option>
                        </select>
                    </div>
        
                    <div class="form-group">
                        <label  for="Height" >Height:</label>  
                    </div>
			  
                    <div class=" form-group"> 
                        <input type="range" id="fast_htRange" name="fast_htRange"  min="0" max="243.8" oninput="this.form.fast_ht.value=this.value"  onchange="conv(3);"   step="0.1"  value="0" list="ht_rangeList"    />
                        <datalist id="ht_rangeList">
                            <?php
                                for ($i=0; $i<=243.8; $i++) {
                                    echo "<option>$i</option>";
                                }
                            ?>
                        </datalist>
                    </div>			
				
                    <div class="form-group form-inline  ">
                        <input type="number" name="fast_ht" id="fast_ht" oninput="this.form.fast_htRange.value=this.value"   class="form-control input-lg" required="" maxlength="5" placeholder="cm" style=" width: 95px;" step="0.1"   min="0" max="243.8"  onchange="conv(3);"value="0"/>cm
                        <input type="number" name="fast_ht_ft" id="fast_ht_ft" class="form-control input-lg" size="5" style=" width: 73px;" onchange="conv(1)" maxlength="1"  required="" value="0"  min="0" max="8" />ft
                        <input type="number" name="fast_ht_in" id="fast_ht_in" class="form-control input-lg"size="5"  style=" width: 73px;" onchange="conv(2);" step="0.1" maxlength="3"  required="" value="0"  />in
                    </div>
                    
                    <div class="form-group">
                        <input type="hidden" class="form-control input-lg" id="fast_bmi_val" name="fast_bmi_val"/>
                    </div>
                </div>

                <div class="col-md-4" align="center">
                    <div id="fast_bmi_img_div" style="display: none;"  >
                        <div id="fast_bmi_img"  >


                        </div>
                    </div>
                </div>	

                <div class="col-md-4">
                     <div id="fast_bmi_div" class="img-thumbnail" style=" display: none;"  >
                        <span id="fast_bmi_label"></span>
                    </div>
                </div>	
            </div>
            <p class="disclaimer">All computations are based on metric units (i.e kilograms, centimeters)</p>
        </form>
<!--
    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
    <div class="tab-pane fade in dbw_content" id="b">
-->
        <form id="form">
            <hr class="colorgraph">
            <p id="dbw_desc">The Desirable Body Weight (DBW) is the optimal weight based on a given height which can be computed using the <a href="#" class="link" id="tannhauser">Tannhauser Formula</a>. The DBW is used in calculating the <a href="#" class="link" id="energy_requirement">daily energy requirement</a>.</p><br><br>
            <p>Enter your <i> <strong>height</strong></i> or move the slider.	</p>	
<!--
            <div id="tips_pregnant_dialog" Title="My Jquery UI dialog" class="col-md-12" style="display: none;  background: #fbedb8;"></div>
            <div id="tannhauser_dialog" Title="My Jquery UI dialog" class="col-md-12" style="display: none;  background: #fbedb8;"></div>
            <div id="energy_requirement_dialog" Title="My Jquery UI dialog" class="col-md-12" style="display: none;  background: #fbedb8;"></div>
-->
            <div class="row">
                <div class="col-md-4">

                    <div class="form-group">
                        <label class="control-label" for="Gender">Gender:</label>
                        <select  id="fast_gender" name="fast_gender"  class="form-control input-lg gender-d"   style="width: 70%;" >
                            <option value="1" >Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>

                    <div id="female_div" style="display: none;" >
                        <div style="font-size: 18px;" class="form-group form-inline" >Are you <input type="radio" id="ask_pregnant" name="ask_pregnant" value="1"/> <strong>Pregnant</strong> <input type="radio" id="ask_pregnant" name="ask_pregnant" value="0" /><strong>Not</strong> ? </div> 
                    </div>

                    <div class="form-group ">
                        <label class="control-label" for="Dob">Date of Birth:</label>
                        <input type="text" class="form-control input-lg dob" id="dob1" name="dob1" placeholder="Date of Birth" style="width: 70%;" />
                        <input type="hidden" class="form-control input-lg" id="yrs1" name="yrs1" />
                        <input type="hidden" class="form-control input-lg" id="mos1" name="mos1" />
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
                            <input type="text" id="mens_date" name="mens_date" class="form-control input-lg" placeholder="Menstrual Period"   style="width: 70%;"/>
                        </div>
                    </div>

                    <div id="gestation_div" style="display: none;">
                        <div class="form-group" >
                            <label>Weeks of Gestation:</label>
                        </div>
                        <div class="form-group">
                            <input type="text" id="gestation_wks" name="gestation_wks" class="form-control input-lg"  placeholder="Gestation"   style="width: 70%;"/>
                        </div>
                    </div>

                    <div id="dbw_ht_div" style="display: none;">
                        <p class="help-block">Enter your <i> <strong>height</strong></i> or move the slider.	</p>
                        <div class="form-group">
                            <label  for="Height" >Height:</label>  
                        </div>
                        <div class=" form-group"> 
                            <input type="range" id="fast_htRange1" name="fast_htRange1"  min="121.9" max="243.8" oninput="this.form.fast_ht1.value=this.value"  onchange="conv1(3);" style="width: 70%;"   step="0.1"  value="121.9" list="ht_rangeList1" />
                            <datalist id="ht_rangeList1">
                                <?php
                                    for ($i=0; $i<=243.8; $i++) {
                                        echo "<option>$i</option>";
                                    }
                                ?>
                            </datalist>
                        </div>			
                        <div class="form-group form-inline  ">
                            <input type="number" name="fast_ht1" id="fast_ht1" oninput="this.form.fast_htRange1.value=this.value"   class="form-control input-lg" required="" maxlength="5" placeholder="cm" style=" width: 100px;" step="0.1"   onchange="conv1(3);  "value="121.9"  min="121.9" max="243.8"	/>cm
                            <input type="number" name="fast_ht_ft1" id="fast_ht_ft1" class="form-control input-lg" size="5" style=" width: 80px;" onchange="conv1(1)" maxlength="1"   required="" value="4"  min="4" max="8" />ft
                            <input type="number" name="fast_ht_in1" id="fast_ht_in1" class="form-control input-lg"size="5"  style=" width: 80px;" onchange="conv1(2);" step="0.1" maxlength="3"  required="" value="0" />in
                        </div>
                    </div>
                </div>

                <div class="col-md-4" style="margin-bottom: 10px; " align="center" >
                    <div id="scale_img" style="background: url('<?php echo base_url(); ?>assets/images/fast/scale.svg');  margin-left:10px; width: 250px; height: 250px; background-repeat: no-repeat; position: relative;" >
                        <div  style="position: absolute;margin-bottom:100px; bottom: 30px;   font-weight: bold; width:250px; ">
                            <div id="fast_dbw_div1" style="display: block;">
                                <div class="form-group form-inline">
                                    <div class="dw-weight-container" id="fast_dbw" style="margin-bottom: 10px;" >
                                        0 kgs
                                    </div>
                                    <select name="fast_dbw_opt" id="fast_dbw_opt" class="form-control input-lg" style="width:200px;">
                                        <option value="kgs">kilograms</option>
                                        <option value="lbs">pounds</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" id="fast_dbw_val" class="form-control" />
                            <input type="hidden" id="fast_dbw_lower_val" class="form-control" />
                            <input type="hidden" id="fast_dbw_upper_val" class="form-control" />
                        </div>
                    </div>
                </div>

                <div class="col-md-4" align="center" id="fast_dbw_img_div" style="display: none;">
                    <div id="fast_dbw_img"></div>
                    <div id="fast_dbw_img_copyright" class="fast_dbw_img_copyright"></div>
                </div>

                <div class="col-md-8" style="margin-bottom: 10px; " align="center">
                    <div  id="fast_dbw_div">
                        <div  id="fast_dbw_label"></div>
                        <br><br>
                        <div id="fast_tips_pregnant" align="right"></div>
                    </div>
                </div>

            </div>
            <p class="disclaimer">All computations are based on metric units (i.e kilograms, centimeters)</p>
        </form>
<!--
    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
		
	 
	 	
    <div class="tab-pane fade in ter_content" id="c" >
-->
        <form id="form">
            <hr class="colorgraph">

            <div class="table-responsive">
                <p>Energy requirement is the estimated amount of food energy needed to maintain normal  daily physical activities and desirable body weight. Food energy can be derived from carbohydrates, proteins and fat. The usual recommended proportions for these macronutrients are 65% carbohydrates, 15% protein and 20% fat. 	</p>	

                <!--
                <div id="physical_activity_dialog" Title="My Jquery UI dialog" class="col-md-12" style="display: none;  background: #fbedb8;"></div>	 
                <div id="calorie_dialog" Title="My Jquery UI dialog" class="col-md-12" style="display: none;  background: #fbedb8;"></div>	 
                <div id="carbohydrates_dialog" Title="My Jquery UI dialog" class="col-md-12" style="display: none;  background: #fbedb8;"></div>	 
                <div id="protein_dialog" Title="My Jquery UI dialog" class="col-md-12" style="display: none;  background: #fbedb8;"></div>	 
                <div id="fat_dialog" Title="My Jquery UI dialog" class="col-md-12" style="display: none;  background: #fbedb8;"></div>	 
                -->


                <div class="row" style="margin-bottom: 50px;">
                    <div class="col-md-6" >
                        <div class="form-group"><label class="control-label" for="Gender">Gender:</label></div>
                        <div class="form-group">
                            <select name="fast_genderx" id="fast_genderx"  class="form-control input-lg gender-f"  >
                                <option value="1" >Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>




                        <div class="form-group"><label  for="Age Range" >Age Range:</label></div>

                        <div class="form-group">
                            <select name="age_group" id="age_group" class="form-control input-lg" >
                                <option value="0" >--Age Group--</option>
                                <?php
                                    foreach($groups1 as $row1){
                                        echo "<option value=\"$row1->id\"   data-placement=\"right\"  >".$row1->age_group."</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div id="fast_ter_ht_div" style="display: none;">
                            <p class="help-block">Enter your <i><strong>height</strong></i> or move the slider and select your <i><a href="#" class="link" id="physical_activity"><strong>physical activity</strong></a></i>.</p>	
                            <div class="form-group">
                                <label  for="Height" >Height:</label>  
                            </div>
                            <div class=" form-group  "> 
                                <input type="range" id="fast_htRange2" name="fast_htRange2"  min="121.9" max="243.8" oninput="this.form.fast_ht2.value=this.value"  onchange="conv2(3);"   step="0.1"  value="121.9"  list="ht_rangeList2" />
                                <datalist id="ht_rangeList2">
                                    <?php
                                        for ($i=0; $i<=243.8; $i++) {
                                            echo "<option>$i</option>";
                                        }
                                    ?>
                                </datalist>
                            </div>			
                            <div class="form-group form-inline  ">
                                <input type="number" name="fast_ht2" id="fast_ht2" oninput="this.form.fast_htRange2.value=this.value"   class="form-control input-lg" required="" maxlength="5" placeholder="cm" style=" width: 100px;" step="0.1" min="121.9" max="243.8"  onchange="conv2(3);"value="121.9"	/>cm
                                <input type="number" name="fast_ht_ft2" id="fast_ht_ft2" class="form-control input-lg" size="5" style=" width: 80px;" onchange="conv2(1)" maxlength="1" min="4" max="8"  required="" value="4"/>ft
                                <input type="number" name="fast_ht_in2" id="fast_ht_in2" class="form-control input-lg"size="5"  style=" width: 80px;" onchange="conv2(2);" step="0.1" maxlength="3"  required="" value="0" />in
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4" align="center" >
                        <div id="fast_ter_gender_img"></div>		
                        <div id="fast_ter_gender_copyright" class="fast_ter_gender_copyright"></div>
                    </div>
                    <div class="col-md-4"  align="center"  style="margin-top: 160px;vertical-align:  bottom;">
                        <div  id="fast_dbw_div1"  >
                            <div  id="fast_dbw1"></div>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-bottom: 50px;">
                    <div class="col-md-6" style="margin-bottom: 20px;">
                        <div id="pa_lvl_div" style="display: none;">
                            <div class="form-group ">
                                <label  title="Physical Level represents the degree of a person's daily physical activity as a number, and is applied to estimate a person's total energy expenditure. Together with the basal metabolic rate, it can be used to compute the energy a person needs in order to maintain a particular lifestyle. " for="PA level" >Physical Activity Level:</label>
                            </div>
                            <div class="form-group">
                                <select name="fast_pa_lvl" id="fast_pa_lvl" class="form-control input-lg" >
                                    <?php
                                        foreach($groups as $row){
                                            echo "<option value=\"$row->id\" data-toggle=\"tooltip\" title=\"$row->pa_lvl_desc\"  data-placement=\"right\"  >".$row->pa_lvl."</option>";		    
                                        }
                                    ?>
                                </select>
                                <input type="hidden" id="fast_pa_lvl_val" name="pa_lvl_val" readonly="" class="form-control" value="30" />
                            </div>
                            <div id="fast_pa_lvl_img" align="center" >
                                <img src="<?php echo base_url(); ?>assets/images/fast/sedentary.png" alt="Physical Activity Level" width="350" height="350" />
                            </div>	
                            <div id="fast_pa_lvl_desc">
                                Driving, computer work, ironing, cooking; sits and stands most of the day;  rarely gets any physical activity during the whole day.
                            </div>		
                        </div>
                    </div>
                    <div class="col-md-6 " align="center" style="margin-top: -155px;">
                        <div id="fast_nutrition_chart_div" style="margin-top: 50px;" >
                            <div id="fast_ter_label"></div>
                            <div id="nutrition_chart" style="background: url('<?php echo base_url(); ?>assets/images/fast/chart.png');   width: 380px; height: 280px; background-repeat: no-repeat; position: relative;"  >
                                <div style="position: absolute;margin-bottom:150px; bottom: 40px; left:30%;  font-weight: bold; width:150px; ">
                                    <p style="text-align: center"><span id="fast_carbo_label"></span>  <a href="#" id="carbohydrates" class="link"><strong>Carbohydrates</strong></a></p>
                                </div>
                                <div style="position: absolute;margin-bottom:100px; bottom: 40px; left:45%;  font-weight: bold; width:50px; ">
                                    <h3>65%</h3>
                                </div>
                                <div style="position: absolute;margin-bottom:20px; bottom: 40px; left: 35%;  font-weight: bold; width:50px; ">
                                    <h3>15%</h3>
                                </div>
                                <div style="position: absolute;margin-bottom:2px; bottom: 20px; left:-1%;  font-weight: bold; width:150px; ">
                                    <p ><span id="fast_pro_label"></span><a href="#" id="protein" class="link"> <strong>Protein </strong></a></p>
                                </div>
                                <div style="position: absolute; margin-bottom:20px; bottom: 40px; left: 45%;  font-weight: bold; width:100px;  ">
                                    <h3>20%</h3>
                                </div>
                                <div style="position: absolute;margin-bottom:2px; bottom: 20px; left:60%;  font-weight: bold; width:150px; ">
                                    <p ><span id="fast_fat_label"></span> <a href="#" id="fat" class="link"><strong> Fat</strong> </a></p>
                                </div>	
                            </div>	
                            <p>For more information about food, visit <a href="http://i.fnri.dost.gov.ph/fct/library" class="btn btn-primary btn-sm">PhilFCT</a> & <a href="http://i.fnri.dost.gov.ph/menuevalplus" class="btn btn-primary btn-sm">Menu Eval Plus</a></p>
                            <br>
                            <div align="left" id="fast_pdri"></div>
                        </div>		
                    </div>
                </div> 

                <p class="disclaimer">All computations are based on metric units (i.e kilograms, centimeters)</p>
            </div>
        </form>
<!--
    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
	 
<div class="tab-pane fade in wc_content" id="d" >
-->
    <form id="form">
        <hr class="colorgraph">
        <p>Waist circumference is an indirect measure of abdominal fat or central obesity. High waist circumference increases the risks of lifestyle diseases.	<a href="" id="read_wc" class="btn btn-success btn-xs" style="color: #ffffff;">Read More</a></p>			
        <p>Enter your <i><strong>waist circumference</strong></i> or move the slider.</p>
        <div id="wc_dialog" class="col-md-12" style="display: none;  background: #fbedb8;"></div>
        <div class="form-group  ">
            <label class="control-label" for="Gender">Gender:</label>
        </div>
        <div class="form-group  ">
            <select name="fast_gender" id="fast_gender"  class="form-control input-lg gender-b" style="width:30%;"  >
                <option value="1" >Male</option>
                <option value="2">Female</option>
            </select>        
        </div> 
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="Waist Circumference"  title="Waist circumference measurementshould be made at the approximate midpoint between the lower   of the last palpable rib and the top of the iliac crest. Waist circumference is a reliable indicator of obesity and increased risk of lifestyle diseases. Waist-to-hip ratio is also being used for the same purpose, but research has shown that using only the waist measurement gives you the same level of information. ">Waist Circumference:</label>
                </div> 	
                <div class="form-group">
                    <input type="range" id="fast_waistRange" name="fast_waistRange" min="50.8" max="180"  oninput="this.form.fast_wc.value=this.value"   step="0.1"  value="50.8" list="wc_rangeList"  />
                    <datalist id="wc_rangeList">	   
                        <?php
                            for ($i=50; $i<=180; $i++) {
                                echo "<option>$i</option>";
                            }
                        ?>
                    </datalist>
                </div>
                <div class="form-group form-inline  ">
                    <input type="number" name="fast_wc" id="fast_wc"  class="form-control input-lg" required=""  oninput="this.form.fast_waistRange.value=this.value" step="0.1" min="50.8" max="180" value="50.8" style="width: 100px;"  />
                    <select name="fast_wc_opt" id="fast_wc_opt"   class="form-control input-lg" style="width: 150px;" >
                        <option value="in" >inches</option>
                        <option value="cm" selected="">centimeters</option>
                    </select>
                </div>	
            </div>
            <div class="col-md-4" align="center">
                <div id="fast_risk_indicator_img_div">
                    <div id="fast_risk_indicator_img" ></div>
                </div>
                <div style="position: absolute; margin-bottom:20px; bottom: 210px; font-weight: bold; width:200px;  ">
                    <span id="fast_waist_label" ></span>
                </div>
                <div style="position: absolute;margin-bottom:2px; bottom: 150px;  font-weight: bold; width:150px; ">
                    <span id="fast_hip_label">	</span>
                </div>
            </div>		
            <div class="col-md-4" align="center">
                <div id="fast_risk_indicator_div">
                    <div id="fast_risk_indicator"></div>		
                </div>
            </div>
        </div>
        <p class="disclaimer">All computations are based on metric units (i.e kilograms, centimeters)</p>
    </form>
<!--
</div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
	 
	 <div class="tab-pane fade in whipr_content" id="e" >
-->
	 <form id="form">
		<hr class="colorgraph">
		<p>Waist-Hip Ratio is a useful indicator of body fat distribution which is a valuable tool in assessing health risks such as type 2 diabetes and cardiovascular diseases.	<a href="" class="btn btn-success btn-xs" id="read_whipr" style="color: #ffffff;">Read More</a></p>		
		
		

<p>Enter your <i><strong>waist circumference </strong></i>and <i><strong>hip circumference</strong></i> or move the sliders.</p>


<div id="whipr_dialog"  class="col-md-12" style="display: none;  background: #fbedb8;">	
		
			</div>	 







<div class="row">
<div class="col-md-6">
	<div class="form-group ">
            <label class="control-label" for="Gender">Gender:</label>
            </div>

             <div class="form-group  ">
      <select name="fast_gender2" id="fast_gender2"  class="form-control input-lg"   >
        
	<option value="1" >Male</option>
      <option value="2">Female</option>
        </select>
             
          </div>
		  	
		<div class="form-group">
				<label for="Waist Circumference"  title="Waist circumference measurementshould be made at the approximate midpoint between the lower   of the last palpable rib and the top of the iliac crest. Waist circumference is a reliable indicator of obesity and increased risk of lifestyle diseases. Waist-to-hip ratio is also being used for the same purpose, but research has shown that using only the waist measurement gives you the same level of information. ">Waist Circumference:</label>
		 </div> 
		
		<div  class=" form-group">
	  		 <input type="range" id="fast_waistRange1" name="fast_waistRange1" min="50.8" max="180"  oninput="this.form.fast_wc1.value=this.value"   step="0.1"  value="50.8"list="wc_rangeList1" />
			 
			 	 <datalist id="wc_rangeList1">
		   
	<?php
	for ($i=50; $i<=180; $i++) {

   echo "<option>$i</option>";

}
	
	?>
</datalist>
	   </div>
	
	 	<div class="form-group form-inline  ">
			<input type="number" name="fast_wc1" id="fast_wc1"  class="form-control input-lg" required=""  oninput="this.form.fast_waistRange1.value=this.value" step="0.1" value="50.8" style="width: 100px;" min="50.8" max="180"  />
			<select name="fast_wc_opt1" id="fast_wc_opt1"   class="form-control input-lg" style="width: 150px;" >
<option value="in" >inches</option>
<option value="cm" selected="">centimeters</option>
			</select>
          
          </div>	
	  	
	
</div>

<div class="col-md-6" align="center">
	
	<div  id="fast_waist_img_div"   style="background: url('<?php echo base_url(); ?>assets/images/fast/waist.svg');   width: 400px; height: 280px; background-repeat: no-repeat; position: relative;">
				
			
			<div  style="position: absolute;margin-bottom:150px; bottom: 100px; left:30px;  font-weight: bold; width:250px; ">
			<div id="fast_whipr_div" style="display: none;" >
				<div class="fast_whipr" id="fast_whipr" >
				
				
				</div>
				
			</div>
			
		<input type="hidden" id="fast_whipr_val" class="form-control" />
			</div>	
			
				
			</div>
		
	
	
	
</div>


</div>





<div class="row" style="margin-bottom: 50px;">
<div class="col-md-6">
	
	<div class=" form-group    ">
			<label for="Hip Circumference" title="Hip circumference measurement should be taken around the widest portion of the buttocks. In addition to waist measurement, hip is measured to derive a Waist-Hip Ratio which is a useful tool in assessing risk of having Non-communicable diseases. "> Hip Circumference:</label> </div>

		<div class=" form-group ">
	   		<input type="range" id="fast_hipRange" name="fast_hipRange" min="50.8" max="180"  oninput="this.form.fast_hc.value=this.value" value="50.8"   step="0.1" list="hc_rangeList"/>
				 <datalist id="hc_rangeList">
		   
	<?php
	for ($i=50; $i<=180; $i++) {

   echo "<option>$i</option>";

}
	
	?>
</datalist>
	   </div>
	   
		 <div class="form-group form-inline" >
       			<input type="number" name="fast_hc" id="fast_hc" class="form-control input-lg" required="" required="" step="0.1" oninput="this.form.fast_hipRange.value=this.value" value="50.8" style="width: 100px;" min="50.8" max="180"  />
				<select name="fast_hc_opt" id="fast_hc_opt" class="form-control input-lg" style="width: 150px;"  >
<option value="in">inches</option>
<option value="cm" selected="">centimeters</option>
				</select>
           
 			</div>	
		
		
	
	
	
</div>

<div class="col-md-6" >
	<div id="fast_whipr_label_div">
		<div id="fast_whipr_label"  >
				
				
				</div>
			</div>
	
</div>


</div>



<p class="disclaimer">All computations are based on metric units (i.e kilograms, centimeters)</p>
		</form>
<!--
					</div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
					
					
			 <div class="tab-pane fade in whtr_content" id="f" >		
-->
			 <form id="form">
			 	<hr class="colorgraph">
		<p>Waist-Height measurement is a new proxy measure for obesity and is calculated from measures of waist circumference divided by height in centimeters. A value greater than 0.5 may indicate obesity.  	<a href="" class="btn btn-success btn-xs" id="read_whtr" style="color: #ffffff;">Read More</a></p>
	
	
		
		
		<div id="whtr_dialog" class="col-md-12" style="display: none;  background: #fbedb8;">	
		
			
		</div>
		
		
			
		<p>Enter your <i><strong>waist circumference</strong></i> and <i><strong>height</strong></i> or move the sliders.</p>
			
			
			
			
			
		  <div class="form-group  ">
            <label class="control-label" for="Gender">Gender:</label>
            </div>
            <div class="form-group  ">
      <select name="fast_gender2" id="fast_gender2"  class="form-control input-lg gender-c" style="width:30%;"  >
        
	<option value="1" >Male</option>
      <option value="2">Female</option>
        </select>
             
          </div>
		  
		  
		  
		  <div class="row" style="margin-bottom: 50px;">
		  	
			<div class="col-md-4">
				<div class="form-group">
				<label for="Waist Circumference"  title="Waist circumference measurementshould be made at the approximate midpoint between the lower   of the last palpable rib and the top of the iliac crest. Waist circumference is a reliable indicator of obesity and increased risk of lifestyle diseases. Waist-to-hip ratio is also being used for the same purpose, but research has shown that using only the waist measurement gives you the same level of information. ">Waist Circumference:</label>
		 </div> 
		
		<div id="fast_waistRange_div2"  class=" form-group    ">
	  		 <input type="range" id="fast_waistRange2" name="fast_waistRange2"  oninput="this.form.fast_wc2.value=this.value"   step="0.1"  value="50.8" min="50.8" max="180" list="wc_rangeList2"/>
				 <datalist id="wc_rangeList2">
		   
	<?php
	for ($i=50; $i<=180; $i++) {

   echo "<option>$i</option>";

}
	
	?>
</datalist>
	   </div>
	
	 	<div class="form-group form-inline  ">
			<input type="number" name="fast_wc2" id="fast_wc2"  class="form-control input-lg" required=""  oninput="this.form.fast_waistRange2.value=this.value" step="0.1" value="50.8" min="50.8" max="180"   style="width: 100px;"  />
			<select name="fast_wc_opt2" id="fast_wc_opt2"   class="form-control input-lg" style="width: 150px;" >
<option value="in" >inches</option>
<option value="cm" selected="">centimeters</option>
			</select>
          
          </div>	
	  	
		
		
	<div class="form-group">
		      <label  for="Height" >Height:</label>  
			  </div>
			  
			  
			 <div class=" form-group    "> 
	   <input type="range" id="fast_htRange3" name="fast_htRange3"  min="121.9" max="243.8" oninput="this.form.fast_ht3.value=this.value"  onchange="conv3(3);"   step="0.1"  value="121.9"  list="ht_rangeList3"  />
	   
	   
	      <datalist id="ht_rangeList3">
		   
	<?php
	for ($i=0; $i<=243.8; $i++) {

   echo "<option>$i</option>";

}
	
	?>
</datalist>
	   </div>			

		  <div class="form-group form-inline  ">
	
              <input type="number" name="fast_ht3" id="fast_ht3" oninput="this.form.fast_htRange3.value=this.value"   class="form-control input-lg" required="" maxlength="5" placeholder="cm" style=" width: 95px;" step="0.1"   onchange="conv3(3);"value="140"  min="121.9" max="243.8" min="50.8" max="180"/>cm
          

			<input type="number" name="fast_ht_ft3" id="fast_ht_ft3" class="form-control input-lg" size="5" style=" width: 78px;" onchange="conv3(1)" maxlength="1"  required="" value="4"  min="4" max="8" />ft
			
			<input type="number" name="fast_ht_in3" id="fast_ht_in3" class="form-control input-lg"size="5"  style=" width: 78px;" onchange="conv3(2);" step="0.1" maxlength="3"  required="" value="0" />in
			  
			      </div>
				

				
			</div>
			
			
			<div class="col-md-4" align="center">
				<div id="fast_whtr_img_div">
	
	</div>
				
				
				
			</div>
			
			<div class="col-md-4" align="center">
					<div id="fast_whtr_div">
	<div id="fast_whtr_label">
		
	</div>
		</div>	
		
				
			</div>
			
			
		  </div>	
			
			
			
				

			
	
			<p class="disclaimer">All computations are based on metric units (i.e kilograms, centimeters)</p>	
				
				
</form>

<!--
     		</div>


     				</div>
						</div>
						
						
								</div>
-->
							
									</div>
					
			
			
	
							<div class="alert alert-success" style="margin-top: 20px; margin-bottom: 10px; padding: 10px 0px 10px 0px;"  >
										<div align="center">For personalized diet and nutrition concern, it is best to seek advice from a Registered Nutritionist-Dietitian. CONSULT NOW! - Disclaimer</div>
										
									
									</div>
									
<?php $this->load->view('main_footer'); ?>
