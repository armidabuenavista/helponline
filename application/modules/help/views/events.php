
    <!-- MAKE SURE TO ADD THE STYLESHEET -->
    <?php $this->load->view('main_header'); ?>

<style>

.ui-widget-header {
  border: 0px solid #aaaaaa; 
  background:#FFFFFF;
  color: #222222;
  padding: 0px;
  font-weight: normal;
  font-size:16px;
}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
    border: 1px solid #d3d3d3;
     background: #FFFFFF; 
    font-weight: normal;
    color: #555555;
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


.ui-widget-content {
    border: 1px solid #DFDDDD;
    
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
<script type="text/javascript">
$(document).ready(function() {
	$("#whole_day").prop('checked', false);
	$("#whole_day_div").show();
	$("#timepick1").prop('disabled', false);
	$(document).on("click", '#whole_day', function() {
		if (document.getElementById("whole_day").checked == true) {
			$("#whole_day_div").hide();
			$("#timepick1").prop('disabled', true);
			$("#whole_day").val('1');
			$("#timepick1").val('');
		} else {
			$("#whole_day_div").show();
			$("#timepick1").prop('disabled', false);
			$("#whole_day").val('0');
			$("#timepick1").val('');
		}
	});
	$(document).on("change", '#type', function() {
		var type = $(this).val();
		if (type == 1) {
			$("#no_of_person_div").hide();
			$("#no_of_person").val('');
			//$('#no_of_person option[value="1"]').attr('selected', true);
		} else if (type == 2) {
			$("#no_of_person_div").show();
			$("#no_of_person").val();
			//$('#no_of_person option[value="1"]').attr('selected', true);
		} else {
			$("#no_of_person_div").hide();
			$("#no_of_person").val();
			//$('#no_of_person option[value="0"]').attr('selected', true);
		}
	});
	$("#timepick1").timepicker({
		timeFormat: 'h:mm TT',
		hourMin: 8,
		hourMax: 17
	});
	$("#timepick2").timepicker({
		timeFormat: 'h:mm TT',
		hourMin: 8,
		hourMax: 17
	});
	$.ajax({
		url: base_url + 'help/get_event_dates',
		method: "GET",
		success: function(retrieved_data) {
			$("#calendar").datepicker({
				dateFormat: 'yy-mm-dd',
				dateFormat: 'yy-mm-dd',
				changeMonth: true,
				changeYear: true,
				showButtonPanel: true,
				//beforeShowDay: event_dates,
				onSelect: function(date) {
					//defined your own method here
					$("#datepick").val(date);
					getdate(date);
				},
				beforeShowDay: function(date) {
					// Your code here.. use something like this
					Obj = retrieved_data;
					var myBadDates = Obj;
					var $return = true;
					var $returnclass = "available";
					$checkdate = $.datepicker.formatDate('yy-mm-dd', date);
					// start loop
					for (var x in myBadDates) {
						$myBadDates = new Array(myBadDates[x]['event_date']);
						for (var i = 0; i < $myBadDates.length; i++)
						//console.log(myBadDates[x]['whole_day']);
							if ($myBadDates[i] == $checkdate) {
							//console.log($myBadDates[i]);
							$return = false;
							if (myBadDates[x]['whole_day'] == 1 && myBadDates[x]['all_rnd'] == 1) {
								$returnclass = "unavailable";
								return [true, 'unavailable', event.text];
							} else {
								$returnclass = "unavailable";
								return [true, 'ui-state-highlight', event.text];
							}
						}
					}
					//end loop
					return [$return, $returnclass];
				}
			});
			//console.log(Obj);
		}
	});
	$.ajax({
		url: base_url + 'help/get_event_dates',
		method: "GET",
		success: function(retrieved_data) {
			$("#datepick").datepicker({
				dateFormat: 'yy-mm-dd',
				//beforeShowDay: event_dates,
				onSelect: function(date) {
					//defined your own method here
					$("#datepick").val(date);
					getdate(date);
				},
				beforeShowDay: function(date) {
					// Your code here.. use something like this
					Obj = retrieved_data;
					var myBadDates = Obj;
					var $return = true;
					var $returnclass = "available";
					$checkdate = $.datepicker.formatDate('yy-mm-dd', date);
					// start loop
					for (var x in myBadDates) {
						$myBadDates = new Array(myBadDates[x]['event_date']);
						for (var i = 0; i < $myBadDates.length; i++)
						//console.log(myBadDates[x]['whole_day']);
							if ($myBadDates[i] == $checkdate) {
							//console.log($myBadDates[i]);
							$return = false;
							if (myBadDates[x]['whole_day'] == 1 && myBadDates[x]['all_rnd'] == 1) {
								$returnclass = "unavailable";
								return [true, 'unavailable', event.text];
							} else {
								$returnclass = "unavailable";
								return [true, 'ui-state-highlight', event.text];
							}
						}
					}
					//end loop
					return [$return, $returnclass];
				}
			});
			//console.log(Obj);
		}
	});
});

function getdate(date) {
	var event_date = date;
	$.ajax({
		type: "POST",
		url: base_url + 'help/get_events',
		data: "event_date=" + event_date,
		success: function(data) {
			$("#events").html(data);
			//$("#events").focus();
			// / alert(data);
		},
	});
}

</script>


   <?php $this->load->view('navbar'); ?>

<div class="container">
<hr></hr>

<?php
$user_type_id = $this->session->user_type_id;
if(isset($_SESSION['logged_in']) && $user_type_id ==3){
$col= "col-md-8";

} else{
$col= "col-md-12";
echo "<div class=\"container\">";
echo "<div class=\"col-md-12\">";
echo "<span class=\"alert alert-success\">Please sign in to create an appointment.</span>";
echo "</div>";
echo "</div>";
echo "<br>";

	}?>
<div class="<?php echo $col;?>">
<div class="col-md-12" align="center">
 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 align="center"><i class="fa fa-fw fa-calendar"></i> Events</h2>
                    </div>
                    <div class="panel-body">

	<div class=" table-responsive" id="calendar" style="margin-bottom: 20px; overflow: y; height:500px; " >	


<?php //echo $this->calendar->generate($year,$month);?>

		</div>
		</div>

		<div id="events" tabindex="1"  class="well well-sm pre-scrollable" style="min-height: 600px; width: 500px; ">
<!-- <?php 
if($numRows>0){
 foreach($events as $row){
	$event_type = $row->event_type;
	$custom_event_type = $row->custom_event_type;
	$approved_date = $row->approved_date;
	$approved_time_to=$row->approved_time_to;
	$whole_day = $row->whole_day;
    $all_rnd = $row->all_rnd;
	$name = $row->lname.", ".$row->fname." ".$row->mname;
?>
 <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-fw fa-calendar"></i> <?php echo $event_type; ?>
                    </div>
                    <div class="panel-body">
                    <label>Approved Date:</label> <?php echo date("l jS F Y",strtotime($approved_date)); ?>		<br>	
                    <label>Approved Time:</label> <?php echo date("h:i A",strtotime($approved_time_to)); ?>	<br>
                    <label>Assigned RND:</label>  <?php echo $name; ?>			<br>			
                    </div></div> 
<?php } }else{
echo "<div >";
	echo "No upcoming events for this month.";
	echo "</div><br><br>";
	}?>
 -->
</div>


</div>



</div>



</div>
<?php
$user_type_id = $this->session->user_type_id;

if(isset($_SESSION['logged_in']) && $user_type_id ==3){
?>
<div class="col-md-4">
<p style="font-size: 12px;">*Office hours from 8:00 A.M. to 5:00 P.M.
Monday to Friday (except holidays)</p>
 <strong>*Required Fields</strong>
<hr ></hr>

<?php
if($this->session->flashdata('item')) {
  $message = $this->session->flashdata('item');
  ?>
<div class="alert alert-<?php echo $message['class'];?>"><?php echo $message['message']; ?></div>
<?php
}

?>

<form id="form" name="form" action="<?php echo base_url();?>help/save_request" method="POST">
<div id="appointment_form" class="col-md-12 form_div"  >
<div id="alert" tabindex="1" style="display: none;">
	<img src="bootstrap(1)/source/fancybox_loading@2x.gif" alt="" class="ajax-loader" />
</div>


    
      	<div class="form-group">
		 <label class="control-label" for="type"><strong>*Type of Request:</strong></label>
	</div>
	<div class="form-group ">
	<select name="type" id="type" class="form-control  ">
		<option value="1">Individual</option>
		<option value="2">Group</option>
	</select>
	</div>
	<div id="no_of_person_div" style="display:none;">
	<div class="form-group" >
		 <label class="control-label" for="no_of_person"><strong>*No. of persons:</strong></label>
	</div>
			   <div class="form-group">
			   <input type="number" id="no_of_person" name="no_of_person" class="form-control  " />
              </div>
           </div>
	<div class="form-group">
		 <label class="control-label" for="datepick" ><strong>*Choose Date:</strong></label>
	</div>

	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                <input type="text" id="datepick" name="datepick" value="<?php  echo $datepick; ?>" class="form-control " placeholder="Enter Date" value="<?php echo $this->input->post('datepick'); ?>"/>
            </div><br>
                  
		  <div class="form-group">
		  	    <label class="control-label" for="whole_day"><strong>Whole day:</strong></label>
		  </div>
		   <div class="form-group">
            <input type="checkbox" name="whole_day" id="whole_day" class="checkbox"   />
          </div>
	<div id="whole_day_div" style="display: block">
	<div class="form-group">
		<label class="control-label" for="timepick"><strong>*Choose Time:</strong></label>
	</div>
            
            <div class="input-group ">
                <span class="input-group-addon"><span class="glyphicon glyphicon-dashboard"></span></span>
                <input type="text" id="timepick1" name="timepick1" class="form-control" placeholder="Enter Time From" value="<?php echo $this->input->post('timepick1'); ?>"/>
        
            </div><br>



             <div class="input-group ">
                <span class="input-group-addon"><span class="glyphicon glyphicon-dashboard"></span></span>
                <input type="text" id="timepick2" name="timepick2" class="form-control" placeholder="Enter Time To" value="<?php echo $this->input->post('timepick2'); ?>"/>
            </div>
      
            <br> 

            </div>


<div class="form-group">
	   <label class="control-label" for="message"> <strong>Message:</strong></label>
</div>
		       <div class="form-group">
           <textarea id="message" name="message" class="form-control  " placeholder="Enter your message here" value="<?php echo $this->input->post('message'); ?>"></textarea>
          </div>
      <div class="form-group">
       
   <button id="submit_appointment" name="submit_appointment" class="btn btn-success"> Submit</button>
	     </div>
 
	 </div>
</div>
</div>
</form>


<?php
}

?>
   <?php $this->load->view('main_footer'); ?>
