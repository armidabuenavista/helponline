<style>
.container{
    width: 100%;
    width: auto;
}

.nav-tabs li a {font-size:10px;}
</style>
<script type="text/javascript">


	$(function () {
 				var d = new Date();
                var current_year = d.getFullYear();
                var processed_json = new Array();   
				
                    $.ajax({
            url:base_url+'admin/help/get_stats_data',
           
            method:"GET",
             dataType: "json",
            success:function(data){
            // Your code here.. use something like this
            // var Oa = retrieved_data;

            // Since your controller produce array of object you can access the value by using this one :
        
           // $.each(Obj, function(index, field) {
                

          		//	$.getJSON("wt_data.php",{client_id1:client_id1}, function(data) {
				
                    // Populate series
                  /*  for (i = 0; i < data.length; i++){
                        processed_json.push([data[i].name,data[i].a]);
			
					console.log([data[i].name,data[i].a]);
                    }*/
				console.log(data);
                    // draw chart
                    $('#index_graph').highcharts({
                    chart: {
                        type: "line"
                    },
                    title: {
                        text: "Site Views "
                    },
					credits: {
            			text: "Nutrition Counseling Services",
            			href: "",
						position: {
                		y: -2
						}
          
           			},
                   xAxis: {
categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
},
                    yAxis: {
                        title: {
                            text: "Site Views"
                        }
                    },
					  plotOptions: {
            			line: {
                			dataLabels: {
                   			 	enabled: true
                				},
                				enableMouseTracking: true
            				},
			
        				},

                    series: data,
					
						
                

                   // series: [{processed_json}]
                }); 
           // });

//});
    }
});



        });
		
		



     $(function () {
                var d = new Date();
                var current_year = d.getFullYear();
                var processed_json = new Array();   
                
                    $.ajax({
            url:base_url+'admin/help/get_fast_data',
           
            method:"GET",
             dataType: "json",
            success:function(data){
            // Your code here.. use something like this
            // var Oa = retrieved_data;

            // Since your controller produce array of object you can access the value by using this one :
        
           // $.each(Obj, function(index, field) {
                

                //  $.getJSON("wt_data.php",{client_id1:client_id1}, function(data) {
                
                    // Populate series
                  /*  for (i = 0; i < data.length; i++){
                        processed_json.push([data[i].name,data[i].a]);
            
                    console.log([data[i].name,data[i].a]);
                    }*/
                console.log(data);
                    // draw chart
                    $('#fast_graph').highcharts({
                    chart: {
                        type: "line"
                    },
                    title: {
                        text: "Fast Views "
                    },
                    credits: {
                        text: "Nutrition Counseling Services",
                        href: "",
                        position: {
                        y: -2
                        }
          
                    },
                   xAxis: {
categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
},
                    yAxis: {
                        title: {
                            text: "Fast Views"
                        }
                    },
                      plotOptions: {
                        line: {
                            dataLabels: {
                                enabled: true
                                },
                                enableMouseTracking: true
                            },
            
                        },

                    series: data,
                    
                        
                

                   // series: [{processed_json}]
                }); 
           // });

//});
    }
});



        });   
		



$(function () {
                var d = new Date();
                var current_year = d.getFullYear();
                var processed_json = new Array();   
                
                    $.ajax({
            url:base_url+'admin/help/get_events_data',
           
            method:"GET",
             dataType: "json",
            success:function(data){
            // Your code here.. use something like this
            // var Oa = retrieved_data;

            // Since your controller produce array of object you can access the value by using this one :
        
           // $.each(Obj, function(index, field) {
                

                //  $.getJSON("wt_data.php",{client_id1:client_id1}, function(data) {
                
                    // Populate series
                  /*  for (i = 0; i < data.length; i++){
                        processed_json.push([data[i].name,data[i].a]);
            
                    console.log([data[i].name,data[i].a]);
                    }*/
                console.log(data);
                    // draw chart
                    $('#event_graph').highcharts({
                    chart: {
                        type: "line"
                    },
                    title: {
                        text: "Event Views "
                    },
                    credits: {
                        text: "Nutrition Counseling Services",
                        href: "",
                        position: {
                        y: -2
                        }
          
                    },
                   xAxis: {
categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
},
                    yAxis: {
                        title: {
                            text: "Event Views"
                        }
                    },
                      plotOptions: {
                        line: {
                            dataLabels: {
                                enabled: true
                                },
                                enableMouseTracking: true
                            },
            
                        },

                    series: data,
                    
                        
                

                   // series: [{processed_json}]
                }); 
           // });

//});
    }
});



        });   



$(function () {
                var d = new Date();
                var current_year = d.getFullYear();
                var processed_json = new Array();   
                
                    $.ajax({
            url:base_url+'admin/help/get_publications_data',
           
            method:"GET",
             dataType: "json",
            success:function(data){
            // Your code here.. use something like this
            // var Oa = retrieved_data;

            // Since your controller produce array of object you can access the value by using this one :
        
           // $.each(Obj, function(index, field) {
                

                //  $.getJSON("wt_data.php",{client_id1:client_id1}, function(data) {
                
                    // Populate series
                  /*  for (i = 0; i < data.length; i++){
                        processed_json.push([data[i].name,data[i].a]);
            
                    console.log([data[i].name,data[i].a]);
                    }*/
                console.log(data);
                    // draw chart
                    $('#publications_graph').highcharts({
                    chart: {
                        type: "line"
                    },
                    title: {
                        text: "Publication Views "
                    },
                    credits: {
                        text: "Nutrition Counseling Services",
                        href: "",
                        position: {
                        y: -2
                        }
          
                    },
                   xAxis: {
categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
},
                    yAxis: {
                        title: {
                            text: "Publication Views"
                        }
                    },
                      plotOptions: {
                        line: {
                            dataLabels: {
                                enabled: true
                                },
                                enableMouseTracking: true
                            },
            
                        },

                    series: data,
                    
                        
                

                   // series: [{processed_json}]
                }); 
           // });

//});
    }
});



        });   




$(function () {
                var d = new Date();
                var current_year = d.getFullYear();
                var processed_json = new Array();   
                
                    $.ajax({
            url:base_url+'admin/help/get_help_tracker_data',
           
            method:"GET",
             dataType: "json",
            success:function(data){
            // Your code here.. use something like this
            // var Oa = retrieved_data;

            // Since your controller produce array of object you can access the value by using this one :
        
           // $.each(Obj, function(index, field) {
                

                //  $.getJSON("wt_data.php",{client_id1:client_id1}, function(data) {
                
                    // Populate series
                  /*  for (i = 0; i < data.length; i++){
                        processed_json.push([data[i].name,data[i].a]);
            
                    console.log([data[i].name,data[i].a]);
                    }*/
                console.log(data);
                    // draw chart
                    $('#help_tracker_graph').highcharts({
                    chart: {
                        type: "line"
                    },
                    title: {
                        text: "Help Tracker Views "
                    },
                    credits: {
                        text: "Nutrition Counseling Services",
                        href: "",
                        position: {
                        y: -2
                        }
          
                    },
                   xAxis: {
categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
},
                    yAxis: {
                        title: {
                            text: "Help Tracker Views"
                        }
                    },
                      plotOptions: {
                        line: {
                            dataLabels: {
                                enabled: true
                                },
                                enableMouseTracking: true
                            },
            
                        },

                    series: data,
                    
                        
                

                   // series: [{processed_json}]
                }); 
           // });

//});
    }
});



        });   


$(function () {
                var d = new Date();
                var current_year = d.getFullYear();
                var processed_json = new Array();   
                
                    $.ajax({
            url:base_url+'admin/help/get_pa_tracker_data',
           
            method:"GET",
             dataType: "json",
            success:function(data){
            // Your code here.. use something like this
            // var Oa = retrieved_data;

            // Since your controller produce array of object you can access the value by using this one :
        
           // $.each(Obj, function(index, field) {
                

                //  $.getJSON("wt_data.php",{client_id1:client_id1}, function(data) {
                
                    // Populate series
                  /*  for (i = 0; i < data.length; i++){
                        processed_json.push([data[i].name,data[i].a]);
            
                    console.log([data[i].name,data[i].a]);
                    }*/
                console.log(data);
                    // draw chart
                    $('#pa_tracker_graph').highcharts({
                    chart: {
                        type: "line"
                    },
                    title: {
                        text: "Physical Activity Tracker Views "
                    },
                    credits: {
                        text: "Nutrition Counseling Services",
                        href: "",
                        position: {
                        y: -2
                        }
          
                    },
                   xAxis: {
categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
},
                    yAxis: {
                        title: {
                            text: "Physical Activity Tracker Views"
                        }
                    },
                      plotOptions: {
                        line: {
                            dataLabels: {
                                enabled: true
                                },
                                enableMouseTracking: true
                            },
            
                        },

                    series: data,
                    
                        
                

                   // series: [{processed_json}]
                }); 
           // });

//});
    }
});



        });   




$(function () {
                var d = new Date();
                var current_year = d.getFullYear();
                var processed_json = new Array();   
                
                    $.ajax({
            url:base_url+'admin/help/get_foodtracker_data',
           
            method:"GET",
             dataType: "json",
            success:function(data){
            // Your code here.. use something like this
            // var Oa = retrieved_data;

            // Since your controller produce array of object you can access the value by using this one :
        
           // $.each(Obj, function(index, field) {
                

                //  $.getJSON("wt_data.php",{client_id1:client_id1}, function(data) {
                
                    // Populate series
                  /*  for (i = 0; i < data.length; i++){
                        processed_json.push([data[i].name,data[i].a]);
            
                    console.log([data[i].name,data[i].a]);
                    }*/
                console.log(data);
                    // draw chart
                    $('#foodtracker_graph').highcharts({
                    chart: {
                        type: "line"
                    },
                    title: {
                        text: "Food Tracker Views "
                    },
                    credits: {
                        text: "Nutrition Counseling Services",
                        href: "",
                        position: {
                        y: -2
                        }
          
                    },
                   xAxis: {
categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
},
                    yAxis: {
                        title: {
                            text: "Food Tracker Views"
                        }
                    },
                      plotOptions: {
                        line: {
                            dataLabels: {
                                enabled: true
                                },
                                enableMouseTracking: true
                            },
            
                        },

                    series: data,
                    
                        
                

                   // series: [{processed_json}]
                }); 
           // });

//});
    }
});



        });   



$(function () {
                var d = new Date();
                var current_year = d.getFullYear();
                var processed_json = new Array();   
                
                    $.ajax({
            url:base_url+'admin/help/get_pdri_data',
           
            method:"GET",
             dataType: "json",
            success:function(data){
            // Your code here.. use something like this
            // var Oa = retrieved_data;

            // Since your controller produce array of object you can access the value by using this one :
        
           // $.each(Obj, function(index, field) {
                

                //  $.getJSON("wt_data.php",{client_id1:client_id1}, function(data) {
                
                    // Populate series
                  /*  for (i = 0; i < data.length; i++){
                        processed_json.push([data[i].name,data[i].a]);
            
                    console.log([data[i].name,data[i].a]);
                    }*/
                console.log(data);
                    // draw chart
                    $('#pdri_graph').highcharts({
                    chart: {
                        type: "line"
                    },
                    title: {
                        text: "Nutrition Label Views "
                    },
                    credits: {
                        text: "Nutrition Counseling Services",
                        href: "",
                        position: {
                        y: -2
                        }
          
                    },
                   xAxis: {
categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
},
                    yAxis: {
                        title: {
                            text: "Nutrition Label Views"
                        }
                    },
                      plotOptions: {
                        line: {
                            dataLabels: {
                                enabled: true
                                },
                                enableMouseTracking: true
                            },
            
                        },

                    series: data,
                    
                        
                

                   // series: [{processed_json}]
                }); 
           // });

//});
    }
});



        });   
</script>

<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li><a href="#a" aria-controls="a" role="tab" data-toggle="tab">Help</a></li>
    <li><a href="#b" aria-controls="b" role="tab" data-toggle="tab">Fast Tools</a></li>
    <li><a href="#c" aria-controls="c" role="tab" data-toggle="tab">Events</a></li>

    <li><a href="#d" aria-controls="d" role="tab" data-toggle="tab">Publications</a></li>

    <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Help Tracker
    <span class="caret"></span></a>
    <ul class="dropdown-menu">
    <li><a href="#e" aria-controls="e" role="tab" data-toggle="tab">Help Tracker</a></li>
    <li><a href="#f" aria-controls="f" role="tab" data-toggle="tab">Physical Activity Tracker</a></li>
    <li><a href="#g" aria-controls="g" role="tab" data-toggle="tab">Food Tracker</a></li>
 
    </ul>
    <li><a href="#h" aria-controls="h" role="tab" data-toggle="tab">Nutrition Label</a></li>
  </li>
    <!-- <li><a href="#e" aria-controls="e" role="tab" data-toggle="tab">Help Tracker</a></li>
    <li><a href="#f" aria-controls="f" role="tab" data-toggle="tab">Physical Activity Tracker</a></li>
    <li><a href="#g" aria-controls="g" role="tab" data-toggle="tab">Food Tracker</a></li> -->
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">

    <div role="tabpanel" class="tab-pane active" id="a">

  <div class="container">
    <hr class="colorgraph"></hr>
    
<div id="index_graph"  >

    
    
    

 </div>


<hr class="colorgraph"></hr>

</div>
    </div>
 
    <div role="tabpanel" class="tab-pane" id="b">
  <div class="container">
  
    <hr class="colorgraph"></hr>
    
<div id="fast_graph"  >

    
    
    

 </div>
 </div>
<hr class="colorgraph"></hr>
    </div>
    <div role="tabpanel" class="tab-pane" id="c">
       <div class="container">
  
    <hr class="colorgraph"></hr>
    
<div id="event_graph"  >

    
    
    

 </div>
 </div>
<hr class="colorgraph"></hr> 

    </div>
    <div role="tabpanel" class="tab-pane" id="d">
           <div class="container">
  
    <hr class="colorgraph"></hr>
    
<div id="publications_graph"  >

    
    
    

 </div>
 </div>
<hr class="colorgraph"></hr> 
 



    </div>

     <div role="tabpanel" class="tab-pane" id="e">
       

               <div class="container">
  
    <hr class="colorgraph"></hr>
    
<div id="help_tracker_graph"  >

    
    
    

 </div>
 </div>
<hr class="colorgraph"></hr> 
 


     </div>


        <div role="tabpanel" class="tab-pane" id="f">
       

               <div class="container">
  
    <hr class="colorgraph"></hr>
    
<div id="pa_tracker_graph"  >

    
    
    

 </div>
 </div>
<hr class="colorgraph"></hr> 
 


     </div>

      <div role="tabpanel" class="tab-pane" id="g">
       

               <div class="container">
  
    <hr class="colorgraph"></hr>
    
<div id="foodtracker_graph"  >

    
    
    

 </div>
 </div>
<hr class="colorgraph"></hr> 
 


     </div>

 <div role="tabpanel" class="tab-pane" id="h">
       

               <div class="container">
  
    <hr class="colorgraph"></hr>
    
<div id="pdri_graph"  >

    
    
    

 </div>
 </div>
<hr class="colorgraph"></hr> 
 


     </div>




  </div>



</div>


	






 
        
    
        
            
            
            

		
	
		
			
			
			