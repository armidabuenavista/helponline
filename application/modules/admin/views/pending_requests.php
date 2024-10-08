
   
<?php $this->load->view('admin_header'); ?>	

<style>
			.table-condensed>thead>tr>th, .table-condensed>tbody>tr>th, .table-condensed>tfoot>tr>th, .table-condensed>thead>tr>td, .table-condensed>tbody>tr>td, .table-condensed>tfoot>tr>td {
    padding: 10px;
    border: 1px solid #CCCCCC;

}
	.ui-widget-header {
       background: #ffffff;
}
.ui-widget{

	font-family: "Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
}
.ui-state-highlight .ui-state-default {
    background:#eff415;
	
}
.unavailable .ui-state-default{
	 background: #FF0000 ;
}
.table-responsive{

	border-color:#ffffff;
}
 /* current input value background color */
.ui-datepicker-current-day
{
    background: #79d2a6;
}
/* today's background color */
.ui-datepicker-today .ui-state-default
{
    background: #79d2a6;

}
		
		</style>


<?php $this->load->view('admin_navbar'); ?>	
<div id="requestdialog"   style="display: none;">
</div>
        <!-- Navigation -->
      
    
            <div class="container">

			<hr></hr>
			<div class="col-md-8">
			</div>
               <div class="col-md-4 table-responsive">

<div id="calendar"></div>
</div>
   
				 
				 <div class="col-md-12">
				 <hr class="colorgraph"></hr>
		<div id="requests_table" >
	
 <?php	
	
	$notification= "There are "."<strong>"."(".$numRows.")"."</strong>"." pending requests found.";
	echo $notification;
	echo "<div class=\"panel panel-default\">
                        <div class=\"panel-heading\">
                            <i class=\"fa fa-history fa-fw\"></i> Pending Requests";
	echo "</div>";
	echo "<div class=\"panel-body\">";
	echo "<div class=\"table-responsive\">";
	echo "<table id=\"requests\" class=\"table table-bordered table-hover table-striped\"    >";
	echo "<thead><tr>";
	echo "<th>Client Name</th>";
	echo "<th>Status</th>";
	echo "<th>Request Date</th>";
	echo "<th>Submitted</th>";
	echo "<th></th>";
	echo "</tr></thead><tbody>";

	foreach($results as $row){
		//$client_id= $row->client_id;
		$datetime= date("Y-m-d");
		$id = $row->id;
		$name= $row->lname.", ".$row->fname." ".$row->mname;
		$stat_id= $row->status_id;
		$status= $row->status;
		$request_date= date("l jS F Y",strtotime($row->request_date));
		$request_time_from = date("h:i A",strtotime($row->time_from));
		$request_time_to= date("h:i A",strtotime($row->time_to));
		$whole_day=$row->whole_day;
		echo "<tr>";
		/* if($stat_id== 2) {
				echo "<td ><a href=\"client_request.php?appointment_id=$id\" >" . $name . "</a></td>";
				echo "<td  style=\"text-align:center;\">".$status."</td>";
				echo "<td>".""."</td>";	
				echo "<td >".date("l jS F Y h:i A",strtotime($row->submitted_on))."</td>";
			}*/		//else{
		$a= strtotime($request_date);
		$b= strtotime($datetime);
		
		if($b>$a){
			echo "<td><a href=\"#\">" . $name . "</a></td>";
		} else {
			echo "<td><a href=\"#\" data-appointment_id=\"$id\" class=\"client_request\">" . $name . "</a></td>";
		}

		echo "<td >".$status."</td>";
		
		if($whole_day == 1){
			echo "<td>".$request_date." - whole day"."</td>";
		} else {
			echo "<td>".$request_date." ".$request_time_from."-".$request_time_to."</td>";
		}

		echo "<td >".date("l jS F Y h:i A",strtotime($row->submitted_on))."</td>";
		echo "<td  style=\"text-align:center;\"><a href=\"#\" id=\"$id\" class=\"delete\" ><span class=\"glyphicon glyphicon-remove\"></span></a></td>";
		
	}

	echo "</tr></tbody></table></div></div></div>";
	?>
        	</div> 
        		</div> 
   
<?php $this->load->view('admin_footer'); ?>	