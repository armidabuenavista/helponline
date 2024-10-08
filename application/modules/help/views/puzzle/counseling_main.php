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
        <h3>Help Online Nutrition Counseling Page Cliet Repository:<small> (Data Manupulation Module)</small></h3>
    </div>
    <hr>
        
    <div style="margin: 30px;">
        
        
        
        
        
        
        <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="Created" data-sort-order="asc" class="table table-bordered table-responsive table-striped table table-hover table-striped">
                    <thead>
                        <tr>
                            <th data-field="name" data-sortable="true" >Name </th>
                            <th data-field="facts" data-sortable="true" >Type of Counseling</th>
                            <th data-field="edit" data-sortable="false" >Contact No.</th>
                            <th data-field="Message" data-sortable="true" >Message </th>
                            <th data-field="Email" data-sortable="true" >Email Address </th>
                            <th data-field="Counseling" data-sortable="true" >Date Counseling </th>
                            <th data-field="Start" data-sortable="true" >Time Start </th>
                            <th data-field="End" data-sortable="true" >Time End </th>
                            <th data-field="Created" data-sortable="true" >Date Created </th>
                        </tr>
                    </thead>
                  <tbody>
                      
                    <?php
                        $this->load->model('mdl_help', '', TRUE);
                        foreach ($this->load->mdl_help->get_counseling() as $value) {
                    ?>
                        <tr>
                            <td><?=$value->lname.", ".$value->fname;?></td>
                            <td><?php
                                if($value->type == 1){
                                    echo "Individual Nutrition Counseling";
                                }elseif($value->type == 2){
                                    echo "Group Nutrition Counseling";
                                }elseif($value->type == 3){
                                    echo "Other Nutrition Counseling - Related Inquiries";
                                }else{
                                    echo "Unkwon Nutrition Counseling";
                                }
                            ?></td>
                            <td><?=$value->phone_no;?></td>
                            <td><?=$value->message;?></td>
                            <td><?=$value->email;?></td>
                            <td><?=date("M. d, Y", strtotime($value->date_counseling));?></td>
                            <td><?=$value->time_in_counseling;?></td>
                            <td><?=$value->time_out_counseling;?></td>
                            <td><?=date("M. d, Y", strtotime($value->date_created));?></td>
                        </tr>
                    <?php } ?>
            </tbody>
        </table>
        
        
        
        
        
        
                   
    </div>
        
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
                  window.location.href="<?php echo base_url(); ?>help/home_delete_process/"+del_id;
                });
          } else {
            swal("Cancelled", "Delete Data was Cancelled!", "error");
          }
        }); 
    }
</script>

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
      
        
    <script>
            $(document).ready(function() {
              $.uploadPreview({
                input_field: "#image-upload",
                preview_box: "#image-preview",
                label_field: "#image-label"
              });
            });  
        
                function readURL1(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#image_upload_preview1').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $("#inputFile1").change(function () {
                    readURL1(this);
                });
    </script>  
        
</html>