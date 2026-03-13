<?php

function asset_version(){
    return '1.0.2';
}

function adamsons_setup() {
	add_theme_support( 'editor-styles' );
	add_editor_style( 'style.css' );
	remove_theme_support( 'core-block-patterns' );
}
add_action( 'after_setup_theme', 'adamsons_setup' );

function adamsons_enqueue_styles() {
	wp_enqueue_style( 'adamsons-style', get_stylesheet_uri(), array(), asset_version() );
	wp_enqueue_style( 'adamsons-open-sans', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap', array(), null );
	wp_enqueue_style( 'adamsons-neulis-neue', 'https://use.typekit.net/rlg1vvi.css', array(), null );
}
add_action( 'wp_enqueue_scripts', 'adamsons_enqueue_styles' );

function adamsons_enqueue_scripts() {
	wp_enqueue_style( 'adamsons-open-sans', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap', array(), null );
	wp_enqueue_style( 'adamsons-neulis-neue', 'https://use.typekit.net/rlg1vvi.css', array(), null );
	wp_enqueue_script( 'adamsons-main', get_template_directory_uri() . '/assets/js/main.min.js', array(), asset_version(), true );
}
add_action( 'enqueue_block_assets', 'adamsons_enqueue_scripts' );

function adamsons_enqueue_editor_assets() {
	wp_enqueue_style( 'adamsons-open-sans', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap', array(), null );
	wp_enqueue_style( 'adamsons-neulis-neue', 'https://use.typekit.net/rlg1vvi.css', array(), null );
}
add_action( 'enqueue_block_editor_assets', 'adamsons_enqueue_editor_assets' );

function adamsons_register_pattern_category() {
	register_block_pattern_category(
		'adamsons',
		array( 'label' => __( 'Adamsons', 'adamsons' ) )
	);
}
add_action( 'init', 'adamsons_register_pattern_category', 0 );

function adamsons_register_post_hero_pattern() {
	if ( ! function_exists( 'register_block_pattern' ) ) {
		return;
	}

	$slug = 'adamsons/post-hero';

	if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {
		$registry = WP_Block_Patterns_Registry::get_instance();
		if ( $registry->is_registered( $slug ) ) {
			return;
		}
	}

	$pattern_file = get_theme_file_path( 'patterns/post-hero.php' );
	if ( ! $pattern_file || ! file_exists( $pattern_file ) ) {
		return;
	}

	ob_start();
	include $pattern_file;
	$content = trim( ob_get_clean() );

	if ( $content === '' ) {
		return;
	}

	register_block_pattern(
		$slug,
		array(
			'title'      => __( 'Post Hero', 'adamsons' ),
			'categories' => array( 'adamsons' ),
			'content'    => $content,
		)
	);
}
add_action( 'init', 'adamsons_register_post_hero_pattern', 1 );

function adamsons_register_author_contact_pattern() {
	if ( ! function_exists( 'register_block_pattern' ) ) {
		return;
	}

	$slug = 'adamsons/author-contact';

	if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {
		$registry = WP_Block_Patterns_Registry::get_instance();
		if ( $registry->is_registered( $slug ) ) {
			return;
		}
	}

	$pattern_file = get_theme_file_path( 'patterns/author-card.php' );
	if ( ! $pattern_file || ! file_exists( $pattern_file ) ) {
		return;
	}

	ob_start();
	include $pattern_file;
	$content = trim( ob_get_clean() );

	if ( $content === '' ) {
		return;
	}

	register_block_pattern(
		$slug,
		array(
			'title'      => __( 'Author Contact', 'adamsons' ),
			'categories' => array( 'adamsons' ),
			'content'    => $content,
		)
	);
}
add_action( 'init', 'adamsons_register_author_contact_pattern', 1 );

function adamsons_register_related_posts_static_pattern() {
	if ( ! function_exists( 'register_block_pattern' ) ) {
		return;
	}

	$slug = 'adamsons/related-posts-static';

	if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {
		$registry = WP_Block_Patterns_Registry::get_instance();
		if ( $registry->is_registered( $slug ) ) {
			return;
		}
	}

	$pattern_file = get_theme_file_path( 'patterns/related-posts-static.php' );
	if ( ! $pattern_file || ! file_exists( $pattern_file ) ) {
		return;
	}

	ob_start();
	include $pattern_file;
	$content = trim( ob_get_clean() );

	if ( $content === '' ) {
		return;
	}

	register_block_pattern(
		$slug,
		array(
			'title'      => __( 'Related Posts (Static)', 'adamsons' ),
			'categories' => array( 'adamsons' ),
			'content'    => $content,
		)
	);
}
add_action( 'init', 'adamsons_register_related_posts_static_pattern', 1 );

function adamsons_register_expertise_links_pattern() {
	if ( ! function_exists( 'register_block_pattern' ) ) {
		return;
	}

	$slug = 'adamsons/expertise-links';

	if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {
		$registry = WP_Block_Patterns_Registry::get_instance();
		if ( $registry->is_registered( $slug ) ) {
			return;
		}
	}

	$pattern_file = get_theme_file_path( 'patterns/expertise-links.php' );
	if ( ! $pattern_file || ! file_exists( $pattern_file ) ) {
		return;
	}

	ob_start();
	include $pattern_file;
	$content = trim( ob_get_clean() );

	if ( $content === '' ) {
		return;
	}

	register_block_pattern(
		$slug,
		array(
			'title'      => __( 'Expertise Links', 'adamsons' ),
			'categories' => array( 'adamsons' ),
			'content'    => $content,
		)
	);
}
add_action( 'init', 'adamsons_register_expertise_links_pattern', 1 );

function adamsons_register_tabs_links_pattern() {
	if ( ! function_exists( 'register_block_pattern' ) ) {
		return;
	}

	$slug = 'adamsons/tabs-links';

	if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {
		$registry = WP_Block_Patterns_Registry::get_instance();
		if ( $registry->is_registered( $slug ) ) {
			return;
		}
	}

	$pattern_file = get_theme_file_path( 'patterns/tabs-links.php' );
	if ( ! $pattern_file || ! file_exists( $pattern_file ) ) {
		return;
	}

	ob_start();
	include $pattern_file;
	$content = trim( ob_get_clean() );

	if ( $content === '' ) {
		return;
	}

	register_block_pattern(
		$slug,
		array(
			'title'      => __( 'Tabs Links', 'adamsons' ),
			'categories' => array( 'adamsons' ),
			'content'    => $content,
		)
	);
}
add_action( 'init', 'adamsons_register_tabs_links_pattern', 1 );

function adamsons_register_tabs_footer_pattern() {
	if ( ! function_exists( 'register_block_pattern' ) ) {
		return;
	}

	$slug = 'adamsons/tabs-footer';

	if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {
		$registry = WP_Block_Patterns_Registry::get_instance();
		if ( $registry->is_registered( $slug ) ) {
			return;
		}
	}

	$pattern_file = get_theme_file_path( 'patterns/tabs-footer.php' );
	if ( ! $pattern_file || ! file_exists( $pattern_file ) ) {
		return;
	}

	ob_start();
	include $pattern_file;
	$content = trim( ob_get_clean() );

	if ( $content === '' ) {
		return;
	}

	register_block_pattern(
		$slug,
		array(
			'title'      => __( 'Tabs Footer', 'adamsons' ),
			'categories' => array( 'adamsons' ),
			'content'    => $content,
		)
	);
}
add_action( 'init', 'adamsons_register_tabs_footer_pattern', 1 );

function adamsons_register_people_post_type() {
	register_post_type(
		'people',
		array(
			'labels' => array(
				'name'               => __( 'Team Profiles', 'adamsons' ),
				'singular_name'      => __( 'Team Profile', 'adamsons' ),
				'add_new'            => __( 'Add New', 'adamsons' ),
				'add_new_item'       => __( 'Add New Profile', 'adamsons' ),
				'edit_item'          => __( 'Edit Profile', 'adamsons' ),
				'new_item'           => __( 'New Profile', 'adamsons' ),
				'view_item'          => __( 'View Profile', 'adamsons' ),
				'search_items'       => __( 'Search Profiles', 'adamsons' ),
				'not_found'          => __( 'No profiles found.', 'adamsons' ),
				'not_found_in_trash' => __( 'No profiles found in Trash.', 'adamsons' ),
				'all_items'          => __( 'All Profiles', 'adamsons' ),
				'menu_name'          => __( 'Team Profiles', 'adamsons' ),
			),
			'public'             => true,
			'show_in_rest'       => true,
			'menu_icon'          => 'dashicons-groups',
			'supports'           => array( 'title', 'editor' ),
			'has_archive'        => false,
			'rewrite'            => array( 'slug' => 'people' ),
		)
	);
}
add_action( 'init', 'adamsons_register_people_post_type' );

function adamsons_register_jobs_post_type() {
	register_post_type(
		'jobs',
		array(
			'labels' => array(
				'name'               => __( 'Jobs', 'adamsons' ),
				'singular_name'      => __( 'Job', 'adamsons' ),
				'add_new'            => __( 'Add New', 'adamsons' ),
				'add_new_item'       => __( 'Add New Job', 'adamsons' ),
				'edit_item'          => __( 'Edit Job', 'adamsons' ),
				'new_item'           => __( 'New Job', 'adamsons' ),
				'view_item'          => __( 'View Job', 'adamsons' ),
				'search_items'       => __( 'Search Jobs', 'adamsons' ),
				'not_found'          => __( 'No jobs found.', 'adamsons' ),
				'not_found_in_trash' => __( 'No jobs found in Trash.', 'adamsons' ),
				'all_items'          => __( 'All Jobs', 'adamsons' ),
				'menu_name'          => __( 'Job Listings', 'adamsons' ),
			),
			'public'             => true,
			'show_in_rest'       => true,
			'menu_icon'          => 'dashicons-megaphone',
			'supports'           => array( 'title', 'editor' ),
			'has_archive'        => false,
			'rewrite'            => array( 'slug' => 'jobs' ),
		)
	);

	register_taxonomy(
		'job_type',
		array( 'jobs' ),
		array(
			'labels' => array(
				'name'                       => __( 'Job Types', 'adamsons' ),
				'singular_name'              => __( 'Job Type', 'adamsons' ),
				'search_items'               => __( 'Search Job Types', 'adamsons' ),
				'popular_items'              => __( 'Popular Job Types', 'adamsons' ),
				'all_items'                  => __( 'All Job Types', 'adamsons' ),
				'edit_item'                  => __( 'Edit Job Type', 'adamsons' ),
				'update_item'                => __( 'Update Job Type', 'adamsons' ),
				'add_new_item'               => __( 'Add New Job Type', 'adamsons' ),
				'new_item_name'              => __( 'New Job Type Name', 'adamsons' ),
				'separate_items_with_commas' => __( 'Separate job types with commas', 'adamsons' ),
				'add_or_remove_items'        => __( 'Add or remove job types', 'adamsons' ),
				'choose_from_most_used'      => __( 'Choose from the most used job types', 'adamsons' ),
				'menu_name'                  => __( 'Job Types', 'adamsons' ),
			),
			'public'            => true,
			'show_ui'           => true,
			'show_in_rest'      => true,
			'hierarchical'      => false,
			'show_admin_column' => true,
			'meta_box_cb'       => false,
			'rewrite'           => array( 'slug' => 'job-type' ),
		)
	);
}
add_action( 'init', 'adamsons_register_jobs_post_type' );

function adamsons_register_authors_post_type() {
	register_post_type(
		'authors',
		array(
			'labels' => array(
				'name'               => __( 'Authors', 'adamsons' ),
				'singular_name'      => __( 'Author', 'adamsons' ),
				'add_new'            => __( 'Add New', 'adamsons' ),
				'add_new_item'       => __( 'Add New', 'adamsons' ),
				'edit_item'          => __( 'Edit Author', 'adamsons' ),
				'new_item'           => __( 'New Author', 'adamsons' ),
				'view_item'          => __( 'View Author', 'adamsons' ),
				'search_items'       => __( 'Search Authors', 'adamsons' ),
				'not_found'          => __( 'No authors found.', 'adamsons' ),
				'not_found_in_trash' => __( 'No authors found in Trash.', 'adamsons' ),
				'all_items'          => __( 'All Authors', 'adamsons' ),
				'menu_name'          => __( 'Authors', 'adamsons' ),
			),
			'public'             => true,
			'show_in_rest'       => true,
			'menu_icon'          => 'dashicons-book',
			'supports'           => array( 'title', 'editor', 'excerpt' ),
			'has_archive'        => false,
			'rewrite'            => array( 'slug' => 'authors' ),
		)
	);
}
add_action( 'init', 'adamsons_register_authors_post_type' );

function adamsons_register_people_acf_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'    => 'group_adamsons_people_fields',
			'title'  => 'Person Details',
			'fields' => array(
				array(
					'key'           => 'field_adamsons_person_featured_image',
					'label'         => 'Featured Image',
					'name'          => 'person_featured_image',
					'type'          => 'image',
					'return_format' => 'id',
					'preview_size'  => 'medium',
					'library'       => 'all',
				),
				array(
					'key'   => 'field_adamsons_person_job_title',
					'label' => 'Job Title',
					'name'  => 'person_job_title',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_adamsons_person_telephone',
					'label' => 'Telephone',
					'name'  => 'person_telephone',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_adamsons_person_email',
					'label' => 'Email Address',
					'name'  => 'person_email',
					'type'  => 'email',
				),
				array(
					'key'   => 'field_adamsons_person_linkedin',
					'label' => 'LinkedIn Link',
					'name'  => 'person_linkedin',
					'type'  => 'url',
				),
				array(
					'key'   => 'field_adamsons_person_sector',
					'label' => 'Sector',
					'name'  => 'person_sector',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_adamsons_person_location',
					'label' => 'Location',
					'name'  => 'person_location',
					'type'  => 'text',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'people',
					),
				),
			),
		)
	);
}
add_action( 'acf/init', 'adamsons_register_people_acf_fields' );

function adamsons_register_jobs_acf_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'    => 'group_adamsons_jobs_fields',
			'title'  => 'Job Details',
			'fields' => array(
				array(
					'key'   => 'field_adamsons_job_client',
					'label' => 'Client',
					'name'  => 'job_client',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_adamsons_job_role',
					'label' => 'Role',
					'name'  => 'job_role',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_adamsons_job_location',
					'label' => 'Location',
					'name'  => 'job_location',
					'type'  => 'text',
				),
				array(
					'key'           => 'field_adamsons_job_type',
					'label'         => 'Type',
					'name'          => 'job_type',
					'type'          => 'taxonomy',
					'taxonomy'      => 'job_type',
					'field_type'    => 'select',
					'return_format' => 'id',
					'add_term'      => 1,
					'save_terms'    => 1,
					'load_terms'    => 1,
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'jobs',
					),
				),
			),
		)
	);
}
add_action( 'acf/init', 'adamsons_register_jobs_acf_fields' );

function adamsons_register_authors_acf_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'    => 'group_adamsons_authors_fields',
			'title'  => 'Author Details',
			'fields' => array(
				array(
					'key'           => 'field_adamsons_author_image',
					'label'         => 'Image',
					'name'          => 'author_image',
					'type'          => 'image',
					'return_format' => 'id',
					'preview_size'  => 'medium',
					'library'       => 'all',
				),
				array(
					'key'   => 'field_adamsons_author_job_title',
					'label' => 'Job Title',
					'name'  => 'author_job_title',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_adamsons_author_company_name',
					'label' => 'Company Name',
					'name'  => 'author_company_name',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_adamsons_author_telephone',
					'label' => 'Telephone Number',
					'name'  => 'author_telephone',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_adamsons_author_email',
					'label' => 'Email Address',
					'name'  => 'author_email',
					'type'  => 'email',
				),
				array(
					'key'   => 'field_adamsons_author_linked_url',
					'label' => 'Linked URL',
					'name'  => 'author_linked_url',
					'type'  => 'url',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'authors',
					),
				),
			),
		)
	);

	acf_add_local_field_group(
		array(
			'key'    => 'group_adamsons_post_author_relationship',
			'title'  => 'Author',
			'fields' => array(
				array(
					'key'           => 'field_adamsons_post_author_profile',
					'label'         => 'Author',
					'name'          => 'post_author_profile',
					'type'          => 'relationship',
					'post_type'     => array( 'authors' ),
					'filters'       => array( 'search' ),
					'elements'      => array(),
					'return_format' => 'id',
					'max'           => 1,
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'post',
					),
				),
			),
		)
	);
}
add_action( 'acf/init', 'adamsons_register_authors_acf_fields' );

function adamsons_register_people_grid_pattern() {
	if ( ! function_exists( 'register_block_pattern' ) ) {
		return;
	}

	$slug = 'adamsons/people-grid-pattern';

	if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {
		$registry = WP_Block_Patterns_Registry::get_instance();
		if ( $registry->is_registered( $slug ) ) {
			return;
		}
	}

	$pattern_file = get_theme_file_path( 'patterns/people-grid.php' );
	if ( ! $pattern_file || ! file_exists( $pattern_file ) ) {
		return;
	}

	ob_start();
	include $pattern_file;
	$content = trim( ob_get_clean() );

	if ( $content === '' ) {
		return;
	}

	register_block_pattern(
		$slug,
		array(
			'title'      => __( 'People Grid', 'adamsons' ),
			'categories' => array( 'adamsons' ),
			'content'    => $content,
		)
	);
}
add_action( 'init', 'adamsons_register_people_grid_pattern', 1 );

function adamsons_get_selected_author_profile_id( $post_id = 0 ) {
	$post_id = (int) $post_id;

	if ( $post_id < 1 ) {
		$post_id = get_the_ID();
	}

	if ( $post_id < 1 ) {
		return 0;
	}

	$selected_author = null;

	if ( function_exists( 'get_field' ) ) {
		$selected_author = get_field( 'post_author_profile', $post_id );
	}

	if ( $selected_author === null ) {
		$selected_author = get_post_meta( $post_id, 'post_author_profile', true );
	}

	$author_id = 0;

	if ( is_array( $selected_author ) ) {
		$first = reset( $selected_author );
		if ( is_object( $first ) && isset( $first->ID ) ) {
			$author_id = (int) $first->ID;
		} elseif ( is_numeric( $first ) ) {
			$author_id = (int) $first;
		}
	} elseif ( is_object( $selected_author ) && isset( $selected_author->ID ) ) {
		$author_id = (int) $selected_author->ID;
	} elseif ( is_numeric( $selected_author ) ) {
		$author_id = (int) $selected_author;
	}

	if ( $author_id < 1 || get_post_type( $author_id ) !== 'authors' ) {
		return 0;
	}

	return $author_id;
}

function adamsons_get_author_profile_field_value( $author_id, $field_name ) {
	$author_id = (int) $author_id;
	if ( $author_id < 1 || $field_name === '' ) {
		return '';
	}

	if ( function_exists( 'get_field' ) ) {
		return get_field( $field_name, $author_id );
	}

	return get_post_meta( $author_id, $field_name, true );
}

function adamsons_get_author_display_text( $author_id ) {
	$author_id = (int) $author_id;
	if ( $author_id < 1 ) {
		return '';
	}

	$name = trim( get_the_title( $author_id ) );
	if ( $name === '' ) {
		return '';
	}

	$job_title = trim( (string) adamsons_get_author_profile_field_value( $author_id, 'author_job_title' ) );
	$company   = trim( (string) adamsons_get_author_profile_field_value( $author_id, 'author_company_name' ) );
	$details   = trim( $job_title . ' ' . $company );

	if ( $details !== '' ) {
		$name .= ', ' . $details;
	}

	return $name;
}

function adamsons_author_image_shortcode($atts) {
	if (!is_singular()) {
		return '';
	}

	$post_id = get_the_ID();
	if (!$post_id) {
		return '';
	}

	$author_id = adamsons_get_selected_author_profile_id($post_id);
	if (!$author_id) {
		return '';
	}

	$image_id = (int) adamsons_get_author_profile_field_value($author_id, 'author_image');
	if (!$image_id) {
		return '';
	}

	$atts = shortcode_atts(
		array(
			'size'  => 150,
			'class' => '',
		),
		$atts,
		'adamsons_author_image'
	);

	$size = max(1, (int) $atts['size']);
	$class = trim(sanitize_text_field($atts['class']));
	$classes = trim('adamsons-author-image ' . $class);
	$alt_text = get_the_title($author_id);

	$image = wp_get_attachment_image(
		$image_id,
		array($size, $size),
		false,
		array('alt' => $alt_text)
	);

	if (!$image) {
		return '';
	}

	return sprintf(
		'<figure class="%s">%s</figure>',
		esc_attr($classes),
		$image
	);
}
add_shortcode('adamsons_author_image', 'adamsons_author_image_shortcode');

function adamsons_author_name_shortcode( $atts ) {
	if ( ! is_singular() ) {
		return '';
	}

	$post_id   = get_the_ID();
	$author_id = adamsons_get_selected_author_profile_id( $post_id );
	if ( ! $author_id ) {
		return '';
	}

	$atts = shortcode_atts(
		array(
			'class' => '',
			'link'  => '0',
			'tag'   => 'p',
		),
		$atts,
		'adamsons_author_name'
	);

	$allowed_tags = array( 'p', 'div', 'span', 'h2', 'h3' );
	$tag          = strtolower( (string) $atts['tag'] );
	if ( ! in_array( $tag, $allowed_tags, true ) ) {
		$tag = 'p';
	}

	$class      = trim( sanitize_text_field( $atts['class'] ) );
	$class_attr = $class !== '' ? ' class="' . esc_attr( $class ) . '"' : '';

	$text = adamsons_get_author_display_text( $author_id );
	if ( $text === '' ) {
		return '';
	}

	$inner = esc_html( $text );
	if ( in_array( strtolower( (string) $atts['link'] ), array( '1', 'true', 'yes' ), true ) ) {
		$inner = '<a href="' . esc_url( get_permalink( $author_id ) ) . '">' . $inner . '</a>';
	}

	return sprintf(
		'<%1$s%2$s>%3$s</%1$s>',
		esc_attr( $tag ),
		$class_attr,
		$inner
	);
}
add_shortcode( 'adamsons_author_name', 'adamsons_author_name_shortcode' );

function adamsons_author_bio_shortcode( $atts ) {
	if ( ! is_singular() ) {
		return '';
	}

	$post_id   = get_the_ID();
	$author_id = adamsons_get_selected_author_profile_id( $post_id );
	if ( ! $author_id ) {
		return '';
	}

	$atts = shortcode_atts(
		array(
			'class' => '',
		),
		$atts,
		'adamsons_author_bio'
	);

	$bio = trim( (string) get_post_field( 'post_excerpt', $author_id ) );
	if ( $bio === '' ) {
		$bio = trim( wp_strip_all_tags( (string) get_post_field( 'post_content', $author_id ) ) );
	}

	if ( $bio === '' ) {
		return '';
	}

	$class      = trim( sanitize_text_field( $atts['class'] ) );
	$class_attr = $class !== '' ? ' class="' . esc_attr( $class ) . '"' : '';

	return '<p' . $class_attr . '>' . esc_html( $bio ) . '</p>';
}
add_shortcode( 'adamsons_author_bio', 'adamsons_author_bio_shortcode' );

function adamsons_get_related_posts($post_id, $limit = 3) {
	$post_id = (int) $post_id;
	if ($post_id < 1) {
		return array();
	}

	$limit = max(1, (int) $limit);
	$selected_ids = array();

	if (function_exists('get_field')) {
		$selected = get_field('related_posts', $post_id);
		if (is_array($selected)) {
			foreach ($selected as $item) {
				if (is_object($item) && isset($item->ID)) {
					$selected_ids[] = (int) $item->ID;
				} elseif (is_numeric($item)) {
					$selected_ids[] = (int) $item;
				}
			}
		} elseif (is_numeric($selected)) {
			$selected_ids[] = (int) $selected;
		}
	}

	$selected_ids = array_values(array_unique(array_filter($selected_ids)));
	$selected_ids = array_values(array_diff($selected_ids, array($post_id)));
	$selected_ids = array_slice($selected_ids, 0, $limit);

	if (!empty($selected_ids)) {
		return get_posts(
			array(
				'post_type'           => 'post',
				'post__in'            => $selected_ids,
				'orderby'             => 'post__in',
				'posts_per_page'      => $limit,
				'ignore_sticky_posts' => true,
			)
		);
	}

	$exclude_ids = array($post_id);
	$category_ids = wp_get_post_categories($post_id);
	$args = array(
		'post_type'           => 'post',
		'posts_per_page'      => $limit,
		'post__not_in'        => $exclude_ids,
		'ignore_sticky_posts' => true,
	);

	if (!empty($category_ids)) {
		$args['category__in'] = $category_ids;
	}

	$posts = get_posts($args);

	if (count($posts) < $limit) {
		$exclude_ids = array_merge($exclude_ids, wp_list_pluck($posts, 'ID'));
		$posts = array_merge(
			$posts,
			get_posts(
				array(
					'post_type'           => 'post',
					'posts_per_page'      => $limit - count($posts),
					'post__not_in'        => $exclude_ids,
					'ignore_sticky_posts' => true,
				)
			)
		);
	}

	return $posts;
}

function adamsons_render_related_posts($title_override = '') {
	if (!is_singular('post')) {
		return '';
	}

	$post_id = get_the_ID();
	if (!$post_id) {
		return '';
	}

	$posts = adamsons_get_related_posts($post_id, 3);
	if (empty($posts)) {
		return '';
	}

	$title = is_string($title_override) ? trim(wp_strip_all_tags($title_override)) : '';
	if ($title === '' && function_exists('get_field')) {
		$acf_title = get_field('related_posts_title', $post_id);
		if (is_string($acf_title) && $acf_title !== '') {
			$title = trim(wp_strip_all_tags($acf_title));
		}
	}

	if ($title === '') {
		$title = 'Related';
	}

	ob_start();
	?>
	<section class="related-posts alignfull">
		<div class="container">
			<h2 class="related-posts__title"><?php echo esc_html($title); ?></h2>
			<div class="related-posts__grid">
				<?php foreach ($posts as $related_post) : ?>
					<?php
					$permalink = get_permalink($related_post);
					$post_title = get_the_title($related_post);
					$date = get_the_date(get_option('date_format'), $related_post);
					$categories = get_the_category($related_post->ID);
					$category_name = (!empty($categories) && !is_wp_error($categories)) ? $categories[0]->name : '';
					$category_link = (!empty($categories) && !is_wp_error($categories)) ? get_category_link($categories[0]->term_id) : '';
					?>
					<article class="related-posts__item">
						<div class="related-posts__content">
							<h3 class="related-posts__post-title">
								<a href="<?php echo esc_url($permalink); ?>"><?php echo esc_html($post_title); ?></a>
							</h3>
							<div class="related-posts__footer">
								<p class="related-posts__meta">
									<?php if ($category_name && $category_link) : ?>
										<a class="related-posts__category" href="<?php echo esc_url($category_link); ?>"><?php echo esc_html($category_name); ?></a>
									<?php elseif ($category_name) : ?>
										<span class="related-posts__category"><?php echo esc_html($category_name); ?></span>
									<?php endif; ?>
									<span class="related-posts__date"><?php echo esc_html($date); ?></span>
								</p>
								<span class="related-posts__arrow" aria-hidden="true">
									<svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 465 268" xmlns="http://www.w3.org/2000/svg"><path d="m764.288 214.592-252.288 252.288-252.288-252.288-45.12 45.12 252.16 252.288 45.248 45.184 45.12-45.12 252.288-252.352-45.12-45.184z" fill-rule="nonzero" transform="matrix(.78125 0 0 .78125 -167.65 -167.6)"></path></svg>
								</span>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php
	$html = ob_get_clean();
	$html = preg_replace('/>\\s+</', '><', $html);
	return trim($html);
}

function adamsons_related_posts_shortcode($atts) {
	$atts = shortcode_atts(
		array(
			'title' => '',
		),
		$atts,
		'adamsons_related_posts'
	);

	return adamsons_render_related_posts($atts['title']);
}
add_shortcode('adamsons_related_posts', 'adamsons_related_posts_shortcode');

function adamsons_strip_autop_from_related_posts($content) {
	if (strpos($content, '[adamsons_related_posts') === false) {
		return $content;
	}

	$content = preg_replace('/<p>\\s*(\\[adamsons_related_posts[^\\]]*\\])\\s*<\\/p>/', '$1', $content);
	$content = preg_replace('/<br\\s*\\/?>(\\s*\\[adamsons_related_posts[^\\]]*\\])/', '$1', $content);
	return $content;
}
add_filter('the_content', 'adamsons_strip_autop_from_related_posts', 9);

function adamsons_related_posts_block_render($attributes) {
	$title = '';
	if (is_array($attributes) && isset($attributes['title']) && is_string($attributes['title'])) {
		$title = $attributes['title'];
	}

	return adamsons_render_related_posts($title);
}

function adamsons_register_related_posts_block() {
	register_block_type(
		'adamsons/related-posts',
		array(
			'api_version'     => 2,
			'render_callback' => 'adamsons_related_posts_block_render',
			'attributes'      => array(
				'title' => array(
					'type'    => 'string',
					'default' => '',
				),
			),
		)
	);
}
add_action('init', 'adamsons_register_related_posts_block');

function adamsons_cleanup_related_posts_block_markup($block_content, $block) {
	if (!is_array($block) || empty($block['blockName'])) {
		return $block_content;
	}

	if ($block['blockName'] !== 'core/shortcode') {
		return $block_content;
	}

	$inner_html = isset($block['innerHTML']) ? $block['innerHTML'] : '';
	if (strpos($inner_html, '[adamsons_related_posts') === false) {
		return $block_content;
	}

	$block_content = preg_replace('/<p>\\s*<\\/p>/', '', $block_content);
	$block_content = preg_replace('/<p>\\s*(<span class="related-posts__arrow"[^>]*>.*?<\\/span>)\\s*<\\/p>/s', '$1', $block_content);
	$block_content = preg_replace('/<p>\\s*<a[^>]*class="[^"]*related-posts__link[^"]*"[^>]*>\\s*<\\/a>\\s*<\\/p>/', '', $block_content);

	return $block_content;
}
add_filter('render_block', 'adamsons_cleanup_related_posts_block_markup', 10, 2);

function adamsons_get_preview_excerpt_by_url( $url ) {
	$url = is_string( $url ) ? trim( $url ) : '';
	if ( $url === '' ) {
		return '';
	}

	if ( strpos( $url, '/' ) === 0 ) {
		$url = home_url( $url );
	}

	$post_id = url_to_postid( $url );
	if ( ! $post_id ) {
		return '';
	}

	$post = get_post( $post_id );
	if ( ! $post instanceof WP_Post || $post->post_status !== 'publish' ) {
		return '';
	}

	$excerpt = trim( get_the_excerpt( $post ) );
	if ( $excerpt !== '' ) {
		return wp_strip_all_tags( $excerpt );
	}

	$content = trim( wp_strip_all_tags( strip_shortcodes( (string) $post->post_content ) ) );
	if ( $content === '' ) {
		return '';
	}

	return wp_trim_words( $content, 12, '&hellip;' );
}

function adamsons_render_expertise_row_excerpt( $block_content, $block ) {
	if ( ! is_array( $block ) || empty( $block['blockName'] ) || $block['blockName'] !== 'core/group' ) {
		return $block_content;
	}

	$class_name = '';
	if ( ! empty( $block['attrs']['className'] ) && is_string( $block['attrs']['className'] ) ) {
		$class_name = $block['attrs']['className'];
	}

	if ( $class_name === '' || strpos( $class_name, 'expertise-links__row' ) === false ) {
		return $block_content;
	}

	if ( ! preg_match( '/<a\b[^>]*href="([^"]+)"/i', $block_content, $matches ) ) {
		return $block_content;
	}

	$excerpt = adamsons_get_preview_excerpt_by_url( html_entity_decode( $matches[1], ENT_QUOTES, 'UTF-8' ) );
	if ( $excerpt === '' ) {
		return $block_content;
	}

	$updated_content = preg_replace(
		'/<p\b([^>]*)class="([^"]*\bexpertise-links__excerpt\b[^"]*)"([^>]*)>.*?<\/p>/is',
		'<p$1class="$2"$3>' . esc_html( $excerpt ) . '</p>',
		$block_content,
		1
	);

	return is_string( $updated_content ) ? $updated_content : $block_content;
}
add_filter( 'render_block', 'adamsons_render_expertise_row_excerpt', 10, 2 );

function adamsons_get_search_filter_value() {
	$filter = isset($_GET['filter']) ? sanitize_key($_GET['filter']) : '';
	if ($filter === '') {
		return '';
	}

	$term = get_term_by('slug', $filter, 'category');
	if (!$term || is_wp_error($term)) {
		return '';
	}

	return $term->slug;
}

function adamsons_search_results_shortcode() {
	if (!is_search()) {
		return '';
	}

	global $wp_query;
	if (!$wp_query instanceof WP_Query) {
		return '';
	}

	$found = (int) $wp_query->found_posts;
	$posts_per_page = (int) $wp_query->get('posts_per_page');
	if ($posts_per_page < 1) {
		$posts_per_page = max(1, $found);
	}

	$paged = max(1, (int) $wp_query->get('paged'));
	$post_count = (int) $wp_query->post_count;

	if ($found > 0) {
		$start = (($paged - 1) * $posts_per_page) + 1;
		$end = min($start + $post_count - 1, $found);
		$range = $start . '-' . $end;
	} else {
		$range = '0-0';
	}

	$query = get_search_query();

	if ($query !== '') {
		$text = sprintf("Results %s out of %d for '%s'", $range, $found, $query);
	} else {
		$text = sprintf("Results %s out of %d", $range, $found);
	}

	return sprintf(
		'<p class="ni-results__count caps">%s</p>',
		esc_html($text)
	);
}
add_shortcode('adamsons_search_results', 'adamsons_search_results_shortcode');

function adamsons_search_filter_shortcode() {
	if (!is_search()) {
		return '';
	}

	$filter = adamsons_get_search_filter_value();
	$search = get_search_query();
	$terms = get_terms(array(
		'taxonomy' => 'category',
		'hide_empty' => true,
	));

	if (is_wp_error($terms)) {
		$terms = array();
	}

	ob_start();
	?>
	<form class="ni-filter" method="get" action="<?php echo esc_url(home_url('/')); ?>"><div class="ni-filter__left"><label for="ni-filter-select">Filter by</label></div><div class="ni-filter__select__wrap"><input type="hidden" name="s" value="<?php echo esc_attr($search); ?>" /><select id="ni-filter-select" name="filter" onchange="this.form.submit()"><option value="all" <?php selected($filter, ''); ?>>All</option><?php foreach ($terms as $term) : ?><option value="<?php echo esc_attr($term->slug); ?>" <?php selected($filter, $term->slug); ?>><?php echo esc_html($term->name); ?></option><?php endforeach; ?></select></div></form>
	<?php
	return trim(ob_get_clean());
}
add_shortcode('adamsons_search_filter', 'adamsons_search_filter_shortcode');

function adamsons_apply_search_filter($query) {
	if (is_admin() || !$query->is_main_query() || !$query->is_search()) {
		return;
	}

	$filter = adamsons_get_search_filter_value();
	if ($filter) {
		$query->set('category_name', $filter);
	}
	$query->set('posts_per_page', -1);
}
add_action('pre_get_posts', 'adamsons_apply_search_filter');

function adamsons_allow_svg_uploads( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'adamsons_allow_svg_uploads' );

// Disable comments across the site
function disable_comments_everywhere() {
    // Disable support for comments and trackbacks in post types
    foreach ( get_post_types() as $post_type ) {
        remove_post_type_support( $post_type, 'comments' );
        remove_post_type_support( $post_type, 'trackbacks' );
    }
}
add_action( 'admin_init', 'disable_comments_everywhere' );

// Close comments on the front-end
function close_comments($comments_open, $post_id) {
    return false;
}
add_filter('comments_open', 'close_comments', 20, 2);
add_filter('pings_open', 'close_comments', 20, 2);

// Hide existing comments
function hide_existing_comments($comments) {
    return [];
}
add_filter('comments_array', 'hide_existing_comments', 10, 2);

// Remove comments-related menu items from admin bar
function remove_admin_bar_comments() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action('wp_before_admin_bar_render', 'remove_admin_bar_comments');

// Remove comments page in admin menu
function remove_comments_admin_menu() {
    remove_menu_page('edit-comments.php');
	//remove_menu_page( 'edit.php?post_type=acf-field-group' ); // advanced custom fields
	remove_submenu_page( 'options-general.php', 'cpto-options' ); // post order
	remove_submenu_page( 'options-general.php', 'cb-carousel-settings' ); // carousel slider settings
}
add_action('admin_menu', 'remove_comments_admin_menu', 999);

// Redirect any user trying to access comments page
function redirect_comments_page() {
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }
}
add_action('admin_init', 'redirect_comments_page');

// Add custom styles to editor only
function add_inline_editor_styles() {
    $custom_css = "
        .edit-site-site-icon__image,
        .edit-post-fullscreen-mode-close.components-button,
        .edit-site-layout__view-mode-toggle.components-button,
        .edit-post-fullscreen-mode-close.components-button img,
        .edit-site-editor__view-mode-toggle .edit-site-editor__view-mode-toggle-icon img,
        .edit-site-editor__view-mode-toggle .edit-site-editor__view-mode-toggle-icon svg {
            background-color: #f0f0f0 !important;
        }
        .edit-post-fullscreen-mode-close.components-button:before {
            display: none;
        }
		.edit-post-fullscreen-mode-close-site-icon__image {
			height: 32px;
			width: 32px;
		}
		.ni-filter__select__wrap select {
			background: none transparent !important;
		}
		.related-posts__footer .related-posts__arrow {
    		background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAsCAMAAABMt1hMAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAylpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDEwLjAtYzAwMCA3OS5kMjBlNDY2MzAsIDIwMjUvMTIvMDktMDI6MTE6MjMgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCAyNy40IChNYWNpbnRvc2gpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkU0RUY5Njc5MEU3NzExRjFBQUIyRDU2MDVDNzNDQkJGIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkU0RUY5NjdBMEU3NzExRjFBQUIyRDU2MDVDNzNDQkJGIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6RTRFRjk2NzcwRTc3MTFGMUFBQjJENTYwNUM3M0NCQkYiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6RTRFRjk2NzgwRTc3MTFGMUFBQjJENTYwNUM3M0NCQkYiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5vgfunAAAAD1BMVEX69eOliFXk2sDPvpy7o3qUSExWAAAANElEQVR42uzUQQEAMAjDwLbDv2YUBAGDfO8fSaoIKjsoYLHR3tlGYzr5T6Y5TEvBEbUAAwA8GQHS57QeyAAAAABJRU5ErkJggg==) 50% 50% no-repeat;
			background-size: contain;
		}
		.author-card .components-placeholder {
			border: 0;
			padding: 0;
			width: 150px;
			height: 150px;
			overflow: hidden;
			min-width: 150px;
			box-shadow: none;
			border-radius: 50%;
			background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAACWCAYAAAA8AXHiAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAJLklEQVR4nO2dWVfjuhJGP9uJhwwE6P7//+zedV5Ph8SJJ8ljnQcDTTN1CHasUmq/wYJFoWyXpJIsOf/7/z8EQRgYd+oABDsRsYRRELGEURCxhFEQsYRRELGEURCxhFEQsYRRELGEURCxhFEQsYRRELGEURCxhFEQsYRRELGEURCxhFEQsYRRmE0dgKm0bYeqqtA0DZqmRdd1ICI4DuA4LmYzD7OZB9/34XkeHMeZOmSjELFeUNcNiqKAUhp1XZ/8e57nIQwDhGEIz/Pgur141yybiAVAa40kyVCW5Vm/37Yt8rxAnhd/fN/zPPj+/FG6CLOZN0S4LLhqsaqqxuFwPFuov9G2LZRqoZQGcEQQBFivlwjD0PpsdpViEREOhwRZll3075ZlibLU8H0fm80NwjC86N+/JFcjFoFQ6gpKKSil0bbtRJE4qKoa2+0Oy+UCt7cbuK59k3PrxSIiZFmONM0mlOl98ryA1iV+/ryH7/tThzMoVoultUYcH9E0zdShfEjbtvj16wE/ftwjiuzpGu3LwY8cDgm2253RUj1BRHh42KEo1NShDIZ1GYuIsN8fUBTF33/YMPb7GK7rIgyDqUP5NtZlrDjmKRXQPxS73e5LxVlTsUYsImC/P7wpUnKj6wi7XQwi3me1WCFW13X49WuLPM+nDmUQ6rrG8ZhMHca3YC8WEWG73aGqqqlDGZQ0zVDX5k88PoK9WHF8tE6qJzhnLdZiaV1a0/29h1IKVcVzIM9aLM5P9Kmk6WXXM4eCrVhlWVrbBb6kKAqWYy22YnEvK3yFfhcGr/IDS7GI8LjH6TooigLcylosxarrCl3XTR3Gxeg6gtbjbEYcC5Zi2bRYeypa88rQ7MTqOrqq8dUTVVWxWuZhJ5ZS6qq6wSfqumG1T56lWNcIEbF6oFiJRcRvEDskItZI1HXDapwxNJz+dVZiVdX1ZituMBOL54LsUHgenzepWYnVNGa9vnVJHMeB68qscBQ4vHEzFjIrHAkiMu6F00vDKWOzEYvT0zoWXSdiDY6I1R8GxwURixFEfNqAkViMqoMjwakN2Ih1zRX3Jzi1gYjFCE5twEYsbnu+x4FPGzASS+CEiMUKWdIZAT6NKjASi9MC7Fg4jNqAjVic9nuPhcMoa4tYjODUBizE6jpiVXUeEy5LW8Yfbqu1xm63F7EAHA5HHI9H3N5usFqtpg7nU4zPWHF8FKleQNQfNW56mxgtFhFd9a7RjyAi409WNl4sRstjF8X0dUOjxeoxuwGnwvQJotFiOY7Daop9SRzH6I9OxOIIERl/FZ3Z0YHXS5qXwnEceJ7ZH53Z0YFXtfmSmN4uxoslGestHNrEcLEI8/l86iCMo28Ts2fLhovlwPdFrNf0bSJd4bcIArvuSh4CDhdlGi+W53mStV7gOA6Li8mNFwsAgsD8J/RShGFg/IwQYCJWGNpzu/t34fKQsRDL930WT+klELEGxHVldggArutiPjd+byYAJmIBwHK5nDqEyVkuF2wyNyOxFlitrleuMAyw2dxMHcbJ8Mirj9zd3WK1WqFpGuz317EP/v7+DvP5nN1QgJVYADCfzzCfzxAEofXXn8znMyyXi6nDOAs2XeFrosj+EkQURVOHcDbMxeIxkD0XEWsCXNe1OmvNZjPWOzvYigUAyyXfJ/pv9KWFqaM4H9ZihWHIYtPbV3EcsB20P8FaLMdxsFrx/gDeI4oi9g8Ma7GAviLPpRp9KjYUgtmL5Xke+27jJUHgs1lo/gz2YgHAzc3amqzFadnmM6wQy/M8rNfrqcP4NlEUWZGtAEvEAoCbmxVmM3YrVM84joPbWzuyFWCRWI7j4MePO7Zd4t3dLesH4zXWiAX0O03v7u6mDuPLrNdrqyYggGViAX01ntOH5Ps+Nhv+48PXWCcW0M8SubDZ2DOjfYmVYs1mHosXXV3XtWYW+BorxQIczOfmizWfz63MVoC1YvG4IoVDjOdirVg8NgFyiPE8LBZLmBJLxSKYfn7Ub7jE+TUsFcsx/hx0gM+9OOdgqVhA25r/ofVi2TnOslisduoQ/gqHGM/FWrE43MHTdR2LzHoOVopVlhWbbKCUYjEe/Cr27NNAf7dhkmQoy3LqUE4mjg/Ishzr9QqLBe9Xvl5ihVhKaSRJgqoy+6q1j6jrGvt9jCRJnrfQcF/qYS2W1iWOxyNboV7TNC3i+IA0TbHZbBBFEdsMxlIsIkIcH5DnxdShjELTtNjt9giCAD9/3ht/IdN78IsY/WzKVqleUpYlyrKaOoyzYCmWrUXF9+A61mIpFtO2PguuW2tYiUVEKAqF7fZh6lAuxm4XI8sydrUuFoP3pzFVmmZsCp9D0TQN4viI4zHBcrnEarXCbGb+gSFGi1WWFbIsg1Ka3RM7NF1HSNMMaZohDEOsVkujrz8xSiwies5ORaFQ13bUp4ZGaw2t9fOBKIvFArOZZ5RkRohFRFBKI88LaK2nDocNbdsiSVIkSQrf9x8li4yoe00mFhFB6xJFoaxdiL0kVVWhqiocDkeEYYDFIkIYhpNJdlGxiAhlWUEphaJQVu+gnIqn7K+UhuM4iKLoUbLLjsdGF4uIUFU1iqKAUvrqZnVT0pdnChRFAdd1EIaXk2wUsYj65QillMhkCF33W7LfmSxEGIajSDaYWNLN8eFtJgsRRRGiKHxc1fi+aN8SSzITf/pM1ieDIbvLL4tF1G9M62tNhWQmi3ivu1wuFwiC4MvrsyeL1XWEPC+Q57kULq+Al91lX4hdYrVawvNOK1+cJFaW5UiSVLq6K6UvxCZI0xTr9eqkU6o/FatpWuz3e7abzYRhISIkSYqiULi/v/v0DLIP85ouS/z77y+RSnhD0zTYbh8+3cX7bsbSusTDw06WWYQPISLs9zGI6N0rWt5krLquRSrhZOL4AKXebhz4Qywiwm63F6mEL7Hf798cafCHWEmSoq7NP/NAMIuuIxwOxz++9yxW27ZI0+ziQQl2oJT6Y6L3LFaW5dIFCt/AQZqmz1+5wO8qqyB8B63L5yK6CwBVVaNppKoufI+nTYbAo1ha8zn2RzCbJ5ceM5aIJQxDVfUDeBeAlBiEwWjbFl3Xwe3PwZTxlTAcdd3AtfVwVWE62raFK9lKGJq2bfuuUBCGpOs6/AflD0gwsYSFfwAAAABJRU5ErkJggg==) 50% 50% no-repeat;
		}
		.author-card .components-placeholder > * {
			display: none;
		}
		.expertise-links ul li {

		}
		.expertise-links ul li:before {
			position: absolute;
			top: 50%;
			right: 0;
			content: '';
			width: 30px;
			height: 30px;
			margin-top: -15px;
			pointer-events: none;
			background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAK0AAAEsCAYAAACxNDOKAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAylpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDEwLjAtYzAwMCA3OS5kMjBlNDY2MzAsIDIwMjUvMTIvMDktMDI6MTE6MjMgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCAyNy40IChNYWNpbnRvc2gpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjVGRUE1NTgzMTY5RjExRjFBRjMxREVBM0U5M0FENkU0IiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjVGRUE1NTg0MTY5RjExRjFBRjMxREVBM0U5M0FENkU0Ij4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NUZFQTU1ODExNjlGMTFGMUFGMzFERUEzRTkzQUQ2RTQiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NUZFQTU1ODIxNjlGMTFGMUFGMzFERUEzRTkzQUQ2RTQiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz67uFh4AAAFhElEQVR42uzdy43TUABAUc9sWNACxcUdUAIdhA6SluiBFliwGjyjbEADzMdOfO1zJStbKzmxnPh9hmGhfv74fpyOwyAVmrCepuPhcoCrFFhwNXt3c4OdXv4GdPzw8dPZW67VoP0PWHC1LrQvBAuu1oH2lWDB1W3RvhEsuLoN2neCBVfXRTsTWHB1HbQzgwVXy6JdCCy4WgbtwmDB1bxorwQWXM2D9spgwdX70N4ILLh6G9obgwVXr0O7ErDg6mVoVwYWXP0b7UrBgqvn0a4cLLj6HW0ELLh66v5x1mwI7GMnc852jnY6vgXPG1y3B08ATsHzd6uw8x9i4Cr5lxe4Sj5cAFfJx7jgKjlgBlwlhyaCq+QgcHCVnG4DrpITG8FVcgo5uEou1gGukssigavkAnTgKrnUJ7hKLqoMrpLL14Or5EYh4Cq5JRO4aqEFV0m04CqJFlwl0YKrJFpwlUQLrpJowVUSLbhKogVXSbTgKokWXCXRgqskWnCVRAuukmjBVRItuEqiBVdJtOAqiRZcJdGCqyRacJVEC66GZ3ZsXH2XD34cmjtLHjHb4ZV2A1fc8/TFG3HbIVpwlUQLru6qJw4utOCCCy244EILrraEFlxowQUXWnDBhRZcaMEFF1pwwYUWXO0ILbjQggsutOCCCy240IILLrTgggstuNCCCy604IILLbg7hwstuNCCCy604IILLbjQggsutOCCCy240IILLrTgggstuNuGCy240IILLrTgggstuHW40II7QgsuuNCCCy604MbhQgtuDi604ObgQgtuDi604ObgQgtuDi604ObgQgtuDi604ObgQgtuDi604ObgQgtuDi604ObgQgtuDi604ObgQgtuDi604ObgQgtuDi604ObgQgtuDi604ObgQgtuDi604ObgQgtuDi604ObgQgtuDi604ObgQgtuDi604ObgQgtuDi604ObgQgtuDi604ObgQgtuDu69j3h7TR/8eXop7lxzmL5wX1xpXXGLV9zx8sWDFtxtwIUW3BxcaMHNwYUW3BxcaMHNwYUW3BxcaMHNwfVwQbmgdZUt9dXtAbBDcVwCtMDmBtJAC2xu5Be0wOaGKkILbG5sLbTA5gaDQwtsbvYCtMDmpttAC6yJjQLWFHIBCy2wlkUSsBagE7DQAmtRZQFr+XoBCy2wtmQSsDa/E7DQAmtDZwG7VrDQApsDCy2wObDQApsDCy2wObDQApsDCy2wObDQApsDCy2wObDQApsDCy2wObDQApsDCy2wObDQApsDCy2wObDQApsDCy2wObDQApsDCy2wObDQApsDCy2wObDQApsDCy2wObDQAjsW33NogYUWWGChBRZYaIGFFlhgoQUWWGiB3VjQAgstsMBCCyyw0AILLbDAQgsssNACCy2wwEILLLDQAgstsMBCCyyw0AILLbDAQgsssNACCy2wwEILLLDQAqttowUWWmCBhRZYYKEFFlpggYUWWGChBRZaYIGFFlhgoQVWTbTAKoUWWKXQAqsUWmCVQgusUmiBVQotsEqhBVYptMAqhRZYpdACqxRaYJVCC6xSaIFVCi2wSqEFVim0wCqFFlil0AKrFFpglUILrFJogVUKLbBKoQVWKbTAKoUWWKXQAqsUWmCVQgusUmiBVQotsEqhBVYptMAqhRZYpdACqxRaYJVCC6xSaIFVCi2wSqEFVim0wCqFFlil0AKrFFpgVes+et7Auj1IXW2BhTb1QwxYpf7yAlaphwvAKvUYF1ilBswAq9TQRGCVGgQOrFLTbYBVamLjOIE9+1hUmUIOrFKLdQCr1LJIwCq1AB2wSi31CaxSiyoDq9Ty9cAqtVEIsEptyQSs1tkE9/N0PPxxHLwzWjvcE7Aqwj0CqyX6JcAAT60Nq4R4LCQAAAAASUVORK5CYII=) 50% 50% no-repeat;
			background-size: contain;
		}
		.expertise-links ul li textarea,
		.expertise-links ul li > .rich-text {
			display: none !important;
		}
		.expertise-links .block-editor-block-list__block {
			margin-top: 0;
			margin-bottom: 0;
		}
		.expertise-links .ni-row:hover {
			transform: none;
		}
    ";
    add_action('enqueue_block_editor_assets', function() use ($custom_css) {
        wp_add_inline_style('wp-edit-blocks', $custom_css);
    });
}
add_action('admin_init', 'add_inline_editor_styles');

add_action( 'breadcrumb_block_single_prepend', function ( $post, $breadcrumbs_instance ) {

	// Change this condition if you only want it on a CPT e.g. 'insight'
	if ( 'post' !== $post->post_type ) {
		return;
	}

	// Find the Insights page by its slug: /insights/
	$insights_page = get_page_by_path( 'insights' );
	if ( ! $insights_page ) {
		return;
	}

	// Add Insights crumb BEFORE the current post crumb
	$breadcrumbs_instance->add_item(
		get_the_title( $insights_page->ID ),
		get_permalink( $insights_page->ID )
	);

}, 10, 2 );

function adamsons_search_excerpt_length($length) {
	if (is_admin() || !is_search()) {
		return $length;
	}

	if (!in_the_loop() || !is_main_query()) {
		return $length;
	}

	return 8;
}
add_filter('excerpt_length', 'adamsons_search_excerpt_length', 20);

function adamsons_search_excerpt_more($more) {
	if (is_admin() || !is_search()) {
		return $more;
	}

	if (!in_the_loop() || !is_main_query()) {
		return $more;
	}

	return '...';
}
add_filter('excerpt_more', 'adamsons_search_excerpt_more', 20);

function adamsons_author_url_shortcode() {
	if ( ! is_singular() ) {
		return '';
	}

	$author_id = adamsons_get_selected_author_profile_id( get_the_ID() );
	if ( ! $author_id ) {
		return '';
	}

	return esc_url( get_permalink( $author_id ) );
}
add_shortcode( 'author_url', 'adamsons_author_url_shortcode' );

function adamsons_polylang_language_links_shortcode( $atts ) {

	$atts = shortcode_atts( array(
		'class' => '',
	), $atts );

	if ( ! function_exists( 'pll_the_languages' ) ) {
		return '';
	}

	$languages = pll_the_languages( array(
		'raw' => 1,
	) );

	if ( empty( $languages ) || ! is_array( $languages ) ) {
		return '';
	}

	$links = array();

	foreach ( $languages as $lang ) {
		$url   = ! empty( $lang['url'] ) ? $lang['url'] : '';
		$name  = ! empty( $lang['slug'] ) ? strtoupper( $lang['slug'] ) : '';
		$class = ! empty( $lang['current_lang'] ) ? ' class="is-current"' : '';

		if ( $url && $name ) {
			$links[] = '<a href="' . esc_url( $url ) . '"' . $class . '>' . esc_html( $name ) . '</a>';
		}
	}

	$wrapper_class = $atts['class'] ? ' class="' . esc_attr( $atts['class'] ) . '"' : '';

	return '<p' . $wrapper_class . '>' . implode( ' / ', $links ) . '</p>';
}

add_shortcode( 'polylang_lang_links', 'adamsons_polylang_language_links_shortcode' );
