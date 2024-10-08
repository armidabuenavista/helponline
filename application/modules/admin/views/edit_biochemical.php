<?php
 $biochem_test = $biochem_id[0]->biochem_test; 

 $biochem_result = $biochem_id[0]->biochem_result; 
 $n_values = $biochem_id[0]->n_values; 
 $biochem_result_date = $biochem_id[0]->biochem_result_date; 
 $biochem_remarks = $biochem_id[0]->biochem_remarks; 
 $submitted_on= $biochem_id[0]->submitted_on;
if($numRows > 0){
	

?>



<hr></hr>

		

<div id="alert1"></div>
<div class="table-responsive">
<table border="1"  align="center" class=" table table-condensed">

<tr>
	 <th>Biochemical Test</th>
		 <th>Biochemical Result</th>
		 <th>Normal Values</th> 
		 <th>Result Date</th>
		 <th>Remarks</th>
		  <th>Date Submitted</th>
		
</tr>

	<tr>
		<td align="center" >	 	
		
		
		<textarea name="btest1" id="btest1" class="form-control border-textbox input-lg"   placeholder="Enter Biochemical Test" ><?php echo $biochem_test; ?></textarea>
	 </td>
		<td align="center"> 		

		<textarea class="form-control border-textbox input-lg" name="bresult1" id="bresult1"  placeholder="Enter Biochemical Result"><?php echo $biochem_result; ?></textarea>
		
		</td>
		<td  align="center"> 

		<textarea class="form-control border-textbox input-lg"  placeholder="Enter Normal Values" id="n_values1" name="n_values1"><?php echo $n_values; ?></textarea>
		</td>
		
			<td align="center"> 
		<input type="text" class="form-control border-textbox input-lg"  placeholder="Enter Result Date" id="result_date1" name="result_date1" value="<?php echo $biochem_result_date; ?>"   />
		</td>
		
			<td align="center"> 

	
	
	<textarea class="form-control border-textbox input-lg"  placeholder="Enter Remarks" id="remarks1" name="remarks1"><?php echo $biochem_remarks; ?> </textarea>
		</td>
		
		
		
			<td > 
		<?php echo date("l jS \of F Y g:i A",strtotime($submitted_on)); ?> 
		</td>
		
		
		
		
	</tr>
</table></div>

<hr></hr>

<div align="center">
<button type="button" id="edit_biochem1" class="btn btn-success btn-lg" data-id="<?php echo $id; ?>" > Update </button>
</div>

<?php 
}
else{
	echo "<div class=\"alert alert-danger\">No records found.</div>";
}


?>








