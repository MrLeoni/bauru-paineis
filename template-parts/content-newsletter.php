<?php

// Newsletter template
 
$news_args = array(

  'post_type' => 'complementos',
  'tax_query' => array(array(
    'taxonomy' => 'complementos-categorias',
    'field' => 'slug',
    'terms' => 'newsletter'
  ))
  
);
$news_query = new WP_Query( $news_args );

?>

<section id="news" class="section-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <?php
        while( $news_query->have_posts() ) : $news_query->the_post();
          the_content();
        endwhile;
        ?>
      </div>
      <div class="col-md-6 hidden-sm hidden-xs">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</section>