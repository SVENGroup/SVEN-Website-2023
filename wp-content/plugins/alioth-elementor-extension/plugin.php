<?php
namespace ElementorAlioth;
 
/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.0.0
 */
class Plugin {
 
  /**
   * Instance
   *
   * @since 1.0.0
   * @access private
   * @static
   *
   * @var Plugin The single instance of the class.
   */
  private static $_instance = null;
 
  /**
   * Instance
   *
   * Ensures only one instance of the class is loaded or can be loaded.
   *
   * @since 1.2.0
   * @access public
   *
   * @return Plugin An instance of the class.
   */
  public static function instance() {
    if ( is_null( self::$_instance ) ) {
      self::$_instance = new self();
    }
           
    return self::$_instance;
  }
 
  /**
   * widget_scripts
   *
   * Load required plugin core files.
   *
   * @since 1.2.0
   * @access public
   */
  public function widget_scripts() {
    wp_register_script( 'elementor-alioth', plugins_url( '/assets/js/file.js', __FILE__ ), [ 'jquery' ], false, true );
  }
    
    
    
  /**
   * widget_styles
   *
   * Load required plugin core files.
   *
   * @since 1.2.0
   * @access public+
   */
  public function widget_styles() {
      
   wp_register_style( 'styles', plugins_url( 'assets/css/styles.css', __FILE__ ) );
      
    wp_enqueue_style('styles');
      
  }
    	/**
	 * Register Custom Widget Categories
	 *
	 * @return void
	 */
	public function add_elementor_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'alioth-showcase',
			[
				'title' => esc_html__( 'Alioth Showcase Layouts', 'alioth' ),
				'icon'  => 'eicon-plug',
			]
		);

		$elements_manager->add_category(
			'alioth-content',
			[
				'title' => esc_html__( 'Alioth Content Elements', 'alioth-elementor' ),
				'icon'  => 'eicon-sitemap',
			]
		);

	}
    
 
  /**
   * Include Widgets files
   *
   * Load widgets files
   *
   * @since 1.2.0
   * @access private
   */
  private function include_widgets_files() {
    require_once( __DIR__ . '/widgets/fullscreen-slider.php' );
    require_once( __DIR__ . '/widgets/fullscreen-slideshow.php' );
    require_once( __DIR__ . '/widgets/fullscreen-wall.php' );
    require_once( __DIR__ . '/widgets/showcase-slideshow.php' );
    require_once( __DIR__ . '/widgets/showcase-carousel.php' );
    require_once( __DIR__ . '/widgets/showcase-list.php' );
    require_once( __DIR__ . '/widgets/showcase-wall.php' );
    require_once( __DIR__ . '/widgets/showcase-grid.php' );
    require_once( __DIR__ . '/widgets/image.php' );
    require_once( __DIR__ . '/widgets/text-wrapper.php' );
    require_once( __DIR__ . '/widgets/single-project.php' );
    require_once( __DIR__ . '/widgets/page-nav.php' );
    require_once( __DIR__ . '/widgets/number-counter.php' );
    require_once( __DIR__ . '/widgets/embed-video.php' );
    require_once( __DIR__ . '/widgets/image-carousel.php' );
    require_once( __DIR__ . '/widgets/seperator.php' );
    require_once( __DIR__ . '/widgets/linked-text.php' );
    require_once( __DIR__ . '/widgets/image-box.php' );
    require_once( __DIR__ . '/widgets/services.php' );
    require_once( __DIR__ . '/widgets/testimonials.php' );
    require_once( __DIR__ . '/widgets/clients.php' );
    require_once( __DIR__ . '/widgets/awards.php' );
    require_once( __DIR__ . '/widgets/projects-carousel.php' );
    require_once( __DIR__ . '/widgets/heading.php' );
    require_once( __DIR__ . '/widgets/scrollable-text.php' );
    require_once( __DIR__ . '/widgets/personal-head.php' );
    require_once( __DIR__ . '/widgets/button.php' );
    require_once( __DIR__ . '/widgets/blog.php' );
    require_once( __DIR__ . '/widgets/products-carousel.php' );
    require_once( __DIR__ . '/widgets/product-categories.php' );
    require_once( __DIR__ . '/widgets/single-product.php' );
    require_once( __DIR__ . '/widgets/team-member.php' );
    require_once( __DIR__ . '/widgets/list.php' );

  }
 
  /**
   * Register Widgets
   *
   * Register new Elementor widgets.
   *
   * @since 1.2.0
   * @access public
   */
  public function register_widgets() {
    // Its is now safe to include Widgets files
    $this->include_widgets_files();
 
    // Register Widgets
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\FullscreenSlider() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\FullscreenSlideshow() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\FullscreenWall() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\ShowcaseSlideshow() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\ShowcaseCarousel() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\ShowcaseList() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\ShowcaseWall() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\ShowcaseGrid() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\AliothSingleImage() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\AliothTextWrapper() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\AliothSingleProject() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\AliothPageNav() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\AliothNumberCounter() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\AliothEmbedVideo() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\AliothImageCarousel() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\AliothSeperator() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\AliothLinkedText() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\AliothServices() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\AliothTestimonials() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\AliothClients() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\AliothAwards() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\AliothProjectsCarousel() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\AliothHeading() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\AliothScrollableText() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\AliothPersonalHead() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\AliothButton() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\AliothBlog() );
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\AliothProductsCarousel());
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\AliothProductCategories());
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\AliothSingleProduct());
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\AliothImageBox());
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\AliothTeamMember());
    \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\AliothList());
  }
 
  /**
   *  Plugin class constructor
   *
   * Register plugin action hooks and filters
   *
   * @since 1.2.0
   * @access public
   */
  public function __construct() {
 
    // Register widget scripts
    add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );
      
      // Register widget styles
    add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );
 
    // Register widgets
    add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
      
       // Register widget categories
     add_action( 'elementor/elements/categories_registered', [ $this, 'add_elementor_widget_categories' ] );
      
  }
    
    
}
 
// Instantiate Plugin Class
Plugin::instance();
