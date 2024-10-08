
	
 <script type="text/javascript">
  	$(document).ready(function() {
		$(document).on("click", "#addfooditem", function() {
			var foodgroup = $("#add_foodgroup").val();
			var foodlist = $("#add_foodlist").val();
			var fooditem_id = $("#add_fooditem_id").val();
			var fooditem = $("#add_fooditem").val();
			var foodgroup_content = $("#add_foodgroup_content").val();
			var wt_ep = $("#add_wt_ep").val();
			var wt_ap = $("#add_wt_ap").val();
			var ex = $("#add_ex").val();
			var hh_m = $("#add_hh_m").val();
			var dimension = $("#add_dimension").val();
			if (foodgroup == 0) {
				$("#alert").html("Please select foodgroup.");
				$('#alert').addClass('alert alert-danger');
				$("#alert").focus();
				return false;
			} else if (foodlist == 0) {
				$("#alert").html("Please select foodlist.");
				$('#alert').addClass('alert alert-danger');
				$("#alert").focus();
				return false;
			}
			/*else if(wt_ep == '' || isNaN(wt_ep)){
				$("#alert").html("Please enter weight ep.");
				$('#alert').addClass('alert alert-danger');
				$("#alert").focus();
				return false;
			}
			else if(wt_ap == '' || isNaN(wt_ap)){
				$("#alert").html("Please enter weight ap.");
				$('#alert').addClass('alert alert-danger');
				$("#add_wt_ap").addClass("error");
				$("#alert").focus();
				return false;
			}
			else if(ex == '' || isNaN(ex)){
				$("#alert").html("Please enter exchange.");
				$('#alert').addClass('alert alert-danger');
				$("#alert").focus();
				return false;
			}*/
			else {
				$.ajax({
					type: "POST",
					url: base_url + 'admin/help/save_fooditem',
					data: "add_foodgroup=" + foodgroup + "&add_foodlist=" + foodlist + "&add_fooditem_id=" + fooditem_id + "&add_fooditem=" + fooditem + "&add_foodgroup_content=" + foodgroup_content + "&add_wt_ep=" + wt_ep + "&add_wt_ap=" + wt_ap + "&add_ex=" + ex + "&add_hh_m=" + hh_m + "&add_dimension=" + dimension,
					success: function(html) {
						//$("#sample_div"+x).html(html);
						//alert(data);
						if (html == 'success') {
							$("#alert").html("Fooditem successfully saved!");
							$('#alert').addClass('alert alert-success');
							$("#alert").focus();
							setTimeout("location.reload(true);", 1000);
						} else {
							$("#alert").html("Error: Something is wrong when saving the data.");
							$('#alert').addClass('alert alert-danger');
							$("#alert").focus();
						}
					},
				});
			}
			return false;
		});
	});
</script>


 
      <div id="alert" tabindex="1" ></div>
      <div class="panel panel-default" style="margin-left: 20px;">
 <div class="panel-heading">
                     <h3><i class="fa fa-cutlery"></i> Add Fooditem</h3>
 	 
                            
                        </div>
                        <!-- /.panel-heading -->
                       
					   
					    
						<div class="panel-body">

			<div class="form-group">
				<label>Select Foodgroup:</label>
				
			</div>
			
			<div class="form-group">
			<?php

			
							
							echo "<select name=\"add_foodgroup\" id=\"add_foodgroup\" class=\" foodgroup  form-control\"  >";
							echo "<option value=\"0\" selected=\"\" >--Food Group--</option> ";
							
						foreach($foodgroups as $row){
							$fg_id= $row->foodid;
							$foodgroup = $row->foodgroup;
					


							echo "<option value=\"$fg_id\" ".$selectCurrent.">$foodgroup</option>";

						}
								
						

						
							echo " </select>";
		
		 ?>
				
			</div>


				<div class="form-group"><label>Select Foodlist:</label></div>
			<div class="form-group">
				 <?php
 echo "<select name=\"add_foodlist\" id=\"add_foodlist\" class=\" form-control \" >";
 echo "<option value=\"0\" >--Food Lists--</option> ";
		foreach($foodlists as $row1){
			$fl_id= $row1->id;
			$foodlist= $row1->foodlist;


	
    echo "<option value=\"$fl_id\" ".$selectCurrent." >$foodlist</option>";
        


}

echo " </select>";

?>
			</div>

	<div class="form-group">
				<label>Select Fooditem:</label>
			</div>
			
			<div class="form-group">
				<input type="text" name="add_fooditem" id="add_fooditem" placeholder="Fooditem" class="form-control" />
						<input type="hidden" name="add_fooditem_id1" id="add_fooditem_id"  class="form-contro" />
			</div>

			
	


			<div id="foodgroup_content_div" style="display none;">
			<div class="form-group">
				<label>Select Content:</label>
				
			</div>
			
			<div class="form-group">
			<?php
		echo "<select name=\"add_foodgroup_content\" id=\"add_foodgroup_content\" class=\" form-control\"  >";
							echo "<option value=\"0\" selected=\"\" >--Food Group--</option> ";
							
						foreach($foodgroups as $row2){
							$fg_id= $row2->foodid;
							$foodgroup = $row2->foodgroup;
		


							echo "<option value=\"$fg_id\" >$foodgroup</option>";

						}
								
						

						
							echo " </select>";
		
		 ?>
				
			</div>
			</div>



			<div class="form-group">
				<label>Weight EP:</label>
			</div>
			
			<div class="form-group">
				<input type="number" name="add_wt_ep" id="add_wt_ep" placeholder="Weight EP" class="form-control"  />
			</div>
		
			<div class="form-group">
				<label>Weight AP:</label>
			</div>
			
			<div class="form-group">
				<input type="number" name="add_wt_ap" id="add_wt_ap" placeholder="Weight AP" class="form-control"  />
			</div>
			
			<div class="form-group">
				<label>Exchange:</label>
			</div>



					<div class="form-group form-inline">
				<input type="text" name="add_ex" id="add_ex" placeholder="Exchange" class="form-control"  />
				<?php
		
							
							echo "<select name=\"add_hh_m\" id=\"add_hh_m\" class=\" add_hh_m  form-control\"  >";
							
							foreach ($get_hh_m as $row3){
								$foodunit_id = $row3->id;
								$foodunit = $row3->foodunit;
							echo "<option value=\"$foodunit_id\" >$foodunit</option>";
								}

							

						
							echo " </select>";



								

									
		 ?>
					
				
			</div>





			<div class="form-group">
				<label>Dimension:</label>
			</div>
			
			<div class="form-group">
				<input type="text" name="add_dimension" id="add_dimension" placeholder="Dimension" class="form-control"  />
			</div>
		
		
		
		
		
	<div class="form-group">
			
			<button id="addfooditem" name="addfooditem" class="btn btn-primary">Add </button>
		</div>


				 </div>

				  </div> 