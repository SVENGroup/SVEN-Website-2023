<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class AliothPageNav extends Widget_Base {
 
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
    return 'aliothpagenav';
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
    return __( 'Page Navigation', 'alioth-elementor' );
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
    return 'eicon-page-transition';
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
        'label' => __( 'Page Navigation', 'alioth-elementor' ),
      ]
    );
      
        $this->add_control(
			'button_title',
			[
				'label' => __( 'Button Title', 'alioth-elementor'),
				'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
      
      $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
                'label' => __('Title Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .page-title',
			]
		);
      
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .page-title' => 'color: {{VALUE}}',
				],
			]
		);
      
      $this->add_control(
			'sub_title',
			[
				'label' => __( 'Sub-Title', 'alioth-elementor'),
				'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
      
      $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'sub_title_typography',
                'label' => __('Sub-title Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .page-sub-title',
			]
		);
      
        $this->add_control(
			'sub_title_color',
			[
				'label' => esc_html__( 'Sub-title Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .page-sub-title' => 'color: {{VALUE}}',
				],
			]
		);
      
      $this->add_control(
			'background_color',
			[
				'label' => esc_html__( 'Background Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .alioth-page-nav' => 'background-color: {{VALUE}}',
				],
			]
		);
      
      $this->add_control(
			'button_url',
			[
				'label' => __( 'Link', 'alioth-elementor'),
				'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
        
      $this->add_control(
			'button_target',
			[
				'label' => esc_html__( 'Link Target', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '_self',
				'options' => [
					'_blank' => esc_html__( 'New Tab', 'alioth-elementor' ),
					'_self' => esc_html__( 'Current Tab', 'alioth-elementor' ),
				
				],
			]
		);
      
      $this->add_control(
			'widget_layout',
			[
				'label' => esc_html__( 'Widget Layout', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'light',
				'options' => [
					'light' => esc_html__( 'Light', 'alioth-elementor' ),
					'dark' => esc_html__( 'Dark', 'alioth-elementor' ),
	
				],
			]
		);
      $this->add_control(
			'animate_duration',
			[
				'label' => __( 'Animation Duration', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 8000,
               
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


<!-- Page Nav -->
<div class="alioth-page-nav <?php echo esc_attr($settings['widget_layout']); ?>" data-duration="<?php echo $settings['animate_duration'] ?>">

    <!--Page URL-->
    <a target="<?php echo $settings['button_target'] ?>" href="<?php echo $settings['button_url'] ?>">

        <!-- Page Title -->
        <div class="page-title"><?php echo $settings['button_title'] ?></div>
        <!-- /Page Title -->

        <!-- Page Sub-Title -->
        <div class="page-sub-title"><?php echo $settings['sub_title'] ?></div>
        <!-- /Page Sub-Title -->

    </a>

</div>
<!-- /Page Nav -->

<?php

    ?>

<?php
  }

}
