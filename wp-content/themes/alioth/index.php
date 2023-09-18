<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Alioth
 */

get_header();
$option = get_option('pe-redux');
$sidebar = 'right-sidebar';
$blogPageTitle = true;
$animateTitle = false;

if (class_exists('Redux')) {
    
    $sidebar = $option['archive_sidebar'];
    $blogPageTitle = $option['blog_page_header'];
    $animateTitle = $option['animate_title'];
};

?>

<main id="primary" class="site-main" data-barba="container">
    
    <?php if ( $blogPageTitle != false) { ?>
        

        <!-- Page Header -->
        <div class="page-header archive-header" <?php if ($animateTitle != false) { echo 'data-animate="true"'; } ?>>

            <div class="page-header-wrap wrapper-small">

                <!-- Page Title -->
                <div class="page-title">
                    
                    <?php if (! empty ($option['blog_page_title'])) { ?>
                     <h1 class="big-title"><?php echo esc_html($option['blog_page_title']); ?></h1>
                    <?php }  else { ?>
                    
                    <h1 class="big-title"><?php echo esc_html('Latest Posts' , 'alioth') ?></h1>
                    <?php } ?>
                </div>
                <!-- /Page Title -->

            </div>

        </div>
        <!-- /Page Header -->
    
    <?php } ?>

    <div class="section">

        <div class="wrapper">

            <?php if (($sidebar === 'left-sidebar') && (is_active_sidebar('blog-sidebar'))) { ?>

            <div class="c-col-3 sidebar-col sidebar-left">

                <?php get_sidebar(); ?>

            </div>

            <?php } ?>

            <?php if ($sidebar === 'no-sidebar') { ?>

            <div class="c-col-12 posts-col">
                
                <?php } else if (is_active_sidebar('blog-sidebar')) { ?>
                <div class="c-col-9 posts-col">
                    <?php } ?>

                    <?php if ( have_posts() ) : ?>

                    <div class="alioth-blog blog-archive">

                        <?php

			         if ( is_home() && ! is_front_page() ) : ?>
                        <header>
                            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                        </header>
                        <?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			alioth_posts_nav();


		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

                    </div>
                </div>

                <?php if (($sidebar === 'right-sidebar') && (is_active_sidebar('blog-sidebar'))) { ?>

                <div class="c-col-3 sidebar-col sidebar-right">

                    <?php get_sidebar(); ?>

                </div>

                <?php } ?>

            </div>

        </div>


</main><!-- #main -->

<?php

get_footer();
