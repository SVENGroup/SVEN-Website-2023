<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class FullscreenSlideshow extends Widget_Base {
 
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
    return 'fullscreensldshw';
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
    return __( 'Fullscreen Slideshow', 'alioth-elementor');
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
    return 'eicon-image-box';
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
			'select_projects_desc',
			[
				'label' => esc_html__( 'Add projects here to display.', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
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
			'slide_numbers',
			[
				'label' => __( 'Slide Numbers', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'alioth-elementor ' ),
				'label_off' => __( 'Hide', 'alioth-elementor ' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
      
        $this->add_control(
			'show_summary',
			[
				'label' => __( 'Summary', 'alioth-elementor ' ),
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
				'label' => __( 'Autoplay Duration', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 5000,
                'condition' => [ 'autoplay' => 'yes' ]
			]
		);
        
        $this->add_control(
			'button_text',
			[
				'label' => __( 'Proejct Button Text', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Case Study' , 'alioth-elementor')
			]
		);
      
                    
        $this->end_controls_section();
      
        $this->start_controls_section(
            'showcase_footer',
            [
                'label' => __( 'Showcase Footer', 'alioth-elementor ' ),
            ]
        );
      
        $this->add_control(
			'left_widget',
			[
				'label' => esc_html__( 'Left Widget Type', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'slides_nav',
				'options' => [
					'slides_nav' => esc_html__( 'Slides Navigation', 'alioth-elementor'),
                    'custom'  => esc_html__( 'Custom', 'alioth-elementor'),
				],
			]
		); 
      
        $this->add_control(
			'left_custom_editor',
			[
				'type' => \Elementor\Controls_Manager::WYSIWYG,
                'condition' => [ 'left_widget' => 'custom' ]
			]
		);
      
        $this->add_control(
			'right_widget',
			[
				'label' => esc_html__( 'Right Widget Type', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'slides_fraction',
				'options' => [
					'slides_fraction' => esc_html__( 'Slides Fraction', 'alioth-elementor'),
                    'custom'  => esc_html__( 'Custom', 'alioth-elementor'),
				],
			]
		);
      
        $this->add_control(
			'right_custom_editor',
			[
				'type' => \Elementor\Controls_Manager::WYSIWYG,
                'condition' => [ 'right_widget' => 'custom' ]
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
				'selector' => '{{WRAPPER}} .ss1-title',
			]
		);
      
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ss1-title' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cat_typography',
                'label' => __('Category Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .ss1-cat',
			]
		);
      
        $this->add_control(
			'cat_color',
			[
				'label' => esc_html__( 'Category Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ss1-cat' => 'color: {{VALUE}}'
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'summary_typography',
                'label' => __('Summary Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .ss1-summary',
			]
		);
      
        $this->add_control(
			'summary_color',
			[
				'label' => esc_html__( 'Summary Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ss1-summary' => 'color: {{VALUE}}'
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
				'selector' => '{{WRAPPER}} .ss1-button a, {{WRAPPER}} .ss1-button a::after',
			]
		);
      
        $this->add_control(
			'button_color',
			[
				'label' => esc_html__( 'Button Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ss1-button a' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_control(
			'button_bg_color',
			[
				'label' => esc_html__( 'Button Background Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ss1-button' => 'background-color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'fraction_typography',
                'label' => __('Fraction Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .ss1-curr, {{WRAPPER}} .ss1-tot',
			]
		);
      
        $this->add_control(
			'fraction_color',
			[
				'label' => esc_html__( 'Fraction Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ss1-curr' => 'color: {{VALUE}}',
					'{{WRAPPER}} .ss1-tot' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'navigation_typography',
                'label' => __('Navigation Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .ss1-nav i',
			]
		);
      
        $this->add_control(
			'navigation_color',
			[
				'label' => esc_html__( 'Navigation Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ss1-nav i' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'numbers_typography',
                'label' => __('Numbers Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .ss1-dots.swiper-pagination-bullets span',
			]
		);
      
        $this->add_control(
			'numbers_color',
			[
				'label' => esc_html__( 'Numbers Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ss1-dots.swiper-pagination-bullets span' => 'color: {{VALUE}}',
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

?>

<!--Showcase Fullscreen Slider-->
<div class="portfolio-showcase showcase-slideshow" data-barba-namespace="fs-slideshow">

    <?php if ( 'slides_nav' === $settings['left_widget'] ) { ?>
    <!--Slider Elements (Don't Touch)-->
    <div class="ss1-nav">
        <div class="ss1-prev"><i class="icofont-thin-up"></i></div>
        <div class="ss1-next"><i class="icofont-thin-down"></i></div>
    </div>
    <?php } else if ( 'custom' === $settings['left_widget'] ) { ?>
    <div class="fs-left-custom"><?php echo do_shortcode($settings['left_custom_editor']); ?></div>
    <?php } ?>

    <?php if ( 'yes' === $settings['slide_numbers'] ) { ?>
    <div class="ss1-dots"></div>
    <?php } ?>


    <?php if ( 'slides_fraction' === $settings['right_widget'] ) { ?>
    <div class="ss1-fraction">
        <div class="ss1-curr">01</div>
        <div class="ss1-tot">05</div>
    </div>
    <!--/Slider Elements (Don't Touch)-->
    <?php } else if ( 'custom' === $settings['right_widget'] ) { ?>
    <div class="fs-right-custom"><?php echo do_shortcode($settings['right_custom_editor']); ?></div>
    <?php } ?>
    <!--Slider Wrapper-->
    <div class="showcase-slideshow-wrapper">

        <?php foreach ($projects_list as $selected_project) {  
    
            $project = $selected_project['select_project'];
    
        ?>

        <!--Project-->
        <div class="ss-project">

            <!--Project Image-->
            <div class="ss1-image">
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
            <div class="ss1-details">
                
                   <?php if ( 'yes' === $settings['show_category'] ) { ?>
                <!--Project Category-->
                <div class="ss1-cat"> <?php 
                        $terms = get_the_terms( $project, 'project-categories' ); 
                        foreach($terms as $term) {
                       echo '<span>' . $term->name . '</span>';
                        }
                    ?></div>
                <!--/Project Category-->
                  <?php } ?>

                <!--Project Title-->
                <div class="ss1-title"><?php echo get_the_title($project) ?></div>
                <!--/Project Title-->

                <!--Project Meta-->
                <div class="ss1-met-wrap">


                    <?php if(( get_field('summary' , $project) ) && ( 'yes' === $settings['show_summary']) ) { ?>
                    <!--Project Summary-->

                    <div class="ss1-summary"><?php the_field('excerpt' , $project) ?></div>
                    <!--/Project Summary-->
                    <?php } ?>

                    <!--Project URL-->
                    <a class="ss1-url" href="<?php echo esc_url(get_the_permalink($project)) ?>"></a>
                    <!--/Project URL-->

                </div>
                <!--/Project Meta-->

            </div>
            <!--/Project Details-->

        </div>
        <!--/Project-->



        <?php } ?>



    </div>
    <!--/Slider Wrapper-->

    <!--Slider Images (Don't touch)-->
    <div class="ss1-images"></div>
    <!--Slider Images (Don't touch)-->

    <!--Projects Button-->
    <div class="ss1-button"><a href=""><?php echo esc_html($button_text) ?></a></div>
    <!--/Projects Button-->

</div>
<!--/Showcase Fullscreen Slider-->
<?php
  }



    
}
