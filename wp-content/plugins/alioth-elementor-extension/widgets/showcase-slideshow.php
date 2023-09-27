<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class ShowcaseSlideshow extends Widget_Base {
 
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
    return 'showcaseslideshow';
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
    return __( 'Showcase Slideshow', 'alioth-elementor');
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
    return 'eicon-gallery-group';
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
			'slide_navigation',
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
			'show_fraction',
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
				'default' => 'scroll_not',
				'options' => [
					'scroll_not' => esc_html__( 'Scroll Notice', 'alioth-elementor'),
                    'custom'  => esc_html__( 'Custom', 'alioth-elementor'),
				],
			]
		);
      
        $this->add_control(
			'scroll_text',
			[
				'label' => __( 'Scroll Text', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Scroll' , 'alioth-elementor'),
                'condition' => [ 'left_widget' => 'scroll_not' ]
			]
		);
      
        $this->add_control(
			'left_custom_editor',
			[
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
				'selector' => '{{WRAPPER}} .ss2-project-title',
			]
		);
      
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ss2-project-title' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cat_typography',
                'label' => __('Category Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .ss2-project-cat',
			]
		);
      
        $this->add_control(
			'cat_color',
			[
				'label' => esc_html__( 'Category Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ss2-project-cat' => 'color: {{VALUE}}'
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'summary_typography',
                'label' => __('Summary Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .ss2-project-excerpt',
			]
		);
      
        $this->add_control(
			'summary_color',
			[
				'label' => esc_html__( 'Summary Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ss2-project-excerpt' => 'color: {{VALUE}}'
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
				'selector' => '{{WRAPPER}} .ss2-button, {{WRAPPER}} .ss2-button a::after',
			]
		);
      
        $this->add_control(
			'button_color',
			[
				'label' => esc_html__( 'Button Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ss2-button a' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_control(
			'button_bg_color',
			[
				'label' => esc_html__( 'Button Background Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ss2-button' => 'background-color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'fraction_typography',
                'label' => __('Fraction Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .ss2-curr, {{WRAPPER}} .ss2-tot',
			]
		);
      
        $this->add_control(
			'fraction_color',
			[
				'label' => esc_html__( 'Fraction Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ss2-curr' => 'color: {{VALUE}}',
					'{{WRAPPER}} .ss2-tot' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'navigation_typography',
                'label' => __('Navigation Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .ss2-prev i, {{WRAPPER}} .ss2-next i',
			]
		);
      
        $this->add_control(
			'navigation_color',
			[
				'label' => esc_html__( 'Navigation Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ss2-prev i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .ss2-next i' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'numbers_typography',
                'label' => __('Numbers Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} span.ss2-dot',
			]
		);
      
        $this->add_control(
			'numbers_color',
			[
				'label' => esc_html__( 'Numbers Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} span.ss2-dot' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'scrol_not_typography',
                'label' => __('Scroll Notice Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .scroll-notice span',
			]
		);
      
        $this->add_control(
			'scroll_not_color',
			[
				'label' => esc_html__( 'Scroll Notice Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .scroll-notice span' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_control(
			'scroll_not_line_color',
			[
				'label' => esc_html__( 'Scroll Notice Line Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .scroll-notice span::after' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .scroll-notice span::before' => 'background-color: {{VALUE}}',
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

<div class="portfolio-showcase showcase-slideshow-v2" data-barba-namespace="sc-slideshow" <?php echo $autoplay; ?>>

    <!-- Slider Background Texts (Don't touch) -->
    <span class="ss2-overlay"></span>
    <div class="ss2-back-texts"></div>
    <!--/ Slider Background Texts (Don't touch) -->

    <!-- Projects Wrapper -->
    <div class="showcase-slideshow-2-wrapper">

        <?php foreach ($projects_list as $selected_project) {  
            $project = $selected_project['select_project'];
        ?>

        <!-- Project -->
        <div class="ss2-project">

            <!-- Project Metas -->
            <div class="ss2-project-meta">

                <?php if ( 'yes' === $settings['show_category'] ) { ?>
                <!-- Project Category -->
                <div class="ss2-project-cat"><?php 
                        $terms = get_the_terms( $project, 'project-categories' ); 
                        foreach($terms as $term) {
                         echo '<span>' . $term->name . '</span>';
                        }
                    ?></div>
                <!--/ Project Category -->
                <?php } ?>

                <!-- Project Title -->
                <div class="ss2-project-title"><?php echo get_the_title($project) ?></div>
                <!--/ Project Title -->

                <?php if(( get_field('summary' , $project) ) && ( 'yes' === $settings['show_summary']) ) { ?>
                <!-- Project Excerpt -->
                <div class="ss2-project-excerpt"><?php the_field('excerpt' , $project) ?> </div>
                <!--/ Project Excerpt -->
                <?php } ?>
            </div>
            <!--/ Project Metas -->

            <!-- Project Image -->
            <div class="ss2-project-image">
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
            <!--/ Project Image -->

            <!-- Project URL -->
            <a class="ss2-project-url" href="<?php echo esc_url(get_the_permalink($project)) ?>"></a>
            <!--/ Project URL -->

        </div>
        <!--/ Project -->


        <?php } ?>


    </div>
    <!--/ Projects Wrapper -->

    <!-- Projects Button -->
    <div class="ss2-button">
        <a href="#."><?php echo esc_html($button_text) ?></a>
    </div>
    <!--/ Projects Button -->

    <!-- Images Wrapper (Don't touch) -->
    <div class="ss2-images swiper-container"></div>
    <!--/ Images Wrapper (Don't touch) -->

    <!-- Slider Navigation Elements (Don't touch) -->

    <?php if ( 'yes' === $settings['slide_numbers'] ) { ?>
    <div class="ss2-dots"></div>
    <?php } ?>

    <div class="ss2-nav">

        <?php if ( 'yes' === $settings['slide_navigation'] ) { ?>
        <div class="ss2-prev"><i class="icofont-thin-left"></i></div>
        <?php } ?>

        <?php if ( 'yes' === $settings['show_fraction'] ) { ?>
        <div class="ss2-fract">
            <div class="ss2-curr">01</div>
            <div class="ss2-tot">03</div>
        </div>
        <?php } ?>

        <?php if ( 'yes' === $settings['slide_navigation'] ) { ?>

        <div class="ss2-next"><i class="icofont-thin-right"></i></div>
        <?php } ?>

    </div>
    <!--/ Slider Navigation Elements (Don't touch) -->

    <!-- Showcase Footer -->
    <div class="showcase-footer ss2-footer">

        <!--Showcase Footer Left-->
        <div class="ss2-footer-left">

            <?php if ( 'scroll_not' === $settings['left_widget'] ) { ?>

        <!--Scroll Notice-->
        <div class="scroll-notice" data-target="#secondSec">
            <span class="sn_bef"></span>
            <span><?php echo esc_html($settings['scroll_text']) ?></span>
        </div>
        <!--/Scroll Notice-->

            <?php } ?>
            <?php if ( 'custom' === $settings['left_widget'] ) { 
                
           echo do_shortcode($settings['left_custom_editor']);
            
            } ?>

        </div>
        <!--/Showcase Footer Left-->

    </div>
    <!-- Showcase Footer -->

</div>
<!--Showcase Slider V2-->


<?php
  }



    
}
