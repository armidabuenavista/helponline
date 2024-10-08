<?php 
$lname= $results[0]->lname;
$fname=$results[0]->fname;
$mname= $results[0]->mname;
$photo= $results[0]->photo;
$age_year= $results[0]->age_year;
$age_month= $results[0]->age_month;
$gender= $results[0]->gender;
$a_gender= $results[0]->a_gender;
$birthday= $results[0]->birthday;
$address= $results[0]->address;
$contact_number= $results[0]->contact_number;
$email_address= $results[0]->email_address;





?>


<div id="alert" tabindex="1"></div>
	 
<div style="margin-bottom: 20px;"><strong>*Required Fields</strong></div>
 <form name="form1" id="form1" method="POST" action="">





 <div class="panel panel-default">
                        <div class="panel-heading">
                      <label>Personal Information:
</label> 
 	 
                           
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           
			
		  <div class="form-group " >
		  <p class="help-block">Last name can contain any letters and spaces</p>
               <input type="text" name="lname" id="lname"  required="" placeholder="*Last Name" class="form-control " value="<?php echo $lname; ?>"  />
			   
			   
			   
			   </div>  
			 	 <div class="form-group " >  
				 <p class="help-block">First name can contain any letters and spaces</p>
			    <input type="text" name="fname" id="fname" class="form-control " required="" placeholder="*First Name"   value="<?php echo $fname; ?>" />  </div>

			 <div class="form-group " >  
			 <p class="help-block">Middle name can contain any letters and spaces</p>
			    <input type="text" name="mname" id="mname" class="form-control " required="" placeholder="*Middle Name"  value="<?php echo $mname; ?>"  />  </div>
				<div class="form-group " >  
				<p class="help-block">Extension</p>
				  <input type="text" name="extn" id="extn" class="form-control " placeholder="*Extn" value="<?php echo $extn; ?>"  >  
            
            
          </div>
		  
                  <div class="form-group ">
	
				<p class="help-block">Please select gender</p>
        <?php
		
		 echo "<select name=\"gender\" id=\"gender\" class=\"form-control \">";
	foreach ($groups as $row){
		$id = $row->id;
		$gender1= $row->gender;

				  if($id==$gender){
        $selectCurrent=' selected';
    }else{
        $selectCurrent='';
    }
	
		echo "<option value=\"$id\" ".$selectCurrent.">".$gender1."</option>";
	

	}
		/* while($gender_row= $gender_db->fetch_object()){
		 	$gender_id1= $gender_row->id;
		 	$gender= $gender_row->gender;
	
		  if($gender_row->id==$gender_id){
        $selectCurrent=' selected';
    }else{
        $selectCurrent='';
    }
	
		echo "<option value=\"$gender_id1\" ".$selectCurrent.">".$gender."</option>";
	
		 }*/
		 	echo "</select>";
		 
		 ?>
		  </div>		 
			 <div class="form-group ">
			 <p class="help-block">Please enter date of birth in this format (YYYY-MM-DD)</p>
			<input type = "text" name= "birthday" id = "birthday"  placeholder="*Birthday: (YYYY-MM-DD)"  class="form-control " required=""  value="<?php echo $birthday; ?>" />
		
			   
              </div>
			   

                  <div class="form-group ">
          <p class="help-block">Please enter your address</p>
               <input type="text" id="address" name="address" id="address" class="form-control " required=""placeholder="*Address"  value="<?php echo $address; ?>" />
			   </div>
			    <div class="form-group ">
				<p class="help-block">Please enter your contact number</p>
			     <input type="text" id="contact_no" name="contact_no" class="form-control " required="" size="20" placeholder="*Contact Number"  value="<?php echo $contact_number; ?>"  /> 
			  
              </div>
          
	  
                  <div class="form-group ">
          <p class="help-block">Please enter valid email address</p>
         <input type="email" id="email_address" name="email_address" class="form-control " required="" placeholder="*Email Address" size="30"  value="<?php echo $email_address; ?>" /> 
			   
              </div>
						   
						   <div class="form-group" align="center">
						   	<input type="hidden" id="uid" name="uid" value="<?php echo $uid;?>" />
							<button id="edit_info" class="btn btn-success edit_info"> Update</button>
						   </div>
						   
				
                        </div>
                        <!-- /.panel-body -->
                    </div>
					
				
				
		