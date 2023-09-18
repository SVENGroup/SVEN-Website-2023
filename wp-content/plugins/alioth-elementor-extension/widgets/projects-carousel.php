<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class AliothProjectsCarousel extends Widget_Base {
 
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
    return 'aliothprojectscarousel';
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
    return __( 'Projects Carousel', 'alioth-elementor' );
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
    return 'eicon-posts-carousel';
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
				'label' => esc_html__( 'Projects Carousel', 'alioth-elementor'),
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
				'label' => esc_html__( 'Top Projects', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'show_label' => true,
			]
		);
      
      $this->add_control(
			'background_text_show',
			[
				'label' => __( 'Background Text', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'alioth-elementor ' ),
				'label_off' => __( 'Hide', 'alioth-elementor ' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
      
        $this->add_control(
			'background_text',
			[
                'label' => false,
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => ['background_text_show' => 'yes'],
                'placeholder' => __('Type your bg text here.' , 'alioth-elementor')
			]
		);
      
        $this->add_control(
			'category',
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
			'style',
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
				'selector' => '{{WRAPPER}} .ar-work-title'
			]
		);
    
      
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ar-work-title' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'category_typography',
                'label' => __('Category Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .ar-work-cat'
			]
		);
    
      
        $this->add_control(
			'category_color',
			[
				'label' => esc_html__( 'Category Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ar-work-cat' => 'color: {{VALUE}}',
				],
			]
		);
      
      $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'bg_typography',
                'label' => __('Background Text Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .recent-works-bg-text'
			]
		);
    
      
        $this->add_control(
			'bg_text_color',
			[
				'label' => esc_html__( 'Background Text Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .recent-works-bg-text' => 'color: {{VALUE}}',
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
       $projects_list = $settings['projects_list'];

    ?>

<!--Alioth Recent Works-->
<div data-navigate="scroll" class="a-recent-works light">

    <?php if ($settings['background_text_show'] === 'yes') { ?>

    <!--Background Text-->
    <div class="recent-works-bg-text">
        <?php echo $settings['background_text'] ?>
    </div>
    <!--Background Text-->

    <?php } ?>

    <!--Navigation (Don't Touch)-->
    <div class="a-recent-works-nav">
        <div class="arw-prev"><i class="icofont-long-arrow-left"></i></div>
        <div class="arw-next"><i class="icofont-long-arrow-right"></i></div>
    </div>
    <!--Navigation (Don't Touch)-->

    <!--Works Wrapper-->
    <div class="recent-works-wrapper">

        <?php foreach ($projects_list as $selected_project) {  
            $project = $selected_project['select_project'];
        ?>
        <!--Project-->
        <div class="ar-work">

            <!--Project URL--><a href="<?php echo esc_url(get_the_permalink($project)) ?>">

                <!--Project Image-->
                <div class="ar-work-image">

                    <?php
            
                $featured_video = get_field('project_featured_video' , $project);
                
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

                <!--Project Title-->
                <div class="ar-work-title"><?php echo get_the_title($project) ?></div>
                <!--/Project Title-->

                <?php if ($settings['category'] === 'yes') { ?>
                <!--Project Category-->
                <div class="ar-work-cat"><?php 
                        $terms = get_the_terms( $project, 'project-categories' ); 
                        foreach($terms as $term) {
                        echo '<span>' . $term->name . '</span>';
                        }
                    ?></div>
                <!--/Project Category-->
                <?php } ?>
            </a>

        </div>
        <!--/Project-->

        <?php } ?>

    </div>
    <!--/Works Wrapper-->

</div>
<!--/Alioth Recent Works-->


<?php
  }

}
