<?php $this->load->view('admin_header'); ?>	





<?php include('admin_navbar.php'); ?>

		

<div class="container" >  
<div class="col-md-12" >
	 <h3 class="page-header"> <img  height="75" width="75" src="<?php echo base_url("assets/images/ncs.png"); ?>">Biochemical</h3>
			<div class="container" style="margin-bottom:20px;">
	
    <?php $tb=count($crumb); for($c=0;$c<count($crumb);$c++){ if(($tb-$c)>1){?>
    <a href="<?php echo $crumb[$c]['link']?>"> <?php echo ucfirst($crumb[$c]['label']);?></a> /    <?php }else{ ?>

        <?php echo ucfirst($crumb[$c]['label']);?>

    <?php } }?>


			</div>
 <div class="col-md-6" >
		<p class="lead">Name of Client: <?php  echo $name; ?></p>
		<p class="lead">Age: <?php  echo $age_year; ?></p>
		<p class="lead" id="gender" data-gender="<?php  echo $gender; ?>">Gender: <?php  echo $gender."<br>"; ?></p>
		</div>
	 <div class="col-md-6" >
	<p class="lead">Date of Counseling: <?php  echo date("F d, Y",strtotime($approved_date)); ?></p>
	<p class="lead">Assigned RND: <?php  echo $assigned_rnd; ?></p>
		</div>	


			</div>

	

<div id="biochem"  class="col-md-12"  style="display: none;">

					
	<hr></hr>
<div id="alert"></div>
 
					
<div class="table-responsive">
<table  align="center" class="table table-condensed">

<tr>
	 <th>Biochemical Test</th>
		 <th>Biochemical Result</th>
		 <th>Normal Values</th> 
		 <th>Result Date</th>
		 <th>Remarks</th>
		
</tr>
	<tr>
		<td>	 	
	
	<textarea  class="form-control input-lg" name="btest"   placeholder="Biochemical Test" id="btest" cols="30"></textarea>
		
		</td>
		<td > 		

		
		<textarea   class="form-control  input-lg" name="bresult" id="bresult"  placeholder="Biochemical Result"  cols="30" ></textarea>
		
		</td>
		<td  > 

			<textarea    class="form-control input-lg"  placeholder="Enter Normal Values" id="n_values" name="n_values"  cols="30" ></textarea>
		
		</td>
		
		<td> 

		<input type="text" class="form-control input-lg"  placeholder="Enter Result Date" id="result_date" name="result_date" style="height: 50px; width: 150px; "  />
		</td>
		
		<td> 
		<textarea class="form-control input-lg"  placeholder="Enter Remarks" id="remarks" name="remarks"  cols="30" style="width: 120px; "></textarea></td>
	
	</tr>

		</table>
		</div>
	
								
	<hr></hr>
	<div align="center">
		<button type="button" id="save_biochem" class="btn btn-success btn-lg" data-client_id="<?php echo $client_id; ?>" data-appointment_id="<?php echo $appointment_id; ?>" >Add </button>
</div>
			
		</div>
	

	
<div id="edit_biochem"  style="display: none;">
</div>


<div class="col-md-12" align="right" style="margin-bottom: 20px;">

<hr class="colorgraph"></hr>
<?php if($b <= $a){ ?>
	 <button id="add_biochem" class="btn btn-success btn-lg" ><span class="glyphicon glyphicon-plus" ></span> Add</button>	
	<?php }
	else{
		echo "";
	}?>
	
</div>


<div class="col-md-12">

	
<?php
   $datetime1= date("Y-m-d");

		
		                   // set table headers
      echo "<div class=\"table-responsive\"><table border=\"1\" id=\"biochem_table\" class=\"table table-condensed biochem\" ><thead><tr>
		 <th >Biochemical Test</th>
		 <th>Biochemical Result</th>
		 <th>Normal Values</th> 
		 <th>Result Date</th>
		 <th>Remarks</th>
		 <th>Date Submitted</th>
		 <th> </th>
		 <th>Pdf </th>
		 </tr></thead><tbody>";


	
       foreach ($results2 as $row) {
   
        $datesubmit= date("Y-m-d",strtotime($row->submitted_on)); 
		$biochem_test=$row->biochem_test;
		$biochem_result=$row->biochem_result;
		$n_values=$row->n_values;
		$biochem_result_date=$row->biochem_result_date;
		$biochem_remarks=$row->biochem_remarks;
		$submitted_on=$row->submitted_on;
        echo "<tr >";
        echo "<td>".$biochem_test."</td>";  
    	echo "<td>".$biochem_result."</td>";
		echo "<td>".$n_values. "</td>";
		echo "<td>".$biochem_result_date."</td>";
		  
		echo "<td>".$biochem_remarks."</td>";
		  
		echo "<td>" .
	date("l jS \of F Y g:i A",strtotime($submitted_on)). "</td>";
		$id= $row->id;
	if($datetime1 == $datesubmit){
	  	echo "<td align=\"center\"><a id=\"$id\" href=\"#\" class=\"edit_biochem\" ><span class=\"glyphicon glyphicon-edit\" ></span> </a><a id=\"$id\" href=\"#\" class=\"delete_biochem\"  ><span class=\"glyphicon glyphicon-remove\" ></td>";
		  }
	else{
		echo "<td align=\"center\"><a id=\"$id\" href=\"#\" class=\"delete_biochem\"  ><span class=\"glyphicon glyphicon-remove\" ></span> </a> </td>";
		  }
		  
		//$result_date= $row->biochem_result_date;
		$appointment_id1= $row->appointment_id;
		//$client_id1= $row->client_id;

		$aaa= base_url('admin/help/biochemical_print/'.$appointment_id1.'/'.$biochem_result_date.'');
		 echo "<td><a href=\"#\" onclick=\"window.open('$aaa'); \"><span class=\"glyphicon glyphicon-file\" ></span></a></td>";
       	 }
         echo "</tr></tbody></table></div>";

 ?>


		</div>		 
			</div>	
				</div> 	 
			
   
<?php $this->load->view('admin_footer'); ?>	



