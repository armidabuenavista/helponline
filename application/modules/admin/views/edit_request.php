<?php


if($numRows> 0){
	$client_id= $request_id[0]->id;
	$lname= $request_id[0]->lname;
	$fname= $request_id[0]->fname;
	$mname= $request_id[0]->mname;

	$name = $lname.", ".$fname." ".$mname;
	$gender= $request_id[0]->gender;
	$address= $request_id[0]->address;
	$email_address= $request_id[0]->email_address;
	$birthday= $request_id[0]->birthday;
	$contact_number= $request_id[0]->contact_number;
	$age= $request_id[0]->age;
	$event_type_id = $request_id[0]->event_type_id;
	$date = $request_id[0]->request_date;
	$whole_day = $request_id[0]->whole_day;
	$time_from= $request_id[0]->time_from;
	$time_to= $request_id[0]->time_to;
	$status_id= $request_id[0]->status_id;
	$message= $request_id[0]->message;
	$remarks= $request_id[0]->remarks;
	$assigned_rnd_id= $request_id[0]->assigned_rnd_id;


	
?>
 <script type="text/javascript">
$(document).ready(function() {

});
 </script>


 <hr></hr>
 <div class="panel panel-default" style="margin-left: 3px;">
                        <div class="panel-heading">
                     <h3><i class="fa fa-calendar"></i> Client Request Edit</h3>
 	 
                            
                        </div>
                        <!-- /.panel-heading -->
                       
					   
					    
						<div class="panel-body">
		
	
		
	      <div id="alert" style="display: none;" tabindex="1"> </div>
		  
		  
		  <table class="table "  border="0">
		  	<tr>
				
				<td ><strong>Name:</strong> </td>
				<td> <span id="name" id="name"  data-name="<?php echo $name; ?>"><?php echo $name; ?></span></td>
			</tr>
			
			<tr>
			<td  > <strong>Age:</strong></td>
			<td><span id="age"  data-age="<?php echo $age; ?>" ><?php echo $age; ?></span></td>
			</tr>
			
			<tr>
				
				<td  > <strong>Contact Number:</strong></td>
				<td><span id="contact_no"  data-contact_no="<?php echo $contact_number; ?>"><?php echo $contact_number; ?></span></td>
			</tr>
			
			<tr>
				
				<td  >  <label class="control-label" for="email_address"><strong>Email Address:</strong></label></td>
				<td> <span id="contact_no"  data-contact_no="<?php echo $email_address; ?>"><?php echo $email_address; ?></span> </td>
			</tr>
			
			<tr>
				
				
				<td  > <label class="control-label" for="datepick"><strong>Date:</strong></label></td>
				<td>   
           
         <input type="text" id="datepick"  name="datepick" value="<?php echo $date; ?>" class="form-control"  />

          </td>
			</tr>
			
			<tr>
				
				<td  ><label class="control-label" for="whole_day"><strong>Whole day:</strong></label></td>
				<td>      <input type="checkbox" name="whole_day" id="whole_day" class="checkbox"  
		<?php	if($whole_day==1){
			echo "checked=\"\"";
			echo "value=\"1\"";
			$display= "style=\"display:none;\""; 
			}
			else{
				echo "";
			$display= "style=\"display:block;\""; 
			}
			?> />
			   </td>
			</tr>
			
			<tr id="whole_day_div">
				
				<td  > <label class="control-label" for="timepick"><strong>Choose Time:</strong></label></td>
				<td>
 <div class="form-group form-inline">
				  <input type="text" id="timepick1" name="timepick1" class="form-control " placeholder="Enter Time From" value="<?php echo date("h:i A",strtotime($time_from)); ?>" size="5"  /> <input type="text" id="timepick2" name="timepick2" class="form-control " placeholder="Enter Time To" value="<?php echo date("h:i A",strtotime($time_to)); ?>" size="5" /> 

				  </div>
			   </td>
			</tr>
			 
			<tr>
				
				<td  ><label class="control-label" for="event_type"><strong>Event Type:</strong></label></td>
				<td>  <select name="event_type" id="event_type" class="form-control ">
              
           <option value="0" selected="" >--Select Event Type--</option> 
            <?php

 foreach($event_type as $row){
$event_id= $row->id;
$event_type=$row->event_type;

if($event_type_id==$event_id){
        $selectCurrent=' selected';
    }else{
        $selectCurrent='';
    }

    echo "<option value=\"$event_id\" ".$selectCurrent." >".$event_type."</option>";




}
?>

 
			  </select>
		  </td>
			</tr>
			
			<tr>
				<td  >  <label class="control-label" for="RND Personnel"><strong>Assign RND Personnel:</strong></label></td>
				<td>
        <select name= "rnd" id="rnd"  class="form-control">
              
           <option value="0" selected="" >--Select RND--</option> 
            <?php
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

?>

    
       		  
			  </select>
              </td>
			</tr>
			
			<tr>
				
				<td  > <label class="control-label" for="status"><strong>Status:</strong></label></td>
				<td>  <input type="checkbox" id="status" name="status"  class="checkbox"  value="<?php echo $status_id;?>" checked=""
	  /> Confirm</td>
			</tr>
			
			<tr>
				<td  > <label class="control-label" for="message"><strong>Message:</strong></label></td>
				<td> <textarea name="message" id="message" readonly="" class="form-control input-lg" style="border:0px; background-color: #ffffff;"><?php echo $message;?></textarea> </td>
			</tr>
			
			
			<tr>
				
				
				<td  >  <label class="control-label" for="remarks"><strong>Remarks:</strong></label></td>
				<td>   <textarea name="remarks" id="remarks" class="form-control input-lg" ><?php echo $remarks;?></textarea> </td>
			</tr>
		  </table>
		  
		  	
		  

		  
		  
		   <div class="form-group"  > 
             
		   <input type="hidden" readonly="" name="client_id" id="client_id" value="<?php echo $client_id; ?>" class="form-control" />
   <input type="hidden" readonly="" name="appointment_id" id="appointment_id" value="<?php echo $appointment_id; ?>" class="form-control" />
       
          </div>

	
	 
	 
		</div>
		</div>
		
		<div class="form-group" align="center">

	   
	   
	   <button name="edit_appointment" id="edit_appointment" class="btn btn-success btn-lg"> Update Request </button>
		</div>
	 
	
	  <?php }
	  else{
	  	echo "";
		
	  } ?>
		
		
		


  




