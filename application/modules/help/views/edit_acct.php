<div class="col-md-12">

<div id="alert1" tabindex="1"></div>
  	 <div class="panel panel-default">
                        <div class="panel-heading">
                      <label>Login Information:
</label> 
 	 
                           
                        </div>
                        <!-- /.panel-heading -->


                        <div class="panel-body">
		          <div class="form-group">
		         <p class="help-block"> Username can contain any letters or numbers, without spaces </p>
            <input type="text" id="username" name="username" class="form-control "   placeholder="*Username" /> 
          </div>
		       <div class="form-group">
        <p class="help-block"> Password should be at least 6 characters</p>
            <input type="password" id="old_password" name="old_password" class="form-control" placeholder="*Old Password"   /> 
          </div>
           <div class="form-group ">
            <p class="help-block"> Please confirm password</p>
            <input type="password" id="new_password" name="new_password" class="form-control" placeholder="*New Password" /> 
          </div>
		       <div class="form-group ">
            <p class="help-block"> Please confirm password</p>
            <input type="password" id="cnf_password" name="cnf_password" class="form-control" placeholder="*Confirm Password" /> 
          </div>
			</div>

			<div class="form-group" align="center">
						   	<input type="hidden" id="uid" name="uid" value="<?php echo $uid;?>" />
							<button id="edit_acct" class="btn btn-success edit_acct"> Update</button>
						   </div>

				</div>

					</div>

