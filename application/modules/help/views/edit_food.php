<?php


$id = $food_id[0]->id;
$menu_id=$food_id[0]->menu_id;
$meal_id = $food_id[0]->meal_id;
$fooditem= $food_id[0]->food_name;
$fic= $food_id[0]->fooditem_code;
$hh_val = $food_id[0]->hh_val;
$hh_m=$food_id[0]->hh_m;
$ep_wt=$food_id[0]->ep_wt;
$ep_wt_val=$food_id[0]->ep_wt_val;
$cal=$food_id[0]->cal;
$cho=$food_id[0]->cho;
$pro=$food_id[0]->pro;
$fat=$food_id[0]->fat;
$image=$food_id[0]->image;
$fct_cal = $food_id[0]->energy;
$fct_cho=$food_id[0]->chocdf;
$fct_pro= $food_id[0]->protein;
$fct_fat= $food_id[0]->fatce;
$image= $food_id[0]->image;


	echo "<h3>Edit Food</h3>";

echo "<hr></hr>";
//echo "<div class=\"container\">";

echo "<div id=\"alert_1\"></div>";
echo "<div class=\"table-responsive\" ><table   border=\"1\" class=\"table table-striped\">";
			echo "<tr>
		<th>Image</th>
		<th>Fooditem</th>
		<th >Quantity</th>
		<th >Unit</th>
		<th>Weight (EP)</th>
		<th>Cal (KCAL)</th>
		<th>C (gm)</th>
		<th>P (gm)</th>
		<th>F (gm)</th>
		<th colspan=\"3\">Action</th>
		
		</tr>";
				
			
			echo "<tr>";
								 $k= base_url("assets/images/meal_photos/$image");
							echo "<td width=\"150\">
						
							<img src=\"$k\" alt=\"Meal\" width=\"50%\" height=\"50%\" class=\"img-thumbnail img\">
							<input type=\"file\" id=\"aa0$menu_id\" name=\"aa1\"  style=\"width: 150px;\"  /><input type=\"hidden\" id=\"image0$menu_id\" name=\"image1\"  value=\"$image\"  />";
							
							//echo " <input type=\"hidden\" class=\"form-control\" name=\"aaa1\" id=\"aaa1\" value=\"$image\"  />";
							echo "</td>";
							echo "<td><input type=\"text\" name=\"fooditem1\" id=\"fooditem0$menu_id\" style=\"width: 150px;\" class=\"form-control fooditem1\" data-count=\"$menu_id\" value=\"$fooditem\" /><input type=\"hidden\" name=\"fic1\" id=\"fic0$menu_id\"  class=\"form-control\" value=\"$fic\"/></td>";
							echo "<td><input type=\"text\" style=\"width: 50px;\" class=\"form-control hh_val1\" name=\"hh_val1\" id=\"hh_val0$menu_id\" data-count1=\"$menu_id\" value=\"$hh_val\" /> </td>";
							
							echo "<td>";
					
							
							echo "<select name=\"hh_m1\" id=\"hh_m0$menu_id\" class=\" hh_m  form-control\" style=\"width:100px;\"  >";
							
			
            foreach($groups as $row)
            { 
			
				$a= $hh_m;
				$b= $row->id;
				if($a == $b){
				  $selectCurrent=' selected=\"\"';
   			 }else{
       			 $selectCurrent='';
    			}
			
            echo '<option  value="'.$row->id.'" "'.$selectCurrent.'" >'.$row->foodunit.'</option>';
			
      
            }
         
							
					
							echo " </select>";
							echo "</td>";
							echo "<td><input type=\"text\" id=\"ep_wt0$menu_id\" class=\"form-control ep_wt1\" size=\"5\" data-count=\"$menu_id\" value=\"$ep_wt\" /><input type=\"hidden\" id=\"ep_wt_val0$menu_id\" class=\"form-control\" size=\"5\" value=\"$ep_wt_val\" /><input type=\"hidden\" id=\"comp_ep0$menu_id\" name=\"comp_ep1\" class=\"form-control\" size=\"5\" /></td>";
							
							echo "<td><strong><span id=\"cal_label0$menu_id\">$cal</span></strong><input type=\"hidden\" id=\"cal0$menu_id\" id=\"cal1\" class=\"form-control\" size=\"5\" value=\"$fct_cal\"/><input type=\"hidden\" id=\"comp_cal0$menu_id\" name=\"comp_cal1\" class=\"form-control\" value=\"$cal\" size=\"5\"/></td>";
							
							echo "<td><strong><span id=\"cho_label0$menu_id\">$cho</span></strong><input type=\"hidden\" id=\"cho0$menu_id\" id=\"cho1\" value=\"$fct_cho\" class=\"form-control\" size=\"5\"/><input type=\"hidden\" id=\"comp_cho0$menu_id\" name=\"comp_cho1\" class=\"form-control\" value=\"$cho\" size=\"5\"/></td>";
							echo "<td><strong><span id=\"pro_label0$menu_id\">$pro</span></strong><input type=\"hidden\" id=\"pro0$menu_id\" name=\"pro1\" value=\"$fct_pro\" class=\"form-control\" size=\"5\" /><input type=\"hidden\" id=\"comp_pro0$menu_id\" name=\"comp_pro1\" class=\"form-control\" value=\"$pro\" size=\"5\"/></td>";
							echo "<td><strong><span id=\"fat_label0$menu_id\">$fat</span></strong><input type=\"hidden\" id=\"fat0$menu_id\"  value=\"$fct_fat\" class=\"form-control\" size=\"5\" /><input type=\"hidden\" id=\"comp_fat0$menu_id\" name=\"comp_fat1\" class=\"form-control\" value=\"$fat\" size=\"5\"/></td>";
						
							echo "<td align=\"center\" colspan=\"7\">";
							echo "<input type=\"hidden\" id=\"meal_id0$menu_id\" name=\"meal_id1\" value=\"$meal_id\" class=\"form-control\"  /><input type=\"hidden\" id=\"rowid\"name=\"rowid\" value=\"$id\" class=\"form-control\" /><button class=\"btn btn-primary edit_food1 btn-sm\" data-menu_id1=\"$menu_id\" data-meal_id1=\"$meal_id\" data-client_id1=\"$uid\" data-count1=\"$menu_id\" id=\"add_food\" value=\"$menu_id\"   >Update</button>";
							echo "</td>";
							echo "</tr>";

		echo "</table></div>";
			
//	}
	/*else{
	echo "<div class=\"alert alert-danger\">No records found.</div>";
}*/
	//echo "</div>";
	

	echo "<hr></hr>";
	
	
	
	
	
			  

?>


