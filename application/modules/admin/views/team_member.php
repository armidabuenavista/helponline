    <link rel="shortcut icon" href="<?=base_url("assets/images/ncs.png"); ?>"/> 
	<link rel="stylesheet" href="<?=base_url("assets/font-awesome-4.1.0/css/font-awesome.min.css"); ?>"/>
	<link rel="stylesheet" href="<?=base_url("assets/css/bootstrap.min.css"); ?>"/>
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/css/bootstrap-table.css">

            <div style="margin-left: 5%; margin-right: 5%;">
                
              <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Add Data for Counseling</button>
              <div id="demo" class="collapse">
                  <form method="post" class="form-horizontal" role="form" enctype="multipart/form-data" action="<?=base_url('admin/help/counseling_data_add/');?>">
                        <div class="col-sm-8">
                            <h1>Fillout the Necessary Information:</h1>
                          <label>Event Name:</label>
                          <div class="form-group has-feedback">
                            <input type="text" name="title" class="capitalize form-control" placeholder="Title" required maxlength="225">
                                <span class="glyphicon glyphicon-th form-control-feedback"></span>
                          </div>
                          <label>Number of Participants:</label>
                          <div class="form-group has-feedback">
                              <input type="text" name="hits" class="capitalize form-control" placeholder="No of Hits" required maxlength="11">
                                  <span class="glyphicon glyphicon-th form-control-feedback"></span>
                          </div>
                          <label>Location:</label>
                          <div class="form-group has-feedback">
                              <input type="text" name="description" class="capitalize form-control" placeholder="Location" required maxlength="225">
                                  <span class="glyphicon glyphicon-th form-control-feedback"></span>
                          </div>
                          <button type="submit" class="btn btn-sm btn-block btn-info"><i class="fa fa-plus"></i> Add</button>
                        </div>
                        <div class="col-sm-4">
                            <div class = "well" style="margin:2px">
                                <center>
                                    <p>Image view:</p>
                                        <img id="image_upload_preview" src="<?php echo base_url();?>assets/images/no_photo.png"  alt="Place your Photo Item here" style="width:100%;height:auto" /><br>
                                    <input accept ="image/*" type='file' id="inputFile" name="inputFile" required/>
                                </center>
                            </div>
                        </div>
                  </form>
              </div><hr>
                
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="title" data-sort-order="asc" class="table table-bordered table-responsive table-striped table table-hover table-striped">
                    <thead>
                        <tr>
                            <th data-field="title" data-sortable="true" >Title</th>
                            <th data-field="description" data-sortable="true" >Description</th>
                            <th data-field="hits" data-sortable="true" >Hits</th>
                            <th data-field="img_s" data-sortable="true" >Image</th>
                            <th data-field="Edit" data-sortable="true" >Edit</th>
                            <th data-field="Delete" data-sortable="true" >Delete</th>
                            
                        </tr>
                    </thead>
                  <tbody>
            <?php
                foreach ($data_collect as $value) {
            ?>
                <tr>
                    <td><?=$value->title;?></td>
                    <td><?=$value->description;?></td>
                    <td><?=$value->hits;?></td>
                    <td><?=$value->image;?></td>
                    <td><a type="button" href="<?=base_url(); ?>pages/updating_data/<?=$value->id;?>">Edit</a></td>
                    <td><a type="button" href="<?=base_url(); ?>pages/delete_user/<?=$value->id;?>">Delete</a></td>
                </tr>
            <?php } ?>
                </tbody>
            </table>
        </div>


<script src="<?=base_url();?>assets/bootstrap/js/bootstrap-table.js"></script>
        <script>
            $(document).ready(function() {
              $.uploadPreview({
                input_field: "#image-upload",
                preview_box: "#image-preview",   
                label_field: "#image-label"
              });
            });  
        
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#image_upload_preview').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $("#inputFile").change(function () {
                    readURL1(this);
                });
        </script>
