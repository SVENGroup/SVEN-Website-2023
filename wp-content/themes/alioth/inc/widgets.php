<?php

/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function alioth_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'alioth' ),
			'id'            => 'blog-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'alioth' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<span class="widget-title">',
			'after_title'   => '</span>',
		)
	);
    
        register_sidebar(
		array(
			'name'          => esc_html__( 'Shop Sidebar', 'alioth' ),
			'id'            => 'shop-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'alioth' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="caption">',
			'after_title'   => '</div>',
		)
	);
  
    
    register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Left Widget', 'alioth' ),
			'id'            => 'footer-widget-left',
			'description'   => esc_html__( 'Add widgets here.', 'alioth' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="caption">',
			'after_title'   => '</div>',
		)
	);
    
    register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Right Widget', 'alioth' ),
			'id'            => 'footer-widget-right',
			'description'   => esc_html__( 'Add widgets here.', 'alioth' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="caption">',
			'after_title'   => '</div>',
		)
	);
   
    
    
    

}
add_action( 'widgets_init', 'alioth_widgets_init' );
