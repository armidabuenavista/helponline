
<script type="text/javascript">

 

	$(function () {
 				var d = new Date();
                var current_year = d.getFullYear();
                var processed_json = new Array();   
				
                    $.ajax({
            url:base_url+'admin/help/get_users_data',
           
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
                    $('#site_graph').highcharts({
                    chart: {
                        type: "line"
                    },
                    title: {
                        text: "Users "
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
                            text: "Users"
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


	<div class="container" style="width:100%;height:100%;"  >
  
    <hr class="colorgraph">
    
<div id="site_graph" class="site_graph" >

    
    
    
 </div>
<hr class="colorgraph">


        </div>
        
    
        
            
            
            

		
	
		
			
			
			