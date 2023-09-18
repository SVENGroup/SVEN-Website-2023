<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class AliothImageCarousel extends Widget_Base {
 
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
    return 'aliothimagecarousel';
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
    return __( 'Image Carousel', 'alioth-elementor' );
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
    return 'eicon-slider-push';
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
        'label' => __( 'Image Carousel', 'alioth-elementor' ),
      ]
    );
      
        $this->add_control(
			'images',
			[
				'label' => esc_html__( 'Add Images', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
			]
		);
      
      $this->add_control(
			'navigation_type',
			[
				'label' => esc_html__( 'Carousel Navigation', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'scroll',
				'options' => [
					'scroll' => esc_html__( 'Scroll', 'alioth-elementor' ),
					'drag' => esc_html__( 'Drag', 'alioth-elementor' ),
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

<!-- Image Carousel -->
<div data-navigate="<?php echo esc_attr($settings['navigation_type']); ?>" class="alioth-image-carousel">

    <!-- Carousel Wrapper -->
    <div class="ai-wrapper">
        
       <?php foreach ( $settings['images'] as $image ) { ?>
        
        <!-- Carousel Image -->
        <div class="ai-image">
            <img alt="<?php echo esc_attr($image['alt']) ?>" src="<?php echo esc_attr($image['url']) ?>">
        </div>
        <!-- /Carousel Image -->
        
        <?php } ?>

    </div>
    <!-- /Carousel Wrapper -->

</div>
<!-- /Image Carousel -->

<?php

    ?>

<?php
  }

}
