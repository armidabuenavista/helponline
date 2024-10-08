<!DOCTYPE html>
<html>
    <html lang="en">
    <title>iFNRI Website</title>
    <head>   
        <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/sweet/sweetalert.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/sweet/sweetalert.min.js">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/sweet/themes/facebook/facebook.css">
    </head>
<style>
body{
    background: url(<?=base_url();?>assets/images/back.png) white no-repeat top left;
    font-family: sans-serif, Helvetica, Arial;
    background-color: grey;
    background-size: cover;
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-blend-mode: darken;
    background-origin: content-box;
    background-position: center; 
    padding: 8%;
    font-family: sans-serif, Helvetica, Arial;
    }
</style>
<script>
    
    function test(){
        swal({
               title: "Success!",
               text: "Data successfully save on the database! Thank you!",
               type: "success",
               showCancelButton: false,
               confirmButtonColor: "#8abb6f",
               confirmButtonText: "Ok",
               closeOnConfirm: false
             },
        function(){
            window.open("<?php echo base_url(); ?>help/NSTW","_self");
        }); 
    }
    
</script>
<body onload="test()">
</body>
<script src="<?php echo base_url(); ?>assets/sweet/sweetalert-dev.js"></script>