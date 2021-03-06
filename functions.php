<?php

include('partials/customizer.php');

function tags_init() {
	// create a new taxonomy
	$labels = array(
    'name' => _x( 'Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Tags' ),
    'popular_items' => __( 'Popular Tags' ),
    'all_items' => __( 'All Tags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Tag' ),
    'update_item' => __( 'Update Tag' ),
    'add_new_item' => __( 'Add New Tag' ),
    'new_item_name' => __( 'New Tag Name' ),
    'separate_items_with_commas' => __( 'Separate tags with commas' ),
    'add_or_remove_items' => __( 'Add or remove tags' ),
    'choose_from_most_used' => __( 'Choose from the most used tags' ),
    'menu_name' => __( 'Tags' ),
  );

  register_taxonomy('tag','project',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'category' ),
  ));
}
add_action( 'init', 'tags_init' );

function customThemeEnqueues(){
	wp_enqueue_style('customStyle', get_template_directory_uri() . '/css/custom-theme.min.css',  array(), '1.0.0', 'all');
	wp_enqueue_script('jquery');
	wp_enqueue_script('customScript', get_template_directory_uri() . '/js/custom-theme-script.min.js',  array(), '1.0.0', true);
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );
	wp_enqueue_media( 'images', get_template_directory_uri() . '/images/hydelogo.png' );
	// wp_enqueue_style( 'material-icons', get_template_directory_uri() . '/assets/material-icons/iconfont/material-icons.css' );
}

add_action('wp_enqueue_scripts', 'customThemeEnqueues');
add_action( 'after_setup_theme', 'custom_logo_setup' );
add_action('init', 'customThemeSetUp');

// Custom theme setups

function customThemeSetup(){
	add_theme_support( 'post-thumbnails' );
	add_theme_support('menus');
	register_nav_menu('primary-nav', 'Nav bar menu');
}

// Current page nav active
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}


// Add a custom logo
function custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 100,
        'flex-height' => false,
        'flex-width'  => false,
		'transport' => 'refresh'
    );
    add_theme_support( 'custom-logo', $defaults );
}

// Adds thumbnail option to post
add_theme_support( 'post-thumbnails', array( 'project' ) );

// =============================================
// CUSTOM INPUT FIELD SECTION NAMES
// =============================================
function wpb_change_title_text( $title ){
     $screen = get_current_screen();

     if  ( 'team_member' == $screen->post_type ) {
          $title = 'Team Members Name';
     }

     return $title;
}

function service_title_text( $title ){
     $screen = get_current_screen();

     if  ( 'service' == $screen->post_type ) {
          $title = 'Service Name';
     }

     return $title;
}

function project_title_text( $title ){
     $screen = get_current_screen();

     if  ( 'project' == $screen->post_type ) {
          $title = 'Project Name';
     }

     return $title;
}

add_filter( 'enter_title_here', 'wpb_change_title_text' );
add_filter( 'enter_title_here', 'service_title_text' );
add_filter( 'enter_title_here', 'project_title_text' );

// =============================================
// CUSTOM POST TYPE(PROJECTS)
// =============================================

function projects_init() {
    $labels = array(
        'name'               => _x( 'Projects', 'post type general name' ),
        'singular_name'      => _x( 'Project', 'post type singular name' ),
        'menu_name'          => _x( 'Projects', 'admin menu' ),
        'name_admin_bar'     => _x( 'Project', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New Project', 'project' ),
        'add_new_item'       => __( 'Add New Project' ),
        'new_item'           => __( 'New Project' ),
        'menu_position'      => __( '2' ),
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
// CUSTOM POST TYPE(TEAM)
// =============================================

function team_init() {
    $labels = array(
        'name'               => _x( 'Team Members', 'post type general name' ),
        'title'               => _x( 'Team Member Name', 'post type general name' ),
        'singular_name'      => _x( 'Team Member', 'post type singular name' ),
        'menu_name'          => _x( 'Team Members', 'admin menu' ),
        'name_admin_bar'     => _x( 'Team Member', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New Team Member', 'team_member' ),
        'add_new_item'       => __( 'Add New Team Member' ),
        'new_item'           => __( 'New Team Member' ),
        'menu_position'      => __( '3' ),
        'edit_item'          => __( 'Edit Team Member' ),
        'view_item'          => __( 'View Team Member' ),
        'all_items'          => __( 'All Team Members' ),
        'search_items'       => __( 'Search Team Members' ),
        'parent_item_colon'  => __( 'Parent Team Members:' ),
        'not_found'          => __( 'No Team Member found.' ),
        'not_found_in_trash' => __( 'No Team Member found in Trash.' )
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'team'),
        'query_var' => true,
        'menu_icon' => 'dashicons-groups',
		'register_meta_box_cb' => 'add_job_metaboxes',
        'supports' => array(
            'title',
            'editor',
            'thumbnail',),
        );
    register_post_type( 'team_member', $args );
}

add_action( 'init', 'team_init' );


// =============================================
// CUSTOM POST TYPE(SERVICES)
// =============================================

function services_init() {
    $labels = array(
        'name'               => _x( 'Services', 'post type general name' ),
        'title'               => _x( 'Service Name', 'post type general name' ),
        'singular_name'      => _x( 'Service', 'post type singular name' ),
        'menu_name'          => _x( 'Services', 'admin menu' ),
        'name_admin_bar'     => _x( 'Service', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New Service', 'team_member' ),
        'add_new_item'       => __( 'Add New Service' ),
        'new_item'           => __( 'New Service' ),
        'menu_position'      => __( '4' ),
        'edit_item'          => __( 'Edit Service' ),
        'view_item'          => __( 'View Service' ),
        'all_items'          => __( 'All Services' ),
        'search_items'       => __( 'Search Services' ),
        'parent_item_colon'  => __( 'Parent Services:' ),
        'not_found'          => __( 'No Service found.' ),
        'not_found_in_trash' => __( 'No Service found in Trash.' )
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'services'),
        'query_var' => true,
        'menu_icon' => 'dashicons-hammer',
        'supports' => array(
            'title',
            'editor',
            'thumbnail',),
        );
    register_post_type( 'service', $args );
}

add_action( 'init', 'services_init' );


// =============================================
// CUSTOM META BOXES
// =============================================

// =============================================
$metaboxes = array(
    'programmes' => array(
        'title' => __('Job Role(s)'),
        'applicableto' => 'team_member',
        'location' => 'normal',
        'priority' => 'low',
        'fields' => array(
            'jobRole' => array(
                'title' => __('Job Role(s)'),
                'type' => 'text'
            )
        )
    )
);

function add_post_format_metabox() {
    global $metaboxes;
    if ( ! empty( $metaboxes ) ) {
        foreach ( $metaboxes as $id => $metabox ) {
            add_meta_box( $id, $metabox['title'], 'show_metaboxes', $metabox['applicableto'], $metabox['location'], $metabox['priority'], $id );
        }
    }
}

add_action( 'admin_init', 'add_post_format_metabox' );

function show_metaboxes( $post, $args ) {
    global $metaboxes;
    $custom = get_post_custom( $post->ID );
    $fields = $tabs = $metaboxes[$args['id']]['fields'];
    $output = '<input type="hidden" name="post_format_meta_box_nonce" value="' . wp_create_nonce( basename( __FILE__ ) ) . '" />';
    if ( sizeof( $fields ) ) {
        foreach ( $fields as $id => $field ) {
            switch ( $field['type'] ) {
                default:
                case "text":
                    $output .= '<label for="' . $id . '">' . $field['title'] . '</label><input class="customInput" id="' . $id . '" type="text" name="' . $id . '" value="' . $custom[$id][0] . '" style="width: 100%;" />';
                    break;
                case "number":
                    $output .= '<label for="' . $id . '">' . $field['title'] . '</label><input class="customInput" id="' . $id . '" type="number" name="' . $id . '" value="' . $custom[$id][0] . '" style="width: 100%;" />';
                break;
            }
        }
    }
    echo $output;
}
add_action( 'save_post', 'save_metaboxes' );

function save_metaboxes( $post_id ) {
    global $metaboxes;
    if ( ! wp_verify_nonce( $_POST['post_format_meta_box_nonce'], basename( __FILE__ ) ) )
        return $post_id;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $post_id;
    if ( 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) )
            return $post_id;
    } elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }
    $post_type = get_post_type();
    foreach ( $metaboxes as $id => $metabox ) {
        if ( $metabox['applicableto'] == $post_type ) {
            $fields = $metaboxes[$id]['fields'];
            foreach ( $fields as $id => $field ) {
                $old = get_post_meta( $post_id, $id, true );
                $new = $_POST[$id];
                if ( $new && $new != $old ) {
                    update_post_meta( $post_id, $id, $new );
                }
                elseif ( '' == $new && $old || ! isset( $_POST[$id] ) ) {
                    delete_post_meta( $post_id, $id, $old );
                }
            }
        }
    }
}


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

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'social icons enable', array(
		'label' =>__('Footer Copyright Text','Custom Theme'),
		'section' => 'ct_hyde_social_media_icons',
		'settings' => 'icons_enable'
	)));


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
	} else{
		?>
		<ul class="footer-social-links">
			<li><i class="fa fa-facebook" aria-hidden="true"></i></li>
			<li><i class="fa fa-twitter" aria-hidden="true"></i></li>
			<li><i class="fa fa-instagram" aria-hidden="true"></i></li>
		</ul>
		<?php
	}
}




// =============================================
// REQUIRED FEATURED IMAGE
// =============================================

function featured_image_warning(){
	if(get_post_type($post_id) == 'project'){

		?>
		<script>
			setInterval(function(){
				if(jQuery("#set-post-thumbnail img").length) jQuery("#publish").removeAttr("disabled");
				else jQuery("#publish").attr("disabled", "disabled");
			}, 500);
		</script>
		<?php
			if (!has_post_thumbnail()) {
		?><div id="message" class="notice error is-dismissible">
		   <p>
			   <strong><?php _e( 'Please make sure to set a Featured Image. Projects cannot be published without one.' ); ?></strong>
		   </p>
	   </div>
	   <?php
		   }
	}
}

add_action( 'admin_notices', 'featured_image_warning' );
