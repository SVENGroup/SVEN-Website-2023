<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class AliothBlog extends Widget_Base {
 
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
    return 'aliothblog';
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
    return __( 'Blog', 'alioth-elementor');
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
    return 'eicon-archive-posts';
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


$this->start_controls_section(
      'widget_content',
      [
        'label' => __( 'Blog', 'alioth-elementor' ),
      ]
    );
      
        $this->add_control(
			'blog_style',
			[
				'label' => esc_html__( 'Blog Style', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'blog-classic',
				'options' => [
					'blog-classic'  => esc_html__( 'Classic', 'plugin-name' ),
					'blog-list' => esc_html__( 'List', 'plugin-name' ),
				],
			]
		);
      
        $this->add_control(
			'number_posts',
			[
				'label' => esc_html__( 'Max Number of Posts', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 10,
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
      
      $options = array();

        $args = array(
            'hide_empty' => false,
        );

        $categories = get_categories($args);

        foreach ( $categories as $key => $category ) {
          $options[$category->term_id] = $category->name;
        }

        $this->add_control(
         'filter_cats',
          [
             'label' => __( 'Filter by Category', 'plugin-domain' ),
             'type' => \Elementor\Controls_Manager::SELECT2,
             'multiple' => true,
             'options' => $options,
            ]
        );
      
        $this->add_control(
			'show_date',
			[
				'label' => __( 'Post Date', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'alioth-elementor ' ),
				'label_off' => __( 'Hide', 'alioth-elementor ' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
      
        $this->add_control(
			'show_cats',
			[
				'label' => __( 'Post Categories', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'alioth-elementor ' ),
				'label_off' => __( 'Hide', 'alioth-elementor ' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
      
        $this->add_control(
			'show_excerpt',
			[
				'label' => __( 'Post Excerpt', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'alioth-elementor ' ),
				'label_off' => __( 'Hide', 'alioth-elementor ' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
      
      
    $this->end_controls_section();
      
      $this->start_controls_section(
			'project_elements',
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
				'selector' => '{{WRAPPER}} .post-title h2, {{WRAPPER}} .post-title h3',
			]
		);
      
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .post-title h2, {{WRAPPER}} .post-title h3' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cat_date_typography',
                'label' => __('Category & Date Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .post-date a, {{WRAPPER}} .post-cat a',
			]
		);
      
        $this->add_control(
			'cat_date_color',
			[
				'label' => esc_html__( 'Category & Date Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .post-date a, {{WRAPPER}} .post-cat a' => 'color: {{VALUE}}'
				],
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'summary_typography',
                'label' => __('Summary Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .post-summary',
			]
		);
      
        $this->add_control(
			'summary_color',
			[
				'label' => esc_html__( 'Summary Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .post-summary' => 'color: {{VALUE}}'
				],
			]
		);
      
        $this->add_control(
			'sep_color',
			[
				'label' => esc_html__( 'Seperator Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .post.alioth-post::after' => 'background-color: {{VALUE}}'
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
      
  $cats = $settings['filter_cats'];
      
      
   $args = array(  
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $settings['number_posts'],
	    'orderby' => $settings['order_by'],
        'order' => $settings['order'],
        'cat'    => $cats
//        'post__not_in' =>  $exclude_ids,


    );

    $loop = new \WP_Query( $args ); 
    wp_reset_postdata(); 
      
      $classes = [];
      $classes = 'post alioth-post';

?>

<!--Alioth Blog List-->
<div class="alioth-blog <?php echo esc_attr($settings['blog_style']) ?>">

    <?php while ( $loop->have_posts() ) : $loop->the_post();  ?>



    <?php if ($settings['blog_style'] === 'blog-list') { ?>
    <!--Blog Post-->
    <div <?php post_class($classes); ?>>

        <?php if (has_post_thumbnail()) : ?>


        <!--Blog Post Image-->
        <div class="post-image">
             <?php $alt = get_post_meta ( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>
            
            <img alt="<?php echo $alt; ?>" src="<?php echo get_the_post_thumbnail_url() ?>">

        </div>
        <!--/Blog Post Image-->

        <?php endif; ?>



        <?php if ($settings['show_date'] === 'yes') { ?>

        <!--Blog Post Date-->
        <div class="post-date"><?php alioth_posted_on(); ?></div>
        <!--/Blog Post Date-->

        <?php } ?>

        <?php if ($settings['show_cats'] === 'yes') { ?>

        <!--Blog Post Cat-->
        <div class="post-cat"><?php echo  get_the_category_list( esc_html__( ', ', 'alioth' ) ); ?></div>
        <!--/Blog Post Cat-->

        <?php } ?>

        <a href="<?php echo get_the_permalink(); ?>">

            <!--Blog Post Title-->
            <div class="post-title">

                <h2><?php echo get_the_title(); ?></h2>

            </div>
            <!--Blog Post Title-->

            <?php if ($settings['show_excerpt'] === 'yes') { ?>

            <!--Blog Post Summary-->
            <h5 class="post-summary"> <?php echo get_the_excerpt(); ?></h5>
            <!--/Blog Post Summary-->

            <?php } ?>

        </a>

    </div>
    <!--/Blog Post-->

    <?php } ?>


    <?php if ($settings['blog_style'] === 'blog-classic') { ?>

    <!--Blog Post-->
    <div id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>



        <!--Blog Post URL--><a href="<?php echo get_the_permalink(); ?>">

            <?php if (has_post_thumbnail()) : ?>
            <!--Blog Post Image-->
            <div class="post-image">
                
                 <?php $alt = get_post_meta ( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>
                <img alt="<?php echo $alt; ?>" src="<?php echo get_the_post_thumbnail_url() ?>">

            </div>
            <!--/Blog Post Image-->
            <?php endif; ?>

            <!--Blog Post Meta-->
            <div class="post-meta">

                <!--Blog Post Title-->
                <div class="post-title">

                    <h3><?php echo get_the_title(); ?></h3>

                </div>
                <!--/Blog Post Title-->

                <?php if ($settings['show_date'] === 'yes') { ?>
                <!--Blog Post Date-->
                <h5 class="post-date"><?php alioth_posted_on(); ?></h5>
                <!--/Blog Post Date-->
                <?php } ?>

                <?php if ($settings['show_cats'] === 'yes') { ?>
                <!--Blog Post Category-->
                <h5 class="post-cat"><?php echo  get_the_category_list( esc_html__( ', ', 'alioth' ) ); ?></h5>
                <!--Blog Post Category-->
                <?php } ?>

            </div>
            <!--/Blog Post Meta-->
        </a>

    </div>
    <!--Blog Post-->


    <?php } ?>

    <?php endwhile; wp_reset_query(); ?>


    <!--Post Images (Don't Touch)-->
    <div class="post-images"></div>
    <!--/Post Images (Don't Touch)-->

</div>
<!--/Alioth Blog List-->



<?php
  }



    
}
