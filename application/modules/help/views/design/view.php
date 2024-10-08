<style>
.ui-dialog .ui-dialog-title {
  color:#000000;
font-family:"Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
}
p{
 font-family:"Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
}
.table-condensed{
	 font-family:"Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
}
.table-striped {
    font-family:"Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
	border: 1px solid #ddd;
	font-size: 12px;
}
li.ms-select-all{
	padding: 0px 15px 0px 10px;
}
.line{
	border-bottom: 2px solid #ff3333;
}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default,.ui-dialog .ui-dialog-content {
    font-family: "Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
    background: #FFFFFF;
}
.ui-widget-content a {
    color: #dd4814;
}
/*.ui-menu .ui-menu-item a:focus {
}*/
.ui-widget input, .ui-widget select, .ui-widget textarea, .ui-widget button {
font-family: "Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
}
.ui-state-focus {
background: none !important;
background-color: #dd4814 !important;
color:#ffffff !important;
border: none !important;}
/*.ui-widget-content a:hover {
    background-color: #dd4814;
}*/
.ui-slider .ui-slider-handle {
	border: 1px solid #6d6963;
}
.ui-widget-header {
     border: 0px solid #aaaaaa;
     background: #FFFFFF;
    color: #222222;
    font-weight: normal;
}
.ui-dialog-content {
    font-family: "Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
    /* border: 1px solid #dad8d6; */
    background: #FFFFFF;
}


	</style>

<div id="body_stats_dialog" style="display: none;">
</div>

      <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="fluid-container">




<!-- Begin Body -->
<div class="container" style="margin-top: 20px;">


      		<div class="col-md-9">
              <div class="row">
			  	<?php
				if($numRows>0){


				?>



<div class="col-md-12">
	<h3 class="page-header">Healthy Eating and Lifestyle Program (HELP) Tracker <sub>Beta</sub></h3>

	<p>The HELP Tracker is carefully designed to assist you in keeping track of your progress towards that healthy and fit body you've been aspiring for. Its three dedicated tracking features will help you in recording your anthropometric ("body") measurements, food intake and physical activity on a weekly or daily basis. Aside from that, the HELP Tracker calculates your daily energy and nutrient requirements to guide you on how much and what type of food you can eat and what kind of physical activities you can do. </p>
	<hr>
</div>
	<div class="col-md-5">
				<div  tabindex="1" style=" text-align: center; vertical-align: middle;">
				<?php

				foreach($results as $row){
					$id= $row->id;
					$bmr= $row->bmr;
					$bmi= $row->bmi;
					$wt= $row->weight;
					$wt_unit= $row->weight_unit;
					$ht= $row->height;
					$ht_unit= $row->height_unit;
					$bmi_class= $row->bmi_classification;
					$waist_c= $row->waist_c;
					$waist_unit= $row->waist_unit;
					$hip_c= $row->hip_c;
					$hip_unit = $row->hip_unit;
					$risk_indicator= $row->risk_indicator;
					$dbw= $row->dbw;
					$lwr_lmt= $row->lwr_lmt;
					$uppr_lmt= $row->uppr_lmt;
					$whipr= $row->whipr;
					$whipr_class= $row->whipr_classification;
					$whtr= $row->whtr;
					$whtr_class= $row->whtr_classification;
					$cho= $row->cho;
					$protein= $row->protein;
					$fat= $row->fat;
					$cal= $row->cal;
					$pregnant= $row->pregnant;
					if($pregnant == 1){
						$pregnant= "Yes";
					}else{
						$pregnant = "No";
					}
					$gestational_weeks= $row->gestational_weeks;
					$submitted_on= $row->submitted_on;
					$datetime= date("Y-m-d");
					$c= strtotime($submitted_on);
					$b= strtotime($datetime);





						if($age_year >=0 && $age_year <= 2){
	if($gender == 1){

		if($bmi_class == 'SEVERE THINNESS'){
				$a= base_url("assets/images/fast/02-2-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";


		}else if($bmi_class == 'UNDERWEIGHT'){
				$a= base_url("assets/images/fast/02-2-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";

		}else if($bmi_class == 'NORMAL'){
				$a= base_url("assets/images/fast/02-3-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";

		}
		else if($bmi_class == 'OVERWEIGHT'){
				$a= base_url("assets/images/fast/02-4-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";



		}else if($bmi_class == 'OBESE'){
				$a= base_url("assets/images/fast/02-4-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";


		}


}else{


	if($bmi_class == 'SEVERE THINNESS'){
			$a= base_url("assets/images/fast/02-4-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";


		}else if($bmi_class == 'UNDERWEIGHT'){
				$a= base_url("assets/images/fast/02-2-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";

		}else if($bmi_class == 'NORMAL'){
				$a= base_url("assets/images/fast/02-3-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";

		}
		else if($bmi_class == 'OVERWEIGHT'){
				$a= base_url("assets/images/fast/02-4-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";



		}else if($bmi_class == 'OBESE'){
			$a= base_url("assets/images/fast/02-4-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";


		}



}




}else if($age_year >=3 && $age_year <= 12){
		if($gender == 1){

	if($bmi_class == 'SEVERE THINNESS'){
		$a= base_url("assets/images/fast/312-2-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";


		}else if($bmi_class == 'UNDERWEIGHT'){
			$a= base_url("assets/images/fast/312-2-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";

		}else if($bmi_class == 'NORMAL'){
			$a= base_url("assets/images/fast/312-3-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";

		}
		else if($bmi_class == 'OVERWEIGHT'){
			$a= base_url("assets/images/fast/312-4-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";



		}else if($bmi_class == 'OBESE'){
			$a= base_url("assets/images/fast/312-4-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";


		}

}else{


	if($bmi_class == 'SEVERE THINNESS'){
		$a= base_url("assets/images/fast/312-2-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";


		}else if($bmi_class == 'UNDERWEIGHT'){
			$a= base_url("assets/images/fast/312-2-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";

		}else if($bmi_class == 'NORMAL'){
			$a= base_url("assets/images/fast/312-3-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";

		}
		else if($bmi_class == 'OVERWEIGHT'){
			$a= base_url("assets/images/fast/312-4-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";



		}else if($bmi_class == 'OBESE'){
				$a= base_url("assets/images/fast/312-4-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";


		}


}




}else if($age_year >=13 && $age_year <= 18){

	if($gender == 1){

	if($bmi_class == 'SEVERE THINNESS'){
			$a= base_url("assets/images/fast/1318-2-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";


		}else if($bmi_class == 'UNDERWEIGHT'){
				$a= base_url("assets/images/fast/1318-2-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";

		}else if($bmi_class == 'NORMAL'){
				$a= base_url("assets/images/fast/1318-3-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";

		}
		else if($bmi_class == 'OVERWEIGHT'){
				$a= base_url("assets/images/fast/1318-4-1.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";



		}else if($bmi_class == 'OBESE'){
			$a= base_url("assets/images/fast/1318-4-1.png");

			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";


		}

}else{


	if($bmi_class == 'SEVERE THINNESS'){
		$a= base_url("assets/images/fast/1318-2-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";


		}else if($bmi_class == 'UNDERWEIGHT'){
			$a= base_url("assets/images/fast/1318-2-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";

		}else if($bmi_class == 'NORMAL'){
			$a= base_url("assets/images/fast/1318-3-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";

		}
		else if($bmi_class == 'OVERWEIGHT'){
			$a= base_url("assets/images/fast/1318-4-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";



		}else if($bmi_class == 'OBESE'){
			$a= base_url("assets/images/fast/1318-4-2.png");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"400\"  />";


		}



}




}else{
	if($gender == 1){


		if($bmi_class == 'SEVERE THINNESS'){
			$a= base_url("assets/images/fast/bmi_male-1.svg");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"600\"  />";


		}else if($bmi_class == 'UNDERWEIGHT'){
			$a= base_url("assets/images/fast/bmi_male-1.svg");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"600\"  />";

		}else if($bmi_class == 'NORMAL'){
			$a= base_url("assets/images/fast/bmi_male-3.svg");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"600\"  />";

		}
		else if($bmi_class == 'OVERWEIGHT'){
			$a= base_url("assets/images/fast/bmi_male-5.svg");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"600\"  />";



		}else if($bmi_class == 'OBESE'){
			$a= base_url("assets/images/fast/bmi_male-7.svg");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"600\"  />";


		}






	}else{


		if($bmi_class == 'SEVERE THINNESS'){
			$a= base_url("assets/images/fast/bmi_female-1.svg");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"600\"  />";


		}else if($bmi_class == 'UNDERWEIGHT'){
			$a= base_url("assets/images/fast/bmi_female-1.svg");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"600\"  />";

		}else if($bmi_class == 'NORMAL'){
			$a= base_url("assets/images/fast/bmi_female-3.svg");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"600\"  />";

		}
		else if($bmi_class == 'OVERWEIGHT'){
			$a= base_url("assets/images/fast/bmi_female-5.svg");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"600\"  />";



		}else if($bmi_class == 'OBESE'){
			$a= base_url("assets/images/fast/bmi_female-7.svg");
			echo "<img src=\"$a\" alt=\"BMI Image\"  height=\"600\"  />";


		}


	}







}










				?>






				</div>
				</div>

				<div class="col-md-6">

				<div >
			<h3>Body Statistics</h3>
					<hr class="colorgraph">

		<ul class="list-group">

		  <li class="list-group-item list-group-item ">
    <span id="weight" class="stats-label badge" ><?php echo $pregnant; ?> </span>
    <label for="Pregnant"  class="stats-label">Pregnant:</label>
  </li>

    <li class="list-group-item list-group-item ">
    <span id="gestational_weeks" class="stats-label badge" ><?php echo $gestational_weeks; ?> </span>
    <label for="Gestational_weeks"  class="stats-label">Gestational Weeks:</label>
  </li>

		  <li class="list-group-item list-group-item ">
    <span id="weight" class="stats-label badge" ><?php echo $wt." ".$wt_unit; ?> </span>
    <label for="Weight"  class="stats-label">Weight:</label>
  </li>
		  <li class="list-group-item list-group-item ">
    <span id="height" class="stats-label badge" ><?php echo $ht." ".$ht_unit; ?> </span>
    <label for="Height"  class="stats-label">Height:</label>
  </li>
  <li class="list-group-item list-group-item  ">
    <span  class="stats-label badge" ><?php echo $bmi; ?> kg/ m<sup>2</sup> </span>
    <label for="Body Mass Index"  class="stats-label">BMI:</label>
  </li>

    <li class="list-group-item">
   <span  class="stats-label badge" > <?php echo $bmi_class; ?> </span>
   <label for="BMI Classification"  class="stats-label">BMI Classification:</label>
  </li>
    <li class="list-group-item">
   <span  class="stats-label badge" > <?php echo $dbw; ?> kgs </span>
  <label for="DBW" class="stats-label">Desirable Body Weight:</label>
  </li>


  <li class="list-group-item list-group-item ">
    <span  class="stats-label badge" ><?php echo $bmr; ?>  </span>
    <label for="Basal Metabollic Rate" class="stats-label">Basal Metabollic Rate:</label>
  </li>










  <li class="list-group-item">
  		 <span  class="stats-label" >Keep weight within this range <strong> <?php  echo $lwr_lmt."-".$uppr_lmt; ?></strong> </span>

  </li>



</ul>





				 	</div>


					<div  >


				 <ul class="list-group">

			<li class="list-group-item list-group-item ">
     <span  class="stats-label badge" ><?php echo $waist_c." ".$hip_unit; ?> </span>
   <label for="Waist Circumference"  class="stats-label">Waist Circumference:</label>
  </li>

  <li class="list-group-item list-group-item ">
     <span  class="stats-label badge" ><?php echo $hip_c." ".$hip_unit; ?> </span>
   <label for="Hip Circumference"  class="stats-label">Hip Circumference:</label>
  </li>

  	 <li class="list-group-item ">
     <span  class="stats-label badge" data-whipr=""><?php echo $whipr; ?> </span>
    <label for="Waist hip ratio"  class="stats-label">Waist Hip Ratio:</label>
  </li>
<li class="list-group-item list-group-item ">
     <span class="stats-label badge" ><?php echo $risk_indicator; ?> </span>
   <label for="Risk indicator"  class="stats-label">Risk Indicator:</label>
  </li>




  <li class="list-group-item ">
      <span  class="stats-label badge" ><?php echo $whipr_class; ?> </span>


	 <label for="Waist hip ratio classification"  class="stats-label">Waist-hip ratio Classification:</label>

  </li>


    <li class="list-group-item ">
      <span  class="stats-label badge"><?php echo $whtr; ?> </span>

	<label for="Waist height ratio"  class="stats-label">Waist Height Ratio:</label>

  </li>



     <li class="list-group-item ">
       <span  class="stats-label badge" ><?php echo $whtr_class; ?> </span>

	 <label for="Waist height ration classification"  class="stats-label">Waist-height ratio Classification:</label>

  </li>


  </ul>





				  </div>
              	</div>


<div class="col-md-12">

					<hr class="colorgraph">
					<div  tabindex="1"  >

<label class="tip"  for="Carbohyrates">Carbohydrates: </label>
 <span   ><?php echo $cho; ?> grams</span>


<div class="progress progress-striped">
   <div class="progress-bar progress-bar-success active" id="cho_meter1" role="progressbar"  style="width:65%" >
      <span  >65%</span>
   </div>
</div>





 <label class="tip" for="Protein">Protein:</label>
 <span  ><?php echo $protein; ?> grams</span>





<div class="progress progress-striped">
   <div class="progress-bar progress-bar-warning active"  id="pro_meter1" role="progressbar" style="width:15%">
      <span  >15%</span>
   </div>
</div>




<label class="tip"  for="fat"  > Fat:</label>
 <span  ><?php echo $fat; ?> grams</span>

 <div class="form-group form-inline ">



 <div class="progress progress-striped">
   <div class="progress-bar progress-bar-danger active" id="fat_meter1" role="progressbar" style="width:20%">
      <span >20%</span>
   </div>
</div>


 <label class="tip"  for="cal"  >Calorie: </label>
 <span  ><?php echo $cal; ?> grams</span>




 <div class="progress progress-striped">
  <div class="progress-bar progress-bar-info active" id="cal_meter1" role="progressbar" style="width:40%">
    <span  ><?php echo $cal; ?> kcal</span>
  </div>

</div>






</div>
</div>

<?php

			if($b>$c){
					//$x= base_url('help/add_body_statistics');
					echo "<div class=\"form-group\">";
			echo "<a href=\"#\" class=\"btn btn-danger add_body_stats btn-lg\"><span class=\"glyphicon glyphicon-plus\"></span> Add</a>";
			echo "</div>";



				} else {
					$a= base_url('help/edit_body_statistics/'.$id.'');
				echo "<div class=\"form-group form-inline\">
		<a href=\"#\" id=\"$id\" class=\"btn btn-success btn-lg edit_body_stats\">Edit</a>
		<button id=\"$id\" class=\"btn btn-danger btn-lg delete_body_stats\"  name=\"delete_body_stats\" >Delete</button>

                </div><br>";

				}

				?>








				</div>




<?php
}
}else{

		/*if($gender == 2){
				echo "<img src=\"../assets/images/fast/bmi_female-1.svg\" alt=\"BMI Image\"  height=\"550\" width=\"350\" />";
			}
			else{
				echo "<img src=\"../assets/images/fast/bmi_male-1.svg\" alt=\"BMI Image\"  height=\"550\" width=\"350\" />";
			}*/
			echo "<hr></hr>";
			echo "<div class=\"alert alert-danger\"> No available body statistics. </div>";
				//$x= base_url('help/add_body_statistics');
			echo "<div class=\"form-group\">";
			echo "<a href=\"#\"  class=\"btn btn-danger add_body_stats btn-lg\"><span class=\"glyphicon glyphicon-plus\"></span> Add</a>";
			echo "</div><br>";







}


?>

			  </div>

      		<div id="alert1" tabindex="1"></div>

<hr>


 	<div class="panel panel-default">
 		<div class="panel-heading"><h4>Previous Statistics</h4></div>
  			<div class="panel-body">
  			<div class="table-responsive" >

  			<?php
  			echo "<table id=\"body_stats_records\" class=\"table table-bordered table-hover table-striped\" border=\"1\" >";
  			echo "<thead><tr>";
  			echo "<th width=\"100\"> Your Records</th>";
  			echo "<th width=\"80\"> View</th>";
  			echo "</tr></thead><tbody>";

  			foreach ($results1 as $row1) {

  				$submitted_on = date("l jS F Y",strtotime($row1->a));
  				$id = $row1->b;
  				echo "<tr>";
					echo "<td >".$submitted_on."</td>";
					echo "<td><a href=\"#\" id=\"$id\" class=\"view_previous\"><span class=\"glyphicon glyphicon-eye-open\"></span></a></td>";
				echo "</tr>";

  			}


			echo "<tbody></table>";

  			?>






			</div>

  			</div>




  	</div>

</div>
                </div>





    </section>