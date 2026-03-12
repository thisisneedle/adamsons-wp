<?php

function adamsons_setup() {
	add_theme_support( 'editor-styles' );
	add_editor_style( 'style.css' );
	remove_theme_support( 'core-block-patterns' );
}
add_action( 'after_setup_theme', 'adamsons_setup' );

function adamsons_enqueue_styles() {
	wp_enqueue_style( 'adamsons-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'adamsons-open-sans', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap', array(), null );
	wp_enqueue_style( 'adamsons-neulis-neue', 'https://use.typekit.net/rlg1vvi.css', array(), null );
}
add_action( 'wp_enqueue_scripts', 'adamsons_enqueue_styles' );

function adamsons_enqueue_scripts() {
	wp_enqueue_style( 'adamsons-open-sans', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap', array(), null );
	wp_enqueue_style( 'adamsons-neulis-neue', 'https://use.typekit.net/rlg1vvi.css', array(), null );
	wp_enqueue_script( 'adamsons-main', get_template_directory_uri() . '/assets/js/main.min.js', array(), wp_get_theme()->get( 'Version' ), true );
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

function adamsons_author_image_shortcode($atts) {
	if (!is_singular()) {
		return '';
	}

	$post_id = get_the_ID();
	if (!$post_id) {
		return '';
	}

	$author_id = (int) get_post_field('post_author', $post_id);
	if (!$author_id) {
		return '';
	}

	$image_id = (int) get_user_meta($author_id, 'adamsons_author_image_id', true);
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
	$alt_text = get_the_author_meta('display_name', $author_id);

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
	remove_menu_page( 'edit.php?post_type=acf-field-group' ); // advanced custom fields
}
add_action('admin_menu', 'remove_comments_admin_menu');

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
			background: url(data:image/png;base64,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) 50% 50% no-repeat;
		}
		.author-card .components-placeholder > * {
			display: none;
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

/**
 * Add Job Title + Company fields to user profile
 */
add_action('show_user_profile', 'ni_extra_user_fields');
add_action('edit_user_profile', 'ni_extra_user_fields');

function ni_extra_user_fields($user) {
	?>
	<h3>Professional Details</h3>
	<table class="form-table">
		<tr>
			<th><label for="job_title">Job Title</label></th>
			<td>
				<input type="text" name="job_title" id="job_title"
					value="<?php echo esc_attr(get_user_meta($user->ID, 'job_title', true)); ?>"
					class="regular-text" />
			</td>
		</tr>
		<tr>
			<th><label for="company_name">Company</label></th>
			<td>
				<input type="text" name="company_name" id="company_name"
					value="<?php echo esc_attr(get_user_meta($user->ID, 'company_name', true)); ?>"
					class="regular-text" />
			</td>
		</tr>
	</table>
	<?php
}

add_action('personal_options_update', 'ni_save_extra_user_fields');
add_action('edit_user_profile_update', 'ni_save_extra_user_fields');

function ni_save_extra_user_fields($user_id) {
	update_user_meta($user_id, 'job_title', sanitize_text_field($_POST['job_title'] ?? ''));
	update_user_meta($user_id, 'company_name', sanitize_text_field($_POST['company_name'] ?? ''));
}

/**
 * Author image upload field
 */
add_action('show_user_profile', 'adamsons_author_image_field');
add_action('edit_user_profile', 'adamsons_author_image_field');

function adamsons_author_image_field($user) {
	$image_id = (int) get_user_meta($user->ID, 'adamsons_author_image_id', true);
	$preview  = $image_id
		? wp_get_attachment_image($image_id, array(96, 96), false, array(
			'id'    => 'adamsons-author-image-preview',
			'style' => 'display:block;margin:0;border-radius:999px;',
		))
		: '<img id="adamsons-author-image-preview" src="" alt="" style="display:none;margin-bottom:8px;border-radius:999px;" />';
	?>
	<h3>Author Image</h3>
	<table class="form-table">
		<tr>
			<th><label for="adamsons_author_image_id">Profile Image</label></th>
			<td>
				<?php echo wp_kses_post($preview); ?>
				<input type="hidden" name="adamsons_author_image_id" id="adamsons_author_image_id" value="<?php echo esc_attr($image_id); ?>" />
				<button type="button" class="button" id="adamsons-author-image-upload" style="display:block;margin:8px 0 8px">Upload image</button>
				<button type="button" class="button" id="adamsons-author-image-remove" style="display:block;margin:0 0 8px">Remove image</button>
			</td>
		</tr>
	</table>
	<?php
}

add_action('personal_options_update', 'adamsons_save_author_image');
add_action('edit_user_profile_update', 'adamsons_save_author_image');

function adamsons_save_author_image($user_id) {
	if (!current_user_can('edit_user', $user_id)) {
		return;
	}

	$image_id = isset($_POST['adamsons_author_image_id'])
		? (int) $_POST['adamsons_author_image_id']
		: 0;

	if ($image_id) {
		update_user_meta($user_id, 'adamsons_author_image_id', $image_id);
	} else {
		delete_user_meta($user_id, 'adamsons_author_image_id');
	}
}

add_action('admin_enqueue_scripts', 'adamsons_author_image_admin_scripts');

function adamsons_author_image_admin_scripts($hook) {
	if ($hook !== 'profile.php' && $hook !== 'user-edit.php') {
		return;
	}

	wp_enqueue_media();
	wp_enqueue_script('jquery');

	$script = <<<JS
(function() {
  var frame;
  function init() {
    var uploadBtn = document.getElementById('adamsons-author-image-upload');
    if (!uploadBtn) return;
    var removeBtn = document.getElementById('adamsons-author-image-remove');
    var input = document.getElementById('adamsons_author_image_id');
    var preview = document.getElementById('adamsons-author-image-preview');

    uploadBtn.addEventListener('click', function(e) {
      e.preventDefault();
      if (frame) {
        frame.open();
        return;
      }
      frame = wp.media({
        title: 'Select or upload author image',
        button: { text: 'Use this image' },
        multiple: false
      });
      frame.on('select', function() {
        var attachment = frame.state().get('selection').first().toJSON();
        if (!attachment || !attachment.id) return;
        input.value = attachment.id;
        var url = (attachment.sizes && attachment.sizes.thumbnail) ? attachment.sizes.thumbnail.url : attachment.url;
        preview.src = url;
        preview.style.display = 'block';
      });
      frame.open();
    });

    if (removeBtn) {
      removeBtn.addEventListener('click', function(e) {
        e.preventDefault();
        input.value = '';
        preview.src = '';
        preview.style.display = 'none';
      });
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
JS;

	wp_add_inline_script('jquery', $script);
}

add_filter('get_avatar', 'adamsons_override_avatar_with_author_image', 10, 6);

function adamsons_override_avatar_with_author_image($avatar, $id_or_email, $size, $default, $alt, $args) {
	$user = false;

	if (is_numeric($id_or_email)) {
		$user = get_user_by('id', (int) $id_or_email);
	} elseif ($id_or_email instanceof WP_User) {
		$user = $id_or_email;
	} elseif ($id_or_email instanceof WP_Post) {
		$user = get_user_by('id', (int) $id_or_email->post_author);
	} elseif (is_object($id_or_email) && isset($id_or_email->user_id)) {
		$user = get_user_by('id', (int) $id_or_email->user_id);
	} elseif (is_string($id_or_email) && is_email($id_or_email)) {
		$user = get_user_by('email', $id_or_email);
	}

	if (!$user) {
		return $avatar;
	}

	$image_id = (int) get_user_meta($user->ID, 'adamsons_author_image_id', true);
	if (!$image_id) {
		return $avatar;
	}

	$classes = array('avatar', 'avatar-' . (int) $size, 'photo');
	if (!empty($args['class'])) {
		$extra = is_array($args['class']) ? $args['class'] : array($args['class']);
		$classes = array_merge($classes, $extra);
	}

	$class_attr = implode(' ', array_map('sanitize_html_class', $classes));
	$alt_text   = $alt ? $alt : $user->display_name;

	$img = wp_get_attachment_image(
		$image_id,
		array($size, $size),
		false,
		array(
			'class' => $class_attr,
			'alt'   => $alt_text,
		)
	);

	return $img ? $img : $avatar;
}

add_filter('render_block', function($block_content, $block) {

	if ($block['blockName'] !== 'core/post-author-name') {
		return $block_content;
	}

	if (!is_singular()) {
		return $block_content;
	}

	$author_id = get_post_field('post_author', get_the_ID());
	if (!$author_id) {
		return $block_content;
	}

	$job_title = get_user_meta($author_id, 'job_title', true);
	$company   = get_user_meta($author_id, 'company_name', true);

	if (!$job_title && !$company) {
		return $block_content;
	}

	$extra = '';

	if ($job_title && $company) {
		$extra = ', ' . esc_html($job_title) . ' ' . esc_html($company);
	} elseif ($job_title) {
		$extra = ', ' . esc_html($job_title);
	} elseif ($company) {
		$extra = ', ' . esc_html($company);
	}

	$block_content = preg_replace(
		'/(<a[^>]*>)(.*?)(<\/a>)/',
		'$1$2' . $extra . '$3',
		$block_content
	);

	return $block_content;

}, 10, 2);

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

add_shortcode('author_url', function () {
    return esc_url(
        get_author_posts_url(
            get_post_field('post_author', get_the_ID())
        )
    );
});

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