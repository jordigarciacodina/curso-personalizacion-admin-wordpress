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

	// Añadir estilos al admin de WordPress
	add_action('admin_enqueue_scripts', 'bs_custom_admin_styles');

	function bs_custom_admin_styles() {

		wp_enqueue_style('custom-admin-styles', plugins_url('/css/admin-style.css', __FILE__ ));

	}

	// Añadir estilos al login del WordPress
	add_action('login_enqueue_scripts','bs_custom_login_styles');

	function bs_custom_login_styles() {

		wp_enqueue_style('custom-login-styles', plugins_url('/css/custom-admin-style.css', __FILE__ ));

	}

	// Añadir estilos al theme de WordPress
	add_action('wp_enqueue_scripts', 'bs_custom_theme_styles');

	function bs_custom_theme_styles() {

		wp_enqueue_style('custom-theme-styles', plugins_url('/css/custom-theme-style.css', __FILE__ ));

	}

?>