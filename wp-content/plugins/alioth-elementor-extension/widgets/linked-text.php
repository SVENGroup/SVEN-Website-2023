<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class AliothLinkedText extends Widget_Base {
 
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
    return 'aliothlinkedtext';
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
    return __( 'Linked Text', 'alioth-elementor' );
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
    return 'eicon-text-area';
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
      
      
    $this->start_controls_section(
      'widget_content',
      [
        'label' => __( 'Linked Text', 'alioth-elementor' ),
      ]
    );
      
       $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'text', [
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'List Title' , 'plugin-name' ),
				'label_block' => true,
			]
		);
      
      $repeater->add_control(
			'linked',
			[
				'label' => __( 'Linked?', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'alioth-elementor ' ),
				'label_off' => __( 'No', 'alioth-elementor ' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        
      $repeater->add_control(
			'link', [
				'label' => esc_html__( 'Link', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => false,
                'condition' => ['linked' => 'yes']
			]
		);
      
            $repeater->add_control(
			'link_text', [
				'label' => esc_html__( 'Link Text', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => false,
                'condition' => ['linked' => 'yes']
			]
		);

		$this->add_control(
			'list',
			[
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'text' => esc_html__( 'Title #1', 'plugin-name' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'plugin-name' ),
					],
					[
						'text' => esc_html__( 'Title #2', 'plugin-name' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'plugin-name' ),
					],
				],
				'title_field' => '{{{ text }}}',
			]
		);
      
      $this->add_control(
			'will_anim',
			[
				'label' => __( 'Animate', 'alioth-elementor ' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'alioth-elementor ' ),
				'label_off' => __( 'No', 'alioth-elementor ' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->add_control(
			'anim_duration',
			[
				'label' => esc_html__( 'Animation Duration', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0.1,
				'max' => 100,
				'step' => 0.1,
				'default' => 1,
                'condition' => ['will_anim' => 'yes',],
			]
		);
      
        $this->add_control(
			'anim_delay',
			[
				'label' => esc_html__( 'Animation Delay', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'step' => 0.1,
				'default' => 0.7,
                'condition' => ['will_anim' => 'yes',],
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
      
         $this->add_control( 
			'text_type',
			[
				'label' => esc_html__( 'Text Type', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'h1' => [
						'title' => esc_html__( 'H1', 'alioth-elementor' ),
						'icon' => 'eicon-editor-h1',
					],
                    'h2' => [
						'title' => esc_html__( 'H2', 'alioth-elementor' ),
						'icon' => 'eicon-editor-h2',
					],
                    'h3' => [
						'title' => esc_html__( 'H3', 'alioth-elementor' ),
						'icon' => 'eicon-editor-h3',
					],
                    'h4' => [
						'title' => esc_html__( 'H4', 'alioth-elementor' ),
						'icon' => 'eicon-editor-h4',
                    ],
                    'h5' => [
						'title' => esc_html__( 'H5', 'alioth-elementor' ),
						'icon' => 'eicon-editor-h5',
					],
                    'h6' => [
						'title' => esc_html__( 'H6', 'alioth-elementor' ),
						'icon' => 'eicon-editor-h6',
					],
                    'p' => [
						'title' => esc_html__( 'Paragraph', 'alioth-elementor' ),
						'icon' => ' eicon-editor-paragraph',
					],

				],
				'default' => 'h1',
				'toggle' => true,
			]
		);
      
      $this->add_control(
			'font_size',
			[
				'label' => esc_html__( 'Font Size (vw)', 'alioth-elementor' ),
				'description' => esc_html__( 'We rescommend to use vw unit for big texts because of the responsiveness of the text.', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 500,
				'step' => 1,
				'default' => 10,
			]
		);
      
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
                'label' => __('Text Typography' , 'alioth-elementor'),
				'selector' => '{{WRAPPER}} .lt-text',
                'exclude'=> ['font_size' , 'line_height'],
			]
		);
      
      $this->add_control(
			'text_alignment',
			[
				'label' => esc_html__( 'Text Alignment', 'alioth-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'align-left' => [
						'title' => esc_html__( 'Left', 'alioth-elementor' ),
						'icon' => 'eicon-h-align-left',
					],
                    'align-center' => [
						'title' => esc_html__( 'Center', 'alioth-elementor' ),
						'icon' => 'eicon-h-align-center',
					],
					'align-right' => [
						'title' => esc_html__( 'Right', 'alioth-elementor' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'align-center',
				'toggle' => true,
			]
		);

      
        $this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .lt-text' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_control(
			'text_a_color',
			[
				'label' => esc_html__( 'Linked Line Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .linked-line a' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->add_control(
			'text_target_color',
			[
				'label' => esc_html__( 'Linked Line Target Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .link-target' => 'color: {{VALUE}}',
				],
			]
		);
        
        $this->add_control(
			'underline_color',
			[
				'label' => esc_html__( 'Underline Color', 'alioth-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .linked-text.loaded a::before' => 'background-color: {{VALUE}}',
				],
			]
		);
      
       $this->add_control(
			'underline_height',
			[
				'label' => esc_html__( 'Underline Height', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .linked-text.loaded a::before' => 'height: {{SIZE}}{{UNIT}};',
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
    $textType = $settings['text_type'];
      
      $anim = '' ;
      
      if ($settings['will_anim'] === 'yes') {
          
          $willAnim = 'data-animate="true"';
          $delay = 'data-delay="' . $settings['anim_delay'] . '"';
          $duration = 'data-duration="' . $settings['anim_duration'] . '"';
          
          $anim = $willAnim . $delay . $duration;
      };

    ?>


<!--Linked Text-->
<div <?php echo $anim ?> class="hello-heading linked-text dark <?php echo $settings['text_alignment'] ?>">

    <<?php echo $textType; ?> class="lt-text" style="font-size: <?php echo $settings['font_size']; ?>vw;">

        <?php foreach (  $settings['list'] as $key => $item ) {  

      if ($item['linked'] === 'yes') {
        
        echo '<br><a data-target="'. $item['link_text'] .'" href="'. $item['link'] .'">' . $item['text'] . '</a>' ;
    } else {
        
        if ($key < 1) {
             echo $item['text'];
            
        } else {
             echo '<br>' . $item['text'];
            }
        
        } 
        }?>

    </<?php echo $textType; ?>>

</div>
<!--/Linked Text-->

<?php
  }

}
