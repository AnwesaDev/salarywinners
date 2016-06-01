<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


get_header();
?>
    <section class="content-body product-details-page">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="content">
               <?php if(have_posts()): ?>
                    <?php while(have_posts()): the_post(); 
                            $post_id = get_the_ID ();
                            $post_meta = get_post_meta ( $post_id );
                            $user_id = $post->post_author;
                            $user = get_user_by('id', $user_id);
                            $user_meta = get_user_meta($user_id);
                    ?>
            <div class="product-details">
               
              <div class="normal">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <?php if(!empty($post_meta['product_image'][0]))
                                                        {
                                                        ?>
                                                    <?php $avatar_data = wp_get_attachment_image_src($post_meta['product_image'][0]); ?>
                                                    <img id="profile-picture" src="<?php echo $avatar_data[0]; ?>" class="img-responsive">
                                                        <!--<img src="images/style-report.jpg" alt="" title="" class="img-responsive">-->
                                                    <?php } else { ?>
                                                        <img id="product_image" src="<?php echo get_template_directory_uri(); ?>/images/profile-image.png" class="img-responsive" alt="" title="">

                                                    <?php } ?>
                  <div class="social"> <a href=""><span class="fa fa-facebook"></span></a> <a href=""><span class="fa fa-google-plus"></span></a> <a href=""><span class="fa fa-twitter"></span></a> <a href=""><span class="fa fa-instagram"></span></a> </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <div class="col-xs-6">
                    <div class="row">
                      <h3 class="title"><?php the_title();?></h3>
                      <div class="job-author-name"><span class="user"></span>
                        <p><?php echo $user_meta['first_name'][0].' '.$user_meta['last_name'][0] ;?></p>
                      </div>
                      <div class="job-location"><i class="location"></i> <b><?php echo $user_meta['city'][0].','.$user_meta['state'][0] ;?></b></div>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="button"> <a href="" class="btn btn-work pull-right"><span class="cart"></span>Cart</a> </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="rating"> <em>5</em> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> </div>
                    </div>
                    <div class="col-md-12">
                      <h3 class="price"><span>Price:</span><b>$</b> <?php echo $post_meta['_price'][0];?></h3>
                    </div>
                    <div class="row">
                    <div class="tags">
                        <span>Keywords:</span>
                        <?php
                            echo strip_tags(get_the_term_list($post_id, SW_TX_PRODUCT_KEYWORDS, '<ul><li>', '</li><li>', '</li></ul>' ),'<ul><li>');
                        ?>
                    </div>
                   <div class="tags">
                        <span>Category:</span>
                        <?php
                            echo strip_tags(get_the_term_list($post_id, SW_TX_PRODUCT_CATEGORY, '<ul><li>', '</li><li>', '</li></ul>' ),'<ul><li>');
                        ?>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                <nav>
                  <ul class="nav nav-tabs">
                    <li class="active"> <a data-toggle="tab" href="#description" href="">Description</a></li>
                    <li><a data-toggle="tab" href="#reiviews" href="">Description</a></li>
                  </ul>
                </nav>
              </div>
            </div>
            <div class="tab-content">
              <div id="description" class="tab-pane active">
                <div class="">
                  <?php the_content();?>
                </div>
              </div>
              <div id="reiviews" class="tab-pane fade">
                <div class="">
                  <p> Fusce accumsan ultricies enim, a tempus arcu fringilla vel. Praesent mi nisi, dapibus nec ipsum eu, posuere ultricies augue. Curabitur ut purus laoreet mauris pellentesque feugiat. Suspendisse ultricies feugiat tellus, et eleifend nulla sagittis sed. Vivamus eget dui eu odio lacinia interdum vel ac ex. <br>
                    <br>
                    Qsce accumsan ultricies enim, a tempus arcu fringilla vel. Praesent mi nisi, dapibus nec ipsum eu, posuere ultricies augue. Curabitur ut purus laoreet mauris pellentesque feugiat. Suspendisse ultricies feugiat tellus, et eleifend nulla sagittis sed. Vivamus eget dui eu odio lacinia interdum vel ac ex. <br>
                    <br>
                    Aenean commodo, lectus vitae efficitur blandit, libero justo feugiat turpis, sed sollicitudin ligula ante ut urna. Nullam at eleifend lacus, nec tincidunt orci. Integer id est nibh. </p>
                </div>
              </div>
            </div>
              <?php endwhile; ?>
                    <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<section class="gallery">
          <div class="row">
              <div class="gallery-box">
                  <div class="thumb">
                  	<img src="images/img-thumb1.jpg" alt="" title="">
                  </div>
                  <div class="thumb-content">
                  	<h3 class="title">Hi, this is title</h3>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacus neque.
                    </p>
                    <i></i>
                  </div>
              </div>
              
              <div class="gallery-box">
                  <div class="thumb">
                  	<img src="images/img-thumb2.jpg" alt="" title="">
                  </div>
                  <div class="thumb-content">
                  	<h3 class="title">Hi, this is title</h3>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacus neque.
                    </p>
                    <i></i>
                  </div>
              </div>
              
              <div class="gallery-box">
                  <div class="thumb-content">
                  	<h3 class="title">Hi, this is title</h3>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacus neque.
                    </p>
                    <i></i>
                  </div>
                   <div class="thumb">
                  	<img src="images/img-thumb3.jpg" alt="" title="">
                  </div>
              </div>
              
              <div class="gallery-box">
                  <div class="thumb-content">
                  	<h3 class="title">Hi, this is title</h3>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacus neque.
                    </p>
                    <i></i>
                  </div>
                   <div class="thumb">
                  	<img src="images/img-thumb4.jpg" alt="" title="">
                  </div>
              </div>
            
              
           </div>
        </section>
<?php 
get_footer();
