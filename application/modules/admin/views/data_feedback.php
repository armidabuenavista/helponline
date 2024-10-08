    <link rel="shortcut icon" href="<?=base_url("assets/images/ncs.png"); ?>"/> 
	<link rel="stylesheet" href="<?=base_url("assets/font-awesome-4.1.0/css/font-awesome.min.css"); ?>"/>
	<link rel="stylesheet" href="<?=base_url("assets/css/bootstrap.min.css"); ?>"/>
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/css/bootstrap-table.css">

            <div style="margin-left: 5%; margin-right: 5%;">
                
              <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Add Data for Counseling</button>
              <div id="demo" class="collapse">
                  <form method="post" class="form-horizontal" role="form" enctype="multipart/form-data" action="<?=base_url('admin/help/feedback_data_add/');?>">
                            <h1>Fillout the Necessary Information:</h1>
                      
                          <div class="row">
                              <div class="col-sm-4">
                                    <input type="text" name="title" class="capitalize form-control" placeholder="Full Name" required maxlength="225">
                              </div>
                              <div class="col-sm-3">
                                <div class="form-group has-feedback">
                                    <select name="gender" class="form-control">
                                        <option value="0">SEX:</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div>
                              </div>
                              <div class="col-sm-3">
                                    <input type="date" name="date_feed" class="capitalize form-control">
                              </div>
                              <div class="col-sm-2">
                                <button type="submit" class="btn btn-sm btn-block btn-info"><i class="fa fa-plus"></i> Add</button>
                              </div>
                          </div>
                          
                          <label>Message:</label>
                          <div class="form-group has-feedback">
                              <textarea class="tinymce" name="feedback"></textarea>
                          </div>
                  </form>
              </div><hr>
                
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="title" data-sort-order="asc" class="table table-bordered table-responsive table-striped table table-hover table-striped">
                    <thead>
                        <tr>
                            <th data-field="title" data-sortable="true" >Full Name</th>
                            <th data-field="description" data-sortable="true" >Message</th>
                            <th data-field="hits" data-sortable="true" >Sex</th>
                            <th data-field="img_s" data-sortable="true" >Date</th>
                            <th data-field="Edit" data-sortable="true" >Edit</th>
                            <th data-field="Delete" data-sortable="true" >Delete</th>
                            
                        </tr>
                    </thead>
                  <tbody>
            <?php
                foreach ($data_collect as $value) {
            ?>
                <tr>
                    <td><?=$value->name;?></td>
                    <td><?=$value->message;?></td>
                    <td><?php if($value->gender==2){ echo "Female"; }else{ echo "Male"; } ?></td>
                    <td><?=date("D M, d Y", strtotime($value->date))?></td>
                    <td><a type="button" href="<?=base_url(); ?>pages/updating_data/<?=$value->id;?>">Edit</a></td>
                    <td><a type="button" href="<?=base_url(); ?>pages/delete_user/<?=$value->id;?>">Delete</a></td>
                </tr>
            <?php } ?>
                </tbody>
            </table>
        </div>


<script src="<?=base_url();?>assets/tinymce/tinymce.min.js"></script>
<script src="<?=base_url();?>assets/tinymce/init-tinymce.js"></script>
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
