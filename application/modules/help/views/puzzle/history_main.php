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
        <h3>Help Online Crossword of Data Repository:<small> (Data Manupulation Module)</small></h3>
    </div>
    <hr>
    <div style="margin: 30px;">
        
        <div class="panel">
            <p>Click the button <button type="button" class="btn btn-info btn-sm" data-toggle="collapse" data-target="#demo">Data</button> to Add New word to the puzzle </p>
                <div id="demo" class="collapse">
                    <form id="add_data_pro" method="post" class="form-horizontal" role="form" action="<?php echo base_url('help/history_add_process');?>">
                        <label for="title" class="control-label">Word/ Name: </label>
                        <div class="row">
                            <div class="col-sm-7">
                                <input type="text" name="title" required id="title" class="form-control" placeholder="Enter the Title">
                            </div>
                            <div class="col-sm-3">
                                    <div class="form-group has-feedback">
                                        <select name="category" class="form-control">
                                            <option value="0">Choose from Category:</option>
                                            <option value="1">Carbohydrates</option>
                                            <option value="2">Protein</option>
                                            <option value="3">Lifestyle and Overall Health</option>
                                            <option value="4">Vegetables</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="col-sm-2">
                                <center><button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-plus"></i> Add New Data</button></center>
                            </div>
                        </div>
                        <label for="title" class="control-label">Facts/ Information: </label>

                        <textarea id="mytextarea" name="description" class="tinymce" placeholder="Description"></textarea>  
                    </form>
                </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-2"><p style='font-size: 100%;'>Data legend:</p></div>
                    <div class="col-sm-2"><i class='fa fa-circle' style='color: #ae3ba7'></i> Carbohydrates</div>
                    <div class="col-sm-3"><i class='fa fa-circle' style='color: #755bd5'></i> Lifestyle and Overall Health</div>
                    <div class="col-sm-1"><i class='fa fa-circle' style='color: #eb6f1d'></i> Protein</div>
                    <div class="col-sm-2"><i class='fa fa-circle' style='color: #6fbf50'></i> Vegetables</div>
                    <div class="col-sm-2"><i class='fa fa-circle' style='color: #c61d25'></i> Unknown Data</div>
                </div>
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="" data-sort-order="asc" class="table table-bordered table-responsive table-striped table table-hover table-striped">
                    <thead>
                        <tr>
                            <th data-field="name" data-sortable="true" >Word/ Name </th>
                            <th data-field="facts" data-sortable="true" >Facts/ Information </th>
                            <th data-field="stat" data-sortable="true" >Category </th>
                            <th data-field="edit" data-sortable="true" >Edit </th>
                            <th data-field="delete" data-sortable="true" >Delete </th>
                        </tr>
                    </thead>
                  <tbody>
                      
                            <?php
                              $this->load->model('mdl_help', '', TRUE);
                                  foreach ($this->load->mdl_help->get_history() as $value) {
                            ?>
                    <tr>
                        <td><?php echo $value->name; ?></td>
                        <td><?php echo $value->facts; ?></td>
                        <td><?php 
                                if($value->grp_stat=="1"){
                                    echo "<i class='fa fa-circle' style='color: #ae3ba7'></i> Carbohydrates";
                                }elseif($value->grp_stat=="2"){
                                    echo "<i class='fa fa-circle' style='color: #eb6f1d'></i> Protein";
                                }elseif($value->grp_stat=="3"){
                                    echo "<i class='fa fa-circle' style='color: #755bd5'></i> Lifestyle and Overall Health";
                                }elseif($value->grp_stat=="4"){
                                    echo "<i class='fa fa-circle' style='color: #6fbf50'></i> Vegetables";
                                }else{
                                    echo "<i class='fa fa-circle' style='color: #c61d25'></i> Unknown";
                                }
                            ?></td>
                        <td>
                            
                    <button type="button" class="btn btn-info btn-sm" data-backdrop="false" data-toggle="modal" data-target="#<?php echo "brochure_view_".$value->id; ?>"><i class="fa fa-pencil"></i></button>
                        </td>
                        <td>     
                    <button type="button" class="btn btn-sm btn-danger" onclick="del('<?php echo $value->id; ?>')" data-toggle="tooltip" title="Enable to Delete the information." data-placement="bottom"><i class="fa fa-times"></i></button>
                            
                        </td>
                </tr>
                      
                      
                      
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
                    
                    <label for="title" class="control-label">Word/ Name: </label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" name="title" required value="<?php echo $value->name; ?>" id="title" class="form-control" placeholder="Enter the Title">
                            </div>
                            <div class="col-sm-4">
                                    <div class="form-group has-feedback">
                                        <select name="category" class="form-control">
                                            
                                            <?php
                                                if($value->grp_stat=="1"){
                                                    ?>
                                            <option value="1">Carbohydrates</option>
                                            <option value="2">Protein</option>
                                            <option value="3">Lifestyle and Overall Health</option>
                                            <option value="4">Vegetables</option>
                                                    <?php
                                                }
                                                elseif($value->grp_stat=="1"){
                                                    ?>
                                            <option value="2">Protein</option>
                                            <option value="1">Carbohydrates</option>
                                            <option value="3">Lifestyle and Overall Health</option>
                                            <option value="4">Vegetables</option>
                                                    <?php
                                                }
                                                elseif($value->grp_stat=="1"){
                                                    ?>
                                            <option value="3">Lifestyle and Overall Health</option>
                                            <option value="1">Carbohydrates</option>
                                            <option value="2">Protein</option>
                                            <option value="4">Vegetables</option>
                                                    <?php
                                                }
                                                elseif($value->grp_stat=="1"){
                                                    ?>
                                            <option value="4">Vegetables</option>
                                            <option value="1">Carbohydrates</option>
                                            <option value="2">Protein</option>
                                            <option value="3">Lifestyle and Overall Health</option>
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                            <option value="0">Choose from Category:</option>
                                            <option value="1">Carbohydrates</option>
                                            <option value="2">Protein</option>
                                            <option value="3">Lifestyle and Overall Health</option>
                                            <option value="4">Vegetables</option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                            </div>
                            <div class="col-sm-2">
                                <center><button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-pencil"></i> Submit</button></center>
                            </div>
                        </div>
                    <br>
                    <label for="title" class="control-label">Facts/ Information: </label>
                    <textarea id="description" name="description" class="tinymce" placeholder="Description"><?php echo $value->facts; ?></textarea>  
                    
                    
                            <div class = "well" style="margin:5px">
                                <center>
                                    <p>Image view:</p>
                                    <img id="image_upload_preview1" src="<?php 
                                      
                                      if($value->photo!=""){
                                          echo base_url()."/assets/images/puzzle_photo/".$value->photo; 
                                      }else{
                                          echo base_url()."/assets/images/puzzle_photo/no_photo.png"; 
                                      }
                                                                         
                                    ?>"  alt="Place your Photo Item here" style="width:30em;height:30em;padding-bottom:3px;" />
                                    <?php echo "<input accept ='image/*' id='inputFile1' type='file' name='inputFile1' size='20' />"; ?>
                                </center>
                            </div>
                    
                    
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
                  window.location.href="<?php echo base_url(); ?>help/history_delete_process/"+del_id;
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