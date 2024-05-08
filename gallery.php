  <!-- Head -->
  <?php include 'head.php';
  include 'admin/classes/class.php';
    include 'admin/classes/function.php'; 
    
    $chyfleyObj = new Chyfley();
    $allStudents = $chyfleyObj->student_gallery();
    $uncategorized = $chyfleyObj->uncategorized_gallery();
    $vs = $chyfleyObj->vs_gallery();
    $cultural = $chyfleyObj->cultural_gallery();
    $friday = $chyfleyObj->friday_gallery();
    $fac = $chyfleyObj->facilities_gallery();
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


      <!-- Student -->
    <section id="gallery_grid_area" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="section_heading">
                        <h3>Student Gallery</h3>
                        <h2> Explore our <span class="color_big_heading">gallery</span>
                          </h2>
                    </div>
                </div>
            </div>
            <div class="row popup-gallery">
                <div class="col-lg-12 co-md-12 col-sm-12 col-12">
                    <div class="gallery_slider_area owl-theme owl-carousel slider_dots">
                        <?php foreach ($allStudents as $gallery) {?>
                        
                     
                        <div class="gallery_item">
                            <img src="<?php print substr($gallery['image_path'], 3);?>" alt="img">
                            <div class="gallery_overlay">
                                <a href="<?php print substr($gallery['image_path'], 3);?>" title="<?php print $gallery['title'];?>"><img
                                        src="assets/img/icon/arrow-round.png" alt="icon"></a>
                            </div>
                        </div>
                    <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="gallery_grid_area" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="section_heading">
                        <h3>Facilities Gallery</h3>
                        <h2> Explore our <span class="color_big_heading">gallery</span>
                          </h2>
                    </div>
                </div>
            </div>
            <div class="row popup-gallery">
                <div class="col-lg-12 co-md-12 col-sm-12 col-12">
                    <div class="gallery_slider_area owl-theme owl-carousel slider_dots">
                        <?php foreach ($fac as $gallery) {?>
                        
                     
                        <div class="gallery_item">
                            <img src="<?php print substr($gallery['image_path'], 3);?>" alt="img">
                            <div class="gallery_overlay">
                                <a href="<?php print substr($gallery['image_path'], 3);?>" title="<?php print $gallery['title'];?>"><img
                                        src="assets/img/icon/arrow-round.png" alt="icon"></a>
                            </div>
                        </div>
                    <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </section>
  


    <!-- End of the section party-->
    <section id="gallery_grid_area" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="section_heading">
                        <h3>Cultural Day Gallery</h3>
                        <h2> Explore our <span class="color_big_heading">gallery</span> </h2>
                    </div>
                </div>
            </div>
            <div class="row popup-gallery">
                <div class="col-lg-12 co-md-12 col-sm-12 col-12">
                    <div class="gallery_slider_area owl-theme owl-carousel slider_dots">
                        <?php foreach ($cultural as $gallery) {?>
                        
                     
                        <div class="gallery_item">
                            <img src="<?php print substr($gallery['image_path'], 3);?>" alt="img">
                            <div class="gallery_overlay">
                                <a href="<?php print substr($gallery['image_path'], 3);?>" title="<?php print $gallery['title'];?>"><img
                                        src="assets/img/icon/arrow-round.png" alt="icon"></a>
                            </div>
                        </div>
                    <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </section>


       <!-- Fridays-->
       <section id="gallery_grid_area" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="section_heading">
                        <h3>Friday Gallery</h3>
                        <h2> Explore our <span class="color_big_heading">gallery</span></h2>
                    </div>
                </div>
            </div>
            <div class="row popup-gallery">
                <div class="col-lg-12 co-md-12 col-sm-12 col-12">
                    <div class="gallery_slider_area owl-theme owl-carousel slider_dots">
                        <?php foreach ($friday as $gallery) {?>
                        
                     
                        <div class="gallery_item">
                            <img src="<?php print substr($gallery['image_path'], 3);?>" alt="img">
                            <div class="gallery_overlay">
                                <a href="<?php print substr($gallery['image_path'], 3);?>" title="<?php print $gallery['title'];?>"><img
                                        src="assets/img/icon/arrow-round.png" alt="icon"></a>
                            </div>
                        </div>
                    <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </section>

      <!-- Valedictory Service-->
      <section id="gallery_grid_area" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="section_heading">
                        <h3>Valedictory Service Gallery</h3>
                        <h2> Explore our <span class="color_big_heading">gallery</span>
                            </h2>
                    </div>
                </div>
            </div>
            <div class="row popup-gallery">
                <div class="col-lg-12 co-md-12 col-sm-12 col-12">
                    <div class="gallery_slider_area owl-theme owl-carousel slider_dots">
                        <?php foreach ($vs as $gallery) {?>
                        
                     
                        <div class="gallery_item">
                            <img src="<?php print substr($gallery['image_path'], 3);?>" alt="img">
                            <div class="gallery_overlay">
                                <a href="<?php print substr($gallery['image_path'], 3);?>" title="<?php print $gallery['title'];?>"><img
                                        src="assets/img/icon/arrow-round.png" alt="icon"></a>
                            </div>
                        </div>
                    <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Resumption-->
    <section id="gallery_grid_area" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="section_heading">
                        <h3>Uncategorized Gallery</h3>
                        <h2> Explore our <span class="color_big_heading">gallery</span></h2>
                    </div>
                </div>
            </div>
            <div class="row popup-gallery">
                <div class="col-lg-12 co-md-12 col-sm-12 col-12">
                    <div class="gallery_slider_area owl-theme owl-carousel slider_dots">
                        <?php foreach ($uncategorized as $gallery) {?>
                        
                     
                        <div class="gallery_item">
                            <img src="<?php print substr($gallery['image_path'], 3);?>" alt="img">
                            <div class="gallery_overlay">
                                <a href="<?php print substr($gallery['image_path'], 3);?>" title="<?php print $gallery['title'];?>"><img
                                        src="assets/img/icon/arrow-round.png" alt="icon"></a>
                            </div>
                        </div>
                    <?php }?>
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