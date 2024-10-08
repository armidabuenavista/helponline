<?php $this->load->view('admin_header'); ?>	
<script type="text/javascript">
  		
	
			
$(document).ready(function() {
    $('#users_acct').dataTable({
		 "aaSorting": [],
		
		
		
		
	});
	
	
	
	
	
});
			
			
	




</script>


</head>

<body>
<div id="dialog" Title="My Jquery UI dialog"  style="display: none;">

</div>

  <!-- Navigation -->
  <?php $this->load->view('admin_navbar'); ?>	

   
	 <div class="container">
				 <div class="col-md-12">
		       
<hr></hr>
		





		
 <?php		
 	
	 echo "<div class=\"panel panel-default\">
                        <div class=\"panel-heading\">
                            <i class=\"fa fa-user fa-fw\"></i> Users Database</div>";				
							
		echo "<div class=\"panel-body\">";
		echo "<div class=\"table-responsive\">";
		echo "<table id=\"users_acct\" class=\"table table-condensed\"  border=\"0\"  >";
		echo "<thead><tr>";
	
		echo "<th></th>";
		echo "<th >Name</th>";
		echo "<th >Email Address</th>";
		echo "<th>Username</th>";
		echo "<th>Privilege</th>";
		echo "<th>Active</th>";
		//echo "<th></th>";
		echo "<th></th>";
		
		echo "</tr></thead><tbody>";
		 
     foreach($get_users as $row){
	 
		
		$id= $row->id;
		//$photo_id= $row->photo;
		//$photoSQL = $mysqli->query("SELECT * FROM photos_db WHERE id='$photo_id'"); 
		//$row1 = $photoSQL->fetch_object();
		//$photo = $row1->photo;
		$name= $row->lname.", ".$row->fname." ".$row->mname;
		$email_address= $row->email_address;
		$admin_username= $row->username;
		$user_type_id = $row->user_type_id;
		$user_active = $row->active;
		
		if($user_active == 1){
			$active= "<div style=\"color:#41b452;\">"."Active"."</div>";
		}
		else{
			$active= "<div style=\"color: #ff0000;\">"."Not Active"."</div>";
		}
		/*if($photo == ''){
		$photo ="<img class=\"img-circle\" src=\"../Images/client_photos/no_photo.png\" alt=\"\" height=\"50\" width=\"50\" />";
						
				}
	else{
					//echo $photo;
		$photo= "<img class=\"img-circle\" src=\"../Images/client_photos/$photo\" height=\"50\" width=\"50\">";
					
				}*/
		echo "<tr>";	
		echo "<td >" . $id . "</td>";
		echo "<td >" . $name . "</td>";
		
		echo "<td  >".$email_address."</td>";
	
		echo "<td >".$admin_username."</td>";
	
		echo "<td >";
		
		echo "<select name=\"user_type\" id=\"user_type\" data-id=\"$id\" class=\"form-control user_type\" >";
		echo "<option value=\"0\">--Select--</option>";

	
    	foreach($get_user_type as $row1){
		$user_type_id1= $row1->id;
		$user_type= $row1->user_type;
		
		if($user_type_id==$user_type_id1){
        $selectCurrent=' selected';
    	}else{
        $selectCurrent='';
    	}
		echo "<option value=\"$user_type_id1\" ".$selectCurrent.">".$user_type."</option>	";
			
		}
	

		echo "</select>";
	
		echo "</td>";		
			
		
		
		
		echo "<td  style=\"text-align:center;\">".$active."</td>";
					
		
		echo "<td><a href=\"#\" id=\"$id\" class=\"delete_user\" ><span class=\"glyphicon glyphicon-remove\"></span></a></td>";

			
   
}
 

echo "</tr></tbody></table></div></div></div>";

?>
       
        	</div> 
        	
      			
				</div>

			
					
						

<?php $this->load->view('admin_footer'); ?>	
	