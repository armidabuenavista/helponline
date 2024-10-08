<!DOCTYPE html>
<html>
    <html lang="en">
    <title>iFNRI Website</title>
    <head>   
        <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	  <meta http-equiv="Content-Security-Policy" content="style-src 'self' 'unsafe-inline' https://fonts.googleapis.com;">
          <meta http-equiv="Content-Security-Policy" content="script-src 'self' 'unsafe-inline' https://cdnjs.cloudflare.com;">

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
            <button type="button" class="btn btn-info btn-sm" data-toggle="collapse" data-target="#demo"><i class="fa fa-plus"></i> Add Data Library</button>
            <a type="button" class="btn btn-primary btn-sm" href="<?=base_url('help/fel_food_photo');?>"><i class="fa fa-plus"></i> Add Image Library</a>
                <div id="demo" class="collapse">
                    <form method="post" class="form-horizontal" role="form" enctype="multipart/form-data" action="<?=base_url('help/fel_content_add_process');?>">
                        <div style="padding-left: 5%; padding-right: 5%;">
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="title" class="control-label">FEL List: </label>
                                <select name="list_cat" class="input form-control space_sub" id="list_cat">
                                    <option value="0">Choose from FEL List</option>
                                        <?php $this->load->model('mdl_help', '', TRUE);
                                              foreach ($this->load->mdl_help->get_fel_cat() as $value) { ?>
                                            <option value="<?=$value->id;?>"><?=$value->numerical_val;?> - <?=$value->name;?></option>
                                        <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <label for="title" class="control-label">FEL Type: </label>
                                <select name="type_cat" class="input form-control space_sub" id="type_cat">
                                    <option value="0">Choose from Type</option>
                                    <option value="1">Fresh</option>
                                    <option value="2">Processed</option>
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <center><button class="btn btn-primary btn-md btn-block" type="submit"><i class="fa fa-plus"></i> Add List</button></center>
                            </div>
                        </div>
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="title" class="control-label">FEL English Name: </label>
                                    <input type="text" name="name_e" required id="name_e" class="form-control" placeholder="English Name">
                                </div>
                                <div class="col-sm-6">
                                    <label for="title" class="control-label">FEL Filipino Name: </label>
                                    <input type="text" name="name_p" required id="name_p" class="form-control" placeholder="Filipino Name">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-8">
                                    <label for="title" class="control-label">Household Measure (Dimension): </label>
                                    <input type="text" name="household_measure" required id="household_measure" class="form-control" placeholder="Household Measure (Dimension)">
                                </div>
                                <div class="col-sm-4">
                                    <label for="title" class="control-label">Weight (g Edible Portion): </label>
                                    <input type="text" name="weight" required id="weight" class="form-control" placeholder="Weight (g Edible Portion)">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="title" class="control-label">Calorie: </label>
                                    <input type="text" name="calorie" required id="calorie" class="form-control" placeholder="Calorie">
                                </div>
                                <div class="col-sm-3">
                                    <label for="title" class="control-label">Carbohydrate: </label>
                                    <input type="text" name="carb" required id="carb" class="form-control" placeholder="Carbohydrate">
                                </div>
                                <div class="col-sm-3">
                                    <label for="title" class="control-label">Protein: </label>
                                    <input type="text" name="protein" required id="protein" class="form-control" placeholder="Protein">
                                </div>
                                <div class="col-sm-3">
                                    <label for="title" class="control-label">Fat: </label>
                                    <input type="text" name="fat" required id="fat" class="form-control" placeholder="Fat">
                                </div>
                            </div>
                            
                            
                        </div>   
                    </form>
                </div>
            <div class="panel-body">
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="" data-sort-order="asc" class="table table-bordered table-responsive table-striped table table-hover table-striped">
                    <thead>
                        <tr>
                            <th data-field="List" data-sortable="true" >List</th>
                            <th data-field="Type" data-sortable="true" >Type</th>
                            <th data-field="English" data-sortable="true" >English Name</th>
                            <th data-field="Filipino" data-sortable="true" >Filipino Name</th>
                            <th data-field="Household" data-sortable="true" >Household Measure</th>
                            <th data-field="Weight" data-sortable="true" >Weight</th>
                            <th data-field="Calorie" data-sortable="true" >Calorie</th>
                            <th data-field="Carbohydrate" data-sortable="true" >Carbohydrate</th>
                            <th data-field="Protein" data-sortable="true" >Protein</th>
                            <th data-field="Fat" data-sortable="true" >Fat</th>
                            <th data-field="edit" data-sortable="false" >Options </th>
                        </tr>
                    </thead>
                  <tbody>
                      
                            <?php
                              $this->load->model('mdl_help', '', TRUE);
                                  foreach ($this->load->mdl_help->get_fel_content() as $value) {
                            ?>
                    <tr>
                        <td>
                            <?php foreach ($this->load->mdl_help->get_fel_cat_by_id($value->list_id) as $value_cat) { echo $value_cat->numerical_val." - ".$value_cat->name; }  ?>
                        </td>
                        <td>
                            <?php
                                if($value->category==1){
                                    echo "Fresh";
                                }else{
                                    echo "Processed";
                                }
                            ?>
                        </td>
                        <td><?=$value->name_e; ?></td>
                        <td><?=$value->name_p; ?></td>
                        <td><?=$value->household_measure; ?></td>
                        <td><?=$value->weight; ?></td>
                        <td><?=$value->calorie; ?></td>
                        <td><?=$value->carb; ?></td>
                        <td><?=$value->protein; ?></td>
                        <td><?=$value->fat; ?></td>
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
                        
                <?=form_open_multipart(base_url().'help/fel_content_edit_process/'.$value->id); ?>
                    
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="title" class="control-label">FEL List: </label>
                                <select name="list_cat" class="input form-control space_sub" id="list_cat">
                                    <?php foreach ($this->load->mdl_help->get_fel_cat_by_id($value->list_id) as $value_cat) { ?> <option value="<?=$value_cat->id;?>"><?=$value_cat->numerical_val;?> - <?=$value_cat->name;?></option> <?php } ?>
                                        <?php $this->load->model('mdl_help', '', TRUE);
                                              foreach ($this->load->mdl_help->get_fel_cat() as $value_drop) { 
                                                    if($value_drop->id!=$value->list_id){?>
                                                        <option value="<?=$value_drop->id;?>"><?=$value_drop->numerical_val;?> - <?=$value_drop->name;?></option>
                                        <?php } } ?>
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <label for="title" class="control-label">FEL Type: </label>
                                <select name="type_cat" class="input form-control space_sub" id="type_cat">
                                    <?php
                                        if($value->category==1){ ?>
                                            <option value="1">Fresh</option>
                                            <option value="2">Processed</option>
                                        <?php }else{ ?>
                                            <option value="2">Processed</option>
                                            <option value="1">Fresh</option>
                                        <?php }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <center><button class="btn btn-primary btn-md btn-block" type="submit"><i class="fa fa-plus"></i> Update List</button></center>
                            </div>
                        </div>
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="title" class="control-label">FEL English Name: </label>
                                    <input type="text" value="<?=$value->name_e; ?>" name="name_e" required id="name_e" class="form-control" placeholder="English Name">
                                </div>
                                <div class="col-sm-6">
                                    <label for="title" class="control-label">FEL Filipino Name: </label>
                                    <input type="text" value="<?=$value->name_p; ?>" name="name_p" required id="name_p" class="form-control" placeholder="Filipino Name">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-8">
                                    <label for="title" class="control-label">Household Measure (Dimension): </label>
                                    <input type="text" value="<?=$value->household_measure; ?>" name="household_measure" required id="household_measure" class="form-control" placeholder="Household Measure (Dimension)">
                                </div>
                                <div class="col-sm-4">
                                    <label for="title" class="control-label">Weight (g Edible Portion): </label>
                                    <input type="text" value="<?=$value->weight; ?>" name="weight" required id="weight" class="form-control" placeholder="Weight (g Edible Portion)">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="title" class="control-label">Calorie: </label>
                                    <input type="text" value="<?=$value->calorie; ?>" name="calorie" required id="calorie" class="form-control" placeholder="Calorie">
                                </div>
                                <div class="col-sm-3">
                                    <label for="title" class="control-label">Carbohydrate: </label>
                                    <input type="text" value="<?=$value->carb; ?>" name="carb" required id="carb" class="form-control" placeholder="Carbohydrate">
                                </div>
                                <div class="col-sm-3">
                                    <label for="title" class="control-label">Protein: </label>
                                    <input type="text" value="<?=$value->protein; ?>" name="protein" required id="protein" class="form-control" placeholder="Protein">
                                </div>
                                <div class="col-sm-3">
                                    <label for="title" class="control-label">Fat: </label>
                                    <input type="text" value="<?=$value->fat; ?>" name="fat" required id="fat" class="form-control" placeholder="Fat">
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
                  window.location.href="<?=base_url(); ?>help/fel_content_delete_process/"+del_id;
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