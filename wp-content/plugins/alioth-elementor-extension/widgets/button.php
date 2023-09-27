<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class AliothButton extends Widget_Base {
 
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
    return 'aliothbutton';
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
    return __( 'Button', 'alioth-elementor' );
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
    return 'eicon-button';
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
        'label' => __( 'Button', 'alioth-elementor' ),
      ]
    );
      
      $this->add_control(
			'button_style',
			[
				'label' => esc_html__( 'Button Style', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'button-classic',
				'options' => [
					'button-classic'  => esc_html__( 'Classic', 'plugin-name' ),
					'button-text' => esc_html__( 'Text', 'plugin-name' ),
				],
			]
		);
      
      $this->add_control(
			'button_layout',
			[
				'label' => esc_html__( 'Button Layout', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'dark',
				'options' => [
					'dark'  => esc_html__( 'Dark', 'plugin-name' ),
					'light' => esc_html__( 'Light', 'plugin-name' ),
				],
			]
		);
      
        $this->add_control(
			'button_text',
			[
				'label' => __( 'Button Text', 'alioth-elementor'),
				'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
			]
            );
      
        $this->add_control(
			'button_url',
			[
				'label' => __( 'Button URL', 'alioth-elementor'),
				'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
			]
            );
        
        $this->add_control(
			'button_icon',
			[
				'label' => esc_html__( 'Icon', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-arrow-right',
					'library' => 'solid',
				],
			]
		);
      
       $this->add_control(
			'button_alignment',
			[
				'label' => esc_html__( 'Button Alignment', 'alioth-elementor' ),
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
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'icon_typography',
                'label' => __('Icon Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .a-button i',
			]
		);
      
        $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .a-button i' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_text_typography',
                'label' => __('Button Text Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .a-button a',
			]
		);
      
        $this->add_control(
			'button_text_color',
			[
				'label' => esc_html__( 'Button Text Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .a-button a' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_control(
			'button_bg_color',
			[
				'label' => esc_html__( 'Button Background Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .a-button' => 'background-color: {{VALUE}}',
				],
			]
		);
      
        $this->add_control(
			'button_hover_bg_color',
			[
				'label' => esc_html__( 'Button Hover Background Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .a-button.light::before, .a-button.style_1::before' => 'background-color: {{VALUE}}',
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

    ?>

<!--Button-->
<div class="alioth-button <?php echo esc_attr($settings['button_alignment'] . ' ' . $settings['button_style'] . ' ' . $settings['button_layout']); ?>">

    <div class="a-button style_1 light">

        <!--Button URL-->
        <a href="<?php echo $settings['button_url'] ?>"><?php echo $settings['button_text'] ?>

            <!--Button Icon-->
            <?php \Elementor\Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
            <!--/Button Icon-->

        </a>
        <!--/Button URL-->

    </div>

</div>
    <!--/Button-->

<?php
  }

}
