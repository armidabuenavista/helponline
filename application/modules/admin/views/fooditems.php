<?php $this->load->view('admin_header'); ?>	



</head>

<body>
<div id="fooditem"  class="col-md-12">

</div>

  <!-- Navigation -->
  <?php $this->load->view('admin_navbar'); ?>	

   
	 <div class="container">
				 <div class="col-md-12">
		       





		
 <?php		
 	echo "<a id=\"\" href=\"#\" class=\"add_fooditem btn btn-success\"><span class=\"glyphicon glyphicon-plus\"></span> Add Fooditem</a><hr></hr>";
	 echo "<div class=\"panel panel-default\">
                        <div class=\"panel-heading\">
                            <i class=\"fa fa-cutlery\"></i> Fooditems";
	echo "<div class=\"pull-right\">
                                <div class=\"btn-group\">
                                    <button type=\"button\" class=\"btn btn-default btn-xs dropdown-toggle\" data-toggle=\"dropdown\">
                                        Action
                                        <span class=\"caret\"></span>
                                    </button>
                                    <ul class=\"dropdown-menu pull-right\" role=\"menu\">
                                      
										<li><a href=\"#\" onclick =\"window.open('#')\">Print</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>	
							</div>";
	echo "<div class=\"panel-body\">";
	echo "<div class=\"table-responsive\">";
	echo "<table id=\"fooditems\" class=\"table table-condensed\"    >";
	echo "<thead><tr>";
	echo "<th>Foodgroup</th>";
	echo "<th>Foodlist</th>";
	echo "<th>Fooditem</th>";
	//echo "<th>Add Foodgroup</th>";
	echo "<th>Edit</th>";
	echo "<th >Delete</th>";
	echo "</tr></thead><tbody>";
		 
     foreach($get_fooditems as $row){
	 
		$id= $row->id;
		$foodgroup_content= $row->foodgroup;
		$foodgroup= $row->foodgroup;
		$foodlist= $row->foodlist;
		$fooditem= $row->fooditem;
	

		echo "<tr>";
	
		echo "<td>$foodgroup_content</td>";
		echo "<td>$foodlist</td>";
		echo "<td>$fooditem</td>";
	//	echo "<td align=\"center\"><span class=\"glyphicon glyphicon-plus\"></span></td>";
		echo "<td align=\"center\"><a id=\"$id\" href=\"#\" class=\"edit_fooditem\"><span class=\"glyphicon glyphicon-edit\"></span></a></td>";
		echo "<td align=\"center\"><a id=\"$id\" href=\"#\" class=\"delete_fooditem\"><span class=\"glyphicon glyphicon-remove\"></span></a></td>";
			
   
}
 

echo "</tr></tbody></table></div></div></div>";

?>
       
        	</div> 
        	
      			
				</div>

			
					
						

<?php $this->load->view('admin_footer'); ?>	
	