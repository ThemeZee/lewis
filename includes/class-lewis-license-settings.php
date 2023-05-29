<?php
/**
 * Lewis License Settings
 *
 * @package Lewis
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * License Settings class
 */
class Lewis_License_Settings {

	/**
	 * Setup the Lewis Licene Settings class
	 */
	public static function setup() {

		// Register settings.
		add_action( 'admin_init', array( __CLASS__, 'register_settings' ) );

		// Add License API functions.
		add_action( 'admin_init', array( __CLASS__, 'activate_license' ) );
		add_action( 'admin_init', array( __CLASS__, 'deactivate_license' ) );

		// Add Admin notices.
		add_action( 'admin_notices', array( __CLASS__, 'license_activated_notice' ) );
		add_action( 'admin_notices', array( __CLASS__, 'theme_page_notice' ) );

		// Disable updates from WordPress.org.
		add_filter( 'http_request_args', array( __CLASS__, 'disable_wporg_request' ), 5, 2 );
	}

	/**
	 * Get settings
	 *
	 * @return array
	 */
	public static function get_settings() {
		$default_settings = array(
			'lewis_license_key'    => '',
			'lewis_license_status' => 'inactive',
		);

		return wp_parse_args( get_option( 'lewis_theme_settings', array() ), $default_settings );
	}

	/**
	 * Register all settings sections and fields
	 */
	public static function register_settings() {

		// Add License Status Setting.
		add_settings_field(
			'lewis_theme_settings[lewis_license_status]',
			esc_html__( 'License Status', 'lewis' ),
			array( __CLASS__, 'render_license_status_setting' ),
			'lewis_theme_settings',
			'lewis_license_section'
		);

		// Add License Key Setting.
		add_settings_field(
			'lewis_theme_settings[lewis_license_key]',
			esc_html__( 'License Key', 'lewis' ),
			array( __CLASS__, 'render_license_key_setting' ),
			'lewis_theme_settings',
			'lewis_license_section'
		);
	}

	/**
	 * License Status Callback
	 */
	public static function render_license_status_setting() {
		$options        = self::get_settings();
		$license_status = $options['lewis_license_status'];
		$license_key    = ! empty( $options['lewis_license_key'] ) ? trim( $options['lewis_license_key'] ) : false;

		$html = '';
		if ( 'valid' === $license_status && ! empty( $license_key ) ) {
			$html .= '<span style="display: inline-block; margin-bottom: 12px; padding: 4px 8px; background: green; color: #fff;">' . esc_html__( 'Active', 'lewis' ) . '</span>';
			$html .= '<br/><span class="description">' . esc_html__( 'You are receiving updates.', 'lewis' ) . '</span>';
		} else {
			$html .= '<span style="display: inline-block; margin-bottom: 12px; padding: 4px 8px; background: #444; color: #fff;">' . esc_html__( 'Inactive', 'lewis' ) . '</span>';
			$html .= '<br/><span class="description">' . esc_html__( 'Please activate your license.', 'lewis' ) . '</span>';
		}

		// phpcs:ignore
		echo $html;
	}

	/**
	 * License Key Callback
	 */
	public static function render_license_key_setting() {
		$options        = self::get_settings();
		$license_status = $options['lewis_license_status'];
		$license_key    = ! empty( $options['lewis_license_key'] ) ? trim( $options['lewis_license_key'] ) : false;

		$html = '';
		if ( 'valid' === $license_status && ! empty( $license_key ) ) {
			$html .= '<span style="display: inline-block; box-sizing: border-box; width: 25em; margin: 0 1px; padding: 0 8px;line-height: 2;border-radius: 4px;border: 1px solid #8c8f94;">*************************' . esc_html( substr( stripslashes( $license_key ), 25 ) ) . '</span>';
			$html .= '<input type="submit" class="button" name="lewis_deactivate_license" value="' . esc_attr__( 'Deactivate License', 'lewis' ) . '"/>';
		} else {
			$html .= '<input type="text" class="regular-text" id="lewis_theme_settings[lewis_license_key]" name="lewis_theme_settings[lewis_license_key]" value="' . esc_attr( stripslashes( $license_key ) ) . '"/>';
			$html .= '<input type="submit" class="button" name="lewis_activate_license" value="' . esc_attr__( 'Activate License', 'lewis' ) . '"/>';
		}

		// phpcs:ignore
		echo $html;
		wp_nonce_field( 'lewis_license_nonce', 'lewis_license_nonce' );
	}

	/**
	 * Activates the license key.
	 */
	public static function activate_license() {

		// Return early if not on Lewis admin page.
		if ( ! isset( $_POST['lewis_theme_settings'] ) ) {
			return;
		}

		// Listen for our activate button to be clicked.
		if ( ! isset( $_POST['lewis_activate_license'] ) ) {
			return;
		}

		// Run a quick security check.
		if ( ! check_admin_referer( 'lewis_license_nonce', 'lewis_license_nonce' ) ) {
			return;
		}

		// Get License key.
		$license_key = ! empty( $_POST['lewis_theme_settings']['lewis_license_key'] ) ? sanitize_text_field( wp_unslash( $_POST['lewis_theme_settings']['lewis_license_key'] ) ) : false;

		// Return if no license key was entered.
		if ( ! $license_key ) {
			return;
		}

		// Data to send in our API request.
		$api_params = array(
			'edd_action'  => 'activate_license',
			'license'     => $license_key,
			'item_id'     => LEWIS_THEME_ID,
			'item_name'   => rawurlencode( LEWIS_THEME_NAME ),
			'url'         => home_url(),
			'environment' => function_exists( 'wp_get_environment_type' ) ? wp_get_environment_type() : 'production',
		);

		// Call the custom API.
		$response = wp_remote_post(
			LEWIS_THEME_STORE_URL,
			array(
				'timeout'   => 15,
				'sslverify' => true,
				'body'      => $api_params,
			)
		);

		// Make sure the response came back okay.
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

			if ( is_wp_error( $response ) ) {
				$message = $response->get_error_message();
			} else {
				$message = __( 'An error occurred, please try again.', 'lewis' );
			}
		} else {

			$license_data = json_decode( wp_remote_retrieve_body( $response ) );

			if ( false === $license_data->success ) {

				switch ( $license_data->error ) {

					case 'expired':
						$message = sprintf(
							/* translators: the license key expiration date */
							__( 'Your license key expired on %s.', 'lewis' ),
							date_i18n( get_option( 'date_format' ), strtotime( $license_data->expires, time() ) )
						);
						break;

					case 'disabled':
					case 'revoked':
						$message = __( 'Your license key has been disabled.', 'lewis' );
						break;

					case 'missing':
						$message = __( 'Invalid license.', 'lewis' );
						break;

					case 'invalid':
					case 'site_inactive':
						$message = __( 'Your license is not active for this URL.', 'lewis' );
						break;

					case 'item_name_mismatch':
						/* translators: the plugin name */
						$message = sprintf( __( 'This appears to be an invalid license key for %s.', 'lewis' ), LEWIS_THEME_NAME );
						break;

					case 'no_activations_left':
						$message = __( 'Your license key has reached its activation limit.', 'lewis' );
						break;

					default:
						$message = __( 'An error occurred, please try again.', 'lewis' );
						break;
				}
			}
		}

		// Check if anything passed on a message constituting a failure.
		if ( ! empty( $message ) ) {
			$redirect = add_query_arg(
				array(
					'page'             => 'lewis-theme',
					'lewis_activation' => 'false',
					'message'          => rawurlencode( $message ),
				),
				admin_url( 'themes.php' )
			);

			wp_safe_redirect( $redirect );
			exit();
		}

		// Retrieve the license from the database.
		$options = self::get_settings();

		// $license_data->license will be either "valid" or "invalid".
		if ( 'valid' === $license_data->license ) {
			$options['lewis_license_key'] = $license_key;
		}
		$options['lewis_license_status'] = $license_data->license;
		update_option( 'lewis_theme_settings', $options );

		wp_safe_redirect( admin_url( 'themes.php?page=lewis-theme' ) );
		exit();
	}

	/**
	 * Deactivates the license key.
	 * This will decrease the site count.
	 */
	public static function deactivate_license() {

		// Listen for our activate button to be clicked.
		if ( ! isset( $_POST['lewis_deactivate_license'] ) ) {
			return;
		}

		// Run a quick security check.
		if ( ! check_admin_referer( 'lewis_license_nonce', 'lewis_license_nonce' ) ) {
			return;
		}

		// Retrieve our license key from the DB.
		$options     = self::get_settings();
		$license_key = ! empty( $options['lewis_license_key'] ) ? trim( $options['lewis_license_key'] ) : false;

		// Data to send in our API request.
		$api_params = array(
			'edd_action'  => 'deactivate_license',
			'license'     => $license_key,
			'item_id'     => LEWIS_THEME_ID,
			'item_name'   => rawurlencode( LEWIS_THEME_NAME ),
			'url'         => home_url(),
			'environment' => function_exists( 'wp_get_environment_type' ) ? wp_get_environment_type() : 'production',
		);

		// Call the custom API.
		$response = wp_remote_post(
			LEWIS_THEME_STORE_URL,
			array(
				'timeout'   => 15,
				'sslverify' => true,
				'body'      => $api_params,
			)
		);

		// Make sure the response came back okay.
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

			if ( is_wp_error( $response ) ) {
				$message = $response->get_error_message();
			} else {
				$message = __( 'An error occurred, please try again.', 'lewis' );
			}

			$redirect = add_query_arg(
				array(
					'page'             => 'lewis-theme',
					'lewis_activation' => 'false',
					'message'          => rawurlencode( $message ),
				),
				admin_url( 'themes.php' )
			);

			wp_safe_redirect( $redirect );
			exit();
		}

		// Deactivate the License key in DB.
		$options['lewis_license_key']    = '';
		$options['lewis_license_status'] = 'inactive';
		update_option( 'lewis_theme_settings', $options );

		wp_safe_redirect( admin_url( 'themes.php?page=lewis-theme' ) );
		exit();
	}

	/**
	 * This is a means of catching errors from the activation method above and displaying it to the customer
	 */
	public static function license_activated_notice() {
		// phpcs:ignore
		if ( isset( $_GET['lewis_activation'] ) && ! empty( $_GET['message'] ) ) {

			// phpcs:ignore
			switch ( $_GET['lewis_activation'] ) {

				case 'false':
					// phpcs:ignore
					$message = urldecode( sanitize_text_field( wp_unslash( $_GET['message'] ) ) );
					?>
					<div class="error">
						<p><?php echo wp_kses_post( $message ); ?></p>
					</div>
					<?php
					break;

				case 'true':
				default:
					// Developers can put a custom success message here for when activation is successful if they way.
					break;

			}
		}
	}

	/**
	 * Display activate license notice
	 *
	 * @return void
	 */
	public static function theme_page_notice() {
		global $pagenow;
		$options = self::get_settings();

		 // phpcs:ignore
		if ( 'valid' !== $options['lewis_license_status'] && in_array( $pagenow, array( 'index.php', 'update-core.php', 'themes.php' ), true ) && ! isset( $_GET['page'] ) && current_user_can( 'manage_options' ) ) :
			?>

			<div class="notice notice-info">
				<p>
					<?php
					/* translators: %1$s: Theme name. %2$s: Link to theme settings. */
					printf( __( 'Please enter your license key for the %1$s theme in order to receive updates and support. <a href="%2$s">Enter License Key</a>', 'lewis' ), // phpcs:ignore
						'Lewis',
						esc_url( admin_url( 'themes.php?page=lewis-theme' ) )
					);
					?>
				</p>
			</div>

			<?php
		endif;
	}

	/**
	 * Disable requests to wp.org repository for this theme.
	 *
	 * @param array  $parsed_args An array of HTTP request arguments.
	 * @param string $url         The request URL.
	 */
	public static function disable_wporg_request( $parsed_args, $url ) {

		// If it's not a theme update request, bail.
		if ( 0 !== strpos( $url, 'https://api.wordpress.org/themes/update-check/1.1/' ) ) {
			return $parsed_args;
		}

		// Decode the JSON response.
		$themes = json_decode( $parsed_args['body']['themes'] );

		// Remove the active parent and child themes from the check.
		$parent = get_option( 'template' );
		$child  = get_option( 'stylesheet' );
		unset( $themes->themes->$parent );
		unset( $themes->themes->$child );

		// Encode the updated JSON response.
		$parsed_args['body']['themes'] = wp_json_encode( $themes );

		return $parsed_args;
	}
}

// Run class.
Lewis_License_Settings::setup();
