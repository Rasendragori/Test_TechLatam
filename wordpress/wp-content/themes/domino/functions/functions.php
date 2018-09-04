<?php
/**
 * Theme functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 */

if ( ! function_exists( 'domino_setup' ) ) :
/**
 * Theme setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 */
function domino_setup() {
    // This theme styles the visual editor to resemble the theme style.
    add_editor_style( array( 'css/editor-style.css' ) );

    /* Image Sizes */
    add_image_size( 'loop', 380, 280, true);
    add_image_size( 'loop-related', 200, 131, true);
    add_image_size( 'single', 1000, 500, true);
    add_image_size( 'single-full', 1400, 500, true);
    add_image_size( 'carousel', 350, 230, true);
    add_image_size( 'widget-1post', 1000, 460, true);
    add_image_size( 'widget-2posts', 500, 329, true);
    add_image_size( 'widget-3posts', 334, 219, true);
    add_image_size( 'widget-small', 165, 109, true);
    add_image_size( 'widget-2posts-large', 700, 460, true);

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    // Register nav menus
    register_nav_menus( array(
        'secondary' => __( 'Top Menu', 'wpzoom' ),
        'primary' => __( 'Main Menu', 'wpzoom' ),
        'tertiary' => __( 'Footer Menu', 'wpzoom' )
    ) );


    /*
     * JetPack Infinite Scroll
     */
    add_theme_support( 'infinite-scroll', array(
        'container' => 'recent-posts',
        'wrapper' => false,
        'footer' => false
    ) );


    /**
     * Theme Logo
     */
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 600,
        'flex-height' => true,
        'flex-width'  => true
    ) );


    domino_old_fonts();

}
endif;
add_action( 'after_setup_theme', 'domino_setup' );



/* Add support for Custom Background
==================================== */

add_theme_support( 'custom-background' );


/* Register Video Post Format
==================================== */

add_theme_support( 'post-formats', array( 'video', 'gallery', 'audio' ) );



/*  Recommended Plugins
========================================== */
function zoom_register_theme_required_plugins_callback($plugins){

    $plugins =  array_merge(array(

        array(
            'name'         => 'Jetpack',
            'slug'         => 'jetpack',
            'required'     => false,
        ),

        array(
            'name'         => 'Instagram Widget by WPZOOM',
            'slug'         => 'instagram-widget-by-wpzoom',
            'required'     => false,
        )

    ), $plugins);

    return $plugins;
}

add_filter('zoom_register_theme_required_plugins', 'zoom_register_theme_required_plugins_callback');




/* Custom Excerpt Length
==================================== */

function new_excerpt_length($length) {
	return (int) option::get("excerpt_length") ? (int) option::get("excerpt_length") : 50;
}
add_filter('excerpt_length', 'new_excerpt_length');




/* Maximum width for images in posts
=========================================== */
if ( ! isset( $content_width ) ) $content_width = 1000;



/* Custom Archives titles.
=================================== */

if ( ! function_exists( 'domino_get_the_archive_title' ) ) :

function domino_get_the_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }

    return $title;
}
endif;
add_filter( 'get_the_archive_title', 'domino_get_the_archive_title' );



if ( ! function_exists( 'domino_alter_main_query' ) ) :
/**
 * Alter main WordPress Query to exclude specific categories
 * and posts from featured slider if this is configured via Theme Options.
 *
 * @param $query WP_Query
 */
function domino_alter_main_query( $query ) {
    // until this is fixed https://core.trac.wordpress.org/ticket/27015
    $is_front = false;

    if ( get_option( 'page_on_front' ) == 0 ) {
        $is_front = is_front_page();
    } else {
        $is_front = $query->get( 'page_id' ) == get_option( 'page_on_front' );
    }

    if ( $query->is_main_query() && $is_front ) {
        if ( option::is_on( 'hide_featured' ) ) {
            $featured_posts = new WP_Query( array(
                'post__not_in'   => get_option( 'sticky_posts' ),
                'posts_per_page' => option::get( 'slideshow_posts' ),
                'meta_key'       => 'wpzoom_is_featured',
                'meta_value'     => 1
            ) );

            $postIDs = array();
            while ( $featured_posts->have_posts() ) {
                $featured_posts->the_post();
                $postIDs[] = get_the_ID();
            }

            wp_reset_postdata();

            $query->set( 'post__not_in', $postIDs );
        }

        if ( count( option::get( 'recent_part_exclude' ) ) ) {
            $query->set( 'cat', '-' . implode( ',-', (array) option::get('recent_part_exclude') ) );
        }
    }
}
endif;
add_action( 'pre_get_posts', 'domino_alter_main_query' );




/* Register Custom Fields in Profile: Facebook, Twitter
===================================================== */

add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>

    <h3>Additional Profile Information</h3>

    <table class="form-table">


        <tr>
            <th><label for="twitter">Twitter Username</label></th>

            <td>
                <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter your Twitter username</span>
            </td>
        </tr>

        <tr>
            <th><label for="facebook_url">Facebook Profile URL</label></th>

            <td>
                <input type="text" name="facebook_url" id="facebook_url" value="<?php echo esc_attr( get_the_author_meta( 'facebook_url', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter your Facebook profile URL</span>
            </td>
        </tr>

        <tr>
            <th><label for="facebook_url">Instagram Username</label></th>

            <td>
                <input type="text" name="instagram_url" id="instagram_url" value="<?php echo esc_attr( get_the_author_meta( 'instagram_url', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter your Instagram username</span>
            </td>
        </tr>

    </table>
<?php }

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;

    update_user_meta( $user_id, 'instagram_url', $_POST['instagram_url'] );
    update_user_meta( $user_id, 'facebook_url', $_POST['facebook_url'] );
    update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
}



/* Hide Jetpack Sharing icons in widget excerpts */

add_action( 'init', 'remove_jetpack_sharing_excerpt' );

function remove_jetpack_sharing_excerpt() {
     remove_filter( 'the_excerpt', 'sharing_display', 19 );
}


/**
 * Show custom logo or blog title and description (backward compatibility)
 *
 */
function domino_custom_logo()
{
    //In future must remove it is for backward compatibility.
    if(get_theme_mod('logo')){
        set_theme_mod('custom_logo',  zoom_get_attachment_id_from_url(get_theme_mod('logo')));
        remove_theme_mod('logo');
    }

    has_custom_logo() ? the_zoom_custom_logo() : printf('<h1><a href="%s" title="%s">%s</a></h1>', home_url(), get_bloginfo('description'), get_bloginfo('name'));

}

/**
 * Old Customizer backward compatibility.
 *
 */

function domino_old_fonts() {

    if(get_theme_mod('font-family-site-body')){
        set_theme_mod('body-font-family',  get_theme_mod('font-family-site-body'));
        remove_theme_mod('font-family-site-body');
    }

    if(get_theme_mod('font-family-site-title')){
        set_theme_mod('title-font-family',  get_theme_mod('font-family-site-title'));
        remove_theme_mod('font-family-site-title');
    }

    if(get_theme_mod('font-family-nav-top')){
        set_theme_mod('topmenu-font-family',  get_theme_mod('font-family-nav-top'));
        remove_theme_mod('font-family-nav-top');
    }

    if(get_theme_mod('font-family-nav')){
        set_theme_mod('mainmenu-font-family',  get_theme_mod('font-family-nav'));
        remove_theme_mod('font-family-nav');
    }

    if(get_theme_mod('font-family-slider-title')){
        set_theme_mod('slider-title-font-family',  get_theme_mod('font-family-slider-title'));
        remove_theme_mod('font-family-slider-title');
    }

    if(get_theme_mod('font-family-widgets')){
        set_theme_mod('widget-title-font-family',  get_theme_mod('font-family-widgets'));
        remove_theme_mod('font-family-widgets');
    }

    if(get_theme_mod('font-family-post-title')){
        set_theme_mod('blog-title-font-family',  get_theme_mod('font-family-post-title'));
        remove_theme_mod('font-family-post-title');
    }

    if(get_theme_mod('font-family-single-post-title')){
        set_theme_mod('post-title-font-family',  get_theme_mod('font-family-single-post-title'));
        remove_theme_mod('font-family-single-post-title');
    }

    if(get_theme_mod('font-family-page-title')){
        set_theme_mod('page-title-font-family',  get_theme_mod('font-family-page-title'));
        remove_theme_mod('font-family-page-title');
    }

}



if ( ! function_exists( 'domino_get_google_font_uri' ) ) :
    /**
     * Build the HTTP request URL for Google Fonts.
     *
     * @return string    The URL for including Google Fonts.
     */
    function domino_get_google_font_uri() {
        // Grab the font choices
        $font_keys = zoom_customizer_get_font_familiy_ids(domino_customizer_data());

        $fonts = array();
        foreach ( $font_keys as $key => $default ) {
            $fonts[] = get_theme_mod( $key, $default );
        }

        // De-dupe the fonts
        $fonts         = array_unique( $fonts );
        $allowed_fonts = zoom_customizer_get_google_fonts();
        $family        = array();

        // Validate each font and convert to URL format
        foreach ( $fonts as $font ) {
            $font = trim( $font );

            // Verify that the font exists
            if ( array_key_exists( $font, $allowed_fonts ) ) {
                // Build the family name and variant string (e.g., "Open+Sans:regular,italic,700")
                $family[] = urlencode( $font . ':' . join( ',', zoom_customizer_choose_google_font_variants( $font, $allowed_fonts[ $font ]['variants'] ) ) );
            }
        }

        // Convert from array to string
        if ( empty( $family ) ) {
            return '';
        } else {
            $request = '//fonts.googleapis.com/css?family=' . implode( '|', $family );
        }

        // Load the font subset
        $subset = get_theme_mod( 'font-subset', false );

        if ( 'all' === $subset ) {

            $subsets_available = zoom_customizer_get_google_font_subsets();

            // Remove the all set
            unset( $subsets_available['all'] );

            // Build the array
            $subsets = array_keys( $subsets_available );
        } else {
            $subsets = array(
                'latin',
                $subset,
            );
        }

        // Append the subset string
        if ( ! empty( $subsets ) ) {
            $request .= urlencode( '&subset=' . join( ',', $subsets ) );
        }

        /**
         * Filter the Google Fonts URL.
         *
         * @since 1.2.3.
         *
         * @param string    $url    The URL to retrieve the Google Fonts.
         */
        return apply_filters( 'domino_get_google_font_uri', esc_url( $request ) );
    }
endif;



/* Enqueue scripts and styles for the front end.
=========================================== */

function domino_scripts() {
    if ( '' !== $google_request = domino_get_google_font_uri() ) {
        wp_enqueue_style( 'domino-google-fonts', $google_request, WPZOOM::$themeVersion );
    }

    // Load our main stylesheet.
    wp_enqueue_style( 'domino-style', get_stylesheet_uri() );

    wp_enqueue_style( 'media-queries', get_template_directory_uri() . '/css/media-queries.css', array(), WPZOOM::$themeVersion );

    wp_enqueue_style( 'domino-google-font-default', '//fonts.googleapis.com/css?family=Playfair+Display:400,700|Roboto+Condensed:400,700|Libre+Franklin:400,400i,600,600i,700,700i&subset=latin,latin-ext,greek,cyrillic' );

    $color_scheme = get_theme_mod('color-palettes', zoom_customizer_get_default_option_value('color-palettes', domino_customizer_data()));
    wp_enqueue_style('domino-style-color-' . $color_scheme, get_template_directory_uri() . '/styles/' . $color_scheme . '.css', array(), WPZOOM::$themeVersion);

    wp_enqueue_style( 'dashicons' );

    wp_enqueue_script( 'mmenu', get_template_directory_uri() . '/js/jquery.mmenu.min.all.js', array( 'jquery' ), WPZOOM::$themeVersion, true );

    wp_enqueue_script( 'flickity', get_template_directory_uri() . '/js/flickity.pkgd.min.js', array(), WPZOOM::$themeVersion, true );

    wp_enqueue_script( 'carouFredSel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', array( 'jquery' ), WPZOOM::$themeVersion, true );

    wp_enqueue_script( 'search_button', get_template_directory_uri() . '/js/search_button.js', array(), WPZOOM::$themeVersion, true );

    wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), WPZOOM::$themeVersion, true );

    wp_enqueue_script( 'sticky-sidebar', get_template_directory_uri() . '/js/theia-sticky-sidebar.js', array( 'jquery' ), WPZOOM::$themeVersion, true );

    wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.min.js', array( 'jquery' ), WPZOOM::$themeVersion, true );

    wp_enqueue_script( 'tabber-tabs', get_template_directory_uri() . '/js/tabs.js', array( 'jquery' ), WPZOOM::$themeVersion, true );


    $themeJsOptions = option::getJsOptions();

    wp_enqueue_script( 'domino-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), WPZOOM::$themeVersion, true );
    wp_localize_script( 'domino-script', 'zoomOptions', $themeJsOptions );
}

add_action( 'wp_enqueue_scripts', 'domino_scripts' );



if ( ! function_exists( 'domino_remove_hentry' ) ) :
/**
 * Remove hentry class from posts.
 */
function domino_remove_hentry( $classes ) {
    $classes = array_diff( $classes, array( 'hentry' ) );

    return $classes;
}
endif;

add_filter( 'post_class', 'domino_remove_hentry' );