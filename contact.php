  <!-- Head -->
 
  <?php include 'head.php';
    include 'admin/classes/class.php';
    include 'admin/classes/function.php';

    $chyfleyObj = new Chyfley();
    $anEvents = $chyfleyObj->an_event();
    $homeEvents = $chyfleyObj->home_event();
    $allEvents = $chyfleyObj->all_event();
    ?>
  <!-- Head ends -->

  <body>
      <!-- Preloader -->

      <!-- Preloader ends -->

      <!-- header -->
      <?php include('header.php'); ?>
      <!-- header ends -->

      <!-- Banner Area -->
      <?php banner(); ?>


      

     <!-- Contact Area -->
    <section id="contact_arae_main" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="section_heading">
                        <h3>Contact with us</h3>
                        <h2>Get in
                            <span class="color_big_heading"> touch</span> with us &
                            stay updates
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact_area_left">
                        <div class="contact_left_item">
                            <div class="contact_left_icon">
                                <img src="assets/img/icon/map_color.png" alt="icon">
                            </div>
                            <div class="contact_left_text">
                                <h3>Address:</h3>
                                <p>7/13 Adebayo Street, Owode-Ota, <br />  Sango, Ogun State, Nigeria</p>
                            </div>
                        </div>
                        <div class="contact_left_item">
                            <div class="contact_left_icon">
                                <img src="assets/img/icon/email-color.png" alt="icon">
                            </div>
                            <div class="contact_left_text">
                                <h3>Email:</h3>
                                <a href="mailto:support@domain.com">support@chyfleyschools.com.ng</a>
                                <a href="mailto:support@domain.com">info@chyfleyschools.com.ng</a>
                            </div>
                        </div>
                        <div class="contact_left_item">
                            <div class="contact_left_icon">
                                <img src="assets/img/icon/phon-color.png" alt="icon">
                            </div>
                            <div class="contact_left_text">
                                <h3>Phone number:</h3>
                                <a href="tel:+234 701 291 7404">+234 701 291 7404</a>
                                <a href="tel:+234 802 932 6197">+234 802 932 6197</a>
                            </div>
                      </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact_form_Wrapper">
                        <h3>Leave us a message</h3>
                        <form action="#!" id="contact_form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your full name*" required />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your email address*" required />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Subject**" required />
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="6" placeholder="Message*" required></textarea>
                            </div>
                            <div class="contact_submit_form">
                                <button class="btn btn_theme btn_md">Send message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

     
     <!-- Contact Map Area -->
     <section id="contact_full_map" class="section_padding_bottom">
        <div class="contact_content_boxed">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="about_top_boxed bg_one">
                            <div class="about_top_boxed_icon">
                                <img src="assets/img/icon/msg.png" alt="img">
                            </div>
                            <div class="about_top_boxed_text">
                                <p>Let's Talk</p>
                                <h3>Chat with Us<br /> </h3>
                                <a href="contact">Chat now</a>
                            </div>
                            <div class="about_top_boxed_vector">
                                <img src="assets/img/icon/round.png" alt="img">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="about_top_boxed bg_two">
                            <div class="about_top_boxed_icon">
                                <img src="assets/img/icon/hand-round.png" alt="img">
                            </div>
                            <div class="about_top_boxed_text">
                                <p>Become a Teacher</p>
                                <h3>Impact through us</h3>
                                <a href="">Join now</a>
                            </div>
                            <div class="about_top_boxed_vector">
                                <img src="assets/img/icon/round.png" alt="img">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="about_top_boxed bg_three">
                            <div class="about_top_boxed_icon">
                                <img src="assets/img/icon/qa.png" alt="img">
                            </div>
                            <div class="about_top_boxed_text">
                                <p>Ask your question</p>
                                <h3>Ask  any question and get updates</h3>
                                <a href="contact">Ask now</a>
                            </div>
                            <div class="about_top_boxed_vector">
                                <img src="assets/img/icon/round.png" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact_map_area">
                        
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3677.6962663570607!2d3.2172953!3d6.7436475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103ba3f295c3eb5f%3A0x1b00dda9d58c110!2sChyfley+Schools!5e0!3m2!1sen!2sbd!4v1557901943656!5m2!1sen!2sbd" height="550" style="border:0;width: 100%;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>


      <!-- Subscribe Area -->
      <section id="subscribe_area">
          <div class="container">
              <div class="subscribe_wrapper">
                  <div class="row align-items-center">
                      <div class="col-lg-6">
                          <div class="subscribe_text">
                              <p>Newsletter</p>
                              <h3>To get weekly & monthly news,
                                  <span class="color_big_heading">Subscribe</span> to our newsletter.
                              </h3>
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="cta_right_side">
                              <form action="#!" id="subscribe_form">
                                  <div class="input-group">
                                      <input type="text" class="form-control" placeholder="Your mail address" required="">
                                      <button class="btn btn_theme btn_md" type="submit">Subscribe</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <?php include 'footer.php'; ?>


      <?php include 'footerjs.php'; ?>
  </body>