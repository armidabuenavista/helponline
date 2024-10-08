<?php
 if (!defined('BASEPATH')) exit('No direct script access allowed');
  if (!isset($this->session->userdata['logged_in'])){
     header("location:".  base_url('login'));
 }

?>

    <div class="container">
        <h3>HelpOnline Crossword Puzzle Data Repository:<small> (Data Manupulation Module for Crossword Puzzle)</small></h3>
    </div>
    <hr>
    <div class="container">
        <div id="passwordreset" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="panel-title">Start your Session:</div>
                    </div>                     
                    <div class="panel-body">
                        <form id="signupform" method="post" class="form-horizontal" role="form" action="<?php echo base_url('help_admin/library/access_verify');?>">
                            <div class="form-group">

                                <label for="email" class=" control-label col-sm-3">Access Code</label>
                                <div class="col-sm-9">
                                    <input type="text" name="access_code" required id="access_code" class="form-control" placeholder="Type the Access Code">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class=" control-label col-sm-3">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" required class="form-control" id="password" placeholder="Type the Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- Button -->                   
                                <div class="  col-sm-offset-3 col-sm-9">
                                  <button id="submit" name="submit" type="submit" class="btn btn-success" ><i class="fa fa-sign-in"></i> Submit</button>
                                  <button type="reset" class="btn btn-default" ><i class="fa fa-eraser"></i> Reset</button>
                                </div>
                            </div>                             
                        </form>
                    </div>
                 </div>
            </div>    
    </div>