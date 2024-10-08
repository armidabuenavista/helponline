$(document).ready(function() {
    $('.carousel').carousel({
      interval: 5000
	  
    })
	
	
$(document).on("click",'#login', function(){
	username=$("#username").val();
    password=$("#password").val();
	$("#alert").html('<img src="bootstrap(1)/source/fancybox_loading@2x.gif" alt="Loading" />');
	  $("#alert").fadeIn("xslow");
	  if(username == "")
		{
			$('#alert').addClass('alert alert-danger');
			$('#alert').html('Please enter username!');
		}
		else if(password == "")
		{
			$('#alert').addClass('alert alert-danger');
			$('#alert').html('Please enter password!');
			
		}
		else
		{
	  
	  
         $.ajax({
           type:"POST",
           url:"login_action.php",
           data:
		"username="+username+"&password="+password,
			dataType:"json",

            success: function(response){
			
			  if(response.utype != "0")
					{
						$("#form1").fadeOut("normal");
						$("#shadow").fadeOut();
						$('#alert').html('');
						$('#alert').removeClass('alert alert-danger');
						
						window.location.href = ""+response.loc;
					}
					else if(response.utype == "0")
					{
						$('#alert').addClass('alert alert-danger');
						$('#alert').html(response.message);
					}
            },
			
				error: function(ts) 
				{ 
					alert(ts.responseText) 
				},
			
			
            beforeSend:function()
			{
                $("#alert").html('<img src="bootstrap(1)/source/fancybox_loading@2x.gif" alt="Loading" />');
				 //document.getElementById('alert').setAttribute("class","alert alert-success");
				 $("#alert").fadeIn("xslow");
            }
        });
		
         return false;
		 }
    });

$(document).on("focusout",'input[type="text"]', function(){
//$('input[type="text"]').focus(function() {
	$(this).removeClass("error");
});
$(document).on("click",'#register', function(){
		
		var valid_email = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		var dateformat=/^\d{4}-\d{1,2}-\d{1,2}$/;
		var name= /^[a-zA-Z]+$/;
		var lname =$("#lname").val();
		var fname = $("#fname").val();
		var mname = $("#mname").val();
		var extn= $("#extn").val();
		var gender = $("#gender").val();
		var birthday = $("#birthday").val();
		var address=$("#address").val();
		var contact_no = $("#contact_no").val();
		var email_address = $("#email_address").val();
		var username= $("#username").val();
		var password = $("#password").val();
		var cnf_password = $("#cnf_password").val();
		

		if(lname =='' || lname.length <=1 ){
			$("#alert").html("Please enter last name. Last name must contain more than one character. Last name must not contain special characters and numbers.");
			$("#alert").addClass("alert alert-danger");
			$("#lname").addClass("error");
			$("#alert").focus();
			return false;
		
			}
		else if(fname == ''  || fname.length <=1  ){
			$("#alert").html("Please enter first name. First name must contain more than one character. First name must not contain special characters and numbers.");
			$("#alert").addClass("alert alert-danger");
				
			$("#fname").addClass("error");
			$("#alert").focus();
			 
			return false;
			 }
		
		else if(mname == '' || mname.length <=1 ){
			  
				
			$("#alert").html("Please enter middle name. Middle name must contain more than one character. Middle name must not contain special characters and numbers.");
			$("#alert").addClass("alert alert-danger");
				
			$("#mname").addClass("error");
			$("#alert").focus();
			return false;
			  }
		
		 else if(birthday == ''|| !dateformat.test(birthday) ){
			$("#alert").html("Please enter date of birth in this format YYYY-MM-DD.");
			$("#alert").addClass("alert alert-danger");
			$("#birthday").addClass("error");
			$("#alert").focus();
			return false;
			  }
		else if(address == '' ){
			$("#alert").html("Please enter address.");
			$("#alert").addClass("alert alert-danger");
			$("#address").addClass("error");
			$("#alert").focus();
			return false;
			  }
		else if(contact_no== ''){
			$("#alert").html("Please enter contact number.");
			$("#alert").addClass("alert alert-danger");
			$("#contact_no").addClass("error");
			$("#alert").focus();
				return false;
			  }
		else if(email_address == ''  || !valid_email.test(email_address)){
			$("#alert").html("Please enter a valid email address.");
			$("#alert").addClass("alert alert-danger");
			$("#email_address").addClass("error");
			$("#alert").focus();
			return false;
			  }
		else if(username== '' || username.length <= 1){
			  	
			$("#alert").html("Please enter username. Username must be more than one character. Username must not contain special characters.");
			$("#alert").addClass("alert alert-danger");
			$("#username").addClass("error");
			$("#alert").focus();
			return false;
			  }
			  
		else if(password == '' || password.length <= 1 ){
			$("#alert").html("Please enter password. Password must be more than one character.");
			$("#alert").addClass("alert alert-danger");
			$("#password").addClass("error");
			$("#alert").focus();
			return false;
			  }
		else if(cnf_password == '' || cnf_password.length <= 1 ){
			$("#alert").html("Please confirm password. Password must be more than one character.");
			  	
			$("#alert").addClass("alert alert-danger");
			$("#cnf_password").addClass("error");
			$("#alert").focus();
			return false;
			  }
		else if(password != cnf_password  ){
			$("#alert").html("Password dont match!.");
			$("#cnf_password").addClass("error");
			$("#password").addClass("error");
			$("#alert").addClass("alert alert-danger");	
			$("#alert").focus();
			return false;
			  }
			  
		else{
			  	
			

         $.ajax({
           type:"POST",
           url:"register_action.php",
           data:
		"lname="+lname+"&fname="+fname+"&mname="+mname+"&extn="+extn+"&gender="+gender+"&birthday="+birthday+"&address="+address+"&contact_no="+contact_no+"&email_address="+email_address+"&username="+username+"&password="+password+"&cnf_password="+cnf_password,
                   

            success: function(html){
			
			  if(html=='success')
              {
              
				$("#alert").html("You have successfully registered.");				$("#alert").removeClass("alert alert-danger");
				 $("#alert").addClass("alert alert-success");
				 
			//	 setTimeout("location.reload(true);",3000);
				$("#alert").focus();
				 window.setTimeout(function(){

        // Move to a new location or you can do something else
       		window.location.href = "index.php";

    		}, 3000);
              }
			    else if(html=='error1'){
			  	
                    $("#alert").html("Email address already used!");
					$("#alert").addClass("alert alert-danger");
					$("#email_address").addClass("error");
				 $("#alert").focus();
			  }
			     else if(html=='error2'){
			  	
                    $("#alert").html("Username already used. Please use another one.");
					$("#alert").addClass("alert alert-danger");
					
					$("#username").addClass("error");
				 $("#alert").focus();
			  }
			  	  
              else
              {
                    $("#alert").html("Error: Something is wrong when saving the data.");
					$("#alert").addClass("alert alert-danger");
              }
            },
            beforeSend:function()
			{
                 $("#alert").html("Loading...");
				 $("#alert").addClass("alert alert-success");
            }
        });
		  }
         return false;
    });
		
		

	
	
		
$("#whole_day").prop('checked', false);
$("#whole_day_div").show();
	$("#timepick1").prop('disabled',false);	
	$(document).on("click",'#whole_day', function(){
			
		if (document.getElementById("whole_day").checked == true)
		 { 
	$("#whole_day_div").hide();
	$("#timepick1").prop('disabled',true);
	$("#whole_day").val('1');
	$("#timepick1").val('');
	

 }
  else{
  	$("#whole_day_div").show();
	$("#timepick1").prop('disabled',false);
	$("#whole_day").val('0');
	$("#timepick1").val('');
	

	}
			
			});	
	
	
	
	
	$(document).on("change",'#type', function(){
		
	var type = $(this).val();	
	
	if(type == 1){
		$("#no_of_person_div").hide();
		$("#no_of_person").val('');
		//$('#no_of_person option[value="1"]').attr('selected', true);
		
		
	}
	else if(type == 2){
		$("#no_of_person_div").show();
		$("#no_of_person").val();
		//$('#no_of_person option[value="1"]').attr('selected', true);
		
		
	}
	else{
		$("#no_of_person_div").hide();
		$("#no_of_person").val();
		//$('#no_of_person option[value="0"]').attr('selected', true);
	}
		
		
		
		});
	
	
	$(document).on("click",'#submit_appointment', function(){
		
		
	var type = $("#type").val();
	var no_person = $("#no_of_person").val();
	var whole_day_check = $("#whole_day").prop('checked');
	var whole_day = $("#whole_day").val();
    var datepick=$("#datepick").val();
    var timepick1=$("#timepick1").val();
    var message=$("#message").val();
	var dateformat =/^\d{4}-\d{1,2}-\d{1,2}$/;
 	var timeformat=/^[01]?\d:[0-5]\d( (am|pm))?$/i;
	var client_id = $("#client_id").val();

	if(type==0){
	alert("Please select type of request.");	
	$("#type").focus();
	$("#type").addClass('error');
	return false;	
	}
	
	else if(type == 2){
	alert("Please include number of persons to be counsel.");
	$("#no_of_person").focus();
	$("#no_of_person").addClass('error');
	return false;
		
	}

	else if(datepick=='' || !dateformat.test(datepick)){
 	alert("Please enter correct date format.");	
	$("#datepick").focus();
	$("#datepick").addClass('error');
	return false;
	}

	else if(whole_day_check == false && !timeformat.test(timepick1) ){
		
	alert("Please enter correct time format.");
	
	$("#timepick1").focus();
	$("#timepick1").addClass('error');
	return false;	
	}	
	else if(whole_day_check == true && timepick1 != ''){
	alert("Invalid time input.");
	$("#timepick1").focus();
	$("#timepick1").addClass('error');
	return false;		
	}
	
	
	else{
		
		
		 $.ajax({
           type:"POST",
           url:"appointment_form_action.php",
           data:
		"type="+type+"&no_of_person="+no_person+"&datepick="+datepick+"&whole_day="+whole_day+"&timepick1="+timepick1+"&status="+status+"&message="+message+"&client_id="+client_id,
                   

            success: function(data){
				alert(data);
				setTimeout("location.reload(true);",1000);
						
				/*if(html== 'success'){
					
				alert("You have successfully scheduled an appointment. Please check your email for confirmation. You will be hearing from us soon.");	
				$("#alert").hide();	
				$('#appointment_form').removeClass('form_div');
				setTimeout("location.reload(true);",3000);
				}
				else if(html= 'error'){
				alert("RND/ Time and date not available. Please select another day.");	
				$("#alert").hide();	
				$('#appointment_form').removeClass('form_div');
				setTimeout("location.reload(true);",3000);
				}
				else{
					alert("Error: Something is wrong when saving the data.");
					
				}*/
				

           },
            beforeSend:function()
			{
				//$("#alert").html("Loading...");
				$('#appointment_form').addClass('form_div');
				$("#alert").show();
				$("#alert").focus();
              
            }
        });

 }
 
	
	
       
	});
	
	
	
	
	
  });
  
  
  


$(function() {
      $( "#ncs_faqs" ).accordion({ active: false, collapsible: true });
  });
  
  
  	function calendar(){
	
	
   		var month= $("#month").val();
   		var year= $("#year").val();
			
			  
         $.ajax({
           type:"POST",
           url:"create_event_calendar.php",
           data:
		"month="+month+"&year="+year,
                  
            success: function(data){
			$("#calendar").html(data);
			$("#appointment_form").hide("fade",1000);	
			
            },
           
		
        });
		
    
		

}