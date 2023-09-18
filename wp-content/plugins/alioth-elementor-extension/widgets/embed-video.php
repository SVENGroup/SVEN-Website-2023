<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class AliothEmbedVideo extends Widget_Base {
 
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
    return 'aliothembedvideo';
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
    return __( 'Embed Video', 'alioth-elementor' );
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
    return 'eicon-youtube';
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
	
      
        $options = [];

        $projects = get_posts( [
            'post_type'  => 'portfolio',
        ] );

        foreach ( $projects as $project ) {
            $options[ $project->ID ] = $project->post_title;
        }
      
      
    $this->start_controls_section(
      'widget_content',
      [
        'label' => __( 'Embed Video', 'alioth-elementor' ),
      ]
    );
      
        $this->add_control(
			'video_id',
			[
				'label' => __( 'Video ID', 'alioth-elementor'),
				'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
			]
            );
        
      $this->add_control(
			'video_provider',
			[
				'label' => esc_html__( 'Video Provider', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'vimeo',
				'options' => [
					'vimeo' => esc_html__( 'Vimeo', 'alioth-elementor' ),
					'youtube' => esc_html__( 'YouTube', 'alioth-elementor' ),
				],
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
			'interaction',
			[
				'label' => __( 'Interaction', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'alioth-elementor ' ),
				'label_off' => __( 'No', 'alioth-elementor ' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
      
      $this->add_control(
			'video_poster',
			[
				'label' => esc_html__( 'Video Poster', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
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
      
      $provider = $settings['video_provider'];
      
      if ('yes' === $settings['autoplay']) {
          $autoplay = 'true';
      } else {
           $autoplay = 'false';
      }
      
      if ('yes' === $settings['interaction']) {
          $interaction = 'true';
      } else {
           $interaction = 'false';
      }
  
      
    ?>


<!--Embed Video-->
<div data-interaction="<?php echo $interaction ?>" data-autoplay="<?php echo $autoplay ?>" class="alioth-embed-video">


    <!--Player Control (Don't touch)-->
    <div class="video-overlay"><span class="play-button"></span></div>
    <!--/Player Control (Don't touch)-->


    <?php if ($provider === 'vimeo') { ?>

    <div data-poster="<?php echo $settings['video_poster']['url'] ?>" class="embed-video" data-plyr-provider="vimeo" data-plyr-embed-id="<?php echo $settings['video_id'] ?>"></div>
    <!--/Video Attributes-->

    <?php   } elseif ($provider === 'youtube') { ?>

    <div data-poster="<?php echo $settings['video_poster']['url'] ?>" class="embed-video" data-plyr-provider="youtube" data-plyr-embed-id="<?php echo $settings['video_id'] ?>"></div>
    <!--/Video Attributes-->


    <?php } ?>

    <!--Video Attributes-->


</div>
<!--/Embed Video-->

<?php

    ?>

<?php
  }

}
