	<style>
		@media (max-width: 992px) {
			.not-scroll{
				overflow-y: visible;
				height: auto;
			}
			.scroll{
				height: auto;
				overflow-y: visible;
			}
			body{
				overflow: auto;
            }
            .center-it{
                text-align: center;
            }
		}
		@media(min-width: 992px){
			.not-scroll{
				height: 100%;
				overflow-y: none;
			}
			.scroll{
				height: 100%;
				overflow-y: scroll;
			}
			body{
				height: 100%;
				overflow: hidden;
			}
		}
        
        
        
        @import url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');
        body{
            color: black;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            line-height: 1.80857;
        }
        .shadow {
            -webkit-box-shadow: 3px 3px 5px 5px rgba(0,0,0,0.1);
            -moz-box-shadow: 3px 3px 5px 5px rgba(0,0,0,0.1);
            box-shadow: 3px 3px 5px 5px rgba(0,0,0,0.1);
        }
        /*------------------------------------------------------------------ HEADER -------------------------------------------------------------------*/
        .top-header .navbar{
            padding: 5px 0px;
        }
        .top-header {
            background-image: url("<?= base_url()?>assets/pinoy_assest/images/header_img.png");
            position: relative;
            top: 0px;
            left: 0px;
            width: 100%;
            margin: 0;
            z-index: 20;
            background-position: left;
            background-repeat: no-repeat;
            background-color: #0892fd;
            background-size: auto 100%;
        }
        .top-header .navbar .navbar-collapse ul li a {
            text-transform: uppercase;
            font-size: 14px;
            padding: 7px 6px;
            position: relative;
            font-weight: 500;
            overflow: hidden;
            color: #000;
        }
        @media (min-width: 1200px){
            .top-header .navbar .navbar-collapse ul li .nav-link {
            color: #fff;
            }
            
        }
        a.navbar-brand {
            left: 35px;
            position: relative;
        }
        .search_icon.nav-link img {
            width: 25px;
        }
        .top-header .navbar .navbar-collapse ul li {
            margin: 0 2px;
        }
        .top-header.fixed-menu {
            width: 100%;
            position: fixed;
            box-shadow: 0px 3px 6px 3px rgba(0, 0, 0, 0.06);
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
            -webkit-animation-name: fadeInDown;
            animation-name: fadeInDown;
            background: #0892fd;
            z-index: 20;
        }
        .navbar-toggler {
            border: 2px solid #fff;
            border-radius: 0;
            margin: 15px 15px;
            padding: 8px 8px;
            -webkit-transition: all 0.2s linear;
            -moz-transition: all 0.2s linear;
            -o-transition: all 0.2s linear;
            transition: all 0.2s linear;
        }
        .navbar-toggler span {
            background: #fff;
            display: block;
            width: 22px;
            height: 2px;
            margin: 0 auto;
            margin-top: 0px;
            margin-top: 0px;
            -webkit-border-radius: 1px;
            -moz-border-radius: 1px;
            border-radius: 1px;
            -webkit-transition: all 0.2s linear;
            -moz-transition: all 0.2s linear;
            -o-transition: all 0.2s linear;
            transition: all 0.2s linear;
        }
        .navbar-toggler span + span{
            margin-top: 5px;
        }
        .navbar-toggler:hover {
            border: 2px solid #fff;
        }
        .navbar-toggler:hover span{
            background: #fff;
        }
        /* search bar */
        .search-box {
            position: absolute;
            top: 0;
            right: 50px;
            height: auto;
            padding: 0;
            margin-top: 29px;
        }
        .search-box:hover .search-txt{
            width: 240px;
            padding: 0 10px;
        }
        .search-btn {
            float: right;
            width: 41px;
            height: 41px;
            background: transparent;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .search-txt {
            border: none;
            outline: none;
            float: left;
            padding: 0;
            color: #000;
            font-size: 14px;
            line-height: 41px;
            width: 0;
            transition: width 400ms;
            background: #fff;
            padding: 0;
            font-weight: 300;
        }
        .theme_color {
            color: #0892fd;
        }
	</style>

</head>
<body class="" style="">