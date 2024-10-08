 
<?php $this->load->view('admin_header'); ?> 
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

    <div class="container">
    <div class="col-md-12">
		<div class="panel panel-primary">
    <div class="panel-heading">

        <h2 class="panel-title"><span class="glyphicon glyphicon-user"></span><a href=""></a> Administrator Login</h2>
    </div>
    <div class="panel-body">
	
	<?php echo validation_errors(); ?>
		   <form name="form1" id="form1" method="POST"  action="<?php echo site_url('admin/verifylogin');?>" >
            <fieldset>
			  <div  id="alert" align="center"></div> 
              <div class="input-group form-group" align="center" style="margin-bottom: 25px">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input type="text" name="username" id="username" placeholder="Username"  class="form-control"  > 
              </div>
             <div class="input-group form-group" align="center">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span><input type="password" name="password" id="password" placeholder="Password"  class="form-control" >
              </div>


<!-- 
             <div class="form-group">
               <select  name="module" id="module" class="form-control " >

     <option value="0">--Select Module--</option>
        <?php 

            foreach($groups as $row)
            { 
      $a= $this->input->post('module');
      $b= $row->id;
        if($a == $b){
          $selectCurrent=' selected=\"\"';
         }else{
             $selectCurrent='';
          }
              echo '<option  value="'.$row->id.'" "'.$selectCurrent.'"  >'.$row->module.'</option>';
            }
            ?>
      </select>
              </div> -->

                
	<div class="form-group form-inline" align="center" >     
	       <input type="hidden" name="module" id="module" value="1" class="form-control">  <button  class="btn btn-default" id="login" type="submit" > LOGIN</button>
		</div>
            </fieldset>
          </form>
	</div>
</div>	
	</div>		

<?php $this->load->view('admin_footer'); ?> 