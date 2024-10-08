<!DOCTYPE html>
<html>
    <html lang="en">
    <title>iFNRI Website</title>
    <head>   
        <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/puzzle/style.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/sweet/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/sweet/sweetalert.min.js">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/sweet/themes/facebook/facebook.css">
        
    </head>
<script>

    function test(){
            swal({
               title: "Success!",
               text: "New Data has been updated in Database!",
               type: "success",
               showCancelButton: false,
               confirmButtonColor: "#8abb6f",
               confirmButtonText: "Ok",
               closeOnConfirm: false
             },
        function(){
            history.back();
        });  
    }
</script>
    
<?php $this->load->view('main_header'); ?>  
 
     <!-- MAKE SURE TO ADD THE STYLESHEET -->
<style>
    img{
        width: 20%;
        height: auto;
        float: left;

    }
    p{
        font-size: 120%;
    }
    .sample{
        background-color:aliceblue;
        opacity: 0.9;
        border-radius: 40px;
        
    }
    .header_sub{
        text-align: center;
        font-weight: bold;
        color: seagreen;
        letter-spacing: 7px;
/*        text-shadow: 2px 2px grey;*/
    }
    
body {
    background: linear-gradient(-70deg, #fa7c30 30%, rgba(0, 0, 0, 0) 30%), url('<?php echo base_url(); ?>assets/images/puzzle/image2.png');
    background-size: cover;
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-position: center; 
    
    -webkit-text-size-adjust: 100%;
    -webkit-font-feature-settings: "kern" 1;
    -moz-font-feature-settings: "kern" 1;
    -o-font-feature-settings: "kern" 1;
    font-feature-settings: "kern" 1;
    font-kerning: normal;
}
main {
  position: relative;
}

.triangle {
  position: absolute;
  width: 0;
	height: 0;
	border-top: 28vh solid #3CC157;
	border-right: 40vw solid transparent;
  opacity: 0.90;
  z-index: -1;
  transition: all 0.3s cubic-bezier(.17,.67,.83,.67);
}
.triangle-2 {
  position: absolute;
  width: 0;
	height: 0;
	border-top: 25vh solid #cecdfe;
	border-right: 75vw solid transparent;
  opacity: 0.90;
  z-index: -2;
  transition: all 0.3s cubic-bezier(.17,.67,.83,.67);
}

.triangle-3 {
  position: absolute;
  display: block;
  right: 0;
  width: 0;
	height: 0;
	border-top: 25vh solid #4b007d;
	border-right: 75vw solid transparent;
  opacity: 0.90;
  z-index: -3;
  transition: all 0.3s cubic-bezier(.17,.67,.83,.67);
}

.container {
  position: relative;
  top: 20vh;
  padding: 50px 1em;
  max-width: 1000px;
  margin: 0 auto;
  z-index: 100;
}
  

@media only screen and (min-width: 768px) {
  
  .triangle {
    border-top: 120vh solid #3CC157;
    border-right: 35vw solid transparent;
  }
  .triangle-2 {
    border-top: 120vh solid #cecdfe;
    border-right: 40vw solid transparent;
  }
  .triangle-3 {
    display: none;
  }
  .container {
    top: 10vh;
  }
}


article {
  max-width: 700px;
  margin: 0 auto;
  z-index: 100;
}
article h1 {
  font-family: 'Merriweather';
  font-weight: 700;
  font-size: 3.5rem;
  color: #202020;
  margin-bottom: 0.25em;
  text-align: center;
}
article .metadata {
  margin-bottom: 1em;
}
article span {
  font-family: Merriweather;
  font-size: 1em;
  font-weight: 400;
  display: block;
  color: #828385;
  text-align: center;
  margin-bottom: 0.250em
}
article p {
  font-family: 'PT Sans';
  font-weight: 400;
  font-size: 1.150em;
  line-height: 1.4;
  color: #363636;
  margin-bottom: 1.1635em;
  letter-spacing: -0.0040em;
  padding: 0.50em;
}

@media only screen and (min-width: 768px) {
  article p {
    font-size: 1.30em;
  }
}
    
    
    
    
    
    
    
    
    
    

input[type="checkbox"] {
  display:none;
}
.label-txt {
  cursor:pointer;
  vertical-align: middle;
}
.label-cbx {
  width:20px;
  height:20px;
  position:relative;
  display:inline-block;
  vertical-align:middle;
  border:2px solid grey;
  border-radius:2px;
  transition:0.3s ease;
  cursor:pointer;
  margin-right:7px;
}
input[type="checkbox"]:checked + .label-cbx {
  border-color: transparent;
}
.label-cbx:before {
  content: '';
  position: absolute;
  top: 5px;
  right: 5px;
  margin: -10px 0 0 -10px;
  width: 30px;
  height: 30px;
  border-radius: 100%;
  background: #1976D2;
  transform: scale(0);
}
input[type="checkbox"]:checked + .label-cbx:before {
  transform: scale(1);
  opacity:0;
  transition: all 0.6s ease-out;
}
.label-cbx:after {
  content:"";
  position:absolute;
  top:15px;
  right:5px;
  border-bottom:3px solid transparent;
  border-right:3px solid transparent;
}
input[type="checkbox"]:checked + .label-cbx:after {
  animation:0.10s DrawMark ease-out 0.1s;
  animation-fill-mode:forwards;
}
@keyframes DrawMark {
  0% {
    width:0px;
    height:0px;
    transform:translate(0,0) rotate(45deg);
  }
  100% {
    width:7px;
    height:14px;
    border-bottom:3px solid #1976D2;
    border-right:3px solid #1976D2;
    transform:translate(0,-15px) rotate(45deg);
  }
}
/* 2nd checkbox */
/* overwrite style */
#cbx-2:before {
  transform:scale(1);
  opacity:0;
  background:rgba(25, 118, 210,0.5)
}
input[type="checkbox"]:checked + #cbx-2:before {
  animation:0.5s ease-out fadeinout;
  animation-fill-mode:forwards;
}
@keyframes fadeinout {
  0% {
    opacity:0;
  }
  50% {
    opacity:1;
  }
  100% {
   opacity:0; 
  }
}
</style>
<style type="text/css">
.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
.img:hover { opacity: 0.5; filter: alpha(opacity=50); }
	 a>img {
 border: 5px solid #e0541f;
}	
.img{
	 border: 5px solid #e0541f;
}
.nav-tabs>li>a {
  margin-right: 2px;
  line-height: 1.42857143;
  border: 1px solid transparent;
  border-radius: 4px 4px 0 0;
  font-size:18px;
}
.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
    padding:20px;
}
</style>
<script type="text/javascript">
	$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',
				closeBtn  : true,
				arrows    : true,
				nextClick : true,
				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});
			
		$('.fancybox-thumbs1').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',
				closeBtn  : true,
				arrows    : true,
				nextClick : true,
				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});	
  $(document).ready(function() {
        $('.img').bind("contextmenu",function(e) {
           return false;
        });
    }); 
</script>
    
<div class="triangle"></div>
<div class="triangle-2"></div>
<div class="triangle-3"></div> 
        
    <?php //$this->load->view('puzzle/nav'); ?>
        
<div class="sample container">
     <center><p>Instruction: Search up, down, forward, backward, and diagonally to find the hidden words
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a type="button" href="http://helponline.fnri.dost.gov.ph/helponline/help/start_game" class="centered_button btn btn-primary"><i class="fa fa-reply"></i> Back</a></p></center>
    <h1 class="header_sub">GROW FOODS</h1>
    <div id='puzzle'></div>
    <div id='words'></div>  
    <div id="def"></div>
</div>
        
        
        
    
    <script src="<?php echo base_url(); ?>assets/sweet/sweetalert-dev.js"></script>
    <script src="<?php echo base_url(); ?>assets/puzzle/ajax.js"></script>
    <script src="<?php echo base_url(); ?>assets/puzzle/wordfind.js"></script>
    <script src="<?php echo base_url(); ?>assets/puzzle/wordfindgame.js"></script>
    
<script>
  var words = [<?php $this->load->model('mdl_help', '', TRUE); foreach ($this->load->mdl_help->get_record("2") as $value) { echo '"'.str_replace(" ","",$value->name).'",'; }?>];

var words_def = [""];
<?php $this->load->model('mdl_help', '', TRUE); foreach ($this->load->mdl_help->get_record("2") as $value) { echo 'words_def["'.str_replace(" ","",$value->name).'"]="'.$value->facts.'";'; }?>
    
var words_photo = [""];
<?php $this->load->model('mdl_help', '', TRUE); foreach ($this->load->mdl_help->get_record("2") as $value) { echo 'words_photo["'.str_replace(" ","",$value->name).'"]="'.$value->photo.'";'; }?>
    
  // start a word find game
  var gamePuzzle = wordfindgame.create(words, '#puzzle', '#words');

  $('#solve').click( function() {
    wordfindgame.solve(gamePuzzle, words);
  });

  // create just a puzzle, without filling in the blanks and print to console
  var puzzle = wordfind.newPuzzle(
    words, 
    {height: 18, width:18, fillBlanks: false}
  );
  wordfind.print(puzzle);
    
   document.getElementsByTagName('meta')['viewport'].content='min-width: 980px;';

</script>
    