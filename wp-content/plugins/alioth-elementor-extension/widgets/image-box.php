<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class AliothImageBox extends Widget_Base {
 
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
    return 'aliothimagebox';
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
    return __( 'Image Box', 'alioth-elementor' );
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
    return 'eicon-call-to-action';
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
      'widget_content',
      [
        'label' => __( 'Image Box', 'alioth-elementor' ),
      ]
    );
      
    $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
      
      $this->add_control(
			'title',
			[
				'label' => __( 'Title', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
      
      $this->add_control(
			'sub-title',
			[
				'label' => __( 'Sub-title', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
      
      $this->add_control(
			'button_text',
			[
				'label' => __( 'Button Text', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
      
     
      
        $this->add_control(
			'url',
			[
				'label' => __( 'Button URL', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
      
      
        
        $this->add_control(
			'link_target',
			[
				'label' => esc_html__( 'Open Link in', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '_blank',
				'options' => [
					'_blank' => esc_html__( 'New Tab', 'alioth-elementor' ),
					'_self' => esc_html__( 'Current Tab', 'alioth-elementor' ),
				]
			]
		);
      
      $this->add_control(
			'texts_position',
			[
				'label' => esc_html__( 'Texts Position', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'pos-top',
				'options' => [
					'pos-top' => esc_html__( 'Top', 'alioth-elementor' ),
					'pos-bottom' => esc_html__( 'Bottom', 'alioth-elementor' ),
	
				]
			]
		);
      
    $this->end_controls_section();
      
      $this->start_controls_section(
      'parallax_animation',
      [
        'label' => __( 'Parallax Animation', 'alioth-elementor' ),
      ]
    );
      
      $this->add_control(
			'parallax',
			[
				'label' => __( 'Parallax Animation', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'alioth-elementor ' ),
				'label_off' => __( 'No', 'alioth-elementor ' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
      
        $this->add_control(
			'parallax_direction',
			[
				'label' => esc_html__( 'Image Animation', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'up',
				'options' => [
					'up' => esc_html__( 'Up', 'alioth-elementor' ),
					'down' => esc_html__( 'Down', 'alioth-elementor' ),
	
				],
                'condition' => ['parallax' => 'yes',],
			]
		);
      
        $this->add_control(
			'parallax_strength',
			[
				'label' => esc_html__( 'Parallax Strength', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0.1,
				'max' => 100,
				'step' => 0.1,
				'default' => 0.1,
                'condition' => ['parallax' => 'yes',],
			]
		);
      
      
      
      
      $this->end_controls_section();
      
     
      
      		$this->start_controls_section(
			'image_box_styles',
			[
				'label' => esc_html__( 'Style', 'alioth-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

      
      $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
                'label' => __('Title Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .ap-cta-title',
			]
		);
      
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ap-cta-title' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'sub-title_typography',
                'label' => __('Fraction Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .ap-cta-sub-title',
			]
		);
      
        $this->add_control(
			'sub_title_color',
			[
				'label' => esc_html__( 'Sub Title Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ap-cta-sub-title' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
                'label' => __('Button Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .ap-cta-button a',
			]
		);
      
        $this->add_control(
			'navigation_color',
			[
				'label' => esc_html__( 'Button Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ap-cta-button a' => 'color: {{VALUE}}',
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
      
      $anim = '';

      
     

    ?>

<!--Products CTA-->
<div class="alioth-products-cta <?php echo esc_attr($settings['texts_position']); ?> dark">

    <!--CTA Image-->
    <div class="ap-cta-image">

        <img alt="<?php echo $settings['image']['alt'] ?>" src="<?php echo esc_url($settings['image']['url']); ?>">

    </div>
    <!--/CTA Image-->

    <!--CTA Details-->
    <div class="ap-cta-det">

        <!--CTA Sub-title-->
        <div class="ap-cta-sub-title"><?php echo esc_html($settings['sub-title']) ?></div>
        <!--/CTA Sub-title-->

        <!--CTA Title-->
        <div class="ap-cta-title"><?php echo esc_html($settings['title']) ?></div>
        <!--/CTA Title-->

        <!--CTA Button-->
        <div class="ap-cta-button">

            <a href="<?php echo esc_url($settings['url']) ?>" target="<?php echo esc_attr($settings['link_target']) ?>">
                <!--CTA URL-->
                <?php echo esc_html($settings['button_text']) ?> <i class="icofont-arrow-right"></i>
            </a>

        </div>
        <!--/CTA Button-->

    </div>
    <!--/CTA Details-->

</div>
<!--/Products CTA-->

<?php

    ?>

<?php
  }

}
