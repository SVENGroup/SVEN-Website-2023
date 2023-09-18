<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class ShowcaseWall extends Widget_Base {
 
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
    return 'showcasewall';
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
    return __( 'Showcase Wall', 'alioth-elementor');
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
    return 'eicon-carousel';
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

		$repeaterTop = new \Elementor\Repeater();
      
        $repeaterTop->add_control(
			'select_project',
			[
				'label' => __( 'Select Project', 'alioth-elementor'),
				'label_block' => true,
                'description' => __('Select project which will display in the slider.', 'alioth-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $options,
			]
		);
     
      
        $repeaterBottom = new \Elementor\Repeater();
      
        $repeaterBottom->add_control(
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
			'projects_top_list',
			[
				'label' => esc_html__( 'Top Projects', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeaterTop->get_controls(),
                'show_label' => true,
			]
		);
      
        $this->add_control(
			'projects_bottom_list',
			[
				'label' => esc_html__( 'Bottom Projects', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeaterTop->get_controls(),
                'show_label' => true,
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
			'show_progress',
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
			'show_numbers',
			[
				'label' => __( 'Project Numbers', 'alioth-elementor ' ),
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
				'default' => 'scroll_not',
				'options' => [
					'scroll_not' => esc_html__( 'Scroll Notice', 'alioth-elementor'),
                    'left_custom_editor'  => esc_html__( 'Custom', 'alioth-elementor'),
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
                'condition' => [ 'left_widget' => 'left_custom_editor' ]
			]
		);
      
        $this->add_control(
			'right_widget',
			[
				'label' => esc_html__( 'Left Widget Type', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'plus_button',
				'options' => [
					'plus_button' => esc_html__( 'Plus Button', 'alioth-elementor'),
                    'right_custom_editor'  => esc_html__( 'Custom', 'alioth-elementor'),
				],
			]
		);
      
        $this->add_control(
			'plus_button_text',
			[
				'label' => __( 'Plus Button Text', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('All Projects' , 'alioth-elementor'),
                'condition' => [ 'right_widget' => 'plus_button' ]
			]
		);
      
        $this->add_control(
			'plus_button_url',
			[
				'label' => __( 'Plus Button URL', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('#' , 'alioth-elementor'),
                'condition' => [ 'right_widget' => 'plus_button' ]
			]
		);
      
        $this->add_control(
			'right_custom_editor',
			[
				'label' => esc_html__( 'Custom Edtir', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
                'condition' => [ 'right_widget' => 'right_custom_editor' ]
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
				'selector' => '{{WRAPPER}} .project-title',
			]
		);
      
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wall-project a' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'numbers_typography',
                'label' => __('Numbers Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .wall-project .project-title::before',
			]
		);
      
        $this->add_control(
			'numbers_color',
			[
				'label' => esc_html__( 'Numbers Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wall-project .project-title::before' => 'color: {{VALUE}}',
				],
			]
		);
      

		$this->end_controls_section();
      
      		$this->start_controls_section(
			'showcase_elements',
			[
				'label' => esc_html__( 'Showcase Elements', 'alioth-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'progress_bar_bg',
			[
				'label' => esc_html__( 'Progress Bar Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wall-drag' => 'background-color: {{VALUE}}',
				],
			]
		);
      
        $this->add_control(
			'progress_bar_fill',
			[
				'label' => esc_html__( 'Progress Bar Fill Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} span.wall-prog' => 'background-color: {{VALUE}}',
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
      $projects_top_list = $settings['projects_top_list'];
      $projects_bottom_list = $settings['projects_bottom_list'];
      
        $numbers = '';
      
      if ('yes' === $settings['show_numbers']) {
          $numbers = 'yes-numbers';
      } else {
          $numbers = 'no-numbers';
      }


?>


<!-- Portfolio Showcase Wall -->
<div class="portfolio-showcase showcase-wall  <?php echo esc_attr($numbers); ?>" data-barba-namespace="sc-wall">

    <!-- Showcase Wall Projects -->
    <div class="wall-projects">

        <!-- Projects Top Wrapper -->
        <div class="wall-projects-top">

            <?php foreach ($projects_top_list as $selected_project) {  
            $project = $selected_project['select_project'];
        ?>

            <!-- Poject -->
            <div class="wall-project">

                <!-- Poject URL --><a href="<?php echo esc_url(get_the_permalink($project)) ?>">

                    <!-- Poject Title -->
                    <div class="project-title"><?php echo get_the_title($project) ?></div>
                    <!-- Poject Title -->
                </a>

                <!-- Poject Image -->
                <div class="project-image">
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

                <img alt="<?php echo $alt ?>" src="<?php echo esc_attr(get_the_post_thumbnail_url($project)) ?>">

                <?php }  ?>
                </div>
                <!-- Poject Image -->

            </div>
            <!--/ Poject -->

            <?php } ?>


        </div>
        <!-- Projects Top Wrapper -->

        <!-- Projects Bottom Wrapper -->
        <div class="wall-projects-bottom">

            <?php foreach ($projects_bottom_list as $selected_project) {  
            $project = $selected_project['select_project'];
        ?>

            <!-- Poject -->
            <div class="wall-project">

                <!-- Poject URL --><a href="<?php echo esc_url(get_the_permalink($project)) ?>">

                    <!-- Poject Title -->
                    <div class="project-title"><?php echo get_the_title($project) ?></div>
                    <!-- Poject Title -->
                </a>

                <!-- Poject Image -->
                <div class="project-image">
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
                <!-- Poject Image -->

            </div>
            <!--/ Poject -->

            <?php } ?>


        </div>
        <!--/ Projects Bottom Wrapper -->

    </div>
    <!-- Showcase Wall Projects -->

    <!-- Project Images (Don't Touch) -->
    <div class="wall-images"></div>
    <!-- Project Images (Don't Touch) -->
     <?php if ( 'yes' === $settings['show_progress'] ) { ?>
    <!-- Drag Bar (Don't Touch) -->
    <div class="wall-drag">
        <span class="wall-prog"></span>
    </div>
    <!--/ Drag Bar (Don't Touch) -->
<?php } ?>

    <!--Showcase Footer-->
    <div class="showcase-footer">

        <!--Showcase Footer Left-->
        <div class="showcase-footer-left">


            <?php if ( 'scroll_not' === $settings['left_widget'] ) { ?>

        <!--Scroll Notice-->
        <div class="scroll-notice" data-target="#secondSec">
            <span class="sn_bef"></span>
            <span><?php echo esc_html($settings['scroll_text']) ?></span>
        </div>
        <!--/Scroll Notice-->

            <?php } ?>
            <?php if ( 'left_custom_editor' === $settings['left_widget'] ) { 
                
           echo do_shortcode($settings['left_custom_editor']);
            
            } ?>


        </div>
        <!--/Showcase Footer Left-->

        <!--Showcase Footer Right-->
        <div class="showcase-footer-right">

            <?php if ( 'plus_button' === $settings['right_widget'] ) { ?>

            <!--Plus Button-->
            <div class="a-plus-button">

                <!--Plus Button URL--><a href="<?php echo esc_url($settings['plus_button_url']) ?>">
                    <span><span><?php echo esc_html($settings['plus_button_text']) ?></span></span>
                </a>
            </div>
            <!--/Plus Button-->


            <?php } ?>
            <?php if ( 'right_custom_editor' === $settings['right_widget'] ) { 
                
           echo do_shortcode($settings['right_custom_editor']);
            
            } ?>

        </div>
        <!--/Showcase Footer Right-->

    </div>
    <!--/Showcase Footer-->

</div>
<!--/ Portfolio Showcase Wall -->

<?php
  }



    
}
