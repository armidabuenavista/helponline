$(document).ready(function() {
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
	$(".meal_plan_exchange").each(function(index) {
		$(this).on("focusout", function() {
			var i = $(this).data("menu_id");
			var ex = $("#ex" + i).val();
			var const_ex = $("#const_ex" + i).val();
			var hh_val = $("#hh_val" + i).val();
			var qty = $("#qty" + i).val();
			var foodgroup_content = $("#foodgroup_content" + i).val();
			//var const_ex_combination = $("#const_ex_combination" + i).val();
			var hh_val = $("#hh_val" + i).val();
			var hh_foodgroup = $("#hh_foodgroup" + i).val();
			var decimal = /^\d{0,4}(\.\d{0,2})?$/;
			/*if (const_ex_combination == '') {
				if (ex == '' || !ex.match(decimal)) {
					alert('Please enter exchange with atleast 2 decimal places.');
					$("#ex" + i).val('');
					return false;
				} else {
					if (ex % 1 == 0) {
						$("#hh_val" + i).val(Math.round((ex * const_ex) * 10) / 10);
						$("#hh_val_label" + i).html(Math.round((ex * const_ex) * 10) / 10);
					} else {
						$("#hh_val" + i).val(Math.round((ex * const_ex) * 10) / 10);
						$("#hh_val_label" + i).html(fraction(Math.round((ex * const_ex) * 10) / 10));
					}
					$("#hh_val_label" + i).css("font-weight", "bold");
					$("#qty_val" + i).val(Math.round((ex * qty) * 10) / 10);
					$("#qty_val_label" + i).html(Math.round((ex * qty) * 10) / 10);
					$("#qty_val_label" + i).css("font-weight", "bold");
				}
			} else {*/
			/*var string = const_ex_combination.split(',');
			 var result = {};
			 var ctr = 0;
			for (aa in string)
			{
				result[ctr] = parseFloat(string) * ex;
				//alert(result);
				ctr++;
			}
			     console.log(result);*/
			arrayex = const_ex.split(',');
			aa = [];
			a = [];
			for (ii = 0; ii < arrayex.length; ii++) {
				//sum+=parseInt(arrayex[i]);
				result = Math.round((ex * arrayex[ii]) * 10) / 10;
				//	console.log(fraction(1));
				arr_result = $.makeArray(result);
				arr_result1 = $.makeArray(result);
				a.push(arr_result1);
				aa.push(arr_result);
				var arr_aa = aa.join(',');
				var arr_aa1 = a.join('<br>');
			}
			$("#hh_val" + i).val(arr_aa);
			$("#hh_val_label" + i).html(fraction(arr_aa1));
			$("#hh_val_label" + i).css("font-weight", "bold");
			arrayqtyval = qty.split(',');
			aa1 = [];
			a1 = [];
			for (ii = 0; ii < arrayqtyval.length; ii++) {
				//sum+=parseInt(arrayex[i]);
				result1 = Math.round((ex * arrayqtyval[ii]) * 10) / 10;
				//alert(result1);
				arr_result_hhval = $.makeArray(result1);
				arr_result1_hhval = $.makeArray(result1);
				a1.push(arr_result1_hhval);
				aa1.push(arr_result_hhval);
				var arr_aa_hhval = aa1.join(',');
				var arr_aa1_hhval = a1.join('<br>');
			}
			$("#qty_val" + i).val(arr_aa_hhval);
			$("#qty_val_label" + i).html(arr_aa1_hhval);
			$("#qty_val_label" + i).css("font-weight", "bold");
			/*	document.getElementById("qty_val" + i).value = Math.round((ex * qty) * 10) / 10;
				$("#qty_val" + i).val(Math.round((ex * qty) * 10) / 10);
				$("#qty_val_label" + i).html(Math.round((ex * qty) * 10) / 10);*/
			$("#qty_val_label" + i).css("font-weight", "bold");
			//}
		});
	});
	//$(".add_menu").each(function(index) {
	//});
	$(".foodgroup").each(function(index) {
		$(this).on("change", function() {
			var i = $(this).data("menu_id");
			var foodlist = $("#foodlist" + i).val();
			$("#foodlist" + i).val('0');
			$("#foodlist" + i).focus();
			var foodgroup = $(this).val();
			$("#fooditem" + i).val('');
			$("#fooditem_id" + i).val('');
			$("#qty_val_label" + i).html('');
			$("#qty_val" + i).val('');
			$("#qty" + i).val('');
			$("#const_ex" + i).val('');
			$("#hh_val_label" + i).html('');
			$("#hh_measure" + i).html('');
			$("#hh_val" + i).val('');
			$("#ex" + i).val('');
			$("#foodgroup_content" + i).val('');
			$("#const_ex_combination" + i).val('');
			$("#hh_val_combination" + i).val('');
			$("#hh_foodgroup" + i).html('');
			//alert(foodlist);
			$.ajax({
				type: "POST",
				url: base_url + 'admin/help/get_foodlists',
				data: "foodgroup=" + foodgroup,
				success: function(data) {
					$("#foodlist" + i).html(data);
					//alert(foodlist);
				},
			});
		});
	});
	/*$(".fooditem").each(function(index) {
		$(this).on("focusout", function() {
			var i = $(this).data("menu_id");
			var foodgroup = $("#foodgroup" + i).val();
			var foodgroup_content = $(".foodgroup_content").val();
			// $("#hh_foodgroup"+i).html('');
			//alert(foodgroup_content);
			$.ajax({
				type: "POST",
				url: "select_fooditem_content.php",
				data: "foodgroup_content=" + foodgroup_content,
				success: function(data) {
					document.getElementById("hh_foodgroup" + i).innerHTML = data;
				},
			});
		});
	});*/
	$(".foodlist").each(function(index) {
		$(this).on("focusout", function() {
			var i = $(this).data("menu_id");
			var foodlist = $(this).val();
			var foodgroup = $(".foodgroup").val();
			$("#fooditem" + i).val('');
			$("#fooditem_id" + i).val('');
			$("#qty_val_label" + i).html('');
			$("#qty_val" + i).val('');
			$("#qty" + i).val('');
			$("#const_ex" + i).val('');
			$("#hh_val_label" + i).html('');
			//$("#hh_val_label1"+i).html('');
			$("#hh_measure" + i).html('');
			$("#hh_val" + i).val('');
			$("#ex" + i).val('');
			$("#foodgroup_content" + i).val('');
			$("#const_ex_combination" + i).val('');
			//$("#hh_val_combination" + i).val('');
			$("#hh_foodgroup" + i).html('');
			$("#fooditem" + i).autocomplete({
				source: base_url + 'admin/help/get_fooditem?foodgroup=' + foodgroup + '&foodlist=' + foodlist,
				select: function(event, ui) {
					$('#fooditem' + i).val(ui.item.value);
					$('#fooditem_id' + i).val(ui.item.id);
					$('#qty' + i).val(ui.item.ep);
					$('#const_ex' + i).val(ui.item.ex);
					$('#hh_measure' + i).html(ui.item.hh_m);
					$('#foodgroup_content' + i).val(ui.item.content);
					$('#hh_foodgroup' + i).html(ui.item.foodgroup);
					///$('#const_ex_combination' + i).val(ui.item.const_ex_combination);
					// $('#hh_foodgroup'+i).html(ui.item.foodgroup);
				},
				change: function(event, ui) {
					if (ui.item == null) {
						$("#fooditem" + i).val('');
						$("#fooditem" + i).focus();
					}
				},
				focus: function(event, ui) {
					this.value = ui.item.label;
					event.preventDefault(); // Prevent the default focus behavior.
				}
			});
			// });	
		});
	});
	$(function() {
		$("#previous_meal_plan").dialog({
			autoOpen: false,
			title: '',
			resizable: false,
			modal: true,
			width: 980,
			height: 750,
			create: function(event, ui) {
				// Set max-width
				$(this).parent().css("maxWidth", "980px");
			}
		});
		//$(".ui-dialog").addClass("ui-widget-header");
		$(".ui-dialog").addClass("ui-widget-content");
		$(".previous_meal_plan").on("click", function(e) {
			e.preventDefault();
			var id = $(this).attr("id");
			var dataString = 'id=' + id;
			//var client_id= $("#client_id").val();
			//var appointment_id= $("#appointment_id").val();
			$.ajax({
				type: "GET",
				url: base_url + 'admin/help/previous_meal_plan',
				data: dataString,
				success: function(res) {
					$("#previous_meal_plan").html(res);
					$("#previous_meal_plan").dialog("open");
					$('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
					$('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
					$(function() {
						$("#meal_div0").accordion({
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
				}
			});
		});
	});
	$(function() {
		$("#edit_meal1").dialog({
			autoOpen: false,
			title: '',
			resizable: false,
			modal: true,
			width: 950,
			create: function(event, ui) {
				// Set max-width
				$(this).parent().css("maxWidth", "950px");
			}
		});
		//$(".ui-dialog").addClass("ui-widget-header");
		$(".ui-dialog").addClass("ui-widget-content");
		$(document).on("click",".edit_meal", function(e) {
			e.preventDefault();
			var id = $(this).attr("id");
			var dataString = 'id=' + id;
			var data = $(this).data("fg_combination_id");
			var client_id = $(this).data("client_id");
			var appointment_id = $(this).data("appointment_id");
			var meal_code = $(this).data("meal_code");
			var meal_id = $(this).data("meal_id");
			var menu_id = $(this).data("menu_id");
			$.ajax({
				type: "GET",
				url: base_url + 'admin/help/edit_meal?client_id=' + client_id + '&appointment_id=' + appointment_id + '&meal_code=' + meal_code + '&meal_id=' + meal_id + '&menu_id=' + menu_id,
				data: dataString,
				success: function(res) {
					$("#edit_meal1").html(res);
					$("#edit_meal1").dialog("open");
					$('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
					$('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
				}
			});
		});
	});

	  
      var i = $(".foodgroup_content1").data("menu_id");
     // var foodlist = $("#foodlist" + i).val();
     var foodgroup_content= $("#foodgroup_content0"+i).val();
  
      $.ajax({
        type: "POST",
        url: base_url + 'admin/help/get_arr_fg',
        data: "foodgroup_content=" + foodgroup_content,
        success: function(data) {
          $("#hh_foodgroup0" + i).html(data);
      
          //alert(foodlist);
        },
      });
	$(".foodgroup1").each(function(index) {
		$(this).on("change", function() {
			var i = $(".foodgroup1").data("menu_id");
			var foodlist = $("#foodlist0" + i).val();
			$("#foodlist0" + i).val('0');
			$("#foodlist0" + i).focus();
			var foodgroup = $(".foodgroup1").val();
			$("#fooditem0" + i).val('');
			$("#fooditem_id0" + i).val('');
			$("#qty_val_label0" + i).html('');
			$("#qty_val0" + i).val('');
			$("#qty0" + i).val('');
			$("#const_ex0" + i).val('');
			$("#hh_val_label0" + i).html('');
			$("#hh_measure0" + i).html('');
			$("#hh_val0" + i).val('');
			$("#ex0" + i).val('');
			$("#foodgroup_content0" + i).val('');
			$("#const_ex_combination0" + i).val('');
			$("#hh_val0" + i).val('');
			$("#hh_foodgroup0" + i).html('');
			//alert(foodlist);
			$.ajax({
				type: "POST",
				url: base_url + 'admin/help/get_foodlists',
				data: "foodgroup=" + foodgroup,
				success: function(data) {
					$(".foodlist1").html(data);
					//alert(foodlist);
				},
			});
		});
	});
	$(".foodgroup1").on("focusout", function() {
		$(".foodlist1").each(function(index) {
			$(this).on("focusout", function() {
				var i = $(this).data("menu_id");
				var foodlist = $(this).val();
				var foodgroup = $(".foodgroup1").val();
				/*$("#fooditem" + i).val('');
				$("#fooditem_id" + i).val('');
				$("#qty_val_label" + i).html('');
				$("#qty_val" + i).val('');
				$("#qty" + i).val('');
				$("#const_ex" + i).val('');
				$("#hh_val_label" + i).html('');
				//$("#hh_val_label1"+i).html('');
				$("#hh_measure" + i).html('');
				$("#hh_val" + i).val('');
				$("#ex" + i).val('');
				$("#foodgroup_content" + i).val('');
				$("#const_ex_combination" + i).val('');
				//$("#hh_val_combination" + i).val('');
				$("#hh_foodgroup" + i).html('');*/
				$("#fooditem0" + i).autocomplete({
					source: base_url + 'admin/help/get_fooditem?foodgroup=' + foodgroup + '&foodlist=' + foodlist,
					appendTo: $('#edit_meal'),
					select: function(event, ui) {
						$('#fooditem0' + i).val(ui.item.value);
						$('#fooditem_id0' + i).val(ui.item.id);
						$('#qty0' + i).val(ui.item.ep);
						$('#const_ex0' + i).val(ui.item.ex);
						$('#hh_measure0' + i).html(ui.item.hh_m);
						$('#foodgroup_content0' + i).val(ui.item.content);
						$('#hh_foodgroup0' + i).html(ui.item.foodgroup);
						///$('#const_ex_combination' + i).val(ui.item.const_ex_combination);
						// $('#hh_foodgroup'+i).html(ui.item.foodgroup);
					},
					change: function(event, ui) {
						if (ui.item == null) {
							$("#fooditem0" + i).val('');
							$("#fooditem0" + i).focus();
						}
					},
					focus: function(event, ui) {
						this.value = ui.item.label;
						event.preventDefault(); // Prevent the default focus behavior.
					}
				});
				// });	
			});
		});
	});
	$(".fooditem1").each(function(index) {
		//$(".foodlist1").on("focusout", function() {
		var i = $(this).data("menu_id");
		var foodlist = $(".foodlist1").val();
		var foodgroup = $(".foodgroup1").val();
		/*$("#fooditem" + i).val('');
		$("#fooditem_id" + i).val('');
		$("#qty_val_label" + i).html('');
		$("#qty_val" + i).val('');
		$("#qty" + i).val('');
		$("#const_ex" + i).val('');
		$("#hh_val_label" + i).html('');
		//$("#hh_val_label1"+i).html('');
		$("#hh_measure" + i).html('');
		$("#hh_val" + i).val('');
		$("#ex" + i).val('');
		$("#foodgroup_content" + i).val('');
		$("#const_ex_combination" + i).val('');
		//$("#hh_val_combination" + i).val('');
		$("#hh_foodgroup" + i).html('');*/
		$("#fooditem0" + i).autocomplete({
			source: base_url + 'admin/help/get_fooditem?foodgroup=' + foodgroup + '&foodlist=' + foodlist,
			appendTo: $('#edit_meal'),
			select: function(event, ui) {
				$('#fooditem0' + i).val(ui.item.value);
				$('#fooditem_id0' + i).val(ui.item.id);
				$('#qty0' + i).val(ui.item.ep);
				$('#const_ex0' + i).val(ui.item.ex);
				$('#hh_measure0' + i).html(ui.item.hh_m);
				$('#foodgroup_content0' + i).val(ui.item.content);
				$('#hh_foodgroup0' + i).html(ui.item.foodgroup);
				///$('#const_ex_combination' + i).val(ui.item.const_ex_combination);
				// $('#hh_foodgroup'+i).html(ui.item.foodgroup);
			},
			change: function(event, ui) {
				if (ui.item == null) {
					$("#fooditem0" + i).val('');
					$("#fooditem0" + i).focus();
				}
			},
			focus: function(event, ui) {
				this.value = ui.item.label;
				event.preventDefault(); // Prevent the default focus behavior.
			}
		});
		// });	
		//});
	});
	//});
	/*$( ".fooditem1" ).each(function(index) {
	    $(this).on("blur", function(){
		
	    var i=  $(this).data("menu_id");
		var foodgroup =  $("#foodgroup1"+i).val();
		var foodgroup_content1 =  $("#foodgroup_content1"+i).val();
	   // $("#hh_foodgroup"+i).html('');
		//alert(i);

	    $.ajax({
	           type:"POST",
	           url:"select_fooditem_content.php",
	           data:
			"foodgroup_content1="+foodgroup_content1,
	                  
	            success: function(data){
		document.getElementById("hh_foodgroup1"+ i).innerHTML = data;
				//alert(data)
	            },
	         
	        });
			
	        });
	        });*/

	        
	$(".meal_plan_exchange1 ").on("focusout", function() {
		var i = $(this).data("menu_id");
		var ex = $("#ex0" + i).val();
		var const_ex = $("#const_ex0" + i).val();
		var hh_val = $("#hh_val0" + i).val();
		var qty = $("#qty0" + i).val();
		var foodgroup_content = $("#foodgroup_content0" + i).val();
		var const_ex_combination = $("#const_ex_combination0" + i).val();
		var hh_val = $("#hh_val0" + i).val();
		//var hh_foodgroup =  $("#hh_foodgroup1"+i).val();
		var decimal = /^\d{0,4}(\.\d{0,2})?$/;
		/*if(const_ex_combination== ''){
	if(ex == '' || !ex.match(decimal)){
	 	alert('Please enter exchange with atleast 2 decimal places.');
		$("#ex1"+i).val('');
		return false;
	 }
	 else{
	 	
		if (ex % 1 == 0) {
		document.getElementById("hh_val1"+i).value = Math.round((ex * const_ex)*10)/10;
		document.getElementById("hh_val_label1" +i).innerHTML = Math.round((ex * const_ex)*10)/10;
	}
		else{
		document.getElementById("hh_val1"+i).value =Math.round((ex * const_ex)*10)/10;
		document.getElementById("hh_val_label1"+i).innerHTML = fraction(Math.round((ex * const_ex)*10)/10); 
	}
		
		document.getElementById("hh_val_label1" +i).style.fontWeight="bold";
		
	 	document.getElementById("qty_val1"+i).value = Math.round((ex * qty)*10)/10;
		document.getElementById("qty_val_label1"+i).innerHTML = Math.round((ex * qty)*10)/10;
		document.getElementById("qty_val_label1"+i).style.fontWeight="bold";
	
	 }
	 }
	 else{
	 	
		arrayex= const_ex_combination.split(',');



aa = [];
a = [];

 for (ii=0;ii<arrayex.length;ii++){
    //sum+=parseInt(arrayex[i]);
	result = Math.round((ex * arrayex[ii])*10)/10;
	//alert(result);

	arr_result= $.makeArray(result);
	arr_result1= "("+$.makeArray(result)+")";
	
	a.push(arr_result1);	
	aa.push(arr_result);

	var arr_aa = aa.join(',');	
	var arr_aa1 = a.join('<br>');	

			}
			
	document.getElementById("hh_val_combination1"+i).value = arr_aa;
	document.getElementById("hh_val_label1"+i).innerHTML= arr_aa1;	//console.log(arr_aa);
	

	document.getElementById("hh_val_label1" +i).style.fontWeight="bold";
		
	 	document.getElementById("qty_val1"+i).value = Math.round((ex * qty)*10)/10;
		document.getElementById("qty_val_label1"+i).innerHTML = Math.round((ex * qty)*10)/10;
		document.getElementById("qty_val_label1"+i).style.fontWeight="bold";


	
	
	
	 }*/
		arrayex = const_ex.split(',');
		aa = [];
		a = [];
		for (ii = 0; ii < arrayex.length; ii++) {
			//sum+=parseInt(arrayex[i]);
			result = fraction(Math.round((ex * arrayex[ii]) * 10) / 10);
			//alert(result);
			arr_result = $.makeArray(result);
			arr_result1 = $.makeArray(result);
			a.push(arr_result1);
			aa.push(arr_result);
			var arr_aa = aa.join(',');
			var arr_aa1 = a.join('<br>');
		}
		$("#hh_val0" + i).val(arr_aa);
		$("#hh_val_label0" + i).html(arr_aa1);
		$("#hh_val_label0" + i).css("font-weight", "bold");
		arrayqtyval = qty.split(',');
		aa1 = [];
		a1 = [];
		for (ii = 0; ii < arrayqtyval.length; ii++) {
			//sum+=parseInt(arrayex[i]);
			result1 = Math.round((ex * arrayqtyval[ii]) * 10) / 10;
			//alert(result1);
			arr_result_hhval = $.makeArray(result1);
			arr_result1_hhval = $.makeArray(result1);
			a1.push(arr_result1_hhval);
			aa1.push(arr_result_hhval);
			var arr_aa_hhval = aa1.join(',');
			var arr_aa1_hhval = a1.join('<br>');
		}
		$("#qty_val0" + i).val(arr_aa_hhval);
		$("#qty_val_label0" + i).html(arr_aa1_hhval);
		$("#qty_val_label0" + i).css("font-weight", "bold");
		/*	document.getElementById("qty_val" + i).value = Math.round((ex * qty) * 10) / 10;
			$("#qty_val" + i).val(Math.round((ex * qty) * 10) / 10);
			$("#qty_val_label" + i).html(Math.round((ex * qty) * 10) / 10);*/
		$("#qty_val_label0" + i).css("font-weight", "bold");
		//}
	});
	$(function() {
		$("#edit_menu").dialog({
			autoOpen: false,
			title: '',
			resizable: false,
			modal: true,
			width: 400,
			create: function(event, ui) {
				// Set max-width
				$(this).parent().css("maxWidth", "600px");
			}
		});
		//$(".ui-dialog").addClass("ui-widget-header");
		$(".ui-dialog").addClass("ui-widget-content");
		$(".edit_menu").on("click", function(e) {
			e.preventDefault();
			var id = $(this).attr("id");
			var dataString = 'id=' + id;
			//var client_id= $("#client_id").val();
			//var appointment_id= $("#appointment_id").val();
			$.ajax({
				type: "GET",
				url: base_url + 'admin/help/edit_menu',
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
		$("#edit_default_meal").dialog({
			autoOpen: false,
			title: '',
			resizable: false,
			modal: true,
			width: 950,
			create: function(event, ui) {
				// Set max-width
				$(this).parent().css("maxWidth", "950px");
			}
		});
		//  $(".ui-dialog").addClass("ui-widget-header");
		$(".ui-dialog").addClass("ui-widget-content");
		$(".edit_default_meal").on("click", function(e) {
			e.preventDefault();
			var id = $(this).attr("id");
			var dataString = 'id=' + id;
			var meal_code = $(this).data("meal_code");
			var meal_id = $(this).data("meal_id");
			var menu_id = $(this).data("menu_id");
			var nutrition_id = $(this).data("nutrition_id");
			$.ajax({
				type: "GET",
				url: base_url + 'admin/help/edit_default_meal?nutrition_id=' + nutrition_id + '&meal_code=' + meal_code + '&meal_id=' + meal_id + '&menu_id=' + menu_id,
				data: dataString,
				success: function(res) {
					$("#edit_default_meal").html(res);
					$("#edit_default_meal").dialog("open");
					$('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
					$('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
				}
			});
		});
	});

	$(function() {
		$("#edit_default_menu").dialog({
			autoOpen: false,
			title: '',
			resizable: false,
			modal: true,
			width: 400,
			create: function(event, ui) {
				// Set max-width
				$(this).parent().css("maxWidth", "600px");
			}
		});
		//$(".ui-dialog").addClass("ui-widget-header");
		$(".ui-dialog").addClass("ui-widget-content");
		$(".edit_default_menu").on("click", function(e) {
			e.preventDefault();
			var id = $(this).attr("id");
			var dataString = 'id=' + id;
			//var client_id= $("#client_id").val();
			//var appointment_id= $("#appointment_id").val();
			$.ajax({
				type: "GET",
				url: base_url + 'admin/help/edit_default_menu',
				data: dataString,
				success: function(res) {
					$("#edit_default_menu").html(res);
					$("#edit_default_menu").dialog("open");
					$('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
					$('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
				}
			});
		});
	});
});
//convert a decimal into a fraction
//decimal to fraction
function HCF(u, v) {
	var U = u,
		V = v
	while (true) {
		if (!(U %= V)) return V
		if (!(V %= U)) return U
	}
}

function fraction(decimal) {
	if (!decimal) {
		decimal = this;
	}
	whole = String(decimal).split('.')[0];
	decimal = parseFloat("." + String(decimal).split('.')[1]);
	num = "1";
	for (z = 0; z < String(decimal).length - 2; z++) {
		num += "0";
	}
	decimal = decimal * num;
	num = parseInt(num);
	for (z = 2; z < decimal + 1; z++) {
		if (decimal % z == 0 && num % z == 0) {
			decimal = decimal / z;
			num = num / z;
			z = 2;
		}
	}
	//if format of fraction is xx/xxx
	if (decimal.toString().length == 2 && num.toString().length == 3) {
		//reduce by removing trailing 0's
		// '
		decimal = Math.round(Math.round(decimal) / 10);
		num = Math.round(Math.round(num) / 10);
	}
	//if format of fraction is xx/xx
	else if (decimal.toString().length == 2 && num.toString().length == 2) {
		decimal = Math.round(decimal / 10);
		num = Math.round(num / 10);
	}
	//get highest common factor to simplify
	var t = HCF(decimal, num);
	//return the fraction after simplifying it
	if (isNaN(whole) === true) {
		whole = "0";
	}
	if (isNaN(decimal) === true) {
		return ((whole == 0) ? "0" : whole);
	} else {
		return ((whole == 0) ? " " : whole + " ") + decimal / t + "/" + num / t;
	}
}