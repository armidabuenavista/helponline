$(document).ready(function() {

  
  $("#cho_meter").animate({
    width: "65%"
  }, 1000);
  $("#pro_meter").animate({
    width: "15%"
  }, 1000);
  $("#fat_meter").animate({
    width: "20%"
  }, 1000);
  $("#cal_meter").animate({
    width: "40%"
  }, 1000);
  $('input[type="range"]').focusout(function() {
    $('input[type="number"]').removeClass("error");
  });
  /*$('input[type="number"]').focus(function() {
    $(this).removeClass("error");
});*/
  $('select[name="gender"] ').focus(function() {
    $(this).removeClass("error");
  });
  //$("#stats").hide();
  $("#gender").change({
    key: 'value'
  }, img_gender);
  $("#wtRange").change({
    key: 'value'
  }, calc1_1);
  $("#wt").change({
    key: 'value'
  }, calc1_1);
  $("#wt_opt").change({
    key: 'value',
    key1: 'value1'
  }, wt_conv);
  $("#htRange").change({
    key: 'value',
    key1: 'value1'
  }, calc1_1);
  $("#ht").change({
    key: 'value',
    key1: 'value1'
  }, calc1_1);
  $("#ht_ft").blur({
    key: 'value'
  }, calc1_1);
  $("#ht_in").blur({
    key: 'value'
  }, calc1_1);
  $("#pa_lvl").change(function() {
    var pa_lvl = $(this).val();
    $("#cho_meter").css('width', 0 + '%').attr('aria-valuenow', 0).attr('aria-valuemax', 0);
    $("#pro_meter").css('width', 0 + '%').attr('aria-valuenow', 0).attr('aria-valuemax', 0);
    $("#fat_meter").css('width', 0 + '%').attr('aria-valuenow', 0).attr('aria-valuemax', 0);
    if (pa_lvl == 0) {
      //$("#ter").val('');
      //$("#fast_ter_label").html('');
      ///$("#carbo").val('');
      //$("#fast_carbo_label").html('');
      //$("#pro").val('');
      //$("#fast_pro_label").html('');
      //$("#fat").val('');  
      //$("#fast_fat_label").html('');  
      //$("#fast_pa_lvl_img").hide("fade",1000);
      //alert('dadd');
      return false;
    } else {
      $.ajax({
        url: base_url + 'help/get_pa_lvl_data',
        data: "pa_lvl=" + pa_lvl,
        method: "GET",
        success: function(retrieved_data) {
          // Your code here.. use something like this
          var Obj = retrieved_data;
          // Since your controller produce array of object you can access the value by using this one :
          $.each(Obj, function(index, field) {
            $("#pa_lvl_val").val(field.pa_lvl_val);
            var pa_lvl_img = field.pa_lvl_img;
            $("#pa_lvl_img").html('<img src="' + pa_lvl_img + '" height="350" width="350" alt="Physical Activity Level" />');
            $("#pa_lvl_img").show("fade");
            $("#pa_lvl").attr("title", field.pa_lvl_desc);
            $("#pa_lvl_desc").html('<p>' + field.pa_lvl_desc + '</p>');
            calc5();
          });
        }
      });
    }
  });
  $("#waistRange").change({
    key: 'value'
  }, calc3);
  $("#wc").change({
    key: 'value'
  }, calc3);
  //$("#wc_opt").change({key: 'value',key1: 'value1',key2: 'value2' },circum,calc4);
  $("#wc_opt").change(function() {
    var selected_opt = $(this).val();
    if (selected_opt == "cm") {
      $("#hc_opt").prop('selectedIndex', 1);
      circum();
      calc4();
    } else if (selected_opt == "in") {
      $("#hc_opt").prop('selectedIndex', 0);
      circum();
      calc4();
    }
  });
  $("#hc_opt").change(function() {
    var selected_opt = $(this).val();
    if (selected_opt == "cm") {
      $("#wc_opt").prop('selectedIndex', 1);
      circum();
      calc4();
    } else if (selected_opt == "in") {
      $("#wc_opt").prop('selectedIndex', 0);
      circum();
      calc4();
    }
  });
  $("#hipRange").change({
    key: 'value',
    key1: 'value1'
  }, calc3);
  $("#hc").change({
    key: 'value',
    key1: 'value1'
  }, calc3);
  var d = new Date();
  var year = d.getFullYear();
  d.setFullYear(year);
  $("#mens_date").datepicker({
    changeYear: true,
    changeMonth: true,
    dateFormat: 'mm-dd-yy',
    yearRange: '2016:' + year + '',
    defaultDate: d
  });
  $(document).on("change", '#ask_pregnant', function(e) {
    var ask_pregnant = $('input[name=ask_pregnant]:checked').val();
    var ht = $("#ht").val();
    //alert(ask_pregnant);
    if (ask_pregnant == 1) {
      gestation();
      $("#ask_gestation_div").show();
      $("#ask_lactation_div").hide();
      $("#dbw_hwr").html('The pregnant table used in this site is intended for women with gestational age of 13-40 weeks and height of 127-170 cm only. If you are above or below these ranges, please consult your OB-GYNE. ');
    } else {
      $("#ask_gestation_div").hide();
      $("#ask_lactation_div").show();
      $("#gestation_div").hide();
      $("#mens_div").hide();
      // DBW metric value
      var dbw = ((ht - 100) - ((ht - 100) * 0.1));
      //var dbw_opt= $("#dbw_opt").val();
      var dbw_lbs = Math.round((dbw * 2.2) * 10) / 10;
      $("#dbw").html(Math.round(dbw * 10) / 10 + ' kgs/ ' + dbw_lbs + ' lbs');
      $("#dbw").attr("data-dbw", Math.round(dbw * 10) / 10);
      //$("#dbw_div1").show("fold", 1000);
      //$("#dbw_div").show("fold", 1000);
      //Upper Limit
      var x = Math.round((dbw * 0.1) * 10) / 10;
      var upper_limit = Math.round((dbw + x) * 10) / 10;
      //$("#upper_limit").html(upper_limit +' kgs');
      upper_limit_lbs = Math.round((upper_limit * 2.2) * 10) / 10;
      //Lower Limit
      var y = Math.round((dbw * 0.1) * 10) / 10;
      var lower_limit = Math.round((dbw - y) * 10) / 10;
      $("#dbw_hwr").attr("data-lower_lmt", lower_limit);
      $("#dbw_hwr").attr("data-upper_lmt", upper_limit);
      //$("#lower_limit").html(lower_limit + ' kgs');
      lower_limit_lbs = Math.round((lower_limit * 2.2) * 10) / 10;
      //$("#limit_div").show("fold", 1000);
      $("#dbw_hwr").html('Keep your weight within this range ' + '<strong>' + lower_limit + ' - ' + upper_limit + ' kgs / ' + lower_limit_lbs + ' - ' + upper_limit_lbs + ' lbs </strong>');
      //$("#dbw_div").addClass("img-thumbnail");
    }
  });
  $(document).on("change", '#ask_gestation', function(e) {
    var ask_gestation = $('input[name=ask_gestation]:checked').val();
    //alert(ask_pregnant);
    if (ask_gestation == 1) {
      gestation();
      $("#mens_div").hide();
      $("#gestation_div").show();
      $("#dbw_hwr").html('The pregnant table used in this site is intended for women with gestational age of 13-40 weeks and height of 127-170 cm only. If you are above or below these ranges, please consult your OB-GYNE. ');
      //$("#fast_dbw_div").addClass("img-thumbnail");
      //$("#dbw_ht_div").show();
    } else {
      $("#mens_div").show();
      $("#gestation_div").hide();
      //$("#dbw_hwr").html('The pregnant table used in this site is intended for women with gestational age of 13-40 weeks and height of 127-170 cm only. If you are above or below these ranges, please consult your OB-GYNE. ');
      //calc2();
    }
  });
  $(document).on("change", '#ask_lactation', function(e) {
    var ask_lactation = $('input[name=ask_lactation]:checked').val();
    var dbw = $("#dbw").attr("data-dbw");
    var pa_lvl_val = $("#pa_lvl_val").val();
    if (ask_lactation == 1) {
      if (pa_lvl_val == 0) {
        //$("#cal").val('0');
        $("#cal_label").html('');
        $("#alert").html('Please select physical activity level.');
        $("#alert").addClass("alert alert-danger");
        $("#nutrition_div").hide();
        return false;
      } else {
        $("#nutrition_div").focus();
        $("#nutrition_div").show("highlight");
        $("#alert").html('');
        $("#alert").removeClass("alert alert-danger");
        var cal = Math.round(dbw * pa_lvl_val) + 500;
        var cal_round = Math.ceil((cal + 1) / 50) * 50;
        //$("#ter").show();
        //$("#cal").val(ter_round);
        $("#cal_label").html('<label class="stats-label">Calorie: ' + cal_round + ' kcal' + '</label>');
        $("#cal_label").attr("data-cal", cal_round);
        var cho_round = (cal * .65) / 4;
        $("#cho").val(Math.round(cho_round / 5) * 5);
        $("#cho_bar").html('65%');
        //$("#cho_meter").val(Math.round(cho_round/5)*5);
        $("#cho_meter").attr('title', Math.round(cho_round / 5) * 5);
        //Math.ceil((cho_round +1)/100) *100;
        //Math.ceil((cho_round +1)/100) *100;
        $("#cho_meter").css('width', 65 + '%').attr('aria-valuenow', Math.round(cho_round / 5) * 5).attr('aria-valuemax', cal);
        $("#cho_label").html('<label class="stats-label">Carbohydrate: ' + Math.round(cho_round / 5) * 5 + ' grams </label>');
        $("#cho_label").attr("data-cho", Math.round(cho_round / 5) * 5);
        //Math.ceil((cho_round +1)/100) *100 + ' grams';
        $("#cho_tip").attr('title', Math.round(cho_round / 5) * 5 + ' grams');
        //Math.ceil((cho_round +1)/100) *100 + ' grams';
        //Protein computation
        var pro_round = (cal * .15) / 4;
        // nearest 50
        //document.form1.protein.value = Math.ceil((pro_round +1)/50) *50;
        $("#pro").val(Math.round(pro_round / 5) * 5);
        $("#pro_bar").html('15%');
        //$("#pro_meter").val(Math.round(pro_round/5)*5);
        $("#pro_meter").attr('title', Math.round(pro_round / 5) * 5);
        //Math.ceil((pro_round +1)/50) *50;
        $("#pro_tip").attr('title', Math.round(pro_round / 5) * 5 + ' grams');
        //Math.ceil((pro_round +1)/50) *50;
        $("#pro_meter").css('width', 15 + '%').attr('aria-valuenow', Math.round(pro_round / 5) * 5).attr('aria-valuemax', cal);
        $("#pro_label").html('<label class="stats-label">Protein: ' + Math.round(pro_round / 5) * 5 + ' grams </label>');
        //Math.ceil((pro_round +1)/50) *50 + ' grams';
        $("#pro_label").attr("data-pro", Math.round(pro_round / 5) * 5);
        //Fat computation
        var fat_round = (cal * .2) / 9;
        $("#fat").val(Math.round(fat_round / 5) * 5);
        $("#fat_bar").html('20%');
        //Math.ceil((fat_round +1)/50) *50;
        //$("#fat_meter").val(Math.round(fat_round/5)*5);
        $("#fat_meter").attr('title', Math.round(fat_round / 5) * 5);
        $("#fat_meter").css('width', 20 + '%').attr('aria-valuenow', Math.round(fat_round / 5) * 5).attr('aria-valuemax', cal);
        $("#fat_label").html('<label class="stats-label">Fat: ' + Math.round(fat_round / 5) * 5 + ' grams </label>');
        $("#fat_label").attr("data-fat", Math.round(fat_round / 5) * 5);
        $("#fat_tip").attr('title', Math.round(fat_round / 5) * 5 + ' grams');
      }
    } else {
      $("#gestation_div").hide();
      $("#mens_div").hide();
      calc5();
    }
  });
  $(document).on("change", '#mens_date', function() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) {
      dd = '0' + dd
    }
    if (mm < 10) {
      mm = '0' + mm
    }
    today = mm + '-' + dd + '-' + yyyy;
    var mens_date = $(this).val();
    var date1 = new Date(today);
    var date2 = new Date(mens_date);
    var timeDiff = Math.round(date1 - date2);
    var wks = Math.round(timeDiff / 1000 / 60 / 60 / 24 / 7);
    var ht = $("#ht").val();
    $("#gestation_wks").val(wks);
    console.log(Math.round(timeDiff / 1000 / 60 / 60 / 24 / 7));
    var gestation_wks = $("#gestation_wks").val();
    var ask_pregnant = $('input[name=ask_pregnant]:checked').val();
    if (ht < 127 || ht > 170 || gestation_wks < 13 || gestation_wks > 40) {
      $("#dbw_hwr").html('The pregnant table used in this site is intended for women with gestational age of 13-40 weeks and height of 127-170 cm only. If you are above or below these ranges, please consult your OB-GYNE. ');
      $("#dbw").html(0 + ' - ' + 0 + ' kgs');
    } else {
      gestation();
      /*  $.ajax({
    url:base_url+'help/select_gestation',
    data: 'gestation_wks='+ gestation_wks+'&ht='+ht,
    method:"GET",
     
    success:function(retrieved_data){
         // Your code here.. use something like this
         var Obj = retrieved_data;
         // Since your controller produce array of object you can access the value by using this one : 
         $.each(Obj, function(index, field) {
                 console.log(field.gestation_value);
                $("#dbw").html(field.gestation_value + ' kgs/ ');
                $("#dbw").attr("data-dbw",field.gestation_value);   
            $("#dbw_hwr").html('You should be weighing around ' + '<strong>' + field.gestation_value + ' ' + ' kgs '  + '</strong> by this time. <br><br> <p style="font-size:12px">Data based on Weight-for-Height table at a given weeks of pregnancy: Philippines 2013.</p> ');
            
            
        
            
                        
                        


});
    }
});*/
    }
  });
  $(document).on("keyup", '#gestation_wks', function() {
    var ht = $("#ht").val();
    var gestation_wks = $("#gestation_wks").val();
    var ask_pregnant = $('input[name=ask_pregnant]:checked').val();
    $("#mens_date").val('');
    if (ht < 127 || ht > 170 || gestation_wks < 13 || gestation_wks > 40) {
      $("#dbw_hwr").html('The pregnant table used in this site is intended for women with gestational age of 13-40 weeks and height of 127-170 cm only. If you are above or below these ranges, please consult your OB-GYNE. ');
      $("#dbw").html(0 + ' - ' + 0 + ' kgs');
    } else {
      gestation();
      /* $.ajax({
    url:base_url+'help/select_gestation',
    data: 'gestation_wks='+ gestation_wks+'&ht='+ht,
    method:"GET",
     
    success:function(retrieved_data){
         // Your code here.. use something like this
         var Obj = retrieved_data;
         // Since your controller produce array of object you can access the value by using this one : 
         $.each(Obj, function(index, field) {
              
                $("#dbw").html(field.gestation_value + ' kgs/ ');
                $("#dbw").attr("data-dbw",field.gestation_value);   
            $("#dbw_hwr").html('You should be weighing around ' + '<strong>' + field.gestation_value + ' ' + ' kgs '  + '</strong> by this time. <br><br> <p style="font-size:12px">Data based on Weight-for-Height table at a given weeks of pregnancy: Philippines 2013.</p> ');
            
            
        
            
                        
                        


});
    }
});*/
    }
  });

 



     $(document).on("click", "#save_stat", function() {
  
        var wt = $("#wt").val();
        var wt_opt = $("#wt_opt").val();
        var ht = $("#ht").val();
        var ht_ft = $("#ht_ft").val();
        var ht_in = $("#ht_in").val();
        var bmr = $("#bmr").data("bmr");
        var bmi = $("#bmi").data("bmi");
        var bmi_class = $("#bmi_class").data("bmi_class");
        var dbw = $("#dbw").data("dbw");     
        var lower_limit = $("#dbw_hwr").data("lower_lmt");
        var upper_limit = $("#dbw_hwr").data("upper_lmt");          
        var wc = $("#wc").val();
        var wc_opt = $("#wc_opt").val();
        var risk_indicator = $("#risk_indicator").data("risk_indicator");
        var hc = $("#hc").val();
        var hc_opt = $("#hc_opt").val();
        var whipr = $("#whipr").data("whipr");
        var whipr_class = $("#whipr_class").data("whipr_class");
        var whtr = $("#whtr").data("whtr");
        var whtr_class = $("#whtr_class").data("whtr_class");
        var pa_lvl = $("#pa_lvl").val();
        var cal = $("#cal_label").data("cal");
        var cho = $("#cho_label").data("cho");
        var protein = $("#pro_label").data("pro");
        var fat = $("#fat_label").data("fat");
        var ask_pregnant = $('input[name=ask_pregnant]:checked').val();
        var ask_gestation= $('input[name=ask_gestation]:checked').val();
        var mens_date= $("#mens_date").val();
        var gestation_wks = $("#gestation_wks").val();
        var ask_lactation= $('input[name=ask_lactation]:checked').val();
        var decimal = /^\d{0,4}(\.\d{0,2})?$/;
    
  
        if (wt == '' || !decimal.test(wt) || wt > 500) {
            alert('Please enter a valid weight.');
            return false;
        } else if (ht == '' || !decimal.test(ht)|| ht > 243.8) {
            alert('Please enter a valid height in cm.');
            return false;
        } else if (ht_ft == '' || ht_in == '' || isNaN(ht_ft) || isNaN(ht_in) || ht_ft > 8) {
            alert('Please enter a valid height in ft/in.');
            return false;
        } 
        else if (!decimal.test(bmr)|| bmr == '') {
            alert('Please enter a valid BMR.');
            return false;
        } 
         else if (!decimal.test(bmi) || bmi == '') {
            alert('Please enter a valid BMI.');
            return false;
        } else if (bmi_class == '') {
            alert('Please enter BMI Classification.');
            return false;
        } else if(ask_pregnant == 1 && ask_gestation == 0 && mens_date == ''){
            alert('Please enter date of menstrual period.');
            return false;
        } else if ( dbw == '') {
            alert('Please enter DBW.');
            return false;
        }  /*else if (!decimal.test(lower_limit) || lower_limit == ''){
            alert('Please enter lower limit.');
            return false;
        } else if (!decimal.test(upper_limit) || upper_limit == ''){
            alert('Please enter upper limit.');
            return false;
        }*/ else if (wc == '' || !decimal.test(wc) || wc > 500) {
             alert('Please enter a valid waist circumference.');
             return false;
        } else if (hc == '' || !decimal.test(hc) || hc > 500) {
             alert('Please enter a valid hip circumference.');
             return false;
        } else if (whipr == '' || !decimal.test(whipr)) {
             alert('Please enter waist hip ratio.');
            return false;           
        } else if (whipr_class == '') {
             alert('Please enter waist hip ratio classification.');
             return false;
        } else if (whtr == '' || !decimal.test(whtr)) {
             alert('Please enter a valid waist height ratio.');
             return false;
        } else if (whtr_class == '') {
             alert('Please enter waist height ratio classification.');
             return false;
        } else if (pa_lvl == 0) {
            alert('Please enter physical activity level.');
            return false;
        } else if (!decimal.test(cal) || cal == '') {
            alert('Please enter a valid calorie.');
            return false;
        } else if (!decimal.test(cho) || cho == '') {
            alert('Please enter a valid carbohydrates.');
            return false;
        } else if (!decimal.test(protein) || protein == '') {
            alert('Please enter a valid protein.');
            return false;
        } else if (!decimal.test(fat) || fat == '') {
            alert('Please enter valid fat.');
            return false;
        } else {
            $.ajax({
                type: "POST",
                url: base_url+'help/save_body_stats',
                data: "wt=" + wt + "&wt_opt=" + wt_opt + "&ht=" + ht + "&bmr="+ bmr +"&bmi=" + bmi + "&bmi_class=" + bmi_class + "&dbw=" + dbw +  "&lower_lmt=" + lower_limit + "&upper_lmt=" + upper_limit +  "&wc=" + wc + "&wc_opt=" + wc_opt + "&risk_indicator=" + risk_indicator + "&hc=" + hc + "&hc_opt=" + hc_opt + "&whipr=" + whipr + "&whipr_class=" + whipr_class + "&whtr=" + whtr + "&whtr_class=" + whtr_class + "&pa_lvl="+pa_lvl+"&cal="+cal+"&cho="+cho+"&protein="+protein+"&fat="+fat+"&ask_pregnant="+ask_pregnant+"&ask_gestation="+ask_gestation+"&mens_date="+mens_date+"&gestation_wks="+gestation_wks+"&ask_lactation="+ask_lactation,
                success: function(html) {
                    if (html == 'success') {
                        $("#alert").html("Measurement successfully saved.");
                        $('#alert').addClass('alert alert-success');
                        $('#alert').focus();
                        setTimeout("location.reload(true);", 1000);
                    }  else {
                        $("#alert").html("Error: Something is wrong when saving the data.");
                        $('#alert').addClass('alert alert-danger');
                        $('#alert').focus();
                    }
                },
                beforeSend: function() {
                    $("#alert").html("Loading...");
                    $('#alert').addClass('alert alert-success');
                    $('#alert').focus();
                }
            });
        }
        return false; 
    });





   $(document).on("click", ".delete_body_stats", function() {

    var id = $(this).attr("id");
    var dataString = 'id=' + id;
    var parent = $(this).closest("div");
    var answer = confirm("Are you sure you want to delete from the database?");
    if (answer) {
      console.log(dataString);
      $.ajax({
        type: "POST",
        url: base_url + 'help/delete_body_stats',
        data: dataString,
        cache: false,
        /*beforeSend: function() {
          parent.animate({
            'backgroundColor': '#fb6c6c'
          }, 300).animate({
            opacity: 0.35
          }, "slow");;
        },*/
        success: function() {
          /*parent.slideUp('slow', function() {
            $(this).remove();
          });*/
           $("#alert1").html("Measurement successfully deleted.");
           $('#alert1').addClass('alert alert-success');
           $('#alert1').focus();
          setTimeout("location.reload(true);", 1000);
        }
      });
    } else {
      return false;
    }
    return false;
    // });
  });



  
 


$(document).on("click", "#update_stat", function() {
  
        var wt = $("#wt").val();
        var wt_opt = $("#wt_opt").val();
        var ht = $("#ht").val();
        var ht_ft = $("#ht_ft").val();
        var ht_in = $("#ht_in").val();
        var bmr = $("#bmr").data("bmr");
        var bmi = $("#bmi").data("bmi");
        var bmi_class = $("#bmi_class").data("bmi_class");
        var dbw = $("#dbw").data("dbw");     
        var lower_limit = $("#dbw_hwr").data("lower_lmt");
        var upper_limit = $("#dbw_hwr").data("upper_lmt");          
        var wc = $("#wc").val();
        var wc_opt = $("#wc_opt").val();
        var risk_indicator = $("#risk_indicator").data("risk_indicator");
        var hc = $("#hc").val();
        var hc_opt = $("#hc_opt").val();
        var whipr = $("#whipr").data("whipr");
        var whipr_class = $("#whipr_class").data("whipr_class");
        var whtr = $("#whtr").data("whtr");
        var whtr_class = $("#whtr_class").data("whtr_class");
        var pa_lvl = $("#pa_lvl").val();
    var cal = $("#cal_label").data("cal");
    var cho = $("#cho_label").data("cho");
    var protein = $("#pro_label").data("pro");
    var fat = $("#fat_label").data("fat");
        var ask_pregnant = $('input[name=ask_pregnant]:checked').val();
        var ask_gestation= $('input[name=ask_gestation]:checked').val();
        var mens_date= $("#mens_date").val();
        var gestation_wks = $("#gestation_wks").val();
        var ask_lactation= $('input[name=ask_lactation]:checked').val();
        var decimal = /^\d{0,4}(\.\d{0,2})?$/;
    var id = $("#id").val();    
  
        if (wt == '' || !decimal.test(wt) || wt > 500) {
            alert('Please enter a valid weight.');
            return false;
        } else if (ht == '' || !decimal.test(ht)|| ht > 243.8) {
            alert('Please enter a valid height in cm.');
            return false;
        } else if (ht_ft == '' || ht_in == '' || isNaN(ht_ft) || isNaN(ht_in) || ht_ft > 8) {
            alert('Please enter a valid height in ft/in.');
            return false;
        } else if (!decimal.test(bmr)|| bmr == '') {
            alert('Please enter a valid BMR.');
            return false;
        } else if (!decimal.test(bmi) || bmi == '') {
            alert('Please enter a valid BMI.');
            return false;
        } else if (bmi_class == '') {
            alert('Please enter BMI Classification.');
            return false;
        } else if(ask_pregnant == 1 && ask_gestation == 0 && mens_date == ''){
            alert('Please enter date of menstrual period.');
            return false;
        } else if ( dbw == '') {
            alert('Please enter DBW.');
            return false;
        }  /*else if (!decimal.test(lower_limit) || lower_limit == ''){
            alert('Please enter lower limit.');
            return false;
        } else if (!decimal.test(upper_limit) || upper_limit == ''){
            alert('Please enter upper limit.');
            return false;
        }*/ else if (wc == '' || !decimal.test(wc) || wc > 500) {
             alert('Please enter a valid waist circumference.');
             return false;
        } else if (hc == '' || !decimal.test(hc) || hc > 500) {
             alert('Please enter a valid hip circumference.');
             return false;
        } else if (whipr == '' || !decimal.test(whipr)) {
             alert('Please enter waist hip ratio.');
            return false;           
        } else if (whipr_class == '') {
             alert('Please enter waist hip ratio classification.');
             return false;
        } else if (whtr == '' || !decimal.test(whtr)) {
             alert('Please enter a valid waist height ratio.');
             return false;
        } else if (whtr_class == '') {
             alert('Please enter waist height ratio classification.');
             return false;
        } else if (pa_lvl == 0) {
            alert('Please enter physical activity level.');
            return false;
        } else if (!decimal.test(cal) || cal == '') {
            alert('Please enter a valid calorie.');
            return false;
        } else if (!decimal.test(cho) || cho == '') {
            alert('Please enter a valid carbohydrates.');
            return false;
        } else if (!decimal.test(protein) || protein == '') {
            alert('Please enter a valid protein.');
            return false;
        } else if (!decimal.test(fat) || fat == '') {
            alert('Please enter valid fat.');
            return false;
        } else {
            $.ajax({
                type: "POST",
                url: base_url+'help/update_body_stats',
                data: "wt=" + wt + "&wt_opt=" + wt_opt + "&ht=" + ht + "&bmr="+ bmr +"&bmi=" + bmi + "&bmi_class=" + bmi_class + "&dbw=" + dbw +  "&lower_lmt=" + lower_limit + "&upper_lmt=" + upper_limit +  "&wc=" + wc + "&wc_opt=" + wc_opt + "&risk_indicator=" + risk_indicator + "&hc=" + hc + "&hc_opt=" + hc_opt + "&whipr=" + whipr + "&whipr_class=" + whipr_class + "&whtr=" + whtr + "&whtr_class=" + whtr_class + "&pa_lvl="+pa_lvl+"&cal="+cal+"&cho="+cho+"&protein="+protein+"&fat="+fat+"&ask_pregnant="+ask_pregnant+"&ask_gestation="+ask_gestation+"&mens_date="+mens_date+"&gestation_wks="+gestation_wks+"&ask_lactation="+ask_lactation+"&id="+id,
                success: function(html) {
                  //alert(data);
                    if (html == 'success') {
                        $("#alert").html("Measurement successfully updated.");
                        $('#alert').addClass('alert alert-success');
                        $('#alert').focus();
                        setTimeout("location.reload(true);", 1000);
                    } else if (html == 'error') {
                        $("#alert").html("You have already submitted a record for this appointment. Please try on another appointment. Thank you!");
                        $('#alert').addClass('alert alert-danger');
                        $('#alert').focus();
                    } else if (html == 'error1') {
                        $("#alert").html("Error! Client have already finished on the appointment. Please contact RND personnel for another appointment.");
                        $('#alert').addClass('alert alert-danger');
                        $('#alert').focus();
                    } else {
                        $("#alert").html("Error: Something is wrong when saving the data.");
                        $('#alert').addClass('alert alert-danger');
                        $('#alert').focus();
                    }
                },
                beforeSend: function() {
                    $("#alert").html("Loading...");
                    $('#alert').addClass('alert alert-success');
                    $('#alert').focus();
                }
            });
        }
        return false; 
    });








});