<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class AliothSingleProduct extends Widget_Base {
 
  /**
   * Retrieve the widget name.
   *
   * @since 1.1.0
   *
   * @access public
   *
   * @return string Widget name.
   */
  public function get_name() {
    return 'aliothsingleproduct';
  }
 
  /**
   * Retrieve the widget title.
   *
   * @since 1.1.0
   *
   * @access public
   *
   * @return string Widget title.
   */
  public function get_title() {
    return __( 'Single Product', 'alioth-elementor' );
  }
 
  /**
   * Retrieve the widget icon.
   *
   * @since 1.1.0
   *
   * @access public
   *
   * @return string Widget icon.
   */
  public function get_icon() {
    return 'eicon-single-product';
  }
 
  /**
   * Retrieve the list of categories the widget belongs to.
   *
   * Used to determine where to display the widget in the editor.
   *
   * Note that currently Elementor supports only one category.
   * When multiple categories passed, Elementor uses the first one.
   *
   * @since 1.1.0
   *
   * @access public
   *
   * @return array Widget categories.
   */
  public function get_categories() {
    return [ 'alioth-content' ];
  }


  /**
   * Register the widget controls.
   *
   * Adds different input fields to allow the user to change and customize the widget settings.
   *
   * @since 1.1.0
   *
   * @access protected
   */
  protected function register_controls() {
	
      
        $options = [];

        $products = get_posts( [
            'post_type'  => 'product',
        ] );

        foreach ( $products as $key => $product ) {
            $options[ $product->ID ] = $product->post_title;
        }
      
      
    $this->start_controls_section(
      'widget_content',
      [
        'label' => __( 'Single Product', 'alioth-elementor' ),
      ]
    );
      
        $this->add_control(
			'select_product',
			[
				'label' => __( 'Select Product', 'alioth-elementor'),
				'label_block' => true,
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $options,
			]
		);
      
        $this->add_control(
			'show_rating',
			[
				'label' => __( 'Product Rating', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'alioth-elementor ' ),
				'label_off' => __( 'Hide', 'alioth-elementor ' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
      
        $this->add_control(
			'show_price',
			[
				'label' => __( 'Product Price', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'alioth-elementor ' ),
				'label_off' => __( 'Hide', 'alioth-elementor ' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
      
        $this->add_control(
			'show_atc',
			[
				'label' => __( 'Add to Cart Button', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'alioth-elementor ' ),
				'label_off' => __( 'Hide', 'alioth-elementor ' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
      
      
    $this->end_controls_section();
      
        $this->start_controls_section(
			'Style',
			[
                
				'label' => esc_html__( 'Style', 'alioth-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
      
$this->add_control(
			'image_height',
			[
				'label' => esc_html__( 'Image Height', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 10000,
				'step' => 1,
				'default' => 400,
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
                'label' => __('Product Title Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .asp-product-title',
			]
		);
      
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Product Title Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .asp-product-title' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
                'label' => __('Price Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .asp-product-price',
			]
		);
      
        $this->add_control(
			'price_color',
			[
				'label' => esc_html__( 'Price Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .asp-product-price' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_control(
			'stars_color',
			[
				'label' => esc_html__( 'Rating Stars Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} ul.asp-rate.fill li' => 'color: {{VALUE}}',
					'{{WRAPPER}} ul.asp-rate li' => '-webkit-text-stroke-color: {{VALUE}}',
				],
			]
		);
      
        $this->add_control(
			'atc-color',
			[
				'label' => esc_html__( 'Cart Icon Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .asp-add-to-cart i' => 'color: {{VALUE}}'
				],
			]
		);
      
      $this->end_controls_section();
     
  }
 
  /**
   * Render the widget output on the frontend.
   *
   * Written in PHP and used to generate the final HTML.
   *
   * @since 1.1.0
   *
   * @access protected
   */
  protected function render() {
    $settings = $this->get_settings_for_display();
          $product = $settings['select_product'];
      $producta = wc_get_product( $product );


    ?>

<style>


</style>
<!--Single Product-->
<div class="alioth-single-product">

    <a href="<?php echo esc_url(get_the_permalink($product)); ?>">
        <!--/Single Product URL-->

        <!--Single Product Image-->
        <div class="asp-image" style="height: <?php echo esc_attr($settings['image_height'] . 'px') ?>">

            <?php   $alt = get_post_meta ( get_post_thumbnail_id($product), '_wp_attachment_image_alt', true ); ?>
            
            <img alt="<?php echo $alt; ?>" src="<?php echo esc_attr(get_the_post_thumbnail_url($product)) ?>">

        </div>
        <!--/Single Product Image-->

        <!--Single Product Details-->
        <div class="asp-det">

            
            <?php if ($settings['show_rating'] === 'yes') { ?>

            <!--Single Product Rating-->
            <div class="asp-product-rate">

                <ul class="asp-rate">
                    <li><i class="icofont-star"></i></li>
                    <li><i class="icofont-star"></i></li>
                    <li><i class="icofont-star"></i></li>
                    <li><i class="icofont-star"></i></li>
                    <li><i class="icofont-star"></i></li>
                </ul>

                <?php 
                    $average = $producta->get_average_rating(); ?>

                <ul style="width: <?php echo ( ( $average / 5 ) * 100 ) . '%'; ?>" class="asp-rate fill">
                    <li><i class="icofont-star"></i></li>
                    <li><i class="icofont-star"></i></li>
                    <li><i class="icofont-star"></i></li>
                    <li><i class="icofont-star"></i></li>
                    <li><i class="icofont-star"></i></li>
                </ul>

            </div>
            <!--/Single Product Rating-->
            
            <?php } ?>

            <!--Single Product Title-->
            <div class="asp-product-title"><?php echo esc_html(get_the_title($product)) ?></div>
            <!--/Single Product Title-->
            
            <?php if ($settings['show_price'] === 'yes') { ?>

            <?php $currency = get_woocommerce_currency_symbol();
                            $price = get_post_meta( $product, '_regular_price', true);
                            $sale = get_post_meta( $product, '_sale_price', true);
                            $cabo = get_post_meta( $product, '_varitaion_regular_price', true);
                    ?>

            <?php if($sale) : ?>
            <!--Product Price-->
            <div class="asp-product-price"><?php echo $currency; echo $sale; ?></div>
            <!--/Product Price-->
            <?php elseif($price) : ?>

            <!--Product Price-->
            <div class="asp-product-price"><?php echo $currency; echo $price; ?></div>
            <!--/Product Price-->

            <?php endif; ?>
            
            <?php } ?>
            
             <?php if ($settings['show_atc'] === 'yes') { ?>

            <!--Single Product Add to Cart-->
            <a href="<?php echo $producta->add_to_cart_url(); ?>" class="asp-add-to-cart"><i class="eicon-product-add-to-cart"></i></a>
            <!--/Single Product Add to Cart-->
            
            <?php } ?>

        </div>
        <!--/Single Product Details-->

    </a>

</div>
<!--/Single Product-->

<?php

    ?>

<?php
  }

}
