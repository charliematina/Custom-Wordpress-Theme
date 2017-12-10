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

	// Footer Copyright Color
	$wp_customize->add_setting('footer_copyright_color_settings', array(
			'default' => '#000000',
			'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_copyright_color', array(
		'label' =>__('Footer Text Colour','New Theme'),
		'section' => 'footer_section',
		'settings' => 'footer_copyright_color_settings'
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
// FEATURED PROJECTS MOBILE SLIDER
// =============================================
function featuredProjectsMobile($wp_customize){
	$wp_customize->add_panel('featured_projects_mobile_', array(
		'title' =>__('Mobile Featured Projects', 'Hyde Architects Custom Theme'),
	 	'description' => __( 'Change the content for the featured project slideshow')
	));

	for ($i=1; $i <= 3; $i++) {

		// Add the section to the panels
		$wp_customize->add_section('featured_project_section_mobile_' . $i, array(
			'title' =>__('Mobile Featured Project ' . $i, 'Hyde Architects Custom Theme'),
			'panel' =>'featured_projects_mobile_'
		));

		$wp_customize->add_setting('featured_project_mobile_' . $i, array(
			'transport' => 'refresh',
			'default' => ''
		));

		// Add an image to the feautred section
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'featured_project_section_mobile_' . $i, array(
			'label' =>__('Featured Image','Hyde Architects Custom Theme'),
			'section' => 'featured_project_section_mobile_' . $i,
			'settings' => 'featured_project_mobile_' . $i
		)));

		// Add a title
		$wp_customize->add_setting('featured_project_title_mobile_' . $i, array(
			'transport' => 'refresh',
			'default' => __( "Project Title.",'featured project title')
		));

		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'featured_project_title_mobile_' . $i, array(
			'label' =>__('Project Title','New Theme'),
			'section' => 'featured_project_section_mobile_' . $i,
			'settings' => 'featured_project_title_mobile_' . $i,
			'type' => 'text'
		)));

		// Add a subheader
		$wp_customize->add_setting('featured_project_subheader_mobile_' . $i, array(
			'transport' => 'refresh',
			'default' => __( "Sub-header",'featured project sub-header')
		));

		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'featured_project_details_mobile_' . $i, array(
			'label' =>__('Project Subheader','Hyde Architects Custom Theme'),
			'section' => 'featured_project_section_mobile_' . $i,
			'settings' => 'featured_project_subheader_mobile_' . $i,
			'type' => 'text'
		)));

		$wp_customize->add_setting('featured_project_link_mobile_' . $i, array(
			'transport' => 'refresh',
			'default' => __( "http://example.com/projects",'Project link')
		));

		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'featured_project_link_mobile_' . $i, array(
			'label' =>__('Project Link','Hyde Architects Custom Theme'),
			'section' => 'featured_project_section_mobile_' . $i,
			'settings' => 'featured_project_link_mobile_' . $i,
			'type' => 'text'
		)));

		$wp_customize->add_setting('mobile_feature_text_colour' . $i, array(
				'default' => '#ffffff',
				'transport' => 'refresh'
		));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'mobile_featured_text_colour' . $i, array(
			'label' =>__('Text Colour', 'New Theme'),
			'section' => 'featured_project_section_mobile_' . $i,
			'settings' => 'mobile_feature_text_colour' . $i
		)));

	}

}

// =============================================
// FEATURED PROJECTS SLIDER
// =============================================
function featuredProjects($wp_customize){
	$wp_customize->add_panel('featured_projects', array(
		'title' =>__('Featured Projects', 'Hyde Architects Custom Theme'),
	 	'description' => __( 'Change the content for the featured project slideshow')
	));

	for ($i=1; $i <= 3; $i++) {

		// Add the section to the panels
		$wp_customize->add_section('featured_project_section_' . $i, array(
			'title' =>__('Featured Project ' . $i, 'Hyde Architects Custom Theme'),
			'panel' =>'featured_projects'
		));

		$wp_customize->add_setting('featured_project_' . $i, array(
			'transport' => 'refresh',
			'default' => ''
		));

		// Add an image to the feautred section
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'featured_project_section_' . $i, array(
			'label' =>__('Featured Image','Hyde Architects Custom Theme'),
			'section' => 'featured_project_section_' . $i,
			'settings' => 'featured_project_' . $i
		)));

		// Add a title
		$wp_customize->add_setting('featured_project_title_' . $i, array(
			'transport' => 'refresh',
			'default' => __( "Project Title.",'featured project title')
		));

		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'featured_project_title_' . $i, array(
			'label' =>__('Project Title','New Theme'),
			'section' => 'featured_project_section_' . $i,
			'settings' => 'featured_project_title_' . $i,
			'type' => 'text'
		)));

		// Add a subheader
		$wp_customize->add_setting('featured_project_subheader_' . $i, array(
			'transport' => 'refresh',
			'default' => __( "Sub-header",'featured project sub-header')
		));

		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'featured_project_details_' . $i, array(
			'label' =>__('Project Subheader','Hyde Architects Custom Theme'),
			'section' => 'featured_project_section_' . $i,
			'settings' => 'featured_project_subheader_' . $i,
			'type' => 'text'
		)));

		$wp_customize->add_setting('featured_project_link_' . $i, array(
			'transport' => 'refresh',
			'default' => __( "http://example.com/projects",'Project link')
		));

		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'featured_project_link_' . $i, array(
			'label' =>__('Project Link','Hyde Architects Custom Theme'),
			'section' => 'featured_project_section_' . $i,
			'settings' => 'featured_project_link_' . $i,
			'type' => 'text'
		)));

		$wp_customize->add_setting('feature_project_text_colour' . $i, array(
				'default' => '#ffffff',
				'transport' => 'refresh'
		));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'featured_text_colour' . $i, array(
			'label' =>__('Text Colour', 'New Theme'),
			'section' => 'featured_project_section_' . $i,
			'settings' => 'feature_project_text_colour' . $i
		)));
	}

}

add_action('customize_register', 'featuredProjects');
add_action('customize_register', 'featuredProjectsMobile');

// =============================================
// COLOUR PANEL/SECTIONS
// =============================================

function colourCustomization($wp_customize){

	$wp_customize->add_panel('site_colours', array(
		'title' =>__('Colours', 'Change website colours'),
	 	'description' => __( 'Change the colours of the website elements')
	));

	// Add colour section
	$wp_customize->add_section('icon_colour_section', array(
			'title' =>__('Icon Colours', 'New Custom Theme'),
			'panel' =>'site_colours'
	));

	$wp_customize->add_section('font_section', array(
			'title' =>__('Fonts', 'New Custom Theme')
	));

	// Add colour section
	$wp_customize->add_section('button_colour_section', array(
			'title' =>__('Button Colours', 'New Custom Theme'),
			'panel' =>'site_colours'
	));

	// Add colour section
	$wp_customize->add_section('navigation_section', array(
			'title' =>__('Navigation Bar/Menu Colours', 'New Custom Theme'),
			'panel' =>'site_colours'
	));

	// Add colour section
	$wp_customize->add_section('text_colour_section', array(
			'title' =>__('Text Colours', 'New Custom Theme'),
			'panel' =>'site_colours'
	));


	// Navigation
	$wp_customize->add_section('icon_navigation_colours', array(
			'title' =>__('Navigation Colours', 'New Custom Theme'),
			'panel' =>'site_colours'
	));
	// Project Thumbs
	$wp_customize->add_section('project_thumbnail_section', array(
			'title' =>__('Project Thumbnail Colours', 'New Custom Theme'),
			'panel' =>'site_colours'
	));

	$wp_customize->add_setting('icon_navigation_colours', array(
			'default' => '#000000',
			'transport' => 'refresh'
	));

	$wp_customize->add_section('background_section', array(
			'title' =>__('Background', 'New Custom Theme'),
			'panel' =>'site_colours'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'navigation_colours', array(
		'label' =>__('Navigation Icons','New Theme'),
		'section' => 'icon_colour_section',
		'settings' => 'icon_navigation_colours'
	)));

	// Background colour
	$wp_customize->add_setting('background_colour', array(
			'default' => '#ffffff',
			'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'body', array(
		'label' =>__('Background Colour','New Theme'),
		'section' => 'background_section',
		'settings' => 'background_colour'
	)));

	// Footer social links
	$wp_customize->add_setting('social_icons_colour', array(
			'default' => '#000000',
			'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'social_icons_colour', array(
		'label' =>__('Social Icons','New Theme'),
		'section' => 'icon_colour_section',
		'settings' => 'social_icons_colour'
	)));

	// Heading Text Colours
	$wp_customize->add_setting('heading_text_colour_setting', array(
			'default' => '#000000',
			'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'heading_text_colour', array(
		'label' =>__('Heading Text Colour','New Theme'),
		'section' => 'text_colour_section',
		'settings' => 'heading_text_colour_setting'
	)));

	// Body Text Colours
	$wp_customize->add_setting('body_text_colour_setting', array(
			'default' => '#000000',
			'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'body_text_colour', array(
		'label' =>__('Body Text Colour','New Theme'),
		'section' => 'text_colour_section',
		'settings' => 'body_text_colour_setting'
	)));

	// Button Text Colours
	$wp_customize->add_setting('button_text_colour_setting', array(
			'default' => '#ffffff',
			'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'button_text_colour', array(
		'label' =>__('Button Text Colour','New Theme'),
		'section' => 'button_colour_section',
		'settings' => 'button_text_colour_setting'
	)));

	// Button Colours
	$wp_customize->add_setting('button_colour_setting', array(
			'default' => '#000000',
			'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'button_colour', array(
		'label' =>__('Button Colour','New Theme'),
		'section' => 'button_colour_section',
		'settings' => 'button_colour_setting'
	)));

	$wp_customize->add_setting('button_border_setting', array(
			'default' => '#000000',
			'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'button_border_colour', array(
		'label' =>__('Button Border Colour','New Theme'),
		'section' => 'button_colour_section',
		'settings' => 'button_border_setting'
	)));

	// Service list button Colours
	$wp_customize->add_setting('service_button_border_setting', array(
			'default' => '#000000',
			'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'service_button_border_colour', array(
		'label' =>__('Service Button Border Colour','New Theme'),
		'section' => 'button_colour_section',
		'settings' => 'service_button_border_setting'
	)));

	$wp_customize->add_setting('service_button_text_colour_setting', array(
			'default' => '#000000',
			'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'service_button_text_colour', array(
		'label' =>__('Service Button Text Colour','New Theme'),
		'section' => 'button_colour_section',
		'settings' => 'service_button_text_colour_setting'
	)));

	$wp_customize->add_setting('service_button_hover_text_setting', array(
			'default' => '#ffffff',
			'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'service_button_hover_text', array(
		'label' =>__('Service Button Hover Text Colour','New Theme'),
		'section' => 'button_colour_section',
		'settings' => 'service_button_hover_text_setting'
	)));

	$wp_customize->add_setting('service_button_hover_colour_setting', array(
			'default' => '#000000',
			'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'service_button_hover_colour', array(
		'label' =>__('Service Button Hover Colour','New Theme'),
		'section' => 'button_colour_section',
		'settings' => 'service_button_hover_colour_setting'
	)));


	// Menu Item
	$wp_customize->add_setting('menu_text_colour_settings', array(
			'default' => '#000000',
			'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_text_colour', array(
		'label' =>__('Menu Text Colour','New Theme'),
		'section' => 'navigation_section',
		'settings' => 'menu_text_colour_settings'
	)));

	// Navbar
	$wp_customize->add_setting('nav_colour_settings', array(
			'default' => '#ffffff',
			'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nav_colour', array(
		'label' =>__('Navigation Bar Colour','New Theme'),
		'section' => 'navigation_section',
		'settings' => 'nav_colour_settings'
	)));

	$wp_customize->add_setting('mobile_nav_settings', array(
			'default' => '#ffffff',
			'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'mobile_nav_colour', array(
		'label' =>__('Mobile Navigation Bar Colour','New Theme'),
		'section' => 'navigation_section',
		'settings' => 'mobile_nav_settings'
	)));

	// Project Thumbnail Overlay
	$wp_customize->add_setting('project_overlay_settings', array(
			'default' => '#000000',
			'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'overlay_thumbnail_colour', array(
		'label' =>__('Project Thumbnail Overlay Colour','New Theme'),
		'section' => 'project_thumbnail_section',
		'settings' => 'project_overlay_settings'
	)));

	// Project Thumbnail Overlay
	$wp_customize->add_setting('project_text_settings', array(
			'default' => '#ffffff',
			'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'project_text', array(
		'label' =>__('Project Overlay Text Colour','New Theme'),
		'section' => 'project_thumbnail_section',
		'settings' => 'project_text_settings'
	)));

	// Project Homepage Mobile
	$wp_customize->add_setting('project_text_mobile_settings', array(
			'default' => '#ffffff',
			'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'project_text_mobile', array(
		'label' =>__('Mobile Homepage Text Colour','New Theme'),
		'section' => 'project_thumbnail_section',
		'settings' => 'project_text_mobile_settings'
	)));

	// Sub headers
	$wp_customize->add_setting('sub_headers_setting', array(
			'default' => '#000000',
			'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sub_headers', array(
		'label' =>__('Sub Headers Text Colour','New Theme'),
		'section' => 'text_colour_section',
		'settings' => 'sub_headers_setting'
	)));

	// Fonts
	$wp_customize->add_setting('font_settings', array(
			'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'newtheme_font', array(
		'label' =>__('Primary Font','New Theme'),
		'section' => 'font_section',
		'type' => 'radio',
		'choices' => array(
			'Proxima Nova'=>__('Default'),
			'Futura'=>__('Futura'),
			'verdana'=>__('verdana')

		),
		'settings' => 'font_settings'
	)));

	$wp_customize->add_setting('sub_font_settings', array(
			'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'newtheme_font_sub', array(
		'label' =>__('Subheader Font','New Theme'),
		'section' => 'font_section',
		'type' => 'radio',
		'choices' => array(
			'Proxima Nova'=>__('Default'),
			'courier new'=>__('courier new'),
			'verdana'=>__('verdana')
		),
		'settings' => 'sub_font_settings'
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
			font-family: <?php echo get_theme_mod('font_settings'); ?>;
		}

		/*nav{
			background-color: <?php echo get_theme_mod('nav_colour'); ?>;
		}*/

		#slide-1 .featured-project-description{
			color: <?php echo get_theme_mod('feature_project_text_colour1'); ?>;
		}
		#slide-2 .featured-project-description{
			color: <?php echo get_theme_mod('feature_project_text_colour2'); ?>;
		}
		#slide-3 .featured-project-description{
			color: <?php echo get_theme_mod('feature_project_text_colour3'); ?>;
		}

		#mobile-slide-1 .featured-project-description{
			color: <?php echo get_theme_mod('mobile_feature_text_colour1'); ?>;
		}
		#mobile-slide-2 .featured-project-description{
			color: <?php echo get_theme_mod('mobile_feature_text_colour2'); ?>;
		}
		#mobile-slide-3 .featured-project-description{
			color: <?php echo get_theme_mod('mobile_feature_text_colour3'); ?>;
		}
		.footer-social-links{
			color: <?php echo get_theme_mod('social_icons_colour'); ?>;
		}
		.material-icons, .fa-circle{
			color: <?php echo get_theme_mod('icon_navigation_colours'); ?> !important;
		}
		.burger-line{
			background-color: <?php echo get_theme_mod('icon_navigation_colours'); ?> !important;
		}
		.footer-copyright, .theme-by{
			color: <?php echo get_theme_mod('footer_copyright_color_settings'); ?>
		}

		.page-title, .project-page-title, .single-team-page-title, .team-page-title{
			color: <?php echo get_theme_mod('heading_text_colour_setting'); ?>;
		}

		.page-detail-wrapper p, .team-member-wrapper p, .project-page-content-container p{
			color: <?php echo get_theme_mod('body_text_colour_setting'); ?>;
		}

		.button{
			color: <?php echo get_theme_mod('button_text_colour_setting'); ?>;
			background-color: <?php echo get_theme_mod('button_colour_setting'); ?>;
			border: 1.5px solid <?php echo get_theme_mod('button_border_setting');?>;
		}

		.service-list-item{
			color: <?php echo get_theme_mod('service_button_text_colour_setting'); ?>;
			border: 1.5px solid <?php echo get_theme_mod('service_button_border_setting');?>;
		}

		.service-list-item:hover{
			background-color: <?php echo get_theme_mod('service_button_hover_text_setting'); ?>;
			color: <?php echo get_theme_mod('service_button_hover_colour_setting'); ?>;
		}

		.nav-open, .sub-menu{
			background-color: <?php echo get_theme_mod('nav_colour_settings'); ?> !important;
			font-family: <?php echo get_theme_mod('sub_font_settings'); ?>;
		}

		.menu-item{
			color: <?php echo get_theme_mod('menu_text_colour_settings'); ?>;
		}
		.project-thumb-overlay{
			background-color: <?php echo get_theme_mod('project_overlay_settings'); ?>;
		}

		@media screen and (max-width: 425px){
			nav{
				background-color: <?php echo get_theme_mod('mobile_nav_settings'); ?> !important;
			}
		}

		.project-thumb-description, .project-thumb-date{
			color: <?php echo get_theme_mod('project_text_mobile_settings'); ?> !important;
		}

		.page-date, .sub-header{
			font-family: <?php echo get_theme_mod('sub_font_settings'); ?> !important;
			color: <?php echo get_theme_mod('sub_headers_setting'); ?> !important;
		}

		@media screen and (min-width: 600px){
			.project-thumb-description, .project-thumb-date{
				color: <?php echo get_theme_mod('project_text_settings'); ?> !important;
			}
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
