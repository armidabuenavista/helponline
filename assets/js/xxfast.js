$(document).ready(function() {


     $('.responsive').tabCollapse();

    // initialize tab function
    $('.nav-tabs a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });


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
  calc1_1();
  //calc2();
  //calc3();
  calc4();
  calc5();
  calc6();
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
      //	$("#fast_dbw_div1").hide();
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
      /*	$.ajax({
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
      /*	$.ajax({
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

			console.log(dbw_photo);
			
			$("#fast_dbw_img").html("<img src='../assets/images/fast/"+dbw_photo+"'  height='100%' width='100%' />");
			
			$("#fast_dbw_img_copyright").html("<a href='http://www.freepik.com/free-vector/silhouettes-pregnant-women_595394.htm#term=pregnant'>Pregnant vector designed by Freepik</a>");
			$("#fast_dbw_img_div").show();
			
			
	
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
  $("#read_bmi").on("click", function(e) {
    $.ajax({
      type: "GET",
      url: base_url + 'help/bmi',
      success: function(res) {
        $("#bmi_dialog").html(res);
        $("#bmi_dialog").dialog("open");
        $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
        $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
        //	$('.ui-widget-header').addClass('ui-widget-header');
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
    width: 'auto',
    create: function(event, ui) {
      // Set max-width
      $(this).parent().css("maxWidth", "600px");
    }
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
    width: 'auto',
    create: function(event, ui) {
      // Set max-width
      $(this).parent().css("maxWidth", "600px");
    }
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
    width: 'auto',
    height: 600,
    create: function(event, ui) {
      // Set max-width
      $(this).parent().css("maxWidth", "600px");
    }
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