<?php
/**
 * Title: Testimonials (List, dark)
 * Slug: lewis/testimonials-list-dark
 * Categories: lewis_testimonials
*/
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|80"},"margin":{"top":"0"}}},"backgroundColor":"darker-gray","textColor":"white","layout":{"contentSize":"1200px","wideSize":"1200px","type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-color has-darker-gray-background-color has-text-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--80)">

	<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|80","left":"var:preset|spacing|80"}}}} -->
	<div class="wp-block-columns">

		<!-- wp:column {"width":"40%"} -->
		<div class="wp-block-column" style="flex-basis:40%">

			<!-- wp:heading {"className":"is-style-underlined-heading"} -->
			<h2 class="is-style-underlined-heading">Client Testimonials</h2>
			<!-- /wp:heading -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"60%","style":{"spacing":{"blockGap":"var:preset|spacing|60"}}} -->
		<div class="wp-block-column" style="flex-basis:60%">

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|60","padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60"}}},"backgroundColor":"dark-gray","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group has-dark-gray-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)">

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

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|60","padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60"}}},"backgroundColor":"dark-gray","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group has-dark-gray-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)">

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
