  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/sweet/sweetalert.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/sweet/themes/facebook/facebook.css">






 <style>
             body{
/*                background: #000000 url('<?php echo base_url(); ?>assets/images/back.jpg');*/
                background-color: white;
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
               title: "Success!",
               text: "Your request successfully send to admin. You will received email from admin!",
               type: "success",
               showCancelButton: false,
               confirmButtonColor: "#8abb6f",
               confirmButtonText: "PROCEED",
               closeOnConfirm: false
             },
             function(){
               window.open("<?php echo base_url(); ?>help/user_index","_self");
             });
         }
     </script>
    
    <body onload="key_code()">
        <div style="padding-top: 300%;"></div>
    </body>



<script src="<?php echo base_url(); ?>assets/sweet/sweetalert-dev.js"></script>
<script src="<?php echo base_url(); ?>assets/sweet/sweetalert.min.js"></script>