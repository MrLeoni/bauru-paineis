<?php
/**
 * Template name: Home
 *
 * @package Bauru_Painéis
 */
 
// Using the page thumbnail as banner
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);

// ACF Fields
// Banner
$banner_text = get_field('home-banner-text');
$banner_link_check = get_field('home-banner-link-check');
$banner_link_text = get_field('home-banner-link-text');
$banner_link_url = get_field('home-banner-link-url');
$banner_link_target = get_field('home-banner-link-target');

// Midia and Local
$home_local_text = get_field('home-local-text');
$home_local_img = get_field('home-local-img');
$home_midia_text = get_field('home-midia-text');
$home_midia_img = get_field('home-midia-img');

get_header(); ?>

  <section class="banner-text" style="background: url(<?php echo $thumb_url[0]; ?>) no-repeat center 10%">
    <div class="container">
      <h1><?php echo $banner_text; ?></h1>
      <?php if($banner_link_check == 'true') { ?>
        <a class="btn btn-white bg-red" href="<?php echo $banner_link_url; ?>" target="<?php echo $banner_link_target ?>" title="<?php echo $banner_link_text; ?>"><?php echo $banner_link_text; ?></a>
      <?php } ?>
    </div>
  </section>

	<main id="main" class="site-main" role="main">
	  <article id="home">
      <section id="home-content" class="section-wrapper">
        <?php
        while ( have_posts() ) : the_post();
          the_content();
        endwhile; // End of the loop.
        ?>
    		
  		</section>
  		
  		<?php get_template_part( 'template-parts/content', 'blog' ); ?>
  		
  		<section id="home-midia-local" class="section-wrapper">
  		  <div class="midias-wrapper">
  		    
  		    <div class="midia-container">
  					<div class="midia-content">
  						<div class="content-position">
  							<?php echo $home_local_text; ?>
  						</div>
  					</div>
  					<div class="midia-img">
  						<img src="<?php echo $home_local_img['url']; ?>" alt="<?php echo $home_local_img['alt']; ?>">
  					</div>
  				</div>
  				
  				<div class="midia-container">
  					<div class="midia-img">
  						<img src="<?php echo $home_midia_img['url']; ?>" alt="<?php echo $home_midia_img['alt']; ?>">
  					</div>
  					<div class="midia-content">
  						<div class="content-position">
  							<?php echo $home_midia_text; ?>
  						</div>
  					</div>
  				</div>
  		    
  		  </div>
  		</section>
    </article>
	</main><!-- #main -->

<?php
get_footer();
