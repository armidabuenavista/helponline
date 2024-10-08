
   
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
		
		</style>


     <!-- Navigation -->
      
<?php $this->load->view('admin_navbar'); ?>	

   

            <div class="container">

			<hr></hr>
			
				 
				 <div class="col-md-12">
				 <hr class="colorgraph"></hr>
		<div id="comments_table" >
	
 <?php	
	

	echo "<div class=\"panel panel-default\">
                        <div class=\"panel-heading\">
                            <i class=\"fa fa-comments-o fa-fw\"></i> Comments";
	echo "</div>";
	echo "<div class=\"panel-body\">";
	

	echo "<table id=\"comments\" class=\" table table-bordered table-hover table-striped\">";
	echo "<thead><tr  >";
	echo "<th> Comments</th>";
	
	echo "</tr></thead><tbody>";
		
		foreach ($results0 as $row0){
			$id= $row0->id;
			$name = $row0->name;
			$email_address = $row0->email_address;
			$subject = $row0->subject;
			$message = $row0->message;
			$submitted = date("F d,Y, h:i A",strtotime($row0->submitted_on));
		
echo "<tr>";
echo "<td>";
             echo "<div class=\"panel-group\">";
   echo  "<div class=\"panel panel-default\">";
     echo "<div class=\"panel-heading\">";
        //echo "<h4 class=\"panel-title\">";
          echo "<a data-toggle=\"collapse\" href=\"#collapse".$id."\">"."<strong>".$name." (".$email_address.") ". "</strong>" ."</a> "."<span class=\"pull-right\"><small>".$submitted."</small></span>";
      //  echo "</h4>";
      echo "</div>";
      echo "<div id=\"collapse".$id."\" class=\"panel-collapse collapse\">";
        echo "<div class=\"panel-body\">".$subject."<br>".nl2br($message)."</div>";
       //echo  "<div class=\"panel-footer\">Panel Footer</div>";
      echo "</div>";
    echo "</div>";
  echo "</div>";
echo "</td>";
  echo "</tr>";
			}
  	echo "</tbody>";
           echo "</table>";

	echo "</div>";
	?>
        	</div> 
        		</div> 
   
<?php $this->load->view('admin_footer'); ?>	