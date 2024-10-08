<?php $this->load->view('client_header'); ?>    

<?php $this->load->view('sidebar'); ?>  



<style>

.ui-dialog .ui-dialog-title {
  color:#000000;
font-family:"Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
	
}

p{
 font-family:"Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;	
}
.table-condensed{
	 font-family:"Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
}
.table-striped {
    font-family:"Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
	border: 1px solid #ddd;
}

li.ms-select-all{
	
	padding: 0px 15px 0px 10px;
}

.line{
	border-bottom: 2px solid #ff3333;
}



.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default,.ui-dialog .ui-dialog-content {
    font-family: "Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
  
    background: #FFFFFF;
}	


.ui-widget-content a {
    color: #dd4814;
}

/*.ui-menu .ui-menu-item a:focus {

}*/
.ui-widget input, .ui-widget select, .ui-widget textarea, .ui-widget button {
font-family: "Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
}

.ui-state-focus {
background: none !important;
background-color: #dd4814 !important;
color:#ffffff !important;
border: none !important;}

/*.ui-widget-content a:hover {
    background-color: #dd4814;
}*/
.ui-slider .ui-slider-handle {
    
	border: 1px solid #6d6963;
    
}

.ui-widget-header {
     border: 0px solid #aaaaaa; 
     background: #FFFFFF;
    color: #222222;
    font-weight: normal;
}
.ui-dialog-content {
    font-family: "Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
    /* border: 1px solid #dad8d6; */
    background: #FFFFFF;
}

.ui-state-highlight .ui-state-default {
    background:#eff415;
	
}
	</style>

			
			
		
  
<div id="compare_pa"  style="display: none;  " class="col-md-12" >
		
		
</div>

<div id="edit_pa"    style="display: none;  " class="col-md-12">
		
			

</div>

<div id="pa_tracker">

</div>
 

     



<?php $this->load->view('client_footer'); ?>    