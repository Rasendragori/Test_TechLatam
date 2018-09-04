<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'techlatam_test');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'YyV*F(PIAg#t62a%fI23bna`qvmAPm3RfXkN~-&yo&,C~;}+kc]_qdfXc7c.T4fj');
define('SECURE_AUTH_KEY', 'ccQGRMrw$,ld7)0wuJv%2)C,*Yk-Hox5SxP2.IxMi?(bLG`(AwtU32`N%M@`G;CQ');
define('LOGGED_IN_KEY', 'D<<qPlVcx@]q`0FCnNn8m_^3(f_agZ3AL}h6[=K_2fYiL`IZ?{C,0G:XU`[Xv}=I');
define('NONCE_KEY', 'oH^(UCP.?Uky)6%]jp~4b`e^T[O~XX:m``&!Afez#XUz<hS:mU+8`_B.93*wt{wQ');
define('AUTH_SALT', 'Y&~8[eGx+b{:JRZOih;-4(8Ctin3YP[w~,oQa88+/5db7Vp^-r7E##wW`@>Ph)QG');
define('SECURE_AUTH_SALT', 'Q-yeoW}sU%q-.~WKap>Ndhv#ue7nX@p{so%6j,h4R6xuj54RUArDp@35:OrE:tP#');
define('LOGGED_IN_SALT', '%(yFDYQ;9azWq<KqHS.l0qqqZ4&2&4/9~(<=zT[au,Rke2*qqNi][d%$+$A}{q]3');
define('NONCE_SALT', '{~mba=HOf)VkD>z[KbA;;G|d1p_Fb2@;9TK7M6U[$8jg&1:7ZOuRVL5j)PaKO8 C');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

