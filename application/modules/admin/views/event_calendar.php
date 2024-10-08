
    <!-- MAKE SURE TO ADD THE STYLESHEET -->
<?php $this->load->view('admin_header'); ?>	

<style>
.main_calendar th{
	background-color:#43ef4b;
	text-align:center;
	color:#000000;
	font-size:14px;
}
.main_calendar td{
	text-align:left;
	padding:5px;
	font-size:14px;
}	
.ui-widget-header {
  border: 0px solid #aaaaaa; 
  background:#FFFFFF;
  color: #222222;
  padding: 0px;
  font-weight: normal;
  font-size:16px;
}

.table-condensed>thead>tr>th, .table-condensed>tbody>tr>th, .table-condensed>tfoot>tr>th, .table-condensed>thead>tr>td, .table-condensed>tbody>tr>td, .table-condensed>tfoot>tr>td {
    padding: 10px;
    border: 1px solid #CCCCCC;
}

 #calendar>.ui-datepicker {font-size:30px;}

#calendar> .ui-datepicker .ui-datepicker-title{font-size:30px;}
.ui-state-highlight .ui-state-default {
    background:#eff415;
	
}
.unavailable .ui-state-default{
	 background: #FF0000 ;
}

.table-responsive{

	border-color:#ffffff;
}
	*:focus {
    outline: none;
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
<div id="event_dialog" class="col-md-12"  >

</div>


<div class="container" >
<hr></hr>

<div >
<div class="col-md-8" align="center">
 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 align="center"><i class="fa fa-fw fa-calendar"></i> Events</h2>
                    </div>
                    <div class="panel-body">

	<div class=" table-responsive" id="calendar" style="margin-bottom: 20px; overflow: y; height:500px; " >	



		</div>


		
		</div>

	

</div>



</div>

<div class="col-md-4" >
	 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 align="center"> Upcoming Events</h2>
                    </div>
                    <div class="panel-body">
                    <?php echo "<a href=\"#\"   id=\"#\"  class=\"btn btn-success add_event\">Add Event</a><hr></hr>"; ?>
<div id="events" tabindex="1"  class="well well-sm pre-scrollable" style="min-height: 800px;">

                    	<?php 
if($numRows1>0){
 foreach($events as $row){
	$event_type = $row->event_type_id;

	if($event_type == 4){
		$event_type = $row->custom_event_type;
	}else{
		$event_type = $row->event_type;	
	}


	//$custom_event_type = $row->custom_event_type;
	//$client_name = $row->lname.", ".$row->fname." ".$row->mname;
	$approved_date = $row->approved_date;
	$approved_time_from= date("h:i A",strtotime($row->approved_time_from));
	$approved_time_to= date("h:i A",strtotime($row->approved_time_to));
	$whole_day = $row->whole_day;
	if($whole_day == 1){
		$approved_time= "whole day";
	}else{
		$approved_time= $approved_time_from."-".$approved_time_to;

	}
    $all_rnd = $row->all_rnd;
    $assigned_rnd_id= $row->assigned_rnd_id;
    if($assigned_rnd_id == 0){
    	$name= "all rnd";
    }else{
    	$rnd_name = $row->lname.", ".$row->fname." ".$row->mname;
    }
	
?>
 <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-fw fa-calendar"></i> <?php echo $event_type; ?>
                    </div>
                    <div class="panel-body">
                     <?php echo "<strong>".date("l jS F Y",strtotime($approved_date))."</strong>"; ?>		<br>	
                     <?php echo $approved_time ?>	<br>
                     <?php echo $rnd_name; ?>			<br>			
                    </div></div> 
<?php } }else{
echo "<div class=\"img-thumbnail\">";
	echo "No upcoming events for this month.";
	echo "</div><br><br>";
	}?>

                 

                      </div>
</div>
                    </div>

</div>



</div>
<?php $this->load->view('admin_footer'); ?>	
