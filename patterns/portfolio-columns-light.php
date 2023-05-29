<?php
/**
 * Title: Portfolio (Columns, light)
 * Slug: lewis/portfolio-columns-light
 * Categories: lewis_portfolio
 *
 * @package Lewis
 */

?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|80"},"margin":{"top":"0"}}},"backgroundColor":"white","layout":{"contentSize":"1200px","wideSize":"1200px","type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--80)">

	<!-- wp:heading {"className":"is-style-underlined-heading"} -->
	<h2 class="is-style-underlined-heading">Portfolio</h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|60","left":"var:preset|spacing|60"},"margin":{"top":"var:preset|spacing|70"}}}} -->
	<div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--70)">

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full is-style-default">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/portfolio-image.png" alt="">
			</figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":3} -->
			<h3>Tax Calculator</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis diss parturient.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Try now</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full is-style-default">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/portfolio-image.png" alt="">
			</figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":3} -->
			<h3>Retirement Planner</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis diss parturient.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Try now</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full is-style-default">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/portfolio-image.png" alt="">
			</figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":3} -->
			<h3>Salary Comparison Tool</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis diss parturient.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Try now</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
