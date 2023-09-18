<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class FullscreenSlider extends Widget_Base {
 
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
    return 'fullscreen';
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
    return __( 'Fullscreen Slider', 'alioth-elementor');
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
    return 'eicon-post-slider';
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
    return [ 'alioth-showcase' ];
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
      
      		$repeater = new \Elementor\Repeater();
      
           $options = [];

        $projects = get_posts( [
            'post_type'  => 'portfolio',
            'numberposts' => -1
        ] );

        foreach ( $projects as $project ) {
            $options[ $project->ID ] = $project->post_title;
        }
      
        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Projects', 'alioth-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();
      
        $repeater->add_control(
			'select_project',
			[
				'label' => __( 'Select Project', 'alioth-elementor'),
				'label_block' => true,
                'description' => __('Select project which will display in the slider.', 'alioth-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $options,
			]
		);

		$this->add_control(
			'projects_list',
			[
				'label' => esc_html__( 'Projects', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'show_label' => false,
			]
		);

		$this->end_controls_section();
      
        $this->start_controls_section(
            'section_portfolios',
            [
                'label' => __( 'Settings', 'alioth-elementor ' ),
            ]
        );
      
        $this->add_control(
			'show_fraction',
			[
				'label' => __( 'Slides Fraction', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'alioth-elementor ' ),
				'label_off' => __( 'Hide', 'alioth-elementor ' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
      
        $this->add_control(
			'show_year',
			[
				'label' => __( 'Year', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'alioth-elementor ' ),
				'label_off' => __( 'Hide', 'alioth-elementor ' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
      
        $this->add_control(
			'show_category',
			[
				'label' => __( 'Category', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'alioth-elementor ' ),
				'label_off' => __( 'Hide', 'alioth-elementor ' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
      
        $this->add_control(
			'show_navigation',
			[
				'label' => __( 'Navigation', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'alioth-elementor ' ),
				'label_off' => __( 'Hide', 'alioth-elementor ' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
      
        $this->add_control(
			'prev_text',
			[
				'label' => __( 'Prev Text', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Prev' , 'alioth-elementor'),
                'condition' => [ 'show_navigation' => 'yes' ]
			]
		);
      
        $this->add_control(
			'next_text',
			[
				'label' => __( 'Next Text', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Next' , 'alioth-elementor'),
                'condition' => [ 'show_navigation' => 'yes' ]
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
			'image_rotate_animation',
			[
				'label' => __( 'Image Rotate Animation', 'alioth-elementor ' ),
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
				'label' => __( 'Autoplay Duration', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 5000,
                'condition' => [ 'autoplay' => 'yes' ]
			]
		);
        
        $this->add_control(
			'button_text',
			[
				'label' => __( 'Project Button Text', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Case Study' , 'alioth-elementor')
			]
		);
      
        $this->add_control(
			'left_widget',
			[
				'label' => esc_html__( 'Left Widget Type', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'custom',
				'options' => [
					'plus_button' => esc_html__( 'Plus Button', 'alioth-elementor'),
                    'custom'  => esc_html__( 'Custom', 'alioth-elementor'),
				],
			]
		);
      
        $this->add_control(
			'plus_button_text',
			[
				'label' => __( 'Plus Button Text', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('All Projects' , 'alioth-elementor'),
                'condition' => [ 'left_widget' => 'plus_button' ]
			]
		);
      
        $this->add_control(
			'plus_button_url',
			[
				'label' => __( 'Plus Button URL', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('#' , 'alioth-elementor'),
                'condition' => [ 'left_widget' => 'plus_button' ]
			]
		);
      
        $this->add_control(
			'custom_editor',
			[
				'label' => esc_html__( 'Custom Edtir', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
                'condition' => [ 'left_widget' => 'custom' ]
			]
		);
      
        
    $this->end_controls_section();
    
      
    	$this->start_controls_section(
			'project_elements',
			[
                
				'label' => esc_html__( 'Project Elements', 'alioth-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);


        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
                'label' => __('Title Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .fs-title',
			]
		);
      
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fs-title' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cy_typography',
                'label' => __('Category & Year Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .fs-cat, {{WRAPPER}} .fs-year',
			]
		);
      
        $this->add_control(
			'cy_color',
			[
				'label' => esc_html__( 'Category & Year Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fs-cat' => 'color: {{VALUE}}',
					'{{WRAPPER}} .fs-year' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
      
      		$this->start_controls_section(
			'slider_elements',
			[
				'label' => esc_html__( 'Slider Elements', 'alioth-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

      
      $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
                'label' => __('Button Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .fs-button a',
			]
		);
      
        $this->add_control(
			'button_color',
			[
				'label' => esc_html__( 'Button Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fs-button a' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'fraction_typography',
                'label' => __('Fraction Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .fs-tot',
			]
		);
      
        $this->add_control(
			'fraction_color',
			[
				'label' => esc_html__( 'Fraction Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fs-tot' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'navigation_typography',
                'label' => __('Navigation Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .fs-next, {{WRAPPER}} .fs-prev',
			]
		);
      
        $this->add_control(
			'navigation_color',
			[
				'label' => esc_html__( 'Navigation Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fs-next, {{WRAPPER}} .fs-prev' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'pb_typography',
                'label' => __('Plus Button Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .a-plus-button a',
			]
		);
      
        $this->add_control(
			'pb_color',
			[
				'label' => esc_html__( 'Plus Button Text Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .a-plus-button a' => 'color: {{VALUE}}',
				],
			]
		);
      
      $this->add_control(
			'pbl_color',
			[
				'label' => esc_html__( 'Plus Button Lines Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .a-plus-button::before' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .a-plus-button::after' => 'background-color: {{VALUE}}',
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

      
      $settings = $this->get_settings();
      $projects_list = $settings['projects_list'];
    
      $button_text = $settings['button_text'];
      
      $autoplay = '';
      
      if ($settings['autoplay'] === 'yes') {
          
          $autoplay = 'data-autoplay="true" data-autoplay-duration="' .  $settings['autoplay_duration'] . '"';
          
      }
      
      $rotateAnim = '';
      
        if ($settings['image_rotate_animation'] === 'yes') {
          
         $rotateAnim = 'rotate-anim';;
          
      }

?>


<!--Showcase Fullscreen Slider-->
<div data-barba-namespace="fs-slider" class="portfolio-showcase fullscreen-slider-showcase <?php echo $rotateAnim; ?>" <?php echo esc_attr($autoplay) ?>>

    <?php if ( 'yes' === $settings['show_fraction'] ) { ?>

    <!-- Slider Fraction (Don't touch) -->
    <div class="fs-fraction">
        <span class="fs-tot">01</span>
    </div>
    <!--/ Slider Fraction (Don't touch) -->

    <?php	} ?>

    <?php foreach ($projects_list as $selected_project) {  
    
            $project = $selected_project['select_project'];
    
    ?>

    <!-- Project -->
    <div class="fs-project">

        <!-- Project Image -->
        <div class="fs-project-image">
            <div class="slide-bgimg">

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
                <video class="alioth-project-video" src="<?php echo esc_attr(get_field('upload_video' , $project)); ?>" autoplay="true" loop="true" muted="muted" playsinline="true" controlslist="nodownload"></video>
                <?php } ?>


                <?php } else { 
                   $alt = get_post_meta ( get_post_thumbnail_id($project), '_wp_attachment_image_alt', true ); 
                ?>

                <img alt="<?php echo $alt; ?>" src="<?php echo esc_attr(get_the_post_thumbnail_url($project)) ?>">

                <?php }  ?>

            </div>
        </div>
        <!--/ Project Image -->

        <!-- Project Details -->
        <div class="fs-project-dets">

            <!-- Project Title -->
            <div class="fs-title"><?php echo get_the_title($project) ?></div>
            <!--/ Project Title-->

            <!-- Project Metas -->
            <div class="fs-meta">

                <?php if ( 'yes' === $settings['show_category'] ) { ?>
                <!-- Project Category -->
                <span class="fs-cat">
                    <?php 
                        $terms = get_the_terms( $project, 'project-categories' ); 
                        foreach($terms as $term) {
                        echo '<span>' . $term->name . '</span>';
                        }
                    ?>
                </span>
                <!--/ Project Category -->

                <?php } ?>

                <?php if(( get_field('year' , $project) ) && ( 'yes' === $settings['show_year']) ) { ?>
                <!-- Project Year -->
                <span class="fs-year"><?php the_field('year' , $project) ?></span>
                <!--/ Project Year-->
                <?php } ?>


            </div>
            <!--/ Project Metas -->

        </div>
        <!--/ Project Details-->

        <!-- Project Button -->
        <div class="fs-button">
            <a href="<?php echo esc_url(get_the_permalink($project)) ?>"><?php echo esc_html($button_text) ?></a>
        </div>
        <!--/ Project Button -->

    </div>
    <!--/ Project -->

    <?php } ?>

    <!-- Images Wrapper (Don't touch) -->
    <div class="fs-images swiper-container"></div>
    <!--/ Images Wrapper (Don't touch) -->

    <!--Showcase Footer-->
    <div class="showcase-footer">

        <!--Showcase Footer Left-->
        <div class="showcase-footer-left">

            <?php if ( 'plus_button' === $settings['left_widget'] ) { ?>

            <!--Plus Button-->
            <div class="a-plus-button">

                <!--Plus Button URL--><a href="<?php echo esc_url($settings['plus_button_url']) ?>">
                    <span><span><?php echo esc_html($settings['plus_button_text']) ?></span></span>
                </a>
            </div>
            <!--/Plus Button-->

            <?php } ?>

            <?php if ( 'custom' === $settings['left_widget'] ) { 
                
           echo do_shortcode($settings['custom_editor']);
            
            } ?>

        </div>
        <!--/Showcase Footer Left-->

        <!--Showcase Footer Right-->
        <div class="showcase-footer-right">

            <?php if ( 'yes' === $settings['show_navigation'] ) { ?>

            <!-- Slider Navigation -->
            <div class="fs-nav">

                <span class="fs-prev"><?php echo esc_html($settings['prev_text']) ?></span>
                <span class="fs-prog"><span class="fs-prog-bar"></span></span>
                <span class="fs-next"><?php echo esc_html($settings['next_text']) ?></span>

            </div>
            <!--/ Slider Navigation -->

            <?php } ?>

        </div>
        <!--/Showcase Footer Right-->

    </div>
    <!--/Showcase Footer-->


</div>
<!--/Showcase Fullscreen Slider-->


<?php


    ?>

<?php
  }



    
}
