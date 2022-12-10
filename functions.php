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
	register_block_style( 'core/navigation', array(
		'name'         => 'main-navigation',
		'label'        => esc_html__( 'Main Navigation', 'lewis' ),
		'style_handle' => 'lewis-stylesheet',
	) );

	// Register Footer Navigation block style.
	register_block_style( 'core/navigation', array(
		'name'         => 'footer-navigation',
		'label'        => esc_html__( 'Footer Navigation', 'lewis' ),
		'style_handle' => 'lewis-stylesheet',
	) );

	// Register Inherit Colors block style.
	register_block_style( 'core/social-links', array(
		'name'         => 'inherit-colors',
		'label'        => esc_html__( 'Inherit Colors', 'lewis' ),
		'style_handle' => 'lewis-stylesheet',
	) );

	// Register Primary Hover block style.
	register_block_style( 'core/social-links', array(
		'name'         => 'primary-hover',
		'label'        => esc_html__( 'Primary Hover', 'lewis' ),
		'style_handle' => 'lewis-stylesheet',
	) );

	// Register Thin Line block style.
	register_block_style( 'core/separator', array(
		'name'         => 'thin',
		'label'        => esc_html__( 'Thin Line', 'lewis' ),
		'style_handle' => 'lewis-stylesheet',
	) );

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
