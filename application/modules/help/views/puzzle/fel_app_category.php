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
    <div style="margin: 30px;">
        
        <div class="panel">
            <button type="button" class="btn btn-info btn-sm" data-toggle="collapse" data-target="#demo"><i class="fa fa-plus"></i> Add New Data</button>
                <div id="demo" class="collapse">
                    <form method="post" class="form-horizontal" role="form" enctype="multipart/form-data" action="<?=base_url('help/fel_app_category_add_process');?>">
                        
                        <label for="title" class="control-label">FEL Name Category: </label>
                        <div class="row">
                            <div class="col-sm-9">
                                <input type="text" name="title_1" required id="title_1" class="form-control" placeholder="Name/Category">
                            </div>
                            <div class="col-sm-3">
                                <center><button class="btn btn-primary btn-md btn-block" type="submit"><i class="fa fa-plus"></i> Add Data</button></center>
                            </div>
                        </div>
                            
                    </form>
                </div>
            <div class="panel-body">
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="" data-sort-order="asc" class="table table-bordered table-responsive table-striped table table-hover table-striped">
                    <thead>
                        <tr>
                            <th data-field="name" data-sortable="true" >Name/Category </th>
                            <th data-field="edit" data-sortable="false" >Option </th>
                        </tr>
                    </thead>
                  <tbody>
                      
                            <?php
                              $this->load->model('mdl_help', '', TRUE);
                                  foreach ($this->load->mdl_help->get_fel_app_sub() as $value) {
                            ?>
                    <tr>
                        <td><?=$value->name_app; ?></td>
                        <td><center>
            <button type="button" class="btn btn-info btn-sm" data-backdrop="false" data-toggle="modal" data-target="#<?="brochure_view_".$value->id; ?>"><i class="fa fa-pencil"></i></button>
            <button type="button" class="btn btn-sm btn-danger" onclick="del('<?=$value->id; ?>')" data-toggle="tooltip" title="Enable to Delete the information." data-placement="bottom"><i class="fa fa-times"></i></button>
                       </center></td>     
            
                </tr>
                   
                      
    <div class="modal fade" id="<?="brochure_view_".$value->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                <?=form_open_multipart(base_url().'help/fel_app_category_edit_process/'.$value->id); ?>
                    
                        <label for="title" class="control-label">Title of Statements: </label>
                        <div class="row">
                            <div class="col-sm-9">
                                <input type="text" value="<?=$value->name_app; ?>" name="title_1" required id="title_1" class="form-control" placeholder="Name/Category">
                            </div>
                            <div class="col-sm-3">
                                <center><button class="btn btn-primary btn-md btn-block" type="submit"><i class="fa fa-pencil"></i> Update</button></center>
                            </div>
                        </div>
                                
                <?=form_close(); ?>
                             
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
                  window.location.href="<?=base_url(); ?>help/fel_app_category_delete_process/"+del_id;
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
<!--<script type="text/javascript" src="<?=base_url("assets/js/jquery-1.11.1.js"); ?>"></script>-->
<script type="text/javascript" src="<?=base_url("assets/js/bootstrap.js"); ?>"></script> 
<script src="<?=base_url();?>assets/bootstrap/js/bootstrap-table.js"></script>
<script src="<?=base_url();?>assets/tinymce/tinymce.min.js"></script>
<script src="<?=base_url();?>assets/tinymce/init-tinymce.js"></script>
<script src="<?=base_url(); ?>assets/sweet/sweetalert.min.js"></script>
<script src="<?=base_url(); ?>assets/sweet/sweetalert-dev.js"></script> 
        
</html>