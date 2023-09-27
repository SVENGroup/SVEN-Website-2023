<?php
function alioth_add_woocommerce_support() {
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 150,
        'single_image_width'    => 300,
        
        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
    ) );
}

add_action( 'after_setup_theme', 'alioth_add_woocommerce_support' );


function alioth_remove_shop_breadcrumbs(){
        remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
 
}
add_action('template_redirect', 'alioth_remove_shop_breadcrumbs' );

add_filter( 'woocommerce_product_variation_title_include_attributes', '__return_false' );
     



