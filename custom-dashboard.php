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

	// Personalizar widgets del escritorio
	add_action('wp_dashboard_setup','bs_costumize_dashboard_widgets');

	function bs_costumize_dashboard_widgets() {

		// Eliminar widgets del escritorio
		remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); 		// De un vistazo
		remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); 		// Borrador rápido
		remove_meta_box('dashboard_activity', 'dashboard', 'normal');  		// Actividad
		remove_meta_box('dashboard_primary', 'dashboard', 'side');  		// Eventos
		remove_action ('welcome_panel','wp_welcome_panel'); 				// Bienvenida

		// Añadir primera metabox
		add_meta_box (
			'bs_dashboard_first',  											// Nombre
			'Primera metabox', 												// Texto
			'bs_add_first_metabox',											// Función
			'dashboard', 													// Página
			'normal' 														// Posición
		);

		// Añadir segunda metabox
		add_meta_box (
			'bs_dashboard_second',											// Nombre
			'Segunda metabox',												// Texto
			'bs_add_second_metabox',										// Función
			'dashboard',													// Página
			'side'															// Posición
		);

		// Definir el contenido de la primera metabox
		function bs_add_first_metabox() {

			?>

				<p>HOLA</p>

			<?php

		}

		// Definir el contenido de la segunda metabox
		function bs_add_second_metabox() {

			?>

				<p>HOLA</p>

			<?php

		}

	}

?>