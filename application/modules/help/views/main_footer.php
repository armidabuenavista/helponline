<style>
.site-footer
{
  background-color:#26272b;
  padding:45px 0 20px;
  font-size:15px;
  line-height:24px;
  color:#737373;
}
.site-footer hr
{
  border-top-color:#bbb;
  opacity:0.5
}
.site-footer hr.small
{
  margin:20px 0
}
.site-footer h6
{
  color:#fff;
  font-size:16px;
  text-transform:uppercase;
  margin-top:5px;
  letter-spacing:2px
}
.site-footer a
{
  color:#737373;
}
.site-footer a:hover
{
  color:#3366cc;
  text-decoration:none;
}
.footer-links
{
  padding-left:0;
  list-style:none
}
.footer-links li
{
  display:block
}
.footer-links a
{
  color:#737373
}
.footer-links a:active,.footer-links a:focus,.footer-links a:hover
{
  color:#3366cc;
  text-decoration:none;
}
.footer-links.inline li
{
  display:inline-block
}
.site-footer .social-icons
{
  text-align:right
}
.site-footer .social-icons a
{
  width:40px;
  height:40px;
  line-height:40px;
  margin-left:6px;
  margin-right:0;
  border-radius:100%;
  background-color:#33353d
}
.copyright-text
{
  margin:0
}
@media (max-width:991px)
{
  .site-footer [class^=col-]
  {
    margin-bottom:30px
  }
}
@media (max-width:767px)
{
  .site-footer
  {
    padding-bottom:0
  }
  .site-footer .copyright-text,.site-footer .social-icons
  {
    text-align:center
  }
}
.social-icons
{
  padding-left:0;
  margin-bottom:0;
  list-style:none
}
.social-icons li
{
  display:inline-block;
  margin-bottom:4px
}
.social-icons li.title
{
  margin-right:15px;
  text-transform:uppercase;
  color:#96a2b2;
  font-weight:700;
  font-size:13px
}
.social-icons a{
  background-color:#eceeef;
  color:#818a91;
  font-size:16px;
  display:inline-block;
  line-height:44px;
  width:44px;
  height:44px;
  text-align:center;
  margin-right:8px;
  border-radius:100%;
  -webkit-transition:all .2s linear;
  -o-transition:all .2s linear;
  transition:all .2s linear
}
.social-icons a:active,.social-icons a:focus,.social-icons a:hover
{
  color:#fff;
  background-color:#29aafe
}
.social-icons.size-sm a
{
  line-height:34px;
  height:34px;
  width:34px;
  font-size:14px
}
.social-icons a.facebook:hover
{
  background-color:#3b5998
}
.social-icons a.twitter:hover
{
  background-color:#00aced
}
.social-icons a.linkedin:hover
{
  background-color:#007bb6
}
.social-icons a.dribbble:hover
{
  background-color:#ea4c89
}
@media (max-width:767px)
{
  .social-icons li.title
  {
    display:block;
    margin-right:0;
    font-weight:600
  }
}
</style>

<!-- Site footer -->
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>About</h6>
            <p class="text-justify">Think about it. You can change everything and gain control of your health and lifestyle now. Start by knowing what your body measures mean with the Fast Assessment and Screening Tools. Track your food intake and physical activity with our HELP Tracker. Talk to our in-house Registered Nutritionist-Dietitians for free and get personalized nutrition advices by booking an appointment with us.</p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
                <li><a href="<?php echo base_url()?>">Home </a></li>
                <li><a href="<?php echo base_url() ?>help/login"> HELP Tracker </a></li>
                <li><a href="<?php echo base_url() ?>help/contact_us"> Contact Us</a></li>
            </ul>
          </div>
            

          <div class="col-xs-6 col-md-3">
            <h6>Tools</h6>
            <ul class="footer-links">
                <li><a href="<?php echo base_url() ?>help/fast_tools"> Assessment Tools </a></li>
                <li><a href="<?php echo base_url() ?>help/nutrition_label"> Nutrition Label </a></li>
                <li><a href="<?php echo base_url() ?>help/publications"> Publications</a></li>
                <li><a href="<?php echo base_url() ?>help/game"> Games (Beta Version)</a></li>
            </ul>
          </div>
        </div>
        <hr> 
      </div>
      <div class="container">
            <p class="copyright-text"><?php $date = date('Y'); echo 'Copyright &copy;'.$date.' .  Food and Nutrition Research Institute. Department of Science and Technology';?></p>
      </div>
        
</footer>

	   </body>
</html>