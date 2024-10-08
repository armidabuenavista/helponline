<?php




if($numRows > 0){
	
$event_type = $event_id[0]->event_type_id;
$custom_event= $event_id[0]->custom_event_type;
$approved_date= $event_id[0]->approved_date;
$whole_day= $event_id[0]->whole_day;
$approved_time_from= $event_id[0]->approved_time_from;
$approved_time_to= $event_id[0]->approved_time_to;
$status_id= $event_id[0]->status_id;
$assigned_rnd_id= $event_id[0]->assigned_rnd_id;
$all_rnd= $event_id[0]->all_rnd;
$remarks = $event_id[0]->remarks;

?>


 <hr></hr>




<div id="alert"></div>



 <form id="form1" name="form1" method="POST" action="" >

  <div class="panel panel-default" style="margin-left: 8px;">
              <div class="panel-heading">
                        <h3><i class="fa fa-calendar"></i>  Edit Event</h3>
                           
                      </div>
 
 
   <div class="panel-body">
   <div class="table-responsive">
               
<table class="table " border="0" >
	<tr>
		<td > <label for="event_type"><strong>Event Type:</strong></label></td>
		<td>
		
      <select name="event_type" id="event_type" class="form-control  "  >
         
           <option value="0" >--Select Event Type--</option> 
            <?php




foreach($event_type0 as $row){
$event_id= $row->id;
$event_type1=$row->event_type;

if($event_id==$event_type){
        $selectCurrent=' selected';
    }else{
        $selectCurrent='';
    }

    echo "<option value=\"$event_id\" ".$selectCurrent." >".$event_type1."</option>";




}
				
				?>  
	  	
	

			  
			  </select>	
			
		</td>
	</tr>
	<tr id="custom_div" <?php if($event_type != 4){ 
		 echo" style=\"display: none;\""; 
		  }
		  
		  ?> >
		<td  ><label class="control-label" for="custom event">Custom:</label></td>
		<td>
		 <input type="text" id="custom_event"  name="custom_event"   class="form-control  " value="<?php echo $custom_event; ?>" />
			   	
		</td>
	</tr>
	
	<tr>
		<td  > <label  for="datepick">Date:</label></td>
		<td>
			  <input type="text" id="datepick"  name="datepick"   class="form-control  " required=""   placeholder="Please select date.." value="<?php echo $approved_date;?>"  />
		</td>
	</tr>
	
	<tr>
		
		<td  > <label  for="whole_day"><strong>Whole day:</strong></label>
              </td>
		<td> <input type="checkbox" name="whole_day" id="whole_day"  value="<?php echo $whole_day;?>"  class="checkbox" <?php if($whole_day == 1){ 
		 echo "checked=\"\""; 
		  }
		  
		  ?> /></td>
		
		
	</tr>
	
	
	<tr id="whole_day_div" <?php if($whole_day ==1){ 
		 echo" style=\"display: none;\""; 
		  }
		  
		  ?>>
		
		<td  ><label  for="timepick">Time:</label></td>
		<td>  <div class="form-group form-inline">
           <input type="text"  id="timepick1" name="timepick1"   class="form-control  " required="" placeholder="Please select time.." value="<?php echo  date("h:i A",strtotime($approved_time_from));?>"  size="5" />
       <input type="text"  id="timepick2"  name="timepick2"    class="form-control  " placeholder="Please select time.." required="" value="<?php echo date("h:i A",strtotime($approved_time_to));?>"  size="5"  /></div></td>
		
		
	</tr>
	
		<?php 
	
	
if($user_type== 1){
	if($all_rnd == 1){
			$all_rnd_val=1;
			$checked="checked=\"\"";

			$display = 'style="display: none;"'; 
			
		}	 
		else{
			$all_rnd_val= 0;
			$checked="";
			$display = ''; 
		}
		
		
		
			

echo "<tr id=\"select_rnd_div\" $display>";
	
	echo "<td>";
	echo "<label class=\"control-label\" for=\"RND Personnel\"><strong>RND Personnel:</strong></label> ";
	echo "</td>";
	
	echo "<td>";
	echo "<select  name=\"rnd\" id=\"rnd\"  class=\"form-control  \" >";
	 echo "<option value=\"0\" > --Select RND--</option>";
	foreach($rnd_user as $row1){
	$rnd_id= $row1->id;
	$rnd_name= $row1->lname.", ".$row1->fname." ".$row1->mname;

 if($rnd_id==$assigned_rnd_id){
        $selectCurrent=' selected';
    }else{
        $selectCurrent='';
    }



 	 echo "<option  ".$selectCurrent." value=\"$rnd_id\" > $rnd_name</option>";



	}
	echo "</select>";

	echo "</td>";
	echo "</tr>";


echo "	<tr>
		<td ><label  for=\"all_rnd\"><strong>All RND:</strong></label></td>
		<td><input type=\"checkbox\" name=\"all_rnd\" id=\"all_rnd\"  class=\"checkbox\" ".$checked." value=\"$all_rnd_val\"/></td>
		
	</tr>";
	
		   
	}
	
	else{
		
	echo "<input type=\"hidden\" name=\"rnd\" id=\"rnd\" value=\"$uid\"/>";
		
	}
	
	
	

	 	

?>

	
		<tr>
		<td  >  <label for="status">Status:</label></td>
		
		<td> <input type="checkbox" name="status" id="status"  value="<?php echo $status_id;?>" checked=""  class="checkbox"  /> Confirm
			   </td>
	</tr>
	
	
	<tr>
		<td  > <label  for="remarks">Remarks:</label></td>
		<td><textarea class="form-control  "  name="remarks" id="remarks"><?php echo $remarks; ?></textarea></td>
		
	</tr>
	 
	
</table>               
	 
	
	</div>

    
	


	    </div></div>
	
	 <div class="form-group" align="center">
	
	 <button type="button" id="edit_event" class="btn btn-success btn-lg" data-id="<?php echo $id; ?>" data-uid="<?php echo $uid; ?>" data-user_type="<?php echo $user_type; ?>" >Update Event </button>
	
	   </div>
	  </form>





<?php 
}
else{
	echo "<div class=\"alert alert-danger\">No records found.</div>";
}


?>





