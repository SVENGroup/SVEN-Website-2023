<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class AliothTextWrapper extends Widget_Base {
 
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
    return 'aliothtextwrapper';
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
    return __( 'Text Wrapper', 'alioth-elementor' );
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
    return 'eicon-animation-text';
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
        'label' => __( 'Text Wrapper', 'alioth-elementor' ),
      ]
    );
      
    $this->add_control(
			'text_wrap',
			[
				'label' => esc_html__( 'Text', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'placeholder' => __('Enter your text here.' , 'alioth-elementor')
			]
		);
      
        $this->add_control(
			'text_type',
			[
				'label' => esc_html__( 'Text Type', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'h1' => [
						'title' => esc_html__( 'H1', 'alioth-elementor' ),
						'icon' => ' eicon-editor-h1',
					],
                    'h2' => [
						'title' => esc_html__( 'H2', 'alioth-elementor' ),
						'icon' => ' eicon-editor-h2',
					],
                    'h3' => [
						'title' => esc_html__( 'H3', 'alioth-elementor' ),
						'icon' => ' eicon-editor-h3',
					],
                    'h4' => [
						'title' => esc_html__( 'H4', 'alioth-elementor' ),
						'icon' => ' eicon-editor-h4',
                    ],
                    'h5' => [
						'title' => esc_html__( 'H5', 'alioth-elementor' ),
						'icon' => ' eicon-editor-h5',
					],
                    'h6' => [
						'title' => esc_html__( 'H6', 'alioth-elementor' ),
						'icon' => ' eicon-editor-h6',
					],
                    'p' => [
						'title' => esc_html__( 'Paragraph', 'alioth-elementor' ),
						'icon' => ' eicon-editor-paragraph',
					],

				],
				'default' => 'h1',
				'toggle' => true,
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
                'label' => __('Text Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .text-wrapper *',
			]
		);
      
        $this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .text-wrapper *' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'text_alignment',
			[
				'label' => esc_html__( 'Text Alignment', 'alioth-elementor' ),
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
				'default' => 'align-left',
				'toggle' => true,
			]
		);
      
      
        $this->add_control(
			'at_animation',
			[
				'label' => esc_html__( 'Text Animation', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none' => esc_html__( 'None', 'alioth-elementor' ),
					'linesUp' => esc_html__( 'Lines Up', 'alioth-elementor' ),
					'linesDown' => esc_html__( 'Lines Down', 'alioth-elementor' ),
					'linesLeft' => esc_html__( 'Lines Left', 'alioth-elementor' ),
					'linesRight' => esc_html__( 'Lines Right', 'alioth-elementor' ),
                    'linesFadeUp' => esc_html__( 'Lines Fade Up', 'alioth-elementor' ),
					'linesFadeDown' => esc_html__( 'Lines Fade Down', 'alioth-elementor' ),
					'linesFadeLeft' => esc_html__( 'Lines Fade Left', 'alioth-elementor' ),
					'linesFadeRight' => esc_html__( 'Lines Fade Right', 'alioth-elementor' ),
					'wordsUp' => esc_html__( 'Words Up', 'alioth-elementor' ),
					'wordsDown' => esc_html__( 'Words Down', 'alioth-elementor' ),
					'wordsLeft' => esc_html__( 'Words Left', 'alioth-elementor' ),
					'wordsRight' => esc_html__( 'Words Right', 'alioth-elementor' ),
					'wordsFadeUp' => esc_html__( 'Words Fade Up', 'alioth-elementor' ),
					'wordsFadeDown' => esc_html__( 'Words Fade Down', 'alioth-elementor' ),
					'wordsFadeLeft' => esc_html__( 'Words Fade Left', 'alioth-elementor' ),
					'wordsFadeRight' => esc_html__( 'Words Fade Right', 'alioth-elementor' ),
					'charsUp' => esc_html__( 'Chars Up', 'alioth-elementor' ),
					'charsDown' => esc_html__( 'Chars Down', 'alioth-elementor' ),
					'charsLeft' => esc_html__( 'Chars Left', 'alioth-elementor' ),
					'charsRight' => esc_html__( 'Chars Right', 'alioth-elementor' ),
					'charsFadeUp' => esc_html__( 'Chars Fade Up', 'alioth-elementor' ),
					'charsFadeDown' => esc_html__( 'Chars Fade Down', 'alioth-elementor' ),
					'charsFadeLeft' => esc_html__( 'Chars Fade Left', 'alioth-elementor' ),
					'charsFadeRight' => esc_html__( 'Chars Fade Right', 'alioth-elementor' ),


				],
			]
		);
      
        $this->add_control(
			'at_duration',
			[
				'label' => esc_html__( 'Animation Duration', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'step' => 0.1,
				'default' => 1.5,
                'condition' => ['at_animation' => ['linesUp','linesDown','linesLeft','linesRight','linesFadeUp','linesFadeDown','linesFadeLeft','linesFadeRight','wordsUp','wordsDown','wordsLeft','wordsRight','wordsFadeUp','wordsFadeDown','wordsFadeLeft','wordsFadeRight','charsUp','charsDown','charsLeft','charsRight','charsFadeUp','charsFadeDown','charsFadeLeft','charsFadeRight']],
			]
		);
      
        $this->add_control(
			'at_delay',
			[
				'label' => esc_html__( 'Animation Delay', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'step' => 0.01,
				'default' => 0.1,
                'condition' => ['at_animation' => ['linesUp','linesDown','linesLeft','linesRight','linesFadeUp','linesFadeDown','linesFadeLeft','linesFadeRight','wordsUp','wordsDown','wordsLeft','wordsRight','wordsFadeUp','wordsFadeDown','wordsFadeLeft','wordsFadeRight','charsUp','charsDown','charsLeft','charsRight','charsFadeUp','charsFadeDown','charsFadeLeft','charsFadeRight']],
			]
		);
      
        $this->add_control(
			'at_stagger',
			[
				'label' => esc_html__( 'Animation Stagger', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'step' => 0.01,
				'default' => 0.05,
                'condition' => ['at_animation' => ['linesUp','linesDown','linesLeft','linesRight','linesFadeUp','linesFadeDown','linesFadeLeft','linesFadeRight','wordsUp','wordsDown','wordsLeft','wordsRight','wordsFadeUp','wordsFadeDown','wordsFadeLeft','wordsFadeRight','charsUp','charsDown','charsLeft','charsRight','charsFadeUp','charsFadeDown','charsFadeLeft','charsFadeRight']],
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
      
      $anim = '';
      $animation = $settings['at_animation'];
      $delay = $settings['at_delay'];
      $duration = $settings['at_duration'];
      $stagger = $settings['at_stagger'];
      $text = $settings['text_wrap'];
      $text_type = $settings['text_type'];
      
      if ($animation !== 'none') {
          
          $anim = 'class="has-anim"' . ' ' . 'data-animation="' . $animation . '"' . ' ' . 'data-duration="'. $duration .'"' . ' ' . 'data-delay="' . $delay . '"' . ' ' . 'data-stagger="' . $stagger . '"';
          
      };


    ?>


<div class="text-wrapper <?php echo esc_attr($settings['text_alignment']) ?>">

    <?php  echo '<' . $text_type . ' ' . $anim .'>'. $text . '</' . $text_type . '>'; ?>

</div>

<?php

    ?>

<?php
  }

}
