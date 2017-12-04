<?php

// =============================================
// FOOTER PANEL/SECTION
// =============================================

function footerCustomization($wp_customize){

	$wp_customize->add_setting('footer_text', array(
		'default' => '©2017 ExampleSite, Inc.',
		'transport' => 'refresh'
	));

	$wp_customize->add_section('footer_section', array(
		'title' =>__('Footer', 'Custom Theme')
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'Footer text', array(
		'label' =>__('Footer Copyright Text','Custom Theme'),
		'section' => 'footer_section',
		'settings' => 'footer_text'
	)));
}

// =============================================
// HOMEPAGE PANEL/SECTION
// =============================================

function homepageCustomization($wp_customize){

	$wp_customize->add_panel('homepage_panel', array(
		'title' =>__('Homepage', 'New Custom Theme'),
	 	'description' => __( 'Set editable text for certain content.')
	));

	$wp_customize->add_setting('homepage_header', array(
		'default' => __( 'PROJECTS','Homepage Header'),
		'transport' => 'refresh'
	));

	$wp_customize->add_section('homepage_header_section', array(
		'panel' =>'homepage_panel',
		'title' =>__('Homepage header', 'New Custom Theme')
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'Homepage header title', array(
		'label' =>__('Homepage Header','New Theme'),
		'section' => 'homepage_header_section',
		'settings' => 'homepage_header',
	  	'type' => 'text'
	)));

	function sanitize_text( $text ) {
 		return sanitize_text_field( $text );
 	}

}

// =============================================
// COLOUR PANEL/SECTIONS
// =============================================

function colourCustomization($wp_customize){

	// Add colour section
	$wp_customize->add_section('colour_section', array(
			'title' =>__('Colours', 'New Custom Theme')
	));

	// Background colour
	$wp_customize->add_setting('background_colour', array(
			'default' => '#ffffff',
			'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'body', array(
		'label' =>__('Background Colour','New Theme'),
		'section' => 'colour_section',
		'settings' => 'background_colour'
	)));

	// Nav Colours
	$wp_customize->add_setting('nav_colour', array(
			'default' => '#ffffff',
			'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nav', array(
		'label' =>__('Nav Colour','New Theme'),
		'section' => 'colour_section',
		'settings' => 'nav_colour'
	)));


}


// =============================================
// CSS CHANGES(COLOURS ETC.)
// =============================================

function customCss(){
?>

	<style type="text/css">

		body{
			background-color: <?php echo get_theme_mod('background_colour'); ?>;
		}

		nav{
			background-color: <?php echo get_theme_mod('nav_colour'); ?>;
		}

	</style>
<?php
}

// =============================================
// ACTIONS
// =============================================

add_action('wp_head', 'customCss');
add_action('customize_register', 'footerCustomization');
add_action('customize_register', 'homepageCustomization');
add_action('customize_register', 'colourCustomization');
