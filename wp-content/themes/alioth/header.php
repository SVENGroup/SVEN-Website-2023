<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Alioth
 */

$option = get_option('pe-redux');
$elementor_check = '';
$headerStick = '';
$stickyAnimate = '';
$headerHeight = '';
$stickyHeaderHeight = '';
$menuStyle = 'classic';
$headerLayout = 'dark';
$menuLayout = 'menu_light';
$mouseCursor = false;
$pageTransitions = false;
$darkCircle = 'rgba(25,27,29,.6)';
$darkDot = '#191b1d';
$lightCircle = 'hsla(0,0%,100%,.2)';
$lightDot = '#fff';
$pageLoader = false;
$shoppingCart = 'hide';
$smoothScroll = 'false';
$dataFirstColor = 'rgba(25, 27, 29, .6)';
$dataSecondColor = '#191b1d';


if (class_exists('Redux')) {
    
    $headerHeight = $option['header_height']['height'];
    $stickyHeaderHeight = $option['sticky_header_height']['height'];
    $headerStick = $option['sticky_header'];
    $menuStyle = $option['menu_style'];
    $headerLayout = $option['header_layout'];
    $menuLayout = 'menu_' . $option['menu_layout'];
    $mouseCursor = $option['cursor_active'];
    $pageTransitions = $option['page_transitions_active'];
    $pageLoader = $option['page_loader_active'];
    $shoppingCart = $option['shopping_cart'];
    $smoothScroll = $option['smooth_scroll_active'];
    

    if ($option['sticky_animate'] == false) {
        
        $stickyAnimate = 'always_sticky';  
    }
    
    if ($mouseCursor) {
        
     $darkCircle = $option['circle_dark_color'];
    $darkDot = $option['dot_dark_color'];
    $lightCircle = $option['circle_light_color'];
    $lightDot = $option['dot_light_color'];
        
    }

    
    $classicHovers = '';
   
    if ($headerLayout === 'light') {
        $dataFirstColor =  $option['classic_menu_light_item_color'];
$dataSecondColor =  $option['classic_menu_light_item_hover_color'];
        
    } else {
          $dataFirstColor =  $option['classic_menu_dark_item_color'];
$dataSecondColor =  $option['classic_menu_dark_item_hover_color'];
        
    }
    
    if ($menuStyle === 'classic') {

              $classicHovers = 'data-first-color="' .  $dataFirstColor . '" data-second-color="' . $dataSecondColor . '"';
  
    }
    
    };

       if ( ! is_built_with_elementor()) {
        $elementor_check = 'non-elementor';
    
        } else {
            $elementor_check = 'elementor-active';
        }
     
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); if ($pageTransitions) { echo esc_attr('data-barba=wrapper'); } ?>>

    <?php if ($smoothScroll) { 
        
    if ($option['smooth_touch']) {
        
        $touchStrenght = $option['smooth_touch_strength'];
        
    } else {
        
         $touchStrenght = 0;
    }
    
    ?>



    <div id="smooth-wrapper" data-strength="<?php echo esc_attr($option['smooth_strength']) ?>" data-touch="<?php echo esc_attr($touchStrenght) ?>">
        <?php } ?>

        <?php wp_body_open(); ?>
        <div id="page" class="site <?php echo esc_attr($elementor_check) ?>">
            <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'alioth' ); ?></a>

            <?php if ($pageLoader) { ?>

            <!--Page Loader-->
            <div data-duration="<?php echo esc_attr($option['loader_duration']) ?>" class="alioth-page-loader <?php echo esc_attr($option['loader_layout']) ?>">

                <span class="apl-background"></span>

                <!--Loader Percentage (Don't Touch)-->
                <div class="apl-count"></div>
                <!--Loader Percentage (Don't Touch)-->

            </div>
            <!--/Page Loader-->

            <?php } ?>

            <?php if ($pageTransitions) { ?>
            <!--Page Transitions-->
            <div class="alioth-page-transitions" data-layout="<?php echo esc_attr($option['trans_layout']); ?>">

                <!--Transition Background (Don't touch)-->
                <span class="apt-bg"></span>
                <!--/Transition Background (Don't touch)-->

                <!--Transition Text-->
                <div class="trans-text"><?php echo esc_html($option['trans_text']); ?></div>
                <!--Transition Text-->

            </div>
            <!--/Page Transitions-->

            <?php } ?>

            <?php if ($mouseCursor) { ?>
            <!-- Mouse Cursor -->
            <div data-dark-circle="<?php echo esc_attr($darkCircle); ?>" data-dark-dot="<?php echo esc_attr($darkDot); ?>" data-light-circle="<?php echo esc_attr($lightCircle); ?>" data-light-dot="<?php echo esc_attr($lightDot); ?>" id="mouseCursor">
                <div id="cursor"></div>
                <div id="dot"></div>
            </div>
            <!-- /Mouse Cursor -->

            <?php } ?>

            <header id="masthead" class="site-header <?php echo esc_attr($menuLayout . ' ' . $headerLayout . ' ' .$menuStyle . '_menu' .' '. $headerStick . ' ' . $stickyAnimate) ?>" data-height="<?php echo esc_attr($headerHeight); ?>" data-sticky-height="<?php echo esc_attr($stickyHeaderHeight); ?>">

                <div class="header-wrapper">

                    <?php	
                if (has_custom_logo()) : ?>

                    <div class="site-branding">
                        <!-- Site Logos -->
                        <div class="site-logo">

                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">

                                <img class="dark-logo" src="<?php echo get_custom_logo_url(); ?>">

                                <img class="light-logo" src="<?php echo esc_url( get_theme_mod( 'light_logo' ) ); ?>">
                            </a>
                        </div>
                        <!-- /Site Logos -->
                    </div>
                    <?php else : ?>

                    <div class="site-desc">

                        <?php

			if ( is_front_page() && is_home() ) :
				?>
                        <h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
                        <?php
			else :
				?>
                        <h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
                        <?php
			endif;
			$alioth_description = get_bloginfo( 'description', 'display' );
			if ( $alioth_description || is_customize_preview() ) :
				?>
                        <p class="site-description"><?php echo esc_html($alioth_description); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                        <?php endif; ?>

                    </div>
                    <?php endif; ?>

                    <!-- Menu Toggle Button (Don't touch) -->
                    <div class="menu-toggle">
                        <span class="toggle-line"></span>
                        <span class="toggle-line"></span>
                    </div>
                    <!-- /Menu Toggle Button (Don't touch) -->

                    <nav id="site-navigation" class="main-navigation site-navigation <?php echo esc_attr($menuStyle); ?>" <?php echo esc_attr($classicHovers); ?>>

                        <span class="sub-back"><i class="icofont-long-arrow-left"></i></span>

                        <?php
                    
                     if (has_nav_menu('main-menu')) {

			             wp_nav_menu(
				                array(
					                'theme_location' => 'main-menu',
				                    'menu_id'        => 'primary-menu',
                                    'menu_class'     => 'menu main-menu',
                                    'container'      => false
				                )
			             );
                         
                           }
			         ?>

                        <?php if ($menuStyle === 'fullscreen') { ?>

                        <!-- Menu Widget (Left) -->
                        <div class="menu-widget menu-widget-left">
                            <ul class="social-list">
                                <li>
                                    <a target="_blank" href="https://www.instagram.com/thecurrentcon/">
                                        The<span style="margin-left: 5px;">Current</span>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://www.facebook.com/thesvengroup/">
                                        Facebook
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://www.instagram.com/svengroup/?hl=en">
                                        Instagram
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://ph.linkedin.com/company/svengroup">
                                        LinkedIn
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- /Menu Widget (Left) -->

                        <!-- Menu Widget (Right) -->
                        <div class="menu-widget menu-widget-right">


                            <?php if ($option['fs_right_widget'] === 'cta') { ?>

                            <div class="git-button">
                                <a target="<?php echo esc_attr($option['cta_target']); ?>" href="<?php echo esc_url($option['cta_url']); ?>"><?php echo esc_html($option['cta_text']); ?></a>
                            </div>


                            <?php } elseif ($option['fs_right_widget'] === 'custom') { 
                                
                                echo do_shortcode($option['fs_right_custom']);
                       } ?>


                        </div>
                        <!-- /Menu Widget (Right) -->

                        <?php } ?>

                    </nav><!-- #site-navigation -->

                    <!-- Header Widgets -->
                    <div class="header-widgets">

                        <?php if (( class_exists( 'WooCommerce' ) ) && ($shoppingCart !== 'hide') && (function_exists( 'woo_cart_but' )) ) { ?>

                        <div class="header-widget <?php echo esc_attr($shoppingCart); ?>">

                            <div class="alioth-atc-ic">
                                <?php 
                                echo do_shortcode("[woo_cart_but]"); 
                               ?>

                            </div>

                        </div>

                        <?php        }  ?>

                        <!-- Header Widget-->
                        <div class="header-widget">

                            <?php if (class_exists('Redux')) { 

                        if ($option['header_widget'] === 'button') { ?>

                            <!--CTA Widget-->
                            <div class="header-cta-but">
                                <a target="<?php echo esc_attr($option['hw_button_target']) ?>" data-hover="<?php echo esc_attr($option['hw_button_text']) ?>" href="<?php echo esc_url($option['hw_button_url']) ?>">
                                    <?php echo esc_html($option['hw_button_text']); ?>
                                </a>
                            </div>
                            <!--CTA Widget-->
                            <?php } elseif ($option['header_widget'] === 'custom') {
                            
                            echo do_shortcode($option['hw_custom']);
                        
                           }; ?>

                            <?php }; ?>

                        </div>
                        <!-- Header Widget-->

                    </div>
                    <!-- /Header Widgets -->

                </div>

            </header><!-- #masthead -->

            <?php if ($smoothScroll) { ?>

            <div id="smooth-content">

                <?php } ?>
