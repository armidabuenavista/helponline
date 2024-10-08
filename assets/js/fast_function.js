$(document).ready(function() {
  var d = new Date();
  var year = d.getFullYear();
  d.setFullYear(year);
  $(".dob").datepicker({
    changeYear: true,
    changeMonth: true,
    dateFormat: 'mm-dd-yy',
    yearRange: '1930:' + year + '',
    defaultDate: d
  });
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
  //calc1_1();
  //calc2();
  //calc3();
  //calc4();
  //calc5();
  //calc6();
  $("#dob").change({
    key: 'value'
  }, calc1_1);
  $(".gender-a").change({
    key: 'value'
  }, calc1_1);
  $(".gender-d").change({
    key: 'value'
  }, calc2_1);
  $("#fast_wtRange").change({
    key: 'value'
  }, calc1_1);
  $("#fast_wt").change({
    key: 'value'
  }, calc1_1);
  $("#fast_wt_opt").change({
    key: 'value',
    key1: 'value1'
  }, wt_conv);
  $("#fast_htRange").change({
    key: 'value',
    key1: 'value1'
  }, calc1_1);
  $("#fast_ht").change({
    key: 'value',
    key1: 'value1'
  }, calc1_1);
  $("#fast_ht_ft").change({
    key: 'value'
  }, calc1_1);
  $("#fast_ht_in").change({
    key: 'value'
  }, calc1_1);
  $("#dob1").change({
    key: 'value'
  }, calc2_1);
  $("#fast_htRange1").change({
    key: 'value',
    key1: 'value1'
  }, calc2_1);
  $("#fast_ht1").change({
    key: 'value',
    key1: 'value1'
  }, calc2_1);
  $("#fast_ht_ft1").blur({
    key: 'value'
  }, calc2_1);
  $("#fast_ht_in1").blur({
    key: 'value'
  }, calc2_1);
  $("#age_group").change({
    key: 'value'
  }, calc3_1);
  $("#fast_pa_lvl").change(function() {
    //var pa_lvl= document.getElementById("fast_pa_lvl").value;
    var fast_pa_lvl = $("#fast_pa_lvl").val();
    if (fast_pa_lvl == 0) {
      //$("#ter").val('');
      $("#fast_ter_label").html('');
      //$("#carbo").val('');
      $("#fast_carbo_label").html('');
      //$("#pro").val('');
      $("#fast_pro_label").html('');
      //$("#fat").val('');  
      $("#fast_fat_label").html('');
      $("#fast_pa_lvl_img").hide("fade", 1000);
      //alert('dadd');
      return false;
    } else {
      $.ajax({
        url: base_url + 'help/get_pa_lvl_data',
        data: "fast_pa_lvl=" + fast_pa_lvl,
        method: "GET",
        success: function(retrieved_data) {
          // Your code here.. use something like this
          var Obj = retrieved_data;
          // Since your controller produce array of object you can access the value by using this one : 
          $.each(Obj, function(index, field) {
            $("#fast_pa_lvl_val").val(field.pa_lvl_val);
            var pa_lvl_img = field.pa_lvl_img;
            $("#fast_pa_lvl_img").html('<img src="' + pa_lvl_img + '" height="350" width="350" alt="Physical Activity Level" />');
            $("#fast_pa_lvl_img").show("fade", 1000);
            $("#fast_pa_lvl").attr("title", field.pa_lvl_desc);
            $("#fast_pa_lvl_desc").html(field.pa_lvl_desc);
            calc3_1();
          });
        }
      });
    }
  });
  $("#fast_htRange2").change({
    key: 'value',
    key1: 'value1'
  }, calc3_1);
  $("#fast_ht_ft2").blur({
    key: 'value'
  }, calc3_1);
  $("#fast_ht_in2").blur({
    key: 'value'
  }, calc3_1);
  $("#fast_waistRange").change({
    key: 'value',
    key1: 'value1'
  }, calc4);
  $("#fast_wc").change({
    key: 'value',
    key1: 'value1',
    key2: 'value2'
  }, calc4);
  $("#fast_wc_opt").change({
    key: 'value',
    key1: 'value1'
  }, circum);
  $(".gender-b").change({
    key: 'value'
  }, calc4);
  $("#fast_waistRange1").change({
    key: 'value',
    key1: 'value1'
  }, calc5);
  $("#fast_wc1").change({
    key: 'value',
    key1: 'value1'
  }, calc5);
  $("#fast_wc_opt1").change(function() {
    var selected_opt = $(this).val();
    if (selected_opt == "cm") {
      $("#fast_hc_opt").prop('selectedIndex', 1);
      circum1();
    } else if (selected_opt == "in") {
      $("#fast_hc_opt").prop('selectedIndex', 0);
      circum1();
    }
  });
  $("#fast_hc_opt").change(function() {
    var selected_opt = $(this).val();
    if (selected_opt == "cm") {
      $("#fast_wc_opt1").prop('selectedIndex', 1);
      circum1();
    } else if (selected_opt == "in") {
      $("#fast_wc_opt1").prop('selectedIndex', 0);
      circum1();
    }
  });
  //$("#fast_wc_opt1").change({key: 'value',key1: 'value1' },circum1);
  $("#fast_hipRange").change({
    key: 'value',
    key1: 'value1'
  }, calc5);
  $("#fast_hc").change({
    key: 'value',
    key1: 'value1'
  }, calc5);
  //$("#fast_hc_opt").change({key: 'value',key1: 'value1' },h_circum);
  $("#fast_wc2").change({
    key: 'value',
    key1: 'value1'
  }, calc6);
  $("#fast_wc_opt2").change({
    key: 'value',
    key1: 'value1'
  }, circum2);
  $("#fast_waistRange2").change({
    key: 'value',
    key1: 'value1'
  }, calc6);
  $("#fast_htRange3").change({
    key: 'value',
    key1: 'value1'
  }, calc6);
  $("#fast_ht3").change({
    key: 'value',
    key1: 'value1'
  }, calc6);
  $("#fast_ht_ft3").blur({
    key: 'value'
  }, calc6);
  $("#fast_ht_in3").blur({
    key: 'value'
  }, calc6);
  $(".gender-c").change({
    key: 'value'
  }, calc6);
  $(".gender-f").change({
    key: 'value',
    key1: 'value1'
  }, calc3_1);
  $(document).on("change", "#fast_wt_opt", function() {
    var selected_opt = $(this).val();
    $.ajax({
      type: "POST",
      url: base_url + 'help/rangeList',
      data: "selected_opt=" + selected_opt,
      success: function(data) {
        $("#wt_rangeList").html(data);
        //alert(data);
      },
    });
  });
  $(document).on("change", "#fast_wc_opt", function() {
    var selected_opt = $(this).val();
    $.ajax({
      type: "POST",
      url: base_url + 'help/rangeList',
      data: "selected_opt=" + selected_opt,
      success: function(data) {
        $("#wc_rangeList").html(data);
        //alert(data);
      },
    });
  });
  $(document).on("mouseenter mouseleave", "#fast_waistRange1", function() {
    $(document).on("blur", "#fast_wc_opt1", function() {
      var selected_opt = $(this).val();
      $.ajax({
        type: "POST",
        url: base_url + 'help/rangeList',
        data: "selected_opt=" + selected_opt,
        success: function(data) {
          $("#wc_rangeList1").html(data);
          $("#hc_rangeList").html(data);
          //alert(data);
        },
      });
    });
  });
  $(document).on("mouseenter mouseleave", "#fast_hipRange", function() {
    $(document).on("blur", "#fast_hc_opt", function() {
      var selected_opt = $(this).val();
      $.ajax({
        type: "POST",
        url: base_url + 'help/rangeList',
        data: "selected_opt=" + selected_opt,
        success: function(data) {
          $("#wc_rangeList1").html(data);
          $("#hc_rangeList").html(data);
          //alert(data);
        },
      });
    });
  });
  $(document).on("change", "#fast_wc_opt2", function() {
    var selected_opt = $(this).val();
    $.ajax({
      type: "POST",
      url: base_url + 'help/rangeList',
      data: "selected_opt=" + selected_opt,
      success: function(data) {
        $("#wc_rangeList2").html(data);
      },
    });
  });
  $(document).on("change", ".gender-f", function() {
    var selected_opt = $(this).val();
    $.ajax({
      type: "POST",
      url: base_url + 'help/get_age_group',
      data: "selected_opt=" + selected_opt,
      success: function(data) {
        $("#age_group").html(data);
        $("#fast_ter_label").html('<strong>YOU NEED ' + '<a href="#"  class="btn btn-success btn-lg" style="color: #ffffff; font-size:20px;" >' + '' + '</a>' + ' <a href="#" class="link" id="calorie">KCAL</a> PER DAY DISTRIBUTED AS FOLLOWS: </strong>');
        var ter_round = 0;
        var carbo = 0;
        var carbo_round = Math.round(carbo / 5) * 5;
        $("#fast_carbo_label").html('<strong>' + carbo_round + ' grams</strong>');
        $("#fast_carbo").val(carbo_round);
        var pro = 0;
        var pro_round = Math.round(pro / 5) * 5;
        $("#fast_pro_label").html('<strong>' + pro_round + ' grams</strong>');
        $("#fast_pro").val(pro_round);
        var fat = 0;
        var fat_round = Math.round(fat / 5) * 5;
        $("#fast_fat_label").html('<strong>' + fat_round + ' grams</strong>');
        $("#fast_fat").val(fat_round);
        //alert(data);
      },
    });
  });
  $(document).on("change", '#fast_dbw_opt', function() {
    var dbw = $("#fast_dbw_val").val();
    var dbw_opt = $(this).val();
    var yrs1 = $("#yrs1").val();
    var mos1 = $("#mos1").val();
    var ask_pregnant = $('input[name=ask_pregnant]:checked').val();
    var fast_gender = $('.gender-d :selected').val();
    if (fast_gender == 1) {
      if (yrs1 >= 0 && yrs1 <= 10) {
        var lower = $("#fast_dbw_lower_val").val();
        var upper = $("#fast_dbw_upper_val").val();
        if (dbw_opt == 'lbs') {
          var lower_limit_lbs = Math.round((lower * 2.2) * 10) / 10;
          var upper_limit_lbs = Math.round((upper * 2.2) * 10) / 10;
          $("#fast_dbw_lower_val").val(lower_limit_lbs);
          $("#fast_dbw_upper_val").val(upper_limit_lbs);
          $("#fast_dbw").html(lower_limit_lbs + ' - ' + upper_limit_lbs + ' lbs');
          $("#fast_dbw_label").html('Keep your weight within this range ' + '<strong>' + lower_limit_lbs + ' - ' + upper_limit_lbs + ' lbs' + ' </strong>. You can achieve your DBW by eating a healthy and balanced diet and engaging in moderate physical activity like jogging, brisk walking and aerobic dancing.<br><br> <p style="font-size:12px">Weight range is based on the WHO Weight-for-age growth charts.</p>');
        } else {
          var lower_limit_kgs = Math.round((lower / 2.2) * 10) / 10;
          var upper_limit_kgs = Math.round((upper / 2.2) * 10) / 10;
          $("#fast_dbw_lower_val").val(lower_limit_kgs);
          $("#fast_dbw_upper_val").val(upper_limit_kgs);
          $("#fast_dbw").html(lower_limit_kgs + ' - ' + upper_limit_kgs + ' kgs');
          $("#fast_dbw_label").html('Keep your weight within this range ' + '<strong>' + lower_limit_kgs + ' - ' + upper_limit_kgs + ' kgs' + ' </strong>. You can achieve your DBW by eating a healthy and balanced diet and engaging in moderate physical activity like jogging, brisk walking and aerobic dancing.<br><br> <p style="font-size:12px">Weight range is based on the WHO Weight-for-age growth charts.</p>');
        }
      } else {
        if (dbw_opt == 'lbs') {
          var dbw_lbs = Math.round((dbw * 2.2) * 10) / 10;
          $("#fast_dbw_val").val(dbw_lbs);
          //Upper Limit
          var x = Math.round((dbw_lbs * 0.1) * 10) / 10;
          var upper_limit1 = Math.round((dbw_lbs + x) * 10) / 10;
          var upper_limit11 = Math.round((upper_limit1) * 10) / 10;
          //Lower Limit
          var y = Math.round((dbw_lbs * 0.1) * 10) / 10;
          var lower_limit1 = Math.round((dbw_lbs - y) * 10) / 10;
          var lower_limit11 = Math.round((lower_limit1) * 10) / 10;
          $("#fast_dbw").html(dbw_lbs + ' lbs');
          $("#fast_dbw_label").html('Your desirable body weight is ' + '<strong>' + dbw_lbs + ' ' + ' kgs ' + '</strong>. ' + 'Keep your weight within this range ' + '<strong>' + lower_limit11 + ' - ' + upper_limit11 + ' lbs ' + ' </strong>. You can achieve your DBW by eating a healthy and balanced diet and engaging in moderate physical activity like jogging, brisk walking and aerobic dancing.');
        } else {
          var dbw_kgs = Math.round((dbw / 2.2) * 10) / 10;
          $("#fast_dbw_val").val(dbw_kgs);
          $("#fast_dbw").html(dbw_kgs + ' kgs');
          //Upper Limit
          var x = Math.round((dbw_kgs * 0.1) * 10) / 10;
          var upper_limit = Math.round((dbw_kgs + x) * 10) / 10;
          var upper_limit1 = Math.round((upper_limit) * 10) / 10;
          //Lower Limit
          var y = Math.round((dbw_kgs * 0.1) * 10) / 10;
          var lower_limit = Math.round((dbw_kgs - y) * 10) / 10;
          var lower_limit1 = Math.round((lower_limit) * 10) / 10;
          $("#fast_dbw_label").html('Your desirable body weight is ' + '<strong>' + dbw_kgs + ' ' + ' kgs ' + '</strong>. ' + 'Keep your weight within this range ' + '<strong>' + lower_limit1 + ' - ' + upper_limit1 + ' kgs ' + ' </strong>. You can achieve your DBW by eating a healthy and balanced diet and engaging in moderate physical activity like jogging, brisk walking and aerobic dancing.');
        }
      }
    } else {
      var lower = $("#fast_dbw_lower_val").val();
      var upper = $("#fast_dbw_upper_val").val();
      if (yrs1 >= 0 && yrs1 <= 10) {
        if (dbw_opt == 'lbs') {
          var lower_limit_lbs = Math.round((lower * 2.2) * 10) / 10;
          var upper_limit_lbs = Math.round((upper * 2.2) * 10) / 10;
          $("#fast_dbw_lower_val").val(lower_limit_lbs);
          $("#fast_dbw_upper_val").val(upper_limit_lbs);
          $("#fast_dbw").html(lower_limit_lbs + ' - ' + upper_limit_lbs + ' lbs');
          $("#fast_dbw_label").html('Keep your weight within this range ' + '<strong>' + lower_limit_lbs + ' - ' + upper_limit_lbs + ' lbs' + ' </strong>. You can achieve your DBW by eating a healthy and balanced diet and engaging in moderate physical activity like jogging, brisk walking and aerobic dancing.<br><br> <p style="font-size:12px">Weight range is based on the WHO Weight-for-age growth charts.</p>');
        } else {
          var lower_limit_kgs = Math.round((lower / 2.2) * 10) / 10;
          var upper_limit_kgs = Math.round((upper / 2.2) * 10) / 10;
          $("#fast_dbw_lower_val").val(lower_limit_kgs);
          $("#fast_dbw_upper_val").val(upper_limit_kgs);
          $("#fast_dbw").html(lower_limit_kgs + ' - ' + upper_limit_kgs + ' kgs');
          $("#fast_dbw_label").html('Keep your weight within this range ' + '<strong>' + lower_limit_kgs + ' - ' + upper_limit_kgs + ' kgs' + ' </strong>. You can achieve your DBW by eating a healthy and balanced diet and engaging in moderate physical activity like jogging, brisk walking and aerobic dancing.<br><br> <p style="font-size:12px">Weight range is based on the WHO Weight-for-age growth charts.</p>');
        }
      } else {
        if (ask_pregnant == 1) {
          //$(document).on("change", '#fast_dbw_opt', function() {
          if (dbw_opt == 'lbs') {
            var gestation_lbs = Math.round((dbw * 2.2) * 10) / 10;
            $("#fast_dbw").html(gestation_lbs + ' lbs');
            $("#fast_dbw_label").html('You should be weighing around ' + '<strong>' + gestation_lbs + ' lbs' + '</strong> by this time. <br><br> <p style="font-size:12px">Data based on Weight-for-Height table at a given weeks of pregnancy: Philippines 2013.</p> ');
          } else {
            var gestation_kgs = dbw;
            $("#fast_dbw").html(gestation_kgs + ' kgs');
            $("#fast_dbw_label").html('You should be weighing around ' + '<strong>' + gestation_kgs + ' kgs' + '</strong> by this time. <br><br> <p style="font-size:12px">Data based on Weight-for-Height table at a given weeks of pregnancy: Philippines 2013.</p> ');
          }
          //});
        } else {
          if (dbw_opt == 'lbs') {
            var dbw_lbs = Math.round((dbw * 2.2) * 10) / 10;
            $("#fast_dbw_val").val(dbw_lbs);
            //Upper Limit
            var x = Math.round((dbw_lbs * 0.1) * 10) / 10;
            var upper_limit1 = Math.round((dbw_lbs + x) * 10) / 10;
            var upper_limit11 = Math.round((upper_limit1) * 10) / 10;
            //Lower Limit
            var y = Math.round((dbw_lbs * 0.1) * 10) / 10;
            var lower_limit1 = Math.round((dbw_lbs - y) * 10) / 10;
            var lower_limit11 = Math.round((lower_limit1) * 10) / 10;
            $("#fast_dbw").html(dbw_lbs + ' lbs');
            $("#fast_dbw_label").html('Your desirable body weight is ' + '<strong>' + dbw_lbs + ' ' + ' lbs ' + '</strong>. ' + 'Keep your weight within this range ' + '<strong>' + lower_limit11 + ' - ' + upper_limit11 + ' lbs ' + ' </strong>. You can achieve your DBW by eating a healthy and balanced diet and engaging in moderate physical activity like jogging, brisk walking and aerobic dancing.');
          } else {
            var dbw_kgs = Math.round((dbw / 2.2) * 10) / 10;
            $("#fast_dbw_val").val(dbw_kgs);
            $("#fast_dbw").html(dbw_kgs + ' kgs');
            //Upper Limit
            var x = Math.round((dbw_kgs * 0.1) * 10) / 10;
            var upper_limit = Math.round((dbw_kgs + x) * 10) / 10;
            var upper_limit1 = Math.round((upper_limit) * 10) / 10;
            //Lower Limit
            var y = Math.round((dbw_kgs * 0.1) * 10) / 10;
            var lower_limit = Math.round((dbw_kgs - y) * 10) / 10;
            var lower_limit1 = Math.round((lower_limit) * 10) / 10;
            $("#fast_dbw_label").html('Your desirable body weight is ' + '<strong>' + dbw_kgs + ' ' + ' kgs ' + '</strong>. ' + 'Keep your weight within this range ' + '<strong>' + lower_limit1 + ' - ' + upper_limit1 + ' kgs ' + ' </strong>. You can achieve your DBW by eating a healthy and balanced diet and engaging in moderate physical activity like jogging, brisk walking and aerobic dancing.');
          }
        }
      }
    }
  });
  $(document).on("change", '#ask_pregnant', function(e) {
    var ask_pregnant = $('input[name=ask_pregnant]:checked').val();
    //alert(ask_pregnant);
    if (ask_pregnant == 1) {
      gestation();
      //$("#fast_dbw_div").hide();
      //  $("#fast_dbw_div1").hide();
      //$("#fast_dbw_opt_div").hide();
      $("#ask_gestation_div").show();
      $("#fast_dbw_div").addClass("img-thumbnail");
      $("#dbw_ht_div").show();
      $("#fast_dbw_label").html('The pregnant table used in this site is intended for women with gestational age of 13-40 weeks and height of 127-170 cm only. If you are above or below these ranges, please consult your OB-GYNE. ');
      $("#fast_dbw_div").show();
      $("#fast_dbw_div1").show();
      $("#fast_dbw_div").addClass("img-thumbnail");
      $("#fast_dbw_val").val('0');
      $("#fast_dbw").html(0 + ' - ' + 0 + ' kgs');
      $("#fast_dbw_img").html('');
      $("#fast_dbw_img_copyright").html('');
      $("#fast_tips_pregnant").html('');
    } else {
      calc2();
      $("#ask_gestation_div").hide();
      $("#mens_div").hide();
      $("#gestation_div").hide();
      $("#fast_dbw_img").html('');
      $("#fast_dbw_img_copyright").html('');
      $("#fast_tips_pregnant").html('');
    }
  });
  $(document).on("change", '#ask_gestation', function(e) {
    var ask_gestation = $('input[name=ask_gestation]:checked').val();
    //alert(ask_pregnant);
    if (ask_gestation == 1) {
      gestation();
      //$("#fast_dbw_div").hide();
      //$("#fast_dbw_div1").hide();
      //$("#fast_dbw_opt_div").hide();
      $("#mens_div").hide();
      $("#gestation_div").show();
      $("#fast_dbw_div").addClass("img-thumbnail");
      $("#dbw_ht_div").show();
      $("#fast_dbw_label").html('The pregnant table used in this site is intended for women with gestational age of 13-40 weeks and height of 127-170 cm only. If you are above or below these ranges, please consult your OB-GYNE. ');
      $("#fast_dbw_div").show();
      $("#fast_dbw_div1").show();
      $("#fast_dbw_div").addClass("img-thumbnail");
      $("#fast_dbw_val").val('0');
      $("#fast_dbw").html(0 + ' - ' + 0 + ' kgs');
      $("#fast_dbw_img").html('');
      $("#fast_dbw_img_copyright").html('');
      $("#fast_tips_pregnant").html('');
    } else {
      $("#mens_div").show();
      $("#gestation_div").hide();
      $("#fast_dbw_label").html('The pregnant table used in this site is intended for women with gestational age of 13-40 weeks and height of 127-170 cm only. If you are above or below these ranges, please consult your OB-GYNE. ');
      $("#fast_dbw_div").show();
      $("#fast_dbw_div1").show();
      $("#fast_dbw_div").addClass("img-thumbnail");
      $("#fast_dbw_val").val('0');
      $("#fast_dbw").html(0 + ' - ' + 0 + ' kgs');
      $("#fast_dbw_img").html('');
      $("#fast_dbw_img_copyright").html('');
      $("#fast_tips_pregnant").html('');
      //calc2();
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
    var fast_ht1 = $("#fast_ht1").val();
    $("#gestation_wks").val(wks);
    console.log(Math.round(timeDiff / 1000 / 60 / 60 / 24 / 7));
    var gestation_wks = $("#gestation_wks").val();
    var ask_pregnant = $('input[name=ask_pregnant]:checked').val();
    if (fast_ht1 < 127 || fast_ht1 > 170 || gestation_wks < 13 || gestation_wks > 40) {
      $("#fast_dbw_label").html('The pregnant table used in this site is intended for women with gestational age of 13-40 weeks and height of 127-170 cm only. If you are above or below these ranges, please consult your OB-GYNE. ');
      $("#fast_dbw_div").show();
      $("#fast_dbw_div1").show();
      $("#fast_dbw_div").addClass("img-thumbnail");
      $("#fast_dbw").html(0 + ' - ' + 0 + ' kgs');
      $("#fast_dbw_opt_div").hide();
      console.log(gestation_wks);
    } else {
      gestation();
      /*  $.ajax({
    url:base_url+'help/select_gestation',
    data: 'gestation_wks='+ gestation_wks+'&fast_ht1='+fast_ht1,
    method:"GET",
   
    success:function(retrieved_data){
         // Your code here.. use something like this
         var Obj = retrieved_data;
         // Since your controller produce array of object you can access the value by using this one : 
     $.each(Obj, function(index, field) {
            

      $("#fast_dbw_label").html('You should be weighing around ' + '<strong>' + field.gestation_value + ' ' + ' kgs '  + '</strong> by this time. <br><br> <p style="font-size:12px">Data based on Weight-for-Height table at a given weeks of pregnancy: Philippines 2013.</p> ');
      
      
      var dbw_photo = field.dbw_photo;
      
      $("#fast_dbw_img").html("<img src='../assets/images/fast/"+dbw_photo+"'  height='100%' width='100%' />");
      
      $("#fast_dbw_img_copyright").html("<a href='http://www.freepik.com/free-vector/silhouettes-pregnant-women_595394.htm#term=pregnant'>Pregnant vector designed by Freepik</a>");
      $("#fast_dbw_img_div").show();
      $("#fast_tips_pregnant").html('<p style="font-size:12px;color:#6b6161;">Tips for pregnant women. <a href="#" id="tips_pregnant" class="btn btn-success btn-sm">Read more</a></p>');
      
  
      $("#fast_dbw_opt_div").show();
      $("#fast_dbw_div").show();
      $("#fast_dbw_div1").show();
      $("#fast_dbw_div").addClass("img-thumbnail");
      $("#fast_dbw").html(field.gestation_value + ' kgs' );
      $("#fast_dbw_val").val(field.gestation_value);

      
        
        $(function() {
  $("#tips_pregnant_dialog").dialog({
    autoOpen: false,
    title: 'Did you know?',
        resizable: false,
    modal: true,  
    width: 'auto',
    height:850,
      create: function (event, ui) {
     
        $(this).parent().css("maxWidth", "850px");
    }
  });
  $(".ui-dialog").addClass("ui-widget-header");
  $(".ui-dialog").addClass("ui-widget-content");
  $("#tips_pregnant").on("click", function(e) {
  
    $.ajax({
      type: "GET",
      url: base_url+'help/pregnant',
      success: function(res) {
        $("#tips_pregnant_dialog").html(res);
        $("#tips_pregnant_dialog").dialog("open");
        $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only'); 
          $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');

      }
    });
    $("#tips_pregnant_dialog").dialog("open");
    e.preventDefault();
  });
});
  
            


});
    }
});*/
    }
  });
  $(document).on("keyup", '#gestation_wks', function() {
    var fast_ht1 = $("#fast_ht1").val();
    var gestation_wks = $("#gestation_wks").val();
    var ask_pregnant = $('input[name=ask_pregnant]:checked').val();
    if (fast_ht1 < 127 || fast_ht1 > 170 || gestation_wks < 13 || gestation_wks > 40) {
      $("#fast_dbw_label").html('The pregnant table used in this site is intended for women with gestational age of 13-40 weeks and height of 127-170 cm only. If you are above or below these ranges, please consult your OB-GYNE. ');
      $("#fast_dbw_div").show();
      $("#fast_dbw_div1").show();
      $("#fast_dbw_div").addClass("img-thumbnail");
      $("#fast_dbw").html(0 + ' - ' + 0 + ' kgs');
      $("#fast_dbw_opt_div").hide();
      console.log(gestation_wks);
    } else {
      gestation();
  
    }
  });
  $(document).on("click", "#reset", function(e) {
    setTimeout(function() {
      location.reload()
    }, 100);
  });

        // $(".content").each(function(index) {
         
          //});
 /* $(".content").on("blur", function() {
             var ii = $(this).data("count");
          
              if (ii % 2 === 0) {
                var progress_class = "progress-bar-primary";
              } else {
                var progress_class = "progress-bar-warning";
              }
              $("#progress" + ii).addClass('progress');
              var content = $("#content" + ii).val();
              alert(content);
              var rni_computation = $("#rni_computation" + ii).val();
              var rni = Math.round(((content / rni_computation) * 100) * 10) / 10;
              $("#rni_progress" + ii).addClass(progress_class);
              $("#rni" + ii).val(rni);
              $("#rni_progress" + ii).html(rni + "%");
              $("#rni_progress_label" + ii).html(rni + "%");
              $("#rni_progress_label1" + ii).html(rni + "%");
              $("#rni_progress" + ii).css('width', rni);
            });*/


   $("#select_all").click(function () {
     $(".nutrients").each(function(index) {
     var i = $(this).val();
      $("#values_div" + i).hide();
       $("#values_div" + i).html('');
  });
    if ($(this).is(':checked')) {
     $('input:checkbox').not(this).prop('checked', this.checked);
     for (i = 0; i < 50; i++) {
     
     $("#values_div" + i).show();
    
   
     $("#values_div" + i).append('<input type="text" name="content" class="content form-control" id=content' + i + ' ' +
                            'placeholder="Enter values here.." style="width:100px;" data-count ='+i+'  />');

       // if ($(this).is(':checked')) {

    //}
 
     }
   
          $(".content").each(function(index) {
            $(this).on("keyup", function() {
             var i = $(this).data("count");
              if (i % 2 === 0) {
                var progress_class = "progress-bar-primary";
              } else {
                var progress_class = "progress-bar-warning";
              }
              $("#progress" + i).addClass('progress');
              var content = $("#content" + i).val();
//alert(i);
              var rni_computation = $("#rni_computation" + i).val();
              var rni = Math.round(((content / rni_computation) * 100) * 10) / 10;
              $("#rni_progress" + i).addClass(progress_class);
              $("#rni" + i).val(rni);
              $("#rni_progress" + i).html(rni + "%");
              $("#rni_progress_label" + i).html(rni + "%");
              $("#rni_progress_label1" + i).html(rni + "%");
              $("#rni_progress" + i).css('width', rni);
            });
          });
        }else{
           for (i = 0; i < 50; i++) {
      $("#values_div" + i).hide();
       $("#values_div" + i).html('');
       $('.nutrients').prop('checked', false); // Unchecks it
     }

        }
     /*if ($(".nutrients").is(':checked')) {
      var i = $(".nutrients").val();
     $("#values_div" + i).show();
    
   
     $("#values_div" + i).append('<input type="text" name="content" class="content form-control" id=content' + i + ' ' +
                            'placeholder="Enter values here.." style="width:100px;"  />');
   }*/
/*for (i = 0; i < 5; i++) {
//alert("The number is " + i + "<br>");
$('input:checkbox').not(this).prop('checked', this.checked);
     if ($(".nutrients").is(':checked')) {
      var i = $(".nutrients").val();
     $("#values_div" + i).show();
    
   
     $("#values_div" + i).append('<input type="text" name="content" class="content form-control" id=content' + i + ' ' +
                            'placeholder="Enter values here.." style="width:100px;"  />');
   }
}*/

 });
  $(document).on("click", ".nutrients", function(e) {
    if ($(this).is(':checked')) {
      var i = $(this).val();
     $("#values_div" + i).show();

     //input type=\"text\"  class=\"form-control content\" id=\"content$id\" name=\"content\" 
     //data-nutrients=\"$id\" style=\"width:100px;\" placeholder=\"Enter values here..\" 
     $("#values_div" + i).append('<input type="text" name="content" class="content form-control" id=content' + i + ' ' +
                            'placeholder="Enter values here.." style="width:80px;"  />');
         $(".content").each(function(index) {
            $(this).on("keyup", function() {
             // var i = $(this).data("count");
              if (i % 2 === 0) {
                var progress_class = "progress-bar-primary";
              } else {
                var progress_class = "progress-bar-warning";
              }
              $("#progress" + i).addClass('progress');
              var content = $("#content" + i).val();
              var rni_computation = $("#rni_computation" + i).val();
              var rni = Math.round(((content / rni_computation) * 100) * 10) / 10;
              $("#rni_progress" + i).addClass(progress_class);
              $("#rni" + i).val(rni);
              $("#rni_progress" + i).html(rni + "%");
              $("#rni_progress_label" + i).html(rni + "%");
              //$("#rni_progress_label1" + i).html(rni + "%");
              $("#rni_progress" + i).css('width', rni);
            });
          });
    }else{
     var i = $(this).val();
      $("#values_div" + i).hide();
       $("#values_div" + i).html('');
   }

  });

 

  $(document).on("click", "#select", function(e) {
    e.preventDefault();
    var computation = $("input[name='use_this_comp']:checked").val();
    var content = [];
    $.each($("input[name='content']"), function() {
      content.push($(this).val());
    });
   // alert(content);
    var nutrients = [];
    $.each($("input[name='nutrients']:checked"), function() {
      //var i = $(this).val();
      nutrients.push($(this).val());
    });
    console.log(nutrients);
    var textBox = $(".content").val();
    if (nutrients == '' || !$("input[name='use_this_comp']:checked").val() || textBox =='') {
      alert('Selection should not be empty.');
      return false; // or e.preventDefault();
    } else {
      var dataString = 'nutrients=' + nutrients;
      $.ajax({
        type: "GET",
        url: base_url + 'help/pdri_compute?computation=' + computation+'&content='+content,
        data: dataString,
        success: function(data) {
          $("#pdri_compute").html(data);
      
        }
      });
    }
  });


  
});
$(function() {
  $("#bmi_dialog").dialog({
    autoOpen: false,
    resizable: false,
    modal: true,
    width: 'auto',
    height: 850,
    create: function(event, ui) {
      // Set max-width
      $(this).parent().css("maxWidth", "800px");
    }
  });
  //$(".ui-dialog").addClass("ui-widget-header");
  //$(".ui-dialog").addClass("ui-widget-content");
  $(document).on("click", "#read_bmi", function(e) {
    $.ajax({
      type: "GET",
      url: base_url + 'help/bmi',
      success: function(res) {
        $("#bmi_dialog").html(res);
        $("#bmi_dialog").dialog("open");
        $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
        $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
        //  $('.ui-widget-header').addClass('ui-widget-header');
      }
    });
    $("#bmi_dialog").dialog("open");
    e.preventDefault();
  });
});
$(function() {
  $("#heart_disease_dialog").dialog({
    autoOpen: false,
    title: 'Did you know?',
    resizable: false,
    modal: true,
    width: 'auto',
    create: function(event, ui) {
      // Set max-width
      $(this).parent().css("maxWidth", "600px");
    }
  });
  $(".ui-dialog").addClass("ui-widget-header");
  $(".ui-dialog").addClass("ui-widget-content");
  $(document).on('click', '.heart_disease', function(e) {
    $.ajax({
      type: "GET",
      url: base_url + 'help/heart_disease',
      success: function(res) {
        $("#heart_disease_dialog").html(res);
        $("#heart_disease_dialog").dialog("open");
        $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
        $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
      }
    });
    $("#heart_disease_dialog").dialog("open");
    e.preventDefault();
  });
});
$(function() {
  $("#hypertension_dialog").dialog({
    autoOpen: false,
    title: 'Did you know?',
    resizable: false,
    modal: true,
    width: 'auto',
    create: function(event, ui) {
      // Set max-width
      $(this).parent().css("maxWidth", "600px");
    }
  });
  $(".ui-dialog").addClass("ui-widget-header");
  $(".ui-dialog").addClass("ui-widget-content");
  $(document).on('click', '.hypertension', function(e) {
    $.ajax({
      type: "GET",
      url: base_url + 'help/hypertension',
      success: function(res) {
        $("#hypertension_dialog").html(res);
        $("#hypertension_dialog").dialog("open");
        $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
        $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
      }
    });
    $("#hypertension_dialog").dialog("open");
    e.preventDefault();
  });
});
$(function() {
  $("#type2diabetes_dialog").dialog({
    autoOpen: false,
    title: 'Did you know?',
    resizable: false,
    modal: true,
    width: 'auto',
    create: function(event, ui) {
      // Set max-width
      $(this).parent().css("maxWidth", "600px");
    }
  });
  $(".ui-dialog").addClass("ui-widget-header");
  $(".ui-dialog").addClass("ui-widget-content");
  $(document).on('click', '.type2diabetes', function(e) {
    $.ajax({
      type: "GET",
      url: base_url + 'help/type2diabetes',
      success: function(res) {
        $("#type2diabetes_dialog").html(res);
        $("#type2diabetes_dialog").dialog("open");
        $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
        $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
      }
    });
    $("#type2diabetes_dialog").dialog("open");
    e.preventDefault();
  });
});
$(function() {
  $("#cancer_dialog").dialog({
    autoOpen: false,
    title: 'Did you know?',
    resizable: false,
    modal: true,
    width: 'auto',
    create: function(event, ui) {
      // Set max-width
      $(this).parent().css("maxWidth", "600px");
    }
  });
  $(".ui-dialog").addClass("ui-widget-header");
  $(".ui-dialog").addClass("ui-widget-content");
  $(document).on('click', '.cancer', function(e) {
    $.ajax({
      type: "GET",
      url: base_url + 'help/cancer',
      success: function(res) {
        $("#cancer_dialog").html(res);
        $("#cancer_dialog").dialog("open");
        $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
        $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
      }
    });
    $("#cancer_dialog").dialog("open");
    e.preventDefault();
  });
});
$(function() {
  $("#physical_activity_dialog").dialog({
    autoOpen: false,
    title: 'Did you know?',
    resizable: false,
    modal: true,
    width: 'auto',
    create: function(event, ui) {
      // Set max-width
      $(this).parent().css("maxWidth", "600px");
    }
  });
  $(".ui-dialog").addClass("ui-widget-header");
  $(".ui-dialog").addClass("ui-widget-content");
  $("#physical_activity").on("click", function(e) {
    $.ajax({
      type: "GET",
      url: base_url + 'help/physical_activity',
      success: function(res) {
        $("#physical_activity_dialog").html(res);
        $("#physical_activity_dialog").dialog("open");
        $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
        $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
      }
    });
    $("#physical_activity_dialog").dialog("open");
    e.preventDefault();
  });
});
$(function() {
  $("#calorie_dialog").dialog({
    autoOpen: false,
    title: 'Did you know?',
    resizable: false,
    modal: true,
    width: 'auto',
    create: function(event, ui) {
      // Set max-width
      $(this).parent().css("maxWidth", "600px");
    }
  });
  $(".ui-dialog").addClass("ui-widget-header");
  $(".ui-dialog").addClass("ui-widget-content");
  $(document).on('click', '#calorie', function(e) {
    $.ajax({
      type: "GET",
      url: base_url + 'help/calorie',
      success: function(res) {
        $("#calorie_dialog").html(res);
        $("#calorie_dialog").dialog("open");
        $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
        $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
      }
    });
    $("#calorie_dialog").dialog("open");
    e.preventDefault();
  });
});
$(function() {
  $("#carbohydrates_dialog").dialog({
    autoOpen: false,
    title: 'Did you know?',
    resizable: false,
    modal: true,
    width: 'auto',
    create: function(event, ui) {
      // Set max-width
      $(this).parent().css("maxWidth", "600px");
    }
  });
  $(".ui-dialog").addClass("ui-widget-header");
  $(".ui-dialog").addClass("ui-widget-content");
  $(document).on('click', '#carbohydrates', function(e) {
    $.ajax({
      type: "GET",
      url: base_url + 'help/carbohydrates',
      success: function(res) {
        $("#carbohydrates_dialog").html(res);
        $("#carbohydrates_dialog").dialog("open");
        $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
        $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
      }
    });
    $("#carbohydrates_dialog").dialog("open");
    e.preventDefault();
  });
});
$(function() {
  $("#protein_dialog").dialog({
    autoOpen: false,
    title: 'Did you know?',
    resizable: false,
    modal: true,
    width: 'auto',
    create: function(event, ui) {
      // Set max-width
      $(this).parent().css("maxWidth", "600px");
    }
  });
  $(".ui-dialog").addClass("ui-widget-header");
  $(".ui-dialog").addClass("ui-widget-content");
  $(document).on('click', '#protein', function(e) {
    $.ajax({
      type: "GET",
      url: base_url + 'help/protein',
      success: function(res) {
        $("#protein_dialog").html(res);
        $("#protein_dialog").dialog("open");
        $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
        $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
      }
    });
    $("#protein_dialog").dialog("open");
    e.preventDefault();
  });
});
$(function() {
  $("#fat_dialog").dialog({
    autoOpen: false,
    title: 'Did you know?',
    resizable: false,
    modal: true,
    width: 'auto',
    create: function(event, ui) {
      // Set max-width
      $(this).parent().css("maxWidth", "600px");
    }
  });
  $(".ui-dialog").addClass("ui-widget-header");
  $(".ui-dialog").addClass("ui-widget-content");
  $(document).on('click', '#fat', function(e) {
    $.ajax({
      type: "GET",
      url: base_url + 'help/fat',
      success: function(res) {
        $("#fat_dialog").html(res);
        $("#fat_dialog").dialog("open");
        $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
        $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
      }
    });
    $("#fat_dialog").dialog("open");
    e.preventDefault();
  });
});
$(function() {
  $("#wc_dialog").dialog({
    autoOpen: false,
    title: '',
    resizable: false,
    modal: true,
    width: '800'
    /*create: function(event, ui) {
      // Set max-width
      $(this).parent().css("maxWidth", "600px");
    }*/
  });
  $(".ui-dialog").addClass("ui-widget-header");
  $(".ui-dialog").addClass("ui-widget-content");
  $("#read_wc").on("click", function(e) {
    $.ajax({
      type: "GET",
      url: base_url + 'help/wc',
      success: function(res) {
        $("#wc_dialog").html(res);
        $("#wc_dialog").dialog("open");
        $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
        $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
      }
    });
    $("#wc_dialog").dialog("open");
    e.preventDefault();
  });
});
$(function() {
  $("#whipr_dialog").dialog({
    autoOpen: false,
    title: '',
    resizable: false,
    modal: true,
    width: '900'
    /*create: function(event, ui) {
      // Set max-width
      $(this).parent().css("maxWidth", "600px");
    }*/
  });
  $(".ui-dialog").addClass("ui-widget-header");
  $(".ui-dialog").addClass("ui-widget-content");
  $("#read_whipr").on("click", function(e) {
    $.ajax({
      type: "GET",
      url: base_url + 'help/whipr',
      success: function(res) {
        $("#whipr_dialog").html(res);
        $("#whipr_dialog").dialog("open");
        $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
        $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
      }
    });
    $("#whipr_dialog").dialog("open");
    e.preventDefault();
  });
});
$(function() {
  $("#tannhauser_dialog").dialog({
    autoOpen: false,
    title: 'Did you know?',
    resizable: false,
    modal: true,
    width: 'auto',
    create: function(event, ui) {
      // Set max-width
      $(this).parent().css("maxWidth", "600px");
    }
  });
  $(".ui-dialog").addClass("ui-widget-header");
  $(".ui-dialog").addClass("ui-widget-content");
  $("#tannhauser").on("click", function(e) {
    $.ajax({
      type: "GET",
      url: base_url + 'help/tannhauser',
      success: function(res) {
        $("#tannhauser_dialog").html(res);
        $("#tannhauser_dialog").dialog("open");
        $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
        $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
      }
    });
    $("#tannhauser_dialog").dialog("open");
    e.preventDefault();
  });
});
$(function() {
  $("#energy_requirement_dialog").dialog({
    autoOpen: false,
    title: 'Did you know?',
    resizable: false,
    modal: true,
    width: 'auto',
    height: 600,
    create: function(event, ui) {
      // Set max-width
      $(this).parent().css("maxWidth", "600px");
    }
  });
  $(".ui-dialog").addClass("ui-widget-header");
  $(".ui-dialog").addClass("ui-widget-content");
  $("#energy_requirement").on("click", function(e) {
    $.ajax({
      type: "GET",
      url: base_url + 'help/energy_requirement',
      success: function(res) {
        $("#energy_requirement_dialog").html(res);
        $("#energy_requirement_dialog").dialog("open");
        $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
        $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
      }
    });
    $("#energy_requirement_dialog").dialog("open");
    e.preventDefault();
  });
});
$(function() {
  $("#whtr_dialog").dialog({
    autoOpen: false,
    title: '',
    resizable: false,
    modal: true,
    width: '800',
    height: '600'
    /*create: function(event, ui) {
      // Set max-width
      $(this).parent().css("maxWidth", "600px");
    }*/
  });
  $(".ui-dialog").addClass("ui-widget-header");
  $(".ui-dialog").addClass("ui-widget-content");
  $("#read_whtr").on("click", function(e) {
    $.ajax({
      type: "GET",
      url: base_url + 'help/whtr',
      success: function(res) {
        $("#whtr_dialog").html(res);
        $("#whtr_dialog").dialog("open");
        $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
        $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
      }
    });
    $("#whtr_dialog").dialog("open");
    e.preventDefault();
  });
});

function img_gender() {
  var gender = $(".gender-a").val();
  if (gender == 'Male') {
    //Images/fast_tools_images/
    $("#fast_bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_male-2.svg"   height="70%" width="70%"/>');
    //calc1();
    wt_conv();
  } else {
    $("#fast_bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_female-2.svg"   height="70%" width="70%"/>');
    //calc1();
    wt_conv();
  }
}

function calc1() {
  var gender = $(".gender-a").val();
  var wt = $("#fast_wt").val();
  var ht = $("#fast_ht").val();
  var ht_ft = $("#fast_ht_ft").val();
  var ht_in = $("#fast_ht_in").val();
  var wt_opt = $("#fast_wt_opt").val();
  var decimal = /^\d{0,4}(\.\d{0,2})?$/;
  //$('.img-thumbnail').css('width','100%');
  $("#fast_bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_male-2.svg"   height="70%" width="70%"/>');
  if (wt == "" || !wt.match(decimal)) {
    alert("Enter a valid number for weight. Please enter a number with atleast 2 decimal places.");
    $("#fast_bmi_div").hide("fade", 1000);
    $("#fast_bmi_img_div").hide("fade", 1000);
    return false;
  } else if (ht == "" || !ht.match(decimal)) {
    alert("Enter a valid number for height. Please enter a number with atleast 2 decimal places.");
    $("#fast_bmi_div").hide("fade", 1000);
    $("#fast_bmi_img_div").hide("fade", 1000);
    return false;
  } else if (ht_ft == "" || !ht_ft.match(decimal)) {
    alert("Enter a valid number in feet that is greater than or equal to 4 feet but less than or equal to 8 feet. ");
    $("#fast_bmi_div").hide("fade", 1000);
    $("#fast_bmi_img_div").hide("fade", 1000);
    return false;
  } else {
    if (wt_opt == "lbs") {
      if (wt == '') {
        alert("Weight should be greater than or equal to 66 lbs but less than or equal to 1100 lbs.");
        $("#fast_bmi_div").hide("fade", 1000);
        $("#fast_bmi_img_div").hide("fade", 1000);
        return false;
      } else {
        var h = ht / 100;
        var w = Math.round((wt / 2.2) * 100) / 100;
        var bmi = Math.round((w / (h * h)) * 100) / 100;
        $("#fast_bmi_val").val(bmi);
      }
    } else {
      if (wt == '') {
        alert("Weight should be greater than or equal to 30 kgs but less than or equal to 500 kgs.");
        $("#fast_bmi_div").hide("fade", 1000);
        $("#fast_bmi_img_div").hide("fade", 1000);
        return false;
      } else {
        var h = ht / 100;
        //var w= Math.round((wt/2.2)*100) /100;
        var bmi = Math.round((wt / (h * h)) * 100) / 100;
        $("#fast_bmi_val").val(bmi);
      }
    }
    // Metric bmi_class
    //var d = "Your bmi_class is "
    if (bmi < 18.50) {
      $("#fast_bmi_div").css("border-top", "5px solid #ff0000");
      $("#fast_bmi_div").addClass("img-thumbnail");
      if (gender == 1) {
        $("#fast_bmi_label").html('<p>Your BMI is <strong>' + bmi + ' kg/m<sup>2</sup></strong> classified as <font color="#ff0000"><strong>UNDERWEIGHT</strong></font>.</p><p>This may indicate that you have a <font color="#ff0000"><strong>HIGHER RISK</strong></font> of acquiring frequent infections, slow wound healing and recovery from illness.</p><p style="font-size:12px">Cut-off used: World Health Organization.</p>');
        $("#fast_bmi_div").show("fade", 1000);
        $("#fast_bmi_img_div").show("fade", 1000);
        $("#fast_bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_male-1.svg"   height="70%" width="70%"/>');
      } else {
        $("#fast_bmi_label").html('<p>Your BMI is <strong>' + bmi + ' kg/m<sup>2</sup></strong> classified as <font color="#ff0000"><strong>UNDERWEIGHT</strong></font>.</p><p>You have a <font color="#ff0000"><strong>HIGHER RISK</strong></font> of acquiring frequent infections, slow wound healing and recovery from illness and irregular menstruation.</p><p style="font-size:12px">Cut-off used: World Health Organization.</p>');
        $("#fast_bmi_div").show("fade", 1000);
        $("#fast_bmi_img_div").show("fade", 1000);
        // var imgSrc="<?php echo base_url('assets/images/fast/bmi_female-1.svg'); ?>";
        $("#fast_bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_female-1.svg"   height="70%" width="70%"/>');
      }
    } else if (bmi >= 18.50 && bmi <= 24.99) {
      $("#fast_bmi_div").css("border-top", "5px solid #33CC33");
      $("#fast_bmi_div").addClass("img-thumbnail");
      if (gender == 1) {
        $("#fast_bmi_label").html('<p>Your BMI is <strong>' + bmi + ' kg/m<sup>2</sup></strong> classified as <font color="#33CC33"><strong>NORMAL.</strong></font></p><p>This may indicate that you have a <font color="#33CC33"><strong>LOWER RISK </strong></font>of acquiring <a href="#" id="heart_disease" class="link heart_disease">heart diseases</a>, <a href="#" id="hypertension" class="link hypertension">hypertension</a>, <a href="#" id="type2diabetes" class="link type2diabetes">type 2 diabetes</a> and <a href="#" id="cancer" class="link cancer">some types of cancer</a>.</p><p style="font-size:12px">Cut-off used: World Health Organization.</p>');
        $("#fast_bmi_div").show("fade", 1000);
        $("#fast_bmi_img_div").show("fade", 1000);
        $("#fast_bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_male-3.svg"   height="70%" width="70%"/>');
      } else {
        $("#fast_bmi_label").html('<p>Your BMI is <strong>' + bmi + ' kg/m<sup>2</sup></strong> classified as <font color="#33CC33"><strong>NORMAL.</strong></font></p><p>This may indicate that you have a <font color="#33CC33"><strong>LOWER RISK </strong></font>of acquiring <a href="#" id="heart_disease" class="link heart_disease">heart diseases</a>, <a href="#" id="hypertension" class="link hypertension">hypertension</a>, <a href="#" id="type2diabetes" class="link type2diabetes">type 2 diabetes</a> and <a href="#" id="cancer" class="link cancer">some types of cancer</a>.</p><p style="font-size:12px">Cut-off used: World Health Organization.</p>');
        $("#fast_bmi_div").show("fade", 1000);
        $("#fast_bmi_img_div").show("fade", 1000);
        $("#fast_bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_female-3.svg"   height="70%" width="70%"/>');
      }
    } else if (bmi >= 25.00 && bmi <= 29.99) {
      $("#fast_bmi_div").css("border-top", "5px solid #ff0000");
      $("#fast_bmi_div").addClass("img-thumbnail");
      if (gender == 1) {
        $("#fast_bmi_label").html('<p>Your BMI is <strong>' + bmi + ' kg/m<sup>2</sup></strong> classified as <font color="#ff0000"><strong>OVERWEIGHT</strong></font>.</p><p>This may indicate that you have a <font color="#ff0000"><strong>HIGHER RISK</strong></font> of acquiring <a href="#" id="heart_disease" class="link heart_disease">heart diseases</a>, <a href="#" id="hypertension" class="link hypertension">hypertension</a>, <a href="#" id="type2diabetes" class="link type2diabetes">type 2 diabetes</a> and <a href="#" id="cancer" class="link cancer">some types of cancer</a>.</p><p style="font-size:12px">Cut-off used: World Health Organization.</p>');
        $("#fast_bmi_div").show("fade", 1000);
        $("#fast_bmi_img_div").show("fade", 1000);
        $("#fast_bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_male-5.svg"   height="70%" width="70%"/>');
      } else {
        $("#fast_bmi_label").html('<p>Your BMI is <strong>' + bmi + ' kg/m<sup>2</sup></strong> classified as <font color="#ff0000"><strong>OVERWEIGHT</strong></font>.</p><p>This may indicate that you have a <font color="#ff0000"><strong>HIGHER RISK</strong></font> of acquiring <a href="#" id="heart_disease" class="link heart_disease">heart diseases</a>, <a href="#" id="hypertension" class="link hypertension">hypertension</a>, <a href="#" id="type2diabetes" class="link type2diabetes">type 2 diabetes</a> and <a href="#" id="cancer" class="link cancer">some types of cancer</a>.</p><p style="font-size:12px">Cut-off used: World Health Organization.</p>');
        $("#fast_bmi_div").show("fade", 1000);
        $("#fast_bmi_img_div").show("fade", 1000);
        $("#fast_bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_female-5.svg"   height="70%" width="70%"/>');
      }
    } else if (bmi >= 30) {
      $("#fast_bmi_div").css("border-top", "5px solid #ff0000");
      $("#fast_bmi_div").addClass("img-thumbnail");
      if (gender == 1) {
        $("#fast_bmi_label").html('<p>Your BMI is <strong>' + bmi + ' kg/m<sup>2</sup></strong> classified as <font color="#ff0000"><strong>OBESE</strong></font>.</p><p>This may indicate that you have a <font color="#ff0000"><strong>HIGHER RISK</strong></font> of acquiring <a href="#" id="heart_disease" class="link heart_disease">heart diseases</a>, <a href="#" id="hypertension" class="link hypertension">hypertension</a>, <a href="#" id="type2diabetes" class="link type2diabetes">type 2 diabetes</a> and <a href="#" id="cancer" class="link cancer">some types of cancer</a>.</p><p style="font-size:12px">Cut-off used: World Health Organization.</p>');
        $("#fast_bmi_div").show("fade", 1000);
        $("#fast_bmi_img_div").show("fade", 1000);
        $("#fast_bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_male-7.svg"   height="70%" width="70%"/>');
      } else {
        $("#fast_bmi_label").html('<p>Your BMI is <strong>' + bmi + ' kg/m<sup>2</sup></strong> classified as <font color="#ff0000"><strong>OBESE</strong></font>.</p><p>This may indicate that you have a <font color="#ff0000"><strong>HIGHER RISK</strong></font> of acquiring <a href="#" id="heart_disease" class="link heart_disease">heart diseases</a>, <a href="#" id="hypertension" class="link hypertension">hypertension</a>, <a href="#" id="type2diabetes" class="link type2diabetes">type 2 diabetes</a> and <a href="#" id="cancer" class="link cancer">some types of cancer</a>.</p><p style="font-size:12px">Cut-off used: World Health Organization.</p>');
        $("#fast_bmi_div").show("fade", 1000);
        $("#fast_bmi_img_div").show("fade", 1000);
        $("#fast_bmi_img").html('<img src="' + base_url + 'assets/images/fast/bmi_female-7.svg"   height="70%" width="70%"/>');
      }
    }
  }
}

function calc1_1() {
  var dob1 = $("#dob").val();
  var now = new Date();
  var today = new Date(now.getYear(), now.getMonth(), now.getDate());
  var yearNow = now.getYear();
  var monthNow = now.getMonth();
  var dateNow = now.getDate();
  var dob = new Date(dob1.substring(6, 10), dob1.substring(0, 2) - 1, dob1.substring(3, 5));
  var yearDob = dob.getYear();
  var monthDob = dob.getMonth();
  var dateDob = dob.getDate();
  var age = {};
  var ageString = "";
  var yearString = "";
  var monthString = "";
  var dayString = "";
  yearAge = yearNow - yearDob;
  if (monthNow >= monthDob) var monthAge = monthNow - monthDob;
  else {
    yearAge--;
    var monthAge = 12 + monthNow - monthDob;
  }
  if (dateNow >= dateDob) var dateAge = dateNow - dateDob;
  else {
    monthAge--;
    var dateAge = 31 + dateNow - dateDob;
    if (monthAge < 0) {
      monthAge = 11;
      yearAge--;
    }
  }
  age = {
    years: yearAge,
    months: monthAge,
    days: dateAge
  };
  if (age.years > 1) yearString = " years";
  else yearString = " year";
  if (age.months > 1) monthString = " months";
  else monthString = " month";
  if (age.days > 1) dayString = " days";
  else dayString = " day";
  if ((age.years > 0) && (age.months > 0) && (age.days > 0)) ageString = age.years + yearString + ", " + age.months + monthString + ", and " + age.days + dayString + " old.";
  else if ((age.years == 0) && (age.months == 0) && (age.days > 0)) ageString = "Only " + age.days + dayString + " old!";
  else if ((age.years > 0) && (age.months == 0) && (age.days == 0)) ageString = age.years + yearString + " old. Happy Birthday!!";
  else if ((age.years > 0) && (age.months > 0) && (age.days == 0)) ageString = age.years + yearString + " and " + age.months + monthString + " old.";
  else if ((age.years == 0) && (age.months > 0) && (age.days > 0)) ageString = age.months + monthString + " and " + age.days + dayString + " old.";
  else if ((age.years > 0) && (age.months == 0) && (age.days > 0)) ageString = age.years + yearString + " and " + age.days + dayString + " old.";
  else if ((age.years == 0) && (age.months > 0) && (age.days == 0)) ageString = age.months + monthString + " old.";
  else ageString = "Oops! Could not calculate age!";
  // return ageString;
  $("#yrs").val(age.years);
  $("#mos").val(age.months);
  var yrs = $("#yrs").val();
  var mos = $("#mos").val();
  var fast_gender = $("#fast_gender").val();
  var wt = $("#fast_wt").val();
  var ht = $("#fast_ht").val();
  var ht_ft = $("#fast_ht_ft").val();
  var ht_in = $("#fast_ht_in").val();
  var wt_opt = $("#fast_wt_opt").val();
  //alert(age.months);  
  if (yrs > 19) {
    $("#fast_bmi_img_copyright").hide();
    calc1();
    //console.log(yrs);
    //console.log('dasdsa');
  } else {
    //console.log(fast_gender);
    var h = ht / 100;
    //var w= Math.round((wt/2.2)*100) /100;
    var bmi = Math.round((wt / (h * h)) * 10) / 10;
    $("#fast_bmi_val").val(bmi);
    var fast_bmi_val = $("#fast_bmi_val").val();
    $.ajax({
      url: base_url + 'help/get_bmi_range',
      data: 'mos=' + mos + '&yrs=' + yrs + '&fast_bmi_val=' + fast_bmi_val + '&fast_gender=' + fast_gender,
      method: "GET",
      success: function(retrieved_data) {
        // Your code here.. use something like this
        var Obj = retrieved_data;
        // Since your controller produce array of object you can access the value by using this one : 
        $.each(Obj, function(index, field) {
          var bmi_range = field.bmi_range;
          //console.log(field.bmi_photo);
          if (bmi < bmi_range) {
            var bmi_text = ' of acquiring frequent infections, slow wound healing and recovery from illness';
          } else if (bmi >= bmi_range && bmi <= bmi_range) {
            var bmi_text = ' of acquiring <a href="#" id="heart_disease" class="link heart_disease">heart diseases</a>, <a href="#" id="hypertension" class="link hypertension">hypertension</a>, <a href="#" id="type2diabetes" class="link type2diabetes">type 2 diabetes</a> and <a href="#" id="cancer" class="link cancer">some types of cancer</a>';
          } else {
            var bmi_text = ' of acquiring <a href="#" id="heart_disease" class="link heart_disease">heart diseases</a>, <a href="#" id="hypertension" class="link hypertension">hypertension</a>, <a href="#" id="type2diabetes" class="link type2diabetes">type 2 diabetes</a> and <a href="#" id="cancer" class="link cancer">some types of cancer</a>';
          }
          $("#fast_bmi_label").html('<p>Your BMI is <strong>' + bmi + ' kg/m<sup>2</sup></strong> classified as <font color=' + field.font_color + ' ><strong>' + field.bmi + '</strong></font>.</p><p>This may indicate that you have a <font color=' + field.font_color + '><strong>' + field.bmi_indicator + '</strong></font>' + bmi_text + '.</p>');
          $("#fast_bmi_div").show("fade", 1000);
          $("#fast_bmi_div").show("fade", 1000);
          $("#fast_bmi_img_div").show("fade", 1000);
          var bmi_photo = field.bmi_photo;
          $("#fast_bmi_img").html('<img src="' + base_url + 'assets/images/fast/' + bmi_photo + '"  height="400"/>');
        });
      }
    });
  }
}

function wt_conv() //Weight conversion
{
  var pp = $('#fast_wt_opt').val();
  var ww = $('#fast_wt').val();
  var decimal = /^\d{0,4}(\.\d{0,2})?$/;
  if (ww == "" || !ww.match(decimal)) {
    alert("Enter a valid number for weight. Please enter a number with atleast 2 decimal places.");
    $("#fast_bmi_div").hide();
    $("#fast_bmi_img_div").hide("fade", 1000);
    return false;
  } else {
    //Kilogram to pounds
    if (pp == "lbs") {
      var lbs = Math.round((ww * 2.2) * 10) / 10;
      $('#fast_wt').val(lbs);
      //$('#fast_wtRange').val(lbs);
      $('#fast_wt').prop('min', 66);
      $('#fast_wt').prop('max', 1100);
      $('#fast_wtRange').prop('min', 66);
      $('#fast_wtRange').prop('max', 1100);
      $('#fast_wtRange').prop('value', lbs);
    }
    //Pounds to kilograms
    else {
      var kgs = Math.round((ww / 2.2) * 10) / 10;
      $('#fast_wt').val(kgs);
      //$('#fast_wtRange').val(kgs);  
      $('#fast_wt').prop('min', 30);
      $('#fast_wt').prop('max', 500);
      $('#fast_wtRange').prop('min', 30);
      $('#fast_wtRange').prop('max', 500);
      $('#fast_wtRange').prop('value', kgs);
    }
  }
}
// Change number to parseint
function conv(aa) //Height conversion
{
  var ft = 0,
    inc = 0,
    ht = 0;
  var ft = $("#fast_ht_ft").val();
  var inc = $("#fast_ht_in").val();
  var decimal = /^\d{0,4}(\.\d{0,2})?$/;
  if (ft == "" || !ft.match(decimal) || inc == "" || !inc.match(decimal)) {
    alert("Please enter a valid number greater than 121.9 cm but less than 243.8 cm or a number with atleast 2 decimal places.");
    $("#fast_bmi_div").hide("fade", 1000);
    $("#fast_bmi_img_div").hide("fade", 1000);
    return false;
  } else {
    if (aa == 1 || aa == 2) {
      var ss = Math.round((ft * 12) * 100) / 100;
      var tot = ss + Math.round(inc * 100) / 100;
      var val = tot * 2.54;
      $("#fast_ht").val(Math.round(val * 100) / 100);
      $("#fast_htRange").val(Math.round(val * 100) / 100);
    } else {
      var ht = $("#fast_ht").val();
      var decimal = /^\d{0,4}(\.\d{0,2})?$/;
      if (ht == "" || !ht.match(decimal)) {
        alert("Please enter a valid number greater than 121.9 cm but less than 243.8 cm or a number with atleast 2 decimal places.");
        $("#fast_bmi_div").hide("fade", 1000);
        $("#fast_bmi_img_div").hide("fade", 1000);
        return false;
      } else {
        var cm = Math.round((ht / 2.54) * 10) / 10;
        var div = parseInt(cm / 12);
        var md = Math.round((cm % 12) * 10) / 10;
        $("#fast_ht_ft").val(div);
        $("#fast_ht_in").val(Math.round(md));
      }
    }
  }
}

function conv1(aa) //Height conversion
{
  var ft1 = 0,
    inc1 = 0,
    ht1 = 0;
  var ft1 = $("#fast_ht_ft1").val();
  var inc1 = $("#fast_ht_in1").val();
  var decimal = /^\d{0,4}(\.\d{0,2})?$/;
  if (ft1 == "" || !ft1.match(decimal) || inc1 == "" || !inc1.match(decimal)) {
    alert("Please enter a valid number greater than 121.9 cm but less than 243.8 cm or a number with atleast 2 decimal places.");
    $("#fast_dbw_div1").hide();
    $("#fast_dbw_div").hide();
    $("#fast_dbw_opt_div").hide();
    return false;
  } else {
    if (aa == 1 || aa == 2) {
      var ss1 = Math.round((ft1 * 12) * 10) / 10;
      //var tot1 = ss1+Number(inc1);
      var tot1 = ss1 + Math.round(inc1 * 100) / 100;
      var val1 = tot1 * 2.54;
      $("#fast_ht1").val(Math.round(val1 * 10) / 10);
      $("#fast_htRange1").val(Math.round(val1 * 10) / 10);
    } else {
      var ht1 = $("#fast_ht1").val();
      var decimal = /^\d{0,4}(\.\d{0,2})?$/;
      if (ht1 == "" || !ht1.match(decimal)) {
        alert("Please enter a valid number greater than 121.9 cm but less than 243.8 cm or a number with atleast 2 decimal places.");
        $("#fast_dbw_div1").hide();
        $("#fast_dbw_div").hide();
        $("#fast_dbw_opt_div").hide();
        return false;
      } else {
        var cm1 = Math.round((ht1 / 2.54) * 10) / 10;
        var div1 = parseInt(cm1 / 12);
        var md1 = Math.round((cm1 % 12) * 10) / 10;
        $("#fast_ht_ft1").val(div1);
        $("#fast_ht_in1").val(Math.round(md1));
      }
    }
  }
}

function conv2(aa) //Height conversion
{
  var ft2 = 0,
    inc2 = 0,
    ht2 = 0;
  //var ht2 = $("#ht2").val();
  var ft2 = $("#fast_ht_ft2").val();
  var inc2 = $("#fast_ht_in2").val();
  var decimal = /^\d{0,4}(\.\d{0,2})?$/;
  if (ft2 == "" || !ft2.match(decimal) || inc2 == "" || !inc2.match(decimal)) {
    alert("Please enter a valid number greater than 121.9 cm but less than 243.8 cm or a number with atleast 2 decimal places.");
    $("#fast_nutrition_chart_div").hide("fade", 1000);
    $("#fast_dbw1").hide("fade", 1000);
    return false;
  } else {
    if (aa == 1 || aa == 2) {
      var ss2 = Math.round((ft2 * 12) * 10) / 10;
      //var tot2 = ss2+Number(inc2);
      var tot2 = ss2 + Math.round(inc2 * 100) / 100;
      var val2 = tot2 * 2.54;
      $("#fast_ht2").val(Math.round(val2 * 10) / 10);
      $("#fast_htRange2").val(Math.round(val2 * 10) / 10);
    } else {
      var ht2 = $("#fast_ht2").val();
      var decimal = /^\d{0,4}(\.\d{0,2})?$/;
      if (ht2 == "" || !ht2.match(decimal)) {
        alert("Please enter a valid number greater than 121.9 cm but less than 243.8 cm or a number with atleast 2 decimal places.");
        $("#fast_nutrition_chart_div").hide("fade", 1000);
        $("#fast_dbw1").hide("fade", 1000);
        return false;
      } else {
        var cm2 = Math.round((ht2 / 2.54) * 10) / 10;
        var div2 = parseInt(cm2 / 12);
        var md2 = Math.round((cm2 % 12) * 10) / 10;
        $("#fast_ht_ft2").val(div2);
        $("#fast_ht_in2").val(Math.round(md2));
      }
    }
  }
}

function conv3(aa) //Height conversion
{
  var ft3 = 0,
    inc3 = 0,
    ht3 = 0;
  var ft3 = $("#fast_ht_ft3").val();
  var inc3 = $("#fast_ht_in3").val();
  if (ft3 == "" || !ft3.match(decimal) || inc3 == "" || !inc3.match(decimal)) {
    alert("Please enter a valid number greater than 121.9 cm but less than 243.8 cm or a number with atleast 2 decimal places.");
    $("#fast_nutrition_chart_div").hide("fade", 1000);
    $("#fast_dbw1").hide("fade", 1000);
    return false;
  } else {
    if (aa == 1 || aa == 2) {
      var ss3 = Math.round((ft3 * 12) * 10) / 10;
      //var tot3 = ss3+Number(inc2);
      var tot3 = ss3 + Math.round(inc3 * 100) / 100;
      var val3 = tot3 * 2.54;
      $("#fast_ht3").val(Math.round(val3 * 10) / 10);
      $("#fast_htRange3").val(Math.round(val3 * 10) / 10);
    } else {
      var ht3 = $("#fast_ht3").val();
      var decimal = /^\d{0,4}(\.\d{0,2})?$/;
      if (ht3 == "" || !ht3.match(decimal)) {
        alert("Please enter a valid number greater than 121.9 cm but less than 243.8 cm or a number with atleast 2 decimal places.");
        return false;
      } else {
        var cm3 = Math.round((ht3 / 2.54) * 10) / 10;
        var div3 = parseInt(cm3 / 12);
        var md3 = Math.round((cm3 % 12) * 10) / 10;
        $("#fast_ht_ft3").val(div3);
        $("#fast_ht_in3").val(Math.round(md3));
      }
    }
  }
}

function calc2_1() {
  var dob1 = $("#dob1").val();
  var fast_gender = $('.gender-d :selected').val();
  if (dob1 != '') {
    var now = new Date();
    var today = new Date(now.getYear(), now.getMonth(), now.getDate());
    var yearNow = now.getYear();
    var monthNow = now.getMonth();
    var dateNow = now.getDate();
    var dob = new Date(dob1.substring(6, 10), dob1.substring(0, 2) - 1, dob1.substring(3, 5));
    var yearDob = dob.getYear();
    var monthDob = dob.getMonth();
    var dateDob = dob.getDate();
    var age = {};
    var ageString = "";
    var yearString = "";
    var monthString = "";
    var dayString = "";
    yearAge = yearNow - yearDob;
    if (monthNow >= monthDob) var monthAge = monthNow - monthDob;
    else {
      yearAge--;
      var monthAge = 12 + monthNow - monthDob;
    }
    if (dateNow >= dateDob) var dateAge = dateNow - dateDob;
    else {
      monthAge--;
      var dateAge = 31 + dateNow - dateDob;
      if (monthAge < 0) {
        monthAge = 11;
        yearAge--;
      }
    }
    age = {
      years: yearAge,
      months: monthAge,
      days: dateAge
    };
    if (age.years > 1) yearString = " years";
    else yearString = " year";
    if (age.months > 1) monthString = " months";
    else monthString = " month";
    if (age.days > 1) dayString = " days";
    else dayString = " day";
    if ((age.years > 0) && (age.months > 0) && (age.days > 0)) ageString = age.years + yearString + ", " + age.months + monthString + ", and " + age.days + dayString + " old.";
    else if ((age.years == 0) && (age.months == 0) && (age.days > 0)) ageString = "Only " + age.days + dayString + " old!";
    else if ((age.years > 0) && (age.months == 0) && (age.days == 0)) ageString = age.years + yearString + " old. Happy Birthday!!";
    else if ((age.years > 0) && (age.months > 0) && (age.days == 0)) ageString = age.years + yearString + " and " + age.months + monthString + " old.";
    else if ((age.years == 0) && (age.months > 0) && (age.days > 0)) ageString = age.months + monthString + " and " + age.days + dayString + " old.";
    else if ((age.years > 0) && (age.months == 0) && (age.days > 0)) ageString = age.years + yearString + " and " + age.days + dayString + " old.";
    else if ((age.years == 0) && (age.months > 0) && (age.days == 0)) ageString = age.months + monthString + " old.";
    else ageString = "Oops! Could not calculate age!";
    // return ageString;
    $("#yrs1").val(age.years);
    $("#mos1").val(age.months);
    var yrs1 = $("#yrs1").val();
    var mos1 = $("#mos1").val();
    var ask_pregnant = $('input[name=ask_pregnant]:checked').val();
    $("#fast_dbw_opt").val('kgs');
    if (fast_gender == 1) {
      $("#mens_date").hide();
      $("#fast_dbw_img_div").hide();
      $("#ask_gestation_div").hide();
      $("#gestation_div").hide();
      $("#female_div").hide();
      if (yrs1 >= 0 && yrs1 <= 10) {
        $("#dbw_ht_div").hide();
        $.ajax({
          url: base_url + 'help/get_dbw_range',
          data: 'mos1=' + mos1 + '&yrs1=' + yrs1 + '&fast_gender=' + fast_gender,
          method: "GET",
          success: function(retrieved_data) {
            // Your code here.. use something like this
            var Obj = retrieved_data;
            // Since your controller produce array of object you can access the value by using this one : 
            $.each(Obj, function(index, field) {
              var dbw = field.wt_range;
              //alert(field.lower);
              $("#fast_dbw").html(field.lower + ' - ' + field.upper + ' kgs');
              //$("#fast_dbw").html(Math.round(dbw * 10) / 10 + ' kgs');
              $("#fast_dbw_lower_val").val(field.lower);
              $("#fast_dbw_upper_val").val(field.upper);
              $("#fast_dbw_div1").show();
              $("#fast_dbw_div").show();
              $("#fast_dbw_opt_div").show()
              $('#kgs').css('background-color', '#FFFFFF');
              $('#kgs').css('color', '#000000');
              $('#lbs').css('background-color', '#FFFFFF');
              $('#lbs').css('color', '#000000');
              $("#fast_dbw_div").addClass("img-thumbnail");
              $("#fast_dbw").html(field.lower + ' - ' + field.upper + ' kgs');
              //$("#fast_dbw").html(Math.round(dbw * 10) / 10 + ' kgs');
              $("#fast_dbw_label").html('Keep your weight within this range ' + '<strong>' + field.lower + ' - ' + field.upper + ' kgs ' + ' </strong>. You can achieve your DBW by eating a healthy and balanced diet and engaging in moderate physical activity like jogging, brisk walking and aerobic dancing.<br><br> <p style="font-size:12px">Weight range is based on the WHO Weight-for-age growth charts.</p>');
              $("#fast_tips_pregnant").html('');
            });
          }
        });
        $("#dbw_desc").html('The Desirable Body Weight  (DBW) is the optimal weight based on a given age/height. The DBW is used in calculating the <a href="#" class="link" id="energy_requirement">daily energy requirement</a>');
        $(function() {
          $("#energy_requirement_dialog").dialog({
            autoOpen: false,
            title: 'Did you know?',
            resizable: false,
            modal: true,
            width: 'auto',
            height: 600,
            create: function(event, ui) {
              // Set max-width
              $(this).parent().css("maxWidth", "800px");
            }
          });
          $(".ui-dialog").addClass("ui-widget-header");
          $(".ui-dialog").addClass("ui-widget-content");
          $("#energy_requirement").on("click", function(e) {
            $.ajax({
              type: "GET",
              url: base_url + 'help/energy_requirement',
              success: function(res) {
                $("#energy_requirement_dialog").html(res);
                $("#energy_requirement_dialog").dialog("open");
                $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
                $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
              }
            });
            $("#energy_requirement_dialog").dialog("open");
            e.preventDefault();
          });
        });
      } else if (yrs1 >= 10.1 && yrs1 <= 18.9) {
        $("#fast_dbw_label").html('Weight-for-age reference data are not available beyond age 10 because this indicator does not distinguish between height and body mass in an age period where many children are experiencing the pubertal growth spurt and may appear as having excess weight (by weight-for-age) when in fact they are just tall. - World Health Organization');
        $("#dbw_ht_div").hide();
        $("#female_div").hide();
        $("#fast_dbw_div").addClass("img-thumbnail");
        $("#fast_dbw").html(0 + ' - ' + 0 + ' kgs');
        //$("#fast_dbw").html(Math.round(dbw * 10) / 10 + ' kgs');
        $("#fast_dbw_div1").show();
        $("#fast_dbw_div").show();
        $("#fast_dbw_opt_div").hide();
        $('#kgs').css('background-color', '#FFFFFF');
        $('#kgs').css('color', '#000000');
        $('#lbs').css('background-color', '#FFFFFF');
        $('#lbs').css('color', '#000000');
        $("#dbw_ht_div").hide();
        $("#dbw_desc").html('The Desirable Body Weight  (DBW) is the optimal weight based on a given age/height. The DBW is used in calculating the <a href="#" class="link" id="energy_requirement">daily energy requirement</a>');
      } else {
        $("#dbw_ht_div").show();
        $("#dbw_desc").html('The Desirable Body Weight (DBW) is the optimal weight based on a given height which can be computed using the <a href="#" class="link" id="tannhauser">Tannhauser Formula</a>. The DBW is used in calculating the <a href="#" class="link" id="energy_requirement">daily energy requirement</a>');
        $(function() {
          $("#energy_requirement_dialog").dialog({
            autoOpen: false,
            title: 'Did you know?',
            resizable: false,
            modal: true,
            width: 'auto',
            height: 600,
            create: function(event, ui) {
              // Set max-width
              $(this).parent().css("maxWidth", "800px");
            }
          });
          $(".ui-dialog").addClass("ui-widget-header");
          $(".ui-dialog").addClass("ui-widget-content");
          $("#energy_requirement").on("click", function(e) {
            $.ajax({
              type: "GET",
              url: base_url + 'help/energy_requirement',
              success: function(res) {
                $("#energy_requirement_dialog").html(res);
                $("#energy_requirement_dialog").dialog("open");
                $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
                $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
              }
            });
            $("#energy_requirement_dialog").dialog("open");
            e.preventDefault();
          });
        });
        $(function() {
          $("#tannhauser_dialog").dialog({
            autoOpen: false,
            title: 'Did you know?',
            resizable: false,
            modal: true,
            width: 'auto',
            create: function(event, ui) {
              // Set max-width
              $(this).parent().css("maxWidth", "600px");
            }
          });
          $(".ui-dialog").addClass("ui-widget-header");
          $(".ui-dialog").addClass("ui-widget-content");
          $("#tannhauser").on("click", function(e) {
            $.ajax({
              type: "GET",
              url: base_url + 'help/tannhauser',
              success: function(res) {
                $("#tannhauser_dialog").html(res);
                $("#tannhauser_dialog").dialog("open");
                $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
                $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
              }
            });
            $("#tannhauser_dialog").dialog("open");
            e.preventDefault();
          });
        });
        calc2();
      }
    } else {
      $("#female_div").show();
      if (ask_pregnant == 1) {
        $("#ask_gestation_div").show();
      } else {
        $("#ask_gestation_div").hide();
        $("#gestation_div").hide();
      }
      if (yrs1 >= 0 && yrs1 <= 10) {
        //$("#female_div").hide();
        $("#dbw_ht_div").hide();
        $.ajax({
          url: base_url + 'help/get_dbw_range',
          data: 'mos1=' + mos1 + '&yrs1=' + yrs1 + '&fast_gender=' + fast_gender,
          method: "GET",
          success: function(retrieved_data) {
            // Your code here.. use something like this
            var Obj = retrieved_data;
            // Since your controller produce array of object you can access the value by using this one : 
            $.each(Obj, function(index, field) {
              var dbw = field.wt_range;
              //alert(field.lower);
              $("#fast_dbw").html(field.lower + ' - ' + field.upper + ' kgs');
              //$("#fast_dbw").html(Math.round(dbw * 10) / 10 + ' kgs');
              $("#fast_dbw_lower_val").val(field.lower);
              $("#fast_dbw_upper_val").val(field.upper);
              $("#fast_dbw_div1").show();
              $("#fast_dbw_div").show();
              $("#fast_dbw_opt_div").show()
              $("#fast_dbw_div").addClass("img-thumbnail");
              $("#fast_dbw").html(field.lower + ' - ' + field.upper + ' kgs');
              //$("#fast_dbw").html(Math.round(dbw * 10) / 10 + ' kgs');
              $("#fast_dbw_label").html('Keep your weight within this range ' + '<strong>' + field.lower + ' - ' + field.upper + ' kgs ' + ' </strong>. You can achieve your DBW by eating a healthy and balanced diet and engaging in moderate physical activity like jogging, brisk walking and aerobic dancing.<br><br> <p style="font-size:12px">Weight range is based on the WHO Weight-for-age growth charts.</p>');
            });
          }
        });
        $("#dbw_desc").html('The Desirable Body Weight  (DBW) is the optimal weight based on a given age/height. The DBW is used in calculating the <a href="#" class="link" id="energy_requirement">daily energy requirement</a>');
        $(function() {
          $("#energy_requirement_dialog").dialog({
            autoOpen: false,
            resizable: false,
            modal: true,
            width: 'auto',
            height: 600,
            create: function(event, ui) {
              // Set max-width
              $(this).parent().css("maxWidth", "800px");
            }
          });
          $(".ui-dialog").addClass("ui-widget-header");
          $(".ui-dialog").addClass("ui-widget-content");
          $("#energy_requirement").on("click", function(e) {
            $.ajax({
              type: "GET",
              url: base_url + 'help/energy_requirement',
              success: function(res) {
                $("#energy_requirement_dialog").html(res);
                $("#energy_requirement_dialog").dialog("open");
                $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
                $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
              }
            });
            $("#energy_requirement_dialog").dialog("open");
            e.preventDefault();
          });
        });
      } else if (yrs1 >= 10.1 && yrs1 <= 18.9) {
        $("#dbw_ht_div").hide();
        $("#fast_dbw_div1").show();
        $("#fast_dbw_div").show();
        $("#fast_dbw_label").html('Weight-for-age reference data are not available beyond age 10 because this indicator does not distinguish between height and body mass in an age period where many children are experiencing the pubertal growth spurt and may appear as having excess weight (by weight-for-age) when in fact they are just tall. - World Health Organization');
        //$("#female_div").hide();
        $("#fast_dbw_div").addClass("img-thumbnail");
        $("#fast_dbw").html(0 + ' - ' + 0 + ' kgs');
        //$("#fast_dbw").html(Math.round(dbw * 10) / 10 + ' kgs');
        $("#dbw_ht_div").hide();
        $("#female_div").hide();
        $("#ask_gestation_div").hide();
        $("#gestation_div").hide();
        $("#fast_dbw_img_div").hide();
        $("#fast_tips_pregnant").html('');
        $("#dbw_desc").html('The Desirable Body Weight  (DBW) is the optimal weight based on a given age/height. The DBW is used in calculating the <a href="#" class="link" id="energy_requirement">daily energy requirement</a>');
        $(function() {
          $("#energy_requirement_dialog").dialog({
            autoOpen: false,
            title: 'Did you know?',
            resizable: false,
            modal: true,
            width: 'auto',
            height: 600,
            create: function(event, ui) {
              // Set max-width
              $(this).parent().css("maxWidth", "800px");
            }
          });
          $(".ui-dialog").addClass("ui-widget-header");
          $(".ui-dialog").addClass("ui-widget-content");
          $("#energy_requirement").on("click", function(e) {
            $.ajax({
              type: "GET",
              url: base_url + 'help/energy_requirement',
              success: function(res) {
                $("#energy_requirement_dialog").html(res);
                $("#energy_requirement_dialog").dialog("open");
                $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
                $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
              }
            });
            $("#energy_requirement_dialog").dialog("open");
            e.preventDefault();
          });
        });
      } else {
        if (ask_pregnant == 1) {
          $("#ask_gestation_div").show();
        } else {
          $("#ask_gestation_div").hide();
          $("#gestation_div").hide();
        }
        $("#dbw_ht_div").show();
        $("#dbw_desc").html('The Desirable Body Weight (DBW) is the optimal weight based on a given height which can be computed using the <a href="#" class="link" id="tannhauser">Tannhauser Formula</a>. The DBW is used in calculating the <a href="#" class="link" id="energy_requirement">daily energy requirement</a>');
        $(function() {
          $("#energy_requirement_dialog").dialog({
            autoOpen: false,
            title: 'Did you know?',
            resizable: false,
            modal: true,
            width: 'auto',
            height: 600,
            create: function(event, ui) {
              // Set max-width
              $(this).parent().css("maxWidth", "800px");
            }
          });
          $(".ui-dialog").addClass("ui-widget-header");
          $(".ui-dialog").addClass("ui-widget-content");
          $("#energy_requirement").on("click", function(e) {
            $.ajax({
              type: "GET",
              url: base_url + 'help/energy_requirement',
              success: function(res) {
                $("#energy_requirement_dialog").html(res);
                $("#energy_requirement_dialog").dialog("open");
                $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
                $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
              }
            });
            $("#energy_requirement_dialog").dialog("open");
            e.preventDefault();
          });
        });
        $(function() {
          $("#tannhauser_dialog").dialog({
            autoOpen: false,
            title: 'Did you know?',
            resizable: false,
            modal: true,
            width: 'auto',
            height: 600,
            create: function(event, ui) {
              // Set max-width
              $(this).parent().css("maxWidth", "800px");
            }
          });
          $(".ui-dialog").addClass("ui-widget-header");
          $(".ui-dialog").addClass("ui-widget-content");
          $("#tannhauser").on("click", function(e) {
            $.ajax({
              type: "GET",
              url: base_url + 'help/tannhauser',
              success: function(res) {
                $("#tannhauser_dialog").html(res);
                $("#tannhauser_dialog").dialog("open");
                $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
                $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
              }
            });
            $("#tannhauser_dialog").dialog("open");
            e.preventDefault();
          });
        });
        $("#female_div").show();
        gestation();
      }
    }
  } else {
    if (fast_gender == 1) {
      $("#female_div").hide();
      $("#ask_gestation_div").hide();
    } else {
      $("#female_div").show();
      $("#ask_gestation_div").hide();
    }
    $("#yrs1").val('0');
    $("#mos1").val('0');
    $("#fast_dbw_div").hide();
    $("#fast_dbw").html(0 + ' - ' + 0 + ' kgs');
    $("#fast_dbw_opt_div").hide();
  }
}

function gestation() {
  var fast_ht1 = $("#fast_ht1").val();
  var gestation_wks = $("#gestation_wks").val();
  var ask_pregnant = $('input[name=ask_pregnant]:checked').val();
  var gender = $(".gender-d").val();
  $("#dbw_ht_div").show();
  $("#fast_dbw_opt").val('kgs');
  if (gender == 1) {
    calc2();
  } else {
    $("#female_div").show();
    if (ask_pregnant == 1) {
      if (fast_ht1 < 127 || fast_ht1 > 170 || gestation_wks < 13 || gestation_wks > 40) {
        $("#fast_dbw_div").show();
        $("#fast_dbw_div").addClass("img-thumbnail");
        $("#fast_dbw_label").html('The pregnant table used in this site is intended for women with gestational age of 13-40 weeks and height of 127-170 cm only. If you are above or below these ranges, please consult your OB-GYNE. ');
        $("#fast_dbw_div1").show();
        $("#fast_dbw").html(0 + ' - ' + 0 + ' kgs');
        $("#fast_dbw_opt_div").hide();
        $("#fast_dbw_img_div").hide();
      } else {
        //$(".kgs").attr('disabled', true);
        $.ajax({
          url: base_url + 'help/select_gestation',
          data: 'gestation_wks=' + gestation_wks + '&fast_ht1=' + fast_ht1,
          method: "GET",
          success: function(retrieved_data) {
            // Your code here.. use something like this
            var Obj = retrieved_data;
            // Since your controller produce array of object you can access the value by using this one : 
            $.each(Obj, function(index, field) {
              $("#fast_dbw_label").html('You should be weighing around ' + '<strong>' + field.gestation_value + ' ' + ' kgs ' + '</strong> by this time. <br><br> <p style="font-size:12px">Data based on Weight-for-Height table at a given weeks of pregnancy: Philippines 2013.</p> ');
              var dbw_photo = field.dbw_photo;
              $("#fast_dbw_img").html('<img src="' + base_url + 'assets/images/fast/' + dbw_photo + '"  height="100%" width="100%" />');
              $("#fast_dbw_img_copyright").html("<a href='http://www.freepik.com/free-vector/silhouettes-pregnant-women_595394.htm#term=pregnant'>Pregnant vector designed by Freepik</a>");
              $("#fast_dbw_img_div").show();
              $("#fast_tips_pregnant").html('<p style="font-size:12px;color:#6b6161;">Tips for pregnant women. <a href="#" id="tips_pregnant" class="btn btn-success btn-sm">Read more</a></p>');
              $("#fast_dbw_opt_div").show();
              $("#fast_dbw_div").show();
              $("#fast_dbw_div1").show();
              $("#fast_dbw_div").addClass("img-thumbnail");
              $("#fast_dbw").html(field.gestation_value + ' kgs');
              $("#fast_dbw_val").val(field.gestation_value);
              $(function() {
                $("#tips_pregnant_dialog").dialog({
                  autoOpen: false,
                  title: 'Did you know?',
                  resizable: false,
                  modal: true,
                  width: 'auto',
                  height: 850,
                  create: function(event, ui) {
                    $(this).parent().css("maxWidth", "850px");
                  }
                });
                $(".ui-dialog").addClass("ui-widget-header");
                $(".ui-dialog").addClass("ui-widget-content");
                $("#tips_pregnant").on("click", function(e) {
                  $.ajax({
                    type: "GET",
                    url: base_url + 'help/pregnant',
                    success: function(res) {
                      $("#tips_pregnant_dialog").html(res);
                      $("#tips_pregnant_dialog").dialog("open");
                      $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
                      $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
                    }
                  });
                  $("#tips_pregnant_dialog").dialog("open");
                  e.preventDefault();
                });
              });
            });
          }
        });
      }
    } else {
      calc2();
    }
  }
}

function calc2() {
  // DBW metric value
  var ht = $("#fast_ht1").val();
  var ft = $("#fast_ht_ft1").val();
  var inc = $("#fast_ht_in1").val();
  var dbw = ((ht - 100) - ((ht - 100) * 0.1));
  var dbw1 = ((ht - 100) - ((ht - 100) * 0.1));
  var decimal = /^\d{0,4}(\.\d{0,2})?$/;
  if (ht == "" || !ht.match(decimal) || ht < 121.9 || ht > 243.8 || inc == "" || !inc.match(decimal) || ft == "" || !ft.match(decimal) || ft < 4 || ft > 8) {
    alert("Please enter a valid number greater than 121.9 cm but less than 243.8 cm or a number with atleast 2 decimal places.");
    $("#fast_dbw_div1").hide();
    $("#fast_dbw_div").hide();
    $("#fast_dbw_opt_div").hide();
    return false;
  } else {
    $("#fast_dbw").html(Math.round(dbw * 10) / 10 + ' kgs');
    $("#fast_dbw_val").val(Math.round(dbw * 10) / 10);
    $("#fast_dbw_div1").show();
    $("#fast_dbw_div").show();
    $("#fast_dbw_opt_div").show();
    //Upper Limit
    var x = Math.round((dbw * 0.1) * 10) / 10;
    var upper_limit = Math.round((dbw + x) * 10) / 10;
    var upper_limit = Math.round((upper_limit) * 10) / 10;
    //Lower Limit
    var y = Math.round((dbw * 0.1) * 10) / 10;
    var lower_limit = Math.round((dbw - y) * 10) / 10;
    var lower_limit = Math.round((lower_limit) * 10) / 10;
    $("#fast_dbw_label").html('Your desirable body weight is ' + '<strong>' + Math.round(dbw * 10) / 10 + ' ' + ' kgs' + '</strong>. ' + 'Keep your weight within this range ' + '<strong>' + lower_limit + ' - ' + upper_limit + ' kgs' + ' </strong>. You can achieve your DBW by eating a healthy and balanced diet and engaging in moderate physical activity like jogging, brisk walking and aerobic dancing.');
    //dbw_opt();
    $('#kgs').css('background-color', '#FFFFFF');
    $('#kgs').css('color', '#000000');
    $('#lbs').css('background-color', '#FFFFFF');
    $('#lbs').css('color', '#000000');
    $("#fast_dbw_div").addClass("img-thumbnail");
  }
}

function roundToNearest(x) {
  if (x % 50 < 25) {
    return x - (x % 50);
  } else if (x % 50 > 25) {
    return x + (50 - (x % 50));
  } else if (x % 50 == 25) {
    return x + 25; //when it is halfawy between the nearest 50 it will automatically round up, change this line to 'return x - 25' if you want it to automatically round down
  }
}

function calc3() {
  // Total energy requirement
  var ht = $("#fast_ht2").val();
  var ht_ft = $("#fast_ht_ft2").val();
  var ht_in = $("#fast_ht_in2").val();
  var dbw = ((ht - 100) - ((ht - 100) * 0.1));
  var dbw1 = Math.round(dbw + 0.2);
  var pa_lvl_val = $("#fast_pa_lvl_val").val();
  var ter = Math.round((dbw1 * pa_lvl_val) * 10) / 10;
  //var ter_round = Math.round(ter/50) *50 ;
  //var ter_round = Math.round(ter);
  var ter_round = roundToNearest(ter);
  var decimal = /^\d{0,4}(\.\d{0,2})?$/;
  if (ht == "" || !ht.match(decimal) || ht < 121.9 || ht > 243.8 || ht_ft == "" || !ht_ft.match(decimal) || ht_ft < 4 || ht_ft > 8 || ht_in == "" || !ht_in.match(decimal)) {
    alert("Please enter a valid number greater than 121.9 cm but less than 243.8 cm or a number with atleast 2 decimal places.");
    $("#fast_nutrition_chart_div").hide("fade", 1000);
    $("#fast_dbw1").hide("fade", 1000);
    return false;
  } else {
    $("#fast_nutrition_chart_div").show("fade", 1000);
    $("#fast_dbw1").show("fade", 1000);
    var dbw_kgs = Math.round(dbw * 10) / 10;
    var dbw_lbs = Math.round((dbw * 2.2) * 10) / 10;
    $('#fast_dbw1').html('<strong>YOUR DESIRABLE BODY WEIGHT:</strong><br>' + '<span class="btn btn-primary btn-lg" style="font-size:20px;">' + dbw_kgs + ' kgs' + '</span>' + '  or ' + '<span  class="btn btn-primary btn-lg" style="font-size:20px;">' + dbw_lbs + ' lbs' + '</span>');
    //$('#dbw_div1').show();
    //$("#dbw_div1").addClass("img-thumbnail");
    //$("#ter").val(ter_round);
    $("#fast_ter_label").html('<strong>YOU NEED ' + '<a href="#"  class="btn btn-success btn-lg" style="color: #ffffff; font-size:20px;" >' + ter_round + '</a>' + ' <a href="#" class="link" id="calorie">KCAL</a> PER DAY DISTRIBUTED AS FOLLOWS: </strong>');
    var carbo = (ter_round * .65) / 4;
    var carbo_round = Math.round(carbo / 5) * 5;
    $("#fast_carbo_label").html('<strong>' + carbo_round + ' grams</strong>');
    $("#fast_carbo").val(carbo_round);
    var pro = (ter_round * .15) / 4;
    var pro_round = Math.round(pro / 5) * 5;
    $("#fast_pro_label").html('<strong>' + pro_round + ' grams</strong>');
    $("#fast_pro").val(pro_round);
    var fat = (ter_round * .2) / 9;
    var fat_round = Math.round(fat / 5) * 5;
    $("#fast_fat_label").html('<strong>' + fat_round + ' grams</strong>');
    $("#fast_fat").val(fat_round);
  }
}

function calc3_1() {
  var fast_genderx = $("#fast_genderx").val();
  var age_group = $("#age_group").val();
  $("#fast_ter_label").html('<strong>YOU NEED ' + '<a href="#"  class="btn btn-success btn-lg" style="color: #ffffff; font-size:20px;" >' + '' + '</a>' + ' <a href="#" class="link" id="calorie">KCAL</a> PER DAY DISTRIBUTED AS FOLLOWS: </strong>');
  $("#fast_carbo_label").html('<strong>' + '' + ' grams</strong>');
  $("#fast_carbo").val();
  $("#fast_pro_label").html('<strong>' + '' + ' grams</strong>');
  $("#fast_pro").val();
  $("#fast_fat_label").html('<strong>' + '' + ' grams</strong>');
  $("#fast_fat").val();
  $("#pa_lvl_div").hide();
  $("#fast_ter_gender_img").hide();
  $("#fast_ter_gender_copyright").html("");
  if (age_group == 7) {
    $("#pa_lvl_div").show();
    $("#fast_ter_ht_div").show();
    $("#fast_ter_gender_img").hide();
    $("#fast_dbw_div1").show();
    $("#fast_pdri").html('');
    calc3();
  } else if (age_group == 8) { //+300
    $("#pa_lvl_div").show();
    $("#fast_ter_ht_div").show();
    $("#fast_ter_gender_img").hide();
    $("#fast_dbw_div1").show();
    var ht = $("#fast_ht2").val();
    var ht_ft = $("#fast_ht_ft2").val();
    var ht_in = $("#fast_ht_in2").val();
    var dbw = ((ht - 100) - ((ht - 100) * 0.1));
    var dbw1 = Math.round(dbw + 0.2);
    var pa_lvl_val = $("#fast_pa_lvl_val").val();
    var ter = Math.round((dbw1 * pa_lvl_val) * 10) / 10;
    //var ter_round = Math.round(ter/50) *50 ;
    //var ter_round = Math.round(ter);
    var ter_round = roundToNearest(ter) + 300;
    $("#fast_nutrition_chart_div").show("fade", 1000);
    $("#fast_dbw1").hide();
    var dbw_kgs = Math.round(dbw * 10) / 10;
    var dbw_lbs = Math.round((dbw * 2.2) * 10) / 10;
    $('#fast_dbw1').html('<strong>YOUR DESIRABLE BODY WEIGHT:</strong><br>' + '<span class="btn btn-primary btn-lg" style="font-size:20px;">' + dbw_kgs + ' kgs' + '</span>' + '  or ' + '<span  class="btn btn-primary btn-lg" style="font-size:20px;">' + dbw_lbs + ' lbs' + '</span>');
    //$('#dbw_div1').show();
    //$("#dbw_div1").addClass("img-thumbnail");
    //$("#ter").val(ter_round);
    $("#fast_ter_label").html('<strong>YOU NEED ' + '<a href="#"  class="btn btn-success btn-lg" style="color: #ffffff; font-size:20px;" >' + ter_round + '</a>' + ' <a href="#" class="link" id="calorie">KCAL</a> PER DAY DISTRIBUTED AS FOLLOWS: </strong>');
    var carbo = (ter_round * .65) / 4;
    var carbo_round = Math.round(carbo / 5) * 5;
    $("#fast_carbo_label").html('<strong>' + carbo_round + ' grams</strong>');
    $("#fast_carbo").val(carbo_round);
    var pro = (ter_round * .15) / 4;
    var pro_round = Math.round(pro / 5) * 5;
    $("#fast_pro_label").html('<strong>' + pro_round + ' grams</strong>');
    $("#fast_pro").val(pro_round);
    var fat = (ter_round * .2) / 9;
    var fat_round = Math.round(fat / 5) * 5;
    $("#fast_fat_label").html('<strong>' + fat_round + ' grams</strong>');
    $("#fast_fat").val(fat_round);
    $("#fast_nutrition_chart_div").show("fade", 1000);
    $("#fast_dbw_div1").show("fade", 1000);
    $("#fast_pdri").html('');
  } else if (age_group == 9) { //+500
    $("#pa_lvl_div").show();
    $("#fast_ter_ht_div").show();
    $("#fast_ter_gender_img").hide();
    $("#fast_dbw_div1").hide();
    var ht = $("#fast_ht2").val();
    var ht_ft = $("#fast_ht_ft2").val();
    var ht_in = $("#fast_ht_in2").val();
    var dbw = ((ht - 100) - ((ht - 100) * 0.1));
    var dbw1 = Math.round(dbw + 0.2);
    var pa_lvl_val = $("#fast_pa_lvl_val").val();
    var ter = Math.round((dbw1 * pa_lvl_val) * 10) / 10;
    //var ter_round = Math.round(ter/50) *50 ;
    //var ter_round = Math.round(ter);
    var ter_round = roundToNearest(ter) + 500;
    $("#fast_nutrition_chart_div").show("fade", 1000);
    var dbw_kgs = Math.round(dbw * 10) / 10;
    var dbw_lbs = Math.round((dbw * 2.2) * 10) / 10;
    $('#fast_dbw1').html('<strong>YOUR DESIRABLE BODY WEIGHT:</strong><br>' + '<span class="btn btn-primary btn-lg" style="font-size:20px;">' + dbw_kgs + ' kgs' + '</span>' + '  or ' + '<span  class="btn btn-primary btn-lg" style="font-size:20px;">' + dbw_lbs + ' lbs' + '</span>');
    //$('#dbw_div1').show();
    //$("#dbw_div1").addClass("img-thumbnail");
    //$("#ter").val(ter_round);
    $("#fast_ter_label").html('<strong>YOU NEED ' + '<a href="#"  class="btn btn-success btn-lg" style="color: #ffffff; font-size:20px;" >' + ter_round + '</a>' + ' <a href="#" class="link" id="calorie">KCAL</a> PER DAY DISTRIBUTED AS FOLLOWS: </strong>');
    var carbo = (ter_round * .65) / 4;
    var carbo_round = Math.round(carbo / 5) * 5;
    $("#fast_carbo_label").html('<strong>' + carbo_round + ' grams</strong>');
    $("#fast_carbo").val(carbo_round);
    var pro = (ter_round * .15) / 4;
    var pro_round = Math.round(pro / 5) * 5;
    $("#fast_pro_label").html('<strong>' + pro_round + ' grams</strong>');
    $("#fast_pro").val(pro_round);
    var fat = (ter_round * .2) / 9;
    var fat_round = Math.round(fat / 5) * 5;
    $("#fast_fat_label").html('<strong>' + fat_round + ' grams</strong>');
    $("#fast_fat").val(fat_round);
    $("#fast_nutrition_chart_div").show("fade", 1000);
    $("#fast_pdri").html('');
  } else {
    $("#fast_dbw1").hide();
    $("#fast_ter_ht_div").hide();
    $("#fast_ter_gender_img").show();
    if (fast_genderx == 1) {
      $("#fast_ter_gender_img").html('<img src="' + base_url + 'assets/images/fast/boy_eating.png"  height="60%" width="60%" />');
      $("#fast_ter_gender_copyright").html("<a href='http://www.freepik.com/free-photos-vectors/kids'>Kids vector designed by Freepik</a>");
    } else {
      $("#fast_ter_gender_img").html('<img src="' + base_url + 'assets/images/fast/girl_eating.png"  height="60%" width="60%" />');
      $("#fast_ter_gender_copyright").html("<a href='http://www.freepik.com/free-photos-vectors/kids'>Kids vector designed by Freepik</a>");
    }
    $("#fast_pdri").html('<p style="font-size:12px">Recommendations adapted from the Philippine Dietary Reference Intakes 2015.</p>');
    $.ajax({
      url: base_url + 'help/select_age_group',
      data: 'age_group=' + age_group + '&fast_genderx=' + fast_genderx,
      method: "GET",
      success: function(retrieved_data) {
        // Your code here.. use something like this
        var Obj = retrieved_data;
        // Since your controller produce array of object you can access the value by using this one : 
        $.each(Obj, function(index, field) {
          $("#fast_ter_label").html('<strong>YOU NEED ' + '<a href="#"  class="btn btn-success btn-lg" style="color: #ffffff; font-size:20px;" >' + field.cal + '</a>' + ' <a href="#" class="link" id="calorie">KCAL</a> PER DAY DISTRIBUTED AS FOLLOWS: </strong>');
          var ter_round = field.cal;
          var carbo = (ter_round * .65) / 4;
          var carbo_round = Math.round(carbo / 5) * 5;
          $("#fast_carbo_label").html('<strong>' + carbo_round + ' grams</strong>');
          $("#fast_carbo").val(carbo_round);
          var pro = (ter_round * .15) / 4;
          var pro_round = Math.round(pro / 5) * 5;
          $("#fast_pro_label").html('<strong>' + pro_round + ' grams</strong>');
          $("#fast_pro").val(pro_round);
          var fat = (ter_round * .2) / 9;
          var fat_round = Math.round(fat / 5) * 5;
          $("#fast_fat_label").html('<strong>' + fat_round + ' grams</strong>');
          $("#fast_fat").val(fat_round);
        });
      }
    });
  }
}

function calc4() {
  var wc = $("#fast_wc").val();
  var wc_opt = $("#fast_wc_opt").val();
  //var hc = $("#hc").val();
  //var hc_opt = $("#fast_hc_opt").val();
  var gender = $(".gender-b").val();
  var decimal = /^\d{0,4}(\.\d{0,2})?$/;
  if (wc == "" || !wc.match(decimal)) {
    alert("Please enter a valid number greater than 50.8 cm/20 inches but less than 180 cm/70.9 inches or a number with atleast 2 decimal places.");
    //$("#fast_wc").val('15');
    //$("#fast_waistRange").val('15');
    $("#fast_risk_indicator_div").hide("fade", 1000);
    $("#fast_risk_indicator_img_div").hide("fade", 1000);
    return false;
  } else {
    if (wc_opt == "in") {
      //var wc_cm = Math.round((wc*2.54)*10)/10;  
      if (wc < 20 || wc > 70.9) {
        alert("Please enter a valid number greater than 20 inches but less than 70.9 inches or a number with atleast 2 decimal places.");
        $("#fast_risk_indicator_div").hide("fade", 1000);
        $("#fast_risk_indicator_img_div").hide("fade", 1000);
        return false;
      } else {
        var wc_cm = Math.round((wc * 2.54) * 10) / 10;
      }
    } else {
      if (wc < 50.8 || wc > 180) {
        alert("Please enter a valid number greater than 50.8 cm but less than 180 cm or a number with atleast 2 decimal places.");
        //$("#fast_wc").val('15');
        //$("#fast_waistRange").val('15');
        $("#fast_risk_indicator_div").hide("fade", 1000);
        return false;
      } else {
        var wc_cm = Math.round((wc) * 10) / 10;
      }
      //var wc_cm = Math.round((wc)*10)/10;
    }
    $("#fast_risk_indicator_div").addClass("img-thumbnail");
    // Waist Circumference bmi_class
    if (gender == 1) {
      if (wc_cm <= 94) {
        $("#fast_risk_indicator_div").show("fade", 1000);
        $("#fast_risk_indicator_img_div").show("fade", 1000);
        $("#fast_risk_indicator").html('<p >Your waist circumference is within the cut-off value of less than 94 cm which may indicate <font color="#33CC33"><strong>LOW RISK</strong></font> of developing <a href="#" class="link heart_disease" id="heart_disease1">cardiovascular diseases</a> and <a href="#" class="link type2diabetes" id="type2diabetes1">type-2 diabetes</a>.</p>');
        // Low risk of developing cardiovascular diseases and type-2 diabetes. 
        $("#fast_risk_indicator_div").css("border-top", "5px solid #33CC33");
        $("#fast_risk_indicator_img").html('<img src="' + base_url + 'assets/images/fast/bmi_male-2.svg"  height="70%" width="70%" />');
        //$("#fast_waist_label").html("Waist- measure at navel");
        //$("#fast_waist_label").addClass("waist_hip_label");
        //$("#fast_hip_label").html("Hip- measure at hip bones");
        //$("#fast_hip_label").addClass("waist_hip_label");
      } else if (wc_cm > 94) {
        $("#fast_risk_indicator_div").show("fade", 1000);
        $("#fast_risk_indicator_img_div").show("fade", 1000);
        $("#fast_risk_indicator").html('Your waist circumference is above the cut-off value of greater than 94 cm which may indicate <font color="#ff0000"><strong>HIGH RISK</strong></font> of developing <a href="#" class="link heart_disease" id="heart_disease1">cardiovascular diseases</a> and <a href="#" class="link type2diabetes" id="type2diabetes1">type-2 diabetes</a>.');
        // Low risk of developing cardiovascular diseases and type-2 diabetes. 
        $("#fast_risk_indicator_div").css("border-top", "5px solid #ff0000");
        $("#fast_risk_indicator_img").html('<img src="' + base_url + 'assets/images/fast/bmi_male-7.svg"  height="70%" width="70%" />');
      }
    } else if (gender == 2) {
      if (wc_cm <= 80) {
        //$("#risk_indicator").val('Low Risk');
        // $("#fast_risk_indicator").css( "color", "#33CC33" );
        $("#fast_risk_indicator_div").show("fade", 1000);
        $("#fast_risk_indicator").html('Your waist circumference is within the cut-off value of less than 80 cm which may indicate <font color="#33CC33"><strong>LOW RISK</strong></font> of developing <a href="#" class="link heart_disease" id="heart_disease1">cardiovascular diseases</a> and <a href="#" class="link type2diabetes" id="type2diabetes1">type-2 diabetes</a>.');
        // Low risk of developing cardiovascular diseases and type-2 diabetes. 
        $("#fast_risk_indicator_div").css("border-top", "5px solid #33CC33");
        $("#fast_risk_indicator_div").show("fade", 1000);
        $("#fast_risk_indicator_img_div").show("fade", 1000);
        $("#fast_risk_indicator_img").html('<img src="' + base_url + 'assets/images/fast/bmi_female-2.svg"  height="70%" width="70%" />');
      } else if (wc_cm > 80) {
        $("#fast_risk_indicator_div").show("fade", 1000);
        $("#fast_risk_indicator_img_div").show("fade", 1000);
        $("#fast_risk_indicator").html('Your waist circumference is above the cut-off value of greater than 80 cm which may indicate <font color="#ff0000"><strong>HIGH RISK</strong></font> of developing <a href="#" class="link heart_disease" id="heart_disease1">cardiovascular diseases</a> and <a href="#" class="link type2diabetes" id="type2diabetes1">type-2 diabetes</a>.');
        // Low risk of developing cardiovascular diseases and type-2 diabetes. 
        $("#fast_risk_indicator_div").css("border-top", "5px solid #ff0000");
        $("#fast_risk_indicator_img").html('<img src="' + base_url + 'assets/images/fast/bmi_female-7.svg"  height="70%" width="70%" />');
      }
    }
  }
}

function circum() //waist circumference conversion
{
  var wc_opt = $("#fast_wc_opt").val();
  var wc = $("#fast_wc").val();
  var decimal = /^\d{0,4}(\.\d{0,2})?$/;
  if (wc == "" || !wc.match(decimal)) {
    alert("Enter a valid number for waist circumference. Please enter a number with atleast 2 decimal places.");
    $("#fast_risk_indicator_div").hide("fade", 1000);
    $("#fast_risk_indicator_img_div").hide("fade", 1000);
    return false;
  } else {
    //cm to inches
    if (wc_opt == "in") {
      var wc_in = Math.round((wc / 2.54) * 10) / 10;
      $("#fast_wc").val(wc_in);
      $("#fast_wc").prop('min', 20);
      $("#fast_wc").prop('max', 70.9);
      $("#fast_waistRange").prop('min', 20);
      $("#fast_waistRange").prop('max', 70.9);
      $("#fast_waistRange").prop('value', wc_in);
    }
    //inches to cm
    else {
      /*if(wc<50.8 || wc>180){
      alert("Please enter a valid number greater than 50.8 cm but less than 180 cm or a number with atleast 2 decimal places.");
  
      return false;   
    }
    else{
      var wc_cm =Math.round((wc*2.54)*10)/10;
      $("#fast_wc").val(wc_cm);

      $("#fast_wc").prop('min',50.8);
      $("#fast_wc").prop('max',180);
      $("#fast_waistRange").prop('min',50.8);
      $("#fast_waistRange").prop('max',180);
      $("#fast_waistRange").prop('value',wc_cm);    
    }*/
      var wc_cm = Math.round((wc * 2.54) * 10) / 10;
      $("#fast_wc").val(wc_cm);
      $("#fast_wc").prop('min', 50.8);
      $("#fast_wc").prop('max', 180);
      $("#fast_waistRange").prop('min', 50.8);
      $("#fast_waistRange").prop('max', 180);
      $("#fast_waistRange").prop('value', wc_cm);
    }
  }
}

function calc5() {
  var wc = $("#fast_wc1").val();
  var wc_opt = $("#fast_wc_opt1").val();
  var hc = $("#fast_hc").val();
  var hc_opt = $("#fast_hc_opt").val();
  var gender = $("#fast_gender2").val();
  var decimal = /^\d{0,4}(\.\d{0,2})?$/;
  // whipr 
  //var x= Math.round(wc * 100)/100;
  //var y = Math.round(hc *100)/100;
  if (wc == "" || !wc.match(decimal) || hc == "" || !hc.match(decimal)) {
    alert("Please enter a valid number greater than 50.8 cm/ 20 inches but less than 180 cm / 70.9 inches or a number with atleast 2 decimal places.");
    //$("#fast_wc").val('15');
    //$("#fast_waistRange").val('15');
    $("#fast_whipr_div").hide("fade", 1000);
    $("#fast_whipr_label_div").hide("fade", 1000);
    return false;
  } else {
    if (wc_opt == "in" && hc_opt == "in") {
      if (wc < 20 || wc > 70.9 || hc < 20 || hc > 70.9) {
        alert("Please enter a valid number greater than 20 inches but less than 70.9 inches or a number with atleast 2 decimal places.");
        $("#fast_whipr_div").hide("fade", 1000);
        $("#fast_whipr_label_div").hide("fade", 1000);
        return false;
      } else {
        var wc_cm = Math.round((wc * 2.54) * 10) / 10;
        var hc_cm = Math.round((hc * 2.54) * 10) / 10;
        var whipr = Math.round((wc_cm / hc_cm) * 100) / 100;
      }
    } else {
      if (wc < 50.8 || wc > 180 || hc < 50.8 || hc > 180) {
        alert("Please enter a valid number greater than 50.8 cm but less than 180 cm or a number with atleast 2 decimal places.");
        $("#fast_whipr_div").hide("fade", 1000);
        $("#fast_whipr_label_div").hide("fade", 1000);
        return false;
      } else {
        var whipr = Math.round((wc / hc) * 100) / 100;
      }
    }
    $("#fast_whipr_val").val(whipr);
    $("#fast_whipr_div").show();
    $("#fast_whipr_label").addClass("img-thumbnail");
    $("#fast_whipr").css({
      "background-color": "#ff0000"
    });
    if (gender == "1") {
      if (whipr < 0.90) {
        $("#fast_whipr").html(whipr);
        $("#fast_whipr_label_div").show("fade", 1000);
        //$("#fast_whipr_class").val('Low');
        $("#fast_whipr").css({
          "background-color": "#33CC33"
        });
        $("#fast_whipr_label").html('Your waist hip ratio is <strong>' + whipr + '</strong> which may indicate <font color="#33CC33"><strong>LOWER RISK</strong></font> of developing obesity-related diseases like <a href="#" class="link heart_disease" id="heart_disease2">heart diseases</a>, <a href="#" class="link hypertension" id="hypertension2">hypertension</a> and <a href="#" class="link type2diabetes" id="type2diabetes2">type 2 diabetes</a>.');
        $("#fast_whipr_label").css("border-top", "5px solid #33CC33");
      } else if (whipr >= 0.90) {
        $("#fast_whipr").html(whipr);
        $("#fast_whipr_label_div").show("fade", 1000);
        //$("#fast_whipr_class").css( "color", "#ff0000" ); 
        $("#fast_whipr").css({
          "background-color": "#ff0000"
        });
        $("#fast_whipr_label").html('Your waist hip ratio is <strong>' + whipr + '</strong> which may indicate <font color="#ff0000"><strong>HIGHER RISK</strong></font> of developing obesity-related diseases like <a href="#" class="link heart_disease" id="heart_disease2">heart diseases</a>, <a href="#" class="link hypertension" id="hypertension2">hypertension</a> and <a href="#" class="link type2diabetes" id="type2diabetes2">type 2 diabetes</a>.');
        $("#fast_whipr_label").css("border-top", "5px solid #ff0000");
      }
    } else if (gender == "2") {
      if (whipr < 0.85) {
        $("#fast_whipr").html(whipr);
        $("#fast_whipr_label_div").show("fade", 1000);
        //$("#fast_whipr_class").val('Low');
        //$("#fast_whipr_class").css( "color", "#33CC33" ); 
        $("#fast_whipr").css({
          "background-color": "#33CC33"
        });
        $("#fast_whipr_label").html('Your waist hip ratio is <strong>' + whipr + '</strong> which may indicate <font color="#33CC33"><strong>LOWER RISK</strong></font> of developing obesity-related diseases <a href="#" class="link heart_disease" id="heart_disease2">heart diseases</a>, <a href="#" class="link hypertension" id="hypertension2">hypertension</a> and <a href="#" class="link type2diabetes" id="type2diabetes2">type 2 diabetes</a>.');
        $("#fast_whipr_label").css("border-top", "5px solid #33CC33");
      } else if (whipr >= 0.85) {
        $("#fast_whipr").html(whipr);
        $("#fast_whipr_label_div").show("fade", 1000);
        //$("#fast_whipr_class").val('High');
        //$("#fast_whipr_class").css( "color", "#ff0000" ); 
        $("#fast_whipr").css({
          "background-color": "#ff0000"
        });
        $("#fast_whipr_label").html('Your waist hip ratio is <strong>' + whipr + '</strong> which may indicate <font color="#ff0000"><strong>HIGHER RISK</strong></font> of developing obesity-related diseases like <a href="#" class="link heart_disease" id="heart_disease2">heart diseases</a>, <a href="#" class="link hypertension" id="hypertension2">hypertension</a> and <a href="#" class="link type2diabetes" id="type2diabetes2">type 2 diabetes</a>.');
        $("#fast_whipr_label").css("border-top", "5px solid #33CC33");
      }
    }
  }
}

function circum1() //waist circumference conversion
{
  var wc = $('#fast_wc1').val();
  var wc_opt = $('#fast_wc_opt1').val();
  var hc = $('#fast_hc').val();
  var hc_opt = $('#fast_hc_opt').val();
  var decimal = /^\d{0,4}(\.\d{0,2})?$/;
  if (wc == "" || !wc.match(decimal) || hc == "" || !hc.match(decimal)) {
    alert("Enter a valid number for waist/ hip circumference. Please enter a number with atleast 2 decimal places.");
    $("#fast_whipr_div").hide();
    $("#fast_whipr_label_div").hide();
    return false;
  } else {}
  //cm to inches
  if (wc_opt == "in" && hc_opt == "in") {
    var wc_in = Math.round((wc / 2.54) * 10) / 10;
    $('#fast_wc1').val(wc_in);
    //$('#fast_waistRange1').val(wc_cm);
    $('#fast_wc1').prop('min', 20);
    $('#fast_wc1').prop('max', 70.9);
    $('#fast_waistRange1').prop('min', 20);
    $('#fast_waistRange1').prop('max', 70.9);
    $('#fast_waistRange1').prop('value', wc_in);
    var hc_in = Math.round((hc / 2.54) * 10) / 10;
    $('#fast_hc').val(hc_in);
    //$('#fast_hipRange').val(hc_cm);
    $('#fast_hc').prop('min', 20);
    $('#fast_hc').prop('max', 70.9);
    $('#fast_hipRange').prop('min', 20);
    $('#fast_hipRange').prop('max', 70.9);
    $('#fast_hipRange').prop('value', hc_in);
  }
  //inches to cm
  else {
    var wc_cm = Math.round((wc * 2.54) * 10) / 10;
    $('#fast_wc1').val(wc_cm);
    //$('#fast_waistRange1').val(wc_in);
    $('#fast_wc1').prop('min', 50.8);
    $('#fast_wc1').prop('max', 180);
    $('#fast_waistRange1').prop('min', 50.8);
    $('#fast_waistRange1').prop('max', 180);
    $('#fast_waistRange1').prop('value', wc_cm);
    var hc_cm = Math.round((hc * 2.54) * 10) / 10;
    $('#fast_hc').val(hc_cm);
    //$('#fast_hipRange').val(hc_in);
    $('#fast_hc').prop('min', 50.8);
    $('#fast_hc').prop('max', 180);
    $('#fast_hipRange').prop('min', 50.8);
    $('#fast_hipRange').prop('max', 180);
    $('#fast_hipRange').prop('value', hc_cm);
  }
}

function calc6() {
  //Waist Height Calculator
  var wc = $("#fast_wc2").val();
  var wc_opt = $("#fast_wc_opt2").val();
  var ht = $("#fast_ht3").val();
  var gender = $(".gender-c").val();
  var decimal = /^\d{0,4}(\.\d{0,2})?$/;
  //if(wc_opt == "centimeters"){
  if (wc_opt == "in") {
    if (wc == "" || !wc.match(decimal) || wc < 20 || wc > 70.9) {
      alert("Please enter a valid number greater than 50.8 cm/ 20 inches but less than 180 cm / 70.9 inches or a number with atleast 2 decimal places.");
      $("#fast_whtr_img_div").hide("fade", 1000);
      $("#fast_whtr_div").hide("fade", 1000);
      return false;
    } else if (ht == "" || !ht.match(decimal) || ht < 121.9 || ht > 243.8) {
      alert("Please enter a valid number greater than 121.9 cm but less than 243.8 cm or a number with atleast 2 decimal places.");
      $("#fast_whtr_img_div").hide("fade", 1000);
      $("#fast_whtr_div").hide("fade", 1000);
      return false;
    } else {
      var wc_cm = Math.round((wc * 2.54) * 10) / 10;
      var whtr = Math.round((wc_cm / ht) * 100) / 100;
    }
  } else {
    if (wc == "" || !wc.match(decimal) || wc < 50.8 || wc > 180) {
      alert("Please enter a valid number greater than 50.8 cm/ 20 inches but less than 180 cm / 70.9 inches or a number with atleast 2 decimal places.");
      $("#fast_whtr_img_div").hide("fade", 1000);
      $("#fast_whtr_div").hide("fade", 1000);
      return false;
    } else if (ht == "" || !ht.match(decimal) || ht < 121.9 || ht > 243.8) {
      alert("Please enter a valid number greater than 121.9 cm but less than 243.8 cm or a number with atleast 2 decimal places.");
      $("#fast_whtr_img_div").hide("fade", 1000);
      $("#fast_whtr_div").hide("fade", 1000);
      return false;
    } else {
      var whtr = Math.round((wc / ht) * 100) / 100;
    }
  }
  //$("#whtr").val(whtr);
  //$("#fast_whtr_img_div").show();
  $("#fast_whtr_div").addClass("img-thumbnail");
  if (gender == "1") {
    if (whtr <= 0.5) {
      //$("#fast_whtr_label").val('Low Risk');
      $("#fast_whtr_div").show("fade", 1000);
      $("#fast_whtr_img_div").show("fade", 1000);
      $("#fast_whtr_label").html('Your waist-height ratio is  <strong> less than 0.5</strong> which may indicate <font color="#33CC33"><strong>LOWER RISK</strong></font> to obesity-related diseases such as <a href="#" class="link hypertension" id="hypertension3">hypertension</a>,<a href="#" class="link heart_disease" id="heart_disease3"> heart disease</a> and <a href="#" class="link type2diabetes" id="type2diabetes3">type 2 diabetes</a>.');
      $("#fast_whtr_img_div").html('<img src="' + base_url + 'assets/images/fast/bmi_male-2.svg"  height="70%" width="70%" />');
      $("#fast_whtr_div").css("border-top", "5px solid #33CC33");
    } else if (whtr > 0.5) {
      //$("#whtr_class").val('At Risk to Noncommunicable diseases (NCDs)');
      $("#fast_whtr_div").show("fade", 1000);
      $("#fast_whtr_img_div").show("fade", 1000);
      $("#fast_whtr_label").html('Your waist-height ratio is <strong> greater than 0.5</strong> which may indicate <font color="#ff0000"><strong>HIGHER RISK</strong></font> to obesity-related diseases such as <a href="#" class="link hypertension" id="hypertension3">hypertension</a>,<a href="#" class="link heart_disease" id="heart_disease3"> heart disease</a> and <a href="#" class="link type2diabetes" id="type2diabetes3">type 2 diabetes</a>.');
      $("#fast_whtr_img_div").html('<img src="' + base_url + 'assets/images/fast/bmi_male-7.svg"  height="70%" width="70%" />');
      $("#fast_whtr_div").css("border-top", "5px solid #ff0000");
    }
  } else {
    if (whtr <= 0.5) {
      //$("#fast_whtr_label").val('Low Risk');
      $("#fast_whtr_div").show("fade", 1000);
      $("#fast_whtr_img_div").show("fade", 1000);
      $("#fast_whtr_label").html('Your waist-height ratio is <strong> less than 0.5</strong> which may indicate <font color="#33CC33"><strong>LOWER RISK</strong></font> to obesity-related diseases such as <a href="#" class="link hypertension" id="hypertension3">hypertension</a>,<a href="#" class="link heart_disease" id="heart_disease3"> heart disease</a> and <a href="#" class="link type2diabetes" id="type2diabetes3">type 2 diabetes</a>.');
      $("#fast_whtr_div").css("border-top", "5px solid #33CC33");
      $("#fast_whtr_img_div").html('<img src="' + base_url + 'assets/images/fast/bmi_female-2.svg"  height="70%" width="70%" />');
    } else if (whtr > 0.5) {
      //$("#whtr_class").val('At Risk to Noncommunicable diseases (NCDs)');
      $("#fast_whtr_div").show("fade", 1000);
      $("#fast_whtr_img_div").show("fade", 1000);
      $("#fast_whtr_label").html('Your waist-height ratio is <strong> greater than 0.5</strong> which may indicate <font color="#ff0000"><strong>HIGHER RISK</strong></font> to obesity-related diseases such as <a href="#" class="link hypertension" id="hypertension3">hypertension</a>,<a href="#" class="link heart_disease" id="heart_disease3"> heart disease</a> and <a href="#" class="link type2diabetes" id="type2diabetes3">type 2 diabetes</a>.');
      $("#fast_whtr_div").css("border-top", "5px solid #ff0000");
      $("#fast_whtr_img_div").html('<img src="' + base_url + 'assets/images/fast/bmi_female-7.svg"  height="70%" width="70%" />');
    }
  }
}

function circum2() //waist circumference conversion
{
  var wc_opt = $("#fast_wc_opt2").val();
  var wc = $("#fast_wc2").val();
  var decimal = /^\d{0,4}(\.\d{0,2})?$/;
  if (wc == "" || !wc.match(decimal)) {
    alert("Enter a valid number for waist circumference. Please enter a number with atleast 2 decimal places.");
    $("#fast_whtr_img_div").hide("fade", 1000);
    $("#fast_whtr_div").hide("fade", 1000);
    return false;
  } else {
    //cm to inches
    if (wc_opt == "in") {
      var wc_in = Math.round((wc / 2.54) * 10) / 10;
      $("#fast_wc2").val(wc_in);
      $("#fast_wc2").prop('min', 20);
      $("#fast_wc2").prop('max', 70.9);
      $("#fast_waistRange2").prop('min', 20);
      $("#fast_waistRange2").prop('max', 70.9);
      $("#fast_waistRange2").prop('value', wc_in);
    }
    //inches to cm
    else {
      var wc_cm = Math.round((wc * 2.54) * 10) / 10;
      $("#fast_wc2").val(wc_cm);
      $("#fast_wc2").prop('min', 50.8);
      $("#fast_wc2").prop('max', 180);
      $("#fast_waistRange2").prop('min', 50.8);
      $("#fast_waistRange2").prop('max', 180);
      $("#fast_waistRange2").prop('value', wc_cm);
    }
  }
}