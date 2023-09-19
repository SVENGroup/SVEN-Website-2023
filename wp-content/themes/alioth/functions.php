<?php
/**
 * Alioth functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Alioth
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
add_filter('wpcf7_autop_or_not', '__return_false');
if ( ! function_exists( 'alioth_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function alioth_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Alioth, use a find and replace
		 * to change 'alioth' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'alioth', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-menu' => esc_html__( 'Main Menu', 'alioth' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'alioth_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
        
        
        
	}
endif;
add_action( 'after_setup_theme', 'alioth_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function alioth_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'alioth_content_width', 640 );
}
add_action( 'after_setup_theme', 'alioth_content_width', 0 );


/**
 * Register Widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Scripts and Styles
 */
require get_template_directory() . '/inc/static.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * ACF Fields
 */
require get_template_directory() . '/inc/acf.php';

/**
 * Register Demos
 */
require get_template_directory() . '/inc/demo-import.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


/**
 * Woocommerce Support
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * TGM Plugin activation
 */
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/alioth-add-plugins.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


// CUSTOM JS
function ti_custom_javascript() {
?>
	<script>
		window.onload = function () {
			const texts = ['Too mainstream?', 'Too much?', 'Too complex?', 'Too noisy?', 'Too toxic?', 'Too fast?', 'Too overwhelming?'];
			const element = document.getElementById('dynamic-text');

			let i = 0;
			const listener = e => {
			i = i < texts.length - 1 ? i + 1 : 0;
				element.innerHTML = texts[i];
			};

			element.innerHTML = texts[0];
			element.addEventListener('animationiteration', listener, false);
		};
	</script>
<?php
}
add_action('wp_head', 'ti_custom_javascript');