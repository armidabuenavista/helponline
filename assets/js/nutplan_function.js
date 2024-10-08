$(document).ready(function() {
	$(document).on("click", "#add_nutrition_plan", function(e) {
		$("#nutrition_plan_result").hide("fade", 1000);
		$("#nutrition_plan_form").show("fade", 1000);
	});
	$(document).on("change", "#pa_lvl", function() {
		var pa_lvl = $(this).val();
		var select_plan = $("#select_plan").val();
		$("#cho_meter").css('width', 0 + '%').attr('aria-valuenow', 0).attr('aria-valuemax', 0);
		$("#pro_meter").css('width', 0 + '%').attr('aria-valuenow', 0).attr('aria-valuemax', 0);
		$("#fat_meter").css('width', 0 + '%').attr('aria-valuenow', 0).attr('aria-valuemax', 0);
		nutrition_plan_reset_form();
		//if(select_plan == 2){
		//	nutrition_plan_reset_form();
		//  nutrition_plan_reset_form();  
		if (pa_lvl == 0) {
			$("#pa_lvl_val").val('0');
			$("#cal_label").html('0');
			$("#cal").val('0');
		} else {
			$.ajax({
				url: base_url + 'admin/help/get_pa_lvl_data',
				data: "pa_lvl=" + pa_lvl,
				method: "GET",
				success: function(retrieved_data) {
					// Your code here.. use something like this
					var Obj = retrieved_data;
					// Since your controller produce array of object you can access the value by using this one :
					$.each(Obj, function(index, field) {
						$("#pa_lvl_val").val(field.pa_lvl_val);
						calc2();
					});
				}
			});
		}
		/*}
		else {
			nutrition_plan_reset_form();
		}*/
		return false;
	});
	//$("#select_wt").blur({key: 'value' },calc2);
	$(document).on("change", "#select_wt", function(e) {
		var select_wt = $(this).val();
		var appointment_id = $("#select_wt").data("appointment_id");
		var pregnant_lactating = $("#pregnant_lactating").val();
		nutrition_plan_reset_form();
		if (select_wt == 0) {
			$("#cal").val('');
			$("#weight").val('');
			$("#label_wt").html('');
			nutrition_plan_reset_form();
			$("#pa_lvl").val('0');
			$("#pa_lvl_val").val('0');
			$("#cal_label").html('');
		} else {
			$.ajax({
				url: base_url + 'admin/help/select_wt_type',
				data: 'select_wt=' + select_wt + '&appointment_id=' + appointment_id,
				method: "GET",
				success: function(retrieved_data) {
					// Your code here.. use something like this
					var Obj = retrieved_data;
					// Since your controller produce array of object you can access the value by using this one :
					$.each(Obj, function(index, field) {
						$("#label_wt").html(field.weight);
						$("#label_wt_unit").html(field.unit);
						$("#weight").val(field.weight);
						calc2();
					});
				}
			});
		}
		return false;
	});
	$("#select_method").on("change", function() {
		var select_method = $(this).val();
		var select_plan = $("#select_plan").val();
		if (select_method == 1) {
			//alert(foodlist);
			$.ajax({
				type: "POST",
				url: base_url + 'admin/help/get_select_pmethod',
				data: "select_method=" + select_method,
				success: function(data) {
					//alert(data);	
					document.getElementById("select_pmethod").innerHTML = data;
					$("#pmethod_div").show();
					$("#nut_div").hide();
					$("#npc_div").hide();
					//alert(foodlist);
				},
			});
			//  });
			// });
			//nutrition_plan_reset_form();
		} else if (select_method == 2) {
			//alert('NPC');
			//nutrition_plan_reset_form();
			var opt = ' <option value="0" >--Select Percentage Method--</option> ';
			document.getElementById("select_pmethod").innerHTML = opt;
			$("#cho_bar").html('');
			$("#pro_bar").html('');
			$("#fat_bar").html('');
			var age = $("#age").data("age");
			var gender = $("#gender").data("gender");
			//	var st_value = document.getElementById("st_value").value;
			if (age < 6) {
				$("#st_value").val('1.5');
				$("#st_value_label").html('1.5');
			} else if (age <= 6 && age <= 12) {
				$("#st_value").val('1.6');
				$("#st_value_label").html('1.6');
			} else if (age >= 1 && age <= 3) {
				$("#st_value").val('2.2');
				$("#st_value_label").html('2.2');
			} else if (age >= 4 && age <= 6) {
				$("#st_value").val('2.0');
				$("#st_value_label").html('2.0');
			} else if (age >= 7 && age <= 9) {
				$("#st_value").val('1.8');
				$("#st_value_label").html('1.8');
			} else if (gender == 'Male') {
				if (age >= 10 && age <= 12) {
					$("#st_value").val('1.6');
					$("#st_value_label").html('1.6');
				} else if (age >= 13 && age <= 15) {
					$("#st_value").val('1.4');
					$("#st_value_label").html('1.4');
				} else if (age >= 16 && age <= 18) {
					$("#st_value").val('1.3');
					$("#st_value_label").html('1.3');
				} else if (age >= 19 && age <= 65) {
					$("#st_value").val('1.1');
					$("#st_value_label").html('1.1');
				}
			} else if (gender == 'Female') {
				if (age >= 10 && age <= 12) {
					$("#st_value").val('1.4');
					$("#st_value_label").html('1.4');
				} else if (age >= 13 && age <= 15) {
					$("#st_value").val('1.3');
					$("#st_value_label").html('1.3');
				} else if (age >= 16 && age <= 18) {
					$("#st_value").val('1.2');
					$("#st_value_label").html('1.2');
				} else if (age >= 19 && age <= 65) {
					$("#st_value").val('1.1');
					$("#st_value_label").html('1.1');
				}
			} else {
				$("#st_value").val('');
				$("#st_value_label").html('');
			}
			$("#pmethod_div").hide();
			$("#custom_div").hide();
			$("#npc_div").show();
			$("#nut_div").show();
			$("#cho_plan").val('');
			$("#pro_plan").val('');
			$("#fat_plan").val('');
			calc7();
		} else {
			var opt = ' <option value="0" >--Select Percentage Method--</option> ';
			document.getElementById("select_pmethod").innerHTML = opt;
			$("#pmethod_div").val('0');
			$("#pmethod_div").hide();
			$("#custom_div").hide();
			$("#nut_div").hide();
			$("#npc_div").hide();
			return false;
			//nutrition_plan_reset_form();
		}
	});
	$("#select_pmethod").change({
		key: 'value'
	}, calc5);
	$("#select_cal_plan").change({
		key: 'value',
		key1: 'key1',
		key2: 'key2'
	}, cal_plan);
	$("#cal_plan").change({
		key: 'value'
	}, cal_plan);
	$("#cho_plan").keyup({
		key: 'value'
	}, calc6);
	$("#pro_plan").keyup({
		key: 'value'
	}, calc6);
	$("#fat_plan").keyup({
		key: 'value'
	}, calc6);
	$("#select_plan").on("change", function() {
		var cal = $("#cal").val();
		var select_plan = $(this).val();
		$("#cho_meter").css('width', 0 + '%').attr('aria-valuenow', 0).attr('aria-valuemax', 0);
		$("#pro_meter").css('width', 0 + '%').attr('aria-valuenow', 0).attr('aria-valuemax', 0);
		$("#fat_meter").css('width', 0 + '%').attr('aria-valuenow', 0).attr('aria-valuemax', 0);
		//nutrition_plan_reset_form();
		$("#select_pmethod").val('0');
		$("#select_method").val('0');
		if (cal == '' || cal == 0) {
			nutrition_plan_reset_form();
		} else {
			if (select_plan == 2) {
				$.ajax({
					type: "POST",
					url: base_url + 'admin/help/get_select_custom_plan',
					data: "select_plan=" + select_plan,
					success: function(data) {
						//alert(data);	
						document.getElementById("select_method").innerHTML = data;
						$("#select_pmethod").val('0');
						$("#select_method").val('0');
						$("#default_data").hide("fade", 1000);
						$("#custom_plan_div").show("fade", 1000);
						$("#nut_div").hide("fade", 1000);
						$("#cho_plan").val('');
						$("#pro_plan").val('');
						$("#fat_plan").val('');
						$("#cho").val('');
						$("#pro").val('');
						$("#fat").val('');
						//$("#cal").val('');
						//$("#cal_label").html('');
						$("#st_value").val('');
						$("#st_value_label").html('');
						$("#cho_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
						//$("#cal_label").html('');
						$("#cho_label").html('');
						$("#cho_bar").html('');
						$("#cho_meter").attr('title', '');
						$("#cho_tip").attr('title', '');
						$("#pro_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
						$("#pro_label").html('');
						$("#pro_bar").html('');
						$("#pro_meter").attr('title', '');
						$("#pro_tip").attr('title', '');
						$("#fat_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
						$("#fat_label").html('');
						$("#fat_bar").html('');
						$("#fat_meter").attr('title', '');
						$("#fat_tip").attr('title', '');
						$(".data_fel").attr("data-id", '0');
						$("#default_fel_data").hide();
						$("#default_fel").html('');
						$("#default_fel_data").html('');
						$(".data_meal").attr("data-id", '0');
						$("#default_meal").html('');
						$("#default_meal_data").html('');
						$("#default_meal_data").hide();
						$("#nut_alert").html('');
						$("#nut_alert").removeClass('alert alert-danger');
						//alert(foodlist);
					},
				});
			} else if (select_plan == 1) {
				var opt = ' <option value="0" >--Select Method of Macronutrient Distribution--</option> ';
				document.getElementById("select_method").innerHTML = opt;
				$("#default_fel_data").hide();
				$("#default_fel").html('');
				$("#npc_div").hide();
				$("#st_value").val('');
				$("#st_value_label").html('');
				$.ajax({
					url: base_url + 'admin/help/get_select_default_plan',
					data: "cal=" + cal,
					method: "GET",
					success: function(retrieved_data) {
						// Your code here.. use something like this
						var Obj = retrieved_data;
						// Since your controller produce array of object you can access the value by using this one :
						$.each(Obj, function(index, field) {
							$("#cho_tip").attr('title', field.default_cho + ' grams');
							$("#cho_label").html(field.default_cho);
							$("#cho").val(field.default_cho);
							$('#cho_meter').css('width', 65 + '%').attr('aria-valuenow', field.default_cho).attr('aria-valuemax', field.default_cal);
							$("#cho_bar").html(65 + '%');
							$("#pro_tip").attr('title', field.default_protein + ' grams');
							$("#pro_label").html(field.default_protein);
							$("#pro").val(field.default_protein);
							$('#pro_meter').css('width', 15 + '%').attr('aria-valuenow', field.default_protein).attr('aria-valuemax', field.default_protein);
							$("#pro_bar").html(15 + '%');
							$("#fat_tip").attr('title', field.default_fat + ' grams');
							$("#fat_label").html(field.default_fat);
							$("#fat").val(field.default_fat);
							$('#fat_meter').css('width', 20 + '%').attr('aria-valuenow', field.default_fat).attr('aria-valuemax', field.default_fat);
							$("#fat_bar").html(20 + '%');
							$("#custom_plan_div").hide("fade", 1000);
							$("#nut_div").show("fade", 1000);
							$("#default_data").show("highlight", 1000);
							//var r = $('<input/>', { type: "button", id: "field"+field.id, value:"Sample Food Exchange List", data_id:field.id }).addClass('aa btn btn-success');
							if (field.alert != '') {
								var alert = field.alert;
								$("#nut_alert").html(alert);
								$("#nut_alert").addClass('alert alert-danger');
							}
							// var fel = '[<a href="#" class="data_fel" data-id="' + field.id + '">Show Food Exchange List</a>]';
							var meal = '[<a href="#" class="data_meal" data-id="' + field.id + '">Show Meal Plan</a>]';
							//$("#example").append(r).click(alert1);
							//    $("#default_fel").html(fel).click(d_fel_data);
							$("#default_meal").html(meal).click(d_meal_data);
						});
					}
				});
				/*var url = 'select_plan.php?cal=' + cal;
				$.getJSON(url, function(result) {
					$.each(result, function(i, field) {
						//$("#cal_label").html(field.default_cal); 
						$("#cho_tip").attr('title', field.default_cho + ' grams');
						$("#cho_label").html(field.default_cho);
						$("#cho").val(field.default_cho);
						$('#cho_meter').css('width', 65 + '%').attr('aria-valuenow', field.default_cho).attr('aria-valuemax', field.default_cal);
						$("#cho_bar").html(65 + '%');
						$("#pro_tip").attr('title', field.default_protein + ' grams');
						$("#pro_label").html(field.default_protein);
						$("#pro").val(field.default_protein);
						$('#pro_meter').css('width', 15 + '%').attr('aria-valuenow', field.default_protein).attr('aria-valuemax', field.default_protein);
						$("#pro_bar").html(15 + '%');
						$("#fat_tip").attr('title', field.default_fat + ' grams');
						$("#fat_label").html(field.default_fat);
						$("#fat").val(field.default_fat);
						$('#fat_meter').css('width', 20 + '%').attr('aria-valuenow', field.default_fat).attr('aria-valuemax', field.default_fat);
						$("#fat_bar").html(20 + '%');
						$("#custom_plan_div").hide("fade", 1000);
						$("#nut_div").show("fade", 1000);
						$("#default_data").show("highlight", 1000);
						//var r = $('<input/>', { type: "button", id: "field"+field.id, value:"Sample Food Exchange List", data_id:field.id }).addClass('aa btn btn-success');
						if (field.alert != '') {
							var alert = field.alert;
							$("#nut_alert").html(alert);
							$("#nut_alert").addClass('alert alert-danger');
						}
						// var fel = '[<a href="#" class="data_fel" data-id="' + field.id + '">Show Food Exchange List</a>]';
						var meal = '[<a href="#" class="data_meal" data-id="' + field.id + '">Show Meal Plan</a>]';
						//$("#example").append(r).click(alert1);
						//    $("#default_fel").html(fel).click(d_fel_data);
						$("#default_meal").html(meal).click(d_meal_data);
					});
				});*/
			} else {
				var opt = ' <option value="0" >--Select Method of Macronutrient Distribution--</option> ';
				document.getElementById("select_method").innerHTML = opt;
				nutrition_plan_reset_form();
			}
		}
		/*if(select_plan == 21){
		nutrition_plan_reset_form();
		$("#default_data").hide("fade",1000);
	} 
	else{
	$("#default_fel_data").hide();
	$("#default_fel_data").html('');	
	var url = 'select_plan.php?select_plan=' + select_plan;
 $.getJSON(url, function(result){  
	 $.each(result, function(i, field){
        $("#cal_label").html(field.default_cal);  
        $("#cho_label").html(field.default_cho); 
		$('#cho_meter').css('width',65 +'%'  ).attr('aria-valuenow', field.default_cho ).attr('aria-valuemax', field.default_cal);  
		$("#cho_bar").html( 65 + '%')
        $("#pro_label").html(field.default_protein); 
		$('#pro_meter').css('width',20+'%'  ).attr('aria-valuenow', field.default_protein ).attr('aria-valuemax', field.default_protein);  
		$("#pro_bar").html( 20 + '%')
        $("#fat_label").html(field.default_fat); 
		$("#fat_label").html(field.default_fat); 
		$('#fat_meter').css('width',15 +'%'  ).attr('aria-valuenow', field.default_fat ).attr('aria-valuemax', field.default_fat);  
		$("#fat_bar").html(15 + '%')
      	$("#select_method").hide("fade",1000);
       	$("#nut_div").show("fade",1000);
       	$("#default_data").show("fade",1000);
		//var r = $('<input/>', { type: "button", id: "field"+field.id, value:"Sample Food Exchange List", data_id:field.id }).addClass('aa btn btn-success');
	var r= '[<a href="#" class="data_fel" data_id="'+field.id+'">Show Food Exchange List</a>]';
    	//$("#example").append(r).click(alert1);
		  $("#default_fel").html(r).click(d_fel_data);
        });  
    });		
	}*/
	});



});

	function calc2() {
		// Total energy requirement
		var weight = $("#weight").val();
		//var select_wt =$("#select_wt").val();
		var pa_lvl_val = $("#pa_lvl_val").val();
		var cal = $("#cal").val();
		var select_cal_plan = $("#select_cal_plan").val();
		var cal_plan = $("#cal_plan").val();
		var pregnant_lactating = $("#pregnant_lactating").val();
		if (weight == 0 || weight == '') {
			nutrition_plan_reset_form();
			return false;
		} else {
			if (pa_lvl_val == 0) {
				$("#cal").val('0');
				$("#cal_label").html('0');
			} else {
				if (pregnant_lactating == 1) {
					var xx = 300;
				} else if (pregnant_lactating == 2) {
					var xx = 500;
				} else {
					var xx = 0;
				}
				var cal = Math.round(weight * pa_lvl_val) + xx;
				var cal_round = Math.ceil((cal + 1) / 50) * 50;
				console.log(cal_round);
				$("#cal_div").show();
				$("#cal_div").focus();
				$("#cal").val(cal_round);
				$("#cal_label").html(cal_round + 'kcal');
				calc5();
			}
		}
	}

	function cal_plan() {
		var weight = $("#weight").val();
		var pa_lvl_val = $("#pa_lvl_val").val();
		var cal = $("#cal").val();
		var select_cal_plan = $("#select_cal_plan").val();
		var cal_plan = $("#cal_plan").val();
		//select_p();
		$("#select_pmethod").val('0');
		$("#select_method").val('0');
		$("#select_plan").val('0');
		$("#st_value_label").html('');
		$("#cho_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
		//$("#cal_label").html('');
		$("#cho_label").html('');
		$("#cho_bar").html('');
		$("#cho_meter").attr('title', '');
		$("#cho_tip").attr('title', '');
		$("#pro_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
		$("#pro_label").html('');
		$("#pro_bar").html('');
		$("#pro_meter").attr('title', '');
		$("#pro_tip").attr('title', '');
		$("#fat_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
		$("#fat_label").html('');
		$("#fat_bar").html('');
		$("#fat_meter").attr('title', '');
		$("#fat_tip").attr('title', '');
		$("#nut_div").hide();
		$("#default_data").hide();
		$(".data_fel").attr("data-id", '0');
		$("#default_fel").html('');
		$(".data_meal").attr("data-id", '0');
		$("#default_meal").html('');
		$("#nut_alert1").html('');
		$("#nut_alert1").hide();
		$("#npc_div").hide();
		$("#nut_alert").html('');
		$("#nut_alert").removeClass('alert alert-danger');
		if (weight == "") {
			return false;
		} else {
			if (select_cal_plan == 2) {
				$("#cal_plan_div").show();
				$("#cal_plan").attr('readonly', false);
				var cal = Math.round(weight * pa_lvl_val) + Number(cal_plan);
				var cal_round = Math.ceil((cal + 1) / 50) * 50;
				$("#cal").val(cal_round);
				$("#cal_label").html(cal_round + 'kcal');
				calc5();
			} else if (select_cal_plan == 3) {
				$("#cal_plan_div").show();
				$("#cal_plan").attr('readonly', false);
				var cal = Math.round(weight * pa_lvl_val) - Number(cal_plan);
				var cal_round = Math.ceil((cal + 1) / 50) * 50;
				$("#cal").val(cal_round);
				$("#cal_label").html(cal_round + 'kcal');
				calc5();
			} else if (select_cal_plan == 1) {
				$("#cal_plan_div").hide();
				var cal = Math.round(weight * pa_lvl_val);
				var cal_round = Math.ceil((cal + 1) / 50) * 50;
				$("#cal").val(cal_round);
				$("#cal_label").html(cal_round + 'kcal');
				$("#cal_plan").attr('readonly', true);
				$("#cal_plan").val('');
				//$("#cal_plan").attr('readonly', false);
				calc5();
			}
		}
	}

	function calc5() {
		var select_pmethod = $("#select_pmethod").val();
		var cal = $("#cal").val();
		//nutrition_plan_reset_form();
		if (cal == "") {
			$("#cho").val('');
			$("#cho_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
			$("#cho_label").html('');
			$("#cho_tip").attr('title', '');
			$("#pro").val('');
			$("#pro_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
			$("#pro_label").html('');
			$("#pro_tip").attr('title', '');
			$("#fat").val('');
			$("#fat_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
			$("#fat_tip").attr('title', '');
			$("#fat_label").html('');
			return false;
		} else {
			$("#cho").val('');
			$("#cho_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
			$("#cho_label").html('');
			$("#cho_tip").attr('title', '');
			$("#pro").val('');
			$("#pro_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
			$("#pro_label").html('');
			$("#pro_tip").attr('title', '');
			$("#fat").val('');
			$("#fat_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
			$("#fat_tip").attr('title', '');
			$("#fat_label").html('');
			// Dietary Prescription
			if (select_pmethod == 1) {
				$("#nut_div").show("fade", 1000);
				$("#cho_plan").val('');
				$("#pro_plan").val('');
				$("#fat_plan").val('');
				$("#custom_div").hide();
				$("#st_value").val('');
				//cho computation
				var cho_round = (cal * .65) / 4;
				$("#cho").val(Math.round(cho_round / 5) * 5);
				$("#cho_bar").html('65%');
				$("#cho_meter").val(Math.round(cho_round / 5) * 5);
				$("#cho_meter").attr('title', Math.round(cho_round / 5) * 5);
				//Math.ceil((cho_round +1)/100) *100;
				//Math.ceil((cho_round +1)/100) *100;
				$("#cho_meter").css('width', 65 + '%').attr('aria-valuenow', Math.round(cho_round / 5) * 5).attr('aria-valuemax', cal);
				$("#cho_label").html(Math.round(cho_round / 5) * 5 + ' grams');
				//Math.ceil((cho_round +1)/100) *100 + ' grams';
				$("#cho_tip").attr('title', Math.round(cho_round / 5) * 5 + ' grams');
				//Math.ceil((cho_round +1)/100) *100 + ' grams';
				//Protein computation
				var pro_round = (cal * .15) / 4;
				// nearest 50
				//document.form1.protein.value = Math.ceil((pro_round +1)/50) *50;
				$("#pro").val(Math.round(pro_round / 5) * 5);
				$("#pro_bar").html('15%');
				$("#pro_meter").val(Math.round(pro_round / 5) * 5);
				$("#pro_meter").attr('title', Math.round(pro_round / 5) * 5);
				//Math.ceil((pro_round +1)/50) *50;
				$("#pro_tip").attr('title', Math.round(pro_round / 5) * 5 + ' grams');
				//Math.ceil((pro_round +1)/50) *50;
				$("#pro_meter").css('width', 15 + '%').attr('aria-valuenow', Math.round(pro_round / 5) * 5).attr('aria-valuemax', cal);
				$("#pro_label").html(Math.round(pro_round / 5) * 5 + ' grams');
				//Math.ceil((pro_round +1)/50) *50 + ' grams';
				//Fat computation
				var fat_round = (cal * .2) / 9;
				$("#fat").val(Math.round(fat_round / 5) * 5);
				$("#fat_bar").html('20%');
				//Math.ceil((fat_round +1)/50) *50;
				$("#fat_meter").val(Math.round(fat_round / 5) * 5);
				$("#fat_meter").attr('title', Math.round(fat_round / 5) * 5);
				$("#fat_meter").css('width', 20 + '%').attr('aria-valuenow', Math.round(fat_round / 5) * 5).attr('aria-valuemax', cal);
				$("#fat_label").html(Math.round(fat_round / 5) * 5 + ' grams');
				$("#fat_tip").attr('title', Math.round(fat_round / 5) * 5 + ' grams');
			} else if (select_pmethod == 2) {
				$("#cho_plan").val('');
				$("#pro_plan").val('');
				$("#fat_plan").val('');
				$("#custom_div").show("fade", 1000);
				$("#cho").val('');
				$("#cho_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
				$("#cho_label").html('');
				$("#pro").val('');
				$("#pro_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
				$("#pro_label").html('');
				$("#fat").val('');
				$("#fat_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
				$("#fat_label").html('');
			} else {
				$("#custom_div").hide();
				$("#nut_div").hide();
				$("#pmethod_div").hide();
			}
		}
	}

	function calc6() {
		var cho_plan = $("#cho_plan").val();
		var pro_plan = $("#pro_plan").val();
		var fat_plan = $("#fat_plan").val();
		var tot_plan = $("#tot_plan").val();
		var cal = $("#cal").val();
		var decimal = /^\d{0,4}(\.\d{0,2})?$/;
		if (!cho_plan.match(decimal)) {
			alert("Please enter a number with atleast 2 decimal places.");
			$("#cho_plan").val('');
			$("#tot_plan").val('');
			$("#cho").val('');
			$("#cho_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
			$("#cho_label").html('');
			$("#cho_tip").attr('title', '');
			return false;
		} else if (!pro_plan.match(decimal)) {
			alert("Please enter a number with atleast 2 decimal places.");
			$("#pro").val('');
			$("#pro_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
			$("#pro_label").html('');
			$("#pro_tip").attr('title', '');
			return false;
		} else if (!fat_plan.match(decimal)) {
			alert("Please enter a number with atleast 2 decimal places.");
			$("#fat").val('');
			$("#fat_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
			$("#fat_tip").attr('title', '');
			$("#fat_label").html('');
			return false;
		} else if (!tot_plan.match(decimal)) {
			alert("Please enter a number with atleast 2 decimal places.");
			$("#tot_plan").val('');
			return false;
		} else {
			var total = Number(cho_plan) + Number(pro_plan) + Number(fat_plan);
			$("#tot_plan").val(total);
		}
		if (cho_plan > 100 && total != 100) {
			alert('Oops! Not valid.');
			$("#cho_plan").val('');
			$("#tot_plan").val('');
			$("#cho").val('');
			$("#cho_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
			$("#cho_label").html('');
			$("#cho_tip").attr('title', '');
			$("#pro").val('');
			$("#pro_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
			$("#pro_label").html('');
			$("#pro_tip").attr('title', '');
			$("#fat").val('');
			$("#fat_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
			$("#fat_tip").attr('title', '');
			$("#fat_label").html('');
		} else if (pro_plan > 100 && total != 100) {
			alert('Oops! Not valid.');
			$("#pro_plan").val('');
			$("#tot_plan").val('');
			$("#cho").val('');
			$('#cho_meter').css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
			$("#cho_label").html('');
			$("#cho_tip").attr('title', '');
			$("#pro").val('');
			$("#pro_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
			$("#pro_label").html('');
			$("#pro_tip").attr('title', '');
			$("#fat").val('');
			$("#fat_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
			$("#fat_tip").attr('title', '');
			$("#fat_label").html('');
		} else if (fat_plan > 100 && total != 100) {
			alert('Oops! Not valid.');
			$("#fat_plan").val('');
			$("#tot_plan").val('');
			$("#cho").val('');
			$("#cho_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
			$("#cho_label").html('');
			$("#cho_tip").attr('title', '');
			$("#pro").val('');
			$("#pro_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
			$("#pro_label").html('');
			$("#pro_tip").attr('title', '');
			$("#fat").val('');
			$("#fat_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
			$("#fat_label").html('');
			$("#fat_tip").attr('title', '');
		} else if (total != 100 && total < 100 || total > 100) {
			//alert('Oops! Total should be 100%.');
			$("#total_alert").html(' Total should be 100%');
			$("#total_alert").show();
			$("#tot_plan").val('');
			$("#cho").val('');
			$("#cho_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
			$("#cho_label").html('');
			$("#pro").val('');
			$("#pro_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
			$("#pro_label").html('');
			$("#fat").val('');
			$("#fat_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
			$("#fat_label").html('');
			return false;
		} else {
			$("#nut_div").show();
			//cho Plan
			$("#total_alert").hide();
			var cho_round = ((cal * (cho_plan / 100))) / 4;
			$("#cho").val(Math.round(cho_round / 5) * 5);
			$("#cho_bar").html(cho_plan + '%')
				//Math.round(cho_round * 100) /100;
				//Math.ceil((cho_round +1)/100) *100;
			$("#cho_meter").val(Math.round(cho_round / 5) * 5);
			//Math.ceil((cho_round +1)/100) *100;
			$('#cho_meter').attr('title', Math.round(cho_round / 5) * 5);
			//Math.ceil((cho_round +1)/100) *100;
			$('#cho_meter').css('width', 65 + '%').attr('aria-valuenow', Math.round(cho_round / 5) * 5).attr('aria-valuemax', cal);
			$('#cho_label').html(Math.round(cho_round / 5) * 5 + ' grams');
			//Math.ceil((cho_round +1)/100) *100 + ' grams';
			$('#cho').attr('title', Math.round(cho_round / 5) * 5 + ' grams');
			//Math.ceil((cho_round +1)/100) *100 + ' grams';
			//Protein Plan
			var pro_round = ((cal * (pro_plan / 100))) / 4;
			// nearest 50
			$("#pro").val(Math.round(pro_round / 5) * 5);
			$("#pro_bar").html(pro_plan + '%');
			//Math.ceil((pro_round +1)/50) *50;
			$("#pro_meter").val(Math.round(pro_round / 5) * 5);
			//Math.ceil((pro_round +1)/50) *50;
			$("#pro_meter").attr('title', Math.round(pro_round / 5) * 5);
			//Math.ceil((pro_round +1)/50) *50;
			$("#pro_meter").css('width', 15 + '%').attr('aria-valuenow', Math.round(pro_round / 5) * 5).attr('aria-valuemax', cal);
			$("#pro_label").html(Math.round(pro_round / 5) * 5 + ' grams');
			//Math.ceil((pro_round +1)/50) *50 + ' grams';
			//document.getElementById("protein").title= Math.round(pro_round/5)*5;
			$("#protein").attr('title', Math.round(pro_round / 5) * 5 + ' grams');
			//Fat Plan
			var fat_round = ((cal * (fat_plan / 100))) / 9;
			$("#fat").val(Math.round(fat_round / 5) * 5);
			$("#fat_bar").html(fat_plan + '%');
			//Math.ceil((fat_round +1)/50) *50;
			$("#fat_meter").val(Math.round(fat_round / 5) * 5);
			//Math.ceil((fat_round +1)/50) *50;
			$('#fat_meter').attr('title', Math.round(fat_round / 5) * 5);
			//Math.ceil((fat_round +1)/50) *50;
			$("#fat_meter").css('width', 20 + '%').attr('aria-valuenow', Math.round(fat_round / 5) * 5).attr('aria-valuemax', cal);
			$("#fat_label").html(Math.round(fat_round / 5) * 5 + ' grams');
			$("#fat").attr('title', Math.round(fat_round / 5) * 5 + ' grams');
		}
	}

	function nutrition_plan_reset_form() {
		//$("#pa_lvl").val('0');
		$("#select_pmethod").val('0');
		$("#select_method").val('0');
		$("#select_plan").val('0');
		//$("#pa_lvl").val('0');
		$("#cho_plan").val('');
		$("#pro_plan").val('');
		$("#fat_plan").val('');
		$("#cho").val('');
		$("#pro").val('');
		$("#fat").val('');
		$("#cal").val('');
		//$("#cal_label").html('');
		//$("#st_value").val('');
		//$('input[type=text]').val('');
		/*$("#st_value_label").html('');
		$("#cho_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
		//$("#cal_label").html('');
		$("#cho_label").html('');
		$("#cho_bar").html('');
		$("#cho_meter").attr('title', '');
		$("#cho_tip").attr('title', '');
		$("#pro_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
		$("#pro_label").html('');
		$("#pro_bar").html('');
		$("#pro_meter").attr('title', '');
		$("#pro_tip").attr('title', '');
		$("#fat_meter").css('width', 0 + '%').attr('aria-valuenow', '').attr('aria-valuemax', cal);
		$("#fat_label").html('');
		$("#fat_bar").html('');
		$("#fat_meter").attr('title', '');
		$("#fat_tip").attr('title', '');*/
		$("#nut_div").hide();
		$("#default_data").hide();
		$(".data_fel").attr("data-id", '0');
		$("#default_fel").html('');
		$("#default_fel_data").html('');
		$(".data_meal").attr("data-id", '0');
		$("#default_meal").html('');
		$("#default_meal_data").html('');
		$("#nut_alert1").html('');
		$("#nut_alert1").hide();
		$("#npc_div").hide();
		$("#nut_alert").html('');
		$("#nut_alert").removeClass('alert alert-danger');
		$("#cal_plan_div").hide();
		//$("#select_plan").prop('checked', false);
		//$("#select_method").show();
	}

	function d_meal_data() {
	var data_id = $(".data_meal").data("id");
	//alert(data_id);
	$.ajax({
		type: "POST",
		url: base_url+'admin/help/get_default_meal_data',
		data: "id=" + data_id,
		success: function(data) {
			$("#default_meal_data").show("highlight");
			$("#default_data").focus();
			$("#default_meal_data").html(data);
			},
		});
	}

	function calc7() {
	var st_value = $("#st_value").val();
	var wt = $("#weight").val();
	var cal = $("#cal").val();
	if (cal == '') {
		return false;
	} else {
		npc_pro = Math.round(st_value * wt);
		$("#pro").val(npc_pro);
		var x = Math.round(npc_pro * 4);
		var y = cal - x;
		var cho = Math.round(y * .7);
		var npc_cho = Math.round(cho / 4);
		$("#cho").val(npc_cho);
		$("#cho_meter").css('width', 65 + '%').attr('aria-valuenow', npc_cho).attr('aria-valuemax', y);
		$("#cho_label").html(npc_cho + ' grams');
		$("#cho_meter").attr('title', npc_cho);
		$("#cho_tip").attr('title', npc_cho + ' grams');
		$("#pro_meter").css('width', 15 + '%').attr('aria-valuenow', npc_pro).attr('aria-valuemax', y);
		$("#pro_label").html(npc_pro + ' grams');
		$("#pro_tip").attr('title', npc_pro + ' grams');
		$("#pro_meter").attr('title', npc_pro);
		var z = Math.round(y * .3);
		var npc_fat = Math.round(z / 9);
		$("#fat").val(npc_fat);
		$("#fat_meter").css('width', 20 + '%').attr('aria-valuenow', npc_fat).attr('aria-valuemax', y);
		$("#fat_meter").attr('title', npc_fat + ' grams');
		$("#fat_label").html(npc_fat + ' grams');
		$("#fat_tip").attr('title', npc_fat + ' grams');
	}
}