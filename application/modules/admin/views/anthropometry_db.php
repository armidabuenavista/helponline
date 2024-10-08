<?php
session_start();
require_once('../include/connection.php');


if(!isset($_SESSION['username'])|| !isset($_SESSION['uid']) ||  $_SESSION['user_type'] == 3) {
	header('Location:../logout.php');
}


$expireAfter = 3*60;
if(isset($_SESSION['last_action'])){
    
    //Figure out how many seconds have passed
    //since the user was last active.
    $secondsInactive = time() - $_SESSION['last_action'];
    
    //Convert our minutes into seconds.
    $expireAfterSeconds = $expireAfter * 60;
    
    //Check to see if they have been inactive for too long.
    if($secondsInactive >= $expireAfterSeconds){
        //User has been inactive for too long.
        //Kill their session.
       
        session_destroy();
       // session_start();
	    header('Location: ../logout.php');
    }
    
}

 
//Assign the current timestamp as the user's
//latest activity
	$_SESSION['last_action'] = time();


$username= $_SESSION['username'];



//$client_id= $mysqli->real_escape_string($_GET['client_id']);
$appointment_id= $mysqli->real_escape_string($_GET['appointment_id']);

$appointment_array = appointment_requests();
list($client_id,$appointment_id1,$assigned_rnd_id,$name,$age,$gender,$address,$email_address,$birthday,$contact_number,$photo,$event_type_id,$approved_date,$whole_day,$approved_time_from,$approved_time_to,$assigned_rnd) = appointment_requests();

$a= strtotime($approved_date);	

$b= strtotime($datetime);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <title>Anthropometry</title>
  
<?php include('admin_head.php'); ?>
<script type="text/javascript">
	
	
	
	
/*$(function() {
$(".delete_button").click(function() {
var id = $(this).data("appointment_id");
var dataString = 'id='+ id ;
var parent = $(this).closest("tr");

var answer = confirm ("Are you sure you want to delete from the database?");
if (answer)
{
	
$.ajax({
   type: "POST",
   url: "anthropometry_delete_action.php",
   data: dataString,
   cache: false,

   beforeSend: function()
   {
   parent.animate({'backgroundColor':'#fb6c6c'},300).animate({ opacity: 0.35 }, "slow");;
   }, 
   success: function()
   {
   
	parent.slideUp('slow', function() {$(this).remove();});
		setTimeout("location.reload(true);",1000);
  }
   
 });
 
 }
 
 
else{
	return false;
}

return false;
	});
});	*/



			
$(document).ready(function() {
    $('#anthropometry_record').dataTable({
		 "aaSorting": []
		
		
		
	});
	
});
			
			
	$(function() {
$('#anthropometry_record tbody').on( 'click', '.delete', function () {
var id = $(this).attr("id");
var dataString = 'appointment_id='+ id ;
var parent = $(this).closest("tr");




var answer = confirm ("Are you sure you want to delete from the database?");
if (answer)
{

$.ajax({
   type: "POST",
   url: "anthropometry_delete_action.php",
   data: dataString,
   cache: false,

   beforeSend: function()
   {
   parent.animate({'backgroundColor':'#fb6c6c'},300).animate({ opacity: 0.35 }, "slow");;
   }, 
   success: function()
   {
   
	parent.slideUp('slow', function() {$(this).remove();});
		setTimeout("location.reload(true);",1000);
  }
   
 });
 
 }
 
 
else{
	return false;
}

return false;
	});
});	

</script>
	
</head>

<body>
		<?php include('admin_navbar_top.php'); ?>



<div class="container" >
	<div class="col-md-12" >

	
	 <h3 class="page-header" > <img  height="75" width="75" src="../Images/fnri_ncs.png">Anthropometry DB</h3>
    	
		
	
		<div  style="margin-bottom:20px;">
	<?php echo breadcrumbs5(); ?>
			</div>
		
	

 <div class="col-md-6" >
		<p class="lead">Name of Client: <?php echo $name; ?></p>
		<p class="lead">Age: <?php echo $age; ?></p>
		<p class="lead">Gender: <?php echo $gender."<br>"; ?></p>
				
		</div>
	 <div class="col-md-6" >
	<p class="lead">Date of Counselling: <?php echo date("F d, Y",strtotime($approved_date)); ?></p>
	<p class="lead">Assigned RND: <?php echo $assigned_rnd; ?></p>
		</div>	
	
	
<div class="col-md-12 ">
<hr></hr>
<?php


		$stats=$mysqli->prepare("SELECT rnd_sched_db.approved_date,anthropometry_db.client_id,anthropometry_db.appointment_id,users_account_db.fname,users_account_db.mname,users_account_db.lname,anthropometry_db.submitted_on
			FROM anthropometry_db INNER JOIN rnd_sched_db ON rnd_sched_db.appointment_id = anthropometry_db.appointment_id INNER JOIN users_account_db ON users_account_db.id= anthropometry_db.submitted_by WHERE anthropometry_db.client_id=?  ORDER BY  submitted_on DESC ");
				
$stats-> bind_param ("s",$client_id);
$stats->execute();
// store result of prepared statement
$stats->store_result();
$numrows= $stats-> num_rows;
$stats->bind_result($approved_date,$client_id1,$appointment_id1,$fname,$mname,$lname,$submitted_on);	


if($numrows > 0){
echo "<div class=\"table-responsive\">";
	echo "<table  cellspacing=\"0\" id=\"anthropometry_record\" cellpadding=\"0\" align=\"center\" border= \"1\" class=\"table table-condensed\" >
	<thead><tr >
		<th >Date of Counselling</th>
		<th >Submitted By</th>
		<th >Pdf</th>
		<th >&nbsp;&nbsp;</th>
	</tr></thead><tbody>";	
while($stats-> fetch()){
	$name = $fname." ".$mname." ".$lname;
	echo "<tr>";
	
	
	echo "<td>".date("l jS \of F Y",strtotime($approved_date))."</td>";
	echo "<td>".$name."</td>";
	echo "<td><a id=\"view_result\" href=\"\" onclick=\"window.open('anthropometry_result_print.php?appointment_id=$appointment_id1')\" class=\"view_result\"><span class=\"glyphicon glyphicon-file\"></span></a></td>";
	echo "<td ><a id=\"$appointment_id1\" href=\"#\" class=\"delete\"  ><span class=\"glyphicon glyphicon-remove\"></span></a> </td>";
	echo "</tr>";
	
	
}
	echo "</tbody></table></div>";
}
else{
	echo "<div class=\"alert alert-danger\">No Records Found</div>";
}

 ?>

</div>
	</div>
		</div>
	  
	
   <div class="container">
   		<div class="col-md-12">
	  <footer class="modal-footer">
	  
	 
	<p align="left"><?php echo $footer; ?></p>
		
	   </footer>
	   </div>
	   		</div>



</body>


</html>
