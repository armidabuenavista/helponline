<?php $this->load->view('admin_header'); ?>	






<?php include('admin_navbar.php'); ?>

		

<div class="container" >  
<div class="col-md-12" >
	 <h3 class="page-header"> <img  height="75" width="75" src="<?php echo base_url("assets/images/ncs.png"); ?>">Diagnosis</h3>
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



<div id="diagnosis_div"  class="col-md-12" style="display: none;">

			
	<hr></hr>
		<div id="alert"></div>
						


			
		<div class="table-responsive">	
<table class="table table-condensed" >
                                        
       
		 
		     <tr>
		 <th>Diagnosis Result</th>
		 <th>Etiology</th>
		 <th>Signs and Symptoms</th>
		  <th>Remarks </th>

		 </tr>

<tr>
		<td   >	 	
	
		
		
		  <textarea  class="form-control  input-lg" name="diagnosis" placeholder="Enter Diagnosis" id="diagnosis" cols="30"></textarea>
	  
		</td>
		<td > 		
		
		  <textarea  class="form-control  input-lg" name="etiology" placeholder="Enter Etiology" id="etiology" cols="30"></textarea>
	  
		
		
		</td>
		
		<td > 
		  <textarea  class="form-control  input-lg" name="ss_diagnosis" placeholder="Enter Signs and Symptoms" id="ss_diagnosis" cols="30"></textarea>		
		
		</td>
		
		<td > 		
		
		  <textarea   class="form-control  input-lg" name="remarks" placeholder="Enter Remarks" id="remarks" cols="30"></textarea>
		  
		
		</td>
		
		

		
	</tr>
</table></div>	
		
	<hr></hr>
			<div align="center">
		<button type="button" id="save_diagnosis" class="btn btn-success btn-lg" data-client_id="<?php echo $client_id; ?>" data-appointment_id="<?php echo $appointment_id; ?>" > Add  </button>			
		</div>
	
		
</div>

	
	
<div id="edit_diagnosis"  style="display: none;">
</div>


<div class="col-md-12" align="right">
<?php if($b <= $a){ ?>
	 <button id="add_diagnosis" class="btn btn-success btn-lg" ><span class="glyphicon glyphicon-plus" ></span> Add</button>	
	<?php }
	else{
		echo "";
	}?>
	<br>
	<br>
</div>

	
<div  class="col-md-12">


<?php


	    $datetime1= date("Y-m-d");
	      echo "<div class=\"table-responsive\"><table border=\"1\" class=\"table table-condensed diagnosis\" id=\"diagnosis_table\" >";
                                        
         // set table headers
		 
		 echo "<thead><tr>
		<th>Diagnosis Result</th>
		<th>Etiology</th>
		<th>Signs and Symptoms</th>
		<th>Remarks </th>
		<th>Date Submitted</th>
		<th> </th>
		<th> Pdf</th>
		</tr></thead><tbody>";	
	 
	
            // $i = 1;
         foreach($results2 as $row) {
          $datesubmit= date("Y-m-d",strtotime($row->submitted_on)); 
				 
	
         echo "<tr>";
         echo "<td>" .$row->diagnosis. "</td>";
   		 echo "<td >" .$row->etiology."</td>";
		   
      
    	echo "<td >".$row->ss_diagnosis."</td>";
		   
		echo "<td >".$row->diagnosis_remarks."</td>";
		echo "<td>" .date("l jS \of F g:i A",strtotime($row->submitted_on)). "</td>";
		$id= $row->id;
		if($datetime1 == $datesubmit){
		echo "<td align=\"center\" ><a id=\"$id\" href=\"#\" class=\"edit_diagnosis\"  ><span class=\"glyphicon glyphicon-edit\" ></span></a><a id=\"$id\" href=\"#\" class=\"delete_diagnosis\"  ><span class=\"glyphicon glyphicon-remove\" ></span></a></td>";
		  }
		else{
		echo "<td  align=\"center\"><a id=\"$id\" href=\"#\" class=\"delete_diagnosis\"  ><span class=\"glyphicon glyphicon-remove\" ></span></a></td>";
			
		  }
	
		 $client_id1= $row->client_id;
		 $appointment_id1= $row->appointment_id;

		 $aaa= base_url('admin/help/diagnosis_print/'.$client_id1.'/'.$appointment_id1.'');
		 echo "<td><a href=\"#\" onclick=\"window.open('$aaa');\"><span class=\"glyphicon glyphicon-file\"></span></span></a></td>";
           
	}
                                        
         echo  "</tr></tbody></table></div>";
		 
		 
		 
		 
		 
		 
			
	
	

 ?>



	 </div>
	 	</div>	
   
<?php $this->load->view('admin_footer'); ?>	



