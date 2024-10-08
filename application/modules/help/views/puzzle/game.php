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
    
.centered {
  position: fixed; /* or absolute */
  top: 40%;
  left: 40%;
}
    
.centered_button {
  position: fixed; /* or absolute */
  top: 60%;
  left: 48%;
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
                background: #000000 url('<?php echo base_url(); ?>assets/images/puzzle/bd_game.jpg');
                background-color: azure;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-blend-mode: darken;
                background-origin: content-box;
                background-position: center; 
            }
    </style>

<center><a href="<?=base_url();?>help/start_game"><img class="centered" src="<?=base_url();?>assets/images/button_puzzle.png" style="width: 20%; height: auto; border: 0px"></a><a type="button" href="http://helponline.fnri.dost.gov.ph/helponline/" class="centered_button btn btn-primary"><i class="fa fa-reply"></i> Back</a></center>
<!--<center><a style="margin-top: 20%; margin-bottom: 20%;" class="btn btn-primary btn-lg" href="<?=base_url();?>help/start_game">Play Now!</a></center>-->

    
