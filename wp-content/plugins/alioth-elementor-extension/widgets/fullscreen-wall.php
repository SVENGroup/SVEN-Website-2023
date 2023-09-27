<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class FullscreenWall extends Widget_Base {
 
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
    return 'fullscreenwall';
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
    return __( 'Fullscreen Wall', 'alioth-elementor');
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
    return 'eicon-thumbnails-half';
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
				'selector' => '{{WRAPPER}} .fw-project-title',
			]
		);
      
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fw-project-title' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cat_typography',
                'label' => __('Category Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .fw-cat',
			]
		);
      
        $this->add_control(
			'cat_color',
			[
				'label' => esc_html__( 'Category Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fw-cat' => 'color: {{VALUE}}'
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'seperator_typography',
                'label' => __('Summary Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .fw-project::after',
			]
		);
      
        $this->add_control(
			'summary_color',
			[
				'label' => esc_html__( 'Summary Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fw-project::after' => 'color: {{VALUE}}'
				],
			]
		);

		$this->end_controls_section();
      
      		$this->start_controls_section(
			'slider_elements',
			[
				'label' => esc_html__( 'Page Elements', 'alioth-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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

?>
<!--Fullscreen Wall-->
<div class="portfolio-showcase fullscreen-wall-showcase" data-barba-namespace="fs-wall">

    <!--Projects Wrapper-->
    <div class="fw-projects">

        <?php foreach ($projects_list as $selected_project) {  
    
            $project = $selected_project['select_project'];
    

            
                if (get_field('featured_image_type' , $project) === 'video') {
                    $featured_video = true;
                } else {
                    $featured_video = false;
                }
                
                if ($featured_video == true) { 
          
                $provider = get_field('video_provider' , $project);
          
                 if ($provider === 'youtube') { ?>
        <div data-plyr-provider="youtube" data-plyr-embed-id="<?php the_field('video_id' , $project) ?>" class="fw-project video_youtube">
            <?php   }
                
                 if ($provider === 'vimeo') { ?>
            <div data-plyr-provider="vimeo" data-plyr-embed-id="<?php the_field('video_id' , $project) ?>" class="fw-project video_vimeo">
                <?php }   
                
                if ($provider === 'self_hosted') { ?>
                
                <div data-video-url="<?php echo esc_attr(get_field('upload_video' , $project)); ?>" class="fw-project video_self" >
                
                <?php } ?>


                <?php } else {  ?>
                <!-- Project -->
                <div data-image-url="<?php echo esc_attr(get_the_post_thumbnail_url($project)) ?>" class="fw-project">

                    <?php }  ?>



                    <!-- Project URL --><a href="<?php echo esc_url(get_the_permalink($project)) ?>">

                        <!-- Project Title -->
                        <div class="fw-project-title"><?php echo get_the_title($project) ?>
                        </div>
                        <!--/ Project Title -->
                        <?php if ( 'yes' === $settings['show_category'] ) { ?>
                        <!-- Project Category-->
                        <div class="fw-project-category">

                            <?php 
                        $terms = get_the_terms( $project, 'project-categories' ); 
                        foreach($terms as $term) {
                        echo '<span>' . $term->name . '</span>';
                        }
                    ?>
                        </div>
                        <!--/ Project Caegory-->

                        <?php } ?>
                    </a>

                </div>
                <!--/ Project -->
                <?php } ?>

            </div>
            <!--/Projects Wrapper-->

            <!--Project Images Wrapper-->
            <div class="fw-images"></div>
            <!--/Project Images Wrapper-->

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
                
           echo do_shortcode($settings['left_custom_editor']);
            
            } ?>

        </div>
        <!--/Showcase Footer Left-->

                <!--Showcase Footer Right-->
                <div class="showcase-footer-right">
                    
                       <?php if ( 'yes' === $settings['show_category'] ) { ?>

                    <div class="fw-cat"></div>
                    
                    <?php } ?>

                </div>
                <!--/Showcase Footer Right-->

            </div>
            <!--/Showcase Footer-->

        </div>
        <!--/Fullscreen Wall-->
        <?php
  }
    
}
