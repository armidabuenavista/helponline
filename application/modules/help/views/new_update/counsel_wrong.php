  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/sweet/sweetalert.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/sweet/themes/facebook/facebook.css">



    <style>
             body{
/*                background: #000000 url('<?php echo base_url(); ?>assets/images/back.jpg');*/
                background-color: grey;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-blend-mode: darken;
                background-origin: content-box;
                background-position: center; 
                padding: 35px 0px 35px 0px;
            }
    </style>
    <script>
        function key_code(){
             swal({
               title: "Warning!",
               text: "Choose fromthe type of Counseling! Please try again!",
               type: "warning",
               showCancelButton: false,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "Ok",
               closeOnConfirm: false
             },
             function(){
               history.back();
             });
         }
     </script>
    
    <body onload="key_code()">
        <div style="padding-top: 300%;"></div>
    </body>




<script src="<?php echo base_url(); ?>assets/sweet/sweetalert-dev.js"></script>
<script src="<?php echo base_url(); ?>assets/sweet/sweetalert.min.js"></script>