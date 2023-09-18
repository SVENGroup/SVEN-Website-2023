<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Alioth
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">

            <!--404 Not Found Wrapper-->
            <div class="not-found-wrap">

                <div class="not-found-header">
                    <h1><?php esc_html_e( '404.', 'alioth' ); ?></h1>
                    <h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'alioth' ); ?></h1>

                </div>

                <div class="not-found-text">
                   <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'alioth' ); ?>
                </div>

                <div class="not-found-search">

        
			<?php
					get_search_form(); ?>
                </div>


            </div>
            <!--/404 Not Found Wrapper-->


		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
