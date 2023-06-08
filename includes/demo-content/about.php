<?php
/**
 * Demo Content: About
 *
 * @package Lewis
 */

?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|80"},"margin":{"top":"0"}}},"layout":{"contentSize":"1200px","wideSize":"1200px","type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--80)">

	<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|80","left":"var:preset|spacing|80"}}}} -->
	<div class="wp-block-columns">

		<!-- wp:column {"width":"40%"} -->
		<div class="wp-block-column" style="flex-basis:40%">

			<!-- wp:heading {"level":1,"className":"is-style-underlined-heading"} -->
			<h1 class="is-style-underlined-heading">About us</h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"60%"} -->
		<div class="wp-block-column" style="flex-basis:60%">

			<!-- wp:gallery {"linkTo":"none"} -->
			<figure class="wp-block-gallery has-nested-images columns-default is-cropped">

				<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/portfolio-image.png" alt="">
				</figure>
				<!-- /wp:image -->

				<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/portfolio-image.png" alt="">
				</figure>
				<!-- /wp:image -->

				<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/portfolio-image.png" alt="">
				</figure>
				<!-- /wp:image -->

				<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/portfolio-image.png" alt="">
				</figure>
				<!-- /wp:image -->

				<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/portfolio-image.png" alt="">
				</figure>
				<!-- /wp:image -->

		</figure>
		<!-- /wp:gallery -->

		</div>
		<!-- /wp:column -->

	</div>
<!-- /wp:columns -->

</div>
<!-- /wp:group -->

<?php
/**
 * Compose rest of Services page from block patterns.
 */
require get_parent_theme_file_path( '/patterns/team-columns-light.php' );
require get_parent_theme_file_path( '/patterns/features-grid-dark.php' );
require get_parent_theme_file_path( '/patterns/testimonials-columns.php' );
