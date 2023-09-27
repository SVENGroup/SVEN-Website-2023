<?php 



/*
Register Google Fonts
*/

function alioth_fonts_url() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'alioth' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Inter:wght@400;500;600;700&display=swap' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}



/**
 * Enqueue scripts and styles.
 */
function alioth_scripts() {
    
    wp_enqueue_style( 'icofont' , get_template_directory_uri() . '/css/icofont.min.css');
    
    wp_enqueue_style( 'plyr' , get_template_directory_uri() . '/css/plyr.css');
    
    wp_enqueue_style( 'swiper' , get_template_directory_uri() . '/css/swiper.css');
    
    wp_enqueue_style( 'e-gallery' , get_template_directory_uri() . '/css/e-gallery.min.css');
    
    wp_enqueue_style( 'magnific-popup' , get_template_directory_uri() . '/css/magnific-popup.min.css');
    
	wp_enqueue_style( 'alioth-style', get_stylesheet_uri(), array() );
    
	wp_style_add_data( 'alioth-style', 'rtl', 'replace' );
    
    wp_enqueue_script( 'marquee', get_template_directory_uri() . '/js/marquee.min.js', array('jquery'),  true );
      
    wp_enqueue_script( 'scroll-trigger', get_template_directory_uri() . '/js/ScrollTrigger.js', array('jquery'),  true );


    
    wp_enqueue_script( 'css-rule', get_template_directory_uri() . '/js/CSSRulePlugin.js', array('jquery'),  true );

    wp_enqueue_script( 'split-text', get_template_directory_uri() . '/js/SplitText.js', array('jquery'),  true );

    wp_enqueue_script( 'draggable', get_template_directory_uri() . '/js/Draggable.js', array('jquery'),  true );
    
    wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array('jquery'),  true );
    
    wp_enqueue_script( 'inertia', get_template_directory_uri() . '/js/InertiaPlugin.js', array('jquery'),  true );
    
    wp_enqueue_script( 'scrollto', get_template_directory_uri() . '/js/ScrollToPlugin.js', array('jquery'),  true );

    wp_enqueue_script( 'custom-ease', get_template_directory_uri() . '/js/CustomEase.js', array('jquery'),  true );
    
            wp_enqueue_script( 'scroll-smoother', get_template_directory_uri() . '/js/ScrollSmoother.js', array('jquery'),  true );
    
    wp_enqueue_script( 'gsap', get_template_directory_uri() . '/js/gsap.js', array('jquery'),  true );
    
    wp_enqueue_script( 'barba', get_template_directory_uri() . '/js/barba.js', array('jquery'),  true );

    wp_enqueue_script('masonry');

     wp_enqueue_script( 'swiper-bundle', get_template_directory_uri() . '/js/swiper-bundle.min.js', array('jquery'),  true );
    
     wp_enqueue_script( 'e-gallery', get_template_directory_uri() . '/js/e-gallery.min.js', array('jquery'),  true );
    
     wp_enqueue_script( 'plyr', get_template_directory_uri() . '/js/plyr.js', array('jquery'),  true );
    
    wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'),  true );
    
    wp_enqueue_script( 'locomotive-scroll', get_template_directory_uri() . '/js/locomotive-scroll.min.js', array('jquery'),  true );

    
	wp_enqueue_script( 'alioth-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'),  true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'alioth_scripts', 99  );



?>
