<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class AliothProductsCarousel extends Widget_Base {
 
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
    return 'aliothproductscarousel';
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
    return __( 'Products Carousel', 'alioth-elementor');
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
    return 'eicon-slider-album';
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
      
      
      	$repeater = new \Elementor\Repeater();
      
        $options = array();

        $args = array(
            'taxonomy' => 'product_cat',
            'hide+empty' => 'false'
        );

        $categories = get_categories($args);

        foreach ( $categories as $key => $category ) {
          $options[$category->term_id] = $category->name;
        }
 
      
        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Carousel Tabs', 'alioth-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();
      
        $repeater->add_control(
			'select_cat',
			[
				'label' => __( 'Select Category', 'alioth-elementor'),
				'label_block' => true,
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $options,
			]
		);
      
        $repeater->add_control(
			'tab_title',
			[
				'label' => __( 'Tab Title', 'alioth-elementor'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
      
  

		$this->add_control(
			'carousel_tabs',
			[
				'label' => esc_html__( 'Tabs', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'show_label' => false,
			]
		);
      
        $this->add_control(
			'will_anim',
			[
				'label' => __( 'Animate', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'alioth-elementor ' ),
				'label_off' => __( 'No', 'alioth-elementor ' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        
        $this->add_control(
			'image_height',
			[
				'label' => esc_html__( 'Images Height', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 2000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 600,
				],
				'selectors' => [
					'{{WRAPPER}} .apc-product-wrapper' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
      
        $this->add_control(
			'overlay_color',
			[
				'label' => esc_html__( 'Overlay Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .product-ov' => 'background: {{VALUE}}',
				],
			]
		);
      
    $this->end_controls_section();
      
      $this->start_controls_section(
			'apc_style',
			[
                
				'label' => esc_html__( 'Style', 'alioth-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);


        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'tab_title_typography',
                'label' => __('Tabs Title Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .apc-cats ul li, {{WRAPPER}} .apc-cats ul li::after',
			]
		);
      
        $this->add_control(
			'tab_title_color',
			[
				'label' => esc_html__( 'Tab Title Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					 '{{WRAPPER}} .apc-cats ul li' => 'color: {{VALUE}}',
					 '{{WRAPPER}} .apc-cats ul li::after' => 'color: {{VALUE}}'
				],
			]
		);
      
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'product_title_typography',
                'label' => __('Product Title Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .apc-product-title',
			]
		);
      
        $this->add_control(
			'product_title_color',
			[
				'label' => esc_html__( 'Product Title Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .apc-product-title' => 'color: {{VALUE}}'
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
                'label' => __('Price Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .apc-product-price',
			]
		);
      
        $this->add_control(
			'price_color',
			[
				'label' => esc_html__( 'Price Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h4.apc-product-price' => 'color: {{VALUE}}'
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

      
      $settings = $this->get_settings();
      $willAnim = '';
      
      if ($settings['will_anim'] === 'yes') {
          
          $willAnim = 'true';
          
      } else {
          $willAnim = 'false';
      }
      
      $tabs = $settings['carousel_tabs'];
      $cats = array();
      
    foreach ($tabs as $tab) {
        
        $cats[] = $tab['select_cat'];
        
  } 

      
   $args = array(  
        'post_type' => 'product',
        'tax_query' => array(
        array(
            'taxonomy' => 'product_cat',
            'field'    => 'term_id',
            'terms'    =>  $cats,
        ),
    ),
    );

    $loop = new \WP_Query( $args ); 
    wp_reset_postdata(); 

?>


<!--Products Carousel-->
<div class="alioth-products-carousel" data-anim="<?php echo esc_attr($willAnim); ?>">

    <!--Product Categories-->
    <div class="apc-cats">
        <ul>

            <?php foreach ($tabs as $tab) {
        
            $cat = $tab['select_cat']; ?>

            <li data-category="<?php echo esc_attr($cat) ?>"><?php echo esc_html($tab['tab_title']) ?></li>

            <?php  } ?>

        </ul>
    </div>
    <!--/Product Categories-->

    <!--Products Wrapper-->
    <div class="apc-product-wrapper">

        <?php while ( $loop->have_posts() ) : $loop->the_post();  ?>

        <!--Product-->
        <div id="product-<?php the_ID(); ?>" class="apc-product <?php global $post;
                        $terms = get_the_terms( $post->ID, 'product_cat' ); 
                        foreach($terms as $term) {
                        echo 'cat_' . $term->term_id .' ';
                        }
                    ?>">

            <a href="<?php echo get_the_permalink(); ?>">
                <!--Product URL-->

                <!--Product Image-->
                <div class="apc-product-image">
                    
                    <?php $alt = get_post_meta ( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>
                    
                    <img alt="<?php echo $alt; ?>" src="<?php echo get_the_post_thumbnail_url(); ?>">

                </div>
                <!--/Product Image-->

                <!--Product Details-->
                <div class="apc-product-det">

                    <!--Product Title-->
                    <h3 class="apc-product-title"><?php echo get_the_title(); ?></h3>
                    <!--/Product Title-->

                    <?php $currency = get_woocommerce_currency_symbol();
                            $price = get_post_meta( get_the_ID(), '_regular_price', true);
                            $sale = get_post_meta( get_the_ID(), '_sale_price', true);
                            $cabo = get_post_meta( get_the_ID(), '_varitaion_regular_price', true);
      
                    ?>

                    <?php if($sale) : ?>
                    <!--Product Price-->
                    <h4 class="apc-product-price"><?php echo $currency; echo $sale; ?></h4>
                    <!--/Product Price-->
                    <?php elseif($price) : ?>

                    <!--Product Price-->
                    <h4 class="apc-product-price"><?php echo $currency; echo $price; ?></h4>
                    <!--/Product Price-->

                    <?php endif; ?>



                </div>
                <!--/Product Details-->

            </a>

        </div>
        <!--/Product-->

        <?php endwhile; wp_reset_query(); ?>


    </div>
    <!--/Products Wrapper-->

</div>
<!--/Products Carousel-->


<?php
  }

}
