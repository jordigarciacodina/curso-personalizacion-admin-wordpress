<?php

	/**
	 * Plugin Name: Custom Admin Functions
	 * Plugin URI: https://bicicleta.studio
	 * Description: Plugin de personalización del admin de WordPress
	 * Version: 1.0
	 * Author: Bicicleta Studio
	 * Author URI: https://bicicleta.studio
	 * License: GPL+2
	 * License URI: http://www.opensource.org/licenses/gpl-license.php
	 */

	/** Custom Admin Styles */

	// Añadir estilos al admin de WordPress
	add_action('admin_enqueue_scripts', 'bs_custom_admin_styles');

	function bs_custom_admin_styles() {

		wp_enqueue_style('custom-admin-styles', plugins_url('/css/custom-admin-style.css', __FILE__ ));

	}

	/** Custom login */

	// Modificar el logo del login
	add_action('login_enqueue_scripts','bs_login_logo');

	function bs_login_logo() {

		wp_enqueue_style('custom-admin-styles', plugins_url('/css/custom-admin-style.css', __FILE__ ));

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

	/** Custom widgets */

	// Personalizar widgets del escritorio
	add_action('wp_dashboard_setup','bs_costumize_dashboard_widgets');

	function bs_costumize_dashboard_widgets() {

		// Eliminar Widgets
		remove_action('welcome_panel','wp_welcome_panel'); 								// Bienvenida
		remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); 					// De un vistazo
		remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); 					// Borrador rápido
		remove_meta_box('dashboard_activity', 'dashboard', 'normal');  					// Actividad
		remove_meta_box('dashboard_primary', 'dashboard', 'side');  						// Eventos
		remove_meta_box('dlm_popular_downloads', 'dashboard', 'normal');  				// Download monitor
		remove_meta_box('woocommerce_dashboard_status', 'dashboard', 'normal'); 			// WooCommerce
		remove_meta_box('woocommerce_dashboard_recent_reviews', 'dashboard', 'normal'); 	// WooCommerce
		remove_meta_box('shared_counts_dashboard_widget', 'dashboard', 'normal');  		// Shared Counts
		remove_meta_box('wpseo-dashboard-overview', 'dashboard', 'side' );				// Yoast

	}

	/** Custom admin bar */

	// Eliminar nodos
	add_action('admin_bar_menu', 'bs_remove_nodes', 999 );

	function bs_remove_nodes() {

		global $wp_admin_bar;

		$wp_admin_bar->remove_node('wp-logo');											// Logo de WordPress
		$wp_admin_bar->remove_node('updates');											// Actualizaciones
		$wp_admin_bar->remove_node('comments');											// Comentarios
		$wp_admin_bar->remove_node('new-content');										// Nuevo post
		$wp_admin_bar->remove_node('autoptimize');										// Autoptimize
		$wp_admin_bar->remove_node('wpseo-menu');											// Yoast
	}

	// Añadir nodos
	add_action( 'admin_bar_menu', 'bs_featured_links', 900 );

	function bs_featured_links($wp_admin_bar) {

		$args = array(
			'id'     	=>  'featured_links',
			'title'		=>	'Imagenes gratuitas para posts',
		);
		$wp_admin_bar->add_node( $args );

		// Añadir elementos hijo
		$args = array();
		array_push($args,array(
			'id'     	=>  'unsplash',
			'title'		=>	'Unsplash',
			'href'		=>	'https://unsplash.com/',
			'parent' 	=>  'featured_links',
		));

		array_push($args,array(
			'id'     	=>  'pexels',
			'title'		=>	'Pexels',
			'href'		=>	'https://pexels.com',
			'parent' 	=>  'featured_links',
		));

		array_push($args,array(
			'id'     	=>  'flickr',
			'title'		=>	'Flickr',
			'href'		=>	'https://flickr.com',
			'parent' 	=>  'featured_links',
		));

		sort($args); // Sirve para ordenar Arrays
		foreach( $args as $each_arg) {
			$wp_admin_bar->add_node($each_arg);
		}

	}

	/** Custom menu item */

	// Añadir elemento al menú
	add_action('admin_menu', 'bs_add_menu_support');

	function bs_add_menu_support() {

		add_menu_page(
			'Página de Soporte',  														// Título
			'Soporte',																	// Título del menú
			'edit_pages',																// Capabilities
			'bs-support',																// URL
			'bs_support_page_content', 													// Función
			'dashicons-groups',															// Icono de Dashicons
			'1'																			// Posición
		);

	// Contenido de la página
	function bs_support_page_content() {

	?>

		<div class="wrap">

			<h2>Soporte</h2>

			<?php

				global $current_user; wp_get_current_user();

				echo 'Hola ' . $current_user->display_name . ', Si necesitas soporte para tu web, solamente tienes que contactarnos a <a href="mailto:hola@bicicleta.studio">hola@bicicleta.studio</a> y nos pondremos en contacto ASAP :)' . '<br/><br/>';

			?>

		</div>

		<?php

		}

	}

	/** Change Posts Menu Items */

	// Cambiar items del menú Entradas
	add_action('admin_menu', 'bs_change_posts_menu_items');

	function bs_change_posts_menu_items() {

		global $menu;
		global $submenu;

		$menu[5][0] = 'Publicaciones';
		$submenu['edit.php'][5][0] = 'Todas las publicaciones';
		$submenu['edit.php'][10][0] = 'Nueva publicación';

	}

	// Cambiar elementos del menú Entradas
	add_action('init', 'bs_change_post_menu_items');

	function bs_change_post_menu_items() {

		global $wp_post_types;
		$labels = $wp_post_types['post']->labels;

		$labels->name 				= 'Publicaciones';
		$labels->singular_name		= 'Publicación';
	    $labels->add_new            = 'Añadir publicación';
	    $labels->add_new_item       = 'Nueva publicación';
	    $labels->all_items          = 'Todas las publicaciones';
	    $labels->edit_item          = 'Editar publicación';
	    $labels->name_admin_bar     = 'Publicaciones';
	    $labels->menu_name          = 'Publicaciones';
	    $labels->new_item           = 'Nueva publicación';
	    $labels->not_found          = 'No se encontraron publicaciones';
	    $labels->not_found_in_trash = 'No hay publicaciones en la papelera';
	    $labels->search_items       = 'Buscar publicación';
	    $labels->view_item          = 'Ver publicación';

	}

	/** Remove Menu Items */

	// Eliminar items del menú
	add_action('admin_menu', 'bs_remove_menu_items', 999);

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
		remove_menu_page( 'bs-support' );
		remove_menu_page( 'ninja-forms' );

		// Eliminar items del menú condicionalmente
		$user = wp_get_current_user();
		if( !$user->has_cap('manage_options') ) {

			remove_menu_page( 'tools.php' );

		}

	}

	/** Custom Admin Header */

	// Eliminar menú de ayuda
	add_action( 'admin_head', 'bs_remove_contextual_help' );

	function bs_remove_contextual_help() {

	    $screen = get_current_screen();
	    $screen->remove_help_tabs();

	}

	// Eliminar opciones de pantalla
	add_filter('screen_options_show_screen', '__return_false');

	// Personalizar header del admin de WordPress
	add_action('admin_head', 'bs_custom_admin_header');

	function bs_custom_admin_header() {

	?>
		<div id="bs-admin-head">
			<div class="bs-logo">
				<img src="http://admin.dev/wp-content/uploads/2018/11/bs.png" />
			</div>
			<div class="bs-text">

			<?php

				global $current_user; wp_get_current_user();

				echo '¡Hola ' . $current_user->display_name . '!';

			?>

			</div>
		</div>

	<?php

	}

	/** Custom Admin Footer */

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

	}

?>