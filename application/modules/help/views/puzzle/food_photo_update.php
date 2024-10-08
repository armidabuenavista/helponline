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
    <hr>
    <div class="container">
        
        
        <div class="panel">

                        <?php
                            $this->load->model('mdl_help', '', TRUE);
                            $img_data = base_url()."assets/images/fel_photo/no_photo.png";
                            foreach ($this->load->mdl_help->get_fel_content_id($this->uri->segment(3, 0)) as $div_val) {
                                if($div_val->image_lib!=""){
                                    $img_data = base_url()."assets/images/fel_photo/".$div_val->image_lib;
                                }
                            }
                        ?>

        
    <div class = "col-sm-12 well">
        <div class="col-sm-12">
            <center>
                <div id="uploaded_images_banner"></div>
            </center>
        </div>
        <div class="col-sm-12">
            <center>
                <div class = "upload-image-messages"></div>
            </center>
        </div>
        <div class="col-sm-12">
            <h4>Image File Upload for <b><?=$div_val->name_e;?></b>:</h4>
            <input type="file" name="files_banner" id="files_banner" multiple />
        </div>
        <div class="col-sm-12">
            <center>
                <h4>Current Image</h4>
            <img width="70%" height="auto" class="thumbnail" src="<?=$img_data;?>"></center>
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


<script type="text/javascript">
    $(document).ready(function(){
       $('#files_banner').change(function(){
           var files = $('#files_banner')[0].files;
           var error = '';
           var form_data = new FormData();
           for(var count = 0; count<files.length; count++){
               var name = files[count].name;
               var extension = name.split('.').pop().toLowerCase();
               if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1){
                   error += "Invalid " + count + " Image File!"
               } else{
                   form_data.append("files_banner[]", files[count]);
               }
           }
           if(error == 0){
               $.ajax({
                   url:"<?php echo base_url(); ?>help/fel_do_upload_banner/<?=$this->uri->segment(3, 0); ?>",
                   method:"POST",
                   data:form_data,
                   contentType:false,
                   cache:false,
                   processData:false,
                   beforeSend:function(){ 
                       $('#uploaded_images_banner').html("<label class='text-success'>Uploading...</label>"); 
                   },
                   success:function(data){ 
                       $('#uploaded_images_banner').html(data); 
                       $('#').val('');
                   }
               })
           } else{
               alert(error);
           }
       });
    });
</script>
