
	   <hr></hr>
 <form id="form1" name="form1" method="POST" action="" >
<div id="alert"></div>
	 <div class="panel panel-default" style="margin-left:8px;">
                        <div class="panel-heading">
                     <h3><i class="fa fa-calendar"></i>  Add Event</h3>
 	 
                           
                        </div>
                        <!-- /.panel-heading -->
                       
					   
					    
						<div class="panel-body">
						<div class="table-responsive">
                              
	   <table class="table" border="0">
	   
	<tr>
	
		<td > <label><strong>Event Type:</strong></label></td>
		<td>   
     
 
      <select name="event_type" id="event_type" class="form-control" >
              
           <option value="0" selected="" >--Select Event Type--</option> 
            <?php

foreach($event_type0 as $row){
$event_id= $row->id;
$event_type=$row->event_type;



    echo "<option value=\"$event_id\" >".$event_type."</option>";




}
?>
			  
			  </select>
			  </td>
			  </tr>
			  <tr id="custom_div" style="display: none;" >
			               
		<td  > <label><strong>Custom Event:</strong></label></td>
	   <td>
         <input type="text" id="custom_event"  name="custom_event"   class="form-control" placeholder="Enter custom event"/>
			   
   
		  </td></tr>
		<tr>
			
		<td  > <label for="datepick">Date:</label></td>
		<td>  <input type="text" id="datepick"  name="datepick"   class="form-control" required=""   placeholder="Please select date"  value="<?php echo $datepick; ?>" /></td>
	</tr>
	<tr>
		<td  ><label for="whole_day"><strong>Whole day:</strong></label></td>
		<td>  <input type="checkbox" name="whole_day" id="whole_day"     class="checkbox"  value="0"/>
			   </td>
	</tr>
	
	<tr id="whole_day_div"  >
		
		<td  > <label for="timepick">Time:</label></td>
		<td>
			
                  <div class="form-group form-inline">
           
          <input type="text"  id="timepick1" name="timepick1"   class="form-control text-time" required="" placeholder="Please select time from"    size="5" />
     <input type="text"id="timepick2"  name="timepick2"    class="form-control text-time" required="" placeholder="Please select time to" size="5" />
          
	
		  
          </div>
		</td>
		
	</tr>
	
	<?php 

if($user_type == 1){
	echo "<tr id=\"select_rnd_div\">";
	
	echo "<td>";
	echo "<label class=\"control-label\" for=\"RND Personnel\"><strong>RND Personnel:</strong></label> ";
	echo "</td>";
	
	echo "<td>";
	echo "<select  name=\"rnd\" id=\"rnd\"  class=\"form-control\" >";
	echo "<option value=\"0\" > --Select RND--</option>";
	foreach($rnd_user as $row1){
	$rnd_id= $row1->id;
	$rnd_name= $row1->lname.", ".$row1->fname." ".$row1->mname;

 	 echo "<option   value=\"$rnd_id\" > $rnd_name</option>";



	}
	echo "</select>";
              
	echo "</td>";
	echo "</tr>";

	echo "	<tr>
		<td ><label  for=\"all_rnd\"><strong>All RND:</strong></label></td>
		<td><input type=\"checkbox\" name=\"all_rnd\" id=\"all_rnd\"  class=\"checkbox\"  value=\"0\"/></td>
		
	</tr>";

		   
	}
	
	else{
		
		echo "<input type=\"hidden\" name=\"rnd\" id=\"rnd\" value=\"$uid\"/>";
		
	}
	
	 


	 	

?>
		
<tr>
	<td  ><label for="status">Status:</label></td>
	<td>  <input type="checkbox" name="status" id="status"   class="checkbox" rows="8" value="0" />Confirm</td>
	
</tr>
	<tr>
		<td  > <label  for="remarks">Remarks:</label></td>
		<td><textarea class="form-control"  name="remarks" id="remarks"></textarea></td>
		
	</tr>
	
</table>
	   
	   

       
	
	

	

</div>

    
       		  

	 
	   
	   </div></div>
	
	 <div class="form-group" align="center">
	
		
		<button name="confirm_event" id="confirm_event" value="Save Event" class="btn btn-success btn-lg confirm_event"  data-user_type="<?php echo $user_type; ?>"> Save Event </button>
	
	   </div>
	  </form>


