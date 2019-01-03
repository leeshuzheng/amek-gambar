<?php
/**
* Twenty Nineteen functions and definitions
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package WordPress
* @subpackage Twenty_Nineteen
* @since 1.0.0
*/

/**
* Twenty Nineteen only works in WordPress 4.7 or later.
*/
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

if ( ! function_exists( 'twentynineteen_setup' ) ) :
	/**
	* Sets up theme defaults and registers support for various WordPress features.
	*
	* Note that this function is hooked into the after_setup_theme hook, which
	* runs before the init hook. The init hook is too late for some features, such
	* as indicating support for post thumbnails.
	*/
	function twentynineteen_setup() {
		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Twenty Nineteen, use a find and replace
		* to change 'twentynineteen' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( 'twentynineteen', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
		add_theme_support( 'title-tag' );

		/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'twentynineteen' ),
				'footer' => __( 'Footer Menu', 'twentynineteen' ),
				'social' => __( 'Social Links Menu', 'twentynineteen' ),
			)
		);

		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/**
		* Add support for core custom logo.
		*
		* @link https://codex.wordpress.org/Theme_Logo
		*/
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 190,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'twentynineteen' ),
					'shortName' => __( 'S', 'twentynineteen' ),
					'size'      => 19.5,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'twentynineteen' ),
					'shortName' => __( 'M', 'twentynineteen' ),
					'size'      => 22,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'twentynineteen' ),
					'shortName' => __( 'L', 'twentynineteen' ),
					'size'      => 36.5,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'twentynineteen' ),
					'shortName' => __( 'XL', 'twentynineteen' ),
					'size'      => 49.5,
					'slug'      => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Primary', 'twentynineteen' ),
					'slug'  => 'primary',
					'color' => twentynineteen_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 33 ),
				),
				array(
					'name'  => __( 'Secondary', 'twentynineteen' ),
					'slug'  => 'secondary',
					'color' => twentynineteen_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 23 ),
				),
				array(
					'name'  => __( 'Dark Gray', 'twentynineteen' ),
					'slug'  => 'dark-gray',
					'color' => '#111',
				),
				array(
					'name'  => __( 'Light Gray', 'twentynineteen' ),
					'slug'  => 'light-gray',
					'color' => '#767676',
				),
				array(
					'name'  => __( 'White', 'twentynineteen' ),
					'slug'  => 'white',
					'color' => '#FFF',
				),
			)
		);

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'twentynineteen_setup' );

/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*/
function twentynineteen_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Footer', 'twentynineteen' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'twentynineteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'twentynineteen_widgets_init' );

/**
* Set the content width in pixels, based on the theme's design and stylesheet.
*
* Priority 0 to make it available to lower priority callbacks.
*
* @global int $content_width Content width.
*/
function twentynineteen_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'twentynineteen_content_width', 640 );
}
add_action( 'after_setup_theme', 'twentynineteen_content_width', 0 );

/**
* Enqueue scripts and styles.
*/
function twentynineteen_scripts() {
	// wp_enqueue_style( 'twentynineteen-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	wp_style_add_data( 'twentynineteen-style', 'rtl', 'replace' );

	wp_enqueue_script( 'twentynineteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( has_nav_menu( 'menu-1' ) ) {
		wp_enqueue_script( 'twentynineteen-priority-menu', get_theme_file_uri( '/js/priority-menu.js' ), array(), '1.0', true );
		wp_enqueue_script( 'twentynineteen-touch-navigation', get_theme_file_uri( '/js/touch-keyboard-navigation.js' ), array(), '1.0', true );
	}

	wp_enqueue_style( 'panel-style', get_template_directory_uri() . '/styles/main.css', array(), wp_get_theme()->get( 'Version' ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_localize_script('panel-js', 'amekgambar', array(
		'homeurl' => home_url(),
		'ajaxurl' => admin_url('admin-ajax.php'),
		'imgurl' => get_template_directory_uri() . '/img'
	));

	wp_enqueue_script( 'panel-js', get_theme_file_uri( '/scripts/main.js' ), array(), true );

}
add_action( 'wp_enqueue_scripts', 'twentynineteen_scripts' );

// function twentyseventeen_scripts() {
// 	// Add custom fonts, used in the main stylesheet.
// 	wp_enqueue_style( 'twentyseventeen-fonts', twentyseventeen_fonts_url(), array(), null );
//
// 	// Theme stylesheet.
// 	wp_enqueue_style( 'twentyseventeen-style', get_stylesheet_uri() );
//
// 	// Load the dark colorscheme.
// 	if ( 'dark' === get_theme_mod( 'colorscheme', 'light' ) || is_customize_preview() ) {
// 		wp_enqueue_style( 'twentyseventeen-colors-dark', get_theme_file_uri( '/assets/css/colors-dark.css' ), array( 'twentyseventeen-style' ), '1.0' );
// 	}
//
// 	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
// 	if ( is_customize_preview() ) {
// 		wp_enqueue_style( 'twentyseventeen-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'twentyseventeen-style' ), '1.0' );
// 		wp_style_add_data( 'twentyseventeen-ie9', 'conditional', 'IE 9' );
// 	}
//
// 	// Load the Internet Explorer 8 specific stylesheet.
// 	wp_enqueue_style( 'twentyseventeen-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'twentyseventeen-style' ), '1.0' );
// 	wp_style_add_data( 'twentyseventeen-ie8', 'conditional', 'lt IE 9' );
//
// 	// Load the html5 shiv.
// 	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
// 	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );
//
// 	wp_enqueue_script( 'twentyseventeen-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );
//
// 	$twentyseventeen_l10n = array(
// 		'quote'          => twentyseventeen_get_svg( array( 'icon' => 'quote-right' ) ),
// 	);
//
// 	if ( has_nav_menu( 'top' ) ) {
// 		wp_enqueue_script( 'twentyseventeen-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
// 		$twentyseventeen_l10n['expand']         = __( 'Expand child menu', 'twentyseventeen' );
// 		$twentyseventeen_l10n['collapse']       = __( 'Collapse child menu', 'twentyseventeen' );
// 		$twentyseventeen_l10n['icon']           = twentyseventeen_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) );
// 	}
//
// 	wp_enqueue_script( 'twentyseventeen-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );
//
// 	// wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );
//
// 	wp_localize_script( 'twentyseventeen-skip-link-focus-fix', 'twentyseventeenScreenReaderText', $twentyseventeen_l10n );
//
// 	// wp_enqueue_script( 'html2canvas', 'http://yourjavascript.com/7849110281/html2canvas.js', array(), true );
//
// 	wp_enqueue_script( 'panel-js', get_theme_file_uri( '/assets/js/main.js' ), array(), true );
//
// 	wp_localize_script('panel-js', 'evaair2018', array(
// 		'homeurl' => home_url(),
// 		'ajaxurl' => admin_url('admin-ajax.php'),
// 		'imgurl' => get_template_directory_uri() . '/img'
// 	));
//
// 	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
// 		wp_enqueue_script( 'comment-reply' );
// 	}
// }


/**
* Enqueue supplemental block editor styles.
*/
function twentynineteen_editor_customizer_styles() {

	// wp_enqueue_style( 'twentynineteen-editor-customizer-styles', get_theme_file_uri( '/style-editor-customizer.css' ), false, '1.0', 'all' );

	if ( 'custom' === get_theme_mod( 'primary_color' ) ) {
		// Include color patterns.
		require_once get_parent_theme_file_path( '/inc/color-patterns.php' );
		wp_add_inline_style( 'twentynineteen-editor-customizer-styles', twentynineteen_custom_colors_css() );
	}
}
add_action( 'enqueue_block_editor_assets', 'twentynineteen_editor_customizer_styles' );

/**
* Display custom color CSS in customizer and on frontend.
*/
function twentynineteen_colors_css_wrap() {

	// Only include custom colors in customizer or frontend.
	if ( ( ! is_customize_preview() && 'default' === get_theme_mod( 'primary_color', 'default' ) ) || is_admin() ) {
		return;
	}

	require_once get_parent_theme_file_path( '/inc/color-patterns.php' );

	if ( 'default' === get_theme_mod( 'primary_color', 'default' ) ) {
		$primary_color = 199;
	} else {
		$primary_color = absint( get_theme_mod( 'primary_color_hue', 199 ) );
	}
	?>

	<style type="text/css" id="custom-theme-colors" <?php echo is_customize_preview() ? 'data-hue="' . $primary_color . '"' : ''; ?>>
	<?php echo twentynineteen_custom_colors_css(); ?>
	</style>
	<?php
}
add_action( 'wp_head', 'twentynineteen_colors_css_wrap' );

/**
* SVG Icons class.
*/
require get_template_directory() . '/classes/class-twentynineteen-svg-icons.php';

/**
* Custom Comment Walker template.
*/
require get_template_directory() . '/classes/class-twentynineteen-walker-comment.php';

/**
* Enhance the theme by hooking into WordPress.
*/
require get_template_directory() . '/inc/template-functions.php';

/**
* SVG Icons related functions.
*/
require get_template_directory() . '/inc/icon-functions.php';

/**
* Custom template tags for the theme.
*/
require get_template_directory() . '/inc/template-tags.php';

/**
* Customizer additions.
*/
require get_template_directory() . '/inc/customizer.php';

add_action('add_meta_boxes', 'show_user_image');

function show_user_image() {
	add_meta_box('show_user_image', 'Show User Image', 'display_user_image', 'user_submissions');
}

function display_user_image() {
	global $post;
	$imageInfo = get_post_meta($post->ID, 'image_src');
	$imageHolder = '<img style="width: 400px" src="' . $imageInfo[0] . '" />';
	echo $imageHolder;
}

add_action( 'wp_ajax_nopriv_update_user_submissions', 'update_user_submissions' );
add_action( 'wp_ajax_update_user_submissions', 'update_user_submissions' );

function update_user_submissions() {
	$title = isset($_POST['panel']) ? sanitize_text_field($_POST['panel']) : "";
	$email = isset($_POST['email']) ? sanitize_text_field($_POST['email']) : "";
	$image = isset($_POST['image']) ? sanitize_text_field($_POST['image']) : "";

	date_default_timezone_set('Asia/Singapore');
	$time = date('Ymd H:i:s');

	$post_title = $time . '-' . $panel . '-' . $email;

	if ( ! is_admin() ) {
		require_once( ABSPATH . 'wp-admin/includes/post.php' );
	}

	$currentPost = get_post_by_title($post_title, OBJECT);

	if ( !$currentPost ) {

		$newVisitorCount = array(
			'post_title' => $post_title,
			'post_status' => 'publish',
			'post_type' => 'user_submissions',
		);

		$newPost = wp_insert_post($newVisitorCount);

		update_field('field_5c2c2a0cca65c', $email, $newPost);

		if ( ! add_post_meta( $newPost, 'image_src', $image, true ) ) {  // if no post meta exists
			update_post_meta( $newPost, 'image_src', $image ); // create new post meta for meta key named 'image_src'
		}

		// send email
		send_email($email);

		echo wp_json_encode(array('success' => 1, 'id'=>$newPost));
	}

	exit;
}

add_action( 'wp_ajax_nopriv_update_count', 'update_count' );
add_action( 'wp_ajax_update_count', 'update_count' );

function update_count() {
	$panel = isset($_POST['panel']) ? sanitize_text_field($_POST['panel']) : "";
	$label = isset($_POST['label']) ? sanitize_text_field($_POST['label']) : "";
	$frame = isset($_POST['frame']) ? sanitize_text_field($_POST['frame']) : "";
	$addOption = isset($_POST['add_option']) ? sanitize_text_field($_POST['add_option']) : "";
	date_default_timezone_set('Asia/Singapore');
	$time = date('Ymd H:i:s');

	$post_title = date('Ymd') . '-Panel- ' . $panel;
	if ( ! is_admin() ) {
		require_once( ABSPATH . 'wp-admin/includes/post.php' );
	}

	$newVisitorCountRow = array(
		'field_5b37d7fe12a40' => $label,
		'field_5b37da63a6019' => $time,
		'field_5b37d80312a41' => $frame,
		'field_5b37d80612a42' => $addOption
	);

	$currentPost = get_post_by_title($post_title, OBJECT);

	if ( !$currentPost ) {
		$newVisitorCount = array(
			'post_title' => $post_title,
			'post_status' => 'publish',
			'post_type' => 'visitor_count',
		);
		$newPost = wp_insert_post($newVisitorCount);
		add_row('field_5b37d74c12a3e', $newVisitorCountRow, $newPost);
		echo wp_json_encode(array('success' => 1, 'id'=>$newPost));
	}
	else {
		add_row('field_5b37d74c12a3e', $newVisitorCountRow, $currentPost->ID);
		echo wp_json_encode(array('success' => 1, 'id'=>$currentPost->ID));
	}
	exit;
}



function get_post_by_title($page_title, $output = OBJECT) {
	global $wpdb;
	$post = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_title = %s AND post_type='user_submissions' AND post_status = 'publish'", $page_title ));
	if ( $post )
	return get_post($post, $output);

	return null;
}

function email($to, $sub, $msg, $header)
{

	ob_start();
	echo $msg;
	$message = ob_get_contents();
	ob_end_clean();

	$mailSuccess = wp_mail($to, $sub, $message, $header);

	return $mailSuccess;
}

add_action( 'wp_ajax_nopriv_send_email', 'send_email' );
add_action( 'wp_ajax_send_email', 'send_email' );

function send_email($email) {

	$headers = array('Content-Type: text/html; charset=UTF-8');

	$break = '<br><br>';

	$subject = "The Peranakan Museum: Your image";

	$msg = '<span>Greetings from The Peranakan Museum,</span>';
	$msg .= $break;
	$msg .= '<span>You are a step closer to winning your dream vacation!</span>';
	$msg .= $break;
	$msg .= '<span>Stay tuned and good Luck!</span>';
	$msg .= '<br><br><br>';

	return email($email, $subject, $msg, $headers); // can add $attachment as last param
}

register_post_type('visitor_count', // Register Custom Post Type
array(
	'labels' => array(
		'name' => __('Visitor Counts', 'amek-gambar'), // Rename these to suit
		'singular_name' => __('Visitor Count', 'amek-gambar'),
		'add_new' => __('Add New', 'amek-gambar'),
		'add_new_item' => __('Add New Visitor Count', 'amek-gambar'),
		'edit' => __('Edit', 'amek-gambar'),
		'edit_item' => __('Edit Visitor Count', 'amek-gambar'),
		'new_item' => __('New Visitor Count', 'amek-gambar'),
		'view' => __('View Visitor Count', 'amek-gambar'),
		'view_item' => __('View Visitor Count', 'amek-gambar'),
		'search_items' => __('Search Visitor Count', 'amek-gambar'),
		'not_found' => __('No Visitor Count found', 'amek-gambar'),
		'not_found_in_trash' => __('No Visitor Counts found in Trash', 'amek-gambar')
	),
	'public' => true,
	'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
	'has_archive' => false,
	'supports' => array(
		'title',
		'thumbnail'
	),
	'can_export' => true, // Allows export in Tools > Export
	'menu_icon' => 'dashicons-tablet',
));

register_post_type('user_submissions', // Register Custom Post Type
array(
	'labels' => array(
		'name' => __('User Submissions', 'amek-gambar'), // Rename these to suit
		'singular_name' => __('User Submissions', 'amek-gambar'),
		'add_new' => __('Add New', 'amek-gambar'),
		'add_new_item' => __('Add New User Submission', 'amek-gambar'),
		'edit' => __('Edit', 'amek-gambar'),
		'edit_item' => __('Edit User Submissions', 'amek-gambar'),
		'new_item' => __('New User Submission', 'amek-gambar'),
		'view' => __('View User Submissions', 'amek-gambar'),
		'view_item' => __('View User Submissions', 'amek-gambar'),
		'search_items' => __('Search User Submissions', 'amek-gambar'),
		'not_found' => __('No User Submissions found', 'amek-gambar'),
		'not_found_in_trash' => __('No User Submissions found in Trash', 'amek-gambar')
	),
	'public' => true,
	'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
	'has_archive' => false,
	'supports' => array(
		'title',
		'thumbnail'
	),
	'can_export' => true, // Allows export in Tools > Export
	'menu_icon' => 'dashicons-tablet',
));
