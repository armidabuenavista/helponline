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
		<div class="col-md-12 column">
		<hr></hr>
			<div class="tabbable" id="myTab">
				<ul class="nav nav-tabs">
						<li  class=" active">
						<a href="#a" data-toggle="tab">Infographics</a>
					</li>		
					<li >
						<a href="#b" data-toggle="tab">Brochures</a>
					</li>
				<!--
					<li>
						<a href="#c" data-toggle="tab">Videos</a>
					</li>
					<li >
						<a href="#d" data-toggle="tab">Articles	</a>
					</li>
				-->
				</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="a" >	
	<div class="col-md-12 " >	
	<h1 class="page-header">Infographics</h1>
	<?php 
	 
	foreach($infographics as $row){
		$infographic= $row->infographic;
		$infographic_thumb= $row->infographic_thumb;
		$infographic_header= $row->infographic_header;
		$infographic_content= $row->infographic_content;

		$x=base_url('assets/images/infographics/'."$infographic".'');
		$y=base_url('assets/images/infographics/'."$infographic_thumb".'');
		$z=base_url('assets/images/infographics/'."$infographic".'');

		echo "<div class=\"panel panel-primary\">
                        <div class=\"panel-heading\"><strong>$infographic_header</strong></div>";
		echo "<div class=\"panel-body\">";
		echo "<div class=\"col-md-12\" style=\"margin-bottom:20px;\">";
		echo "<div><a class=\"fancybox-thumbs img\" data-fancybox-group=\"thumb\" href=\"$x\"><img src=\"$y\" alt=\"Infographic\" /></a></div>";
		echo "<div style=\"margin-top:10px;\">
		<a href=\"$z\" class=\"btn btn-success btn-sm\" style=\"color: #ffffff\" download><span class=\"glyphicon glyphicon-download\"></span> Download</a>
		</div>";
		echo "</div>";
		
		echo "</div></div>";
	}


	

	?>
	</div>
				</div>
	 			<div class="tab-pane " id="b" >
	<div class="col-md-12" >	
	<h1 class="page-header">Brochures</h1>
	
	
<?php 
	//echo "<div class=\"responsive\"><table class=\"table table-striped\" border=\"0\"  >";
	/*$brochures_db=$mysqli->query("SELECT *
			FROM brochures_db ");
				echo "<div class=\"row\">";
	while($row= $brochures_db->fetch_object()){
		$brochure= $row->brochure;
		$brochure_thumb= $row->brochure_thumb;
		$brochure_header= $row->brochure_header;
	
		echo "<div class=\"col-md-6\">";
		echo "<div class=\"panel panel-primary\">
         <div class=\"panel-heading\"><strong>$brochure_header</strong></div>";
		echo "<div class=\"panel-body\">";
		echo "<div class=\"col-md-12\" style=\"margin-bottom:20px;\">";
		echo "<div><a class=\"fancybox-thumbs1 img\" data-fancybox-group=\"thumb\" href=\"Images/brochures/$brochure\"><img src=\"Images/brochures/$brochure_thumb\" alt=\"Brochures\" /></a></div>";
		echo "<div style=\"margin-top:10px;\">
		<a href=\"Images/brochures/$brochure\" class=\"btn btn-success btn-sm\" style=\"color: #ffffff\" download><span class=\"glyphicon glyphicon-download\"></span> Download</a>
		</div>";
		echo "</div>";
	
		echo "</div></div></div>";
	}
		echo "</div>";*/



				echo "<div class=\"row\">";
		foreach($brochures as $row1){
		$brochure= $row1->brochure;
		$brochure_thumb= $row1->brochure_thumb;
		$brochure_header= $row1->brochure_header;

		$a=base_url('assets/images/brochures/'."$brochure".'');
		$b=base_url('assets/images/brochures/'."$brochure_thumb".'');
		$c=base_url('assets/images/brochures/'."$brochure".'');
	
		echo "<div class=\"col-md-6\">";
		echo "<div class=\"panel panel-primary\">
         <div class=\"panel-heading\"><strong>$brochure_header</strong></div>";
		echo "<div class=\"panel-body\">";
		echo "<div class=\"col-md-12\" style=\"margin-bottom:20px;\">";
		echo "<div><a class=\"fancybox-thumbs1 img\" data-fancybox-group=\"thumb\" href=\"$a\"><img src=\"$b\" alt=\"Brochures\" /></a></div>";
		echo "<div style=\"margin-top:10px;\">
		<a href=\"$c\" class=\"btn btn-success btn-sm\" style=\"color: #ffffff\" download><span class=\"glyphicon glyphicon-download\"></span> Download</a>
		</div>";
		echo "</div>";
	
		echo "</div></div></div>";
	}
		echo "</div>";
	?>
	
	
	
	
	
				</div>
					</div>
			<!--<div class="tab-pane " id="c">
				Videos
				</div>
				<div class="tab-pane" id="d">
				Articles
				</div>-->
     				</div>
						</div>
							</div>
								</div>
   <?php $this->load->view('main_footer'); ?>