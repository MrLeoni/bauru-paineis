<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bauru_Painéis
 */
 
// Arguments for display content in footer via custom post
// Creating a custom query to grab a post made for the footer
$footer_post_args = array(

  'post_type' => 'complementos',
  'posts_per_page'  => 1,
  'tax_query' =>  array(array(
    'taxonomy'  => 'complementos-categorias',
    'field' => 'slug',
    'terms' => 'endereco-footer'
  ))

);
$footer_post = new WP_Query( $footer_post_args );

?>
	
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <article class="footer-navigation">
              <?php
                // footer menu arguments
                $footer_menu_args = array(
                  'theme_location'  => 'footer',
                  'container' => 'nav',
                  'container_class' => 'footer-nav',
                  'menu'  => 'ul',
                  'menu_class'  => 'footer-links'
                );
                // call the function to build the menu and with the arguments
                wp_nav_menu( $footer_menu_args );
              ?>
            </article>
          </div>
          <div class="col-md-offset-1 col-md-4">
            <article class="footer-content">
              <?php
                // Start loop to show the post from the custom query
                while($footer_post->have_posts()): $footer_post->the_post();
                  the_content();
                // End of the loop
                endwhile;
                wp_reset_postdata();
              ?>
            </article>
          </div>
          <div class="col-md-12">
            <article class="copy">
              <p>Bauru Painéis &middot; Copyright &copy; <span id="js-date"><!-- ano exibido através da função currentDate(); no arquivo main.js --></span> <a href="http://agenciadelucca.com.br" title="Agência Delucca" target="_blank">Agência Delucca</a></p>
            </article>
          </div>
        </div>
      </div>
    </footer>
    
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      
      ga('create', 'UA-3753805-63', 'auto');
      ga('send', 'pageview');
    
    </script>
  
  <?php wp_footer(); ?>
  
  </body>
</html>
