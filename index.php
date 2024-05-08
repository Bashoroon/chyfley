  <!-- Head -->


  <?php include 'head.php';
    include 'admin/classes/class.php';
    include 'admin/classes/function.php';

    $chyfleyObj = new Chyfley();
    $anEvents = $chyfleyObj->an_event();
    $events = $chyfleyObj->home_event();
    $news = $chyfleyObj->home_news();
    ?>
  <!-- Head ends -->
  <style>
      .whatsapp-logo {
          position: fixed;
          bottom: 20px;
          right: 20px;
          z-index: 1000;
      }

      .whatsapp-logo img {
          width: 50px;
          /* Adjust the size as needed */
          height: auto;
          cursor: pointer;
      }
  </style>

  <body>
      <!-- Preloader -->

      <!-- Preloader ends -->

      <!-- header -->
      <?php include('header.php'); ?>
      <!-- header ends -->

      <!-- Carousel Banner Area -->

      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
              <div class="carousel-item active">
                  <section id="home_two_banner">
                      <div class="container">
                          <div class="row">
                              <div class="col-lg-8 offset-lg-2">
                                  <div class="banner_two_text">
                                      <h6>Empowering Learners, <span>Building Leaders</span></h6>
                                      <h1> At our school, we go beyond academics </h1>
                                      <p>A greate place dedicated to nurturing not just students but future leaders. Through a dynamic curriculum, supportive community, and innovative teaching methods, we mold individuals who are ready to lead with confidence and make a positive impact on the world.</p>
                                      <div class="home_two_banner_button">
                                          <a href="#" class="btn btn_theme btn_md">Learn more</a>
                                          <a href="#" class="vedio_btn popup-vimeo"><i class="fa fa-play"></i>Experience Our Amenities</a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </section>
              </div>
              <div class="carousel-item">
                  <!-- Slide 2 content -->
                  <section id="home_one_banner">
                      <div class="container">
                          <div class="row align-items-center">
                              <div class="col-lg-6">
                                  <div class="banner_one_text">
                                      <h1><span><span class="color_big">Inspiring </span>Excellence,</span> Fostering Growth
                                      </h1>
                                      <p>At Chyfley, we go beyond academics, fostering an environment that inspires excellence in every student. With a commitment to personal and academic growth, we empower students to become lifelong learners, equipped to face the challenges of an ever-evolving world.</p>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="banner_one_img">
                                      <img src="assets/img/main-slider/ind.jpeg" alt="img 619 by 684">
                                      <div class="banner_element">

                                      </div>
                                  </div>
                              </div>

                          </div>
                      </div>
                  </section>
                  <!-- ... -->
              </div>
              <div class="carousel-item">
                  <!-- Slide 3 content -->
                  <section id="home_three_banner">
                      <div class="container">
                          <div class="row">
                              <div class="col-lg-6 col-md-10 col-sm-12 col-12">
                                  <div class="banner_three_text">
                                      <h4>Unlocking the doors to limitless possibilities</h4>
                                      <h1 style="color:white;">Nurturing Minds, Shaping Futures</h1>
                                      <p style="color:#F27234; font-size:18px;">our school is dedicated to nurturing young minds, instilling knowledge, and shaping futures. Join us on a journey where education becomes a transformative experience, paving the way for a brighter and successful tomorrow. </p>
                                      <div class="home_three_banner_button">
                                          <a href="#" class="btn btn_theme btn_md">Learn more</a>
                                          <a href="#" class="vedio_btn popup-vimeo"><i class="fa fa-play"></i>Discover Our Facilities</a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </section>
                  <!-- ... -->
              </div>
          </div>
      </div>


      <br><br><br>
      <!-- Msiion and Vison -->
      <section id="faqs_arae_top" class="section_padding">
          <div class="container">
              <div class="row">
                  <div class="col-lg-6 offset-lg-3 col-md-12 col-sm-12 col-12">
                      <div class="section_heading">
                          <!-- <h3>Faq</h3> -->
                          <h2>Framework for Achievement <span class="color_big_heading"> Foundations of </span> Success</h2>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                      <div class="about_top_boxed bg_one">
                          <div class="about_top_boxed_icon">
                              <img src="assets/img/icon/money.png" alt="img">
                          </div>
                          <div class="about_top_boxed_text">
                              <h3>Our Vision</h3>
                              <h5>To be a foremost educational institution with global recognition in the 21st century and beyond</h5>
                              <a href="about">Learn more...</a>
                          </div>
                          <div class="about_top_boxed_vector">
                              <img src="assets/img/icon/round.png" alt="img">
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                      <div class="about_top_boxed bg_two">
                          <div class="about_top_boxed_icon">
                              <img src="assets/img/icon/setting.png" alt="img">
                          </div>
                          <div class="about_top_boxed_text">
                              <h3>Our Mission</h3>
                              <h5>To position Chyfley Schools as a leading player in the education sector with qualitative services, qualified tutors and seasoned administrators </h5>
                              <a href="about">Learn more...</a>
                          </div>
                          <div class="about_top_boxed_vector">
                              <img src="assets/img/icon/round.png" alt="img">
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                      <div class="about_top_boxed bg_three">
                          <div class="about_top_boxed_icon">
                              <img src="assets/img/icon/hand-round.png" alt="img">
                          </div>
                          <div class="about_top_boxed_text">
                              <h3>Our Core Value</h3>
                              <h5>We strive for excellence in all aspects of education. We are committed to providing a learning environment that fosters academic achievement, creativity, and personal growth.</h5>
                              <a href="about">Learn more...</a>
                          </div>
                          <div class="about_top_boxed_vector">
                              <img src="assets/img/icon/round.png" alt="img">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <!-- Our Departmet -->
      <section id="trending_causes" class="section_after section_padding bg-color">
          <div class="container">
              <div class="row">
                  <div class="col-lg-6 offset-lg-3 col-md-12 col-sm-12 col-12">
                      <div class="section_heading">
                          <h3>Departments</h3>
                          <h2> Our Beautiful <span class="color_big_heading">Departmments</span> </h2>
                      </div>
                  </div>
              </div>
              <div class="row" id="counter">
                  <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                      <div class="case_boxed_wrapper">
                          <div class="case_boxed_img">
                              <a href="#"><img src="assets/img/dept/science.jpeg" alt="img"></a>
                          </div>
                          <div class="causes_boxed_text">

                              <h3><a href="#">Science Department</a></h3>
                              <p>Spark brilliance in our Science Department, where exceptional students thrive and lead the way in scientific exploration.</p>
                              <div class="causes_boxed_bottom_wrapper">
                                  <div class="row">

                                      <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                          <div class="casuses_bottom_boxed casuses_left_padding">


                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                      <div class="case_boxed_wrapper">
                          <div class="case_boxed_img">
                              <a href="#"><img src="assets/img/dept/commercial.jpeg" alt="img"></a>

                          </div>
                          <div class="causes_boxed_text">

                              <h3><a href="#">Commercial Department</a></h3>
                              <p>Explore limitless possibilities in our Commercial Department, a hub of strategic minds and innovative thinkers driving success in the business landscape.</p>
                              <div class="causes_boxed_bottom_wrapper">
                                  <div class="row">

                                      <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                          <div class="casuses_bottom_boxed casuses_left_padding">


                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                      <div class="case_boxed_wrapper">
                          <div class="case_boxed_img">
                              <a href="#"><img src="assets/img/dept/art.jpg" alt="img"></a>

                          </div>
                          <div class="causes_boxed_text">

                              <h3><a href="#">Art Department</a></h3>
                              <p>Unleash creativity in our Art Department, where artistic talents bloom, shaping visionaries of tomorrow's expressive world.</p>
                              <div class="causes_boxed_bottom_wrapper">
                                  <div class="row">

                                      <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                          <div class="casuses_bottom_boxed casuses_left_padding">


                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>

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
                                  <a href="event-details.php?id=<?php echo $anEvents['event_id']; ?>">#<?php print $anEvents['category']; ?></a>
                              </div>
                              <div class="event_heading_area">
                                  <div class="event_heading">
                                      <h3><a href="event-details.php?id=<?php echo $anEvents['event_id']; ?>"><?php print $anEvents['title']; ?>
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
                                  <a href="event-details.php?id=<?php echo $anEvents['event_id']; ?>" class="btn btn_md btn_theme">Read More</a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <?php foreach ($events as $event) { ?>
                          <div class="event_left_side_wrapper">
                              <div class="event_content_area small_content_padding">
                                  <div class="event_tag_area">
                                      <a href="event-details.php?id=<?php echo $event['event_id']; ?>">#<?php print $event['category']; ?></a>
                                  </div>
                                  <div class="event_heading_area">
                                      <div class="event_heading">
                                          <h3><a href="event-details.php?id=<?php echo $event['event_id']; ?>"><?php print $event['title']; ?></a></h3>
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

      <!--Admission Area -->
      <section id="donate_area">
          <div class="container">
              <div class="row">
                  <div class="col-lg-6 offset-lg-3">
                      <div class="donate_text">
                          <h3>Admission is on!</h3>
                          <h2>
                              Discover excellence at Chyfley Schools! <span class="color_big_heading"> Admission is now open - </span> seize your opportunity to excel!
                              
                              <button type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" class="btn btn_md btn_theme">Register now</button>
                      </div>
                  </div>
              </div>
          </div>
      </section>



      <!-- Counter  Area -->
      <section id="counter_area">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="counter_area_wrapper">
                          <div class="row">
                              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                  <div class="counter_item">
                                      <img src="assets/img/icon/waec.png" alt="icon">
                                      <h2 class="counter">2348</h2>
                                      <p>Waec Success</p>
                                  </div>
                              </div>
                              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                  <div class="counter_item">
                                      <img src="assets/img/icon/alumni.png" alt="icon">
                                      <h2 class="counter">1785</h2>
                                      <p>Alumni</p>
                                  </div>
                              </div>
                              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                  <div class="counter_item">
                                      <img src="assets/img/icon/competition.png" alt="icon">
                                      <h2 class="counter">17</h2>
                                      <p>Competition Won</p>
                                  </div>
                              </div>
                              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                  <div class="counter_item">
                                      <img src="assets/img/icon/student.png" alt="icon">
                                      <h2 class="counter">1294</h2>
                                      <p>Students</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>


      <!-- Blog Area -->
      <section id="home_blog_area" class="section_after bg-color">
          <div class="container">
              <div class="row">
                  <div class="col-lg-6 offset-lg-3 col-md-12 col-sm-12 col-12">
                      <div class="section_heading">
                          <h3>Our latest news</h3>
                          <h2>Check all
                              <span class="color_big_heading">our latest</span> news and updates
                          </h2>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <?php foreach ($news as $new) { ?>


                      <div class="col-lg-4">
                          <div class="blog_card_wrapper">
                              <div class="blog_card_img">
                                  <a href="#"><?php $imagePaths = explode(',', $new['image_path']);
                                                if (!empty($imagePaths[0])) {
                                                    echo '<img src="' . substr($imagePaths[0], 3) . '" alt="First Image" class="news-image">';
                                                } else {
                                                    echo 'No images available';
                                                } ?></a>
                              </div>
                              <div class="blog_card_text">
                                  <div class="blog_card_tags">
                                      <a href="blog-details.php?id=<?php print $new['blog_id']; ?>">#<?php print $new['category']; ?></a>
                                  </div>
                                  <div class="blog_card_heading ellipsis">
                                      <h3><a href="blog-details.php?id=<?php print $new['blog_id']; ?>"><?php print $new['title']; ?></a></h3>
                                      <p><?php print $new['description']; ?></p>
                                  </div>
                                  <div class="blog_boxed_bottom_wrapper">
                                      <div class="row">
                                          <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                              <div class="blog_bottom_boxed">
                                                  <div class="blog_bottom_icon">
                                                      <img src="assets/img/icon/cal.png" alt="icon">
                                                  </div>
                                                  <div class="blog_bottom_content">
                                                      <h5>Date:</h5>
                                                      <p><?php $publishedDate = $new['published_date'];
                                                            $formattedDate = date('d M, Y', strtotime($publishedDate));
                                                            echo $formattedDate; ?></p>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                              <div class="blog_bottom_boxed blog_left_padding">
                                                  <div class="blog_bottom_icon">
                                                      <img src="assets/img/icon/user.png" alt="icon">
                                                  </div>
                                                  <div class="blog_bottom_content">
                                                      <h5>By:</h5>
                                                      <p>Admin</p>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  <?php  } ?>
              </div>
          </div>
      </section>

      <!-- Awrds Area -->
      <section id="partner_area">
          <h2 class="d-none">Heading</h2>
          <div class="container">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="partner_slider_wrapper owl-theme owl-carousel">
                          <div class="partner_logo">
                              <a href="#!"><img src="assets/img/award/award-1.png" alt="img"></a>
                          </div>
                          <div class="partner_logo">
                              <a href="#!"><img src="assets/img/award/award-2.png" alt="img"></a>
                          </div>
                          <div class="partner_logo">
                              <a href="#!"><img src="assets/img/award/award-3.png" alt="img"></a>
                          </div>
                          <div class="partner_logo">
                              <a href="#!"><img src="assets/img/award/award-4.png" alt="img"></a>
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
      <div class="whatsapp-logo">
          <a href="https://wa.me/+2347012917404" target="_blank">
              <img src="assets/img/whatsapp.png" alt="WhatsApp Logo">
          </a>
      </div>
      <?php include 'footer.php'; ?>


      <?php include 'footerjs.php'; ?>
  </body>
  <!-- Bootstrap JS Bundle (including Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
      document.addEventListener('DOMContentLoaded', function() {
          // Initialize the carousel with auto-play
          var myCarousel = new bootstrap.Carousel(document.getElementById('carouselExampleCaptions'), {
              interval: 10000, // Set the interval in milliseconds (5 seconds in this example)
              pause: 'hover', // Pause on mouseover
              wrap: true // Allow wrapping from the last to the first slide
          });

          // Remove navigation controls
          document.getElementById('carouselExampleCaptions').querySelector('.carousel-control-prev').style.display = 'none';
          document.getElementById('carouselExampleCaptions').querySelector('.carousel-control-next').style.display = 'none';
      });
  </script>