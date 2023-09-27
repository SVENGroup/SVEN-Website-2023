<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class AliothServices extends Widget_Base {
 
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
    return 'aliothservices';
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
    return __( 'Services', 'alioth-elementor' );
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
    return 'eicon-menu-bar';
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
        'label' => __( 'Services', 'alioth-elementor' ),
      ]
    );
      
       $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Service Title' , 'plugin-name' ),
				'label_block' => true,
			]
		);
      

      $repeater ->add_control(
			'content',
			[
				'label' => esc_html__( 'Service Content', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
			]
		);


		$this->add_control(
			'services_list',
			[
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => esc_html__( 'Service #1', 'plugin-name' ),
					],
					[
						'title' => esc_html__( 'Service #2', 'plugin-name' ),
					],
				],
				'title_field' => '{{{ title }}}',
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
			'anim_duration',
			[
				'label' => esc_html__( 'Animation Duration', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0.1,
				'max' => 100,
				'step' => 0.1,
				'default' => 1,
                'condition' => ['will_anim' => 'yes',],
			]
		);
      
        $this->add_control(
			'anim_delay',
			[
				'label' => esc_html__( 'Animation Delay', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'step' => 0.1,
				'default' => 0.7,
                'condition' => ['will_anim' => 'yes',],
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
                'label' => __('Title Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .service-title'
			]
		);
    
      
        $this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Title Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-title' => 'color: {{VALUE}}',
				],
			]
		);
      
      $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'icon_typography',
                'label' => __('Icon Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .service-toggle i'
			]
		);
    
      
        $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-toggle i' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_control(
			'seperator_color',
			[
				'label' => esc_html__( 'Seperator Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .alioth-services .service::after' => 'background-color: {{VALUE}}',
				],
			]
		);
      
        $this->add_control(
			'seperator_active_color',
			[
				'label' => esc_html__( 'Seperator Active Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .alioth-services .service-wrap::before' => 'background-color: {{VALUE}}',
				],
			]
		);
      
       $this->add_control(
			'seperator_height',
			[
				'label' => esc_html__( 'Seperator Height', 'plugin-name' ),
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
					'{{WRAPPER}} .service-wrap::before, {{WRAPPER}} .alioth-services .service::after' => 'height: {{SIZE}}{{UNIT}};',
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
      
      $anim = '' ;
      
      if ($settings['will_anim'] === 'yes') {
          
          $willAnim = 'data-anim="true"';
          $delay = 'data-delay="' . $settings['anim_delay'] . '"';
          $duration = 'data-duration="' . $settings['anim_duration'] . '"';
          $layout = $settings['widget_layout'];
          
          $anim = $willAnim . $delay . $duration;
      } 

    ?>

<!--Alioth Services-->
<div <?php echo $anim; ?> class="alioth-services <?php echo esc_attr($layout) ?>">

    <!--Services Wrapper-->
    <div class="services">

        <?php foreach ($settings['services_list'] as $service) { ?>

        <!--Service-->
        <div class="service">

            <!--Service Title-->
            <div class="service-title"><?php echo $service['title'] ?></div>
            <!--/Service Title-->

            <!--Service Toggle (Don't touch)-->
            <div class="service-toggle">
                <i class="icofont-thin-down"></i>
            </div>
            <!--/Service Toggle (Don't touch)-->

            <!--Service Content Wrapper-->
            <div class="service-wrap">

                <!--Service Content-->
                <div class="service-cont">

                    <?php echo $service['content'] ?>

                </div>
                <!--/Service Content-->

            </div>
            <!--/Service Content Wrapper-->

        </div>
        <!--/Service-->

        <?php } ?>


    </div>
    <!--/Services Wrapper-->

</div>
<!--/Alioth Services-->

<?php
  }

}
