<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class AliothTestimonials extends Widget_Base {
 
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
    return 'aliothtestimonials';
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
    return __( 'Testimonials', 'alioth-elementor' );
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
    return 'eicon-testimonial-carousel';
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
        'label' => __( 'Testimonials', 'alioth-elementor' ),
      ]
    );
      
       $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'testimonial_text', [
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Text' , 'plugin-name' ),
				'label_block' => true,
			]
		);
      
        $repeater->add_control(
			'testimonial_name', [
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Name' , 'plugin-name' ),
				'label_block' => true,
			]
		);
      
        $repeater->add_control(
			'testimonial_brand', [
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Brand' , 'plugin-name' ),
				'label_block' => true,
			]
		);
      

		$this->add_control(
			'testimonials_list',
			[
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'testimonial_text' => esc_html__( 'Testimonial #1', 'plugin-name' ),
						'testimonial_name' => esc_html__( 'Testimonal Name', 'plugin-name' ),
					],
					[
						'testimonial_text' => esc_html__( 'Testimonial #2', 'plugin-name' ),
						'testimonial_name' => esc_html__( 'Testimonal Name', 'plugin-name' ),
					],
				],
				'title_field' => '{{{ testimonial_text }}}',
			]
		);
      
      $this->add_control(
			'autoplay',
			[
				'label' => __( 'Autoplay', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'alioth-elementor ' ),
				'label_off' => __( 'No', 'alioth-elementor ' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
      
      $this->add_control(
			'autoplay_duration',
			[
				'label' => esc_html__( 'Autoplay Duration', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 0.1,
				'default' => 5,
                'condition' => ['autoplay' => 'yes']
			]
		);
      
        $this->add_control(
			'progress',
			[
				'label' => __( 'Progress Bar', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'alioth-elementor ' ),
				'label_off' => __( 'Hide', 'alioth-elementor ' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
      
        $this->add_control(
			'fraction',
			[
				'label' => __( 'Fraction', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'alioth-elementor ' ),
				'label_off' => __( 'Hide', 'alioth-elementor ' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
      
        $this->add_control(
			'navigation',
			[
				'label' => __( 'Navigation', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'alioth-elementor ' ),
				'label_off' => __( 'Hide', 'alioth-elementor ' ),
				'return_value' => 'yes',
				'default' => 'yes',
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
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
                'label' => __('Text Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .testimonial-text'
			]
		);
    
      
        $this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-text' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
                'label' => __('Name Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .testimonial-name'
			]
		);
    
      
        $this->add_control(
			'name_color',
			[
				'label' => esc_html__( 'Name Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-name' => 'color: {{VALUE}}',
				],
			]
		);
      
      $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'brand_typography',
                'label' => __('Brand Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .testimonial-brand'
			]
		);
    
      
        $this->add_control(
			'brand_color',
			[
				'label' => esc_html__( 'Brand Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-brand' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'navigation_typography',
                'label' => __('Navigation Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .a-test-prev i ,{{WRAPPER}} .a-test-next i'
			]
		);
    
      
        $this->add_control(
			'navigation_color',
			[
				'label' => esc_html__( 'Navigation Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .a-test-prev i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .a-test-next i' => 'color: {{VALUE}}',
				],
			]
		);
      
         $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'fraction_typography',
                'label' => __('Fraction Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .a-test-current ,{{WRAPPER}} .a-test-total'
			]
		);
    
      
        $this->add_control(
			'fraction_color',
			[
				'label' => esc_html__( 'Fraction Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .a-test-current' => 'color: {{VALUE}}',
					'{{WRAPPER}} .a-test-total' => 'color: {{VALUE}}',
				],
			]
		);
      

        $this->add_control(
			'progress_color',
			[
				'label' => esc_html__( 'Progress Bar Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .a-testimonials-count' => 'background-color: {{VALUE}}',
				],
			]
		);
        
        $this->add_control(
			'progress_fill_color',
			[
				'label' => esc_html__( 'Progress Bar Fill Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .a-testimonials-count span' => 'background-color: {{VALUE}}',
				],
			]
		);

       $this->add_control(
			'progress_height',
			[
				'label' => esc_html__( 'Progress Bar Height', 'plugin-name' ),
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
					'{{WRAPPER}} .a-testimonials-count' => 'height: {{SIZE}}{{UNIT}};',
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
      
      $autoplay = '';
      $duration = '';
      
      if ($settings['autoplay'] === 'yes') {
          
          $autoplay = 'autoplay';
          $duration = 'data-duration="' . $settings['autoplay_duration'] . '"';
      }

    ?>

<!--Testimonials-->
<div class="a-testimonials <?php echo $autoplay ?>" <?php echo $duration ?>>

    <!--Testimonals Controls (Don't touch)-->
    <div class="a-testimonals-control">

        <?php if ($settings['navigation'] === 'yes') { ?>
        <span class="a-test-prev"><i class="icofont-thin-left"></i></span>
        <?php } ?>

        <div class="a-test-frac">
               <?php if ($settings['fraction'] === 'yes') { ?>
            <span class="a-test-current">01</span>
             <?php } ?>
            
            <?php if ($settings['progress'] === 'yes') { ?>
            <div class="a-testimonials-count"><span></span></div>
             <?php } ?>
            
             <?php if ($settings['fraction'] === 'yes') { ?>
            <span class="a-test-total"></span>
             <?php } ?>
        </div>

        <?php if ($settings['navigation'] === 'yes') { ?>
        <span class="a-test-next"><i class="icofont-thin-right"></i></span>
        <?php } ?>
    </div>
    <!--/Testimonals Controls (Don't touch)-->

    <!--Testimonals Wrapper-->
    <div class="a-testimonials-wrapper">

        <?php foreach($settings['testimonials_list'] as $testimonial) { ?>

        <!--Testimonal-->
        <div class="a-testimonial">

            <!--Testimonal Text-->
            <div class="testimonial-text"><?php echo $testimonial['testimonial_text'] ?></div>
            <!--/Testimonal Text-->

            <!--Testimonal Meta-->
            <div class="testimonial-meta">

                <!--Testimonial Name-->
                <div class="testimonial-name"><?php echo $testimonial['testimonial_name'] ?></div>
                <!--/Testimonial Name-->

                <!--Testimonial Brand-->
                <div class="testimonial-brand"><?php echo $testimonial['testimonial_brand'] ?></div>
                <!--/Testimonial Brand-->

            </div>
            <!--/Testimonal Meta-->

        </div>
        <!--/Testimonal-->

        <?php } ?>

    </div>
    <!--/Testimonals Wrapper-->


</div>
<!--/Testimonials-->

<?php
  }

}
