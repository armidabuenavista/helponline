<style>
    .cen {
        text-align: center;
    }
    .rotate_sub {
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg); 
    }
</style>
    <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
        <div class="col-sm-12">
            <div class="col-md-12 heading-section ftco-animate p-4 p-lg-5">
                <div class="containery" style="padding: 3%;">
                    <h2 class="mb-4">Food <span>Exchange </span>Lists (FEL)</h2>
                    
<style>
    p, li, lu{
        color: black;
    }
.book_img {
  float: left;
    border: solid black 1px;
    margin-right: 3%;
    margin-bottom: 3%;
}
    
.book_img {
  float: left;
    border: solid black 1px;
    margin-right: 3%;
    margin-bottom: 3%;
}
    
    
.book_img_sub {
  float: right;
    border: solid black 1px;
    margin-right: 3%;
    margin-bottom: 3%;
}
    
    
.mfp-fade.mfp-bg {
	opacity: 0;
	-webkit-transition: all 0.15s ease-out; 
	-moz-transition: all 0.15s ease-out; 
	transition: all 0.15s ease-out;
}
.mfp-fade.mfp-bg.mfp-ready {
	opacity: 0.8;
}
.mfp-fade.mfp-bg.mfp-removing {
	opacity: 0;
}

.mfp-fade.mfp-wrap .mfp-content {
	opacity: 0;
	-webkit-transition: all 0.15s ease-out; 
	-moz-transition: all 0.15s ease-out; 
	transition: all 0.15s ease-out;
}
.mfp-fade.mfp-wrap.mfp-ready .mfp-content {
	opacity: 1;
}
.mfp-fade.mfp-wrap.mfp-removing .mfp-content {
	opacity: 0;
}
    
    
    
</style>
<img class="book_img" src="<?=base_url();?>assets/images/FEL_final_cover.jpg" alt="FEL BOOK" width="50%" height="auto">
                    
                    
                        <?php

                            $val_space = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                            $this->load->model('mdl_help', '', TRUE);
                            foreach ($this->load->mdl_help->get_fel_intro() as $value) {
                                echo "<h3>".$value->title."</h3><br>".$value->description;
                            }

                        ?>
                    
                    
                    <br><br>
                    
                    <div class="row" style="text-align: center; font-weight: bold;">
                        
                        <div class="col-sm-2">
                            <a href="<?=base_url();?>help/fel_page1"><img class="img_a_button" src="<?=base_url();?>assets/images/fel_icons/icon_a.png" alt="FEL Icon" width="90%" height="auto"></a>
                            <p>Macronutrient Composition of FEL</p>
                        </div>
                        <div class="col-sm-2">
                            <a href="<?=base_url();?>help/fel_page2"><img class="img_b_button" src="<?=base_url();?>assets/images/fel_icons/icon_e.png" alt="FEL Icon" width="90%" height="auto"></a>
                            <p>Calculated Diets for Quick Reference</p>
                        </div>
                        <div class="col-sm-2">
                            <a href="<?=base_url();?>help/fel_page3"><img class="img_c_button" src="<?=base_url();?>assets/images/fel_icons/icon_b.png" alt="FEL Icon" width="90%" height="auto"></a>
                            <p>Sample Computation, Distribution and One-day Menu</p>
                        </div>
                        <div class="col-sm-2">
                            <a href="<?=base_url();?>help/fel_page4"><img class="img_d_button" src="<?=base_url();?>assets/images/fel_icons/icon_c.png" alt="FEL Icon" width="90%" height="auto"></a>
                            <p>FEL Visual Guide</p>
                        </div>
                        <div class="col-sm-2">
                            <a class="popup-youtube" href="<?=base_url();?>assets/FEL Final Full 2020-02-16.mp4"><img class="img_e_button" src="<?=base_url();?>assets/images/fel_icons/icon_d.png" alt="FEL Icon" width="90%" height="auto"></a>
                            <p>FEL User’s Guide AVP</p>
                        </div>
                        
                        
                        <div class="col-sm-2">
                            <img data-toggle="modal" data-target="#sugar_plate" src="<?=base_url();?>assets/images/suagr_icon.png" alt="FEL Icon" width="100%" height="auto">
                            <p>Selected Sugar Exchanges</p>
                        </div>
                        
                    </div>
                    
                    
                </div>
            </div> 
    	</div>        
        
            <div class="modal fade" data-backdrop="" id="sugar_plate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                            <div class="modal-body"><br><br>
                                <center>
                                    <p style="font-size: 120%;"><b>ERRATUM</b></p>
                                    <img class="book_img" src="<?=base_url();?>assets/images/sugar_exchange.jpg" alt="FEL BOOK" width="100%" height="auto">
                                    <p>Honey instead of Margarine in Page 57, Figure 7 in the first printing of the FEL handbook. </p>
                                </center>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            </div>
                    </div>
                </div>
            </div>
        
    </section> 
