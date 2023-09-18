<?php     

add_shortcode ('woo_cart_but', 'woo_cart_but' );

/**
 * Create Shortcode for WooCommerce Cart Menu Item
 */
function woo_cart_but() {
ob_start();
$cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
$cart_url = wc_get_cart_url();  // Set Cart URL
?>


<a class="cart-contents" href="<?php echo esc_url($cart_url); ?>" title="My Basket">
    
   
    <div class="cart-icon">
        
        <img alt="Shopping Cart Icon" class="cart-icon-light" src="<?php echo get_template_directory_uri() . '/inc/img/cart-light.png' ?>">
        <img alt="Shopping Cart Icon" class="cart-icon-dark" src="<?php echo get_template_directory_uri() . '/inc/img/cart-dark.png' ?>">
    
    </div>
    
        <?php
if ( $cart_count > 0 ) {
?>
        <span class="cart-contents-count"><?php echo esc_html($cart_count); ?></span>
        <?php
        }
?>
    </a>
<?php
return ob_get_clean();
}

add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_but_count' );



/**
 * Add WooCommerce Cart Menu Item Shortcode to particular menu
 */
function woo_cart_but_icon ( $items, $args ) {
       $items .=  '[woo_cart_but]'; // Adding the created Icon via the shortcode already created
       
       return $items;
}


