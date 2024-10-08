
	<?php $this->load->view('main_header'); ?>	

 
<style>
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
    font-family: "Ubuntu",Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
    border: 1px solid #dad8d6;
    background: #FFFFFF;
}	
.ui-widget-content {
    border: 1px solid #dad8d6;
}
</style>
	 <script type="text/javascript">
	 	$(function() {
	$("#help_tracker_faqs").accordion({
		active: false,
		collapsible: true
	});
});



	 </script>

<?php $this->load->view('navbar'); ?>
<div class="carousel slide" id="carousel-329493">
				<ol class="carousel-indicators">
					<li data-slide-to="0" data-target="#carousel-329493">
					</li>
					<li data-slide-to="1" data-target="#carousel-329493">
					</li>
					<li data-slide-to="2" data-target="#carousel-329493" class="active">
				</li>
			

				</ol>
				<div class="carousel-inner">
					<div class="item active">
					
					
						<img alt="Nutrition Counselling" src="<?php echo base_url("assets/images/help_slides/slide-img-1.png"); ?>" width="100%">
						<div class="carousel-caption" >
					
						<!--<button onclick="location.href = './events.php';" class="btn btn-success "> Set an appointment today!</button>-->	
						</div>
					</div>
					<div class="item">
						<img alt="Fast Tools" src="<?php echo base_url("assets/images/help_slides/slide-img-2.png"); ?>" width="100%">
						<div class="carousel-caption" >
					<!--	
						<h4 class="caption">Fast Assessment and Screening Tools</h4>
						
						<h5 class="caption">
						Know what your body measurements says about your current nutrition  status.
						</h5>-->
					<!--	<button onclick="window.open('fast/fast_tools.php')"class="btn btn-success"> Try Now!</button>	-->
						
						
						
						
					</div>
					</div>
					
						<div class="item ">
						<img alt="Help Tracker" src="<?php echo base_url("assets/images/help_slides/slide-img-3.png"); ?>" width="100%">
						<div class="carousel-caption" >
						<!--<h3 class="caption">HELP Tracker</h3>
						
						<h4  class="caption">Take control of your health and nutrition.</h4>-->
						<!--<button onclick="window.open('#')"class="btn btn-success"> Get Started Today!</button>-->
						
						
					</div>
					</div>
					
						<div class="item ">
						<img alt="Publications" src="<?php echo base_url("assets/images/help_slides/slide-img-4.png"); ?>" width="100%">
						<div class="carousel-caption">
					<!--	<h3  class="caption">Publications</h3>
						
						<h4  class="caption">Free downloadable nutrition tools.</h4>-->
						<!--<button onclick="window.open('#')"class="btn btn-success"> Download Now</button>-->
						
						
					</div>
					</div>
					
						<div class="item ">
						<img alt="Latest Updates" src="<?php echo base_url("assets/images/help_slides/slide-img-5.png"); ?>" width="100%"><div class="carousel-caption" >
						<!--<h3 class="caption">Latest updates</h3>
						
						<h4 class="caption">Know the latest news in food and nutrition.</h4>-->
						<!--<button onclick="window.open('#')"class="btn btn-success"> Read more</button>-->
						
						
					</div>
					</div>
					
				</div>
				
				 <a class="left carousel-control" href="#carousel-329493" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-329493" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
<div class="container ">
	<div class="col-md-12" >
<h2 class="page-header">Healthy Eating and Lifestyle Program (HELP) Tracker <sub>Beta</sub></h2>
			</div>	
	<div class="col-md-7" >		
		<h3>Are you struggling to stay fit and healthy but don't know where to start?</h3>
<br>		
<h3>Check out the HELP Tracker now! </h3>
<hr class="colorgraph"></hr>
<p>The HELP Tracker is carefully designed to assist you in keeping track of your progress towards that healthy and fit body you've been aspiring for. Its three dedicated tracking features will help you in recording your anthropometric ("body") measurements, food intake and physical activity on a weekly or daily basis. Aside from that, the HELP Tracker calculates your daily energy and nutrient requirements to guide you on how much and what type of food you can eat and what kind of physical activities you can do. </p>
<p>The results from the three trackers will then be used to calculate your energy balance which will indicate if you are on the right track or not in achieving your nutrition target goals. </p>
<p>With everything made simple and easy for you, entering the requested information on a daily basis is the only thing left for you to do. Of course, you also need to keep watch of your food intake and continue to follow your daily exercise routines. Check help tracker  <a href="<?php echo base_url() ?>help/body_statistics" class="btn btn-primary btn-sm" style="color: #FFFFFF; font-size: 12px;">here</a></p>
		 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-info-circle"></i> HELP Tracker FAQS</h4>
                    </div>
                    <div class="panel-body">
        <div id="help_tracker_faqs">
  <h3>How do I access the HELP tracker?</h3>
  <div>
    <p >
  Access to the HELP tracker will only be granted if you are already a registered user of the Nutrition Counseling Service website. If you are not yet registered, Click <a href="<?php echo base_url() ?>help/register" class="btn btn-primary btn-sm" style="color: #FFFFFF; font-size: 18px;">here</a> to sign up for free. 
    </p>
  </div>
  <h3>I am a first time user, what should I do first?</h3>
  <div>
  <p>After login to the system, you can do the following:</p>
<p>1.	Update your profile and personal information page. </p>
<p>2.	Set your baseline anthropometric measurements (i.e. weight, height, waist circumference and hip circumference) in order to calculate and assess your current nutritional status. </p>
<p>3.	Set your nutrition goal to jump start your nutrition and weight management plan.</p>
<p>4.	Start inputting your daily food intake and physical activity.</p>
<p>5.	Use the trackers on a daily or regular basis.</p>
<p>Do not forget to click SAVE or UPDATE before leaving the page.</p>
  </div>
  <h3>Does the HELP Tracker assess my current nutritional status?</h3>
  <div>
    <p>
  Yes! The Anthropometric Tracker is the place where you can record all your body measurements such as weight, height, waist circumference and hip circumference on a daily or weekly basis. Afterwards it will assess and provide you a detailed analysis of your current nutritional status as to whether you are fit or not.
    </p>
  </div>
  <h3>Will I be able to get a personalized nutrition prescription from the HELP Tracker?</h3>
  <div>
    <p>
 Yes! You will be able to get a personalized nutrition prescription which includes your daily calories and a sample menu of what kind and quantity of foods you can eat from the HELP Tracker. However all calculations especially for the carbohydrate, protein and fat distribution will be based from the acceptable macronutrient distribution range. It is important that you enter the right information being asked in order for our system to calculate and provide you with the proper recommendations. 
If you want to personally talk with an RND to have a more individualized nutrition management scheme, we recommend that you schedule an appointment with us.
    </p>
  </div>
  <h3>What is the Physical Activity Tracker? How do I use it?</h3>
  <div>
<p>The Physical Activity Tracker calculates how much calories you have burned for the day after performing various physical activities. In addition, you can compare the energy cost of different exercises or physical activities as well.</p>
<p>Record all the physical activities you have done on a daily basis by following these steps:</p>
<p>1.	Select type of activity performed.</p>
<p>2.	Indicate how long you have performed the activity.</p>
<p>Do not forget to click SAVE or UPDATE before leaving the page.</p>
<p>Reminder: The total duration of your physical activities should be 24 hours. This means you should include activities like sleeping at night, napping in the afternoon, eating lunch and using your computer at work.
</p>
  </div>
  <h3>What is the use of the Food Tracker? How do I use it?</h3>
  <div>
	<p>The main function of the Food Tracker is to calculate how much calories from food were you able to consume and compare it against your recommended energy and nutrient requirement on a daily basis. </p>
<p>Record all the foods you have eaten on a daily basis by following these steps:</p>
<p>1.	Select time of meal (i.e. breakfast, morning snack, lunch, afternoon snack, dinner)</p>
<p>2.	Enter viand or meal name.</p>
<p>3.	Itemize the ingredients of your viand or meal.</p>
<p>4.	Specify the nearest estimated or exact amount for each ingredient (in household measure or in grams/liter).</p>
<p>5.	Indicate final method of cooking for the food item, viand or meal (i.e. boiled, fried, sauteed, steamed, baked, grilled, etc.)</p> 
<p>6.	Include condiments and add-on sauces when entering the foods you have eaten per meal.</p>
<p>7.	Save and double check food items, viands or meals if you have missed any item.</p>
  </div>
  <h3>What if the food I'm looking for a food that is not included in the database?</h3>
  <div>
<p>Currently, the main food database of the FNRI Nutrition Counseling Service contains only the food items listed in the 1997 Philippine Food Composition Table and the USA National Nutrient Database for Standard Reference Release 27.
As an alternative solution, you can manually add the information found in the Nutrition Facts labels that you have by using the <u>Custom Entry Tool</u> found in the HELP Tracker. The data that you will enter will be saved in your account for future use.   
</p>	
  </div>
</div>
                    </div>
                </div>
		<h3>So what are you waiting for?</h3>
<br>
<p>Start using the HELP Tracker to achieve that weight and proper nutrition status you've been targeting. 
Not yet registered? Click <a href="<?php echo base_url() ?>help/register" class="btn btn-primary btn-sm" style="color: #FFFFFF; font-size: 12px;">here</a> to sign up for free.</p>
 	</div>
           
<div class="col-md-5">
<div class="well">
<div align="center" class="embed-responsive embed-responsive-4by3">
           <iframe width="100%" height="100%" src="https://www.youtube.com/embed/F0d_mSNZW8M" frameborder="0" allowfullscreen></iframe>
</div>

</div>
</div>
  	</div>
<?php $this->load->view('main_footer'); ?>
