$(document).ready(function() {
	$('.exchange').each(function(index) {
		$(this).on("change", function() {
			limit();
			var i = $(this).attr("data");
			var ex_val = $("#ex" + i).val();
			var foodgroup_cho = $("#foodgroup_cho" + i).val();
			var foodgroup_pro = $("#foodgroup_pro" + i).val();
			var foodgroup_fat = $("#foodgroup_fat" + i).val();
			var decimal = /^\d{0,4}(\.\d{0,2})?$/;
			$("#save_div").html('');
			$("#tot" + i).html('Not Complete');
			if (ex_val == 0 || ex_val == '') {
				$("#tot" + i).html(' Complete');
				//$("#save_div").show();
				$("#bfast" + i).prop('disabled', true);
				$("#am_snack" + i).prop('disabled', true);
				$("#lunch" + i).prop('disabled', true);
				$("#pm_snack" + i).prop('disabled', true);
				$("#bfast" + i).prop('disabled', true);
				$("#dinner" + i).prop('disabled', true);
				$("#mn_snack" + i).prop('disabled', true);
				$("#bfast" + i).val('0');
				$("#am_snack" + i).val('0');
				$("#lunch" + i).val('0');
				$("#pm_snack" + i).val('0');
				$("#dinner" + i).val('0');
				$("#mn_snack" + i).val('0');
				$("#fel_cho" + i).val('0');
				$("#fel_cho_label" + i).html('0');
				$("#fel_pro" + i).val('0');
				$("#fel_pro_label" + i).html('0');
				$("#fel_fat" + i).val('0');
				$("#fel_fat_label" + i).html('0');
				$("#fel_cal" + i).val('0');
				$("#fel_cal_label" + i).html('0');
				fel_rating();
			} else {
				$("#bfast" + i).prop('disabled', false);
				$("#am_snack" + i).prop('disabled', false);
				$("#lunch" + i).prop('disabled', false);
				$("#pm_snack" + i).prop('disabled', false);
				$("#bfast" + i).prop('disabled', false);
				$("#dinner" + i).prop('disabled', false);
				$("#mn_snack" + i).prop('disabled', false);
				if (!ex_val.match(decimal)) {
					alert('Please enter positive numbers only.');
					$("#ex" + i).val('0');
					$("#fel_cho" + i).val('0');
					$("#fel_cho_label" + i).html('0');
					$("#fel_pro" + i).val('0');
					$("#fel_pro_label" + i).html('0');
					$("#fel_fat" + i).val('0');
					$("#fel_fat_label" + i).html('0');
					$("#fel_cal" + i).val('0');
					$("#fel_cal_label" + i).html('0');
					return false;
				} else {
					if (i == 1) {
						if (ex_val == 1) {
							//alert('Not valid.');
							$("#fel_cho" + i).val('0');
							$("#fel_cho_label" + i).html('0');
							$("#fel_pro" + i).val('0');
							$("#fel_pro_label" + i).html('0');
							$("#fel_fat" + i).val('0');
							$("#fel_fat_label" + i).html('0');
							$("#fel_cal" + i).val('0');
							$("#fel_cal_label" + i).html('0');
							fel_rating();
						} else {
							var cho = Math.floor((ex_val * foodgroup_cho) / 2);
							$("#fel_cho" + i).val(cho);
							$("#fel_cho_label" + i).html(cho);
							var pro = Math.floor((ex_val * 1) / 2);
							$("#fel_pro" + i).val(pro);
							$("#fel_pro_label" + i).html(pro);
							var fat = 0;
							$("#fel_fat" + i).val(fat);
							$("#fel_fat_label" + i).html(fat);
							var cal = Math.round((cho * 4) + pro * 4) + fat * 9;
							$("#fel_cal" + i).val(cal);
							$("#fel_cal_label" + i).html(cal);
							fel_rating();
						}
					} else {
						var cho = Math.round(ex_val * foodgroup_cho);
						$("#fel_cho" + i).val(cho);
						$("#fel_cho_label" + i).html(cho);
						var pro = Math.round(ex_val * foodgroup_pro);
						$("#fel_pro" + i).val(pro);
						$("#fel_pro_label" + i).html(pro);
						var fat = Math.round(ex_val * foodgroup_fat);
						$("#fel_fat" + i).val(fat);
						$("#fel_fat_label" + i).html(fat);
						var cal = Math.round((cho * 4) + pro * 4) + fat * 9;
						$("#fel_cal" + i).val(cal);
						$("#fel_cal_label" + i).html(cal);
						fel_rating();
					}
					fel_rating();
					/*var rating_carbo= document.getElementById("rating_carbo").value;
	var rating_pro=document.getElementById("rating_pro").value;
	var rating_fat=document.getElementById("rating_fat").value;
	var rating_cal=document.getElementById("rating_cal").value;
		if(rating_carbo == 'Good' || rating_pro == 'Good'|| rating_fat == 'Good' || rating_cal == 'Good' ){
	var bfast= document.getElementsByName("bfast[]");
		for(var i=1; i<=bfast.length; i++) {	
		document.getElementById("bfast"+i).disabled= false;
		document.getElementById("am_snack"+i).disabled= false;
		document.getElementById("lunch"+i).disabled= false;
		document.getElementById("pm_snack"+i).disabled= false;
		document.getElementById("dinner"+i).disabled= false;
		document.getElementById("mn_snack"+i).disabled= false;
		}
		}
		else{
			var bfast= document.getElementsByName("bfast[]");
		for(var i=1; i<=bfast.length; i++) {	
		document.getElementById("bfast"+i).disabled= true;
		document.getElementById("am_snack"+i).disabled= true;
		document.getElementById("lunch"+i).disabled= true;
		document.getElementById("pm_snack"+i).disabled= true;
		document.getElementById("dinner"+i).disabled= true;
		document.getElementById("mn_snack"+i).disabled=true;
			}
		}*/
				}
			}
		});
	});
	$('.dstr_exchange').each(function(index) {
		$(this).on("change", function() {
			limit();
			var i = $(this).attr("data");
			var ex_val = $("#ex" + i).val();
			var bfast = $("#bfast" + i).val();
			var am = $("#am_snack" + i).val();
			var lunch = $("#lunch" + i).val();
			var pm = $("#pm_snack" + i).val();
			var dinner = $("#dinner" + i).val();
			var mn_snack = $("#mn_snack" + i).val();
			var cho_total = $("#fel_cho_total").val();
			var pro_total = $("#fel_pro_total").val();
			var fat_total = $("#fel_fat_total").val();
			var cal_total = $("#fel_cal_total").val();
			/*$("#fel_cho_total").val(cho_total);
			$("#fel_cho_total_label").html(cho_total);
			$("#fel_pro_total").val(pro_total);
			$("#fel_pro_total_label").html(pro_total);
			$("#fel_fat_total").val(fat_total);
			$("#fel_fat_total_label").html(fat_total);
			$("#fel_cal_total").val(cal_total);
			$("#fel_cal_total_label").html(cal_total);*/
			$("#save_div").html('');
			$("#update_div").html('');
			//alert(bfast);
			//alert(ex_val);
			totalex = Number(bfast) + Number(am) + Number(lunch) + Number(pm) + Number(dinner) + Number(mn_snack);
			var total_ex1 = 0;
			var total_meal = 0;
			var ex = document.getElementsByName("ex[]");
			var bfast = document.getElementsByName("bfast[]");
			var am = document.getElementsByName("am_snack[]");
			var lunch = document.getElementsByName("lunch[]");
			var pm = document.getElementsByName("pm_snack[]");
			var dinner = document.getElementsByName("dinner[]");
			var mn_snack = document.getElementsByName("mn_snack[]");
			for (var ii = 0; ii < ex.length; ii++) {
				total_ex1 += Number(ex[ii].value);
				total_meal += Number(bfast[ii].value) + Number(am[ii].value) + Number(lunch[ii].value) + Number(pm[ii].value) + Number(dinner[ii].value) + Number(mn_snack[ii].value);
			}
			//change || to && 
			/* if(  total_ex1 == total_meal || rating_cho == 'Good' && rating_pro == 'Good'&& rating_fat == 'Good' && rating_cal == 'Good' ){
		//document.getElementById("tot"+i).innerHTML= "Complete";
		//document.getElementById("tot"+i).innerHTML= totalex;
		//document.getElementById("tot"+i).style.color="#33CC33";
		//document.getElementById("tot"+i).innerHTML= "Complete";
		//document.getElementById("save_div").style.display= 'block';
		//$("#tot"+i).html('<font color="#33CC33">Complete</font>');
		$("#save_div").show();	
		/*else if(totalex == ex_val){
		//$("#tot"+i).html('<font color="#33CC33">Complete</font>');
		$("#tot"+i).html('<font color="#33CC33">Complete</font>');	
		}
		else {
		$("#save_div").hide();
		}*/
			//$("#save_div").show();
			//}*/
			if (totalex == ex_val) {
				if (total_ex1 == total_meal || cho_total >= cho_lower && cho_total <= cho_upper || pro_total >= pro_lower && pro_total <= pro_upper || fat_total >= fat_lower && fat_total <= fat_upper || cal_total >= cal_lower && cal_total <= cal_upper) {
					$("#save_div").html('<button id=\"save_fel\" class=\"btn btn-success btn-lg\"  > Save and Continue <span class="glyphicon glyphicon-chevron-right"></span></button> ');
					$("#update_div").html('<button id=\"update_fel\" class=\"btn btn-success btn-lg\"  > Update and Continue <span class="glyphicon glyphicon-chevron-right"></span></button> ');
					//$("#save_div").focus();
				}
				$("#tot" + i).html('<font color="#33CC33">Complete</font>');
			} else if (totalex > ex_val) {
				$("#tot" + i).html('<font color="#ff0000">Excess</font>');
				$("#save_div").html('');
				$("#update_div").html('');
			} else {
				$("#tot" + i).html('<font color="#ff0000">Not Complete</font>');
				$("#save_div").html('');
				$("#update_div").html('');
			}
		});
	});



	

	
});