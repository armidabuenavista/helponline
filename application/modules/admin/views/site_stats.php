<?php $this->load->view('admin_header'); ?>
	<style>
        .badge{
            background-color: #d3592c;

        }
	</style>
	<?php $this->load->view('admin_navbar'); ?>	
        <div id="site_stats">
        </div>
			<div id="container">
			<div id="col-md-12">
			<hr class="colorgraph">
			<div class="col-md-12" >
			
			<h1>Site Statistics</h1>
                <hr>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-signal fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">

                                            <div id="site_count"></div>
                                            
                                        </div>
                                        <div> Site Views</div>
                                    </div>
                                </div>
                            </div>
                             <a href="#" id="page_stats">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-calendar fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <div id="appointments_count"></div>
                                        </div>
                                        <div> Total Appointments</div>
                                    </div>
                                </div>
                            </div>
                             <a href="#" id="appointment_stats">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>

                        </div>
                    </div>


                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-history fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                        <div id="pendings_count"> </div>
                                        <?php// echo $numRows; ?>
                                            

                                        </div>
                                        <div> Total Pending Requests</div>
                                    </div>
                                </div>
                            </div>
                             <a href="#">
                                <div class="panel-footer">
                                    <a href="<?=base_url();?>admin/help/pending_requests"><span class="pull-left">View Details</span></a>
                                    <a href="<?=base_url();?>admin/help/pending_requests"><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                                    <div class="clearfix"></div>
                                </div>
                            </a>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" >
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                        <div id="users_count"></div>
                                        </div>
                                        <div> Total Users</div>
                                    </div>
                                </div>
                            </div>
                             <a href="#" id="users_stats">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        <?php $this->load->view('admin_footer'); ?>	