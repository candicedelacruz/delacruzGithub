<?php
	
function dlcz_add_submenu() {
		add_submenu_page( 'themes.php', 'Delacruz Theme Options Page', 'Theme Options', 'manage_options', 'theme_options', 'my_theme_options_page');
	}
add_action( 'admin_menu', 'dlcz_add_submenu' );
	

	function my_theme_options_page(){ 
		?>
		<form action="options.php" method="post">
			<h2>Delacruz Theme Options Page</h2>
			<?php
			settings_fields( 'theme_options' );
			do_settings_sections( 'theme_options' );
			submit_button();
			?>
		</form>
		<?php
	}

}

add_action( 'admin_init', 'dlcz_settings_init' );
