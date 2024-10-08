

<style>
.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
    padding: 5px;
    vertical-align: middle;
font-family: "Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
    border-top: 1px solid #dddddd;
	font-size:14px;
}

.form-control{
	width: 150px;
}
.meal_plan_exchange{
	width:50px;
}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
  border: 1px solid #d3d3d3;
  background: #ffffff;
}
/*.ui-widget-content {
	border: 1px solid #dad8d6;
	height:800px;
	font-family: "Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;

}*/


.ui-widget input, .ui-widget select, .ui-widget textarea, .ui-widget button {
    font-family: "Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 14px;
}
i{
	font-size:18px;
}
.badge{
	background-color: #d3592c;
	
}


	</style>
<script>


$(document).ready(function() {
	  $(function() {	 
	$("#meal_div").accordion({   
	 animated: 'bounceslide',
  autoHeight: true, 
  collapsible: true, 
    //set localStorage for current index on activate event
    activate: function(event, ui) {        
        localStorage.setItem("accIndex", $(this).accordion("option", "active"));
    },
    active: parseInt(localStorage.getItem("accIndex"))   
});
});
	  });
</script>