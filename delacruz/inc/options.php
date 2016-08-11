<?php
	
function dlcz_add_submenu() {
		add_submenu_page( 'themes.php', 'Delacruz Theme Options Page', 'Theme Options', 'manage_options', 'theme_options', 'my_theme_options_page');
	}
add_action( 'admin_menu', 'dlcz_add_submenu' );
	

function dlcz_settings_init() { 
	register_setting( 'theme_options', 'dlcz_options_settings' );
	
	add_settings_section(
		'dlcz_options_page_section', 
		'Your section description', 
		'dlcz_options_page_section_callback', 
		'theme_options'
	);
	
	function dlcz_options_page_section_callback() { 
		echo 'A description and detail about the section.';
	}

	add_settings_field( 
		'dlcz_text_field', 
		'Skillset One Description', 
		'dlcz_text_field_render', 
		'theme_options', 
		'dlcz_options_page_section' 
	);

	add_settings_field( 
		'dlcz_checkbox_field', 
		'Check your preference', 
		'dlcz_checkbox_field_render', 
		'theme_options', 
		'dlcz_options_page_section'  
	);

	add_settings_field( 
		'dlcz_radio_field', 
		'Choose an option', 
		'dlcz_radio_field_render', 
		'theme_options', 
		'dlcz_options_page_section'  
	);
	
	add_settings_field( 
		'dlcz_textarea_field', 
		'Enter content in the textarea', 
		'dlcz_textarea_field_render', 
		'theme_options', 
		'dlcz_options_page_section'  
	);
	
	add_settings_field( 
		'dlcz_select_field', 
		'Choose from the dropdown', 
		'dlcz_select_field_render', 
		'theme_options', 
		'dlcz_options_page_section'  
	);

	function dlcz_text_field_render() { 
		$options = get_option( 'dlcz_options_settings' );
		?>
		<input type="text" name="dlcz_options_settings[dlcz_text_field]" value="<?php if (isset($options['dlcz_text_field'])) echo $options['dlcz_text_field']; ?>" />
		<?php
	}
	
	function dlcz_checkbox_field_render() { 
		$options = get_option( 'dlcz_options_settings' );
	?>
		<input type="checkbox" name="dlcz_options_settings[dlcz_checkbox_field]" <?php if (isset($options['dlcz_checkbox_field'])) checked( 'on', ($options['dlcz_checkbox_field']) ) ; ?> value="on" />
		<label>Turn it On</label> 
		<?php	
	}
	
	function dlcz_radio_field_render() { 
		$options = get_option( 'dlcz_options_settings' );
		?>
		<input type="radio" name="dlcz_options_settings[dlcz_radio_field]" 
		<?php if (isset($options['dlcz_radio_field'])) checked( $options['dlcz_radio_field'], 1 ); ?> 
		value="<h1>woof</h1>" /> <label>Option One</label><br />
		
		<input type="radio" name="dlcz_options_settings[dlcz_radio_field]" 
		<?php if (isset($options['dlcz_radio_field'])) checked( $options['dlcz_radio_field'], 2 ); ?> 
		value="<p>i love you</p>" /> <label>Option Two</label><br />
		
		
		<input type="radio" name="dlcz_options_settings[dlcz_radio_field]" <?php if (isset($options['dlcz_radio_field'])) checked( $options['dlcz_radio_field'], 3 ); ?> value="<h1>pssst</h1>" /> <label>Option Three</label>
		<?php
	}
	
	function dlcz_textarea_field_render() { 
		$options = get_option( 'dlcz_options_settings' );
		?>
		<textarea cols="40" rows="5" name="dlcz_options_settings[dlcz_textarea_field]"><?php if (isset($options['dlcz_textarea_field'])) echo $options['dlcz_textarea_field']; ?></textarea>
		<?php
	}

	function dlcz_select_field_render() { 
		$options = get_option( 'dlcz_options_settings' );
		?>
		<select name="dlcz_options_settings[dlcz_select_field]">
			<option value="1" <?php if (isset($options['dlcz_select_field'])) selected( $options['dlcz_select_field'], 1 ); ?>>Option 1</option>
			<option value="2" <?php if (isset($options['dlcz_select_field'])) selected( $options['dlcz_select_field'], 2 ); ?>>Option 2</option>
		</select>
	<?php
	}
	
	function skill_text(){
		
	}
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
