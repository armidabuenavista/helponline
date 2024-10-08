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

    <div class="container">
        <h3>HelpOnline GH4D Data Repository:<small> (Monitoring PTRI Baseline)</small></h3>
    </div>
    <hr>
    <div class="container">
        <div id="passwordreset" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="panel-title">To view your GH4D Baseline:</div>
                    </div>                     
                    <div class="panel-body">
                        <form id="signupform" method="post" class="form-horizontal" role="form" action="<?php echo base_url('help/ptri_verify');?>">
                            <div class="form-group">

                                <label for="email" class=" control-label col-sm-3">Email:</label>
                                <div class="col-sm-9">
                                    <input type="email" name="lastname" required id="lastname" class="form-control" placeholder="Type the Access Code">
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- Button -->                   
                                <div class="  col-sm-offset-3 col-sm-9">
                                  <button id="submit" name="submit" type="submit" class="btn btn-success" ><i class="fa fa-sign-in"></i> Submit</button>
                                  <button type="reset" class="btn btn-default" ><i class="fa fa-eraser"></i> Reset</button>
                                </div>
                            </div>                             
                        </form>
                    </div>
                 </div>
            </div>    
    </div>


    
<?php $this->load->view('main_footer'); ?>