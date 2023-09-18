<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Alioth
 */

get_header();
$option = get_option('pe-redux');


?>

<main id="primary" class="site-main" data-barba="container">
    
    <div class="section">

                <?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
        
        ?>
    
    </div>
            <?php
    
		endwhile; // End of the loop.
		?>    

</main><!-- #main -->

<?php
get_footer();
