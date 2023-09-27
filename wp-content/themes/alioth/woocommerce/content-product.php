<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div <?php wc_product_class( '', $product ); ?>>

    <!-- Product URL --><a href="<?php echo apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product ); ?>">
    
    
    <?php if ( $product->is_on_sale() )  {    
    echo '<span class="sale-badge">' . esc_html('SALE!' , 'alioth') . '</span>';
} ?>

        <!-- Product Details -->
        <div class="product-details">

            <!-- Product Title -->
            <?php echo '<div class="product-title ' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' . get_the_title() . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped  ?>
            <!--/ Product Title -->

            <!-- Product Price -->

            <?php if ( $price_html = $product->get_price_html() ) : ?>
            <div class="product-price"><?php echo do_shortcode($price_html); ?></div>
            <?php endif; ?>
            <!--/ Product Price -->

        </div>
        <!--/ Product Details -->

        <!-- Product Image -->
        <div class="product-image">

            <img src="<?php echo get_the_post_thumbnail_url(); ?>">

        </div>
        <!--/ Product Image -->

    </a>
    
    <div class="product-acts" data-barba-prevent="all"><?php 
    echo apply_filters(
	'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
	sprintf(
		'<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		esc_html( $product->add_to_cart_text() )
	),
	$product,
	$args
);

    ?></div>
        

    
</div>
