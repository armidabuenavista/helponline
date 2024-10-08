<?php
$male=0;
$female=0;
$normal=0;
$obese=0;
$underweight=0;
$overweight=0;
$this->load->model('mdl_help', '', TRUE);
foreach ($this->load->mdl_help->get_ptri_admin() as $config){
    
    if($config->gender==2){
        $female++;
    }else{
        $male++;
    }

    if($config->classification=="NORMAL"){
        $normal++;
    }elseif($config->classification=="OVERWEIGHT"){
        $overweight++;
    }elseif($config->classification=="UNDERWEIGHT"){
        $underweight++;
    }elseif($config->classification=="OBESE"){
        $obese++;
    }
}
?>


    <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.10.2.js"); ?>"></script> 
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
    <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script> 
    <link href="<?=base_url();?>assets/charts/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/charts/plugins/nprogress/nprogress.css" rel="stylesheet">

<?php
$male=0;
$female=0;
$normal=0;
$obese=0;
$underweight=0;
$overweight=0;
$this->load->model('mdl_help', '', TRUE);
foreach ($this->load->mdl_help->get_ptri_admin() as $config){
    
    if($config->gender==2){
        $female++;
    }else{
        $male++;
    }

    if($config->classification=="NORMAL"){
        $normal++;
    }elseif($config->classification=="OVERWEIGHT"){
        $overweight++;
    }elseif($config->classification=="UNDERWEIGHT"){
        $underweight++;
    }elseif($config->classification=="OBESE"){
        $obese++;
    }
}
$val="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
?>
<div style="padding:2%">
    <center><h4>Summary Report of NSTW Nutrition Counceling </h4></center>
    
    <div class="row">
        <div class="col-sm-6">
            <div class="table-responsive container-fluid">
                <div class="clearfix"></div>
                  <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                      <div class="x_title">
                          <div class="container"><center>
                        <div class="clearfix"></div></center>
                      </div>
                      <div class="x_content">
                        <div id="mainc" style="height:60%;"></div>
                      </div>
                        </div>
                        <center><h4>Male: <?=$male.$val;?> Female: <?=$female.$val;?> <b>TOTAL: <?=($male+$female);?></b></h4></center>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="table-responsive container-fluid">
                <div class="clearfix"></div>
                  <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                      <div class="x_title">
                          <div class="container"><center>
                        <div class="clearfix"></div></center>
                      </div>
                      <div class="x_content">
                        <div id="maina" style="height:60%;"></div>
                      </div>
                        </div>
                        <center><h4>NORMAL: <?=$normal.$val;?> OVERWEIGHT: <?=$overweight.$val;?> UNDERWEIGHT: <?=$underweight.$val;?> OBESE: <?=$obese;?></h4></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
$gender1=0;
$gender2=0;
$educ1=0;
$educ2=0;
$educ3=0;
$educ4=0;
$region1=0;
$region2=0;
$region3=0;
$region4=0;
$region5=0;
$region6=0;
$region7=0;
$region8=0;
$region9=0;
$region10=0;
$region11=0;
$region12=0;
$region13=0;
$region14=0;
$region15=0;
$region16=0;
$region17=0;
$affi1=0;
$affi2=0;
$affi3=0;
$affi4=0;
$affi5=0;
$prof1=0;
$prof2=0;
$nutri1=0;
$visit1=0;
$nutri2=0;
$visit2=0;
$impor1=0;
$tips1=0;
$facts1=0;
$impor2=0;
$tips2=0;
$facts2=0;
$impor3=0;
$tips3=0;
$facts3=0;
$info1=0;
$info2=0;
$info3=0;
$info4=0;
$info5=0;
$silog1=0;
$silog2=0;
$s_often1=0;
$s_often2=0;
$s_often3=0;
$s_often4=0;
$s_often5=0;
$s_often21=0;
$s_often22=0;
$s_often23=0;
$s_often24=0;
$s_often25=0;
$eat_meals1=0;
$eat_meals2=0;
$eat_meals3=0;
$eat_meals4=0;
$eat_meals5=0;
$eat_meals6=0;
$eat_meals7=0;
$eat_meals8=0;
$eat_meals9=0;
$eat_meals10=0;
$eat_meals11=0;
$eat_meals12=0;
$cmcon1=0;
$cmcon2=0;
$cmcon3=0;
$ccon1=0;
$ccon2=0;
$ccon3=0;
$ccon4=0;
$ccon5=0;
$ccon6=0;
$ccon7=0;
$image1=0;
$image2=0;
$image3=0;
$image4=0;
$image5=0;
$langu1=0;
$langu2=0;
$langu3=0;
$langu4=0;
$langu5=0;
$like_data1=0;
$like_data2=0;
$like_data3=0;
$like_data4=0;
$recom1=0;
$recom2=0;
$recom3=0;
$recom4=0;
$recom5=0;

$eat_meals_data="";
$usually_meals_data="";

$eat_meals_data1=0;
$eat_meals_data2=0;
$eat_meals_data3=0;
$eat_meals_data4=0;
$eat_meals_data5=0;
$eat_meals_data6=0;
$eat_meals_data7=0;
$eat_meals_data8=0;
$eat_meals_data9=0;
$eat_meals_data10=0;
$eat_meals_data11=0;

$usually_meals_data1=0;
$usually_meals_data2=0;
$usually_meals_data3=0;
$usually_meals_data4=0;
$usually_meals_data5=0;
$usually_meals_data6=0;

foreach ($this->load->mdl_help->get_survey2() as $survey1){
    
    $usually_meals_data = explode(",",$survey1->usually_eat);
    for($i=0;$i<count($usually_meals_data);$i++){
        
        if($usually_meals_data[$i]=="Home-cooked"){ $usually_meals_data1++; }
        elseif($usually_meals_data[$i]=="School or office canteens"){ $usually_meals_data2++; }
        elseif($usually_meals_data[$i]=="Carinderia"){ $usually_meals_data3++; }
        elseif($usually_meals_data[$i]=="Fast food"){ $usually_meals_data4++; }
        elseif($usually_meals_data[$i]=="Convenience stores"){ $usually_meals_data5++; }
        elseif($usually_meals_data[$i]=="Restaurants"){ $usually_meals_data6++; }
        
    }
        

    
    $eat_meals_data = explode("/",$survey1->eat_meals);
    for($i=0;$i<count($eat_meals_data);$i++){
        
        if($eat_meals_data[$i]=="Tapsilog (beef tapa, fried egg and fried rice)"){ $eat_meals_data1++; }
        elseif($eat_meals_data[$i]=="Longsilog (longganisa, fried egg and fried rice)"){ $eat_meals_data2++; }
        elseif($eat_meals_data[$i]=="Tosilog (tocino, fried egg and fried rice)"){ $eat_meals_data3++; }
        elseif($eat_meals_data[$i]=="Cornsilog (corned beef, fried egg and fried rice)"){ $eat_meals_data4++; }
        elseif($eat_meals_data[$i]=="Hotsilog (hotdog, fried egg and fried rice)"){ $eat_meals_data5++; }
        elseif($eat_meals_data[$i]=="Hamsilog (ham, fried egg and fried rice)"){ $eat_meals_data6++; }
        elseif($eat_meals_data[$i]=="Luncheon meatsilog (luncheon meat, fried egg and fried rice)"){ $eat_meals_data7++; }
        elseif($eat_meals_data[$i]=="Hamburgersilog (hamburger patty, fried egg and fried rice)"){ $eat_meals_data8++; }
        elseif($eat_meals_data[$i]=="Embosilog (embotido, fried egg and fried rice)"){ $eat_meals_data9++; }
        elseif($eat_meals_data[$i]=="Baconsilog (bacon, fried egg and fried rice)"){ $eat_meals_data10++; }
        elseif($eat_meals_data[$i]=="Fried egg and fried rice only"){ $eat_meals_data11++; }
        
    }
    
    
    
    if($survey1->gender=="Female"){
        $gender1++;
    }else{
        $gender2++;
    }
    
    if($survey1->profe=="Student"){
        $prof1++;
    }else{
        $prof2++;
    }
    
    if($survey1->educ=="Elementary Graduate"){
        $educ1++;
    }elseif($survey1->educ=="High School Graduate"){
        $educ2++;
    }elseif($survey1->educ=="College Graduate"){
        $educ3++;
    }elseif($survey1->educ=="Others"){
        $educ4++;
    }

    
if($survey1->region=="Region I (Ilocos)"){ $region1++; }
elseif($survey1->region=="Region II (Cagayan Valley)"){ $region2++; }
elseif($survey1->region=="Region III (Central Luzon)"){ $region3++; }
elseif($survey1->region=="Region IV-A (CALABARZON)"){ $region4++; }
elseif($survey1->region=="Region V (Bicol Region)"){ $region5++; }
elseif($survey1->region=="Region VI (Western Visayas)"){ $region6++; }
elseif($survey1->region=="Region VII (Central Visayas)"){ $region7++; }
elseif($survey1->region=="Region VIII (Eastern Visayas)"){ $region8++; }
elseif($survey1->region=="Region IX (Zamboanga Peninsula)"){ $region9++; }
elseif($survey1->region=="Region X ( Northern Mindanao)"){ $region10++; }
elseif($survey1->region=="Region XI (Davao)"){ $region11++; }
elseif($survey1->region=="Region XII (SOCCSKSARGEN)"){ $region12++; }
elseif($survey1->region=="Region XIII (Caraga)"){ $region13++; }
elseif($survey1->region=="Region XIV (BARMM)"){ $region14++; }
elseif($survey1->region=="Cordillera Administrative Region"){ $region15++; }
elseif($survey1->region=="National Capital Regione"){ $region16++; }
elseif($survey1->region=="MIMAROPA Region"){ $region17++; }
    
    
    if($survey1->affi=="Academe"){
        $affi1++;
    }elseif($survey1->affi=="Industry"){
        $affi2++;
    }elseif($survey1->affi=="Government"){
        $affi3++;
    }elseif($survey1->affi=="Non-government Organization"){
        $affi4++;
    }elseif($survey1->affi=="Others"){
        $affi5++;
    }
    
    if($survey1->nutri=="No"){
        $nutri1++;
    }else{
        $nutri2++;
    }
    
    if($survey1->visit=="No"){
        $visit1++;
    }else{
        $visit2++;
    }
    
    if($survey1->silog=="No"){
        $silog1++;
    }else{
        $silog2++;
    }
    
    if($survey1->impor=="No"){
        $impor1++;
    }elseif($survey1->impor=="Yes"){
        $impor2++;
    }elseif($survey1->impor=="Not really"){
        $impor3++;
    }
    
    if($survey1->tips=="No"){
        $tips1++;
    }elseif($survey1->tips=="Yes"){
        $tips2++;
    }elseif($survey1->tips=="Not really"){
        $tips3++;
    }
    
    if($survey1->facts=="No"){
        $facts1++;
    }elseif($survey1->facts=="Yes"){
        $facts2++;
    }elseif($survey1->facts=="Not really"){
        $facts3++;
    }
    
if($survey1->info=="Social"){ $info1++; }
elseif($survey1->info=="Internet"){ $info2++; }
elseif($survey1->info=="Published"){ $info3++; }
elseif($survey1->info=="Magazines"){ $info4++; }
elseif($survey1->info=="Others"){ $info5++; }

if($survey1->usual=="Breakfast"){ $s_often1++; }
elseif($survey1->usual=="Lunch"){ $s_often2++; }
elseif($survey1->usual=="Snacks"){ $s_often3++; }
elseif($survey1->usual=="Dinner"){ $s_often4++; }
elseif($survey1->usual=="Others"){ $s_often5++; }
    
if($survey1->s_often=="Breakfast"){ $s_often21++; }
elseif($survey1->s_often=="Lunch"){ $s_often22++; }
elseif($survey1->s_often=="Snacks"){ $s_often23++; }
elseif($survey1->s_often=="Dinner"){ $s_often24++; }
else{ $s_often25++; }

if($survey1->s_often2=="Tapsilog (beef tapa, fried egg and fried rice)"){ $eat_meals1++; }
elseif($survey1->s_often2=="Longsilog (longganisa, fried egg and fried rice)"){ $eat_meals2++; }
elseif($survey1->s_often2=="Tosilog (tocino, fried egg and fried rice)"){ $eat_meals3++; }
elseif($survey1->s_often2=="Cornsilog (corned beef, fried egg and fried rice)"){ $eat_meals4++; }
elseif($survey1->s_often2=="Hotsilog (hotdog, fried egg and fried rice)"){ $eat_meals5++; }
elseif($survey1->s_often2=="Hamsilog (ham, fried egg and fried rice)"){ $eat_meals6++; }
elseif($survey1->s_often2=="Luncheon meatsilog (luncheon meat, fried egg and fried rice)"){ $eat_meals7++; }
elseif($survey1->s_often2=="Hamburgersilog (hamburger patty, fried egg and fried rice)"){ $eat_meals8++; }
elseif($survey1->s_often2=="Embosilog (embotido, fried egg and fried rice)"){ $eat_meals9++; }
elseif($survey1->s_often2=="Baconsilog (bacon, fried egg and fried rice)"){ $eat_meals10++; }
elseif($survey1->s_often2=="Fried egg and fried rice only"){ $eat_meals11++; }
elseif($survey1->s_often2=="Others"){ $eat_meals12++; }

if($survey1->cmcon=="Carbohydrate content"){ $cmcon1++; }
elseif($survey1->cmcon=="Protein content"){ $cmcon2++; }
elseif($survey1->cmcon=="Total fat content"){ $cmcon3++; }
    
if($survey1->ccon=="Total dietary fiber content"){ $ccon1++; }
elseif($survey1->ccon=="Total sugar content"){ $ccon2++; }
elseif($survey1->ccon=="Cholesterol content"){ $ccon3++; }
elseif($survey1->ccon=="Calcium content"){ $ccon4++; }
elseif($survey1->ccon=="Phosphorus content"){ $ccon5++; }
elseif($survey1->ccon=="Iron content"){ $ccon6++; }
elseif($survey1->ccon=="Sodium content"){ $ccon7++; }
    
if($survey1->image=="Food safety tips"){ $image1++; }
elseif($survey1->image=="Cooking instructions"){ $image2++; }
elseif($survey1->image=="Total amount in grams per serving"){ $image3++; }
elseif($survey1->image=="Health risk related to the food item"){ $image4++; }
elseif($survey1->image=="Others"){ $image5++; }

if($survey1->langu=="Filipino"){ $langu1++; }
elseif($survey1->langu=="English"){ $langu2++; }
elseif($survey1->langu=="Taglish"){ $langu3++; }
elseif($survey1->langu=="Both Filipino and English"){ $langu4++; }
elseif($survey1->langu=="Others"){ $langu5++; }

if($survey1->like_data=="Posters"){ $like_data1++; }
elseif($survey1->like_data=="Flyers"){ $like_data2++; } 
elseif($survey1->like_data=="Flip chart (e.g. desk top calendar) "){ $like_data3++; }
elseif($survey1->like_data=="Others"){ $like_data4++; }

if($survey1->recom=="Will definitely recommend or share"){ $recom1++;}
elseif($survey1->recom=="Will likely recommend or shar"){ $recom2++;}
elseif($survey1->recom=="Will probably recommend or share"){ $recom3++;}
elseif($survey1->recom=="Will NOT likely recommend or share"){ $recom4++;}
elseif($survey1->recom=="Will definitely NOT recommend or share"){ $recom5++;}

}
?>

<div style="padding:5%;">
    <center><h3>SURVEY ON “SILOG” MEALS NUTRITION INFORMATION, EDUCATION AND COMMUNICATION MATERIAL DEVELOPMENT</h3></center>
<p>Gender</p>
<table class="table">
    <tr>
        <th>Male</th>
        <th>Female</th>
    </tr>
    <tr>
        <td><?=$gender1;?></td>
        <td><?=$gender2;?></td>
    </tr>
</table>
<p>Educational background</p>
<table class="table">
    <tr>
        <th>Elementary Graduate</th>
        <th>High School Graduate</th>
        <th>College Graduate</th>
        <th>Others</th>
    </tr>
    <tr>
        <td><?=$educ1;?></td>
        <td><?=$educ2;?></td>
        <td><?=$educ3;?></td>
        <td><?=$educ4;?></td>
    </tr>
</table>
<p>Where do you live?</p>
<table class="table">
    <tr>
        <th>Region I</th>
        <th>Region II</th>
        <th>Region III</th>
        <th>Region IV-A</th>
        <th>Region V</th>
        <th>Region VI</th>
        <th>Region VII</th>
        <th>Region VIII</th>
        <th>Region IX</th>
        <th>Region X</th>
        <th>Region XI</th>
        <th>Region XII</th>
        <th>Region XIII</th>
        <th>Region XIV</th>
        <th>Cordillera</th>
        <th>National Capital</th>
        <th>MIMAROPA</th>
    </tr>
    <tr>
        <td><?=$region1;?></td>
        <td><?=$region2;?></td>
        <td><?=$region3;?></td>
        <td><?=$region4;?></td>
        <td><?=$region5;?></td>
        <td><?=$region6;?></td>
        <td><?=$region7;?></td>
        <td><?=$region8;?></td>
        <td><?=$region9;?></td>
        <td><?=$region10;?></td>
        <td><?=$region11;?></td>
        <td><?=$region12;?></td>
        <td><?=$region13;?></td>
        <td><?=$region14;?></td>
        <td><?=$region15;?></td>
        <td><?=$region16;?></td>
        <td><?=$region17;?></td>
    </tr>
</table>

<p>Profession</p>
<table class="table">
    <tr>
        <th>Student</th>
        <th>Others</th>
    </tr>
    <tr>
        <td><?=$prof1;?></td>
        <td><?=$prof2;?></td>
    </tr>
</table>
<p>Affiliation</p>
<table class="table">
    <tr>
        <th>Academe</th>
        <th>Industry</th>
        <th>Government</th>
        <th>Non-government Organization</th>
        <th>Others</th>
    </tr>
    <tr>
        <td><?=$affi1;?></td>
        <td><?=$affi2;?></td>
        <td><?=$affi3;?></td>
        <td><?=$affi4;?></td>
        <td><?=$affi5;?></td>
    </tr>
</table>

<p>Have you heard about the nutrition counseling service of DOST-FNRI?</p>
<table class="table">
    <tr>
        <th>Yes</th>
        <th>No</th>
    </tr>
    <tr>
        <td><?=$nutri2;?></td>
        <td><?=$nutri1;?></td>
    </tr>
</table>
<p>Have you visited the Healthy Eating and Lifestyle Program website under iFNRI?</p>
<table class="table">
    <tr>
        <th>Yes</th>
        <th>No</th>
    </tr>
    <tr>
        <td><?=$visit2;?></td>
        <td><?=$visit1;?></td>
    </tr>
</table>
<p>Do you give importance to your health and nutrition status?</p>
<table class="table">
    <tr>
        <th>Yes</th>
        <th>No</th>
        <th>Not really</th>
    </tr>
    <tr>
        <td><?=$impor2;?></td>
        <td><?=$impor1;?></td>
        <td><?=$impor3;?></td>
    </tr>
</table>
<p>Do you read or watch nutrition tips or trivia?</p>
<table class="table">
    <tr>
        <th>Yes</th>
        <th>No</th>
        <th>Not really</th>
    </tr>
    <tr>
        <td><?=$tips2;?></td>
        <td><?=$tips1;?></td>
        <td><?=$tips3;?></td>
    </tr>
</table>
<p>Do you read nutrition labels or facts?</p>
<table class="table">
    <tr>
        <th>Yes</th>
        <th>No</th>
        <th>Not really</th>
    </tr>
    <tr>
        <td><?=$facts2;?></td>
        <td><?=$facts1;?></td>
        <td><?=$facts3;?></td>
    </tr>
</table>
<p>Where do you go for health and nutrition information?</p>
<table class="table">
    <tr>
        <th>Social media</th>
        <th>Internet</th>
        <th>Published materials</th>
        <th>Magazines and newspaper</th>
        <th>Others</th>
    </tr>
    <tr>
        <td><?=$info1;?></td>
        <td><?=$info2;?></td>
        <td><?=$info3;?></td>
        <td><?=$info4;?></td>
        <td><?=$info5;?></td>
    </tr>
</table>
<p>Do you consume “silog” meals?</p>
<table class="table">
    <tr>
        <th>Yes</th>
        <th>No</th>
    </tr>
    <tr>
        <td><?=$silog1;?></td>
        <td><?=$silog2;?></td>
    </tr>
</table>
<p>Which time of the day do you consume “silog” meals?</p>
<table class="table">
    <tr>
        <th>Breakfast</th>
        <th>Lunch</th>
        <th>Snacks</th>
        <th>Dinner</th>
    </tr>
    <tr>
        <td><?=$s_often1;?></td>
        <td><?=$s_often2;?></td>
        <td><?=$s_often3;?></td>
        <td><?=$s_often4;?></td>
    </tr>
</table>
<p>How often do you consume “silog” meals on a weekly basis?</p>
<table class="table">
    <tr>
        <th>1-2 times</th>
        <th>3-4 times</th>
        <th>5-6 times</th>
        <th>7 times or more</th>
        <th>Others</th>
    </tr>
    <tr>
        <td><?=$s_often21;?></td>
        <td><?=$s_often22;?></td>
        <td><?=$s_often23;?></td>
        <td><?=$s_often24;?></td>
        <td><?=$s_often25;?></td>
    </tr>
</table>
<p>What “silog” meals do you often eat?</p>

<table class="table">
    <tr>
        <th>Tapsilog (beef tapa, fried egg and fried rice)</th>
        <th>Longsilog (longganisa, fried egg and fried rice)</th>
        <th>Tosilog (tocino, fried egg and fried rice)</th>
        <th>Cornsilog (corned beef, fried egg and fried rice)</th>
        <th>Hotsilog (hotdog, fried egg and fried rice)</th>
        <th>Hamsilog (ham, fried egg and fried rice)</th>
        <th>Luncheon meatsilog (luncheon meat, fried egg and fried rice)</th>
        <th>Hamburgersilog (hamburger patty, fried egg and fried rice)</th>
        <th>Embosilog (embotido, fried egg and fried rice)</th>
        <th>Baconsilog (bacon, fried egg and fried rice)</th>
        <th>Fried egg and fried rice only</th>
    </tr>
    <tr>
        <td><?=$eat_meals_data1;?></td>
        <td><?=$eat_meals_data2;?></td>
        <td><?=$eat_meals_data3;?></td>
        <td><?=$eat_meals_data4;?></td>
        <td><?=$eat_meals_data5;?></td>
        <td><?=$eat_meals_data6;?></td>
        <td><?=$eat_meals_data7;?></td>
        <td><?=$eat_meals_data8;?></td>
        <td><?=$eat_meals_data9;?></td>
        <td><?=$eat_meals_data10;?></td>
        <td><?=$eat_meals_data11;?></td>
    </tr>
</table> 
    
<p>Where do you usually eat “silog” meals?</p>
<table class="table">
    <tr>
        <th>Home-cooked</th>
        <th>School or office canteens</th>
        <th>Carinderia</th>
        <th>Fast food</th>
        <th>Convenience stores</th>
        <th>Restaurants</th>
    </tr>
    <tr>
        <td><?=$usually_meals_data1;?></td>
        <td><?=$usually_meals_data2;?></td>
        <td><?=$usually_meals_data3;?></td>
        <td><?=$usually_meals_data4;?></td>
        <td><?=$usually_meals_data5;?></td>
        <td><?=$usually_meals_data6;?></td>
    </tr>
</table>
   

    
<p>From the food image shown to you, what kind of NUTRITION information would you like to know? </p>
<p>Calorie and Macronutrient content</p>
<table class="table">
    <tr>
        <th>Carbohydrate content</th>
        <th>Protein content</th>
        <th>Total fat content</th>
    </tr>
    <tr>
        <td><?=$cmcon1;?></td>
        <td><?=$cmcon2;?></td>
        <td><?=$cmcon3;?></td>
    </tr>
</table>
<p>Micronutrient content</p>
<table class="table">
    <tr>
        <th>Total dietary fiber content</th>
        <th>Total sugar content</th>
        <th>Cholesterol content</th>
        <th>Calcium content</th>
        <th>Phosphorus content</th>
        <th>Iron content</th>
        <th>Sodium content</th>
    </tr>
    <tr>
        <td><?=$ccon1;?></td>
        <td><?=$ccon2;?></td>
        <td><?=$ccon3;?></td>
        <td><?=$ccon4;?></td>
        <td><?=$ccon5;?></td>
        <td><?=$ccon6;?></td>
        <td><?=$ccon7;?></td>
    </tr>
</table>
<p>From the food image shown to you, what other NUTRITION-related information would you like to know?</p>
<table class="table">
    <tr>
        <th>Food safety tips</th>
        <th>Cooking instructions</th>
        <th>Total amount in grams per serving</th>
        <th>Health risk related to the food item</th>
        <th>Others</th>
    </tr>
    <tr>
        <td><?=$image1;?></td>
        <td><?=$image2;?></td>
        <td><?=$image3;?></td>
        <td><?=$image4;?></td>
        <td><?=$image5;?></td>
    </tr>
</table>
<p>In what language would you like the information you selected be presented?</p>
<table class="table">
    <tr>
        <th>Filipino</th>
        <th>English</th>
        <th>Taglish</th>
        <th>Both Filipino and English</th>
        <th>Others</th>

    </tr>
    <tr>
        <td><?=$langu1;?></td>
        <td><?=$langu2;?></td>
        <td><?=$langu3;?></td>
        <td><?=$langu4;?></td>
        <td><?=$langu5;?></td>
    </tr>
</table>
<p>How would you like the food image with your selected nutrition information be presented?</p>
<table class="table">
    <tr>
        <th>Posters</th>
        <th>Flyers</th>
        <th>Flip chart</th>
        <th>Others</th>
    </tr>
    <tr>
        <td><?=$like_data1;?></td>
        <td><?=$like_data2;?></td>
        <td><?=$like_data3;?></td>
        <td><?=$like_data4;?></td>
    </tr>
</table>  
<p>How likely are you to recommend or share this type of IEC materials to a friend</p>
<table class="table">
    <tr>
        <th>Will definitely recommend or share</th>
        <th>Will likely recommend or share</th>
        <th>Will probably recommend or share</th>
        <th>Will NOT likely recommend or share</th>
        <th>Will definitely NOT recommend or share</th>
    </tr>
    <tr>
        <td><?=$recom1;?></td>
        <td><?=$recom2;?></td>
        <td><?=$recom3;?></td>
        <td><?=$recom4;?></td>
        <td><?=$recom5;?></td>
    </tr>
</table>
 <p>Do you have other suggestions to present this nutrition update? </p>
<?php 
    $number_val_data=1;
    foreach ($this->load->mdl_help->get_survey2() as $survey2){ 
        if($survey2->suggest!=""){
?>
    <?=$number_val_data.". ".$survey2->suggest.".<br>";?>
<?php $number_val_data++; } } ?>
<hr>  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<?php  
$gender1=0;
$gender2=0;
$educ1=0;
$educ2=0;
$educ3=0;
$educ4=0;
$region1=0;
$region2=0;
$region3=0;
$region4=0;
$region5=0;
$region6=0;
$region7=0;
$region8=0;
$region9=0;
$region10=0;
$region11=0;
$region12=0;
$region13=0;
$region14=0;
$region15=0;
$region16=0;
$region17=0;
$affi1=0;
$affi2=0;
$affi3=0;
$affi4=0;
$affi5=0;
$prof1=0;
$prof2=0;
$nutri1=0;
$visit1=0;
$nutri2=0;
$visit2=0;
$impor1=0;
$tips1=0;
$facts1=0;
$impor2=0;
$tips2=0;
$facts2=0;
$impor3=0;
$tips3=0;
$facts3=0;
$info1=0;
$info2=0;
$info3=0;
$info4=0;
$info5=0;
$silog1=0;
$silog2=0;
$s_often1=0;
$s_often2=0;
$s_often3=0;
$s_often4=0;
$s_often5=0;
$s_often21=0;
$s_often22=0;
$s_often23=0;
$s_often24=0;
$s_often25=0;
$eat_meals1=0;
$eat_meals2=0;
$eat_meals3=0;
$eat_meals4=0;
$eat_meals5=0;
$eat_meals6=0;
$eat_meals7=0;
$eat_meals8=0;
$eat_meals9=0;
$eat_meals10=0;
$eat_meals11=0;
$eat_meals12=0;
$cmcon1=0;
$cmcon2=0;
$cmcon3=0;
$ccon1=0;
$ccon2=0;
$ccon3=0;
$ccon4=0;
$ccon5=0;
$ccon6=0;
$ccon7=0;
$image1=0;
$image2=0;
$image3=0;
$image4=0;
$image5=0;
$langu1=0;
$langu2=0;
$langu3=0;
$langu4=0;
$langu5=0;
$like_data1=0;
$like_data2=0;
$like_data3=0;
$like_data4=0;
$recom1=0;
$recom2=0;
$recom3=0;
$recom4=0;
$recom5=0;
$usual_data="";

$usual_data1=0;
$usual_data2=0;
$usual_data3=0;
$usual_data4=0;
$usual_data5=0;
$usual_data6=0;
$usual_data7=0;

foreach ($this->load->mdl_help->get_survey1() as $survey1){
    $usaul_data = explode(",",$survey1->usual);
    for($i=0;$i<count($usaul_data);$i++){
        
        if($usaul_data[$i]=="Street food stalls/vendors"){ $usual_data1++; }
        elseif($usaul_data[$i]=="Carinderia"){ $usual_data2++; }
        elseif($usaul_data[$i]=="School or office canteens"){ $usual_data3++; }
        elseif($usaul_data[$i]=="Fast food"){ $usual_data4++; }
        elseif($usaul_data[$i]=="Convenience stores"){ $usual_data5++; }
        elseif($usaul_data[$i]=="Restaurants"){ $usual_data6++; }
        elseif($usaul_data[$i]=="Home-cooked"){ $usual_data7++; }
        
    }
    
    if($survey1->gender=="Female"){
        $gender1++;
    }else{
        $gender2++;
    }
    
    if($survey1->profe=="Student"){
        $prof1++;
    }else{
        $prof2++;
    }
    
    if($survey1->educ=="Elementary Graduate"){
        $educ1++;
    }elseif($survey1->educ=="High School Graduate"){
        $educ2++;
    }elseif($survey1->educ=="College Graduate"){
        $educ3++;
    }elseif($survey1->educ=="Others"){
        $educ4++;
    }

    
if($survey1->region=="Region I (Ilocos)"){ $region1++; }
elseif($survey1->region=="Region II (Cagayan Valley)"){ $region2++; }
elseif($survey1->region=="Region III (Central Luzon)"){ $region3++; }
elseif($survey1->region=="Region IV-A (CALABARZON)"){ $region4++; }
elseif($survey1->region=="Region V (Bicol Region)"){ $region5++; }
elseif($survey1->region=="Region VI (Western Visayas)"){ $region6++; }
elseif($survey1->region=="Region VII (Central Visayas)"){ $region7++; }
elseif($survey1->region=="Region VIII (Eastern Visayas)"){ $region8++; }
elseif($survey1->region=="Region IX (Zamboanga Peninsula)"){ $region9++; }
elseif($survey1->region=="Region X ( Northern Mindanao)"){ $region10++; }
elseif($survey1->region=="Region XI (Davao)"){ $region11++; }
elseif($survey1->region=="Region XII (SOCCSKSARGEN)"){ $region12++; }
elseif($survey1->region=="Region XIII (Caraga)"){ $region13++; }
elseif($survey1->region=="Region XIV (BARMM)"){ $region14++; }
elseif($survey1->region=="Cordillera Administrative Region"){ $region15++; }
elseif($survey1->region=="National Capital Regione"){ $region16++; }
elseif($survey1->region=="MIMAROPA Region"){ $region17++; }
    
    
    if($survey1->affi=="Academe"){
        $affi1++;
    }elseif($survey1->affi=="Industry"){
        $affi2++;
    }elseif($survey1->affi=="Government"){
        $affi3++;
    }elseif($survey1->affi=="Non-government Organization"){
        $affi4++;
    }elseif($survey1->affi=="Others"){
        $affi5++;
    }
    
    if($survey1->nutri=="No"){
        $nutri1++;
    }else{
        $nutri2++;
    }
    
    if($survey1->visit=="No"){
        $visit1++;
    }else{
        $visit2++;
    }
    
    if($survey1->silog=="No"){
        $silog1++;
    }else{
        $silog2++;
    }
    
    if($survey1->impor=="No"){
        $impor1++;
    }elseif($survey1->impor=="Yes"){
        $impor2++;
    }elseif($survey1->impor=="Not really"){
        $impor3++;
    }
    
    if($survey1->tips=="No"){
        $tips1++;
    }elseif($survey1->tips=="Yes"){
        $tips2++;
    }elseif($survey1->tips=="Not really"){
        $tips3++;
    }
    
    if($survey1->facts=="No"){
        $facts1++;
    }elseif($survey1->facts=="Yes"){
        $facts2++;
    }elseif($survey1->facts=="Not really"){
        $facts3++;
    }
    
if($survey1->info=="Social"){ $info1++; }
elseif($survey1->info=="Internet"){ $info2++; }
elseif($survey1->info=="Published"){ $info3++; }
elseif($survey1->info=="Magazines"){ $info4++; }
elseif($survey1->info=="Others"){ $info5++; }

if($survey1->usual=="Breakfast"){ $s_often1++; }
elseif($survey1->usual=="Lunch"){ $s_often2++; }
elseif($survey1->usual=="Snacks"){ $s_often3++; }
elseif($survey1->usual=="Dinner"){ $s_often4++; }
elseif($survey1->usual=="Others"){ $s_often5++; }
    
if($survey1->s_often=="Breakfast"){ $s_often21++; }
elseif($survey1->s_often=="Lunch"){ $s_often22++; }
elseif($survey1->s_often=="Snacks"){ $s_often23++; }
elseif($survey1->s_often=="Dinner"){ $s_often24++; }
else{ $s_often25++; }

if($survey1->s_often2=="Tapsilog (beef tapa, fried egg and fried rice)"){ $eat_meals1++; }
elseif($survey1->s_often2=="Longsilog (longganisa, fried egg and fried rice)"){ $eat_meals2++; }
elseif($survey1->s_often2=="Tosilog (tocino, fried egg and fried rice)"){ $eat_meals3++; }
elseif($survey1->s_often2=="Cornsilog (corned beef, fried egg and fried rice)"){ $eat_meals4++; }
elseif($survey1->s_often2=="Hotsilog (hotdog, fried egg and fried rice)"){ $eat_meals5++; }
elseif($survey1->s_often2=="Hamsilog (ham, fried egg and fried rice)"){ $eat_meals6++; }
elseif($survey1->s_often2=="Luncheon meatsilog (luncheon meat, fried egg and fried rice)"){ $eat_meals7++; }
elseif($survey1->s_often2=="Hamburgersilog (hamburger patty, fried egg and fried rice)"){ $eat_meals8++; }
elseif($survey1->s_often2=="Embosilog (embotido, fried egg and fried rice)"){ $eat_meals9++; }
elseif($survey1->s_often2=="Baconsilog (bacon, fried egg and fried rice)"){ $eat_meals10++; }
elseif($survey1->s_often2=="Fried egg and fried rice only"){ $eat_meals11++; }
elseif($survey1->s_often2=="Others"){ $eat_meals12++; }

if($survey1->cmcon=="Carbohydrate content"){ $cmcon1++; }
elseif($survey1->cmcon=="Protein content"){ $cmcon2++; }
elseif($survey1->cmcon=="Total fat content"){ $cmcon3++; }
    
if($survey1->ccon=="Total dietary fiber content"){ $ccon1++; }
elseif($survey1->ccon=="Total sugar content"){ $ccon2++; }
elseif($survey1->ccon=="Cholesterol content"){ $ccon3++; }
elseif($survey1->ccon=="Calcium content"){ $ccon4++; }
elseif($survey1->ccon=="Phosphorus content"){ $ccon5++; }
elseif($survey1->ccon=="Iron content"){ $ccon6++; }
elseif($survey1->ccon=="Sodium content"){ $ccon7++; }
    
if($survey1->image=="Food safety tips"){ $image1++; }
elseif($survey1->image=="Cooking instructions"){ $image2++; }
elseif($survey1->image=="Total amount in grams per serving"){ $image3++; }
elseif($survey1->image=="Health risk related to the food item"){ $image4++; }
elseif($survey1->image=="Others"){ $image5++; }

if($survey1->langu=="Filipino"){ $langu1++; }
elseif($survey1->langu=="English"){ $langu2++; }
elseif($survey1->langu=="Taglish"){ $langu3++; }
elseif($survey1->langu=="Both Filipino and English"){ $langu4++; }
elseif($survey1->langu=="Others"){ $langu5++; }

if($survey1->like_data=="Posters"){ $like_data1++; }
elseif($survey1->like_data=="Flyers"){ $like_data2++; } 
elseif($survey1->like_data=="Flip chart (e.g. desk top calendar) "){ $like_data3++; }
elseif($survey1->like_data=="Others"){ $like_data4++; }

if($survey1->recom=="Will definitely recommend or share"){ $recom1++;}
elseif($survey1->recom=="Will likely recommend or shar"){ $recom2++;}
elseif($survey1->recom=="Will probably recommend or share"){ $recom3++;}
elseif($survey1->recom=="Will NOT likely recommend or share"){ $recom4++;}
elseif($survey1->recom=="Will definitely NOT recommend or share"){ $recom5++;}


}
?>
<br><hr><br>
    <center><h3>SURVEY ON STREET FOOD NUTRITION INFORMATION, EDUCATION AND COMMUNICATION MATERIAL DEVELOPMENT</h3></center>
<p>Gender</p>
<table class="table">
    <tr>
        <th>Male</th>
        <th>Female</th>
    </tr>
    <tr>
        <td><?=$gender1;?></td>
        <td><?=$gender2;?></td>
    </tr>
</table>
<p>Educational background</p>
<table class="table">
    <tr>
        <th>Elementary Graduate</th>
        <th>High School Graduate</th>
        <th>College Graduate</th>
        <th>Others</th>
    </tr>
    <tr>
        <td><?=$educ1;?></td>
        <td><?=$educ2;?></td>
        <td><?=$educ3;?></td>
        <td><?=$educ4;?></td>
    </tr>
</table>
<p>Where do you live?</p>
<table class="table">
    <tr>
        <th>Region I</th>
        <th>Region II</th>
        <th>Region III</th>
        <th>Region IV-A</th>
        <th>Region V</th>
        <th>Region VI</th>
        <th>Region VII</th>
        <th>Region VIII</th>
        <th>Region IX</th>
        <th>Region X</th>
        <th>Region XI</th>
        <th>Region XII</th>
        <th>Region XIII</th>
        <th>Region XIV</th>
        <th>Cordillera</th>
        <th>National Capital</th>
        <th>MIMAROPA</th>
    </tr>
    <tr>
        <td><?=$region1;?></td>
        <td><?=$region2;?></td>
        <td><?=$region3;?></td>
        <td><?=$region4;?></td>
        <td><?=$region5;?></td>
        <td><?=$region6;?></td>
        <td><?=$region7;?></td>
        <td><?=$region8;?></td>
        <td><?=$region9;?></td>
        <td><?=$region10;?></td>
        <td><?=$region11;?></td>
        <td><?=$region12;?></td>
        <td><?=$region13;?></td>
        <td><?=$region14;?></td>
        <td><?=$region15;?></td>
        <td><?=$region16;?></td>
        <td><?=$region17;?></td>
    </tr>
</table>

<p>Profession</p>
<table class="table">
    <tr>
        <th>Student</th>
        <th>Others</th>
    </tr>
    <tr>
        <td><?=$prof1;?></td>
        <td><?=$prof2;?></td>
    </tr>
</table>
<p>Affiliation</p>
<table class="table">
    <tr>
        <th>Academe</th>
        <th>Industry</th>
        <th>Government</th>
        <th>Non-government Organization</th>
        <th>Others</th>
    </tr>
    <tr>
        <td><?=$affi1;?></td>
        <td><?=$affi2;?></td>
        <td><?=$affi3;?></td>
        <td><?=$affi4;?></td>
        <td><?=$affi5;?></td>
    </tr>
</table>

<p>Have you heard about the nutrition counseling service of DOST-FNRI?</p>
<table class="table">
    <tr>
        <th>Yes</th>
        <th>No</th>
    </tr>
    <tr>
        <td><?=$nutri2;?></td>
        <td><?=$nutri1;?></td>
    </tr>
</table>
<p>Have you visited the Healthy Eating and Lifestyle Program website under iFNRI?</p>
<table class="table">
    <tr>
        <th>Yes</th>
        <th>No</th>
    </tr>
    <tr>
        <td><?=$visit2;?></td>
        <td><?=$visit1;?></td>
    </tr>
</table>
<p>Do you give importance to your health and nutrition status?</p>
<table class="table">
    <tr>
        <th>Yes</th>
        <th>No</th>
        <th>Not really</th>
    </tr>
    <tr>
        <td><?=$impor2;?></td>
        <td><?=$impor1;?></td>
        <td><?=$impor3;?></td>
    </tr>
</table>
<p>Do you read or watch nutrition tips or trivia?</p>
<table class="table">
    <tr>
        <th>Yes</th>
        <th>No</th>
        <th>Not really</th>
    </tr>
    <tr>
        <td><?=$tips2;?></td>
        <td><?=$tips1;?></td>
        <td><?=$tips3;?></td>
    </tr>
</table>
<p>Do you read nutrition labels or facts?</p>
<table class="table">
    <tr>
        <th>Yes</th>
        <th>No</th>
        <th>Not really</th>
    </tr>
    <tr>
        <td><?=$facts2;?></td>
        <td><?=$facts1;?></td>
        <td><?=$facts3;?></td>
    </tr>
</table>
<p>Where do you go for health and nutrition information?</p>
<table class="table">
    <tr>
        <th>Social media</th>
        <th>Internet</th>
        <th>Published materials</th>
        <th>Magazines and newspaper</th>
        <th>Others</th>
    </tr>
    <tr>
        <td><?=$info1;?></td>
        <td><?=$info2;?></td>
        <td><?=$info3;?></td>
        <td><?=$info4;?></td>
        <td><?=$info5;?></td>
    </tr>
</table>

<p>Where do you usually purchase street food items?</p>
    
    
<table class="table">
    <tr>
        <th>Street food stalls/vendors</th>
        <th>Carinderia</th>
        <th>School or office canteens</th>
        <th>Fast food</th>
        <th>Convenience stores</th>
        <th>Restaurants</th>
        <th>Home-cooked</th>
    </tr>
    <tr>
        <td><?=$usual_data1;?></td>
        <td><?=$usual_data2;?></td>
        <td><?=$usual_data3;?></td>
        <td><?=$usual_data4;?></td>
        <td><?=$usual_data5;?></td>
        <td><?=$usual_data6;?></td>
        <td><?=$usual_data7;?></td>
    </tr>
</table>   
    
<p>From the food image shown to you, what kind of NUTRITION information would you like to know? </p>
<p>Calorie and Macronutrient content</p>
<table class="table">
    <tr>
        <th>Carbohydrate content</th>
        <th>Protein content</th>
        <th>Total fat content</th>
    </tr>
    <tr>
        <td><?=$cmcon1;?></td>
        <td><?=$cmcon2;?></td>
        <td><?=$cmcon3;?></td>
    </tr>
</table>
<p>Micronutrient content</p>
<table class="table">
    <tr>
        <th>Total dietary fiber content</th>
        <th>Total sugar content</th>
        <th>Cholesterol content</th>
        <th>Calcium content</th>
        <th>Phosphorus content</th>
        <th>Iron content</th>
        <th>Sodium content</th>
    </tr>
    <tr>
        <td><?=$ccon1;?></td>
        <td><?=$ccon2;?></td>
        <td><?=$ccon3;?></td>
        <td><?=$ccon4;?></td>
        <td><?=$ccon5;?></td>
        <td><?=$ccon6;?></td>
        <td><?=$ccon7;?></td>
    </tr>
</table>
<p>From the food image shown to you, what other NUTRITION-related information would you like to know?</p>
<table class="table">
    <tr>
        <th>Food safety tips</th>
        <th>Cooking instructions</th>
        <th>Total amount in grams per serving</th>
        <th>Health risk related to the food item</th>
        <th>Others</th>
    </tr>
    <tr>
        <td><?=$image1;?></td>
        <td><?=$image2;?></td>
        <td><?=$image3;?></td>
        <td><?=$image4;?></td>
        <td><?=$image5;?></td>
    </tr>
</table>
<p>In what language would you like the information you selected be presented?</p>
<table class="table">
    <tr>
        <th>Will definitely recommend or share</th>
        <th>Will likely recommend or share</th>
        <th>Will probably recommend or share</th>
        <th>Will NOT likely recommend or share</th>
        <th>Will definitely NOT recommend or share</th>
    </tr>
    <tr>
        <td><?=$recom1;?></td>
        <td><?=$recom2;?></td>
        <td><?=$recom3;?></td>
        <td><?=$recom4;?></td>
        <td><?=$recom5;?></td>
    </tr>
</table>
<p>How would you like the food image with your selected nutrition information be presented?</p>
<table class="table">
    <tr>
        <th>Posters</th>
        <th>Flyers</th>
        <th>Flip chart</th>
        <th>Others</th>
    </tr>
    <tr>
        <td><?=$like_data1;?></td>
        <td><?=$like_data2;?></td>
        <td><?=$like_data3;?></td>
        <td><?=$like_data4;?></td>
    </tr>
</table>  
<p>In what language would you like the information you selected be presented?</p>
<table class="table">
    <tr>
        <th>Filipino</th>
        <th>English</th>
        <th>Taglish</th>
        <th>Both Filipino and English</th>
        <th>Others</th>

    </tr>
    <tr>
        <td><?=$langu1;?></td>
        <td><?=$langu2;?></td>
        <td><?=$langu3;?></td>
        <td><?=$langu4;?></td>
        <td><?=$langu5;?></td>
    </tr>
</table>
<p>Do you have other suggestions to present this nutrition update? </p>
<?php 
    $number_val_data=1;
    foreach ($this->load->mdl_help->get_survey1() as $survey1){ 
        if($survey1->suggest!=""){
?>
    <?=$number_val_data.". ".$survey1->suggest.".<br>";?>
<?php $number_val_data++; } } ?>
<hr>

<p>Identify your top five (5) commonly consumed street food items</p>
    
<table class="table">
    <tr>
        <th>Top1</th>
        <th>Top2</th>
        <th>Top3</th>
        <th>Top4</th>
        <th>Top5</th>
    </tr>
    
        <?php foreach ($this->load->mdl_help->get_survey1() as $survey1){ ?>
    <tr>
        <td><?=$survey1->common1;?></td>
        <td><?=$survey1->common2;?></td>
        <td><?=$survey1->common3;?></td>
        <td><?=$survey1->common4;?></td>
        <td><?=$survey1->common5;?></td>
    </tr>
        <?php } ?>
    <hr>

</table> 
    
</div>

    <script src="<?=base_url();?>assets/charts/plugins/nprogress/nprogress.js"></script>
    <script src="<?=base_url();?>assets/charts/plugins/echarts/dist/echarts.min.js"></script>
    <script src="<?=base_url();?>assets/charts/plugins/echarts/map/js/world.js"></script>

<script>
    
    NProgress.start();
    NProgress.done();
      var theme = {
          color: [
              '#5ab1ef','#b6a2de','#2ec7c9','#ffb980','#d87a80',
        '#8d98b3','#e5cf0d','#97b552','#95706d','#dc69aa',
        '#07a2a4','#9a7fd1','#588dd5','#f5994e','#c05050',
        '#59678c','#c9ab00','#7eb00a','#6f5553','#c14089'
          ],
          
          title: {
              itemGap: 8,
              textStyle: {
                  fontWeight: 'normal',
                  color: '#408829'
              }
          },

          dataRange: {
              color: ['#1f610a', '#97b58d']
          },

          toolbox: {
              color: ['#408829', '#408829', '#408829', '#408829']
          },

          tooltip: {
              backgroundColor: 'rgba(0,0,0,0.5)',
              axisPointer: {
                  type: 'line',
                  lineStyle: {
                      color: '#408829',
                      type: 'dashed'
                  },
                  crossStyle: {
                      color: '#408829'
                  },
                  shadowStyle: {
                      color: 'rgba(200,200,200,0.3)'
                  }
              }
          },

          dataZoom: {
              dataBackgroundColor: '#eee',
              fillerColor: 'rgba(64,136,41,0.2)',
              handleColor: '#408829'
          },
          grid: {
              borderWidth: 0
          },

          categoryAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },

          valueAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitArea: {
                  show: true,
                  areaStyle: {
                      color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },
          timeline: {
              lineStyle: {
                  color: '#408829'
              },
              controlStyle: {
                  normal: {color: '#408829'},
                  emphasis: {color: '#408829'}
              }
          },

          k: {
              itemStyle: {
                  normal: {
                      color: '#68a54a',
                      color0: '#a9cba2',
                      lineStyle: {
                          width: 1,
                          color: '#408829',
                          color0: '#86b379'
                      }
                  }
              }
          },
          map: {
              itemStyle: {
                  normal: {
                      areaStyle: {
                          color: '#ddd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  },
                  emphasis: {
                      areaStyle: {
                          color: '#99d2dd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  }
              }
          },
          force: {
              itemStyle: {
                  normal: {
                      linkStyle: {
                          strokeColor: '#408829'
                      }
                  }
              }
          },
          chord: {
              padding: 4,
              itemStyle: {
                  normal: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  },
                  emphasis: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  }
              }
          },
          gauge: {
              startAngle: 225,
              endAngle: -45,
              axisLine: {
                  show: true,
                  lineStyle: {
                      color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                      width: 8
                  }
              },
              axisTick: {
                  splitNumber: 10,
                  length: 12,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              axisLabel: {
                  textStyle: {
                      color: 'auto'
                  }
              },
              splitLine: {
                  length: 18,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              pointer: {
                  length: '90%',
                  color: 'auto'
              },
              title: {
                  textStyle: {
                      color: '#333'
                  }
              },
              detail: {
                  textStyle: {
                      color: 'auto'
                  }
              }
          },
          textStyle: {
              fontFamily: 'Arial, Verdana, sans-serif'
          }
      };
    
    
    
    var theme = {
          color: [
              '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
              '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7',
              '#ff9933','#ff99ff','#660066'
          ],
          
          title: {
              itemGap: 8,
              textStyle: {
                  fontWeight: 'normal',
                  color: '#408829'
              }
          },

          dataRange: {
              color: ['#1f610a', '#97b58d']
          },

          toolbox: {
              color: ['#408829', '#408829', '#408829', '#408829']
          },

          tooltip: {
              backgroundColor: 'rgba(0,0,0,0.5)',
              axisPointer: {
                  type: 'line',
                  lineStyle: {
                      color: '#408829',
                      type: 'dashed'
                  },
                  crossStyle: {
                      color: '#408829'
                  },
                  shadowStyle: {
                      color: 'rgba(200,200,200,0.3)'
                  }
              }
          },

          dataZoom: {
              dataBackgroundColor: '#eee',
              fillerColor: 'rgba(64,136,41,0.2)',
              handleColor: '#408829'
          },
          grid: {
              borderWidth: 0
          },

          categoryAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },

          valueAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitArea: {
                  show: true,
                  areaStyle: {
                      color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },
          timeline: {
              lineStyle: {
                  color: '#408829'
              },
              controlStyle: {
                  normal: {color: '#408829'},
                  emphasis: {color: '#408829'}
              }
          },

          k: {
              itemStyle: {
                  normal: {
                      color: '#68a54a',
                      color0: '#a9cba2',
                      lineStyle: {
                          width: 1,
                          color: '#408829',
                          color0: '#86b379'
                      }
                  }
              }
          },
          map: {
              itemStyle: {
                  normal: {
                      areaStyle: {
                          color: '#ddd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  },
                  emphasis: {
                      areaStyle: {
                          color: '#99d2dd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  }
              }
          },
          force: {
              itemStyle: {
                  normal: {
                      linkStyle: {
                          strokeColor: '#408829'
                      }
                  }
              }
          },
          chord: {
              padding: 4,
              itemStyle: {
                  normal: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  },
                  emphasis: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  }
              }
          },
          gauge: {
              startAngle: 225,
              endAngle: -45,
              axisLine: {
                  show: true,
                  lineStyle: {
                      color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                      width: 8
                  }
              },
              axisTick: {
                  splitNumber: 10,
                  length: 12,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              axisLabel: {
                  textStyle: {
                      color: 'auto'
                  }
              },
              splitLine: {
                  length: 18,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              pointer: {
                  length: '90%',
                  color: 'auto'
              },
              title: {
                  textStyle: {
                      color: '#333'
                  }
              },
              detail: {
                  textStyle: {
                      color: 'auto'
                  }
              }
          },
          textStyle: {
              fontFamily: 'Arial, Verdana, sans-serif'
          }
      };
    
      var echartPie = echarts.init(document.getElementById('mainc'), theme);

      echartPie.setOption({
        tooltip: {
          trigger: 'item',
          formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
          x: 'center',
          y: 'bottom',
          data: ['MALE','FEMALE']
        },
        toolbox: {
          show: true,
          feature: {
            magicType: {
              show: true,
              type: ['pie', 'funnel'],
              option: {
                funnel: {
                  x: '25%',
                  width: '50%',
                  funnelAlign: 'left',
                  max: 1548
                }
              }
            },
            restore: {
              show: true,
              title: "Restore"
            },
            saveAsImage: {
              show: true,
              title: "Save Image"
            }
          }
        },
        calculable: true,
        series: [{
          name: 'Gender Distribution',
          type: 'pie',
          radius: '80%',
          center: ['50%', '48%'],
          data: [
            {
                value:<?=$male;?>, 
                name: 'MALE'
            },
            {
                value:<?=$female;?>, 
                name: 'FEMALE'
            },
          ]
        }]
      });
    
    
     var echartPiea = echarts.init(document.getElementById('maina'), theme);

      echartPiea.setOption({
        tooltip: {
          trigger: 'item',
          formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
          x: 'center',
          y: 'bottom',
          data: ['NORMAL','OBESE','UNDERWEIGHT','OVERWEIGHT']
        },
        toolbox: {
          show: true,
          feature: {
            magicType: {
              show: true,
              type: ['pie', 'funnel'],
              option: {
                funnel: {
                  x: '25%',
                  width: '50%',
                  funnelAlign: 'left',
                  max: 1548
                }
              }
            },
            restore: {
              show: true,
              title: "Restore"
            },
            saveAsImage: {
              show: true,
              title: "Save Image"
            }
          }
        },
        calculable: true,
        series: [{
          name: 'Gender Distribution',
          type: 'pie',
          radius: '80%',
          center: ['50%', '48%'],
          data: [
            {
                value:<?=$normal;?>, 
                name: 'NORMAL'
            },
            {
                value:<?=$obese;?>, 
                name: 'OBESE'
            },
            {
                value:<?=$underweight;?>, 
                name: 'UNDERWEIGHT'
            },
            {
                value:<?=$overweight;?>, 
                name: 'OVERWEIGHT'
            },
          ]
        }]
      });

    </script>