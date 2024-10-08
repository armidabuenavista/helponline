
 


			

<?php 

if($numRows > 0) {
	$foodgroup_id= $fooditem_id[0]->foodgroup_id;
	$foodlist_id= $fooditem_id[0]->foodlist_id;
	$fooditem= $fooditem_id[0]->fooditem;
	$fooditem_id1= $fooditem_id[0]->fooditem_id;

	$foodgroup_content= $fooditem_id[0]->foodgroup_content;
	$wt_ep= $fooditem_id[0]->weight_ep;
	$wt_ap= $fooditem_id[0]->weight_ap;
	$constant_exchange= $fooditem_id[0]->constant_exchange;
	$hh_m= $fooditem_id[0]->hh_measure;
	$dimension= $fooditem_id[0]->dimension;


?>
 

 <hr></hr>
<div id="alert" tabindex="1" ></div>
<div class="panel panel-default" style="margin-left: 20px;">
                        <div class="panel-heading">
                     <h3><i class="fa fa-cutlery"></i> Edit Fooditem</h3>
 	 
                            
                        </div>
                        <!-- /.panel-heading -->
                       
					   
					    
						<div class="panel-body">
		

			<div class="form-group">
				<label>Select Foodgroup:</label>
				
			</div>
			
			<div class="form-group">
			<?php

			
							
							echo "<select name=\"add_foodgroup1\" id=\"add_foodgroup1\" class=\" foodgroup  form-control\"  >";
							echo "<option value=\"0\" selected=\"\" >--Food Group--</option> ";
							
						foreach($foodgroups as $row){
							$fg_id= $row->foodid;
							$foodgroup = $row->foodgroup;
							if($fg_id==$foodgroup_id){
        $selectCurrent=' selected';
    }else{
        $selectCurrent='';
    }


							echo "<option value=\"$fg_id\" ".$selectCurrent.">$foodgroup</option>";

						}
								
						

						
							echo " </select>";
		
		 ?>
				
			</div>


				<div class="form-group"><label>Select Foodlist:</label></div>
			<div class="form-group">
				 <?php
 echo "<select name=\"add_foodlist1\" id=\"add_foodlist1\" class=\" form-control \" >";
 echo "<option value=\"0\" >--Food Lists--</option> ";
		foreach($foodlists as $row1){
			$fl_id= $row1->id;
			$foodlist= $row1->foodlist;


	 if($fl_id==$foodlist_id){
        $selectCurrent=' selected';
    }else{
        $selectCurrent='';
    }
	
	
    echo "<option value=\"$fl_id\" ".$selectCurrent." >$foodlist</option>";
        


}

echo " </select>";

?>
			</div>

	<div class="form-group">
				<label>Select Fooditem:</label>
			</div>
			
			<div class="form-group">
				<input type="text" name="add_fooditem1" id="add_fooditem1" placeholder="Fooditem" class="form-control" value="<?php echo $fooditem; ?>" />
						<input type="hidden" name="add_fooditem_id1" id="add_fooditem_id1"  class="form-control" value="<?php echo $fooditem_id1; ?>" />
			</div>

			
		<?php 
		}else{


			echo "No fooditem available";
		}


		?>
			


			<div id="foodgroup_content_div1" style="display none;">
			<div class="form-group">
				<label>Select Content:</label>
				
			</div>
			
			<div class="form-group">
			<?php
		echo "<select name=\"add_foodgroup_content1\" id=\"add_foodgroup_content1\" class=\" form-control\"  >";
							echo "<option value=\"0\" selected=\"\" >--Food Group--</option> ";
							
						foreach($foodgroups as $row2){
							$fg_id= $row2->foodid;
							$foodgroup = $row2->foodgroup;
							if($fg_id==$foodgroup_content){
        $selectCurrent=' selected';
    }else{
        $selectCurrent='';
    }


							echo "<option value=\"$fg_id\" ".$selectCurrent.">$foodgroup</option>";

						}
								
						

						
							echo " </select>";
		
		 ?>
				
			</div>
			</div>



			<div class="form-group">
				<label>Weight EP:</label>
			</div>
			
			<div class="form-group">
				<input type="number" name="add_wt_ep1" id="add_wt_ep1" placeholder="Weight EP" class="form-control" value="<?php echo $wt_ep; ?>"  />
			</div>
		
			<div class="form-group">
				<label>Weight AP:</label>
			</div>
			
			<div class="form-group">
				<input type="number" name="add_wt_ap1" id="add_wt_ap1" placeholder="Weight AP" class="form-control" value="<?php echo $wt_ap; ?>" />
			</div>
			
			<div class="form-group">
				<label>Exchange:</label>
			</div>



					<div class="form-group form-inline">
				<input type="text" name="add_ex1" id="add_ex1" placeholder="Exchange" class="form-control" value="<?php echo $constant_exchange; ?>" />
				<?php
		
							
							echo "<select name=\"add_hh_m1\" id=\"add_hh_m1\" class=\" add_hh_m  form-control\"  >";
							
							foreach ($get_hh_m as $row3){
								$foodunit_id = $row3->id;
								$foodunit = $row3->foodunit;
		
								if($foodunit_id==$hh_m){
        $selectCurrent=' selected';
    }else{
        $selectCurrent='';
    }	
									echo "<option value=\"$foodunit_id\" ".$selectCurrent.">$foodunit</option>";
								}

							

						
							echo " </select>";



								

									
		 ?>
					
				
			</div>





			<div class="form-group">
				<label>Dimension:</label>
			</div>
			
			<div class="form-group">
				<input type="text" name="add_dimension1" id="add_dimension1" placeholder="Dimension" class="form-control" value="<?php echo $dimension; ?>" />
			</div>
		
		
		
		
		
		<div class="form-group">
			
			<button id="editfooditem" name="editfooditem" class="btn btn-primary" data-id="<?php echo $id; ?>">Update </button>
		</div>
			

</div>

</div>
			