<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class AliothSingleProject extends Widget_Base {
 
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
    return 'aliothsingleproject';
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
    return __( 'Single Project', 'alioth-elementor' );
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
    return 'eicon-single-page';
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
            'numberposts' => -1
        ] );

        foreach ( $projects as $project ) {
            $options[ $project->ID ] = $project->post_title;
        }
      
      
    $this->start_controls_section(
      'widget_content',
      [
        'label' => __( 'Single Project', 'alioth-elementor' ),
      ]
    );
      
        $this->add_control(
			'select_project',
			[
				'label' => __( 'Select Project', 'alioth-elementor'),
				'label_block' => true,
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $options,
			]
		);
      
      
    $this->end_controls_section();
   
      
        $this->start_controls_section(
			'Style',
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
				'selector' => '{{WRAPPER}} .sw-title',
			]
		);
      
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw-title' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cat_typography',
                'label' => __('Category Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .sw-cat',
			]
		);
      
        $this->add_control(
			'cat_color',
			[
				'label' => esc_html__( 'Category Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw-cat' => 'color: {{VALUE}}',
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
          $project = $settings['select_project'];
    ?>


<!--Alioth Single Project-->
<div class="alioth-single-project">

    <!--Project URL--><a href="<?php echo get_the_permalink($project); ?>">

        <!--Project Image-->
        <div class="sw-image">

            <?php
            
                                          if (get_field('featured_image_type' , $project) === 'video') {
                    $featured_video = true;
                } else {
                    $featured_video = false;
                }
                
                
                if ($featured_video == true) { 
          
                $provider = get_field('video_provider' , $project);
          
                 if ($provider === 'youtube') { ?>
            <!--Project Video-->
            <div class="showcase-video" data-plyr-provider="youtube" data-plyr-embed-id="<?php the_field('video_id' , $project) ?>"></div>
            <!--/Project Video-->
            <?php   }
                
                 if ($provider === 'vimeo') { ?>
            <!--Project Video-->
            <div class="showcase-video" data-plyr-provider="vimeo" data-plyr-embed-id="<?php the_field('video_id' , $project) ?>"></div>
            <!--/Project Video-->
            <?php }   
                
                if ($provider === 'self_hosted') { ?>
                <video class="showcase-video" src="<?php echo esc_attr(get_field('upload_video' , $project)); ?>" autoplay="true" loop="true" muted="muted" playsinline="true" controlslist="nodownload"></video>
                <?php } ?>


            <?php } else {  
            
              $alt = get_post_meta ( get_post_thumbnail_id($project), '_wp_attachment_image_alt', true );
            ?>

            <img alt="<?php echo $alt; ?>" src="<?php echo esc_attr(get_the_post_thumbnail_url($project)) ?>">

            <?php }  ?>

        </div>
        <!--/Project Image-->

        <!--Project Details-->
        <div class="sw-detail">

            <!--Project Title-->
            <div class="sw-title"><?php echo get_the_title($project); ?></div>
            <!--/Project Title-->

            <!--Project Category-->
            <div class="sw-cat"><?php 
                        $terms = get_the_terms( $project, 'project-categories' ); 
                        foreach($terms as $term) {
                        echo '<span>' . $term->name . '</span>';
                        }
                    ?></div>
            <!--/Project Category-->

        </div>
        <!--/Project Details-->
    </a>

</div>
<!--/Alioth Single Project-->

<?php

    ?>

<?php
  }

}
