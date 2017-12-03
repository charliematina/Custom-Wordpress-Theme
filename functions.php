<?php

function customThemeEnqueues(){
	wp_enqueue_style('customStyle', get_template_directory_uri() . '/sass/custom-theme.min.css',  array(), '1.0.0', 'all');
	wp_enqueue_script('jquery');
	wp_enqueue_script('customScript', get_template_directory_uri() . '/js/custom-theme-script.js',  array(), '1.0.0', true);
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );
}

add_action('wp_enqueue_scripts', 'customThemeEnqueues');
add_action( 'after_setup_theme', 'custom_logo_setup' );
add_action('init', 'customThemeSetUp');

// Custom theme setups

function customThemeSetup(){
	add_theme_support( 'post-thumbnails' );
	add_theme_support('menus');
	register_nav_menu('primary-nav', 'Nav bar menu');
	register_nav_menu('footer-nav', 'Footer nav menu 1');
}


// Add a custom logo
function custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 100,
        'flex-height' => false,
        'flex-width'  => false
    );
    add_theme_support( 'custom-logo', $defaults );
}

// Adds thumbnail option to post
add_theme_support( 'post-thumbnails', array( 'project' ) );

// =============================================
// CUSTOM POST TYPE(PROJECTS)
// =============================================

function projects_init() {
    $labels = array(
        'name'               => _x( 'Projects', 'post type general name' ),
        'singular_name'      => _x( 'Project', 'post type singular name' ),
        'menu_name'          => _x( 'Projects', 'admin menu' ),
        'name_admin_bar'     => _x( 'Project', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New Project', 'programme' ),
        'add_new_item'       => __( 'Add New Project' ),
        'new_item'           => __( 'New Project' ),
        'menu_position'      => __( '5' ),
        'edit_item'          => __( 'Edit Project' ),
        'view_item'          => __( 'View Project' ),
        'all_items'          => __( 'All Projects' ),
        'search_items'       => __( 'Search Projects' ),
        'parent_item_colon'  => __( 'Parent Projects:' ),
        'not_found'          => __( 'No Project found.' ),
        'not_found_in_trash' => __( 'No Project found in Trash.' )
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'projects'),
        'query_var' => true,
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => array(
            'title',
            'editor',
            'thumbnail',),
        );
    register_post_type( 'project', $args );
}

add_action( 'init', 'projects_init' );

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
	}

}

add_action('customize_register', 'featuredProjects');
add_action('customize_register', 'featuredProjectsMobile');

// =============================================
// CUSTOM FIELDS
// =============================================


// =============================================
// SOCIAL MEDIA ICONS
// =============================================

function ct_hyde_social_array() {

	$social_sites = array(
		'twitter'       => 'hyde_twitter_profile',
		'facebook'      => 'hyde_facebook_profile',
		'pinterest'     => 'hyde_pinterest_profile',
		'linkedin'      => 'hyde_linkedin_profile',
		'youtube'       => 'hyde_youtube_profile',
		'instagram'     => 'hyde_instagram_profile',
		'behance'       => 'hyde_behance_profile'
	);

	return apply_filters( 'ct_hyde_social_array_filter', $social_sites );
}

function my_add_customizer_sections( $wp_customize ) {

	$social_sites = ct_hyde_social_array();

	// set a priority used to order the social sites
	$priority = 5;

	// section
	$wp_customize->add_section( 'ct_hyde_social_media_icons', array(
		'title'       => __( 'Social Media Icons', 'hyde architects custom theme' ),
		'priority'    => 25,
		'description' => __( 'Add the URL for each of your social profiles.', 'hyde architects custom theme' )
	) );

	// create a setting and control for each social site
	foreach ( $social_sites as $social_site => $value ) {

		$label = ucfirst( $social_site );

		if ( $social_site == 'google-plus' ) {
			$label = 'Google Plus';
		}
		// setting
		$wp_customize->add_setting( $social_site, array(
			'sanitize_callback' => 'esc_url_raw'
		) );
		// control
		$wp_customize->add_control( $social_site, array(
			'type'     => 'url',
			'label'    => $label,
			'section'  => 'ct_hyde_social_media_icons',
			'priority' => $priority
		) );
		// increment the priority for next site
		$priority = $priority + 5;
	}
}
add_action( 'customize_register', 'my_add_customizer_sections' );

function my_social_icons_output() {

	$social_sites = ct_hyde_social_array();

	foreach ( $social_sites as $social_site => $profile ) {

		if ( strlen( get_theme_mod( $social_site ) ) > 0 ) {
			$active_sites[ $social_site ] = $social_site;
		}
	}

	if ( ! empty( $active_sites ) ) {

		echo '<ul class="footer-social-links">';
		foreach ( $active_sites as $key => $active_site ) {
        	$class = 'fa fa-' . $active_site; ?>
		 	<li>
				<a class="<?php echo esc_attr( $active_site ); ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( $key ) ); ?>">
					<i class="<?php echo esc_attr( $class ); ?>" title="<?php echo esc_attr( $active_site ); ?>"></i>
				</a>
			</li>
		<?php }
		echo "</ul>";
	}
}
