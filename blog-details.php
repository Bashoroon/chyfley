  <!-- Head -->
  <?php include 'head.php';
    include 'admin/classes/function.php';
    include 'admin/classes/class.php';
    $chyfleyObj = new Chyfley();
    $id = $_GET['id'];
    $blogDetails = $chyfleyObj->detailed_blog($id);
    $recentNews = $chyfleyObj->recent_news();
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
                          <h2><span class="color_big_heading"><?php echo $blogDetails['title']; ?> </span></h2>
                          <ul class="breadcrumb_wrapper">
                              <li class="breadcrumb_item"><a href="blog.php">News</a></li>
                              <li class="breadcrumb_item"><img src="assets/img/icon/arrow.png" alt="img"></li>
                              <li class="breadcrumb_item active"><?php echo $blogDetails['title']; ?></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </section>



     <!-- News Details Area -->
     <section id="news_details_main" class="section_padding">
        <div class="container">
            <div class="row" id="counter">
                <div class="col-lg-8">
                    <div class="details_wrapper_area">
                        <div class="details_big_img">
                        <?php $imagePaths = explode(',', $blogDetails['image_path']);
                                            if (!empty($imagePaths[0])) {
                                                echo '<img src="' . substr($imagePaths[0], 3) . '" alt="First Image" class="event-image">';
                                            } else {
                                                echo 'No images available';
                                            } ?>
                            <span class="causes_badge bg-yellow">#<?php print $blogDetails['category'];?></span>
                        </div>
                        <div class="details_text_wrapper">
                            <h2><?php print $blogDetails['title'];?></h2>
                            <p>
                                
                            </p>
                           
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="details_small_img">
                                    <?php $imagePaths = explode(',', $blogDetails['image_path']);
                                            if (!empty($imagePaths[1])) {
                                                echo '<img src="' . substr($imagePaths[1], 3) . '" alt="First Image" class="event-image">';
                                            } else {
                                                echo 'No images available';
                                            } ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="details_small_img">
                                    <?php $imagePaths = explode(',', $blogDetails['image_path']);
                                            if (!empty($imagePaths[1])) {
                                                echo '<img src="' . substr($imagePaths[2], 3) . '" alt="First Image" class="event-image">';
                                            } else {
                                                echo 'No images available';
                                            } ?>
                                    </div>
                                </div>
                            </div>
                            <p>
                            <?php print $blogDetails['description'];?>
                            </p>
                        </div>
                       
                        <div class="comment_area_details">
                            <h3>2 Comments</h3>
                            <div class="post_comment_wrapper">
                                <div class="post_comment_item">
                                    <div class="post_comment_img">
                                        <img src="assets/img/testimonial/sherif.png" alt="img">
                                    </div>
                                    <div class="post_comment_text">
                                        <div class="post_names_replay">
                                            <h5>Adenike Rofiat</h5>
                                            <a href="#!"><i class="fas fa-reply"></i>Reply</a>
                                        </div>
                                        <p>It was an amazing experience</p>
                                    </div>
                                </div>
                                <div class="post_comment_item">
                                    <div class="post_comment_img">
                                        <img src="assets/img/testimonial/sherif.png" alt="img">
                                    </div>
                                    <div class="post_comment_text">
                                        <div class="post_names_replay">
                                            <h5>Rahimot Lawal</h5>
                                            <a href="#!"><i class="fas fa-reply"></i>Reply</a>
                                        </div>
                                        <p>We enjoy ourselves. I would want to repeat the memory again and again!</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="comment_form_area">
                            <h3>Leave a comment</h3>
                            <div class="comment_form">
                                <form action="#!" id="comment_form">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter full name"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                    placeholder="Enter email address" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <textarea rows="5" placeholder="Write your comments"
                                                    class="form-control" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="submit_btn">
                                                <button class="btn btn_theme btn_md">Submit comment</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar_first">
                        
                       
                        <!-- Recent Causes -->
                        <div class="recent_causes_wrapper sidebar_boxed">
                            <div class="sidebar_heading_main">
                                <h3>Recent news</h3>
                            </div>
                            <?php foreach($recentNews as $recent){?>
                            <div class="recent_donet_item">
                                <div class="recent_donet_img">
                                    <a href="blog-details.php?id=<?php print $recent['blog_id'];?>">  <?php $imagePaths = explode(',', $recent['image_path']);
                                            if (!empty($imagePaths[0])) {
                                                echo '<img src="' . substr($imagePaths[1], 3) . '" alt="First Image" style="height:70px;; width:70px; border-radius: 50%;" class="event-image" >';
                                            } else {
                                                echo 'No images available';
                                            } ?></a>
                                </div>
                                <div class="recent_donet_text">
                                    <div class="sidebar_inner_heading">
                                        <h4><a href="blog-details.php?id=<?php print $recent['blog_id'];?>"><?php print $recent['title'];?></a></h4>
                                    </div>
                                    <h6>Recently Published</h6>
                                </div>
                            </div>
                            <?php }?>
                          
                        </div>
                        <!-- Popular tags -->
                        <div class="share_causes_wrapper sidebar_boxed">
                            <div class="sidebar_heading_main">
                                <h3>Popular tags</h3>
                            </div>
                            <div class="popular_tags">
                                <ul>
                                    <li><a href="news.html">Poverty</a></li>
                                    <li><a href="news.html">Education</a></li>
                                    <li><a href="news.html">Children education</a></li>
                                    <li><a href="news.html">Food</a></li>
                                    <li><a href="news.html">Health care</a></li>
                                    <li><a href="news.html">Welfare</a></li>
                                    <li><a href="news.html">Donation people</a></li>
                                    <li><a href="news.html">Charity fund</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- share Causes -->
                        <div class="share_causes_wrapper sidebar_boxed">
                            <div class="sidebar_heading_main">
                                <h3>Share causes</h3>
                            </div>
                            <div class="social_icon_sidebar">
                                <ul>
                                    <li><a href="#!"><img src="assets/img/icon/facebook.png" alt="icon"></a></li>
                                    <li><a href="#!"><img src="assets/img/icon/instagram.png" alt="icon"></a></li>
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