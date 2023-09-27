<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class ShowcaseList extends Widget_Base {
 
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
    return 'showcaselist';
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
    return __( 'Showcase List', 'alioth-elementor');
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
    return 'eicon-text';
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
				'selector' => '{{WRAPPER}} .sl-project-title',
			]
		);
      
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sl-project-title' => 'color: {{VALUE}}',
				],
			]
		);
      
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cat_typography',
                'label' => __('Category & Year Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .sl-project-cat, {{WRAPPER}} .sl-project-year',
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cat_sep_typography',
                'label' => __('Category & Year Seperator Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .sl-project-cat::after',
			]
		);
      
        $this->add_control(
			'cat_sep_color',
			[
				'label' => esc_html__( 'Category & Year Seperator Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sl-project-cat::after' => 'color: {{VALUE}}'
				],
			]
		);
      
        $this->add_control(
			'cat_color',
			[
				'label' => esc_html__( 'Category & Year Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sl-project-cat' => 'color: {{VALUE}}',
					'{{WRAPPER}} .sl-project-year' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'numbers_typography',
                'label' => __('Numbers Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .sl-project::before',
			]
		);
      
        $this->add_control(
			'numbers_color',
			[
				'label' => esc_html__( 'Numbers Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sl-project::before' => 'color: {{VALUE}}',
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
      $projects_list = $settings['projects_list'];
      
      $numbers = '';
      
      if ('yes' === $settings['show_numbers']) {
          $numbers = 'yes-numbers';
      } else {
          $numbers = 'no-numbers';
      }

?>

<!--Portfolio Showcase List-->
<div class="portfolio-showcase showcase-list <?php echo esc_attr($numbers); ?>" data-barba-namespace="sc-list">

    <!--List Projects Wrapper-->
    <div class="showcase-list-wrapper">

        <?php foreach ($projects_list as $selected_project) {  
            $project = $selected_project['select_project'];
        ?>

        <!--Project-->
        <div class="sl-project">
            <!--Project URL--><a href="<?php echo esc_url(get_the_permalink($project)) ?>">

                <!--Project Title-->
                <div class="sl-project-title"><?php echo get_the_title($project) ?></div>
                <!--/Project Title-->

                <!--Project Meta-->
                <div class="sl-project-meta">

                    <?php if ( 'yes' === $settings['show_category'] ) { ?>

                    <!--Project Category-->
                    <div class="sl-project-cat"> <?php 
                        $terms = get_the_terms( $project, 'project-categories' ); 
                        foreach($terms as $term) {
                       echo '<span>' . $term->name . '</span>';
                        }
                    ?></div>
                    <!--/Project Category-->
                    <?php } ?>

                    <?php if(( get_field('year' , $project) ) && ( 'yes' === $settings['show_year']) ) { ?>

                    <!--Project Year-->
                    <div class="sl-project-year"><?php the_field('year' , $project) ?></div>
                    <!--/Project Year-->


                    <?php } ?>
                </div>
                <!--/Project Meta-->

            </a>

            <!--Project Image-->
            <div class="sl-project-image">
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

        </div>
        <!--/Project-->

        <?php } ?>

    </div>
    <!--/List Projects Wrapper-->

    <!--List Project Images (Don't Touch)-->
    <div class="sl-images"></div>
    <!--List Project Images (Don't Touch)-->

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
<!--/Portfolio Showcase List-->



<?php
  }



    
}
