<?php
/**
 * Lewis functions and definitions
 *
 * @package Lewis
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function lewis_setup() {

	// Make theme available for translation.
	load_theme_textdomain( 'lewis', get_template_directory() . '/languages' );

	// Enqueue editor styles.
	add_editor_style( 'style.css' );

	// Remove Core block patterns.
	remove_theme_support( 'core-block-patterns' );
}
add_action( 'after_setup_theme', 'lewis_setup' );


/**
 * Enqueue scripts and styles.
 */
function lewis_scripts() {

	// Register and Enqueue Stylesheet.
	wp_enqueue_style( 'lewis-stylesheet', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'lewis_scripts' );


/**
 * Enqueue block styles and scripts for Gutenberg Editor.
 */
function lewis_block_scripts() {

	// Enqueue Editor Styling.
	wp_enqueue_style( 'lewis-editor-styles', get_theme_file_uri( '/assets/css/editor-styles.css' ), array(), wp_get_theme()->get( 'Version' ), 'all' );

}
add_action( 'enqueue_block_editor_assets', 'lewis_block_scripts' );


/**
 * Change excerpt length for default posts
 *
 * @param int $length Length of excerpt in number of words.
 * @return int
 */
function lewis_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	}

	return apply_filters( 'lewis_excerpt_length', 42 );
}
add_filter( 'excerpt_length', 'lewis_excerpt_length' );


/**
 * Registers block pattern categories.
 *
 * @return void
 */
function lewis_register_block_pattern_categories() {
	$block_pattern_categories = array(
		'lewis_hero'         => array( 'label' => __( 'Lewis: Hero', 'lewis' ) ),
		'lewis_cta'          => array( 'label' => __( 'Lewis: Call to Action', 'lewis' ) ),
		'lewis_features'     => array( 'label' => __( 'Lewis: Features', 'lewis' ) ),
		'lewis_media_text'   => array( 'label' => __( 'Lewis: Media Text', 'lewis' ) ),
		'lewis_portfolio'    => array( 'label' => __( 'Lewis: Portfolio', 'lewis' ) ),
		'lewis_services'     => array( 'label' => __( 'Lewis: Services', 'lewis' ) ),
		'lewis_testimonials' => array( 'label' => __( 'Lewis: Testimonials', 'lewis' ) ),
		'lewis_team'         => array( 'label' => __( 'Lewis: Team', 'lewis' ) ),
		'lewis_blog'         => array( 'label' => __( 'Lewis: Blog Posts', 'lewis' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 */
	$block_pattern_categories = apply_filters( 'lewis_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}
}
add_action( 'init', 'lewis_register_block_pattern_categories', 9 );


/**
 * Registers block styles.
 *
 * @return void
 */
function lewis_register_block_styles() {

	// Register Main Navigation block style.
	register_block_style(
		'core/navigation',
		array(
			'name'         => 'main-navigation',
			'label'        => esc_html__( 'Main Navigation', 'lewis' ),
			'style_handle' => 'lewis-stylesheet',
		)
	);

	// Register Footer Navigation block style.
	register_block_style(
		'core/navigation',
		array(
			'name'         => 'footer-navigation',
			'label'        => esc_html__( 'Footer Navigation', 'lewis' ),
			'style_handle' => 'lewis-stylesheet',
		)
	);

	// Register Inherit Colors block style.
	register_block_style(
		'core/social-links',
		array(
			'name'         => 'inherit-colors',
			'label'        => esc_html__( 'Inherit Colors', 'lewis' ),
			'style_handle' => 'lewis-stylesheet',
		)
	);

	// Register Primary Hover block style.
	register_block_style(
		'core/social-links',
		array(
			'name'         => 'primary-hover',
			'label'        => esc_html__( 'Primary Hover', 'lewis' ),
			'style_handle' => 'lewis-stylesheet',
		)
	);

	// Register Thin Line block style.
	register_block_style(
		'core/separator',
		array(
			'name'         => 'thin',
			'label'        => esc_html__( 'Thin Line', 'lewis' ),
			'style_handle' => 'lewis-stylesheet',
		)
	);

	// Register Underlined Heading block style.
	$underlined_heading_style = array(
		'name'         => 'underlined-heading',
		'label'        => esc_html__( 'Underlined', 'lewis' ),
		'style_handle' => 'lewis-stylesheet',
	);

	register_block_style( 'core/heading', $underlined_heading_style );
	register_block_style( 'core/post-title', $underlined_heading_style );
	register_block_style( 'core/query-title', $underlined_heading_style );
}
add_action( 'init', 'lewis_register_block_styles', 9 );


/**
 * Set up the Plugin Updater Constants.
 */
define( 'LEWIS_THEME_VERSION', '1.1' );
define( 'LEWIS_THEME_NAME', 'Lewis' );
define( 'LEWIS_THEME_ID', 256624 );
define( 'LEWIS_THEME_STORE_URL', 'https://themezee.com' );


/**
 * Include Theme Settings and Theme Updater.
 */
require_once get_parent_theme_file_path( '/includes/class-lewis-admin-page.php' );
require_once get_parent_theme_file_path( '/includes/class-lewis-demo-content-settings.php' );
require_once get_parent_theme_file_path( '/includes/class-lewis-license-settings.php' );
require_once get_parent_theme_file_path( '/includes/class-lewis-theme-updater.php' );


/**
 * Initialize the updater. Hooked into `init` to work with the
 * wp_version_check cron job, which allows auto-updates.
 */
function lewis_run_theme_updater() {

	// To support auto-updates, this needs to run during the wp_version_check cron job for privileged users.
	$doing_cron = defined( 'DOING_CRON' ) && DOING_CRON;
	if ( ! current_user_can( 'manage_options' ) && ! $doing_cron ) {
		return;
	}

	// Retrieve our license key from the DB.
	$options     = get_option( 'lewis_theme_settings', array() );
	$license_key = ! empty( $options['lewis_license_key'] ) ? trim( $options['lewis_license_key'] ) : false;

	// Setup the updater.
	new Lewis_Theme_Updater(
		array(
			'remote_api_url' => LEWIS_THEME_STORE_URL,
			'item_name'      => LEWIS_THEME_NAME,
			'theme_slug'     => get_template(),
			'version'        => LEWIS_THEME_VERSION,
			'author'         => 'ThemeZee',
			'item_id'        => LEWIS_THEME_ID,
		),
		array(
			/* translators: %1$s: Theme name. %2$s: Version number. %3$s: View Changelog link. %4$s: Changelog name. %5$s: Update link. */
			'update-available' => esc_html__( 'Version %2$s of %1$s is available. <a href="%3$s">View changelog of %4$s</a> or <a href="%5$s" %6$s>update now</a>.', 'lewis' ),
			'update-notice'    => esc_html__( 'Updating this theme will override all theme files. Click "Cancel" to stop, "OK" to update.', 'lewis' ),
		)
	);
}
add_action( 'init', 'lewis_run_theme_updater' );
