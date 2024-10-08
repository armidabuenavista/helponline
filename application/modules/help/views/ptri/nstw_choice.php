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
  <h1>Choose what type of Survey Form</h1>
<br><br><br><br><br><br><br><br><br>
    <center>
        <a type="button" class="btn btn-info btn-lg" href="<?=base_url()."help/NSTW_survey1";?>">SURVEY ON STREET FOOD NUTRITION INFORMATION,<br> EDUCATION 
AND COMMUNICATION MATERIAL DEVELOPMENT
</a>
        <hr>
        <a type="button" class="btn btn-danger btn-lg" href="<?=base_url()."help/NSTW_survey2";?>">SURVEY ON “SILOG” MEALS NUTRITION INFORMATION,<br> EDUCATION 
AND COMMUNICATION MATERIAL DEVELOPMENT
</a>
    </center>
<br><br><br><br><br><br><br><br><br><br><br><br>
</div>
