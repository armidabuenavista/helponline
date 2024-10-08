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