<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class ShowcaseGrid extends Widget_Base {
 
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
    return 'showcasegrid';
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
    return __( 'Showcase Grid', 'alioth-elementor');
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
    return 'eicon-posts-grid';
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
      
        $options = array();

        $args = array(
            'taxonomy' => 'project-categories',
            'hide+empty' => 'false'
        );

        $categories = get_categories($args);

        foreach ( $categories as $key => $category ) {
          $options[$category->term_id] = $category->name;
        }
 
      
        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Projects', 'alioth-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
      
        $this->add_control(
			'select_cat',
			[
				'label' => __( 'Select Category', 'alioth-elementor'),
				'label_block' => true,
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => $options,
                'multiple' => true
			]
		);
       
        $this->add_control(
			'pagination',
			[
				'label' => __( 'Pagination', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'alioth-elementor ' ),
				'label_off' => __( 'No', 'alioth-elementor ' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
       
       	$this->add_control(
			'posts_number',
			[
				'label' => esc_html__( 'Posts per page', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 10,
                 'condition' => [ 'pagination' => 'yes' ]
			]
		);
      
       
       $this->add_control(
			'next_page_text',
			[
				'label' => esc_html__( 'Next Page Text', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Next Page', 'alioth-elementor' ),
				'placeholder' => esc_html__( 'Type your text here', 'alioth-elementor' ),
                 'condition' => [ 'pagination' => 'yes' ]
			]
		);
       
       $this->add_control(
			'prev_page_text',
			[
				'label' => esc_html__( 'Prev Page Text', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Previous Page', 'alioth-elementor' ),
				'placeholder' => esc_html__( 'Type your text here', 'alioth-elementor' ),
                 'condition' => [ 'pagination' => 'yes' ]
			]
		);
        
          $this->add_control(
			'order_by',
			[
				'label' => esc_html__( 'Order By', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'ID'  => esc_html__( 'ID', 'plugin-name' ),
					'title'  => esc_html__( 'Title', 'plugin-name' ),
					'date'  => esc_html__( 'Date', 'plugin-name' ),
					'author'  => esc_html__( 'Author', 'plugin-name' ),
					'type'  => esc_html__( 'Type', 'plugin-name' ),

				],
			]
		);
      
        $this->add_control(
			'order',
			[
				'label' => esc_html__( 'Order', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'ASC'  => esc_html__( 'ASC', 'plugin-name' ),
					'DESC'  => esc_html__( 'DESC', 'plugin-name' )

				],
                
			]
		);

        $this->add_control(
			'show_cat',
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
			'apc_style',
			[
                
				'label' => esc_html__( 'Style', 'alioth-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);


        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cats_typography',
                'label' => __('Categories Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} ul.aw-cats li, {{WRAPPER}} .apc-cats ul li::after',
			]
		);
      
        $this->add_control(
			'cats_color',
			[
				'label' => esc_html__( 'Categories Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					 '{{WRAPPER}} ul.aw-cats li' => 'color: {{VALUE}}',
					 '{{WRAPPER}} ul.aw-cats li.active::after' => 'color: {{VALUE}}'
				],
			]
		);
       
        $this->add_control(
			'cats_active_color',
			[
				'label' => esc_html__( 'Active Category Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					 '{{WRAPPER}} ul.aw-cats li.active' => 'color: {{VALUE}}'
				],
			]
		);
      
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'project_title_typography',
                'label' => __('Project Title Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .aw-project-title',
			]
		);
      
        $this->add_control(
			'project_title_color',
			[
				'label' => esc_html__( 'Project Title Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .aw-project-title' => 'color: {{VALUE}}'
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'project_cat_typography',
                'label' => __('Project Category Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .aw-project-cat',
			]
		);
      
        $this->add_control(
			'project_cat_color',
			[
				'label' => esc_html__( 'Project Category Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .aw-project-cat' => 'color: {{VALUE}}'
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
  
      
       
   $selectCat = $settings['select_cat'];
      $cats = array();
      
    foreach ($selectCat as $cat) {
        
        $cats[] = $cat;
        
  } 
      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
      
      $postsPerPage = '';
      
   if ( 'yes' === $settings['pagination'] ) {
    
    $postsPerPage = $settings['posts_number'];   
   
   }
   
   $args = array(  
        'post_type' => 'portfolio',
        'orderby' => $settings['order_by'],
        'order' => $settings['order'],
        'posts_per_page' => $postsPerPage,
       	'no_rows_found'          => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
		'paged' => $paged,
        'tax_query' => array(
        array(
            'taxonomy' => 'project-categories',
            'field'    => 'term_id',
            'terms'    =>  $cats,
        ),

    ),
    );

    $loop = new \WP_Query( $args ); 
    wp_reset_postdata(); 

?>



<!--Alioth Works-->
<div class="alioth-works masonry column_2 portfolio-showcase" data-animate="true">

    <!--Work Categories-->
    <div class="aw-categories">

        <ul class="aw-cats">


            <!--Work Category-->
            <li data-cat="all">All</li>
            <!--/Work Category-->

            <?php 

              foreach ($selectCat as  $cat) { 
            
            $category = get_term( $cat, 'project-categories' ); 
            
  
    ?>

            <!--Work Category-->
            <li data-cat="<?php echo esc_attr($category->slug) ?>"><?php  echo $category->name; ?></li>
            <!--/Work Category-->

            <?php   }  ?>

        </ul>

    </div>
    <!--/Work Categories-->

    <!--Works Wrapper-->
    <div class="aw-works-wrapper">

        <!--Works Wrapper Pres (Don't Touch)-->
        <div class="aw-works-sizer"></div>
        <div class="aw-works-gutter"></div>
        <div class="aw-works-stamp"></div>
        <!--/Works Wrapper Pres (Don't Touch)-->


        <?php while ( $loop->have_posts() ) : $loop->the_post(); 
        
          $terms = get_the_terms( get_the_ID(), 'project-categories' ); 

        
        ?>
        <!--Single Project-->
        <div data-category="<?php foreach($terms as $term) { echo $term->slug . ' '; } ?>" class="aw-project">

            <!--Project URL--><a href="<?php echo get_the_permalink(); ?>">

                <!--Project Image-->
                <div class="aw-project-image">

                    <?php   if (get_field('featured_image_type' , get_the_ID()) === 'video') {
                    $featured_video = true;
                    } else {
                    $featured_video = false;
                    }

                    if ($featured_video == true) {

                    $provider = get_field('video_provider' , get_the_ID());

                    if ($provider === 'youtube') { ?>
                    <!--Project Video-->
                    <div class="showcase-video" data-plyr-provider="youtube" data-plyr-embed-id="<?php the_field('video_id' , get_the_ID()) ?>"></div>
                    <!--/Project Video-->
                    <?php   }
                
                 if ($provider === 'vimeo') { ?>
                    <!--Project Video-->
                    <div class="showcase-video" data-plyr-provider="vimeo" data-plyr-embed-id="<?php the_field('video_id' , get_the_ID()) ?>"></div>
                    <!--/Project Video-->
                    <?php }   
                
                if ($provider === 'self_hosted') { ?>
                    <video class="showcase-video" src="<?php echo esc_attr(get_field('upload_video' , $project)); ?>" autoplay="true" loop="true" muted="muted" playsinline="true" controlslist="nodownload"></video>
                    <?php } ?>


                    <?php } else {  
                    
                       $alt = get_post_meta ( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); 
                    ?>


                    <img alt="<?php echo $alt; ?>" src="<?php echo get_the_post_thumbnail_url(); ?>">

                    <?php } ?>
                </div>
                <!--/Project Image-->

                <!--Project Metas-->
                <div class="aw-project-meta">

                    <!--Project Title-->
                    <div class="aw-project-title"><?php echo get_the_title(); ?></div>
                    <!--/Project Title-->

                    <!--Project Category-->
                    <div class="aw-project-cat"><?php 
                        foreach($terms as $term) { echo '<span>' . $term->name . '</span>'; }
                    ?></div>
                    <!--/Project Category-->

                </div>
                <!--/Project Metas-->

            </a>

        </div>
        <!--/Single Project-->


        <?php endwhile; wp_reset_query(); ?>



    </div>
    <!--/Works Wrapper-->
    <?php if ( 'yes' === $settings['pagination'] ) { 
    
if ($loop->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
    <nav class="alioth-works-pagination">

        <div class="next-posts-link">
            <?php echo get_previous_posts_link( '<h3>' . $settings['prev_page_text'] . '</h3>' ); // display newer posts link ?>
        </div>
        <div class="prev-posts-link">
            <?php echo get_next_posts_link( '<h3>' . $settings['next_page_text'] . '</h3>', $loop->max_num_pages ); // display older posts link ?>
        </div>
    </nav>
    <?php }  } ?>
    <?php wp_reset_postdata(); ?>
</div>
<!--/Alioth Works-->



<?php
  }



    
}
