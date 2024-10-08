<?php


		//foreach($results as $row){
			$client_id= $results[0]->id;	
			$name= $results[0]->lname.", ".$results[0]->fname." ".$results[0]->mname;
			$age= $results[0]->age;	
			$contact_number = $results[0]->contact_number;
			$email_address= $results[0]->email_address;
			$datepick= $results[0]->request_date;
			$whole_day= $results[0]->whole_day;
			$timepick1= $results[0]->time_from;
			$timepick2= $results[0]->time_to;
			$message= $results[0]->message;


		?>
<div class="col-md-12">
<hr></hr>
  <div class="panel panel-default">
              <div class="panel-heading">
                        <h3><i class="fa fa-calendar"></i>  Client Request</h3>
                      </div>
   <div class="panel-body">
   <div class="table-responsive">
	     <div id="form" style=" margin-bottom: 10px;">
	      <div id="alert" style="display: none;" tabindex="1"> </div>
		  
		  
		  
		
		  
		  
		  <table class="table " border="0">
	<tr>
		<td> <strong>*Name:</strong>  </td>
		<td><span id="name" id="name"  data-name="<?php  echo $name; ?>"><?php  echo $name; ?></span></td>
	</tr>
	<tr>
	<td><strong>Age:</strong></td>
	<td><span id="age" name="age" data-age="<?php  echo $age; ?>" ><?php  echo $age; ?></span></td>
	</tr>
	<tr>
	<td> <strong>*Contact Number:</strong></td>
	<td><span id="contact_no" name="contact_no" data-contact_no="<?php  echo $contact_number; ?>"><?php  echo $contact_number; ?></span></td>
	</tr>
	<tr>
		<td> <label class="control-label" for="email_address"><strong>*Email Address:</strong></label></td>
		<td> <input type="email"  name="email_address" id="email_address"  value="<?php echo $email_address; ?>" class="form-control" required="" /></td>
	</tr>
	<tr>
		<td>	 <label class="control-label" for="datepick"><strong>*Date:</strong></label></td>
		<td><input type="text" id="datepick"  name="datepick" value="<?php  echo $datepick; ?>" class="form-control" style=" background-color: #ffffff;" /></td>
	</tr>
	<tr>
		<td>  <label class="control-label" for="whole_day"><strong>Whole day:</strong></label></td>
		<td> <input type="checkbox" name="whole_day" id="whole_day" class="checkbox"  
		<?php	
		
		if($whole_day==1){
			echo "checked=\"\"";
			echo "value=\"1\"";
			$display= "style=\"display:none;\"";
		} else {
			echo "";
			$display= "style=\"display:block;\"";
			echo "value=\"0\"";
		}

		?> /></td>
	</tr>
	<tr id="whole_day_div" <?php	
		
		if($whole_day==1){
			$display= "style=\"display:none;\"";
		} else {
			$display= "style=\"display:block;\"";
		}

		?> >
		<td> <label class="control-label" for="timepick"><strong>*Choose Time:</strong></label></td>
		<td> <input type="text" id="timepick1" name="timepick1" class="form-control" placeholder="Enter Time From" value="<?php echo date("h:i A",strtotime($timepick1)); ?>"  /> <input type="text" id="timepick2" name="timepick2" class="form-control" placeholder="Enter Time To" value="<?php echo date("h:i A",strtotime($timepick2)); ?>"  />  </td>


	</tr>
	<tr>
<td> <label class="control-label" for="event_type"><strong>*Event Type:</strong></label></td>
		<td><select name="event_type" id="event_type" class="form-control">
           <option value="0" selected="" >--Select Event Type--</option> 
            <?php

            foreach($groups as $row){
            	$event_id= $row->id;
		$event_type= $row->event_type;
		echo "<option selected=\"\" value=\"$event_id\" > $event_type</option>";	


            }
		/*$event_type=  $mysqli->query("SELECT id,event_type FROM event_type_db WHERE id ='$event_type_id'");
		$event_row= $event_type->fetch_object();
	
		$event_id= $event_row->id;
		$event_type= $event_row->event_type;
		echo "<option selected=\"\" value=\"$event_id\" > $event_type</option>";*/
		?>
			  </select>
		  </td>
	</tr>
	<tr>
		<td>  <label class="control-label" for="RND Personnel"><strong>*Assign RND Personnel:</strong></label></td>
		<td> 
         <select name= "rnd" id="rnd"  class="form-control">
           <option value="0" selected="" >--Select RND--</option> 
            <?php
            foreach($groups1 as $row1){
            	$rnd_id= $row1->id;
				$rnd_name= $row1->lname.", ".$row1->fname." ".$row1->mname;
				echo "<option value=\"$rnd_id\" > $rnd_name</option>";


            }

		/*$view_rnd=  $mysqli->query("SELECT id,user_id,lname,fname,mname FROM users_account_db WHERE user_type_id != 3 ");
		
		if($view_rnd-> num_rows >0){
			while($rnd_row= $view_rnd->fetch_object()){
				$rnd_id= $rnd_row->id;
				$rnd_name= $rnd_row->lname.", ".$rnd_row->fname." ".$rnd_row->mname;
				echo "<option value=\"$rnd_id\" > $rnd_name</option>";
			}

		} else {
			echo "<option value=\"\" selected=\"\" >No Available RND</option>";
		}

		$view_rnd-> close;*/
		?>
			  </select>
              </td>
	</tr>
	<tr>
		<td><label class="control-label" for="status"><strong>*Status:</strong></label></td>
		<td><input type="checkbox" id="status" name="status"  class="checkbox" 
	  /> Confirm
			   </td>
	</tr>
	<tr>
		<td> <label class="control-label" for="message"><strong>Message:</strong></label></td>
		<td>  <textarea name="message" id="message" readonly="" class="form-control" style="border:0px; background-color: #ffffff;"><?php  echo $message; ?></textarea> </td>
	</tr>
	<tr>
	<td><label class="control-label" for="remarks"><strong>Remarks:</strong></label></td>
	<td>   <textarea name="remarks" id="remarks" class="form-control" ></textarea> </td>
	</tr>
 </table>
	 
	
		</div>
	 
	  <div class="form-group" align="center">

	    <input type="hidden" readonly="" name="client_id" id="client_id" value="<?php  echo $client_id; ?>" class="form-control" />
	<input type="hidden" name="appointment_id" id="appointment_id" value="<?php echo $this->input->get('appointment_id'); ?>" class="form-control" />    
<button name="confirm_appointment" id="confirm_appointment" value="Confirm"  class="btn btn-success btn-lg">Confirm</button>

	    </div>
		</div>
		 </div>
		 </div>
		 </div>

