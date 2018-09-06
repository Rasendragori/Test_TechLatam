<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php bloginfo('name'); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	
	<?php wp_head(); ?>
</head>
<body>
	<div class="container">
		<div class="row navmenu d-flex align-items-center">
			<div class="col-xl-5 titulotop">
				<a href="<?php echo get_home_url(); ?>"><h1>MINIM­Ø</h1></a>
			</div>
			<div class="col-xl-7">
				<?php

					/**
					* Displays a navigation menu
					* @param array $args Arguments
					*/
					$args = array(
						'theme_location' => 'principal',
						'container' => 'nav',
						'container_id' => 'nav',

					);

					wp_nav_menu( $args );

				?>
			</div>
		</div>
	</div>
	

