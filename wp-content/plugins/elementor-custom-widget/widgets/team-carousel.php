<?php
namespace Elementor;
class Team_Carousel_Widget extends Widget_Base {

    public function get_name() {
        return  'myewpricing-team-carousel-id';
    }

    public function get_title() {
        return esc_html__( 'Team Carousel', 'custom-elementor-widget' );
    }

    public function get_script_depends() {
        return [
            'myew-script'
        ];
    }

    public function get_icon() {
        return 'eicon-slider-album';
    }

    public function get_categories() {
        return [ 'myew-for-elementor' ];
    }

    public function _register_controls() {
        // Content Settings
        $this->start_controls_section(
            'content_settings',
            [
                'label' => __( 'Content Settings', 'custom-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
            // Lists Repeater
            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'list_title',
                [
                    'label' => __( 'Title', 'custom-elementor-widget' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Text', 'custom-elementor-widget' ),
                    'label_block' => true
                ]
            );
            $repeater->add_control(
                'list_image',
                [
                    'label'   => __( 'Image', 'custom-elementor-widget' ),
                    'type'    => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ],
            );
            $this->add_control(
                'lists',
                [
                    'label' => __( 'lists Items', 'custom-elementor-widget' ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'list_title' => __( 'Text', 'custom-elementor-widget' ),
                        ],
                    ],
                    'title_field' => '{{{ list_title }}}',
                ]
            );
        $this->end_controls_section();

        // Lists Settings
        $this->start_controls_section(
            'Lists_settings',
            [
                'label' => __( 'Lists Settings', 'custom-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            // Desktop version numbers of blocks
            $this->add_control(
                'desktop',
                [
                    'label' => __( 'Desktop version', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'default' => 3,
                    'placeholder' => __( 'Enter the number of blocks 1 to 4', 'plugin-domain' ),
                ]
            );

            // Tablet version numbers of blocks
            $this->add_control(
                'tablet',
                [
                    'label' => __( 'Tablet version', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'default' => 2,
                    'placeholder' => __( 'Enter the number of blocks 1 to 3', 'plugin-domain' ),
                ]
            );

            // Mobile version numbers of blocks
            $this->add_control(
                'mobile',
                [
                    'label' => __( 'Mobile version', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'default' => 1,
                    'placeholder' => __( 'Enter the number of blocks 1 to 2', 'plugin-domain' ),
                ]
            );

            // show Slider
            $this->add_control(
                'slider',
                [
                    'label' => __( 'Slider', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'your-plugin' ),
                    'label_off' => __( 'Hide', 'your-plugin' ),
                    'return_value' => true,
                    'default' => true,
                ]
            );

            // show Loop
            $this->add_control(
                'loop',
                [
                    'label' => __( 'Loop', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'your-plugin' ),
                    'label_off' => __( 'Hide', 'your-plugin' ),
                    'return_value' => true,
                    'default' =>  true,
                ]
            );

            // show Dots
            $this->add_control(
                'dots',
                [
                    'label' => __( 'Dots', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'your-plugin' ),
                    'label_off' => __( 'Hide', 'your-plugin' ),
                    'return_value' => true,
                    'default' => true,
                ]
            );

            // Show Navs
            $this->add_control(
                'navs',
                [
                    'label' => __( 'Navs', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'your-plugin' ),
                    'label_off' => __( 'Hide', 'your-plugin' ),
                    'return_value' => true,
                    'default' => true,
                ]
            );

            // Margin
            $this->add_control(
                'margin',
                [
                    'label' => __( 'Margin', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'default' => 10,
                    'placeholder' => __( 'Enter the margin between to slides', 'plugin-domain' ),
                ]
            );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->add_render_attribute(
            'team_carousel_options',
            [
                'id'          => 'team-carousel-' . $this->get_id(),
                'data-desktop'   => $settings[ 'desktop' ],
                'data-tablet'   => $settings[ 'tablet' ],
                'data-mobile'   => $settings[ 'mobile' ],
                'data-slider'   => $settings[ 'slider' ],
                'data-loop'   => $settings[ 'loop' ],
                'data-dots'   => $settings[ 'dots' ],
                'data-navs'   => $settings[ 'navs' ],
                'data-margin' => $settings[ 'margin' ],
            ]
        );
        ?>
        <?php if( $settings[ 'slider' ] == true ) { ?>
            <div class="owl-carousel owl-theme team-carousel" <?php echo $this->get_render_attribute_string( 'team_carousel_options' ); ?>>
        <?php } else { ?>
            <div class="lists-our-team" <?php echo $this->get_render_attribute_string( 'team_carousel_options' ); ?>>
        <?php } ?>
            <?php foreach( $settings[ 'lists' ] as $list ) : ?>
                <div class="item">
                    <img src="<?php echo esc_url( $list[ 'list_image' ][ 'url' ] ); ?>"/>
                    <p><?php esc_attr_e( $list[ 'list_title' ] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type( new Team_Carousel_Widget() );