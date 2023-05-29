<?php
/**
 * Lewis Demo Content Settings
 *
 * @package Lewis
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Demo Content Settings class
 */
class Lewis_Demo_Content_Settings {

	/**
	 * Setup the Demo Content Settings class
	 */
	public static function setup() {

		// Register settings.
		add_action( 'admin_init', array( __CLASS__, 'register_settings' ) );

		// Run Demo Importer.
		add_action( 'admin_init', array( __CLASS__, 'import_demo_content' ) );
	}

	/**
	 * Get settings
	 *
	 * @return array
	 */
	public static function get_settings() {
		$default_settings = array(
			'lewis_demo_content' => array(
				'pages'      => 1,
				'posts'      => 1,
				'categories' => 1,
			),
		);

		return wp_parse_args( get_option( 'lewis_theme_settings', array() ), $default_settings );
	}

	/**
	 * Register demo content setting.
	 */
	public static function register_settings() {
		add_settings_field(
			'lewis_theme_settings[lewis_demo_content]',
			esc_html__( 'Import Content', 'lewis' ),
			array( __CLASS__, 'render_demo_content_setting' ),
			'lewis_theme_settings',
			'lewis_demo_section',
			array(
				'options' => array(
					'pages'      => esc_html__( 'Static Pages (4)', 'lewis' ),
					'posts'      => esc_html__( 'Blog Posts (5)', 'lewis' ),
					'categories' => esc_html__( 'Categories (3)', 'lewis' ),
				),
			)
		);
	}

	/**
	 * Demo Content Callback
	 *
	 * @param array $args Arguments passed by the setting.
	 */
	public static function render_demo_content_setting( $args ) {
		$options      = self::get_settings();
		$demo_content = $options['lewis_demo_content'];

		$html = '';
		if ( ! empty( $args['options'] ) ) :
			foreach ( $args['options'] as $key => $option ) {
				$checked = isset( $demo_content[ $key ] ) ? checked( 1, $demo_content[ $key ], false ) : '';
				$setting = 'lewis_theme_settings[lewis_demo_content][' . $key . ']';

				$html .= '<input type="hidden" name="' . $setting . '" value="0" />';
				$html .= '<input type="checkbox" name="' . $setting . '" id="' . $setting . '"  value="1" ' . $checked . '/>';
				$html .= '<label for="' . $setting . '">' . $option . '</label><br/>';
			}
		endif;

		$html .= '<br/><input type="submit" class="button" name="lewis_import_demo_content" value="' . esc_attr__( 'Import Content', 'lewis' ) . '"/>';

		// phpcs:ignore
		echo $html;
		wp_nonce_field( 'lewis_demo_content_nonce', 'lewis_demo_content_nonce' );
	}

	/**
	 * Run Demo Content Importer.
	 */
	public static function import_demo_content() {

		// Return early if not on Lewis admin page.
		if ( ! isset( $_POST['lewis_theme_settings'] ) ) {
			return;
		}

		// Listen for our import button to be clicked.
		if ( ! isset( $_POST['lewis_import_demo_content'] ) ) {
			return;
		}

		// Run a quick security check.
		if ( ! check_admin_referer( 'lewis_demo_content_nonce', 'lewis_demo_content_nonce' ) ) {
			return;
		}

		if ( ! empty( $_POST['lewis_theme_settings']['lewis_demo_content']['pages'] ) ) {
			// Import pages.
		}

		if ( ! empty( $_POST['lewis_theme_settings']['lewis_demo_content']['posts'] ) ) {
			// Import posts.
		}

		if ( ! empty( $_POST['lewis_theme_settings']['lewis_demo_content']['categories'] ) ) {
			// Import categories.
		}

		wp_safe_redirect( admin_url( 'themes.php?page=lewis-theme' ) );
	}
}

// Run class.
Lewis_Demo_Content_Settings::setup();
