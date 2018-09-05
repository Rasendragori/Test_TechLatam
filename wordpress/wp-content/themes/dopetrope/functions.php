<?php
	
	//Activando el soporte paralos Sidebar
	if (function_exists('register_sidebar')) {
		   /**
			* Creates a sidebar
			* @param string|array  Builds Sidebar based off of 'name' and 'id' values.
			*/
			//$args = array(
			//	'name'          => __( 'Ultimas Entradas Footer'),
			//	'id'            => 'unique-sidebar-id',
			//	'description'   => '',
			//	'class'         => '',
			//	'before_widget' => '',
			//	'after_widget'  => '',
			//	'before_title'  => '',
			//	'after_title'   => ''
			//);

			//register_sidebar( $args );

			register_sidebar(array(
				'name'=>'footer ultimas entradas'
				));

			register_sidebar(array(
				'name'=>'footer ultimas categorias'
				));
		
	};

	//Activando soporte para las imagenes
	if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)

    // additional image sizes
    // delete the next line if you do not need additional image sizes
    add_image_size( 'category-thumb', 374, 260, true );
    add_image_size( 'category-full', 783, 290, true );
    add_image_size( 'category-thumb-blog', 580, 272, true );
	}

	//Registrando un menú
	register_nav_menus(array(
		'principal' => 'Menú Principal',
	));

    /**
	 * Enqueue scripts
	 *
	 * @param string $handle Script name
	 * @param string $src Script url
	 * @param array $deps (optional) Array of script names on which this script depends
	 * @param string|bool $ver (optional) Script version (used for cache busting), set to null to disable
	 * @param bool $in_footer (optional) Whether to enqueue the script before </head> or before </body>
	 */
	function misrecursos() {
    wp_enqueue_style("style",get_stylesheet_uri());
    wp_enqueue_script( 'dropotron', get_template_directory_uri() . '/assets/js/jquery.dropotron.min.js', array( 'jquery' ), '1.4.3', true);
		wp_enqueue_script( 'skel', get_template_directory_uri() . '/assets/js/skel.min.js', array( 'jquery' ), '3.0.1', true);
    wp_enqueue_script( 'skel-viewport', get_template_directory_uri() . '/assets/js/skel-viewport.min.js', array( 'jquery' ), '3.0.1', true);
    wp_enqueue_script( 'util', get_template_directory_uri() . '/assets/js/util.js', array( 'jquery' ), '1.0.0', true);
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '1.0.0', true);
	}

	add_action( 'wp_enqueue_scripts', 'misrecursos');


?>
