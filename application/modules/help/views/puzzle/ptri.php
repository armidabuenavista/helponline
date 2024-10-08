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
        <h3>Help Online GH4D Baseline Data Repository:<small> (Monitoring GH4D Baseline)</small></h3>
    </div>
    <hr>
    <div style="margin: 30px;">
        
        <div class="panel">
            <h3>Data Legend: <a href='#' class='btn btn-info btn-md'>Active</a> / <a href='#' class='btn btn-primary btn-md'>Inactive</a></h3>
            <div class="row">
                <div class="col-sm-11">
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
                foreach ($this->load->mdl_help->get_ptri_config() as $config){}
                for($i=0;$i<14;$i++){
                    if($config->$ptri_var[$i]==1){
                        echo "<a href='".base_url()."help/inactive_ptri/".$ptri_var[$i]."' name='".$ptri_var[$i]."' class='btn btn-info btn-md'>".$ptri_name[$i]."</a> ";
                    }else{
                        echo "<a href='".base_url()."help/active_ptri/".$ptri_var[$i]."' name='".$ptri_var[$i]."' class='btn btn-primary btn-md'>".$ptri_name[$i]."</a> ";
                    }
                }
                ?>
                </div>
                <div class="col-sm-1">
                    
                    
                    <button data-backdrop="false" type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#add_ptri"><i class="fa fa-plus"></i> Add Data</button>
                        <div class="modal fade" id="add_ptri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">

                                    <?php echo form_open('help/add_process'); ?>
                                        
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add New Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="input">LASTNAME:</label>
                                                    <input type="text" name="lastname" required id="lastname" class="form-control" placeholder="Enter Lastname" onkeyup='lname()'>
                                                    <label for="input">FIRSTNAME:</label>
                                                    <input type="text" name="firstname" required id="firstname" class="form-control" placeholder="Enter Firstname" onkeyup='fname()'>
                                                    <label for="input">MIDDLENAME:</label>
                                                    <input type="text" name="middlename" required id="middlename" class="form-control" placeholder="Enter Middlename" onkeyup='mname()'>
                                                    <label for="input">SEX:</label>
                                                    <select name="gender" class="input form-control space_sub" id="gender">
                                                        <option value="0">Choose from Sex</option>
                                                        <option value="1">Male</option>
                                                        <option value="2">Female</option>
                                                    </select>
                                                    <label for="input">BIRTHDATE:</label>
                                                    <input type="date" name="birthdate" required id="birthdate" class="form-control">
                                                    <label for="input">INSTITUTION:</label>
                                                    <input type="text" name="institution" required id="institution" class="form-control" placeholder="Enter Institution">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="input">WEIGHT (Kg):</label>
                                                    <?="<input name='weight' class='form-control input' type='text' id='weight' "."oninput='this.value = this.value.replace(/[^0-9.]/g, ".'"'.'"'.").replace(/(\\..*)\\./g, ".'"'."$1".'"'.");'"." min='0' maxlength='6' max='999' required placeholder='Enter WEIGHT (Kg)' onkeyup='ptricompute()'>";?>
                                                    <label for="input">HEIGHT (cm):</label>
                                                    <?="<input name='height' class='form-control input' type='text' id='height' "."oninput='this.value = this.value.replace(/[^0-9.]/g, ".'"'.'"'.").replace(/(\\..*)\\./g, ".'"'."$1".'"'.");'"." min='0' maxlength='6' max='999' required placeholder='Enter HEIGHT (cm)' onkeyup='ptricompute()'>";?>
                                                    <label for="input">% BODY FAT:</label>
                                                    <?="<input name='body_fat' class='form-control input' type='text' id='body_fat' "."oninput='this.value = this.value.replace(/[^0-9.]/g, ".'"'.'"'.").replace(/(\\..*)\\./g, ".'"'."$1".'"'.");'"." min='0' maxlength='8' max='999' required placeholder='Enter % BODY FAT' onkeyup='ptricompute()'>";?>
                                                    <label for="input">PA:</label>
                                                    <?="<input name='pa' class='form-control input' type='text' id='pa' "."oninput='this.value = this.value.replace(/[^0-9.]/g, ".'"'.'"'.").replace(/(\\..*)\\./g, ".'"'."$1".'"'.");'"." min='0' maxlength='6' max='999' required placeholder='Enter PA' onkeyup='ptricompute()'>";?>
                                                    
                                                    <label for="input">Date of Assessment:</label>
                                                    <input type="date" name="assess" required id="assess" class="form-control">
                                                    <label for="input">Email:</label>
                                                    <input type="email" name="email" required id="email" class="form-control" placeholder="Enter Email">
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
                                            
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Close</button>
                                            <button id="submit" name="submit" type="submit" class="btn btn-success btn-md" >Submit</button>
                                        </div>
                                    
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>

                    
                </div>
            </div>
            <hr>
            <div class="panel-body">
                
            <?php 
                //717765727479313233 - qwerty123
                
                function GetAge($date) 
                        { 
                            $date=explode("-",$date); 
                            $curMonth = date("m");
                            $curDay = date("j");
                            $curYear = date("Y");
                            $age = $curYear - $date[0]; 
                            if($curMonth<$date[1] || ($curMonth==$date[1] && $curDay<$date[2])) 
                                $age--; 
                                return $age; 
                        }
            ?>
                
        <?php
            $output = '';
            $output .= form_open_multipart('help/upload_data');
            $output .= '<div class="row">';
            $output .= '<div class="col-lg-12 col-sm-12"><div class="form-group">';
            $output .= form_label('Import PTRI Baseline Content', 'image');
            $data = array(
                'name' => 'userfile',
                'id' => 'userfile',
                'class' => 'form-control filestyle',
                'value' => '',
                'data-icon' => 'false'
            );
            $output .= form_upload($data);
            $output .= '</div> <span style="color:red;">*Please choose an Excel file(.xls or .xlxs) as Input</span></div>';
            $output .= '<div class="col-lg-12 col-sm-12"><div class="form-group text-right">';
            $data = array(
                'name' => 'importfile',
                'id' => 'importfile-id',
                'class' => 'btn btn-primary',
                'value' => 'Import',
            );
            $output .= form_submit($data, 'Import Data');
            $output .= '</div></div></div>';
            $output .= form_close();
            echo $output;
                
        ?>
                
                
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="Lastname" data-sort-order="asc" class="table table-bordered table-responsive table-striped table table-hover table-striped">
                    <thead>
                        <tr>
                            <th data-field="Lastname" data-sortable="true" >Lastname</th>
                            <th data-field="Firtsname" data-sortable="true" >Firtsname</th>
                            <th data-field="Middlename" data-sortable="true" >Middlename</th>
                            <th data-field="Email" data-sortable="true" >Email</th>
                            <th data-field="Gender" data-sortable="true" >Gender</th>
                            <th data-field="Age" data-sortable="true" >Age</th>
                            <th data-field="Institution" data-sortable="true" >Institution</th>
                            
                            <th data-field="Weight" data-sortable="true" >Weight(Kg)</th>
                            <th data-field="Height" data-sortable="true" >Height(cm)</th>
                            <th data-field="stat" data-sortable="true" >% Body Fat</th>
                            <th data-field="PA" data-sortable="true" >PA</th>
                            <th data-field="FEET" data-sortable="true" >FEET</th>
                            <th data-field="INCHES" data-sortable="true" >INCHES</th>
                            <th data-field="POUNDS" data-sortable="true" >POUNDS</th>
                            <th data-field="BMI" data-sortable="true" >BMI</th>
                            <th data-field="Classification" data-sortable="true" >Classification</th>
                            <th data-field="DBW" data-sortable="true" >DBW</th>
                            <th data-field="LL" data-sortable="true" >LL DBW</th>
                            <th data-field="UL" data-sortable="true" >UL DBW</th>
                            <th data-field="Energy" data-sortable="true" >Energy(Kcal)</th>
                            <th data-field="date" data-sortable="true" >Date</th>
                            <th data-field="Edit" data-sortable="true" >Edit</th>
                            <th data-field="Delete" data-sortable="true" >Delete</th>
                            
                        </tr>
                    </thead>
                  <tbody>
                            <?php
                                  foreach ($this->load->mdl_help->get_ptri_admin() as $value) {
                            ?>
                    <tr>
                        <td>
                            <?=$value->lname;?>
                        </td>
                        <td>
                            <?=$value->fname;?>
                        </td>
                        <td>
                            <?=$value->mname;?>
                        </td>
                        <td>
                            <?=$value->email;?>
                        </td>
                        <td>
                            <?php
                            if($value->gender=="1"){
                                    echo "<i class='fa fa-circle' style='color: #755bd5'></i> Male";
                                }elseif($value->gender=="2"){
                                    echo "<i class='fa fa-circle' style='color: #c61d25'></i> Female";
                                }else{
                                    echo "<i class='fa fa-circle' style='color: #755bd5'></i> Male";
                                }
                            ?>
                        </td>
                        <td>
                            <?php $val_age = GetAge($value->birthdate); if($val_age==2018){ echo "NULL"; }else{ echo $val_age; }?>
                        </td>
                        <td>
                            <?=$value->institution;?>
                        </td>
                        
                        <td>
                            <?=$value->weight;?>
                        </td>
                        <td>
                            <?=$value->height;?>
                        </td>
                        <td>
                            <?=$value->body_fat;?>
                        </td>
                        <td>
                            <?=$value->pa;?>
                        </td>
                        <td>     
                            <?=$value->feet;?>
                        </td>
                        <td>
                            <?=$value->inches;?>
                        </td>
                        <td>
                            <?=$value->pounds;?>
                        </td>
                        <td>
                            <?=$value->bmi;?>
                        </td>
                        <td>
                            <?=$value->classification;?>
                        </td>
                        <td>     
                            <?=$value->dbw;?>
                        </td>
                        <td>
                            <?=$value->ll_dbw;?>
                        </td>
                        <td>
                            <?=$value->ul_dbw;?>
                        </td>
                        <td>     
                            <?=number_format($value->energy,0);?>
                        </td>
                        <td>     
                            <?=$value->date;?>
                        </td>
                        <td>     
                            <a href="<?=base_url();?>help/edit_process/<?=$value->id;?>" class="btn btn-info btn-sm" type="button"><i class="fa fa-pencil"></i> Edit</a>
                        </td>
                        <td>     
                            <button type="button" class="btn btn-sm btn-danger" onclick="del('<?php echo $value->id; ?>')" data-toggle="tooltip" title="Enable to Delete the information." data-placement="bottom"><i class="fa fa-times"></i> Delete</button>
                        </td>
                </tr>
                            <?php } ?>
                      
                  </tbody>
                </table>
            </div>
        </div>
    </div>
        
    
  
<hr>
<footer class="footer">
<p align="left"><?php $date = date('Y');
$footer= 'Copyright &copy;'.$date.' .  Food and Nutrition Research Institute. Department of Science and Technology | iFNRI Home | Contact us'; echo  $footer; ?></p>
</footer>
        
<script>
    function del(del_val){
        var del_id = del_val;
        swal({
          title: "Delete",
          text: "Are you sure you want to Delete Data?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes",
          cancelButtonText: "No",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
            swal({
                  title: "Delete!",
                  text: "Data has been Deleted!",
                  type: "success",
                  showCancelButton: false,
                  confirmButtonColor: "#8abb6f",
                  confirmButtonText: "Ok",
                  closeOnConfirm: false
                },
                function(){
                  window.location.href="<?php echo base_url(); ?>help/delete_process/"+del_id;
                });
          } else {
            swal("Cancelled", "Delete Data was Cancelled!", "error");
          }
        }); 
    }
</script>
        
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.11.1.js"); ?>"></script>-->
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script> 
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-table.js"></script>
<script src="<?php echo base_url();?>assets/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url();?>assets/tinymce/init-tinymce.js"></script>
<script src="<?php echo base_url(); ?>assets/sweet/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>assets/sweet/sweetalert-dev.js"></script>
        
</html>