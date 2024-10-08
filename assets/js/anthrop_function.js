$(document).ready(function() {
	$('input[type="range"]').focusout(function() {
		$('input[type="number"]').removeClass("error");
	});
	$("#wtRange").change({
		key: 'value'
	}, calc1);
	$("#wt").change({
		key: 'value'
	}, calc1);
	$("#wt_opt").change({
		key: 'value',
		key1: 'value1'
	}, wt_conv);
	$("#htRange").change({
		key: 'value',
		key1: 'value1'
	}, gestation);
	$("#ht").change({
		key: 'value',
		key1: 'value1'
	}, gestation);
	$("#ht_ft").blur({
		key: 'value'
	}, gestation);
	$("#ht_in").blur({
		key: 'value'
	}, gestation);
	/*$("#dbw").change({
		key: 'value'
	}, calc2);*/
	$("#dbw_opt").change({
		key: 'value'
	}, dbw_conv);
	$("#limit_opt").change({
		key: 'value'
	}, limit_conv);
	//$("#upper_limit_opt").change({key: 'value'},upper_limit_conv);
	$("#waistRange").change({
		key: 'value'
	}, calc3);
	$("#wc").change({
		key: 'value'
	}, calc3);
	//$("#wc_opt").change({key: 'value',key1: 'value1',key2: 'value2' },circum,calc4);
	$(document).on("change", "#wc_opt", function() {
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
	$(document).on("change", "#hc_opt", function() {
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
	//$("#hc_opt").change({key: 'value' ,key1: 'value1'},h_circum);
	//$("#pa_lvl").change({key: 'value' },calc2);
	$(document).on("click", "#new_anthrop", function() {
		$("#anthrop_result").hide("fade", 1000);
		$("#anthrop_form").show("fade", 1000);
	});
	$(document).on("click", "#reset_anthrop", function() {
		anthrop_reset_form();
	});
	$(document).on("change", '#ask_pregnant', function(e) {
		var ask_pregnant = $('input[name=ask_pregnant]:checked').val();
		var ht = $("#ht").val();
		//alert(ask_pregnant);
		if (ask_pregnant == 1) {
			gestation();
			$("#ask_gestation_div").show();
			$("#ask_lactation_div").hide();
			$("#dbw_label").html('The pregnant table used in this site is intended for women with gestational age of 13-40 weeks and height of 127-170 cm only. If you are above or below these ranges, please consult your OB-GYNE. ');
			$("#dbw").val('0');
			$("#lower_limit").val('0');
			$("#upper_limit").val('0');
			$("#dbw_div").addClass("img-thumbnail");
		} else {
			$("#ask_gestation_div").hide();
			$("#ask_lactation_div").show();
			$("#gestation_div").hide();
			$("#mens_div").hide();
			$("#ask_gestation").prop('checked', false);
			$("#mens_date").val('');
			$("#gestation_wks").val(0);
			// DBW metric value
			var dbw = ((ht - 100) - ((ht - 100) * 0.1));
			var dbw_opt = $("#dbw_opt").val();
			$("#dbw").val(Math.round(dbw * 10) / 10);
			$("#dbw_div1").show("fold", 1000);
			$("#dbw_div").show("fold", 1000);
			//Upper Limit
			var x = Math.round((dbw * 0.1) * 10) / 10;
			var upper_limit = Math.round((dbw + x) * 10) / 10;
			$("#upper_limit").val(upper_limit);
			upper_limit_lbs = Math.round((upper_limit * 2.2) * 10) / 10;
			//Lower Limit
			var y = Math.round((dbw * 0.1) * 10) / 10;
			var lower_limit = Math.round((dbw - y) * 10) / 10;
			$("#lower_limit").val(lower_limit);
			lower_limit_lbs = Math.round((lower_limit * 2.2) * 10) / 10;
			$("#limit_div").show("fold", 1000);
			$("#dbw_label").html('Desirable body weight is ' + '<strong>' + Math.round(dbw * 10) / 10 + ' ' + dbw_opt + '</strong>. ' + 'Keep your weight within this range ' + '<strong>' + lower_limit + ' - ' + upper_limit + ' kgs / ' + lower_limit_lbs + ' - ' + upper_limit_lbs + ' lbs </strong>');
			$("#dbw_div").addClass("img-thumbnail");
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
			$("#dbw_label").html('The pregnant table used in this site is intended for women with gestational age of 13-40 weeks and height of 127-170 cm only. If you are above or below these ranges, please consult your OB-GYNE. ');
			$("#dbw").val('0');
			$("#lower_limit").val('0');
			$("#upper_limit").val('0');
			$("#mens_date").val('');
			$("#dbw_div").addClass("img-thumbnail");
		} else {
			$("#mens_div").show();
			$("#gestation_div").hide();
			$("#dbw_label").html('The pregnant table used in this site is intended for women with gestational age of 13-40 weeks and height of 127-170 cm only. If you are above or below these ranges, please consult your OB-GYNE. ');
			$("#dbw").val('0');
			$("#lower_limit").val('0');
			$("#upper_limit").val('0');
			$("#gestation_wks").val('');
			$("#dbw_div").addClass("img-thumbnail");
			//calc2();
		}
	});
	$(document).on("keyup", '#gestation_wks', function() {
		var ht = $("#ht").val();
		var gestation_wks = $("#gestation_wks").val();
		var ask_pregnant = $('input[name=ask_pregnant]:checked').val();
		if (ht < 127 || ht > 170 || gestation_wks < 13 || gestation_wks > 40) {
			$("#dbw_label").html('The pregnant table used in this site is intended for women with gestational age of 13-40 weeks and height of 127-170 cm only. If you are above or below these ranges, please consult your OB-GYNE. ');
			$("#dbw").val('0');
			$("#lower_limit").val('0');
			$("#upper_limit").val('0');
			$("#dbw_div").addClass("img-thumbnail");
		} else {
			gestation();
		}
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
		var gender = $("#gender").val();
		if (ht < 127 || ht > 170 || gestation_wks < 13 || gestation_wks > 40) {
			$("#dbw_label").html('The pregnant table used in this site is intended for women with gestational age of 13-40 weeks and height of 127-170 cm only. If you are above or below these ranges, please consult your OB-GYNE. ');
			$("#dbw").val('0');
			$("#lower_limit").val('0');
			$("#upper_limit").val('0');
			$("#dbw_div").addClass("img-thumbnail");
		} else {
			gestation();
		}
	});


	

});

function calc1() {
	var wt = $("#wt").val();
	var ht = $("#ht").val();
	var ht_ft = $("#ht_ft").val();
	var ht_in = $("#ht_in").val();
	var wt_opt = $("#wt_opt").val();
	var decimal = /^\d{0,4}(\.\d{0,2})?$/;
	if (wt == "" || !wt.match(decimal)) {
		alert("Enter a valid number for weight. Please enter a number with atleast 2 decimal places.");
		$("#bmi_div").hide();
		$("#bmi_label").attr("data-bmi", 0);
		$("#bmi_class").attr("data-bmi_class", '');
		$('#wt').addClass('error');
		return false;
	} else if (ht == "" || !ht.match(decimal) || ht < 121.9 || ht > 243.8) {
		alert("Enter a valid number for height. Please enter a number with atleast 2 decimal places.");
		$("#bmi_div").hide();
		$("#bmi_label").attr("data-bmi", 0);
		$("#bmi_class").attr("data-bmi_class", '');
		$("#dbw_div").hide();
		$("#dbw").val('0');
		$("#limit_div").hide();
		$('#ht').addClass('error');
		$('#ht_ft').addClass('error');
		$('#ht_in').addClass('error');
		$("#whipr").attr("data-whipr", 0);
		$("#whipr_class").attr("data-whipr_class", '');
		$("#whipr_div").hide();
		$("#risk_indicator_div").hide();
		$("#risk_indicator").attr("data-risk_indicator", '');
		$("#whtr").attr("data-whtr", 0);
		$("#whtr_class").attr("data-whtr_class", '');
		$("#whtr_div").hide();
		return false;
	} else if (ht_ft == "" || !ht_ft.match(decimal) || ht_ft < 4 || ht_ft > 8 || ht_in == "" || !ht_in.match(decimal)) {
		alert("Enter a valid number in feet that is greater than or equal to 4 feet but less than or equal to 8 feet. ");
		$("#bmi_div").hide();
		$("#bmi_label").attr("data-bmi", 0);
		$("#bmi_class").attr("data-bmi_class", '');
		$("#dbw_div").hide();
		$("#dbw").val('0');
		$("#limit_div").hide();
		$("#lower_limit").val('0');
		$("#upper_limit").val('0');
		$('#ht_ft').addClass('error');
		$('#ht_in').addClass('error');
		$("#whipr").attr("data-whipr", 0);
		$("#whipr_class").attr("data-whipr_class", '');
		$("#whipr_div").hide();
		$("#risk_indicator_div").hide();
		$("#risk_indicator").attr("data-risk_indicator", '');
		$("#whtr").attr("data-whtr", 0);
		$("#whtr_class").attr("data-whtr_class", '');
		$("#whtr_div").hide();
		return false;
	} else {
		calc3();
		calc4();
		//BMI value
		if (wt_opt == "kgs") {
			if (wt < 30 || wt > 500) {
				alert("Weight should be greater than 30 kgs but less than 500 kgs.");
				$("#bmi_div").hide();
				$("#bmi_label").attr("data-bmi", 0);
				$("#bmi_label").attr("data-bmi_class", '');
				//anthrop_reset_form();
				$('#wt').addClass('error');
				return false;
			} else {
				var h = ht / 100;
				var bmi = Math.round((wt / (h * h)) * 100) / 100;
				//$("#bmi").val(bmi);
				//$("#bmi").attr("data-bmi",bmi);
				$("#bmi_label").attr("data-bmi", bmi);
			}
			// Metric bmi_class
			if (bmi < 18.50) {
				$("#bmi_label").attr("data-bmi_class", 'Underweight');
				$("#bmi_label").html('BMI is <strong>' + bmi + ' kg/m2</strong> classified as <font color="#ff0000">Underweight</font>.');
				$("#bmi_div").show("fold", 1000);
				$("#bmi_div").addClass("img-thumbnail");
			} else if (bmi >= 18.50 && bmi <= 24.99) {
				$("#bmi_label").attr("data-bmi_class", 'Normal');
				$("#bmi_label").html('BMI is <strong>' + bmi + ' kg/m2</strong> classified as <font color="#33CC33">Normal</font>.');
				$("#bmi_div").show("fold", 1000);
				$("#bmi_div").addClass("img-thumbnail");
			} else if (bmi >= 25.00 && bmi <= 29.99) {
				$("#bmi_label").attr("data-bmi_class", 'Overweight');
				$("#bmi_label").html('BMI is <strong>' + bmi + ' kg/m2</strong> classified as <font color="#ff0000">Overweight</font>.');
				$("#bmi_div").show("fold", 1000);
				$("#bmi_div").addClass("img-thumbnail");
			} else if (bmi >= 30) {
				$("#bmi_label").attr("data-bmi_class", 'Obese');
				$("#bmi_label").html('BMI is <strong>' + bmi + ' kg/m2</strong> classified as <font color="#ff0000">Obese</font>.');
				$("#bmi_div").show("fold", 1000);
				$("#bmi_div").addClass("img-thumbnail");
			}
			/* else if (bmi >= 30.00 && bmi <= 34.99) {
							$("#bmi_label").attr("data-bmi_class", 'Obese Class II');
							$("#bmi_label").html('BMI is <strong>' + bmi + ' kg/m2</strong> classified as <font color="#ff0000">Obese Class II</font>.');
							$("#bmi_div").show("fold", 1000);
							$("#bmi_div").addClass("img-thumbnail");
						} else if (bmi >= 35.00) {
							$("#bmi_label").attr("data-bmi_class", 'Obese Class III');
							$("#bmi_label").html('BMI is <strong>' + bmi + ' kg/m2</strong> classified as <font color="#ff0000">Obese Class III</font>.');
							$("#bmi_div").show("fold", 1000);
							$("#bmi_div").addClass("img-thumbnail");
						}*/
		} else if (wt_opt == "lbs") {
			//var lb = Math.round((wt*2.2)*10)/10;
			if (wt < 66 || wt > 1100) {
				alert("Weight should be greater than 66 lbs but less than 1100 lbs.");
				$('#wt').addClass('error');
				$("#bmi_div").hide();
				$("#bmi_label").attr("data-bmi", 0);
				$("#bmi_label").attr("data-bmi_class", '');
				//anthrop_reset_form();
				return false;
			} else {
				var ic = ht * 0.39;
				var bmi_ = Math.round((703 * (wt / (ic * ic))) * 100) / 100;
				//$("#bmi").attr("data-bmi",bmi_);
				$("#bmi_label").attr("data-bmi", bmi_);
			}
			if (bmi_ < 18.50) {
				$("#bmi_label").attr("data-bmi_class", 'Underweight');
				$("#bmi_label").html('BMI is <strong>' + bmi_ + ' kg/m2</strong> classified as <font color="#ff0000">Underweight</font>.');
				$("#bmi_div").show("fold", 1000);
				$("#bmi_div").addClass("img-thumbnail");
			} else if (bmi_ >= 18.50 && bmi_ <= 24.99) {
				$("#bmi_label").attr("data-bmi_class", 'Normal');
				$("#bmi_label").html('BMI is <strong>' + bmi_ + ' kg/m2</strong> classified as <font color="#33CC33">Normal</font>.');
				$("#bmi_div").show("fold", 1000);
				$("#bmi_div").addClass("img-thumbnail");
			} else if (bmi_ >= 25.00 && bmi_ <= 29.99) {
				$("#bmi_label").attr("data-bmi_class", 'Overweight');
				$("#bmi_label").html('BMI is <strong>' + bmi_ + ' kg/m2</strong> classified as <font color="#ff0000">Overweight</font>.');
				$("#bmi_div").show("fold", 1000);
				$("#bmi_div").addClass("img-thumbnail");
			} else if (bmi_ >= 30.00) {
				$("#bmi_label").attr("data-bmi_class", 'Obese ');
				$("#bmi_label").html('BMI is <strong>' + bmi_ + ' kg/m2</strong> classified as <font color="#ff0000">Obese</font>.');
				$("#bmi_div").show("fold", 1000);
				$("#bmi_div").addClass("img-thumbnail");
			}
			/*else if (bmi_ >= 30.00 && bmi_ <= 34.99) {
				$("#bmi_label").attr("data-bmi_class", 'Obese Class II');
				$("#bmi_label").html('BMI is <strong>' + bmi_ + ' kg/m2</strong> classified as <font color="#ff0000">Obese Class II</font>.');
				$("#bmi_div").show("fold", 1000);
				$("#bmi_div").addClass("img-thumbnail");
			} else if (bmi_ >= 35.00) {
				$("#bmi_label").attr("data-bmi_class", 'Obese Class III');
				$("#bmi_label").html('BMI is <strong>' + bmi_ + ' kg/m2</strong> classified as <font color="#ff0000">Obese Class III</font>.');
				$("#bmi_div").show("fold", 1000);
				$("#bmi_div").addClass("img-thumbnail");
			}*/
		}
		// DBW metric value
		var dbw = ((ht - 100) - ((ht - 100) * 0.1));
		var dbw_opt = $("#dbw_opt").val();
		$("#dbw").val(Math.round(dbw * 10) / 10);
		$("#dbw_div1").show("fold", 1000);
		$("#dbw_div").show("fold", 1000);
		//Upper Limit
		var x = Math.round((dbw * 0.1) * 10) / 10;
		var upper_limit = Math.round((dbw + x) * 10) / 10;
		$("#upper_limit").val(upper_limit);
		upper_limit_lbs = Math.round((upper_limit * 2.2) * 10) / 10;
		//Lower Limit
		var y = Math.round((dbw * 0.1) * 10) / 10;
		var lower_limit = Math.round((dbw - y) * 10) / 10;
		$("#lower_limit").val(lower_limit);
		lower_limit_lbs = Math.round((lower_limit * 2.2) * 10) / 10;
		$("#limit_div").show("fold", 1000);
		$("#dbw_label").html('Desirable body weight is ' + '<strong>' + Math.round(dbw * 10) / 10 + ' ' + dbw_opt + '</strong>. ' + 'Keep your weight within this range ' + '<strong>' + lower_limit + ' - ' + upper_limit + ' kgs / ' + lower_limit_lbs + ' - ' + upper_limit_lbs + ' lbs </strong>');
		$("#dbw_div").addClass("img-thumbnail");
	}
}

function gestation() {
	var ht = $("#ht").val();
	var gestation_wks = $("#gestation_wks").val();
	var ask_gestation = $('input[name=ask_gestation]:checked').val();
	var gender = $("#gender").val();
	//$("#dbw_ht_div").show();
	if (gender == 1) {
		//$("#female_div").hide();
		calc1();
	} else {
		$("#female_div").show();
		if (ask_gestation == 1) {
			if (ht < 127 || ht > 170 || gestation_wks < 13 || gestation_wks > 40) {
				$("#dbw").val('0');
				$("#ask_gestation_div").show();
				$("#ask_lactation_div").hide();
				$("#dbw_label").html('The pregnant table used in this site is intended for women with gestational age of 13-40 weeks and height of 127-170 cm only. If you are above or below these ranges, please consult your OB-GYNE. ');
				$("#dbw").val('0');
				$("#lower_limit").val('0');
				$("#upper_limit").val('0');
				$("#dbw_label").html('You should be weighing around ' + '<strong>' + 0 + ' ' + ' kgs ' + '</strong> by this time. <br><br> <p style="font-size:12px">Data based on Weight-for-Height table at a given weeks of pregnancy: Philippines 2013.</p> ');
			} else {
				$.ajax({
					url: base_url + 'admin/help/select_gestation',
					data: 'gestation_wks=' + gestation_wks + '&ht=' + ht,
					method: "GET",
					success: function(retrieved_data) {
						// Your code here.. use something like this
						var Obj = retrieved_data;
						// Since your controller produce array of object you can access the value by using this one : 
						$.each(Obj, function(index, field) {
							console.log(field.gestation_value);
							$("#dbw").val(field.gestation_value);
							//$("#dbw").attr("data-dbw",field.gestation_value);   
							$("#dbw_label").html('You should be weighing around ' + '<strong>' + field.gestation_value + ' ' + ' kgs ' + '</strong> by this time. <br><br> <p style="font-size:12px">Data based on Weight-for-Height table at a given weeks of pregnancy: Philippines 2013.</p> ');
						});
					}
				});
			}
		} else {
			$.ajax({
				url: base_url + 'admin/help/select_gestation',
				data: 'gestation_wks=' + gestation_wks + '&ht=' + ht,
				method: "GET",
				success: function(retrieved_data) {
					// Your code here.. use something like this
					var Obj = retrieved_data;
					// Since your controller produce array of object you can access the value by using this one : 
					$.each(Obj, function(index, field) {
						console.log(field.gestation_value);
						$("#dbw").val(field.gestation_value);
						//$("#dbw").attr("data-dbw",field.gestation_value);   
						$("#dbw_label").html('You should be weighing around ' + '<strong>' + field.gestation_value + ' ' + ' kgs ' + '</strong> by this time. <br><br> <p style="font-size:12px">Data based on Weight-for-Height table at a given weeks of pregnancy: Philippines 2013.</p> ');
					});
				}
			});
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
		/*alert("Please enter a valid number greater than 50.8 cm/ 20 inches but less than 180 cm / 70.9 inches or a number with atleast 2 decimal places.");
		$('#wc').addClass('error');
		$('#hc').addClass('error');
		$("#whipr_label").attr("data-whipr", 0);
		$("#whipr_label").attr("data-whipr_class", '');
		$("#whipr_div").hide();
		$("#risk_indicator_div").hide();
		$("#risk_indicator_label").attr("data-risk_indicator", '');
		$("#whtr_label").attr("data-whtr", 0);
		$("#whtr_label").attr("data-whtr_class", '');
		$("#whtr_div").hide();
		return false;*/
		$("#whipr").attr("data-whipr", 0);
		$("#whipr_label").attr("data-whipr_class", 0);
		$("#whipr_div").hide();
		$('#wc').addClass('error');
		$('#hc').addClass('error');
		$("#risk_indicator_div").hide();
		$("#risk_indicator_label").attr("data-risk_indicator", 0);
		$("#whtr_label").attr("data-whtr", 0);
		$("#whtr_label").attr("data-whtr_class", 0);
		$("#whtr_div").hide();
	} else {
		if (wc_opt == "in" && hc_opt == "in") {
			if (wc < 20 || wc > 70.9 || hc < 20 || hc > 70.9) {
				/*alert("Please enter a valid number greater than 20 inches but less than 70.9 inches or a number with atleast 2 decimal places.");
				$("#whipr").attr("data-whipr", 0);
				$("#whipr_label").attr("data-whipr_class", '');
				$("#whipr_div").hide();
				$('#wc').addClass('error');
				$('#hc').addClass('error');
				$("#risk_indicator_div").hide();
				$("#risk_indicator_label").attr("data-risk_indicator", '');
				$("#whtr_label").attr("data-whtr", 0);
				$("#whtr_label").attr("data-whtr_class", '');
				$("#whtr_div").hide();
				return false;*/
				$("#whipr").attr("data-whipr", 0);
				$("#whipr_label").attr("data-whipr_class", 0);
				$("#whipr_div").hide();
				$('#wc').addClass('error');
				$('#hc').addClass('error');
				$("#risk_indicator_div").hide();
				$("#risk_indicator_label").attr("data-risk_indicator", 0);
				$("#whtr_label").attr("data-whtr", 0);
				$("#whtr_label").attr("data-whtr_class", 0);
				$("#whtr_div").hide();
			} else {
				var wc = $("#wc").val();
				// whipr 
				//var a= Math.round(wc/2.54)/100;
				//var b = Math.round(hc/2.54)/100
				var whipr = Math.round((wc / hc) * 100) / 100;
				//$("#whipr").val(whipr);
				$("#whipr_label").attr("data-whipr", whipr);
				$("#whipr_div").show("fold", 1000);
				$("#whipr_div").addClass("img-thumbnail");
				calc4();
			}
		} else {
			if (wc < 50.8 || wc > 180 || hc < 50.8 || hc > 180) {
				//alert("Please enter a valid number greater than 50.8 cm but less than 180 cm or a number with atleast 2 decimal places.");
				//$('#wc').addClass('error');
				//$('#hc').addClass('error');
				$("#whipr_label").attr("data-whipr", 0);
				$("#whipr_label").attr("data-whipr_class", 0);
				$("#whipr_div").hide();
				$("#risk_indicator_div").hide();
				$("#risk_indicator").attr("data-risk_indicator", 0);
				$("#whtr_label").attr("data-whtr", 0);
				$("#whtr_label").attr("data-whtr_class", 0);
				$("#whtr_div").hide();
				return false;
			} else {
				var wc = $("#wc").val();
				// whipr 
				//var a= Math.round(wc/2.54)/100;
				//var b = Math.round(hc/2.54)/100
				var whipr = Math.round((wc / hc) * 100) / 100;
				//$("#whipr").val(whipr);
				$("#whipr_label").attr("data-whipr", whipr);
				$("#whipr_div").show("fold", 1000);
				$("#whipr_div").addClass("img-thumbnail");
				//calc4();
				calc4();
			}
		}
		$("#risk_indicator_div").addClass("img-thumbnail");
		// Waist Circumference bmi_class
		if (gender == 1) {
			if (wc <= 90) {
				$("#risk_indicator_label").attr("data-risk_indicator", 'Low Risk');
				//$("#risk_indicator").css( "color", "#33CC33" );
				$("#risk_indicator_div").show("fold", 1000);
				$("#risk_indicator_label").html('Waist circumference may indicate <font color="#33CC33">Low Risk.</font>');
			} else if (wc > 90) {
				$("#risk_indicator_label").attr("data-risk_indicator", 'High Risk');
				//$("#risk_indicator").css( "color", "#ff0000" );
				$("#risk_indicator_div").show("fold", 1000);
				$("#risk_indicator_label").html('Waist circumference may indicate <font color="#ff0000">High Risk.</font>');
			}
		} else if (gender == 2) {
			if (wc <= 80) {
				$("#risk_indicator_label").attr("data-risk_indicator", 'Low Risk');
				//$("#risk_indicator").css( "color", "#33CC33" );
				$("#risk_indicator_div").show("fold", 1000);
				$("#risk_indicator_label").html('Waist circumference may indicate <font color="#33CC33">Low Risk.</font>');
			} else if (wc > 80) {
				$("#risk_indicator_label").attr("data-risk_indicator", 'High Risk');
				//$("#risk_indicator").css( "color", "#ff0000" );
				$("#risk_indicator_div").show("fold", 1000);
				$("#risk_indicator_label").html('Waist circumference may indicate <font color="#ff0000">High Risk.</font>');
			}
		}
		if (gender == 1) {
			if (whipr < 0.90) {
				//$("#whipr_class").val('Low');
				$("#whipr_label").attr("data-whipr_class", 'Low');
				//$("#whipr_class").css( "color", "#33CC33" );		
				$("#whipr_label").html('Waist hip ratio is <strong>' + whipr + '</strong> which may indicate <font color="#33CC33">Low Risk</font> of developing obesity-related diseases.');
			} else if (whipr >= 0.90) {
				$("#whipr_label").attr("data-whipr_class", 'High');
				//$("#whipr_class").css( "color", "#ff0000" );		
				$("#whipr_label").html('Waist hip ratio is <strong>' + whipr + '</strong> which may indicate <font color="#ff0000">High Risk</font> of developing obesity-related diseases.');
			}
		} else if (gender == 2) {
			if (whipr < 0.85) {
				$("#whipr_label").attr("data-whipr_class", 'Low');
				//$("#whipr_class").css( "color", "#33CC33" );		
				$("#whipr_label").html('Waist hip ratio is <strong>' + whipr + '</strong> which may indicate <font color="#33CC33">Low Risk</font> of developing obesity-related diseases.');
			} else if (whipr >= 0.85) {
				$("#whipr_label").attr("data-whipr_class", 'High');
				//$("#whipr_class").css( "color", "#ff0000" );		
				$("#whipr_label").html('Waist hip ratio is <strong>' + whipr + '</strong> which may indicate <font color="#ff0000">High Risk</font> of developing obesity-related diseases.');
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
		if (wc < 20 || wc > 70.9 || hc < 20 || hc > 70.9) {
			//	alert("Enter a valid number for height and waist circumference. Please enter a number with atleast 2 decimal places.");
			//$("#wc").addClass('error');
			//$("#ht").addClass('error');
			//$("#ht_in").addClass('error');
			//$("#ht_ft").addClass('error');
			$("#whipr_label").attr("data-whipr", 0);
			$("#whipr_label").attr("data-whipr_class", 0);
			$("#whipr_div").hide();
			$("#risk_indicator_div").hide();
			$("#risk_indicator").attr("data-risk_indicator", 0);
			$("#whtr_label").attr("data-whtr", 0);
			$("#whtr_label").attr("data-whtr_class", 0);
			$("#whtr_div").hide();
			return false;
		} else {
			var wc_cm = Math.round((wc * 2.54) * 10) / 10;
			var whtr = Math.round((wc_cm / ht) * 100) / 100;
			//var whtr= Math.round((wc/2.54)*100)/100;	
		}
	} else {
		if (wc < 50.8 || wc > 180 || hc < 50.8 || hc > 180) {
			//alert("Enter a valid number for height and hip circumference. Please enter a number with atleast 2 decimal places.");
			//$("#wc").addClass('error');
			//$("#ht").addClass('error');
			//$("#ht_in").addClass('error');
			//$("#ht_ft").addClass('error');
			$("#whipr_label").attr("data-whipr", 0);
			$("#whipr_label").attr("data-whipr_class", 0);
			$("#whipr_div").hide();
			$("#risk_indicator_div").hide();
			$("#risk_indicator").attr("data-risk_indicator", 0);
			$("#whtr_label").attr("data-whtr", 0);
			$("#whtr_label").attr("data-whtr_class", 0);
			$("#whtr_div").hide();
			return false;
		} else {
			//var wc_in = Math.round((wc/2.54)*10)/10;	
			var whtr = Math.round((wc / ht) * 100) / 100;
			//var whtr= Math.round((wc/2.54)*100)/100;	
		}
	}
	//$("#whtr").val(whtr);
	$("#whtr_label").attr("data-whtr", whtr);
	//$("#whtr_div").show("fold", 1000);
	$("#whtr_div").addClass("img-thumbnail");
	if (whtr <= 0.5) {
		$("#whtr_label").attr("data-whtr_class", 'Low Risk');
		$("#whtr_div").show("fold", 1000);
		$("#whtr_label").html('Waist height ratio is <strong>' + whtr + '</strong> which may indicate <font color="#33CC33">Low Risk.</font>');
	} else if (whtr > 0.5) {
		$("#whtr_label").attr("data-whtr_class", 'At Risk to Noncommunicable diseases (NCDs)');
		$("#whtr_div").show("fold", 1000);
		$("#whtr_label").html('Waist height ratio is <strong>' + whtr + '</strong> which may indicate <font color="#ff0000">At Risk to Noncommunicable diseases (NCDs).</font>');
	}
}

function ht_conv(aa) //Height conversion
{
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



function wt_conv() //Weight conversion
{
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
		calc1();
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
		calc1();
	}
}

function circum() //waist and hip circumference conversion
{
	var wc = $("#wc").val();
	var wc_opt = $("#wc_opt").val();
	var hc = $("#hc").val();
	var hc_opt = $("#hc_opt").val();
	var decimal = /^\d{0,4}(\.\d{0,2})?$/;
	if (wc == "" || !wc.match(decimal) || hc == "" || !hc.match(decimal)) {
		alert("Enter a valid number for waist/ hip circumference. Please enter a number with atleast 2 decimal places.");
		$("#whipr").attr("data-whipr", 0);
		$("#whipr_class").attr("data-whipr_class", '');
		$("#whipr_div").hide();
		$("#risk_indicator_div").hide();
		$("#risk_indicator").attr("data-risk_indicator", '');
		$("#whtr").attr("data-whtr", 0);
		$("#whtr_class").attr("data-whtr_class", '');
		$("#whtr_div").hide();
		$('#wc').addClass('error');
		$('#hc').addClass('error');
		return false;
	} else {
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
/*function h_circum()  //waist circumference conversion
{
	var hc =$("#hc").val();
	var hc_opt=$("#hc_opt").val();
	
	//Inches to Cm
	if(hc_opt=="cm")	
	{
		var hc_cm= Math.round((hc*2.54)*10)/10;
		$("#hc").val(hc_cm);
		$("#hipRange").val(hc_cm);

		calc3();
	}
	//Cm to inches
	else
	{
		var hc_in =Math.round((hc/2.54)*10)/10;
		$("#hc").val(hc_in);
		$("#hipRange").val(hc_in);

		calc3();
	}
	
	
	
}*/
function dbw_conv() //Weight conversion
{
	var dbw = $("#dbw").val();
	var dbw_opt = $("#dbw_opt").val();
	//Kilogram to pounds
	if (dbw_opt == "lbs") {
		var dbw_lbs = Math.round((dbw * 2.2) * 10) / 10;
		$("#dbw").val(dbw_lbs);
	}
	//Pounds to kilograms
	else {
		var dbw_kgs = Math.round((dbw / 2.2) * 10) / 10;
		$("#dbw").val(dbw_kgs);
	}
}

function limit_conv() {
	var lower = $("#lower_limit").val();
	var upper = $("#upper_limit").val();
	var limit_opt = $("#limit_opt").val();
	//Kilogram to pounds
	if (limit_opt == "lbs") {
		var lower_lbs = Math.round((lower * 2.2) * 10) / 10;
		$("#lower_limit").val(lower_lbs);
		var upper_lbs = Math.round((upper * 2.2) * 10) / 10;
		$("#upper_limit").val(upper_lbs);
	}
	//Pounds to kilograms
	else {
		var lower_kgs = Math.round((lower / 2.2) * 10) / 10;
		$("#lower_limit").val(lower_kgs);
		var upper_kgs = Math.round((upper / 2.2) * 10) / 10;
		$("#upper_limit").val(upper_kgs);
	}
}

function anthrop_reset_form() {
	var data = '';
	$("#wtRange").val("30");
	$("#wtRange_div").show();
	$("#wt").val("30");
	$("#htRange").val("121.9");
	$("#htRange_div").show();
	$("#ht").val("121.9");
	$("#ht_ft").val("4");
	$("#ht_in").val("0");
	$("#waistRange").val("0");
	$("#wc").val("0");
	$("#waistRange_div").show();
	$("#hipRange").val("0");
	$("#hc").val("0");
	$("#hipRange_div").show();
	$("#dbw").val("");
	$("#upper_limit").val("");
	$("#lower_limit").val("");
	$("#bmi").attr("data-bmi", data);
	$("#bmi").attr("data-bmi_class", data);
	$("#risk_indicator").attr("data-risk_indicator", data);
	$("#whipr").attr("data-whipr", data);
	$("#whipr_class").attr("data-whipr_class", data);
	$("#whtr").attr("data-whtr", data);
	$("#whtr_class").attr("data-whtr_class", data);
	$("#bmi_div").hide();
	$("#bmi_label").html("");
	$("#dbw_div").hide();
	$("#dbw_div1").hide();
	$("#limit_div").hide();
	$("#dbw_label").html("");
	$("#whipr_div").hide();
	$("#risk_indicator_div").hide();
	$("#risk_indicator_label").html("");
	$("#whipr_label").html("");
	$("#whtr_label").html("");
	$("#whtr_div").hide();
	$("#whtr_div").hide();
}

function select_p() {
	var select_cal_plan = $("#select_cal_plan").val();
	if (select_cal_plan == 1) {
		$("#cal_plan").attr('readonly', true);
		$("#cal_plan").val('');
	} else {
		$("#cal_plan").attr('readonly', false);
	}
}
//function select_method(){
/*if(select_plan == 0){
		alert("Please select nutrition plan.");
		return false;
	}*/
//else{
//$("#select_pmethod").val('0');
//if(select_method == 1){
//	$( ".foodgroup" ).each(function(index) {
//}
//}
