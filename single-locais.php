<?php
/**
 * Template file for display 'Locais' post type
 *
 * @package Bauru_Painéis
 */
 
// Using the page thumbnail as banner
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);

$post_cat = get_the_terms( $post->ID, 'locais-categorias');
$cat_name = $post_cat[0]->name;
$cat_slug = $post_cat[0]->slug;

$post_query_args = array(
  'post_type' => 'locais',
  'tax_query' => array(array(
    'taxonomy'  => 'locais-categorias',
    'field' => 'slug',
    'terms'  => "$cat_slug"
  )),
);

$post_query = new WP_Query( $post_query_args );

get_header(); ?>

  <section class="banner single-locals" style="background: url(<?php echo $thumb_url[0]; ?>) no-repeat center">
		<!-- empty -->
	</section>

	<section id="local" class="section-wrapper">
		<article class="single-local">
		  
		  <main id="main" class="site-main" role="main">  
        <div class="container">
          <div class="col-md-3 hidden-sm hidden-xs">
            <?php
            while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
              <h2 class="other-locals"><a href="<?php the_permalink(); ?>" title="<?php get_the_title(); ?>"><?php the_title(); ?></a></h2>
            <?php endwhile; // End of the loop.
            ?>
            <a class="btn btn-white bg-blue" title="Locais" href="<?php echo esc_html(home_url('/locais')); ?>"><i class="fa fa-chevron-left" aria-hidden="true"></i> Locais</a>
          </div>
          <div class="col-md-offset-1 col-md-8">
            <?php
            while ( have_posts() ) : the_post();
            
              // Get ACF Fields
              $img_01 = get_field('local-img-01');
              $img_02 = get_field('local-img-02');
              $img_03 = get_field('local-img-03');
            
              echo '<h1>' . $cat_name . '</h1>'; ?>
              
              <div class="local-slider-wrapper">
                <ul class="local-slider">
                  <li class="image-print"><a href="<?php echo $img_01['url']; ?>"><img src="<?php echo $img_01['url']; ?>" alt="<?php echo $img_01['alt']; ?>"></a></li>
                  <li><a href="<?php echo $img_02['url']; ?>"><img src="<?php echo $img_02['url']; ?>" alt="<?php echo $img_01['alt']; ?>"></a></li>
                  <li><a href="<?php echo $img_03['url']; ?>"><img src="<?php echo $img_03['url']; ?>" alt="<?php echo $img_01['alt']; ?>"></a></li>
                </ul>
              </div>
              <div class="local-content">
                <table class="local-info">
                  <?php
                    $tablerow_01 = get_field('row-01');
                    $tablerow_02 = get_field('row-02');
                    $tablerow_03 = get_field('row-03');
                    $tablerow_04 = get_field('row-04');
                    $tablerow_05 = get_field('row-05');
                    $tablerow_06 = get_field('row-06');
                    $tablerow_07 = get_field('row-07');
                    $tablerow_08 = get_field('row-08');
                  ?>
                  <tr>
                    <td>
                      <p><b>KM</b> <?php echo $tablerow_01; ?></p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p><b>Trecho:</b> <?php echo $tablerow_02; ?></p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p><b>Face:</b> <?php echo $tablerow_03; ?></p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p><b>Dimensões:</b> <?php echo $tablerow_04; ?></p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p class="vdm"><b>VDM:</b> <?php echo $tablerow_05; ?></p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p><?php echo $tablerow_06; ?></p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p><?php echo $tablerow_07; ?></p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <a href="<?php echo $tablerow_08; ?>" title="Ver no mapa" target="_blank">Ver no mapa</a>
                    </td>
                  </tr>
                </table>
                <?php the_content(); ?>
                <button id="js-print" type="button" class="local-print" title="Imprimir"><i class="fa fa-print" aria-hidden="true"></i></button>
              </div>
            <?php endwhile; // End of the loop. ?>  
          </div>
        </div>
			</main><!-- #main -->
			
		</article>
	</section>

<?php
get_footer();
