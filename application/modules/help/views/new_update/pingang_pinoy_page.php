    <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
        <div class="col-sm-12">
            <div class="col-md-12 heading-section ftco-animate p-4 p-lg-5">
                <div class="containery" style="padding: 3%;">
                    <h2 class="mb-4">Pinggang <span>Pinoy</span></h2>
                    
                    

                    
                    
                    
<style>
    p, li, lu{
        color: black;
    }
.book_img {
  float: left;
/*    border: solid black 1px;*/
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
<img class="book_img" src="<?=base_url();?>assets/images/PinggangPinoyIcon.png" alt="FEL BOOK" width="50%" height="auto">
                    
                    
                    
                        <?php

                            $this->load->model('mdl_help', '', TRUE);
                            foreach ($this->load->mdl_help->get_pingang_pinoy_intro() as $value) {
                                echo "<h3>".$value->title."</h3><br>".$value->description;
                            }

                        ?>
                    <br><br><br><br><br><br><br><br><br>
                    
                    
                    <h1>How to fill up your plate:</h1>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-4" style="padding: 2%;">
                                    <img data-toggle="modal" data-target="#data_view_book" src="<?=base_url();?>assets/images/pingangpinoy_book.png" style="border: solid black 1px;" alt="Pingang Pinoy Icon" width="93%" height="auto">
                                </div>
                                <div class="col-sm-4" style="padding: 2%;">
                                    <img data-toggle="modal" data-target="#data_view_kids"  style="border: solid black 1px;" src="<?=base_url();?>assets/images/pingangpnoy_icon/PPkids.jpg" alt="Pingang Pinoy Icon" width="90%" height="auto">
                                </div>
                                <div class="col-sm-4" style="padding: 2%;">
                                    <img data-toggle="modal" data-target="#data_view_teens"  style="border: solid black 1px;" src="<?=base_url();?>assets/images/pingangpnoy_icon/PPteens.jpg" alt="Pingang Pinoy Icon" width="90%" height="auto">
                                </div>
                                <div class="col-sm-4" style="padding: 2%;">
                                    <img data-toggle="modal" data-target="#data_view_lactating"  style="border: solid black 1px;" src="<?=base_url();?>assets/images/pingangpnoy_icon/PPlactating.jpg" alt="Pingang Pinoy Icon" width="90%" height="auto">
                                </div> 
                                <div class="col-sm-4" style="padding: 2%;">
                                    <img data-toggle="modal" data-target="#data_view_older"  style="border: solid black 1px;" src="<?=base_url();?>assets/images/pingangpnoy_icon/PPolder.jpg" alt="Pingang Pinoy Icon" width="90%" height="auto">
                                </div>
                                <div class="col-sm-4" style="padding: 2%;">
                                    <img data-toggle="modal" data-target="#data_view_adults"  style="border: solid black 1px;" src="<?=base_url();?>assets/images/pingangpnoy_icon/PPadults.jpg" alt="Pingang Pinoy Icon" width="90%" height="auto">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4" style="padding: 3%;">
                        <br><br><br>
                            <a class="popup-youtube" href="<?=base_url();?>assets/Pinggang Pinoy AVP.mp4"><img src="<?=base_url();?>assets/images/pingangpnoy_icon/playvid.png" alt="Pingang Pinoy Icon" width="100%" height="auto"></a>
                        
                        </div>
                        
                    </div>
                

                    
                </div>
            </div>
        </div>

        
        
<style>
/*
.modal-dialog, .modal-content {
  display: flex;
}

.modal-dialog, .modal-content {
  background-color: rgba(0,0,0,.0001) !important;
}
*/
</style>
        
    <div class="modal fade" id="data_view_book" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                    <div class="modal-body">
                        <center>
                            <img src="<?=base_url();?>assets/images/pingangpnoy_icon/pingangpinoy_book.png" alt="Pingang Pinoy Icon" width="70%" height="auto">
                        </center>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary btn-sm" href="<?=base_url();?>help/infographics_files#tab3-content">Download</a>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>
        
    <div class="modal fade" id="data_view_kids" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                    <div class="modal-body">
                        <center>
                            <img src="<?=base_url();?>assets/images/pingangpnoy_icon/kids_table.png" alt="Pingang Pinoy Icon" width="100%" height="auto">
                        </center>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary btn-sm" href="<?=base_url();?>help/infographics_files#tab3-content">Download</a>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>
        
    <div class="modal fade" id="data_view_teens" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                    <div class="modal-body">
                        <center>
                            <img src="<?=base_url();?>assets/images/pingangpnoy_icon/teens_table.png" alt="Pingang Pinoy Icon" width="100%" height="auto">
                        </center>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary btn-sm" href="<?=base_url();?>help/infographics_files#tab3-content">Download</a>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>
        
    <div class="modal fade" id="data_view_lactating" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                    <div class="modal-body">
                        <center>
                            <img src="<?=base_url();?>assets/images/pingangpnoy_icon/lactating_table_sub.png" alt="Pingang Pinoy Icon" width="100%" height="auto">
                        </center>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary btn-sm" href="<?=base_url();?>help/infographics_files#tab3-content">Download</a>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>
        
    <div class="modal fade" id="data_view_adults" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                    <div class="modal-body">
                        <center>
                            <img src="<?=base_url();?>assets/images/pingangpnoy_icon/adults_table.png" alt="Pingang Pinoy Icon" width="100%" height="auto">
                        </center>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary btn-sm" href="<?=base_url();?>help/infographics_files#tab3-content">Download</a>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>
        
    <div class="modal fade" id="data_view_older" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                    <div class="modal-body">
                        <center>
                            <img src="<?=base_url();?>assets/images/pingangpnoy_icon/older_table.png" alt="Pingang Pinoy Icon" width="100%" height="auto">
                        </center>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary btn-sm" href="<?=base_url();?>help/infographics_files#tab3-content">Download</a>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>
        
    
        
</section>        
                



<script>
$(document).ready(function() {
	$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
		disableOn: 700,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,

		fixedContentPos: false
	});
});

</script>
