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
        <h3>PhilFCT Data Repository:<small> (Data Manupulation Module)</small></h3>
    </div>
    <hr>
    <div style="margin: 30px;">
        
        

                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="pin" data-sort-order="asc" class="table table-bordered table-responsive table-striped table table-hover table-striped">
                    <thead>
                        <tr>
                            <th data-field="pin" data-sortable="true" >FoodID</th>
                            <th data-field="foodname" data-sortable="true" >FoodName</th>
                            <th data-field="science" data-sortable="true" >ScientificName</th>
                            <th data-field="alter" data-sortable="true" >AlternateName</th>
                            <th data-field="ep" data-sortable="true" >EP</th>
                            <th data-field="epdesc" data-sortable="true" >EPDesc</th>
                            
                            
<th data-field="water" data-sortable="true">water</th>
<th data-field="ener_tco1" data-sortable="true">ener_tco1</th>
<th data-field="ener_tco2" data-sortable="true">ener_tco2</th>
<th data-field="ener_aco1" data-sortable="true">ener_aco1</th>
<th data-field="ener_aco2" data-sortable="true">ener_aco2</th>
<th data-field="protein" data-sortable="true">protein</th>
<th data-field="tot_fat" data-sortable="true">tot_fat</th>
<th data-field="co_total" data-sortable="true">co_total</th>
<th data-field="co_avail" data-sortable="true">co_avail</th>
<th data-field="ash" data-sortable="true">ash</th>
<th data-field="fiber" data-sortable="true">fiber</th>
<th data-field="fiber_dietary" data-sortable="true">fiber_dietary</th>
<th data-field="sugars" data-sortable="true">sugars</th>
<th data-field="sucrose" data-sortable="true">sucrose</th>
<th data-field="fructose" data-sortable="true">fructose</th>
<th data-field="glucose" data-sortable="true">glucose</th>
<th data-field="maltose" data-sortable="true">maltose</th>
<th data-field="lactose" data-sortable="true">lactose</th>
<th data-field="galactose" data-sortable="true">galactose</th>
<th data-field="calcium" data-sortable="true">calcium</th>
<th data-field="phosphorus" data-sortable="true">phosphorus</th>
<th data-field="iron" data-sortable="true">iron</th>
<th data-field="potassium" data-sortable="true">potassium</th>
<th data-field="sodium" data-sortable="true">sodium</th>
<th data-field="iodine" data-sortable="true">iodine</th>
<th data-field="zinc" data-sortable="true">zinc</th>
<th data-field="magnesium" data-sortable="true">magnesium</th>
<th data-field="manganese" data-sortable="true">manganese</th>
<th data-field="copper" data-sortable="true">copper</th>
<th data-field="selenium" data-sortable="true">selenium</th>
<th data-field="retinol" data-sortable="true">retinol</th>
<th data-field="beta_c" data-sortable="true">beta_c</th>
<th data-field="tot_vita" data-sortable="true">tot_vita</th>
<th data-field="rae" data-sortable="true">rae</th>
<th data-field="alphatocopherol" data-sortable="true">alphatocopherol</th>
<th data-field="choleclciferol" data-sortable="true">choleclciferol</th>
<th data-field="phylloquinone" data-sortable="true">phylloquinone</th>
<th data-field="thiamin" data-sortable="true">thiamin</th>
<th data-field="riboflavin" data-sortable="true">riboflavin</th>
<th data-field="niacin" data-sortable="true">niacin</th>
<th data-field="pantothenic" data-sortable="true">pantothenic</th>
<th data-field="pyridoxine" data-sortable="true">pyridoxine</th>
<th data-field="biotin" data-sortable="true">biotin</th>
<th data-field="folic_acid" data-sortable="true">folic_acid</th>
<th data-field="folate_natural" data-sortable="true">folate_natural</th>
<th data-field="folate_dfe" data-sortable="true">folate_dfe</th>
<th data-field="total_folate" data-sortable="true">total_folate</th>
<th data-field="cyanocobalamin" data-sortable="true">cyanocobalamin</th>
<th data-field="vitamin_c" data-sortable="true">vitamin_c</th>
<th data-field="fat_sat" data-sortable="true">fat_sat</th>
<th data-field="c6" data-sortable="true">c6</th>
<th data-field="c8" data-sortable="true">c8</th>
<th data-field="c10" data-sortable="true">c10</th>
<th data-field="c12" data-sortable="true">c12</th>
<th data-field="c14" data-sortable="true">c14</th>
<th data-field="c16" data-sortable="true">c16</th>
<th data-field="c18" data-sortable="true">c18</th>
<th data-field="c20" data-sortable="true">c20</th>
<th data-field="c22" data-sortable="true">c22</th>
<th data-field="c24" data-sortable="true">c24</th>
<th data-field="fatty_acids" data-sortable="true">fatty_acids</th>
<th data-field="Oleic_C18_1" data-sortable="true">Oleic_C18_1</th>
<th data-field="Fatty_acids_total" data-sortable="true">Fatty_acids_total</th>
<th data-field="Linoleic_C18_2" data-sortable="true">Linoleic_C18_2</th>
<th data-field="Linoleic_C18_2x" data-sortable="true">Linoleic_C18_2x</th>
<th data-field="Cholecholesterol" data-sortable="true">Cholecholesterol</th>
<th data-field="phenylalanine" data-sortable="true">phenylalanine</th>
<th data-field="valine" data-sortable="true">valine</th>
<th data-field="trytophan" data-sortable="true">trytophan</th>
<th data-field="methionine" data-sortable="true">methionine</th>
<th data-field="arginine" data-sortable="true">arginine</th>
<th data-field="threonine" data-sortable="true">threonine</th>
<th data-field="histidine" data-sortable="true">histidine</th>
<th data-field="isoleucine" data-sortable="true">isoleucine</th>
<th data-field="leucine" data-sortable="true">leucine</th>
<th data-field="lysine" data-sortable="true">lysine</th>
<th data-field="cystine" data-sortable="true">cystine</th>
<th data-field="tyrosine" data-sortable="true">tyrosine</th>
<th data-field="alanine" data-sortable="true">alanine</th>
<th data-field="aspartic_acid" data-sortable="true">aspartic_acid</th>
<th data-field="glutamic_acid" data-sortable="true">glutamic_acid</th>
<th data-field="asparagine" data-sortable="true">asparagine</th>
<th data-field="glutamine" data-sortable="true">glutamine</th>
<th data-field="glycine" data-sortable="true">glycine</th>
<th data-field="serine" data-sortable="true">serine</th>
<th data-field="proline" data-sortable="true">proline</th>
<th data-field="hydroxyproline" data-sortable="true">hydroxyproline</th>
<th data-field="alphacarotene" data-sortable="true">alphacarotene</th>
<th data-field="betacryptoxanthin" data-sortable="true">betacryptoxanthin</th>
<th data-field="lycopene" data-sortable="true">lycopene</th>
<th data-field="lutein" data-sortable="true">lutein</th>
<th data-field="zeaxanthin" data-sortable="true">zeaxanthin</th>
<th data-field="source" data-sortable="true">source</th>
                            
                            

                            <th data-field="option" data-sortable="true" >Option</th>
                        </tr>
                    </thead>
                  <tbody>
                      
                            <?php
                              $this->load->model('mdl_help', '', TRUE);
                                  foreach ($this->load->mdl_help->get_ufct() as $value) {
                                    echo "<tr>";
                                      echo "<td>".$value->foodid."</td>";
                                      echo "<td>".$value->foodname."</td>";
                                      echo "<td>".$value->scientific_name."</td>";
                                      echo "<td>".$value->alternate_name."</td>";
                                      echo "<td>".$value->ep."</td>";
                                      echo "<td>".$value->ep_desc."</td>";
                            ?>
                      
<td><?=$value->water;?></td>
<td><?=$value->ener_tco1;?></td>
<td><?=$value->ener_tco2;?></td>
<td><?=$value->ener_aco1;?></td>
<td><?=$value->ener_aco2;?></td>
<td><?=$value->protein;?></td>
<td><?=$value->tot_fat;?></td>
<td><?=$value->co_total;?></td>
<td><?=$value->co_avail;?></td>
<td><?=$value->ash;?></td>
<td><?=$value->fiber;?></td>
<td><?=$value->fiber_dietary;?></td>
<td><?=$value->sugars;?></td>
<td><?=$value->sucrose;?></td>
<td><?=$value->fructose;?></td>
<td><?=$value->glucose;?></td>
<td><?=$value->maltose;?></td>
<td><?=$value->lactose;?></td>
<td><?=$value->galactose;?></td>
<td><?=$value->calcium;?></td>
<td><?=$value->phosphorus;?></td>
<td><?=$value->iron;?></td>
<td><?=$value->potassium;?></td>
<td><?=$value->sodium;?></td>
<td><?=$value->iodine;?></td>
<td><?=$value->zinc;?></td>
<td><?=$value->magnesium;?></td>
<td><?=$value->manganese;?></td>
<td><?=$value->copper;?></td>
<td><?=$value->selenium;?></td>
<td><?=$value->retinol;?></td>
<td><?=$value->beta_c;?></td>
<td><?=$value->tot_vita;?></td>
<td><?=$value->rae;?></td>
<td><?=$value->alphatocopherol;?></td>
<td><?=$value->choleclciferol;?></td>
<td><?=$value->phylloquinone;?></td>
<td><?=$value->thiamin;?></td>
<td><?=$value->riboflavin;?></td>
<td><?=$value->niacin;?></td>
<td><?=$value->pantothenic;?></td>
<td><?=$value->pyridoxine;?></td>
<td><?=$value->biotin;?></td>
<td><?=$value->folic_acid;?></td>
<td><?=$value->folate_natural;?></td>
<td><?=$value->folate_dfe;?></td>
<td><?=$value->total_folate;?></td>
<td><?=$value->cyanocobalamin;?></td>
<td><?=$value->vitamin_c;?></td>
<td><?=$value->fat_sat;?></td>
<td><?=$value->c6;?></td>
<td><?=$value->c8;?></td>
<td><?=$value->c10;?></td>
<td><?=$value->c12;?></td>
<td><?=$value->c14;?></td>
<td><?=$value->c16;?></td>
<td><?=$value->c18;?></td>
<td><?=$value->c20;?></td>
<td><?=$value->c22;?></td>
<td><?=$value->c24;?></td>
<td><?=$value->fatty_acids;?></td>
<td><?=$value->Oleic_C18_1;?></td>
<td><?=$value->Fatty_acids_total;?></td>
<td><?=$value->Linoleic_C18_2;?></td>
<td><?=$value->Linoleic_C18_2x;?></td>
<td><?=$value->Cholecholesterol;?></td>
<td><?=$value->phenylalanine;?></td>
<td><?=$value->valine;?></td>
<td><?=$value->trytophan;?></td>
<td><?=$value->methionine;?></td>
<td><?=$value->arginine;?></td>
<td><?=$value->threonine;?></td>
<td><?=$value->histidine;?></td>
<td><?=$value->isoleucine;?></td>
<td><?=$value->leucine;?></td>
<td><?=$value->lysine;?></td>
<td><?=$value->cystine;?></td>
<td><?=$value->tyrosine;?></td>
<td><?=$value->alanine;?></td>
<td><?=$value->aspartic_acid;?></td>
<td><?=$value->glutamic_acid;?></td>
<td><?=$value->asparagine;?></td>
<td><?=$value->glutamine;?></td>
<td><?=$value->glycine;?></td>
<td><?=$value->serine;?></td>
<td><?=$value->proline;?></td>
<td><?=$value->hydroxyproline;?></td>
<td><?=$value->alphacarotene;?></td>
<td><?=$value->betacryptoxanthin;?></td>
<td><?=$value->lycopene;?></td>
<td><?=$value->lutein;?></td>
<td><?=$value->zeaxanthin;?></td>
<td><?=$value->source;?></td>
                      
                      
                            <td>
                                <a type="button" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>fct_admin/library/edit_foodcomponents<?php echo "/".$value->id; ?>"><i class="fa fa-pencil"></i> Edit</a>

                                <button type="button" class="btn btn-sm btn-danger" onclick="del('<?php echo $value->id; ?>')" data-toggle="tooltip" title="Enable to Delete the information." data-placement="bottom"><i class="fa fa-trash"></i> Delete</button>
                            </td>
                            <?php echo "</tr>"; } ?>
                      
                  </tbody>
                </table>
        
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