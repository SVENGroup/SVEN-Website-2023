<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class AliothScrollableText extends Widget_Base {
 
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
    return 'aliothscrollabletext';
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
    return __( 'Scrollable Text', 'alioth-elementor' );
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
    return 'eicon-navigation-horizontal';
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
        'label' => __( 'Heading', 'alioth-elementor' ),
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
					]

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
				'selector' => '{{WRAPPER}} .ah-title *',
			]
		);
      
        $this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ah-title *' => 'color: {{VALUE}}',
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
					'align-right' => [
						'title' => esc_html__( 'Right', 'alioth-elementor' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'align-center',
				'toggle' => true,
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

      $text = $settings['text_wrap'];
      $text_type = $settings['text_type'];

    ?>


<div class="scrollable-text">

    <div class="ah-title">

        <?php  echo '<' . $text_type . '>'. $text . '</' . $text_type . '>'; ?>
    </div>
</div>


<?php
  }

}
