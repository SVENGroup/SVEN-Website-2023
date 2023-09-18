<?php
/**
 * Plugin Name: Elementor Alioth Extension
 * Description: Elementor extension plugin for Alioth theme features.
 * Plugin URI:  http://pethemes.com
 * Version:     2.0
 * Author:      PetThemes
 * Author URI:  http://pethemes.com
 * Text Domain: alioth-elementor
 */
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * Main Elementor Alioth Class
 *
 * The init class that runs the Elementor Alioth Extension plugin.
 * Intended To make sure that the plugin's minimum requirements are met.
 *
 * You should only modify the constants to match your plugin's needs.
 *
 * Any custom code should go inside Plugin Class in the plugin.php file.
 * @since 1.0.0
 */
final class Elementor_Alioth {
 
  /**
   * Plugin Version
   *
   * @since 1.0.0
   * @var string The plugin version.
   */
  const VERSION = '2.0.0';
 
  /**
   * Minimum Elementor Version
   *
   * @since 1.0.0
   * @var string Minimum Elementor version required to run the plugin.
   */
  const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
 
  /**
   * Minimum PHP Version
   *
   * @since 1.0.0
   * @var string Minimum PHP version required to run the plugin.
   */
  const MINIMUM_PHP_VERSION = '7.0';
 
  /**
   * Constructor
   *
   * @since 1.0.0
   * @access public
   */
  public function __construct() {
 
    // Load translation
    add_action( 'init', array( $this, 'i18n' ) );
 
    // Init Plugin
    add_action( 'plugins_loaded', array( $this, 'init' ) );
  }
 
  /**
   * Load Textdomain
   *
   * Load plugin localization files.
   * Fired by `init` action hook.
   *
   * @since 1.2.0
   * @access public
   */
  public function i18n() {
    load_plugin_textdomain( 'alioth-elementor' );
  }
 
  /**
   * Initialize the plugin
   *
   * Validates that Elementor is already loaded.
   * Checks for basic plugin requirements, if one check fail don't continue,
   * if all check have passed include the plugin class.
   *
   * Fired by `plugins_loaded` action hook.
   *
   * @since 1.2.0
   * @access public
   */
  public function init() {
 
    // Check if Elementor installed and activated
    if ( ! did_action( 'elementor/loaded' ) ) {
      add_action( 'admin_notices', array( $this, 'admin_notice_missing_main_plugin' ) );
      return;
    }
 
    // Check for required Elementor version
    if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
      add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
      return;
    }
 
    // Check for required PHP version
    if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
      add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
      return;
    }
 
    // Once we get here, We have passed all validation checks so we can safely include our plugin
    require_once( 'plugin.php' );
      
      
  }
 
  /**
   * Admin notice
   *
   * Warning when the site doesn't have Elementor installed or activated.
   *
   * @since 1.0.0
   * @access public
   */
  public function admin_notice_missing_main_plugin() {
    if ( isset( $_GET['activate'] ) ) {
      unset( $_GET['activate'] );
    }
 
    $message = sprintf(
      /* translators: 1: Plugin name 2: Elementor */
      esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'alioth-elementor' ),
      '<strong>' . esc_html__( 'Elementor Alioth Extension', 'alioth-elementor' ) . '</strong>',
      '<strong>' . esc_html__( 'Elementor', 'alioth-elementor' ) . '</strong>'
    );
 
    printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
  }
 
  /**
   * Admin notice
   *
   * Warning when the site doesn't have a minimum required Elementor version.
   *
   * @since 1.0.0
   * @access public
   */
  public function admin_notice_minimum_elementor_version() {
    if ( isset( $_GET['activate'] ) ) {
      unset( $_GET['activate'] );
    }
 
    $message = sprintf(
      /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
      esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'alioth-elementor' ),
      '<strong>' . esc_html__( 'Elementor Alioth Extension', 'alioth-elementor' ) . '</strong>',
      '<strong>' . esc_html__( 'Elementor', 'alioth-elementor' ) . '</strong>',
      self::MINIMUM_ELEMENTOR_VERSION
    );
 
    printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
  }
 
  /**
   * Admin notice
   *
   * Warning when the site doesn't have a minimum required PHP version.
   *
   * @since 1.0.0
   * @access public
   */
  public function admin_notice_minimum_php_version() {
    if ( isset( $_GET['activate'] ) ) {
      unset( $_GET['activate'] );
    }
 
    $message = sprintf(
      /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
      esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'alioth-elementor' ),
      '<strong>' . esc_html__( 'Elementor Alioth Extension', 'alioth-elementor' ) . '</strong>',
      '<strong>' . esc_html__( 'PHP', 'alioth-elementor' ) . '</strong>',
      self::MINIMUM_PHP_VERSION
    );
 
    printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
  }
}

function elementor_add_cpt_support() {
    
    //if exists, assign to $cpt_support var
	$cpt_support = get_option( 'elementor_cpt_support' );
	
	//check if option DOESN'T exist in db
	if( ! $cpt_support ) {
	    $cpt_support = [ 'page', 'post', 'portfolio' ]; //create array of our default supported post types
	    update_option( 'elementor_cpt_support', $cpt_support ); //write it to the database
	}
	
	//if it DOES exist, but portfolio is NOT defined
	else if( ! in_array( 'portfolios', $cpt_support ) ) {
	    $cpt_support[] = 'portfolios'; //append to array
	    update_option( 'elementor_cpt_support', $cpt_support ); //update database
	}
	
	//otherwise do nothing, portfolio already exists in elementor_cpt_support option
}
add_action( 'after_switch_theme', 'elementor_add_cpt_support' );


add_action( 'elementor/element/section/section_layout/before_section_end', function( $element, $args ) {
	$element->start_injection( [
		'at' => 'before',
		'of' => 'layout',
	] );
	// add a control
	$element->add_control(
		'btn_style',
		[
			'label' => 'Wrapper Style',
			'type' => \Elementor\Controls_Manager::SELECT,
			'options' => [
				'wide' => 'Wide',
				'smaller' => 'Small',
				'fuller' => 'Full',
			],
            'default' => 'wide',
			'prefix_class' => 'wrapper-',
		]
	);

	$element->end_injection();
}, 10, 2 );


add_action( 'elementor/element/before_section_end', function( $element, $section_id, $args ) {

	if ( 'column' === $element->get_name() && 'layout' === $section_id ) {

        $element->add_control(
			'parallax',
			[
				'label' => __( 'Parallax Animation', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'alioth-elementor ' ),
				'label_off' => __( 'No', 'alioth-elementor ' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
      
        $element->add_control(
			'parallax_direction',
			[
				'label' => esc_html__( 'Parallax Direction', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'up',
				'options' => [
					'up' => esc_html__( 'Up', 'alioth-elementor' ),
					'down' => esc_html__( 'Down', 'alioth-elementor' ),
	
				],
                'condition' => ['parallax' => 'yes',],
			]
		);
      
        $element->add_control(
			'parallax_strength',
			[
				'label' => esc_html__( 'Parallax Strength', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0.01,
				'max' => 100,
				'step' => 0.01,
				'default' => 0.05,
                'condition' => ['parallax' => 'yes',],
			]
		);


	}

}, 10, 3 );

function add_attributes_to_elements( $element ) {

	if ( ! $element->get_settings( 'parallax' ) ) {
		return;
	}
    
    if ($element->get_settings( 'parallax' ) === 'yes') {
        
        	$element->add_render_attribute(
		'_wrapper',
		[
			'class' => 'has-parallax',
			'data-parallax-strength' => $element->get_settings( 'parallax_strength' ),
			'data-parallax-direction' => $element->get_settings( 'parallax_direction' ),
		]
	);
        
    }



}
add_action( 'elementor/frontend/column/before_render', 'add_attributes_to_elements' );

 
// Instantiate Elementor_Alioth.
new Elementor_Alioth();