<?php
	
function dlcz_add_submenu() {
		add_submenu_page( 'themes.php', 'Delacruz Theme Options Page', 'Theme Options', 'manage_options', 'theme_options', 'my_theme_options_page');
	}
add_action( 'admin_menu', 'dlcz_add_submenu' );
	

function dlcz_settings_init() { 
	register_setting( 'theme_options', 'dlcz_options_settings' );
	
	add_settings_section(
		'dlcz_options_page_section', 
		'<br />The Skillset Section', 
		'dlcz_options_page_section_callback', 
		'theme_options'
	);
	
	function dlcz_options_page_section_callback() { 
		echo 'Describe your featured skill, found in the landing page';
	}

	//skillset section title
	add_settings_field( 
		'dlcz_radio_field', 
		'Choose a title for the section', 
		'dlcz_radio_field_render', 
		'theme_options', 
		'dlcz_options_page_section'  
	);	
	
	add_settings_field( 
		'dlcz_title_customtxt', 
		'Custom text for the section title (optional)', 
		'dlcz_title_customtxt_render', 
		'theme_options', 
		'dlcz_options_page_section'  
	);
	
	//skill item one
	
	add_settings_field( 
		'dlcz_title_one', 
		'<br />Skill One Title', 
		'dlcz_title_one_render', 
		'theme_options', 
		'dlcz_options_page_section' 
	);
	
	add_settings_field( 
		'dlcz_link_one', 
		"What is the link to skill one's page?", 
		'dlcz_link_one_render', 
		'theme_options', 
		'dlcz_options_page_section' 
	);
	
	add_settings_field( 
		'dlcz_img_one', 
		'Insert Image URL to represent skill one', 
		'dlcz_img_one_render', 
		'theme_options', 
		'dlcz_options_page_section' 
	);

	add_settings_field( 
		'dlcz_skill_one', 
		'Describe the first featured skill', 
		'dlcz_skill_one_render', 
		'theme_options', 
		'dlcz_options_page_section'  
	);
	
	//skill item two
	add_settings_field( 
		'dlcz_title_two', 
		'Skill Two Title', 
		'dlcz_title_two_render', 
		'theme_options', 
		'dlcz_options_page_section' 
	);
		
		add_settings_field( 
		'dlcz_link_two', 
		"What is the link to skill two's page?", 
		'dlcz_link_two_render', 
		'theme_options', 
		'dlcz_options_page_section' 
	);
	
	add_settings_field( 
		'dlcz_img_two', 
		'Insert Image URL to represent skill two', 
		'dlcz_img_two_render', 
		'theme_options', 
		'dlcz_options_page_section' 
	);
		
	add_settings_field( 
		'dlcz_skill_two', 
		'Describe the second featured skill', 
		'dlcz_skill_two_render', 
		'theme_options', 
		'dlcz_options_page_section'  
	);
	
	//skill item three
	
	add_settings_field( 
		'dlcz_title_three', 
		'Skill Three Title', 
		'dlcz_title_three_render', 
		'theme_options', 
		'dlcz_options_page_section' 
	);
	
	add_settings_field( 
		'dlcz_link_three', 
		"What is the link to skill three's page?", 
		'dlcz_link_three_render', 
		'theme_options', 
		'dlcz_options_page_section' 
	);
	
	add_settings_field( 
		'dlcz_img_three', 
		'Insert Image URL to represent skill three', 
		'dlcz_img_three_render', 
		'theme_options', 
		'dlcz_options_page_section' 
	);
		
	add_settings_field( 
		'dlcz_skill_three', 
		'Describe the third featured skill', 
		'dlcz_skill_three_render', 
		'theme_options', 
		'dlcz_options_page_section'  
	);
	//section title render
	function dlcz_radio_field_render() { 
		$options = get_option( 'dlcz_options_settings' );
		?>
			<input type="radio" name="dlcz_options_settings[dlcz_radio_field]" 
			<?php if (isset($options['dlcz_radio_field'])) checked( $options['dlcz_radio_field'], 1 ); ?> 
			value="I am an awesome.." /> <label>I am an awesome..</label><br />
			
			<input type="radio" name="dlcz_options_settings[dlcz_radio_field]" 
			<?php if (isset($options['dlcz_radio_field'])) checked( $options['dlcz_radio_field'], 2 ); ?> 
			value="I am a badass.." /> <label>I am a badass..</label><br />
			
			<input type="radio" name="dlcz_options_settings[dlcz_radio_field]" 
			<?php if (isset($options['dlcz_radio_field'])) checked( $options['dlcz_radio_field'], 3 ); ?> 
			value="I am a.." /> <label>I am a..</label><br />

			<input type="radio" name="dlcz_options_settings[dlcz_radio_field]" 
			<?php if (isset($options['dlcz_radio_field'])) checked( $options['dlcz_radio_field'], 3 ); ?> 
			value="<?php $options = get_option( 'dlcz_options_settings' );
						echo $options['dlcz_title_customtxt']; 
					?>" /> <label>Custom Text</label>
		<?php
	}
	
	function dlcz_title_customtxt_render() { 
		$options = get_option( 'dlcz_options_settings' );
		?>
		<input type="text" name="dlcz_options_settings[dlcz_title_customtxt]" value="<?php if (isset($options['dlcz_title_customtxt'])) echo $options['dlcz_title_customtxt']; ?>" />
		<?php
	}
	
	//render for skill one
	function dlcz_title_one_render() { 
		$options = get_option( 'dlcz_options_settings' );
		?>
		<br /><input type="text" name="dlcz_options_settings[dlcz_title_one]" value="<?php if (isset($options['dlcz_title_one'])) echo $options['dlcz_title_one']; ?>" />
		<?php
	}	
	
	function dlcz_link_one_render() { 
		$options = get_option( 'dlcz_options_settings' );
		?>
		<br /><input type="text" name="dlcz_options_settings[dlcz_link_one]" value="<?php if (isset($options['dlcz_link_one'])) echo $options['dlcz_link_one']; ?>" />
		<?php
	}

	function dlcz_img_one_render() {
		$options = get_option( 'dlcz_options_settings' );
		?>
		<br /><input type="text" name="dlcz_options_settings[dlcz_img_one]" value="<?php if (isset($options['dlcz_img_one'])) echo $options['dlcz_img_one']; ?>" />
		<?php
	}
	
	function dlcz_skill_one_render() { 
		$options = get_option( 'dlcz_options_settings' );
		?>
		<textarea cols="40" rows="5" name="dlcz_options_settings[dlcz_skill_one]"><?php if (isset($options['dlcz_skill_one'])) echo $options['dlcz_skill_one']; ?></textarea>
		<?php
	}
	
	//render for skill two
	function dlcz_title_two_render() { 
		$options = get_option( 'dlcz_options_settings' );
		?>
		<input type="text" name="dlcz_options_settings[dlcz_title_two]" value="<?php if (isset($options['dlcz_title_two'])) echo $options['dlcz_title_two']; ?>" />
		<?php
	}
	
	function dlcz_link_two_render() { 
		$options = get_option( 'dlcz_options_settings' );
		?>
		<br /><input type="text" name="dlcz_options_settings[dlcz_link_two]" value="<?php if (isset($options['dlcz_link_two'])) echo $options['dlcz_link_two']; ?>" />
		<?php
	}
	
	function dlcz_img_two_render() {
		$options = get_option( 'dlcz_options_settings' );
		?>
		<br /><input type="text" name="dlcz_options_settings[dlcz_img_two]" value="<?php if (isset($options['dlcz_img_two'])) echo $options['dlcz_img_two']; ?>" />
		<?php
	}

	function dlcz_skill_two_render() { 
		$options = get_option( 'dlcz_options_settings' );
		?>
		<textarea cols="40" rows="5" name="dlcz_options_settings[dlcz_skill_two]"><?php if (isset($options['dlcz_skill_two'])) echo $options['dlcz_skill_two']; ?></textarea>
		<?php
	}

	//render for skill three
		function dlcz_title_three_render() { 
		$options = get_option( 'dlcz_options_settings' );
		?>
		<input type="text" name="dlcz_options_settings[dlcz_title_three]" value="<?php if (isset($options['dlcz_title_three'])) echo $options['dlcz_title_three']; ?>" />
		<?php
	}
	
	function dlcz_link_three_render() { 
		$options = get_option( 'dlcz_options_settings' );
		?>
		<br /><input type="text" name="dlcz_options_settings[dlcz_link_three]" value="<?php if (isset($options['dlcz_link_three'])) echo $options['dlcz_link_three']; ?>" />
		<?php
	}

	function dlcz_img_three_render() {
		$options = get_option( 'dlcz_options_settings' );
		?>
		<br /><input type="text" name="dlcz_options_settings[dlcz_img_three]" value="<?php if (isset($options['dlcz_img_three'])) echo $options['dlcz_img_three']; ?>" />
		<?php
	}

	function dlcz_skill_three_render() { 
		$options = get_option( 'dlcz_options_settings' );
		?>
		<textarea cols="40" rows="5" name="dlcz_options_settings[dlcz_skill_three]"><?php if (isset($options['dlcz_skill_three'])) echo $options['dlcz_skill_three']; ?></textarea>
		<?php
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
