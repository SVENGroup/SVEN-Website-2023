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

$image_check = "";
$pageTransitions = false;
$barbaArgs = '';

if (class_exists('Redux')) {
    
$pageTransitions = $option['page_transitions_active'];
    
   if (get_field('header_style') === 'global') {
                    
   $header_style = $option['project_header'];
                    
    } else {
                    $header_style = get_field('header_style');
    }
    
    if ($pageTransitions) {
        
        $barbaNameSpace = '';
        
        if (get_field('featured_image_type') === 'video') {
        
         $barbaNameSpace = 'pph-video';
            
        } else {
            
         if ($header_style === 'style_1') {
             
            $barbaNameSpace = 'pph1';
             
        } elseif ($header_style === 'style_2') {
             
            $barbaNameSpace = 'pph2';
             
        } elseif ($header_style === 'style_3') {
             
            $barbaNameSpace = 'pph3';
        } 
            
        }
        
        $barbaArgs = 'data-barba=container' .' ' . 'data-barba-namespace=' . $barbaNameSpace;
        
    }
    
};

?>

<main id="primary" class="site-main" <?php echo esc_attr($barbaArgs) ?>>

    <?php
		while ( have_posts() ) :
    
            function is_first() {
            global $post;
            $loop = get_posts( 'numberposts=1&order=ASC' );
            $first = $loop[0]->ID; 
            return ( $post->ID == $first ) ? true : false;
            }
    
			the_post();
    ?>

    <!-- Single Project -->
    <div class="project-page">

        <?php if (($option['project_header'] !== 'no-header') || (get_field('header_style') !== 'no_header')) {
        
            $animate = get_field('animate_header');
              
        ?>

        <?php if ($header_style === 'style_1') { ?>


        <!-- Project Page Header -->
        <div data-animate="<?php echo esc_attr($animate); ?>" class="project-page-header style_1">

            <!-- Project Header Image -->
            <div class="project-featured-image">

                <?php if (get_field('featured_image_type') === 'video') { ?>

                <!--Video-->
                <div class="project-featured-video">

                    <?php if (get_field('video_provider') === 'vimeo') { ?>

                    <!--Video Attributes-->
                    <div class="pph-video" data-plyr-provider="vimeo" data-plyr-embed-id="<?php echo esc_attr(get_field('video_id')); ?>"></div>
                    <!--/Video Attributes-->

                    <?php } elseif (get_field('video_provider') === 'youtube') { ?>

                    <!--Video Attributes-->
                    <div class="pph-video" data-plyr-provider="youtube" data-plyr-embed-id="<?php echo esc_attr(get_field('video_id')); ?>"></div>
                    <!--/Video Attributes-->

                    <?php } elseif (get_field('video_provider') === 'self_hosted') { ?>

                    <video class="alioth-project-video" src="<?php echo esc_attr(get_field('upload_video')); ?>" autoplay="" loop="" muted="muted" playsinline="" controlslist="nodownload"></video>

                    <?php } ?>


                </div>
                <!--/Video-->

                <?php } else { ?>

                <img src="<?php echo get_the_post_thumbnail_url(); ?>">

                <?php } ?>

            </div>
            <!-- /Project Header Image -->

            <!-- Project Details -->
            <div class="project-details">

                <!-- Project Title & Cat -->
                <div class="project-title">

                    <!-- Project Title -->
                    <h1 class="big-title"><?php echo get_the_title(); ?></h1>
                    <!-- Project Title -->

                </div>
                <!-- /Project Title & Cat -->

                <!-- Project Metas -->
                <div class="project-metas">

                    <!-- Project Meta -->
                    <div class="project-meta project-cats">

                        <!-- Project Cats-->
                        <div class="project-cat"><?php 
                        $terms = get_the_terms( $post->ID, 'project-categories' ); 
                        if ($terms) {
                            
                        foreach($terms as $term) {
                            echo '<span>' . esc_html($term->name) . '</span>';
                        }
                        } ?>
                        </div>
                        <!-- /Project Cats-->

                    </div>
                    <!-- /Project Meta -->

                    <!-- Project Meta -->
                    <div class="project-meta meta-summary">

                        <!-- Meta Content-->
                        <h5><?php the_field('summary'); ?></h5>
                        <!-- /Meta Content-->

                    </div>
                    <!-- /Project Meta -->

                    <!-- Project Meta -->
                    <div class="project-meta project-other">

                        <h5>
                            <div><?php the_field('client') ?></div>
                            <div><?php the_field('year'); ?></div>
                        </h5>

                    </div>
                    <!-- /Project Meta -->

                </div>
                <!-- /Project Metas -->

            </div>
            <!-- Project Details -->

        </div>
        <!-- /Project Page Header -->

        <?php } elseif ($header_style === 'style_2') { ?>

        <!-- Project Page Header -->
        <div data-animate="<?php echo esc_attr($animate); ?>" class="project-page-header style_2">

            <!-- Project Header Image -->
            <div class="project-featured-image">

                <?php if (get_field('featured_image_type') === 'video') { ?>

                <!--Video-->
                <div class="project-featured-video">

                    <?php if (get_field('video_provider') === 'vimeo') { ?>

                    <!--Video Attributes-->
                    <div class="pph-video" data-plyr-provider="vimeo" data-plyr-embed-id="<?php echo esc_attr(get_field('video_id')); ?>"></div>
                    <!--/Video Attributes-->

                    <?php } elseif (get_field('video_provider') === 'youtube') { ?>

                    <!--Video Attributes-->
                    <div class="pph-video" data-plyr-provider="youtube" data-plyr-embed-id="<?php echo esc_attr(get_field('video_id')); ?>"></div>
                    <!--/Video Attributes-->

                    <?php } elseif (get_field('video_provider') === 'self_hosted') { ?>

                    <video class="alioth-project-video" src="<?php echo esc_attr(get_field('upload_video')); ?>" autoplay="true" loop="true" muted="muted" playsinline="true" controlslist="nodownload"></video>

                    <?php } ?>

                </div>
                <!--/Video-->

                <?php } else { ?>

                <img src="<?php echo get_the_post_thumbnail_url(); ?>">

                <?php } ?>

            </div>
            <!-- /Project Header Image -->

            <!-- Project Head -->
            <div class="project-head">

                <!-- Project Title -->
                <div class="project-title">
                    <h1 class="big-title"><?php echo get_the_title(); ?></h1>
                </div>
                <!-- /Project Title -->

                <!-- Project Category -->
                <div class="project-cat"><?php 
                        $terms = get_the_terms( $post->ID, 'project-categories' ); 
                        if ($terms) {
                            
                        foreach($terms as $term) {
                            echo '<span>' . esc_html($term->name) . '</span>';
                        }
                        } ?>
                </div>
                <!-- /Project Category -->

            </div>
            <!-- /Project Head -->

            <!-- Project Details -->
            <div class="project-details">

                <!-- Project Metas -->
                <div class="project-metas">

                    <!-- Project Meta -->
                    <div class="project-meta project-other">

                        <h5>
                            <div><?php the_field('client') ?></div>
                            <div><?php the_field('year'); ?></div>
                        </h5>

                    </div>
                    <!-- /Project Meta -->

                    <!-- Project Meta -->
                    <div class="project-meta meta-summary">

                        <!-- Meta Content-->
                        <h5><?php the_field('summary'); ?></h5>
                        <!-- /Meta Content-->

                    </div>
                    <!-- /Project Meta -->

                </div>
                <!-- /Project Metas -->

            </div>
            <!-- /Project Details -->

        </div>
        <!-- /Project Page Header -->


        <?php } elseif ($header_style === 'style_3') { ?>

        <!-- Project Page Header -->
        <div data-animate="<?php echo esc_attr($animate); ?>" class="project-page-header style_3">

            <!-- Project Page Head -->
            <div class="project-head" style="background-color:<?php the_field('background_color'); ?>">

                <!-- Project Title & Category -->
                <div class="project-title">

                    <!-- Project Title -->
                    <h1 class="big-title"><?php echo get_the_title(); ?></h1>
                    <!-- /Project Title -->

                    <!-- Project Category -->
                    <div class="project-cat"><?php 
                        $terms = get_the_terms( $post->ID, 'project-categories' ); 
                        if ($terms) {
                            
                        foreach($terms as $term) {
                            echo '<span>' . esc_html($term->name) . '</span>';
                        }
                        } ?></div>
                    <!-- /Project Category -->

                </div>
                <!-- /Project Title & Category -->
            </div>
            <!-- /Project Page Head -->

            <!-- Project Details -->
            <div class="project-details">

                <!-- Project Metas -->
                <div class="project-metas">

                    <!-- Project Meta -->
                    <div class="project-meta project-other">

                        <h5> <span><?php the_field('client') ?></span>
                            <span><?php the_field('year'); ?></span>
                        </h5>

                    </div>
                    <!-- /Project Meta -->

                    <!-- Project Meta -->
                    <div class="project-meta meta-summary">

                        <!-- Meta Content-->
                        <h5><?php the_field('summary'); ?></h5>
                        <!-- /Meta Content-->

                    </div>
                    <!-- /Project Meta -->

                </div>
                <!-- /Project Metas -->

            </div>
            <!-- /Project Details -->

        </div>
        <!-- /Project Page Header -->
        <?php } ?>
        <?php } ?>


        <!-- Page Content -->
        <div id="content" class="page-content">

            <?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'alioth' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) ); ?>


        </div>

    </div>
    <!--/ Single Project -->

    <?php  alioth_next_project() ?>

    <?php
		endwhile; // End of the loop.
		?>
</main><!-- #main -->
<?php get_footer(); ?>
