<?php
 //$i=$this->input->get('count',TRUE);
$i= $count;
$id=$pa_id[0]->id;
$pa_code=$pa_id[0]->pa_code;
$activity=$pa_id[0]->activity;
$mets=$pa_id[0]->mets;
$time=$pa_id[0]->time;
$duration=$pa_id[0]->duration;
$pa_cal=$pa_id[0]->pa_cal;

	

echo "<h3>Edit Physical Activity</h3>";

echo "<hr></hr>";

echo "<div id=\"alert_1\"></div>";
echo"<div class=\"table-responsive\"><table  width=\"850\" border=\"1\" class=\"table table-striped\">";
				
			
				echo "<tr>
		
		<th width=\"250\">Time of the Day</th>
		<th width=\"280\">Physical Acitivity Performed</th>
		<th width=\"200\">Duration (minutes)</th>
		<th width=\"150\">Calorie Equivalent</th>
		<th colspan=\"2\" width=\"50\">Action</th>
		
		</tr>";
				
			
		echo "<tr>";
				//echo "<td></td>";
				$pa_time= date("h:i A",strtotime($time));
				echo "<td width=\"150\"><input type=\"text\" id=\"time0$i\" name=\"time1\" class=\"form-control time1\" value=\"$pa_time\"/></td>";
				
				
			echo "<td width=\"250\"><input type=\"text\" class=\"pa1 form-control \"  id=\"pa0$i\" name=\"pa\" data-count=\"$i\" value=\"$activity\"  /><input type=\"hidden\" id=\"pa_code0$i\" name=\"pa_code\" class=\"form-control \" value=\"$pa_code\" /><input type=\"hidden\" id=\"mets0$i\" name=\"mets\" class=\"form-control \" value=\"$mets\" /></td>";	
					
				echo "<td width=\"150\"><input type=\"text\" id=\"duration0$i\" name=\"duration1\" class=\"form-control duration1\" value=\"$duration\" data-count=\"$i\"/></td>";
					echo "<td width=\"250\"><span id=\"pa_cal_label0$i\" name=\"pa_cal_label1\"><strong>$pa_cal</strong></span><input type=\"hidden\" id=\"pa_cal0$i\" name=\"pa_cal1\" class=\"form-control\" value=\"$pa_cal\" /></td>";
				echo "<td width=\"50\" colspan=\"2\" align=\"center\"><input type=\"hidden\" id=\"rowid\"name=\"rowid\" value=\"$id\" class=\"form-control\" /><button id=\"edit_pa1\" data-count=\"$i\" class=\"btn btn-danger edit_pa1\" >Update</td>";
				echo "</tr>";
				
				
				
				
				echo "</table></div>";
				/*echo "<div align=\"right\">";
				echo "<h4>Total Calorie Expended for the Day: "."<strong>".$total_pa_cal."</strong></h4>";
				echo "</div>";
				echo "<hr></hr>";*/	
//	}
	
	
	

	echo "<hr></hr>";
	
	
	
	
	
			  

?>

