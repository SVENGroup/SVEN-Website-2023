<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Alioth
 */

if ( ! function_exists( 'alioth_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function alioth_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'alioth' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo do_shortcode($posted_on) ; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;


if ( ! function_exists( 'alioth_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function alioth_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'alioth' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( '%1$s', 'alioth' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'alioth' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'alioth_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function alioth_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

function alioth_next_project() {
    
    $option = get_option('pe-redux');
    
        if (get_next_post()) {
            $next_post = get_next_post();
            $next_post_title = get_the_title($next_post);
            $next_post_url = get_the_permalink($next_post);
            $next_post_image = get_the_post_thumbnail_url($next_post);
             $provider = get_field('video_provider' , $next_post);
            $imageType = get_field('featured_image_type' , $next_post);
            $videoId = get_field('video_id' , $next_post);
            $videoUrl = get_field('upload_video' , $next_post);
            
        } else {
            
       	$next_post = new WP_Query('post_type=portfolio&posts_per_page=1&order=ASC'); $next_post->the_post();
            $next_post_title = get_the_title();
            $next_post_url = get_the_permalink();
            $next_post_image = get_the_post_thumbnail_url();
             $provider = get_field('video_provider');
            $imageType = get_field('featured_image_type');
            $videoId = get_field('video_id');
             $videoUrl = get_field('upload_video');
        }
            
            if (($next_post) && ($option['show_next_project'] != false)) { ?>

    <!-- Next Project Section-->
    <div class="next-project-section section no-margin">

        <!--Next Project URL --><a href="<?php echo esc_url($next_post_url) ?>">

            <!-- Next Project Image-->
            <div class="next-project-image">


                <?php
                
                if ( $imageType === 'video') {
                    
                    $featured_video = true;
                } else {
                    $featured_video = false;
                }
                
                if ($featured_video == true) { 
          
                 if ($provider === 'youtube') { ?>
                <!--Project Video-->
                <div class="next-project-video" data-plyr-provider="youtube" data-plyr-embed-id="<?php echo esc_attr($videoId) ?>"></div>
                <!--/Project Video-->
                <?php   }
                
                 if ($provider === 'vimeo') { ?>

                <!--Project Video-->
                <div class="next-project-video" data-plyr-provider="vimeo" data-plyr-embed-id="<?php echo esc_attr($videoId) ?>"></div>
                <!--/Project Video-->
                <?php } 
                    
                   if ($provider === 'self_hosted') { ?>

                <video class="next-project-video" src="<?php echo esc_attr( $videoUrl ); ?>" autoplay="true" loop="true" muted="muted" playsinline="true" controlslist="nodownload"></video>

                <?php } ?>

                <?php } else {  ?>


                <img src="<?php echo esc_url($next_post_image) ?>">

                <?php }  ?>

            </div>
            <!--/ Next Project Image-->

            <!-- Next Project Meta Wrapper-->
            <div class="wrapper-small no-nargin">

                <div class="c-col-12">

                    <div class="next-project-wrap">

                        <?php if ($option['next_project_text']) { ?>

                        <!-- Next Project Text-->
                        <span><?php echo esc_html($option['next_project_text']) ?></span>
                        <!--/ Next Project Text-->

                        <?php } else { ?>

                        <!-- Next Project Text-->
                        <span><?php echo esc_html('Next Project' , 'alioth') ?></span>
                        <!--/ Next Project Text-->

                        <?php } ?>

                        <!-- Next Project Title-->
                        <h1 class="next-project-title"><?php echo esc_html($next_post_title) ?></h1>
                        <!--/ Next Project Title-->

                    </div>

                </div>

            </div>
            <!--/ Next Project Meta Wrapper-->

        </a>

    </div>
    <!--/ Next Project Section-->

    <?php } 


    
    
}
