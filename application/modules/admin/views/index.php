
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Administrator Login</title>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.10.2.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-ui.js"); ?>"></script> 
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script> 
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">


<style type="text/css">
      /* Override some defaults */
      html, body {
        background-color: #FFFFFF;
      }
      body {
        padding-top: 100px; 
      }
      .container {
       width: 500px;
      }
	  .panel-title{
	  	font-size:20px;
	  }
</style>
</head>
<body>
    <div class="container">
    <div class="col-md-12">
		<div class="panel panel-primary">
    <div class="panel-heading">
        <h2 class="panel-title"><a href=""><img src="" alt="DOST Pinoy" height="50" width="50"/></a> Administrator Login</h2>
    </div>
    <div class="panel-body">
		   <form name="form1" id="form1" method="POST"  action="<?php echo site_url('admin/login');?>" >
            <fieldset>
			  <div  id="alert" align="center"></div> 
              <div class="input-group form-group" align="center" style="margin-bottom: 25px">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input type="text" name="username" id="username" placeholder="Username"  class="form-control"  > 
              </div>
             <div class="input-group form-group" align="center">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span><input type="password" name="password" id="password" placeholder="Password"  class="form-control" >
              </div>
	<div class="form-group form-inline" align="center" >     
	         <button  class="btn btn-primary" id="login" type="submit" > LOGIN</button>
		</div>
            </fieldset>
          </form>
	</div>
</div>	
	</div>		
	</div>		
</body>
</html>