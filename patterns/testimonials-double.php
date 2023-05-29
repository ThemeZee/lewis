<?php
/**
 * Title: Testimonials (Double)
 * Slug: lewis/testimonials-double
 * Categories: lewis_testimonials
 *
 * @package Lewis
 */

?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|80"},"margin":{"top":"0"}}},"layout":{"contentSize":"1200px","wideSize":"1200px","type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--80)">

	<!-- wp:heading {"className":"is-style-underlined-heading"} -->
	<h2 class="is-style-underlined-heading">Testimonials from happy clients</h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|60","left":"var:preset|spacing|60"},"margin":{"top":"var:preset|spacing|70"}}}} -->
	<div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--70)">

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|60","padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60"}}},"backgroundColor":"white","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)">

				<!-- wp:image {"width":128,"height":128,"sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
				<figure class="wp-block-image size-full is-resized is-style-rounded">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/testimonial.png" alt="" width="128" height="128"/>
				</figure>
				<!-- /wp:image -->

				<!-- wp:group -->
				<div class="wp-block-group">

					<!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic","fontWeight":"400"}}} -->
					<p style="font-style:italic;font-weight:400">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic","fontWeight":"500"}}} -->
					<p style="font-style:italic;font-weight:500">— John Doe</p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|60","padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60"}}},"backgroundColor":"white","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)">

				<!-- wp:image {"width":128,"height":128,"sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
				<figure class="wp-block-image size-full is-resized is-style-rounded">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/testimonial.png" alt="" width="128" height="128"/>
				</figure>
				<!-- /wp:image -->

				<!-- wp:group -->
				<div class="wp-block-group">

					<!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic","fontWeight":"400"}}} -->
					<p style="font-style:italic;font-weight:400">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic","fontWeight":"500"}}} -->
					<p style="font-style:italic;font-weight:500">— Sarah Connor</p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
