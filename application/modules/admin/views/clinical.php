<?php $this->load->view('admin_header'); ?>	






<?php include('admin_navbar.php'); ?>

		

<div class="container" >  
<div class="col-md-12" >
	 <h3 class="page-header"> <img  height="75" width="75" src="<?php echo base_url("assets/images/ncs.png"); ?>">Clinical</h3>
		

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


			




<div id="clinical"  class="col-md-12" style="display: none;">

	<hr></hr>
	<div id="alert"></div>
					


	<div class="table-responsive">	
<table  align="center" class="table table-condensed">
	<tr>
 		<th>Clinical Paramater</th>
	
		<th>Observation</th>
		<th>Remarks</th>
		
	
	</tr>
	<tr>
	<td >	 	


	
	
	<textarea  class="form-control input-lg" name="clinical_param" placeholder="Enter Clinical Parameter" id="clinical_param" cols="30"></textarea>
		</td>
	

		<td > 		

			  
	<textarea class="form-control input-lg" name="obsrv"  placeholder="Enter Observation" id="obsrv" cols="30"></textarea>
		 	
		
		</td>
		
		<td > 		
			<textarea class="form-control input-lg" name="remarks"  placeholder="Enter Remarks" id="remarks"  cols="30"></textarea>
		
		</td>
			</tr>
</table>
</div>	
<hr></hr>
		<div align="center">
	
		<button type="button" id="save_clinical" class="btn btn-success btn-lg" data-client_id="<?php echo $client_id; ?>" data-appointment_id="<?php echo $appointment_id; ?>"> Add  </button>			
		
		</div>


</div>

<div id="edit_clinical" style="display: none;">
</div>

<div class="col-md-12" align="right"  style="margin-bottom: 20px;">

	 <?php if($b <= $a){ ?>
	 <button id="add_clinical" class="btn btn-success btn-lg" ><span class="glyphicon glyphicon-plus" ></span> Add</button>	
	<?php }
	else{
		echo "";
	}?>
	
</div>


	
<div class="col-md-12 ">


<?php


$datetime1= date("Y-m-d");

	
        echo "<div class=\"table-responsive\"><table id=\"clinical_table\" border=\"1\" class=\"table table-condensed clinical\" >";
                                        
       // set table headers
      echo "<thead><tr>
		<th>Clinical Paramater</th>
		
		<th>Observation</th>
		<th>Remarks</th>
		<th>Date Submitted</th>
		 <th> </th>
		 <th>Pdf </th>
		 
		 </tr></thead><tbody>";
	 
	   
	  
	    // $i = 1;
       foreach ($results2 as $row) {
   
		
          $datesubmit= date("Y-m-d",strtotime($row->submitted_on)); 
				 
		
         echo "<tr>";
		 
		 echo "<td >" .$row->clinical_parameter. "</td>";
		 
        // echo "<td  >". $row->blood_pressure. "</td>";
   
   		 echo "<td>" .$row->observation."</td>";
		 echo "<td>".$row->clinical_remarks."</td>";
        
		  
		 echo "<td>".date("l jS \of F Y g:i A",strtotime($row->submitted_on)). "</td>";
		  $id= $row->id;
		  if($datetime1 == $datesubmit){
		  	 echo "<td align=\"center\"><a id=\"$id\" href=\"#\" class=\"edit_clinical\" ><span class=\"glyphicon glyphicon-edit\" ></span></a><a id=\"$id\" href=\"#\" class=\"delete_clinical\"  ><span class=\"glyphicon glyphicon-remove\" ></span></a></td>";
		  }
		  else{
		  	 echo "<td align=\"center\"><a id=\"$id\" href=\"#\" class=\"delete_clinical\"  ><span class=\"glyphicon glyphicon-remove\" ></span></a></td>";
		  }
		  $client_id1= $row->client_id;
		  $appointment_id1= $row->appointment_id;
		  $aaa= base_url('admin/help/clinical_print/'.$client_id1.'/'.$appointment_id1.'');
		 echo "<td><a href=\"#\" onclick=\"window.open('$aaa'); \"><span class=\"glyphicon glyphicon-file\"></span></span></a></td>";
       	   
        
		 
		 }
		 
		  echo  "</tr></tbody></table></div>";                


 ?>



	 </div>
		 </div>
   
<?php $this->load->view('admin_footer'); ?>	



