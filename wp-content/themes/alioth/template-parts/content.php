<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Alioth
 */

$option = get_option('pe-redux');

$sidebar = 'right-sidebar';
$postDate = true;
$postCat = true;
$postExcerpt = true;
$singlePostDate = true;
$singlePostCat = true;
$singlePostNav = true;
$postThumb = true;
$singlePostThumb = true;

if (class_exists('Redux')) {
    
    $sidebar = $option['single_post_sidebar'];
    $postDate = $option['show_post_date'];
    $postCat = $option['show_post_cat'];
    $postExcerpt = $option['show_post_excerpt'];
    $singlePostDate = $option['single-post-date'];
    $singlePostCat = $option['single-post-cat'];
    $singlePostNav = $option['single-post-nav'];
    $postThumb = $option['show_post_thumbnail'];
    $singlePostThumb = $option['single-post-thumbnail'];

};


if ((has_post_thumbnail()) && ($singlePostThumb != false)) :
    $check_post_thumb = 'alioth-post has_thumb';
 else :
     $check_post_thumb = 'alioth-post no_thumb';
endif;

$classes = [];

$classes[] = $check_post_thumb;
$classes[] = $sidebar;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>

    <?php /* If Single Post */if (is_singular()) : ?>


    <?php if ((has_post_thumbnail()) && ($singlePostThumb != false)) : ?>

    <!-- Post Header -->
    <div class="post-header">


        <!-- Post Image -->
        <div class="post-image">

            <?php alioth_post_thumbnail(); ?>

        </div>
        <!--/ Post Image -->

        <!-- Post Details Wrapper -->

        <?php if ($sidebar === 'no-sidebar') { ?>
        <div class="post-details-wrapper wrapper-small">
            <?php } else { ?>
            <div class="post-details-wrapper wrapper">
                <?php } ?>



                <!-- Column -->
                <div class="c-col-12">

                    <!-- Post Metas -->
                    <div class="post-metas">

                        <?php if ($singlePostDate != false) { ?>

                        <!-- Post Date -->
                        <div class="post-date"><?php alioth_posted_on(); ?></div>
                        <!--/ Post Date -->

                        <?php } ?>


                        <?php if ($singlePostCat != false) { ?>
                        <!-- Post Category -->
                        <div class="post-category"><?php echo get_the_category_list( esc_html__( ', ', 'alioth' ) ); ?></div>
                        <!--/ Post Category -->
                        <?php } ?>

                    </div>
                    <!--/ Post Metas -->

                    <!-- Post Title -->
                    <div class="post-title">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

                    </div>
                    <!--/ Post Title -->

                </div>
                <!--/ Column -->

            </div>
            <!--/ Post Details Wrapper -->

        </div>
        <!--/ Post Header -->


        <?php else: ?>


        <!-- Post Header -->
        <div class="post-header no-thumb">
            <!-- Post Details Wrapper -->



            <?php if ($sidebar === 'no-sidebar') { ?>
            <div class="post-details-wrapper wrapper-small">
                <?php } else { ?>
                <div class="post-details-wrapper wrapper">
                    <?php } ?>


                    <!-- Column -->
                    <div class="c-col-12 no-gap">

                        <!-- Post Metas -->
                        <div class="post-metas">

                            <?php if ($singlePostDate  != false) { ?>
                            <!-- Post Date -->
                            <div class="post-date"><?php alioth_posted_on(); ?></div>
                            <!--/ Post Date -->
                            <?php } ?>

                            <?php if ($singlePostCat != false) { ?>
                            <!-- Post Category -->
                            <div class="post-category"><?php echo get_the_category_list( esc_html__( ', ', 'alioth' ) ); ?></div>
                            <!--/ Post Category -->
                            <?php } ?>

                        </div>
                        <!--/ Post Metas -->

                        <!-- Post Title -->
                        <div class="post-title">
                            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

                        </div>
                        <!--/ Post Title -->

                    </div>
                    <!--/ Column -->

                </div>
                <!--/ Post Details Wrapper -->

            </div>
            <!--/ Post Header -->



            <?php endif; ?>


            <?php if ($sidebar === 'no-sidebar') { ?>
            <div class="wrapper-small">
                <?php } else { ?>
                <div class="wrapper">
                    <?php } ?>

                    <?php if (($sidebar === 'left-sidebar') && (is_active_sidebar('blog-sidebar'))) { ?>

                    <div class="c-col-3 sidebar-col sidebar-left no-gap">
                        <?php get_sidebar(); ?>

                    </div>

                    <?php } ?>

                    <?php if ($sidebar === 'no-sidebar') { ?>
                    <div class="c-col-12 no-gap entry-col">
                        <?php } else if (is_active_sidebar('blog-sidebar')) { ?>
                        <div class="c-col-9 entry-col">

                            <?php } ?>

                            <div class="entry-content">
                                <?php
		                              the_content(
			                             sprintf(
				                                wp_kses(
					                               /* translators: %s: Name of current post. Only visible to screen readers */
					                               __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'alioth' ),
					                               array(
						                              'span' => array(
							                             'class' => array(),
						                              ),
					                               )
				                                ),
				                                wp_kses_post( get_the_title() )
			                             )
		                              );

		                              wp_link_pages(
			                             array(
				                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'alioth' ),
				                                'after'  => '</div>',
			                             )
		                              );
		                              ?>
                            </div><!-- .entry-content -->

                            <div class="post-tags"><?php the_tags(); ?></div>

                            <?php
                
                if (($singlePostNav != false) && (get_next_post())) {
                    
                    if (! empty ($option['next-post-text'])) {
                        
                        $nextText = '<h5 class="nav-subtitle">' . esc_html__( $option['next-post-text'], 'alioth' ) . '</h5> <h3 class="nav-title">%title</h3>';
                        
                    } else {
                        
                        $nextText = '<h5 class="nav-subtitle">' . esc_html__( 'Next Post:', 'alioth' ) . '</h5> <h2 class="nav-title">%title</h2>';
                    }
                
			         the_post_navigation(
				            array(
					           'next_text' => $nextText
				            )
			         ); 
                    } else if (($singlePostNav != false) && (! get_next_post())) {
                    
                    
                   $args = array(
                    'posts_per_page'   => -1,
                    'post_type'        => 'post',
                    'order' => 'DESC'
                    );
                        $the_query = new WP_Query( $args );
                    

                       $first_post = $the_query->posts[0];
                    
                        if (! empty ($option['next-post-text'])) {
                        
                        $nextText = '<h5 class="nav-subtitle">' . esc_html__( $option['next-post-text'], 'alioth' ) . '</h5> <h3 class="nav-title">%title</h3>';
                        
                    } else {
                        
                        $nextText = '<h5 class="nav-subtitle">' . esc_html__( 'Next Post:', 'alioth' ) . '</h5> <h2 class="nav-title">%title</h2>';
                    }
                    ?>

                            <nav class="navigation post-navigation" aria-label="Posts">
                                <div class="nav-links">
                                    <div class="nav-next"><a href="<?php  echo get_the_permalink($first_post); ?>" rel="next">
                                            <h5 class="nav-subtitle">Next Post:</h5>
                                            <h2 class="nav-title"><?php echo esc_html($first_post->post_title); ?></h2>
                                        </a></div>
                                </div>
                            </nav>

                            <?php
                }


			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;


		?>
                        </div>

                        <?php if (($sidebar === 'right-sidebar') && (is_active_sidebar('blog-sidebar'))) { ?>
                        <div class="c-col-3 sidebar-col no-gap sidebar-right">
                            <?php get_sidebar(); ?>

                        </div>


                        <?php } ?>


                    </div>


                    <?php /* Else Single Post */else : ?>



                    <!--Blog Post Meta-->
                    <div class="post-meta">

                        <?php if ((has_post_thumbnail()) && ($postThumb != false)) { ?>

                        <!--Blog Post Image-->
                        <div class="post-image">
                            <?php alioth_post_thumbnail(); ?>
                        </div>
                        <!--/Blog Post Image-->

                        <?php } ?>

                        <?php if ($postDate != false) { ?>
                        <!--Blog Post Date-->
                        <h5 class="post-date"><?php alioth_posted_on(); ?></h5>
                        <!--/Blog Post Date-->
                        <?php } ?>

                        <?php if ($postCat != false) { ?>
                        <!--Blog Post Category-->
                        <h5 class="post-cat"><?php echo get_the_category_list( esc_html__( ', ', 'alioth' ) ); ?></h5>
                        <!--Blog Post Category-->
                        <?php } ?>

                        <!--Blog Post Title-->
                        <a href="<?php echo get_the_permalink(); ?>">

                            <div class="post-title">
                                <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
                            </div>
                            <!--/Blog Post Title-->
                        </a>

                        <?php if ($postExcerpt != false) { ?>
                        <!--Blog Post Excerpt -->
                        <div class="post-summary">

                            <?php the_excerpt(); ?>

                        </div>
                        <!--Blog Post Excerpt -->

                        <?php } ?>

                        <div class="post-read">

                            <a class="hov-underline" href="<?php echo get_the_permalink(); ?>">
                                <?php if (! empty($option['read_more_text'])) {
                        echo esc_html($option['read_more_text']);
                             } else {
    
                    echo esc_html('Read More' , 'alioth');
    
                            } ?>

                            </a>

                        </div>

                    </div>
                    <!--/Blog Post Meta-->

</article><!-- #post-<?php the_ID(); ?> -->
<?php /* If Condition End */endif; ?>
