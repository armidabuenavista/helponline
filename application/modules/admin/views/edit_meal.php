
<!-- edit_default_meal controller -->


<?php 

foreach ($results as $row) {
              $foodgroup_id      = $row->foodgroup_id;
              $foodlist_id       = $row->foodlist_id;
              $fooditem_id       = $row->fooditem_id;
              $foodgroup_content = $row->foodgroup_content;
              $ex                = $row->ex;
              $qty_val           = $row->qty_val;
              $hh_val            = $row->hh_val;
              $fooditem          = $row->fooditem;
              $const_ex          = $row->const_ex;
              $hh_m              = $row->hh_measure;
          }

echo "<div class=\"table-responsive\">";
         echo "<hr></hr>";
         echo "<table class=\" table table-bordered\" >";
         echo "<tr>
            <th>Food Group</th>
            <th>Food List</th>
            <th>Food Item</th>
            <th>Exchange</th>
            <th>Qty(EP)</th>
            <th colspan=\"2\">HH Measure</th>
            <th colspan=\"3\" align=\"center\">Action</th>
            
        </tr>";

         echo "<tr><td>";
         echo "<select name=\"foodgroup1\" id=\"foodgroup0$menu_id\" class=\"foodgroup1 form-control input-lg\"data-menu_id=\"$menu_id\" >";
         echo "<option value=\"0\" selected=\"\" >--Food Groups--</option> ";
          foreach ($groups as $row1) {
              $foodid    = $row1->foodid;
              $foodgroup = $row1->foodgroup;
              if ($foodid == $foodgroup_id) {
                  $selectCurrent = ' selected';
              } else {
                  $selectCurrent = '';
              }
              echo "<option value=\"$foodid\" " . $selectCurrent . "  >$foodgroup</option>";
          }
          echo "<option value=\"14\" >Combination Foods</option> ";
          echo " </select>";
          echo "</td>";
        
          echo "<td > ";
          
          echo "<select name=\"foodlist1\" id=\"foodlist0$menu_id\" class=\" form-control foodlist1 input-lg\" data-menu_id=\"$menu_id\"  >";
          echo "<option value=\"0\">--Food Lists--</option>    ";
          foreach ($groups1 as $row2) {
              $foodlistid = $row2->id;
              $foodlist   = $row2->foodlist;
              if ($foodlistid == $foodlist_id) {
                  $selectCurrent = ' selected';
              } else {
                  $selectCurrent = '';
              }
              echo "<option value=\"$foodlistid\" " . $selectCurrent . " >$foodlist</option>";
          }
          echo "</select>";
          echo "</td>";
          echo "<td>";
          echo "<input type=\"text\" id=\"fooditem0$menu_id\" name=\"fooditem1\" class=\"fooditem1 form-control  input-lg meal_plan_exchange1\" placeholder=\"Select Food Item\" value=\"$fooditem\" data-menu_id=\"$menu_id\"  />
         
          <input type=\"hidden\" id=\"fooditem_id0$menu_id\" name=\"fooditem_id1\" class=\"form-control \" value=\"$fooditem_id\"/>";
          echo "</td>";
          echo "<td>";
          echo "<input type=\"text\" class=\"form-control meal_plan_exchange1 input-lg\"  placeholder=\"Ex\" id=\"ex0$menu_id\" name=\"ex1\" size=\"2\"   value=\"$ex\"   data-menu_id=\"$menu_id\" />
                 <input type=\"hidden\" class=\"form-control\"  placeholder=\"Constant Exchange\" id=\"const_ex0$menu_id\" name=\"const_ex1\" size=\"2\" value=\"$const_ex\"  />
                
                    <input type=\"hidden\" class=\"form-control foodgroup_content1\"  id=\"foodgroup_content0$menu_id\" name=\"foodgroup_content1\" size=\"2\" value=\"$foodgroup_content\" data-menu_id=\"$menu_id\" />";
          echo "</td>";


           echo "<td >";
          echo "<span id=\"qty_val_label0$menu_id\" > $qty_val
        </span>";
          echo "<input type=\"hidden\" id=\"qty_val0$menu_id\" name=\"qty_val1\" class=\"form-control\"  size=\"2\" value=\"$qty_val\" />
                <input type=\"hidden\" class=\"form-control\"  placeholder=\"Quantity\" id=\"qty0$menu_id\" name=\"qty1\" size=\"5\"  value=\"$qty_val\"  />";
          echo "</td>";
          echo "<td>";
          echo "<span id=\"hh_foodgroup0$menu_id\">";
         // $fg_array = explode(",", $foodgroup_content);

         // echo " <input type=\"text\" class=\"form-control input-sm fg_array\" id=\"fg_array0$menu_id\" name=\"arr_fg\" size=\"1\" value=\"$fg_array\"  data-menu_id=\"$menu_id\"   />";
         
          echo "</span></td>";
         

          echo "<td>";
          echo "<span id=\"hh_val_label0$menu_id\" >";
          $hh_val_comb_array = explode(",", $hh_val);
          $arr_hh_val        = 0;
          foreach ($hh_val_comb_array as $arr_hh_val) {
              echo $this->help_model->fraction($arr_hh_val) . "<br>";
          }
          echo "</span> <span id=\"hh_measure0$menu_id\">$hh_m</span>";
          echo "<input type=\"hidden\" class=\"form-control input-sm \"  placeholder=\"HH Value\" id=\"hh_val0$menu_id\" name=\"hh_val1\" size=\"1\"    />";
          echo "<td colspan=\"2\">";
          echo "<button  id=\"edit_meal2\" class=\"btn btn-primary btn-lg\" data-id1=\" $rowid\"  data-client_id1=\"$client_id\" data-appointment_id1=\"$appointment_id\" data-meal1=\"$meal_code\" data-meal_id1=\"$meal_id\" data-menu_id1=\"$menu_id\"> Update</button>";
          echo "</td>";









          echo "</tr>";








          echo "</table>";

          echo "<hr></hr>";
          echo "</div>";



?>
