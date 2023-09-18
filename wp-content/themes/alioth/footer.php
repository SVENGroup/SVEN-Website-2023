<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Alioth
 */

$option = get_option('pe-redux');
$footerLogo = false;
$bottomLeftWidget = 'none';
$bottomRightWidget = 'none';
$footer_layout = '';
$smoothScroll = 'false';
$uploads = wp_upload_dir();

if (class_exists('Redux')) {
    $footerLogo = $option['footer_logo'];
    $bottomLeftWidget = $option['bottom_left_widget'];
    $bottomRightWidget = $option['bottom_right_widget'];
    $footer_layout = $option['footer_layout'];
    $smoothScroll = $option['smooth_scroll_active'];
};
?>

<?php if (get_field('footer') !== 'hide') {  ?>

<?php if (($footerLogo) || (is_active_sidebar('footer-widget-left')) || (is_active_sidebar('footer-widget-right')) || ($bottomRightWidget !== 'none') || ($bottomLeftWidget !== 'none') || (! empty ($option['copyright_text'])) ) { ?>

<footer id="footer" class="site-footer <?php echo esc_attr($footer_layout); ?>">

    <!-- Footer Wrapper (Top) -->
    <div class="wrapper">

        <!-- Footer Branding -->
        <div class="c-col-6 footer-widget footer_brand">

            <?php if ($footerLogo) { ?>
            <!-- Footer Logo -->
            <div class="footer-logo">
                <?php
                    echo '<img src="' . esc_url( $uploads['baseurl'] . '/sven/footer-logo.png' ) . '" href="/">';
                ?>
            </div>
            <!-- Footer Logo -->
            <?php } ?>
        </div>
        <!--/ Footer Branding -->

        <!-- Footer Widget -->
        <div class="c-col-3 footer-widget">
            <?php if (is_active_sidebar('footer-widget-left')):
                    dynamic_sidebar('footer-widget-left');
                endif; ?>
        </div>
        <!--/ Footer Widget -->

        <!-- Footer Widget -->
        <div class="c-col-3 footer-widget">
            <?php if (is_active_sidebar('footer-widget-right')):
                    dynamic_sidebar('footer-widget-right');
                endif; ?>

        </div>
        <!--/ Footer Widget -->

    </div>
    <!--/ Footer Wraper (Top) -->

    <?php if(($bottomRightWidget !== 'none') || ($bottomLeftWidget !== 'none')) { ?>

    <!-- Footer Wraper (Bottom) -->
    <div class="wrapper">

        <?php if($bottomLeftWidget !== 'none') { ?>

        <!-- Footer Widget -->
        <div class="c-col-6 footer-widget">
            <?php if ($bottomLeftWidget === 'custom') { 
    
                echo do_shortcode($option['bottom_left_custom']);
            
                }  elseif ($bottomLeftWidget === 'mail-button') { ?>

            <!-- CTA -->
            <div class="big-button">
                <a target="_blank" href="mailto:refresh@svengroup.com">
                refresh@svengroup.com
                </a>
            </div>
            <!--/ CTA -->

            <?php } ?>

        </div>
        <!--/ Footer Widget -->

        <?php } ?>

        <?php if($bottomRightWidget !== 'none') { ?>

        <!-- Footer Widget -->
        <div class="c-col-6 footer-widget">

            <?php if ($bottomRightWidget === 'custom') { 
    
                echo do_shortcode($option['bottom_right_custom']);
            
                }  elseif ($bottomRightWidget === 'menu') { 
                
                     wp_nav_menu(array(
                    'theme_location' => 'footer-menu',
                    'menu_id' => 'footer-menu',
                    'menu_class' => 'footer_menu',
                     'container_class' => 'footer-menu'
                ));

         } ?>

        </div>
        <!--/ Footer Widget -->

        <?php } ?>

    </div>
    <!-- Footer Wraper (Bottom) -->

    <?php } ?>

</footer><!-- #footer -->

<?php } ?>

<?php } ?>


 <?php if ($smoothScroll) { ?>


</div>
 <?php } ?>

</div><!-- #page -->

<?php wp_footer(); ?>
 <?php if ($smoothScroll) { ?>
</div>
 <?php } ?>
</body>

</html>
