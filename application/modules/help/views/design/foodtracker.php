<script type="text/javascript">

 $(document).ready(function() {


  $(document).on("change", "#food_entry_date", function() {
    var a = $(this).val();
    //var baseurl = base_url + 'help/search_foodtracker/'+a;
    $('#search_food_date').attr("href", base_url + 'help/search_foodtracker/' + a);
  });
  $(document).on("click", "#food_entry_date", function() {
    $.ajax({
      url: base_url + 'help/get_food_entry_dates',
      //  data: "fast_pa_lvl=" + fast_pa_lvl,
      method: "GET",
      success: function(retrieved_data) {
        // Your code here.. use something like this
        Obj = retrieved_data;
        $("#food_entry_date").datepicker({
          dateFormat: 'yy-mm-dd',
          beforeShowDay: function(a) {
            var myBadDates = Obj;
            var $return = true;
            var $returnclass = "available";
            $checkdate = $.datepicker.formatDate('yy-mm-dd', a);
            // start loop
            for (var x in myBadDates) {
              $myBadDates = new Array(myBadDates[x]['entry_date']);
              for (var i = 0; i < $myBadDates.length; i++)
                if ($myBadDates[i] == $checkdate) {
                  $return = false;
                  $returnclass = "unavailable";
                  return [true, 'ui-state-highlight', event.text];
                }
            }
            //end loop
            return [$return, $returnclass];
          }
        });
      }
    });
  });
  $("#foodtracker").load(base_url + 'help/create_foodtracker');
  //$(".add_menu").each(function(index) {
    
 
  // });
  //});
});
    </script>

<style>
.ui-dialog .ui-dialog-title {
  color:#000000;
font-family:"Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
}
p{
 font-family:"Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;	
}
.table-condensed{
	 font-family:"Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
}
.table-striped {
    font-family:"Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
	border: 1px solid #ddd;
	font-size: 12px;
}
li.ms-select-all{
	padding: 0px 15px 0px 10px;
}
.line{
	border-bottom: 2px solid #ff3333;
}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default,.ui-dialog .ui-dialog-content {
    font-family: "Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
    background: #FFFFFF;
}	
.ui-widget-content a {
    color: #dd4814;
}
/*.ui-menu .ui-menu-item a:focus {
}*/
.ui-widget input, .ui-widget select, .ui-widget textarea, .ui-widget button {
font-family: "Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
}
.ui-state-focus {
background: none !important;
background-color: #dd4814 !important;
color:#ffffff !important;
border: none !important;}
/*.ui-widget-content a:hover {
    background-color: #dd4814;
}*/
.ui-slider .ui-slider-handle {
	border: 1px solid #6d6963;
}
.ui-widget-header {
     border: 0px solid #aaaaaa; 
     background: #FFFFFF;
    color: #222222;
    font-weight: normal;
}
.ui-dialog-content {
    font-family: "Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
    /* border: 1px solid #dad8d6; */
    background: #FFFFFF;
}
.badge{
	font-size: 14px;
}

.ui-state-highlight .ui-state-default {
    background:#eff415;
}
	</style>

<div id="edit_menu"    style="display: none;  " class="col-md-12">
</div>
<div id="edit_food"   style="display: none; " class="col-md-12">
</div>
<div id="copy_menu"   style="display: none;" class="col-md-12">
</div>

<div id="foodtracker">

</div>