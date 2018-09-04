<?php


function domino_customizer_data()
{
    static $data = array();

    if(empty($data)){

        $media_viewport = 'screen and (min-width: 768px)';

        $data = array(
            'color-palettes-container' => array(
                'title' => __('Color Scheme', 'wpzoom'),
                'priority' => 40,
                'options' => array(
                    'color-palettes' => array(
                        'setting' => array(
                            'default' => 'default',
                            'sanitize_callback' => 'sanitize_text_field'
                        ),
                        'control' => array(
                            'type' => 'select',
                            'label' => __('Color Scheme', 'wpzoom'),
                            'choices' => array(
                                'default' => __('Default', 'wpzoom'),
                                'blue' => __('Blue', 'wpzoom'),
                                'red' => __('Red', 'wpzoom'),
                                'green' => __('Green', 'wpzoom'),
                                'orange' => __('Orange', 'wpzoom'),
                                'teal' => __('Teal', 'wpzoom'),
                                'gray' => __('Gray', 'wpzoom')
                            )
                        ),
                        'dom' => array(
                            // * - mean that it is dynamic and would be from select choices.
                            'selector' => 'domino-style-color-*-css',
                            'rule' => 'change-stylesheet'
                        )
                    ),
                )
            ),
            'title_tagline' => array(
                'title' => __('Site Identity', 'wpzoom'),
                'priority' => 20,
                'options' => array(
                    'hide-tagline' => array(
                        'setting' => array(
                            'sanitize_callback' => 'absint',
                            'default' => true
                        ),
                        'control' => array(
                            'label' => __('Show Tagline', 'wpzoom'),
                            'type' => 'checkbox',
                            'priority' => 11
                        ),
                        'style' => array(
                            'selector' => '.navbar-brand-wpz .tagline',
                            'rule' => 'display'
                        )
                    ),
                    'custom_logo_retina_ready' => array(
                        'setting' => array(
                            'sanitize_callback' => 'absint',
                            'default' => false,
                        ),
                        'control' => array(
                            'label' => __('Retina Ready?', 'wpzoom'),
                            'type' => 'checkbox',
                            'priority' => 9
                        ),
                        'partial' => array(
                            'selector' => '.navbar-brand-wpz a',
                            'container_inclusive' => false,
                            'render_callback' => 'domino_custom_logo'
                        )
                    ),
                    'blogname' => array(
                        'setting' => array(
                            'sanitize_callback' => 'sanitize_text_field',
                            'default' => get_option('blogname'),
                            'transport' => 'postMessage',
                            'type' => 'option'
                        ),
                        'control' => array(
                            'label' => __('Site Title', 'wpzoom'),
                            'type' => 'text',
                            'priority' => 9
                        ),
                        'partial' => array(
                            'selector' => '.navbar-brand-wpz a',
                            'container_inclusive' => false,
                            'render_callback' => 'zoom_customizer_partial_blogname'
                        )
                    ),
                    'blogdescription' => array(
                        'setting' => array(
                            'sanitize_callback' => 'sanitize_text_field',
                            'default' => get_option('blogdescription'),
                            'transport' => 'postMessage',
                            'type' => 'option'
                        ),
                        'control' => array(
                            'label' => __('Tagline', 'wpzoom'),
                            'type' => 'text',
                            'priority' => 10
                        ),
                        'partial' => array(
                            'selector' => '.navbar-brand-wpz .tagline',
                            'container_inclusive' => false,
                            'render_callback' => 'zoom_customizer_partial_blogdescription'
                        )
                    ),
                    'custom_logo' => array(
                        'partial' => array(
                            'selector' => '.navbar-brand-wpz a',
                            'container_inclusive' => false,
                            'render_callback' => 'domino_custom_logo'
                        )
                    )
                )
            ),
            'theme-layout' => array(
                'title' => __('Theme Layout', 'wpzoom'),
                'priority' => 40,
                'options' => array(
                    'theme-layout-type' => array(
                        'setting' => array(
                            'sanitize_callback' => 'sanitize_text_field',
                            'default' => 'wpz_layout_full'
                        ),
                        'control' => array(
                            'label' => __('Select Theme Layout', 'wpzoom'),
                            'type' => 'radio',
                            'choices' => array(
                                'wpz_layout_full' => __('Full Width', 'wpzoom'),
                                'wpz_layout_boxed' => __('Boxed', 'wpzoom')
                             )
                        ),
                        'dom' => array(
                            'selector' => 'body',
                            'rule' => 'toggle-class'
                        )
                    ),

                    'theme-width' => array(
                        'setting' => array(
                            'sanitize_callback' => 'sanitize_text_field',
                            'default' => 'wpz_width_1400'
                        ),
                        'control' => array(
                            'label' => __('Select Theme Width', 'wpzoom'),
                            'type' => 'radio',
                            'choices' => array(
                                'wpz_width_1400' => __('1400px', 'wpzoom'),
                                'wpz_width_1200' => __('1200px', 'wpzoom')
                             )
                        ),
                        'dom' => array(
                            'selector' => 'body',
                            'rule' => 'toggle-class'
                        )
                    )
                )
            ),
            'header' => array(
                'title' => __('Header Options', 'wpzoom'),
                'priority' => 50,
                'options' => array(
                    'top-navbar' => array(
                        'setting' => array(
                            'sanitize_callback' => 'sanitize_text_field',
                            'default' => 'block'
                        ),
                        'control' => array(
                            'label' => __('Show Top Navigation Menu', 'wpzoom'),
                            'type' => 'checkbox',
                        ),
                        'style' => array(
                            'selector' => '.top-navbar',
                            'rule' => 'display'
                        )
                    ),
                    'navbar-hide-search' => array(
                        'setting' => array(
                            'sanitize_callback' => 'sanitize_text_field',
                            'default' => 'block'
                        ),
                        'control' => array(
                            'label' => __('Show Search Form', 'wpzoom'),
                            'type' => 'checkbox',
                        ),
                        'style' => array(
                            'selector' => '.sb-search',
                            'rule' => 'display'
                        )
                    ),
                )
            ),
            'color' => array(
                'title' => __('General', 'wpzoom'),
                'panel' => 'color-scheme',
                'priority' => 110,
                'capability' => 'edit_theme_options',
                'options' => array(
                    'color-background' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#ffffff'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Background Color', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => 'body, body.wpz_layout_boxed',
                            'rule' => 'background'
                        )
                    ),
                    'color-background-boxed' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#F1F1F1'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Boxed Layout Background Color', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.wpz_layout_boxed',
                            'rule' => 'background'
                        )
                    ),
                    'color-background-featured' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#f6f6f4'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Featured Area Background', 'wpzoom'),
                        ),
                        'style' => array(
                            array (
                                'selector' => '.featured_area',
                                'rule' => 'background'
                            ),
                            array (
                                'selector' => '#slider, .featured_area .post-item .background-overlay',
                                'rule' => 'border-color'
                            )
                        )
                    ),
                    'color-background-video' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#212425'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Video Area Background', 'wpzoom'),
                        ),
                        'style' => array(
                            array (
                                'selector' => '.video-area',
                                'rule' => 'background'
                            ),
                            array (
                                'selector' => '.video-area .post-item .background-overlay',
                                'rule' => 'border-color'
                            )
                        )
                    ),
                    'color-body-text' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#222222'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Body Text', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => 'body, h1, h2, h3, h4, h5, h6',
                            'rule' => 'color'
                        )
                    ),
                    'color-logo' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#ffffff'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Logo Color', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.navbar-brand-wpz a',
                            'rule' => 'color'
                        ),
                    ),
                    'color-logo-hover' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#212425'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Logo Color on Hover', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.navbar-brand-wpz a:hover',
                            'rule' => 'color'
                        )
                    ),
                    'color-tagline' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#666666'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Site Description', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.navbar-brand-wpz .tagline',
                            'rule' => 'color'
                        ),
                    ),
                    'color-link' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#212425'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Link Color', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => 'a',
                            'rule' => 'color'
                        )
                    ),
                    'color-link-hover' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#F47857'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Link Color on Hover', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => 'a:hover, #news-ticker dd a:hover, .widget .tabbernav li a:hover, .recent-posts .cat-links a:hover, .readmore_button a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:not(.alt):hover, .woocommerce input.button:hover',
                            'rule' => 'color'
                        ),
                    ),
                    'color-button-background' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#F47857'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Buttons Background', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => 'button, input[type=button], input[type=reset], input[type=submit]',
                            'rule' => 'background'
                        ),
                    ),
                    'color-button-color' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#fff'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Buttons Text Color', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => 'button, input[type=button], input[type=reset], input[type=submit]',
                            'rule' => 'color'
                        ),
                    ),
                    'color-button-background-hover' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#222222'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Buttons Background on Hover', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => 'button:hover, input[type=button]:hover, input[type=reset]:hover, input[type=submit]:hover',
                            'rule' => 'background'
                        ),
                    ),
                    'color-button-color-hover' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#fff'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Buttons Text Color on Hover', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => 'button:hover, input[type=button]:hover, input[type=reset]:hover, input[type=submit]:hover',
                            'rule' => 'color'
                        ),
                    ),
                ),

            ),
            'color-header' => array(
                'panel' => 'color-scheme',
                'title' => __('Header', 'wpzoom'),
                'options' => array(
                    'color-header-bg' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#212425'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Header Background', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '#header',
                            'rule' => 'background'
                        )
                    )
                )
            ),
            'color-top-menu' => array(
                'panel' => 'color-scheme',
                'title' => __('Top Menu', 'wpzoom'),
                'options' => array(
                    'color-top-menu-background' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#212425'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Top Menu Background', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.top-navbar',
                            'rule' => 'background-color'
                        )
                    ),
                    'color-top-menu-link' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#ffffff'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Menu Item', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.top-navbar .navbar-nav > li > a',
                            'rule' => 'color'
                        )
                    ),
                    'color-top-menu-link-hover' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#F47857'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Menu Item Hover', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.top-navbar .navbar-nav > li > a:hover',
                            'rule' => 'color'
                        )
                    ),
                    'color-menu-link-current-top' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#F47857'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Menu Current Item', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.top-navbar .navbar-nav .current-menu-item > a, .top-navbar .navbar-nav .current_page_item > a, .top-navbar .navbar-nav .current-menu-parent > a',
                            'rule' => 'color'
                        )
                    )
                )
            ),
            'color-main-menu' => array(
                'panel' => 'color-scheme',
                'title' => __('Main Menu', 'wpzoom'),
                'options' => array(
                    'color-menu-background' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#212425'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Main Menu Background', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.main-navbar',
                            'rule' => 'background-color'
                        )
                    ),
                    'color-menu-link' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#ffffff'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Menu Item', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.main-navbar .navbar-nav > li > a',
                            'rule' => 'color'
                        )
                    ),
                    'color-menu-link-hover' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#F47857'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Menu Item Hover', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.main-navbar .navbar-nav > li > a:hover',
                            'rule' => 'color'
                        )
                    ),
                    'color-menu-link-current' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#F47857'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Current Link Color', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.main-navbar .navbar-nav > .current-menu-item > a, .main-navbar .navbar-nav > .current_page_item > a, .main-navbar .navbar-nav > .current-menu-parent > a',
                            'rule' => 'color'
                        )
                    ),
                    'color-menu-link-current-background' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#F47857'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Current Link Background', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.main-navbar .navbar-nav > .current-menu-item > a,.main-navbar .navbar-nav > .current_page_item > a, .main-navbar .navbar-nav >  .current-menu-parent > a, .main-navbar .navbar-nav > .current_page_parent > a',
                            'rule' => 'background-color'
                        )
                    ),
                    'color-menu-dropdown-background' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#212425'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Dropdown Background', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.navbar-nav ul',
                            'rule' => 'background-color'
                        )
                    ),
                    'color-search-icon-background' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#212425'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Search Icon Background', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.sb-search .sb-icon-search',
                            'rule' => 'background'
                        )
                    ),
                    'color-search-icon' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#fff'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Search Icon Color', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.sb-search .sb-icon-search',
                            'rule' => 'color'
                        )
                    ),
                    'color-search-icon-background-hover' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#33383A'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Search Icon Background on Hover', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.sb-search .sb-icon-search:hover, .sb-search .sb-search-input',
                            'rule' => 'background'
                        )
                    ),
                    'color-search-icon-hover' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#ffffff'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Search Icon Color on Hover', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.sb-search .sb-icon-search:hover, .sb-search .sb-search-input, .sb-search.sb-search-open .sb-icon-search:before',
                            'rule' => 'color'
                        )
                    )
                )
            ),
            'color-breaking' => array(
                'panel' => 'color-scheme',
                'title' => __('Breaking News Bar', 'wpzoom'),
                'options' => array(
                    'color-breaking-background' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#1E2122'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Breaking News Background', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '#news-ticker',
                            'rule' => 'background-color'
                        )
                    ),
                    'color-breaking-title' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#F47857'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Breaking News Title', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '#news-ticker h3',
                            'rule' => 'color'
                        )
                    )
                )
            ),
            'color-posts' => array(
                'panel' => 'color-scheme',
                'title' => __('Blog Posts', 'wpzoom'),
                'options' => array(
                    'color-post-title' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#212425'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Post Title', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.entry-title a',
                            'rule' => 'color'
                        )
                    ),
                    'color-post-title-hover' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#F47857'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Post Title Hover', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.entry-title a:hover',
                            'rule' => 'color'
                        )
                    ),
                    'color-post-meta' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#999999'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Post Meta', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.entry-meta',
                            'rule' => 'color'
                        )
                    ),
                    'color-post-meta-link' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#212425'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Post Meta Link', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.entry-meta a',
                            'rule' => 'color'
                        )
                    ),
                    'color-post-meta-link-hover' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#F47857'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Post Meta Link Hover', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.entry-meta a:hover',
                            'rule' => 'color'
                        )
                    ),
                )
            ),
            'color-navigation' => array(
                'panel' => 'color-scheme',
                'title' => __('Page Navigation', 'wpzoom'),
                'options' => array(
                    'color-infinite-button' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#F47857'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Jetpack Infinite Scroll Button', 'wpzoom'),
                            'description' => __('If you have the Infinite Scroll feature enabled, you can change here the color of the "Older Posts" button. You can find more instructions in <a href="http://www.wpzoom.com/documentation/tempo/#infinite" target="_blank">Documentation</a>', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.infinite-scroll #infinite-handle span',
                            'rule' => 'background'
                        )
                    ),

                    'color-infinite-button-hover' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#222222'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Jetpack Infinite Scroll Button Hover', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.infinite-scroll #infinite-handle span:hover',
                            'rule' => 'background'
                        )
                    ),
                )
            ),
            'color-single' => array(
                'panel' => 'color-scheme',
                'title' => __('Individual Posts and Pages', 'wpzoom'),
                'options' => array(
                    'color-single-title' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#222222'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Post/Page Title', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.page h1.entry-title, .single h1.entry-title',
                            'rule' => 'color'
                        )
                    ),
                    'color-single-meta' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#999999'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Post Meta', 'wpzoom'),
                        ),
                        'style' => array(
                            'id' => 'color-single-meta',
                            'selector' => '.single .entry-meta',
                            'rule' => 'color'
                        )
                    ),
                    'color-single-meta-link' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#363940'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Post Meta Link', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.single .entry-meta a',
                            'rule' => 'color'
                        )
                    ),
                    'color-single-meta-link-hover' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#F47857'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Post Meta Link Hover', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.single .entry-meta a:hover',
                            'rule' => 'color'
                        )
                    ),
                    'color-single-content' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#444444'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Post/Page Text Color', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.entry-content',
                            'rule' => 'color'
                        )
                    ),
                    'color-single-link' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#F47857'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Links Color in Posts', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.entry-content a',
                            'rule' => 'color'
                        )
                    ),
                )
            ),
            'color-widgets' => array(
                'panel' => 'color-scheme',
                'title' => __('Widgets', 'wpzoom'),
                'options' => array(
                    'color-widget-title' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#212425'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Widget Title Color', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.widget h3.title',
                            'rule' => 'color'
                        )
                    ),
                )
            ),
            'color-footer' => array(
                'panel' => 'color-scheme',
                'title' => __('Footer', 'wpzoom'),
                'options' => array(
                    'footer-background-color' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#F6F6F4'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Footer Background', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.site-footer',
                            'rule' => 'background-color'
                        )
                    ),
                    'footer-menu-background-color' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#212425'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Footer Menu Background', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.site-info-top',
                            'rule' => 'background-color'
                        )
                    ),
                    'color-footer-link' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#ffffff'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Footer Menu Color', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.site-info-top a',
                            'rule' => 'color'
                        )
                    ),

                    'color-footer-link-hover' => array(
                        'setting' => array(
                            'sanitize_callback' => 'maybe_hash_hex_color',
                            'transport' => 'postMessage',
                            'default' => '#F47857'
                        ),
                        'control' => array(
                            'control_type' => 'WP_Customize_Color_Control',
                            'label' => __('Footer Menu Link Hover', 'wpzoom'),
                        ),
                        'style' => array(
                            'selector' => '.site-info-top a:hover',
                            'rule' => 'color'
                        )
                    ),

                )
            ),
            /**
             *  Typography
             */
            'font-site-body' => array(
                'panel' => 'typography',
                'title' => __('Body', 'wpzoom'),
                'options' => array(
                    'body' => array(
                        'type' => 'typography',
                        'selector' => 'body',
                        'rules' => array(
                            'font-family' => 'Libre Franklin',
                            'font-size' => 16,
                            'font-weight' => 'normal',
                            'font-style' => 'normal'
                        )
                    )
                )
            ),
            'font-site-title' => array(
                'panel' => 'typography',
                'title' => __('Site Title', 'wpzoom'),
                'options' => array(
                    'title' => array(
                        'type' => 'typography',
                        'selector' => '.navbar-brand-wpz h1 a',
                        'rules' => array(
                            'font-family' => 'Libre Franklin',
                            'font-size' => 48,
                            'font-weight' => 'normal',
                            'text-transform' => 'none',
                            'font-style' => 'normal'
                        )
                    )
                )
            ),
            'description-typography' => array(
                'panel' => 'typography',
                'title' => __('Site Description', 'wpzoom'),
                'options' => array(
                    'description' => array(
                        'type' => 'typography',
                        'selector' => '.navbar-brand-wpz .tagline',
                        'rules' => array(
                            'font-family' => 'Libre Franklin',
                            'font-size' => 16,
                            'font-weight' => 'normal',
                            'text-transform' => 'none',
                            'font-style' => 'normal'
                        )
                    )
                )
            ),
            'topmenu-typography' => array(
                'panel' => 'typography',
                'title' => __('Top Menu Links', 'wpzoom'),
                'options' => array(
                    'topmenu' => array(
                        'type' => 'typography',
                        'selector' => '.top-navbar a',
                        'rules' => array(
                            'font-family' => 'Libre Franklin',
                            'font-size' => 14,
                            'font-weight' => 'normal',
                            'text-transform' => 'none',
                            'font-style' => 'normal'
                        )
                    )
                )
            ),
            'font-nav' => array(
                'panel' => 'typography',
                'title' => __('Main Menu Links', 'wpzoom'),
                'options' => array(
                    'mainmenu' => array(
                        'type' => 'typography',
                        'selector' => '.main-navbar .navbar-nav > li > a',
                        'rules' => array(
                            'font-family' => 'Roboto Condensed',
                            'font-size' => 18,
                            'font-weight' => 'normal',
                            'text-transform' => 'uppercase',
                            'font-style' => 'normal'
                        )
                    )
                )
            ),
            'font-slider' => array(
                'panel' => 'typography',
                'title' => __('Homepage Slider Title', 'wpzoom'),
                'options' => array(
                    'slider-title' => array(
                        'type' => 'typography',
                        'selector' => '.slides li h3 a',
                        'rules' => array(
                            'font-family' => 'Libre Franklin',
                            'font-size' => 34,
                            'font-weight' => 'bold',
                            'text-transform' => 'none',
                            'font-style' => 'normal'
                        )
                    )
                )
            ),
            'font-widgets' => array(
                'panel' => 'typography',
                'title' => __('Widget Title', 'wpzoom'),
                'options' => array(
                    'widget-title' => array(
                        'type' => 'typography',
                        'selector' => '.widget h3.title',
                        'rules' => array(
                            'font-family' => 'Libre Franklin',
                            'font-size' => 18,
                            'font-weight' => 'bold',
                            'text-transform' => 'none',
                            'font-style' => 'normal'
                        )
                    )
                )
            ),
            'font-widgets-footer' => array(
                'panel' => 'typography',
                'title' => __('Footer Widget Title', 'wpzoom'),
                'options' => array(
                    'footer-widget-title' => array(
                        'type' => 'typography',
                        'selector' => '.footer-widgets .widget h3.title',
                        'rules' => array(
                            'font-family' => 'Libre Franklin',
                            'font-size' => 22,
                            'font-weight' => 'bold',
                            'text-transform' => 'none',
                            'font-style' => 'normal'
                        )
                    )
                )
            ),
            'font-post-title' => array(
                'panel' => 'typography',
                'title' => __('Blog Posts Title', 'wpzoom'),
                'options' => array(
                    'blog-title' => array(
                        'type' => 'typography',
                        'selector' => '.recent-posts .entry-title a',
                        'rules' => array(
                            'font-family' => 'Libre Franklin',
                            'font-size' => 28,
                            'font-weight' => 'bold',
                            'text-transform' => 'none',
                            'font-style' => 'normal'
                        )
                    )
                )
            ),
            'font-single-post-title' => array(
                'panel' => 'typography',
                'title' => __('Single Post Title', 'wpzoom'),
                'options' => array(
                    'post-title' => array(
                        'type' => 'typography',
                        'selector' => '.single h1.entry-title',
                        'rules' => array(
                            'font-family' => 'Libre Franklin',
                            'font-size' => 50,
                            'font-weight' => 'normal',
                            'text-transform' => 'none',
                            'font-style' => 'normal'
                        )
                    )
                )
            ),
            'font-page-title' => array(
                'panel' => 'typography',
                'title' => __('Single Page Title', 'wpzoom'),
                'options' => array(
                    'page-title' => array(
                        'type' => 'typography',
                        'selector' => '.page h1.entry-title',
                        'rules' => array(
                            'font-family' => 'Libre Franklin',
                            'font-size' => 50,
                            'font-weight' => 'normal',
                            'text-transform' => 'none',
                            'font-style' => 'normal'
                        )
                    )
                )
            ),

            'footer-area' => array(
                'title' => __('Footer', 'wpzoom'),
                'options' => array(
                    'footer-widget-areas' => array(
                        'setting' => array(
                            'default' => '3',
                            'sanitize_callback' => 'sanitize_text_field',
                            'transport' => 'refresh'
                        ),
                        'control' => array(
                            'type' => 'select',
                            'label' => __('Number of Widget Areas', 'wpzoom'),
                            'choices' => array( '0', '1', '2', '3', '4' ),
                        )
                    ),
                    'blogcopyright' => array(
                        'setting' => array(
                            'sanitize_callback' => 'sanitize_text_field',
                            'default' => get_option('blogcopyright', sprintf( __( 'Copyright &copy; %1$s %2$s', 'wpzoom' ), date( 'Y' ), get_bloginfo( 'name' ) )),
                            'transport' => 'postMessage',
                            'type' => 'option'
                        ),
                        'control' => array(
                            'label' => __('Footer Text', 'wpzoom'),
                            'type' => 'text',
                            'priority' => 10
                        ),
                        'partial' => array(
                            'selector' => '.site-info .copyright',
                            'container_inclusive' => false,
                            'render_callback' => 'zoom_customizer_partial_blogcopyright'
                        )

                    )
                )
            )
        );

        zoom_customizer_normalize_options($data);
    }


    return $data;
}

add_filter('wpzoom_customizer_data', 'domino_customizer_data');