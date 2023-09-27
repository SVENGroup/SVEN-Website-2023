<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class AliothAwards extends Widget_Base {
 
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
    return 'aliothawards';
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
    return __( 'Awards', 'alioth-elementor' );
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
    return 'eicon-archive-posts';
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
			'award_name',
			[
				'label' => esc_html__( 'Award', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

      $repeater ->add_control(
			'award_institute',
			[
				'label' => esc_html__( 'Institute', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
      
      $repeater ->add_control(
			'award_year',
			[
				'label' => esc_html__( 'Year', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
      
      $repeater ->add_control(
			'award_url',
			[
				'label' => esc_html__( 'URL', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'awards',
			[
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'award_name' => esc_html__( 'Award #1', 'plugin-name' ),
					],
					[
						'award_name' => esc_html__( 'Award #2', 'plugin-name' ),
					],
				],
				'title_field' => '{{{ award_name }}}',
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
				'default' => 0.75,
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
				'default' => 0,
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
				'name' => 'award_typography',
                'label' => __('Award Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .award-title'
			]
		);
    
      
        $this->add_control(
			'award_color',
			[
				'label' => esc_html__( 'Award Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .award-title' => 'color: {{VALUE}}',
				],
			]
		);
      
      $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'institute_typography',
                'label' => __('Institute Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .award-loc'
			]
		);
    
      
        $this->add_control(
			'institute_color',
			[
				'label' => esc_html__( 'Institute Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .award-loc' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'year_typography',
                'label' => __('Year Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .award-date'
			]
		);
    
      
        $this->add_control(
			'year_color',
			[
				'label' => esc_html__( 'Year Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .award-date' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_control(
			'seperator_color',
			[
				'label' => esc_html__( 'Seperator Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .a-award::after' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} .a-award::after' => 'height: {{SIZE}}{{UNIT}};',
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

<!--Alioth Awards-->
<div <?php echo $anim ?> class="alioth-awards <?php echo esc_attr($layout); ?>">
    
    <?php foreach ($settings['awards'] as $award) { ?>
    <!--Award-->
    <div class="a-award">

        <!--Award URL--><a href="<?php echo $award['award_url'] ?>">

            <div class="award-dets">
                <!--Alioth Awwards-->
                <div class="award-title"><?php echo $award['award_name'] ?></div>
                <!--/Alioth Awwards-->

                <!--Award Concern-->
                <div class="award-loc"><?php echo $award['award_institute'] ?></div>
                <!--/Award Concern-->

            </div>

            <!--Award Date-->
            <div class="award-date"><?php echo $award['award_year'] ?></div>
            <!--/Award Date-->

        </a>
        
    </div>
    <!--/Award-->
<?php } ?>

</div>
<!--/Alioth Awwards-->
<?php
  }

}
