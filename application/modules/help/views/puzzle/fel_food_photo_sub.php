<!DOCTYPE html>
<html>
    <html lang="en">
    <title>iFNRI Website</title>
    <head>   
        <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  	<link rel="shortcut icon" href="<?=base_url("assets/images/ncs.png"); ?>"/> 
        
	<link rel="stylesheet" type="text/css" href="<?=base_url("assets/source/jquery.fancybox.css?v=2.1.5"); ?>" media="screen" />

	<link rel="stylesheet" type="text/css" href="<?=base_url("assets/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7"); ?>" />
	<link rel="stylesheet" href="<?=base_url("assets/font-awesome-4.1.0/css/font-awesome.min.css"); ?>"/>
	<link rel="stylesheet" href="<?=base_url("assets/css/bootstrap.min.css"); ?>"/>

        
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/css/bootstrap-table.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/sweet/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/sweet/themes/facebook/facebook.css">

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
        <h3>Food Exchange List:<small> (Data Manupulation Module)</small></h3>
    </div>
    <hr>
    <div style="padding-left: 10%;padding-right: 10%;">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                            <?php
                                $picture = "";
                                $this->load->model('mdl_help', '', TRUE);
                                foreach ($this->load->mdl_help->get_fel_content_sub() as $value) { if($value->image_lib==""){ $picture="no_photo.png"; }else{ $picture=$value->image_lib; } ?>
                        <div class="col-sm-3"> 
                            <center><p><b><?=$value->name_e;?></b></p></center>
                            <a type="button" href="<?=base_url();?>help/fel_food_photo_sub_upload/<?=$value->id;?>"> <img width="100%" height="300" src="<?=base_url();?>assets/images/fel_photo/<?=$picture;?>"></a>
                        </div>
                           <?php } ?>
                    </div>
                </div>
            </div>
    </div>
        
<footer class="footer">
<p align="left"><?php $date = date('Y');
$footer= 'Copyright &copy;'.$date.' .  Food and Nutrition Research Institute. Department of Science and Technology | iFNRI Home | Contact us'; echo  $footer; ?></p>
</footer>
        
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
<!--<script type="text/javascript" src="<?=base_url("assets/js/jquery-1.11.1.js"); ?>"></script>-->
<script type="text/javascript" src="<?=base_url("assets/js/bootstrap.js"); ?>"></script> 
<script src="<?=base_url();?>assets/bootstrap/js/bootstrap-table.js"></script>
<script src="<?=base_url();?>assets/tinymce/tinymce.min.js"></script>
<script src="<?=base_url();?>assets/tinymce/init-tinymce.js"></script>
<script src="<?=base_url(); ?>assets/sweet/sweetalert.min.js"></script>
<script src="<?=base_url(); ?>assets/sweet/sweetalert-dev.js"></script> 
        
</html>