<?php 
session_start();
require_once('../include/connection.php');
$datetime= date("Y-m-d");
if(!isset($_SESSION['username']) || !isset($_SESSION['uid']) || $_SESSION['user_type'] != 3) {
	header('Location:../logout.php');
}
$uid= $_SESSION['uid'];
$info_array = client_info();
list($id,$name,$address,$gender_id,$gender,$birthday,$contact_number,$email_address,$username,$age,$photo) = client_info();


$body_stats_db= $mysqli->query("SELECT * FROM body_stats_db  WHERE client_id ='$uid' ORDER BY body_stats_db.submitted_on DESC") ; 
$row= $body_stats_db->fetch_object();


$wt_unit= $row->weight_unit;
$bmr= $row->bmr;
$bmi= $row->bmi;
$bmi_class= $row->bmi_classification;
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
$submitted_on= $row->submitted_on;

$numrows= $body_stats_db->num_rows;

if($numrows==0){
	header('Location: add_body_statistics.php');
	
}
else{
	echo "";
}

if($wt_unit == 'lbs'){
$wt= round(($row->weight / 2.2)*100)/100;
	
}
else{
$wt= $row->weight;	
}


//$seven_days_ago = strtotime('7 days');
//$time_span = date('F j').' - '.date('F j', $seven_days_ago) ;


$tracker_date= $_GET['newdate'];
if(isset($tracker_date)){
$a= date("$tracker_date H:i:s");
$today= strtotime($a);	

$days_since_sunday = date('w', $today);
}
else{
$today = time();	

$days_since_sunday = date('w', $today);
}








?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
    
        <title>Volton - Responsive Mobile Template</title>
       
		
   
	   	<?php include('client_head.php'); ?>

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
	<script>
	
	
	
	$(document).ready(function(){
		 
	$(function() {	 
	$("#perday_div").accordion({   
	 animated: 'bounceslide',
  autoHeight: true, 
  collapsible: true, 
    //set localStorage for current index on activate event
    activate: function(event, ui) {        
        localStorage.setItem("accIndex", $(this).accordion("option", "active"));
    },
    active: parseInt(localStorage.getItem("accIndex"))   
});
});
		
	
					
						});
					
			
				
				
				
		/* $(function() {
      $( "#perday_div" ).accordion({ active: false, collapsible: true });
  });		*/
			
			
	
			
	</script>
			
			
		
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    			<div id="compare_pa"  Title="My Jquery UI dialog" style="display: none;  ">
		
			

</div>

			<div id="edit_pa"  Title="My Jquery UI dialog"  style="display: none;  ">
		
			

</div>
 
       <?php include('sidebar.php'); ?>

     

        <!-- MAIN CONTENT -->
        <div class="main-content" >
            <div class="fluid-container">

  


<!-- Begin Body -->
<div class="container" style="margin-top: 20px;">
<div class="row">
	<div class="col-md-9"  >
  		
       
   
      		
              
			
			<h2 >Physical Activity Tracker</h2>
			  
			  <hr class="colorgraph"></hr>
			  
			  <div class="col-md-12">
         		 <div class="form-group form-inline" align="right">
				<input type="text" class="form-control" id="newdate" name="newdate" placeholder="<?php echo date("l jS M Y",$today); ?>" /> <button id="padate" name="padate" class="btn btn-primary"> Go!</button>
			  </div></div>
			 <p>Movement of the body that uses energy is the most basic meaning of physical activity. There are 3 categories of PA namely light, moderate or vigorous intensity which can be observed by the way an activity makes you breathe harder and your heart beat faster.</p>
		 
		 
	

              <div  class="container" style="width: 100%; height: 700px;min-height: 400px; overflow-y: scroll;">
			  
			  <input type="hidden" class="form-control" id="wt" name="wt" value="<?php echo $wt; ?>" />
			  
			 
			  
			  <?php
			  echo "<div id=\"compare_div\" class=\"form-group form-inline\" align=\"center\" >";
			  echo "<select multiple=\"multiple\" name=\"date1\" id=\"date1\" class=\"date \" style=\"width:200px;\">";
			  	  for($i = 0; $i < 7; $i++) {
		$days[$i]['stamp'] = mktime(0, 0, 0, date('n', $today),
(date('j', $today) + $i - $days_since_sunday), date('Y', $today));
$days[$i]['pretty_date'] = date('Y-m-d', $days[$i]['stamp']);
//echo $days[$i]['pretty_date'];
$perday= $days[$i]['pretty_date'];


 echo "<option value=\"$perday\">$perday</option>";


}
echo "</select>&nbsp;</span>";
		/*	   $per_day1_db=  $mysqli->query("SELECT pa_tracker_db.submitted_on FROM pa_tracker_db WHERE pa_tracker_db.client_id='$uid' GROUP BY DATE_FORMAT(pa_tracker_db.submitted_on,'%Y-%m-%d') ORDER BY pa_tracker_db.submitted_on ASC LIMIT 10");
			  // echo "<div id=\"compare_here\"><button id=\"compare_link\" name=\"compare_link\"  ><span class=\"glyphicon glyphicon-transfer\"></span></button> </div><br>";
			   echo "<div id=\"compare_div\" class=\"form-group form-inline\" align=\"center\" >";
			     echo "<select multiple=\"multiple\" name=\"date1\" id=\"date1\" class=\"date \" style=\"width:200px;\">";
				 //echo "<option value=\"0\">--Select--</option>";
			    while($per_day1_row= $per_day1_db->fetch_object()){
				$day= date("Y-m-d",strtotime($per_day1_row->submitted_on));	
				$fullday= date("F j, Y",strtotime($per_day1_row->submitted_on));	
					
				 echo "<option value=\"$day\">$fullday</option>";
			   	
			   }
			   	echo "</select>&nbsp;</span>";*/
				
					  /* $per_day2_db=  $mysqli->query("SELECT pa_tracker_db.submitted_on FROM pa_tracker_db WHERE pa_tracker_db.client_id='$uid' GROUP BY DATE_FORMAT(pa_tracker_db.submitted_on,'%Y-%m-%d')");
				  echo "<select name=\"date2\" id=\"date2\" class=\"date form-control\">";
				 echo "<option value=\"0\">--Select--</option>";
			    while($per_day2_row= $per_day2_db->fetch_object()){
				$day2= date("Y-m-d",strtotime($per_day2_row->submitted_on));	
					
				 echo "<option value=\"$day2\">$day2</option>";
			   	
			   }
			   	echo "</select>&nbsp;";*/
			echo "<button id=\"compare\" name=\"compare\" class=\"btn btn-success btn btn-sm\">Compare</button>";
			
			
			 echo " </div> ";
			   
			   
			  ?>
			  
			  
			 <div id="divperday">
			  
			  <?php 
			  
			  //$day = date("l jS F Y",strtotime($datetime));
			  	echo "<div id=\"perday_div\">";
			  for($i = 0; $i < 7; $i++) {
		$days[$i]['stamp'] = mktime(0, 0, 0, date('n', $today),
(date('j', $today) + $i - $days_since_sunday), date('Y', $today));
$days[$i]['pretty_date'] = date('Y-m-d', $days[$i]['stamp']);
//echo $days[$i]['pretty_date'];
$perday= $days[$i]['pretty_date'];
$perdaylabel=  date('l jS F Y', $days[$i]['stamp']);


 $pa_tracker_db=  $mysqli->query("SELECT  pa_tracker_db.id,pa_tracker_db.pa_code,pa_tracker_db.time,pa_tracker_db.duration,pa_tracker_db.pa_cal,pa_db.activity,pa_tracker_db.submitted_on FROM pa_tracker_db  INNER JOIN pa_db ON pa_tracker_db.pa_code = pa_db.pa_code   WHERE pa_tracker_db.client_id='$uid' AND entry_date='$perday' ORDER BY pa_tracker_db.time ASC");
			  
	
					
			// if($pa_tracker_db ->num_rows > 0){
			 
				echo "<h3>$perdaylabel</h3>";
				
				
			  	echo "<div >";
				echo " <div id=\"alert$i\" tabindex=\"1\"></div>";
				
				echo"<table  width=\"800\" border=\"1\" class=\"table table-striped\">";
				
			/*echo "<tr>";
			echo "<td colspan=\"6\" align=\"center\"><strong><i>$perdaylabel</i></strong></td>";
			echo "</tr>";	*/
			
			echo "<tr>";
			
			echo "<tr>
		
		<th width=\"150\">Time of the Day</th>
		<th width=\"150\">Physical Acitivity Performed</th>
		<th width=\"150\">Duration (minutes)</th>
		<th width=\"50\">Calorie Equivalent</th>
		<th colspan=\"2\" width=\"50\">Action</th>
		
		</tr>";
					
			
		$total_pa_cal =0;
		
				while($pa_tracker_row= $pa_tracker_db->fetch_object()){
			$row_id = $pa_tracker_row->id;
			$time = date("h:i A",strtotime($pa_tracker_row->time));	
			$activity = $pa_tracker_row->activity;	
			$duration = $pa_tracker_row->duration ." minutes";	
			$pa_cal = $pa_tracker_row->pa_cal;	
			$total_pa_cal += $pa_cal;
			
			//$submitted_on= $pa_tracker_row->submitted_on;
			//$day = date("l jS F Y",strtotime($submitted_on));
				
			//echo "<td><input type=\"checkbox\" id=\"row_id\" name=\"row_id[]\" value=\"$row_id\"  /></td>";		
			echo "<td width=\"150\">$time</td>";		
			echo "<td width=\"150\">$activity</td>";		
			echo "<td width=\"150\">$duration</td>";		
			echo "<td width=\"50\">$pa_cal</td>";		
			echo "<td width=\"10\"><a href=\"#\" id=\"$row_id\" class=\"edit_pa\" data-count=\"$i\" ><span class=\"glyphicon glyphicon-pencil\"></span></a></td>";
			echo "<td width=\"10\"><a id=\"$row_id\"  href=\"#\" class=\"delete_pa\"><span class=\"glyphicon glyphicon-remove\"></span></a></td>";		
			echo "</tr>";		
					
					
				
				}
				
			
			
			echo "<tr>";
		/*	echo "<td align=\"right\" colspan=\"7\"><h4>Total Calorie Expended for the Day: "."<strong>".$total_pa_cal."</strong></h4></td>";*/
			//$a= $total_pa_cal."px";
			if($total_pa_cal == 0 || $total_pa_cal ==''){
				$cal_perday= $row->cal;
				$total_pa_cal = '';
				$y="0%";	
				$z= "100%";
				$remcal_perday=$row->cal;
			}
			else{
				$cal_perday= $row->cal;	
				$remcal_perday= $cal_perday - $total_pa_cal;
				$x= $total_pa_cal / $cal_perday;
			
			if($total_pa_cal > $cal_perday){
				$y = "100%";
					//$z= "100%";
			}
			else{
				$y = round($x*100)."%";
				$z= round(100-$y)."%";
			}
		
			}
			
			
			if($total_pa_cal>$cal_perday){
				$progress_alert= "info";
			}
			else {
				$progress_alert = "success";
			}
			
			echo "<td></td>";
			echo "<td></td>";
			echo "<td >TEE:</td>";
			
			echo "<td colspan=\"7\" valign=\"middle\"><strong>$total_pa_cal</strong> kcal</td>";
			echo "</tr>";	  	
			
			  
			  
		echo "<tr>";
				echo "<td width=\"150\"><input type=\"text\" id=\"time$i\" name=\"time\" class=\"form-control time\" data-count=\"$i\" /></td>";
				echo "<td width=\"250\"><input type=\"text\" class=\"pa form-control \"  id=\"pa$i\" name=\"pa\" data-count=\"$i\"  /><input type=\"hidden\" id=\"pa_code$i\" name=\"pa_code\" class=\"form-control \" /><input type=\"hidden\" id=\"mets$i\" name=\"mets\" class=\"form-control \" /></td>";
				
			/*	$pa_db=  $mysqli->query("SELECT * FROM pa_db");
							echo "<td width=\"250\">";
							echo "<select name=\"pa\" id=\"pa$i\" class=\"form-control pa\" data-count=\"$i\"  >";
							echo "<option value=\"0\" selected=\"\" >--Physical Activity--</option> ";
							
							if($pa_db-> num_rows >0){
								while($pa_row= $pa_db->fetch_object()){
									echo "<option value=\"$pa_row->pa_code\" >$pa_row->activity</option>";
								}

							}

							$pa_db-> close;
							echo " </select><input type=\"hidden\" id=\"mets$i\" name=\"mets\" class=\"form-control\" /></td>";*/
							
							
				echo "<td width=\"150\"><input type=\"text\" id=\"duration$i\" name=\"duration\" class=\"form-control duration\" data-count=\"$i\" /></td>";
				echo "<td width=\"150\"><span id=\"pa_cal_label$i\" name=\"pa_cal_label\"></span><input type=\"hidden\" id=\"pa_cal$i\" name=\"pa_cal\" class=\"form-control\" /></td>";
				
				
			
				echo "<td colspan=\"2\" width=\"50\" align=\"center\"><input type=\"hidden\" class=\"form-control\" id=\"client_id$i\" name=\"client_id\" value=\"$uid\" /><input type=\"hidden\" class=\"form-control\" value=\"$i\" id=\"count\" name=\"count\" /><button id=\"add_pa\" class=\"btn btn-primary add_pa\" data-entrydate=\"$perday\" data-count=\"$i\"><span class=\"glyphicon glyphicon-plus\"></span></button></td>";
				echo "</tr>";
		
				echo "<tr>";
		/*	echo "<td align=\"right\" colspan=\"7\"><h4>Total Calorie Expended for the Day: "."<strong>".$total_pa_cal."</strong></h4></td>";*/
			//$a= $total_pa_cal."px";
			if($total_pa_cal == 0 || $total_pa_cal ==''){
				$cal_perday= $row->cal;
				$total_pa_cal = '';
				$y="0%";	
				$z= "100%";
				$remcal_perday=$row->cal;
			}
			else{
				$cal_perday= $row->cal;	
				$remcal_perday= $cal_perday - $total_pa_cal;
				$x= $total_pa_cal / $cal_perday;
			
			if($total_pa_cal > $cal_perday){
				$y = "100%";
					//$z= "100%";
			}
			else{
				$y = round($x*100)."%";
				$z= round(100-$y)."%";
			}
		
			}
			
			
			if($total_pa_cal>$cal_perday){
				$progress_alert= "info";
			}
			else {
				$progress_alert = "success";
			}
			
			
			//
			echo "<td colspan=\"7\" valign=\"middle\"><input type=\"hidden\" id=\"totalpa_cal$i\" value=\"$total_pa_cal\" class=\"form-control\" /><strong>Total: $cal_perday kcal / day</strong><div class=\"progress progress-striped active\">
  <div class=\"progress-bar progress-bar-$progress_alert\" id=\"totalpa$i\" role=\"progressbar\" style=\"width:$y;\" >
TEE: $total_pa_cal kcal
  
  </div>
  <div class=\"progress-bar progress-bar-warning\" id=\"totalpa_perday$i\"  role=\"progressbar\" style=\"width:$z;\">
 $remcal_perday kcal / day
  </div>
 
  
  
</div><input type=\"hidden\" id=\"cal_perday$i\" value=\"$cal_perday\" class=\"form-control\"/></td>";
			echo "</tr>";	
				
				
				
				echo "</table></div>";
				
			  
			  }
			  echo "</div>";
			  
			 
			  
			  
			  
			   
			  ?>
			
				  
				  
              </div>
              </div>
			<br>
        <footer class="modal-footer">
	<p align="left"><?php echo $footer; ?></p>
	   </footer>
  	</div>


                
				
				
                </div>
                </div>
                </div>

            </div>


    </body>
</html>