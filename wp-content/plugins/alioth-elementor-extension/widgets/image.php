<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class AliothSingleImage extends Widget_Base {
 
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
    return 'aliothsingleimage';
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
    return __( 'Single Image', 'alioth-elementor' );
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
    return 'eicon-image';
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
        'label' => __( 'Single Image', 'alioth-elementor' ),
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
			'width',
			[
				'label' => esc_html__( 'Image Width', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .single-image' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        
        $this->add_control(
			'image_alignment',
			[
				'label' => esc_html__( 'Image Alignment', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'align-left' => [
						'title' => esc_html__( 'Left', 'alioth-elementor' ),
						'icon' => 'eicon-h-align-left',
					],
					'align-center' => [
						'title' => esc_html__( 'Center', 'alioth-elementor' ),
						'icon' => 'eicon-h-align-center',
					],
					'align-right' => [
						'title' => esc_html__( 'Right', 'alioth-elementor' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
			]
		);
      
        $this->add_control(
			'interaction',
			[
				'label' => esc_html__( 'Image Interaction', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none' => esc_html__( 'None', 'alioth-elementor' ),
					'lightbox' => esc_html__( 'Lightbox', 'alioth-elementor' ),
					'custom_url' => esc_html__( 'Custom URL', 'alioth-elementor' ),
				],
                
			]
		);
      
        $this->add_control(
			'image_url',
			[
				'label' => __( 'Link', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [ 'interaction' => 'custom_url' ]
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
				],
                'condition' => [ 'interaction' => 'custom_url' ]
			]
		);
      
        $this->add_control(
			'ai_animation',
			[
				'label' => esc_html__( 'Image Animation', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none' => esc_html__( 'None', 'alioth-elementor' ),
					'blockUp' => esc_html__( 'Block Up', 'alioth-elementor' ),
					'blockDown' => esc_html__( 'Block Down', 'alioth-elementor' ),
					'blockLeft' => esc_html__( 'Block Left', 'alioth-elementor' ),
					'blockRight' => esc_html__( 'Block Right', 'alioth-elementor' ),
					'slideUp' => esc_html__( 'Slide Up', 'alioth-elementor' ),
					'slideDown' => esc_html__( 'Slide Down', 'alioth-elementor' ),
					'slideLeft' => esc_html__( 'Slide Left', 'alioth-elementor' ),
					'slideRight' => esc_html__( 'Slide Right', 'alioth-elementor' ),
				],
			]
		);
        
        $this->add_control(
			'block_color',
			[
				'label' => esc_html__( 'Block Color', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .title' => 'background-color: {{VALUE}}',
				],
                'condition' => ['ai_animation' => ['blockUp', 'blockDown','blockRight', 'blockLeft']],
                'default' => '#fff'
			]
		);
      
        $this->add_control(
			'ai_duration',
			[
				'label' => esc_html__( 'Animation Duration', 'alioth-elementor' ),
				'description' => esc_html__( 'Set animation duration (s).', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0.1,
				'max' => 100,
				'step' => 0.1,
				'default' => 0.8,
                'condition' => ['ai_animation' => ['blockUp', 'blockDown','blockRight', 'blockLeft','slideUp', 'slideDown','slideRight', 'slideLeft']],
			]
		);
      
        $this->add_control(
			'ai_delay',
			[
				'label' => esc_html__( 'Delay', 'alioth-elementor' ),
				'description' => esc_html__( 'Set animation delay (s).', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'step' => 0.1,
				'default' => 0,
                'condition' => ['ai_animation' => ['blockUp', 'blockDown','blockRight', 'blockLeft','slideUp', 'slideDown','slideRight', 'slideLeft']],
			]
		);
      
        $this->add_control(
			'parallax',
			[
				'label' => __( 'Parallax Image', 'alioth-elementor ' ),
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
				'label' => esc_html__( 'Parallax Direction', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'directional',
				'options' => [
					'directional' => esc_html__( 'Directional', 'alioth-elementor' ),
					'zoom' => esc_html__( 'Zoom', 'alioth-elementor' ),
	
				],
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
      
      $anim = '';
      $animation = $settings['ai_animation'];
      $delay = $settings['ai_delay'];
      $duration = $settings['ai_duration'];
      $color = $settings['block_color'];
      $interaction = $settings['interaction'];
      $lightbox = '';
      
      if ($animation !== 'none') {
          
          $anim = 'class="has-anim"' . ' ' . 'data-animation="' . $animation . '"' . ' ' . 'data-duration="'. $duration .'"' . ' ' . 'data-delay="' . $delay . '"' . ' ' . 'data-color="' . $color . '"';
          
      };
      
      if ($interaction === 'lightbox') {
          
          $lightbox = 'data-lightbox="' . $settings['image']['url'] . '"';
      }
      
      if ($settings['parallax'] === 'yes') {
          
        $this->add_render_attribute(
		'parallax_attrs',
		[
			'data-parallax' =>  'true',
			'data-parallax-type' =>  $settings['parallax_direction'],

		]
	);
          
      }
      
    

    ?>

<!--Single Image-->
<div <?php echo $lightbox .  $this->get_render_attribute_string( 'parallax_attrs' ); ?> class="single-image <?php echo esc_attr($settings['image_alignment']) ?>">

    <?php           
          if ($interaction === 'custom_url'){
              $customUrl = $settings['image_url'];
              $linkTarget = $settings['link_target'];
                
             echo '<a href="' . $customUrl . '" target="' . $linkTarget .'">';
          } ?>

    <img <?php echo $anim ?> alt="<?php echo $settings['image']['alt'] ?>" src="<?php echo esc_attr($settings['image']['url']) ?>">

    <?php           
          if ($interaction === 'custom_url'){
              
              echo'</a>';
    } ?>

</div>
<!--/Single Image-->

<?php

    ?>

<?php
  }

}
