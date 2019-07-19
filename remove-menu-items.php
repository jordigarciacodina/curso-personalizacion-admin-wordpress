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

	 // Eliminar items del menú
	 add_action('admin_menu', 'bs_remove_menu_items');

	 function bs_remove_menu_items() {

	 	remove_menu_page( 'index.php' );
		remove_menu_page( 'edit.php' );
		remove_menu_page( 'upload.php' );
		remove_menu_page( 'edit.php?post_type=page' );
		remove_menu_page( 'edit-comments.php' );
		remove_menu_page( 'genesis' );
		remove_menu_page( 'themes.php' );
		remove_menu_page( 'plugins.php' );
		remove_menu_page( 'users.php' );
		remove_menu_page( 'tools.php' );
		remove_menu_page( 'options-general.php' );
		remove_menu_page( 'pagina-de-datos' );

		// Eliminar items del menú condicionalmente
		$user = wp_get_current_user();
		if( !$user->has_cap('manage_options') ) {

			remove_menu_page( 'tools.php' );

		}

	}

?>