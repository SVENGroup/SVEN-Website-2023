<?php
/**
 * The template for displaying archive pages
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

    <?php if ( have_posts() ) : ?>

    <?php if ( $blogPageTitle != false) { ?>


    <!-- Page Header -->
    <div class="page-header archive-header" <?php if ($animateTitle != false) { echo 'data-animate="true"'; } ?>>

        <div class="page-header-wrap wrapper-small">

            <!-- Page Title -->
            <div class="page-title">


                <h1><?php the_archive_title(); ?></h1>

            </div>
            <!-- /Page Title -->

        </div>

    </div>
    <!-- /Page Header -->

    <?php } ?>

    <div class="section">

        <div class="wrapper">

            <?php if ($sidebar === 'left-sidebar') { ?>

            <div class="c-col-3 sidebar-col sidebar-left">

                <?php get_sidebar(); ?>

            </div>

            <?php } ?>

            <?php if ($sidebar === 'no-sidebar') { ?>

            <div class="c-col-12 posts-col">

                <?php } else { ?>

                <div class="c-col-9 posts-col">
                    <?php } ?>

                    <div class="alioth-blog blog-archive">


                        <?php
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

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
                    </div>
                </div>

                <?php if ($sidebar === 'right-sidebar') { ?>

                <div class="c-col-3 sidebar-col sidebar-right">

                    <?php get_sidebar(); ?>

                </div>

                <?php } ?>

            </div>


        </div>


</main><!-- #main -->

<?php
get_footer();
