
<div class="col-md-12" align="center">

<hr></hr>
<div id="alert" tabindex="1"></div>

 <div class="form-inline" >
					   	<?php 
						
					echo "<select name=\"copy_to\" id=\"copy_to\" class=\"form-control\" style=\"width:500px;\" >";

				echo "<option value=\"0\" selected=\"\" >--Select Meal--</option> ";
			
		
			
            foreach($groups as $row)
            { 
			
            echo '<option  value="'.$row->id.'"  >'.$row->meal_name.'</option>';
			
      
            }
         
		echo "</select>";
						
						
						
						
						
						?>
						
					<input type="hidden" class="form-control" value="<?php echo $menu_id; ?>" id="copy_menu_id" name="copy_menu_id" />
						   <button type="submit" class="btn btn-primary" id="copy_menu1">Copy</button>
					   </div>
			  
</div>




<script>
	$(document).ready(function() {
		
		$(document).on("click", "#copy_menu1", function() {
		var copy_to= $("#copy_to").val();
		var copy_menu_id=  $("#copy_menu_id").val();
		
		
		
		$.ajax({
				type: "POST",
				url: base_url+'help/copy_menu_action',
				data: "copy_menu_id=" + copy_menu_id+'&copy_to='+copy_to,
				success: function(html) {
				
				if (html == 'success') {
						$("#alert").html("Menu successfully copied!");
				$('#alert').addClass('alert alert-success');
				setTimeout("location.reload(true);",1000);
							
						}  else {
							$("#alert").html("Error: Something is wrong when saving the data.");
							//	alert('Error: Something is wrong when saving the data.');
							$('#alert').addClass('alert alert-danger');
							$("#alert").focus();
						}
				
				},
				/*beforeSend: function() {
					$("#alert").html("Loading...");
					$('#alert').addClass('alert alert-success');
				}*/
			});
		
		
		});
		
		
		
		
		
		
		});
	
	
</script>



