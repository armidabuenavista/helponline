<!DOCTYPE html>
<html lang="en">
<head>
    <title>HELP Online</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url("assets/images/ncs.png"); ?>"/>
    <link rel="stylesheet" href="<?=base_url();?>assets/resources/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/resources/css/animate.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/resources/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/resources/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/resources/css/magnific-popup.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/resources/css/aos.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/resources/css/ionicons.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/resources/css/flaticon.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/resources/css/icomoon.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/resources/css/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-MH62WL60C7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-MH62WL60C7');
    </script>
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://i.fnri.dost.gov.ph/">iFNRI</a>
            <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav nav ml-auto">
                    <li class="nav-item"><a href="<?=base_url();?>help/user_index" class="nav-link"><span>Home</span></a></li>
                    <li class="nav-item"><a href="<?=base_url();?>help/body_statistics" class="nav-link"><span>HELP Tracker</span></a></li>
                    <li class="nav-item"><a href="<?=base_url();?>help/fast_tools_enchance" class="nav-link"><span>Nutrition Calculator</span></a></li>
                    <li class="nav-item"><a href="<?=base_url();?>help/nutrition_label_update" class="nav-link"><span>Nutrition Facts</span></a></li>
                    <li class="nav-item"><a href="<?=base_url();?>help/fel_page" class="nav-link"><span>Food Exchange Lists</span></a></li>
                    <li class="nav-item"><a href="<?=base_url();?>help/pingang_pinoy_page" class="nav-link"><span>Pinggang Pinoy</span></a></li>
                    <li class="nav-item"><a href="<?=base_url();?>help/infographics_files" class="nav-link"><span>Downloadable File</span></a></li>

                    <?php if(isset($_SESSION['logged_in'])){ ?>
                        <li class="nav-item"><a href="<?=base_url();?>help/user_index" class="nav-link"><span><b>Welcome</b> <?php echo isset($fname) ? $fname : 'Guest'; ?> <?php echo isset($lname) ? $lname : ''; ?></span></a></li>
                    <?php }else{ ?>
                        <li class="nav-item cta mr-md-2"><a href="http://10.10.124.26/iFNRI/login" class="nav-link">Log In</a></li>
                        <li class="nav-item cta mr-md-2"><a href="http://10.10.124.26/iFNRI/users/register" class="nav-link">Register</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="py-1 navbar-dark top">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"></div>
                            <span class="text"> </span>
                        </div>
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"></div>
                            <span class="text"> </span>
                        </div>
                        <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
                            <p class="mb-0 register-link"><a href="#" class="mr-3"> </a><a href="#"> </a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>

     <div class="content">
        <?php echo isset($content) ? $content : ''; ?>
    </div>

    <footer class="ftco-footer ftco-section img" style="background-image: url(images/footer-bg.jpg);">
        <div class="overlay"></div>
        <div class="container-fluid px-md-5">
            <div class="row">
                <div class="col-md-12 text-center">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                </div>
            </div>
        </div>
    </footer>
    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
        </svg>
    </div>

    <script src="<?=base_url();?>assets/resources/js/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/resources/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="<?=base_url();?>assets/resources/js/popper.min.js"></script>
    <script src="<?=base_url();?>assets/resources/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/resources/js/jquery.easing.1.3.js"></script>
    <script src="<?=base_url();?>assets/resources/js/jquery.waypoints.min.js"></script>
    <script src="<?=base_url();?>assets/resources/js/jquery.stellar.min.js"></script>
    <script src="<?=base_url();?>assets/resources/js/owl.carousel.min.js"></script>
    <script src="<?=base_url();?>assets/resources/js/jquery.magnific-popup.min.js"></script>
    <script src="<?=base_url();?>assets/resources/js/aos.js"></script>
    <script src="<?=base_url();?>assets/resources/js/jquery.animateNumber.min.js"></script>
    <script src="<?=base_url();?>assets/resources/js/scrollax.min.js"></script>
    <script src="<?=base_url();?>assets/resources/js/main.js"></script>

    <script>
