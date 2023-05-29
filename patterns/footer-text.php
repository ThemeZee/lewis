<?php
/**
 * Title: Footer Text
 * Slug: lewis/footer-text
 * Inserter: no
 *
 * @package Lincoln
 */

?>

<!-- wp:paragraph -->
<p>&copy; <?php echo wp_kses_post( date_i18n( 'Y' ) . ' ' . get_bloginfo( 'name' ) ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|gray"}}}},"className":"flip-link-hover"} -->
<p class="flip-link-hover has-link-color"><a href="#"><?php esc_html_e( 'Privacy Policy', 'lewis' ); ?></a> | <a href="#"><?php esc_html_e( 'Imprint', 'lewis' ); ?></a></p>
<!-- /wp:paragraph -->
