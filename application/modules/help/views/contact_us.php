<?php $this->load->view('main_header'); ?>  
<?php $this->load->view('navbar'); ?>


   <div class="container">
<div class="row">
<hr></hr>
            <!-- Map Column -->
            <div class="col-md-8">
         
      <div class="panel panel-default">
    <div class="panel-heading"><h3>Contact Us</h3></div>
    <div class="panel-body">

     <div id="alert" > <?php
if($this->session->flashdata('item')) {
  $message = $this->session->flashdata('item');
  ?>
<div class="alert alert-<?php echo $message['class'];?>"><?php echo $message['message']; ?></div>
<?php
}

?> <?php echo $message_return;?>  <?php echo validation_errors(); ?>    </div>
        <form name="contactform" method="post" action="<?php echo base_url();?>help/contact_us" class="form-horizontal" role="form">
                <div class="form-group">
                        <label for="Name" class="col-lg-2 control-label">Name</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="<?php echo $this->input->post('name'); ?>">
                            </div>
                                                                
                </div>
                <div class="form-group">
                        <label for="Email Address" class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="email_address" name="email_address" placeholder="Your Email"  value="<?php echo $this->input->post('email_address'); ?>">
                            </div>
                </div>
                            <div class="form-group">
                                <label for="Subject" class="col-lg-2 control-label">Subject</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject Message"  value="<?php echo $this->input->post('subject'); ?>">
                                                                                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Message" class="col-lg-2 control-label">Message</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" rows="4" id="message" name="message" placeholder="Your message..." ><?php echo $this->input->post('message'); ?></textarea>
                                </div>
                            </div>
                                    <div class="form-group">
                                            <label for="Captcha" class="col-lg-2 control-label"></label>
                                                     
                                                    </div>
                                                  <div class="form-group">
                                <label for="Captcha" class="col-lg-2 control-label">Please enter text above</label>
                                <div class="col-lg-10">

                               
                                    <?php echo $cap_img; ?><br><br>

                                
                            <input type="text" class="form-control" id="captcha" name="captcha" value="<?php echo $this->input->post('captcha'); ?>">
                                                                                                                            </div>
                            </div>

                            <hr></hr>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button id="submit" name="submit" class="btn btn-default" value="submit">
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>



    </div>
</div>



            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4">

                       <h3>Nutrition Counseling Service Team</h3>
               <p>
<br>
Tel. No. 8372071 local 2288 or 2299<br>
Email Address: ncsfnri@gmail.com
</p>
<p>
Nutrition Counseling Clinic (Room 208)
2nd Floor, FNRI Building </p>

<p>Address: FNRI Bldg., DOST Compound, Gen. Santos Avenue
Bicutan, Taguig City, Metro Manila
</p>               
               
               
                <p><i class="fa fa-clock-o"></i> 
                    <abbr title="Hours">H</abbr>: Monday - Friday: 8:00 AM to 5:00 PM</p>
                <ul class="list-unstyled list-inline list-social-icons">
                    <li>
                        <a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
                    </li>
                 <!--   <li>
                        <a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
                    </li>-->
                    <li>
                        <a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a>
                    </li>
                </ul>



                <!-- Embedded Google Map -->
               <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3862.909281447689!2d121.05312399999998!3d14.489897000000003!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397cf13a156afc7%3A0x502dc16e7aacd237!2sFood+Nutrition+Research+Institute!5e0!3m2!1sen!2s!4v1402475346119" width="100%" height="300px" frameborder="0" style="border-style:0;"></iframe>




            </div>
        </div>
        </div>






  
<?php $this->load->view('main_footer'); ?>




                                   		