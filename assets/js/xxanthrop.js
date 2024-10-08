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