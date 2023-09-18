<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class AliothNumberCounter extends Widget_Base {
 
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
    return 'aliothnumbercounter';
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
    return __( 'Number Counter', 'alioth-elementor' );
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
    return 'eicon-counter';
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

        $projects = get_posts( [
            'post_type'  => 'portfolio',
        ] );

        foreach ( $projects as $project ) {
            $options[ $project->ID ] = $project->post_title;
        }
      
      
    $this->start_controls_section(
      'widget_content',
      [
        'label' => __( 'Number Counter', 'alioth-elementor' ),
      ]
    );
      
        $this->add_control(
			'number',
			[
				'label' => esc_html__( 'Number', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100000000,
				'step' => 1,
				'default' => 50,
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'number_typography',
                'label' => __('Number Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .ac-number',
			]
		);
      
        $this->add_control(
			'number_color',
			[
				'label' => esc_html__( 'Number Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ac-number' => 'color: {{VALUE}}',
				],
			]
		);
      
      $this->add_control(
			'sign',
			[
				'label' => esc_html__( 'Sign', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

      
       
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'icon_typography',
                'label' => __('Icon Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .ac-sign i',
			]
		);
      
        $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ac-sign i' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_control(
			'text',
			[
				'label' => esc_html__( 'Text', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
                'label' => __('Text Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .ac-title',
			]
		);
      
        $this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ac-title' => 'color: {{VALUE}}',
				],
			]
		);

      $this->add_control(
			'animate',
			[
				'label' => __( 'Animate on Scroll?', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'alioth-elementor ' ),
				'label_off' => __( 'No', 'alioth-elementor ' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
      
      $this->add_control(
			'anim_delay',
			[
				'label' => esc_html__( 'Animation Delay', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0.1,
				'max' => 100,
				'step' => 0.1,
				'default' => 0.1,
                'condition' => ['animate' => 'yes',],
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
				'label' => esc_html__( 'Parallax Animation', 'alioth-elementor' ),
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

    ?>


<!--Number Counter-->
<div data-delay="0" class="a-number-counter light">

    <!--Number-->
    <div class="ac-number"><?php echo $settings['number'] ?></div>

    <!--Seperator-->
    <span class="ac-sign"><?php echo $settings['sign'] ?></span>
    <!--/Seperator-->

    <!--/Number-->

    <!--Counter Title-->
    <div class="ac-title"><?php echo $settings['text'] ?></div>
    <!--/Counter Title-->

</div>
<!--/Number Counter-->

<?php

    ?>

<?php
  }

}
