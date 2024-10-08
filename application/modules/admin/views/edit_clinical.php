<?php
 $clinical_param = $clinical_id[0]->clinical_parameter; 

 $obsrv = $clinical_id[0]->observation; 
 $clinical_remarks = $clinical_id[0]->clinical_remarks; 

 $submitted_on= $clinical_id[0]->submitted_on;
if($numRows > 0){
	

?>





<hr></hr>
	

<div id="alert1"></div>
<div class="table-responsive">
<table border="1" align="center" class="table table-condensed clinical">

                              
      <tr>
		 <th>Clinical Paramater</th>
		 <!--<th>Blood Pressure</th>-->
		 <th>Observation</th>
		<th>Remarks</th>
		 <th>Date Submitted</th>
	
		  
		 </tr>

	<tr>
	
	<td >	 
			  
	<textarea class="form-control border-textbox input-lg" name="clinical_param1" placeholder="Enter Blood Pressure" id="clinical_param1" cols="30"><?php echo $clinical_param; ?></textarea>
	
		
	  
		</td>
	
	
		<!--<td >	
		<textarea class="form-control border-textbox input-lg" name="bp1" placeholder="Enter Blood Pressure" id="bp1" cols="30"><?php echo $bp; ?></textarea>
		 	
		
	  
		</td>-->
		<td > 
			<textarea class="form-control border-textbox input-lg" name="obsrv1"  placeholder="Enter Observation" id="obsrv1" cols="30"><?php echo $obsrv; ?></textarea>
	
		</td>
		
		<td > 	
		
		<textarea class="form-control border-textbox input-lg" name="remarks1"  placeholder="Enter Remarks" id="remarks1" cols="30"><?php echo $clinical_remarks; ?></textarea>

		</td>
		
		
		
		<td > 		
		<?php echo date("l jS \of F Y g:i A",strtotime($submitted_on)); ?> 
		</td>
		
		
		
	
	
	</tr>
</table></div>

<hr></hr>
<div align="center">
<button type="button" id="edit_clinical1" class="btn btn-success btn-lg " data-id="<?php echo $id; ?>">Update  </button>

</div>
<?php


}
else{
	echo "<div class=\"alert alert-danger\">No records found.</div>";
}

?>






