<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.10.2.js"); ?>"></script> 
<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script> 
<style>
body {
    background: url(<?=base_url();?>assets/images/back.png) white no-repeat top left;
    font-family: sans-serif, Helvetica, Arial;
    background-color: grey;
    background-size: cover;
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-blend-mode: darken;
    background-origin: content-box;
    background-position: center; 
    padding: 35px 0px 35px 0px;
}

.wrapper {
  width: 60%;
  background: transparent;
  border-radius: 15px;
  margin: 40px auto;
  box-shadow: 0 0 50px #999;
  padding: 20px;
}

img {
  width: 40%;
  float: left;
}

p{
  text-align: left;
  margin-left: 200px; 
  color: #333;
  line-height: 1.2em;
  color:white;
}

p:nth-child(odd) {
  text-align: left;
}
    
h1{
  text-align: center;  
  color:white;
}
    
ul.b {
  list-style-type: square;
  color:white;
}
    
h3{
  color:white;
}
</style>

<div class="wrapper">
  <img src="<?=base_url();?>assets/images/logo_nstw.png" />
  <h1>SURVEY ON STREET FOOD NUTRITION INFORMATION, EDUCATION AND COMMUNICATION MATERIAL DEVELOPMENT</h1>

<h3>Survey consent</h3>
<p>The purpose of this research is to gather information about what potential target users (teens and young adults) would like to see and read in nutrition information, education and communication materials (IEC). Your participation in this survey is completely voluntary. You may decline to participate in the survey. There are no known risks related to this activity.
The procedure involves filling-up an electronic survey that will take approximately 10 minutes. Your responses will remain private and confidential. All results will be used for scholarly purposes only.  
Thank you for your participation in this endeavor.</p>
<p><b>By clicking on the “agree” button below indicates that:</b></p>
    
<ul class="b">
  <li>You have read the above information</li>
  <li>You voluntarily agree to participate</li>
  <li>You are at least 18 years old in age</li>
</ul>
    
<p><b>If you do not wish to participate in the survey, please click the <i>“disagree”</i> button</b></p>
    <center>
        <a type="button" class="btn btn-info btn-lg" href="<?=base_url()."help/NSTW_choice";?>">Agree</a>
        <a type="button" class="btn btn-danger btn-lg" href="<?=base_url()."help/NSTW";?>">Disagree</a>
    </center>
</div>
