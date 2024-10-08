<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$title; ?></title>
    <link rel="shortcut icon" href="<?=base_url("assets/images/ncs.png"); ?>"/> 
    <link rel="stylesheet" href="<?=base_url("assets/css/jquery-ui-1.10.4.custom.css"); ?>" />
    <link rel="stylesheet" href="<?=base_url("assets/css/bootstrap.min.css"); ?>"/>
    <link rel="stylesheet" href="<?=base_url("assets/font-awesome-4.1.0/css/font-awesome.min.css"); ?>"/>
    <link rel="stylesheet" href="<?=base_url("assets/css/fast_style.css"); ?>"/>
    
</head>
<body>
    
<?php $this->load->view('navbar'); ?>
    
<style>
#dbw_header1_design:hover {
    cursor: pointer;
}    
#dbw_header1_design {
    font-weight: bold;
    color: red;
}    
    
[type="radio"]:checked,
[type="radio"]:not(:checked) {
    position: absolute;
    left: -9999px;
}
[type="radio"]:checked + label,
[type="radio"]:not(:checked) + label
{
    position: relative;
    padding-left: 28px;
    cursor: pointer;
    line-height: 20px;
    display: inline-block;
    color: #666;
}
[type="radio"]:checked + label:before,
[type="radio"]:not(:checked) + label:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 18px;
    height: 18px;
    border: 1px solid #ddd;
    border-radius: 100%;
    background: #fff;
}
[type="radio"]:checked + label:after,
[type="radio"]:not(:checked) + label:after {
    content: '';
    width: 12px;
    height: 12px;
    background: #F87DA9;
    position: absolute;
    top: 4px;
    left: 4px;
    border-radius: 100%;
    -webkit-transition: all 0.2s ease;
    transition: all 0.2s ease;
}
[type="radio"]:not(:checked) + label:after {
    opacity: 0;
    -webkit-transform: scale(0);
    transform: scale(0);
}
[type="radio"]:checked + label:after {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
}

    
.con_box {
  position: relative;
  text-align: center;
  color: white;
}
.centered {
  position: absolute;
  top: 28%;
  left: 50%;
  transform: translate(-50%, -50%);
  border: 3px solid maroon;
  border-radius: 8%;
}
.centered_waist {
  position: absolute;
  top: 35%;
  left: 50%;
  transform: translate(-50%, -50%);
  border: 3px solid maroon;
  border-radius: 8%;
  padding-left: 5%;
  padding-right: 5%;
} 
.top_data {
  position: absolute;
  top: 3%;
  left: 50%;
  transform: translate(-50%, -50%);
  border: 3px solid maroon;
  font-size: 120%;
  color: #d35400;
  font-weight: bold;
}
.centered_plate1{
  position: absolute;
  top: 3%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 100%; 
  color: #d35400; 
  font-weight: bold;
}
.centered_plate2{
  position: absolute;
  top: 80%;
  left: 15%;
  transform: translate(-50%, -50%);
  font-size: 100%; 
  color: #d35400; 
  font-weight: bold;
}
.centered_plate3{
  position: absolute;
  top: 80%;
  left: 75%;
  transform: translate(-50%, -50%);
  font-size: 100%; 
  color: #d35400; 
  font-weight: bold;
}
</style>
  
<div style="margin-left: 10%; margin-right: 10%;">
    <h1 class="page-header">Fast Assessment and Screening Tools</h1>
    <p>Calculators and guides useful in the assessment of nutritional risks and status of individuals. Enter the required information to calculate and evaluate an individual’s current health and nutritional condition.</p>                                          
    <div class="row">
        <div class="col-sm-4">
            <label for="input">SEX:</label>
            <select onclick='compute_calc()' name="gender" class="input form-control space_sub" id="gender">
                <option value="0">Sex</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
            </select>
        </div>
        <div class="col-sm-4">
            <label for="input">Weight (kg):</label>
            <div class="row">
                <div class="col-sm-7">
                    <input onkeyup='compute_calc()' type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" min="0" type='text' maxlength="7" max="1000" name="weight" required class="form-control" id="weight" placeholder="Weight (kg)">
                    
                    <input onkeyup='compute_calc()' type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" min="0" type='text' maxlength="7" max="1000" name="weight_lbs" required class="form-control hidden" id="weight_lbs" placeholder="Weight (lbs)">
                </div>
                <div class="col-sm-5">
                    <select onmouseleave='weight_func()' name="weight_unit" class="input form-control space_sub" id="weight_unit">
                        <option value="1">Kilogram (kg)</option>
                        <option value="2">Pounds (lbs)</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <label for="input">Height (cm):</label>
            <div class="row">
                <div class="col-sm-7">
                    <input onkeyup='compute_calc()' type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" min="0" type='text' maxlength="7" max="1000" name="height" required class="form-control" id="height" placeholder="Height (cm)">
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <input onkeyup='compute_calc()' type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" min="0" type='text' maxlength="7" max="1000" name="feet" required class="form-control hidden" id="feet" placeholder="Feet (ft)">
                        </div>
                        <div class="col-sm-6">
                            <input onkeyup='compute_calc()' type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" min="0" type='text' maxlength="7" max="1000" name="inches" required class="form-control hidden" id="inches" placeholder="Inches (in)">
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <select onmouseleave='height_func()' name="height_unit" class="input form-control space_sub" id="height_unit">
                        <option value="1">Centimeters (cm)</option>
                        <option value="2">Feet & Inches (ft/in)</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-4">
            <label for="input">Date of Birth:</label>
            <input onkeyup='compute_calc()' type="date" name="bday" required id="bday" class="form-control" placeholder="Date of Birth">
        </div>
        <div class="col-sm-4">
            <label for="input">Waist Circumference (cm):</label>
            <div class="row">
                <div class="col-sm-7">
                    <input onkeyup='compute_calc()' type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" min="0" type='text' maxlength="7" max="1000" name="waist_cir" required class="form-control" id="waist_cir" placeholder="Waist Circumference (cm)">
                    
                    <input onkeyup='compute_calc()' type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" min="0" type='text' maxlength="7" max="1000" name="waist_cir_in" required class="form-control hidden" id="waist_cir_in" placeholder="Waist Circumference (In)">
                </div>
                <div class="col-sm-5">
                    <select onmouseleave='waist_cir_func()' name="waist_cir_unit" class="input form-control space_sub" id="waist_cir_unit">
                        <option value="1">Centimeters (cm)</option>
                        <option value="2">Inches (in)</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <label for="input">Hip Circumference (cm):</label>
            <div class="row">
                <div class="col-sm-7">
                    <input onkeyup='compute_calc()' type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" min="0" type='text' maxlength="7" max="1000" name="hip_cir" required class="form-control" id="hip_cir" placeholder="Hip Circumference (cm)">
                    
                    <input onkeyup='compute_calc()' type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" min="0" type='text' maxlength="7" max="1000" name="hip_cir_in" required class="form-control hidden" id="hip_cir_in" placeholder="Hip Circumference (In)">
                </div>
                <div class="col-sm-5">
                    <select onmouseleave='hip_cir_func()' name="hip_cir_unit" class="input form-control space_sub" id="hip_cir_unit">
                        <option value="1">Centimeters (cm)</option>
                        <option value="2">Inches (in)</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-6">
        
        
    <!------ ody Mass Index ------>
    <div class="row">
        <div class="col-sm-9">
            <h3>Body Mass Index: <button type="button" class="btn btn-info btn-sm" data-backdrop="false" data-toggle="modal" data-target="#bmi_result_val"><i class="fa fa-view"></i> Read More...</button></h3>
            <p>Body Mass Index (BMI) is an indicator of one's weight in relation to height. BMI below or above the normal range poses increased health risks.</p>
            <p>Age: <span style="font-weight:bold;" id="result_val2"></span></p>
            <p>Gender: <span style="font-weight:bold;" id="result_val3"></span></p>
            <p>BMI: <span style="font-weight:bold;" id="result_val1"></span></p>
            <p style="font-familt: Century Gothic;">Note: <span id="result_val4"></span></p>
        </div>
        <div class="col-sm-3" style="padding-top: 3%;">
            <center><p><span id="output_1"></span></p></center>
        </div>
    </div>
    
    <!------ Energy Requirement ------>
    <h3>Energy Requirement: </h3>
    <p>Energy requirement is the estimated amount of food energy needed to maintain normal daily physical activities and desirable body weight. Food energy can be derived from carbohydrates, proteins and fat. The usual recommended proportions for these macronutrients are 65% carbohydrates, 15% protein and 20% fat.</p>
    
    <div class="row">
        <div class="col-sm-6">
            <p style="font-familt: Century Gothic;">Note: <span id="result_val9"></span></p>
            <label class="hidden" id="activity_dbw_label">Physical Activity Level:</label>
            <select onmouseleave='compute_calc()' name="activity_dbw_unit" class="input form-control space_sub hidden" id="activity_dbw_unit">
                <option value="1">Secondary</option>
                <option value="2">Light</option>
                <option value="3">Moderate</option>
                <option value="4">Very Active</option>
            </select>
            <br>
        </div>
        <div class="col-sm-6" style="padding-top: 5%;">
            <p style="font-familt: Century Gothic;"><b>Message:</b> <span id="energy_message"></span></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <center><p><span id="activity_pic"></span></p></center>
        </div>
        <div class="col-sm-6">
            
            <center>
                <div class="con_box">
                    <p><span id="output_2"></span></p>
                    <div id="output_message_vesssel_5" class="centered_plate1 hidden"><span id="output_message_5">00.00</span></div>
                    <div id="output_message_vesssel_6" class="centered_plate2 hidden"><span id="output_message_6">00.00</span></div>
                    <div id="output_message_vesssel_7" class="centered_plate3 hidden"><span id="output_message_7">00.00</span></div>
                </div>
            </center>
            
        </div>
    </div>

    </div>
    <div class="col-sm-6">
        
    <!------ Desirable Body Weight ------>
    <div class="row">
        <div class="col-sm-8">
            
            <h3>Desirable Body Weight: </h3>
            <p>The Desirable Body Weight (DBW) is the optimal weight based on a given height which can be computed using the <span type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#dbw_header2_1">Tannhauser Formula</span>, <span type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#dbw_header2_2">Hamwi Formula</span> or <span type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#dbw_header2_3">Body Mass Index (BMI)</span>. The DBW is used in calculating the <span type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#dbw_header1">daily energy requirement.</span></p>
                <form style="padding-left: 2%; padding-right: 2%;" action="#">
                    <div class="row">
                        <div class="col-sm-4">
                            <p>
                                <input type="radio" id="test1" name="radio-group" checked>
                                <label for="test1" onclick='formula_change1()' id="formula_1" class="hidden">Tannhauser Formula</label>
                            </p>
                        </div>
                        <div class="col-sm-4">
                            <p>
                                <input type="radio" id="test2" name="radio-group">
                                <label for="test2" onclick='formula_change2()' id="formula_2" class="hidden">Hamwi Formula</label>
                            </p>
                        </div>
                        <div class="col-sm-4">
                            <p>
                                <input type="radio" id="test3" name="radio-group">
                                <label for="test3" onclick='formula_change3()' id="formula_3" class="hidden">Body Mass Index (BMI)</label>
                            </p>
                        </div>
                    </div>
                </form>
            <p style="font-familt: Century Gothic;">Note: <span id="result_val8"></span></p>
        </div>
        <div class="col-sm-4" style="padding-top: 8%;">
            <center>
                <div class="con_box">
                  <p><span id="output_3"></span></p>
                  <div id="output_message_vesssel_3" class="top_data hidden"><span class="form-control" id="output_message_3">00.00</span></div>
                  <div class="centered">
                        <select onmouseleave='' style="font-size: 90%; color: #d35400;" id="output_option_3" class="input form-control space_sub hidden">
                            <option value="1">Kilogram (kg)</option>
                            <option value="2">Pounds (lbs)</option>
                        </select>
                  </div>
                </div>
            </center>
        </div>
    </div>
        
                <!------ Waist-Hip Ratio ------>
                <h3>Waist-Hip Ratio: <button type="button" class="btn btn-info btn-sm" data-backdrop="false" data-toggle="modal" data-target="#whr1_result_val"><i class="fa fa-view"></i> Read More...</button></h3>
                <p>Waist-Hip Ratio is a useful indicator of body fat distribution which is a valuable tool in assessing health risks such as type 2 diabetes and cardiovascular diseases.</p>
                <p style="font-familt: Century Gothic;">Note: <span id="result_val6"></span></p>
        
    <div class="row">
        <div class="col-sm-8">
                <!------ Waist Circumference ------>
                <h3>Waist Circumference: <button type="button" class="btn btn-info btn-sm" data-backdrop="false" data-toggle="modal" data-target="#wc_result_val"><i class="fa fa-view"></i> Read More...</button></h3>
                <p>Waist circumference is an indirect measure of abdominal fat or central obesity. High waist circumference increases the risks of lifestyle diseases.</p>
                <p style="font-familt: Century Gothic;">Note: <span id="result_val5"></span></p>

                <!------ Waist-Heigh Ratio ------>
                <h3>Waist-Heigh Ratio: <button type="button" class="btn btn-info btn-sm" data-backdrop="false" data-toggle="modal" data-target="#whr2_result_val"><i class="fa fa-view"></i> Read More...</button></h3>
                <p>Waist-Height measurement is a new proxy measure for obesity and is calculated from measures of waist circumference divided by height in centimeters. A value greater than 0.5 may indicate obesity.</p>
                <p style="font-familt: Century Gothic;">Note: <span id="result_val7"></span></p>
        </div>
        <div class="col-sm-4" style="padding-top: 10%;">
            <center>
                <div class="con_box">
                    <p><span id="output_4"></span></p>
                    <div id="output_message_vesssel_4" style="font-size: 300%; background-color: aliceblue; color: #d35400; font-weight: bold;" class="centered_waist hidden"><span id="output_message_4">00.00</span></div>
                </div>
            </center>
        </div>
    </div>
        
    </div> 
</div>
    
    <div class="alert alert-success" style="margin-top: 20px; margin-bottom: 10px; padding: 10px 0px 10px 0px;"  >
        <div align="center">For personalized diet and nutrition concern, it is best to seek advice from a Registered Nutritionist-Dietitian. CONSULT NOW! - Disclaimer</div>
    </div>
    
    
</div>
    
    
    <div class="modal fade" id="dbw_header2_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-sm-10">
                                <h3 class="modal-title" id="exampleModalLabel">Did you know?</h3>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="font-size: 200%; color: red">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        
                        <p style=" text-align: justify;">The Tannhauser formula is used to calculate a person's desirable body weight (DBW).<br><br>
                        To calculate DBW using Tannhauser's Method:<br>
                        1. Measure height in centimeters (cm)<br>
                        2. Deduct from the measurement the factor 100 and the difference is the DBW in kilograms (kg)<br>
                        3. To apply this DBW in Filipino stature, deduct 10%<br><br>
                        </p> 
                        <p class="reference">Food and Nutrition Research Institute - Department of Science and Technology. (1994). Food exchange lists for meal planning. Philippines: Food and Nutrition Research Institute - Department of Science and Technology.</p>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="dbw_header2_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-sm-10">
                                <h3 class="modal-title" id="exampleModalLabel">Did you know?</h3>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="font-size: 200%; color: red">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        
                        <p style=" text-align: justify;">The Hamwi Formula is used to calculate a person's desirable body weight (DBW).<br><br>
                        To calculate DBW using Tannhauser's Method:<br>
                        1. Measure height in centimeters (cm)<br>
                        2. Deduct from the measurement the factor 100 and the difference is the DBW in kilograms (kg)<br>
                        3. To apply this DBW in Filipino stature, deduct 10%<br><br>
                        </p> 
                        <p class="reference">Food and Nutrition Research Institute - Department of Science and Technology. (1994). Food exchange lists for meal planning. Philippines: Food and Nutrition Research Institute - Department of Science and Technology.</p>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="dbw_header2_3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-sm-10">
                                <h3 class="modal-title" id="exampleModalLabel">Did you know?</h3>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="font-size: 200%; color: red">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        
                        <p style=" text-align: justify;">The Body Mass Index (BMI) is used to calculate a person's desirable body weight (DBW).<br><br>
                        To calculate DBW using Tannhauser's Method:<br>
                        1. Measure height in centimeters (cm)<br>
                        2. Deduct from the measurement the factor 100 and the difference is the DBW in kilograms (kg)<br>
                        3. To apply this DBW in Filipino stature, deduct 10%<br><br>
                        </p> 
                        <p class="reference">Food and Nutrition Research Institute - Department of Science and Technology. (1994). Food exchange lists for meal planning. Philippines: Food and Nutrition Research Institute - Department of Science and Technology.</p>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                
            </div>
        </div>
    </div>
    
    
    <div class="modal fade" id="dbw_header1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-sm-10">
                                <h3 class="modal-title" id="exampleModalLabel">Did you know?</h3>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="font-size: 200%; color: red">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        
                        <h3>Daily Energy Requirement</h3>
                        <div class="table-responsive" style="padding-top: 2%; padding-bottom: 2%;">
                            <div class="col-md-4">
                                <img src="<?=base_url();?>/assets/images/fast/energy_requirement.png" alt="Energy Requirement" class="img-border" height="auto" width="100%">
                            </div>
                            <div class="col-md-8">
                                <p style=" text-align: justify;"><strong>Energy requirement</strong> is the amount of food energy needed to balance energy intake and energy expenditure in order to maintain body size, body composition and a level of necessary and desirable physical activity consistent with long-term good health. This includes the energy needed for the optimal growth and development of children, for the deposition of tissues during pregnancy, and for the secretion of milk during lactation consistent with the good health of mother and child.</p>
                            </div>
                        </div>
                        <p class="reference">Food and Agriculture Organization (2004). Human energy requirements. Retrieved from http://www.fao.org/docrep/007/y5686e/y5686e04.htm</p>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="bmi_result_val" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-sm-10">
                                <h3 class="modal-title" id="exampleModalLabel">Body Mass Index (BMI) Formula = Kilogram (kg) / Meter<sup>2</sup> (m<sup>2</sup>)</h3>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="font-size: 200%; color: red">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        
                        <p>The World Health Organization BMI Classification is the recommended international cut-off points in determining underweight, overweight and obese adults.</p>
                        <p align="center"><strong>Table 1.World Health Organization BMI Classification</strong></p>
                        <table border="1" class="table table-condensed">
                            <tbody>
                                <tr>
                                    <th style="text-align: center;">Classification</th>
                                    <th colspan="3" style="text-align: center;">BMI (kg/m<sup>2</sup>)</th>

                                </tr>
                                <tr>
                                    <td></td>
                                    <th style="text-align: center;">Principal cut-off points</th>
                                    <th style="text-align: center;">Additional cut-off points</th>
                                </tr>
                                <tr>
                                    <th>Underweight</th>
                                    <td style="text-align: center;"> &lt;18.50 </td>
                                    <td style="text-align: center;"> &lt;18.50 </td>
                                </tr>
                                <tr>
                                    <td style="text-indent: 20px;">Severe thinness</td>
                                    <td style="text-align: center;">&lt;16.00</td>
                                    <td style="text-align: center;">&lt;16.00</td>
                                </tr>
                                <tr>
                                    <td style="text-indent: 20px;">Moderate thinness</td>
                                    <td style="text-align: center;">16.00 - 16.99</td>
                                    <td style="text-align: center;">16.00 - 16.99</td>
                                </tr>
                                <tr>
                                    <td style="text-indent: 20px;">Mild thinness</td>
                                    <td style="text-align: center;">17.00 - 18.49</td>
                                    <td style="text-align: center;">17.00 - 18.49</td>
                                </tr>
                                <tr>
                                    <th style="vertical-align: middle;">Normal Range</th>
                                    <td style="vertical-align: middle; text-align: center;">18.50 - 24.99</td>
                                    <td style="text-align: center;">18.50 - 22.99<br>23.00 - 24.99</td>

                                </tr>
                                <tr>
                                    <th>Overweight</th>
                                    <td style="text-align: center;">=25.00</td>
                                    <td style="text-align: center;">=25.00</td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: middle; text-indent: 20px;">Pre-obese</td>
                                    <td style="vertical-align: middle; text-align: center;">25.00 - 29.99</td>
                                    <td style="text-align: center;">25.00 - 27.49<br>27.50 - 29.99</td>

                                </tr>
                                <tr>
                                    <th>Obese</th>
                                    <td style="text-align: center;">=30.00</td>
                                    <td style="text-align: center;">=30.00</td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: middle; text-indent: 20px;">Obese Class I</td>
                                    <td style="vertical-align: middle; text-align: center;">30.00 - 34.99</td>
                                    <td style="text-align: center;">30.00 - 32.49<br>32.50 - 34.99</td>

                                </tr>
                                <tr>
                                    <td style="vertical-align: middle; text-indent: 20px;">Obese Class II</td>
                                    <td style="vertical-align: middle; text-align: center;">35.00 - 39.99</td>
                                    <td style="text-align: center;">35.00 - 37.49<br>37.50 - 39.99</td>

                                </tr>
                                <tr>
                                    <td style="text-indent: 20px;">Obese Class III</td>
                                    <td style="text-align: center;">=40.00</td>
                                    <td style="text-align: center;">=40.00</td>

                                </tr>
                            </tbody>
                        </table>
                            <p class="reference">
                                <i>Source: Adapted from WHO, 1995, WHO, 2000 and WHO 2004.</i></p>
                                <br><br><br>
                                <p>The International Obesity Task Force (IOTF) - Asia Pacific recommends lower cut-off for normal BMI among Asians because of their higher risk of type 2 diabetes and cardiovascular disease which is substantial at BMI's lower than the WHO cut-offs.
                            </p>

                        <p align="center"><strong>Table 2. International Obesity Task Force (IOTF) - Asia Pacific BMI Classification</strong></p>

                        <table border="1" class="table table-condensed">
                            <tbody>
                                <tr>
                                    <th style="text-align: center;" width="220">Classification</th>
                                    <th colspan="3" style="text-align: center;">BMI (kg/m<sup>2</sup>)</th>

                                </tr>
                                <tr>
                                    <td></td>
                                    <th style="text-align: center;" width="280">Principal cut-off points</th>
                                    <th style="text-align: center;">Additional cut-off points</th>
                                </tr>
                                <tr>
                                    <th>Underweight</th>
                                    <td style="text-align: center;">&lt;18.50</td>
                                    <td style="text-align: center;">Low (but increased risk of other clinical problems)</td>
                                </tr>
                                <tr>
                                    <td style="text-indent: 20px;">Normal Range </td>
                                    <td style=" text-align: center;">18.50 - 22.9</td>
                                    <td style="text-align: center;">Average</td>

                                </tr>
                                <tr>
                                    <td style="text-indent: 20px;">  At risk </td>
                                    <td style=" text-align: center;">23.00 - 24. 9</td>
                                    <td style="text-align: center;">Increased</td>

                                </tr>
                                <tr>
                                    <td style="text-indent: 20px;"> Obese class I </td>
                                    <td style=" text-align: center;">25.00 - 29.9</td>
                                    <td style="text-align: center;">Moderate</td>

                                </tr>
                                <tr>
                                    <td style=" text-indent: 20px;">  Obese class III </td>
                                    <td style=" text-align: center;">=30.00</td>
                                    <td style="text-align: center;">Severe</td>

                                </tr>
                            </tbody>
                        </table>

                            <p class="reference">References:<br><br>
                            World Health Organization.BMI classifications. 2006. Retrieved from http://apps.who.int/bmi/index.jsp?introPage=intro_3.html&amp;.  Accessed  August 9, 2014.<br><br>
                            WHO/IASO/IOTF. The Asia-Pacific perspective: redefining obesity and its treatment. Health Communications Australia: Melbourne, 2000.<br><br>
                            Growth charts retrieved from WHO: http://www.who.int/childgrowth/standards/en/
                            </p>

                        <br><br>

                            <p class="reference">
                                Icons Adapted From:<br><br>
                                Baby boy: http://www.flaticon.com/free-icon/boy_188573#term=child&amp;page=1&amp;position=63<br>
                                Baby girl: http://www.flaticon.com/free-icon/boy_188538#term=child&amp;page=1&amp;position=64<br>
                                Kid boy: http://www.flaticon.com/free-icon/boy_146008<br>
                                Kid girl: http://www.flaticon.com/free-icon/girl_146006<br>
                                Adolescent boy: http://www.flaticon.com/free-icon/boy_145867<br>
                                Adolescent girl: http://www.flaticon.com/free-icon/girl_145852<br>
                            </p>


                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                
            </div>
        </div>
    </div>
   
    <div class="modal fade" id="wc_result_val" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-sm-10">
                                <h3 class="modal-title" id="exampleModalLabel">Waist Circumference</h3>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="font-size: 200%; color: red">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        
                            <p style="text-indent: 20px; text-align: justify;">Proper measurement of waist circumference should be between the hipbone and the lowest rib.  Waist circumference should not be used as a single measure of obesity but in combination with BMI.</p> 
                            <div class="table-responsive">
                                <table border="1" class="table table-condensed">
                                    <tbody>
                                        <tr>
                                            <th style="text-align: center;" >Sex</th>
                                            <th style="text-align: center;" >Cut-off Value</th>
                                            <th style="text-align: center;" >Risk</th>

                                        </tr>
                                        <tr>
                                            <th style="text-align: center;">Male</th>
                                            <td style="text-align: center;">&lt;94 cm<br><br><br><br>=94 cm</td>
                                            <td style="text-align: center;">
                                            Low Risk of developing cardiovascular diseases and type-2 diabetes.

                                            <br><br>High Risk of developing cardiovascular diseases and type-2 diabetes.</td>

                                        </tr>



                                        <tr>
                                            <th style="text-align: center;">Female</th>
                                            <td style="text-align: center;">&lt;80 cm<br><br><br><br>=80 cm</td>
                                            <td style="text-align: center;">
                                            Low Risk of developing cardiovascular diseases and type-2 diabetes.

                                            <br><br>High Risk of developing cardiovascular diseases and type-2 diabetes.</td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                        <p class="reference">World Health Organization. (2008). Waist circumference and waist-hip ratio report of WHO ex[ert consultation. Geneva, Switzerland: WHO Document Production Services.</p>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="whr1_result_val" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-sm-10">
                                <h3 class="modal-title" id="exampleModalLabel">Waist-Hip Ratio</h3>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="font-size: 200%; color: red">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        
                        <p style="text-indent: 20px; text-align: justify;">Proper measurement of waist circumference should be between the hipbone and the lowest rib while hip circumference should be taken around the widest portion of the buttocks. </p> 
                        <div class="table-responsive">
                            <table border="1" class="table table-condensed">
                               <tbody>
                                   <tr>
                                        <th style="text-align: center;" >Sex</th>
                                        <th style="text-align: center;" >Cut-off Value</th>
                                        <th style="text-align: center;" >Risk</th>

                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Male</th>
                                        <td style="text-align: center;">&lt;90 cm<br><br><br><br><br><br>=90 cm</td>
                                        <td style="text-align: center;">

                                                Low risk of developing obesity-related diseases like heart diseases, hypertension and type 2 diabetes.<br><br>

                                            High risk of developing obesity-related diseases like heart diseases, hypertension and type 2 diabetes
                                        </td>

                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Female</th>
                                        <td style="text-align: center;">&lt;85 cm	<br><br><br><br><br><br> =85 cm</td>
                                        <td style="text-align: center;">Low risk of developing obesity-related diseases like heart diseases, hypertension and type 2 diabetes<br><br>High risk of developing obesity-related diseases like heart diseases, hypertension and type 2 diabetes </td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                            <p class="reference">World Health Organization. (2008). Waist circumference and waist-hip ratio report of WHO expert consultation. Geneva, Switzerland: WHO Document Production Services.</p>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="whr2_result_val" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-sm-10">
                                <h3 class="modal-title" id="exampleModalLabel">Waist-Heigh Ratio</h3>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="font-size: 200%; color: red">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        
                        <p>The Waist-Height Ratio (WHtR) is a recently introduced index which is under study as a sensitive screening tool in predicting cardiometabolic risk of adults from different nations. Its key message can be simply stated as to: "keep your waist circumference to less than half your height". </p>
                        <p>WHtR is a simple and practical anthropometric index to identify higher metabolic risks among normal and overweight individuals (Hsieh, 2003)</p>
                        <p>A boundary value of WHTR =0.5 indicates increased risk for men and women (Ashwell and Hsieh, 2005).</p>
                        <p>It is suggested that WHtR should not be used as a single measure of obesity but it can be used in combination with other screening tools like waist circumference and body mass index.</p><br><br>
                        <p class="reference">Ashwell, M. &amp; Hsieh, SD. (2005). Six reasons why the waist-to-height ratio is a rapid and effective global indicator for health risks of obesity and how its use could simplify the international public health message on obesity. Int J Food Sci, 56(5), 303-307.</p>
                        <p class="reference">Hsieh, SD, Yoshinaga H &amp; Muto T. (2003). Waist-to-height ratio, a simple and practical index for assessing central fat distribution and metabolic risk in Japanese men and women. International Journal of Obesity, 27, 610-616. doi:10.1038/sj.ijo.0802259.</p>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                
            </div>
        </div>
    </div>
    
    
    <div class="modal fade" id="cardio_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-sm-10">
                                <h3 class="modal-title" id="exampleModalLabel">Heart Disease or Cardiovascular Disease</h3>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="font-size: 200%; color: red">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
    
                        <div class="table-responsive">
                            <div class="col-md-4">
                                <img src="<?=base_url();?>/assets/images/fast/heart_disease.png" alt="Heart Disease" height="auto" width="100%" class="img-border">
                            </div>
                            <div class="col-md-8">
                                <p style=" text-align: justify;">Cardiovascular disease is a general term for diseases of the heart and blood vessels. It includes coronary heart disease (heart attacks), cerebrovascular disease (stroke), hypertension, peripheral artery disease, rheumatic heart disease, congenital heart disease and heart failure. The major causes of cardiovascular disease are tobacco use, physical inactivity, and unhealthy diet and harmful use of alcohol.</p>
                            </div>
                        </div><br>
			
                            <p class="reference">World Health Organization. (2015). Cardiovascular diseases. Retrieved from http://www.who.int/topics/cardiovascular_diseases/en/</p>
                            <p class="reference">Photo source: http://www.medicaldaily.com/fda-approves-stem-cell-treatment-heart-disease-mayo-clinic-test-technique-human-trial-267408</p>
    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                
            </div>
        </div>
    </div>
    
    
    <div class="modal fade" id="hypertension_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-sm-10">
                                <h3 class="modal-title" id="exampleModalLabel">Hypertension</h3>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="font-size: 200%; color: red">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
    
                        <div class="table-responsive">
                            <div class="col-md-4">
                                <img src="<?=base_url();?>/assets/images/fast/hypertension.png" alt="Hypertension" class="img-border" height="auto" width="100%">
                            </div>
                            <div class="col-md-8">
                                <p style=" text-align: justify;">Hypertension, also known as high or raised blood pressure, is a condition in which the blood vessels have persistently raised pressure. </p> 
                            </div>
                        </div><br>
			
                            <p class="reference">World Health Organization. (2015). Hypertension. Retrieved from http://www.who.int/topics/hypertension/en/</p>
                            <p class="reference">Photo source: http://dailypresspk.com/</p>
    
                 </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="diabetes_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-sm-10">
                                <h3 class="modal-title" id="exampleModalLabel">Type 2 Diabetes</h3>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="font-size: 200%; color: red">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
    
                         <div class="table-responsive">
                            <div class="col-md-4">
                                <img src="<?=base_url();?>/assets/images/fast/type2diabetes.png" alt="Diabetes" class="img-border" height="auto" width="100%">
                            </div>
                            <div class="col-md-8">
                                <p style="text-align: justify;">Type 2 diabetes (formerly called non-insulin-dependent or adult-onset diabetes) is caused by the body's ineffective use of insulin. It often results from excess body weight and physical inactivity.</p>
                            </div>
			             </div><br>
			
                            <p class="reference">World Health Organization. (2015). DiabeteS. Retrieved from http://www.who.int/topics/diabetes_mellitus/en/</p>
                            <p class="reference">Photo source: http://www.tribunnews.com/ramadan/2012/07/26/penderita-diabetes-wajib-kontrol-gula-darah-ketika-puasa</p>
									
                 </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="cancer_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-sm-10">
                                <h3 class="modal-title" id="exampleModalLabel">Cancer</h3>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="font-size: 200%; color: red">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
    
                        <div class="table-responsive">
                            <div class="col-md-4">
                                <img src="<?=base_url();?>/assets/images/fast/cancer.png" alt="Cancer" class="img-border" height="auto" width="100%">
                            </div>
                            <div class="col-md-8">
                                <p style=" text-align: justify;">Cancer is the uncontrolled growth and spread of cells. It can affect almost any part of the body. The growths often invade surrounding tissue and can spread or metastasize to distant sites. Many cancers can be prevented by avoiding exposure to common risk factors, such as tobacco smoke. In addition, a significant proportion of cancers can be cured, by surgery, radiotherapy or chemotherapy, especially if they are detected early.</p> 
                            </div>
                        </div><br>
    
			                 <p class="reference">World Health Organization. (2015). Cancer. Retrieved from http://www.who.int/topics/cancer/en/  </p>
			
                     </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="physical_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-sm-10">
                                <h3 class="modal-title" id="exampleModalLabel">Physical Activity</h3>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="font-size: 200%; color: red">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
    
                        <div class="table-responsive">
                            <div class="col-md-4">
                                <img src="<?=base_url();?>/assets/images/fast/physical_activity.png" alt="Physical Activity" class="img-border" height="auto" width="100%">
                            </div>
                            <div class="col-md-8">
                                <p style=" text-align: justify;">Movement of the body that uses energy is the most basic meaning of physical activity. There are 3 categories of PA namely light, moderate or vigorous intensity which can be observed by the way an activity makes you breathe harder and your heart beat faster.</p>
                            </div>
                        </div><br>
                            <p class="reference">World Health Organization. (2015). Physical Activity. Retrieved from http://www.who.int/mediacentre/factsheets/fs385/en/</p>          
                            <p class="reference">United States Department of Agriculture. (2015). Physical Activity. Retrieved from http://www.choosemyplate.gov/physical-activity/what.html</p>
    
                     </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                
            </div>
        </div>
    </div>

<script>
    
var bmi_message1 = " kg/m2</span> classified as <span style='font-weight:bold; color:red;'>UNDERWEIGHT</span>. This may indicate that you have a <span style='font-weight:bold; color:red;'>HIGHER RISK</span> of acquiring frequent infections, slow wound healing and recovery from illness.<br><small><i>Cut-off used: World Health Organization.</i></small>";

var bmi_message2 = " kg/m2</span> classified as <span style='font-weight:bold; color:green;'>NORMAL</span>. This may indicate that you have a <span style='font-weight:bold; color:green;'>LOWER RISK</span> of acquiring <span style='font-weight:bold; color:red;'"+' type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#cardio_info"'+">heart diseases</span>, <span style='font-weight:bold; color:red;'"+' type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#hypertension_info"'+">hypertension</span>, <span style='font-weight:bold; color:red;'"+' type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#diabetes_info"'+">type 2 diabetes</span> and <span style='font-weight:bold; color:red;'"+' type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#cancer_info"'+">some types of cancer</span>.<br><small><i>Cut-off used: World Health Organization.</i></small>";

var bmi_message3 = " kg/m2</span> classified as <span style='font-weight:bold; color:red;'>OBESE</span>. This may indicate that you have a <span style='font-weight:bold; color:red;'>HIGHER RISK</span> of acquiring <span style='font-weight:bold; color:red;'"+' type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#cardio_info"'+">heart diseases</span>, <span style='font-weight:bold; color:red;'"+' type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#hypertension_info"'+">hypertension</span>, <span style='font-weight:bold; color:red;'"+' type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#diabetes_info"'+">type 2 diabetes</span> and <span style='font-weight:bold; color:red;'"+' type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#cancer_info"'+">some types of cancer</span>.<br><small><i>Cut-off used: World Health Organization.</i></small>";
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

var wc_1 = "Your waist circumference is within the cut-off value of less than <span style='font-weight:bold;'>94 cm</span> which may indicate <span style='font-weight:bold; color:green;'>LOW RISK</span> of developing <span style='font-weight:bold; color:red;' "+'type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#cardio_info"'+">cardiovascular diseases</span> and <span style='font-weight:bold; color:red;'"+' type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#diabetes_info"'+">type-2 diabetes</span>.";

var wc_2 = "Your waist circumference is above the cut-off value of greater than <span style='font-weight:bold;'>94 cm</span> which may indicate <span style='font-weight:bold; color:red;'>HIGH RISK</span> of developing <span style='font-weight:bold; color:red;' "+'type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#cardio_info"'+">cardiovascular diseases</span> and <span style='font-weight:bold; color:red;'"+' type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#diabetes_info"'+">type-2 diabetes</span>.";
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

var whr1_1 = "</span> which may indicate <span style='font-weight:bold; color:green;'>LOWER RISK</span> of developing obesity-related diseases like <span style='font-weight:bold; color:red;'"+' type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#cardio_info"'+">heart diseases</span>, <span style='font-weight:bold; color:red;'"+' type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#hypertension_info"'+">hypertension</span> and <span style='font-weight:bold; color:red;'"+' type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#diabetes_info"'+">type 2 diabetes</span>.";

var whr1_2 = "</span> which may indicate <span style='font-weight:bold; color:red;'>HIGHER RISK</span> of developing obesity-related diseases like <span style='font-weight:bold; color:red;'"+' type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#cardio_info"'+">heart diseases</span>, <span style='font-weight:bold; color:red;'"+' type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#hypertension_info"'+">hypertension</span> and <span style='font-weight:bold; color:red;'"+' type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#diabetes_info"'+">type 2 diabetes</span>.";
       
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

var whr2_1 = "Your waist-height ratio is less than <span style='font-weight:bold;'>0.5</span> which may indicate <span style='font-weight:bold; color:green;'>LOWER RISK</span> to obesity-related diseases such as <span style='font-weight:bold; color:red;'"+' type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#hypertension_info"'+">hypertension</span>, <span style='font-weight:bold; color:red;'"+' type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#cardio_info"'+">heart disease</span> and <span style='font-weight:bold; color:red;'"+' type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#diabetes_info"'+">type 2 diabetes</span>.";

var whr2_2 = "Your waist-height ratio is greater than <span style='font-weight:bold;'>0.5</span> which may indicate <span style='font-weight:bold; color:red;'>HIGHER RISK</span> to obesity-related diseases such as <span style='font-weight:bold; color:red;'"+' type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#hypertension_info"'+">hypertension</span>, <span style='font-weight:bold; color:red;'"+' type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#cardio_info"'+">heart disease</span> and <span style='font-weight:bold; color:red;'"+' type="button" id="dbw_header1_design" data-backdrop="false" data-toggle="modal" data-target="#diabetes_info"'+">type 2 diabetes</span>.";
    
var dbw_info1 = "Your desirable body weight is <span style='font-weight:bold;'>";
var dbw_info2 = "</span> Keep your weight within this range <span style='font-weight:bold;'>";
var dbw_info3 = "</span>. You can achieve your DBW by eating a healthy and balanced diet and engaging in moderate physical activity like jogging, brisk walking and aerobic dancing.";
    
function waist_cir_func(){
    var waist_cir_unit = $('#waist_cir_unit').val();
    var waist_cir = parseFloat($('#waist_cir').val());
    var waist_cir_in = parseFloat($('#waist_cir_in').val());
    var waist_cir_con = 0;

        if(waist_cir_unit==1){
            document.getElementById("waist_cir").className = "form-control";
            document.getElementById("waist_cir_in").className = "hidden";
        }else if(waist_cir_unit==2){
            document.getElementById("waist_cir").className = "hidden";
            document.getElementById("waist_cir_in").className = "form-control";
        }else{

        }
    
    if(waist_cir_unit==1){
        if(waist_cir_in==0){
            
        }else{
            waist_cir_con = waist_cir_in*2.54;
            if(Number.isNaN(waist_cir_con)){
                if(waist_cir!=0){
                
                }else{
                    $("#waist_cir").val(0);
                }
            }else{
                $("#waist_cir").val(Math.round(waist_cir_con * 10) / 10);
            }
        }
    }
    
    if(waist_cir_unit==2){
        if(waist_cir==0){
            
        }else{
            waist_cir_con = waist_cir/2.54;
            if(Number.isNaN(waist_cir_con)){
                if(waist_cir_in!=0){
                
                }else{
                    $("#waist_cir_in").val(0);
                }
            }else{
                $("#waist_cir_in").val(Math.round(waist_cir_con * 10) / 10);
            }
        }
    }
}
    
function hip_cir_func(){
    var hip_cir_unit = $('#hip_cir_unit').val();
    var hip_cir = parseFloat($('#hip_cir').val());
    var hip_cir_in = parseFloat($('#hip_cir_in').val());
    var hip_cir_con = 0;

        if(hip_cir_unit==1){
            document.getElementById("hip_cir").className = "form-control";
            document.getElementById("hip_cir_in").className = "hidden";
        }else if(hip_cir_unit==2){
            document.getElementById("hip_cir").className = "hidden";
            document.getElementById("hip_cir_in").className = "form-control";
        }else{

        }
    
    if(hip_cir_unit==1){
        if(hip_cir_in==0){
            
        }else{
            hip_cir_con = hip_cir_in*2.54;
            if(Number.isNaN(hip_cir_con)){
                if(hip_cir!=0){
                
                }else{
                    $("#hip_cir").val(0);
                }
            }else{
                $("#hip_cir").val(Math.round(hip_cir_con * 10) / 10);
            }
        }
    }
    
    if(hip_cir_unit==2){
        if(hip_cir==0){
            
        }else{
            hip_cir_con = hip_cir/2.54;
            if(Number.isNaN(hip_cir_con)){
                if(hip_cir_in!=0){
                
                }else{
                    $("#hip_cir_in").val(0);
                }
            }else{
                $("#hip_cir_in").val(Math.round(hip_cir_con * 10) / 10);
            }
        }
    }
}
    
function height_func(){
    
    var height_unit = $('#height_unit').val();
    var height = parseFloat($('#height').val());
    var height_feet = parseFloat($('#feet').val());
    var height_inches = parseFloat($('#inches').val());
    var height_con = 0;
    
        if(height_unit==1){
            document.getElementById("height").className = "form-control";
            document.getElementById("feet").className = "hidden";
            document.getElementById("inches").className = "hidden";
        }else if(height_unit==2){
            document.getElementById("height").className = "hidden";
            document.getElementById("feet").className = "form-control";
            document.getElementById("inches").className = "form-control";
        }else{

        }
    
    if(height_unit==1){
        if((height_feet==0)&&(height_inches==0)){
            
        }else{
            height_con = ((height_feet*12)+height_inches)*2.54;
            if(Number.isNaN(height_con)){
                if(height!=0){
                
                }else{
                    $("#height").val(0);
                }
            }else{
                $("#height").val(Math.round(height_con * 10) / 10);
            }
        }
    }
    
    if(height_unit==2){
        if(height==0){
            
        }else{
            var height_temp = Math.round(height/2.54);
            var height_tran_1 = height_temp%12;
            var height_tran_2 = height_temp-height_tran_1;
            var height_tran_3 = height_tran_2/12;
            
            if(Number.isNaN(height_tran_3)){
                if(height_feet!=0){
                
                }else{
                    $("#feet").val(0);
                }
            }else{
                $("#feet").val(height_tran_3);
            }
            
            if(Number.isNaN(height_tran_1)){
                if(height_inches!=0){
                
                }else{
                    $("#inches").val(0);
                }
            }else{
                $("#inches").val(height_tran_1);
            }
        }
    }
}

function weight_func(){
    
    var weight_unit = $('#weight_unit').val();
    var weight = parseFloat($('#weight').val());
    var weight_lbs = parseFloat($('#weight_lbs').val());
    var weight_con = 0;

        if(weight_unit==1){
            document.getElementById("weight").className = "form-control";
            document.getElementById("weight_lbs").className = "hidden";
        }else if(weight_unit==2){
            document.getElementById("weight").className = "hidden";
            document.getElementById("weight_lbs").className = "form-control";
        }else{

        }
    
    if(weight_unit==1){
        if(weight_lbs==0){
            
        }else{
            weight_con = weight_lbs*0.45359237;
            if(Number.isNaN(weight_con)){
                if(weight!=0){
                    
                }else{
                    $("#weight").val(0);
                }
            }else{
                $("#weight").val(Math.round(weight_con * 10) / 10);
            }
        }
    }
    
    if(weight_unit==2){
        if(weight==0){
            
        }else{
            weight_con = weight/0.45359237;
            if(Number.isNaN(weight_con)){
                if(weight_lbs!=0){
                
                }else{
                    $("#weight_lbs").val(0);
                }
            }else{
                $("#weight_lbs").val(Math.round(weight_con * 10) / 10);
            }
        }
    }
}
    
function formula_change1(){
    var height = parseFloat($('#height').val());
    
    var dbw_1 = height-100;
    var dbw_2 = dbw_1*0.10;
    var dbw_3 = dbw_1-dbw_2;
    var dbw_4 = dbw_3*0.10;
    
    if(height!=0){
        $("#result_val8").html(dbw_info1+dbw_3.toFixed(2)+dbw_info2+(dbw_3-(dbw_4)).toFixed(2)+" - "+(dbw_3+(dbw_4)).toFixed(2)+dbw_info3);        
    }else{
       $("#result_val8").html("loading...");
    }
}
    
function formula_change2(){
    var height = parseFloat($('#height').val());
    var feet = parseFloat($('#feet').val());
    var inches = parseFloat($('#inches').val());
    var gender = $('#gender').val();
    var dbw_con = 0;

    var height_temp = Math.round(height/2.54);
    var height_tran_1 = height_temp%12;
    var height_tran_2 = height_temp-height_tran_1;
    var height_tran_3 = height_tran_2/12;
            
    if((Number.isNaN(feet))||(feet==0)){
        feet = height_tran_3;
    }
    if((Number.isNaN(inches))||(inches==0)){
        inches = height_tran_1;
    }
            
    if(gender==1){
        if(feet>=5){
            if(inches==0){
                dbw_con = 106;
            }else{
                dbw_con = 106+(inches*6);
            }
        }else{
            if(inches==0){
                dbw_con = 106;
            }else{
                dbw_con = 106-(inches*6);
            }
        }
    }else if(gender==2){
        if(feet>=5){
            if(inches==0){
                dbw_con = 106;
            }else{
                dbw_con = 106+(inches*5);
            }
        }else{
            if(inches==0){
                dbw_con = 106;
            }else{
                dbw_con = 106-(inches*5);
            }
        }
    }
    if(height!=0){
        var new_dbw = dbw_con*0.45359237;
        var new_dbw_1 = new_dbw*0.10;
        var new_dbw_2 = new_dbw-new_dbw_1;
        var new_dbw_3 = new_dbw+new_dbw_1;
        $("#result_val8").html(dbw_info1+new_dbw.toFixed(2)+dbw_info2+new_dbw_2.toFixed(2)+" - "+new_dbw_3.toFixed(2)+dbw_info3);        
    }else{
       $("#result_val8").html("loading...");
    }
    
}
    
function formula_change3(){
    var height = parseFloat($('#height').val());
    
    var dbw_1 = (Math.pow((height/100),2))*22;
    var dbw_2 = 18.5*(Math.pow((height/100),2));
    var dbw_3 = 24.9*(Math.pow((height/100),2));
    
    if(height!=0){
        $("#result_val8").html(dbw_info1+dbw_1.toFixed(2)+dbw_info2+dbw_2.toFixed(2)+" - "+dbw_3.toFixed(2)+dbw_info3);        
    }else{
       $("#result_val8").html("loading...");
    }
}
    

function compute_calc() {    
    var age = 0;
    var weight = parseFloat($('#weight').val());
    var weight_lbs = parseFloat($('#weight_lbs').val());
    var height = parseFloat($('#height').val());
    var waist_cir = parseFloat($('#waist_cir').val());
    var hip_cir = parseFloat($('#hip_cir').val());
    var gender = $('#gender').val();
    var bday = $('#bday').val();
    age = calculate_age(bday);
    
    var cm_bmi = parseFloat(height/100.0);
    var num2 = weight/(Math.pow(cm_bmi, 2));
    var bmi = num2.toFixed(1);
    
    var sex = "Undefined";
    
    if(gender==1){
        sex = "Male";
    }else if(gender==2){
        sex = "Female";
    }
    
    if((weight==0)||(height==0)){
        $("#result_val1").html("0");
    }else{
        var bmi_class = "None";
        if(bmi<=18.5){
            bmi_class = "UNDERWEIGHT";
            $("#result_val4").html("Your BMI is <span style='font-weight:bold;'>"+bmi+bmi_message1);
            if(gender==1){
                $("#output_1").html('<img src="<?=base_url();?>/assets/images/fast/calculator_avatar/bmi_male_2.png" alt="User Avatar" width="80%" height="auto">');
            }else if(gender==2){
                $("#output_1").html('<img src="<?=base_url();?>/assets/images/fast/calculator_avatar/bmi_female_2.png" alt="User Avatar" width="80%" height="auto">');
            }
        }else if((bmi>18.5)&&(bmi<=25)){
            bmi_class = "NORMAL";
            $("#result_val4").html("Your BMI is <span style='font-weight:bold;'>"+bmi+bmi_message2);
            if(gender==1){
                $("#output_1").html('<img src="<?=base_url();?>/assets/images/fast/calculator_avatar/bmi_male_3.png" alt="User Avatar" width="80%" height="auto">');
            }else if(gender==2){
                $("#output_1").html('<img src="<?=base_url();?>/assets/images/fast/calculator_avatar/bmi_female_3.png" alt="User Avatar" width="80%" height="auto">');
            }
        }else if((bmi>25)&&(bmi<=30)){
            bmi_class = "OVERWEIGHT";
            $("#result_val4").html("Your BMI is <span style='font-weight:bold;'>"+bmi+bmi_message3);
            if(gender==1){
                $("#output_1").html('<img src="<?=base_url();?>/assets/images/fast/calculator_avatar/bmi_male_4.png" alt="User Avatar" width="80%" height="auto">');
            }else if(gender==2){
                $("#output_1").html('<img src="<?=base_url();?>/assets/images/fast/calculator_avatar/bmi_female_4.png" alt="User Avatar" width="80%" height="auto">');
            }
        }else if(bmi>30){
            bmi_class = "OBESE";
            $("#result_val4").html("Your BMI is <span style='font-weight:bold;'>"+bmi+bmi_message3);
            if(gender==1){
                $("#output_1").html('<img src="<?=base_url();?>/assets/images/fast/calculator_avatar/bmi_male_5.png" alt="User Avatar" width="80%" height="auto">');
            }else if(gender==2){
                $("#output_1").html('<img src="<?=base_url();?>/assets/images/fast/calculator_avatar/bmi_female_5.png" alt="User Avatar" width="80%" height="auto">');
            }
        }else{
            bmi_class = "SEVERE THINNESS";
            $("#result_val4").html("Your BMI is <span style='font-weight:bold;'>"+bmi+bmi_message1);
            if(gender==1){
                $("#output_1").html('<img src="<?=base_url();?>/assets/images/fast/calculator_avatar/bmi_male_1.png" alt="User Avatar" width="80%" height="auto">');
            }else if(gender==2){
                $("#output_1").html('<img src="<?=base_url();?>/assets/images/fast/calculator_avatar/bmi_female_1.png" alt="User Avatar" width="80%" height="auto">');
            }
        }
        $("#result_val1").html(bmi+" ("+bmi_class+")");
    }
    
    var dbw_1 = height-100;
    var dbw_2 = dbw_1*0.10;
    var dbw_3 = dbw_1-dbw_2;
    var dbw_4 = dbw_3*0.10;
    
    if(height!=0){
        $("#result_val8").html(dbw_info1+dbw_3.toFixed(2)+" kg "+dbw_info2+(dbw_3-(dbw_4)).toFixed(2)+" kg - "+(dbw_3+(dbw_4)).toFixed(2)+" kg "+dbw_info3);
        
        document.getElementById("formula_1").className = "";
        document.getElementById("formula_2").className = "";
        document.getElementById("formula_3").className = "";
        document.getElementById("output_message_vesssel_3").className = "top_data";
        document.getElementById("output_option_3").className = "input form-control space_sub";

        $("#output_3").html('<img src="<?=base_url();?>/assets/images/fast/calculator_avatar/scale.png" class="con_box" alt="Scale Avatar" width="100%" height="auto">');
        $("#output_message_3").html(dbw_3.toFixed(2));
        
    }else{
       $("#result_val8").html("loading...");
    }
    
    var energy = 0;
    if((age>=1)&&(age<=2)){
        if(gender==1){
            energy = 100;
        }else if(gender==2){
            energy = 920;
        }
    }else if((age>=3)&&(age<=5)){
        if(gender==1){
            energy = 1350;
        }else if(gender==2){
            energy = 1260;
        }
    }else if((age>=6)&&(age<=9)){
        if(gender==1){
            energy = 1600;
        }else if(gender==2){
            energy = 1470;
        }
    }else if((age>=10)&&(age<=12)){
        if(gender==1){
            energy = 2060;
        }else if(gender==2){
            energy = 1980;
        }
    }else if((age>=13)&&(age<=15)){
        if(gender==1){
            energy = 2700;
        }else if(gender==2){
            energy = 2170;
        }
    }else if((age>=16)&&(age<=18)){
        if(gender==1){
            energy = 3010;
        }else if(gender==2){
            energy = 2280;
        }
    }
    
    if((age>=1)&&(age<=18)){
        $("#result_val9").html("YOU NEED "+energy+" KCAL PER DAY DISTRIBUTED");
    }else if(age>=19){
        document.getElementById("activity_dbw_label").className = "";
        document.getElementById("activity_dbw_unit").className = "input form-control space_sub";
        document.getElementById("weight").className = "form-control";
        var activity_dbw_unit = parseFloat($('#activity_dbw_unit').val());
        
        $("#output_2").html('<img src="<?=base_url();?>assets/images/fast/chart_avatar.png" alt="Bar Level" width="100%" height="auto">');
        
        document.getElementById("output_message_vesssel_5").className = "centered_plate1";
        document.getElementById("output_message_vesssel_6").className = "centered_plate2";
        document.getElementById("output_message_vesssel_7").className = "centered_plate3";
        
        if(activity_dbw_unit==1){
            var energy_val = dbw_3.toFixed(2)*30;
            $("#result_val9").html("YOU NEED "+energy_val+" KCAL PER DAY DISTRIBUTED");
            $("#energy_message").html("Driving, computer work, ironing, cooking; sits and stands most of the day; rarely gets any physical activity during the whole day.");
            $("#activity_pic").html('<img src="<?=base_url();?>/assets/images/fast/sedentary.png" alt="Physical Activity Level" style="padding-left: 5%;" width="160" height="200">');
            
            $("#output_message_5").html(((energy_val*0.65)/4).toFixed(2)+" grams Carbohydrates");
            $("#output_message_6").html(((energy_val*0.15)/4).toFixed(2)+" grams Protein");
            $("#output_message_7").html(((energy_val*0.20)/9).toFixed(2)+" grams Fat");
            
        }else if(activity_dbw_unit==2){
            var energy_val = dbw_3.toFixed(2)*35;
            $("#result_val9").html("YOU NEED "+energy_val+" KCAL PER DAY DISTRIBUTED");
            $("#energy_message").html("Child care, garage work, electrical trades exercises or walks 3-5 times per week at a slow pace of 2.5 - 3 mph for less than 30 minutes per session.");   
            $("#activity_pic").html('<img src="<?=base_url();?>/assets/images/fast/light.png" height="auto" width="350" alt="Physical Activity Level">');
            
            $("#output_message_5").html(((energy_val*0.65)/4).toFixed(2)+" grams Carbohydrates");
            $("#output_message_6").html(((energy_val*0.15)/4).toFixed(2)+" grams Protein");
            $("#output_message_7").html(((energy_val*0.20)/9).toFixed(2)+" grams Fat");
            
        }else if(activity_dbw_unit==3){
            var energy_val = dbw_3.toFixed(2)*40;
            $("#result_val9").html("YOU NEED "+energy_val+" KCAL PER DAY DISTRIBUTED");
            $("#energy_message").html("Heavy housework, yard work, carrying a load, cycling, tennis, dancing; exercises or walks 3.5 - 4 mph for one hour 3-5 times per week.");  
            $("#activity_pic").html('<img src="<?=base_url();?>/assets/images/fast/moderate.png" height="auto" width="350" alt="Physical Activity Level">');
            
            $("#output_message_5").html(((energy_val*0.65)/4).toFixed(2)+" grams Carbohydrates");
            $("#output_message_6").html(((energy_val*0.15)/4).toFixed(2)+" grams Protein");
            $("#output_message_7").html(((energy_val*0.20)/9).toFixed(2)+" grams Fat");
            
        }else if(activity_dbw_unit==4){
            var energy_val = dbw_3.toFixed(2)*45;
            $("#result_val9").html("YOU NEED "+energy_val+" KCAL PER DAY DISTRIBUTED");
            $("#energy_message").html("Heavy manual labor such as construction work, digging, climbing, carrying a load uphill, professional sports; exercises 3-5 times per week for 1 1/2 hours per session.");  
            $("#activity_pic").html('<img src="<?=base_url();?>/assets/images/fast/very_active.png" height="auto" width="350" alt="Physical Activity Level">');
            
            $("#output_message_5").html(((energy_val*0.65)/4).toFixed(2)+" grams Carbohydrates");
            $("#output_message_6").html(((energy_val*0.15)/4).toFixed(2)+" grams Protein");
            $("#output_message_7").html(((energy_val*0.20)/9).toFixed(2)+" grams Fat");
            
        }else{
            var energy_val = dbw_3.toFixed(2)*30;
            $("#result_val9").html("YOU NEED "+energy_val+" KCAL PER DAY DISTRIBUTED");
            $("#energy_message").html("Driving, computer work, ironing, cooking; sits and stands most of the day; rarely gets any physical activity during the whole day.");
            $("#activity_pic").html('<img src="<?=base_url();?>/assets/images/fast/sedentary.png" alt="Physical Activity Level" style="padding-left: 5%;" width="160" height="200">');
            
            $("#output_message_5").html(((energy_val*0.65)/4).toFixed(2)+" grams Carbohydrates");
            $("#output_message_6").html(((energy_val*0.15)/4).toFixed(2)+" grams Protein");
            $("#output_message_7").html(((energy_val*0.20)/9).toFixed(2)+" grams Fat");
            
        }
    }else{
        $("#result_val9").html("loading");
    }
    
    $("#result_val2").html(age);
    $("#result_val3").html(sex);
    
    if(height!=0){
        if(gender==1){
            if(waist_cir<=94){
               $("#result_val5").html(wc_1);
            }else{
               $("#result_val5").html(wc_2);
            }
        }else if(gender==2){
            if(waist_cir<=80){
               $("#result_val5").html(wc_1);
            }else{
               $("#result_val5").html(wc_2);
            }
        }
    }else{
       $("#result_val5").html("loading...");
    }
    
    if((waist_cir==0)||(hip_cir==0)){
        $("#result_val6").html("loading...");
    }else{
        var whr_result1 = waist_cir/hip_cir;
        var whr_final_result1 = whr_result1.toFixed(2);
        if(gender==1){
            $("#output_4").html('<img src="<?=base_url();?>/assets/images/fast/calculator_avatar/waist_male.png" alt="Waist Level" width="100%" height="auto">');
            if(whr_final_result1<=0.90){
                
                document.getElementById("output_message_vesssel_4").className = "centered_waist";
                $("#output_message_4").html(whr_final_result1);
                
                
               $("#result_val6").html("Your waist hip ratio is <span style='font-weight:bold;'>"+whr_final_result1+whr1_1);
            }else{
                
                document.getElementById("output_message_vesssel_4").className = "centered_waist";
                $("#output_message_4").html(whr_final_result1);
                
               $("#result_val6").html("Your waist hip ratio is <span style='font-weight:bold;'>"+whr_final_result1+whr1_2);
            }
        }else if(gender==2){
            $("#output_4").html('<img src="<?=base_url();?>/assets/images/fast/calculator_avatar/waist_female.png" alt="Waist Level" width="100%" height="auto">');
            if(whr_final_result1<=0.85){
                
                document.getElementById("output_message_vesssel_4").className = "centered_waist";
                $("#output_message_4").html(whr_final_result1);
                
                
               $("#result_val6").html("Your waist hip ratio is <span style='font-weight:bold;'>"+whr_final_result1+whr1_1);
            }else{
                
                document.getElementById("output_message_vesssel_4").className = "centered_waist";
                $("#output_message_4").html(whr_final_result1);
                
                
               $("#result_val6").html("Your waist hip ratio is <span style='font-weight:bold;'>"+whr_final_result1+whr1_2);
            }
        }
    }
    
    if((waist_cir==0)||(height==0)){
        $("#result_val7").html("loading...");
    }else{
        var whr_result2 = waist_cir/height;
        var whr_final_result2 = whr_result2.toFixed(1);
        if(gender==1){
            if(whr_final_result2<=0.5){
               $("#result_val7").html(whr2_1);
            }else{
               $("#result_val7").html(whr2_2);
            }
        }else if(gender==2){
            if(whr_final_result2<=0.5){
               $("#result_val7").html(whr2_1);
            }else{
               $("#result_val7").html(whr2_2);
            }
        }
    }

}
    
function calculate_age(DOB) {
    
    var today = new Date();
    var birthDate = new Date(DOB);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age = age - 1;
    }

    return age;
}
    
</script>

    <script type="text/javascript" src="<?=base_url("assets/js/jquery-1.11.1.js"); ?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/js/bootstrap-tabcollapse.js");?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/js/jquery-ui.js"); ?>"></script> 	
    <script type="text/javascript" src="<?=base_url("assets/js/fast_function.js"); ?>"></script>  
    <script type="text/javascript" src="<?=base_url("assets/js/bootstrap.js"); ?>"></script> 
    <script src="<?=base_url();?>assets/bootstrap/js/bootstrap-table.js"></script>
    <script src="<?=base_url(); ?>assets/sweet/sweetalert.min.js"></script>
    <script src="<?=base_url(); ?>assets/sweet/sweetalert-dev.js"></script>
    
    <!-- https://www.freepik.com/free-vector/abs-woman-realistic-set_4359183.htm#page=1&query=abs&position=12 -->
    
    <!--https://www.freepik.com/free-vector/realistic-abs-pack-naked-man-with-athletic-shaped-body-white-background-vector-illustration_4359182.htm#page=1&query=abs&position=4 -->