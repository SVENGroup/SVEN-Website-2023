<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class AliothList extends Widget_Base {
 
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
    return 'aliothlist';
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
    return __( 'List', 'alioth-elementor' );
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
    return 'eicon-editor-list-ul';
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
        'label' => __( 'Awards', 'alioth-elementor' ),
      ]
    );

       $repeater = new \Elementor\Repeater();

		$repeater ->add_control(
			'text',
			[
				'label' => esc_html__( 'Text', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

      $repeater ->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'desc' => esc_html__( 'Leave it empty if you dont want to link your lis item', 'plugin-name' ),
			]
		);
    
		$this->add_control(
			'list',
			[
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'text' => esc_html__( 'List item #1', 'plugin-name' ),
					],
					[
						'text' => esc_html__( 'List item #2', 'plugin-name' ),
					],
				],
				'title_field' => '{{{ text }}}',
			]
		);
      
    
      
    $this->end_controls_section();
      
      $this->start_controls_section(
			'style',
			[
                
				'label' => esc_html__( 'Style', 'alioth-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
                'label' => __('Text Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} ul li'
			]
		);
    
      
        $this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} ul li' => 'color: {{VALUE}}',
					'{{WRAPPER}} ul li a' => 'color: {{VALUE}}',
					'{{WRAPPER}} ul li a::before' => 'background-color: {{VALUE}}',
				],
			]
		);
      
    
        $this->add_control(
			'text_hover_color',
			[
				'label' => esc_html__( 'Text Color (Hover)', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} ul li a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} ul li a::after' => 'background-color: {{VALUE}}',
				],
			]
		);
      
    
      
        $this->add_control(
			'link_underline_color',
			[
				'label' => esc_html__( 'Link Underline Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} ul li a::after' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} ul li a::before' => 'background-color: {{VALUE}}',
				],
			]
		);
      
       $this->add_control(
			'underline_height',
			[
				'label' => esc_html__( 'Underline Height', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} ul li a::after' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} ul li a::before' => 'height: {{SIZE}}{{UNIT}};',
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

<!--Alioth Awards-->
<div class="alioth-list <?php echo esc_attr($layout); ?>">
    <ul>
    <?php foreach ($settings['list'] as $item) { ?>
        
        <?php if ($item['link']) { ?>
            
        <li><a href="<?php echo esc_url($item['link']) ?>"><?php echo esc_html($item['text']) ?></a></li>
        
        <?php } else { ?>

        <li><?php echo esc_html($item['text']) ?></li>
        
        <?php } ?>
        
<?php } ?>
</ul>
</div>
<!--/Alioth Awwards-->
<?php
  }

}
