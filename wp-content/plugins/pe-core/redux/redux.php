<?php
if (!class_exists('Redux'))
{
    return;
}

$opt_name = 'pe-redux';

$theme = wp_get_theme(); // For use with some settings. Not necessary.
$args = array(
    'display_name' => $theme->get('Name') . ' Options',
    'display_version' => $theme->get('Version') ,
    'menu_title' => esc_html__('Theme Options', 'pe-core') ,
    'customizer' => false,
    'dev_mode' => false,
    'tempaltes_path' => __DIR__ . '/templates/panel',

);


Redux::setArgs($opt_name, $args);

Redux::setSection($opt_name, array(
    'title' => esc_html__('Site Layout', 'pe-core') ,
    'id' => 'site_layout_global',
    'icon' => 'eicon-global-settings',
    'fields' => array(

array(
    'id'       => 'site_layout',
    'type'     => 'image_select',
    'options'  => array(
        'light'      => array(
            'alt'   => 'Light', 
            'img'   => plugin_dir_url( __FILE__ ) . 'img/select_light.jpg',
            'title' => esc_html__('Light' , 'pe-core'),

        ),
        'dark'      => array(
            'alt'   => 'Dark', 
            'img'   => plugin_dir_url( __FILE__ ) . 'img/select_dark.jpg',
             'title' => esc_html__('Dark' , 'pe-core'),
        )
    ),
    'default' => 'light'
),

    )
));

Redux::setSection($opt_name, array(

    'title' => esc_html__('Header', 'pe-core') ,
    'id' => 'header_options',
    'icon' => 'eicon-header',
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('General', 'pe-core') ,
    'id' => 'header-general-settings',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'header_layout',
            'type' => 'button_set',
            'title' => __('Header Layout', 'pe-core') ,
            'subtitle' => esc_html__('Select header layout.', 'pe-core'),
            'options' => array(
                'light' => 'Light',
                'dark' => 'Dark',
            ) ,
            'default' => 'dark',
        ) ,
        array(
            'id' => 'header_height',
            'type' => 'dimensions',
            'units' => array(
                'em',
                'px',
                '%'
            ) ,
            'width' => false,
            'title' => __('Header Height', 'pe-core') ,
            'subtitle' => esc_html__('Set height for header.', 'pe-core'),
            'default' => array(
                'height' => '150'
            ) ,
            'output' => array(
                '.site-header'
            ) , 
            
        ) ,
        
        array(
            'id' => 'menu_layout',
            'type' => 'button_set',
            'title' => __('Fullscreen Menu Layout', 'pe-core') ,
            'options' => array(
                'light' => 'Light',
                'dark' => 'Dark',
            ) ,
            'default' => 'dark',
        ) ,
        array(
            'id' => 'logo_size',
            'type' => 'dimensions',
            'units' => array(
                'em',
                'px',
                '%'
            ) ,
            'title' => __('Logo Size', 'pe-core') ,
            'subtitle' => esc_html__('Header logo dimensions.', 'pe-core'),
            'default' => false,
            'output' => array(
                '.site-logo'
            ) , // An array of CSS selectors
            
        ) ,

        array(
            'id' => 'sticky_header',
            'type' => 'button_set',
            'title' => __('Header Type', 'pe-core') ,
            'subtitle' => esc_html__('Select header type.', 'pe-core'),
            'options' => array(
                'sticky_header' => 'Sticky',
                'static_header' => 'Static'
            ) ,
            'default' => 'sticky_header',

        ),
        
         array(
            'id' => 'sticky_header_height',
            'type' => 'dimensions',
            'units' => array(
                'em',
                'px',
                '%'
            ) ,
            'width' => false,
             'subtitle' => esc_html__('Set an height for sticky header.', 'pe-core'),
            'title' => __('Stıcky Header Height', 'pe-core') ,
            'default' => array(
                'height' => '100'
            ) ,
           'required' => array(
                'sticky_header',
                'not',
                'static_header'
            ) , // An array of CSS selectors
            
        ) ,
        array(
            'id' => 'sticky_animate',
            'type' => 'switch',
            'title' => __('Animate Sticky Header', 'pe-core') ,
            'on' => __('Yes', 'pe-core') ,
            'off' => __('No', 'pe-core') ,
            'subtitle' => esc_html__('Switch "no" if you dont want to animate sticky header.', 'pe-core'),
            'default' => true,
            'required' => array(
                'sticky_header',
                'not',
                'static_header'
            ) ,
            
        ) ,


    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Menu', 'pe-core') ,
    'id' => 'header-menu-settings',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'menu_layout',
            'type' => 'button_set',
            'title' => __('Menu Layout', 'pe-core') ,
            'subtitle' => esc_html__('Select menu layout.', 'pe-core'),
            'options' => array(
                'dark' => 'Dark',
                'light' => 'Light',
            ) ,
            'default' => 'light',
        ) ,
        array(
            'id' => 'menu_style',
            'type' => 'button_set',
            'subtitle' => esc_html__('Select menu style.', 'pe-core'),
            'title' => __('Menu Style', 'pe-core') ,
            'options' => array(
                'fullscreen' => 'Fullscreen',
                'classic' => 'Classic',
            ) ,
            'default' => 'classic',
        ) ,
        array(
            'id' => 'fs_right_widget',
            'type' => 'button_set',
            'title' => esc_html__('Right Widget Type', 'pe-core') ,
            'subtitle' => esc_html__('Select fullscreen menu right widget type.', 'pe-core') ,
            'options' => array(
                'cta' => 'CTA',
                'custom' => 'Custom'
            ) ,
            'default' => 'cta',
            'required' => array(
                'menu_style',
                '=',
                'fullscreen'
            ) ,
        ) ,
        array(
            'id' => 'cta_text',
            'type' => 'text',
            'title' => __('CTA Text', 'pe-core') ,
            'subtitle' => esc_html__('Enter your call to action text.', 'pe-core'),
            'placeholder' => 'Eg: hello@pethemes.com',
            'default' => '',
            'required' => array(
                'fs_right_widget',
                '=',
                'cta'
            ) ,
        ) ,
        array(
            'id' => 'cta_url',
            'type' => 'text',
            'title' => __('CTA URL', 'pe-core') ,
            'subtitle' => esc_html__('Enter your call to action URL.', 'pe-core'),
            'placeholder' => 'Eg: mailto: hello@pethemes.com',
            'default' => '',
            'required' => array(
                'fs_right_widget',
                '=',
                'cta'
            ) ,
        ) ,
        array(
            'id' => 'cta_target',
            'type' => 'select',
            'title' => __('Open CTA in', 'pe-core') ,
            'options' => array(
                '_blank' => 'New Tab',
                '_self' => 'Same Tab',
            ) ,
            'default' => '_self',
            'required' => array(
                'fs_right_widget',
                '=',
                'cta'
            ) ,
        ) ,
        array(
            'id' => 'fs_right_custom',
            'type' => 'editor',
            'title' => esc_html__('Custom Content', 'pe-core') ,
            'subtitle' => esc_html__('Custom content for fullscreen menu right widget.', 'pe-core') ,
            'default' => '',
            'args' => array(
                'teeny' => true,
                'textarea_rows' => 10
            ) ,
            'required' => array(
                'fs_right_widget',
                '=',
                'custom'
            ) ,
        ) ,

        array(
            'id' => 'fs_left_widget',
            'type' => 'button_set',
            'title' => esc_html__('Left Widget Type', 'pe-core') ,
            'subtitle' => esc_html__('Select fullscreen menu left widget type.', 'pe-core') ,
            'options' => array(
                'social-connects' => 'Socials',
                'custom' => 'Custom'
            ) ,
            'default' => 'social-connects',
            'required' => array(
                'menu_style',
                '=',
                'fullscreen'
            ) ,
        ) ,
        array(
            'id' => 'fs_left_custom',
            'type' => 'editor',
            'title' => esc_html__('Custom Content', 'pe-core') ,
            'subtitle' => esc_html__('Custom content for fullscreen menu left widget.', 'pe-core') ,
            'default' => '',
            'args' => array(
                'teeny' => true,
                'textarea_rows' => 10
            ) ,
            'required' => array(
                'fs_left_widget',
                '=',
                'custom'
            ) ,
        ) ,
        
        array(
           'id'=>'social-connects',
    'type' => 'multi_text',
    'title' => esc_html__('Social Connects', 'pe-core'),
    'subtitle' => esc_html__('Add your social connections here.', 'pe-core'),
    'desc' => esc_html__('You need to leave a space between title and website (For example: Facebook http://facebook.com).', 'pe-core'),
            'required' => array(
                'fs_left_widget',
                '=',
                'social-connects'
            ) ,
        ) ,


    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Widgets', 'pe-core') ,
    'id' => 'header-widgets',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'header_widget',
            'type' => 'button_set',
            'title' => __('Header Widget Type', 'pe-core') ,
            'subtitle' => __('Select "custom" if you dont want to use default widget.', 'pe-core') ,
            'options' => array(
                'button' => 'Button',
                'custom' => 'Custom',

            ) ,
            'default' => 'button',
        ) ,
        array(
            'id' => 'hw_button_text',
            'type' => 'text',
            'title' => __('Button Text', 'pe-core') ,
            'subtitle' => __('Enter button text.', 'pe-core') ,
            'placeholder' => 'Eg: Start Project',
            'default' => '',
            'required' => array(
                'header_widget',
                '=',
                'button'
            ) ,
        ) ,
        array(
            'id' => 'hw_button_url',
            'type' => 'text',
            'title' => __('Button URL', 'pe-core') ,
            'subtitle' => __('Enter button URL.', 'pe-core') ,
            'placeholder' => 'Eg: mailto: hello@pethemes.com',
            'default' => '',
            'required' => array(
                'header_widget',
                '=',
                'button'
            ) ,
        ) ,
        array(
            'id' => 'hw_button_target',
            'type' => 'select',
            'title' => __('Open Link in', 'pe-core') ,
            'options' => array(
                '_blank' => 'New Tab',
                '_self' => 'Same Tab',
            ) ,
            'default' => '_self',
            'required' => array(
                'header_widget',
                '=',
                'button'
            ) ,
        ) ,
        array(
            'id' => 'hw_button_bg_color',
            'type' => 'color_rgba',
            'subtitle' => __('Set button background color.', 'pe-core') ,
            'title' => __('Button Background Color', 'pe-core') ,
            'output' => array(
                'background-color' => '.header-cta-but a::before'
            ) ,
            'required' => array(
                'header_widget',
                '=',
                'button'
            ) ,
        ) ,

        array(
            'id' => 'hw_button_color',
            'type' => 'color_rgba',
            'title' => __('Button Text Color', 'pe-core') ,
            'subtitle' => __('Set button text color.', 'pe-core') ,
            'output' => array(
                'color' => '.header-cta-but a'
            ) ,
            'required' => array(
                'header_widget',
                '=',
                'button'
            ) ,
        ) ,

        array(
            'id' => 'hw_button_hover_color',
            'type' => 'color_rgba',
            'title' => __('Button Text Hover Color', 'pe-core') ,
            'subtitle' => __('Set button hover color.', 'pe-core') ,
            'output' => array(
                'color' => '.header-cta-but a::after'
            ) ,
            'required' => array(
                'header_widget',
                '=',
                'button'
            ) ,
        ) ,

        array(
            'id' => 'hw_custom',
            'type' => 'editor',
            'title' => esc_html__('Custom Content', 'pe-core') ,
            'subtitle' => esc_html__('Custom content for fullscreen menu right widget.', 'pe-core') ,
            'default' => '',
            'teeny' => false,
            'args' => array(
                'teeny' => true,
                'textarea_rows' => 10
            ) ,
            'required' => array(
                'header_widget',
                '=',
                'custom'
            ) ,
        ) ,
        
        array(
            'id' => 'shopping_cart',
            'subtitle' => __('Visibility options for shopping cart widget.', 'pe-core') ,
            'description' => __('If you select "show" option shoping cart widget will  be displayed only on shop pages.', 'pe-core') ,
            'type' => 'button_set',
            'title' => __('Shopping Cart ', 'pe-core') ,
            'options' => array(
                'hide' => 'Hide',
                'show' => 'Show',
                'always-show' => 'Always Show',
            ) ,
            'default' => 'show',
        ) ,

    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Footer', 'pe-core') ,
    'id' => 'footer',
    'icon' => 'eicon-footer',
    'fields' => array(
        array(
            'id' => 'footer_layout',
            'subtitle' => __('Select footer layout.', 'pe-core') ,
            'type' => 'button_set',
            'title' => __('Footer Layout', 'pe-core') ,
            'options' => array(
                'light' => 'Light',
                'dark' => 'Dark',
            ) ,
            'default' => 'light',
        ) ,
        array(
            'id' => 'footer_logo',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Footer Logo', 'pe-core') ,
            'subtitle' => esc_html__('Upload a logo for footer logo area.', 'pe-core') ,
            'default' => array(
                'url' => 'https://s.wordpress.org/style/images/codeispoetry.png'
            ) ,
        ) ,
        array(
            'id' => 'copyright_text',
            'type' => 'text',
            'title' => __('Copyright Text', 'pe-core') ,
            'subtitle' => __('Enter copyright text.', 'pe-core') ,
            'placeholder' => 'Eg:  2020©',
            'default' => '',
            'required' => array(
                'header_widget',
                '=',
                'button'
            ) ,
        ) ,
        
        array(
            'id' => 'bottom_right_widget',
            'type' => 'button_set',
            'title' => __('Bottom Right Widget', 'pe-core') ,
            'subtitle' => __('Select bottom right widget type.', 'pe-core') ,
            'options' => array(
                'none' => 'None',
                'menu' => 'Menu',
                'custom' => 'Custom',
            ) ,
            'default' => 'none',
        ) ,
        
        array(
            'id' => 'bottom_right_custom',
            'type' => 'editor',
            'title' => esc_html__('Custom Content', 'pe-core') ,
            'subtitle' => esc_html__('Custom content for footer bottom left widget.', 'pe-core') ,
            'default' => '',
            'args' => array(
                'teeny' => true,
                'textarea_rows' => 10
            ) ,
            'required' => array(
                'bottom_right_widget',
                '=',
                'custom'
            ) ,
        ) ,
        
        array(
            'id' => 'bottom_left_widget',
            'type' => 'button_set',
            'title' => __('Bottom Left Widget', 'pe-core') ,
            'subtitle' => __('Select bottom left widget type.', 'pe-core') ,
            'options' => array(
                'none' => 'None',
                'mail-button' => 'Mail Button',
                'custom' => 'Custom',
            ) ,
            'default' => 'none',
        ) ,
        
        array(
            'id' => 'mail-button-text',
            'type' => 'text',
            'title' => __('Mail Button Text', 'pe-core') ,
            'subtitle' => __('Enter your mail button text.', 'pe-core') ,
            'placeholder' => 'Eg:  hello@pethemes.com',
            'default' => '',
            'required' => array(
                'bottom_left_widget',
                '=',
                'mail-button'
            ) ,
        ) ,
        
        array(
            'id' => 'mail-button-url',
            'type' => 'text',
            'title' => __('Mail Button URL', 'pe-core') ,
            'subtitle' => __('Enter your mail button url.', 'pe-core') ,
            'placeholder' => 'Eg:  mailto:hello@pethemes.com',
            'default' => '',
            'required' => array(
                'bottom_left_widget',
                '=',
                'mail-button'
            ) ,
        ) ,
        
        array(
            'id' => 'mail_button_target',
            'type' => 'select',
            'title' => __('Open Link in', 'pe-core') ,
            'options' => array(
                '_blank' => 'New Tab',
                '_self' => 'Same Tab',
            ) ,
            'default' => '_self',
            'required' => array(
                'bottom_left_widget',
                '=',
                'mail-button'
            ) ,
        ) ,
        
        array(
            'id' => 'bottom_left_custom',
            'type' => 'editor',
            'title' => esc_html__('Custom Content', 'pe-core') ,
            'subtitle' => esc_html__('Custom content for footer bottom left widget.', 'pe-core') ,
            'default' => '',
            'args' => array(
                'teeny' => true,
                'textarea_rows' => 10
            ) ,
            'required' => array(
                'bottom_left_widget',
                '=',
                'custom'
            ) ,
        ) ,

    )
));

Redux::setSection($opt_name, array(
    'title' => __('Portfolio', 'pe-core') ,
    'id' => 'cart',
    'subsection' => false,
    'icon' => 'eicon-single-page',
    'fields' => array(
        array(
            'id' => 'project_header',
            'type' => 'button_set',
            'title' => __('Project Header', 'pe-core') ,
            'subtitle' => __('Select project header style.', 'pe-core') ,
            'options' => array(
                'no-header' => 'No Header',
                'style_1' => 'Half Image',
                'style_2' => 'Full Image',
                'style_3' => 'No Image',
            ) ,
            'default' => 'style_1',
        ),
        
        array(
            'id' => 'show_project_cat',
            'type' => 'switch',
            'title' => __('Category', 'pe-core') ,
            'on' => __('Show', 'pe-core') ,
            'off' => __('Hide', 'pe-core') ,
            'default' => true,
            'subtitle' => __('Switch "Hide" if you dont want to display project category.', 'pe-core') ,
        ) ,
        
        array(
            'id' => 'show_project_summary',
            'type' => 'switch',
            'title' => __('Summary', 'pe-core') ,
            'on' => __('Show', 'pe-core') ,
            'off' => __('Hide', 'pe-core') ,
            'default' => true,
            'subtitle' => __('Switch "Hide" if you dont want to display project summary.', 'pe-core') ,
        ) ,
        
        array(
            'id' => 'show_project_client',
            'type' => 'switch',
            'title' => __('Client', 'pe-core') ,
            'on' => __('Show', 'pe-core') ,
            'off' => __('Hide', 'pe-core') ,
            'default' => true,
            'subtitle' => __('Switch "Hide" if you dont want to display project client.', 'pe-core') ,
        ) ,
        
        array(
            'id' => 'show_project_year',
            'type' => 'switch',
            'title' => __('Year', 'pe-core') ,
            'on' => __('Show', 'pe-core') ,
            'off' => __('Hide', 'pe-core') ,
            'default' => true,
            'subtitle' => __('Switch "Hide" if you dont want to display project category.', 'pe-core') ,
        ) ,
        
        array(
            'id' => 'show_next_project',
            'type' => 'switch',
            'title' => __('Next Project', 'pe-core') ,
            'on' => __('Show', 'pe-core') ,
            'off' => __('Hide', 'pe-core') ,
            'default' => true,
            'subtitle' => __('Switch "Hide" if you dont want to display next project.', 'pe-core') ,
        ) ,
        
        array(
            'id' => 'next_project_text',
            'type' => 'text',
            'title' => __('Next Project Text', 'pe-core') ,
            'subtitle' => __('Enter next project text here.', 'pe-core') ,
            'default' =>  __('Next Project', 'pe-core'),
            'required' => array(
                'show_next_project',
                '=',
                'true'
            ) ,
        ) ,
        array(
            'id' => 'portfolio-slug',
            'type' => 'text',
            'title' => __('Custom Portfolio Slug', 'pe-core') ,
            'subtitle' => __('Leave it empty if you want to continue using "portfolio" slug. ', 'pe-core') ,
            'description' => __('If you can not view your portfolio posts after you changed this, please update your permalink settings once.', 'pe-core') ,
        ) ,
        
)
));

Redux::setSection($opt_name, array(
    'title' => __('Pages', 'pe-core') ,
    'id' => 'pages',
    'icon' => 'eicon-table-of-contents',
    'fields' => array(
        
        array(
            'id' => 'show_page_header',
            'type' => 'switch',
            'title' => __('Page Header', 'pe-core') ,
            'on' => __('Show', 'pe-core') ,
            'off' => __('Hide', 'pe-core') ,
            'default' => true,
            'subtitle' => __('This option will be default option for all pages.', 'pe-core') ,
        ) ,
        
        array(
            'id' => 'animate_page_title',
            'type' => 'switch',
            'title' => __('Animate Page Title', 'pe-core') ,
            'on' => __('Yes', 'pe-core') ,
            'off' => __('No', 'pe-core') ,
            'default' => false,
            'subtitle' => __('Switch "yes" if you want to animate page title.', 'pe-core') ,
        ) ,
        
        array( 
            'id'          => 'page_title_typography',
            'type'        => 'typography', 
            'title'       => esc_html__('Page Title Typography', 'pe-core'),
            'google'      => true, 
            'font-backup' => true,
            'output'      => array('.page-header .page-title h1.big-title'),
            'units'       =>'px',
            'subtitle'    => esc_html__('Customize page header title.', 'pe-core'),
            'default'     => false,
    
),
       
         array(
            'id'       => 'page_header_bg',
            'type'     => 'color',
            'title'    => esc_html__('Page Header Background', 'pe-core'), 
            'subtitle' => esc_html__('Pick a background color for page headers.', 'pe-core'),
            'validate' => 'color',
            'output'   => array(
					'background-color'=> '.page-header',
					'important' => true,
				),
        ),
        
)
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog', 'pe-core') ,
    'id' => 'blog-settings',
    'icon' => 'eicon-archive-posts',
));

Redux::setSection($opt_name, array(
    'title' => __('Archive', 'pe-core') ,
    'id' => 'posts-page',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'archive_sidebar',
            'type' => 'button_set',
            'title' => __('Sidebar', 'pe-core') ,
           'subtitle' => __('Select sidebar position.', 'pe-core') ,
            'options' => array(
                'no-sidebar' => 'No Sidebar',
                'left-sidebar' => 'Left Sidebar',
                'right-sidebar' => 'Right Sidebar',
            ) ,
            'default' => 'right-sidebar',
        ),
        
        array(
            'id' => 'blog_page_header',
            'type' => 'switch',
            'title' => __('Blog Page Header', 'pe-core') ,
            'on' => __('Show', 'pe-core') ,
            'off' => __('Hide', 'pe-core') ,
            'default' => true,
            'subtitle' => __('Switch "Hide" if you dont want to display page header.', 'pe-core') ,
        ) ,
        
        array(
            'id' => 'blog_page_title',
            'type' => 'text',
            'title' => __('Blog Page Title', 'pe-core') ,
            'subtitle' => __('Enter blog page title', 'pe-core') ,
            'default' =>  __('Latest Posts', 'pe-core'),
            'required' => array(
                'blog_page_header',
                '=',
                'true'
            ) ,
        ) ,

        
        array(
            'id' => 'animate_title',
            'type' => 'switch',
            'title' => __('Animate Title', 'pe-core') ,
            'on' => __('Yes', 'pe-core') ,
            'off' => __('No', 'pe-core') ,
            'default' => true,
            'subtitle' => __('Switch "Yes" if you want to animate page title.', 'pe-core') ,
            'required' => array(
                'blog_page_header',
                '=',
                'true'
            ) ,
        ) ,
        
        array( 
    'id'          => 'blog_title_typography',
    'type'        => 'typography', 
    'title'       => esc_html__('Title Typography', 'pe-core'),
    'google'      => true, 
    'font-backup' => true,
    'output'      => array('.archive-header .page-title h1.big-title'),
    'units'       =>'px',
    'subtitle'    => esc_html__('Customize blog page title.', 'pe-core'),
    'default'     => false,
            'required' => array(
                'blog_page_header',
                '=',
                'true'
            ) ,
),
        
        array(
            'id'       => 'blog_header_bg',
            'type'     => 'color',
            'title'    => esc_html__('Header Background', 'pe-core'), 
            'subtitle' => esc_html__('Pick a background color for the blog page header.', 'pe-core'),
            'validate' => 'color',
            'output'   => array(
					'background-color'=> '.page-header.archive-header',
					'important' => true,
				),
            'required' => array(
                'blog_page_header',
                '=',
                'true'
            ) ,
        ),
        
        array(
   'id' => 'archive-post',
   'type' => 'section',
   'title' => esc_html__('Archive Post Settings', 'pe-core'),
   'indent' => false 
),
        
        array(
            'id' => 'show_post_date',
            'type' => 'switch',
            'title' => __('Post Date', 'pe-core') ,
            'on' => __('Show', 'pe-core') ,
            'off' => __('Hide', 'pe-core') ,
            'default' => true,
            'subtitle' => __('Switch "No" if you dont want to display post date.', 'pe-core') ,
        ) ,
        
        array(
            'id' => 'show_post_cat',
            'type' => 'switch',
            'title' => __('Post Category', 'pe-core') ,
            'on' => __('Show', 'pe-core') ,
            'off' => __('Hide', 'pe-core') ,
            'default' => true,
            'subtitle' => __('Switch "No" if you dont want to display post category.', 'pe-core') ,
        ) ,
        
        array(
            'id' => 'show_post_excerpt',
            'type' => 'switch',
            'title' => __('Post Excerpt', 'pe-core') ,
            'on' => __('Show', 'pe-core') ,
            'off' => __('Hide', 'pe-core') ,
            'default' => true,
            'subtitle' => __('Switch "No" if you dont want to display post excerpt.', 'pe-core') ,
        ) ,
        
        array(
            'id' => 'show_post_thumbnail',
            'type' => 'switch',
            'title' => __('Post Thumbnail', 'pe-core') ,
            'on' => __('Show', 'pe-core') ,
            'off' => __('Hide', 'pe-core') ,
            'default' => true,
            'subtitle' => __('Switch "No" if you dont want to display post thumbnail.', 'pe-core') ,
        ) ,
        
        array(
            'id' => 'read_more_text',
            'type' => 'text',
            'title' => __('Read More Text', 'pe-core') ,
            'subtitle' => __('Enter read more text.', 'pe-core') ,
            'default' =>  __('Read More', 'pe-core'),
        ) ,
        
                
        array(
    'id'     => 'section-end',
    'type'   => 'section',
    'indent' => false,
),
       
  
    )
));

Redux::setSection($opt_name, array(
    'title' => __('Single Post', 'pe-core') ,
    'id' => 'single-posts-page',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'single_post_sidebar',
            'type' => 'button_set',
            'title' => __('Sidebar', 'pe-core') ,
           'subtitle' => __('Select sidebar position.', 'pe-core') ,
            'options' => array(
                'no-sidebar' => 'No Sidebar',
                'left-sidebar' => 'Left Sidebar',
                'right-sidebar' => 'Right Sidebar',
            ) ,
            'default' => 'right-sidebar',
        ),
        array(
            'id' => 'single-post-thumbnail',
            'type' => 'switch',
            'title' => __('Post Thumbnail', 'pe-core') ,
            'on' => __('Show', 'pe-core') ,
            'off' => __('Hide', 'pe-core') ,
            'default' => true,
            'subtitle' => __('Switch "Hide" if you dont want to display post thumbnail.', 'pe-core') ,
        ) ,
        array(
            'id' => 'single-post-date',
            'type' => 'switch',
            'title' => __('Post Date', 'pe-core') ,
            'on' => __('Show', 'pe-core') ,
            'off' => __('Hide', 'pe-core') ,
            'default' => true,
            'subtitle' => __('Switch "Hide" if you dont want to display post date.', 'pe-core') ,
        ) ,
        
        array(
            'id' => 'single-post-cat',
            'type' => 'switch',
            'title' => __('Post Category', 'pe-core') ,
            'on' => __('Show', 'pe-core') ,
            'off' => __('Hide', 'pe-core') ,
            'default' => true,
            'subtitle' => __('Switch "Hide" if you dont want to display post category.', 'pe-core') ,
        ) ,
        
        array(
            'id' => 'single-post-nav',
            'type' => 'switch',
            'title' => __('Posts Navigation', 'pe-core') ,
            'on' => __('Show', 'pe-core') ,
            'off' => __('Hide', 'pe-core') ,
            'default' => true,
            'desc' => __('Switch "Hide" if you dont want to display next post area.', 'pe-core') ,
        ) ,
        
        array(
            'id' => 'post-nav-order',
            'type' => 'button_set',
            'title' => __('Posts Navigation Order', 'pe-core') ,
            'options' => array(
                'ASC' => 'ASC',
                'DESC' => 'DESC',
            ) ,
            'default' => 'ASC',
        ),
        
        array(
            'id' => 'next-post-text',
            'type' => 'text',
            'title' => __('Next Post Text', 'pe-core') ,
            'desc' => __('Replace "Next Post" text here.', 'pe-core') ,
            'default' => ''
        ) ,

    )
));

Redux::setSection($opt_name, array(
    'title' => __('Shop', 'pe-core') ,
    'id' => 'shop',
    'icon' => 'eicon-woocommerce',
));

Redux::setSection($opt_name, array(
    'title' => __('Shop Page', 'pe-core') ,
    'id' => 'shop-page',
    'subsection' => true,
    'fields' => array(
        
         array(
            'id'        => 'shop_columns',
            'type'      => 'slider',
            'title'     => esc_html__('Columns', 'pe-core'),
            'subtitle'  => esc_html__('Set product grid columns.', 'pe-core'),
            "default"   => 2,
            "min"       => 1,
            "step"      => 1,
            "max"       => 4,
            'display_value' => 'label'
        ),
        
        array(
            'id' => 'shop_sidebar',
            'type' => 'button_set',
            'title' => __('Sidebar', 'pe-core') ,
            'subtitle' => __('Select sidebar position.', 'pe-core') ,
            'options' => array(
                'no-sidebar' => 'No Sidebar',
                'left-sidebar' => 'Left Sidebar',
                'right-sidebar' => 'Right Sidebar',
            ) ,
            'default' => 'right-sidebar',
        ),
        array(
            'id' => 'shop_page_header',
            'type' => 'switch',
            'title' => __('Shop Page Header', 'pe-core') ,
            'on' => __('Show', 'pe-core') ,
            'off' => __('Hide', 'pe-core') ,
            'default' => true,
            'subtitle' => __('Switch "Hide" if you dont want to display page header.', 'pe-core') ,
        ) ,
        
        array(
            'id' => 'shop_page_title',
            'type' => 'text',
            'title' => __('Shop Page Title', 'pe-core') ,
            'subtitle' => __('Enter shop page title', 'pe-core') ,
            'default' =>  __('Shop', 'pe-core'),
            'required' => array(
                'blog_page_header',
                '=',
                'true'
            ) ,
        ) ,

        array(
            'id' => 'animate_shop_title',
            'type' => 'switch',
            'title' => __('Animate Title', 'pe-core') ,
            'on' => __('Yes', 'pe-core') ,
            'off' => __('No', 'pe-core') ,
            'default' => false,
            'subtitle' => __('Switch "Yes" if you want to animate page title.', 'pe-core') ,
            'required' => array(
                'blog_page_header',
                '=',
                'true'
            ) ,
        ) ,
       
        
        array( 
            'id'          => 'shop_title_typography',
            'type'        => 'typography', 
            'title'       => esc_html__('Title Typography', 'pe-core'),
            'google'      => true, 
            'font-backup' => true,
            'output'      => array('.shop-page-header .page-title h1.big-title'),
            'units'       =>'px',
            'subtitle'    => esc_html__('Customize shop page title.', 'pe-core'),
            'default'     => false,
            'required' => array(
                'shop_page_header',
                '=',
                'true'
            ) ,
        ),
        
        array(
            'id'       => 'shop_header_bg',
            'type'     => 'color',
            'title'    => esc_html__('Header Background', 'pe-core'), 
            'subtitle' => esc_html__('Pick a background color for the shop page header.', 'pe-core'),
            'validate' => 'color',
            'output'   => array(
					'background-color'=> '.page-header.shop-page-header',
					'important' => true,
				),
            'required' => array(
                'shop_page_header',
                '=',
                'true'
            ) ,
        ),
        
)
));



Redux::setSection($opt_name, array(
    'title' => __('Single Product', 'pe-core') ,
    'id' => 'single-product',
    'subsection' => true,
    'fields' => array(
        array(
            'id'       => 'product_header_bg',
            'type'     => 'color',
            'title'    => esc_html__('Header Background', 'pe-core'), 
            'subtitle' => esc_html__('Pick a background color for the product page header.', 'pe-core'),
            'validate' => 'color',
            'output'   => array(
					'background-color'=> '.product-page::before',
					'important' => true,
				),
        ),
        
        array(
            'id' => 'show_related_products',
            'type' => 'switch',
            'title' => __('Related Products', 'pe-core') ,
            'on' => __('Show', 'pe-core') ,
            'off' => __('Hide', 'pe-core') ,
            'default' => true,
            'subtitle' => __('Switch "Hide" if you dont want to display related products.', 'pe-core') ,
        ) ,
        
        array(
            'id' => 'related_product_height',
            'type' => 'dimensions',
            'subtitle' => __('Set related products height.', 'pe-core') ,
            'units' => array(
                'px',
            ) ,
         'width' => false,
            'default' => array(
                'height' => '500'
            ) ,
            'title' => __('Related Products Height', 'pe-core') ,
            'output' => array(
                '.related-products .alioth-products .product'
            ) , // An array of CSS selectors
            
        ) ,
        
        array(
            'id' => 'related_products_title_show',
            'type' => 'switch',
            'title' => __('Related Products Title', 'pe-core') ,
            'on' => __('Show', 'pe-core') ,
            'off' => __('Hide', 'pe-core') ,
            'default' => true,
            'subtitle' => __('Switch "Hide" if you dont want to display related products title.', 'pe-core') ,
        ) ,
        
        array(
            'id' => 'related_products_title',
            'type' => 'text',
            'title' => __('Related Products Title', 'pe-core') ,
            'subtitle' => __('Enter related products title', 'pe-core') ,
            'default' =>  __('Related Products', 'pe-core'),
        ) ,
        
        array(
            'id' => 'show_sku',
            'type' => 'switch',
            'title' => __('SKU', 'pe-core') ,
            'on' => __('Show', 'pe-core') ,
            'off' => __('Hide', 'pe-core') ,
            'default' => true,
            'subtitle' => __('Switch "Hide" if you dont want to display product SKU.', 'pe-core') ,
        ) ,
        
        array(
            'id' => 'show_product_category',
            'type' => 'switch',
            'title' => __('Category', 'pe-core') ,
            'on' => __('Show', 'pe-core') ,
            'off' => __('Hide', 'pe-core') ,
            'default' => true,
            'subtitle' => __('Switch "Hide" if you dont want to display product category.', 'pe-core') ,
        ) ,
        
        array(
            'id' => 'show_product_tags',
            'type' => 'switch',
            'title' => __('Tags', 'pe-core') ,
            'on' => __('Show', 'pe-core') ,
            'off' => __('Hide', 'pe-core') ,
            'default' => true,
            'subtitle' => __('Switch "Hide" if you dont want to display product tags.', 'pe-core') ,
        ) ,
        
         array(
            'id' => 'show_short_description',
            'type' => 'switch',
            'title' => __('Short Description', 'pe-core') ,
            'on' => __('Show', 'pe-core') ,
            'off' => __('Hide', 'pe-core') ,
            'default' => true,
            'subtitle' => __('Switch "Hide" if you dont want to display product short description.', 'pe-core') ,
        ) ,
        
        array(
            'id' => 'show_slider_arrows',
            'type' => 'switch',
            'title' => __('Slider Arrows', 'pe-core') ,
            'on' => __('Show', 'pe-core') ,
            'off' => __('Hide', 'pe-core') ,
            'default' => true,
            'subtitle' => __('Switch "Hide" if you dont want to display slider arrows.', 'pe-core') ,
        ) ,
        
        array(
            'id' => 'show_slide_numbers',
            'type' => 'switch',
            'title' => __('Slide Numbers', 'pe-core') ,
            'on' => __('Show', 'pe-core') ,
            'off' => __('Hide', 'pe-core') ,
            'default' => true,
            'subtitle' => __('Switch "Hide" if you dont want to display slide numbers.', 'pe-core') ,
        ) ,
)
));

Redux::setSection($opt_name, array(
    'title' => __('Page Transitions', 'pe-core') ,
    'id' => 'page_transitions',
    'icon' => 'eicon-page-transition',
    'fields' => array(
        array(
            'id' => 'page_transitions_active',
            'type' => 'switch',
            'title' => __('Page Transitions', 'pe-core') ,
            'on' => __('Yes', 'pe-core') ,
            'off' => __('No', 'pe-core') ,
            'default' => false,
            'subtitle' => __('Switch "Yes" if you dont want to use AJAX page transitions.', 'pe-core') ,
        ) ,
        
        array(
            'id' => 'trans_layout',
            'type' => 'button_set',
            'title' => __('Page Transitions Layout', 'pe-core') ,
            'subtitle' => __('Select page transitions layout.', 'pe-core') ,
            'options' => array(
                'light' => 'Light',
                'dark' => 'Dark',
            ) ,
            'default' => 'dark',
        ),
        
        array(
            'id' => 'trans_text',
            'type' => 'text',
            'title' => __('Loading Text', 'pe-core') ,
            'subtitle' => __('Enter loading text', 'pe-core') ,
            'default' =>  __('Loading, please wait..', 'pe-core'),
           
        ) ,
         array(
    'id'       => 'trans-text-color',
    'type'     => 'color',
    'title'    => esc_html__('Loading text color.', 'pe-core'), 
    'subtitle' => esc_html__('Pick a background color for the page transitions background.', 'pe-core'),
    'validate' => 'color',
        'output'   => array(
					'color'=> 'trans-text',
					'important' => true,
				),
),
    )
));
    


Redux::setSection($opt_name, array(
    'title' => esc_html__('Page Loader', 'pe-core') ,
    'id' => 'pageLoader',
    'icon' => 'eicon-spinner',
    'fields' => array(
       array(
            'id' => 'page_loader_active',
            'type' => 'switch',
            'title' => __('Page Loader', 'pe-core') ,
            'on' => __('Yes', 'pe-core') ,
            'off' => __('No', 'pe-core') ,
            'default' => false,
            'subtitle' => __('Switch "No" if you dont want to use page loader.', 'pe-core') ,
        ) ,
        
        array(
            'id' => 'loader_layout',
            'type' => 'button_set',
            'title' => __('Loader Layout', 'pe-core') ,
            'subtitle' => __('Select page loader layout.', 'pe-core') ,
            'options' => array(
                'light' => 'Light',
                'dark' => 'Dark',
            ) ,
            'default' => 'light',
        ) ,
array(
    'id'        => 'loader_duration',
    'type'      => 'slider',
    'title'     => esc_html__('Duration', 'pe-core'),
    'subtitle'  => esc_html__('Set page loader duration here.', 'pe-core'),
    'desc'      => esc_html__('Seconds', 'pe-core'),
    "default"   => 5,
    "min"       => 1,
    "step"      => 1,
    "max"       => 60,
    'display_value' => 'label'
),
 
        array(
            'id' => 'animate_header',
            'type' => 'switch',
            'title' => __('Animate Header', 'pe-core') ,
            'on' => __('Yes', 'pe-core') ,
            'off' => __('No', 'pe-core') ,
            'default' => true,
            'subtitle' => __('Switch "No" if you dont want to animate header elements on page loading.', 'pe-core') ,
        ) ,
array(
    'id'       => 'opt-color',
    'type'     => 'color',
    'title'    => esc_html__('Loader Background', 'pe-core'), 
    'subtitle' => esc_html__('Pick a background color for the page loader.', 'pe-core'),
    'validate' => 'color',
        'output'   => array(
					'background-color'=> 'span.apl-background',
					'important' => true,
				),
),

array( 
    'id'          => 'percentage_typography',
    'type'        => 'typography', 
    'title'       => esc_html__('Percentage Typography', 'pe-core'),
    'google'      => true, 
    'font-backup' => true,
    'output'      => array('.apl-count .apl-num'),
    'units'       =>'px',
    'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'pe-core'),
    'default'     => false
)
      

    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Smooth Scroll', 'pe-core') ,
    'id' => 'smoothScroll',
    'icon' => 'eicon-scroll',
    'fields' => array(
       array(
            'id' => 'smooth_scroll_active',
            'type' => 'switch',
            'title' => __('Smooth Scroll', 'pe-core') ,
            'on' => __('Yes', 'pe-core') ,
            'off' => __('No', 'pe-core') ,
            'default' => false,
            'subtitle' => __('Switch "Yes" if you dont want to use page loader.', 'pe-core') ,
        ),
        array(
            'id' => 'smooth_strength',
            'type' => 'text',
            'title' => __('Smooth Strength', 'pe-core') ,
            'default' => '0.8',
        ) ,
        array(
            'id' => 'normalize_scroll',
            'type' => 'switch',
            'title' => __('Normalize Scroll', 'pe-core') ,
            'on' => __('Yes', 'pe-core') ,
            'off' => __('No', 'pe-core') ,
            'default' => true,
            'subtitle' => __('It forces scrolling to be done on the JavaScript thread, ensuring it is synchronized and the address bar doesnt show/hide on mobile devices.', 'pe-core') ,
        ),
        
        array(
            'id' => 'smooth_touch',
            'type' => 'switch',
            'title' => __('Smooth Touch', 'pe-core') ,
            'on' => __('Yes', 'pe-core') ,
            'off' => __('No', 'pe-core') ,
            'default' => false,
            'subtitle' => __('Smooth scroll on touch only devices.', 'pe-core') ,
        ),
        array(
            'id' => 'smooth_touch_strength',
            'type' => 'text',
            'title' => __('Smooth Touch Strength', 'pe-core') ,
            'default' => '0.8',
               'required' => array(
                'smooth_touch',
                '=',
                'true'
            ) ,
        ) ,
        
    )
));


Redux::setSection($opt_name, array(
    'title' => esc_html__('Mouse Cursor', 'pe-core') ,
    'id' => 'mouseCursor',
    'icon' => 'eicon-circle-o',
    'fields' => array(
       array(
            'id' => 'cursor_active',
            'type' => 'switch',
            'title' => __('Mosue Cursor', 'pe-core') ,
            'on' => __('Yes', 'pe-core') ,
            'off' => __('No', 'pe-core') ,
            'default' => false,
            'subtitle' => __('Switch "No" if you dont want to use interactive mouse cursor.', 'pe-core') ,
        ) ,
        
        array(
            'id' => 'cursor_interactive',
            'type' => 'switch',
            'title' => __('Interactive Cursor', 'pe-core') ,
            'on' => __('Yes', 'pe-core') ,
            'off' => __('No', 'pe-core') ,
            'default' => false,
            'subtitle' => __('This option will enable/disable hover animations.', 'pe-core') ,
        ) ,
        
        array(
            'id' => 'cursor_loading',
            'type' => 'switch',
            'title' => __('Loading Animation', 'pe-core') ,
            'on' => __('Yes', 'pe-core') ,
            'off' => __('No', 'pe-core') ,
            'default' => false,
            'subtitle' => __('This option will enable/disable loading animation.', 'pe-core') ,
        ) ,
        
        array(
            'id' => 'circle_dark_color',
            'type' => 'color',
            'color_alpha' => true,
            'title' => __('Circle Dark Color', 'pe-core') ,
            'subtitle' => __("Set a color for cursor's circle when it's on 'dark' state.", 'pe-core') ,
            'default' => 'rgba(25,27,29,0.6)'
            
        ) ,
        
        array(
            'id' => 'dot_dark_color',
                        'type' => 'color',
            'color_alpha' => true,
            'title' => __('Dot Dark Color', 'pe-core') ,
            'subtitle' => __("Set a color for cursor's dot when it's on 'dark' state.", 'pe-core') ,
            'default' => '#191b1d'
            
        ) ,
        
        array(
            'id' => 'circle_light_color',
                       'type' => 'color',
            'color_alpha' => true,
            'title' => __('Circle Light Color', 'pe-core') ,
            'subtitle' => __("Set a color for cursor's circle when it's on 'light' state.", 'pe-core') ,
            'default' => 'rgba(255, 255, 255, 0.2)'
            
        ) ,
        
        array(
            'id' => 'dot_light_color',
                        'type' => 'color',
            'color_alpha' => true,
            'title' => __('Dot Lightk Color', 'pe-core') ,
            'subtitle' => __("Set a color for cursor's dot when it's on 'light' state.", 'pe-core') ,
            'default' => '#ffffff'
            
        ) ,
      

    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Styling', 'pe-core') ,
    'id' => 'colors',
    'icon' => 'eicon-global-colors',
   
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('General', 'pe-core') ,
    'id' => 'general-colors',
    'subsection' => true,
     'fields' => array(
        array(         
            'id'       => 'body-background',
            'type'     => 'background',
            'title'    => esc_html__('Body Background', 'pe-core'),
            'subtitle' => esc_html__('Body background with image, color, etc.', 'pe-core'),
            'output' => array(
                'body',
                'important' => true,
            ) ,
            
        ),
         
          array(
            'id' => 'body_typo',
            'type' => 'typography',
            'title' => __('Body Typography', 'pe-core') ,
            'google' => true,
            'font-backup' => true,
            'output' => array(
                'body'
            ) ,
            'units' => 'px',

        ),
        
array(
        'id'       => 'link_colors',
        'type'     => 'link_color',
        'title'    => esc_html__('Links Colors', 'pe-core'),
    'output' => array(
                '#page a'
            ) ,
    
    ), 
         
         array(
            'id' => 'p_typo',
            'type' => 'typography',
            'title' => __('Paragraph', 'pe-core') ,
            'google' => true,
            'font-backup' => true,
            'output' => array(
                '#page h1'
            ) ,
            'units' => 'px',

        ),
         
         array(
            'id' => 'h1_typo',
            'type' => 'typography',
            'title' => __('Heading 1', 'pe-core') ,
            'google' => true,
            'font-backup' => true,
            'output' => array(
                '#page h1'
            ) ,
            'units' => 'px',

        ),
         
         array(
            'id' => 'h2_typo',
            'type' => 'typography',
            'title' => __('Heading 2', 'pe-core') ,
            'google' => true,
            'font-backup' => true,
            'output' => array(
                '#page h2'
            ) ,
            'units' => 'px',

        ),
         
         array(
            'id' => 'h3_typo',
            'type' => 'typography',
            'title' => __('Heading 3', 'pe-core') ,
            'google' => true,
            'font-backup' => true,
            'output' => array(
                '#page h3'
            ) ,
            'units' => 'px',

        ),
         
         array(
            'id' => 'h4_typo',
            'type' => 'typography',
            'title' => __('Heading 4', 'pe-core') ,
            'google' => true,
            'font-backup' => true,
            'output' => array(
                '#page h4'
            ) ,
            'units' => 'px',

        ),
         
         array(
            'id' => 'h5_typo',
            'type' => 'typography',
            'title' => __('Heading 5', 'pe-core') ,
            'google' => true,
            'font-backup' => true,
            'output' => array(
                '#page h5'
            ) ,
            'units' => 'px',

        ),
         
         array(
            'id' => 'h6_typo',
            'type' => 'typography',
            'title' => __('Heading 6', 'pe-core') ,
            'google' => true,
            'font-backup' => true,
            'output' => array(
                '#page h6'
            ) ,
            'units' => 'px',

        ),
       
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Header', 'pe-core') ,
    'id' => 'header-colors',
    'subsection' => true,
     'fields' => array(
           
         array(
            'id' => 'header_bg_color',
            'type' => 'color',
            'title' => __('Header Background Color.', 'pe-core') ,
            'subtitle' => __('Set header background color', 'pe-core') ,
            'output' => array(
                'background-color' => '.site-header',
                'important' => true,
                
            ) ,

        ) ,
         
         array(
            'id' => 'sticky_header_bg_color',
            'type' => 'color',
            'title' => __('Sticky Header Background Color.', 'pe-core') ,
            'subtitle' => __('Set sticky header background color', 'pe-core') ,
            'output' => array(
                'background-color' => '.site-header.sticked',
                'important' => true,
                
            ) ,

        ) ,
         
         array(
            'id' => 'fs_menu_bg_color',
            'type' => 'color',
            'title' => __('Fullscreen Menu Background Color.', 'pe-core') ,
            'subtitle' => __('Set fullscreen menu background color', 'pe-core') ,
            'output' => array(
                'background-color' => '.fullscreen_menu::before',
                'important' => true,
                
            ) ,

        ) ,
         
         array(
            'id' => 'fs_menu_item_typo',
            'type' => 'typography',
            'title' => __('Menu Item Typography', 'pe-core') ,
            'subtitle' => __('For fullscreen menu.', 'pe-core') ,
             'color' => false,
            'google' => true,
            'font-backup' => true,
            'output' => array(
                '.site-navigation.fullscreen .menu.main-menu > li.menu-item'
            ) ,
            'units' => 'px',

        ),
         
         array(
            'id' => 'fs_menu_item_color',
            'type' => 'color',
            'title' => __('Menu item color.', 'pe-core') ,
            'subtitle' => __('For fullscreen menu', 'pe-core') ,
            'output' => array(
                'color' => '.site-header .site-navigation.fullscreen .menu.main-menu > li.menu-item a::before',
                'background-color' => '.site-header.menu_dark .sub-togg-line',
                'important' => true
            ) ,
        ) ,
         
         array(
            'id' => 'fs_menu_item_transparent_color',
            'type' => 'color',
            'title' => __('Menu item transparent color.', 'pe-core') ,
            'subtitle' => __('For fullscreen menu', 'pe-core') ,
            'output' => array(
                'color' => '.site-header .site-navigation.fullscreen .menu.main-menu > li.menu-item a',
                 'important' => true
            ) ,
        ) ,
         

         array(
            'id' => 'menu_toggle_color',
            'type' => 'color',
            'title' => __('Menu toggle background color.', 'pe-core') ,
            'subtitle' => __('For fullscreen menu.', 'pe-core'),
            'output' => array(
                'background-color' => '.site-header .toggle-line',
                'important' => true
            ) ,
        ) ,
         
         array(
            'id' => 'classic_menu_item_typo',
            'type' => 'typography',
            'title' => __('Menu Item Typography', 'pe-core') ,
            'subtitle' => __('For classic menu.', 'pe-core') ,
             'color' => false,
            'google' => true,
            'font-backup' => true,
            'output' => array(
                '#primary-menu .menu-item'
            ) ,
            'units' => 'px',
        ),
         
         array(
            'id' => 'classic_menu_dark_item_color',
            'type' => 'color',
            'title' => __('Menu item color.(Dark)', 'pe-core') ,
            'subtitle' => __('For classic menu (dark layout)', 'pe-core'),
             'default' => 'rgba(25, 27, 29, .6)',
            'output' => array(
                'color' => '.site-navigation.classic .menu.main-menu > li > a',
                'important' => true
            ) ,
        ) ,
         
         array(
            'id' => 'classic_menu_dark_item_hover_color',
            'type' => 'color',
            'title' => __('Menu item hover color(Dark).', 'pe-core') ,
            'subtitle' => __('For classic menu (dark layout)', 'pe-core'),
             'default' => '#191b1d',
        ) ,
                   array(
            'id' => 'classic_menu_dark_item_active_color',
            'type' => 'color',
            'title' => __('Menu item active color(Dark).', 'pe-core') ,
            'subtitle' => __('For classic menu (dark layout)', 'pe-core'),
              'default' => '#191b1d',
              'output' => array(
                'color' => '.site-header .site-navigation.classic .menu.main-menu li.current-menu-item > a',
                'important' => true
            ) ,

        ) ,
          array(
            'id' => 'classic_menu_light_item_color',
            'type' => 'color',
            'title' => __('Menu item color.(Light)', 'pe-core') ,
            'subtitle' => __('For classic menu (light layout)', 'pe-core'),
              'default' => 'hsla(0,0%,100%,.2)',
            'output' => array(
                'color' => '.site-header.light .site-navigation.classic .menu.main-menu > li > a',
                'important' => true
            ) ,
        ) ,
         
         array(
            'id' => 'classic_menu_light_item_hover_color',
            'type' => 'color',
            'title' => __('Menu item hover color(Light).', 'pe-core') ,
            'subtitle' => __('For classic menu (light layout)', 'pe-core'),
              'default' => '#ffffff',

        ) ,
         
         array(
            'id' => 'classic_menu_light_item_active_color',
            'type' => 'color',
            'title' => __('Menu item active color(Light).', 'pe-core') ,
            'subtitle' => __('For classic menu (light layout)', 'pe-core'),
              'default' => '#ffffff',
              'output' => array(
                'color' => '.site-header.light .site-navigation.classic .menu.main-menu li.current-menu-item > a',
                'important' => true
            ) ,

        ) ,
         
         array(
            'id' => 'classic_menu_submenu_item_color',
            'type' => 'color',
            'title' => __('Submenu Item Color.', 'pe-core') ,
            'subtitle' => __('For classic menu.', 'pe-core'),
            'output' => array(
                'color' => '.sub-menu a',
                'important' => true
            ) ,
        ) ,
         
         array(
            'id' => 'classic_submenu_background_color',
            'type' => 'color',
            'title' => __('Submenu background color.', 'pe-core') ,
            'subtitle' => __('For classic menu.', 'pe-core'),
            'output' => array(
                'background-color' => '.site-navigation.classic .sub-menu',
                'important' => true
            ) ,
        ) ,
         
         array(
            'id' => 'git_button_typo',
            'type' => 'typography',
            'title' => __('CTA Typography', 'pe-core') ,
            'subtitle' => __('For fullscreen menu.', 'pe-core') ,
            'google' => true,
            'font-backup' => true,
            'output' => array(
                '.site-header.menu_dark .git-button a',
                '.site-header.menu_light .git-button a'
            ) ,
            'units' => 'px',

        ),
         
         array(
            'id' => 'social_links_typo',
            'type' => 'typography',
            'title' => __('Social Links Typography', 'pe-core') ,
            'subtitle' => __('For fullscreen menu.', 'pe-core') ,
            'google' => true,
             'color' => false,
            'font-backup' => true,
            'output' => array(

                '.site-header.menu_dark .social-list li a',
                '.site-header.menu_light .social-list li a'
        
            ) ,
            'units' => 'px',

        ),
   


    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Footer', 'pe-core') ,
    'id' => 'footer-styles',
    'subsection' => true,
     'fields' => array(
          array(         
            'id'       => 'footer-background',
            'type'     => 'background',
            'title'    => esc_html__('Footer Background', 'pe-core'),
            'subtitle' => esc_html__('Footer background with image, color, etc.', 'pe-core'),
            'output' => array(
                '.site-footer',
                'important' => true,
            ) ,
            
        ),
         
         array(
            'id' => 'footer_menu_typo',
            'type' => 'typography',
            'title' => __('Footer Menu Typography', 'pe-core') ,
            'google' => true,
            'font-backup' => true,
            'output' => array(
                '#footer.dark .footer-menu ul li a',
                '#footer.light .footer-menu ul li a',
            ) ,
            'units' => 'px',

        ),
         
         array(
            'id' => 'copyright_text_typo',
            'type' => 'typography',
            'title' => __('Copyright Text Typography', 'pe-core') ,
            'google' => true,
            'font-backup' => true,
            'output' => array(
                '#footer.dark .copyright-text',
                '#footer.light .copyright-text',
            ) ,
            'units' => 'px',

        ),
         
         array(
            'id' => 'mail_button_typo',
            'type' => 'typography',
            'title' => __('Mail Button Typography', 'pe-core') ,
            'google' => true,
            'font-backup' => true,
            'output' => array(
                '#footer.dark .big-button a',
                '#footer.light .big-button a',
                '.big-button a::after',
            ) ,
            'units' => 'px',

        ),
         
    )
));


Redux::setSection($opt_name, array(
    'title' => esc_html__('Custom CSS/JS', 'pe-core') ,
    'id' => 'fullscreen-foasasddoter',
    'icon' => 'eicon-custom-css',
    'fields' => array(
        array(
            'id' => 'css_editor',
            'type' => 'ace_editor',
            'title' => __('CSS', 'pe-core') ,
            'subtitle' => __('Write your custom CSS code here.', 'pe-core') ,
            'mode' => 'css',
            'theme' => 'monokai',
        ) ,
        array(
            'id' => 'js_editor',
            'type' => 'ace_editor',
            'title' => __('JavaScript', 'pe-core') ,
            'subtitle' => __('Write your custom JS code here.', 'pe-core') ,
            'mode' => 'javascript',
            'theme' => 'chrome',
        ) ,

    )
));
