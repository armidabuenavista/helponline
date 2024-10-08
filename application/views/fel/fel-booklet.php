
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/booklet/css/default.css" />
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/booklet/css/bookblock.css" />
<!-- custom demo style -->
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/booklet/css/demo4.css" />
<script src="<?=base_url();?>assets/booklet/js/modernizr.custom.js"></script>

<br><br><br>

<div class="bb-custom-wrapper">
    <div id="bb-bookblock" class="bb-bookblock">
        <!-- Repeat this block for each food item -->
        <?php foreach ($felfooditems as $fooditem): ?>
            <div class="bb-item">
                <div class="bb-custom-firstpage">
                    <center>
                        <div style="padding: 5%;">
                            <img style="padding-top: 0px; margin-top: 0px;" src="<?php echo base_url() . 'assets/images/fel_photo/' . $fooditem->image_lib; ?>" alt="FEL Icon" width="90%" height="auto">
                        </div>
                    </center>
                </div>
                <div class="bb-custom-side">
                    <center>
                        <p><b>Food Item Information:</b></p><br>
                            <div class="row">
                                <div class="col-sm-8">
                                    <p>FEL List: <b><?php echo $fooditem->numerical_val . ' - ' . $fooditem->name_e; ?></b></p>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Category</b></p>
                                </div>
                               <div class="col-sm-6"><p>English Name: <b><?php echo $fooditem->name_e; ?></b></p></div>
                               <div class="col-sm-6"><p>Filipino Name:<b><?php echo $fooditem->name_p; ?></b></p></div>
                                <div class="col-sm-6"><p>Household Measure (Dimension):<b><?php echo $fooditem->household_measure; ?></b></p></div>
                                <div class="col-sm-6"><p>Edible Weight (g): <b><?php echo $fooditem->weight; ?></b></p></div>
                                <div class="col-sm-3"><p>Calorie (kcal): <b><?php echo $fooditem->calorie; ?></b></p></div>
                                <div class="col-sm-3"><p>Carbohydrate (g): <b><?php echo $fooditem->carb; ?></b></p></div>
                                <div class="col-sm-3"><p>Protein (g):<b><?php echo $fooditem->protein; ?></b></p></div>
                                <div class="col-sm-3"><p>Fat (g): <b><?php echo $fooditem->fat; ?></b></p></div>
                            </div>
                    </center>         
                </div>
            </div>
        <?php endforeach; ?>
        <!-- Repeat block ends -->
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
                'wipeleft' : function( event ) {
                    config.$bookBlock.bookblock( 'next' );
                    return false;
                },
                'wiperight' : function( event ) {
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

Page.init();
</script>
