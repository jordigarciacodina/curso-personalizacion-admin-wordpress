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

	// Eliminar nodos
	add_action('admin_bar_menu', 'bs_remove_nodes', 999 );

	function bs_remove_nodes() {

		global $wp_admin_bar;

		$wp_admin_bar->remove_node('wp-logo');
		$wp_admin_bar->remove_node('site-name');
		$wp_admin_bar->remove_node('comments');
		$wp_admin_bar->remove_node('new-content');
		$wp_admin_bar->remove_node('my-account');

	}

	// Añadir nodos
	add_action( 'admin_bar_menu', 'bs_featured_links', 900 );

	function bs_featured_links($wp_admin_bar) {

		$args = array(
			'id'     	=>  'featured_links',
			'title'		=>	'Enlaces destacados',
			'href'		=>  'https://admin.dev/enlaces-de-destacados',
		);
		$wp_admin_bar->add_node( $args );

		// Añadir elementos hijo
		$args = array();
		array_push($args, array(
			'id'     	=>  'boluda_com',
			'title'		=>	'Boluda.com',
			'href'		=>  'https://boluda.com',
			'parent'	=>	'featured_links',
		));

		array_push($args, array(
			'id'     	=>  'wordpress',
			'title'		=>	'WordPress',
			'href'		=>  'https://wordpress.org',
			'parent'	=>	'featured_links',
		));

		array_push($args, array(
			'id'     	=>  'bicicleta_studio_blog',
			'title'		=>	'Blog de Bicicleta Studio',
			'href'		=>  'https://bicicleta.studio/blog',
			'parent'	=>	'featured_links',
		));

		sort( $args );
		foreach( $args as $each_arg ) {
			$wp_admin_bar->add_node( $each_arg );
		}

	}

?>