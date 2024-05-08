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


      <!-- Upcoming Events Area -->
      <section id="upcoming_events" class="section_padding">
          <div class="container">
              <div class="row">
                  <div class="col-lg-6 offset-lg-3 col-md-12 col-sm-12 col-12">
                      <div class="section_heading">
                          <h3>Upcoming events</h3>
                          <h2>Join our upcoming <span class="color_big_heading">events</span> for contribution</h2>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-6">
                      <div class="event_left_side_wrapper">
                          <div class="event_big_img">
                              <a href="#"><?php $imagePaths = explode(',', $anEvents['image_path']);
                                            if (!empty($imagePaths[0])) {
                                                echo '<img src="' . substr($imagePaths[0], 3) . '" alt="First Image" class="event-image">';
                                            } else {
                                                echo 'No images available';
                                            } ?></a>
                          </div>
                          <div class="event_content_area big_content_padding">
                              <div class="event_tag_area">
                                  <a href="#">#<?php print $anEvents['category']; ?></a>
                              </div>
                              <div class="event_heading_area">
                                  <div class="event_heading">
                                      <h3><a href="#"><?php print $anEvents['title']; ?>
                                              <?php print $anEvents['event_date']; ?></a></h3>
                                  </div>
                                  <div class="event_date">
                                      <img src="assets/img/icon/date.png" alt="icon">
                                      <h6><?php
                                            $eventDate = new DateTime($anEvents['event_date']);
                                            echo $eventDate->format('j'); ?> <span><?php echo $eventDate->format('M'); ?></span></h6>
                                  </div>
                              </div>
                              <div class="event_para ellipsis">
                                  <p class="ellipsis"><?php print $anEvents['description']; ?></p>
                              </div>
                              <div class="event_boxed_bottom_wrapper">
                                  <div class="row">
                                      <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                          <div class="event_bottom_boxed">
                                              <div class="event_bottom_icon">
                                                  <img src="assets/img/icon/map.png" alt="icon">
                                              </div>
                                              <div class="event_bottom_content">
                                                  <h5>Location:</h5>
                                                  <p><?php print $anEvents['location']; ?></p>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                          <div class="event_bottom_boxed">
                                              <div class="event_bottom_icon">
                                                  <img src="assets/img/icon/clock.png" alt="icon">
                                              </div>
                                              <div class="event_bottom_content">
                                                  <h5>Starts at:</h5>
                                                  <p><?php
                                                        $eventTime = strtotime($anEvents['event_time']);
                                                        $formattedTime = date('h:i A', $eventTime);
                                                        print $formattedTime; ?></p>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="event_button">
                                  <a href="event-details.php?id=<?php echo $anEvents['event_id'];?>" class="btn btn_md btn_theme">Read More</a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <?php foreach ($allEvents as $event) { ?>
                          <div class="event_left_side_wrapper">
                              <div class="event_content_area small_content_padding">
                                  <div class="event_tag_area">
                                      <a href="event-details.php?id=<?php echo $event['event_id'];?>">#<?php print $event['category']; ?></a>
                                  </div>
                                  <div class="event_heading_area">
                                      <div class="event_heading">
                                          <h3><a href="event-details.php?id=<?php echo $event['event_id'];?>"><?php print $event['title']; ?></a></h3>
                                      </div>
                                      <div class="event_date">
                                          <img src="assets/img/icon/date.png" alt="icon">
                                          <h6><?php
                                                $eventDate = new DateTime($event['event_date']);
                                                echo $eventDate->format('j'); ?> <span><?php echo $eventDate->format('M'); ?></span></h6>
                                      </div>
                                  </div>
                                  <div class="event_para ellipsis">
                                      <p class="ellipsis"><?php print $event['description']; ?></p>
                                  </div>
                                  <div class="event_boxed_bottom_wrapper">
                                      <div class="row">
                                          <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                              <div class="event_bottom_boxed">
                                                  <div class="event_bottom_icon">
                                                      <img src="assets/img/icon/map.png" alt="icon">
                                                  </div>
                                                  <div class="event_bottom_content">
                                                      <h5>Location:</h5>
                                                      <p><?php print $event['location']; ?></p>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                              <div class="event_bottom_boxed">
                                                  <div class="event_bottom_icon">
                                                      <img src="assets/img/icon/clock.png" alt="icon">
                                                  </div>
                                                  <div class="event_bottom_content">
                                                      <h5>Starts at:</h5>
                                                      <p><?php $eventTime = strtotime($event['event_time']);
                                                            $formattedTime = date('h:i A', $eventTime);
                                                            print $formattedTime; ?>
                                                      </p>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                          </div>
                      <?php } ?>
                  </div>
              </div>
          </div>
      </section>


      <!-- All Events Area -->
      <section id="home_blog_area" class="section_padding">
          <div class="container">
              <div class="row">
                  <div class="col-lg-4 offset-lg-4 col-md-12 col-sm-12 col-12">
                      <div class="section_heading_two">
                          <h3>Our Latest Event</h3>
                          <h2>Check all our Latest Events </h2>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <?php foreach ($allEvents as $allEvent) { ?>

                      <div class="col-lg-4">
                          <div class="blog_card_wrapper">
                              <div class="blog_card_img">
                                  <a href="event-details.php?id=<?php echo $allEvent['event_id'];?>"><?php $imagePaths = explode(',', $allEvent['image_path']);
                                            if (!empty($imagePaths[0])) {
                                                echo '<img src="' . substr($imagePaths[0], 3) . '" alt="First Image" class="event-image">';
                                            } else {
                                                echo 'No images available';
                                            } ?></a>
                              </div>
                              <div class="blog_card_text blog_card_two_text">
                                  <div class="blog_scard_tags">
                                      <a href="event-details.php?id=<?php echo $allEvent['event_id'];?>">#<?php print $allEvent['category'];?></a>
                                  </div>
                                  <div class="blog_two_calendar_area">
                                      <ul>
                                          <li><i class="fas fa-calendar"></i> Date: <span><?php $publishedDate = $allEvent['event_date'];
                                            $formattedDate = date('d M, Y', strtotime($publishedDate));
                                            echo $formattedDate; ?></span></li>
                                          <li><i class="fas fa-users"></i> By: <span>Admin</span></li>
                                      </ul>
                                  </div>
                                  <div class="blog_card_heading ellipsis">
                                      <h3><a href="event-details.php?id=<?php echo $allEvent['event_id'];?>"><?php print $allEvent['category'];?></a></h3>
                                      <p><?php print $allEvent['description'];?><a href="event-details.php?id=<?php echo $allEvent['event_id'];?>">Read more...</a></p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  <?php } ?>
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