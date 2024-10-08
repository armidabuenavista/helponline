
                <br><br><br>
  <?php $seg = $this->uri->segment(3, 0); ?>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta name="description" content="Bookblock: A Content Flip Plugin - Demo 4" />
		<meta name="keywords" content="javascript, jquery, plugin, css3, flip, page, 3d, booklet, book, perspective" />
		<meta name="author" content="Codrops" />
		<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/booklet/css/default.css" />
		<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/booklet/css/bookblock.css" />
		<!-- custom demo style -->
		<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/booklet/css/demo4.css" />
		<script src="<?=base_url();?>assets/booklet/js/modernizr.custom.js"></script>
			<div class="bb-custom-wrapper">
				<div id="bb-bookblock" class="bb-bookblock">
                            <?php
                              $this->load->model('mdl_help', '', TRUE);
                                  foreach ($this->load->mdl_help->get_fel_content_update($seg) as $value) {
                            ?>
                    <div class="bb-item">
		    <div class="bb-custom-firstpage">
                            <?php
                                $img_data = base_url()."assets/images/fel_photo/no_photo.png";
                                if($value->image_lib!=""){
                                    $img_data = base_url()."assets/images/fel_photo/".$value->image_lib;
                                }else{
                                    $img_data = base_url()."assets/images/fel_photo/no_photo.png";
                                }
                            ?>
                            <center><div style="padding: 5%;"><img style="padding-top: 0px; margin-top; 0px;" src="<?=$img_data;?>" alt="FEL Icon" width="90%" height="auto"></div></center>
                            
						</div>
						<div class="bb-custom-side">
                            <br><br><br>
                    <center>
                        <p><b>Food Item Information:</b></p><br>
                            <div class="row">
                                <div class="col-sm-8">
                                    <p>FEL List: <b><?php foreach ($this->load->mdl_help->get_fel_cat_by_id($value->list_id) as $value_cat) { echo $value_cat->numerical_val;?> - <?=$value_cat->name; } ?></b></p>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>
                                        <?php
                                            if($value->category==1){ ?>
                                                Fresh
                                            <?php }else{ ?>
                                                Processed
                                            <?php }
                                        ?></b></p>
                                </div>
                                <div class="col-sm-6"><p>English Name: <br><b><?=$value->name_e; ?></b></p></div>
                                <div class="col-sm-6"><p>Filipino Name: <br><b><?=$value->name_p; ?></b></p></div>
                                <div class="col-sm-6"><p>Household Measure (Dimension): <br><b><?=$value->household_measure; ?></b></p></div>
                                <div class="col-sm-6"><p>Edible Weight (g): <br><b><?=$value->weight; ?></b></p></div>
                                <div class="col-sm-3"><p>Calorie (kcal): <br><b><?php if($value->calorie=="0"){ echo "-"; }else{ echo $value->calorie; } ?> </b></p></div>
                                <div class="col-sm-3"><p>Carbohydrate (g): <br><b><?php if($value->carb=="0"){ echo "-"; }else{ echo $value->carb; } ?> </b></p></div>
                                <div class="col-sm-3"><p>Protein (g): <br><b><?php if($value->protein=="0"){ echo "-"; }else{ echo $value->protein; } ?> </b></p></div>
                                <div class="col-sm-3"><p>Fat (g): <br><b><?php if($value->fat=="0"){ echo "-"; }else{ echo $value->fat; } ?> </b></p></div>
                            </div>
                        </center>
                    
                        </div>
			</div>
                    <?php } ?>
                    
                    <!----------------------------------------------------------------------------------- ---------------------------------------------------------------------------------------->
                    
                    <?php
                    if($seg==8){
                        $this->load->model('mdl_help', '', TRUE);
                        foreach ($this->load->mdl_help->get_fel_content_sub() as $value) {
                    ?>
                    
                    <div class="bb-item">
						<div class="bb-custom-firstpage">
                            <?php
                                $img_data = base_url()."assets/images/fel_photo/no_photo.png";
                                if($value->image_lib!=""){
                                    $img_data = base_url()."assets/images/fel_photo/".$value->image_lib;
                                }else{
                                    $img_data = base_url()."assets/images/fel_photo/no_photo.png";
                                }
                            ?>
                            <center><div style="padding: 5%;"><img style="padding-top: 0px; margin-top; 0px;" src="<?=$img_data;?>" alt="FEL Icon" width="90%" height="auto"></div></center>
                            
						</div>
						<div class="bb-custom-side">
                            <br><br><br>
                    <center>
                        <p><b>Food Item Information:</b></p><br>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p><b><?php foreach ($this->load->mdl_help->get_fel_app_true_id($value->true_serve) as $value_cat) { echo $value_cat->true_app; } ?></b></p>
                                </div>
                                <div class="col-sm-8">
                                    <p>Other Food Lists: <b><?php foreach ($this->load->mdl_help->get_fel_app_sub_id($value->category) as $value_cat) { echo $value_cat->name_app; } ?></b></p>
                                </div>
                                <div class="col-sm-6"><p>English Name: <br><b><?=$value->name_e; ?></b></p></div>
                                <div class="col-sm-6"><p>Filipino Name: <br><b><?=$value->name_p; ?></b></p></div>
                                <div class="col-sm-6"><p>Household Measure (Dimension): <br><b><?=$value->household_measure; ?></b></p></div>
                                <div class="col-sm-6"><p>Edible Weight (g): <br><b><?=$value->weight; ?></b></p></div>
                                <div class="col-sm-12">
                                    <p><b>Exchange per Serving:</b></p>
                                </div>
                                <div class="col-sm-3">
                                    <p>Vegetables: <br><b><?php if($value->veg=="0"){ echo "-"; }else{ echo $value->veg; } ?></b></p>
                                </div>
                                <div class="col-sm-3">
                                    <p>Fruit: <br><b><?php if($value->fruit=="0"){ echo "-"; }else{ echo $value->fruit; } ?></b></p>
                                </div>
                                <div class="col-sm-3">
                                    <p>Milk: <br><b><?php if($value->milk=="0"){ echo "-"; }else{ echo $value->milk; } ?></b></p>
                                </div>
                                <div class="col-sm-3">
                                    <p>Rice: <br><b><?php if($value->rice=="0"){ echo "-"; }else{ echo $value->rice; } ?></b></p>
                                </div>
                                
                                <div class="col-sm-4">
                                    <p>Meat: <br><b><?php if($value->meat=="0"){ echo "-"; }else{ echo $value->meat; } ?></b></p>
                                </div>
                                <div class="col-sm-4">
                                    <p>Sugar: <br><b><?php if($value->sugar=="0"){ echo "-"; }else{ echo $value->sugar; } ?></b></p>
                                </div>
                                <div class="col-sm-4">
                                    <p>Fat: <br><b><?php if($value->fat_serve=="0"){ echo "-"; }else{ echo $value->fat_serve; } ?></b></p>
                                </div>
                                
                                
                                <div class="col-sm-3"><p>Calorie (kcal): <br><b><?php if($value->calorie=="0"){ echo "-"; }else{ echo $value->calorie; } ?> </b></p></div>
                                <div class="col-sm-3"><p>Carbohydrate (g): <br><b><?php if($value->carb=="0"){ echo "-"; }else{ echo $value->carb; } ?> </b></p></div>
                                <div class="col-sm-3"><p>Protein (g): <br><b><?php if($value->protein=="0"){ echo "-"; }else{ echo $value->protein; } ?> </b></p></div>
                                <div class="col-sm-3"><p>Fat (g): <br><b><?php if($value->fat=="0"){ echo "-"; }else{ echo $value->fat; } ?> </b></p></div>
                            </div>
                        </center>
                    
                        </div>
					</div>
                    <?php } } ?>
							
						
				</div>

				<nav>
					<a id="bb-nav-first" href="#" class="bb-custom-icon bb-custom-icon-first">First page</a>
					<a id="bb-nav-prev" href="#" class="bb-custom-icon bb-custom-icon-arrow-left">Previous</a>
					<a id="bb-nav-next" href="#" class="bb-custom-icon bb-custom-icon-arrow-right">Next</a>
					<a id="bb-nav-last" href="#" class="bb-custom-icon bb-custom-icon-last">Last page</a>
				</nav>

			</div>

		<script src="<?=base_url();?>assets/booklet/js/additional_js.js"></script>
		<script src="<?=base_url();?>assets/booklet/js/jquerypp.custom.js"></script>
		<script src="<?=base_url();?>assets/booklet/js/jquery.bookblock.js"></script>
		<script>
			var Page = (function() {
				
				var config = {
						$bookBlock : $( '#bb-bookblock' ),
						$navNext : $( '#bb-nav-next' ),
						$navPrev : $( '#bb-nav-prev' ),
						$navFirst : $( '#bb-nav-first' ),
						$navLast : $( '#bb-nav-last' )
					},
					init = function() {
						config.$bookBlock.bookblock( {
							speed : 1000,
							shadowSides : 0.8,
							shadowFlip : 0.4
						} );
						initEvents();
					},
					initEvents = function() {
						
						var $slides = config.$bookBlock.children();

						// add navigation events
						config.$navNext.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'next' );
							return false;
						} );

						config.$navPrev.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'prev' );
							return false;
						} );

						config.$navFirst.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'first' );
							return false;
						} );

						config.$navLast.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'last' );
							return false;
						} );
						
						// add swipe events
						$slides.on( {
							'swipeleft' : function( event ) {
								config.$bookBlock.bookblock( 'next' );
								return false;
							},
							'swiperight' : function( event ) {
								config.$bookBlock.bookblock( 'prev' );
								return false;
							}
						} );

						// add keyboard events
						$( document ).keydown( function(e) {
							var keyCode = e.keyCode || e.which,
								arrow = {
									left : 37,
									up : 38,
									right : 39,
									down : 40
								};

							switch (keyCode) {
								case arrow.left:
									config.$bookBlock.bookblock( 'prev' );
									break;
								case arrow.right:
									config.$bookBlock.bookblock( 'next' );
									break;
							}
						} );
					};

					return { init : init };

			})();
		</script>
		<script>
				Page.init();
		</script>

                    
                    
                    
                