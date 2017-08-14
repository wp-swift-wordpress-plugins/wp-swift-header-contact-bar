<?php
add_action( 'admin_menu', 'wp_swift_contact_bars_add_admin_menu' );
add_action( 'admin_init', 'wp_swift_contact_bars_settings_init' );


function wp_swift_contact_bars_add_admin_menu(  ) { 

	if (function_exists('wp_swift_get_parent_slug')) {
        add_submenu_page( 'wp-swift-admin-menu', 'WP Swift: Contact Bars', 'Contact Bars', 'manage_options', 'wp_swift_contact_bars', 'wp_swift_contact_bars_options_page' );
    }
    else {
        add_submenu_page( 'WP Swift: Contact Bars', 'Contact Bars',  'manage_options', 'wp_swift_contact_bars', 'wp_swift_contact_bars_options_page' );
    }
}

function wp_swift_contact_bars_settings_init(  ) { 

	register_setting( 'header_contact_bar', 'wp_swift_contact_bars_settings' );

	add_settings_section(
		'wp_swift_contact_bars_header_contact_bar_section', 
		__( 'Plugin options', 'wp-swift-contact-bars' ), 
		'wp_swift_contact_bars_settings_section_callback', 
		'header_contact_bar'
	);

	add_settings_field( 
		'wp_swift_contact_bars_checkbox_disable_public_css', 
		__( 'Disable Public CSS', 'wp-swift-contact-bars' ), 
		'wp_swift_contact_bars_checkbox_disable_public_css_render', 
		'header_contact_bar', 
		'wp_swift_contact_bars_header_contact_bar_section' 
	);

	add_settings_field( 
		'wp_swift_contact_bars_checkbox_disable_header', 
		__( 'Disable Header', 'wp-swift-contact-bars' ), 
		'wp_swift_contact_bars_checkbox_disable_header_render', 
		'header_contact_bar', 
		'wp_swift_contact_bars_header_contact_bar_section' 
	);

	add_settings_field( 
		'wp_swift_contact_bars_checkbox_disable_footer', 
		__( 'Disable Footer', 'wp-swift-contact-bars' ), 
		'wp_swift_contact_bars_checkbox_disable_footer_render', 
		'header_contact_bar', 
		'wp_swift_contact_bars_header_contact_bar_section' 
	);
}

function wp_swift_contact_bars_checkbox_disable_public_css_render( ) { 

	$options = get_option( 'wp_swift_contact_bars_settings' );
	?>
	<input type="checkbox" value="1" name='wp_swift_contact_bars_settings[wp_swift_contact_bars_checkbox_disable_public_css]' <?php 	
		if (isset($options['wp_swift_contact_bars_checkbox_disable_public_css'])) {
			checked( $options['wp_swift_contact_bars_checkbox_disable_public_css'], 1 );
		}
	?>><label><small>Tick this if you intend to use your own CSS</small></label>
	<?php
}

function wp_swift_contact_bars_checkbox_disable_header_render( ) { 

	$options = get_option( 'wp_swift_contact_bars_settings' );
	?>
	<input type="checkbox" value="1" name='wp_swift_contact_bars_settings[wp_swift_contact_bars_checkbox_disable_header]' <?php 	
		if (isset($options['wp_swift_contact_bars_checkbox_disable_header'])) {
			checked( $options['wp_swift_contact_bars_checkbox_disable_header'], 1 );
		}
	?>>
	<?php
}

function wp_swift_contact_bars_checkbox_disable_footer_render( ) { 

	$options = get_option( 'wp_swift_contact_bars_settings' );
	?>
	<input type="checkbox" value="1" name='wp_swift_contact_bars_settings[wp_swift_contact_bars_checkbox_disable_footer]' <?php 	
		if (isset($options['wp_swift_contact_bars_checkbox_disable_footer'])) {
			checked( $options['wp_swift_contact_bars_checkbox_disable_footer'], 1 );
		}
	?>>
	<?php
}


function wp_swift_contact_bars_settings_section_callback(  ) { 

	echo __( 'These are the settings for the header and footer contact bars. You can override the default settings here.', 'wp-swift-contact-bars' );

}

function wp_swift_contact_bars_options_page(  ) { 
	$options = get_option( 'wp_swift_contact_bars_settings' );
	echo "<pre>"; var_dump($options); echo "</pre>";
	?>
	<div id="wp-swift-contact-bars-options-page" class="wrap">
	<form action='options.php' method='post'>

		<h1>WP Swift: Contact Bars</h1>
		<hr>

		<?php
		settings_fields( 'header_contact_bar' );
		do_settings_sections( 'header_contact_bar' );
		submit_button();
		?>

	</form>
	</div>
	<?php

}