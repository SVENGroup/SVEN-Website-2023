<?php
namespace ElementorAlioth\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class AliothClients extends Widget_Base {
 
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
    return 'aliothclients';
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
    return __( 'Clients', 'alioth-elementor' );
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
    return 'eicon-gallery-grid';
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
        'label' => __( 'Clients', 'alioth-elementor' ),
      ]
    );
      
      $this->add_control(
			'columns',
			[
				'label' => esc_html__( 'Columns', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'column-5',
				'options' => [
					'column-1'  => esc_html__( '1', 'plugin-name' ),
					'column-2' => esc_html__( '2', 'plugin-name' ),
					'column-3' => esc_html__( '3', 'plugin-name' ),
					'column-4' => esc_html__( '4', 'plugin-name' ),
					'column-5' => esc_html__( '5', 'plugin-name' ),
				],
			]
		);
      
       $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'client_logo',
			[
				'label' => esc_html__( 'Client Logo', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

      $repeater ->add_control(
			'client_url',
			[
				'label' => esc_html__( 'Client URL', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);


		$this->add_control(
			'clients',
			[
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'client_url' => esc_html__( 'Client #1', 'plugin-name' ),
					],
					[
						'client_url' => esc_html__( 'Client #2', 'plugin-name' ),
					],
				],
				'title_field' => '{{{ client_url }}}',
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
				'default' => 0,
                'condition' => ['will_anim' => 'yes',],
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
      
      $anim = '' ;
      
      if ($settings['will_anim'] === 'yes') {
          
          $willAnim = 'data-anim="true"';
          $delay = 'data-delay="' . $settings['anim_delay'] . '"';
          $duration = 'data-duration="' . $settings['anim_duration'] . '"';
          
          $anim = $willAnim . $delay . $duration;
      } 

    ?>

<!--Clients-->
<div <?php echo $anim ?> class="alioth-clients <?php echo $settings['columns'] ?>">

    <?php foreach ($settings['clients'] as $client) { ?>

    <!--Client-->
    <div class="a-client"><a target="_blank" href="<?php echo $client['client_url'] ?>"><img alt="<?php echo $client['client_logo']['alt'] ?>" src="<?php echo $client['client_logo']['url'] ?>"></a></div>
    <!--/Client-->

    <?php } ?>
</div>
<!--/Clients-->

<?php
  }

}
