<?php $this->load->view('client_header'); ?>    

<?php $this->load->view('sidebar'); ?>  
<style>
.ui-state-highlight .ui-state-default {
    background:#eff415;
} 
.ui-widget-header {
     border: 0px solid #aaaaaa; 
     background: #FFFFFF;
    color: #222222;
    font-weight: normal;
}


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

      <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="fluid-container">

  


<!-- Begin Body -->
<div class="container" style="margin-top: 20px;">
  
            
            <div class="col-md-9">

              <div class="row">
              <h2 >Summary</h2>
              
              <hr class="colorgraph">
              <?php $a= date("Y-m-d");?>
                <div class="form-group form-inline" align="right" >
                  
           <input type="text" placeholder="<?php echo date("l jS F Y",strtotime($a)); ?>" class="form-control" id="pa_food_entry_date" name="pa_food_entry_date" /> <button id="compare_summary" name="compare_summary" class="btn btn-primary"> Compare</button>
        
       

                </div>




                 <div  class="container"style="width: 100%; height: 700px;min-height: 400px; overflow-y: scroll;" align="center">
            
             
        <div id="summary_div" align="center">
             <div class="col-md-12"  align="center" style="background: url('<?php echo base_url(); ?>assets/images/weight-balance.png');  width: 900px; height: 800px; background-repeat: no-repeat; position: relative; left: 100px;">
            <div id="foodtracker_cal" style="position: absolute; top:25%; left:45%;  font-weight: bold; width:50px; ">

</div>  
<div id="foodtracker_cal" style="position: absolute; top:25%; right:88%;  font-weight: bold; width:50px; ">

</div>
              
    
            </div>
        
           
              
              
            </div>
    
              
            
        
              </div>




              </div>

            </div>




</div>



        </div>


    </div>

    
<?php $this->load->view('client_footer'); ?>    