
<?php $this->load->view('admin_header'); ?>	
	
<style>
.list-group{
		font-size: 18px;
	}
	.badge{
		font-size:18px;
		background-color: #d3592c;
	}
 
 

</style>	
<script type="text/javascript">
	
$(document).ready(function() {
	$('.responsive').tabCollapse();
	// initialize tab function
	$('.nav-tabs a').click(function(e) {
		e.preventDefault();
		$(this).tab('show');
	});
	if (location.hash) {
		$('a[href=' + location.hash + ']').tab('show');
	}
	$(document.body).on("click", "a[data-toggle]", function(event) {
		location.hash = this.getAttribute("href");
	});
	$(window).on('popstate', function() {
		var anchor = location.hash || $("a[data-toggle=tab]").first().attr("href");
		$('a[href=' + anchor + ']').tab('show');
	});

});
  
	
</script>
<?php 



?>
<?php $this->load->view('admin_navbar'); ?>	
<div id="graph_dialog" class="col-md-12" style="display:none;">
	<button id="exportButton" type="button">PDF</button>
</div>
<div id="edit_dialog" >
</div>

<div class="row">
	
	<div class="container">
		<div class="col-md-12 column">
		 <h3 class="page-header"> <img  height="75" width="75" src="<?php echo base_url("assets/images/ncs.png"); ?>">NCS Database</h3>
			<div class="tabbable" id="myTab">
				<ul class="nav nav-tabs responsive">
					<li class="active">
						<a href="#a" data-toggle="tab">Profile</a>
					</li>
					<li>
						<a href="#b" data-toggle="tab">Nutrition Assessment	</a>
					</li>
				
					
						<li>
						<a href="#d" data-toggle="tab">Nutrition Recommendation</a>
					</li>		
					<li>
						<a href="#e" data-toggle="tab">Other Recommendations</a>
					</li>
						<li>
						<a href="#f" data-toggle="tab">Summary Page</a>
					</li>
					<li>
						<a href="#g" data-toggle="tab">Patients Records</a>
					</li>
					
					
					
				</ul>
				
				<div class="tab-content responsive">
					<div class="tab-pane active" id="a">
			<hr></hr>
				
			<div class="row clearfix">
		
							
				<div class="col-md-12 column">	

					<div class="col-md-6 column">
						<?php
							foreach ($results1 as $row){
							$id= $row->id;
							$client_id= $row->client_id;
							$appointment_id= $row->appointment_id;
							$name= $row->client_lname.", ".$row->client_fname." ".$row->client_mname;
							$gender= $row->gender;
							$birthday= $row->birthday;
							
							$address=$row->address;
							$contact_number= $row->contact_number;
							$email_address= $row->email_address;	
							$photo = $row->photo;
						
							$approved_date = $row->approved_date;
							$datetime= date("Y-m-d");	
							$a= strtotime($approved_date);	

							$b= strtotime($datetime);
							
							if($photo == NULL){
									$zz= base_url("assets/images/client_photos/no_photo.png");
								echo "<img class=\"img-thumbnail\" src=\"$zz\" alt=\"\" height=\"350\" width=\"350\" />";
						
							}
							else{
									$zz= base_url("assets/images/client_photos/$photo");
					
								echo "<img class=\"img-thumbnail\" src=\"$zz\" height=\"350\" width=\"350\">";
					
							}
					
		echo "<h2>".$name."</h2>";	
		echo "<p>Gender: ". $gender."</p>";
		echo "<p>Birthday: ". date("d F Y",strtotime($birthday))."</p>";
		echo "<p>Age: ". $age_year ."</p>";
		echo "<p>Address: ". $address."</p>";
		echo "<p>Contact Number: ". $contact_number."</p>"; 
		echo "<p>Email Address: ".$email_address. "</p>";
		//echo "<a href=\"client_log.php?client_id=$client_id\" class=\"btn btn-success\">Activity Log <span class=\"glyphicon glyphicon-eye-open\"></span></a>";		

							}
						?>


					</div>



	<div class="col-md-6 ">
					
							 
<div class="panel panel-default">
                        <div class="panel-heading">
                            <h3><i class="fa fa-tachometer fa-fw"></i>  Last Assessment</h3>
							
	
							</div>			
							
							
							
		
		<div class="panel-body">
					 <?php

				foreach ($results2 as $row2) {
//if($numRows2>0){
//$appointment_id = $row2->appointment_id;

$weight= $row2->weight;
$weight_unit= $row2->weight_unit;
$height=$row2->height;
$height_unit=$row2->height_unit;
$bmi= $row2->bmi;
$bmi_class=$row2->bmi_classification;
$dbw=$row2->dbw;
$dbw_unit=$row2->dbw_unit;
$lwr_lmt= $row2->lwr_lmt;
$uppr_lmt=$row2->uppr_lmt;
$waist_c=$row2->waist_c;
$waist_unit=$row2->waist_unit;
$risk_indicator=$row2->risk_indicator;
$hip_c=$row2->hip_c;
$hip_unit=$row2->hip_unit;
$whipr=$row2->whipr;
$whipr_class=$row2->whipr_classification;
$whtr=$row2->whtr;
$whtr_class=$row2->whtr_classification;
$submitted_on=$row2->submitted_on;

			 
		
	//	}
		}				

	
	?>
	<?php if($numRows2>0){?>
	<ul class="list-group">
	
	 <li class="list-group-item ">
    <span id="bmi" class="stats-label badge" ><?php echo $weight." ".$weight_unit; ?> </span>
    <label for="Weight"  class="stats-label">Weight:</label> <?php
	if($numRows2>1){echo "<a id=\"$client_id\" class=\"show_wt_graph\"  href=\"#\"  ><sub>[show graph]</sub></a>";}else{echo "";}?>
  </li>
	
	
  <li class="list-group-item ">
    <span id="bmi" class="stats-label badge" ><?php echo $bmi." "." kg/m<sup>2</sup>"; ?> </span>
    <label for="Body Mass Index"  class="stats-label">BMI:</label>
  </li>
  
 
  
  
  <li class="list-group-item">
   <span id="bmi_class" class="stats-label badge" > <?php echo $bmi_class; ?> </span>
   <label for="BMI Classification"  class="stats-label">BMI Classification:</label> <?php if($numRows2>1){echo "<a id=\"$client_id\" class=\"show_bmi_graph\"  href=\"#\"  ><sub>[show graph]</sub></a>";}else{echo "";}?>
  </li>
  
  
  
  <li class="list-group-item">
   <span id="dbw" class="stats-label badge" > <?php echo $dbw." ".$dbw_unit; ?> </span>
  <label for="DBW" class="stats-label">Desirable Body Weight:</label>
  </li> 
  
  
 
  <li class="list-group-item">
  		 <span id="dbw_hwr" class="stats-label" >Keep weight within this range <strong> <?php  echo $lwr_lmt."-".$uppr_lmt; ?></strong> </span>
				
  </li>
   <li class="list-group-item">
   <span id="wc" class="stats-label badge" > <?php echo $waist_c." ".$waist_unit; ?> </span>
  <label for="Waist Circumference" class="stats-label">Waist Circumference:</label> <?php  if($numRows2>1){echo "<a id=\"$client_id\" class=\"show_wc_graph\"  href=\"#\"  ><sub>[show graph]</sub></a>";}else{echo "";} ?>
  </li> 
  
     <li class="list-group-item">
  		 <span id="risk_indicator" class="stats-label" >Waist circumference may indicate <strong><?php echo $risk_indicator; ?></strong> </span>
				
  </li>
  
  
  <li class="list-group-item">
   <span id="hc" class="stats-label badge" > <?php echo $hip_c." ".$hip_unit; ?> </span>
  <label for="Hip Circumference" class="stats-label">Hip Circumference:</label> <?php  if($numRows2>1){echo "<a id=\"$client_id\" class=\"show_hc_graph\"  href=\"#\"  ><sub>[show graph]</sub></a>";}else{echo "";}?>
  </li> 
 
 
 <li class="list-group-item">
  	  <span id="whipr">Waist-hip ratio is <strong><?php echo $whipr; ?></strong> which may indicate <strong><?php echo $whipr_class;  ?></strong> risk of developing obesity-related diseases.</span>
				
  </li>
  
   <li class="list-group-item">
  	  <span id="whtr"> Waist height ratio is <strong><?php echo $whtr ?></strong> which may indicate <strong><?php echo $whtr_class; ?></strong>. </span>	
				
  </li>
 

  
</ul>	
<?php
	}else{

	echo "<p>No previous record</p>";
	}
	?>
	

</div>
</div>


<?php

//}

/*else{
	//$client_id_encrypt= md5($client_id);
	
echo "<p>".
	"No previous record."
	."</p>";
	
echo "</div></div>";	
}*/





	

   ?>
   
     <div class="btn-group dropup" style="margin-bottom: 10px;">
   <button type="button" class="btn btn-success btn-lg dropdown-toggle" 
         data-toggle="dropdown">
         Update Records <span class="caret"></span>
      </button>
   <ul class="dropdown-menu" role="menu">
      <li><a href="<?php echo base_url('admin/help/anthropometry/'.$id.''); ?>">Anthropometry</a></li>
	   <li class="divider"></li>
      <li><a href="<?php echo base_url('admin/help/biochemical/'.$id.''); ?>">Biochemical</a></li>
	   <li class="divider"></li>
      <li><a href="<?php echo base_url('admin/help/clinical/'.$id.''); ?>">Clinical</a></li>
	   <li class="divider"></li>
      <li><a href="<?php echo base_url('admin/help/diagnosis/'.$id.''); ?>">Diagnosis</a></li> 
	   <li class="divider"></li>
	  <li><a href="<?php echo base_url('admin/help/nutrition_plan/'.$id.''); ?>">Nutrition Plan</a></li>
      <!--<li class="divider"></li>
      <li><a href="#">Separated link</a></li>-->
   </ul>
</div>
   
   
 
  <div class="btn-group dropup" style="margin-bottom: 10px;">
  
    <?php
   /*$previous_records = $mysqli->query("SELECT ncs_requests_db.client_id,ncs_requests_db.id,rnd_sched_db.approved_date FROM users_account_db INNER JOIN ncs_requests_db ON ncs_requests_db.client_id=users_account_db.id INNER JOIN rnd_sched_db ON ncs_requests_db.id=rnd_sched_db.appointment_id WHERE users_account_db.id='$client_id'");  
   echo "<select data-client_id=\"$client_id\" data-appointment_id=\"$appointment_id\" name=\"searchrecord\" id=\"searchrecord\" class=\"form-control input-lg\">";
  echo " <option value=\"0\">--Previous Records--</option>";
  while($searchrow = $previous_records->fetch_object()){
 	$client_id= $searchrow->client_id;
 	$appointment_id2= $searchrow->id;
	
 $approved_date=  date("d-M-y", strtotime($searchrow->approved_date));
	
	
	echo "<option  value=\"$appointment_id2\">".$approved_date."</option>";
	
	
  }
  echo "</select>";*/
  
  
   
    ?>
  
   
   
	
	
  
</div>

				</div>





				</div>

			</div>
					</div>
					<div class="tab-pane" id="b">
				<hr></hr>		
		
		

			<div class="row" >
      <div class="col-xs-6 col-md-3" >
      
         <div class=" thumbnail">
		 	
		<h4 align="center" class="modal-header">Anthropometry</h4>
		<div class="img">
	
	<a  href="<?php echo base_url('admin/help/anthropometry/'.$id.''); ?>"  >
	
	<img src="<?php echo base_url("assets/images/anthrop_img.png"); ?>" alt="Anthropometry" height="150" width="150"  class="img-thumbnail" /> </a>	
		
	</div>
		<hr></hr>

		 </div>
		 
      
      </div>
      <div class="col-xs-6 col-md-3">
	   <div class=" thumbnail">
      	<h4 align="center" class="modal-header">Biochemical</h4>
		<div class="img">
		<a  href="<?php echo base_url('admin/help/biochemical/'.$id.''); ?>"  >
				<img src="<?php echo base_url("assets/images/biochem_img.png"); ?>"  alt="Biochemical"  class="img-thumbnail" height="150" width="150"  /></a>
				</div>
				<hr></hr>
			
					
					</div>
			
      </div>
      <div class="col-xs-6 col-md-3">
        <div class="thumbnail">
      	<h4 align="center" class="modal-header">
						Clinical
				
					</h4>
					
					<div class="img">
		<a  href="<?php echo base_url('admin/help/clinical/'.$id.''); ?>"  >	
		<img src="<?php echo base_url("assets/images/clinical_img.png"); ?>"  alt="Clinical"  class="img-thumbnail" height="150" width="150"  /></a>
		</div>
				<hr></hr>
					

					
					
					
					</div>
      </div>
	  

	  
      <div class="col-xs-6 col-md-3">
       <div class=" thumbnail">
      	<h4 align="center" class="modal-header">
					Diagnosis
					</h4>
				<div class="img">
		<a  href="<?php echo base_url('admin/help/diagnosis/'.$id.''); ?>"  >		
					
					<img src="<?php echo base_url("assets/images/diagnosis_img.png"); ?>"  alt="Diagnosis" height="150" width="150"   class="img-thumbnail" /></a>
					</div>
				<hr></hr>
					
			
					
					
					</div>
      </div>
	  
	  


 </div>	


	</div>
		
	 
	 	
	<div class="tab-pane " id="d" >
						
	<hr></hr>

		<div class="row"   >
   <div class="col-xs-8 col-md-4"  >
   </div>
      <div class="col-xs-8 col-md-3" >
	   <div class=" thumbnail"   >
      	<h4 align="center" class="modal-header">Nutrition Plan</h4>
		
			<div class="img">
		<a  href="<?php echo base_url('admin/help/nutrition_plan/'.$id.''); ?>"  >
					<img src="<?php echo base_url("assets/images/meal_plan_img.png"); ?>"  alt="Custom Plan"  class="img-thumbnail"  height="150" width="150"  /></a>
					</div>
				<hr></hr>
					</div>
			
      </div>


 </div>		

		

				
		
					</div>
	 
	 	<div class="tab-pane" id="e" >		
	<hr></hr>
		<div id="alert"></div>
		<div id="recommendation_result">
	<?php 
	echo "<div class=\"col-md-12\" >";
	
 

 
if($numRows3==0  && $b <= $a){
	
		echo "<button id=\"new_recommendation\" class=\"btn btn-success \"><span class=\"glyphicon glyphicon-plus\" ></span> New Recommendation</button><br><br><br>";
		}
		


	foreach($results3 as $row3){

		$recommendation2= $row3->recommendation;


	}

	
		echo "	<div class=\"form-group\"><label class=\"control-label\">Recommendations:</label>
		 </div>";

				//$data = str_replace("\n", "<br/>", $recommendation2);
				//$string = "This\nis\na\nstring";
//echo nl2br($string);

		$default_recommendation= "2012 Nutritional Guidelines for Filipinos
1.	Eat a variety of foods everyday to get the nutrients needed by  the body.
2.	Breastfeed infants exclusively from birth up to six months then give appropriate complementary foods while continuing  breastfeeding for 2 years and beyond for optimum  growth and development.
3.	Eat more vegetables  and fruits everyday  to get the essential vitamins, minerals and fiber for regulation of body processes.
4.	Consume fish, lean meat, poultry, egg, dried beans, or nuts daily for growth and repair of body tissues.
5.	Consume  milk, milk products and other calcium-rich foods, such as small fish and shellfish everyday for healthy bones and teeth.
6.	Consume safe foods and water to prevent diarrhea  and other food- and water-borne diseases.
7.	Used iodized salt  to prevent Iodine Deficiency Disorders.
8.	Limit intake of salty, fried, fatty and sugar-rich foods to prevent cardiovascular diseases.
9.	Attain normal body weight  through proper diet and moderate physical activity to maintain good health and help prevent obesity.
10.	Be physically active, make healthy food choices , manage stress, avoid alcoholic beverages and do not smoke to help prevent lifestyle-related non-communicable diseases.
";
		
		
		echo "<div align=\"justify\" style=\"margin-bottom:20px;\"><pre>".$default_recommendation."</pre></div>";


if($numRows3>0){

	echo "	<div class=\"form-group\"><label class=\"control-label\">Other Recommendations:</label>
		 </div>";
		echo "<div align=\"justify\" style=\"margin-bottom:20px;\"><pre>".nl2br($recommendation2)."</pre></div>";
		

	
	if($numRows3>0 && $b <= $a){
				echo "<div class=\"form-group form-inline\" ><button id=\"$appointment_id\" class=\"btn btn-success edit_recommendation\"> Update</button>&nbsp;<a href=\"#\" id=\"$appointment_id\" class=\"btn btn-danger delete_recommendation\" > Delete</a> </div>";
		}
			}else{
					echo "	<div class=\"form-group\"><label class=\"control-label\">Other Recommendations:</label>
		 </div>";
				
		echo "<div align=\"justify\" style=\"margin-bottom:20px;\"><pre>".'none'."</pre></div>";
			}
				
	echo "</div>";
	
	?>
	</div>
		
		
		
		
		<div id="recommendation_form" style="margin-bottom: 20px; display: none;" >
		 <div class="form-group">
		 	
			
		<label class="control-label">Other Recommendations:</label>
		 </div>
		 
		<div class="form-group">
			<textarea id="recommendation" name="recommendation" class="form-control input-lg"></textarea>
		</div>
		
		<div class="form-group">
			<button id="save_recommendation" name="save_recommendation" class="btn btn-success " data-client_id="<?php  echo $client_id;?>" data-appointment_id="<?php echo $appointment_id;?>" > Submit</button>
			
		</div>
			</div>
			
			

		
					
						</div>
	 
	 <div class="tab-pane " id="f" >
						
						
		<hr></hr>
		

	<div class="row"   >
   <div class="col-xs-8 col-md-4"  >
   </div>
      <div class="col-xs-8 col-md-3" >
	   <div class=" thumbnail"   >
      	<h4 align="center" class="modal-header">Summary</h4>
		
			<div class="img">
			
			<?php 
			$zzz= base_url('admin/help/summary_print/'.$appointment_id.'');
			$xx= base_url('assets/images/pdf_download.png');	
		if($numRows4>0){
					
		echo "<a  href=\"#\" onclick=\"window.open('$zzz')\"  ><img src=\"$xx\")\"  alt=\"PDF Download\"  class=\"img-thumbnail\"  height=\"150\" width=\"150\"  /></a>";
		}
		else{
			echo "<a  href=\"#\"  ><img src=\"$xx\"  alt=\"PDF Download\"  class=\"img-thumbnail\"  height=\"150\" width=\"150\"  /></a>";
		}
			?>

					</div>
				<hr></hr>
					</div>
			
      </div>


 </div>			
		
			
    

					</div>
	 <div class="tab-pane " id="g" >
	 <hr></hr>







<?php 

echo "<div class=\"table-responsive\">";
		echo "<table id=\"requests\" class=\"table table-bordered table-hover table-striped\"   >";
		echo "<thead><tr>";
//		//echo "<th>Status</th>";
		echo "<th>Last Appointment</th>";
		echo "<th>Assigned RND</th>";
		echo "<th>Records</th>";

	
		echo "</tr></thead><tbody>";

		foreach($results5 as $row){
		//$client_id= $row->client_id;
		$datetime= date("Y-m-d");
		$id = $row->id;
		$name= $row->client_lname.", ".$row->client_fname." ".$row->client_mname;
		$stat_id= $row->status_id;	
		$status= $row->status;
		$approved_date= date("l jS F Y",strtotime($row->approved_date));
		$approved_time= date("h:i A",strtotime($row->approved_time_from));
		$whole_day=$row->whole_day;
		$rnd_id= $row->assigned_rnd_id;
		$assigned_rnd= $row->rnd_lname." ".$row->rnd_fname." ".$row->rnd_mname;		
		echo "<tr>";	
	
				if($whole_day == 1){
						echo "<td>".$approved_date." - whole day"."</td>";	
					}
					else{
						echo "<td>".$approved_date." ".$approved_time."</td>";	
					}
				echo "<td>".$assigned_rnd."</td>";
				if($id != NULL){
					$xxx= base_url('admin/help/summary_print/'.$id.'');
				}else{
					$xxx= "#";
				}
				$xxx= base_url('admin/help/summary_print/'.$id.'');
				echo "<td><a href=\"$xxx\"><span class=\"glyphicon glyphicon-file\"></span></a></td>";

	}

	echo "</tr></tbody></table></div></div></div>";



?>
</div>

	 
	 
	 
     </div>
    
					
				
					</div>
						</div>
							</div>
								
										

				</div>			
			
	
 


<?php $this->load->view('admin_footer'); ?>	

