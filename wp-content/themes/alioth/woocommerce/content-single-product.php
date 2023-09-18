<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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



$shortDesc = true;
$showSku = true;
$showCat = true;
$showTags = true;
$slideNumbers = true;
$slideArrows = true;

if (class_exists('Redux')) {
    
    $option = get_option('pe-redux');
    $shortDesc = $option['show_short_description'];
    $showSku = $option['show_sku'];
    $showCat = $option['show_product_category'];
    $showTags = $option['show_product_tags'];
    $slideNumbers = $option['show_slide_numbers'];
    $slideArrows = $option['show_slider_arrows'];
    
}
    




/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<div class="product-page">

    <!-- Single Product -->
    <div class="single-product-wrap " id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>


        <?php   $attachment_ids = $product->get_gallery_image_ids(); 
        
        if ($attachment_ids) {
        
        ?>
        <!-- Single Product Image Slider -->
        <div class="single-product-slider">

            <!-- Slider Images -->
            <div class="sp-slider swiper-container">
                <!-- Slider Images Wrapper -->
                <div class="swiper-wrapper">

                    <?php
              

                foreach( $attachment_ids as $attachment_id ) { ?>
                    <!-- Slider Product Image -->
                    <div class="swiper-slide sp-image">

                        <img src="<?php  echo esc_url($Original_image_url = wp_get_attachment_url( $attachment_id )); ?>">

                    </div>
                    <!--/ Slider Product Image -->

                    <?php   } ?>


                </div>
                <!--/ Slider Images Wrapper -->

            </div>
            <!--/ Slider Images -->

            <!-- Slider Controls (Don't touch) -->
            <?php if ($slideNumbers != false) { ?>
            <div class="sp-dots"></div>
            <?php } ?>

            <?php if ($slideArrows != false) { ?>
            <div class="sp-arrows">
                <div class="sp-next"> <i class="icofont-thin-up"></i></div>
                <div class="sp-prev"> <i class="icofont-thin-down"></i></div>
            </div>
            <?php } ?>
            <!--/ Slider Controls (Don't touch) -->

        </div>
        <!-- Single Product Image Slider -->

        <?php  } else if (has_post_thumbnail()) { ?>

        <div class="single-product-image">

            <img src="<?php echo esc_attr(get_the_post_thumbnail_url()); ?>">

        </div>


        <?php } ?>

        <!-- Single Product Details -->
        <div class="single-product-details">

            <!-- Product Review -->
            <div class="product-review">

                <?php     


                $rating_count = $product->get_rating_count();
                $review_count = $product->get_review_count();
                $average      = $product->get_average_rating();

                if ( $rating_count > 0 ) : ?>

                <div class="woocommerce-product-rating">
                    <?php echo wc_get_rating_html( $average, $rating_count ); // WPCS: XSS ok. ?>
                    <?php if ( comments_open() ) : ?>
                    <?php //phpcs:disable ?>
                    <p class="woocommerce-review-link" rel="nofollow">(<?php printf( _n( '%s review', '%s reviews', $review_count, 'woocommerce' ), '<span class="count">' . esc_html( $review_count ) . '</span>' ); ?>)</p>
                    <?php // phpcs:enable ?>
                    <?php endif ?>
                </div>

                <?php endif; ?>
            </div>
            <!-- Product Review -->

            <!-- Product Title -->
            <div class="product-title">

                <?php the_title( '<h1 class="product_title entry-title">', '</h1>' ); ?>

            </div>
            <!--/ Product Title -->

            <!-- Product Price -->
            <div class="product-price <?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo do_shortcode($product->get_price_html()); ?></div>
            <!--/ Product Price -->


            <?php if ($shortDesc != false) { ?>
            <!-- Product Summary -->
            <div class="product-summary">
                <?php 
                  
                        $short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );

                        if ( ! $short_description ) {
	                       return;
                        }
                        echo do_shortcode($short_description);
                        
                        ?>
            </div>
            <!-- Product Summary -->
            <?php } ?>

            <!-- Add to Cart Button -->
            <div class="add-to-cart">
                <?php do_action( 'woocommerce_' . $product->get_type() . '_add_to_cart' ); ?>
            </div>
            <!--/ Add to Cart Button -->

            <!-- Product Others -->
            <div class="product-dets">

                <?php do_action( 'woocommerce_product_meta_start' );

              if ($showSku != false) {

                if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

                <span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo esc_html(( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' )); ?></span></span>

                <?php endif; 
              } 

                 if ($showCat != false) { 

                echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' ); 

                } 

                 if ($showTags != false) { 

                 echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'woocommerce' ) . ' ', '</span>' ); 

               }


                do_action( 'woocommerce_product_meta_end' ); ?>
            </div>
            <!--/ Product Others -->


        </div>
        <!--/ Single Product Details -->

        <!-- Single Product Metas -->
        <div class="single-product-meta">

            <ul class="single-product-mets">

                <?php $product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

            if ( ! empty( $product_tabs ) ) : ?>


                <?php foreach ( $product_tabs as $key => $product_tab ) : ?>
                <li class="<?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
                    <a href="#tab-<?php echo esc_attr( $key ); ?>">
                        <?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
                    </a>

                    <!-- Meta Description -->
                    <div class="desc">

                        <!-- Description Close Button (Don't touch) -->
                        <div class="desc-close">
                            <i class="icofont-close-line"></i>
                        </div>
                        <!-- Description Close Button (Don't touch) -->

                        <!-- Description Content -->
                        <div class="desc-self woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
                            <?php
				if ( isset( $product_tab['callback'] ) ) {
					call_user_func( $product_tab['callback'], $key, $product_tab );
				}
				?>
                        </div>
                        <!--/ Description Content -->

                    </div>
                    <!--/ Meta Description -->

                </li>

                <?php endforeach; ?>

                <?php endif; ?>
            </ul>

        </div>
        <!--/ Single Product Metas -->

    </div>
    <!-- Single Product -->

</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
