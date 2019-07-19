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

	 // Añadir elemento al menú
	 add_action ('admin_menu','bs_add_menu_item');

	 function bs_add_menu_item() {

		 add_menu_page(
			 'Página de datos',    		// Título de la página
			 'Datos',					// Título del menú
			 'administrator',			// Rol o capabilitie
			 'pagina-de-datos',			// URL
			 'bs_data_page_content',	// Función
			 'dashicons-list-view',		// Ícono
			 '100'						// Posición

		 );

		 // Contenido de la página de Datos
		 function bs_data_page_content() {

		 ?>

		 	<div class="wrap">

			 	<h2>Datos</h2>

			 	<?php

					global $current_user; wp_get_current_user();

					echo 'Hola ' . $current_user->display_name . ', estos son tus datos:' . '<br/><br/>';
					echo '<li>' . 'Nombre de usuario: ' . $current_user->user_login . '</li>';
					echo '<li>' . 'Correo electrónico: ' . $current_user->user_email . '</li>';
					echo '<li>' . 'Nombre: ' . $current_user->user_firstname . '</li>';
					echo '<li>' . 'Apellido: ' . $current_user->user_lastname . '</li>';
					echo '<li>' . 'ID de usuario: ' . $current_user->ID . '</li>';

				?>

		 	</div>

		 <?php

		 }

	 }

?>