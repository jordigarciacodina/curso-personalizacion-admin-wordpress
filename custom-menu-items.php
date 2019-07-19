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

	// Cambiar items del menú Entradas
	add_action('admin_menu', 'bs_change_posts_menu_items');

	function bs_change_posts_menu_items() {

		global $menu;
		global $submenu;

		$menu[5][0] = 'Artículos';
		$submenu['edit.php'][5][0] = 'Todos los artículos';
		$submenu['edit.php'][10][0] = 'Nuevo artículo';

	}

	// Cambiar elementos del menú Entradas
	add_action('init', 'bs_change_post_menu_items');

	function bs_change_post_menu_items() {

		global $wp_post_types;
		$labels = $wp_post_types['post']->labels;

		$labels->name 				= 'Artículos';
		$labels->singular_name		= 'Artículo';
	    $labels->add_new            = 'Añadir artículo';
	    $labels->add_new_item       = 'Nuevo artículo';
	    $labels->all_items          = 'Todos los artículos';
	    $labels->edit_item          = 'Editar artículo';
	    $labels->name_admin_bar     = 'Artículos';
	    $labels->menu_name          = 'Artículos';
	    $labels->new_item           = 'Nuevo Artículos';
	    $labels->not_found          = 'No se encontraron artículos';
	    $labels->not_found_in_trash = 'No hay artículos en la papelera';
	    $labels->search_items       = 'Buscar artículos';
	    $labels->view_item          = 'Ver artículo';

	}

?>