<?php

	/**
	 * Plugin Name: Personalización del Admin de WordPress
	 * Plugin URI: https://bicicleta.studio
	 * Description: Plugin de funciones personalizadas para el Admin de WordPress
	 * Version: 1.0
	 * Author: Bicicleta Studio
	 * Author URI: https://bicicleta.studio
	 * License: GPL+2
	 */

	// Personalizar el texto del footer del admin de WordPress
	add_filter('admin_footer_text', 'bs_custom_admin_footer_text');

	function bs_custom_admin_footer_text() {

		global $current_user; wp_get_current_user();
		echo $current_user->user_firstname  . ', gracias por confiar en <a href="https://bicicleta.studio">Bicicleta Studio</a> para crear tu sitio web :)';

	}

	// Personalizar el texto de la versión del admin de WordPress≤
	add_filter('update_footer', 'bs_custom_admin_footer_version', 999);

	function bs_custom_admin_footer_version() {

		$site_title = get_bloginfo( 'name' );
		$wp_version = get_bloginfo( 'version' );

		echo 'El sitio ' . $site_title . ' funciona con WordPress en su versión ' . $wp_version;

	?>

		<style type="text/css">

			#wpfooter {
				background-color: #fff;
				padding: 20px;
			}

			#footer-left,
			#footer-upgrade {
				text-align: center;
				width: 100%;
			}

		</style>

	<?php

	}

?>