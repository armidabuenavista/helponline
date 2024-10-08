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
    <?php $this->load->view('ptri/nav'); ?>
    <div style="margin: 30px;">
        
        <div class="panel">
            
            <div class="panel-body">
                
                
                <?php 
                
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
                
                $id = $this->session->all_userdata();
                $seg1=strtoupper($id['lname']);
                $seg2=strtoupper($id['fname']);
                $seg3=$id['email_address'];
                
                //echo $seg1." ".$seg2." ".$seg3;
                
                $this->load->model('mdl_help', '', TRUE);
                foreach ($this->load->mdl_help->get_ptri_config() as $config){}
                foreach ($this->load->mdl_help->get_ptri($seg1,$seg2,$seg3) as $valuex) {}
                
                ?>
                    <div class='row'>
                        <div class='col-sm-2'>
                            <img width="100%" height="auto" src="<?=base_url("assets/images/logo_ptri.png");?>">
                        </div>
                        <div class='col-sm-1'>
                            <img style="border: 2px solid #755bd5; border-radius: 70%;" src="<?php 
                            if($valuex->gender==1){
                                echo base_url("assets/images/client_photos/avatar1.png"); 
                            }else{
                                echo base_url("assets/images/client_photos/avatar2.png"); 
                            }
                            ?>" width="120%" height="auto"/>
                        </div>
                        <div class='col-sm-3' class="pull-left" style="padding:01%">
                            <p>Name: <b><?=$valuex->lname.", ".$valuex->fname." ".$valuex->mname;?></b></p>
                            <p>Gender: <b>
                                <?php    
                                    if($valuex->gender==1){
                                        echo "<i class='fa fa-circle' style='color: #755bd5'></i> Male";
                                    }elseif($valuex->gender==2){
                                        echo "<i class='fa fa-circle' style='color: #c61d25'></i> Female";
                                    }else{
                                        echo "<i class='fa fa-circle' style='color: #755bd5'></i> Male";
                                    }
                                ?>
                                </b></p>
                            <p>Age: <b><?php $val_age = GetAge($value->birthdate); if(($val_age>80)||($val_age<1)){ echo "NULL"; }else{ echo $val_age; }?></b></p>
                            <p>Institute: <b><?=$valuex->institution;?></b></p>
                        </div>
                        <div class='col-sm-6' class="pull-left" style="padding:01%">
                            
<?php 
                            $sample_count=0;
                            foreach ($this->load->mdl_help->get_ptri_count($seg1,$seg2,$seg3) as $value_c) { $sample_count++; }
                            if($sample_count==0){}else{
                                
    $a=0;
    $b=0;
    $a1=0;
    $b1=0;
    $c=0;
    $dbw=0;
    $this->load->model('mdl_help', '', TRUE);
    foreach ($this->load->mdl_help->get_ptri_assess($seg1,$seg2,$seg3) as $value_m) { if($c==0){$dbw=$value_m->dbw; $a=$value_m->weight; $a1=$value_m->height;}elseif($c==1){$b=$value_m->weight; $b1=$value_m->height;} $c++;}

    $f=($a/(pow(($a1/100),2)));
    
    //echo $f;
    if($f<=18.5){
        echo "<h4>You are UNDERWEIGHT! ";
    }else if(($f<=24.99)&&($f>=18.6)){
        echo "You are NORMAL! ";
    }else if(($f<=25)&&($f>=29.99)){
        echo "<h4>You are OVERWEIGHT! ";
    }else if($f<=30){
        echo "<h4>You are OBESE! ";
    }
        $val_tot=0;
        $val_final=substr(($b-$a),0,4);
                                //echo "<h3>".$b."-".$a."-".$val_final."</h3>";
        if(substr($val_final,0,1)=="-"){
            $val_tot = substr($val_final,1,4);
        }else{
            $val_tot = $val_final;
        }
                                
        
        if((($b)-($a))>0){
            echo "Congratulation! You have Lost <span style='color: green; font-size: 130%;'><b>".$val_tot." Kg</b></span> Weight. Keep it up!</h4>";
        }elseif((($b)-($a))==0){
            echo "Nothing Changes</h4>";
        }elseif((($b)-($a))<0){
            echo "You gained <span style='color: red; font-size: 130%;'><b>".$val_tot." Kg</b></span> weight. Well, it seems like you need more effort to lose weight. We can help you to get an appointment with one of our Registered Nutritionists or Dietitians</h4>";
        }
                            
    }
            
?>
                            <h4>Data Legend:&nbsp;&nbsp;&nbsp;<small style="color:black">(DBW) - Desirable Body Weight&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(BMI) - Body Mass Index </small></h4>
                            
                        </div>
                    </div>

                
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="date" data-sort-order="asc" class="table table-bordered table-responsive table-striped table table-hover table-striped">
                    <thead>
                        <tr>
                            <?php
                                if($config->weight==1){
                            ?>
                                <th data-field="Weight" data-sortable="true" >Weight(Kg)</th>
                            <?php
                                }
                                if($config->height==1){
                            ?>
                                <th data-field="Height" data-sortable="true" >Height(cm)</th>
                            <?php
                                }
                                if($config->body_fat==1){
                            ?>
                                <th data-field="stat" data-sortable="true" >% Body Fat</th>
                            <?php
                                }
                                if($config->pa==1){
                            ?>
                                <th data-field="PA" data-sortable="true" >PA</th>
                            <?php
                                }
                                if($config->feet==1){
                            ?>
                                <th data-field="FEET" data-sortable="true" >FEET</th>
                            <?php
                                }
                                if($config->inches==1){
                            ?>
                                <th data-field="INCHES" data-sortable="true" >INCHES</th>
                            <?php
                                }
                                if($config->pounds==1){
                            ?>
                                <th data-field="POUNDS" data-sortable="true" >POUNDS</th>
                            <?php
                                }
                                if($config->bmi==1){
                            ?>
                                <th data-field="BMI" data-sortable="true" >BMI</th>
                            <?php
                                }
                                if($config->classification==1){
                            ?>
                                <th data-field="Classification" data-sortable="true" >Classification</th>
                            <?php
                                }
                                if($config->dbw==1){
                            ?>
                                <th data-field="DBW" data-sortable="true" >DBW(Kg)</th>
                            <?php
                                }
                                if($config->ll_dbw==1){
                            ?>
                                <th data-field="LL" data-sortable="true" >LL DBW(Kg)</th>
                            <?php
                                }
                                if($config->ul_dbw==1){
                            ?>
                                <th data-field="UL" data-sortable="true" >UL DBW(Kg)</th>
                            <?php
                                }
                                if($config->energy==1){
                            ?>
                                <th data-field="Energy" data-sortable="true" >Energy(Kcal)</th>
                            <?php
                                }
                                if($config->date==1){
                            ?>
                                <th data-field="date" data-sortable="true" >Date</th>
                            <?php
                                }
                            ?>
                        </tr>
                    </thead>
                  <tbody>
                            <?php
                                  foreach ($this->load->mdl_help->get_ptri($seg1,$seg2,$seg3) as $value) {
                            ?>
                    <tr>
                            <?php
                                if($config->weight==1){
                            ?>
                        <td>
                            <?=$value->weight;?>
                        </td>
                            <?php
                                }
                                if($config->height==1){
                            ?>
                        <td>
                            <?=$value->height;?>
                        </td>
                            <?php
                                }
                                if($config->body_fat==1){
                            ?>
                        <td>
                            <?=$value->body_fat;?>
                        </td>
                            <?php
                                }
                                if($config->pa==1){
                            ?>
                        <td>
                            <?=$value->pa;?>
                        </td>
                            <?php
                                }
                                if($config->feet==1){
                            ?>
                        <td>
                            <?=$value->feet;?>
                        </td>
                            <?php
                                }
                                if($config->inches==1){
                            ?>
                        <td>
                            <?=$value->inches;?>
                        </td>
                            <?php
                                }
                                if($config->pounds==1){
                            ?>
                        <td>
                            <?=$value->pounds;?>
                        </td>
                            <?php
                                }
                                if($config->bmi==1){
                            ?>
                        <td>
                            <?=$value->bmi;?>
                        </td>
                            <?php
                                }
                                if($config->classification==1){
                            ?>
                        <td>
                            <b><?=$value->classification;?></b>
                        </td>
                            <?php
                                }
                                if($config->dbw==1){
                            ?>
                        <td>
                            <?=$value->dbw;?>
                        </td>
                            <?php
                                }
                                if($config->ll_dbw==1){
                            ?>
                        <td>
                            <?=$value->ll_dbw;?>
                        </td>
                            <?php
                                }
                                if($config->ul_dbw==1){
                            ?>
                        <td>
                            <?=$value->ul_dbw;?>
                        </td>
                            <?php
                                }
                                if($config->energy==1){
                            ?>
                        <td>
                            <?=number_format($value->energy,2);?>
                        </td>
                            <?php
                                }
                                if($config->date==1){
                            ?>
                        <td>
                            <?=date("M jS, Y", strtotime($value->date));?>
                        </td>
                            <?php
                                }
                            ?>
                </tr>
                            <?php } ?>
                      
                  </tbody>
                </table>
            </div>

            <?php if($value_c->id_count==1){}else{ ?>
                <div class="box box-success">
                    <div class="box-body table-responsive">
                        <?php $this->load->view('ptri/graph'); ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
        
    

<!----------------------------------------------------------------------------------------------------------------------->

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
<!----------------------------------------------------------------------------------------------------------------------->
        
<hr>
<footer class="footer">
<p align="left"><?php $date = date('Y');
$footer= 'Copyright &copy;'.$date.' .  Food and Nutrition Research Institute. Department of Science and Technology | iFNRI Home | Contact us'; echo  $footer; ?></p>
</footer>
        
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.11.1.js"); ?>"></script>-->
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script> 
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-table.js"></script>
<script src="<?php echo base_url();?>assets/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url();?>assets/tinymce/init-tinymce.js"></script>
<script src="<?php echo base_url(); ?>assets/sweet/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>assets/sweet/sweetalert-dev.js"></script>
      
        
</html>