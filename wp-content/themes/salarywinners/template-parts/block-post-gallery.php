<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 4
    
);

$queryPostGallery = new WP_Query($args);
?>
    <section class="gallery">
          <div class="row">
              <?php if($queryPostGallery->have_posts()): 
                  $i=1;?>
              <?php while($queryPostGallery->have_posts()): $queryPostGallery->the_post(); 
                    
                    if($i==3 || $i==4)
                    {
              ?>
              <div class="gallery-box">
                  
                  <div class="thumb-content">
                      
                      <h3 class="title"><?php the_title(); ?></h3>
                    
                    <?php the_excerpt(); ?>
                   
                    <i></i>
                  </div>
                  <div class="thumb">
<!--                  	<img src="<?php echo get_template_directory_uri();?>/images/img-thumb1.jpg" alt="" title="">-->
                      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                  </div>
              </div>
                    <?php } else { ?>
              <div class="gallery-box">
                  <div class="thumb">
<!--                  	<img src="<?php echo get_template_directory_uri();?>/images/img-thumb1.jpg" alt="" title="">-->
                      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                  </div>
                  <div class="thumb-content">
                      <h3 class="title"><?php the_title(); ?></h3>
                    
                    <?php the_excerpt(); ?>
                   
                    <i></i>
                  </div>
              </div>
                    <?php } ?>
              <?php $i++;
              endwhile; ?>
              <?php wp_reset_postdata(); ?>
              <?php endif; ?>
              
           </div>
        </section>