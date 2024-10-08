<!DOCTYPE html>
<html>
    <html lang="en">
    <title>iFNRI Website</title>
    <head>   
        <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  	<link rel="shortcut icon" href="<?php echo base_url("assets/images/ncs.png"); ?>"/> 
        
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/source/jquery.fancybox.css?v=2.1.5"); ?>" media="screen" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/font-awesome-4.1.0/css/font-awesome.min.css"); ?>"/>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>"/>

        
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap-table.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/sweet/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/sweet/themes/facebook/facebook.css">

    </head>
<body onload="ptricompute()">
        
<style>
    .text_cen{
        text-align: center;
    }
    
          .test + .tooltip > .tooltip-inner {
              background-color: #2d7dac; 
              color: #FFFFFF; 
              border: 1px solid blue; 
          }
          /* Tooltip on top */
          .test + .tooltip.top > .tooltip-arrow {
              border-top: 5px solid green;
          }
          /* Tooltip on bottom */
          .test + .tooltip.bottom > .tooltip-arrow {
              border-bottom: 5px solid green;
          }
          /* Tooltip on left */
          .test + .tooltip.left > .tooltip-arrow {
              border-left: 5px solid green;
          }
          /* Tooltip on right */
          .test + .tooltip.right > .tooltip-arrow {
              border-right: 5px solid green;
          }
</style>
    <?php $this->load->view('puzzle/nav'); ?>

    <div style="margin: 30px;">
        <h3>Help Online PTRI Baseline Data Repository:<small> (Monitoring PTRI Baseline)</small></h3>
    </div>
    <hr>
    <div style="margin: 30px;">
        
        <div class="panel">
                <?php
                    $ptri_var = array(     
                    'weight',
                    'height',
                    'body_fat',
                    'pa',
                    'feet',
                    'inches',
                    'pounds',
                    'bmi',
                    'classification',
                    'dbw',
                    'll_dbw',
                    'ul_dbw',
                    'energy',
                    'date'
                    );

                    $ptri_name = array(     
                    'Weight',
                    'Height',
                    'Body Fat',
                    'PA',
                    'FEET',
                    'INCHES',
                    'POUNDS',
                    'BMI',
                    'Classification',
                    'DBW',
                    'LL DBW',
                    'UL DBW',
                    'Energy',
                    'Date'
                    );

                $this->load->model('mdl_help', '', TRUE);
            ?>
                    
            <div class="panel-body">
            <?php 
                
                echo form_open('help/edit_process_complete/'.$this->uri->segment(3, 0)); 
                
                        $seg=$this->uri->segment(3, 0);
                        foreach ($this->load->mdl_help->get_ptri_edit($seg) as $value) {
                            
                        }
            ?>
                
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="input">LASTNAME:</label>
                                                    <input type="text" name="lastname" required id="lastname" class="form-control" placeholder="Enter Lastname" onkeyup='lname()' value="<?=$value->lname;?>">
                                                    <label for="input">FIRSTNAME:</label>
                                                    <input type="text" name="firstname" required id="firstname" class="form-control" placeholder="Enter Firstname" onkeyup='fname()' value="<?=$value->fname;?>">
                                                    <label for="input">MIDDLENAME:</label>
                                                    <input type="text" name="middlename" required id="middlename" class="form-control" placeholder="Enter Middlename" onkeyup='mname()' value="<?=$value->mname;?>">
                                                    <label for="input">SEX:</label>
                                                    <select name="gender" class="input form-control space_sub" id="gender">
                                                        <?php
                                                            if($vbalue->gender==2){
                                                                echo '<option value="2">Female</option>';
                                                                echo '<option value="1">Male</option>';
                                                            }else{
                                                                echo '<option value="1">Male</option>';
                                                                echo '<option value="2">Female</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                    <label for="input">BIRTHDATE:</label>
                                                    <input type="date" name="birthdate" required id="birthdate" class="form-control" value="<?=$value->birthdate;?>">
                                                    <label for="input">INSTITUTION:</label>
                                                    <input type="text" name="institution" required id="institution" class="form-control" placeholder="Enter Institution" value="<?=$value->institution;?>">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="input">WEIGHT (Kg):</label>
                                                    <?="<input name='weight' class='form-control input' type='text' id='weight' "."oninput='this.value = this.value.replace(/[^0-9.]/g, ".'"'.'"'.").replace(/(\\..*)\\./g, ".'"'."$1".'"'.");'"." min='0' maxlength='6' max='999' required placeholder='Enter WEIGHT (Kg)' onkeyup='ptricompute()' value='".$value->weight."' >";?>
                                                    <label for="input">HEIGHT (cm):</label>
                                                    <?="<input name='height' class='form-control input' type='text' id='height' "."oninput='this.value = this.value.replace(/[^0-9.]/g, ".'"'.'"'.").replace(/(\\..*)\\./g, ".'"'."$1".'"'.");'"." min='0' maxlength='6' max='999' required placeholder='Enter HEIGHT (cm)' onkeyup='ptricompute()' value='".$value->height."'>";?>
                                                    <label for="input">% BODY FAT:</label>
                                                    <?="<input name='body_fat' class='form-control input' type='text' id='body_fat' "."oninput='this.value = this.value.replace(/[^0-9.]/g, ".'"'.'"'.").replace(/(\\..*)\\./g, ".'"'."$1".'"'.");'"." min='0' maxlength='8' max='999' required placeholder='Enter % BODY FAT' onkeyup='ptricompute()' value='".$value->body_fat."'>";?>
                                                    <label for="input">PA:</label>
                                                    <?="<input name='pa' class='form-control input' type='text' id='pa' "."oninput='this.value = this.value.replace(/[^0-9.]/g, ".'"'.'"'.").replace(/(\\..*)\\./g, ".'"'."$1".'"'.");'"." min='0' maxlength='6' max='999' required placeholder='Enter PA' onkeyup='ptricompute()' value='".$value->pa."'>";?>
                                                    
                                                    <label for="input">Date of Assessment: </label>
                                                    <input type="date" value="<?php echo str_replace("/","-",$value->date); ?>" name="assess" required id="assess" class="form-control">
                                                    <label for="input">Email:</label>
                                                    <input type="email" name="email" required id="email" class="form-control" placeholder="Enter Email" value="<?=$value->email;?>">
                                                </div>
                                            </div>

                                            <hr>
                                            <h3>Result:</h3>
                                            <div class="row">
                                                <div class="col-sm-3"><p>FEET: <span style="font-weight:bold;" id="feet"></span></p></div>
                                                <div class="col-sm-3"><p>INCHES: <span style="font-weight:bold;" id="inches"></span></p></div>
                                                <div class="col-sm-3"><p>POUNDS: <span style="font-weight:bold;" id="pounds"></span></p></div>
                                                <div class="col-sm-3"><p>BMI: <span style="font-weight:bold;" id="bmi"></span></p></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3"><p>DBW: <span style="font-weight:bold;" id="dbw"></span></p></div>
                                                <div class="col-sm-3"><p>LL DBW: <span style="font-weight:bold;" id="lldbw"></span></p></div>
                                                <div class="col-sm-3"><p>UL DBW: <span style="font-weight:bold;" id="uldbw"></span></p></div>
                                                <div class="col-sm-3"><p>ENERGY: <span style="font-weight:bold;" id="energy"></span></p></div>
                                            </div>   
                                            
                                            <input class="input hidden" class="form-control" type="text" name="feet_input" id="feet_input">
                                            <input class="input hidden" class="form-control" type="text" name="inches_input" id="inches_input">
                                            <input class="input hidden" class="form-control" type="text" name="pounds_input" id="pounds_input">
                                            <input class="input hidden" class="form-control" type="text" name="bmi_input" id="bmi_input">
                                            <input class="input hidden" class="form-control" type="text" name="dbw_input" id="dbw_input">
                                            <input class="input hidden" class="form-control" type="text" name="lldbw_input" id="lldbw_input">
                                            <input class="input hidden" class="form-control" type="text" name="uldbw_input" id="uldbw_input">
                                            <input class="input hidden" class="form-control" type="text" name="energy_input" id="energy_input">
                                            <input class="input hidden" class="form-control" type="text" name="cla_input" id="cla_input">
                                            <p>Classification: <span style="font-weight:bold;" id="cla"></span></p>
                                            
                                            
<script>
    
function ptricompute() {
    var weight = parseFloat($('#weight').val());
    var height = parseFloat($('#height').val());
    var body_fat = parseFloat($('#body_fat').val());
    var pa = parseFloat($('#pa').val());
    
    var feet_c = ((height/2.54)/12);
    var inches_c = ((((height/2.54)/12)-Math.floor((height/2.54)/12))*12);
    var pounds_c = (weight*2.2);
    var bmi_c = (weight/(Math.pow((height/100),2)));
    var dbw_c = ((height-100)-((height-100)*0.1));
    var lldbw_c = ((dbw_c)-(0.1*dbw_c));
    var uldbw_c = ((dbw_c)+(0.1*dbw_c));
    var energy_c = (dbw_c*pa);
    
    if(bmi_c<=18.5){
        $("#cla").html("UNDERWEIGHT");
        $("#cla_input").val("UNDERWEIGHT");
    }else if((bmi_c<=24.99)&&(bmi_c>=18.6)){
        $("#cla").html("NORMAL");
        $("#cla_input").val("NORMAL");
    }else if((bmi_c<=25)&&(bmi_c<29.99)){
        $("#cla").html("OVERWEIGHT");
        $("#cla_input").val("OVERWEIGHT");
    }else if(bmi_c<30){
        $("#cla").html("OBESE");
        $("#cla_input").val("OBESE");
    }
    
    $("#feet_input").val(Math.floor(feet_c));
    $("#inches_input").val(inches_c.toFixed(0));
    $("#pounds_input").val(pounds_c.toFixed(0));
    $("#bmi_input").val(bmi_c.toFixed(2));
    $("#dbw_input").val(dbw_c.toFixed(0));
    $("#lldbw_input").val(lldbw_c.toFixed(0));
    $("#uldbw_input").val(uldbw_c.toFixed(0));
    $("#energy_input").val(energy_c.toFixed(0));
    
    $("#feet").html(Math.floor(feet_c));
    $("#inches").html(inches_c.toFixed(0));
    $("#pounds").html(pounds_c.toFixed(0));
    $("#bmi").html(bmi_c.toFixed(2));
    $("#dbw").html(dbw_c.toFixed(0));
    $("#lldbw").html(lldbw_c.toFixed(0));
    $("#uldbw").html(uldbw_c.toFixed(0));
    $("#energy").html(energy_c.toFixed(0));
    
}
function lname() {
    var x = document.getElementById("lastname");
    x.value = x.value.toUpperCase();
}
function fname() {
    var x = document.getElementById("firstname");
    x.value = x.value.toUpperCase();
}
function mname() {
    var x = document.getElementById("middlename");
    x.value = x.value.toUpperCase();
}
</script>
                                            
                                    
                <button id="submit" name="submit" type="submit" class="btn btn-success btn-md">Submit</button>
                <a href="<?=base_url();?>help/ptri_admin" type="button" class="btn btn-primary btn-md">Cancel</a>
                
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
 </body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.11.1.js"); ?>"></script>-->
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script> 
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-table.js"></script>
<script src="<?php echo base_url();?>assets/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url();?>assets/tinymce/init-tinymce.js"></script>
<script src="<?php echo base_url(); ?>assets/sweet/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>assets/sweet/sweetalert-dev.js"></script>
        
</html>