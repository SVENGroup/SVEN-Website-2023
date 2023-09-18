<?php
/**
 * Template part for displaying results in search pages
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

if (class_exists('Redux')) {
    
    $sidebar = $option['single_post_sidebar'];
    $postDate = $option['show_post_date'];
    $postCat = $option['show_post_cat'];
    $postExcerpt = $option['show_post_excerpt'];
    $singlePostDate = $option['single-post-date'];
    $singlePostCat = $option['single-post-cat'];
    $singlePostNav = $option['single-post-nav'];
    $postThumb = $option['show_post_thumbnail'];

};


if ((has_post_thumbnail()) && ($postThumb != false)) :
    $check_post_thumb = 'post alioth-post has_thumb';
 else :
     $check_post_thumb = 'post alioth-post no_thumb';
endif;

$classes = [];

$classes[] = $check_post_thumb;
$classes[] = $sidebar;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
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

            <?php if (($postCat != false) && (has_category())) { ?>
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
