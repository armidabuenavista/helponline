<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.10.2.js"); ?>"></script> 
<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script> 
<style>
[type="radio"]:checked,
[type="radio"]:not(:checked) {
    position: absolute;
    left: -9999px;
}
[type="radio"]:checked + label,
[type="radio"]:not(:checked) + label
{
    position: relative;
    padding-left: 28px;
    cursor: pointer;
    line-height: 20px;
    display: inline-block;
    color: black;
}
[type="radio"]:checked + label:before,
[type="radio"]:not(:checked) + label:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 18px;
    height: 18px;
    border: 1px solid #ddd;
    border-radius: 100%;
    background: #fff;
}
[type="radio"]:checked + label:after,
[type="radio"]:not(:checked) + label:after {
    content: '';
    width: 12px;
    height: 12px;
    background: #F87DA9;
    position: absolute;
    top: 4px;
    left: 4px;
    border-radius: 100%;
    -webkit-transition: all 0.2s ease;
    transition: all 0.2s ease;
}
[type="radio"]:not(:checked) + label:after {
    opacity: 0;
    -webkit-transform: scale(0);
    transform: scale(0);
}
[type="radio"]:checked + label:after {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
}
    
body{
    background: url(<?=base_url();?>assets/images/back.png) white no-repeat top left;
    font-family: sans-serif, Helvetica, Arial;
    background-color: grey;
    background-size: cover;
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-blend-mode: darken;
    background-origin: content-box;
    background-position: center; 
    padding: 8%;
    font-family: sans-serif, Helvetica, Arial;
/*    background-color: #eba603;*/
    color: black;
/*
  -webkit-text-fill-color: black; 
  -webkit-text-stroke-width: 1px;
  -webkit-text-stroke-color: black;
*/
}
    
.wrapper {
  width: 80%;
  background: transparent;
  border-radius: 15px;
  margin: 40px auto;
  box-shadow: 0 0 50px black;
  padding: 20px;
  background-color:cornsilk;
}
    
.small_txt{
    color: black;
/*
  -webkit-text-fill-color: black; 
  -webkit-text-stroke-width: 1px;
  -webkit-text-stroke-color: black;
*/
}
  
.heads{
    padding-left: 10%;   
    padding-right: 10%;
}
    
.text_left{
    text-align: right; 
}
</style>
<?php echo form_open('help/save_form1'); ?>

<div class="wrapper">
<center><h1 class="heads">Instructions: Fill-in the blank or click on the button(s) of your selected option(s)</h1>
<h4><b class="small_txt">*Select one (1) answer only ** Select all applicable answers</b></h4></center>
<hr>
<p><b><div class="row"><div class="col-sm-1">1. Age </div><div class="col-sm-3"><input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" min="2018" type='text' maxlength="4" max="3000" name="age" required class="form-control" id="age" placeholder="Enter your Age"></div></div></b></p>
<hr>
<p><b>2. Gender*</b></p>
<div class="row">
<div class="col-sm-2">
  <p>
    <input type="radio" id="gender1" name="gender" value="Male" checked>
    <label for="gender1">Male</label>
  </p>  
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" id="gender2" value="Female" name="gender">
    <label for="gender2">Female</label>
  </p>  
</div>
</div>
<hr>
<p><b>3. Educational background*</b></p>
<div class="row">
<div class="col-sm-2">
  <p>
    <input type="radio" id="educ1" name="educ" value="Elementary Graduate" checked>
    <label for="educ1">Elementary Graduate</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" id="educ2" value="High School Graduate" name="educ">
    <label for="educ2">High School Graduate</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" id="educ3" value="College Graduate" name="educ">
    <label for="educ3">College Graduate</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" id="educ4" value="Others" name="educ">
    <label for="educ4">Others</label>
  </p>
</div>
</div>
<p><b><div class="row"><div class="col-sm-3"><input type="text" name="educ_in" id="educ" class="form-control" placeholder="please specify:"></div></div></b></p>
<hr>
<p><b>4. Where do you live?* </b></p>
<div class="row">
<div class="col-sm-3">
  <p>
    <input type="radio" id="region1" value="Region I (Ilocos)" name="region" checked>
    <label for="region1">Region I (Ilocos)</label>
  </p>
</div>
<div class="col-sm-3">
  <p>
    <input type="radio" id="region2" value="Region II (Cagayan Valley)" name="region">
    <label for="region2">Region II (Cagayan Valley)</label>
  </p>
</div>
<div class="col-sm-3">
  <p>
    <input type="radio" id="region3" value="Region III (Central Luzon)" name="region">
    <label for="region3">Region III (Central Luzon)</label>
  </p>
</div>
<div class="col-sm-3">
  <p>
    <input type="radio" id="region4" value="Region IV-A (CALABARZON)" name="region">
    <label for="region4">Region IV-A (CALABARZON)</label>
  </p>
</div>
<div class="col-sm-3">
  <p>
    <input type="radio" id="region5" value="Region V (Bicol Region)" name="region">
    <label for="region5">Region V (Bicol Region)</label>
  </p>
</div>
<div class="col-sm-3">
  <p>
    <input type="radio" id="region6" value="Region VI (Western Visayas)" name="region">
    <label for="region6">Region VI (Western Visayas)</label>
  </p>
</div>
<div class="col-sm-3">
  <p>
    <input type="radio" id="region7" value="Region VII (Central Visayas)" name="region">
    <label for="region7">Region VII (Central Visayas)</label>
  </p>
</div>
<div class="col-sm-3">
  <p>
    <input type="radio" id="region8" value="Region VIII (Eastern Visayas)" name="region">
    <label for="region8">Region VIII (Eastern Visayas)</label>
  </p>
</div>
<div class="col-sm-3">
  <p>
    <input type="radio" id="region9" value="Region IX (Zamboanga Peninsula)" name="region">
    <label for="region9">Region IX (Zamboanga Peninsula)</label>
  </p>
</div>
<div class="col-sm-3">
  <p>
    <input type="radio" id="region10" value="Region X ( Northern Mindanao)" name="region">
    <label for="region10">Region X ( Northern Mindanao)</label>
  </p>
</div>
<div class="col-sm-3">
  <p>
    <input type="radio" id="region11" value="Region XI (Davao)" name="region">
    <label for="region11">Region XI (Davao)</label>
  </p>
</div>
<div class="col-sm-3">
  <p>
    <input type="radio" id="region12" value="Region XII (SOCCSKSARGEN)" name="region">
    <label for="region12">Region XII (SOCCSKSARGEN)</label>
  </p>
</div>
<div class="col-sm-3">
  <p>
    <input type="radio" id="region13" value="Region XIII (Caraga)" name="region">
    <label for="region13">Region XIII (Caraga)</label>
  </p>
</div>
<div class="col-sm-3">
  <p>
    <input type="radio" id="region14" value="Region XIV (BARMM)" name="region">
    <label for="region14">Region XIV (BARMM)</label>
  </p>
</div>
<div class="col-sm-3">
  <p>
    <input type="radio" id="region15" value="Cordillera Administrative Region" name="region">
    <label for="region15">Cordillera Administrative Region</label>
  </p>
</div>
<div class="col-sm-3">
  <p>
    <input type="radio" id="region16" value="National Capital Regione" name="region">
    <label for="region16">National Capital Regione</label>
  </p>
</div>
<div class="col-sm-3">
  <p>
    <input type="radio" id="region17" value="MIMAROPA Region" name="region">
    <label for="region17">MIMAROPA Region</label>
  </p>
</div>
</div>
<hr>
<p><b><div class="row"><div class="col-sm-2">5. Profession* </div><div class="col-sm-5"><input type="text" required name="profe" id="profe" class="form-control" placeholder="Enter text"></div></div></b></p>
<hr>
<p><b>6. Affiliation* </b></p>
<div class="row">
<div class="col-sm-2">
  <p>
    <input type="radio" id="affi1" value="Academe" name="affi" checked>
    <label for="affi1">Academe</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" id="affi2" value="Industry" name="affi">
    <label for="affi2">Industry</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" id="affi3" value="Government" name="affi">
    <label for="affi3">Government</label>
  </p>
</div>
<div class="col-sm-3">
  <p>
    <input type="radio" id="affi4" value="Non-government Organization" name="affi">
    <label for="affi4">Non-government Organization</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" id="affi5" value="Others" name="affi">
    <label for="affi5">Others</label>
  </p>
</div>
</div>
<p><b><div class="row"><div class="col-sm-3"><input type="text" name="affi_in" id="affi_in" class="form-control" placeholder="please specify:"></div></div></b></p>
<hr>
<p><b><div class="row"><div class="col-sm-2">7. Email address* </div><div class="col-sm-5"><input type="text" required name="email_add" id="email_add" class="form-control" placeholder="Enter text"></div></div></b></p>
<hr>
<p><b>8. Have you heard about the nutrition counseling service of DOST-FNRI?*</b></p>
<div class="row">
<div class="col-sm-2">
  <p>
    <input type="radio" id="nutri1" value="Yes" name="nutri" checked>
    <label for="nutri1">Yes</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" id="nutri2" value="No" name="nutri">
    <label for="nutri2">No</label>
  </p>
</div>
</div>
<hr>
<p><b>9. Have you visited the Healthy Eating and Lifestyle Program website under iFNRI?* </b></p>
<div class="row">
<div class="col-sm-2">
  <p>
    <input type="radio" id="visit1" value="Yes" name="visit" checked>
    <label for="visit1">Yes</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" id="visit2" value="No" name="visit">
    <label for="visit2">No</label>
  </p>
</div>
</div>
<hr>
<p><b>10. Do you give importance to your health and nutrition status?*</b></p>
<div class="row">
<div class="col-sm-2">
  <p>
    <input type="radio" id="impor1" value="Yes" name="impor" checked>
    <label for="impor1">Yes</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" id="impor2" value="No" name="impor">
    <label for="impor2">No</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" id="impor2" value="Not really" name="impor">
    <label for="impor2">Not really</label>
  </p>
</div>
</div>
<hr>
<p><b>11. Do you read or watch nutrition tips or trivia?*</b></p>
<div class="row">
<div class="col-sm-2">
  <p>
    <input type="radio" id="tips1" value="Yes" name="tips" checked>
    <label for="tips1">Yes</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" id="tips2" value="No" name="tips">
    <label for="tips2">No</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" id="tips2" value="Not really" name="tips">
    <label for="tips2">Not really</label>
  </p>
</div>
</div>
<hr>
<p><b>12. Do you tips nutrition labels or facts?*</b></p>
<div class="row">
<div class="col-sm-2">
  <p>
    <input type="radio" id="facts1" value="Yes" name="facts" checked>
    <label for="facts1">Yes</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" id="facts2" value="No" name="facts">
    <label for="facts2">No</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" id="facts2" value="Not really"  name="facts">
    <label for="facts2">Not really</label>
  </p>
</div>
</div>
<hr>
<p><b>13. Where do you go for health and nutrition information?*</b></p>
<div class="row">
<div class="col-sm-2">
  <p>
    <input type="radio" id="info1" value=Social media name="info" checked>
    <label for="info1">Social media</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" id="info2" value=Internet name="info">
    <label for="info2">Internet</label>
  </p>
</div>
<div class="col-sm-4">
  <p>
    <input type="radio" id="info3" value=Published materials (books and scientific journals) name="info">
    <label for="info3">Published materials (books and scientific journals)</label>
  </p>
</div>
<div class="col-sm-3">
  <p>
    <input type="radio" id="info4" value=Magazines and newspaper name="info">
    <label for="info4">Magazines and newspaper</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" id="info5" value=Others name="info">
    <label for="info5">Others</label>
  </p>
</div>
</div>
<p><b><div class="row"><div class="col-sm-3"><input type="text" name="info_in" id="info_in" class="form-control" placeholder="please specify:"></div></div></b></p>
<hr>
<p><b>14. Identify your top five (5) commonly consumed street food items**</b></p>
<p><b><div class="row"><div class="col-sm-1 text_left">1. </div><div class="col-sm-5"><input type="text" required name="common1" id="common1" class="form-control" placeholder="Enter text"></div></div></b></p>
<p><b><div class="row"><div class="col-sm-1 text_left">2. </div><div class="col-sm-5"><input type="text" required name="common2" id="common2" class="form-control" placeholder="Enter text"></div></div></b></p>
<p><b><div class="row"><div class="col-sm-1 text_left">3. </div><div class="col-sm-5"><input type="text" required name="common3" id="common3" class="form-control" placeholder="Enter text"></div></div></b></p>
<p><b><div class="row"><div class="col-sm-1 text_left">4. </div><div class="col-sm-5"><input type="text" required name="common4" id="common4" class="form-control" placeholder="Enter text"></div></div></b></p>
<p><b><div class="row"><div class="col-sm-1 text_left">5. </div><div class="col-sm-5"><input type="text" required name="common5" id="common5" class="form-control" placeholder="Enter text"></div></div></b></p>
<hr>
<p><b>15. Where do you usually purchase street food items? (Select top 2 applicable answers)**</b></p>
<div class="row">
<div class="col-sm-3">
  <p>
    <input type="radio" value="Street food stalls/vendors" id="usual1" name="usual" checked>
    <label for="usual1">Street food stalls/vendors</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" value="Carinderia" id="usual2" name="usual">
    <label for="usual2">Carinderia</label>
  </p>
</div>
<div class="col-sm-3">
  <p>
    <input type="radio" value="School or office canteens" id="usual3" name="usual">
    <label for="usual3">School or office canteens</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" value="Fast food" id="usual4" name="usual">
    <label for="usual4">Fast food</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" value="Convenience stores" id="usual5" name="usual">
    <label for="usual5">Convenience stores</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" value="Restaurant" id="usual6" name="usual">
    <label for="usual6">Restaurants</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" value="Home-cooked" id="usual7" name="usual">
    <label for="usual7">Home-cooked</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" value="Others" id="usual8" name="usual">
    <label for="usual8">Others</label>
  </p>
</div>
</div>
<p><b><div class="row"><div class="col-sm-3"><input type="text" name="usual_in" id="usual_in" class="form-control" placeholder="please specify:"></div></div></b></p>
<hr>
<p><b>16. From the food image shown to you, what kind of NUTRITION information would you like to know?</b></p>
<hr>
<p><b>Calorie and Macronutrient content <small>(Select 1 answer only)</small></b></p>
<div class="row">
<div class="col-sm-2">
  <p>
    <input type="radio" id="cmcon1" value="Carbohydrate content" name="cmcon" checked>
    <label for="cmcon1">Carbohydrate content</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" id="cmcon2" value="Protein content" name="cmcon">
    <label for="cmcon2">Protein content</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" id="cmcon3" value="Total fat content" name="cmcon">
    <label for="cmcon3">Total fat content</label>
  </p>
</div>
</div>
<hr>
<p><b>Micronutrient content <small>(Select 1 answer only)</small></b></p>
<div class="row">
<div class="col-sm-3">
  <p>
    <input type="radio" value="Total dietary fiber content" id="ccon1" name="ccon" checked>
    <label for="ccon1">Total dietary fiber content</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" value="Total sugar content" id="ccon2" name="ccon">
    <label for="ccon2">Total sugar content</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" value="Cholesterol content" id="ccon3" name="ccon">
    <label for="ccon3">Cholesterol content</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" value="Calcium content" id="ccon4" name="ccon">
    <label for="ccon4">Calcium content</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" value="Phosphorus content" id="ccon5" name="ccon">
    <label for="ccon5">Phosphorus content</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" value="Iron content" id="ccon6" name="ccon">
    <label for="ccon6">Iron content</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" value="Sodium content" id="ccon7" name="ccon">
    <label for="ccon7">Sodium content</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" value=Others id="ccon8" name="ccon">
    <label for="ccon8">Others</label>
  </p>
</div>
</div>
<p><b><div class="row"><div class="col-sm-3"><input type="text" name="ccon_in" id="ccon_in" class="form-control" placeholder="please specify:"></div></div></b></p>
<hr>
<p><b>17. From the food image shown to you, what other NUTRITION-related information would you like to know?*</b></p>
<div class="row">
<div class="col-sm-2">
  <p>
    <input type="radio" value="Food safety tips" id="image1" name="image" checked>
    <label for="image1">Food safety tips</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" value="Cooking instructions" id="image2" name="image">
    <label for="image2">Cooking instructions</label>
  </p>
</div>
<div class="col-sm-3">
  <p>
    <input type="radio" value="Total amount in grams per serving" id="image3" name="image">
    <label for="image3">Total amount in grams per serving</label>
  </p>
</div>
<div class="col-sm-3">
  <p>
    <input type="radio" value="Health risk related to the food item" id="image4" name="image">
    <label for="image4">Health risk related to the food item</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" value="Others" id="image5" name="image">
    <label for="image5">Others</label>
  </p>
</div>
</div>
<p><b><div class="row"><div class="col-sm-3"><input type="text" name="image_in" id="image_in" class="form-control" placeholder="please specify:"></div></div></b></p>
<hr>
<p><b>18. In what language would you like the information you selected be presented?*</b></p>
<div class="row">
<div class="col-sm-2">
  <p>
    <input type="radio" value="Filipino" id="langu1" name="langu" checked>
    <label for="langu1">Filipino</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" value="English" id="langu2" name="langu">
    <label for="langu2">English</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" value="Taglish" id="langu3" name="langu">
    <label for="langu3">Taglish</label>
  </p>
</div>
<div class="col-sm-3">
  <p>
    <input type="radio" value="Both Filipino and English" id="langu4" name="langu">
    <label for="langu4">Both Filipino and English</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" value="Others" id="langu5" name="langu">
    <label for="langu5">Others</label>
  </p>
</div>
</div>
<p><b><div class="row"><div class="col-sm-3"><input type="text" name="langu_in" id="langu_in" class="form-control" placeholder="please specify:"></div></div></b></p>
<hr>
<p><b>19. How would you like the presentation of the food image with your selected nutrition information?*</b></p>
<div class="row">
<div class="col-sm-2">
  <p>
    <input type="radio" value="Posters" id="like1" name="like" checked>
    <label for="like1">Posters</label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" value="Flyers" id="like2" name="like">
    <label for="like2">Flyers</label>
  </p>
</div>
<div class="col-sm-4">
  <p>
    <input type="radio" value="Flip chart (e.g. desk top calendar)" id="like3" name="like">
    <label for="like3">Flip chart (e.g. desk top calendar) </label>
  </p>
</div>
<div class="col-sm-2">
  <p>
    <input type="radio" value="Others" id="like4" name="like">
    <label for="like4">Others</label>
  </p>
</div>
</div>
<p><b><div class="row"><div class="col-sm-3"><input type="text" name="like_in" id="like_in" class="form-control" placeholder="please specify:"></div></div></b></p>
<hr>
<p><b>20. How likely are you to recommend or share this type of IEC materials to a friend?*</b></p>
<div class="row">
<div class="col-sm-3">
  <p>
    <input type="radio" value="Will definitely recommend or share" id="recom1" name="recom" checked>
    <label for="recom1">Will definitely recommend or share</label>
  </p>
</div>
<div class="col-sm-3">
  <p>
    <input type="radio" value="Will likely recommend or shar" id="recom2" name="recom">
    <label for="recom2">Will likely recommend or share</label>
  </p>
</div>
<div class="col-sm-3">
  <p>
    <input type="radio" value="Will probably recommend or share" id="recom3" name="recom">
    <label for="recom3">Will probably recommend or share</label>
  </p>
</div>
<div class="col-sm-3">
  <p>
    <input type="radio" value="Will NOT likely recommend or share" id="recom4" name="recom">
    <label for="recom4">Will NOT likely recommend or share</label>
  </p>
</div>
<div class="col-sm-3">
  <p>
    <input type="radio" value="Will definitely NOT recommend or share" id="recom5" name="recom">
    <label for="recom5">Will definitely NOT recommend or share</label>
  </p>
</div>
</div>
<hr>
<p><b>21. Do you have other suggestions to present this nutrition update?</b></p>
<input type="text" name="suggest" id="suggest" class="form-control" placeholder="Input Text">
    
<br><hr>
<center><button id="submit" name="submit" type="submit" class="btn btn-success btn-sm btn-block"><b>Submit Data</b></button></center>
<?php echo form_close(); ?>
</div>

