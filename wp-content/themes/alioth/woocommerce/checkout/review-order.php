<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="shop_table woocommerce-checkout-review-order-table cart-totals">


    <div class="ct-title">
        <h4><?php esc_html_e( 'Cart Totals', 'woocommerce' ); ?></h4>
    </div>
    <div class="ct-products">
        <?php
		do_action( 'woocommerce_review_order_before_cart_contents' );

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>

        <!--Product-->
        <div class="cart-product <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

            <!--Product Image-->
            <div class="cart-product-image">
                <?php echo do_shortcode($_product->get_image()); ?>
            </div>
            <!--/Product Image-->

            <!--Product Details-->
            <div class="cart-product-details">

                <!--Product Title-->
                <h5 class="cart-product-title"> <?php echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) ) . '&nbsp;'; ?>
                   
                    <?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h5>
                <!--/Product Title-->

                <!--Product Quantity-->
                <div class="cart-product-quants">
                     <?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times;&nbsp;%s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                </div>
                <!--/Product Quantity-->

            </div>
            <!--/Product Details-->

        </div>
        <!--/Product-->

        <?php
			}
		}

		do_action( 'woocommerce_review_order_after_cart_contents' );
		?>
    </div>

    <div class="ct-prices">

        <div class="ct-sub-total"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?><span><?php wc_cart_totals_subtotal_html(); ?></span></div>
<!--        <div class="ct-shipping">Shipping: <span>$11</span></div>-->


        <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
        <tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
            <th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
            <td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
        </tr>
        <?php endforeach; ?>

    </div>




    <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

    <?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

    <?php wc_cart_totals_shipping_html(); ?>

    <?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

    <?php endif; ?>

    <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
    <tr class="fee">
        <th><?php echo esc_html( $fee->name ); ?></th>
        <td><?php wc_cart_totals_fee_html( $fee ); ?></td>
    </tr>
    <?php endforeach; ?>

    <?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
    <?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
    <?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited ?>
    <tr class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
        <th><?php echo esc_html( $tax->label ); ?></th>
        <td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
    </tr>
    <?php endforeach; ?>
    <?php else : ?>
    <tr class="tax-total">
        <th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
        <td><?php wc_cart_totals_taxes_total_html(); ?></td>
    </tr>
    <?php endif; ?>
    <?php endif; ?>

    <?php do_action( 'woocommerce_review_order_before_order_total' ); ?>


         <div class="ct-total"><?php esc_html_e( 'Total', 'woocommerce' ); ?> <span><?php wc_cart_totals_order_total_html(); ?></span></div>
    
    <?php do_action( 'woocommerce_review_order_after_order_total' ); ?>


</div>
