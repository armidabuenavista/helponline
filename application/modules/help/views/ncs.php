<?php redirect(base_url()."help/user_index"); ?>
<!-- Bootstrap CSS -->
	
	<?php $this->load->view('main_header'); ?>	
	 
	 
	<script type="text/javascript">


	 $(document).ready(function() {

	 	$(function() {
	$("#ncs_faqs").accordion({
		active: false,
		collapsible: true
	});
});

$.ajax({
    url:"help/get_event_dates",
 
    method:"GET",
	 
    success:function(retrieved_data){
  
	$("#calendar").datepicker({
dateFormat: 'yy-mm-dd',

	dateFormat: 'yy-mm-dd',
			changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
//beforeShowDay: event_dates,
onSelect: function (date) {
    //defined your own method here
			$("#datepick").val(date);
			getdate(date);
    
    },    
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


});
	 </script>
	 <style>
	.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
    border: 1px solid #d3d3d3;
     background: #FFFFFF; 
    font-weight: normal;
    color: #555555;
}
.ui-widget-header {
       background: #ffffff;
}
.ui-state-highlight .ui-state-default {
    background:#eff415;
	
}
.unavailable .ui-state-default{
	 background: #FF0000 ;
}

.table-responsive{

	border-color:#ffffff;
}


.ui-widget-content {
    border: 1px solid #DFDDDD;
    
}

 /* current input value background color */
.ui-datepicker-current-day
{
    background: #79d2a6;
}
/* today's background color */
.ui-datepicker-today .ui-state-default
{
    background: #79d2a6;

}
         
body {
	background: url('http://www.demo.amitjakhu.com/login-form/images/bg.png');
	font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
	font-weight:300;
	text-align: left;
	text-decoration: none;
	height: 500px;
}
         
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);


/* Reset top and bottom margins from certain elements */
.login-header,
.login p {
  margin-top: 0;
  margin-bottom: 0;
}

.login-header {
  background: #dd4814;
  padding: 20px;
  font-size: 1.4em;
  font-weight: normal;
  text-align: center;
  text-transform: uppercase;
  color: #fff;
}

.login-container {
  background: #ebebeb;
  padding: 12px;
}

/* Every row inside .login-container is defined with p tags */
.login p {
  padding: 12px;
}

.login input {
  box-sizing: border-box;
  display: block;
  width: 100%;
  border-width: 1px;
  border-style: solid;
  padding: 16px;
  outline: 0;
  font-family: inherit;
  font-size: 0.95em;
}

.login input[type="email"],
.login input[type="password"] {
  background: #fff;
  border-color: #bbb;
  color: #555;
}

/* Text fields' focus effect */
.login input[type="email"]:focus,
.login input[type="password"]:focus {
  border-color: #888;
}

.login input[type="submit"] {
  background: #dd4814;
  border-color: transparent;
  color: #fff;
  cursor: pointer;
}

.login input[type="submit"]:hover {
  background: #ae3a12;
}

/* Buttons' focus effect */
.login input[type="submit"]:focus {
  border-color: #ae3a12;
}
     
%shared{
  box-shadow:2px 2px 10px 5px #b8b8b8;
  border-radius:10px;
}
*{
  transition: all 0.5s ease;
}
#thumbnails{
  text-align:center;
  img{
    width:100px;
    height:100px;
    margin:10px;
    cursor:pointer;
      @media only screen and (max-width:480px){
    width:50px;
    height:50px;
  }
    @extend %shared;
    &:hover{
      transform:scale(1.05)
    }
  }
}
#main{
  width:100%;
  height:auto;
  object-fit:cover;
  display:block;
  @extend %shared;
  @media only screen and (max-width:480px){
    width:100%;
  }
}
.hidden{
  opacity:0;
}
         
</style>


<?php $this->load->view('navbar'); $num="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?>



<div class="row" style="margin-left: 3%; margin-right: 3%;">
    <div class="col-sm-8">
        
        <img width="90%" height="auto" src="<?php echo base_url("assets/images/help_slides/help.png"); ?>" id="main">
        <div id="thumbnails">
          <img width="10%" height="auto" src="<?php echo base_url("assets/images/help_slides/help.png"); ?>">
          <img width="10%" height="auto" src="<?php echo base_url("assets/images/help_slides/slide-img-1.png"); ?>">
          <img width="10%" height="auto" src="<?php echo base_url("assets/images/help_slides/slide-img-21.png"); ?>">
          <img width="10%" height="auto" src="<?php echo base_url("assets/images/help_slides/slide-img-3.png"); ?>">
          <img width="10%" height="auto" src="<?php echo base_url("assets/images/help_slides/slide-img-41.png"); ?>">
          <img width="10%" height="auto" src="<?php echo base_url("assets/images/help_slides/slide-img-5.png"); ?>">
        </div>
        
    </div>
    <div class="col-sm-4">
        
        <div class="login">
          <div class="login-triangle"></div>
              
            <?php
                    if(isset($_SESSION['logged_in'])){
                    $id = $this->session->all_userdata();
            ?>
              <h2 class="login-header">Welcome <b><?=$id["lname"].", ".$id["fname"]." ".$id["mname"];?></b></h2>
              <form class="login-container">
                  <center>
                      <?php
                        $gender="";
                        if($id["gender"]==1){
                            $gender="avatar1.png";
                        }elseif($id["gender"]==2){
                            $gender="avatar2.png";
                        }else{
                            $gender="avatar1.png";
                        }
                      ?>
                      <img alt="Latest Updates" src="<?php echo base_url("assets/images/".$gender); ?>" width="70%" height="auto">
                  </center>
                  <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <a type="button" class="btn btn-primary btn-block" href="<?=base_url();?>help/logout"> Logout</a>
                        </div>
                        <div class="col-sm-6">
                            <a type="button" class="btn btn-primary btn-block" href="<?=base_url();?>help/forgot_pass"> Reset Pass</a>
                        </div>
                     </div>
                  
              </form>
                      
			<?php
                    } else{
            ?>
              <h2 class="login-header">Log in</h2>
              <?php echo validation_errors(); ?>
              <form class="login-container" name="form1" id="form1" method="POST"  action="<?=site_url('help/verifylogin');?>" >
                    <p><input name="username" type="text" placeholder="Username"></p>
                    <p><input name="password" type="password" placeholder="Password"></p>
                    <p><input type="submit" value="Log in"></p>

                      <div class="row">
                        <div class="col-sm-6">
                            <a type="button" class="btn btn-primary btn-block" href="<?=base_url();?>help/register"> Register</a>
                        </div>
                        <div class="col-sm-6">
                            <a type="button" class="btn btn-primary btn-block" href="<?=base_url();?>help/forgot_pass"> Reset Pass</a>
                        </div>
                     </div>
              </form>
            <?php
					}
            ?>
              
        </div>

    </div>
</div>

<div style="margin-left: 5%; margin-right: 5%;">
    <?php
      $this->load->model('mdl_help', '', TRUE);
      $val_n=2;
          foreach ($this->load->mdl_help->get_home_data() as $value) {
              if($val_n%2==1){
    ?>
    
    <hr>
    <div class="row">
        <div class="col-sm-6">
            <h2 style="font-family: Arial; font-size: 300%;"><?=$value->title;?></h2>
            <p style="text-align: justify; font-family: Century Gothic; font-size: 130%;"><?=$num.$value->content;?></p>
        </div>
        <div class="col-sm-6">
            <br>
            <center><img alt="Latest Updates" src="<?php echo base_url("assets/images/home_data/".$value->image_data); ?>" width="85%" height="auto"></center>
        </div>
    </div>
    
    <?php
              }else{
    ?>
    
    <hr>
    <div class="row">
        <div class="col-sm-6">
            <br>
            <center><img alt="Latest Updates" src="<?php echo base_url("assets/images/home_data/".$value->image_data); ?>" width="85%" height="auto"></center>
        </div>
        <div class="col-sm-6">
            <h2 style="font-family: Arial; font-size: 300%;"><?=$value->title;?></h2>
            <p style="text-align: justify; font-family: Century Gothic; font-size: 130%;"><?=$num.$value->content;?></p>
        </div>
    </div>
    
    <?php
              }
              $val_n++;
          }
    ?>
</div>
<br>
<!--
		<div id="calendar"> </div>
        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/F0d_mSNZW8M" frameborder="0" allowfullscreen></iframe>
-->



<script>
var thumbnails = document.getElementById("thumbnails")
var imgs = thumbnails.getElementsByTagName("img")
var main = document.getElementById("main")
var counter=0;

for(let i=0;i<imgs.length;i++){
  let img=imgs[i]
  
  
img.addEventListener("click",function(){
  main.src=this.src
})
  
}
</script>


<?php $this->load->view('main_footer'); ?>


