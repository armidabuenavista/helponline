<?php

 $diagnosis = $diagnosis_id[0]->diagnosis; 

 $etiology= $diagnosis_id[0]->etiology; 
 $ss_diagnosis = $diagnosis_id[0]->ss_diagnosis;
 $diagnosis_remarks = $diagnosis_id[0]->diagnosis_remarks;
 $submitted_on= $diagnosis_id[0]->submitted_on;


if($numRows>0){

?>


<hr></hr>


<div id="alert1"></div>
<div class="table-responsive">
<table align="center" class="table table-condensed">

<tr>
	 <th>Diagnosis Result</th>
		 <th>Etiology</th>
		  <th>Signs and Symptoms</th>   
		  <th>Remarks</th> 
		  <th>Date Submitted</th>
	
</tr>

	<tr>
		<td >	 	
		
		 <textarea  class="form-control border-textbox input-lg" name="diagnosis1" placeholder="Enter Diagnosis" id="diagnosis1" cols="30"><?php echo $diagnosis; ?></textarea>
		

	  
		</td>
		<td > 
		
		 <textarea   class="form-control border-textbox input-lg" name="etiology1"  placeholder="Enter Etiology" id="etiology1" cols="30"><?php echo $etiology; ?></textarea>
		

		</td>
		
		<td > 	
		 <textarea   class="form-control border-textbox input-lg" name="ss_diagnosis1" placeholder="Enter Signs and Symptoms" id="ss_diagnosis1" cols="30"><?php echo $ss_diagnosis; ?></textarea>
			

		
		
		</td>
		
			<td > 
			
			<textarea  class="form-control border-textbox input-lg" name="remarks1" placeholder="Enter Remarks" id="remarks1" cols="30"><?php echo $diagnosis_remarks; ?></textarea>
					
	
		</td>
		
		
		
			<td > 		
		<?php echo date("l jS \of F Y g:i A",strtotime($submitted_on)); ?>
		
		
		</td>
		
	
	
	</tr>
</table></div>
<hr></hr>

<div align="center">
<button type="button" id="edit_diagnosis1" class="btn btn-success btn-lg" data-id="<?php echo $id; ?>" >Update </button>

</div>

<?php

}
else{
	echo "<div class=\"alert alert-danger\">No records found.</div>";
}

?>			
	


