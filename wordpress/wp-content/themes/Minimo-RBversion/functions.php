<?php
	
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
		//wp_enqueue_script( '$handle', '$src', array( 'jquery' ), false, false );
		wp_enqueue_style( "style", get_stylesheet_uri());
		wp_enqueue_script( "main", get_template_directory_uri() . '/assets/js/main.js', array(), 1.1, false );
		wp_enqueue_style( "cssicons", get_template_directory_uri() . '/assets/css/cssicons.css',false,'1.1','all');
	}
	add_action( 'wp_enqueue_scripts', 'misrecursos' );
	
	add_theme_support( 'post-thumbnails' );

	//Registrando un menú
	register_nav_menus(array(
		'principal' => 'Menú Principal',
	));

	//Soporte para Sidebar
	if (function_exists('register_sidebar')) {
		# code...
		/**
		 * Creates a sidebar
		 * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
		 */
		$args_sidebar = array(
			'name'          => __( 'Post Sidebar', 'text-domain' ),
			'id'            => 'unique-sidebar-id-post',
			'description'   => 'Sidebar en los posts',
			'class'         => '',
			'before_widget' => '<li class="post_widgets">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		);
		
		register_sidebar( $args_sidebar );

		$args_index_widgets = array(
			'name'          => __( 'Index Widgets Area', 'text-domain' ),
			'id'            => 'unique-sidebar-id-index-area',
			'description'   => 'Area de widgets en el index',
			'class'         => '',
			'before_widget' => '<li class="index_widgets col-sm-6">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		);
		
		register_sidebar( $args_index_widgets );
		
	}

?>