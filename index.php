<?php
/**
 * The default template for all pages
 *
 * Template Name: Default Template
 * description: Page template for subpages like privacy policy
 * 

 */
get_header();
if (have_posts()) :

?>
<h1>This Is The Default Template</h1>   
<?php
 while (have_posts()) :
 the_post();
 the_content();
 endwhile;
endif;
get_sidebar();
get_footer();
?>