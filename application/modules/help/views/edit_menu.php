
<hr></hr>
<div id="alert_1"></div>
  	<div class="form-group">
			
					 <label for="recipe_name">Edit Menu Name:  </label></div>
				<div class="form-group" >		 
					  <input type="text" class="form-control " id="menu_name" name="menu_name"  placeholder="Enter menu name.." value="<?php echo $menu_id[0]->menu_name; ?>" style="width:500px;"/>

			</div>
	
<hr></hr>
			
			<div class="form-group">
				 <button class="btn btn-primary " id="update_menu" data-menu_id="<?php echo  $menu_id[0]->id; ?>">Update </button>
				
				
			</div>
