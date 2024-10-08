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

 















});

function img_gender() {
  var gender = $("#gender").val();
  if (gender == 2) {
    $("#bmi_img").show();
    calc1();
    //wt_conv();
  } else if (gender == 1) {
    $("#bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_male-1.svg"   height="450" width="250"/>');
    $("#bmi_img").show();
    calc1();
    //wt_conv();
  } else {
    //  alert('Please select your gender.');
    $("#alert").html('Please select your gender.');
    $("#alert").addClass("alert alert-danger");
    $("#gender").addClass("error");
    $("#alert").focus();
    $('input[type=number]').val('');
    $('input[type=range]').val('');
    $("#bmi_img").html("");
    $("#bmi").html('');
    $("#bmr").html('');
    $("#bmi_class").html('');
    $("#dbw").html('');
    $("#dbw_hwr").html('');
    $("#risk_indicator").html('');
    $("#whipr").html('');
    $("#whipr_class").html('');
    $("#whtr").html('');
    $("#whtr_class").html('');
    $("#pa_lvl").val('0');
    $("#pa_lvl_val").val('');
    $("#pa_lvl_img").html('');
    $("#pa_lvl_desc").html('');
    $("#cho").val('');
    $("#cho_label").html('');
    $("#cho_meter").css('width', 0 + '%').attr('aria-valuenow', 0).attr('aria-valuemax', 0);
    $("#pro").val('');
    $("#pro_label").html('');
    $("#pro_meter").css('width', 0 + '%').attr('aria-valuenow', 0).attr('aria-valuemax', 0);
    $("#fat").val('');
    $("#fat_label").html('');
    $("#fat_meter").css('width', 0 + '%').attr('aria-valuenow', 0).attr('aria-valuemax', 0);
    $("#cal_label").html('');
    return false;
  }
}

function wt_conv() {
  var pp = $("#wt_opt").val();
  var ww = $("#wt").val();
  //Kilogram to pounds
  if (pp == "lbs") {
    var lbs = Math.round((ww * 2.2) * 10) / 10;
    $("#wt").val(lbs);
    $('#wt').prop('min', 66);
    $('#wt').prop('max', 1100);
    $('#wtRange').prop('min', 66);
    $('#wtRange').prop('max', 1100);
    $('#wtRange').prop('value', lbs);
    //calc5();
    //calc1();
  }
  //Pounds to kilograms
  else {
    var kgs = Math.round((ww / 2.2) * 10) / 10;
    $("#wt").val(kgs);
    $('#wt').prop('min', 30);
    $('#wt').prop('max', 500);
    $('#wtRange').prop('min', 30);
    $('#wtRange').prop('max', 500);
    $('#wtRange').prop('value', kgs);
    //calc5();
    //calc1();
  }
}

function ht_conv(aa) {
  var ft = 0,
    inc = 0,
    ht = 0;
  ft = $("#ht_ft").val();
  inc = $("#ht_in").val();
  if (aa == 1 || aa == 2) {
    var ss = Math.round((ft * 12) * 10) / 10;
    //var tot = ss+parseInt(inc);
    var tot = ss + Math.round(inc * 100) / 100;
    var val = tot * 2.54;
    $("#ht").val(Math.round(val * 10) / 10);
    $("#htRange").val(Math.round(val * 10) / 10);
  } else {
    ht = $("#ht").val();
    if (ht != "") {
      var cm = Math.round((ht / 2.54) * 10) / 10;
      var div = parseInt(cm / 12);
      var md = Math.round((cm % 12) * 10) / 10;
      $("#ht_ft").val(div);
      $("#ht_in").val(Math.round(md));
    }
  }
}

function calc1() {
  var gender = $("#gender").val();
  var age = $("#yrs").val();
  var wt = $("#wt").val();
  var ht = $("#ht").val();
  var ht_ft = $("#ht_ft").val();
  var ht_in = $("#ht_in").val();
  var wt_opt = $("#wt_opt").val();
  var decimal = /^\d{0,4}(\.\d{0,2})?$/;
  if (gender == 0) {
    $("#alert").html('Please select your gender.');
    $("#alert").addClass("alert alert-danger");
    $("#gender").addClass("error");
    $("#alert").focus();
    return false;
  } else if (wt == "" || !wt.match(decimal)) {
    //alert("Enter a valid number for weight. Please enter a number with atleast 2 decimal places.");
    $("#alert").html('Enter a valid number for weight. Please enter a number with atleast 2 decimal places.');
    $("#alert").addClass("alert alert-danger");
    $("#wt").addClass("error");
    $("#alert").focus();
    $("#weight_stats_div").hide("highlight");
    /*$("#bmi_div").hide();
    $("#bmi").attr("data-bmi",0);
    $("#bmi_class").attr("data-bmi_class",'');*/
    return false;
  } else if (ht == "" || !ht.match(decimal) || ht < 121.9 || ht > 243.8) {
    //alert("Enter a valid number for height. Please enter a number with atleast 2 decimal places.");   
    $("#alert").html('Enter a valid number for height. Please enter a number with atleast 2 decimal places.');
    $("#alert").addClass("alert alert-danger");
    $("#ht").addClass("error");
    $("#ht_ft").addClass("error");
    $("#ht_in").addClass("error");
    $("#whtr").html('');
    $("#whtr_class").html('');
    $("#alert").focus();
    $("#weight_stats_div").hide("highlight");
    /*$("#bmi_div").hide();
    $("#bmi").attr("data-bmi",0);
    $("#bmi_class").attr("data-bmi_class",'');
        
    $("#dbw_div").hide();
    $("#dbw").val('0');
        
    $("#limit_div").hide();*/
    return false;
  } else if (ht_ft == "" || !ht_ft.match(decimal) || ht_ft < 4 || ht_ft > 8 || ht_in == "" || !ht_in.match(decimal)) {
    $("#alert").html('Enter a valid number in feet that is greater than or equal to 4 feet but less than or equal to 8 feet.');
    $("#alert").addClass("alert alert-danger");
    $("#ht").addClass("error");
    $("#ht_ft").addClass("error");
    $("#ht_in").addClass("error");
    $("#whtr").html('');
    $("#whtr_class").html('');
    $("#alert").focus();
    $("#weight_stats_div").hide("highlight");
    return false;
  } else {
    //calc3();
    //BMI value
    if (wt_opt == "kgs") {
      if (wt < 30 || wt > 500) {
        //$("#bmi_div").hide();
        //$("#bmi").attr("data-bmi",0);
        //$("#bmi_class").attr("data-bmi_class",'');
        //anthrop_reset_form();
        $("#weight_stats_div").hide();
        $("#bmi").attr("data-bmi", 0);
        $("#bmi_class").attr("data-bmi_class", "");
        $("#dbw").attr("data-dbw", 0);
        $("#dbw_hwr").attr("data-lower_lmt", 0);
        $("#dbw_hwr").attr("data-upper_lmt", 0);
        $("#waist_stats_div").hide();
        $("#risk_indicator").attr("data-risk_indicator", "");
        $("#whipr").attr("data-whipr", 0);
        $("#whipr_class").attr("data-whipr_class", "");
        $("#whtr").attr("data-whtr", 0);
        $("#whtr_class").attr("data-whtr_class", "");
        $("#nutrition_div").hide();
        $("#cho_label").attr("data-cho", 0);
        $("#pro_label").attr("data-pro", 0);
        $("#fat_label").attr("data-fat", 0);
        $("#cal_label").attr("data-fat", 0);
        $("#pa_lvl").val('0');
        $("#pa_lvl_val").val('0');
        $("#pa_lvl_img").html('');
        $("#pa_lvl_desc").html('');
        $("#alert").html('Weight should be greater than 30 kgs but less than 500 kgs.');
        $("#alert").addClass("alert alert-danger");
        $("#wt").addClass("error");
        $("#alert").focus();
        return false;
      } else {
        $("#alert").html('');
        $("#alert").removeClass("alert alert-danger");
        var h = ht / 100;
        var bmi = Math.round((wt / (h * h)) * 100) / 100;
        $("#bmi").html(bmi + ' kg/m<sup>2</sup>');
        $("#bmi").attr("data-bmi", bmi);
        $("#weight_stats_div").show();
        //$("#waist_stats_div").show();
        //$("#nutrition_div").show();
        if (gender == 2) {
          //Females:  655 + ( 9.6 * Weight ) + ( 1.8 * Height ) - ( 4.7 x Age )
          var a = 655 + (9.6 * wt) + (1.8 * ht) - (4.7 * age);
          var bmr = Math.round(a * 100) / 100;
          $("#bmr").html(bmr);
          $("#bmr").attr("data-bmr", bmr);
        } else {
          //Males:    66 + ( 13.75 * Weight ) + ( 5 * Height) - ( 6.76 x Age )    
          var a = 66 + (13.75 * wt) + (5 * ht) - (6.76 * age);
          var bmr = Math.round(a * 100) / 100;
          $("#bmr").html(bmr);
          $("#bmr").attr("data-bmr", bmr);
        }
        $("#bmi_img").show("fade");
        $("#bmi_img").focus();
        calc4();
        calc5();
      }
      // Metric bmi_class
      if (bmi < 18.50) {
        $("#bmi_class").html('<a href="#" id="read_bmi"><font color="#ffffff"><strong><u>UNDERWEIGHT</u></strong></font>  </a>');
        if (gender == 2) {
          $("#bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_female-1.svg"   height="450" width="250"/>');
          $("#bmi_img").show();
          $("#bmi_img").focus();
        } else {
          $("#bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_male-1.svg"   height="450" width="250"/>');
          $("#bmi_img").show();
          $("#bmi_img").focus();
        }
        //img_gender();
        //$("#bmi_class").val('Severe Thinness');
        $("#bmi_class").attr("data-bmi_class", 'UNDERWEIGHT');
      } else if (bmi >= 18.50 && bmi <= 24.99) {
        //img_gender();
        $("#bmi_class").html(' <a href="#" id="read_bmi"><font color="#ffffff"><strong><u>NORMAL</u></strong></font></a>');
        $("#bmi_class").attr("data-bmi_class", 'NORMAL');
        if (gender == 2) {
          $("#bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_female-2.svg"   height="450" width="250"/>');
          $("#bmi_img").show();
          $("#bmi_img").focus();
        } else {
          $("#bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_male-1.svg"   height="450" width="250"/>');
          $("#bmi_img").show();
          $("#bmi_img").focus();
        }
      } else if (bmi >= 25.00 && bmi <= 29.99) {
        //img_gender();
        $("#bmi_class").html('<a href="#" id="read_bmi"><font color="#ffffff"><strong><u>OVERWEIGHT</u></strong></font> </a>');
        $("#bmi_class").attr("data-bmi_class", 'OVERWEIGHT');
        if (gender == 2) {
          $("#bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_female-3.svg"   height="450" width="250"/>');
          $("#bmi_img").show();
          $("#bmi_img").focus();
        } else {
          $("#bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_male-1.svg"   height="450" width="250"/>');
          $("#bmi_img").show();
          $("#bmi_img").focus();
        }
      } else if (bmi >= 30.00) {
        //img_gender();
        $("#bmi_class").html('<a href="#" id="read_bmi"><font color="#ffffff"><strong><u>OBESE CLASS I</u> </strong></font>  </a>');
        $("#bmi_class").attr("data-bmi_class", 'OBESE');
        if (gender == 2) {
          $("#bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_female-6.svg"   height="450" width="250"/>');
          $("#bmi_img").show();
          $("#bmi_img").focus();
        } else {
          $("#bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_male-6.svg"   height="450" width="250"/>');
          $("#bmi_img").show();
          $("#bmi_img").focus();
        }
      }
    } else if (wt_opt == "lbs") {
      //var lb = Math.round((wt*2.2)*10)/10;
      if (wt < 66 || wt > 1100) {
        //alert("Weight should be greater than 66 lbs but less than 1100 lbs.");
        $("#weight_stats_div").hide();
        $("#bmi").attr("data-bmi", 0);
        $("#bmi_class").attr("data-bmi_class", "");
        $("#dbw").attr("data-dbw", 0);
        $("#dbw_hwr").attr("data-lower_lmt", 0);
        $("#dbw_hwr").attr("data-upper_lmt", 0);
        $("#waist_stats_div").hide();
        $("#risk_indicator").attr("data-risk_indicator", "");
        $("#whipr").attr("data-whipr", 0);
        $("#whipr_class").attr("data-whipr_class", "");
        $("#whtr").attr("data-whtr", 0);
        $("#whtr_class").attr("data-whtr_class", "");
        $("#nutrition_div").hide();
        $("#cho_label").attr("data-cho", 0);
        $("#pro_label").attr("data-pro", 0);
        $("#fat_label").attr("data-fat", 0);
        $("#cal_label").attr("data-fat", 0);
        $("#alert").html('Weight should be greater than 66 lbs but less than 1100 lbs.');
        $("#alert").addClass("alert alert-danger");
        $("#wt").addClass("error");
        $("#alert").focus();
        return false;
      } else {
        $("#alert").html('');
        $("#alert").removeClass("alert alert-danger");
        var ic = ht * 0.39;
        var bmi_ = Math.round((703 * (wt / (ic * ic))) * 100) / 100;
        //$("#bmi").attr("data-bmi",bmi_);
        $("#bmi").html(bmi_ + ' kg/m<sup>2</sup>');
        $("#bmi").attr("data-bmi", bmi_);
        $("#bmi_img").show();
        $("#bmi_img").focus();
        $("#weight_stats_div").show();
        //$("#waist_stats_div").show();
        //$("#nutrition_div").show();
        if (gender == 2) {
          //Females:  655 + ( 9.6 * Weight ) + ( 1.8 * Height ) - ( 4.7 x Age )
          var a = 655 + (9.6 * wt) + (1.8 * ic) - (4.7 * age);
          var bmr = Math.round(a * 100) / 100;
          $("#bmr").html(bmr);
          $("#bmr").attr("data-bmr", bmr);
        } else {
          //Males:    66 + ( 13.75 * Weight ) + ( 5 * Height) - ( 6.76 x Age )    
          var a = 66 + (13.75 * wt) + (5 * ic) - (6.76 * age);
          var bmr = Math.round(a * 100) / 100;
          $("#bmr").html(bmr);
          $("#bmr").attr("data-bmr", bmr);
        }
        calc5();
      }
      if (bmi_ < 18.50) {
        //img_gender();
        $("#bmi_class").html('<a href="#" id="read_bmi"><font color="#ffffff"><strong><u>UNDERWEIGHT</u> </strong></font>  </a>');
        $("#bmi_class").attr("data-bmi_class", 'UNDERWEIGHT');
        if (gender == 2) {
          $("#bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_female-1.svg"   height="450" width="250"/>');
          $("#bmi_img").show();
          $("#bmi_img").focus();
        } else {
          $("#bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_male-1.svg"   height="450" width="250"/>');
          $("#bmi_img").show();
          $("#bmi_img").focus();
        }
      } else if (bmi_ >= 18.50 && bmi_ <= 24.99) {
        //img_gender();
        $("#bmi_class").html('<a href="#" id="read_bmi"><font color="#ffffff"><strong><u>NORMAL</u> </strong></font> </a>');
        $("#bmi_class").attr("data-bmi_class", 'NORMAL');
        /*$("#bmi_label").html('BMI is <strong>' + bmi_ + ' kg/m2</strong> classified as <font color="#ffffff">NORMAL</font>.');
        $("#bmi_div").show("fold", 1000);
        $("#bmi_div").addClass("img-thumbnail");*/
        if (gender == 2) {
          $("#bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_female-2.svg"   height="450" width="250"/>');
          $("#bmi_img").show();
          $("#bmi_img").focus();
        } else {
          $("#bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_male-2.svg"   height="450" width="250"/>');
          $("#bmi_img").show();
          $("#bmi_img").focus();
        }
      } else if (bmi_ >= 25.00 && bmi_ <= 29.99) {
        //img_gender();
        $("#bmi_class").html('<a href="#" id="read_bmi"><font color="#ffffff"><strong><u>OVERWEIGHT</u> </strong></font>  </a>');
        $("#bmi_class").attr("data-bmi_class", 'OVERWEIGHT');
        if (gender == 2) {
          $("#bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_female-3.svg"   height="450" width="250"/>');
          $("#bmi_img").show();
          $("#bmi_img").focus();
        } else {
          $("#bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_male-3.svg"   height="450" width="250"/>');
          $("#bmi_img").show();
          $("#bmi_img").focus();
        }
      } else if (bmi_ >= 30.00) {
        //img_gender();
        $("#bmi_class").html('<a href="#" id="read_bmi"><font color="#ffffff"><strong><u>OBESE CLASS III</u> </strong></font></a>');
        $("#bmi_class").attr("data-bmi_class", 'OBESE');
        /*$("#bmi_label").html('BMI is <strong>' + bmi_ + ' kg/m2</strong> classified as <font color="#ffffff">OBESE CLASS III</font>.');
        $("#bmi_div").show("fold", 1000);
        $("#bmi_div").addClass("img-thumbnail");*/
        if (gender == 2) {
          $("#bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_female-7.svg"   height="450" width="250"/>');
          $("#bmi_img").show();
          $("#bmi_img").focus();
        } else {
          $("#bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_male-7.svg"   height="450" width="250"/>');
          $("#bmi_img").show();
          $("#bmi_img").focus();
        }
      }
    }
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
}

function calc1_1() {
  var yrs = $("#yrs").val();
  var mos = $("#mos").val();
  var gender = $("#gender").val();
  var wt = $("#wt").val();
  var wt_opt = $("#wt_opt").val();
  var ht = $("#ht").val();
  //alert(age.months);    
  if (yrs >= 19 && mos >= 0) {
    calc1();
  } else {
    if (wt_opt == "kgs") {
      var h = ht / 100;
      //var w= Math.round((wt/2.2)*100) /100;
      var bmi1 = Math.round((wt / (h * h)) * 10) / 10;
      $("#bmi").attr("data-bmi", bmi1);
      //$("#bmi").html(bmi1 + ' kg/m<sup>2</sup>');   
      $("#weight_stats_div").show();
      var bmi = $("#bmi").attr("data-bmi");
    } else if (wt_opt == "lbs") {
      var h = ht * 0.39;
      var bmi1 = Math.round((703 * (wt / (h * h))) * 100) / 100;
      $("#bmi").attr("data-bmi", bmi1);
      $("#weight_stats_div").show();
      var bmi = $("#bmi").attr("data-bmi");
    }
    $.ajax({
      url: base_url + 'help/get_bmi_range',
      data: 'mos=' + mos + '&yrs=' + yrs + '&bmi=' + bmi + '&gender=' + gender,
      method: "GET",
      success: function(retrieved_data) {
        // Your code here.. use something like this
        var Obj = retrieved_data;
        // Since your controller produce array of object you can access the value by using this one : 
        $.each(Obj, function(index, field) {
          var bmi_range = field.bmi_range;
          console.log(field.bmi_range);
          $("#bmi").html(bmi1 + ' kg/m<sup>2</sup>');
          $("#bmi_class").html(field.bmi);
          $("#bmi_class").attr("data-bmi_class", field.bmi);
          $("#bmi_img").html('<img src="' + base_url + 'assets/images/fast/' + field.bmi_photo + '"  height="400"  />');
          $("#bmi_img").show();
          $("#bmi_img").focus();
          if (gender == 1) {
            //Males:    66 + ( 13.75 * Weight ) + ( 5 * Height) - ( 6.76 x Age )    
            var a = 66 + (13.75 * wt) + (5 * h) - (6.76 * yrs);
            var bmr = Math.round(a * 100) / 100;
            console.log(bmr);
            $("#bmr").html(bmr);
            $("#bmr").attr("data-bmr", bmr);
          } else {
            //Females:  655 + ( 9.6 * Weight ) + ( 1.8 * Height ) - ( 4.7 x Age )
            var a = 655 + (9.6 * wt) + (1.8 * h) - (4.7 * yrs);
            var bmr = Math.round(a * 100) / 100;
            $("#bmr").html(bmr);
            $("#bmr").attr("data-bmr", bmr);
            console.log(bmr);
          }
        });
      }
    });
    var gestation_wks = $("#gestation_wks").val();
    $.ajax({
      url: base_url + 'help/select_gestation',
      data: 'gestation_wks=' + gestation_wks + '&ht=' + ht,
      method: "GET",
      success: function(retrieved_data) {
        // Your code here.. use something like this
        var Obj = retrieved_data;
        // Since your controller produce array of object you can access the value by using this one : 
        $.each(Obj, function(index, field) {
          console.log(field.gestation_value);
          $("#dbw").html(field.gestation_value + ' kgs/ ');
          $("#dbw").attr("data-dbw", field.gestation_value);
          $("#dbw_hwr").html('You should be weighing around ' + '<strong>' + field.gestation_value + ' ' + ' kgs ' + '</strong> by this time. <br><br> <p style="font-size:12px">Data based on Weight-for-Height table at a given weeks of pregnancy: Philippines 2013.</p> ');
        });
      }
    });
  }
}

function gestation() {
  var ht = $("#ht").val();
  var gestation_wks = $("#gestation_wks").val();
  var ask_gestation = $('input[name=ask_gestation]:checked').val();
  var gender = $("#gender").val();
  //$("#dbw_ht_div").show();
  if (gender == 1) {
    calc1_1();
  } else {
    $("#female_div").show();
    if (ask_gestation == 1) {
      if (ht < 127 || ht > 170 || gestation_wks < 13 || gestation_wks > 40) {
        $("#dbw").html(0 + ' kgs/ ' + 0 + ' lbs');
        $("#dbw").attr("data-dbw", 0);
        $("#dbw_hwr").html('You should be weighing around ' + '<strong>' + 0 + ' ' + ' kgs ' + '</strong> by this time. <br><br> <p style="font-size:12px">Data based on Weight-for-Height table at a given weeks of pregnancy: Philippines 2013.</p> ');
      } else {
        $.ajax({
          url: base_url + 'help/select_gestation',
          data: 'gestation_wks=' + gestation_wks + '&ht=' + ht,
          method: "GET",
          success: function(retrieved_data) {
            // Your code here.. use something like this
            var Obj = retrieved_data;
            // Since your controller produce array of object you can access the value by using this one : 
            $.each(Obj, function(index, field) {
              console.log(field.gestation_value);
              $("#dbw").html(field.gestation_value + ' kgs/ ');
              $("#dbw").attr("data-dbw", field.gestation_value);
              $("#dbw_hwr").html('You should be weighing around ' + '<strong>' + field.gestation_value + ' ' + ' kgs ' + '</strong> by this time. <br><br> <p style="font-size:12px">Data based on Weight-for-Height table at a given weeks of pregnancy: Philippines 2013.</p> ');
            });
          }
        });
      }
    } else {
      calc1_1();
    }
  }
}

function circum() {
  var wc = $("#wc").val();
  var wc_opt = $("#wc_opt").val();
  var hc = $("#hc").val();
  var hc_opt = $("#hc_opt").val();
  var decimal = /^\d{0,4}(\.\d{0,2})?$/;
  if (wc == "" || !wc.match(decimal) || hc == "" || !hc.match(decimal)) {
    //alert("Enter a valid number for waist/ hip circumference. Please enter a number with atleast 2 decimal places.");
    $("#alert").html('Enter a valid number for waist/ hip circumference. Please enter a number with atleast 2 decimal places.');
    $("#alert").addClass("alert alert-danger");
    $("#wc").addClass("error");
    $("#hc").addClass("error");
    $("#alert").focus();
    return false;
  } else {
    $("#alert").html('');
    $("#alert").removeClass("alert alert-danger");
    //Cm to Inches
    if (wc_opt == "in" && hc_opt == "in") {
      var wc_in = Math.round((wc / 2.54) * 10) / 10;
      $("#wc").val(wc_in);
      $("#waistRange").val(wc_in);
      $('#wc').prop('min', 20);
      $('#wc').prop('max', 70.9);
      $('#waistRange').prop('min', 20);
      $('#waistRange').prop('max', 70.9);
      $('#waistRange').prop('value', wc_in);
      var hc_in = Math.round((hc / 2.54) * 10) / 10;
      $("#hc").val(hc_in);
      $("#hipRange").val(hc_in);
      $('#hc').prop('min', 20);
      $('#hc').prop('max', 70.9);
      $('#hipRange').prop('min', 20);
      $('#hipRange').prop('max', 70.9);
      $('#hipRange').prop('value', hc_in);
      //calc3();
      //calc4();
    }
    //Inches to CM
    else {
      var wc_cm = Math.round((wc * 2.54) * 10) / 10;
      $("#wc").val(wc_cm);
      $("#waistRange").val(wc_cm);
      $('#wc').prop('min', 50.8);
      $('#wc').prop('max', 180);
      $('#waistRange').prop('min', 50.8);
      $('#waistRange').prop('max', 180);
      $('#waistRange').prop('value', wc_cm);
      var hc_cm = Math.round((hc * 2.54) * 10) / 10;
      $("#hc").val(hc_cm);
      $("#hipRange").val(hc_cm);
      $('#hc').prop('min', 50.8);
      $('#hc').prop('max', 180);
      $('#hipRange').prop('min', 50.8);
      $('#hipRange').prop('max', 180);
      $('#hipRange').prop('value', hc_cm);
      //calc3();
      //calc4();    
    }
  }
}

function calc3() {
  var wc = $("#wc").val();
  var wc_opt = $("#wc_opt").val();
  var hc = $("#hc").val();
  var hc_opt = $("#hc_opt").val();
  var gender = $("#gender").val();
  var decimal = /^\d{0,4}(\.\d{0,2})?$/;
  //calc4();
  if (wc == "" || !wc.match(decimal) || hc == "" || !hc.match(decimal)) {
    //alert("Please enter a valid number greater than 50.8 cm/ 20 inches but less than 180 cm / 70.9 inches or a number with atleast 2 decimal places.");
    $("#alert").html('Please enter a valid number greater than 50.8 cm/ 20 inches but less than 180 cm / 70.9 inches or a number with atleast 2 decimal places.');
    $("#alert").addClass("alert alert-danger");
    $("#wc").addClass("error");
    $("#hc").addClass("error");
    $("#whtr").html('');
    $("#whtr_class").html('');
    $("#waist_stats_div").hide();
    $("#whipr").attr("data-whipr", 0);
    $("#whipr_class").attr("data-whipr_class", '');
    $("#risk_indicator").attr("data-risk_indicator", '');
    $("#whtr").attr("data-whtr", 0);
    $("#whtr_class").attr("data-whtr_class", '');
    return false;
  } else {
    if (wc_opt == "in" && hc_opt == "in") {
      if (wc < 20 || wc > 70.9 || hc < 20 || hc > 70.9) {
        //alert("Please enter a valid number greater than 20 inches but less than 70.9 inches or a number with atleast 2 decimal places.");
        $("#alert").html('Please enter a valid number greater than 20 inches but less than 70.9 inches or a number with atleast 2 decimal places.');
        $("#alert").addClass("alert alert-danger");
        $("#wc").addClass("error");
        $("#hc").addClass("error");
        $("#whtr").html('');
        $("#whtr_class").html('');
        $("#risk_indicator").attr("data-risk_indicator", '');
        $("#whipr").attr("data-whipr", 0);
        $("#whipr_class").attr("data-whipr_class", '');
        $("#whtr").attr("data-whtr", 0);
        $("#whtr_class").attr("data-whtr_class", '');
        return false;
      } else {
        var wc = $("#wc").val();
        // whipr 
        //var a= Math.round(wc/2.54)/100;
        //var b = Math.round(hc/2.54)/100
        var whipr = Math.round((wc / hc) * 100) / 100;
        //$("#whipr").val(whipr);
        $("#whipr").html(whipr);
        $("#whipr").attr("data-whipr", whipr);
        //$("#whipr_div").show("fold", 1000);
        //$("#whipr_div").addClass("img-thumbnail");
        calc4();
        $("#alert").html('');
        $("#alert").removeClass("alert alert-danger");
        $("#waist_stats_div").show("highlight");
      }
    } else {
      if (wc < 50.8 || wc > 180 || hc < 50.8 || hc > 180) {
        //alert("Please enter a valid number greater than 50.8 cm but less than 180 cm or a number with atleast 2 decimal places.");
        $("#alert").html('Please enter a valid number greater than 50.8 cm but less than 180 cm or a number with atleast 2 decimal places.');
        $("#alert").addClass("alert alert-danger");
        $("#wc").addClass("error");
        $("#hc").addClass("error");
        $("#whtr").html('');
        $("#whtr_class").html('');
        $("#waist_stats_div").hide();
        $("#risk_indicator").attr("data-risk_indicator", '');
        $("#whipr").attr("data-whipr", 0);
        $("#whipr_class").attr("data-whipr_class", '');
        $("#whtr").attr("data-whtr", 0);
        $("#whtr_class").attr("data-whtr_class", '');
        return false;
      } else {
        var wc = $("#wc").val();
        // whipr 
        //var a= Math.round(wc/2.54)/100;
        //var b = Math.round(hc/2.54)/100
        var whipr = Math.round((wc / hc) * 100) / 100;
        //$("#whipr").val(whipr);
        $("#whipr").html(whipr);
        $("#whipr").attr("data-whipr", whipr);
        $("#waist_stats_div").show("highlight");
        //$("#whipr_div").show("fold", 1000);
        //$("#whipr_div").addClass("img-thumbnail");
        calc4();
        $("#alert").html('');
        $("#alert").removeClass("alert alert-danger");
      }
    }
    ///$("#risk_indicator_div").addClass("img-thumbnail");
    // Waist Circumference bmi_class
    if (gender == 1) {
      if (wc <= 90) {
        //$("#risk_indicator").html('Low Risk');
        //$("#risk_indicator").css( "color", "#ffffff" );
        //$("#risk_indicator_div").show("fold", 1000);
        $("#risk_indicator").html('<font color="#ffffff"><strong>Low Risk</strong></font> <a href=""> </a>');
        $("#risk_indicator").attr("data-risk_indicator", 'Low Risk');
      } else if (wc > 90) {
        $("#risk_indicator").attr("data-risk_indicator", 'High Risk');
        //$("#risk_indicator").css( "color", "#ffffff" );
        //$("#risk_indicator_div").show("fold", 1000);
        $("#risk_indicator").html(' <font color="#ffffff"><strong>High Risk</strong></font> <a href=""> </a>');
      }
    } else if (gender == 2) {
      if (wc <= 80) {
        $("#risk_indicator").attr("data-risk_indicator", 'Low Risk');
        //$("#risk_indicator").css( "color", "#ffffff" );
        //$("#risk_indicator_div").show("fold", 1000);
        $("#risk_indicator").html('<font color="#ffffff"><strong>Low Risk</strong> </font> <a href=""> </a>');
      } else if (wc > 80) {
        $("#risk_indicator").attr("data-risk_indicator", 'High Risk');
        //$("#risk_indicator").css( "color", "#ffffff" );
        //$("#risk_indicator_div").show("fold", 1000);
        $("#risk_indicator").html(' <font color="#ffffff"><strong>High Risk</strong></font> <a href=""> </a>');
      }
    }
    if (gender == 1) {
      if (whipr < 0.90) {
        //$("#whipr_class").val('Low');
        $("#whipr_class").attr("data-whipr_class", 'Low');
        //$("#whipr_class").css( "color", "#ffffff" );      
        $("#whipr_class").html('<font color="#ffffff"><strong>Low Ris</strong>k</font> <a href=""> </a>');
      } else if (whipr >= 0.90) {
        $("#whipr_class").attr("data-whipr_class", 'High');
        //$("#whipr_class").css( "color", "#ffffff" );      
        $("#whipr_class").html('<font color="#ffffff"><strong>High Risk</strong></font> <a href=""> </a>');
      }
    } else if (gender == 2) {
      if (whipr < 0.85) {
        $("#whipr_class").attr("data-whipr_class", 'Low');
        //$("#whipr_class").css( "color", "#ffffff" );      
        $("#whipr_class").html('<font color="#ffffff"><strong>Low Risk</strong></font> <a href=""> </a>');
      } else if (whipr >= 0.85) {
        $("#whipr_class").attr("data-whipr_class", 'High');
        //$("#whipr_class").css( "color", "#ffffff" );      
        $("#whipr_class").html('<font color="#ffffff"><strong>High Risk</strong></font> <a href=""> </a>');
      }
    }
  }
}

function calc4() {
  //Waist Height Calculator
  var wc = $("#wc").val();
  var wc_opt = $("#wc_opt").val();
  var ht = $("#ht").val();
  var decimal = /^\d{0,4}(\.\d{0,2})?$/;
  if (wc_opt == "in") {
    if (wc == "" || ht == "" || !ht.match(decimal) || ht < 121.9 || ht > 243.8) {
      $("#alert").html('Please enter a valid number for height and waist hip circumference. Please enter a number with atleast 2 decimal places.');
      $("#alert").addClass("alert alert-danger");
      $("#ht").addClass("error");
      $("#ht_in").addClass("error");
      $("#ht_ft").addClass("error");
      $("#whtr").html('');
      $("#whtr_class").html('');
      $("#waist_stats_div").hide();
      $("#risk_indicator").attr("data-risk_indicator", '');
      $("#whipr").attr("data-whipr", 0);
      $("#whipr_class").attr("data-whipr_class", '');
      $("#whtr").attr("data-whtr", 0);
      $("#whtr_class").attr("data-whtr_class", '');
      return false;
    } else {
      $("#alert").html('');
      $("#alert").removeClass("alert alert-danger");
      var wc_cm = Math.round((wc * 2.54) * 10) / 10;
      var whtr = Math.round((wc_cm / ht) * 100) / 100;
      $("#whtr").attr("data-whtr", whtr);
      $("#waist_stats_div").show("highlight");
      //var whtr= Math.round((wc/2.54)*100)/100;    
    }
  } else {
    if (wc == "" || ht == "" || !ht.match(decimal) || ht < 121.9 || ht > 243.8) {
      $("#alert").html('Please enter a valid number for height and waist hip circumference. Please enter a number with atleast 2 decimal places.');
      $("#alert").addClass("alert alert-danger");
      $("#ht").addClass("error");
      $("#ht_in").addClass("error");
      $("#ht_ft").addClass("error");
      $("#whtr").html('');
      $("#whtr_class").html('');
      $("#waist_stats_div").hide();
      $("#risk_indicator").attr("data-risk_indicator", '');
      $("#whipr").attr("data-whipr", 0);
      $("#whipr_class").attr("data-whipr_class", '');
      $("#whtr").attr("data-whtr", 0);
      $("#whtr_class").attr("data-whtr_class", '');
      return false;
    } else {
      $("#alert").html('');
      $("#alert").removeClass("alert alert-danger");
      //var wc_in = Math.round((wc/2.54)*10)/10;    
      var whtr = Math.round((wc / ht) * 100) / 100;
      $("#whtr").attr("data-whtr", whtr);
      $("#waist_stats_div").show("highlight");
      //var whtr= Math.round((wc/2.54)*100)/100;    
    }
  }
  //$("#whtr").val(whtr);
  $("#whtr").html(whtr);
  $("#whtr").attr("data-whtr", whtr);
  //$("#whtr_div").show("fold", 1000);
  //$("#whtr_div").addClass("img-thumbnail");
  if (whtr <= 0.5) {
    $("#whtr_class").attr("data-whtr_class", 'Low Risk');
    //$("#whtr_div").show("fold", 1000);
    $("#whtr_class").html('<font color="#ffffff"><strong>Low Risk</strong></font> <a href=""> </a>');
  } else if (whtr > 0.5) {
    $("#whtr_class").attr("data-whtr_class", 'At Risk to Noncommunicable diseases (NCDs)');
    //$("#whtr_div").show("fold", 1000);
    $("#whtr_class").html('<font color="#ffffff"><strong>At Risk to Noncommunicable diseases (NCDs)</strong></font> <a href=""> </a>');
  }
}

function calc5() {
  // Total energy requirement
  var dbw = $("#dbw").attr("data-dbw");
  //var select_wt =$("#select_wt").val();
  var pa_lvl_val = $("#pa_lvl_val").val();
  //var cal =$("#cal").val();
  if (dbw == 0 || dbw == '') {
    $("#alert").html('Enter a valid number for desirable body weight. Please enter a number with atleast 2 decimal places.');
    $("#alert").addClass("alert alert-danger");
    $("#alert").focus();
    $("#nutrition_div").hide("highlight");
    return false;
  } else {
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
      var cal = Math.round(dbw * pa_lvl_val);
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
  }
}
/*function foodtracker_date(mydate){
    var myBadDates = Obj;
    var $return = true;
    var $returnclass = "available";
    $checkdate = $.datepicker.formatDate('yy-mm-dd', mydate);
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
}*/
/*      function patracker_date(mydate){
    
    var myBadDates = Obj;
    var $return = true;
    var $returnclass = "available";
    $checkdate = $.datepicker.formatDate('yy-mm-dd', mydate);
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
    
}   */