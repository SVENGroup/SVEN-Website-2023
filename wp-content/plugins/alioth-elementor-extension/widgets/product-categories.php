<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class AliothProductCategories extends Widget_Base {
 
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
    return 'aliothproductcategories';
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
    return __( 'Product Categories', 'alioth-elementor');
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
    return 'eicon-product-categories';
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
    
      
        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Product Categories', 'alioth-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
      
        $this->add_control(
			'exclude_cats',
			[
				'label' => __( 'Excluded Categories', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'desc' => __('Enter category ids which will not be displayed in list.' , 'alioth-elementor'),
                'placeholder' => __('Eg. 145,215,87')
			]
		);
      
      $this->add_control(
			'order_by',
			[
				'label' => esc_html__( 'Order By', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'ID'  => esc_html__( 'ID', 'plugin-name' ),
					'title'  => esc_html__( 'Title', 'plugin-name' ),
					'date'  => esc_html__( 'Date', 'plugin-name' ),
					'author'  => esc_html__( 'Author', 'plugin-name' ),
					'type'  => esc_html__( 'Type', 'plugin-name' ),

				],
			]
		);
      
        $this->add_control(
			'order',
			[
				'label' => esc_html__( 'Order', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'ASC'  => esc_html__( 'ASC', 'plugin-name' ),
					'DESC'  => esc_html__( 'DESC', 'plugin-name' )

				],
                
			]
		);
        

		$this->add_control(
			'links_target',
			[
				'label' => esc_html__( 'Open Links in', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '_self',
				'options' => [
					'_self'  => esc_html__( 'Same Window', 'plugin-name' ),
					'_blank' => esc_html__( 'New Window', 'plugin-name' ),
				],
			]
		);
      
        $this->add_control(
			'cat_count',
			[
				'label' => __( 'Category Count', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'alioth-elementor ' ),
				'label_off' => __( 'Hide', 'alioth-elementor ' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        
   
    $this->end_controls_section();
      
      $this->start_controls_section(
			'pc_style',
			[
                
				'label' => esc_html__( 'Style', 'alioth-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);


        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cat_title_typography',
                'label' => __('Cat Title Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .apc-cat-title',
			]
		);
      
        $this->add_control(
			'cat_title_color',
			[
				'label' => esc_html__( 'Cat Title Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					 '{{WRAPPER}} .apc-cat-title' => 'color: {{VALUE}}'
				],
			]
		);
      
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cat_count_typography',
                'label' => __('Count Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .apc-cat-quant, {{WRAPPER}} .apc-cat-quant::before',
			]
		);
      
        $this->add_control(
			'cat_count_color',
			[
				'label' => esc_html__( 'Count Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .apc-cat-quant' => 'color: {{VALUE}}',
					'{{WRAPPER}} .apc-cat-quant::before' => 'color: {{VALUE}}'
				],
			]
		);
      
         $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'icon_typography',
                'label' => __('Icon Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .apc-cat-mark',
			]
		);
      
        $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .apc-cat-mark' => 'color: {{VALUE}}'
				],
			]
		);

      
        $this->add_control(
			'seperator_color',
			[
				'label' => esc_html__( 'Seperator Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .apcats-cat::before' => 'background: {{VALUE}}'
				],
			]
		);
      
        $this->add_control(
			'seperator_hover_color',
			[
				'label' => esc_html__( 'Seperator Hover Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .apcats-cat::after' => 'background: {{VALUE}}'
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

             
           $args = array(
            'taxonomy' => 'product_cat',
            'hide+empty' => 'true',
            'orderby' =>$settings['order_by'],
            'order'   => $settings['order'],
               'exclude' => $settings['exclude_cats']
        );

        $categories = get_categories($args);

 


?>
<!--Product Categories-->
<div class="alioth-product-categories">
    
    
    <?php foreach ( $categories as $key => $category ) { ?>
    
    <!--Product Category-->
    <div class="apcats-cat">

        <!--Product Category URL-->
        <a target="<?php echo esc_attr($settings['links_target']) ?>" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">

            <!--Product Category Title-->
            <div class="apc-cat-title"><?php echo esc_html($category->name) ?></div>
            <!--/Product Category Title-->
            
            <?php if ($settings['cat_count'] === 'yes') { ?>
            <!--Product Category Quantity-->
            <div class="apc-cat-quant"><?php echo esc_html($category->count) ?></div>
            <!--/Product Category Quantity-->
            
            <?php } ?>

            <!--Product Category Icon-->
            <div class="apc-cat-mark"><i class="icofont-thin-right"></i></div>
            <!--/Product Category Icon-->
        </a>

    </div>
    <!--/Product Category-->
    
      <?php  } ?>

</div>
<!--/Product Categories-->



<?php
  }

}
