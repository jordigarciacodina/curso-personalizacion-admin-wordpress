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

	// Eliminar opciones de pantalla
	add_filter('screen_options_show_screen', '__return_false');

	// Eliminar menú de ayuda
	add_action( 'admin_head', 'bs_remove_contextual_help' );

	function bs_remove_contextual_help() {

	    $screen = get_current_screen();
	    $screen->remove_help_tabs();

	}

	// Añadir pestañas de ayuda en Escritorio
	add_action( "load-index.php", 'bs_dashboard_add_help_tabs');

	function bs_dashboard_add_help_tabs() {

	    $screen = get_current_screen();

	    $screen->add_help_tab(
	        array(
	            'id'      => 'bs_características',
	            'title'   => 'Características',
	            'content' => '<p><strong>Características del Escritorio personalizado de WordPress:</strong></p><ul><li>Característica</li><li>Característica</li><li>Característica</li><li>Característica</li><li>Característica</li></ul>'
	        )
	    );

	    $screen->add_help_tab(
	        array(
	            'id'      => 'bs_faqs',
	            'title'   => 'FAQS',
	            'content' => '<p><strong>Preguntas frecuentes respecto al Escritorio personalizado de WordPress:</strong></p><ul><li>Pregunta</li><li>Pregunta</li><li>Pregunta</li><li>Pregunta</li><li>Pregunta</li></ul>'
	        )
	    );

	    $screen->add_help_tab(
	        array(
	            'id'      => 'bs_support',
	            'title'   => 'Soporte',
	            'content' => '<p>Si tienes cualquier duda sobre el Escritorio de >WordPress, puedes escribirnos a hola@bicicleta.studio</p>'
	        )
	    );

	}

	// Personalizar header del admin de WordPress
	add_action('admin_head', 'bs_custom_admin_header');

	function bs_custom_admin_header() {

	?>
		<div id="bs-admin-head">
			<div class="bs-logo">
				<img src="https://admin.dev/wp-content/mu-plugins/img/bicicleta-studio-long-color.png" />
			</div>
			<div class="bs-text">

			<?php

				global $current_user; wp_get_current_user();

				echo '¡Hola ' . $current_user->display_name . '!';

			?>

			</div>
		</div>

		<style type="text/css" media="screen">

			#wpbody-content {
				padding-top: 50px;
			}

			#bs-admin-head {
				padding: 20px;
				text-align: center;
				position: absolute;
				width: 100%;
			}

		</style>

	<?php

	}

?>