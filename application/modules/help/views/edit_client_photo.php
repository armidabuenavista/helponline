<script type="text/javascript">

$(document).on("click", '#set_dp', function() {
 var photo_id = $("#photo_id").val();

 $.ajax({
          type: "POST",
          url: base_url + 'help/update_photo',
          data: "photo_id=" + photo_id ,
          success: function(html) {
            
           if (html == 'success') {
              $("#shadow").fadeOut();
              $("#alert").html("Photo successfully updated.");
              $('#alert').addClass('alert alert-success');
              $('#alert').focus();
             setTimeout("location.reload(true);", 1000);
            } else {
              $("#alert").html("Error: Something is wrong when saving the data.");
              $('#alert').addClass('alert alert-danger');
              $('#alert').focus();
            }
          },
          beforeSend: function() {
            $("#alert" ).html("Loading...");
            $('#alert' ).addClass('alert alert-success');
            $('#alert').focus();
          }
        });

});


$(document).on("click", ".delete_photo", function() {

    var id = $(this).attr("id");
    var dataString = 'id=' + id;
    var parent = $(this).closest("div");
    var answer = confirm("Are you sure you want to delete from the database?");
    if (answer) {
      console.log(dataString);
      $.ajax({
        type: "POST",
        url: base_url + 'help/delete_photo',
        data: dataString,
        cache: false,
        /*beforeSend: function() {
          parent.animate({
            'backgroundColor': '#fb6c6c'
          }, 300).animate({
            opacity: 0.35
          }, "slow");;
        },*/
        success: function() {
          /*parent.slideUp('slow', function() {
            $(this).remove();
          });*/
          $("#alert").html("Photo successfully deleted.");
          $('#alert').addClass('alert alert-success');
          $('#alert').focus();
          setTimeout("location.reload(true);", 1000);
        }
      });
    } else {
      return false;
    }
    return false;
    // });
  });

   </script>


 <div class="well ">
          <div id="alert" tabindex="1"> </div>
                     <div class="row projects-holder"  >
                <?php 
                if($numRows > 0 ){
                    foreach($results as $row){
                     // $photo_id= $row->id;
                      $photo1= $row->photo;

                      echo "<div class=\"col-md-8 col-sm-8\" >";
                      echo " <div class=\"project-item\" style=\"margin-left:30%; margin-right:30%; vertical-align: middle;\" >";

                      $a= base_url("assets/images/client_photos/$photo1");

                      echo "<a href=\"#\" id=\"$photo_id\" class=\"edit_photo\" ><img src=\"$a\" alt=\"Profile\" class=\"img-thumbnail img\" ></a>";
               
                      echo " </div>"; 
                      echo " </div>";
 
                    }
                       
                }else{

                  echo "No available photos";
                }


                ?>


          


                   </div>
                </div>  
				<div class="form-group form-inline" style="margin-left:30%; margin-right:30%; vertical-align: middle;">


				<input type="hidden" name="photo_id" id="photo_id"  class="form-control" value="<?php echo $photo_id; ?>"  > 
				<button class="btn btn-success btn-lg" id="set_dp" >Set as Profile</button> <button  id="<?php echo $photo_id; ?>" class="btn btn-danger btn-lg delete_photo">Delete Picture</button>
				</div>

				

			
