
<?php $this->load->view('admin_header'); ?>


<?php $this->load->view('admin_navbar'); ?>		

<div class="container" >

		



	
			<div  class="col-md-12">
		
					<div class="row">
			<div class="col-md-12 ">
<!--<button class="btn btn-success" id="add_default_plan"> Add Default Plan</button>-->
   <div class="col-md-12" align="center"   >
   
   
   <div class="form-group "><h1>Select Meal Plan: </h1></div>
	<div class="form-group ">
		
		<select name="nutrition_id" id="nutrition_id"class="form-control">
			<option value="0">--Select Meal Plan--</option>
		       <?php

foreach($default_nutrition_plan as $row){
$id= $row->id;
$default_cal=$row->default_cal;



    echo "<option value=\"$id\" >".$default_cal."</option>";




}
?>
		</select>
		
		</div>
		
		<div class="form-group">
		 <a id="open" name="open" class="btn btn-success"> Open</a>
		
		
	</div>
	

		
		
			

   
     </div> 
			</div>
				
		
					
					</div>

	
	</div>
	</div>
	

  <?php $this->load->view('admin_footer'); ?>	
