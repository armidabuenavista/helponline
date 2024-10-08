
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
	.dataTables_wrapper .dataTables_paginate .paginate_button {
    padding : 0px;
    margin-left: 0px;
    display: inline;
    border: 0px;
	font-family: "Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    border: 0px;
	font-family: "Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
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
	
	//$notification= "There are "."<strong>"."(".$numRows.")"."</strong>"." pending requests found.";
//	echo $notification;
	echo "<div class=\"panel panel-default\">
                        <div class=\"panel-heading\">
                            <i class=\"fa fa-calendar fa-fw\"></i> Confirmed Requests";
	echo "</div>";
echo "<div class=\"panel-body\">";
		echo "<div class=\"table-responsive\">";
		echo "<table id=\"requests\" class=\"table table-bordered table-hover table-striped\"    >";
		echo "<thead><tr>";
		echo "<th>Client Name</th>";
		echo "<th>Status</th>";
		echo "<th>Approved Date</th>";
		echo "<th>Assigned RND</th>";
	
		echo "</tr></thead><tbody>";

	foreach($results1 as $row){
		//$client_id= $row->client_id;
		$datetime= date("Y-m-d");
		$id = $row->id;
		$name= $row->client_lname.", ".$row->client_fname." ".$row->client_mname;
		$stat_id= $row->status_id;	
		$status= $row->status;
		$approved_date= date("l jS F Y",strtotime($row->approved_date));
		$approved_time= date("h:i A",strtotime($row->approved_time_from));
		$whole_day=$row->whole_day;
		$rnd_id= $row->assigned_rnd_id;
		$assigned_rnd= $row->rnd_lname." ".$row->rnd_fname." ".$row->rnd_mname;		
		echo "<tr>";	
	
			 if($stat_id== 2) {
			
				echo "<td ><a href=\"client_request.php?appointment_id=$id\" >" . $name . "</a></td>";
				echo "<td  style=\"text-align:center;\">".$status."</td>";
				echo "<td>".""."</td>";	
				echo "<td >".date("l jS F Y h:i A",strtotime($row->submitted_on))."</td>";
					
				echo "<td  style=\"text-align:center;\"><a href=\"#\" id=\"$id\" class=\"delete\" ><span class=\"glyphicon glyphicon-remove\"></span></a></td>";	
				
			}
			else{
			$a= strtotime($approved_date);	

			$b= strtotime($datetime);

					
			if($b>$a){
				echo "<td><a href=\"#\">" . $name . "</a></td>";	
			}
			else{
				$a=base_url('admin/help/client_profile/'.$id.'');
				echo "<td><a href=\"$a\">" . $name . "</a></td>";
			}
				
				echo "<td style=\"text-align:center;\">".$status."</td>";
		
		
					if($whole_day == 1){
						echo "<td>".$approved_date." - whole day"."</td>";	
					}
					else{
						echo "<td>".$approved_date." ".$approved_time."</td>";	
					}

			//foreach($results1 as $row1){

				//$rnd_name= $row1->lname." ".$row1->fname." ".$row1->mname;		
				echo "<td >".$assigned_rnd."</td>";
				
		
				
			//}
		}
	}

	echo "</tr></tbody></table></div></div></div>";
	?>
        	</div> 
        		</div> 
				
   
<?php $this->load->view('admin_footer'); ?>	