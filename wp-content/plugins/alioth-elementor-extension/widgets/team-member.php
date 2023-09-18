<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class AliothTeamMember extends Widget_Base {
 
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
    return 'aliothteammeber';
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
    return __( 'Team Member', 'alioth-elementor' );
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
    return 'eicon-preferences';
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
        'label' => __( 'Image Box', 'alioth-elementor' ),
      ]
    );
      
    $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Member Image', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
      
      $this->add_control(
			'name',
			[
				'label' => __( 'Name', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
      
      $this->add_control(
			'title',
			[
				'label' => __( 'Title', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
      
      
  		$repeater = new \Elementor\Repeater();
      
       $repeater->add_control(
			'social_text',
			[
				'label' => __( 'Social Text', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
      
     
      
        $repeater->add_control(
			'social_url',
			[
				'label' => __( 'URL', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'socials',
			[
				'label' => esc_html__( 'Projects', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'show_label' => false,
                'default' => [
					[
						'social_text' => esc_html__( 'Facebook', 'plugin-name' ),
						'social_url' => esc_html__( '#', 'plugin-name' ),
					],
                    [
						'social_text' => esc_html__( 'Twitter', 'plugin-name' ),
						'social_url' => esc_html__( '#', 'plugin-name' ),
					],
		
				],
                'title_field' => '{{{ social_text }}}',
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
				'label' => esc_html__( 'Image Animation', 'alioth-elementor' ),
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
      
     
      
      		$this->start_controls_section(
			'image_box_styles',
			[
				'label' => esc_html__( 'Style', 'alioth-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

      
      $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
                'label' => __('Title Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .ap-cta-title',
			]
		);
      
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ap-cta-title' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'sub-title_typography',
                'label' => __('Fraction Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .ap-cta-sub-title',
			]
		);
      
        $this->add_control(
			'sub_title_color',
			[
				'label' => esc_html__( 'Sub Title Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ap-cta-sub-title' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
                'label' => __('Button Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .ap-cta-button a',
			]
		);
      
        $this->add_control(
			'navigation_color',
			[
				'label' => esc_html__( 'Button Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ap-cta-button a' => 'color: {{VALUE}}',
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
      
       $socials = $settings['socials'];

    ?>



<!--Team Member-->
<div class="alioth-team-member">

    <!--Team Member Image-->
    <div class="member-image">

        <img alt="<?php echo $settings['image']['alt'] ?>" src="<?php echo $settings['image']['url']; ?>">

    </div>
    <!--/Team Member Image-->

    <!--Team Member Meta-->
    <div class="member-meta">

        <!--Team Member Name-->
        <div class="member-name"><?php echo $settings['name']; ?></div>
        <!--/Team Member Name-->

        <!--Team Member Title-->
        <div class="member-title"><?php echo $settings['title']; ?></div>
        <!--/Team Member Title-->

    </div>
    <!--/Team Member Meta-->

    <!--Team Member Socials-->
    <div class="member-socials">
        <ul>

            <?php foreach ($socials as $social) { ?>
            <li><a href="<?php echo esc_url($social['social_url']); ?>"><?php echo esc_html($social['social_text']); ?></a></li>
            <?php } ?>
        </ul>
    </div>
    <!--/Team Member Socials-->

</div>
<!--/Team Member-->

<?php

    ?>

<?php
  }

}
