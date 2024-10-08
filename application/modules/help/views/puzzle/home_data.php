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
        <h3>Help Online Home Page Repository of Data Repository:<small> (Data Manupulation Module)</small></h3>
    </div>
    <hr>
    <div style="margin: 30px;">
        
        <div class="panel">
            <button type="button" class="btn btn-info btn-sm" data-toggle="collapse" data-target="#demo"><i class="fa fa-plus"></i> Add New Data</button>
                <div id="demo" class="collapse">
                    <form method="post" class="form-horizontal" role="form" enctype="multipart/form-data" action="<?php echo base_url('help/home_add_process');?>">
                        
                        <label for="title" class="control-label">Title of Statements: </label>
                        <div class="row">
                            <div class="col-sm-10">
                                <input type="text" name="title" required id="title" class="form-control" placeholder="Enter the Title">
                            </div>
                            <div class="col-sm-2">
                                <center><button class="btn btn-primary btn-md btn-block" type="submit"><i class="fa fa-plus"></i> Add New Data</button></center>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="title" class="control-label">Facts/ Information/ Content: </label>
                                <textarea id="mytextarea" name="description" class="tinymce" placeholder="Description"></textarea>  
                            </div>
                            <div class="col-sm-6">
                                <div class = "well" style="margin:5px">
                                    <center>
                                        <p>Image view:</p>
                                            <img id="image_upload_preview1" src="<?php echo base_url(); ?>/assets/images/no_photo.png"  alt="Place your Photo Item here" style="width:25em;height:25em" /><br>
                                        <input accept ="image/*" type='file' id="inputFile1" name="inputFile1" required/>
                                    </center>
                                </div>
                            </div>
                        </div>
                        
                        
                    </form>
                </div>
            <div class="panel-body">
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="" data-sort-order="asc" class="table table-bordered table-responsive table-striped table table-hover table-striped">
                    <thead>
                        <tr>
                            <th data-field="name" data-sortable="true" >Title </th>
                            <th data-field="facts" data-sortable="true" >Facts/ Information / Content</th>
                            <th data-field="edit" data-sortable="false" >List of Other Option </th>
                        </tr>
                    </thead>
                  <tbody>
                      
                            <?php
                              $this->load->model('mdl_help', '', TRUE);
                                  foreach ($this->load->mdl_help->get_home_data() as $value) {
                            ?>
                    <tr>
                        <td><?=$value->title; ?></td>
                        <td><?=$value->content; ?></td>
                        <td><center>
            <button type="button" class="btn btn-default btn-sm" data-backdrop="false" data-toggle="modal" data-target="#<?="image_view_".$value->id; ?>"><i class="fa fa-eye"></i></button>
            <button type="button" class="btn btn-info btn-sm" data-backdrop="false" data-toggle="modal" data-target="#<?php echo "brochure_view_".$value->id; ?>"><i class="fa fa-pencil"></i></button>
            <button type="button" class="btn btn-sm btn-danger" onclick="del('<?php echo $value->id; ?>')" data-toggle="tooltip" title="Enable to Delete the information." data-placement="bottom"><i class="fa fa-times"></i></button>
                       </center></td>     
            
                </tr>
                      
    <div class="modal fade" id="<?="image_view_".$value->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">View Data Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                            <img id="image_upload_preview1" src="<?=base_url();?>/assets/images/home_data/<?=$value->image_data;?>"  alt="Place your Photo Item here" width="100%" height="auto"/>
                             
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                
            </div>
        </div>
    </div>
                      
    <div class="modal fade" id="<?php echo "brochure_view_".$value->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                <?php echo form_open_multipart(base_url().'help/history_edit_process/'.$value->id); ?>
                    
                   
                    
                <?php echo form_close(); ?>
                             
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                
            </div>
        </div>
    </div>
                      
                            <?php } ?>
                      
                  </tbody>
                </table>
            </div>
        </div>
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