<?php
 if (!defined('BASEPATH')) exit('No direct script access allowed');
  if (!isset($this->session->userdata['logged_in'])){
     header("location:".  base_url('login'));
 }

?>

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
<script>
    function test(){
        swal({
               title: "Warning!",
               text: "Choose from the Category!",
               type: "warning",
               showCancelButton: false,
               confirmButtonColor: "#8abb6f",
               confirmButtonText: "Ok",
               closeOnConfirm: false
             },
        function(){
            window.open("<?php echo base_url(); ?>help_admin/library/history_main","_self");
        }); 
    }
</script>
<body onload="test()">
</body>
<script src="<?php echo base_url(); ?>assets/sweet/sweetalert-dev.js"></script>
</html>