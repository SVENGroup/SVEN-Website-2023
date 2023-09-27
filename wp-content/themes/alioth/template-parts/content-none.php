<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Alioth
 */

?>


<section class="no-results not-found">
    
    
        <!-- Page Header -->
    <div class="page-header">

        <div class="page-header-wrap wrapper-small">

            <!-- Page Title -->
            <div class="page-title">


                <h1><?php esc_html_e( 'Nothing Found', 'alioth' ); ?></h1>

            </div>
            <!-- /Page Title -->

        </div>

    </div>
    <!-- /Page Header -->
    
    <div class="section">
    
        <div class="wrapper">
        
            <div class="c-col-12">
            
                
	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'alioth' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'alioth' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'alioth' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
            
            </div>
        
        </div>
    
    
    </div>

</section><!-- .no-results -->
