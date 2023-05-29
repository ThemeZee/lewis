<?php
/**
 * Lewis Admin Page
 *
 * @package Lewis
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Admin Page class
 */
class Lewis_Admin_Page {

	/**
	 * Setup the Lewis Admin Page class
	 *
	 * @return void
	 */
	public static function setup() {

		// Add settings page.
		add_action( 'admin_menu', array( __CLASS__, 'add_settings_page' ), 9 );

		// Register settings.
		add_action( 'admin_init', array( __CLASS__, 'register_settings' ), 9 );
	}

	/**
	 * Add Settings Page to Admin menu
	 */
	public static function add_settings_page() {
		add_theme_page(
			esc_html__( 'Theme Setup', 'lewis' ),
			esc_html__( 'Theme Setup', 'lewis' ),
			'manage_options',
			'lewis-theme',
			array( __CLASS__, 'render_settings_page' )
		);
	}

	/**
	 * Display settings page
	 */
	public static function render_settings_page() {
		ob_start();
		?>

		<div class="wrap">

			<h1><?php esc_html_e( 'Lewis', 'lewis' ); ?> <?php echo esc_html( wp_get_theme()->get( 'Version' ) ); ?></h1>

			<form method="post" action="options.php">
				<?php
					do_settings_sections( 'lewis_theme_settings' );
					settings_fields( 'lewis_theme_settings' );
					submit_button();
				?>
			</form>

		</div>

		<?php
		// phpcs:ignore
		echo ob_get_clean();
	}

	/**
	 * Register all settings sections and fields
	 */
	public static function register_settings() {

		// Make sure that options exist in database.
		if ( false === get_option( 'lewis_theme_settings' ) ) {
			add_option( 'lewis_theme_settings' );
		}

		// Add Demo Section.
		add_settings_section(
			'lewis_demo_section',
			esc_html__( 'Demo Content', 'lewis' ),
			array( __CLASS__, 'demo_section_intro' ),
			'lewis_theme_settings'
		);

		// Add License Section.
		add_settings_section(
			'lewis_license_section',
			esc_html__( 'License Settings', 'lewis' ),
			array( __CLASS__, 'license_section_intro' ),
			'lewis_theme_settings'
		);

		// Creates our settings in the options table.
		register_setting(
			'lewis_theme_settings',
			'lewis_theme_settings',
			array( __CLASS__, 'sanitize_settings' )
		);
	}

	/**
	 * Demo Section Intro
	 */
	public static function demo_section_intro() {
		esc_html_e( 'Import the demo content into your website to get started quickly.', 'lewis' );
	}

	/**
	 * License Section Intro
	 */
	public static function license_section_intro() {
		esc_html_e( 'An active license key is needed to install updates and receive support.', 'lewis' );
	}

	/**
	 * Sanitize the Plugin Settings
	 *
	 * @param array $input User Input.
	 * @return array
	 */
	public static function sanitize_settings( $input = array() ) {
		// phpcs:ignore
		if ( empty( $_POST['_wp_http_referer'] ) ) {
			return $input;
		}

		$saved = get_option( 'lewis_theme_settings', array() );
		if ( ! is_array( $saved ) ) {
			$saved = array();
		}

		$input = $input ? $input : array();

		// Loop through each setting being saved and pass it through a sanitization filter.
		foreach ( $input as $key => $value ) :
			if ( is_array( $value ) ) :
				foreach ( $value as $checkbox => $bool ) :
					$input[ $key ][ $checkbox ] = ! empty( $bool );
				endforeach;
			else :
				$input[ $key ] = sanitize_text_field( $value );
			endif;
		endforeach;

		return array_merge( $saved, $input );
	}
}

// Run Class.
Lewis_Admin_Page::setup();
