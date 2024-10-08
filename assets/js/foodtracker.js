$(document).ready(function() {
  $.extend($.ui.autocomplete.prototype, {
    _renderItem: function(ul, item) {
      var term = this.element.val(),
        html = item.label.replace(term, "<b>$&</b>");
      return $("<li></li>").data("item.autocomplete", item).append($("<a></a>").html(html)).appendTo(ul);
    }
  });
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
  $(".fooditem").each(function(index) {
    // $(this).on("change", function() {
    var x = $(this).data("count");
    var fooditem = $('#fooditem' + x).val();
    //var foodlist = $("#foodlist" + i).val();
    // 'save_food.php?client_id='+client_id
    $(this).autocomplete({
      source: base_url + 'help/get_fooditem_data',

      select: function(event, ui) {
        $('#fooditem' + x).val(ui.item.label);
        $('#fic' + x).val(ui.item.foodcode);
        $('#ep_wt_val' + x).val(ui.item.ep);
        $('#cal' + x).val(ui.item.cal);
        $('#cho' + x).val(ui.item.cho);
        $('#pro' + x).val(ui.item.pro);
        $('#fat' + x).val(ui.item.fat);
        $('#ep_wt' + x).val('');
        //   $('#cooking_method' + x).html(ui.item.cooking_method);
        //$('#conversion_factor' + x).html(ui.item.conversion_factor);
        /*var ep_wt= $('#ep_wt' +x).val();
        var ep_wt_val = $('#ep_wt_val' + x).val();
        var a = Math.round(ep_wt_val/ 100);
        var comp_ep_wt= Math.round(ep_wt * a);
        $('#comp_ep' +x).val(comp_ep_wt);
        var cal = $('#cal' + x).val();
        var cho = $('#cho' + x).val();
        var pro=  $('#pro' + x).val();
        var fat = $('#fat' + x).val();*/
        var comp_cal = 0;
        var comp_cho = 0;
        var comp_pro = 0;
        var comp_fat = 0;
        $('#cal_label' + x).html(comp_cal);
        $('#comp_cal' + x).val(comp_cal);
        $('#cho_label' + x).html(comp_cho);
        $('#comp_cho' + x).val(comp_cho);
        $('#pro_label' + x).html(comp_pro);
        $("#comp_pro" + x).val(comp_pro);
        $('#fat_label' + x).html(comp_fat);
        $('#comp_fat' + x).val(comp_fat);
      },
    });
  });
  $(".ep_wt").each(function(index) {
    $(document).on("change", ".ep_wt", function() {
      var i = $(this).data("count");
      var ep_wt = $('#ep_wt' + i).val();
      var ep_wt_val = $('#ep_wt_val' + i).val();
      if (ep_wt == 0 || ep_wt == '') {
        var cal = $('#cal' + i).val();
        var cho = $('#cho' + i).val();
        var pro = $('#pro' + i).val();
        var fat = $('#fat' + i).val();
        $('#cal_label' + i).html('0');
        $('#comp_cal' + i).val(cal);
        //$('#cal' + i).val(comp_cal);
        $('#cho_label' + i).html('0');
        $('#comp_cho' + i).val(cho);
        //$('#cho' + i).val(comp_cho);
        $('#pro_label' + i).html('0');
        $('#comp_pro' + i).val(pro);
        //$('#pro' + i).val(comp_pro);
        $('#fat_label' + i).html('0');
        $('#comp_fat' + i).val(fat);
      } else {
        var a = ep_wt_val / 100;
        var comp_ep_wt = ep_wt * a;
        $('#comp_ep' + i).val(comp_ep_wt);
        //$('#ep_wt_label' + i).html(comp_ep_wt);
        //  $('#ep_wt_label' +i).attr("data-comp_ep_wt", comp_ep_wt);
        var cal = $('#cal' + i).val();
        var cho = $('#cho' + i).val();
        var pro = $('#pro' + i).val();
        var fat = $('#fat' + i).val();
        var comp_cal = Math.round(((cal * comp_ep_wt) / 100) * 100) / 100;
        var comp_cho = Math.round(((cho * comp_ep_wt) / 100) * 100) / 100;
        var comp_pro = Math.round(((pro * comp_ep_wt) / 100) * 100) / 100;
        var comp_fat = Math.round(((fat * comp_ep_wt) / 100) * 100) / 100;
        $('#cal_label' + i).html(comp_cal);
        $('#comp_cal' + i).val(comp_cal);
        //$('#cal' + i).val(comp_cal);
        $('#cho_label' + i).html(comp_cho);
        $('#comp_cho' + i).val(comp_cho);
        //$('#cho' + i).val(comp_cho);
        $('#pro_label' + i).html(comp_pro);
        $('#comp_pro' + i).val(comp_pro);
        //$('#pro' + i).val(comp_pro);
        $('#fat_label' + i).html(comp_fat);
        $('#comp_fat' + i).val(comp_fat);
      }
    });
  });




   
  $(function() {
    $("#edit_menu").dialog({
      autoOpen: false,
      resizable: false,
      modal: true,
      width: 'auto',
      height: 300,
      create: function(event, ui) {
        // Set max-width
        $(this).parent().css("maxWidth", "600px");
      }
    });
    //$(".ui-dialog").addClass("ui-widget-header");
    $(".ui-dialog").addClass("ui-widget-content");
    $(document).on("click", ".edit_menu", function(e) {
      e.preventDefault();
      var id = $(this).attr("id");
      var dataString = 'id=' + id;
      $.ajax({
        type: "GET",
        url: base_url + 'help/edit_menu',
        data: dataString,
        success: function(res) {
          $("#edit_menu").html(res);
          $("#edit_menu").dialog("open");
          $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
          $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
        }
      });
    });
  });
  $(function() {
    $("#edit_food").dialog({
      autoOpen: false,
      resizable: false,
      modal: true,
      width: 'auto',
      create: function(event, ui) {
        // Set max-width
        $(this).parent().css("maxWidth", "900px");
      }
    });
    //$(".ui-dialog").addClass("ui-widget-header");
    $(".ui-dialog").addClass("ui-widget-content");
    $(document).on("click", ".edit_food", function(e) {
      e.preventDefault();
      var id = $(this).attr("id");
      var dataString = 'id=' + id;
      /*var client_id = $(this).data("client_id");
      var meal_code = $(this).data("meal_code");
      var meal_id = $(this).data("meal_id");
      var menu_id = $(this).data("menu_id");*/
      $.ajax({
        type: "GET",
        url: base_url + 'help/edit_food',
        data: dataString,
        success: function(res) {
          $("#edit_food").html(res);
          $("#edit_food").dialog("open");
          $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
          $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
        }
      });
    });
  });
  $(".ep_wt1").each(function(index) {
    $(this).on("change", function() {
      var i = $(this).data("count");
      var ep_wt = $('#ep_wt0' + i).val();
      var ep_wt_val = $('#ep_wt_val0' + i).val();
      if (ep_wt == 0 || ep_wt == '') {
        var cal = $('#cal0' + i).val();
        var cho = $('#cho0' + i).val();
        var pro = $('#pro0' + i).val();
        var fat = $('#fat0' + i).val();
        $('#cal_label0' + i).html(cal);
        $('#comp_cal0' + i).val(cal);
        //$('#cal' + i).val(comp_cal);
        $('#cho_label0' + i).html(cho);
        $('#comp_cho0' + i).val(cho);
        //$('#cho' + i).val(comp_cho);
        $('#pro_label0' + i).html(pro);
        $('#comp_pro0' + i).val(pro);
        //$('#pro' + i).val(comp_pro);
        $('#fat_label0' + i).html(fat);
        $('#comp_fat0' + i).val(fat);
      } else {
        var a = Math.round(ep_wt_val / 100);
        var comp_ep_wt = Math.round(ep_wt * a);
        $('#comp_ep0' + i).val(comp_ep_wt);
        //$('#ep_wt_label' + i).html(comp_ep_wt);
        //  $('#ep_wt_label' +i).attr("data-comp_ep_wt", comp_ep_wt);
        var cal = $('#cal0' + i).val();
        var cho = $('#cho0' + i).val();
        var pro = $('#pro0' + i).val();
        var fat = $('#fat0' + i).val();
        var comp_cal = Math.round(((cal * comp_ep_wt) / 100) * 100) / 100;
        var comp_cho = Math.round(((cho * comp_ep_wt) / 100) * 100) / 100;
        var comp_pro = Math.round(((pro * comp_ep_wt) / 100) * 100) / 100;
        var comp_fat = Math.round(((fat * comp_ep_wt) / 100) * 100) / 100;
        $('#cal_label0' + i).html(comp_cal);
        $('#comp_cal0' + i).val(comp_cal);
        $('#cho_label0' + i).html(comp_cho);
        $('#comp_cho0' + i).val(comp_cho);
        $('#pro_label0' + i).html(comp_pro);
        $('#comp_pro0' + i).val(comp_pro);
        $('#fat_label0' + i).html(comp_fat);
        $('#comp_fat0' + i).val(comp_fat);
      }
    });
  });
  $(".fooditem1").each(function(index) {
    // $(this).on("change", function() {
    var x = $(this).data("count");
    var fooditem = $('#fooditem0' + x).val();
    //var foodlist = $("#foodlist" + i).val();
    // 'save_food.php?client_id='+client_id
    $(this).autocomplete({
      source: base_url + 'help/get_fooditem_data',
      appendTo: $('#edit'),
      select: function(event, ui) {
        $('#fooditem0' + x).val(ui.item.label);
        $('#fic0' + x).val(ui.item.foodcode);
        $('#ep_wt0' + x).val(ui.item.ep);
        $('#ep_wt_label0' + x).html(ui.item.ep);
        $('#cal0' + x).val(ui.item.cal);
        $('#cho0' + x).val(ui.item.cho);
        $('#pro0' + x).val(ui.item.pro);
        $('#fat0' + x).val(ui.item.fat);
        $('#ep_wt0' + x).val('');
        var ep_wt = $('#ep_wt0' + x).val();
        var ep_wt_val = $('#ep_wt_val0' + x).val();
        var a = Math.round(ep_wt_val / 100);
        var comp_ep_wt = Math.round(ep_wt * a);
        $('#comp_ep0' + x).val(comp_ep_wt);
        var cal = $('#cal0' + x).val();
        var cho = $('#cho0' + x).val();
        var pro = $('#pro0' + x).val();
        var fat = $('#fat0' + x).val();
        var comp_cal = 0;
        var comp_cho = 0;
        var comp_pro = 0;
        var comp_fat = 0;
        $('#cal_label0' + x).html(comp_cal);
        $('#comp_cal0' + x).val(comp_cal);
        $('#cho_label0' + x).html(comp_cho);
        $('#comp_cho0' + x).val(comp_cho);
        $('#pro_label0' + x).html(comp_pro);
        $('#comp_pro0' + x).val(comp_pro);
        $('#fat_label0' + x).html(comp_fat);
        $('#comp_fat0' + x).val(comp_fat);
      },
    });
  });
  //$(".edit_food1").each(function(index) { 
 

  
  //  });
  $(function() {
    $("#copy_menu").dialog({
      autoOpen: false,
      resizable: false,
      modal: true,
      width: 'auto',
      height: 300,
      create: function(event, ui) {
        // Set max-width
        $(this).parent().css("maxWidth", "700px");
      }
    });
    //$(".ui-dialog").addClass("ui-widget-header");
    $(".ui-dialog").addClass("ui-widget-content");
    $(document).on("click", ".copy_menu", function(e) {
      e.preventDefault();
      var id = $(this).attr("id");
      var menu_id = 'id=' + id;
      //var menu_id=  $(this).data("menu_id");
      //    var meal_code=  $(this).data("meal_code");
      //var client_id= $("#client_id").val();
      //var appointment_id= $("#appointment_id").val();
      $.ajax({
        type: "GET",
        url: base_url + 'help/copy_menu',
        data: menu_id,
        success: function(res) {
          $("#copy_menu").html(res);
          $("#copy_menu").dialog("open");
          $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
          $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
        }
      });
    });
  });
});