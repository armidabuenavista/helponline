<?php
 $recommendation= $recommendation_id[0]->recommendation; 

if($numRows>0){
	


?>


	<div class="col-md-12" >
<hr></hr>

		

<div id="alert1"></div>




<div class="form-group">
		 	
			
		<label class="control-label">Other Recommendations:</label>
		 </div>
		 
		<div class="form-group">
			<textarea id="recommendation1" name="recommendation1" class="form-control input-lg"><?php echo $recommendation; ?></textarea>
		</div>
		
		



<button type="button" id="edit_recommendation1" class="btn btn-success btn-lg" data-appointment_id1="<?php echo $id; ?>" > Update </button>



<hr></hr>

</div>

<?php
}
else{
	echo "<div class=\"alert alert-danger\">No records found.</div>";
}

?>


