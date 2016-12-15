<?php

// Get ACF Field and use as parameter to query post
$post_type = get_field('post-type');

// Creating a post query

if( is_front_page()) {
  $post_query = new WP_Query(array( "post_type" => "$post_type", 'posts_per_page' => 12 ));
} else {
  $post_query = new WP_Query(array( "post_type" => "$post_type" ));
}

?>

<section id="blog" class="section-wrapper">
  <div class="container">
    
    <div class="blog-title">
      <?php 
        if( is_front_page()) {
          echo '<h1>Portfólio</h1>';
        } else {
          echo '<h1>' . get_the_title() . '</h1>';
        }
      ?>
    </div>
    
    <div class="blog-gallery">
      <?php
      while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
        <a href="<?php the_post_thumbnail_url('full'); ?>">
          <?php the_post_thumbnail('medium'); ?>
          <span class="blog-icon">
            <i class="fa fa-search-plus" aria-hidden="true"></i>
          </span>
        </a>
      <?php
      endwhile; // End of the loop.
      ?>
    </div>
    
    <?php 
      if(is_front_page()) { ?>
        
        <div class="blog-link">
          <a class="btn btn-red" href="#" title="Ver todos">Ver Todos</a>
        </div>
        
      <?php } else { ?>
      
      <div class="blog-text">
        <?php
        while ( have_posts() ) : the_post();
          the_content();
        endwhile; // End of the loop.
        ?>
      </div> 
      
      <?php }
    ?>
    
  </div>
</section>