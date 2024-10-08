<?php $this->load->view('main_header'); ?>  
 
     <!-- MAKE SURE TO ADD THE STYLESHEET -->

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
    
        @import url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');
        body{
            color: black;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            line-height: 1.80857;
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


<?php $this->load->view('navbar'); ?> 

    <style>
             body{
                background: #000000 url('<?php echo base_url(); ?>assets/images/puzzle/bg_game.jpg');
                background-color: azure;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-blend-mode: darken;
                background-origin: content-box;
                background-position: center; 
            }
    </style>

<body>
<center>
    <br><br>
        <h2>Find all the hidden words in the word search puzzles and learn about nutrition at the same time</h2>
        <h3>Select puzzle category by clicking the image.</h3>
    <a type="button" href="http://helponline.fnri.dost.gov.ph/helponline/help/game" class="centered_button btn btn-primary"><i class="fa fa-reply"></i> Back</a>
    <br><br><br>
    
<a style="margin-top: 20%; margin-bottom: 20%;" type="button" href="<?=base_url();?>help/cat1">
    <img  src="<?php echo base_url("assets/images/puzzle/puzzle1.jpg"); ?>" width="15%" height="auto"/>
</a>

<a style="margin-top: 20%; margin-bottom: 20%;" type="button" href="<?=base_url();?>help/cat2">
    <img  src="<?php echo base_url("assets/images/puzzle/puzzle2.jpg"); ?>" width="15%" height="auto"/>
</a>

<a style="margin-top: 20%; margin-bottom: 20%;" type="button" href="<?=base_url();?>help/cat3">
    <img  src="<?php echo base_url("assets/images/puzzle/puzzle3.jpg"); ?>" width="15%" height="auto"/>
</a>

<a style="margin-top: 20%; margin-bottom: 20%;" type="button" href="<?=base_url();?>help/cat4">
    <img  src="<?php echo base_url("assets/images/puzzle/puzzle4.jpg"); ?>" width="15%" height="auto"/>
</a>

</center>
</body>