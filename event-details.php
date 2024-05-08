  <!-- Head -->
  <?php include 'head.php';
    include 'admin/classes/function.php';
    include 'admin/classes/class.php';
    $chyfleyObj = new Chyfley();
    $id = $_GET['id'];
    $eventDetails = $chyfleyObj->detailed_event($id);
    ?>
  <!-- Head ends -->

  <body>
      <!-- Preloader -->

      <!-- Preloader ends -->

      <!-- header -->
      <?php include('header.php'); ?>
      <!-- header ends -->

      <!-- Banner Area -->
      <section id="common_banner_area">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="commn_banner_page">
                          <h2><span class="color_big_heading"><?php echo $eventDetails['title']; ?> </span></h2>
                          <ul class="breadcrumb_wrapper">
                              <li class="breadcrumb_item"><a href="index">Event</a></li>
                              <li class="breadcrumb_item"><img src="assets/img/icon/arrow.png" alt="img"></li>
                              <li class="breadcrumb_item active"><?php echo $eventDetails['title']; ?></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </section>



      <!-- Blog Area -->
      <!-- Event details Area -->
      <section id="trending_causes_main" class="section_padding">
          <div class="container">
              <div class="row" id="counter">
                  <div class="col-lg-8">
                      <div class="details_wrapper_area">
                          <div class="details_big_img">
                              <?php $imagePaths = explode(',', $eventDetails['image_path']);
                                if (!empty($imagePaths[0])) {
                                    echo '<img src="' . substr($imagePaths[0], 3) . '" alt="First Image" class="event-image">';
                                } else {
                                    echo 'No images available';
                                } ?>
                          </div>
                          <div class="details_text_wrapper">
                              <a href="" class="tags_noted">#<?php echo $eventDetails['category']; ?></a>
                              <h2><?php echo $eventDetails['title']; ?></h2>
                              <p>
                                  <?php echo $eventDetails['description']; ?>
                              </p>

                              <div class="row">
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                      <div class="details_small_img">
                                          <?php $imagePaths = explode(',', $eventDetails['image_path']);
                                            if (!empty($imagePaths[1])) {
                                                echo '<img src="' . substr($imagePaths[1], 3) . '" alt="First Image" class="event-image">';
                                            } else {
                                                echo 'No images available';
                                            } ?>
                                      </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                      <div class="details_small_img">
                                          <?php $imagePaths = explode(',', $eventDetails['image_path']);
                                            if (!empty($imagePaths[2])) {
                                                echo '<img src="' . substr($imagePaths[2], 3) . '" alt="First Image" class="event-image">';
                                            } else {
                                                echo 'No images available';
                                            } ?>
                                      </div>
                                  </div>
                              </div>
                              <p>
                                  <?php echo $eventDetails['title']; ?>
                              </p>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4">
                      <div class="sidebar_first">
                          <!-- Project Organizer -->
                          <div class="sidebar_boxed">
                              <div class="sidebar_heading_main">
                                  <h3>Event details</h3>
                              </div>
                              <div class="event_details_list">
                                  <ul>
                                      <li><img src="assets/img/icon/tag.png" alt="icon"> Category: <span><?php echo $eventDetails['category']; ?></span>
                                      </li>
                                      <li><img src="assets/img/icon/map.png" alt="icon"> Location: <span><?php echo $eventDetails['location']; ?></span>
                                      </li>
                                      <li><img src="assets/img/icon/cal.png" alt="icon"> Date: <span><?php
                                                            $eventDate = new DateTime($eventDetails['event_date']);
                                                            echo $eventDate->format('j'); ?> <span><?php echo $eventDate->format('M'); ?></span>
 </li>
                                      <li><img src="assets/img/icon/email.png" alt="icon"> Mail:
                                          <span>admin@chyfleyschools.com.ng</span>
                                      </li>
                                      <li><img src="assets/img/icon/phone.png" alt="icon"> Phone: <span>+234 802 932 6197, +234 708 975 7776</span>
                                      </li>
                                  </ul>
                                  <div class="register_now_details">
                                      <a href="#!" class="btn btn_theme btn_md w-100">Enjoy the summary</a>
                                  </div>
                              </div>
                          </div>
                          <!-- Recent Donet -->
                          <div class="project_recentdonet_wrapper sidebar_boxed">
                              <div class="sidebar_heading_main">
                                  <h3>Event organizer</h3>
                              </div>
                              <div class="recent_donet_item">
                                  <div class="recent_donet_img">
                                      <a href="cause-details.html"><img src="assets/img/sidebar/rec-donet-1.png" alt="img"></a>
                                  </div>
                                  <div class="recent_donet_text">
                                      <div class="sidebar_inner_heading">
                                          <h4><a href="">School Management</a></h4>
                                      </div>
                                      <p>School Administrators</p>
                                      <h6></h6>
                                  </div>
                              </div>
                              <div class="recent_donet_item">
                                  <div class="recent_donet_img">
                                      <a href="cause-details.html"><img src="assets/img/sidebar/rec-donet-2.png" alt="img"></a>
                                  </div>
                                  <div class="recent_donet_text">
                                      <div class="sidebar_inner_heading">
                                          <h4><a href="cause-details.html">School Management</a></h4>
                                      </div>
                                      <p>School Administratorsr</p>
                                      <h6></h6>
                                  </div>
                              </div>
                              <div class="recent_donet_item">
                                  <div class="recent_donet_img">
                                      <a href="cause-details.html"><img src="assets/img/sidebar/rec-donet-3.png" alt="img"></a>
                                  </div>
                                  <div class="recent_donet_text">
                                      <div class="sidebar_inner_heading">
                                          <h4><a href="cause-details.html">School Management</a></h4>
                                      </div>
                                      <p>School Administrators</p>
                                      <h6></h6>
                                  </div>
                              </div>
                          </div>
                          <!-- Map Causes -->
                          <div class="share_causes_wrapper sidebar_boxed">
                              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3677.6962663570607!2d3.2172953!3d6.7436475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103ba3f295c3eb5f%3A0x1b00dda9d58c110!2sChyfley+Schools!5e0!3m2!1sen!2sbd!4v1557901943656!5m2!1sen!2sbd" height="550" style="border:0;width: 100%;"></iframe>
                          </div>
                          <!-- share Causes -->
                          <div class="share_causes_wrapper sidebar_boxed">
                              <div class="sidebar_heading_main">
                                  <h3>View more </h3>
                              </div>
                              <div class="social_icon_sidebar">
                                  <ul>
                                      <li><a href="https://www.facebook.com/ChyfleySchools?mibextid=zLoPMf" target="_blank"><img src="assets/img/icon/facebook.png" alt="icon"></a></li>
                                      <li><a href="https://www.instagram.com/chyfleyschools" target="_blank"><img src="assets/img/icon/instagram.png" alt="icon"></a></li>
                                      <li><a href="#!"><img src="assets/img/icon/twitter.png" alt="icon"></a></li>
                                      <li><a href="#!"><img src="assets/img/icon/linkedin.png" alt="icon"></a></li>
                                  </ul>
                              </div>
                          </div>
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