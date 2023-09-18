<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class AliothPersonalHead extends Widget_Base {
 
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
    return 'aliothpersonalhead';
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
    return __( 'Personal Head', 'alioth-elementor' );
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
    return 'eicon-person';
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
        'label' => __( 'Personal Head', 'alioth-elementor' ),
      ]
    );
      
        $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'welcome_text', [
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Welcome Text' , 'plugin-name' ),
			]
		);
      
        $this->add_control(
			'name', [
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Name' , 'plugin-name' ),

			]
		);
      
        $this->add_control(
			'sur_name', [
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Surname' , 'plugin-name' ),

			]
		);
      
        $this->add_control(
			'sub_text', [
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label' => esc_html__( 'Sub-text' , 'plugin-name' ),
				'label_block' => true,
                'rows' => 5
			]
		);
      
        $this->add_control(
			'button_text', [
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Button Text' , 'plugin-name' ),
			]
		);
      
        $this->add_control(
			'button_url', [
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Button URL' , 'plugin-name' ),
			]
		);
      
        $this->add_control(
			'will_anim',
			[
				'label' => __( 'Animate', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'No', 'alioth-elementor ' ),
				'label_off' => __( 'Yes', 'alioth-elementor ' ),
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
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'plugin-name' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .alioth-personal-head',
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
                'label' => __('Name Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .name-front'
			]
		);
    
      
        $this->add_control(
			'name_color',
			[
				'label' => esc_html__( 'Name Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .name-front' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'surname_typography',
                'label' => __('Surname Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .name-back'
			]
		);
    
      
        $this->add_control(
			'surname_color',
			[
				'label' => esc_html__( 'Surname Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .name-back' => 'color: {{VALUE}}',
				],
			]
		);
      
      $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'welc_typography',
                'label' => __('Welcome Text Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .aph-welc'
			]
		);
    
      
        $this->add_control(
			'welc_color',
			[
				'label' => esc_html__( 'Welcome Text Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .aph-welc' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'sub_typography',
                'label' => __('Sub Text Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .aph-sub-text'
			]
		);
    
      
        $this->add_control(
			'sub_color',
			[
				'label' => esc_html__( 'Sub Text Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .aph-sub-text' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
                'label' => __('Button Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .circular-button, {{WRAPPER}} .circular-button i '
			]
		);
    
      
        $this->add_control(
			'button_text_color',
			[
				'label' => esc_html__( 'Button Text Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .circular-button' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_control(
			'button_bg_color',
			[
				'label' => esc_html__( 'Button Background Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .circular-button' => 'background-color: {{VALUE}}',
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
          
        $anim = 'true';
      } else {
          $anim = 'false';
      }

    ?>

<!--Personal Head-->
<div data-animate="<?php echo $anim ?>" class="alioth-personal-head">

    <!--Personal Image-->
    <div class="aph-image">
        <img alt="<?php echo $settings['image']['alt'] ?>" src="<?php echo $settings['image']['url'] ?>">
    </div>
    <!--/Personal Image-->


    <!--Heading-->
    <div class="aph-name">

        <!--Front Text-->
        <span class="name-front"><?php echo $settings['name'] ?></span>
        <!--/Front Text-->

        <!--Back Text-->
        <span class="name-back"><?php echo $settings['sur_name'] ?></span>
        <!--/Back Text-->

    </div>
    <!--/Heading-->

    <!--Heading Sub Texts-->
    <div class="aph-details">

        <!--Welcome Text-->
        <div class="aph-welc"><?php echo $settings['welcome_text'] ?></div>
        <!--/Welcome Text-->

        <!--Welcome Sub Text-->
        <div class="aph-sub-text"><?php echo $settings['sub_text'] ?>
        </div>
        <!--/Welcome Sub Text-->

    </div>
    <!--/Heading Sub Texts-->

    <!--Circular Button-->
    <a class="circular-button scroller" href="<?php echo $settings['button_url'] ?>">
        <span><?php echo $settings['button_text'] ?><i class="icofont-arrow-down"></i></span>
    </a>
    <!--/Circular Button-->

</div>
<!--/Personal Head-->
<?php
  }

}
