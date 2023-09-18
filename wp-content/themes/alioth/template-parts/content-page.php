<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Alioth
 */



$option = get_option('pe-redux');
$animatetitle = false;
$pageHeader = true;
$pageTitle = '';

if (class_exists('Redux')) {
    
    if (get_field('page_header') === 'show') {
        
        $pageHeader = true;
        
    } else if (get_field('page_header') === 'global') {
        
        $pageHeader = $option['show_page_header'];
        
    } else if (get_field('page_header') === 'hide') {
        
        $pageHeader = false;
        
    } 
    
    
    if (get_field('animate_title') === 'global') {
        
        $animatetitle = $option['animate_page_title'];
        
    } else {
       $animatetitle = get_field('animate_title');
    }
    
    
    $pageTitle = get_field('page_title');
    
};

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ($pageHeader) { ?>

    <!-- Page Header -->
    <div data-anim="<?php echo esc_attr($animatetitle); ?>" class="page-header">

        <div class="page-header-wrap wrapper-small">

            <?php if ($pageTitle) { ?>

            <!-- Page Title -->
            <div class="page-title">
                <h1 class="entry-title big-title"><?php echo esc_html(the_field('page_title')); ?></h1>
            </div>
            <!-- /Page Title -->

            <?php } else { ?>

            <!-- Page Title -->
            <div class="page-title">
                <?php the_title( '<h1 class="entry-title big-title">', '</h1>' ); ?>
            </div>
            <!-- /Page Title -->

            <?php } ?>

        </div>

    </div>
    <!-- /Page Header -->

    <?php  } ?>

    <?php if(! is_built_with_elementor()): ?>

    <div class="section">

        <div class="wrapper">

            <div class="c-col-12">

                <?php endif; ?>

                <div class="entry-content">
                    <?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'alioth' ),
				'after'  => '</div>',
			)
		);
		?>
                </div><!-- .entry-content -->

                <?php if ( get_edit_post_link() ) : ?>
                <footer class="entry-footer">
                    <?php
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
			?>
                </footer><!-- .entry-footer -->
                <?php endif; ?>


                <?php if(! is_built_with_elementor()): ?>

            </div>
        </div>
    </div>

    <?php endif; ?>



</article><!-- #post-<?php the_ID(); ?> -->
