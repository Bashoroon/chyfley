  <!-- Head -->
  <?php include 'head.php';
    include 'admin/classes/function.php';
    include 'admin/classes/class.php';
    $chyfleyObj = new Chyfley();
    $allnews = $chyfleyObj->all_news();
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



      <!-- Blog Area -->
      <section id="upcoming_events" class="section_padding">
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
              <div class="row" >
                  <?php foreach ($allnews as $new) { ?>


                      <div class="col-lg-4" style="margin-bottom: 40px;">
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
                                      <a href="blog-details.php?id=<?php echo $new['blog_id'];?>">#<?php print $new['category']; ?></a>
                                  </div>
                                  <div class="blog_card_heading ellipsis">
                                      <h3><a href="blog-details.php?id=<?php echo $new['blog_id'];?>"><?php print $new['title']; ?></a></h3>
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
                      </div> <br>
                  <?php  } ?>
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