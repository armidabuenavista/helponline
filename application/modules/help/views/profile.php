<?php $this->load->view('client_header'); ?>    

<?php $this->load->view('sidebar'); ?>  

<script type="text/javascript">
  
  
</script>
   <style>
   .ui-widget-header {
     border: 0px solid #aaaaaa; 
     background: #FFFFFF;
    color: #222222;
    font-weight: normal;
}
   </style>


<div id="edit_profile"    style="display: none;  " class="col-md-12">
    
      

</div>



  <div class="main-content">
            <div class="fluid-container">



            <div class="container" style="margin-top: 20px;">
                <div class="row">
        
                <div class="col-md-9">
             
              <div  >
                 <h2 >Profile</h2>
                 <hr class="colorgraph"></hr>
                 <div class="well well-sm pre-scrollable" style="min-height: 100px;">
          
                     <div class="row projects-holder">
                <?php 
                if($numRows > 0 ){


                  
                    foreach($results1 as $row){
                      $photo_id= $row->id;
                      $photo1= $row->photo;
                      echo "<div class=\"col-xs-4 col-sm-4\">";
                      echo " <div class=\"project-item\">";

                      $a= base_url("assets/images/client_photos/$photo1");

                      echo "<a href=\"#\" id=\"$photo_id\" class=\"edit_photo\"><img src=\"$a\" alt=\"Profile\" width=\"50%\" height=\"50%\" class=\"img-thumbnail img\"></a>";
               
                      echo " </div>"; 
                      echo " </div>";

                    }
                       
                }else{

                  echo "No available photos";
                }


                ?>
                   </div>
                </div>    
<?php
if($this->session->flashdata('item')) {
  $message = $this->session->flashdata('item');
  ?>
<div class="alert alert-<?php echo $message['class'];?>"><?php echo $message['message']; ?></div>
<?php
}

?>

       <div class="upload" style="margin-left: 10px; ">     
       <form action="<?php echo base_url();?>help/save_photo" method="post" enctype="multipart/form-data">
   

       <div class="form-group">
        <input type="file" name="picture" id="picture">
       </div>
    <div class="form-group">
        <button class="btn btn-success">Upload</button> 
        </div>

        </form>
</div>
                <!--   <div class="personal_info" style="margin-left: 10px; ">
        <h4 class="page-header">Personal Information</h4>         <?php 
          echo "<p>Name: ". $name."</p>";
          
          echo "<p>Gender: ". $a_gender."</p>";
          echo "<p>Birthday: ". date("d F Y",strtotime($birthday))."</p>";
          echo "<p>Age: ". $age_year ."</p>";
          echo "<p>Address: ".$address."</p>";
          echo "<p>Contact Number: ". $contact_number."</p>"; 
          echo "<p>Email Address: ".$email_address. "</p>";
      
        ?>
        <a href="#" class="btn btn-success edit_info" id="<?php echo $uid; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
          </div>


            <div class="acct_info" style="margin-left: 10px;margin-bottom: 10px;">
          <h4 class="page-header">Account Information</h4>
          
          
          <p>Username: <?php echo $username; ?></p>
          <p >Password: *********</p>
          <a href="#" class="btn btn-success edit_acct" id="<?php echo $uid; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
          
          </div> -->


<form name="form" id="form"  action="<?php echo base_url();?>help/profile"  method="POST">




<h3><i class="fa fa-list-alt"></i> Personal Information</h3>
<hr class="colorgraph"></hr>
     <div id="alert" > <?php
if($this->session->flashdata('item1')) {
  $message = $this->session->flashdata('item1');
  ?>
<div class="alert alert-<?php echo $message['class'];?>"><?php echo $message['message1']; ?></div>
<?php
}

?> <?php echo $message_return;?>  <?php echo validation_errors(); ?>    </div>
     

     
<div style="margin-bottom: 20px;"><strong>*Required Fields</strong></div>
  

                  <div class="form-group ">
         <p class="help-block">Last name can contain any letters and  spaces</p>
               <input type="text" name="lname" id="lname"   placeholder="*Last Name" class="form-control  " autofocus="autofocus" value="<?php echo $lname; ?>"/>  </div>
         <div class="form-group ">
         <p class="help-block">First name can contain any letters and  spaces</p>
          <input type="text" name="fname" id="fname" class="form-control  "  placeholder="*First Name" value="<?php echo $fname; ?>"  />  
        </div>
         <div class="form-group ">
         <p class="help-block">Middle name can contain any letters and  spaces</p>
          <input type="text" name="mname" id="mname" class="form-control  "  placeholder="*Middle Name" value="<?php echo $mname; ?>" />  
          </div>
        <div class="form-group " >  
        <p class="help-block">Extension</p>
          <input type="text" name="extn" id="extn" class="form-control  " placeholder="Extension" value="<?php echo $extension; ?>"/>  
          </div>
               <div class="form-group ">
        <p class="help-block">Please select gender</p>

       <select  name="gender" id="gender" class="form-control " >

     <option value="0">--Select Gender--</option>
        <?php 

            foreach($groups as $row)
            { 
      
  
      $gender_id= $row->id;
        if($gender == $gender_id){
          $selectCurrent=' selected=\"\"';
         }else{
             $selectCurrent='';
          }
      
              echo '<option  value="'.$row->id.'" "'.$selectCurrent.'"  >'.$row->gender.'</option>';
      
      
            }
            ?>
      </select>
      </div>
      
             <div class="form-group ">
       <p class="help-block">Please enter date of birth in this format (YYYY-MM-DD) </p>
      <input type ="text" name="birthday" id ="birthday"  placeholder="*Birthday: (YYYY-MM-DD)"  class="form-control" value="<?php echo $birthday; ?>"  >
              </div>
                  <div class="form-group ">
          <p class="help-block">Please enter your address </p>
               <input type="text" id="address" name="address" id="address" class="form-control  "  placeholder="*Address" value="<?php echo $address; ?>" />
         </div>
         <div class="form-group ">
          <p class="help-block">Please enter your contact number </p>
           <input type="tel" id="contact_no" name="contact_no" class="form-control  "  placeholder="*Contact Number" value="<?php echo $contact_number; ?>" /> 
              </div>
                  <div class="form-group">
            <p class="help-block">Please enter valid email address </p>
         <input type="email" id="email_address" name="email_address" class="form-control  "  placeholder="*Email Address" size="30" value="<?php echo $email_address; ?>" /> 
              </div>



            <!--   <div class="form-group">
        <label> Photo:</label>
      </div>
      <div class="form-group"><?php 
       $a= base_url("assets/images/client_photos/$photo");
      
      echo "<img src=\"$a\" alt=\"\" width=\"10%\"  />";
      ?></div>
      <div class="form-group">
         <input type="file" name="photo" id="photo"  />
         <input type="text" class="form-control" name="photo_1" id="photo_1" value="<?php echo $photo; ?>"  />
      </div>
 -->

      
                  <div class="form-group ">
   
  <button id="update_info" class="btn btn-success " name="update_info" value="update_info"> Update</button>
  
        
              
              </div>


</form>







  
      <h3><i class="fa fa-lock"></i> Login Information</h3>

       <form name="form1" id="form1"  action="<?php echo base_url();?>help/profile"  method="POST">
        <hr class="colorgraph"></hr>
     <div id="alert" > <?php
if($this->session->flashdata('item2')) {
  $message = $this->session->flashdata('item2');
  ?>
<div class="alert alert-<?php echo $message['class'];?>"><?php echo $message['message2']; ?></div>
<?php
}

?> <?php echo $message_return;?>  <?php //echo validation_errors(); ?>    </div>
     

     
<div style="margin-bottom: 20px;"><strong>*Required Fields</strong></div>

             <div class="form-group">
             <p class="help-block"> Username can contain any letters or numbers, without spaces </p>
            <input type="text" id="username" name="username" class="form-control  "   placeholder="*Username" value="<?php echo $this->input->post('username'); ?>"/> 
          </div>
           <div class="form-group">
        <p class="help-block"> Password should be at least 6 characters</p>
            <input type="password" id="old_password" name="old_password" class="form-control  "   placeholder="*Old Password" value="<?php echo $this->input->post('old_password'); ?>"  /> 
          </div>
     
      <div class="form-group">
        <p class="help-block"> Password should be at least 6 characters</p>
            <input type="password" id="new_password" name="new_password" class="form-control  "   placeholder="*New Password" value="<?php echo $this->input->post('new_password'); ?>"  /> 
          </div>

          <div class="form-group">
        <p class="help-block"> Password should be at least 6 characters</p>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control  "   placeholder="*Confirm Password" value="<?php echo $this->input->post('confirm_password'); ?>"  /> 
          </div>

      <div class="form-group ">
   
  <button id="update_acct" class="btn btn-success " name="update_acct" value="update_acct">Update</button>
  
          </div>

          </form>
    

 </div>    
          </div>   
   




                  </div>
  </div>          
          </div>
  </div>                



            </div>
  </div>          
  <?php $this->load->view('client_footer'); ?>    