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
			self::create_demo_pages();
		}

		$categories = array();
		if ( ! empty( $_POST['lewis_theme_settings']['lewis_demo_content']['categories'] ) ) {
			$categories = self::create_demo_categories();
		}

		if ( ! empty( $_POST['lewis_theme_settings']['lewis_demo_content']['posts'] ) ) {
			self::create_demo_posts( $categories );
		}

		wp_safe_redirect( admin_url( 'themes.php?page=lewis-theme' ) );
	}

	/**
	 * Create demo pages.
	 */
	private static function create_demo_pages() {
		$home = wp_insert_post(
			array(
				'post_title'    => 'Home',
				'post_content'  => self::load_demo_content( 'home' ),
				'post_type'     => 'page',
				'post_status'   => 'publish',
				'post_author'   => get_current_user_id(),
				'page_template' => 'page-no-title',
			)
		);

		$services = wp_insert_post(
			array(
				'post_title'    => 'Services',
				'post_content'  => self::load_demo_content( 'services' ),
				'post_type'     => 'page',
				'post_status'   => 'publish',
				'post_author'   => get_current_user_id(),
				'page_template' => 'page-no-title',
			)
		);

		$about = wp_insert_post(
			array(
				'post_title'    => 'About',
				'post_content'  => self::load_demo_content( 'about' ),
				'post_type'     => 'page',
				'post_status'   => 'publish',
				'post_author'   => get_current_user_id(),
				'page_template' => 'page-no-title',
			)
		);

		$blog = wp_insert_post(
			array(
				'post_title'   => 'Blog',
				'post_content' => '',
				'post_type'    => 'page',
				'post_status'  => 'publish',
				'post_author'  => get_current_user_id(),
			)
		);

		update_option( 'page_on_front', $home );
		update_option( 'page_for_posts', $blog );
		update_option( 'show_on_front', 'page' );
	}

	/**
	 * Create demo categories.
	 */
	private static function create_demo_categories() {
		$categories = array();

		foreach ( array(
			'Business',
			'Lifestyle',
			'Technology',
		) as $title ) :
			$term         = wp_create_term( $title, 'category' );
			$categories[] = $term['term_id'];
		endforeach;

		return $categories;
	}

	/**
	 * Create demo posts.
	 *
	 * @param array $categories Category ids.
	 */
	private static function create_demo_posts( $categories ) {
		$image_id = self::load_demo_image();

		foreach ( array(
			'Proin quis odio at augue feugiat rutrum non id lacus',
			'Nam gravida nisi lacus, nec dignissim tortor gravida at. Fusce sed ante id',
			'Maecenas nec odio et ante tincidunt tempus Nam eget dui',
			'Morbi ut molestie velit, iaculis pharetra metus. Sed viverra nibh',
			'Pellentesque convallis malesuada pharetra. Proin rhoncus dolor',
		) as $title ) :
			$post = wp_insert_post(
				array(
					'post_title'    => $title,
					'post_content'  => self::load_demo_content( 'post' ),
					'post_type'     => 'post',
					'post_status'   => 'publish',
					'post_author'   => get_current_user_id(),
					'post_category' => array( $categories[ wp_rand( 0, count( $categories ) - 1 ) ] ),
				)
			);
			if ( $image_id > 0 ) {
				set_post_thumbnail( $post, $image_id );
			}
		endforeach;
	}

	/**
	 * Create demo image.
	 *
	 * @throws Exception Error creating images.
	 */
	private static function load_demo_image() {
		$file = 'https://preview.themezee.com/wp-content/themes/lewis/assets/img/portfolio-image.png';

		$file_array = array(
			'name'     => 'lewis-demo-image.png',
			'tmp_name' => download_url( $file ),
		);

		if ( is_wp_error( $file_array['tmp_name'] ) ) {
			throw new Exception();
		}

		$id = media_handle_sideload( $file_array, 0 );

		if ( is_wp_error( $id ) ) {
			throw new Exception();
		}

		return $id;
	}

	/**
	 * Load demo content.
	 *
	 * @param string $file File name.
	 */
	private static function load_demo_content( $file ) {
		ob_start();
		include get_parent_theme_file_path( '/includes/demo-content/' . $file . '.php' );
		return ob_get_clean();
	}
}

// Run class.
Lewis_Demo_Content_Settings::setup();
