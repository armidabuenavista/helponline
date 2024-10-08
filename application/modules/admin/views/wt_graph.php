

<script type="text/javascript">

$(function () {
                var client_id1= document.getElementById("client_id1").value;
    
                var processed_json = new Array();   
                
                    $.ajax({
            url:base_url+'admin/help/get_wt_data',
            data: "client_id1=" + client_id1,
            method:"GET",
     
            success:function(data){
            // Your code here.. use something like this
            // var Oa = retrieved_data;

            // Since your controller produce array of object you can access the value by using this one :
        
           // $.each(Obj, function(index, field) {
                 

                //  $.getJSON("wt_data.php",{client_id1:client_id1}, function(data) {
                
                    // Populate series
                    for (i = 0; i < data.length; i++){
                        processed_json.push([data[i].month,data[i].wt]);
            
                    console.log([data[i].month,data[i].wt]);
                    }
                
                    // draw chart
                    $('#wt_graph').highcharts({
                    chart: {
                        type: "line"
                    },
                    title: {
                        text: "Weight"
                    },
                    credits: {
                        text: "Nutrition Counselling Services",
                        href: "",
                        position: {
                        y: -2
                        }
          
                    },
                    xAxis: {
                        type: 'category',
                        allowDecimals: false,
                        title: {
                            text: ""
                        }
                    },
                    yAxis: {
                        title: {
                            text: "Weight (kg)"
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

                         exporting: {
            buttons: {
                customButton: {
                    text: 'PDF',
                    onclick: function () {

         // create canvas function from highcharts example http://jsfiddle.net/highcharts/PDnmQ/
(function (H) {
    H.Chart.prototype.createCanvas = function (divId) {
        var svg = this.getSVG(),
            width = parseInt(svg.match(/width="([0-9]+)"/)[1]),
            height = parseInt(svg.match(/height="([0-9]+)"/)[1]),
            canvas = document.createElement('canvas');

        canvas.setAttribute('width', width);
        canvas.setAttribute('height', height);

        if (canvas.getContext && canvas.getContext('2d')) {

            canvg(canvas, svg);

            return canvas.toDataURL("image/jpeg");

        } 
        else {
            alert("Your browser doesn't support this feature, please use a modern browser");
            return false;
        }

    }
}(Highcharts));

                var doc = new jsPDF('l');

    // chart height defined here so each chart can be palced
    // in a different position
    var chartHeight = 80;

    // All units are in the set measurement for the document
    // This can be changed to "pt" (points), "mm" (Default), "cm", "in"
    doc.setFontSize(40);
    //doc.text(35, 25, "");

    //loop through each chart
    $('.wt_graph').each(function (index) {
    
        var imageData = $(this).highcharts().createCanvas();

    
        //doc.addImage(imageData, 'JPEG', 85, (index * chartHeight) + 40, 120, chartHeight);
        doc.addImage(imageData, 'JPEG', 80, 10);
    });


    //save with name
    doc.save('wt_graph.pdf');
    
                        



                    }
                }
            }
        },

                    series: [{
                        name: 'Weight',
                        data: processed_json,
                    
                        
                    }]
                }); 
           // });

//});
    }
});



        });



        
   

        
        


</script>


    <div class="container" style="width:100%;height:100%; " >

    <hr class="colorgraph"></hr>
   
<div id="wt_graph" class="wt_graph" >

    
    
    
 </div>
<hr class="colorgraph"></hr>



            
            
            
<div class="form-group">
    
    
        <input type="hidden" class="form-control border-textbox"  id="client_id1" name="client_id1" value="<?php echo $client_id; ?>"  />
</div>



        </div>
        
    

            
            
            

        
    
        
            
            
            



























