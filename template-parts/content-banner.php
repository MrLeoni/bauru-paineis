<?php
  $banner_args = array(
    'post_type' => 'banner'
  );
  
  $banner_query = new WP_Query( $banner_args );
?>

<div class="home-banner">
  <div class="banner-slider-wrapper">
    <div class="banner-slider">
      <?php
      while ( $banner_query->have_posts() ) : $banner_query->the_post(); ?>
        <div class="slide">
          <div class="banner-text" style="background: url(<?php the_post_thumbnail_url('full'); ?>) no-repeat center">
            <div class="container">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      <?php endwhile; // End of the loop.
      ?>
    </div>
  </div>
</div>