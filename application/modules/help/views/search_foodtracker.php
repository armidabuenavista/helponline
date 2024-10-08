<script type="text/javascript">
 $(document).ready(function(){

var entry_date = $("#entry_date").val();

$("#search_foodtracker").load(base_url+'help/create_search_foodtracker/'+entry_date);


   $(document).on("click", "#food_entry_date", function() {
 $.ajax({
    url:base_url+'help/get_food_entry_dates',
  //  data: "fast_pa_lvl=" + fast_pa_lvl,
    method:"GET",
    success:function(retrieved_data){
         // Your code here.. use something like this
         Obj = retrieved_data;


$( "#food_entry_date" ).datepicker({
dateFormat: 'yy-mm-dd',
beforeShowDay: function (a){
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
                return [ true, 'ui-state-highlight', event.text ];
            }
    }
    //end loop
    return [$return, $returnclass];
}





  
}); 





        
    }
});   

 }); 




//$(".add_menu").each(function(index) {
  /* $(document).on("click", ".add_menu", function() {

      var i = $(this).data("meal_id");
      var meal_id = $(this).attr("value");
      var menu_name = $("#menu_name" + i).val();
      //var client_id = $(this).data("client_id");
      var entry_date = $(this).data("entry_date");
      // var ii =  $("#meal_id"+i).val();   
      if (meal_id == '' || isNaN(meal_id)) {
        alert('Please enter meal.');
        return false;
      } else if (menu_name == '') {
        alert('Please enter menu name.');
        return false;
      } else {
        $.ajax({
          type: "POST",
          url: base_url + 'help/save_menu',
          data: "menu_name=" + menu_name + "&value=" + meal_id + '&entry_date=' + entry_date,
          success: function(html) {
            if (html == 'success') {
              $("#alert" + i).html("Menu successfully created!");
              $('#alert' + i).addClass('alert alert-success');
              $("#alert" + i).focus();
              setTimeout("location.reload(true);", 1000);
            } else {
              $("#alert" + i).html("Error: Something is wrong when saving the data.");
              //    alert('Error: Something is wrong when saving the data.');
              $('#alert' + i).addClass('alert alert-danger');
              $("#alert" + i).focus();
            }
          },
        });
        return false;
      }
    });



   //$(".add_food").each(function(index) {
   $(document).on("click", ".add_food", function() {
      //menu_id
      var x = $(this).data("count");
      var ii = $(this).data("meal_id");
      var form_data = new FormData();
      var file_data = $("#aa" + x).prop('files')[0];
      //var file_data = object.get(0).files[i];
      //var other_data = $('form').serialize(); 
      form_data.append('file', file_data);
      var menu_id = $(this).attr("value");
      var meal_id = $("#meal_id" + x).val();
      var fic = $("#fic" + x).val();
      var hh_val = $("#hh_val" + x).val();
      var hh_m = $("#hh_m" + x).val();
      var ep_wt = $("#ep_wt" + x).val();
      var cal = $("#comp_cal" + x).val();
      var cho = $("#comp_cho" + x).val();
      var pro = $("#comp_pro" + x).val();
      var fat = $("#comp_fat" + x).val();
      var entry_date = $(this).data("entry_date");
      if (menu_id == '' || isNaN(menu_id)) {
        alert('Please enter menu.');
        return false;
      } else if (meal_id == '' || isNaN(meal_id)) {
        alert('Please enter meal.');
        return false;
      } else if (fic == '') {
        alert('Please enter fooditem.');
        return false;
      } else if (hh_val == '') {
        alert('Please enter household value.');
        return false;
      } else if (hh_m == 0) {
        alert('Please enter household measure.');
        return false;
      } else {
        $.ajax({
          url: base_url + 'help/save_food?menu_id=' + menu_id + '&meal_id=' + meal_id + '&fic=' + fic + '&hh_val=' + hh_val + '&hh_m=' + hh_m + '&ep_wt=' + ep_wt + '&comp_cal=' + cal + '&comp_cho=' + cho + '&comp_pro=' + pro + '&comp_fat=' + fat + '&entry_date=' + entry_date, // point to server-side PHP script 
          //  url: 'save_food?client_id='+client_id+'&menu_id='+menu_id+'&meal_id='+meal_id+'&fic='+fic+'&hh_val='+hh_val, 
          //dataType: 'text',  // what to expect back from the PHP script, if anything
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          type: "POST",
          success: function(html) {
            //alert(data);
            if (html == 'success') {
              $("#alert" + ii).html("Food successfully saved!");
              $('#alert' + ii).addClass('alert alert-success');
              $("#alert" + ii).focus();
              setTimeout("location.reload(true);", 1000);
            } else {
              $("#alert" + ii).html("Error: Something is wrong when saving the data.");
              //    alert('Error: Something is wrong when saving the data.');
              $('#alert' + ii).addClass('alert alert-danger');
              $("#alert" + ii).focus();
            }
          }
        });
      }
    });

     $(document).on("click", ".delete_food", function() {
    var id = $(this).attr("id");
    var dataString = 'id=' + id;
    var parent = $(this).closest("tr");
    var answer = confirm("Are you sure you want to delete from the database?");
    if (answer) {
      console.log(dataString);
      $.ajax({
        type: "POST",
        url: base_url + 'help/delete_food',
        data: dataString,
        cache: false,
        beforeSend: function() {
          parent.animate({
            'backgroundColor': '#fb6c6c'
          }, 300).animate({
            opacity: 0.35
          }, "slow");;
        },
        success: function(data) {
          parent.slideUp('slow', function() {
            $(this).remove();
          });
          setTimeout("location.reload(true);", 1000);
        }
      });
    } else {
      return false;
    }
    return false;
    // });
  });

    $(document).on("click", ".delete_menu", function() {
    var id = $(this).attr("id");
    var dataString = 'id=' + id;
    var parent = $(this).closest("div");
    var answer = confirm("Are you sure you want to delete from the database?");
    if (answer) {
      $.ajax({
        type: "POST",
        url: base_url + 'help/delete_menu',
        data: dataString,
        cache: false,
       
        success: function() {
          parent.slideUp('slow', function() {
            $(this).remove();
          });
          setTimeout("location.reload(true);", 1000);
        }
      });
    } else {
      return false;
    }
    return false;
  });   */
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

.ui-widget-content {
 
    max-height: 450px;
}
.ui-state-highlight .ui-state-default {
    background:#eff415;
	
}
	</style>
	
       
<div id="edit_menu"    style="display: none;  ">
		
			

</div>

<div id="edit_food"   style="display: none;  ">
		
			

</div>
 
<div id="copy_menu"   style="display: none;">
</div>

<input type="hidden" class="form-control" id="entry_date" name="entry_date" value="<?php echo $entry_date; ?>" />
<div id="search_foodtracker">
</div>