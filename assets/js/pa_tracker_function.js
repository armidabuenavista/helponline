$(document).ready(function() {
  $.extend($.ui.autocomplete.prototype, {
    _renderItem: function(ul, item) {
      var term = this.element.val(),
        html = item.label.replace(term, "<b>$&</b>");
      return $("<li></li>").data("item.autocomplete", item).append($("<a></a>").html(html)).appendTo(ul);
    }
  });
  $(function() {
    $("#perday_div").accordion({
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
  $("#compare_date").multipleSelect({
    placeholder: "Select Date"
  });
  $(".time").each(function(index) {
    //$(this).on("focus", function() {      
    //var i=  $("#count").val();    
    $(this).timepicker({
      timeFormat: 'h:mm TT',
      //}); 
    });
  });
  $(".duration").each(function(index) {
    //$(this).on("focus", function() {      
    //var i=  $("#count").val();
    var x = $(this).data("count");
    var pa_code = $("#pa_code" + x).val();
    $(this).timepicker({
      timeFormat: 'm',
      minuteMin: 1,
      minuteMax: 720
    });
  });
  $(".duration").each(function(index) {
    $(document).on("change", ".duration", function() {
      var x = $(this).data("count");
      var pa_code = $("#pa_code" + x).val();
      //$(document).on("change", "#duration", function() {
      var duration = $("#duration" + x).val();
      /*if(duration < 1  ||  duration > 60)  {
 
                    alert("Please enter correct duration.");
                    $("#duration"+x).focus();
                    $("#pa_cal"+x).val('');
                    $("#pa_cal_label"+x).html('');
                    return false;   
                }*/
      if (pa_code = '') {
        alert("Please enter physical activity.");
        $("#pa_code" + x).focus();
        return false;
      } else {
        //pa_calc();
        var mets = $("#mets" + x).val();
        var wt = $("#wt").val();
        var duration = $("#duration" + x).val();
        var a = 60;
        //  else{
        //convert duration to hours
        var time_hrs = duration / a;
        var cal = Math.round(((mets * wt) * time_hrs) * 100) / 100;
        $("#pa_cal" + x).val(cal);
        $("#pa_cal_label" + x).html('<strong>' + cal + '</strong>');
        //cal_perday= $row->cal;    
        //a= cal / 1850;
        //b = a*100;
        cal_perday = $("#cal_perday" + x).val();
        totalpa_cal = $("#totalpa_cal" + x).val();
        if (totalpa_cal == 0 || totalpa_cal == "") {
          addpa = $("#pa_cal" + x).val();
          remcal_perday = cal_perday - addpa;
          //totalpa= Number(totalpa_cal) +  Number(addpa);
          a = addpa / cal_perday;
          b = Math.round(a * 100);
          c = Math.round(100 - b);
          $("#totalpa" + x).html('TEE: ' + addpa + ' kcal');
          //console.log(b);
          $("#totalpa" + x).css('width', b + '%');
          $("#totalpa_perday" + x).css('width', c + '%');
          $("#totalpa_perday" + x).html(remcal_perday + ' kcal /day');
        } else {
          addpa = $("#pa_cal" + x).val();
          totalpa = Number(totalpa_cal) + Number(addpa);
          remcal_perday = cal_perday - totalpa;
          a = totalpa / cal_perday;
          b = Math.round(a * 100);
          c = Math.round(100 - b);
          if (totalpa > cal_perday) {
            $("#totalpa" + x).html(totalpa + ' kcal');
            //console.log(b);
            $("#totalpa" + x).css('width', 100 + '%');
            $("#totalpa_perday" + x).css('width', 0 + '%');
            $("#totalpa_perday" + x).html(remcal_perday + ' kcal /day');
          } else {
            $("#totalpa" + x).html('TEE: ' + totalpa + ' kcal');
            //console.log(b);
            $("#totalpa" + x).css('width', b + '%');
            $("#totalpa_perday" + x).css('width', c + '%');
            $("#totalpa_perday" + x).html(remcal_perday + ' kcal /day');
          }
        }
      }
    });
  });
  $(".pa").each(function(index) {
    // $(this).on("change", function() {
    var x = $(this).data("count");
    // var foodlist = $("#foodlist" + i).val();
    $(this).autocomplete({
      source: base_url + 'help/get_pa_data',
      select: function(event, ui) {
        $('#pa' + x).val(ui.item.label);
        $('#pa_code' + x).val(ui.item.pa_code);
        $('#mets' + x).val(ui.item.mets);
        var mets = $("#mets" + x).val();
        var wt = $("#wt").val();
        var duration = $("#duration" + x).val();
        var a = 60;
        //  else{
        //convert duration to hours
        var time_hrs = duration / a;
        var cal = Math.round(((mets * wt) * time_hrs) * 100) / 100;
        $("#pa_cal" + x).val(cal);
        $("#pa_cal_label" + x).html('<strong>' + cal + '</strong>');
        //cal_perday= $row->cal;    
        //a= cal / 1850;
        //b = a*100;
        cal_perday = $("#cal_perday" + x).val();
        totalpa_cal = $("#totalpa_cal" + x).val();
        console.log(totalpa_cal);
        if (totalpa_cal == 0 || totalpa_cal == "") {
          addpa = $("#pa_cal" + x).val();
          remcal_perday = cal_perday - addpa;
          //totalpa= Number(totalpa_cal) +  Number(addpa);
          a = addpa / cal_perday;
          b = Math.round(a * 100);
          c = Math.round(100 - b);
          $("#totalpa" + x).html(addpa + ' kcal');
          console.log(b);
          $("#totalpa" + x).css('width', b + '%');
          $("#totalpa_perday" + x).css('width', c + '%');
          $("#totalpa_perday" + x).html(remcal_perday + ' kcal /day');
        } else {
          addpa = $("#pa_cal" + x).val();
          totalpa = Number(totalpa_cal) + Number(addpa);
          remcal_perday = cal_perday - totalpa;
          a = totalpa / cal_perday;
          b = Math.round(a * 100);
          c = Math.round(100 - b);
          /*$("#totalpa"+x).html(totalpa);
            //console.log(b);
          $("#totalpa"+x).css('width',b +'%'  )  ;
          $("#totalpa_perday"+x).css('width',c +'%'  );
          $("#totalpa_perday"+x).html(total_pa);    */
          if (totalpa > cal_perday) {
            $("#totalpa" + x).html(totalpa + ' kcal');
            //console.log(b);
            //$("#totalpa"+x).css('width',100 +'%'  )  ;
            //$("#totalpa_perday"+x).css('width',0 +'%'  );
            $("#totalpa_perday" + x).html(remcal_perday + ' kcal / day');
          } else {
            $("#totalpa" + x).html(totalpa + ' kcal');
            //console.log(b);
            $("#totalpa" + x).css('width', b + '%');
            $("#totalpa_perday" + x).css('width', c + '%');
            $("#totalpa_perday" + x).html(remcal_perday + ' kcal /day');
          }
        }
      },
      /*change: function(event, ui) {
          if (ui.item == null) {
              $("#fooditem" + i).val('');
              $("#fooditem" + i).focus();
          }
      },
      focus: function(event, ui) {
          this.value = ui.item.pa;
          event.preventDefault(); // Prevent the default focus behavior.
      }*/
    });
    // });  
    //});
  });



  $(function() {
    $("#edit_pa").dialog({
      autoOpen: false,
      resizable: false,
      modal: true,
      width: 'auto',
      create: function(event, ui) {
        // Set max-width
        $(this).parent().css("maxWidth", "900px");
      }
    });
    //$(".ui-dialog-titlebar").hide();
    //$(".ui-dialog").addClass("ui-widget-header");
    $(".ui-dialog").addClass("ui-widget-content");
    $(document).on("click", ".edit_pa", function(e) {
      e.preventDefault();
      var id = $(this).attr("id");
      var dataString = 'id=' + id;
      var count = $(this).data("count");
      $.ajax({
        type: "GET",
        url: base_url + 'help/edit_pa?count=' + count,
        data: dataString,
        success: function(res) {
          $("#edit_pa").html(res);
          $("#edit_pa").dialog("open");
          $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
          $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
        }
      });
    });
  });
  $(".pa1").each(function(index) {
    // $(this).on("change", function() {
    var x = $(this).data("count");
    // var foodlist = $("#foodlist" + i).val();
    $(this).autocomplete({
      source: base_url + 'help/get_pa_data',
      appendTo: $("#edit"),
      select: function(event, ui) {
        $('#pa0' + x).val(ui.item.label);
        $('#pa_code0' + x).val(ui.item.pa_code);
        $('#mets0' + x).val(ui.item.mets);
        var mets = $("#mets0" + x).val();
        var wt = $("#wt").val();
        var duration = $("#duration0" + x).val();
        var a = 0.016667;
        //  else{
        //convert duration to hours
        var time_hrs = Math.round((duration * a) * 100) / 100;
        var cal = Math.round((mets * wt * time_hrs) * 100) / 100;
        $("#pa_cal0" + x).val(cal);
        $("#pa_cal_label0" + x).html('<strong>' + cal + '</strong>');
      },
      /*change: function(event, ui) {
          if (ui.item == null) {
              $("#fooditem" + i).val('');
              $("#fooditem" + i).focus();
          }
      },
      focus: function(event, ui) {
          this.value = ui.item.pa;
          event.preventDefault(); // Prevent the default focus behavior.
      }*/
    });
    // }); 
    //});
  });
  $(".time1").each(function(index) {
    $(this).on("change", function() {
      var x = $(this).data("count");
      var time = $("#time0" + x).val();
      //var timeformat=/^([1-9]|1[0-2]):([0-5]\d)\s?(AM|PM)?$/i;
      if (time) {
        alert("Please enter correct time format.");
        $("#time0" + x).focus();
        $("#pa0" + x).val('0');
        $("#duration0" + x).val('');
        $("#pa_cal0" + x).val('');
        $("#pa_cal_label0" + x).html('');
        return false;
      } else {
        var mets = $("#mets0" + x).val();
        var wt = $("#wt").val();
        var duration = $("#duration0" + x).val();
        var a = 0.016667;
        //  else{
        //convert duration to hours
        var time_hrs = Math.round((duration * a) * 100) / 100;
        var cal = Math.round((mets * wt * time_hrs) * 100) / 100;
        $("#pa_cal0" + x).val(cal);
        $("#pa_cal_label0" + x).html('<strong>' + cal + '</strong>');
        //  } 
      }
    });
  });
  $(".duration1").each(function(index) {
    $(this).on("change", function() {
      var x = $(this).data("count");
      //$(document).on("change", "#duration", function() {
      var duration = $("#duration0" + x).val();
      /*  if(duration < 1  ||  duration > 60)  {
 
          alert("Please enter correct duration.");
          $("#duration1"+x).focus();
          $("#pa_cal1"+x).val('');
          $("#pa_cal_label1"+x).html('');
          return false; 
        } */
      //else{
      var mets = $("#mets0" + x).val();
      var wt = $("#wt").val();
      var duration = $("#duration0" + x).val();
      var a = 0.016667;
      //  else{
      //convert duration to hours
      var time_hrs = Math.round((duration * a) * 100) / 100;
      var cal = Math.round((mets * wt * time_hrs) * 100) / 100;
      $("#pa_cal0" + x).val(cal);
      $("#pa_cal_label0" + x).html('<strong>' + cal + '</strong>');
      //  }
    });
  });


$(".time1").each(function(index) {
  //$(this).on("click", function() {    
  $(this).timepicker({
    timeFormat: 'h:mm TT',
  });
  //  }); 
});
$(".duration1").each(function(index) {
  //$(this).on("focus", function() {    
  //var i=  $("#count").val();  
  $(this).timepicker({
    timeFormat: 'm',
    minuteMin: 1,
    minuteMax: 720
      //  hourMin: 8,
      //hourMax: 17
  });
  }); 
  $(function() {
    $("#compare_pa").dialog({
      autoOpen: false,
      resizable: false,
      modal: true,
      width: 850,
      // height: 850,
      create: function(event, ui) {
        // Set max-width
        $(this).parent().css("maxWidth", "990px");
      }
    });
    //$(".ui-dialog-titlebar").hide();
    //$(".ui-dialog").addClass("ui-widget-header");
    $(".ui-dialog").addClass("ui-widget-content");
    $(document).on("click", "#compare", function(e) {
      e.preventDefault();
      var select_date = [];
      $('.compare_date :selected').each(function(i, selected) {
        select_date[i] = $(selected).val();
      });
      console.log(select_date);
      if (select_date == '') {
        alert('Selection should not be empty.');
        return false; // or e.preventDefault();
      } else {
        var dataString = 'select_date=' + select_date;
        $.ajax({
          type: "GET",
          url: base_url + 'help/compare_pa',
          data: dataString,
          success: function(res) {
            $("#compare_pa").html(res);
            $("#compare_pa").dialog("open");
            $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
            $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
          }
        });
      }
    });
  });
});