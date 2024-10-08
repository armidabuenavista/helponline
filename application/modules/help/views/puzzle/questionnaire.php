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
<body>
    
<style>
/* The container */
.container {
    display: block;
    position: relative;
    padding-left: 25px;
    margin-bottom: 8px;
    cursor: pointer;
    font-size: 15px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default radio button */
.container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 18px;
    width: 18px;
    background-color: #eee;
    border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
    display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 7px;
	left: 7px;
	width: 5px;
	height: 5px;
	border-radius: 50%;
	background: white;
}
</style>
    
<style>
    .row{
        margin: 20px;
    }
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
    .others {
        text-transform: capitalize;
    }
</style>
    <?php $this->load->view('puzzle/nav'); ?>
    
    <?php
    $this->load->model('mdl_help', '', TRUE);
    
    $q1=array();
    $q2=array();
    $q3=array();
    $q4=array();
    
    $q1x1=0;
    $q1x2=0;
    $q2x1=0;
    $q2x2=0;
    $q2x3=0;
    $q3x1=0;
    $q3x2=0;
    $q3x3=0;
    $q4x1=0;
    $q4x2=0;
    
    $attract1=array();
    $attract2=array();
    $attract3=array();
    $attract4=array();
    
    $attract1x1=0;
    $attract2x1=0;
    $attract3x1=0;
    $attract4x1=0;
    $attract1x2=0;
    $attract2x2=0;
    $attract3x2=0;
    $attract4x2=0;
    $attract1x3=0;
    $attract2x3=0;
    $attract3x3=0;
    $attract4x3=0;
    $attract1x4=0;
    $attract2x4=0;
    $attract3x4=0;
    $attract4x4=0;
    $attract1x5=0;
    $attract2x5=0;
    $attract3x5=0;
    $attract4x5=0;
    
    $comp1=array();
    $comp2=array();
    $comp3=array();
    $comp4=array();
    
    $comp1x1=0;
    $comp2x1=0;
    $comp3x1=0;
    $comp4x1=0;
    $comp1x2=0;
    $comp2x2=0;
    $comp3x2=0;
    $comp4x2=0;
    $comp1x3=0;
    $comp2x3=0;
    $comp3x3=0;
    $comp4x3=0;
    $comp1x4=0;
    $comp2x4=0;
    $comp3x4=0;
    $comp4x4=0;
    $comp1x5=0;
    $comp2x5=0;
    $comp3x5=0;
    $comp4x5=0;
    
    $accep1=array();
    $accep2=array();
    $accep3=array();
    $accep4=array();
    
    $accep1x1=0;
    $accep2x1=0;
    $accep3x1=0;
    $accep4x1=0;
    $accep1x2=0;
    $accep2x2=0;
    $accep3x2=0;
    $accep4x2=0;
    $accep1x3=0;
    $accep2x3=0;
    $accep3x3=0;
    $accep4x3=0;
    $accep1x4=0;
    $accep2x4=0;
    $accep3x4=0;
    $accep4x4=0;
    $accep1x5=0;
    $accep2x5=0;
    $accep3x5=0;
    $accep4x5=0;
    
    $ease1=array();
    $ease2=array();
    $ease3=array();
    $ease4=array();
    
    $ease1x1=0;
    $ease2x1=0;
    $ease3x1=0;
    $ease4x1=0;
    $ease1x2=0;
    $ease2x2=0;
    $ease3x2=0;
    $ease4x2=0;
    $ease1x3=0;
    $ease2x3=0;
    $ease3x3=0;
    $ease4x3=0;
    $ease1x4=0;
    $ease2x4=0;
    $ease3x4=0;
    $ease4x4=0;
    $ease1x5=0;
    $ease2x5=0;
    $ease3x5=0;
    $ease4x5=0;
    
    $self1=array();
    $self2=array();
    $self3=array();
    
    $self1x1=0;
    $self2x1=0;
    $self3x1=0;
    $self4x1=0;
    $self1x2=0;
    $self2x2=0;
    $self3x2=0;
    $self4x2=0;
    $self1x3=0;
    $self2x3=0;
    $self3x3=0;
    $self4x3=0;
    $self1x4=0;
    $self2x4=0;
    $self3x4=0;
    $self4x4=0;
    $self1x5=0;
    $self2x5=0;
    $self3x5=0;
    $self4x5=0;
    
    $per1=array();
    $per2=array();
    $per3=array();
    $per4=array();
    $per5=array();
    $per6=array();
    
    $per1x1=0;
    $per2x1=0;
    $per3x1=0;
    $per4x1=0;
    $per5x1=0;
    $per6x1=0;
    $per1x2=0;
    $per2x2=0;
    $per3x2=0;
    $per4x2=0;
    $per5x2=0;
    $per6x2=0;
    $per1x3=0;
    $per2x3=0;
    $per3x3=0;
    $per4x3=0;
    $per5x3=0;
    $per6x3=0;
    $per1x4=0;
    $per2x4=0;
    $per3x4=0;
    $per4x4=0;
    $per5x4=0;
    $per6x4=0;
    $per1x5=0;
    $per2x5=0;
    $per3x5=0;
    $per4x5=0;
    $per5x5=0;
    $per6x5=0;
    
    $over1=array();
    $over2=array();
    $over3=array();
    
    $over1x1=0;
    $over1x2=0;
    $over1x3=0;
    $over1x4=0;
    $over1x5=0;
    
    $over2x1=0;
    $over2x2=0;
    $over2x3=0;
    $over2x4=0;
    $over2x5=0;
    
    $over3x1=0;
    $over3x2=0;
    $over3x3=0;
    $over3x4=0;
    $over3x5=0;

        foreach ($this->load->mdl_help->get_feedback() as $value) {
            if($value->q_1_1==1){
                $q1x1++;
                $q1['0']=$q1x1;
            }elseif($value->q_1_1==2){
                $q1x2++;
                $q1['1']=$q1x2;
            }
            
            if($value->q_1_3==1){
                $q3x1++;
                $q3['0']=$q3x1;
            }elseif($value->q_1_3==2){
                $q3x2++;
                $q3['1']=$q3x2;
            }elseif($value->q_1_3==3){
                $q3x3++;
                $q3['2']=$q3x3;
            }
            
            if($value->q_1_2==1){
                $q2x1++;
                $q2['0']=$q2x1;
            }elseif($value->q_1_2==2){
                $q2x2++;
                $q2['1']=$q2x2;
            }elseif($value->q_1_2==3){
                $q2x3++;
                $q2['2']=$q2x3;
            }
            
            if($value->q_1_4==1){
                $q4x1++;
                $q4['0']=$q4x1;
            }elseif($value->q_1_4==2){
                $q4x2++;
                $q4['1']=$q4x2;
            }
            
            if($value->attrac_1==1){
                $attract1x1++;
                $attract1['0']=$attract1x1;
            }elseif($value->attrac_1==2){
                $attract1x2++;
                $attract1['1']=$attract1x2;
            }elseif($value->attrac_1==3){
                $attract1x3++;
                $attract1['2']=$attract1x3;
            }elseif($value->attrac_1==4){
                $attract1x4++;
                $attract1['3']=$attract1x4;
            }elseif($value->attrac_1==5){
                $attract1x5++;
                $attract1['4']=$attract1x5;
            }
            
            if($value->attrac_2==1){
                $attract2x1++;
                $attract2['0']=$attract2x1;
            }elseif($value->attrac_2==2){
                $attract2x2++;
                $attract2['1']=$attract2x2;
            }elseif($value->attrac_2==3){
                $attract2x3++;
                $attract2['2']=$attract2x3;
            }elseif($value->attrac_2==4){
                $attract2x4++;
                $attract2['3']=$attract2x4;
            }elseif($value->attrac_2==5){
                $attract2x5++;
                $attract2['4']=$attract2x5;
            }
            
            if($value->attrac_3==1){
                $attract3x1++;
                $attract3['0']=$attract3x1;
            }elseif($value->attrac_3==2){
                $attract3x2++;
                $attract3['1']=$attract3x2;
            }elseif($value->attrac_3==3){
                $attract3x3++;
                $attract3['2']=$attract3x3;
            }elseif($value->attrac_3==4){
                $attract3x4++;
                $attract3['3']=$attract3x4;
            }elseif($value->attrac_3==5){
                $attract3x5++;
                $attract3['4']=$attract3x5;
            }
            
            if($value->attrac_4==1){
                $attract4x1++;
                $attract4['0']=$attract4x1;
            }elseif($value->attrac_4==2){
                $attract4x2++;
                $attract4['1']=$attract4x2;
            }elseif($value->attrac_4==3){
                $attract4x3++;
                $attract4['2']=$attract4x3;
            }elseif($value->attrac_4==4){
                $attract4x4++;
                $attract4['3']=$attract4x4;
            }elseif($value->attrac_4==5){
                $attract4x5++;
                $attract4['4']=$attract4x5;
            }
            
            if($value->attrac_5==1){
                $attract5x1++;
                $attract5['0']=$attract5x1;
            }elseif($value->attrac_5==2){
                $attract5x2++;
                $attract5['1']=$attract5x2;
            }elseif($value->attrac_5==3){
                $attract5x3++;
                $attract5['2']=$attract5x3;
            }elseif($value->attrac_5==4){
                $attract5x4++;
                $attract5['3']=$attract5x4;
            }elseif($value->attrac_5==5){
                $attract5x5++;
                $attract5['4']=$attract5x5;
            }
            
            
            
            
            
            if($value->comp_1==1){
                $comp1x1++;
                $comp1['0']=$comp1x1;
            }elseif($value->comp_1==2){
                $comp1x2++;
                $comp1['1']=$comp1x2;
            }elseif($value->comp_1==3){
                $comp1x3++;
                $comp1['2']=$comp1x3;
            }elseif($value->comp_1==4){
                $comp1x4++;
                $comp1['3']=$comp1x4;
            }elseif($value->comp_1==5){
                $comp1x5++;
                $comp1['4']=$comp1x5;
            }
            
            if($value->comp_2==1){
                $comp2x1++;
                $comp2['0']=$comp2x1;
            }elseif($value->comp_2==2){
                $comp2x2++;
                $comp2['1']=$comp2x2;
            }elseif($value->comp_2==3){
                $comp2x3++;
                $comp2['2']=$comp2x3;
            }elseif($value->comp_2==4){
                $comp2x4++;
                $comp2['3']=$comp2x4;
            }elseif($value->comp_2==5){
                $comp2x5++;
                $comp2['4']=$comp2x5;
            }
            
            if($value->comp_3==1){
                $comp3x1++;
                $comp3['0']=$comp3x1;
            }elseif($value->comp_3==2){
                $comp3x2++;
                $comp3['1']=$comp3x2;
            }elseif($value->comp_3==3){
                $comp3x3++;
                $comp3['2']=$comp3x3;
            }elseif($value->comp_3==4){
                $comp3x4++;
                $comp3['3']=$comp3x4;
            }elseif($value->comp_3==5){
                $comp3x5++;
                $comp3['4']=$comp3x5;
            }
            
            if($value->comp_4==1){
                $comp4x1++;
                $comp4['0']=$comp4x1;
            }elseif($value->comp_4==2){
                $comp4x2++;
                $comp4['1']=$comp4x2;
            }elseif($value->comp_4==3){
                $comp4x3++;
                $comp4['2']=$comp4x3;
            }elseif($value->comp_4==4){
                $comp4x4++;
                $comp4['3']=$comp4x4;
            }elseif($value->comp_4==5){
                $comp4x5++;
                $comp4['4']=$comp4x5;
            }
            
            if($value->comp_5==1){
                $comp5x1++;
                $comp5['0']=$comp5x1;
            }elseif($value->comp_5==2){
                $comp5x2++;
                $comp5['1']=$comp5x2;
            }elseif($value->comp_5==3){
                $comp5x3++;
                $comp5['2']=$comp5x3;
            }elseif($value->comp_5==4){
                $comp5x4++;
                $comp5['3']=$comp5x4;
            }elseif($value->comp_5==5){
                $comp5x5++;
                $comp5['4']=$comp5x5;
            }
            
            
            
            
            if($value->accep_1==1){
                $accep1x1++;
                $accep1['0']=$accep1x1;
            }elseif($value->accep_1==2){
                $accep1x2++;
                $accep1['1']=$accep1x2;
            }elseif($value->accep_1==3){
                $accep1x3++;
                $accep1['2']=$accep1x3;
            }elseif($value->accep_1==4){
                $accep1x4++;
                $accep1['3']=$accep1x4;
            }elseif($value->accep_1==5){
                $accep1x5++;
                $accep1['4']=$accep1x5;
            }
            
            if($value->accep_2==1){
                $accep2x1++;
                $accep2['0']=$accep2x1;
            }elseif($value->accep_2==2){
                $accep2x2++;
                $accep2['1']=$accep2x2;
            }elseif($value->accep_2==3){
                $accep2x3++;
                $accep2['2']=$accep2x3;
            }elseif($value->accep_2==4){
                $accep2x4++;
                $accep2['3']=$accep2x4;
            }elseif($value->accep_2==5){
                $accep2x5++;
                $accep2['4']=$accep2x5;
            }
            
            if($value->accep_3==1){
                $accep3x1++;
                $accep3['0']=$accep3x1;
            }elseif($value->accep_3==2){
                $accep3x2++;
                $accep3['1']=$accep3x2;
            }elseif($value->accep_3==3){
                $accep3x3++;
                $accep3['2']=$accep3x3;
            }elseif($value->accep_3==4){
                $accep3x4++;
                $accep3['3']=$accep3x4;
            }elseif($value->accep_3==5){
                $accep3x5++;
                $accep3['4']=$accep3x5;
            }
            
            if($value->accep_4==1){
                $accep4x1++;
                $accep4['0']=$accep4x1;
            }elseif($value->accep_4==2){
                $accep4x2++;
                $accep4['1']=$accep4x2;
            }elseif($value->accep_4==3){
                $accep4x3++;
                $accep4['2']=$accep4x3;
            }elseif($value->accep_4==4){
                $accep4x4++;
                $accep4['3']=$accep4x4;
            }elseif($value->accep_4==5){
                $accep4x5++;
                $accep4['4']=$accep4x5;
            }
            
            if($value->accep_5==1){
                $accep5x1++;
                $accep5['0']=$accep5x1;
            }elseif($value->accep_5==2){
                $accep5x2++;
                $accep5['1']=$accep5x2;
            }elseif($value->accep_5==3){
                $accep5x3++;
                $accep5['2']=$accep5x3;
            }elseif($value->accep_5==4){
                $accep5x4++;
                $accep5['3']=$accep5x4;
            }elseif($value->accep_5==5){
                $accep5x5++;
                $accep5['4']=$accep5x5;
            }
            
            
            
            
            
            
            if($value->ease_1==1){
                $ease1x1++;
                $ease1['0']=$ease1x1;
            }elseif($value->ease_1==2){
                $ease1x2++;
                $ease1['1']=$ease1x2;
            }elseif($value->ease_1==3){
                $ease1x3++;
                $ease1['2']=$ease1x3;
            }elseif($value->ease_1==4){
                $ease1x4++;
                $ease1['3']=$ease1x4;
            }elseif($value->ease_1==5){
                $ease1x5++;
                $ease1['4']=$ease1x5;
            }
            
            if($value->ease_2==1){
                $ease2x1++;
                $ease2['0']=$ease2x1;
            }elseif($value->ease_2==2){
                $ease2x2++;
                $ease2['1']=$ease2x2;
            }elseif($value->ease_2==3){
                $ease2x3++;
                $ease2['2']=$ease2x3;
            }elseif($value->ease_2==4){
                $ease2x4++;
                $ease2['3']=$ease2x4;
            }elseif($value->ease_2==5){
                $ease2x5++;
                $ease2['4']=$ease2x5;
            }
            
            if($value->ease_3==1){
                $ease3x1++;
                $ease3['0']=$ease3x1;
            }elseif($value->ease_3==2){
                $ease3x2++;
                $ease3['1']=$ease3x2;
            }elseif($value->ease_3==3){
                $ease3x3++;
                $ease3['2']=$ease3x3;
            }elseif($value->ease_3==4){
                $ease3x4++;
                $ease3['3']=$ease3x4;
            }elseif($value->ease_3==5){
                $ease3x5++;
                $ease3['4']=$ease3x5;
            }
            
            if($value->ease_4==1){
                $ease4x1++;
                $ease4['0']=$ease4x1;
            }elseif($value->ease_4==2){
                $ease4x2++;
                $ease4['1']=$ease4x2;
            }elseif($value->ease_4==3){
                $ease4x3++;
                $ease4['2']=$ease4x3;
            }elseif($value->ease_4==4){
                $ease4x4++;
                $ease4['3']=$ease4x4;
            }elseif($value->ease_4==5){
                $ease4x5++;
                $ease4['4']=$ease4x5;
            }
            
            if($value->ease_5==1){
                $ease5x1++;
                $ease5['0']=$ease5x1;
            }elseif($value->ease_5==2){
                $ease5x2++;
                $ease5['1']=$ease5x2;
            }elseif($value->ease_5==3){
                $ease5x3++;
                $ease5['2']=$ease5x3;
            }elseif($value->ease_5==4){
                $ease5x4++;
                $ease5['3']=$ease5x4;
            }elseif($value->ease_5==5){
                $ease5x5++;
                $ease5['4']=$ease5x5;
            }
            
            
            
            
            
            
            
            
            if($value->self_1==1){
                $self1x1++;
                $self1['0']=$self1x1;
            }elseif($value->self_1==2){
                $self1x2++;
                $self1['1']=$self1x2;
            }elseif($value->self_1==3){
                $self1x3++;
                $self1['2']=$self1x3;
            }elseif($value->self_1==4){
                $self1x4++;
                $self1['3']=$self1x4;
            }elseif($value->self_1==5){
                $self1x5++;
                $self1['4']=$self1x5;
            }
            
            if($value->self_2==1){
                $self2x1++;
                $self2['0']=$self2x1;
            }elseif($value->self_2==2){
                $self2x2++;
                $self2['1']=$self2x2;
            }elseif($value->self_2==3){
                $self2x3++;
                $self2['2']=$self2x3;
            }elseif($value->self_2==4){
                $self2x4++;
                $self2['3']=$self2x4;
            }elseif($value->self_2==5){
                $self2x5++;
                $self2['4']=$self2x5;
            }
            
            if($value->self_3==1){
                $self3x1++;
                $self3['0']=$self3x1;
            }elseif($value->self_3==2){
                $self3x2++;
                $self3['1']=$self3x2;
            }elseif($value->self_3==3){
                $self3x3++;
                $self3['2']=$self3x3;
            }elseif($value->self_3==4){
                $self3x4++;
                $self3['3']=$self3x4;
            }elseif($value->self_3==5){
                $self3x5++;
                $self3['4']=$self3x5;
            }
            
            if($value->self_4==1){
                $self4x1++;
                $self4['0']=$self4x1;
            }elseif($value->self_4==2){
                $self4x2++;
                $self4['1']=$self4x2;
            }elseif($value->self_4==3){
                $self4x3++;
                $self4['2']=$self4x3;
            }elseif($value->self_4==4){
                $self4x4++;
                $self4['3']=$self4x4;
            }elseif($value->self_4==5){
                $self4x5++;
                $self4['4']=$self4x5;
            }
            

            
            if($value->per_1==1){
                $per1x1++;
                $per1['0']=$per1x1;
            }elseif($value->per_1==2){
                $per1x2++;
                $per1['1']=$per1x2;
            }elseif($value->per_1==3){
                $per1x3++;
                $per1['2']=$per1x3;
            }elseif($value->per_1==4){
                $per1x4++;
                $per1['3']=$per1x4;
            }elseif($value->per_1==5){
                $per1x5++;
                $per1['4']=$per1x5;
            }
            
            if($value->per_2==1){
                $per2x1++;
                $per2['0']=$per2x1;
            }elseif($value->per_2==2){
                $per2x2++;
                $per2['1']=$per2x2;
            }elseif($value->per_2==3){
                $per2x3++;
                $per2['2']=$per2x3;
            }elseif($value->per_2==4){
                $per2x4++;
                $per2['3']=$per2x4;
            }elseif($value->per_2==5){
                $per2x5++;
                $per2['4']=$per2x5;
            }
            
            if($value->per_3==1){
                $per3x1++;
                $per3['0']=$per3x1;
            }elseif($value->per_3==2){
                $per3x2++;
                $per3['1']=$per3x2;
            }elseif($value->per_3==3){
                $per3x3++;
                $per3['2']=$per3x3;
            }elseif($value->per_3==4){
                $per3x4++;
                $per3['3']=$per3x4;
            }elseif($value->per_3==5){
                $per3x5++;
                $per3['4']=$per3x5;
            }
            
            if($value->per_4==1){
                $per4x1++;
                $per4['0']=$per4x1;
            }elseif($value->per_4==2){
                $per4x2++;
                $per4['1']=$per4x2;
            }elseif($value->per_4==3){
                $per4x3++;
                $per4['2']=$per4x3;
            }elseif($value->per_4==4){
                $per4x4++;
                $per4['3']=$per4x4;
            }elseif($value->per_4==5){
                $per4x5++;
                $per4['4']=$per4x5;
            }
            
            if($value->per_5==1){
                $per5x1++;
                $per5['0']=$per5x1;
            }elseif($value->per_5==2){
                $per5x2++;
                $per5['1']=$per5x2;
            }elseif($value->per_5==3){
                $per5x3++;
                $per5['2']=$per5x3;
            }elseif($value->per_5==5){
                $per5x5++;
                $per5['3']=$per5x5;
            }elseif($value->per_5==5){
                $per5x5++;
                $per5['5']=$per5x5;
            }
            
            if($value->per_6==1){
                $per6x1++;
                $per6['0']=$per6x1;
            }elseif($value->per_6==2){
                $per6x2++;
                $per6['1']=$per6x2;
            }elseif($value->per_6==3){
                $per6x3++;
                $per6['2']=$per6x3;
            }elseif($value->per_6==6){
                $per6x6++;
                $per6['3']=$per6x6;
            }elseif($value->per_6==5){
                $per6x5++;
                $per6['6']=$per6x5;
            }
            
            if($value->over_1==1){
                $over1x1++;
                $over1['0']=$over1x1;
            }elseif($value->over_1==2){
                $over1x2++;
                $over1['1']=$over1x2;
            }elseif($value->over_1==3){
                $over1x3++;
                $over1['2']=$over1x3;
            }elseif($value->over_1==4){
                $over1x4++;
                $over1['3']=$over1x4;
            }elseif($value->over_1==5){
                $over1x5++;
                $over1['4']=$over1x5;
            }
            
            if($value->over_2==1){
                $over2x1++;
                $over2['0']=$over2x1;
            }elseif($value->over_2==2){
                $over2x2++;
                $over2['1']=$over2x2;
            }elseif($value->over_2==3){
                $over2x3++;
                $over2['2']=$over2x3;
            }elseif($value->over_2==4){
                $over2x4++;
                $over2['3']=$over2x4;
            }elseif($value->over_2==5){
                $over2x5++;
                $over2['4']=$over2x5;
            }
            
            if($value->over_3==1){
                $over3x1++;
                $over3['0']=$over3x1;
            }elseif($value->over_3==2){
                $over3x2++;
                $over3['1']=$over3x2;
            }elseif($value->over_3==3){
                $over3x3++;
                $over3['2']=$over3x3;
            }elseif($value->over_3==4){
                $over3x4++;
                $over3['3']=$over3x4;
            }elseif($value->over_3==5){
                $over3x5++;
                $over3['4']=$over3x5;
            }
            
        }
    ?>

    <div style="margin: 30px;">
        <h3>Pre-testing Questionnaire:<small> (Healthy Eating and Lifestyle Program (HELP) Online)</small></h3>
    </div>
    <hr>
    <div style="margin: 30px;">

        
<div class="row">  
    <div class="col-sm-12">
        <h4>1.	Have you ever used a health and nutrition website? If Yes, kindly write down the name(s) of the website(s) you have used or currently using.</h4>
            <div class="row">
                <div class="col-sm-6">
                    <label class="container"><b style="color: maroon; font-size: 130%;"><?=$q1x1;?></b> - No</label>
                </div>
                <div class="col-sm-6">
                    <label class="container"><b style="color: maroon; font-size: 130%;"><?=$q1x2;?></b> - Yes</label>
                </div>
            </div>
    </div>
    <div class="col-sm-12">
        <h4>2.	How often do you use health and nutrition website(s)?</h4>
        <div class="row">
            <div class="col-sm-4">
                <label class="container"><b style="color: maroon; font-size: 130%;"><?=$q2x1;?></b> - Everyday</label>
            </div>
            <div class="col-sm-4">
                <label class="container"><b style="color: maroon; font-size: 130%;"><?=$q2x2;?></b> - 1-3 times a week</label>
            </div>
            <div class="col-sm-4">
                <label class="container"><b style="color: maroon; font-size: 130%;"><?=$q2x3;?></b> - 4-6 times a week</label>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <h4>3.	In general, how would you rate yourself as an internet user?</h4>
        <div class="row">
            <div class="col-sm-4">
                <label class="container"><b style="color: maroon; font-size: 130%;"><?=$q3x1;?></b> - Expert</label>
            </div>
            <div class="col-sm-4">
                <label class="container"><b style="color: maroon; font-size: 130%;"><?=$q3x2;?></b> - Good</label>
            </div>
            <div class="col-sm-4">
                <label class="container"><b style="color: maroon; font-size: 130%;"><?=$q3x3;?></b> - Beginner</label>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <h4>4.	Is your work/profession related to any nutrition and health related practice?</h4>
            <div class="row">
                <div class="col-sm-6">
                    <label class="container"><b style="color: maroon; font-size: 130%;"><?=$q4x1;?></b> - Yes</label>
                </div>
                <div class="col-sm-6">
                    <label class="container"><b style="color: maroon; font-size: 130%;"><?=$q4x2;?></b> - No</label>
                </div>
            </div>
    </div>
</div>
        
    <hr>
    <div style="margin: 30px;">
        <h3>Help us get to know you more.<small> (Your answer is important to us. )</small></h3>
    </div>
    <hr>      
        
        <h4>Please do not skip any statements and be honest in the rating. We appreciate your honest opinion to improve the mobile application. Please click the circle on your degree of agreement / disagreement on the different aspect of the website.</h4>

    <div class="row">
        <div class="col-sm-7">
            <h4>Statements</h4>
        </div>
        <div class="col-sm-1">
            <h4>Strongly Agree</h4>
        </div>
        <div class="col-sm-1">
            <h4>Agree</h4>
        </div>
        <div class="col-sm-1">
            <h4>Neither Agree nor Disagree</h4>
        </div>
        <div class="col-sm-1">
            <h4>Disagree</h4>
        </div>
        <div class="col-sm-1">
            <h4>Strongly Disagree</h4>
        </div>
    </div>
    <?php
        $attractiveness = array(     
            '1.	The website is attractive.',
            '2.	The website’s graphics are pleasing.',
            '3.	The website has a good balance of graphics versus text.',
            '4.	The colors used throughout the website are attractive.'
        );
        $comprehensibility = array(     
            '5.	Information is easy to read.',
            '6.	Information is written in a style that suits me.',
            '7.	It is easy to remember where to find things.',
            '8.	Information is layered effectively on different screens.'
        );
        $acceptability = array(     
            '9.	    It is fun to explore the website.',
            '10.	The website is well-suited to first time users.',
            '11.	There are no offensive elements.',
            '12.	The website is locally suited.'
        );
        $ease = array(     
            '13.	It is easy to find my way around the website.',
            '14.	It is clear how screen elements (e.g. pop-ups, scrolls, menu options, etc.) work.',
            '15.	My mistakes were easy to correct.',
            '16.	I can get to information quickly.'
        );
        $self = array(     
            '17.	The website is designed with me in mind.',
            '18.	The website’s content interests me.',
            '19.	The website’s content would keep me coming back.'
        );
        
echo "<h4>Attractiveness</h4><div class='row'>";
        
            echo '<div class="col-sm-7"><label>'.$attractiveness['0'].'</label></div>
            
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$attract1x1.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$attract1x2.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$attract1x3.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$attract1x4.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$attract1x5.'</b></label></div>';
            echo '<div class="col-sm-7"><label>'.$attractiveness['1'].'</label></div>
            
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$attract2x1.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$attract2x2.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$attract2x3.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$attract2x4.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$attract2x5.'</b></label></div>';
            echo '<div class="col-sm-7"><label>'.$attractiveness['2'].'</label></div>
            
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$attract3x1.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$attract3x2.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$attract3x3.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$attract3x4.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$attract3x5.'</b></label></div>';
            echo '<div class="col-sm-7"><label>'.$attractiveness['3'].'</label></div>
            
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$attract4x1.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$attract4x2.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$attract4x3.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$attract4x4.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$attract4x5.'</b></label></div>';
        
        
echo "</div><h4>Comprehensibility</h4><div class='row'>";
            
            echo '<div class="col-sm-7"><label>'.$comprehensibility['0'].'</label></div>
            
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$comp1x1.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$comp1x2.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$comp1x3.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$comp1x4.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$comp1x5.'</b></label></div>';
            echo '<div class="col-sm-7"><label>'.$comprehensibility['1'].'</label></div>
            
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$comp2x1.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$comp2x2.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$comp2x3.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$comp2x4.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$comp2x5.'</b></label></div>';
            echo '<div class="col-sm-7"><label>'.$comprehensibility['2'].'</label></div>
            
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$comp3x1.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$comp3x2.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$comp3x3.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$comp3x4.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$comp3x5.'</b></label></div>';
            echo '<div class="col-sm-7"><label>'.$comprehensibility['3'].'</label></div>
            
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$comp4x1.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$comp4x2.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$comp4x3.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$comp4x4.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$comp4x5.'</b></label></div>';
        
echo "</div><h4>Acceptability</h4><div class='row'>";
        
              echo '<div class="col-sm-7"><label>'.$acceptability['0'].'</label></div>
            
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$accep1x1.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$accep1x2.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$accep1x3.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$accep1x4.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$accep1x5.'</b></label></div>';
            echo '<div class="col-sm-7"><label>'.$acceptability['1'].'</label></div>
            
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$accep2x1.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$accep2x2.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$accep2x3.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$accep2x4.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$accep2x5.'</b></label></div>';
            echo '<div class="col-sm-7"><label>'.$acceptability['2'].'</label></div>
            
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$accep3x1.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$accep3x2.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$accep3x3.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$accep3x4.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$accep3x5.'</b></label></div>';
            echo '<div class="col-sm-7"><label>'.$acceptability['3'].'</label></div>
            
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$accep4x1.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$accep4x2.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$accep4x3.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$accep4x4.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$accep4x5.'</b></label></div>';
        
echo "</div><h4>Ease of Access/Use</h4><div class='row'>";
        
        echo '<div class="col-sm-7"><label>'.$ease['0'].'</label></div>
            
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$ease1x1.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$ease1x2.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$ease1x3.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$ease1x4.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$ease1x5.'</b></label></div>';
            echo '<div class="col-sm-7"><label>'.$ease['1'].'</label></div>
            
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$ease2x1.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$ease2x2.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$ease2x3.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$ease2x4.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$ease2x5.'</b></label></div>';
            echo '<div class="col-sm-7"><label>'.$ease['2'].'</label></div>
            
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$ease3x1.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$ease3x2.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$ease3x3.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$ease3x4.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$ease3x5.'</b></label></div>';
            echo '<div class="col-sm-7"><label>'.$ease['3'].'</label></div>
            
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$ease4x1.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$ease4x2.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$ease4x3.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$ease4x4.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$ease4x5.'</b></label></div>';
        
echo "</div><h4>Self-involvement</h4><div class='row'>";
                
        echo '<div class="col-sm-7"><label>'.$self['0'].'</label></div>
            
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$self1x1.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$self1x2.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$self1x3.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$self1x4.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$self1x5.'</b></label></div>';
        
        echo '<div class="col-sm-7"><label>'.$self['1'].'</label></div>
            
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$self2x1.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$self2x2.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$self2x3.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$self2x4.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$self2x5.'</b></label></div>';
        
        echo '<div class="col-sm-7"><label>'.$self['2'].'</label></div>
            
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$self3x1.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$self3x2.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$self3x3.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$self3x4.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$self3x5.'</b></label></div>';
        
echo "</div>";
        
        
    echo '<hr><div class="row">
        <div class="col-sm-7">
            <h4>Perceived impact</h4>
        </div>
        <div class="col-sm-1">
            <h4>Strongly Agree</h4>
        </div>
        <div class="col-sm-1">
            <h4>Agree</h4>
        </div>
        <div class="col-sm-1">
            <h4>Neither Agree nor Disagree</h4>
        </div>
        <div class="col-sm-1">
            <h4>Disagree</h4>
        </div>
        <div class="col-sm-1">
            <h4>Strongly Disagree</h4>
        </div>
    </div>';
        
        $perceived = array(     
            '1.	Awareness – This website has increased my awareness of the importance of addressing the health behavior',
            '2.	Knowledge – This website has increased my knowledge/understanding of the health behavior',
            '3.	Attitudes – The website has changed my attitudes toward improving this health behavior',
            '4.	Intention to change – The website has increased my intentions/motivation to address this health behavior',
            '5.	Help seeking – This website would encourage me to seek further help to address the health behavior (if I needed it)',
            '6.	Behavior change – Use of this website will  increase/decrease the health behavior'
        );
        
echo "<div class='row'>";
                
            
        echo '<div class="col-sm-7"><label>'.$perceived['0'].'</label></div>
            
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per1x1.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per1x2.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per1x3.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per1x4.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per1x5.'</b></label></div>';
        
        echo '<div class="col-sm-7"><label>'.$perceived['1'].'</label></div>
            
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per2x1.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per2x2.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per2x3.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per2x4.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per2x5.'</b></label></div>';
        
        echo '<div class="col-sm-7"><label>'.$perceived['2'].'</label></div>
            
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per3x1.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per3x2.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per3x3.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per3x4.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per3x5.'</b></label></div>';
        
        echo '<div class="col-sm-7"><label>'.$perceived['3'].'</label></div>
            
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per4x1.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per4x2.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per4x3.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per4x4.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per4x5.'</b></label></div>';
        
        echo '<div class="col-sm-7"><label>'.$perceived['4'].'</label></div>
            
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per5x1.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per5x2.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per5x3.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per5x4.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per5x5.'</b></label></div>';
        
        echo '<div class="col-sm-7"><label>'.$perceived['5'].'</label></div>
            
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per6x1.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per6x2.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per6x3.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per6x4.'</b></label></div>
              
              <div class="col-sm-1"><label class="container"><b style="color: maroon; font-size: 130%;">'.$per6x5.'</b></label></div>';
        
        
echo "</div>";
        ?>
        
    <hr>
    <div style="margin: 30px;">
        <h3>OVERALL RATING:<small> (Your answer is important to us. )</small></h3>
    </div>
    <hr>   

<h4>1.	Would you recommend this website to people who might benefit from it?</h4>
        
        
<label class="container"><b style="color: maroon; font-size: 130%;"><?=$over1x1;?></b>
Not at all, I would not recommend this website to anyone</label>
<label class="container"><b style="color: maroon; font-size: 130%;"><?=$over1x2;?></b>
There are very few people I would recommend this website to</label>
<label class="container"><b style="color: maroon; font-size: 130%;"><?=$over1x3;?></b>
Maybe There are several people I would recommend this website to</label>
<label class="container"><b style="color: maroon; font-size: 130%;"><?=$over1x4;?></b>
There are many people I would recommend this website to</label>
<label class="container"><b style="color: maroon; font-size: 130%;"><?=$over1x5;?></b>
Definitely I would recommend this website to everyone</label>
        

    <h4>2.	How satisfied are you with your experience in exploring/navigating the website?</h4>

<label class="container"><b style="color: maroon; font-size: 130%;"><?=$over2x1;?></b>
    Very satisfied</label>
<label class="container"><b style="color: maroon; font-size: 130%;"><?=$over2x2;?></b>
    Satisfied</label>
<label class="container"><b style="color: maroon; font-size: 130%;"><?=$over2x3;?></b>
    Neutral</label>
<label class="container"><b style="color: maroon; font-size: 130%;"><?=$over2x4;?></b>
    Dissatisfied</label>
<label class="container"><b style="color: maroon; font-size: 130%;"><?=$over2x5;?></b>
    Very dissatisfied</label>

<h4>3.	What is your overall (star) rating of the website?</h4>
        <div class="row">
            <div class="col-sm-2">
                <label class="container">One of the worst apps I’ve used</label>
            </div>
            <div class="col-sm-2">
                <label class="container"></label>
            </div>
            <div class="col-sm-2">
                <label class="container">Average</label>
            </div>
            <div class="col-sm-2">
                <label class="container"></label>
            </div>
            <div class="col-sm-2">
                <label class="container">One of the best apps I've used</label>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-2">
                <label class="container"><b style="color: maroon; font-size: 130%;"><?=$over3x1;?></b>
                    <i class="fa fa-star"></i></label>
            </div>
            <div class="col-sm-2">
                <label class="container"><b style="color: maroon; font-size: 130%;"><?=$over3x2;?></b>
                    <i class="fa fa-star"></i><i class="fa fa-star"></i></label>
            </div>
            <div class="col-sm-2">
                <label class="container"><b style="color: maroon; font-size: 130%;"><?=$over3x3;?></b>
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></label>
            </div>
            <div class="col-sm-2">
                <label class="container"><b style="color: maroon; font-size: 130%;"><?=$over3x4;?></b>
                    <i class="fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></i></label>
            </div>
            <div class="col-sm-2">
                <label class="container"><b style="color: maroon; font-size: 130%;"><?=$over3x5;?></b>
                    <i class="fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> </i></label>
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