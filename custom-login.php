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

	 // Modificar el logo del login
	 add_action('login_enqueue_scripts','bs_login_logo');

	 function bs_login_logo() {

		 ?>

		 	<style type="text/css" media="screen">

				body.login div#login h1 a {
					background-image: url('https://admin.dev/wp-content/mu-plugins/img/bicicleta-studio-long-color.png');
					background-size: auto;
					height: 47px;
					width: 100%;
				}

			</style>

		 <?php

	 }

	 // Modificar la url del logo
	 add_filter ('login_headerurl','bs_login_logo_link');

	 function bs_login_logo_link($url) {

		 return home_url();

	 }

	 // Modificar el título del logo
	 add_filter('login_headertitle','bs_login_logo_title');

	 function bs_login_logo_title($message) {

		 $message = get_bloginfo('name');
		 return $message;

	 }

?>