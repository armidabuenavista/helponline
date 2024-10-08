
$(document).ready(function() {

 setInterval(function(){$("#site_count").load(base_url+'admin/help/site_count')},1000);
 setInterval(function(){$("#appointments_count").load(base_url+'admin/help/appointments_count')},1000);
 setInterval(function(){$("#pendings_count").load(base_url+'admin/help/pendings_count')},1000);
 setInterval(function(){$("#users_count").load(base_url+'admin/help/users_count')},1000);
   $(function() {
    $("#site_stats").dialog({
        autoOpen: false,
        title: '',
        resizable: false,
        modal: true,
        width: 900,
        create: function (event, ui) {
        // Set max-width
            $(this).parent().css("maxWidth", "950px");
    },
    });
    //$(".ui-dialog").addClass("ui-widget-header");
    $(".ui-dialog").addClass("ui-widget-content");
    $("#stats").on("click", function(e) {
        e.preventDefault();
       
        //var client_id= document.getElementById("client_id").value;
        $.ajax({
            type: "GET",
            url:  base_url+'admin/help/site_graph',
         //   data: dataString,
            success: function(res) {
                $("#site_stats").html(res);
                $("#site_stats").dialog("open");
                $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only'); 
                $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');


            }
        });
    });
});



$(function() {
    $("#site_stats").dialog({
        autoOpen: false,
        title: '',
        resizable: false,
        modal: true,
        width: 700,
        create: function (event, ui) {
        // Set max-width
            $(this).parent().css("maxWidth", "750px");
    },
    });
    //$(".ui-dialog").addClass("ui-widget-header");
    $(".ui-dialog").addClass("ui-widget-content");
    $(document).on("click","#page_stats", function(e) {
        e.preventDefault();
       
        //var client_id= document.getElementById("client_id").value;
        $.ajax({
            type: "GET",
            url:  base_url+'admin/help/page_graph',
         //   data: dataString,
            success: function(res) {
                $("#site_stats").html(res);
                $("#site_stats").dialog("open");
               $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only'); 
                $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');


            }
        });
    });
});

$(function() {
    $("#site_stats").dialog({
        autoOpen: false,
        title: '',
        resizable: false,
        modal: true,
        width: 700,
        create: function (event, ui) {
        // Set max-width
            $(this).parent().css("maxWidth", "750px");
    },
    });
    //$(".ui-dialog").addClass("ui-widget-header");
    $(".ui-dialog").addClass("ui-widget-content");
    $(document).on("click","#appointment_stats", function(e) {
        e.preventDefault();
       
        //var client_id= document.getElementById("client_id").value;
        $.ajax({
            type: "GET",
            url:  base_url+'admin/help/appointment_graph',
         //   data: dataString,
            success: function(res) {
                $("#site_stats").html(res);
                $("#site_stats").dialog("open");
               $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only'); 
                $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');


            }
        });
    });
});

$(function() {
    $("#site_stats").dialog({
        autoOpen: false,
        title: '',
        resizable: false,
        modal: true,
        width: 700,
        create: function (event, ui) {
        // Set max-width
            $(this).parent().css("maxWidth", "750px");
    },
    });
    //$(".ui-dialog").addClass("ui-widget-header");
    $(".ui-dialog").addClass("ui-widget-content");
    $(document).on("click","#users_stats", function(e) {
        e.preventDefault();
       
        //var client_id= document.getElementById("client_id").value;
        $.ajax({
            type: "GET",
            url:  base_url+'admin/help/users_graph',
         //   data: dataString,
            success: function(res) {
                $("#site_stats").html(res);
                $("#site_stats").dialog("open");
               $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only'); 
                $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');


            }
        });
    });
});




	//window.onload= mini_calendar;
	$('#requests').dataTable({
		"aaSorting": [],
	});
	$.ajax({
		url: base_url + 'admin/help/get_event_dates',
		method: "GET",
		success: function(retrieved_data) {
			$("#calendar").datepicker({
				dateFormat: 'yy-mm-dd',
				changeMonth: true,
				changeYear: true,
				showButtonPanel: true,
				//beforeShowDay: event_dates,
				onSelect: function(date) {
					//defined your own method here
					//datepick").val(date);
					$(".add_event").attr("id", date);
					getdate(date);
				},
				beforeShowDay: function(date) {
					// Your code here.. use something like this
					Obj = retrieved_data;
					var myBadDates = Obj;
					var $return = true;
					var $returnclass = "available";
					$checkdate = $.datepicker.formatDate('yy-mm-dd', date);
					// start loop
					for (var x in myBadDates) {
						$myBadDates = new Array(myBadDates[x]['event_date']);
						for (var i = 0; i < $myBadDates.length; i++)
						//console.log(myBadDates[x]['whole_day']);
							if ($myBadDates[i] == $checkdate) {
							//console.log($myBadDates[i]);
							$return = false;
							if (myBadDates[x]['whole_day'] == 1 && myBadDates[x]['all_rnd'] == 1) {
								$returnclass = "unavailable";
								return [true, 'unavailable', event.text];
							} else {
								$returnclass = "unavailable";
								return [true, 'ui-state-highlight', event.text];
							}
						}
					}
					//end loop
					return [$return, $returnclass];
				}
			});
			//console.log(Obj);
		}
	});
	$('#previous_records').dataTable({
		"aaSorting": []
	});
	$(function() {
		$("#requestdialog").dialog({
			autoOpen: false,
			resizable: false,
			modal: true,
			width: 600,
			create: function(event, ui) {
					// Set max-width
					$(this).parent().css("maxWidth", "600px");
				}
				//close: function(ev, ui) { window.location.reload() }			
		});
		//$(".ui-dialog").addClass("ui-widget-header");
		$(".ui-dialog").addClass("ui-widget-content");
		$(document).on('click', '.client_request', function(e) {
			e.preventDefault();
			var appointment_id = $(this).attr("data-appointment_id");
			var dataString = 'appointment_id=' + appointment_id;
			$.ajax({
				type: "GET",
				url: base_url + 'admin/help/client_request',
				data: dataString,
				success: function(res) {
					$("#requestdialog").html(res);
					$("#requestdialog").dialog("open");
					$('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
					$('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
				}
			});
		});
	});

	$(document).on("click", "#confirm_appointment", function() {
		var client_id = $("#client_id").val();
		var appointment_id = $("#appointment_id").val();
		var name = $("#name").data("name");
		var email = $("#email_address").val();
		//var no_person=$("#no_of_person").val();
		var datepick = $("#datepick").val();
		var whole_day = $("#whole_day").val();
		var timepick1 = $("#timepick1").val();
		var timepick2 = $("#timepick2").val();
		var event_type = $("#event_type").val();
		var rnd = $("#rnd").val();
		var status = $("#status").val();
		var remarks = $("#remarks").val();
		var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		var dateformat = /^\d{4}-\d{1,2}-\d{1,2}$/;
		var time_format = /^[01]?\d:[0-5]\d( (am|pm))?$/i;
		if (client_id == '' || isNaN(client_id)) {
			alert('Please enter client_id.');
			return false;
		} else if (appointment_id == '' || isNaN(appointment_id)) {
			alert('Please enter appointment_id.');
			return false;
		} else if (datepick == '' || !datepick.match(dateformat)) {
			alert("Please enter correct date format.");
			$("#datepick").focus();
			$("#datepick").val('');
			return false;
		} else if (document.getElementById("whole_day").checked == false && !timepick1.match(time_format) || !timepick2.match(time_format)) {
			alert("Please enter correct time format.");
			//$("#timepick1").focus();
			//$("#timepick1").val('');
			return false;
		} else if (rnd == 0) {
			alert('Please select RND.');
			$("#rnd").focus();
			return false;
		} else if (document.getElementById("status").checked == false || status == '' || status == 0) {
			alert("Please confirm appointment.");
			$("#status").focus();
			return false;
		} else if (!email.match(emailformat) || email == '') {
			alert("Please enter a valid email address.");
			$("#email").focus();
			return false;
		} else {
			$.ajax({
				type: "POST",
				url: base_url + 'admin/help/save_request',
				data: "client_id=" + client_id + "&appointment_id=" + appointment_id + "&name=" + name + "&email_address=" + email + "&datepick=" + datepick + "&whole_day=" + whole_day + "&timepick1=" + timepick1 + "&timepick2=" + timepick2 + "&event_type=" + event_type + "&rnd=" + rnd + "&status=" + status + "&remarks=" + remarks,
				success: function(data) {
					alert(data);
					//alert(data);
					//window.location='pending_requests_db.php';
					/*alert(html);
			window.location='pending_requests_db.php';
			$("#alert").html('');
			$('#alert').removeClass('alert alert-success');
			$("#alert").focus();*/
					setTimeout("location.reload(true);", 1000);
					/*if (html == 'success') {
						alert('Email sent. You have successfully scheduled an appointment.');
						$("#alert").focus();
						window.location = 'confirmed_requests_db.php';
					} else if (html == 'error') {
						alert('RND/ Time and date not available. Please select another day.');
						$("#alert").focus();
					} else {
						alert('Error: Something is wrong when saving the data.');
						$("#alert").focus();
					}*/
				},
				beforeSend: function() {
					$("#alert").show();
					$("#alert").focus();
				}
			});
		}
	});



 $(document).on("click", "#edit_appointment", function() {
		var appointment_id = $("#appointment_id").val();
		//var name = $("#name").data("name");
		//var email = $("#email_address").val();
		var datepick = $("#datepick").val();
		//var whole_day_check = $("#whole_day").prop('checked');
		var whole_day = $("#whole_day").val();
		var timepick1 = $("#timepick1").val();
		var timepick2 = $("#timepick2").val();
		var event_type = $("#event_type").val();
		var rnd = $("#rnd").val();
		var status = $("#status").val();
		var remarks = $("#remarks").val();
		var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		var dateformat = /^\d{4}-\d{1,2}-\d{1,2}$/;
		var time_format = /^[01]?\d:[0-5]\d( (am|pm))?$/i;
		if (appointment_id == '' || isNaN(appointment_id)) {
			alert('Please enter appointment_id.');
			return false;
		} else if (datepick == '' || !datepick.match(dateformat)) {
			alert("Please enter correct date format.");
			document.getElementById("datepick").focus();
			$("#datepick").val('');
			$("#datepick").focus();
			return false;
		} else if (document.getElementById("whole_day").checked == false && !timepick1.match(time_format)) {
			alert("Please enter correct time format.");
			document.getElementById("timepick1").focus();
			$("#timepick1").val('');
			$("#timepick1").focus();
			return false;
		} else if (rnd == 0) {
			alert('Please select RND.');
			$("#rnd").focus();
			return false;
		} else if (document.getElementById("status").checked == false || status == '' || status == 0) {
			alert("Please confirm appointment.");
			$("#status").focus();
			return false;
		}
		/* else if (!email.match(emailformat) || email == '') {
					alert("Please enter a valid email address.");
					$("#email").focus();
					return false;
				}*/
		else {
			//alert(rnd);
			$.ajax({
				type: "POST",
				url: base_url + 'admin/help/update_request',
				data: "appointment_id=" + appointment_id + "&datepick=" + datepick + "&whole_day=" + whole_day + "&timepick1=" + timepick1 + "&timepick2=" + timepick2 + "&event_type=" + event_type + "&rnd=" + rnd + "&status=" + status + "&remarks=" + remarks,
				success: function(html) {
					//alert(data);
					if (html == 'success') {
						$("#alert").html("Appointment successfully updated.");
						$('#alert').addClass('alert alert-success');
						setTimeout("location.reload(true);", 3000);
						$("#alert").focus();
					} else if (html == 'error') {
						$("#alert").html("RND/ Time and Date not available. Please select other date and time. Thank you.");
						$('#alert').addClass('alert alert-danger');
						$("#alert").focus();
						//setTimeout("location.reload(true);", 1000);
					} else {
						$("#alert").html("Error: Something is wrong when saving the data.");
						$('#alert').addClass('alert alert-danger');
						$("#alert").focus();
					}
				},
				beforeSend: function() {
					//$("#alert").html("Loading...");
					//$("#alert").addClass('alert alert-success');
					$("#alert").show();
					$("#alert").focus();
				}
			});
		}
	});



	$(document).on("focus", 'input[type="text"]', function() {
		$(this).removeClass("error");
	});
	$(document).on("click", "#add_user", function() {
		var valid_email = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		//var valid_username=  /^[a-zA-Z0-9]+$/;
		var dateformat = /^\d{4}-\d{1,2}-\d{1,2}$/;
		//var user_id = $("#user_id").val();
		var user_id = $("#user_id").val();
		var lname = $("#lname").val();
		var fname = $("#fname").val();
		var mname = $("#mname").val();
		var extn = $("#extn").val();
		var gender = $("#gender").val();
		var birthday = $("#birthday").val();
		//var age =$("#age").val();
		var address = $("#address").val();
		var contact_no = $("#contact_no").val();
		var email_address = $("#email_address").val();
		var username = $("#username").val();
		var password = $("#password").val();
		var cnf_password = $("#cnf_password").val();
		var user_type = $("#user_type").val();
		if (lname == '' || lname.length <= 1) {
			$("#alert").html("Please enter last name. Last name must contain more than one character. Last name must not contain special characters and numbers.");
			$('#alert').addClass('alert alert-danger');
			$("#lname").addClass("error");
			$("#alert").focus();
			return false;
		} else if (fname == '' || fname.length <= 1) {
			$("#alert").html("Please enter first name. First name must contain more than one character. First name must not contain special characters and numbers.");
			$('#alert').addClass('alert alert-danger');
			$("#fname").addClass("error");
			$("#alert").focus();
			return false;
		} else if (mname == '' || mname.length <= 1) {
			$("#alert").html("Please enter middle name. Middle name must contain more than one character. Middle name must not contain special characters and numbers.");
			$('#alert').addClass('alert alert-danger');
			$("#mname").addClass("error");
			$("#alert").focus();
			return false;
		} else if (birthday == '' || !dateformat.test(birthday)) {
			$("#alert").html("Please enter date of birth in this format YYYY-MM-DD.");
			$('#alert').addClass('alert alert-danger');
			$("#birthday").addClass("error");
			$("#alert").focus();
			return false;
		} else if (address == '') {
			$("#alert").html("Please enter address.");
			$('#alert').addClass('alert alert-danger');
			$("#address").addClass("error");
			$("#alert").focus();
			return false;
		} else if (contact_no == '') {
			$("#alert").html("Please enter contact number.");
			$('#alert').addClass('alert alert-danger');
			$("#contact_no").addClass("error");
			$("#alert").focus();
			return false;
		} else if (email_address == '' || !valid_email.test(email_address)) {
			$("#alert").html("Please enter a valid email address.");
			$('#alert').addClass('alert alert-danger');
			$("#email_address").addClass("error");
			$("#alert").focus();
			return false;
		} else if (username == '' || username.length <= 1) {
			$("#alert").html("Please enter username. Username must be more than one character. Username must not contain special characters.");
			$('#alert').addClass('alert alert-danger');
			$("#username").addClass("error");
			$("#alert").focus();
			return false;
		} else if (password == '' || password.length <= 1) {
			$("#alert").html("Please enter password. Password must be more than one character.");
			$('#alert').addClass('alert alert-danger');
			$("#password").addClass("error");
			$("#alert").focus();
			return false;
		} else if (cnf_password == '' || cnf_password.length <= 1) {
			$("#alert").html("Please confirm password. Password must be more than one character.");
			$('#alert').addClass('alert alert-danger');
			$("#cnf_password").addClass("error");
			$("#alert").focus();
			return false;
		} else if (password != cnf_password) {
			$("#alert").html("Password dont match!.");
			$("#cnf_password").addClass("error");
			$("#password").addClass("error");
			$('#alert').addClass('alert alert-danger');
			$("#alert").focus();
			return false;
		} else if (user_type == 0) {
			$("#alert").html("Please select privilege.");
			$('#alert').addClass('alert alert-danger');
			$("#alert").focus();
		} else {
			$.ajax({
				type: "POST",
				url: "save_user.php",
				data: "user_id=" + user_id + "&lname=" + lname + "&fname=" + fname + "&mname=" + mname + "&extn=" + extn + "&gender=" + gender + "&birthday=" + birthday + "&address=" + address + "&contact_no=" + contact_no + "&email_address=" + email_address + "&username=" + username + "&password=" + password + "&cnf_password=" + cnf_password + "&user_type=" + user_type,
				success: function(html) {
					if (html == 'success') {
						$('#alert').removeClass('alert alert-danger');
						$("#alert").html("User successfully registered.");
						$('#alert').addClass('alert alert-success');
						$("#alert").focus();
						setTimeout("location.reload(true);", 3000);
					} else if (html == 'error') {
						$("#alert").html("User already exists!");
						$('#alert').addClass('alert alert-danger');
						$("#username").addClass('error');
						$("#alert").focus();
					} else if (html == 'error1') {
						$("#alert").html("Email address already used!");
						$('#alert').addClass('alert alert-danger');
						$("#email_address").addClass('error');
						$("#alert").focus();
					} else if (html == 'error2') {
						$("#alert").html("Username already used. Please use another one.");
						$('#alert').addClass('alert alert-danger');
						$('#username').addClass('error');
						$("#alert").focus();
					} else {
						$("#alert").html("Error: Something is wrong when saving the data.");
						$('#alert').addClass('alert alert-danger');
						$("#alert").focus();
					}
				},
				beforeSend: function() {
					$("#alert").html("Loading...");
					$('#alert').addClass('alert alert-success');
				}
			});
		}
		return false;
	});
	$(function() {
		$('#users_acct tbody').on('click', '.delete_user', function() {
			var id = $(this).attr("id");
			var dataString = 'id=' + id;
			var parent = $(this).closest("tr");
			var answer = confirm("Are you sure you want to delete from the database?");
			if (answer) {
				$.ajax({
					type: "POST",
					url: "delete_user.php",
					data: dataString,
					cache: false,
					beforeSend: function() {
						parent.animate({
							'backgroundColor': '#fb6c6c'
						}, 300).animate({
							opacity: 0.35
						}, "slow");;
					},
					success: function() {
						parent.slideUp('slow', function() {
							$(this).remove();
						});
						setTimeout("location.reload(true);", 1000);
					}
				});
			} else {
				return false;
			}
			return false;
		});
	});

	
	//$("#whole_day").click(function(){
	$("#whole_day").prop('checked', false);
	$("#whole_day_div").show();
	$("#timepick1").prop('disabled', false);
	$(document).on("click", "#whole_day", function() {
		if (document.getElementById("whole_day").checked == true) {
			$("#whole_day_div").hide();
			$("#timepick1").prop('disabled', true);
			$("#whole_day").val('1');
			$("#timepick1").val('');
			$("#timepick2").val('');
		} else {
			$("#whole_day_div").show();
			$("#timepick1").prop('disabled', false);
			$("#whole_day").val('0');
			$("#timepick1").val('');
			$("#timepick2").val('');
		}
	});
	$(document).on("click", "#status", function() {
		if (document.getElementById("status").checked == true) {
			$("#status").val('1');
		} else {
			$("#status").val('0');
		}
	});
	$(document).on("change", "#event_type", function() {
		var event_type = $("#event_type").val();
		if (event_type == 4) {
			$("#custom_div").show();
			$("#custom_event").prop('disabled', false);
		} else {
			$("#custom_div").hide();
			$("#custom_event").prop('disabled', true);
			$("#custom_event").val('');
		}
	});
	$(document).on("change", '#type', function() {
		var type = $(this).val();
		if (type == 1) {
			$("#no_of_person_div").hide();
			$("#no_of_person").val('');
			//$('#no_of_person option[value="1"]').attr('selected', true);
		} else if (type == 2) {
			$("#no_of_person_div").show();
			$("#no_of_person").val();
			//$('#no_of_person option[value="1"]').attr('selected', true);
		} else {
			$("#no_of_person_div").hide();
			$("#no_of_person").val();
			//$('#no_of_person option[value="0"]').attr('selected', true);
		}
	});
	$("#timepick1").timepicker({
		timeFormat: 'h:mm TT',
		hourMin: 8,
		hourMax: 17
	});

	$("#timepick2").timepicker({
	timeFormat: 'h:mm TT',
	hourMin: 8,
	hourMax: 17
	});

	$.ajax({
    url:base_url+'admin/help/get_event_dates',
 
    method:"GET",
	 
    success:function(retrieved_data){
  
	$("#datepick").datepicker({
dateFormat: 'yy-mm-dd',
//beforeShowDay: event_dates,

beforeShowDay: function (date){
                            // Your code here.. use something like this
         Obj = retrieved_data;


	 
	var myBadDates = Obj;
	var $return = true;
	var $returnclass = "available";
	$checkdate = $.datepicker.formatDate('yy-mm-dd', date);
	// start loop
	for (var x in myBadDates) {
		$myBadDates = new Array(myBadDates[x]['event_date']);
		for (var i = 0; i < $myBadDates.length; i++)
//console.log(myBadDates[x]['whole_day']);
			if ($myBadDates[i] == $checkdate) {
				//console.log($myBadDates[i]);
				$return = false;

				if(myBadDates[x]['whole_day'] == 1 && myBadDates[x]['all_rnd'] == 1){
						$returnclass = "unavailable";
						return [ true, 'unavailable', event.text ];
				}else{
						$returnclass = "unavailable";
						return [ true, 'ui-state-highlight', event.text ];
				}
			
				
			}
	}
	//end loop
	return [$return, $returnclass];

                        }


});


//console.log(Obj);
    }
});


	$(function() {
		$("#event_dialog").dialog({
			autoOpen: false,
			title: '',
			resizable: false,
			modal: true,
			width: 800,
			create: function(event, ui) {
				// Set max-width
				$(this).parent().css("maxWidth", "800px");
			}
		});
		//$(".ui-dialog").addClass("ui-widget-header");
		$(".ui-dialog").addClass("ui-widget-content");
		$(document).on('click', '.add_event', function(e) {
			e.preventDefault();
			var id = $(this).attr("id");
			var dataString = 'id=' + id;
			$.ajax({
				type: "GET",
				url: base_url + 'admin/help/add_event',
				data: dataString,
				success: function(res) {
					$("#event_dialog").html(res);
					$("#event_dialog").dialog("open");
					$('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
					$('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
				}
			});
		});
	});
	$(function() {
		$("#event_dialog").dialog({
			autoOpen: false,
			title: '',
			resizable: false,
			modal: true,
			width: 500,
			create: function(event, ui) {
				// Set max-width
				$(this).parent().css("maxWidth", "500px");
			}
		});
		//$(".ui-dialog").addClass("ui-widget-header");
		$(".ui-dialog").addClass("ui-widget-content");
		$(document).on('click', '.edit_event', function(e) {
			e.preventDefault();
			var id = $(this).attr("id");
			var dataString = 'id=' + id;
			$.ajax({
				type: "GET",
				url: base_url + 'admin/help/edit_event',
				data: dataString,
				success: function(res) {
					$("#event_dialog").html(res);
					$("#event_dialog").dialog("open");
					$('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
					$('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
				}
			});
		});
	});
	$(function() {
		$("#event_dialog").dialog({
			autoOpen: false,
			title: '',
			resizable: false,
			modal: true,
			width: 500,
			create: function(event, ui) {
				// Set max-width
				$(this).parent().css("maxWidth", "500px");
			}
		});
		//$(".ui-dialog").addClass("ui-widget-header");
		$(".ui-dialog").addClass("ui-widget-content");
		$(document).on('click', '.edit_request', function(e) {
			e.preventDefault();
			var id = $(this).attr("id");
			var dataString = 'id=' + id;
			$.ajax({
				type: "GET",
				url: base_url + 'admin/help/edit_request',
				data: dataString,
				success: function(res) {
					$("#event_dialog").html(res);
					$("#event_dialog").dialog("open");
					$('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
					$('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
				}
			});
		});
	});
	$(document).on("click", "#all_rnd", function() {
		if (document.getElementById("all_rnd").checked == true) {
			$("#select_rnd_div").hide();
			$("#select_rnd").prop('disabled', true);
			//$("input").prop('disabled', false);
			$("#select_rnd").val('0');
			$("#all_rnd").val('1');
		} else {
			$("#select_rnd_div").show();
			$("#select_rnd").prop('disabled', false);
			$("#all_rnd").val('0');
		}
	});
	$(document).on("change", "#select_rnd", function() {
		$("#all_rnd").attr('checked', false);
		$("#all_rnd").val('0');
	});
	$('#users_acct').dataTable({
		"aaSorting": [],
		stateSave: true,
	});
	$(document).on("click", "#add_appointment", function() {
		var client_id = $("#client_id").val();
		var appointment_id = $("#appointment_id").val();
		var email = $("#email_address").val();
		//var no_person=$("#no_of_person").val();
		var datepick = $("#datepick").val();
		var whole_day = $("#whole_day").val();
		var timepick1 = $("#timepick1").val();
		var rnd = $("#rnd").val();
		var status = $("#status").val();
		var remarks = $("#remarks").val();
		var dateformat = /^\d{4}-\d{1,2}-\d{1,2}$/;
		var time_format = /^[01]?\d:[0-5]\d( (am|pm))?$/i;
		if (client_id == '' || isNaN(client_id)) {
			alert('Please enter client_id.');
			return false;
		} else if (appointment_id == '' || isNaN(appointment_id)) {
			alert('Please enter appointment_id.');
			return false;
		} else if (datepick == '' || !datepick.match(dateformat)) {
			alert("Please enter correct date format.");
			document.getElementById("datepick").focus();
			$("#datepick").val('');
			$("#datepick").focus();
			return false;
		} else if (document.getElementById("whole_day").checked == false && !timepick1.match(time_format)) {
			alert("Please enter correct time format.");
			document.getElementById("timepick1").focus();
			$("#timepick1").val('');
			$("#timepick1").focus();
			return false;
		} else if (rnd == 0) {
			alert('Please select RND.');
			$("#rnd").focus();
			return false;
		} else if (document.getElementById("status").checked == false || status == '' || status == 0) {
			alert("Please confirm appointment.");
			$("#status").focus();
			return false;
		} else {
			$.ajax({
				type: "POST",
				url: "save_appointment.php",
				data: "client_id=" + client_id + "&appointment_id=" + appointment_id + "&datepick=" + datepick + "&whole_day=" + whole_day + "&timepick1=" + timepick1 + "&rnd=" + rnd + "&status=" + status + "&remarks=" + remarks,
				success: function(html) {
					if (html == 'success') {
						$("#alert").html("Appointment successfully saved.");
						$("#alert").addClass('alert alert-success');
						$("#alert").focus();
						setTimeout("location.reload(true);", 3000);
						//window.location = 'confirmed_requests.php';
					} else {
						$("#alert").html("Error: Something is wrong when saving the data.");
						$("#alert").addClass('alert alert-danger');
						$("#alert").focus();
					}
					//alert(data);
					//window.location = 'clients_acct.php';
					//$("#alert").removeClass('alert alert-success');
					//$("#alert").html('');
				},
				beforeSend: function() {
					$("#alert").html("Loading...");
					$("#alert").addClass('alert alert-success');
					$("#alert").focus();
				}
			});
		}
	});
	$(document).on("click", "#save_anthrop", function() {
		var decimal = /^\d{0,4}(\.\d{0,2})?$/;
		var wt = $("#wt").val();
		var wt_opt = $("#wt_opt").val();
		var ht = $("#ht").val();
		var ht_ft = $("#ht_ft").val();
		var ht_in = $("#ht_in").val();
		var bmi = $("#bmi_label").data("bmi");
		var bmi_class = $("#bmi_label").data("bmi_class");
		var dbw = $("#dbw").val();
		var dbw_opt = $("#dbw_opt").val();
		var lower_limit = $("#lower_limit").val();
		var upper_limit = $("#upper_limit").val();
		var limit_opt = $("#limit_opt").val();
		var wc = $("#wc").val();
		var wc_opt = $("#wc_opt").val();
		var risk_indicator = $("#risk_indicator_label").data("risk_indicator");
		var hc = $("#hc").val();
		var hc_opt = $("#hc_opt").val();
		var whipr = $("#whipr_label").data("whipr");
		var whipr_class = $("#whipr_label").data("whipr_class");
		var whtr = $("#whtr_label").data("whtr");
		var whtr_class = $("#whtr_label").data("whtr_class");
		var whtr = $("#whtr_label").data("whtr");
		var whtr_class = $("#whtr_label").data("whtr_class");
		var ask_pregnant = $('input[name=ask_pregnant]:checked').val();
		var ask_gestation= $('input[name=ask_gestation]:checked').val();
        var mens_date= $("#mens_date").val();
        var gestation_wks = $("#gestation_wks").val();
        var ask_lactation= $('input[name=ask_lactation]:checked').val();

		var client_id = $(this).data("client_id");
		var appointment_id = $(this).data("appointment_id");


		if (wt == '' || !decimal.test(wt) || wt > 500) {
			alert('Please enter a valid weight.');
			return false;
		} else if (ht == '' || !decimal.test(ht) || ht > 243.8) {
			alert('Please enter a valid height in cm.');
			return false;
		} else if (ht_ft == '' || ht_in == '' || isNaN(ht_ft) || isNaN(ht_in) || ht_ft > 8) {
			alert('Please enter a valid height in ft/in.');
			return false;
		} //!dateformat.test(datepick)
		else if (bmi == '' || bmi == 0 || !decimal.test(bmi)) {
			alert('Please enter a valid BMI.');
			return false;
		} else if (bmi_class == '') {
			alert('Please enter BMI Classification.');
			return false;
		} /*else if (dbw == '' || !decimal.test(dbw)) {
			alert('Please enter DBW.');
			return false;
		} else if (lower_limit == '' || !decimal.test(lower_limit)) {
			alert('Please enter lower limit.');
			return false;
		} else if (upper_limit == '' || !decimal.test(upper_limit)) {
			alert('Please enter upper limit.');
			return false;
		} else if (wc == '' || !decimal.test(wc) || wc > 500) {
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
			alert('Please enter waist height ratio classification..');
			return false;
		}*/ else if (client_id == '' || isNaN(client_id)) {
			alert('Please enter valid client id.');
			return false;
		} else if (appointment_id == '' || isNaN(appointment_id)) {
			alert('Please enter valid appointment id.');
			return false;
		} else {

			$.ajax({
				type: "POST",
				url: base_url+'admin/help/save_anthropometry',
				data: "wt=" + wt + "&wt_opt=" + wt_opt + "&ht=" + ht + "&bmi=" + bmi + "&bmi_class=" + bmi_class + "&dbw=" + dbw + "&dbw_opt=" + dbw_opt + "&lower_limit=" + lower_limit + "&upper_limit=" + upper_limit + "&limit_opt=" + limit_opt + "&wc=" + wc + "&wc_opt=" + wc_opt + "&risk_indicator=" + risk_indicator + "&hc=" + hc + "&hc_opt=" + hc_opt + "&whipr=" + whipr + "&whipr_class=" + whipr_class + "&whtr=" + whtr + "&whtr_class=" + whtr_class + "&ask_pregnant="+ask_pregnant+"&ask_gestation="+ask_gestation+"&mens_date="+mens_date+"&gestation_wks="+gestation_wks+"&ask_lactation="+ask_lactation+"&client_id=" + client_id + "&appointment_id=" + appointment_id,
				success: function(html) {
					if (html == 'success') {
						$("#alert").html("Measurement successfully saved.");
						$('#alert').addClass('alert alert-success');
						$('#alert').focus();
						setTimeout("location.reload(true);", 3000);
						//window.location = 'client_profile.php?appointment_id=' + appointment_id + '#b';
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


$(function() {
		$(document).on('click', '.delete_anthrop', function() {
			var id = $(this).attr("id");
			var dataString = 'id=' + id;
			var parent = $(this).closest("div");
			var answer = confirm("Are you sure you want to delete from the database?");
			if (answer) {
				$.ajax({
					type: "POST",
					url: base_url+'admin/help/delete_anthropometry',
					data: dataString,
					cache: false,
					beforeSend: function() {
						parent.animate({
							'backgroundColor': '#ffffff'
						}, 300).animate({
							opacity: 0.35
						}, "slow");;
					},
					success: function() {
						/*parent.slideUp('slow', function() {
							$(this).remove();
						});*/
						setTimeout("location.reload(true);",1000);
					}
				});
			} else {
				return false;
			}
			return false;
		});
	});



	$(document).on("click", "#edit_anthrop", function() {
		var answer = confirm("Updating this will reset/delete nutrition plan, food exchange lists and meal plan entry would you like to continue?");
		if (answer) {
			var decimal = /^\d{0,4}(\.\d{0,2})?$/;
			var wt = $("#wt").val();
			var wt_opt = $("#wt_opt").val();
			var ht = $("#ht").val();
			var ht_ft = $("#ht_ft").val();
			var ht_in = $("#ht_in").val();
			var bmi = $("#bmi_label").data("bmi");
			var bmi_class = $("#bmi_label").data("bmi_class");
			var dbw = $("#dbw").val();
			var dbw_opt = $("#dbw_opt").val();
			var lower_limit = $("#lower_limit").val();
			var upper_limit = $("#upper_limit").val();
			var limit_opt = $("#limit_opt").val();
			var wc = $("#wc").val();
			var wc_opt = $("#wc_opt").val();
			var risk_indicator = $("#risk_indicator_label").data("risk_indicator");
			var hc = $("#hc").val();
			var hc_opt = $("#hc_opt").val();
			var whipr = $("#whipr_label").data("whipr");
			var whipr_class = $("#whipr_label").data("whipr_class");
			var whtr = $("#whtr_label").data("whtr");
			var whtr_class = $("#whtr_label").data("whtr_class");
			var ask_pregnant = $('input[name=ask_pregnant]:checked').val();
			var ask_gestation= $('input[name=ask_gestation]:checked').val();
        	var mens_date= $("#mens_date").val();
        	var gestation_wks = $("#gestation_wks").val();
        	var ask_lactation= $('input[name=ask_lactation]:checked').val();

			var appointment_id = $(this).data("appointment_id");

			if (wt == '' || !decimal.test(wt) || wt > 500) {
				alert('Please enter a valid weight.');
				return false;
			} else if (ht == '' || !decimal.test(ht) || ht > 243.8) {
				alert('Please enter a valid height in cm.');
				return false;
			} else if (ht_ft == '' || ht_in == '' || isNaN(ht_ft) || isNaN(ht_in) || ht_ft > 8) {
				alert('Please enter a valid height in ft/in.');
				return false;
			} //!dateformat.test(datepick)
			else if (bmi == '' || bmi == 0 || !decimal.test(bmi)) {
				alert('Please enter a valid BMI.');
				return false;
			} else if (bmi_class == '') {
				alert('Please enter BMI Classification.');
				return false;
			} else if (dbw == '' || !decimal.test(dbw)) {
				alert('Please enter DBW.');
				return false;
			} else if (lower_limit == '' || !decimal.test(lower_limit)) {
				alert('Please enter lower limit.');
				return false;
			} else if (upper_limit == '' || !decimal.test(upper_limit)) {
				alert('Please enter upper limit.');
				return false;
			} /*else if (wc == '' || !decimal.test(wc) || wc > 500) {
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
				alert('Please enter waist height ratio classification..');
				return false;
			}*/ else if (appointment_id == '' || isNaN(appointment_id)) {
				alert('Please enter valid id.');
				return false;
			} else {
				$.ajax({
					type: "POST",
					url: base_url+'admin/help/update_anthropometry',
					data: "wt=" + wt + "&wt_opt=" + wt_opt + "&ht=" + ht + "&bmi=" + bmi + "&bmi_class=" + bmi_class + "&dbw=" + dbw + "&dbw_opt=" + dbw_opt + "&lower_limit=" + lower_limit + "&upper_limit=" + upper_limit + "&limit_opt=" + limit_opt + "&wc=" + wc + "&wc_opt=" + wc_opt + "&risk_indicator=" + risk_indicator + "&hc=" + hc + "&hc_opt=" + hc_opt + "&whipr=" + whipr + "&whipr_class=" + whipr_class + "&whtr=" + whtr + "&whtr_class=" + whtr_class + "&ask_pregnant="+ask_pregnant+"&ask_gestation="+ask_gestation+"&mens_date="+mens_date+"&gestation_wks="+gestation_wks+"&ask_lactation="+ask_lactation+"&appointment_id=" + appointment_id,
					success: function(html) {
						//console.log(data);
						
						if (html == 'success') {
							//$("#form1").fadeOut("normal");
							//$("#shadow").fadeOut();
							$("#alert").html("Measurement successfully updated.");
							$('#alert').addClass('alert alert-success');
							$('#alert').focus();
							setTimeout("location.reload(true);", 3000);
							//window.location = 'client_profile.php?appointment_id=' + appointment_id + '#b';
						} else {
							$("#alert").html("Error: Something is wrong when saving the data.");
							$('#alert').addClass('alert alert-danger');
							$('#alert').focus();
						}
					},
					beforeSend: function() {
						$('#alert').addClass('alert alert-success');
						$("#alert").html("Loading...");
						$('#alert').focus();
					}
				});
			}
		} else {
			return false;
		}
		return false;
	});

	$('#biochem_table').dataTable({
		"aaSorting": []
	});
	$.extend($.ui.autocomplete.prototype, {
		_renderItem: function(ul, item) {
			var term = this.element.val(),
				html = item.label.replace(term, "<b>$&</b>");
			return $("<li></li>").data("item.autocomplete", item).append($("<a></a>").html(html)).appendTo(ul);
		}
	});
	var d = new Date();
	var year = d.getFullYear() - 10;
	d.setFullYear(year);
	$("#result_date").datepicker({
		changeYear: true,
		changeMonth: true,
		dateFormat: 'yy-mm-dd',
		//yearRange: '1940:' + year + '',
		defaultDate: d
	});
	$(function() {
		$("#biochem").dialog({
			autoOpen: false,
			title: '',
			resizable: false,
			modal: true,
			width: 800,
			create: function(event, ui) {
				// Set max-width
				$(this).parent().css("maxWidth", "800px");
			},
			close: function(ev, ui) {
				window.location.reload()
			}
		});
		$(".ui-dialog").addClass("ui-widget-header");
		$(".ui-dialog").addClass("ui-widget-content");
		// $(".ui-dialog-titlebar").hide();
		$("#add_biochem").on("click", function() {
			$("#biochem").dialog("open");
			$('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
			$('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
			$("#btest").autocomplete({
				source: base_url + 'admin/help/get_btests',
			});
			$("#bresult").autocomplete({
				source: base_url + 'admin/help/get_bresults',
			});
			$("#n_values").autocomplete({
				source: base_url + 'admin/help/get_bnvalues',
			});
		});
	});
	$(function() {
		$("#edit_biochem").dialog({
			autoOpen: false,
			title: '',
			resizable: false,
			modal: true,
			width: 800,
			create: function(event, ui) {
					// Set max-width
					$(this).parent().css("maxWidth", "800px");
				}
				//close: function(ev, ui) { window.location.reload() }	
		});
		// $(".ui-dialog-titlebar").hide();
		$(".ui-dialog").addClass("ui-widget-header");
		$(".ui-dialog").addClass("ui-widget-content");
		$(".edit_biochem").on("click", function(e) {
			e.preventDefault();
			var id = $(this).attr("id");
			var dataString = 'id=' + id;
			$.ajax({
				type: "GET",
				url: base_url + 'admin/help/edit_biochemical',
				data: dataString,
				success: function(res) {
					$("#edit_biochem").html(res);
					$("#edit_biochem").dialog("open");
					$('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
					$('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
					$("#btest1").autocomplete({
						source: base_url + 'admin/help/get_btests',
					});
					$("#bresult1").autocomplete({
						source: base_url + 'admin/help/get_bresults',
					});
					$("#n_values1").autocomplete({
						source: base_url + 'admin/help/get_bnvalues',
					});
				}
			});
		});
	});
	$(document).on("click", "#save_biochem", function(e) {
		var dateformat = /^\d{4}-\d{1,2}-\d{1,2}$/;
		var client_id = $(this).data("client_id");
		var appointment_id = $(this).data("appointment_id");
		var btest = $("#btest").val();
		var bresult = $("#bresult").val();
		var n_values = $("#n_values").val();
		var result_date = $("#result_date").val();
		var remarks = $("#remarks").val();
		if (btest == '') {
			$("#alert").html("Please enter biochemical test.");
			$('#alert').addClass('alert alert-danger');
			$('#alert').focus();
		} else if (bresult == '') {
			$("#alert").html("Please enter biochemical result.");
			$('#alert').addClass('alert alert-danger');
			$('#alert').focus();
		} else if (n_values == '') {
			$("#alert").html("Please enter normal values.");
			$('#alert').addClass('alert alert-danger');
		} else if (result_date == '' || !dateformat.test(result_date)) {
			$("#alert").html("Please enter a valid result date.");
			$('#alert').addClass('alert alert-danger');
			$('#alert').focus();
		} else if (client_id == '') {
			$("#alert").html("Please enter client id.");
			$('#alert').addClass('alert alert-danger');
			$('#alert').focus();
		} else if (appointment_id == '') {
			$("#alert").html("Please enter appointment_id.");
			$('#alert').addClass('alert alert-danger');
			$('#alert').focus();
		} else {
			$.ajax({
				type: "POST",
				url: base_url + 'admin/help/save_biochemical',
				data: "client_id=" + client_id + "&appointment_id=" + appointment_id + "&btest=" + btest + "&bresult=" + bresult + "&n_values=" + n_values + "&result_date=" + result_date + "&remarks=" + remarks,
				success: function(html) {
					//alert(data);
					if (html == 'success') {
						$("#shadow").fadeOut();
						$("#alert").html("Biochemical result successfully saved.");
						$('#alert').addClass('alert alert-success');
						$("#btest").val('');
						$("#bresult").val('');
						$("#n_values").val('');
						$("#result_date").val('');
						$("#remarks").val('');
						$('#alert').focus();
						//setTimeout("location.reload(true);",1000);
						e.preventDefault();
					} else if (html == 'error1') {
						$("#alert").html("Error! You have already finished on the appointment. Please contact RND personnel for another appointment.");
						$('#alert').addClass('alert alert-danger');
						$("#btest").val('');
						$("#bresult").val('');
						$("#n_values").val('');
						$("#result_date").val('');
						$("#remarks").val('');
					} else {
						$("#alert").html("Error: Something is wrong when saving the data.");
						$('#alert').addClass('alert alert-danger');
						$("#btest").val('');
						$("#bresult").val('');
						$("#n_values").val('');
						$("#result_date").val('');
						$("#remarks").val('');
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
		//}
		return false;
	});
	$(function() {
		$('#biochem_table tbody').on('click', '.delete_biochem', function() {
			var id = $(this).attr("id");
			var dataString = 'id=' + id;
			var parent = $(this).closest("tr");
			var answer = confirm("Are you sure you want to delete from the database?");
			if (answer) {
				$.ajax({
					type: "POST",
					url: base_url + 'admin/help/delete_biochemical',
					data: dataString,
					cache: false,
					beforeSend: function() {
						parent.animate({
							'backgroundColor': '#fb6c6c'
						}, 300).animate({
							opacity: 0.35
						}, "slow");;
					},
					success: function() {
						parent.slideUp('slow', function() {
							$(this).remove();
						});
						setTimeout("location.reload(true);", 1000);
					}
				});
			} else {
				return false;
			}
			return false;
		});
	});

	var d = new Date();
	var year = d.getFullYear() - 10;
	d.setFullYear(year);
	$("#result_date1").datepicker({
		changeYear: true,
		changeMonth: true,
		dateFormat: 'yy-mm-dd',
		//yearRange: '1940:' + year + '',
		defaultDate: d
	});
	$(document).on("click", "#edit_biochem1", function() {
		var dateformat = /^\d{4}-\d{1,2}-\d{1,2}$/;
		var id1 = $("#edit_biochem1").data("id");
		var btest1 = $("#btest1").val();
		var bresult1 = $("#bresult1").val();
		var n_values1 = $("#n_values1").val();
		var result_date1 = $("#result_date1").val();
		var remarks1 = $("#remarks1").val();
		if (btest1 == '') {
			$("#alert1").html("Please enter biochemical test.");
			$('#alert1').addClass('alert alert-danger');
		} else if (bresult1 == '') {
			$("#alert1").html("Please enter biochemical result.");
			$('#alert1').addClass('alert alert-danger');
		} else if (n_values1 == '') {
			$("#alert1").html("Please enter normal values.");
			$('#alert1').addClass('alert alert-danger');
		} else if (result_date1 == '' || !dateformat.test(result_date1)) {
			$("#alert1").html("Please enter a valid result date.");
			$('#alert1').addClass('alert alert-danger');
		} else if (id1 == '') {
			$("#alert1").html("Please enter id.");
			$('#alert1').addClass('alert alert-danger');
		} else {
			$.ajax({
				type: "POST",
				url: base_url + 'admin/help/update_biochemical',
				data: "id=" + id1 + "&btest1=" + btest1 + "&bresult1=" + bresult1 + "&n_values1=" + n_values1 + "&result_date1=" + result_date1 + "&remarks1=" + remarks1,
				success: function(html) {
					//alert(data);
					if (html == 'success') {
						//  $("#form1").fadeOut("normal");
						$("#alert1").html("Biochemical result successfully updated.");
						$('#alert1').addClass('alert alert-success');
						setTimeout("location.reload(true);", 1000);
					} else {
						$("#alert1").html("Error: Something is wrong when saving the data.");
						$('#alert1').addClass('alert alert-danger');
					}
				},
				beforeSend: function() {
					$("#alert1").html("Loading...")
					$('#alert1').addClass('alert alert-success');
				}
			});
		}
		return false;
	});


		$('#clinical_table').dataTable({
 		"aaSorting": []
 	});
 	$(function() {
 		$("#clinical").dialog({
 			autoOpen: false,
 			title: '',
 			modal: true,
 			resizable: false,
 			modal: true,
 			width: 800,
 			create: function(event, ui) {
 				// Set max-width
 				$(this).parent().css("maxWidth", "800px");
 			},
 			close: function(ev, ui) {
 				window.location.reload()
 			}
 		});
 		$(".ui-dialog").addClass("ui-widget-header");
 		$(".ui-dialog").addClass("ui-widget-content");
 		// $(".ui-dialog-titlebar").hide();
 		$("#add_clinical").on("click", function() {
 			$("#clinical").dialog("open");
 			$('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
 			$('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
 			$("#clinical_param").autocomplete({
 				source: base_url + 'admin/help/get_clinical_parameters',
 			});
 		});
 	});
 	$(document).on("keyup", "#clinical_param", function() {
 		var clinical_param = $("#clinical_param").val();
 		if (clinical_param == 'Blood Pressure') {
 			$("#obsrv").autocomplete({
 				source: base_url + 'admin/help/get_blood_pressures',
 			});
 		} else {
 			$("#obsrv").val();
 			/* $("#obsrv").autocomplete({
	source:'../get_observations',
		
	
});*/
 		}
 	});
 	$(function() {
 		$("#edit_clinical").dialog({
 			autoOpen: false,
 			title: '',
 			resizable: false,
 			modal: true,
 			width: 800,
 			create: function(event, ui) {
 					// Set max-width
 					$(this).parent().css("maxWidth", "800px");
 				}
 				//	close: function(ev, ui) { window.location.reload() }	
 		});
 		//$(".ui-dialog-titlebar").hide();
 		$(".ui-dialog").addClass("ui-widget-header");
 		$(".ui-dialog").addClass("ui-widget-content");
 		$(".edit_clinical").on("click", function(e) {
 			e.preventDefault();
 			var id = $(this).attr("id");
 			var dataString = 'id=' + id;
 			$.ajax({
 				type: "GET",
 				url: base_url + 'admin/help/edit_clinical',
 				data: dataString,
 				success: function(res) {
 					$("#edit_clinical").html(res);
 					$("#edit_clinical").dialog("open");
 					$('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
 					$('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
 					$("#clinical_param1").autocomplete({
 						source: base_url + 'admin/help/get_clinical_parameters',
 					});
 					$("#obsrv1").autocomplete({
 						source: base_url + 'admin/help/get_observations',
 					});
 				}
 			});
 		});
 	});
 	$(document).on("blur", "#clinical_param1", function() {
 		var clinical_param1 = $("#clinical_param1").val();
 		if (clinical_param1 == 'Blood Pressure') {
 			$("#obsrv1").autocomplete({
 				source: base_url + 'admin/help/get_blood_pressures',
 			});
 		} else {
 			$("#obsrv1").val();
 			/* $("#obsrv1").autocomplete({
		source:'../get_observations',
		
	
});*/
 		}
 	});
 	$(document).on("click", "#save_clinical", function(e) {
 		var client_id = $(this).data("client_id");
 		var appointment_id = $(this).data("appointment_id");
 		var clinical_param = $("#clinical_param").val();
 		//var bp = $("#bp").val();
 		var obsrv = $("#obsrv").val();
 		var remarks = $("#remarks").val();
 		if (clinical_param == '') {
 			$("#alert").html("Please enter clinical parameter.");
 			$('#alert').addClass('alert alert-danger');
 			$('#alert').focus();
 		}
 		/*else if(bp==''){
 			$("#alert").html("Please enter blood pressure.");
 			$('#alert').addClass('alert alert-danger');
 			$('#alert').focus();
 			  }*/
 		else if (obsrv == '') {
 			$("#alert").html("Please enter observation.");
 			$('#alert').addClass('alert alert-danger');
 			$('#alert').focus();
 		} else if (client_id == '') {
 			$("#alert").html("Please enter client id.");
 			$('#alert').addClass('alert alert-danger');
 		} else if (appointment_id == '') {
 			$("#alert").html("Please enter appointment id.");
 			$('#alert').addClass('alert alert-danger');
 		} else {
 			$.ajax({
 				type: "POST",
 				url: base_url + 'admin/help/save_clinical',
 				data: "client_id=" + client_id + "&appointment_id=" + appointment_id + "&clinical_param=" + clinical_param + "&obsrv=" + obsrv + "&remarks=" + remarks,
 				success: function(html) {
 					//alert(data);
 					if (html == 'success') {
 						//  $("#form1").fadeOut("normal");
 						$("#shadow").fadeOut();
 						$("#alert").html("Clinical result successfully saved.");
 						$('#alert').removeClass('alert alert-danger');
 						$('#alert').addClass('alert alert-success');
 						$('#alert').focus();
 						$("#clinical_param").val('');
 						//$("#bp").val('');
 						$("#obsrv").val('');
 						$("#remarks").val('');
 						e.preventDefault();
 					} else if (html == 'error1') {
 						$("#alert").html("Error! You have already finished on the appointment. Please contact RND personnel for another appointment.");
 						$('#alert').addClass('alert alert-danger');
 						$('#alert').focus();
 						$("#clinical_param").val('');
 						//$("#bp").val('');
 						$("#obsrv").val('');
 						$("#remarks").val('');
 					} else {
 						$("#alert").html("Error: Something is wrong when saving the data.");
 						$('#alert').addClass('alert alert-danger');
 						$('#alert').focus();
 						$("#clinical_param").val('');
 						//$("#bp").val('');
 						$("#obsrv").val('');
 						$("#remarks").val('');
 					}
 				},
 				beforeSend: function() {
 					$("#alert").html("Loading...")
 					$('#alert').addClass('alert alert-success');
 					$('#alert').focus();
 				}
 			});
 		}
 		return false;
 	});
 	$(function() {
 		$('#clinical_table tbody').on('click', '.delete_clinical', function() {
 			var id = $(this).attr("id");
 			var dataString = 'id=' + id;
 			var parent = $(this).closest("tr");
 			var answer = confirm("Are you sure you want to delete from the database?");
 			if (answer) {
 				$.ajax({
 					type: "POST",
 					url: base_url + 'admin/help/delete_clinical',
 					data: dataString,
 					cache: false,
 					beforeSend: function() {
 						parent.animate({
 							'backgroundColor': '#fb6c6c'
 						}, 300).animate({
 							opacity: 0.35
 						}, "slow");;
 					},
 					success: function() {
 						parent.slideUp('slow', function() {
 							$(this).remove();
 						});
 						setTimeout("location.reload(true);", 1000);
 					}
 				});
 			} else {
 				return false;
 			}
 			return false;
 		});
 	});

 	$(document).on("click", "#edit_clinical1", function() {
		var id1 = $("#edit_clinical1").data("id");
		//var client_id = document.getElementById("client_id").value;
		//var appointment_id = document.getElementById("appointment_id").value;
		var clinical_param1 = $("#clinical_param1").val();
		//var bp1 = $("#bp1").val();
		var obsrv1 = $("#obsrv1").val();
		var remarks1 = $("#remarks1").val();
		if (clinical_param1 == '') {
			$("#alert1").html("Please enter clinical parameter.");
			$('#alert1').addClass('alert alert-danger');
		}
		/*else if(bp1==''){
			     $("#alert1").html("Please enter blood pressure.");
				$('#alert1').addClass('alert alert-danger');
			  }*/
		else if (obsrv1 == '') {
			$("#alert1").html("Please enter observation.");
			$('#alert1').addClass('alert alert-danger');
		} else if (id1 == '') {
			$("#alert1").html("Please enter id.");
			$('#alert1').addClass('alert alert-danger');
		} else {
			$.ajax({
				type: "POST",
				url: base_url + 'admin/help/update_clinical',
				data: "id=" + id1 + "&clinical_param1=" + clinical_param1 + "&obsrv1=" + obsrv1 + "&remarks1=" + remarks1,
				success: function(html) {
					//alert(data);
					if (html == 'success') {
						//  $("#form1").fadeOut("normal");
						$("#shadow").fadeOut();
						$("#alert1").html("Clinical result successfully updated.");
						$('#alert1').addClass('alert alert-success');
						setTimeout("location.reload(true);", 1000);
					} else {
						$("#alert1").html("Error: Something is wrong when saving the data.");
						$('#alert1').addClass('alert alert-danger');
					}
				},
				beforeSend: function() {
					$("#alert1").html("Loading...")
					$('#alert1').addClass('alert alert-success');
				}
			});
		}
		return false;
	});



 	$('#diagnosis_table').dataTable({
 		"aaSorting": []
 	});
 	$(function() {
 		$("#diagnosis_div").dialog({
 			autoOpen: false,
 			title: '',
 			resizable: false,
 			modal: true,
 			width: 800,
 			create: function(event, ui) {
 					// Set max-width
 					$(this).parent().css("maxWidth", "800px");
 				},
 			close: function(ev, ui) {
 				window.location.reload()
 			}
 		});
 		//$(".ui-dialog-titlebar").hide();
 		$(".ui-dialog").addClass("ui-widget-header");
 		$(".ui-dialog").addClass("ui-widget-content");
 		$("#add_diagnosis").on("click", function() {
 			$("#diagnosis_div").dialog("open");
 			$('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
 			$('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
 			$("#diagnosis").autocomplete({
 				source: base_url + 'admin/help/get_diagnosis',
 			});
 			$("#etiology").autocomplete({
 				source: base_url + 'admin/help/get_etiology',
 			});
 			$("#ss_diagnosis").autocomplete({
 				source: base_url + 'admin/help/get_ss_diagnosis',
 			});
 		});
 	});
 	$(function() {
 		$("#edit_diagnosis").dialog({
 			autoOpen: false,
 			title: '',
 			resizable: false,
 			modal: true,
 			width: 800,
 			create: function(event, ui) {
 					// Set max-width
 					$(this).parent().css("maxWidth", "800px");
 				}
 			//	close: function(ev, ui) { window.location.reload() }	
 		});
 		// $(".ui-dialog-titlebar").hide();
 		$(".ui-dialog").addClass("ui-widget-header");
 		$(".ui-dialog").addClass("ui-widget-content");
 		$(".edit_diagnosis").on("click", function(e) {
 			e.preventDefault();
 			var id = $(this).attr("id");
 			var dataString = 'id=' + id;
 			$.ajax({
 				type: "GET",
 				url: base_url + 'admin/help/edit_diagnosis',
 				data: dataString,
 				success: function(res) {
 					$("#edit_diagnosis").html(res);
 					$("#edit_diagnosis").dialog("open");
 					$('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
 					$('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
 					$("#diagnosis1").autocomplete({
 						source: '../get_diagnosis',
 					});
 					$("#etiology1").autocomplete({
 						source: base_url + 'admin/help/get_etiology',
 					});
 					$("#ss_diagnosis1").autocomplete({
 						source: base_url + 'admin/help/get_ss_diagnosis',
 					});
 				}
 			});
 		});
 	});

	
	$(document).on("click", "#save_diagnosis", function(e) {
		var client_id = $(this).data("client_id");
		var appointment_id = $(this).data("appointment_id");
		var diagnosis = $("#diagnosis").val();
		var etiology = $("#etiology").val();
		var ss_diagnosis = $("#ss_diagnosis").val();
		var remarks = $("#remarks").val();
		if (diagnosis == '') {
			$("#alert").html("Please enter diagnosis.");
			$('#alert').addClass('alert alert-danger');
			$('#alert').focus();
		} else if (etiology == '') {
			$("#alert").html("Please enter etiology");
			$('#alert').addClass('alert alert-danger');
			$('#alert').focus();
		} else if (ss_diagnosis == '') {
			$("#alert").html("Please enter signs and symptoms.");
			$('#alert').addClass('alert alert-danger');
			$('#alert').focus();
		} else if (client_id == '') {
			$("#alert").html("Please enter client_id.");
			$('#alert').addClass('alert alert-danger');
		} else if (appointment_id == '') {
			$("#alert").html("Please enter appointment id.");
			$('#alert').addClass('alert alert-danger');
		} else {
			$.ajax({
				type: "POST",
				url: base_url+'admin/help/save_diagnosis',
				data: "client_id=" + client_id + "&appointment_id=" + appointment_id + "&diagnosis=" + diagnosis + "&etiology=" + etiology + "&ss_diagnosis=" + ss_diagnosis + "&remarks=" + remarks,
				success: function(html) {
					if (html == 'success') {
						$("#shadow").fadeOut();
						$("#alert").html("Diagnosis result successfully saved.");
						$('#alert').addClass('alert alert-success');
						$('#alert').focus();
						$("#diagnosis").val('');
						$("#etiology").val('');
						$("#ss_diagnosis").val('');
						$("#remarks").val('');
						e.preventDefault();
					} else if (html == 'error1') {
						$("#alert").html("Error! You have already finished on the appointment. Please contact RND personnel for another appointment.");
						$('#alert').addClass('alert alert-danger');
						$('#alert').focus();
						$("#diagnosis").val('');
						$("#etiology").val('');
						$("#ss_diagnosis").val('');
						$("#remarks").val('');
					} else {
						$("#alert").html("Error: Something is wrong when saving the data.");
						$('#alert').addClass('alert alert-danger');
						$('#alert').focus();
						$("#diagnosis").val('');
						$("#etiology").val('');
						$("#ss_diagnosis").val('');
						$("#remarks").val('');
					}
				},
				beforeSend: function() {
					$("#alert").html("Loading...");
					$('#alert').addClass('alert alert-success');
					$('#alert').focus();
				}
			});
		}
		///}
		return false;
	});


	
	$(function() {
		$('#diagnosis_table tbody').on('click', '.delete_diagnosis', function() {
			var id = $(this).attr("id");
			var dataString = 'id=' + id;
			var parent = $(this).closest("tr");
			var answer = confirm("Are you sure you want to delete from the database?");
			if (answer) {
				$.ajax({
					type: "POST",
					url: base_url+'admin/help/delete_diagnosis',
					data: dataString,
					cache: false,
					beforeSend: function() {
						parent.animate({
							'backgroundColor': '#fb6c6c'
						}, 300).animate({
							opacity: 0.35
						}, "slow");;
					},
					success: function() {
						parent.slideUp('slow', function() {
							$(this).remove();
						});
						setTimeout("location.reload(true);",1000);
					}
				});
			} else {
				return false;
			}
			return false;
		});
	});

	$(document).on("click", "#edit_diagnosis1", function() {
		var id1 = $("#edit_diagnosis1").data("id");
		var diagnosis1 = $("#diagnosis1").val();
		var etiology1 = $("#etiology1").val();
		var ss_diagnosis1 = $("#ss_diagnosis1").val();
		var remarks1 = $("#remarks1").val();
		if (diagnosis1 == '') {
			$("#alert1").html("Please enter diagnosis.");
			$('#alert1').addClass('alert alert-danger');
		} else if (etiology1 == '') {
			$("#alert1").html("Please enter etiology.");
			$('#alert1').addClass('alert alert-danger');
		} else if (ss_diagnosis1 == '') {
			$("#alert1").html("Please enter signs and symptoms.");
			$('#alert1').addClass('alert alert-danger');
		} else if (id1 == '') {
			$("#alert1").html("Please enter id.");
			$('#alert1').addClass('alert alert-danger');
		} else {
			$.ajax({
				type: "POST",
				url: base_url + 'admin/help/update_diagnosis',
				data: "id=" + id1 + "&diagnosis1=" + diagnosis1 + "&etiology1=" + etiology1 + "&ss_diagnosis1=" + ss_diagnosis1 + "&remarks1=" + remarks1,
				success: function(html) {
					//alert(data);
					if (html == 'success') {
						//  $("#form1").fadeOut("normal");
						$("#shadow").fadeOut();
						$("#alert1").html("Diagnosis result successfully updated.");
						$('#alert1').addClass('alert alert-success');
						setTimeout("location.reload(true);", 1000);
					} else {
						$("#alert1").html("Error: Something is wrong when saving the data.");
						$('#alert1').addClass('alert alert-danger');
					}
				},
				beforeSend: function() {
					$("#alert1").html("Loading...");
					$('#alert1').addClass('alert alert-success');
				}
			});
		}
		return false;
	});


	
$(document).on("click", "#save_nutrition_plan", function(e) {
		var client_id = $(this).data("client_id");
		var appointment_id = $(this).data("appointment_id");
		var select_wt = $("#select_wt").val();
		var weight = $("#weight").val();
		var pa_lvl = $("#pa_lvl").val();
		var select_cal_plan = $("#select_cal_plan").val();
		//var cal_plan = $("#cal_plan").val();
		var cal = $("#cal").val();
		var select_method = $("#select_method").val();
		var select_pmethod = $("#select_pmethod").val();
		var st_value = $("#st_value").val();
		var cho = $("#cho").val();
		var pro = $("#pro").val();
		var fat = $("#fat").val();
		var cho_plan = $("#cho_plan").val();
		var pro_plan = $("#pro_plan").val();
		var fat_plan = $("#fat_plan").val();
		var select_plan = $("#select_plan").val();
		//var pregnant_lactating= $('input[name=pregnant_lactating]:checked').val();
		if (select_plan == 1) {
			var data_id = $(".data_meal").data("id");
		} else if (select_plan == 2) {
			var data_id = 0;
		}
		var decimal = /^\d{0,4}(\.\d{0,2})?$/;
		if (client_id == '' || isNaN(client_id)) {
			alert('Please enter client_id.');
			return false;
		} else if (appointment_id == '' || isNaN(appointment_id)) {
			alert('Please enter appointment_id.');
			return false;
		} else if (select_wt == 0) {
			alert('Please select weight to be used.');
			return false;
		} else if (!weight.match(decimal) || weight == '') {
			alert('Please enter weight.');
			return false;
		} else if (pa_lvl == 0) {
			alert('Please select physical activity level.');
			return false;
		}
		/* else if (select_cal_plan == 2 || select_cal_plan == 3) {
		            alert('Please enter calorie plan.');
		            return false;
		        }
		        	else if(select_method==0){
					alert('Please select physical activity level.');
					return false;
				}  */
		else if (select_plan == 0) {
			alert('Please select nutrition plan.');
			return false;
		} else if (select_plan != 0 && select_method != 0 && select_pmethod != 0 && data_id != 0) {
			alert('Please select custom plan method to be used.');
			return false;
		} else if (!cho.match(decimal) || cho == '') {
			alert('Carbohydrates please.');
			return false;
		} else if (!pro.match(decimal) || pro == '') {
			alert('Protein please.');
			return false;
		} else if (!fat.match(decimal) || fat == '') {
			alert('Fat please.');
			return false;
		} else if (!cal.match(decimal) || cal == '') {
			alert('Calories please.');
			return false;
		}
		//}
		else {
			$.ajax({
				type: "POST",
				url: base_url + 'admin/help/save_nutrition_plan',
				data: "client_id=" + client_id + "&appointment_id=" + appointment_id + "&select_wt=" + select_wt + "&weight=" + weight + "&pa_lvl=" + pa_lvl + "&select_cal_plan=" + select_cal_plan  + "&cal=" + cal + "&select_method=" + select_method + "&select_pmethod=" + select_pmethod + "&st_value=" + st_value + "&cho=" + cho + "&pro=" + pro + "&fat=" + fat + "&cho_plan=" + cho_plan + "&pro_plan=" + pro_plan + "&fat_plan=" + fat_plan + "&select_plan=" + select_plan + "&id=" + data_id,
				success: function(html) {
					//alert(data);
					if (html == 'success') {
						$("#form1").fadeOut("normal");
						$("#shadow").fadeOut();
						$("#alert").html("Nutrition plan successfully saved. You will now redirected to food exchange list. Thank you!");
						// alert("Nutrition plan successfully saved. You will now redirected to food exchange list. Thank you!");
						$('#alert').addClass('alert alert-success');
						$('#alert').focus();
						setTimeout("location.reload(true);", 3000);
						//window.location = 'fel.php?appointment_id=' + appointment_id;
					} else if (html == 'error') {
						$("#alert").html("You have already submitted a record for this appointment. Please try on another appointment. Thank you!");
						$('#alert').addClass('alert alert-danger');
						$('#alert').focus();
					} else if (html == 'error1') {
						$("#alert").html("Error! You have already finished on the appointment. Please contact RND personnel for another appointment.");
						$('#alert').addClass('alert alert-danger');
						$('#alert').focus();
					} else {
						$("#alert").html("Error: Something is wrong when saving the data.");
						$('#alert').addClass('alert alert-danger');
						$('#alert').focus();
					}
				},
				beforeSend: function() {
					$('#alert').addClass('alert alert-success');
					$("#alert").html("Loading...");
					$('#alert').focus();
				}
			});
		}
		//}
		return false;
	});
	$(function() {
		$(document).on('click', '.delete_nutrition_plan', function() {
			var id = $(this).attr("id");
			var dataString = 'id=' + id;
			var parent = $(this).closest("div");
			var answer = confirm("Are you sure you want to delete from the database?");
			if (answer) {
				$.ajax({
					type: "POST",
					url: base_url + 'admin/help/delete_nutrition_plan',
					data: dataString,
					cache: false,
					beforeSend: function() {
						parent.animate({
							'backgroundColor': '#ffffff'
						}, 300).animate({
							opacity: 0.35
						}, "slow");;
					},
					success: function() {
						/*parent.slideUp('slow', function() {
							$(this).remove();
						});*/
						setTimeout("location.reload(true);", 1000);
					}
				});
			} else {
				return false;
			}
			return false;
		});
	});


	$(document).on("click", "#edit_nutrition_plan", function(e) {
			var answer = confirm("Updating this will reset/delete food exchange lists and meal plan entry would you like to continue?");
			if (answer) {
				// var nut_id=$("#edit_custom_plan").data("appointment_id");
				var appointment_id = $(this).data("appointment_id");
				var select_wt = $("#select_wt").val();
				var weight = $("#weight").val();
				var pa_lvl = $("#pa_lvl").val();
				var select_cal_plan = $("#select_cal_plan").val();
				//var cal_plan = $("#cal_plan").val();
				var cal = $("#cal").val();
				var select_method = $("#select_method").val();
				var select_pmethod = $("#select_pmethod").val();
				var st_value = $("#st_value").val();
				var cho = $("#cho").val();
				var pro = $("#pro").val();
				var fat = $("#fat").val();
				var cho_plan = $("#cho_plan").val();
				var pro_plan = $("#pro_plan").val();
				var fat_plan = $("#fat_plan").val();
				var decimal = /^\d{0,4}(\.\d{0,2})?$/;
				var select_plan = $("#select_plan").val();
				var data_id = $(".data_meal").data("id");
				var pregnant_lactating = $('input[name=pregnant_lactating]:checked').val();
				if (select_wt == 0) {
					alert('Please select weight to be used.');
					return false;
				} else if (!weight.match(decimal) || weight == '') {
					alert('Please enter weight.');
					return false;
				} else if (pa_lvl == 0) {
					alert('Please select physical activity level.');
					return false;
				}
				/* else if (select_cal_plan == 2 || select_cal_plan == 3&& cal_plan == '') {
				                alert('Please enter calorie plan.');
				                return false;
				            }*/
				else if (select_plan == 0) {
					alert('Please select nutrition plan.');
					return false;
				} else if (select_plan == 2 && select_method == 0 && select_pmethod == 0) {
					alert('Please select custom plan method to be used.');
					return false;
				} else if (!cho.match(decimal) || cho == '') {
					alert('Carbohydrates please.');
					return false;
				} else if (!pro.match(decimal) || pro == '') {
					alert('Protein please.');
					return false;
				} else if (!fat.match(decimal) || fat == '') {
					alert('Fat please.');
					return false;
				} else if (!cal.match(decimal) || cal == '') {
					alert('Calorie please.');
					return false;
				} else {
					$.ajax({
						type: "POST",
						url: base_url + 'admin/help/update_nutrition_plan',
						data: "select_wt=" + select_wt + "&weight=" + weight + "&pa_lvl=" + pa_lvl + "&select_cal_plan=" + select_cal_plan + "&cal=" + cal + "&select_method=" + select_method + "&select_pmethod=" + select_pmethod + "&st_value=" + st_value + "&cho=" + cho + "&pro=" + pro + "&fat=" + fat + "&cho_plan=" + cho_plan + "&pro_plan=" + pro_plan + "&fat_plan=" + fat_plan + "&select_plan=" + select_plan + "&id=" + data_id + "&appointment_id=" + appointment_id,
						success: function(html) {
							if (html == 'success') {
								$("#form1").fadeOut("normal");
								$("#shadow").fadeOut();
								//	alert("Nutrition plan successfully updated. You will now redirected to food exchange list. Thank you!");
								$("#alert").html("Nutrition plan successfully updated. You will now redirected to food exchange list. Thank you!");
								$('#alert').addClass('alert alert-success');
								$('#alert').focus();
								setTimeout("location.reload(true);", 1000);
								//window.location = 'fel.php?appointment_id=' + appointment_id;
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
			} else {
				return false;
			}
			//}
			return false;
		});




	$(document).on("click", "#save_fel", function() {
		//var client_id = $("#save_fel").attr("client_id");
		var client_id = $("#client_id").val();
		var appointment_id = $("#appointment_id").val();
		var foodid = document.getElementsByName("foodid[]");
		var ex = document.getElementsByName("ex[]");
		var fel_cho = document.getElementsByName("fel_cho[]");
		var fel_pro = document.getElementsByName("fel_pro[]");
		var fel_fat = document.getElementsByName("fel_fat[]");
		var fel_cal = document.getElementsByName("fel_cal[]");
		var bfast = document.getElementsByName("bfast[]");
		var am = document.getElementsByName("am_snack[]");
		var lunch = document.getElementsByName("lunch[]");
		var pm = document.getElementsByName("pm_snack[]");
		var dinner = document.getElementsByName("dinner[]");
		var mn = document.getElementsByName("mn_snack[]");
		limit();
		var cho_val = document.getElementsByName("fel_cho[]");
		var pro_val = document.getElementsByName("fel_pro[]");
		var fat_val = document.getElementsByName("fel_fat[]");
		var cal_val = document.getElementsByName("fel_cal[]");
		cho_total = 0;
		pro_total = 0;
		fat_total = 0;
		cal_total = 0;
		for (var x = 0; x < cho_val.length; x++) {
			var cho = cho_val[x].value;
			cho_total += Number(cho);
			var pro = pro_val[x].value;
			pro_total += Number(pro);
			var fat = fat_val[x].value;
			fat_total += Number(fat);
			var cal = cal_val[x].value;
			cal_total += Number(cal);
		}
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
		if (cho_total >= cho_lower || cho_total <= cho_upper || pro_total >= pro_lower || pro_total <= pro_upper || fat_total >= fat_lower || fat_total <= fat_upper || cal_total >= cal_lower || cal_total <= cal_upper || total_ex1 == total_meal) {
			for (var i = 0; i < foodid.length; i++) {
				food_id = foodid[i].value;
				ex_1 = ex[i].value;
				fel_cho_1 = fel_cho[i].value;
				fel_pro_1 = fel_pro[i].value;
				fel_fat_1 = fel_fat[i].value;
				fel_cal_1 = fel_cal[i].value;
				bfast_1 = bfast[i].value;
				am_1 = am[i].value;
				lunch_1 = lunch[i].value;
				pm_1 = pm[i].value;
				dinner_1 = dinner[i].value;
				mn_1 = mn[i].value;
				$.ajax({
					type: "POST",
					url: base_url + 'admin/help/save_fel',
					data: "client_id=" + client_id + "&appointment_id=" + appointment_id + "&foodid=" + food_id + "&ex=" + ex_1 + "&fel_cho=" + fel_cho_1 + "&fel_pro=" + fel_pro_1 + "&fel_fat=" + fel_fat_1 + "&fel_cal=" + fel_cal_1 + "&bfast=" + bfast_1 + "&am_snack=" + am_1 + "&lunch=" + lunch_1 + "&pm_snack=" + pm_1 + "&dinner=" + dinner_1 + "&mn_snack=" + mn_1,
					success: function(html) {
						//alert(data);
						if (html == 'success') {
							//  $("#form1").fadeOut("normal");
							$("#alert").focus();
							$("#alert").html("Food exchange lists successfully saved. You will now redirected to meal planner.");
							//  var alert=' alert("Food exchange lists successfully saved. You will now redirected to meal planner.")';
							$('#alert').addClass('alert alert-success');
							setTimeout("location.reload(true);", 3000);
							//window.location = 'create_meal_plan.php?appointment_id=' + appointment_id;
						} else if (html == 'error1') {
							$("#alert").html("Error! You have already finished on the appointment. Please contact RND personnel for another appointment."); //
							('#alert').addClass('alert alert-danger');
							//$("#alert").focus();
							//  alert('Error! You have already finished on the appointment. Please contact RND personnel for another appointment.');
						} else {
							$("#alert").html("Error: Something is wrong when saving the data.");
							$('#alert').addClass('alert alert-danger');
							//$("#alert").focus();
							//   alert('Error! You have already finished on the appointment. Please contact RND personnel for another appointment.');
						}
					},
					beforeSend: function() {
						$('#alert').addClass('alert alert-success');
						$("#alert").html("Loading...");
						$("#alert").focus();
					}
				});
			}
		} else {
			alert('Please complete food exchange list!');
			return false;
		}
		//	}
		return false;
	});
	$(document).on("click", "#delete_fel", function() {
		if (confirm("Are you sure you want to delete this record?")) {
			//var id = document.getElementsByName('id[]');
			//var client_id = $("#delete_fel").data("client_id");
			var appointment_id = $(this).data("appointment_id");
			//var foodid = document.getElementsByName('foodid[]');
			/*for(var i=0; i<foodid.length; i++) {
			food_id = foodid[i].value;
			row_id = id[i].value;*/
			//alert(row_id);
			$.ajax({
				type: "POST",
				url: base_url + 'admin/help/delete_fel',
				data: "appointment_id=" + appointment_id,
				success: function(html) {
					if (html == 'success') {
						$("#shadow").fadeOut();
						alert('Food exchange lists successfully deleted.');
						/*  $("#alert").html("Food exchange lists successfully deleted.");
						  $('#alert').addClass('alert alert-success');*/
						setTimeout("location.reload(true);", 1000);
						//window.location = 'fel.php?appointment_id=' + appointment_id;
						///e.preventDefault();
					} else {
						/*$("#alert").html("Error: Something is wrong when saving the data.");
						$('#alert').addClass('alert alert-danger');
						$('#alert').focus();*/
						alert('Error: Something is wrong when saving the data.');
					}
				},
				/*beforeSend: function() {
				    $('#alert').addClass('alert alert-success');
				    $("#alert").html("Loading...");
				    $('#alert').focus();
				}*/
			});
			//}
		}
	});


	
  $(document).on("click", "#update_fel", function() {
  	var answer = confirm("Updating this will reset/delete meal plan entry would you like to continue?");
	if (answer) {
    var id = document.getElementsByName("rowid[]");
    //var client_id = $("#update_fel").attr("client_id");
    var appointment_id = $("#appointment_id").val();
    var foodid = document.getElementsByName("foodid[]");
    var ex = document.getElementsByName("ex[]");
    var fel_cho = document.getElementsByName("fel_cho[]");
    var fel_pro = document.getElementsByName("fel_pro[]");
    var fel_fat = document.getElementsByName("fel_fat[]");
    var fel_cal = document.getElementsByName("fel_cal[]");
    var bfast = document.getElementsByName("bfast[]");
    var am = document.getElementsByName("am_snack[]");
    var lunch = document.getElementsByName("lunch[]");
    var pm = document.getElementsByName("pm_snack[]");
    var dinner = document.getElementsByName("dinner[]");
    var mn = document.getElementsByName("mn_snack[]");
    limit();
    var cho_val = document.getElementsByName("fel_cho[]");
    var pro_val = document.getElementsByName("fel_pro[]");
    var fat_val = document.getElementsByName("fel_fat[]");
    var cal_val = document.getElementsByName("fel_cal[]");
    cho_total = 0;
    pro_total = 0;
    fat_total = 0;
    cal_total = 0;
    for (var x = 0; x < cho_val.length; x++) {
      var cho = cho_val[x].value;
      cho_total += Number(cho);
      var pro = pro_val[x].value;
      pro_total += Number(pro);
      var fat = fat_val[x].value;
      fat_total += Number(fat);
      var cal = cal_val[x].value;
      cal_total += Number(cal);
    }
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
    if (cho_total >= cho_lower && cho_total <= cho_upper || pro_total >= pro_lower && pro_total <= pro_upper || fat_total >= fat_lower && fat_total <= fat_upper || cal_total >= cal_lower && cal_total <= cal_upper || total_ex1 == total_meal) {
      for (var i = 0; i < foodid.length; i++) {
        food_id = foodid[i].value;
        row_id = id[i].value;
        ex_1 = ex[i].value;
        fel_cho_1 = fel_cho[i].value;
        fel_pro_1 = fel_pro[i].value;
        fel_fat_1 = fel_fat[i].value;
        fel_cal_1 = fel_cal[i].value;
        bfast_1 = bfast[i].value;
        am_1 = am[i].value;
        lunch_1 = lunch[i].value;
        pm_1 = pm[i].value;
        dinner_1 = dinner[i].value;
        mn_1 = mn[i].value;
        //alert(row_id);
        $.ajax({ 
          type: "POST",
          url: base_url + 'admin/help/update_fel',
          data: "rowid=" + row_id + "&foodid=" + food_id +"&ex=" + ex_1 + "&fel_cho=" + fel_cho_1 + "&fel_pro=" + fel_pro_1 + "&fel_fat=" + fel_fat_1 + "&fel_cal=" + fel_cal_1 + "&bfast=" + bfast_1 + "&am_snack=" + am_1 + "&lunch=" + lunch_1 + "&pm_snack=" + pm_1 + "&dinner=" + dinner_1 + "&mn_snack=" + mn_1 ,
          success: function(html) {
            if (html == 'success') {
              //  $("#form1").fadeOut("normal");
              $("#shadow").fadeOut();
              //  $("#profile").html("<a href='logout.php' class='red' id='logout'>Logout</a>");
              // You can redirect to other page here....
              //window.location='administrator_panel.php';
              $("#alert").html("Food exchange lists successfully updated. You will now proceed to meal planner.");
              //alert('Food exchange lists successfully saved. You will now proceed to meal planner.');
              $('#alert').addClass('alert alert-success');
              $("#alert").focus();
              //document.getElementById('view').style.display= 'block';
              //window.location = 'create_meal_plan.php?appointment_id=' + appointment_id;
              setTimeout("location.reload(true);", 3000);
              //form1.reset();
             
            } else if (html == 'error1') {
              $("#alert").html("Error! You have already finished on the appointment. Please contact RND personnel for another appointment.");
              $('#alert').addClass('alert alert-danger');
            } else {
              $("#alert").html("Error: Something is wrong when saving the data.");
              $('#alert').addClass('alert alert-danger');
            }
          },
          beforeSend: function() {
            $('#alert').addClass('alert alert-success');
            $("#alert").html("Loading...");
          }
        });
      }
    } else {
      alert('Please complete food exchange list!');
      return false;
    }

    } else {
			return false;
			}
    return false;
  });


	var appointment_id = $("#appointment_id").val();
	$("#fel").load(base_url + 'admin/help/create_fel/' + appointment_id);
	$(document).on("click", "#new_fel", function(e) {
	$(".fel_data").hide("fade", 1000);
	$(".new_fel_data").show("fade", 1000);
	});

	var appointment_id = $("#appointment_id").val();
  	$("#edit_fel").load(base_url + 'admin/help/create_edit_fel/' + appointment_id);

  	var appointment_id = $("#appointment_id").val();
 	$("#meal_plan").load(base_url + 'admin/help/create_meal_plan/' + appointment_id);

 	$(document).on("click", ".add_menu", function(e) {
 		var i = $(this).data("meal_id");
 		var meal_id = $(this).attr("value");
 		var menu_name = $("#menu_name" + i).val();
 		var client_id = $(this).data("client_id");
 		var appointment_id = $(this).data("appointment_id");
 		// var ii =  $("#meal_id"+i).val();	
 		if (client_id == '' || isNaN(client_id)) {
 			alert('Please enter client id.');
 			return false;
 		} else if (appointment_id == '' || isNaN(appointment_id)) {
 			alert('Please enter appointment id.');
 			return false;
 		} else if (meal_id == '' || isNaN(meal_id)) {
 			alert('Please enter meal.');
 			return false;
 		} else if (menu_name == '') {
 			alert('Please enter menu name.');
 			return false;
 		} else {
 			$.ajax({
 				type: "POST",
 				url: base_url + 'admin/help/save_menu',
 				data: "menu_name=" + menu_name + "&client_id=" + client_id + "&appointment_id=" + appointment_id + "&value=" + meal_id,
 				success: function(html) {
 					//alert(data);
 					if (html == 'success') {
 						$("#alert" + i).html("Menu successfully created!");
 						$('#alert' + i).addClass('alert alert-success');
 						$("#alert" + i).focus();
 						setTimeout("location.reload(true);", 1000);
 					} else if (html == 'error1') {
 						$("#alert" + i).html("Error! You have already finished on the appointment. Please contact RND personnel for another appointment.");
 						$('#alert' + i).addClass('alert alert-danger');
 						$("#alert" + i).focus();
 						//	alert('Error! You have already finished on the appointment. Please contact RND personnel for another appointment.');
 					} else {
 						$("#alert" + i).html("Error: Something is wrong when saving the data.");
 						//	alert('Error: Something is wrong when saving the data.');
 						$('#alert' + i).addClass('alert alert-danger');
 						$("#alert" + i).focus();
 					}
 				},
 			});
 			return false;
 		}
 	});

 	$(document).on("click", "#update_menu", function(e) {
		var menu_id = $(this).data("menu_id");
		var menu_name = $("#menu_name").val();
		//alert(menu_id);
		if (menu_id == '' || isNaN(menu_id)) {
			alert('Please enter menu id.');
			return false;
		} else if (menu_name == '') {
			alert('Please enter menu name.');
			return false;
		} else {
			$.ajax({
				type: "POST",
				url: base_url+'admin/help/update_menu',
				data: "menu_name=" + menu_name + "&menu_id=" + menu_id,
				success: function(html) {
					if (html == 'success') {
						alert('Menu successfully updated!');
						setTimeout("location.reload(true);", 1000);
						e.preventDefault();
					} else {
						//$("#alert1").html("Error: Something is wrong when saving the data.");
						//document.getElementById('alert1').setAttribute("class","alert alert-danger");
						alert('Error: Something is wrong when saving the data.');
					}
				},
			});
			return false;
		}
	});
 	//$( ".add_meal" ).each(function(index) {
 	$(document).on("click", ".add_meal", function() {
 		//menu_id
 		var i = $(this).data("menu_id");
 		//meal id
 		var menu_id = $(this).attr("value");
 		var meal_id = $("#meal_id" + i).val();
 		var meal = $("#meal" + i).val();
 		var foodgroup = $("#foodgroup" + i).val();
 		var foodgroup_content = $("#foodgroup_content" + i).val();
 		var foodlist = $("#foodlist" + i).val();
 		var fooditem_id = $("#fooditem_id" + i).val();
 		var ex = $("#ex" + i).val();
 		var qty_val = $("#qty_val" + i).val();
 		var hh_val = $("#hh_val" + i).val();
 		var client_id = $(this).data("client_id");
 		var appointment_id = $(this).data("appointment_id");
 		var decimal = /^\d{0,4}(\.\d{0,2})?$/;
 		var ii = $("#meal_id" + i).val();
 		//alert(i);
 		if (client_id == '' || isNaN(client_id)) {
 			alert('Please enter client id.');
 			return false;
 		} else if (appointment_id == '' || isNaN(appointment_id)) {
 			alert('Please enter appointment id.');
 			return false;
 		} else if (meal_id == '' || isNaN(meal_id)) {
 			alert('Please enter meal.');
 			return false;
 		} else if (foodgroup == 0) {
 			alert('Please enter foodgroup.');
 			return false;
 		} else if (foodlist == 0) {
 			alert('Please enter foodlist.');
 			return false;
 		}
 		/*else if (fooditem_id == '' || isNaN(fooditem_id)) {
			alert('Please enter fooditem.');
			return false;
		}*/
 		else if (ex == '' || !ex.match(decimal)) {
 			alert('Please enter a valid exchange.');
 			return false;
 		}
 		/*else if (qty_val == '' || !qty_val.match(decimal)) {
			alert('Please enter quantity.');
			return false;
		}*/
 		/*else if(hh_val == '' ){
 			alert('Please enter household measure value.');
 			return false;
 		}	*/
 		else if (meal_id == '' || isNaN(meal_id)) {
 			alert('Please enter meal.');
 			return false;
 		} else {
 			$.ajax({
 				type: "POST",
 				url: base_url + 'admin/help/save_meal',
 				data: "client_id=" + client_id + "&appointment_id=" + appointment_id + "&menu_id=" + menu_id + "&meal_id=" + meal_id + "&meal=" + meal + "&foodgroup=" + foodgroup + "&foodgroup_content=" + foodgroup_content + "&foodlist=" + foodlist + "&fooditem_id=" + fooditem_id + "&ex=" + ex + "&qty_val=" + qty_val + "&hh_val=" + hh_val,
 				success: function(html) {
 					//$("#sample_div"+x).html(html);
 					//alert(data);
 					if (html == 'success') {
 						$("#alert" + ii).html("Meal successfully saved!");
 						$('#alert' + ii).addClass('alert alert-success');
 						$("#alert" + ii).focus();
 						setTimeout("location.reload(true);", 1000);
 					} else if (html == 'error1') {
 						$("#alert" + ii).html("It seems that exchange is not equal to the encoded food exchange lists. Please try again. Thank you.");
 						$('#alert' + ii).addClass('alert alert-danger');
 						$("#alert" + ii).focus();
 					} else {
 						$("#alert" + ii).html("Error: Something is wrong when saving the data.");
 						$('#alert' + ii).addClass('alert alert-danger');
 						$("#alert" + ii).focus();
 					}
 				},
 			});
 			return false;
 		}
 		// ff
 		//  });
 	});
 	$(function() {
 		$(document).on("click", ".delete_meal", function() {
 			var id = $(this).attr("id");
 			//var fg_combination_id = $(this).data("fg_combination_id");
 			var dataString = 'id=' + id;
 			var parent = $(this).closest("tr");
 			var answer = confirm("Are you sure you want to delete from the database?");
 			if (answer) {
 				$.ajax({
 					type: "POST",
 					url: base_url + 'admin/help/delete_meal',
 					data: dataString,
 					cache: false,
 					beforeSend: function() {
 						parent.animate({
 							'backgroundColor': '#fb6c6c'
 						}, 300).animate({
 							opacity: 0.35
 						}, "slow");;
 					},
 					success: function(data) {
 						//alert(data)
 						parent.slideUp('slow', function() {
 							$(this).remove();
 						});
 						setTimeout("location.reload(true);", 1000);
 					}
 				});
 			} else {
 				return false;
 			}
 			return false;
 		});
 	});
 	$(document).on("click", ".delete_menu", function() {
 		var id = $(this).attr("id");
 		var dataString = 'id=' + id;
 		var parent = $(this).closest("div");
 		var answer = confirm("Are you sure you want to delete from the database?");
 		if (answer) {
 			$.ajax({
 				type: "POST",
 				url: base_url + 'admin/help/delete_menu',
 				data: dataString,
 				cache: false,
 				/* beforeSend: function()
 				 {
 				 parent.animate({'backgroundColor':'#fb6c6c'},300).animate({ opacity: 0.35 }, "slow");;
 				 }, */
 				success: function() {
 					//alert(data);
 					parent.slideUp('slow', function() {
 						$(this).remove();
 					});
 					setTimeout("location.reload(true);", 1000);
 				}
 			});
 		} else {
 			return false;
 		}
 		return false;
 	});


 		$(document).on("click", "#edit_meal2", function() {
		//meal id
		var id1 = $(this).data("id1");
		//var fg_combination_id1 = $(this).data("fg_comb_id1");
		var client_id1 = $(this).data("client_id1");
		var appointment_id1 = $(this).data("appointment_id1");
		var meal1 = $(this).data("meal1");
		var meal_id1 = $(this).data("meal_id1");
		var menu_id1 = $(this).data("menu_id1");
		//menu_id
		var i = $(this).data("menu_id1");
		// var i= document.getElementById("menu_id1").value;
		var foodgroup1 = $("#foodgroup0" + i).val();
		var foodgroup_content1 = $("#foodgroup_content0" + i).val();
		var foodlist1 = $("#foodlist0" + i).val();
		var fooditem_id1 = $("#fooditem_id0" + i).val();
		var ex1 = $("#ex0" + i).val();
		var qty_val1 = $("#qty_val0" + i).val();
		var hh_val1 = $("#hh_val0" + i).val();
		//var hh_val_combination1 = $("#hh_val_combination1" + i).val();
		var decimal1 = /^\d{0,4}(\.\d{0,2})?$/;
		if (client_id1 == '' || isNaN(client_id1)) {
			alert('Error when submitting the form. Please enter client id.');
			return false;
		} else if (appointment_id1 == '' || isNaN(appointment_id1)) {
			alert('Error when submitting the form.Please enter appointment id.');
			return false;
		} else if (i == '' || isNaN(i)) {
			alert('Error when submitting the form. Please enter menu id.');
			return false;
		} else if (meal_id1 == '' || isNaN(meal_id1)) {
			alert('Error when submitting the form. Please enter meal id.');
			return false;
		} else if (foodgroup1 == 0) {
			alert('Please enter food group.');
			return false;
		} else if (foodlist1 == 0) {
			alert('Error when submitting the form. Please enter food list.');
			return false;
		} /*else if (fooditem_id1 == '' || isNaN(fooditem_id1)) {
			alert('Error when submitting the form. Please enter food item.');
			return false;
		}*/ else if (ex1 == '' || !ex1.match(decimal1)) {
			alert('Error when submitting the form. Please enter exchange with atleast 2 decimal places.');
			return false;
		} /*else if (qty_val1 == '' || !qty_val1.match(decimal1)) {
			alert('Error when submitting the form. Please enter quantity with atleast 2 decimal places.');
			return false;
		}*/
		/* else if(hh_val1 == '' || !hh_val1.match(decimal1)){
		 	alert('Error when submitting the form. Please enter household measure with atleast 2 decimal places.');
			return false;
		 }*/
		else if (meal1 == '') {
			alert('Error when submitting the form. Please enter meal.');
			return false;
		} else {
			$.ajax({
				type: "POST",
				url: base_url+'admin/help/update_meal',
				data: "id1=" + id1 + "&client_id1=" + client_id1 + "&appointment_id1=" + appointment_id1 + "&menu_id1=" + menu_id1 + "&meal_id1=" + meal_id1 + "&foodgroup1=" + foodgroup1 + "&foodgroup_content1=" + foodgroup_content1 + "&foodlist1=" + foodlist1 + "&fooditem_id1=" + fooditem_id1 + "&ex1=" + ex1 + "&qty_val1=" + qty_val1 + "&hh_val1=" + hh_val1 +  "&meal1=" + meal1,
				success: function(html) {
					
					if (html == 'success') {
						$("#shadow").fadeOut();
						
						alert('Meal successfully updated.');
						setTimeout("location.reload(true);", 1000);
					} else if (html == 'error1') {
						
						alert('It seems that exchange is not equal to the encoded food exchange lists. Please try again. Thank you.');
					} else {
						
						alert('Error: Something is wrong when saving the data.');
					}
				},
				/* beforeSend:function()
			{
                 //$("#alert1").html("Loading...");
				 //document.getElementById('alert1').setAttribute("class","alert alert-success");
            }*/
			});
		}
		return false;
	});


	$(document).on("click", "#new_recommendation", function() {
		$("#recommendation_result").hide("fade", 1000);
		$("#recommendation_form").show("fade", 1000);
	});
	/*$(document).on("change", "#searchrecord", function() {
		var searchrecord = $(this).val();
		
		if(searchrecord == 0){
			return false;
		}
		else{
			window.open( 'print_all_result.php?appointment_id=' + searchrecord);
		}
		
	});*/
	$('#fooditems').dataTable({
		"aaSorting": [],
		stateSave: true,
	});
	$(function() {
		$("#fooditem").dialog({
			autoOpen: false,
			title: '',
			resizable: false,
			modal: true,
			width: 700,
			create: function(event, ui) {
				// Set max-width
				$(this).parent().css("maxWidth", "800px");
			},
			//close: function(ev, ui) { window.location.reload() }			
		});
		$(".ui-dialog").addClass("ui-widget-header");
		$(".ui-dialog").addClass("ui-widget-content");
		$(document).on('click', '.edit_fooditem', function(e) {
			e.preventDefault();
			var id = $(this).attr("id");
			var dataString = 'id=' + id;
			$.ajax({
				type: "GET",
				url: base_url + 'admin/help/edit_fooditem',
				data: dataString,
				success: function(res) {
					$("#fooditem").html(res);
					$("#fooditem").dialog("open");
					$('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
					$('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
				}
			});
		});
	});
	$(function() {
		$("#fooditem").dialog({
			autoOpen: false,
			title: '',
			resizable: false,
			modal: true,
			width: 500,
			create: function(event, ui) {
				// Set max-width
				$(this).parent().css("maxWidth", "800px");
			},
			//close: function(ev, ui) { window.location.reload() }			
		});
		$(".ui-dialog").addClass("ui-widget-header");
		$(".ui-dialog").addClass("ui-widget-content");
		$(document).on('click', '.add_fooditem', function(e) {
			e.preventDefault();
			var id = $(this).attr("id");
			var dataString = 'id=' + id;
			$.ajax({
				type: "GET",
				url: base_url + 'admin/help/add_fooditem',
				data: dataString,
				success: function(res) {
					$("#fooditem").html(res);
					$("#fooditem").dialog("open");
					$('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
					$('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
				}
			});
		});
	});
	$(document).on("change", "#add_foodgroup", function() {
		var foodgroup = $(".foodgroup").val();
		$.ajax({
			type: "POST",
			url: base_url + 'admin/help/get_foodlists',
			data: "foodgroup=" + foodgroup,
			success: function(data) {
				document.getElementById("add_foodlist").innerHTML = data;
				//alert(foodlist);
			},
		});
	});
	//$(".add_fooditem").each(function(index) {
	$(document).on("focusout", "#add_foodlist", function() {
		$("#add_fooditem").autocomplete({
			source: base_url + 'admin/help/get_all_fooditems',
			select: function(event, ui) {
					$('#add_fooditem').val(ui.item.value);
					$('#add_fooditem_id').val(ui.item.id);
				}
				/*change: function(event, ui) {
					if (ui.item == null) {
						$("#add_fooditem" ).val('');
						$("#add_fooditem" ).focus();
					}
				},
				focus: function(event, ui) {
					this.value = ui.item.label;
					event.preventDefault(); // Prevent the default focus behavior.
				}*/
		});
		// });	
	});
	//});	
	$(document).on("change", "#add_foodgroup", function() {
		var foodgroup = document.getElementById("add_foodgroup")
		var foodgroup_content = document.getElementById("add_foodgroup_content")
		for (var i = 0; i < foodgroup.options.length; i++) {
			if (foodgroup.options[i].selected == true) {
				if (foodgroup.options[i].value == 14) {
					//myselect1.options[i].selected =0;
					foodgroup_content.options[0].selected = true;
					$("#foodgroup_content_div").show("highlight");
				} else {
					foodgroup_content.options[i].selected = i;
					$("#foodgroup_content_div").hide();
					//console.log(i);
				}
				//alert("Selected Option's index: "+i)
				//break
			}
		}
	});
	$(document).on("change", "#add_foodgroup1", function() {
		var foodgroup = $(".foodgroup").val();
		$.ajax({
			type: "POST",
			url: base_url + 'admin/help/get_foodlists',
			data: "foodgroup=" + foodgroup,
			success: function(data) {
				document.getElementById("add_foodlist1").innerHTML = data;
			},
		});
	});
	$(document).on("change", "#add_foodgroup1", function() {
		var foodgroup = document.getElementById("add_foodgroup1")
		var foodgroup_content = document.getElementById("add_foodgroup_content1")
		for (var i = 0; i < foodgroup.options.length; i++) {
			if (foodgroup.options[i].selected == true) {
				if (foodgroup.options[i].value == 14) {
					//myselect1.options[i].selected =0;
					foodgroup_content.options[0].selected = true;
					$("#foodgroup_content_div1").show("highlight");
				} else {
					foodgroup_content.options[i].selected = i;
					$("#foodgroup_content_div1").hide();
					//console.log(i);
				}
				//alert("Selected Option's index: "+i)
				//break
			}
		}
	});


	   $('#comments').dataTable({
		 "aaSorting": [],

	});

$(document).on("click", "#datepick", function() {
	$.ajax({
	url: base_url + 'admin/help/get_event_dates',
	method: "GET",
	success: function(retrieved_data) {
		$("#datepick").datepicker({
			dateFormat: 'yy-mm-dd',
			//beforeShowDay: event_dates,
			beforeShowDay: function(date) {
				// Your code here.. use something like this
				Obj = retrieved_data;
				var myBadDates = Obj;
				var $return = true;
				var $returnclass = "available";
				$checkdate = $.datepicker.formatDate('yy-mm-dd', date);
				// start loop
				for (var x in myBadDates) {
					$myBadDates = new Array(myBadDates[x]['event_date']);
					for (var i = 0; i < $myBadDates.length; i++)
					//console.log(myBadDates[x]['whole_day']);
						if ($myBadDates[i] == $checkdate) {
						//console.log($myBadDates[i]);
							$return = false;
							if (myBadDates[x]['whole_day'] == 1 && myBadDates[x]['all_rnd'] == 1) {
							$returnclass = "unavailable";
							return [true, 'unavailable', event.text];
							} else {
							$returnclass = "unavailable";
							return [true, 'ui-state-highlight', event.text];
							}
						}
					}
				//end loop
				return [$return, $returnclass];
				}
			});
		//console.log(Obj);
		}
	});

});

$(document).on("click", "#timepick1", function() {
$("#timepick1").timepicker({
	timeFormat: 'h:mm TT',
	hourMin: 8,
	hourMax: 17
});
});

$(document).on("click", "#timepick2", function() {
$("#timepick2").timepicker({
	timeFormat: 'h:mm TT',
	hourMin: 8,
	hourMax: 17
});	

});	
	
	$(document).on("click", "#confirm_event", function() {
		// $("#confirm").click(function(){
		var dateformat = /^\d{4}-\d{1,2}-\d{1,2}$/;
		var timeformat = /^[01]?\d:[0-5]\d( (am|pm))?$/i;
		var event_type = $("#event_type").val();
		var custom_event = $("#custom_event").val();
		var datepick = $("#datepick").val();
		var whole_day_check = $("#whole_day").prop('checked');
		var whole_day = $("#whole_day").val();
		var timepick1 = $("#timepick1").val();
		var timepick2 = $("#timepick2").val();
		var rnd = $("#rnd").val();
		var all_rnd = $("#all_rnd").val();
		var status = $("#status").val();
		var remarks = $("#remarks").val();
		//var uid = $("#confirm").data("uid");
		var user_type = $(this).data("user_type");
		/*if(user_type==1){
				var rnd=$("#rnd").val();
				var all_rnd= $("#all_rnd").val();
			if(all_rnd ==0 && rnd == 0){
				alert("Please select RND.");	
				return false;	
				}
					}
			else{
				var all_rnd= $("#all_rnd").val();	
				if(all_rnd == 1){
					var rnd= $("#rnd").val('0');
				}
				else{
					var rnd= $("#rnd").val();
				}
			}*/
		if (event_type == 0) {
			alert("Please choose event type.");
			$("#event_type").focus();
			return false;
		} else if (datepick == '' || !dateformat.test(datepick)) {
			alert("Please enter correct date format.");
			$("#datepick").focus();
			return false;
		}
		/*else if (all_rnd == 0 && rnd == 0) {
		        alert("Please select RND.");
		        $("#rnd").focus();
		        return false;
		    } */
		else if (whole_day_check == false && !timeformat.test(timepick1) && !timeformat.test(timepick2)) {
			alert("Please enter correct time format.");
			$("#timepick1").focus();
			return false;
		} else if (status == 0) {
			alert("Please confirm event.");
			$("#status").focus();
			return false;
		} else {
			$.ajax({
				type: "POST",
				url: base_url + 'admin/help/save_event',
				data: "event_type=" + event_type + "&custom_event=" + custom_event + "&datepick=" + datepick + "&whole_day=" + whole_day + "&timepick1=" + timepick1 + "&timepick2=" + timepick2 + "&rnd=" + rnd + "&all_rnd=" + all_rnd + "&status=" + status + "&remarks=" + remarks,
				success: function(html) {
					if (html == 'success') {
						$("#alert").html("You have successfully scheduled an event.");
						$('#alert').removeClass("alert alert-danger");
						$('#alert').addClass('alert alert-success');
						// $('#alert').removeClass('alert alert-danger');
						$("#alert").focus();
						setTimeout("location.reload(true);", 3000);
					} else if (html == 'error') {
						$("#alert").html("RND/ Time and Date not available.");
						$('#alert').addClass('alert alert-danger');
						$("#alert").focus();
					} else {
						$("#alert").html("Error: Something is wrong when saving the data.");
						$('#alert').addClass('alert alert-danger');
						$("#alert").focus();
					}
				},
				beforeSend: function() {
					$("#alert").html("Loading...");
					$('#alert').addClass('alert alert-success');
				}
			});
		}
		return false;
	});


	$(document).on("click", "#edit_event", function() {
		var dateformat = /^\d{4}-\d{1,2}-\d{1,2}$/;
		var timeformat = /^[01]?\d:[0-5]\d( (am|pm))?$/i;
		var event_type = $("#event_type").val();
		var custom_event = $("#custom_event").val();
		var datepick = $("#datepick").val();
		var whole_day_check = $("#whole_day").prop('checked');
		var whole_day = $("#whole_day").val();
		var timepick1 = $("#timepick1").val();
		var timepick2 = $("#timepick2").val();
		var status = $("#status").val();
		var rnd = $("#rnd").val();
		var all_rnd = $("#all_rnd").val();
		var remarks = $("#remarks").val();
		var uid = $(this).data("uid");
		var user_type = $(this).data("user_type");
		var id = $(this).data("id");
		if (event_type == 0) {
			alert("Please choose event type.");
			$("#event_type").focus();
			return false;
		} else if (datepick == '' || !dateformat.test(datepick)) {
			alert("Please enter correct date format.");
			$("#datepick").focus();
			return false;
		} else if (whole_day_check == false && !timeformat.test(timepick1) && !timeformat.test(timepick2)) {
			alert("Please enter correct time format.");
			$("#timepick1").focus();
			return false;
		} else if (status == 0) {
			alert("Please confirm event.");
			$("#status").focus();
			return false;
		} else {
			$.ajax({
				type: "POST",
				url: base_url + 'admin/help/update_event',
				data: "event_type=" + event_type + "&custom_event=" + custom_event + "&datepick=" + datepick + "&whole_day=" + whole_day + "&timepick1=" + timepick1 + "&timepick2=" + timepick2 + "&rnd=" + rnd + "&all_rnd=" + all_rnd + "&status=" + status + "&remarks=" + remarks + "&id=" + id,
				success: function(html) {
					//alert(data);
					if (html == 'success') {
						$("#alert").html("Calendar successfully updated.");
						$('#alert').addClass('alert alert-success');
						setTimeout("location.reload(true);", 3000);
						$("#alert").focus();
					} else if (html == 'error') {
						$("#alert").html("RND/ Time and Date not available. Please select other date and time. Thank you.");
						$('#alert').addClass('alert alert-danger');
						$("#alert").focus();
					} else {
						$("#alert").html("Error: Something is wrong when saving the data.");
						$('#alert').addClass('alert alert-danger');
						$("#alert").focus();
					}
				},
				beforeSend: function() {
					$("#alert").html("Loading...");
					$('#alert').addClass('alert alert-success');
					$("#alert").focus();
				}
			});
		}
		return false;
	});


	$(document).on("click", ".delete_event", function() {
 		var id = $(this).attr("id");
 		var dataString = 'id=' + id;
 		var parent = $(this).closest("div");
 		var answer = confirm("Are you sure you want to delete from the database?");
 		if (answer) {
 			$.ajax({
 				type: "POST",
 				url: base_url + 'admin/help/delete_event',
 				data: dataString,
 				cache: false,
 				/* beforeSend: function()
 				 {
 				 parent.animate({'backgroundColor':'#fb6c6c'},300).animate({ opacity: 0.35 }, "slow");;
 				 }, */
 				success: function() {
 					//alert(data);
 					parent.slideUp('slow', function() {
 						$(this).remove();
 					});
 					setTimeout("location.reload(true);", 1000);
 				}
 			});
 		} else {
 			return false;
 		}
 		return false;
 	});

	$(document).on("click", ".delete_request", function() {
 		var id = $(this).attr("id");
 		var dataString = 'id=' + id;
 		var parent = $(this).closest("div");
 		var answer = confirm("Are you sure you want to delete from the database?");
 		if (answer) {
 			$.ajax({
 				type: "POST",
 				url: base_url + 'admin/help/delete_request',
 				data: dataString,
 				cache: false,
 				/* beforeSend: function()
 				 {
 				 parent.animate({'backgroundColor':'#fb6c6c'},300).animate({ opacity: 0.35 }, "slow");;
 				 }, */
 				success: function() {
 					//alert(data);
 					parent.slideUp('slow', function() {
 						$(this).remove();
 					});
 					setTimeout("location.reload(true);", 1000);
 				}
 			});
 		} else {
 			return false;
 		}
 		return false;
 	});



	

$(function() {
	$("#graph_dialog").dialog({
		autoOpen: false,
		title: '',
		resizable: false,
		modal: true,
		width: 500,
		create: function(event, ui) {
			// Set max-width
			$(this).parent().css("maxWidth", "500px");
		},
	});
	//$(".ui-dialog").addClass("ui-widget-header");
	$(".ui-dialog").addClass("ui-widget-content");
	$(document).on("click", ".show_wt_graph",function(e) {
		e.preventDefault();
		var id = $(this).attr("id");
		var dataString = 'client_id=' + id;
		//var client_id= document.getElementById("client_id").value;
		$.ajax({
			type: "GET",
			url: base_url + 'admin/help/wt_graph?client_id=' + id,
			data: dataString,
			success: function(res) {
				$("#graph_dialog").html(res);
				$("#graph_dialog").dialog("open");
				$('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
				$('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
			}
		});
	});
});




$(function() {
	$("#edit_dialog").dialog({
		autoOpen: false,
		title: '',
		resizable: false,
		modal: true,
		width: 600,
		create: function(event, ui) {
				// Set max-width
				$(this).parent().css("maxWidth", "600px");
			}
			//close: function(ev, ui) { window.location.reload() }	
	});
	////$(".ui-dialog").addClass("ui-widget-header");
	$(".ui-dialog").addClass("ui-widget-content");
	$(document).on("click",".edit_recommendation", function(e) {
		e.preventDefault();
		var id = $(this).attr("id");
		var dataString = 'id=' + id;
		$.ajax({
			type: "GET",
			url: base_url + 'admin/help/edit_recommendation',
			data: dataString,
			success: function(res) {
				$("#edit_dialog").html(res);
				$("#edit_dialog").dialog("open");
				$('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
				$('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
			}
		});
	});
});




 $(document).on("change", "#nutrition_id", function() {
var a =  $(this).val();
//var baseurl = base_url + 'help/search_foodtracker/'+a;
$('#open').attr("href", base_url + 'admin/help/default_meal_plan/'+a);

});


 $(document).on("click", ".add_default_menu", function() {

			var i = $(this).data("meal_id");
			var meal_id = $(this).attr("value");
			var menu_name = $("#menu_name" + i).val();
			 var nutrition_id = $(this).data("nutrition_id");
			 if (meal_id == '' || isNaN(meal_id)) {
				alert('Please enter meal.');
				return false;
			} else if (menu_name == '') {
				alert('Please enter menu name.');
				return false;
			} else {
				$.ajax({
					type: "POST",
					url: base_url+'admin/help/save_default_menu',
					data: "menu_name="+menu_name+"&nutrition_id="+nutrition_id+"&value="+meal_id,
					success: function(html) {

						//alert(data);
						if (html == 'success') {
							$("#alert" + i).html("Menu successfully created!");
							$('#alert'+i).addClass('alert alert-success');
							$("#alert" + i).focus();
							setTimeout("location.reload(true);", 1000);
						}  else {
							$("#alert" + i).html("Error: Something is wrong when saving the data.");
							//	alert('Error: Something is wrong when saving the data.');
							$('#alert'+i).addClass('alert alert-danger');
							$("#alert" + i).focus();
						}
					},
				});
				return false;
			}
		});

	

	$(document).on("click", ".delete_default_menu", function() {
		var id = $(this).attr("id");
		var dataString = 'id=' + id;
		var parent = $(this).closest("div");
		var answer = confirm("Are you sure you want to delete from the database?");
		if (answer) {
			$.ajax({
				type: "POST",
				url: base_url+'admin/help/delete_default_menu',
				data: dataString,
				cache: false,
				/* beforeSend: function()
				 {
				 parent.animate({'backgroundColor':'#fb6c6c'},300).animate({ opacity: 0.35 }, "slow");;
				 }, */
				success: function(data) {
					parent.slideUp('slow', function() {
						$(this).remove();
					});
					setTimeout("location.reload(true);",1000);
				}
			});
		} else {
			return false;
		}
		return false;
	});


	$(document).on("click", ".add_default_meal", function() {
		//menu_id
		var i = $(this).data("menu_id");
		//meal id
		var menu_id = $(this).attr("value");
		var meal_id = $("#meal_id" + i).val();
		var meal = $("#meal" + i).val();
		var foodgroup = $("#foodgroup" + i).val();
		var foodgroup_content = $("#foodgroup_content" + i).val();
		var foodlist = $("#foodlist" + i).val();
		var fooditem_id = $("#fooditem_id" + i).val();
		var ex = $("#ex" + i).val();
		var qty_val = $("#qty_val" + i).val();
		var hh_val = $("#hh_val" + i).val();
		var nutrition_id = $(this).data("nutrition_id");
		var decimal = /^\d{0,4}(\.\d{0,2})?$/;
		var ii = $("#meal_id" + i).val();
		
	 	if (meal_id == '' || isNaN(meal_id)) {
			alert('Please enter meal.');
			return false;
		} else if (foodgroup == 0) {
			alert('Please enter foodgroup.');
			return false;
		} else if (foodlist == 0) {
			alert('Please enter foodlist.');
			return false;
		}  else if (ex == '' || !ex.match(decimal)) {
			alert('Please enter a valid exchange.');
			return false;
		} 
		else if (meal_id == '' || isNaN(meal_id)) {
			alert('Please enter meal.');
			return false;
		} else {
			$.ajax({
				type: "POST",
				url: base_url+'admin/help/save_default_meal',
				data: "nutrition_id="+nutrition_id+"&menu_id="+menu_id+"&meal_id="+meal_id+"&meal="+meal+"&foodgroup="+foodgroup+"&foodgroup_content="+foodgroup_content+"&foodlist="+foodlist+"&fooditem_id="+fooditem_id+"&ex="+ex+"&qty_val="+qty_val+"&hh_val="+hh_val,

				//"nutrition_id="+nutrition_id+"&menu_id="+menu_id+"&meal_id="+meal_id+"&meal="+meal+"&foodgroup="+foodgroup+"&foodgroup_content="+foodgroup_content+"&foodlist="+foodlist+"&fooditem_id="+fooditem_id+"&ex="+ex+"&qty_val="+qty_val+"&hh_val="+hh_val,
				success: function(html) {
					//$("#sample_div"+x).html(html);
					//alert(data);
					if (html == 'success') {
						$("#alert" + ii).html("Meal successfully saved!");
						$('#alert'+ii).addClass('alert alert-success');
						$("#alert" + ii).focus();
						setTimeout("location.reload(true);", 1000);
					} else if (html == 'error1') {
						$("#alert" + ii).html("It seems that exchange is not equal to the encoded food exchange lists. Please try again. Thank you.");
						$('#alert'+ii).addClass('alert alert-danger');
						$("#alert" + ii).focus();
					} else {
						$("#alert" + ii).html("Error: Something is wrong when saving the data.");
						$('#alert'+ii).addClass('alert alert-danger');
						$("#alert" + ii).focus();
					}
				},
			});
			return false;
		}
		// ff
		//  });
	});


var data_id = $("#data_id").val();
$("#default_meal_plan").load(base_url+'admin/help/create_default_meal_plan/'+data_id);


	

$(function() {
		$(document).on("click", ".delete_default_meal", function() {
			var id = $(this).attr("id");
			//var fg_combination_id = $(this).data("fg_combination_id");
			var dataString = 'id=' + id;
			var parent = $(this).closest("tr");
			var answer = confirm("Are you sure you want to delete from the database?");
			if (answer) {
				$.ajax({
					type: "POST",
					url: base_url+'admin/help/delete_default_meal',
					data: dataString,
					cache: false,
					beforeSend: function() {
						parent.animate({
							'backgroundColor': '#fb6c6c'
						}, 300).animate({
							opacity: 0.35
						}, "slow");;
					},
					success: function(data) {
						//alert(data)
						parent.slideUp('slow', function() {
							$(this).remove();
						});
						setTimeout("location.reload(true);",1000);
					}
				});
			} else {
				return false;
			}
			return false;
		});
	});

		$(document).on("click", ".delete_default_menu1", function() {
		var id = $(this).attr("id");
		var dataString = 'id=' + id;
		var parent = $(this).closest("div");
		var answer = confirm("Are you sure you want to delete from the database?");
		if (answer) {
			$.ajax({
				type: "POST",
				url: base_url+'admin/help/delete_default_menu',
				data: dataString,
				cache: false,
				/* beforeSend: function()
				 {
				 parent.animate({'backgroundColor':'#fb6c6c'},300).animate({ opacity: 0.35 }, "slow");;
				 }, */
				success: function() {
					//alert(data);
					parent.slideUp('slow', function() {
						$(this).remove();
					});
					setTimeout("location.reload(true);",1000);
				}
			});
		} else {
			return false;
		}
		return false;
	});


$(document).on("click", "#update_default_menu", function(e) {
		var menu_id = $(this).data("menu_id");
		var menu_name = $("#menu_name").val();
		//alert(menu_id);
		if (menu_id == '' || isNaN(menu_id)) {
			alert('Please enter menu id.');
			return false;
		} else if (menu_name == '') {
			alert('Please enter menu name.');
			return false;
		} else {
			$.ajax({
				type: "POST",
				url: base_url+'admin/help/update_default_menu',
				data: "menu_name=" + menu_name + "&menu_id=" + menu_id,
				success: function(html) {
					if (html == 'success') {
						alert('Menu successfully updated!');
						setTimeout("location.reload(true);", 1000);
						e.preventDefault();
					} else {
						//$("#alert1").html("Error: Something is wrong when saving the data.");
						//document.getElementById('alert1').setAttribute("class","alert alert-danger");
						alert('Error: Something is wrong when saving the data.');
					}
				},
			});
			return false;
		}
	});




$(document).on("click", "#update_default_meal1", function() {
	
	//meal id
	
	 var id1=  $(this).data("id1");
	// var fg_combination_id1=  $(this).data("fg_comb_id1");
   //	 var client_id1= $(this).data("client_id1");
   	// var appointment_id1=  $(this).data("appointment_id1");
	 var meal1=  $(this).data("meal1");
	 var meal_id1=  $(this).data("meal_id1");
	 var menu_id1=  $(this).data("menu_id1");
	 var nutrition_id=  $(this).data("nutrition_id");

	

	 //menu_id
   	 var i =  $(this).data("menu_id1");
   	// var i= document.getElementById("menu_id1").value;
	
     var foodgroup1=  $("#foodgroup0"+i).val();
	 var foodgroup_content1 =  $("#foodgroup_content0"+i).val();
	 var foodlist1= $("#foodlist0"+i).val();
	 
	 
	 var fooditem_id1= $("#fooditem_id0"+i).val();
	 var ex1= $("#ex0"+i).val();
	 var qty_val1= $("#qty_val0"+i).val();
	 var hh_val1= $("#hh_val0"+i).val();
	
	 var decimal1=  /^\d{0,4}(\.\d{0,2})?$/;
	
	
	

 if(i == '' || isNaN(i)){
	 	alert('Error when submitting the form. Please enter menu id.');
		return false;
	 }
	 
	  else if(meal_id1== '' || isNaN(meal_id1)){
	 	alert('Error when submitting the form. Please enter meal id.');
		return false;
	 }
	 
	  else if(foodgroup1 == 0){
	 	alert('Please enter food group.');
		return false;
	 }
	 
	   else if(foodlist1 == 0){
	 	alert('Error when submitting the form. Please enter food list.');
		return false;
	 }
	 
	 /* else if(fooditem_id1 == '' || isNaN(fooditem_id1)){
	 	alert('Error when submitting the form. Please enter fooditem.');
		return false;
	 }*/
	 
	  else if(ex1 == '' || !ex1.match(decimal1)){
	 	alert('Error when submitting the form. Please enter exchange with atleast 2 decimal places.');
		return false;
	 }
	  /*else if(qty_val1 == '' || !qty_val1.match(decimal1)){
	 	alert('Error when submitting the form. Please enter quantity with atleast 2 decimal places.');
		return false;
	 }  */
	/* else if(hh_val1 == '' || !hh_val1.match(decimal1)){
	 	alert('Error when submitting the form. Please enter household measure with atleast 2 decimal places.');
		return false;
	 }*/
	 else if(meal1 == '' ){
	 	alert('Error when submitting the form. Please enter meal.');
		return false;
	 }
	 
	 
	 else{
	 	
	 
         $.ajax({
          type:"POST",
          url: base_url+'admin/help/update_default_meal',
          data:
		"id1="+id1+"&menu_id1="+menu_id1+"&meal_id1="+meal_id1+"&foodgroup1="+foodgroup1+"&foodgroup_content1="+foodgroup_content1+"&foodlist1="+foodlist1+"&fooditem_id1="+fooditem_id1+"&ex1="+ex1+"&qty_val1="+qty_val1+"&hh_val1="+hh_val1+"&meal1="+meal1+"&nutrition_id="+nutrition_id,
                   

            success: function(html){
		
			if(html=='success'){
          
				$("#shadow").fadeOut();
				// $("#alert1").html("Meal successfully updated.");
				//document.getElementById('alert1').setAttribute("class","alert alert-success");
				alert('Meal successfully updated.');
					 
	
				setTimeout("location.reload(true);",1000);
		
			
              }
			  
			  else if(html=='error1'){
			  	  
					alert('It seems that exchange is not equal to the encoded food exchange lists. Please try again. Thank you.');
					
			  }
			  
	     else{
               		alert('Error: Something is wrong when saving the data.');
              }
            },
       
        });
	}
         return false;
    });
	



$(document).on("click", "#addfooditem", function() {
			var foodgroup = $("#add_foodgroup").val();
			var foodlist = $("#add_foodlist").val();
			var fooditem_id = $("#add_fooditem_id").val();
			var fooditem = $("#add_fooditem").val();
			var foodgroup_content = $("#add_foodgroup_content").val();
			var wt_ep = $("#add_wt_ep").val();
			var wt_ap = $("#add_wt_ap").val();
			var ex = $("#add_ex").val();
			var hh_m = $("#add_hh_m").val();
			var dimension = $("#add_dimension").val();
			if (foodgroup == 0) {
				$("#alert").html("Please select foodgroup.");
				$('#alert').addClass('alert alert-danger');
				$("#alert").focus();
				return false;
			} else if (foodlist == 0) {
				$("#alert").html("Please select foodlist.");
				$('#alert').addClass('alert alert-danger');
				$("#alert").focus();
				return false;
			}
			/*else if(wt_ep == '' || isNaN(wt_ep)){
				$("#alert").html("Please enter weight ep.");
				$('#alert').addClass('alert alert-danger');
				$("#alert").focus();
				return false;
			}
			else if(wt_ap == '' || isNaN(wt_ap)){
				$("#alert").html("Please enter weight ap.");
				$('#alert').addClass('alert alert-danger');
				$("#add_wt_ap").addClass("error");
				$("#alert").focus();
				return false;
			}
			else if(ex == '' || isNaN(ex)){
				$("#alert").html("Please enter exchange.");
				$('#alert').addClass('alert alert-danger');
				$("#alert").focus();
				return false;
			}*/
			else {
				$.ajax({
					type: "POST",
					url: base_url + 'admin/help/save_fooditem',
					data: "add_foodgroup=" + foodgroup + "&add_foodlist=" + foodlist + "&add_fooditem_id=" + fooditem_id + "&add_fooditem=" + fooditem + "&add_foodgroup_content=" + foodgroup_content + "&add_wt_ep=" + wt_ep + "&add_wt_ap=" + wt_ap + "&add_ex=" + ex + "&add_hh_m=" + hh_m + "&add_dimension=" + dimension,
					success: function(html) {
						//$("#sample_div"+x).html(html);
						//alert(data);
						if (html == 'success') {
							$("#alert").html("Fooditem successfully saved!");
							$('#alert').addClass('alert alert-success');
							$("#alert").focus();
							setTimeout("location.reload(true);", 1000);
						} else {
							$("#alert").html("Error: Something is wrong when saving the data.");
							$('#alert').addClass('alert alert-danger');
							$("#alert").focus();
						}
					},
				});
			}
			return false;
		});
	
$(document).on("click", ".delete_fooditem", function() {
    var id = $(this).attr("id");
    var dataString = 'id=' + id;
    var parent = $(this).closest("tr");
    var answer = confirm("Are you sure you want to delete from the database?");
    if (answer) {
  
      $.ajax({
        type: "POST",
        url: base_url + 'admin/help/delete_fooditem',
        data: dataString,
        cache: false,
        beforeSend: function() {
          parent.animate({
            'backgroundColor': '#fb6c6c'
          }, 300).animate({
            opacity: 0.35
          }, "slow");;
        },
        success: function(data) {
          parent.slideUp('slow', function() {
            $(this).remove();
          });
          setTimeout("location.reload(true);", 1000);
        }
      });
    } else {
      return false;
    }
    return false;
    // });
  });


$(document).on("click", "#editfooditem", function() {
 			var foodgroup = $("#add_foodgroup1").val();
 			var foodlist = $("#add_foodlist1").val();
 			var fooditem_id = $("#add_fooditem_id1").val();
 			var fooditem = $("#add_fooditem1").val();
 			var foodgroup_content = $("#add_foodgroup_content1").val();
 			var wt_ep = $("#add_wt_ep1").val();
 			var wt_ap = $("#add_wt_ap1").val();
 			var ex = $("#add_ex1").val();
 			var hh_m = $("#add_hh_m1").val();
 			var dimension = $("#add_dimension1").val();
 			var id = $(this).data("id");
 			if (foodgroup == 0) {
 				$("#alert").html("Please select foodgroup.");
 				$('#alert').addClass('alert alert-danger');
 				$("#alert").focus();
 				return false;
 			} else if (foodlist == 0) {
 				$("#alert").html("Please select foodlist.");
 				$('#alert').addClass('alert alert-danger');
 				$("#alert").focus();
 				return false;
 			} else if (wt_ep == '' || isNaN(wt_ep)) {
 				$("#alert").html("Please enter weight ep.");
 				$('#alert').addClass('alert alert-danger');
 				$("#alert").focus();
 				return false;
 			} else if (wt_ap == '' || isNaN(wt_ap)) {
 				$("#alert").html("Please enter weight ap.");
 				$('#alert').addClass('alert alert-danger');
 				$("#add_wt_ap").addClass("error");
 				$("#alert").focus();
 				return false;
 			} else if (ex == '' || isNaN(ex)) {
 				$("#alert").html("Please enter exchange.");
 				$('#alert').addClass('alert alert-danger');
 				$("#alert").focus();
 				return false;
 			}
 			/*else if(dimension == ''){
 				$("#alert").html("Please enter dimension.");
 				$('#alert').addClass('alert alert-danger');
 				$("#alert").focus();
 				return false;
 			}*/
 			else {
 				$.ajax({
 					type: "POST",
 					url: base_url + 'admin/help/update_fooditem',
 					data: "add_foodgroup1=" + foodgroup + "&add_foodlist1=" + foodlist + "&add_fooditem_id1=" + fooditem_id + "&add_fooditem1=" + fooditem + "&add_foodgroup_content1=" + foodgroup_content + "&add_wt_ep1=" + wt_ep + "&add_wt_ap1=" + wt_ap + "&add_ex1=" + ex + "&add_hh_m1=" + hh_m + "&add_dimension1=" + dimension + "&id=" + id,
 					success: function(html) {
 						//$("#sample_div"+x).html(html);
 						//alert(data);
 						if (html == 'success') {
 							$("#alert").html("Fooditem successfully updated!");
 							$('#alert').addClass('alert alert-success');
 							$("#alert").focus();
 							setTimeout("location.reload(true);", 1000);
 						} else {
 							$("#alert").html("Error: Something is wrong when saving the data.");
 							$('#alert').addClass('alert alert-danger');
 							$("#alert").focus();
 						}
 					},
 				});
 			}
 			return false;
 		});


	$(document).on("click", "#save_recommendation", function() {
		var client_id = $(this).data("client_id");
		var appointment_id = $(this).data("appointment_id");
		var recommendation = $("#recommendation").val();
		if (client_id == '' || isNaN(client_id)) {
			$("#alert").html("Please enter client id.");
			$('#alert').addClass('alert alert-danger');
		} else if (appointment_id == '' || isNaN(appointment_id)) {
			$("#alert").html("Please enter appointment id.");
			$('#alert').addClass('alert alert-danger');
		} else if (recommendation == '') {
			$("#alert").html("Please enter recommendation.");
			$('#alert').addClass('alert alert-danger');
		} else {
			$.ajax({
				type: "POST",
				url: base_url + 'admin/help/save_recommendation',
				data: "client_id=" + client_id + "&appointment_id=" + appointment_id + "&recommendation=" + recommendation,
				success: function(html) {
					if (html == 'success') {
						$("#alert").html("Recommendation successfully saved.");
						$('#alert').addClass('alert alert-success');
						setTimeout("location.reload(true);", 3000);
					} else if (html == 'error') {
						$("#alert").html("You have already submitted recommendation for this day.");
						$('#alert').addClass('alert alert-danger');
						$("#alert").focus();
					} else if (html == 'error1') {
						$("#alert").html("Error! You have already finished on the appointment. Please contact RND personnel for another appointment.");
						$('#alert').addClass('alert alert-danger');
						$("#alert").focus();
					} else {
						$("#alert").html("Error: Something is wrong when saving the data.");
						$('#alert').addClass('alert alert-danger');
						$("#alert").focus();
					}
				},
				beforeSend: function() {
					$("#alert").html("Loading...");
					$('#alert').addClass('alert alert-success');
				}
			});
		}
		return false;
	});
	$(document).on("click", "#edit_recommendation1", function() {
		var appointment_id1 = $("#edit_recommendation1").data("appointment_id1");
		var recommendation1 = $("#recommendation1").val();
		if (appointment_id1 == '' || isNaN(appointment_id1)) {
			$("#alert1").html("Please enter appointment id.");
			$('#alert1').addClass('alert alert-danger');
		} else if (recommendation1 == '') {
			$("#alert1").html("Please enter recommendation.");
			$('#alert1').addClass('alert alert-danger');
		} else {
			$.ajax({
				type: "POST",
				url: base_url + 'admin/help/update_recommendation',
				data: "appointment_id1=" + appointment_id1 + "&recommendation1=" + recommendation1,
				success: function(html) {
					if (html == 'success') {
						$("#alert1").html("Recommendation successfully updated.");
						$('#alert1').addClass('alert alert-success');
						setTimeout("location.reload(true);", 3000);
					} else {
						$("#alert1").html("Error: Something is wrong when saving the data.");
						$('#alert1').addClass('alert alert-danger');
						$("#alert1").focus();
					}
				},
				beforeSend: function() {
					$("#alert1").html("Loading...")
					$('#alert1').addClass('alert alert-success');
				}
			});
		}
		return false;
	});
	$(document).on("click", ".delete_recommendation", function() {
    var id = $(this).attr("id");
    var dataString = 'id=' + id;
    var parent = $(this).closest("div");
    var answer = confirm("Are you sure you want to delete from the database?");
    if (answer) {
  
      $.ajax({
        type: "POST",
        url: base_url + 'admin/help/delete_recommendation',
        data: dataString,
        cache: false,
        /*beforeSend: function() {
          parent.animate({
            'backgroundColor': '#fb6c6c'
          }, 300).animate({
            opacity: 0.35
          }, "slow");;
        },*/
        success: function(data) {
         /* parent.slideUp('slow', function() {
            $(this).remove();
          });*/
          setTimeout("location.reload(true);", 1000);
        }
      });
    } else {
      return false;
    }
    return false;
    // });
  });
	



});
/*function d_fel_data() {
    var data_id = $(".data_fel").data("id");
    //alert(data_id);
    $.ajax({
        type: "POST",
        url: "default_fel_data.php",
        data: "id=" + data_id,
        success: function(data) {
            $("#default_fel_data").show("highlight");
            $("#default_data").focus();
            $("#default_fel_data").html(data);
        },
    });
}*/
/*$.getJSON('getDates.php', function(json) {
	dates = json;
});

function checkAvailability(mydate) {
	var myBadDates = dates;
	var $return = true;
	var $returnclass = "available";
	$checkdate = $.datepicker.formatDate('yy-mm-dd', mydate);
	// start loop
	for (var x in myBadDates) {
		$myBadDates = new Array(myBadDates[x]['approved_date']);
		for (var i = 0; i < $myBadDates.length; i++)
			if ($myBadDates[i] == $checkdate) {
				$return = false;
				$returnclass = "unavailable";
				//return [ true, 'mybold', event.text ];
			}
	}
	//end loop
	return [$return, $returnclass];
}*/
function save_event() {
	// $("#confirm").click(function(){
	var dateformat = /^\d{4}-\d{1,2}-\d{1,2}$/;
	var timeformat = /^[01]?\d:[0-5]\d( (am|pm))?$/i;
	var event_type = $("#event_type").val();
	var custom_event = $("#custom_event").val();
	var datepick = $("#datepick").val();
	var whole_day_check = $("#whole_day").prop('checked');
	var whole_day = $("#whole_day").val();
	var timepick1 = $("#timepick1").val();
	var timepick2 = $("#timepick2").val();
	var rnd = $("#rnd").val();
	var all_rnd = $("#all_rnd").val();
	var status = $("#status").val();
	var remarks = $("#remarks").val();
	//var uid = $("#confirm").data("uid");
	var user_type = $("#confirm").data("user_type");
	/*if(user_type==1){
			var rnd=$("#rnd").val();
			var all_rnd= $("#all_rnd").val();
		if(all_rnd ==0 && rnd == 0){
			alert("Please select RND.");	
			return false;	
			}
				}
		else{
			var all_rnd= $("#all_rnd").val();	
			if(all_rnd == 1){
				var rnd= $("#rnd").val('0');
			}
			else{
				var rnd= $("#rnd").val();
			}
		}*/
	if (event_type == 0) {
		alert("Please choose event type.");
		$("#event_type").focus();
		return false;
	} else if (datepick == '' || !dateformat.test(datepick)) {
		alert("Please enter correct date format.");
		$("#datepick").focus();
		return false;
	}
	/*else if (all_rnd == 0 && rnd == 0) {
	        alert("Please select RND.");
	        $("#rnd").focus();
	        return false;
	    } */
	else if (whole_day_check == false && !timeformat.test(timepick1) && !timeformat.test(timepick2)) {
		alert("Please enter correct time format.");
		$("#timepick1").focus();
		return false;
	} else if (status == 0) {
		alert("Please confirm event.");
		$("#status").focus();
		return false;
	} else {
		$.ajax({
			type: "POST",
			url: base_url + 'admin/help/save_event',
			data: "event_type=" + event_type + "&custom_event=" + custom_event + "&datepick=" + datepick + "&datepick=" + datepick + "&whole_day=" + whole_day + "&timepick1=" + timepick1 + "&timepick2=" + timepick2 + "&rnd=" + rnd + "&all_rnd=" + all_rnd + "&status=" + status + "&remarks=" + remarks,
			success: function(data) {
				alert(data);
				/*if (html == 'success') {
					$("#alert").html("You have successfully scheduled an event.");
					$('#alert').removeClass("alert alert-danger");
					$('#alert').addClass('alert alert-success');
					// $('#alert').removeClass('alert alert-danger');
					$("#alert").focus();
					setTimeout("location.reload(true);", 3000);
				} else if (html == 'error') {
					$("#alert").html("RND/ Time and Date not available.");
					$('#alert').addClass('alert alert-danger');
					$("#alert").focus();
				} else {
					$("#alert").html("Error: Something is wrong when saving the data.");
					$('#alert').addClass('alert alert-danger');
					$("#alert").focus();
				}*/
			},
			beforeSend: function() {
				$("#alert").html("Loading...");
				$('#alert').addClass('alert alert-success');
			}
		});
	}
	return false;
}
$(function() {
	$('#requests tbody').on('click', '.delete', function() {
		var id = $(this).attr("id");
		var dataString = 'id=' + id;
		var parent = $(this).closest("tr");
		var answer = confirm("Are you sure you want to delete from the database?");
		if (answer) {
			$.ajax({
				type: "POST",
				url: "delete_request.php",
				data: dataString,
				cache: false,
				beforeSend: function() {
					parent.animate({
						'backgroundColor': '#fb6c6c'
					}, 300).animate({
						opacity: 0.35
					}, "slow");;
				},
				success: function() {
					parent.slideUp('slow', function() {
						$(this).remove();
					});
					setTimeout("location.reload(true);", 1000);
				}
			});
		} else {
			return false;
		}
		return false;
	});
});


$(function() {
	$("#graph_dialog").dialog({
		autoOpen: false,
		title: '',
		resizable: true,
		modal: true,
		width: 950,
		height: 800,
		hide: 'fold',
		show: 'blind'
	});
	//$(".ui-dialog").addClass("ui-widget-header");
	$(".ui-dialog").addClass("ui-widget-content");
	$(".show_bmi_graph").on("click", function(e) {
		e.preventDefault();
		var id = $(this).attr("id");
		var dataString = 'client_id=' + id;
		//var client_id= document.getElementById("client_id").value;
		$.ajax({
			type: "GET",
			url: 'bmi_graph.php?client_id=' + id,
			data: dataString,
			success: function(res) {
				$("#graph_dialog").html(res);
				$("#graph_dialog").dialog("open");
				$('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
				$('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
			}
		});
	});
});
$(function() {
	$("#graph_dialog").dialog({
		autoOpen: false,
		title: '',
		resizable: true,
		modal: true,
		width: 950,
		height: 800,
		hide: 'fold',
		show: 'blind'
	});
	//$(".ui-dialog").addClass("ui-widget-header");
	$(".ui-dialog").addClass("ui-widget-content");
	$(".show_wc_graph").on("click", function(e) {
		e.preventDefault();
		var id = $(this).attr("id");
		var dataString = 'client_id=' + id;
		//var client_id= document.getElementById("client_id").value;
		$.ajax({
			type: "GET",
			url: 'wc_graph.php?client_id=' + id,
			data: dataString,
			success: function(res) {
				$("#graph_dialog").html(res);
				$("#graph_dialog").dialog("open");
				$('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
				$('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
			}
		});
	});
});
$(function() {
	$("#graph_dialog").dialog({
		autoOpen: false,
		title: '',
		resizable: true,
		modal: true,
		width: 950,
		height: 800,
		hide: 'fold',
		show: 'blind'
	});
	//$(".ui-dialog").addClass("ui-widget-header");
	$(".ui-dialog").addClass("ui-widget-content");
	$(".show_hc_graph").on("click", function(e) {
		e.preventDefault();
		var id = $(this).attr("id");
		var dataString = 'client_id=' + id;
		//var client_id= document.getElementById("client_id").value;
		$.ajax({
			type: "GET",
			url: 'hc_graph.php?client_id=' + id,
			data: dataString,
			success: function(res) {
				$("#graph_dialog").html(res);
				$("#graph_dialog").dialog("open");
				$('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
				$('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
			}
		});
	});
});
$("[id='dialog_element']").not("#dialog_parent>#dialog_element").remove();

/*$(function() {
	$("#dialog").dialog({
		autoOpen: false,
		title: '<br>',
		resizable: true,
		modal: true,
		width: 990,
		height: 310,
		hide: 'fold',
		show: 'blind'
	});
	//$(".ui-dialog").addClass("ui-widget-header");
	$(".ui-dialog").addClass("ui-widget-content");
	$(".copy_menu").on("click", function(e) {
		e.preventDefault();
		var id = $(this).attr("id");
		var dataString = 'id=' + id;
		var appointment_id=  $(this).data("appointment_id");
	//	var meal_code=  $(this).data("meal_code");
		//var client_id= $("#client_id").val();
		//var appointment_id= $("#appointment_id").val();
		$.ajax({
			type: "GET",
			url: 'copy_menu.php?appointment_id=' + appointment_id ,
			data: dataString,
			success: function(res) {
				$("#dialog").html(res);
				$("#dialog").dialog("open");
			}
		});
	});
});*/
//decimal to fraction
/*function HCF(u, v) { 
    var U = u, V = v
    while (true) {
        if (!(U%=V)) return V
        if (!(V%=U)) return U 
    } 
}
//convert a decimal into a fraction


function fraction(decimal){

    if(!decimal){
        decimal=this;
    }
    whole = String(decimal).split('.')[0];
    decimal = parseFloat("."+String(decimal).split('.')[1]);
    num = "1";
    for(z=0; z<String(decimal).length-2; z++){
        num += "0";
    }
    decimal = decimal*num;
    num = parseInt(num);
    for(z=2; z<decimal+1; z++){
        if(decimal%z==0 && num%z==0){
            decimal = decimal/z;
            num = num/z;
            z=2;
        }
    }
    //if format of fraction is xx/xxx
    if (decimal.toString().length == 2 && 
        num.toString().length == 3) {
            //reduce by removing trailing 0's
            // '
    decimal = Math.round(Math.round(decimal)/10);
    num = Math.round(Math.round(num)/10);
}
//if format of fraction is xx/xx
else if (decimal.toString().length == 2 && 
        num.toString().length == 2) {
    decimal = Math.round(decimal/10);
    num = Math.round(num/10);
}
//get highest common factor to simplify
var t = HCF(decimal, num);

//return the fraction after simplifying it

if(isNaN(whole) === true)
{
 whole = "0";
}

if(isNaN(decimal) === true)
{
    return ((whole==0)?"0" : whole);
}
else
{
    return ((whole==0)?" " : whole+" ")+decimal/t+"/"+num/t;
}
}*/
function getdate(date) {
	var event_date = date;
	$.ajax({
		type: "POST",
		url: base_url + 'admin/help/get_events',
		data: "event_date=" + event_date,
		success: function(data) {
			$("#events").html(data);
			$("#events").focus();
			// / alert(data);
		},
	});
}