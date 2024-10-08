<?php $this->load->view('fast_header'); ?>

<?php $this->load->view('navbar'); ?>

<style>
#pdri-collapse>.panel-body {background-color:#e6d5ed !important;}

@media (max-width: 480px) { 
    .nav-tabs > li {
        float:none;
    }
}
#myTab{

	font-size: 18px;
}

.table td{
    /*border-bottom: black solid 3px !important;
      border-right: gray solid 2px !important;
    border-left: gray solid 2px !important;
    border-top: gray solid 1px !important;*/
    background-color: #FFFFFF;
}
.table th{
    /*border-bottom: black solid 3px !important;
    border-right: gray solid 2px !important;
    border-left: gray solid 2px !important;
    border-top: gray solid 2px !important;*/
    background-color: #FFFFFF;
}
</style>

<script type="text/javascript">
$(document).ready(function() {
	if (location.hash) {
        $("a[href='" + location.hash + "']").tab("show");
    }
    $(document.body).on("click", "a[data-toggle]", function(event) {
        location.hash = this.getAttribute("href");
    });
});
$(window).on("popstate", function() {
    var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
    $("a[href='" + anchor + "']").tab("show");

    $('.responsive').tabCollapse();

    // initialize tab function
    $('.nav-tabs a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });

    
	

    });

</script>
<div class="container" >
<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Philippine Dietary Reference Intakes (PDRI)    
                </h1>
             <p>The 2015 Philippine Dietary Reference Intake (2015 PDRI) is a set of dietary standards that include 1)Estimated average requirement (EAR), 2) Recommended energy intake/ recommended nutrient intake (REI/ RNI),  3) Adequte intake (AI), 4) Tolerable upper intake/ upper limit (UL), and 5) Acceptable macronutrient distribution range (AMDR), each having its own use.</p>
            </div>
        </div>

<ul class="nav nav-tabs responsive ">
  <li class="pdri"><a data-toggle="tab" href="#pdri">Nutrition Label</a></li>

</ul>
<div class="tabbable " id="myTab">
<div class="tab-content responsive">
  <div id="pdri" class="tab-pane fade in active pdri_content">

   <div id="pdri_compute_dialog" class="col-md-12" style="display: none;   background: #fbedb8;"></div>
				<hr class="colorgraph"></hr>
				<div class="row"> 
				<div class="col-md-5">
				<div class="form-group">
				<label>Select Nutrients:</label>
				</div>
				<div class="form-group" >
				<div class="col-md-8 col-md-6">
				 <input type="checkbox" id="select_all"/> <strong> Select All</strong>
				 </div>
				<?php
				foreach($pdri_nutrients as $row3){
					$id= $row3->id;
					$nutrients = $row3->nutrients;
					$pdri_units = $row3->general_units;
					 echo "<div class=\"col-md-8 col-md-6 form-group\">";
                     

                     echo "<input type=\"checkbox\" name=\"nutrients\" class=\"nutrients\" id=\"nutrients\" value=\"$id\"> ".$nutrients."(".$pdri_units .")"."<div id=\"values_div$id\" style=\"display: none;\"></div>";
			
                     echo " </div>";
					


				}

				 ?>

				 </div>
				 </div>
				 <div class="col-md-4">
				 	 <div class="form-group">
				<label> Age group to be used: </label>
				 </div>

				 <div class="form-group form-inline">
				<input type="radio" name="use_this_comp"  value="1"> General Population 
				<input type="radio" name="use_this_comp"  value="2"> Children 
				 </div>

				 <div class= "form-group">
				 <button class="btn btn-success btn-lg" id="select" name="select">Select</button>
				 </div>
			

				 </div>
				 
				 <div class="col-md-7" id="pdri_compute" > 
			

				
				 </div>
				 </div>



     			</div>
     				</div>
						</div>




  </div>

</div>
		</div>	

			</div>						
<?php $this->load->view('main_footer'); ?>