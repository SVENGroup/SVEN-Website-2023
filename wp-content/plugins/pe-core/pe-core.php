<?php
/**
 * Plugin Name: Pe Core
 * Plugin URI: http://www.pethemes.com
 * Description: A core plugin for PeThemes's WordPress themes.
 * Version: 2.0
 * Author: PeThemes
 * Author URI: http://www.pethemes.com
 */


/**
 * Implement the Custom Header feature.
 */
require_once( 'portfolio/portfolio.php' );
require_once( 'customizer/customizer.php' );
require_once( 'redux/redux.php' );
require_once( 'redux/hooks.php' );
require_once( 'woocommerce/hooks.php' );

defined( 'ABSPATH' ) || exit;